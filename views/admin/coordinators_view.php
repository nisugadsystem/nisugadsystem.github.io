<?php include 'header.php'; ?>
<script type="text/javascript">
  $(document).ready(function () {
    $('#btnPrint').click(function () {
      printDiv();
    });

    function printDiv(){
    	$('#title_table').show();
        var printContents = document.getElementById("print_panel").innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
}
  });
</script>
<form action="coordinators_view" method="POST">
<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">

    <div class="row">
        <div class="col-12">
            <div class="page_title_box d-flex align-items-center justify-content-between">
                <div class="page_title_left">
                    <h3 class="f_s_30 f_w_700 text_white">Coordinators</h3>
                    <ol class="breadcrumb page_bradcam mb-0">
                    	<li class="breadcrumb-item"><a href="index">Dashboard </a></li>
	                    <li class="breadcrumb-item"><a href="javascript:void(0);">Coordinator Records </a></li>
                    </ol>
                </div>
            <a href="#" class="white_btn3" id="btnPrint">Print</a>
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
					<div class="row">

						<div class="col-md-3">
							<input type="text" name="searchField" placeholder="Search" class="form-control">
						</div>

						<input type="submit" name="btnFilter" class="btn btn-info" value="Search">&nbsp;
						<a href="" class="btn btn-primary">Refresh</a> &nbsp;
						<?php
						if (isset($_REQUEST['btnFilter'])) {
							$searchField = $_REQUEST['searchField'];
							$query = mysqli_query($con, "SELECT * FROM coordinators_tbl WHERE fname LIKE '%$searchField%' AND account_status = '0' OR mname LIKE '%$searchField%' AND account_status = '0' OR lname LIKE '%$searchField%' AND account_status = '0'");
						}else{
							$query = mysqli_query($con, "SELECT * FROM coordinators_tbl WHERE account_status = '0' ORDER BY lname ASC");
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
					<div class="table-responsive" id="print_panel">
						<center><h3 style="display: none;" id="title_table">Coordinator Records</h3></center>
						<br>
						<table class="table table-bordered">
							<thead>
								<th>#</th>
								<th>First Name</th>
								<th>Middle Name</th>
								<th>Last Name</th>
								<th>Contact Number</th>
								<th>Email</th>
								<th>School & Department</th>
							</thead>
							<tbody>
								<?php
								$i = 1;
								while ($row = mysqli_fetch_assoc($query)) {
									$resSchool = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM schools_tbl WHERE school_id = '{$row['school_id']}'"));
									$resDep = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM departments_tbl WHERE department_id = '{$row['department_id']}'"));
									?>
									<tr>
										<td><?php echo $i++; ?></td>
										<td><a href="user_profile_view?m_id=<?php echo $row['member_id']; ?>"><?php echo ucfirst($row['fname']); ?></a></td>
										<td><?php echo ucfirst($row['mname']); ?></td>
										<td><?php echo ucfirst($row['lname']); ?></td>
										<td><?php echo $row['contact_number']; ?></td>
										<td><?php echo $row['email']; ?></td>
										<td><?php echo $resSchool['school_abbreviation'].' - '.$resDep['department_abbreviation']; ?></td>
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