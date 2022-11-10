<?php include 'header.php'; ?>
<!-- <script type="text/javascript" src="assets/jquery-3.4.1.min"></script> -->

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
                    <h3 class="f_s_30 f_w_700 text_white">Settings</h3>
                    <ol class="breadcrumb page_bradcam mb-0">
                    	<li class="breadcrumb-item"><a href="index">Dashboard </a></li>
	                    <li class="breadcrumb-item"><a href="javascript:void(0);">System Settings </a></li>
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
					<div class="row">
						<div class="table-responsive col-md-4">
							<div class="row">
								<div class="col-md-6">
									<label><b>Gender</b></label>
								</div>
								<div class="col-md-6">
									<a href="#" class="btn btn-info btn-sm" style="float: right;" data-toggle="modal" data-target="#add_gender_modal">Add</a>
								</div>
							</div>
							<br>
							<table class="table table-bordered">
								<thead>
									<th>#</th>
									<th>Gender</th>
									<th>Action</th>
								</thead>
								<tbody>
									<?php
									$query = mysqli_query($con, "SELECT * FROM gender_tbl");
									$i = 1;
									while ($row = mysqli_fetch_assoc($query)) {
										?>
										<tr>
											<td><?php echo $i++; ?></td>
											<td><?php echo $row['gender_name']; ?></td>
											<td><a href="#" data-toggle="modal" data-target="#edit_gender_modal<?php echo $row['gender_id']; ?>"><span class="fa fa-edit"></span></a>
												<div class="modal fade" id="edit_gender_modal<?php echo $row['gender_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
												  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
												    <div class="modal-content">
												    <form action="<?php echo $action_url; ?>save_data.php" method="POST">
												      <div class="modal-header">
												        <h5 class="modal-title" id="exampleModalLongTitle">Edit Gender</h5>
												        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
												          <span aria-hidden="true">&times;</span>
												        </button>
												      </div>
												      <div class="modal-body">
												      	
													        <div class="row">
													        	<div class="col-md-12">
													        		<label>Gender Name</label>
													        		<input type="hidden" name="gender_id" value="<?php echo $row['gender_id']; ?>">
													        		<input type="text" name="gender_name" class="form-control" required="" value="<?php echo $row['gender_name']; ?>">
													        	</div>
													        </div>
													    
													  </div>
												      <div class="modal-footer">
												        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												        <input type="submit" name="btnEditGender" value="Save" class="btn btn-primary">
												      </div>
												      </form>
												    </div>
												  </div>
												</div>
											 | <a href="#" onclick="deleteGender(<?php echo $row['gender_id']; ?>);"><span class="fa fa-trash"></span></a></td>
										</tr>
										<?php
									}
									?>
								</tbody>
							</table>
						</div>

						<div class="table-responsive col-md-4">
							<div class="row">
								<div class="col-md-6">
									<label><b>Role</b></label>
								</div>
								<div class="col-md-6">
									<a href="#" class="btn btn-info btn-sm" style="float: right;" data-toggle="modal" data-target="#add_role_modal">Add</a>
								</div>
							</div>
							<br>
							<table class="table table-bordered">
								<thead>
									<th>#</th>
									<th>Role</th>
									<th>Action</th>
								</thead>
								<tbody>
									<?php
									$query2 = mysqli_query($con, "SELECT * FROM role_tbl");
									$j = 1;
									while ($row2 = mysqli_fetch_assoc($query2)) {
										?>
										<tr>
											<td><?php echo $j++; ?></td>
											<td><?php echo $row2['role_name']; ?></td>
											<td><a href="#" data-toggle="modal" data-target="#edit_role_modal<?php echo $row2['role_id']; ?>"><span class="fa fa-edit"></span></a>
												<div class="modal fade" id="edit_role_modal<?php echo $row2['role_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
												  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
												    <div class="modal-content">
												    <form action="<?php echo $action_url; ?>save_data.php" method="POST">
												      <div class="modal-header">
												        <h5 class="modal-title" id="exampleModalLongTitle">Edit Role</h5>
												        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
												          <span aria-hidden="true">&times;</span>
												        </button>
												      </div>
												      <div class="modal-body">
												      	
													        <div class="row">
													        	<div class="col-md-12">
													        		<label>Role Name</label>
													        		<input type="hidden" name="role_id" value="<?php echo $row2['role_id']; ?>">
													        		<input type="text" name="role_name" class="form-control" required="" value="<?php echo $row2['role_name']; ?>">
													        	</div>
													        </div>
													    
													  </div>
												      <div class="modal-footer">
												        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												        <input type="submit" name="btnEditRole" value="Save" class="btn btn-primary">
												      </div>
												      </form>
												    </div>
												  </div>
												</div>
											 | <a href="#" onclick="deleteRole(<?php echo $row2['role_id']; ?>);"><span class="fa fa-trash"></span></a></td>
										</tr>
										<?php
									}
									?>
								</tbody>
							</table>
						</div>

						<div class="table-responsive col-md-4">
							<div class="row">
								<div class="col-md-6">
									<label><b>Schools</b></label>
								</div>
								<div class="col-md-6">
									<a href="#" class="btn btn-info btn-sm" style="float: right;" data-toggle="modal" data-target="#add_school_modal">Add</a>
								</div>
							</div>
							<br>
							<table class="table table-bordered">
								<thead>
									<th>#</th>
									<th>School Name</th>
									<th class="text-center">Departments</th>
									<th>Action</th>
								</thead>
								<tbody>
									<?php
									$query3 = mysqli_query($con, "SELECT * FROM schools_tbl");
									$j = 1;
									while ($row3 = mysqli_fetch_assoc($query3)) {
										?>
										<tr>
											<td><?php echo $j++; ?></td>
											<td><?php echo $row3['school_name'].' (<b>'.$row3['school_abbreviation'].')</b>'; ?></td>
											<td class="text-center">
												<a href="#" data-toggle="modal" data-target="#view_department_modal<?php echo $row3['school_id']; ?>">View</a>
												<div class="modal fade" id="view_department_modal<?php echo $row3['school_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
												  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
												    <div class="modal-content">
												    <form action="<?php echo $action_url; ?>save_data.php" method="POST">
												      <div class="modal-header">
												        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $row3['school_abbreviation']; ?> Departments</h5>
												        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
												          <span aria-hidden="true">&times;</span>
												        </button>
												      </div>
												      <div class="modal-body">
												      	<a href="#" class="btn btn-info btn-sm" style="float: right;" data-toggle="modal" data-target="#add_department_modal<?php echo $row3['school_id']; ?>">Add</a>
												      	<div class="modal fade" id="add_department_modal<?php echo $row3['school_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
														  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
														    <div class="modal-content">
														    <form action="<?php echo $action_url; ?>save_data.php" method="POST">
														      <div class="modal-header">
														        <h5 class="modal-title" id="exampleModalLongTitle">Add Department for <?php echo $row3['school_abbreviation']; ?></h5>
														        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
														          <span aria-hidden="true">&times;</span>
														        </button>
														      </div>
														      <div class="modal-body">
														      	
															        <div class="row">
															        	<div class="col-md-12">
															        		<label>Department Name</label>
															        		<input type="hidden" name="school_id" value="<?php echo $row3['school_id']; ?>">
															        		<input type="text" name="department_name" class="form-control" required="" >
															        	</div>
															        	<div class="col-md-12">
															        		<label>Department Abbreviation</label>
															        		<input type="text" name="department_abbreviation" class="form-control" required="" >
															        	</div>
															        </div>
															    
															  </div>
														      <div class="modal-footer">
														        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														        <input type="submit" name="btnAddDepartment" value="Save" class="btn btn-primary">
														      </div>
														      </form>
														    </div>
														  </div>
														</div>

												      	<br><br>
												      	<table class="table table-bordered">
												      		<tr>
												      			<th>Department Name</th>
												      			<th>Department Abbr</th>
												      		</tr>
												      		<?php
												      		$qD = mysqli_query($con, "SELECT * FROM departments_tbl WHERE school_id = '{$row3['school_id']}'");
												      		while ($rD = mysqli_fetch_assoc($qD)) {
												      			?>
												      			<tr>
												      				<td><?php echo $rD['department_name']; ?></td>
												      				<td><?php echo $rD['department_abbreviation']; ?></td>
												      			</tr>
												      			<?php
												      		}
												      		?>
												      	</table>
													  </div>
												      </form>
												    </div>
												  </div>
												</div>
											</td>

											<td><a href="#" data-toggle="modal" data-target="#edit_school_modal<?php echo $row3['school_id']; ?>"><span class="fa fa-edit"></span></a>
												<div class="modal fade" id="edit_school_modal<?php echo $row3['school_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
												  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
												    <div class="modal-content">
												    <form action="<?php echo $action_url; ?>save_data.php" method="POST">
												      <div class="modal-header">
												        <h5 class="modal-title" id="exampleModalLongTitle">Edit School</h5>
												        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
												          <span aria-hidden="true">&times;</span>
												        </button>
												      </div>
												      <div class="modal-body">
												      	
													        <div class="row">
													        	<div class="col-md-12">
													        		<label>School Name</label>
													        		<input type="hidden" name="school_id" value="<?php echo $row3['school_id']; ?>">
													        		<input type="text" name="school_name" class="form-control" required="" value="<?php echo $row3['school_name']; ?>">
													        	</div>
													        	<div class="col-md-12">
													        		<label>School Abbreviation</label>
													        		<input type="text" name="school_abbreviation" class="form-control" required="" value="<?php echo $row3['school_abbreviation']; ?>">
													        	</div>
													        </div>
													    
													  </div>
												      <div class="modal-footer">
												        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												        <input type="submit" name="btnEditSchool" value="Save" class="btn btn-primary">
												      </div>
												      </form>
												    </div>
												  </div>
												</div>
											 | <a href="#" onclick="deleteSchool(<?php echo $row3['school_id']; ?>);"><span class="fa fa-trash"></span></a></td>
										</tr>
										<?php
									}
									?>
								</tbody>
							</table>
						</div>

					</div>
					<hr>
					<div class="row">
							<form action="../../controller/admin/process/save_data.php" method="POST" enctype="multipart/form-data">
								<div class="row col-md-12">
									<label>System Logo</label>
									<input type="file" name="system_logo" class="form-control">
									<br><br>
									<input type="submit" name="btnSaveLogo" class="bnt btn-primary" value="Udapte">
								</div>
							</form>
							<form action="../../controller/admin/process/save_data.php" method="POST">
								<div class="row col-md-12">
									<label>System Title</label>
									<?php
									$resSys = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM system_settings_tbl"));
									?>
									<input type="text" name="system_title" class="form-control" value="<?php echo $resSys['system_title']; ?>">
									<br><br>
									<input type="submit" name="btnSaveTitle" class="bnt btn-primary" value="Update">
								</div>
							</form>
					</div>
					
				</div>
			</div>
		</div>

		</div>
	</div>
