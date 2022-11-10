<?php
include 'include/db.php';
error_reporting(0);
session_start();
$action_url = "../../controller/admin/process/";

$username = $_SESSION['username'];

$resSession = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM members_tbl WHERE username = '$username'"));

if ($resSession['username'] != $username) {
    $username = null;
    $username = '';
    session_destroy();
}

if (isset($_REQUEST['btnLogout'])) {
    $username = null;
    $username = '';
    session_destroy();

    $log_date = date('Y-m-d');
    $log_time = date('h:i a');

    $queryLog = mysqli_query($con, "INSERT INTO logs_tbl (member_id, action, log_date, log_time) VALUES ('{$resSession['member_id']}', 'Logged Out', '$log_date', '$log_time')");

    if ($queryLog) {
        header('location: ../gad');
    }
    
}
if (empty($username)) {
    //header('location: login_view');
    include 'login_view.php';
}else{
    include 'home_view.php';
}
?>
