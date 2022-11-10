<?php include '../../controller/admin/page_controller/account_controller.php'; ?>
<!DOCTYPE html>
<html lang="en">
 
<head>
    <?php include '../../controller/admin/page_controller/head.php'; ?>
</head>

<body>
    <?php include '../../controller/admin/page_controller/page_loader.php'; ?>
    <div id="pcoded" class="pcoded">
      <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">
          
          <?php include '../../controller/admin/page_controller/page_header.php'; ?>

          <div class="pcoded-main-container">
              <div class="pcoded-wrapper">
                  <?php include '../../controller/admin/page_controller/navigation.php'; ?>
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <?php include '../../controller/admin/page_controller/page_titles.php'; ?>
                      <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <?php include '../../controller/admin/page_controller/main_activity.php'; ?>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../../controller/admin/page_controller/footer_js.php'; ?>
      <div class="modal fade" id="cameraModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Capture</h5>
                <!-- <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button> -->
            </div>
            <div class="modal-body">
                <center>
                    <div class="form-row main-cam-div">
                        <input type="hidden" name="image" id="image" class="image-tag">
                        <div id="results" class="results" style=""></div>
                        <div id="my_camera" class="my_camera" style=""></div>
                        <br/>
                        
                    </div>
                    <br>
                    <input type=button class="btn btn-warning btn-sm" value="Take Snapshot" id="take_snapshot" onClick="take_snapshot()">
                </center>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="check">Ok</button>
            </div>
        </div>
    </div>
</div>
</body>
 
</html>