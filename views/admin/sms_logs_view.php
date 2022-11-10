<?php include 'header.php'; ?>
<!-- <script type="text/javascript" src="assets/jquery-3.4.1.min"></script> -->
<form action="users_view" method="POST">
<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">

    <div class="row">
        <div class="col-12">
            <div class="page_title_box d-flex align-items-center justify-content-between">
                <div class="page_title_left">
                    <h3 class="f_s_30 f_w_700 text_white">SMS</h3>
                    <ol class="breadcrumb page_bradcam mb-0">
                    	<li class="breadcrumb-item"><a href="index">Dashboard </a></li>
	                    <li class="breadcrumb-item"><a href="javascript:void(0);">SMS Logs </a></li>
                    </ol>
                </div>
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
					
					<br>
					<?php
					$query = mysqli_query($con, "SELECT * FROM sms_tbl WHERE sms_type = '0' ORDER BY sms_id DESC");
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
								<th>Send To</th>
								<th>SMS Content</th>
								<th>Send By</th>
								<th>SMS Status</th>
							</thead>
							<tbody>
								<?php
								$i = 1;
								while ($row = mysqli_fetch_assoc($query)) {
									$resUname = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM coordinators_tbl WHERE username = '{$row['send_by']}'"));
									?>
									<tr>
										<td><?php echo $i++; ?></td>
										<td><?php echo $row['member_name']; ?></td>
										<td><?php echo $row['sms_content']; ?></td>
										<td>
											<?php
											if ($row['send_by'] != 'admin') {
												echo $resUname['fname'].' '.$resUname['lname'];
											}else{
												echo "Administrator";
											}
											?>
										</td>
										<!-- <td><?php //echo date('F j, Y', strtotime($row['log_date'])); ?></td> -->
										<td>
											<?php
											if ($row['sms_status'] == '1') {
												echo "Sending";
											}elseif ($row['sms_status'] == '0') {
												echo "Sent";
											}
											?>
										</td>
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