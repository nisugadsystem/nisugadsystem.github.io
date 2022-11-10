<?php include 'header.php'; ?>

<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">

    <div class="row">
        <div class="col-12">
            <div class="page_title_box d-flex align-items-center justify-content-between">
                <div class="page_title_left">
                    <h3 class="f_s_30 f_w_700 text_white">Pending Accounts</h3>
                    <ol class="breadcrumb page_bradcam mb-0">
                    <li class="breadcrumb-item"><a href="index">Dashboard </a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Pending</a></li>
                    </ol>
                </div>
            <!-- <a href="#" class="white_btn3">Create Report</a> -->
            </div>
        </div>
    </div>
    <div class="row ">

		<div class="col-lg-12">
			<div class="white_card card_height_100 mb_30">
				<div class="white_card_header">
					<div class="box_header m-0">
						<!-- <div class="main-title">
							
						</div> -->
					</div>
				</div>
				<div class="white_card_body">
					<form action="pending_accounts_view" method="POST">
					<div class="row">

						<div class="col-md-2">
							<input type="text" name="searchField" placeholder="Search" class="form-control">
						</div>

						<input type="submit" name="btnFilter" class="btn btn-info" value="Filter">&nbsp;
						<a href="" class="btn btn-primary">Refresh</a>
						
					</div>
					<br>
					<?php
						if (isset($_REQUEST['btnFilter'])) {
							$searchField = mysqli_escape_string($con, $_REQUEST['searchField']);

							if ($searchField != '') {
								$query = mysqli_query($con, "SELECT * FROM members_tbl WHERE fname LIKE '%$searchField%' AND account_status = '1' AND school_id = '$my_school_id' AND department_id = '$my_department_id' OR mname LIKE '%$searchField%' AND account_status = '1' AND school_id = '$my_school_id' AND department_id = '$my_department_id' OR lname LIKE '%$searchField%' AND account_status = '1' AND school_id = '$my_school_id' AND department_id = '$my_department_id' ");

								if ($rows = mysqli_num_rows($query) > 0) {
									
								}else{
									?>
									<div class="alert alert-warning">
										<label>Nothing Found.</label>
									</div>
									<?php
								}

							}else{
								$query = mysqli_query($con, "SELECT * FROM members_tbl WHERE account_status = '1' AND school_id = '$my_school_id' AND department_id = '$my_department_id'");
								if ($rows = mysqli_num_rows($query) > 0) {
									
								}else{
									?>
									<div class="alert alert-warning">
										<label>No Data Available.</label>
									</div>
									<?php
								}
							}

						}else{
							$query = mysqli_query($con, "SELECT * FROM members_tbl WHERE account_status = '1' AND school_id = '$my_school_id' AND department_id = '$my_department_id'");
							if ($rows = mysqli_num_rows($query) > 0) {
									
								}else{
									?>
									<div class="alert alert-warning">
										<label>No Data Available.</label>
									</div>
									<?php
								}
						}
						?>
					<div class="">
						<label><b>Total: <?php echo mysqli_num_rows($query); ?></b></label>
					</div>
					<br>
					
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<th>#</th>
								<th>First Name</th>
								<th>Middle Name</th>
								<th>Last Name</th>
								<th>Gender</th>
								<th>Contact Number</th>
								<th>Email</th>
								<th>Role</th>
								<th>School & Department</th>
								<th>Action</th>
							</thead>
							<tbody>
								<?php
								$i = 1;
								while ($row = mysqli_fetch_assoc($query)) {
									$resGen = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM gender_tbl WHERE gender_id = '{$row['gender']}'"));
									$resRole = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM role_tbl WHERE role_id = '{$row['role']}'"));

									$resSchool = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM schools_tbl WHERE school_id = '{$row['school_id']}'"));
									$resDep = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM departments_tbl WHERE department_id = '{$row['department_id']}'"));
									?>
									<tr>
										<td><?php echo $i++; ?></td>
										<td><?php echo ucfirst($row['fname']); ?></td>
										<td><?php echo ucfirst($row['mname']); ?></td>
										<td><?php echo ucfirst($row['lname']); ?></td>
										<td><?php echo $resGen['gender_name']; ?></td>
										<td><?php echo $row['contact_number']; ?></td>
										<td><?php echo $row['email']; ?></td>
										<td><?php echo $resRole['role_name']; ?></td>
										<td><?php echo $resSchool['school_abbreviation'].' - '.$resDep['department_abbreviation']; ?></td>
										<td style="font-size: 16px;">
											<a href="#" onclick="verifyUser(<?php echo $row['member_id']; ?>);" title="Verify User"><span class="fa fa-square-check"></span></a> | <a href="#" title="Deny User" onclick="denyUser(<?php echo $row['member_id']; ?>);"><span class="fa fa-square-xmark alert-danger"></span></a>
										</td>
									</tr>
									<?php
								}
								?>
							</tbody>
						</table>
					</div>
					</form>
				</div>
			</div>
		</div>

		</div>
	</div>
</div>
<script type="text/javascript">
	function verifyUser(m_id) {
		if (confirm('Verify User?')) {
			window.location.href='<?php echo $action_url; ?>save_data.php?m_id='+m_id+'&btnVerify=1';
		}
	}
	function denyUser(m_id) {
		if (confirm('Deny User?')) {
			window.location.href='<?php echo $action_url; ?>delete_data.php?m_id='+m_id+'&btnDenyUser=1';
		}
	}
</script>
<?php include 'footer.php'; ?>