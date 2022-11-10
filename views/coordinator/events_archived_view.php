<?php include 'header.php'; ?>
<!-- <div class="main_content_iner ">
<div class="container-fluid p-0 ">
<div class="row "> -->
	<style type="text/css">
		.main_content .main_content_iners {
		    min-height: 68vh;
		    transition: .5s;
		    position: relative;
		    /*background: #f3f4f3;*/
		    margin: 0;
		    /*z-index: 22;*/
		    border-radius: 0;
		    padding: 30px;
		}

		.main_content .main_content_iners.overly_inners::before {
		    position: absolute;
		    left: 0;
		    top: 0;
		    right: 0;
		    height: 160px;
		    z-index: -1;
		    background: #64c5b1;
		    content: '';
		    border-radius: 0;
		    left: 0;
		}
	</style>
<div class="main_content_iners overly_inners ">
	<div class="container-fluid p-0 ">
		<div class="row">
	        <div class="col-12">
	            <div class="page_title_box d-flex align-items-center justify-content-between">
	                <div class="page_title_left">
	                    <h3 class="f_s_30 f_w_700 text_white">GAD ARCHIVED EVENTS</h3>
	                    <ol class="breadcrumb page_bradcam mb-0">
	                    	<li class="breadcrumb-item"><a href="index">Dashboard </a></li>
	                    	<li class="breadcrumb-item active">Archived Events</li>
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
					<div >
					<br>
					<?php
						
						$query = mysqli_query($con, "SELECT * FROM events_tbl WHERE archive_status = '0' AND school_id = '$my_school_id' AND department_id = '$my_department_id' ORDER BY event_id DESC");
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
								<th>Event Title</th>
								<th>Event Date & Time</th>
								<th>Description</th>
								<th>Gender Scope</th>
								<!-- <th>Role Scope</th> -->
								<th>School - Department</th>
								<th>Created By</th>
								<th>Date Created</th>
								<th>Status</th>
							</thead>
							<tbody>
								<?php
								$i = 1;
								while ($row = mysqli_fetch_assoc($query)) {
									$resUname = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM coordinators_tbl WHERE username = '{$row['user_username']}'"));
									$event_id = $row['event_id'];
									$end_date = "";
									if ($row['event_date_end'] == "N/A") {
										$end_date = "N/A";
									}else{
										$end_date = $row['event_date_end'];
									}
									$resGend = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM gender_tbl WHERE gender_id = '{$row['gender_scope']}'"));
									$resRole = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM role_tbl WHERE role_id = '{$row['role_scope']}'"));
									$resS = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM schools_tbl WHERE school_id = '{$row['school_id']}'"));
									$resD = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM departments_tbl WHERE department_id = '{$row['department_id']}'"));
									?>
									<tr>
										<td><?php echo $i++; ?></td>
										<td><?php echo $row['event_title']; ?></td>
										<td><?php echo date('F j, Y', strtotime($row['event_date_start'])); ?> To <?php if($end_date == 'N/A'){ echo "N/A"; }else{ echo date('F j, Y', strtotime($end_date)); } ?> @ <?php echo date('h:i a',strtotime($row['event_time'])); ?> </td>
										<td><?php echo $row['event_description']; ?></td>
										<td>
											<?php
											if ($row['gender_scope'] == '0') {
												echo "All Gender";
											}else{
												echo $resGend['gender_name'];
											}
											?>
										</td>
										<td>
											<?php
											if ($row['school_id'] == '0') {
												echo "All Shool/Department";
											}else{
												echo $resS['school_abbreviation'].' - '.$resD['department_abbreviation'];
											}
											?>
										</td>
										<td>
											<?php
											if ($row['user_username'] != 'admin') {
												echo $resUname['fname'].' '.$resUname['lname'];
											}else{
												echo "Administrator";
											}
											?>
										</td>
										<!-- <td>
											<?php
											// if ($row['role_scope'] == '0') {
											// 	echo "All Role";
											// }else{
											// 	echo $resRole['role_name'];
											// }
											?>
										</td> -->
										<td><?php echo date('F j, Y', strtotime($row['date_created'])); ?></td>
										<td>
											<?php
											if ($row['event_status'] == '1') {
												?>
												<span class="badge badge-success">Active Event</span>
												<?php
											}elseif ($row['event_status'] == '0') {
												?>
												<span class="badge badge-danger" title="Archive This Event">Inactive Event</span>
												<?php
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
</div>

<?php include 'footer.php'; ?>