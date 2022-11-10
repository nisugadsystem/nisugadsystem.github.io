<?php
date_default_timezone_set('ASIA/Manila');
$con = mysqli_connect("localhost", "root", "", "gad");

$date_nows = date('Y-m-d');

$resEvents = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM events_tbl ORDER BY event_id ASC"));

$resQ = mysqli_query($con, "SELECT * FROM events_tbl WHERE event_date_start < '$date_nows' AND event_date_end = 'N/A' || event_date_end < '$date_nows' AND event_date_end != 'N/A'");

while ($rQ = mysqli_fetch_assoc($resQ)) {
	$qEv = mysqli_query($con, "UPDATE events_tbl SET event_status = '0' WHERE event_id = '{$rQ['event_id']}'");
}

// if ($resEvents['event_date_end'] != 'N/A') {
	
// 	if ($resEvents['event_date_end'] < $date_nows) {
		
// 		$qEv = mysqli_query($con, "UPDATE events_tbl SET event_status = '0' WHERE event_id = '{$resEvents['event_id']}'");

// 	}

// }else{
// 	if ($resEvents['event_date_start'] < $date_nows) {
		
// 		$qEv = mysqli_query($con, "UPDATE events_tbl SET event_status = '0' WHERE event_id = '{$resEvents['event_id']}'");

// 	}
// }

?>