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

		for ($i=1; $i <= $ld; $i++, $wd++) {

			$date = $today['year'].'-'. $today['month']. '-' .$i;
			if ($day == $date) {
				$week .= '<td class ="td current"><p class="num">'. $i;
			} else{
				$week .= '<td class="td"><p class="num">'. $i; 
			}
			$week .= '</p><form class="form" action="'.URL.'scheduling/save/" method="post"><input type="text" name="content"><input type="hidden" name="num" value="'.$i.'"><a href="#">Edit</a> <a href="#">Delete</a></form><span class="exit">X</span></td>';
	
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

		if ($content == '') {
			return false;
		}
		$save = new Scheduling_model();
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

	}
	public function delete($day)
	{
		$user_id = $_SESSION['logged'];
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
		
		return $list;
	}

	public function logout()
	{
		Session::destroy();
		header('location: '.URL.'login');
		exit;
	}

}
