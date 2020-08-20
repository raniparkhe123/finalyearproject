<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        <?php echo "College Management | Login"; ?>
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />

    <link href="assets/css/styles.css" rel="stylesheet" />
</head>

<body class="dark-edition">
<div class="wrapper ">


        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>
                <div class="row">

                    <div class="col-md-3">&nbsp;</div>

                    <div class="col-md-6">

                        <div class="card">
                            <div class="card-header card-header-info">
                                <h4 class="card-title">College Management Account</h4>
                                <p class="card-category">Login with your Account</p>
                                <?php if(isset($_GET['wrong_info'])) { ?>
                                    <p>&nbsp;</p>
                                    <p class="text-center card-category text-danger text-uppercase">* Wrong Email Address or Password</p>
                                <?php } else if(isset($_GET['user_deleted'])){
                                    ?>
                                    <p class="text-center card-category text-danger text-uppercase">* Your account has been suspended.
                                        <br>     Please contact to administration for details.</p>
                                <?php
                                } ?>
                            </div>
                            <div class="card-body">
                                <form action="includes/login.php" method="post" name="login_form">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Email Address</label>
                                                <input type="email" class="form-control" name="user_email">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Password</label>
                                                <input type="password" class="form-control" name="user_password">
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" name="user_login" class="btn btn-success pull-right"> <i class="fa fa-sign-in"></i> &nbsp; Login</button>
                                    <div class="clearfix"></div>


                                    <div class="row">

                                        <div class="col-md-12">&nbsp;</div>

                                        <div class="col-md-3">
											<h4><a href="forgot.php?forgot=<?php echo uniqid(true); ?> " class="text-uppercase text-danger"> Forgot Password?</a><br> </h4>
                                       </div>
                                        <div class="col-md-2">&nbsp;</div>
                                        <div class="col-md-7">
                                            <h4>Do not have a account? <a href="register.php" class="text-uppercase text-primary">Sign Up</a> </h4>
                                        </div>
                                    </div>


                                </form>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                    <div class="col-md-12">&nbsp;</div>
                    <div class="col-md-12">&nbsp;</div>
                </div>

            </div>
        </div>
        <?php include_once ('includes/footer.php'); ?>

</div>

<!--   Core JS Files   -->
<script src="assets/js/core/jquery.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap-material-design.min.js"></script>
<script src="https://unpkg.com/default-passive-events"></script>
<script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Chartist JS -->

<!--  Notifications Plugin    -->
<script src="assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="assets/js/material-dashboard.js?v=2.1.0"></script>

</body>

</html>