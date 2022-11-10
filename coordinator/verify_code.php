<?php
include '../include/db.php';
$resEmails = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM coordinators_tbl WHERE email = '{$_REQUEST['email']}'"));
if ($resEmails['email'] == $_REQUEST['email']) {
	?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    NIPSC Gender and Development Management System With Sms Notification
  </title>
  <!--     Fonts and icons     -->
  <link href="../assets/font.css" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="../assets/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <script type="text/javascript" src="../assetsUser/jquery-3.4.1.min.js"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
</head>

<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">Verify Code</h3>
                  <p class="mb-0">Enter the code sent by SMS</p>
                </div>
                <div class="card-body">
                <form action="verify_code.php?email=<?php echo $resEmails['email']; ?>" method="POST">
                  
                  <div class="alert alert-info" id="empty" style="display: none;">
                    <center><label style="color: white;">Fields must not empty</label></center>
                  </div>
                  <div class="alert alert-warning" id="denied" style="display: none;">
                    <center><label style="color: white;">Login Denied. Account is for Verification.</label></center>
                  </div>
                  <?php
                  if (isset($_REQUEST['btnCheckCode'])) {
                  	
                  	$code = mysqli_escape_string($con, $_REQUEST['code']);

                  	$resCode = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM coordinators_tbl WHERE email = '{$resEmails['email']}' AND code = '$code'"));

                  	if ($resCode['code'] == $code) {
                  		header('location: change_password.php?email='.$resEmails['email']);
                  	}else{
                  		?>
                  		<div class="alert alert-warning" id="wrong_username_pass">
                  			<center><label style="color: white;">Incorrect Code</label></center>
		                </div>
                  		<?php
                  	}

                  }
                  ?>
                  <div role="form" method="POST" action="controller/login.php">
                    <label>Enter 6 Digit Code</label>
                    <div class="mb-3">
                      <input type="text" class="form-control" name="code" placeholder="Enter Code" aria-label="email" aria-describedby="email-addon" maxlength="6" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                    </div>
                    <div class="text-center">
                      <input type="submit" class="btn bg-gradient-info w-100 mt-1 mb-0" name="btnCheckCode" value="SEND">
                    </div>
                  </div>
              	</form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-1 text-sm mx-auto">
                    Don't have an account?
                    <a href="register_view" class="text-info text-gradient font-weight-bold">Sign up</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('../assets/img/curved-images/curved6.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">

      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Copyright © <script>
              document.write(new Date().getFullYear())
            </script> <b>GAD SYSTEM</b>
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="../assetsUser/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

</html>
	<?php
}elseif (empty($_REQUEST['email'])) {
	header('location: forgot_password');
}elseif($resEmails['email'] != $_REQUEST['email']){
	header('location: forgot_password');
}
?>