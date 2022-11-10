<?php
include '../../../include/db.php';
if (isset($_REQUEST['btnVerify'])) {
	$query = mysqli_query($con, "UPDATE members_tbl SET account_status = '0' WHERE member_id = '{$_REQUEST['m_id']}'");
	if ($query) {
		?>
		<script type="text/javascript">
			//alert('User Verified');
			window.location.href='../../../views/admin/pending_accounts_view';
		</script>
		<?php
	}
}elseif (isset($_REQUEST['btnSaveEvent'])) {

	$user_username = mysqli_escape_string($con, $_REQUEST['user_username']);
	$school_id = mysqli_escape_string($con, $_REQUEST['school_id']);
	$department_id = mysqli_escape_string($con, $_REQUEST['department_id']);
	$event_title = mysqli_escape_string($con, $_REQUEST['event_title']);
	$gender_scope = mysqli_escape_string($con, $_REQUEST['gender_scope']);
	$role_scope = mysqli_escape_string($con, $_REQUEST['role_scope']);
	$event_date_start = mysqli_escape_string($con, $_REQUEST['event_date_start']);
	$event_time = mysqli_escape_string($con, $_REQUEST['event_time']);
	$event_description = mysqli_escape_string($con, $_REQUEST['event_description']);
	$global_url = mysqli_escape_string($con, $_REQUEST['global_url']);
	$event_date_end = "";
	$date_created = date('Y-m-d');

	if (empty($_REQUEST['event_date_end'])) {
		$event_date_end = "N/A";
	}else{
		$event_date_end = $_REQUEST['event_date_end'];
	}

	$query = mysqli_query($con, "INSERT INTO events_tbl (user_id, user_username, event_title, gender_scope, role_scope, event_date_start, event_date_end, event_time, event_description, date_created, school_id, department_id, event_status, archive_status) VALUES ('0', '$user_username', '$event_title', '$gender_scope', '$role_scope', '$event_date_start', '$event_date_end', '$event_time', '$event_description', '$date_created', '$school_id', '$department_id', '1', '1')");

	if ($query) {

		$date_sent = date('Y-m-d');

		if ($gender_scope == '0' && $school_id == '0') {
			
			$qMem = mysqli_query($con, "SELECT * FROM members_tbl WHERE account_status = '0'");

		}elseif ($gender_scope != '0' && $school_id == '0') {
			
			$qMem = mysqli_query($con, "SELECT * FROM members_tbl WHERE gender = '$gender_scope' AND account_status = '0'");

		}elseif ($gender_scope == '0' && $school_id != '0') {
			
			$qMem = mysqli_query($con, "SELECT * FROM members_tbl WHERE school_id = '$school_id' AND department_id = '$department_id' AND account_status = '0'");

		}elseif ($gender_scope != '0' && $school_id != '0') {
			
			$qMem = mysqli_query($con, "SELECT * FROM members_tbl WHERE gender = '$gender_scope' AND school_id = '$school_id' AND department_id = '$department_id' AND account_status = '0'");

		}

		// if ($gender_scope != '0') {
			
		// 	$qMem = mysqli_query($con, "SELECT * FROM members_tbl WHERE account_status = '0' AND department_id = '$department_id' AND school_id = '$school_id' AND gender = '$gender_scope'");

		// }else{
		// 	$qMem = mysqli_query($con, "SELECT * FROM members_tbl WHERE account_status = '0' AND department_id = '$department_id' AND school_id = '$school_id'");
		// }

		if ($numRows = mysqli_num_rows($qMem) > 0) {
				while ($rMem = mysqli_fetch_assoc($qMem)) {
					$sms_content = "";
					$member_name = $rMem['fname'].' '.$rMem['lname'];
					if (empty($event_date_end)) {
						$sms_content = "Good day ".$rMem['fname']." ".$rMem['lname']." New Event Schedule. What: ".$event_title." When: ".date('F j, Y', strtotime($event_date_start))." @ ".$event_time.". Thank you.";
					}else{
						$sms_content = "Good day ".$rMem['fname']." ".$rMem['lname']." New Event Schedule. What: ".$event_title." When: ".date('F j, Y', strtotime($event_date_start))." To ".date('F j, Y', strtotime($event_date_end))." @ ".$event_time.". Thank you.";
					}

					$qSms = mysqli_query($con, "INSERT INTO sms_tbl (send_by, member_id, sms_content, contact_number, date_sent, sms_status, member_name) VALUES ('$user_username', '{$rMem['member_id']}', '$sms_content', '{$rMem['contact_number']}', '$date_sent', '1', '$member_name')");

			}

			if ($qSms) {
				?>
				<script type="text/javascript">
					alert('Event Created');
					window.location.href='<?php echo $global_url; ?>';
				</script>
				<?php
			}
		}else{
			?>
			<script type="text/javascript">
				alert('Event Created');
				window.location.href='<?php echo $global_url; ?>';
			</script>
			<?php
			
		}
		
	}

}elseif (isset($_REQUEST['btnEditEvent'])) {
	$event_id = $_REQUEST['event_id'];
	$event_title = mysqli_escape_string($con, $_REQUEST['event_title']);
	$gender_scope = mysqli_escape_string($con, $_REQUEST['gender_scope']);
	$role_scope = mysqli_escape_string($con, $_REQUEST['role_scope']);
	$event_date_start = mysqli_escape_string($con, $_REQUEST['event_date_start']);
	$event_date_end = "";
	if (empty($event_date_end)) {
		$event_date_end = "N/A";
	}else{
		$event_date_end = $_REQUEST['event_date_end'];
	}
	$event_time = mysqli_escape_string($con, $_REQUEST['event_time']);
	$event_description = mysqli_escape_string($con, $_REQUEST['event_description']);
	$date_created = date('Y-m-d');

	$query = mysqli_query($con, "UPDATE events_tbl SET event_title = '$event_title', gender_scope = '$gender_scope', role_scope = '$role_scope', event_date_start = '$event_date_start', event_date_end = '$event_date_end', event_time = '$event_time', event_description = '$event_description', date_created = '$date_created' WHERE event_id = '$event_id'");

	if ($query) {


		$date_sent = date('Y-m-d');

		$qMem = mysqli_query($con, "SELECT * FROM members_tbl WHERE gender = '$gender_scope' AND account_status = '0' OR role = '$role_scope' AND account_status = '0' OR role = 'All' AND account_status = '0' OR gender = 'All' AND account_status = '0'");
		if ($numRows = mysqli_num_rows($qMem) > 0) {
				while ($rMem = mysqli_fetch_assoc($qMem)) {
				
				$sms_content = "Good day ".$rMem['fname']." ".$rMem['lname']." New Event Schedule. What: ".$event_title." When: ".date('F j, Y', strtotime($event_date_start))." @ ".$event_time.". Thank you.";

				$qSms = mysqli_query($con, "INSERT INTO sms_tbl (member_id, sms_content, contact_number, date_sent, sms_status) VALUES ('{$rMem['member_id']}', '$sms_content', '{$rMem['contact_number']}', '$date_sent', '1')");

			}

			if ($qSms) {
				?>
				<script type="text/javascript">
					alert('Event Edited');
					window.location.href='../../../views/admin/events_view';
				</script>
				<?php
			}
		}else{
			?>
			<script type="text/javascript">
				alert('Event Edited');
				window.location.href='../../../views/admin/events_view';
			</script>
			<?php
		}

		
	}
}elseif (isset($_REQUEST['btnEditProfile'])) {
	$user_id = $_REQUEST['user_id'];
	$email = $_REQUEST['email'];
	$fname = mysqli_escape_string($con, $_REQUEST['fname']);
	$mname = mysqli_escape_string($con, $_REQUEST['mname']);
	$lname = mysqli_escape_string($con, $_REQUEST['lname']);
	$contact_number = mysqli_escape_string($con, $_REQUEST['contact_number']);
	$username = mysqli_escape_string($con, $_REQUEST['username']);
	$password = mysqli_escape_string($con, $_REQUEST['password']);
	$url = "";

	$profile_image = $_FILES['profile_image']['name'];
	$tmpName = $_FILES['profile_image']['tmp_name'];

	move_uploaded_file($tmpName, "../../../profile_images/".$profile_image);

	$resU = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM users_tbl WHERE user_id = '$user_id'"));

	if (empty($profile_image)) {
		$url = $resU['profile_image'];
	}else{
		$url = "http://localhost/gad/profile_images/".$profile_image;
	}

	$query = mysqli_query($con, "UPDATE users_tbl SET fname = '$fname', mname = '$mname', lname = '$lname', contact_number = '$contact_number', username = '$username', password = '$password', profile_image = '$url' WHERE user_id = '$user_id'");

	if ($query) {
		?>
		<script type="text/javascript">
			alert('Profile Updated');
			window.location.href='../../../views/admin/profile_view';
		</script>
		<?php
	}

	// $profile_image = mysqli_escape_string($con, $_REQUEST['profile_image']);
}elseif (isset($_REQUEST['btnAddGender'])) {
	$gender_name = $_REQUEST['gender_name'];
	$resGend = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM gender_tbl WHERE gender_name = '$gender_name'"));

	if ($resGend['gender_name'] != $gender_name) {
		$query = mysqli_query($con, "INSERT INTO gender_tbl (gender_name) VALUES ('$gender_name')");

		if ($query) {
			?>
			<script type="text/javascript">
				alert('New Gender Added');
				window.location.href='../../../views/admin/settings_view';
			</script>
			<?php
		}
	}else{
		?>
		<script type="text/javascript">
			alert('Gender Already Exist');
			window.location.href='../../../views/admin/settings_view';
		</script>
		<?php
	}
}elseif (isset($_REQUEST['btnAddRole'])) {
	$role_name = $_REQUEST['role_name'];
	$resGend = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM role_tbl WHERE role_name = '$role_name'"));

	if ($resGend['role_name'] != $role_name) {
		$query = mysqli_query($con, "INSERT INTO role_tbl (role_name) VALUES ('$role_name')");

		if ($query) {
			?>
			<script type="text/javascript">
				alert('New Role Added');
				window.location.href='../../../views/admin/settings_view';
			</script>
			<?php
		}
	}else{
		?>
		<script type="text/javascript">
			alert('Role Already Exist');
			window.location.href='../../../views/admin/settings_view';
		</script>
		<?php
	}
}elseif (isset($_REQUEST['btnEditGender'])) {
	$gender_id = $_REQUEST['gender_id'];
	$gender_name = $_REQUEST['gender_name'];

	$resGend = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM gender_tbl WHERE gender_name != '$gender_name' AND gender_id = '$gender_id'"));

	if ($resGend['gender_name'] != $gender_name) {
		
		$query = mysqli_query($con, "UPDATE gender_tbl SET gender_name = '$gender_name' WHERE gender_id = '$gender_id'");

		if ($query) {
			?>
			<script type="text/javascript">
				alert('Gender Edited');
				window.location.href='../../../views/admin/settings_view';
			</script>
			<?php
		}

	}

}elseif (isset($_REQUEST['btnEditRole'])) {
	$role_id = $_REQUEST['role_id'];
	$role_name = $_REQUEST['role_name'];

	$resRole = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM role_tbl WHERE role_name != '$role_name' AND role_id = '$role_id'"));

	if ($resRole['role_name'] != $role_name) {
		
		$query = mysqli_query($con, "UPDATE role_tbl SET role_name = '$role_name' WHERE role_id = '$role_id'");

		if ($query) {
			?>
			<script type="text/javascript">
				alert('Role Edited');
				window.location.href='../../../views/admin/settings_view';
			</script>
			<?php
		}

	}

}elseif (isset($_REQUEST['btnAddReport'])) {
	
	foreach ($_REQUEST['gender_id'] as $key => $value) {
			
		$no_attended = $_REQUEST['no_attended'][$key];
		$event_id = $_REQUEST['event_id'];
		$global_url = $_REQUEST['global_url'];
		//echo 'Attended '.$no_attended.' | Event ID '.$event_id.' | Gender '.$value.'<br>';

		$query = mysqli_query($con, "INSERT INTO reports_tbl (event_id, gender_id, no_attended) VALUES ('$event_id', '$value', '$no_attended')");

	}

	if ($query) {
		header('location: '.$global_url);
	}

}elseif (isset($_REQUEST['btnVerifyCoord'])) {
	$query = mysqli_query($con, "UPDATE coordinators_tbl SET account_status = '0' WHERE coordinator_id = '{$_REQUEST['c_id']}'");
	if ($query) {
		?>
		<script type="text/javascript">
			//alert('User Verified');
			window.location.href='../../../views/admin/pending_accounts_view';
		</script>
		<?php
	}
}elseif (isset($_REQUEST['btnAddSchool'])) {
	
	$school_name = mysqli_escape_string($con, $_REQUEST['school_name']);
	$school_abbreviation = mysqli_escape_string($con, $_REQUEST['school_abbreviation']);

	$resSchool = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM schools_tbl WHERE school_name = '$school_name' AND school_abbreviation = '$school_abbreviation'"));

	if ($resSchool['school_name'] != $school_name && $resSchool['school_abbreviation'] != $school_abbreviation) {
		
		$query = mysqli_query($con, "INSERT INTO schools_tbl (school_name, school_abbreviation) VALUES ('$school_name', '$school_abbreviation')");

		if ($query) {
			?>
			<script type="text/javascript">
				alert('School Added')
				window.location.href='../../../views/admin/settings_view';
			</script>
			<?php
		}

	}

}elseif (isset($_REQUEST['btnAddDepartment'])) {
	$school_id = mysqli_escape_string($con, $_REQUEST['school_id']);
	$department_name = mysqli_escape_string($con, $_REQUEST['department_name']);
	$department_abbreviation = mysqli_escape_string($con, $_REQUEST['department_abbreviation']);

	$resDep = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM departments_tbl WHERE department_name = '$department_name' AND department_abbreviation = '$department_abbreviation'"));

	if ($resDep['department_name'] != $department_name && $resDep['department_abbreviation'] != $department_abbreviation) {
		
		$query = mysqli_query($con, "INSERT INTO departments_tbl (department_name, department_abbreviation, school_id) VALUES ('$department_name', '$department_abbreviation', '$school_id')");

		if ($query) {
			?>
			<script type="text/javascript">
				alert('Department Added')
				window.location.href='../../../views/admin/settings_view';
			</script>
			<?php
		}

	}

}elseif (isset($_REQUEST['btnEditSchool'])) {
	$school_id = $_REQUEST['school_id'];
	$school_name = mysqli_escape_string($con, $_REQUEST['school_name']);
	$school_abbreviation = mysqli_escape_string($con, $_REQUEST['school_abbreviation']);

	$resSchool = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM schools_tbl WHERE school_name = '$school_name' AND school_abbreviation = '$school_abbreviation' AND school_id != '$school_id'"));

	if ($resSchool['school_name'] != $school_name && $resSchool['school_abbreviation'] != $school_abbreviation) {
		
		$query = mysqli_query($con, "UPDATE schools_tbl SET school_name = '$school_name', school_abbreviation = '$school_abbreviation' WHERE school_id = '$school_id'");

		if ($query) {
			?>
			<script type="text/javascript">
				alert('School Edited')
				window.location.href='../../../views/admin/settings_view';
			</script>
			<?php
		}

	}
}elseif (isset($_REQUEST['btnSaveTitle'])) {
	
	$query = mysqli_query($con, "UPDATE system_settings_tbl SET system_title = '{$_REQUEST['system_title']}'");

	if ($query) {
		header('location: ../../../views/admin/settings_view');
	}

}elseif (isset($_REQUEST['btnSaveLogo'])) {
	
	$system_logo = $_FILES['system_logo']['name'];
	$tmpName = $_FILES['system_logo']['tmp_name'];
	move_uploaded_file($tmpName, '../../../system_images/'.$system_logo);

	$url = "http://localhost/gad/system_images/".$system_logo;

	$query = mysqli_query($con, "UPDATE system_settings_tbl SET system_logo = '$url'");

	if ($query) {
		header('location: ../../../views/admin/settings_view');
	}

}
?>