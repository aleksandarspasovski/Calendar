<?php 

// set as global variable ($db = $this->db), so you don't have to cash it everytime when u make new function;

class Scheduling_model extends Database
{
	public function saveDate($content, $day, $user_id)
	{
		$arr = array(
			'content' => $content,
			'day' 	  => $day,
			'user_id' => $user_id
		);
		// var_dump($this->db);
		$db = $this->db;
		$con = trim($arr['content']);

		$tomorrow_day = date('d')+1;
		$today_month = date('m');
		$today_year = date('Y');
		$hour = date('H:i');
		$exp_date = $tomorrow_day. '/' . $today_month. '/' . $today_year. ' ' . $hour;

		$sql = 'insert into calendar values(null,"'.$con.'", "'.$day.'", "'.$user_id.'", "1", "'.$exp_date.'" )';
		$res = $db->query($sql);
		if ($res == true) {
			$query = 'select * from calendar';
			$qres = $db->query($query);
			$result = $qres->fetch_assoc();
			return $result;

		}
	}
	public function checkIfRowIsSet($user_id)
	{
		$db = $this->db;
		$sql = 'select status, expiration_date from calendar where user_id = "'.$user_id.'"';
		$res = $db->query($sql);
		$result = $res->fetch_assoc();
		// var_dump($result['expiration_date']);die;
		$date = date('d/m/Y H:i');
		if ($result['expiration_date'] >= $date) {
			return false;
			exit;
		} else{
			$query = 'delete from calendar where user_id = "'.$user_id.'"';
			$qres = $db->query($query);
			return true;
		}

	}
	public function displayUser($user_id)
	{
		$db = $this->db;
		$sql = 'select content, day from calendar where user_id = "'.$user_id.'"';
		$res = $db->query($sql);
		// return json_encode($res);
		$result = $res->fetch_assoc();
		// echo $user_id;
		// var_dump($res);
		echo json_encode($result);
	}
	public function userInfo($user_id)
	{
		$db = $this->db;
		$sql = 'select * from users where id = "'.$user_id.'"';
		$res = $db->query($sql);
		// return json_encode($res);
		$result = $res->fetch_assoc();
		return $result;
	}
	public function deleteUser($day, $user_id)
	{
		$db = $this->db;
		$sql = 'delete from calendar where day = "'.$day.'" and user_id = "'.$user_id.'"';
		var_dump($sql);
		$res = $db->query($sql);
		return $res;
	}
	public function listedUser()
	{
		$db = $this->db;
		$sql = 'select * from calendar';
		$res = $db->query($sql);
		$result = $res->fetch_assoc();
		return $result;

		var_dump('expression');
	}
}