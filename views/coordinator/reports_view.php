<?php include 'header.php'; ?>
<form action="users_view" method="POST">
<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">

    <div class="row">
        <div class="col-12">
            <div class="page_title_box d-flex align-items-center justify-content-between">
                <div class="page_title_left">
                    <h3 class="f_s_30 f_w_700 text_white">Reports</h3>
                    <ol class="breadcrumb page_bradcam mb-0">
                    	<li class="breadcrumb-item"><a href="index">Dashboard </a></li>
	                    <li class="breadcrumb-item"><a href="javascript:void(0);">Reports </a></li>
                    </ol>
                </div>
            <a href="#" class="white_btn3">Print</a>
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
					<div class="row" action="users_view" method="POST">

						<div class="col-md-2">
							<input type="text" name="searchField" placeholder="Search" class="form-control">
						</div>

						<div class="col-md-2">
							<select class="form-control" name="gender">
								<option value="All">-All Gender-</option>
								<?php
			                      $qGend = mysqli_query($con, "SELECT * FROM gender_tbl");
			                      while ($rGend = mysqli_fetch_assoc($qGend)) {
			                        ?>
			                        <option value="<?php echo $rGend['gender_name']; ?>"><?php echo $rGend['gender_name']; ?></option>
			                        <?php
			                      }
			                      ?>
							</select>
						</div>
						<div class="col-md-2">
							<select class="form-control" name="sex">
								<option value="All">-All Sex-</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
						<div class="col-md-2">
							<select class="form-control" name="role">
								<option value="All">-All Role-</option>
								<?php
			                      $qRole = mysqli_query($con, "SELECT * FROM role_tbl");
			                      while ($rRole = mysqli_fetch_assoc($qRole)) {
			                        ?>
			                        <option value="<?php echo $rRole['role_name']; ?>"><?php echo $rRole['role_name']; ?></option>
			                        <?php
			                      }
			                      ?>
							</select>
						</div>

						<input type="submit" name="btnFilter" class="btn btn-info" value="Filter">&nbsp;
						<a href="" class="btn btn-primary">Refresh</a>
						<?php
						if (isset($_REQUEST['btnFilter'])) {
							$searchField = mysqli_escape_string($con, $_REQUEST['searchField']);
							$gender = mysqli_escape_string($con, $_REQUEST['gender']);
							$sex = mysqli_escape_string($con, $_REQUEST['sex']);
							$role = mysqli_escape_string($con, $_REQUEST['role']);

							if ($gender == 'All' && $sex == 'All' && $role == 'All') {
								$query = mysqli_query($con, "SELECT * FROM members_tbl WHERE account_status = '0'");
							
							}elseif ($gender == 'All' && $sex == 'All' && $role == 'All') {
								
								$query = mysqli_query($con, "SELECT * FROM members_tbl WHERE fname LIKE '%$searchField%' AND account_status = '0' OR mname LIKE '%$searchField%' AND account_status = '0' OR lname LIKE '%$searchField%' AND account_status = '0' ");

							}elseif ($gender != 'All' && $sex == 'All' && $role == 'All') {
								
								$query = mysqli_query($con, "SELECT * FROM members_tbl WHERE fname LIKE '%$searchField%' AND gender = '$gender' AND account_status = '0' OR mname LIKE '%$searchField%' AND gender = '$gender' AND account_status = '0' OR lname LIKE '%$searchField%' AND gender = '$gender' AND account_status = '0'");

							}elseif ($gender != 'All' && $sex != 'All' && $role == 'All') {
								
								$query = mysqli_query($con, "SELECT * FROM members_tbl WHERE fname LIKE '%$searchField%' AND sex_at_birth = '$sex' AND gender = '$gender' AND account_status = '0' OR mname LIKE '%$searchField%' AND sex_at_birth = '$sex' AND gender = '$gender' AND account_status = '0' OR lname LIKE '%$searchField%' AND sex_at_birth = '$sex' AND gender = '$gender' AND account_status = '0'");
							
							}elseif ($gender != 'All' && $sex != 'All' && $role != 'All') {
								
								$query = mysqli_query($con, "SELECT * FROM members_tbl WHERE fname LIKE '%$searchField%' AND role = '$role' AND sex_at_birth = '$sex' AND gender = '$gender' AND account_status = '0' OR mname LIKE '%$searchField%' AND role = '$role' AND sex_at_birth = '$sex' AND gender = '$gender' AND account_status = '0' OR lname LIKE '%$searchField%' AND role = '$role' AND sex_at_birth = '$sex' AND gender = '$gender' AND account_status = '0'");

							}elseif ($gender != 'All' && $sex == 'All' && $role == 'All') {
								$query = mysqli_query($con, "SELECT * FROM members_tbl WHERE gender = '$gender' AND account_status = '0'");
							}elseif ($gender == 'All' && $sex != 'All' && $role == 'All') {
								$query = mysqli_query($con, "SELECT * FROM members_tbl WHERE sex_at_birth = '$sex' AND account_status = '0'");
							}elseif ($gender == 'All' && $sex == 'All' && $role != 'All') {
								$query = mysqli_query($con, "SELECT * FROM members_tbl WHERE role = '$role' AND account_status = '0'");
							}

						}elseif(isset($_REQUEST['btnFilterMale'])){
							$query = mysqli_query($con, "SELECT * FROM members_tbl WHERE account_status = '0' AND sex_at_birth = 'Male'");
						}elseif (isset($_REQUEST['btnFilterFemale'])) {
							$query = mysqli_query($con, "SELECT * FROM members_tbl WHERE account_status = '0' AND sex_at_birth = 'Female'");
						} else{
							$query = mysqli_query($con, "SELECT * FROM members_tbl WHERE account_status = '0'");
						}
						?>
					</div>
					<br>
					<?php
					if ($rows = mysqli_num_rows($query) > 0) {
									
						}else{
							?>
							<div class="alert alert-warning">
								<label>No Data Available.</label>
							</div>
							<?php
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
								<th>Sex at Birth</th>
								<th>Gender</th>
								<th>Contact Number</th>
								<th>Email</th>
								<th>Role</th>
							</thead>
							<tbody>
								<?php
								$i = 1;
								while ($row = mysqli_fetch_assoc($query)) {
									?>
									<tr>
										<td><?php echo $i++; ?></td>
										<td><?php echo $row['fname']; ?></td>
										<td><?php echo $row['mname']; ?></td>
										<td><?php echo $row['lname']; ?></td>
										<td><?php echo $row['sex_at_birth']; ?></td>
										<td><?php echo $row['gender']; ?></td>
										<td><?php echo $row['contact_number']; ?></td>
										<td><?php echo $row['email']; ?></td>
										<td><?php echo $row['role']; ?></td>
									</tr>
									<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		</div>
	</div>
</div>
</form>
<?php include 'footer.php'; ?>