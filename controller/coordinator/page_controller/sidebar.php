<style type="text/css">
/*.sidebar.ps-theme-default, .header_class{
    background: #41eb68;
}

.sidebar .logo {
    margin: 30px;
    background: #41eb68;
    border-radius: 7px;
    padding-bottom: 20px;
}*/
</style>
<?php
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
<div class="logo d-flex justify-content-between header_class">
	<a href="index"><img src="../../system_images/sidebar_logo.png" alt=""></a>
	<div class="sidebar_close_icon d-lg-none">
		<i class="ti-close"></i>
	</div>
</div>
<ul id="sidebar_menu">
	<li class="mm-active">
		<a href="index">
		<div class="icon_menu">
			<span class="fa fa-home"></span>
		</div>
		<span>Dashboard</span>
		</a>
	</li>

	<li class="">
		<a  href="users_view">
		<div class="icon_menu">
			<!-- <img src="img/menu-icon/dashboard.svg" alt=""> -->
			<span class="fa fa-users"></span>
		</div>
		<span>Members</span>
		</a>
	</li>

	<li class="">
		<a href="#" aria-expanded="false">
			<div class="icon_menu">
				<span class="fa fa-calendar"></span>
			</div>
			<span>Events</span>
		</a>
		<ul class="mm-collapse">
			<li><a href="events_view">Active Events</a></li>
			<li><a href="events_archived_view">Archived Events</a></li>
		</ul>
	</li>

	<li class="">
		<a  href="pending_accounts_view">
		<div class="icon_menu">
			<span class="fa fa-user"></span>
		</div>
		<span>Pending Accounts</span>
		</a>
	</li>

	<!-- <li class="">
		<a class="has-arrow" href="statistics_view">
		<div class="icon_menu">
			<span class="fa fa-pie-chart"></span>
		</div>
		<span>Statistics</span>
		</a>
	</li> -->

</ul>
</nav>