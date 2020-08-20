<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        <?php echo "College Management | Register"; ?>
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

                <div class="col-md-1">&nbsp;</div>

                <div class="col-md-10">

                    <div class="card">
                        <div class="card-header card-header-info">
                            <h4 class="card-title">College Management Account</h4>
                            <p class="card-category">Register your Account</p>
                            <?php if(isset($_GET['value_miss'])) { ?>
                                <p class="card-category text-uppercase text-danger">* You Missed Some Values</p>
                            <?php } else if(isset($_GET['same_user'])){ ?>
                                <p class="card-category text-uppercase text-danger">* User already exists With same Email Address</p>
                            <?php }  else if(isset($_GET['error'])){ ?>
                                <p class="card-category text-uppercase text-danger">* There was some error while inserting values</p>
                            <?php } ?>


                        </div>
                        <div class="card-body">
                            <form action="includes/register.php" method="post" id="register_form" name="register_form" enctype="multipart/form-data">


                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group form-input">
                                            <label for="" class="bmd-label-floating">First Name</label>
                                            <input type="text" name="user_first_name" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-input">
                                            <label for="" class="bmd-label-floating">Last Name</label>
                                            <input type="text" name="user_last_name" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-input">
                                            <label for="" class="bmd-label-floating">Phone Number</label>
                                            <input type="text" name="user_phone" class="form-control">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group form-input">
                                            <label for="" class="bmd-label-floating">Date Of Birth</label>
                                            <input type="text" name="user_dob" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-input">
                                            <label for="" class="bmd-label-floating">Address</label>
                                            <input type="text" name="user_address" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <select name="user_gender" class="form-control black-select" id="user_gender">
                                            <option value="0" selected disabled>Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>

                                </div>


                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group form-input">
                                            <label for="" class="bmd-label-floating">Enter Email</label>
                                            <input type="text" name="user_email" class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Enter Password</label>
                                            <input type="password" class="form-control" name="user_password">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Confirm Password</label>
                                            <input type="password" class="form-control" name="user_confirm_password">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">

                                            <label for="" class="bmd-label-floating">Select User Type</label>

                                            <select name="user_type" class="form-control black-select" id="user_type">
                                                <option value="0" selected disabled>You're a Teacher or Non Teaching Staff or Student</option>
                                                <option value="2">Teaching Staff</option>
                                                <option value="3">Non Teaching Staff</option>
                                                <option value="4">Student</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div id="additional-form-container">
                                        </div>
                                    </div>


                                </div>


                                <div class="row">

                                    <div class="col-md-12">&nbsp;</div>

                                    <div class="col-md-6">&nbsp;</div>
                                    <div class="col-md-2">&nbsp;</div>
                                    <div class="col-md-4">
                                        <h4>Already have a account? <a href="index.php" class="text-uppercase text-primary">Log In</a> </h4>
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
<?php
    include_once ("includes/scripts.php");
?>

<script type="text/javascript" src="assets/js/pages/register.js"></script>

</body>

</html>