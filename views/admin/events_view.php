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
	                    <h3 class="f_s_30 f_w_700 text_white">GAD EVENTS</h3>
	                    <ol class="breadcrumb page_bradcam mb-0">
	                    	<li class="breadcrumb-item"><a href="index">Dashboard </a></li>
	                    	<li class="breadcrumb-item active">Events</li>
	                    </ol>
	                </div>
	            	<a href="#" class="white_btn3" data-toggle="modal" data-target="#exampleModalCenter">Create New Event</a>
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
						
						$query = mysqli_query($con, "SELECT * FROM events_tbl WHERE archive_status = '1' ORDER BY event_id DESC");
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
								<th>Participants</th>
								<!-- <th>Role Scope</th> -->
								<th>Shool - Department</th>
								<th>Created By</th>
								<th>Date Created</th>
								<th>Status</th>
								<th>Action</th>
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
										<td style="font-size: 16px;">
											<?php
											if ($row['user_username'] != 'admin') {
												echo "N/A";
											}else{
												?>
												<!-- <a href="#" title="Edit Event" data-toggle="modal" data-target="#edit_event<?php echo $event_id; ?>"><span class="fa fa-edit"></span></a> |  --><a href="#" title="Archive Event" onclick="archiveEvent(<?php echo $event_id; ?>);"><span class="fa fa-archive"></span></a>
												<?php
											}
											?>
											<div class="modal fade" id="edit_event<?php echo $event_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
											  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
											    <div class="modal-content">
											    	<form action="../../controller/admin/process/save_data.php" method="POST">
											      <div class="modal-header">
											        <h5 class="modal-title" id="exampleModalLongTitle">Create Event Form</h5>
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											          <span aria-hidden="true">&times;</span>
											        </button>
											      </div>
											      <div class="modal-body">
											      	
												        <div class="row">
												        	<div class="col-md-6">
												        		<label>Event Title</label>
												        		<input type="text" name="event_title" class="form-control" required="" value="<?php echo $row['event_title']; ?>">
												        		<input type="hidden" name="event_id" value="<?php echo $event_id; ?>">
												        	</div>
												        	<div class="col-md-6">
												        		<label>Gender Scope</label>
												        		<select class="form-control" name="gender_scope" required="">
												        			<option value="<?php echo $row['gender_scope']; ?>"><?php echo $row['gender_scope']; ?></option>
												        			<option value="All">All</option>
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
												        </div>
												        <br>
												        <div class="row">
												        	<div class="col-md-3">
												        		<label>Role Scope</label>
												        		<select class="form-control" name="role_scope" required="">
												        			<option value="<?php echo $row['role_scope']; ?>"><?php echo $row['role_scope']; ?></option>
												        			<option value="All">All</option>
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
												        	<div class="col-md-3">
												        		<label>Event Date Start</label>
												        		<input type="date" name="event_date_start" class="form-control" required="" value="<?php echo $row['event_date_start']; ?>">
												        	</div>
												        	<div class="col-md-3">
												        		<label>Event Date End</label>
												        		<input type="date" name="event_date_end" class="form-control" value="<?php echo $row['event_date_end']; ?>">
												        	</div>
												        	<div class="col-md-3">
												        		<label>Event Time</label>
												        		<input type="time" name="event_time" class="form-control" required="" value="<?php echo $row['event_time']; ?>">
												        	</div>
												        </div>
												        <br>
												        <div class="row">
												        	<div class="col-md-12">
												        		<label>Event Description</label>
												        		<textarea class="form-control" name="event_description"><?php echo $row['event_description']; ?></textarea>
												        	</div>
												        </div>
												    
												      </div>
											      <div class="modal-footer">
											        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											        <input type="submit" name="btnEditEvent" value="Save" class="btn btn-primary">
											      </div>
											      </form>
											    </div>
											  </div>
											</div>
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

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
    	<form action="../../controller/admin/process/save_data.php" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Create Event Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	
	        <div class="row">
	        	<div class="col-md-6">
	        		<input type="hidden" name="user_username" value="<?php echo $username; ?>">
	        		<input type="hidden" name="global_url" value="<?php echo $url; ?>">
	        		<label>Event Title</label>
	        		<input type="text" name="event_title" class="form-control">
	        	</div>
	        	<div class="col-md-6">
	        		<label>Participants</label>
	        		<select class="form-control" name="gender_scope" required="">
	        			<option value="0">All Gender</option>
	        			<?php
	                      $qGend = mysqli_query($con, "SELECT * FROM gender_tbl");
	                      while ($rGend = mysqli_fetch_assoc($qGend)) {
	                        ?>
	                        <option value="<?php echo $rGend['gender_id']; ?>"><?php echo $rGend['gender_name']; ?></option>
	                        <?php
	                      }
	                      ?>
	        		</select>
	        	</div>
	        </div>
	        <br>
	        <div class="row">
	        	<div class="col-md-6">
	        		<label>School</label>
	        		<select class="form-control" name="school_id" required="" id="school_id">
	        			<option value="0">All School</option>
	        			<?php
	                      $qSchool = mysqli_query($con, "SELECT * FROM schools_tbl");
	                      while ($rSchool = mysqli_fetch_assoc($qSchool)) {
	                        ?>
	                        <option value="<?php echo $rSchool['school_id']; ?>"><?php echo $rSchool['school_abbreviation']; ?></option>
	                        <?php
	                      }
	                      ?>
	        		</select>
	        	</div>
	        	<div class="col-md-6">
	        		<label>Department</label>
	        		<select class="form-control" name="department_id" required="" id="department_id">
	        			<option value="0">All Department</option>
	        		</select>
	        	</div>
	        </div>
	        <br>
	        <div class="row">
	        	<div class="col-md-3">
	        		<label>Participants Category</label>
	        		<select class="form-control" name="role_scope" required="">
	        			<option value="0">All Role</option>
	                    <?php
	                      $qRole = mysqli_query($con, "SELECT * FROM role_tbl");
	                      while ($rRole = mysqli_fetch_assoc($qRole)) {
	                        ?>
	                        <option value="<?php echo $rRole['role_id']; ?>"><?php echo $rRole['role_name']; ?></option>
	                        <?php
	                      }
	                      ?>
	                </select>
	        	</div>
	        	<div class="col-md-3">
	        		<label>Event Date Start</label>
	        		<input type="date" name="event_date_start" class="form-control" required="">
	        	</div>
	        	<div class="col-md-3">
	        		<label>Event Date End</label>
	        		<input type="date" name="event_date_end" class="form-control">
	        	</div>
	        	<div class="col-md-3">
	        		<label>Event Time</label>
	        		<input type="time" name="event_time" class="form-control" required="">
	        	</div>
	        </div>
	        <br>
	        <div class="row">
	        	<div class="col-md-12">
	        		<label>Event Description</label>
	        		<textarea class="form-control" name="event_description"></textarea>
	        	</div>
	        </div>
	    
	      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="btnSaveEvent" value="Save" class="btn btn-primary">
      </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
	function archiveEvent(e_id) {
		if (confirm('Archive Event?')) {
			window.location.href='../../controller/admin/process/edit_data.php?e_id='+e_id+'&btnArchiveEvent=1&global_url=<?php echo $url; ?>';
		}
	}
</script>
<script type="text/javascript">
    $(document).ready(function () {
      $('#school_id').change(function () {
        var school_id = $('#school_id').val();
        $.ajax({
          url:'departments.php',
          method:'POST',
          data:{
            school_id:school_id
          },
          success:function (viewDep) {
            $('#department_id').html(viewDep);
          }
        });
      });
    })
  </script>
<?php include 'footer.php'; ?>