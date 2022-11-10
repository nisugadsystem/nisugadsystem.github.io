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
<form action="reports_view" method="POST">
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
							<select class="form-control" name="month">
								<option value="All">-All Month-</option>
						        <option value="1">January</option>
						        <option value="2">February</option>
						        <option value="3">March</option>
						        <option value="4">April</option>
						        <option value="5">May</option>
						        <option value="6">June</option>
						        <option value="7">July</option>
						        <option value="8">August</option>
						        <option value="9">September</option>
						        <option value="10">October</option>
						        <option value="11">November</option>
						        <option value="12">December</option>
							</select>
						</div>
						<div class="col-md-3">
							<select class="form-control" name="year">
								<option value="All">-All Year-</option>
							      <?php
							      $year_now = date('Y');
							      $add_year = $year_now+20;
							      for ($i=$year_now; $i < $add_year; $i++) { 
							        ?>
							        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
							        <?php
							      }
							      ?>
							</select>
						</div>

						<input type="submit" name="btnFilter" class="btn btn-info" value="Filter">&nbsp;
						<a href="" class="btn btn-primary">Refresh</a>
						<?php
						if (isset($_REQUEST['btnFilter'])) {

							$MONTH = $_REQUEST['month'];
							$YEAR = $_REQUEST['year'];

							if ($MONTH == 'All' && $YEAR == 'All') {
								
								$query = mysqli_query($con, "SELECT *, events_tbl.event_id, events_tbl.event_date_start, events_tbl.event_time, events_tbl.date_created, events_tbl.event_title, events_tbl.event_date_end FROM reports_tbl INNER JOIN events_tbl ON events_tbl.event_id = reports_tbl.event_id GROUP BY reports_tbl.event_id");

							}elseif ($MONTH != 'All' && $YEAR == 'All') {
								
								$query = mysqli_query($con, "SELECT *, events_tbl.event_id, events_tbl.event_date_start, events_tbl.event_time, events_tbl.date_created, events_tbl.event_title, events_tbl.event_date_end FROM reports_tbl INNER JOIN events_tbl ON events_tbl.event_id = reports_tbl.event_id WHERE MONTH(events_tbl.date_created) = '$MONTH'GROUP BY reports_tbl.event_id");

							}elseif ($MONTH == 'All' && $YEAR != 'All') {
								
								$query = mysqli_query($con, "SELECT *, events_tbl.event_id, events_tbl.event_date_start, events_tbl.event_time, events_tbl.date_created, events_tbl.event_title, events_tbl.event_date_end FROM reports_tbl INNER JOIN events_tbl ON events_tbl.event_id = reports_tbl.event_id WHERE YEAR(events_tbl.date_created) = '$YEAR' GROUP BY reports_tbl.event_id");

							}elseif ($MONTH != 'All' && $YEAR != 'All') {
								
								$query = mysqli_query($con, "SELECT *, events_tbl.event_id, events_tbl.event_date_start, events_tbl.event_time, events_tbl.date_created, events_tbl.event_title, events_tbl.event_date_end FROM reports_tbl INNER JOIN events_tbl ON events_tbl.event_id = reports_tbl.event_id WHERE MONTH(events_tbl.date_created) = '$MONTH' AND YEAR(events_tbl.date_created) = '$YEAR' GROUP BY reports_tbl.event_id");

							}

						} else{
							$query = mysqli_query($con, "SELECT *, events_tbl.event_id, events_tbl.event_date_start, events_tbl.event_time, events_tbl.date_created, events_tbl.event_title, events_tbl.event_date_end FROM reports_tbl INNER JOIN events_tbl ON events_tbl.event_id = reports_tbl.event_id GROUP BY reports_tbl.event_id");
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
					<div class="" id="print_panel">
						<center><h3 style="display: none;" id="title_table">Reports of <?php
							if($_REQUEST['month'] != 'All' && $_REQUEST['year'] == 'All'){
								//echo 'of '.date('F', strtotime($_REQUEST['month']));
								$months = $_REQUEST['month'];
								if ($months == '1') {
									echo "January";
								}elseif ($months == '2') {
									echo "February";
								}elseif ($months == '3') {
									echo "March";
								}elseif ($months == '4') {
									echo "April";
								}elseif ($months == '5') {
									echo "May";
								}elseif ($months == '6') {
									echo "June";
								}elseif ($months == '7') {
									echo "July";
								}elseif ($months == '8') {
									echo "August";
								}elseif ($months == '9') {
									echo "September";
								}elseif ($months == '10') {
									echo "October";
								}elseif ($months == '11') {
									echo "November";
								}elseif ($months == '12') {
									echo "December";
								}
						}elseif ($_REQUEST['month'] == 'All' && $_REQUEST['year'] != 'All') {
							echo 'of '.$_REQUEST['year'];
						}elseif ($_REQUEST['month'] != 'All' && $_REQUEST['year'] != 'All') {
							echo 'of '.date('F', strtotime($_REQUEST['month'])).' '.$_REQUEST['year'];
						}
					?><br></h3></center>
						
					<div class="">
						<label><b>Total: <?php echo mysqli_num_rows($query); ?></b></label>
					</div>
					<br>
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<th class="text-center">Event Title</th>
								<th class="text-center">Event Date & Time</th>
								<th class="text-center">Date Created</th>
								<th class="text-center">Genders</th>
								<th class="text-center">Total Attended</th>
							</thead>
							<tbody>
								<?php
								$i = 1;
								while ($row = mysqli_fetch_assoc($query)) {
									$end_date = "";
									if ($row['event_date_end'] == "N/A") {
										$end_date = "N/A";
									}else{
										$end_date = $row['event_date_end'];
									}
									?>
									<tr>
										<td class="text-center"><?php echo $row['event_title']; ?></td>
										<td class="text-center"><?php echo date('F j, Y', strtotime($row['event_date_start'])); ?> To <?php if($end_date == 'N/A'){ echo "N/A"; }else{ echo date('F j, Y', strtotime($end_date)); } ?> @ <?php echo date('h:i a',strtotime($row['event_time'])); ?> </td>
										<td class="text-center"><?php echo $row['date_created']; ?></td>
										<td class="text-center">
											<?php
											$qG = mysqli_query($con, "SELECT * FROM reports_tbl WHERE event_id = '{$row['event_id']}'");
											while ($rG = mysqli_fetch_assoc($qG)) {
												$gName = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM gender_tbl WHERE gender_id = '{$rG['gender_id']}'"));
												$total_attended  = mysqli_fetch_assoc(mysqli_query($con, "SELECT *, SUM(no_attended) as total_attended FROM reports_tbl WHERE event_id = '{$rG['event_id']}'"));
												?>
												<label><?php echo $gName['gender_name']; ?>: <b><?php echo $rG['no_attended']; ?></b> </label>
												<?php
											}
											?>
										</td>
										<td class="text-center"><b><?php echo $total_attended['total_attended']; ?></b></td>
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
</form>
<?php include 'footer.php'; ?>