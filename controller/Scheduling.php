<?php  


class Scheduling extends BaseController
{
	
	function __construct()
	{
		parent::__construct();
		Session::init();
		$logged = Session::get('logged', true);
		if ($logged == false) {
			Session::destroy();
			require 'controller/Errors.php';
			$controller = new Errors();
			exit;
		}
	}
	public function calendar()
	{
		date_default_timezone_set('Europe/Belgrade');
		$today = getdate();
		// current day
		$day = getdate(mktime(0,0,0,$today['mon'],$today['mday'],$today['year']));

		// last day of the month
		$lastDay  = getdate(mktime(0,0,0,$today['mon']+1,0,$today['year']));




		$gd = date('Y-m');
		$ts = strtotime($gd . '-01');
		$wd = date('w', mktime(0, 0, 0, date('m', $ts), 0, date('Y', $ts)));
		$ld = $lastDay['mday'];

		$day = $today['year'].'-'.$today['month'].'-'.$today['mday'];
		
		$weeks = array();
		$week = '';
		$week .= str_repeat('<td></td>', $wd);

		// $week .= str_repeat('<td></td>', $str);
		for ($i=1; $i <= $ld; $i++, $wd++) {
			// var_dump($wd);die;
			$date = $today['year'].'-'. $today['month']. '-' .$i;
			if ($day == $date) {
				$week .= '<td class ="td current"><p class="num">'. $i;
			} else{
				$week .= '<td class="td"><p class="num">'. $i; 
			}
			$week .= '</p><form class="form" action="'.URL.'scheduling/save/" method="post"><input type="text" name="content"><input type="hidden" name="num" value="'.$i.'"><a href="#">Edit</a> <a href="#">Delete</a></form><span class="exit">X</span></td>';
			// var_dump($week);

			if ($wd % 7 == 6 || $i == $ld) {
				if ($i == $ld) {
					$week .= str_repeat('<td></td>', 6 - ($wd % 7));
				}

				$weeks[] = '<tr>' . $week . '</tr>';
				$week = '';
			}
		}
		foreach ($weeks as $week) {
            echo $week; 
        }

	}
	public function index()
	{
		$user_id = $_SESSION['logged'];
		$this->view->user = $this->model->userInfo($user_id);
		$this->view->render('scheduling');
	}
	public function save()
	{
		$user_id = $_SESSION['logged'];
		$tb_row = $_POST['num'];
		$content = $_POST['content'];
		// var_dump($_POST);die;
		if ($content == '') {
			return false;
		}
		$save = new Scheduling_model();
		// var_dump($save);die;
		if ($save->checkIfRowIsSet($user_id)) {
			$save->saveDate($content, $tb_row, $user_id);
			header('location: '.URL.'scheduling');
		} else{
			header('location: '.URL.'scheduling?you have already schedualed come back tomorrow');
		}

	}
	public function display()
	{
		$user_id = $_SESSION['logged'];

		$save = new Scheduling_model();
		$display_user = $save->displayUser($user_id);
		// return json_encode($display_user);
		// var_dump($_SESSION['logged']);
	}
	public function delete($day)
	{
		$user_id = $_SESSION['logged'];
		// var_dump($user_id, $day);die;
		$save = new Scheduling_model();
		$delete_user = $save->deleteUser($day, $user_id);
		var_dump($delete_user);
		if ($delete_user) {
			header('location: '.URL.'scheduling?schedual is deleted');
		}
	}
	public function listAll()
	{
		echo 'List all schedualed appointment';
		$listed = new Scheduling_model();
		$listed_user = $listed->listedUser();
		// var_dump($listed_user);
		$list = array(
			'id' => $listed_user['id'],
			'content' => $listed_user['content'],
			'day'     => $listed_user['day'],
			'user_id' => $listed_user['user_id'],
			'status' => $listed_user['status'],
			'expiration_date' => $listed_user['expiration_date'],
			'delete' => '<a href="'. URL.'scheduling/?adminDelete">Delete</a>'
		);
		return $list;
		// var_dump($list);
		// foreach ($list as $key => $value) {
		// 	echo '<br>';
		// 	echo $key. ': '. $value;
		// }
	}
	public function toggleClass()
	{
		echo json_encode('fsfsdfsdfsdsdfs');
	}
	public function logout()
	{
		Session::destroy();
		header('location: '.URL.'login');
		exit;
	}

}