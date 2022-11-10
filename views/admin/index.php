<?php include 'header.php';?>
<script type="text/javascript">
  $(document).ready(function () {
    $('#btnPrint').click(function () {
      printDiv();
    });

    function printDiv(){
        var printContents = document.getElementById("print_panel").innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
}
  });
</script>
<?php
    //$row30_50 = mysqli_fetch_assoc(mysqli_query($con, "SELECT age, SUM(IF(age BETWEEN 30 and 50,1,0)) as total_3 FROM patients_tbl WHERE MONTH(entry_date) = '$month' AND transfer_status != '1' "));
  //$query = mysqli_query($con, "SELECT *, SUM(no_attended) as total_attended FROM reports_tbl GROUP BY gender_id");
 $query = mysqli_query($con, "SELECT *, SUM(no_attended) as total_attended FROM reports_tbl WHERE gender_id = '14' OR gender_id = '15' GROUP BY gender_id");
 ?>



<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">

    <div class="row">
        <div class="col-12">
            <div class="page_title_box d-flex align-items-center justify-content-between">
                <div class="page_title_left">
                    <h3 class="f_s_30 f_w_700 text_white">Dashboard</h3>
                    <ol class="breadcrumb page_bradcam mb-0">
                    </ol>
                </div>
            <a href="#" class="white_btn3" id="btnPrint">Print</a>
            </div>
        </div>
    </div>
      <div class="row">
        <div class="col-md-6">
          <form action="reports_view.php" method="POST" class="x_panel" id="print_panel">

            <script type="text/javascript" src="assets/chart.js"></script>
            <script type="text/javascript">  
                       google.charts.load('current', {'packages':['corechart']});  
                       google.charts.setOnLoadCallback(drawChart);  
                       function drawChart()  
                       {  
                            var data = google.visualization.arrayToDataTable([  
                                      ['Age', 'Number'],  
                                      <?php
                                      // $row1 = "12-18 Y.O. Teenage Pregnancy";
                                      //$total = 0;
                                      while($row = mysqli_fetch_assoc($query))
                                      {
                                        $resGender = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM gender_tbl WHERE gender_id = '{$row['gender_id']}'"));
                                        //$total += $row['gender'];
                                         echo "['".$resGender["gender_name"]."', ".$row["total_attended"]."],";
                                      }  
                                      ?>  
                                 ]);  
                            var options = {
                                  //title: 'Percentage of Male and Female Employee',  
                                  //is3D:true,  
                                  //pieHole: 0.4  
                                   //pieSliceText: 'label', //Just Remove this if percentage lang
                                   colors: ['#699deb', '#f9b8de']
                                   // legend:{
                                   //  position: 'labeled'
                                   // },
                                 };  
                            var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                            chart.draw(data, options);  
                       } 
            </script>

            <div class="x_content" style="background: white;">
              <center>
                <br /><br/>
               <div >
                  <h3 >SEX Disaggregated Data</h3>
                    <br />  
                    <!-- <div id="piechart" style="width: 1920px; height: 600px;"></div>   -->
                    <div id="piechart" style="width: 480px; height: 600px;"></div>  
               </div>  
              </center>
              

            </div>
          </form>
        </div>
        <div class="col-md-6 card">
          <div>
            <br>
            <br>
            <center><h3>GAD Mission And Vision</h3></center>
          </div>

          <div class="">
            <h2>Mission</h2>
            <p>This is the Missiong of GAD</p>
          </div>
          <br><br>
          <div class="">
            <h2>Vision</h2>
            <p>This is the Vision of GAD</p>
          </div>
        </div>
      </div>
  </div>
</div>
<?php include 'footer.php'; ?>