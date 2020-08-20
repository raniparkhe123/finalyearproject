<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php
    $title = "College management | User Profile";
    include_once ("includes/header.php");
?>

<body class="dark-edition">
<div class="wrapper ">

    <?php
    $page = "marks";
    include_once ("includes/sidebar.php")
    ?>
    <div class="main-panel">
        <!-- Navbar -->
        <?php
        include_once ("includes/navbar.php");
        ?>
        <!-- End Navbar -->

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
                            <p class="card-category">View your Account</p>
                        </div>
                        <div class="card-body">

                            <?php
                                $userDetails = getUserDetails($user_id);
                                extract($userDetails);
                            ?>

                            <form action="includes/register.php" method="post" id="register_form" name="register_form" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group form-input">
                                            <label for="" class="bmd-label-floating">First Name</label>
                                            <input type="text" disabled value="<?php echo ucfirst($user_first_name); ?>" name="user_first_name" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-input">
                                            <label for="" class="bmd-label-floating">Last Name</label>
                                            <input type="text" disabled value="<?php echo ucfirst($user_last_name); ?>" name="user_last_name" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-input">
                                            <label for="" class="bmd-label-floating">Phone Number</label>
                                            <input type="text" disabled value="<?php echo ucfirst($user_phone); ?>" name="user_phone" class="form-control">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group form-input">
                                            <label for="" class="bmd-label-floating">Date Of Birth</label>
                                            <input type="text" disabled value="<?php echo ucfirst($user_dob); ?>" name="user_dob" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group form-input">
                                            <label for="" class="bmd-label-floating">User Address</label>
                                            <input type="text" disabled value="<?php echo ucfirst($user_address); ?>" name="user_address" class="form-control">
                                        </div>
                                    </div>

                                </div>


                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group form-input">
                                            <label for="" class="bmd-label-floating">Gender</label>
                                            <input type="text"disabled value="<?php echo ucfirst($user_gender); ?>" name="user_address" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-input">
                                            <label for="" class="bmd-label-floating">Email address</label>
                                            <input type="text" disabled value="<?php echo ($user_email); ?>" name="user_email" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="bmd-label-floating">User Type</label>
                                            <input type="text" disabled class="form-control" value="<?php if($user_type == 1) echo 'Admin'; else if ($user_type == 2) echo 'Teacher'; else if($user_type == 3) echo 'Non Teaching Staff'; else if($user_type == 4) echo 'Student'; ?>">
                                        </div>
                                    </div>


                                </div>

                                <div class="row">

                                    <?php
                                        if($user_type == 4) {

                                                $student_details = getStudentDetails($user_id);
                                                extract($student_details);
                                            ?>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Enrollment Number</label>
                                                    <input type="text" class="form-control" disabled value="<?php echo $student_enrollment_no; ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Class</label>
                                                    <input type="text" class="form-control" disabled value="<?php echo strtoupper($class_name); ?>">
                                                </div>
                                            </div>

                                            <?php
                                        } else if($user_type == 2) {
                                            $teacher_details = getTeacherDetails($user_id);
                                            extract($teacher_details);
                                            ?>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Qualification</label>
                                                    <input type="text" class="form-control" disabled value="<?php echo ucfirst($teacher_qualification); ?>">
                                                </div>
                                            </div>

                                    <?php

                                        }
                                    ?>
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
</div>
<?php
    include_once ("includes/scripts.php");
?>

<script type="text/javascript" src="assets/js/pages/register.js"></script>

</body>

</html>