</div>

<div class="modal fade" id="add_gender_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
    <form action="<?php echo $action_url; ?>save_data.php" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">New Gender</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	
	        <div class="row">
	        	<div class="col-md-12">
	        		<label>Gender Name</label>
	        		<input type="text" name="gender_name" class="form-control" required="">
	        	</div>
	        </div>
	    
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="btnAddGender" value="Save" class="btn btn-primary">
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="add_role_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
    <form action="<?php echo $action_url; ?>save_data.php" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">New Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	
	        <div class="row">
	        	<div class="col-md-12">
	        		<label>Role Name</label>
	        		<input type="text" name="role_name" class="form-control" required="">
	        	</div>
	        </div>
	    
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="btnAddRole" value="Save" class="btn btn-primary">
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="add_school_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
    <form action="<?php echo $action_url; ?>save_data.php" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">New School</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	
        <div class="row">
        	<div class="col-md-12">
        		<label>School Name</label>
        		<input type="text" name="school_name" class="form-control" required="">
        	</div>
        	<div class="col-md-12">
        		<label>School Abbreviation</label>
        		<input type="text" name="school_abbreviation" class="form-control" required="">
        	</div>
        </div>
	    
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="btnAddSchool" value="Save" class="btn btn-primary">
      </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
	function deleteGender(g_id) {
		if (confirm('Delete Record?')) {
			window.location.href='../../controller/admin/process/delete_data.php?g_id='+g_id+'&btnDelGender=1';
		}
	}

	function deleteRole(r_id) {
		if (confirm('Delete Record?')) {
			window.location.href='../../controller/admin/process/delete_data.php?r_id='+r_id+'&btnDelRole=1';
		}
	}

	function deleteSchool(s_id) {
		if (confirm('Delete Record?')) {
			window.location.href='../../controller/admin/process/delete_data.php?s_id='+s_id+'&btnDelSchool=1';
		}
	}
</script>
<?php include 'footer.php'; ?>