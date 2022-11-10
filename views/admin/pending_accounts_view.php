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
								$query = mysqli_query($con, "SELECT * FROM coordinators_tbl WHERE fname LIKE '%$searchField%' AND account_status = '1' OR mname LIKE '%$searchField%' AND account_status = '1' OR lname LIKE '%$searchField%' AND account_status = '1' ");

								if ($rows = mysqli_num_rows($query) > 0) {
									
								}else{
									?>
									<div class="alert alert-warning">
										<label>Nothing Found.</label>
									</div>
									<?php
								}

							}else{
								$query = mysqli_query($con, "SELECT * FROM coordinators_tbl WHERE account_status = '1'");
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
							$query = mysqli_query($con, "SELECT * FROM coordinators_tbl WHERE account_status = '1'");
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
								<th>Contact Number</th>
								<th>Email</th>
								<th>School - Department</th>
								<th>Action</th>
							</thead>
							<tbody>
								<?php
								$i = 1;
								while ($row = mysqli_fetch_assoc($query)) {
									$resDepSc = mysqli_fetch_assoc(mysqli_query($con, "SELECT *, departments_tbl.department_name, departments_tbl.department_abbreviation, departments_tbl.school_id FROM schools_tbl INNER JOIN departments_tbl ON departments_tbl.school_id = schools_tbl.school_id WHERE schools_tbl.school_id = '{$row['school_id']}' "));
									?>
									<tr>
										<td><?php echo $i++; ?></td>
										<td><?php echo ucfirst($row['fname']); ?></td>
										<td><?php echo ucfirst($row['mname']); ?></td>
										<td><?php echo ucfirst($row['lname']); ?></td>
										<td><?php echo $row['contact_number']; ?></td>
										<td><?php echo $row['email']; ?></td>
										<td class="text-center"><?php echo $resDepSc['school_abbreviation'].' - '.$resDepSc['department_abbreviation']; ?></td>
										<td style="font-size: 16px;">
											<a href="#" onclick="verifyUser(<?php echo $row['coordinator_id']; ?>);" title="Verify User"><span class="fa fa-square-check"></span></a> | <a href="#" title="Deny User" onclick="denyUser(<?php echo $row['coordinator_id']; ?>);"><span class="fa fa-square-xmark alert-danger"></span></a>
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
	function verifyUser(c_id) {
		if (confirm('Verify User?')) {
			window.location.href='../../controller/admin/process/save_data.php?c_id='+c_id+'&btnVerifyCoord=1';
		}
	}
	function denyUser(c_id) {
		if (confirm('Deny User?')) {
			window.location.href='../../controller/admin/process/delete_data.php?c_id='+c_id+'&btnDenyCoord=1';
		}
	}
</script>
<?php include 'footer.php'; ?>