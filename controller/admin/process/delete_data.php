<?php
include '../../../include/db.php';
if (isset($_REQUEST['btnDelEvent'])) {
	$query = mysqli_query($con, "DELETE FROM events_tbl WHERE event_id = '{$_REQUEST['e_id']}'");
	if ($query) {
		?>
		<script type="text/javascript">
			window.location.href='../../../views/admin/events_view';
		</script>
		<?php
	}
}elseif (isset($_REQUEST['btnDenyUser'])) {
	$resU = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM members_tbl WHERE member_id = '{$_REQUEST['m_id']}'"));


	$date_sent = date('Y-m-d');

	$sms_content = "Good day ".$resU['fname']." ".$resU['lname']." Your account has been denied.";

	$member_name = $resU['fname'].' '.$resU['lname'];

	$qSms = mysqli_query($con, "INSERT INTO sms_tbl (member_id, sms_content, contact_number, date_sent, sms_status, member_name) VALUES ('{$resU['member_id']}', '$sms_content', '{$resU['contact_number']}', '$date_sent', '1', '$member_name')");

	if ($qSms) {

		$query = mysqli_query($con, "DELETE FROM members_tbl WHERE member_id = '{$resU['member_id']}'");

		if ($query) {
			?>
		<script type="text/javascript">
			window.location.href='../../../views/admin/pending_accounts_view';
		</script>
		<?php
		}

		
	}

}elseif (isset($_REQUEST['btnDelGender'])) {
	$query = mysqli_query($con, "DELETE FROM gender_tbl WHERE gender_id = '{$_REQUEST['g_id']}'");
	if ($query) {
		?>
		<script type="text/javascript">
			window.location.href='../../../views/admin/settings_view';
		</script>
		<?php
	}
}elseif (isset($_REQUEST['btnDelRole'])) {
	$query = mysqli_query($con, "DELETE FROM role_tbl WHERE role_id = '{$_REQUEST['r_id']}'");
	if ($query) {
		?>
		<script type="text/javascript">
			window.location.href='../../../views/admin/settings_view';
		</script>
		<?php
	}
}elseif (isset($_REQUEST['btnDenyCoord'])) {
	$resU = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM coordinators_tbl WHERE coordinator_id = '{$_REQUEST['c_id']}'"));


	$date_sent = date('Y-m-d');

	$sms_content = "Good day ".$resU['fname']." ".$resU['lname']." Your account has been denied.";

	$member_name = $resU['fname'].' '.$resU['lname'];

	$qSms = mysqli_query($con, "INSERT INTO sms_tbl (sms_content, contact_number, date_sent, sms_status, member_name, send_by) VALUES ('$sms_content', '{$resU['contact_number']}', '$date_sent', '1', '$member_name', 'admin')");

	if ($qSms) {

		$query = mysqli_query($con, "DELETE FROM coordinators_tbl WHERE coordinator_id = '{$resU['coordinator_id']}'");

		if ($query) {
			?>
		<script type="text/javascript">
			window.location.href='../../../views/admin/pending_accounts_view';
		</script>
		<?php
		}

		
	}
}elseif (isset($_REQUEST['btnDelSchool'])) {
	$query = mysqli_query($con, "DELETE FROM schools_tbl WHERE school_id = '{$_REQUEST['s_id']}'");
	if ($query) {
			?>
		<script type="text/javascript">
			window.location.href='../../../views/admin/settings_view';
		</script>
		<?php
		}
}
?>