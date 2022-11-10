<?php
include '../include/db.php';
session_start();
if (isset($_POST['adminLogin'])) {

	$username = $_POST['username'];
	$password = $_POST['password'];

	$res = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM users_tbl WHERE username = '$username' AND password = '$password' "));

	if ($username == $res['username'] && $password == $res['password']) {
		$_SESSION['uid'] = $res['user_id'];
		$_SESSION['username'] = $res['username'];
		echo "Login";
	}else{
		echo "Error";
	}

}elseif (isset($_POST['btnUserLogin'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	if ($username != '' && $password != '') {
		
		$res = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM members_tbl WHERE username = '$username' AND password = '$password'"));

		if ($res['username'] == $username && $res['password'] == $password) {
			
			if ($res['account_status'] == '0') {
				$_SESSION['member_id'] = $res['member_id'];
				$_SESSION['username'] = $res['username'];

				$log_date = date('Y-m-d');
				$log_time = date('h:i a');

				$queryLog = mysqli_query($con, "INSERT INTO logs_tbl (member_id, action, log_date, log_time) VALUES ('{$res['member_id']}', 'Logged In', '$log_date', '$log_time')");

				if ($queryLog) {
					echo "login";
				}
				
			}elseif($res['account_status'] == '1'){
				echo "denied";
			}

		}else{
			echo "wrong";
		}

	}else{
		echo "empty";
	}

}elseif (isset($_POST['coordinatorBtn'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$res = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM coordinators_tbl WHERE username = '$username' AND password = '$password' "));

	if ($username == $res['username'] && $password == $res['password']) {

		if ($res['account_status'] != '1') {
			$resPend = mysqli_query($con, "SELECT * FROM members_tbl WHERE school_id = '{$res['school_id']}' AND department_id = '{$res['department_id']}' AND account_status = '1'");

			if ($rows = mysqli_num_rows($resPend) > 0) {
				$_SESSION['uid'] = $res['coordinator_id'];
				$_SESSION['username'] = $res['username'];
				echo "pending";
			}else{
				$_SESSION['uid'] = $res['coordinator_id'];
				$_SESSION['username'] = $res['username'];
				echo "Login";
			}	
		}else{
			echo "denied";
		}
		
	}else{
		echo "Error";
	}
}
?>