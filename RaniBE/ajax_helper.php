<?php

include_once ("includes/db.php");
include_once ("includes/functions.php");

    if(isset($_GET['get_register_details'])){
        $user_type = $_GET['get_register_details'];


        if($user_type == 2){
          ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="">Qualification Details</label>
                        <input type="text" class="form-control" name="teacher_qualification" id="teacher_qualification">
                    </div>
                </div>
            </div>

        <?php
        } else if($user_type == 4){
            ?>

<div class='row'>
    

    <div class='col-md-6'>
        <div class='form-group'>
            <label class=''>Enrollment No.</label>
            <input type='text' class='form-control' name="student_enrollment_no" id="student_enrollment_no">
        </div>
    </div>


    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">Select Class</label>
            <select class="form-control black-select" name="class_id" id="class_id">
                <option value="0" selected disabled>Select The Class</option>
                <?php

                $getClassQuery = "SELECT * FROM class, department WHERE class.department_id = department.department_id";
                $classes = mysqli_query($connection, $getClassQuery);
                confirmQuery($classes);

                while($row = mysqli_fetch_assoc($classes)){
                    extract($row);
                    ?>
                    <option value="<?php echo $class_id; ?>"><?php echo strtoupper($class_name); ?></option>
                <?php } ?>
            </select>
        </div>
    </div>


</div>

            <?php
        }

        ?>

        <button type="submit" name="register" class="btn btn-primary pull-right">Register</button>
        <div class="clearfix"></div>

        <?php
    } else if(isset($_GET['get_subject_info'])){

        $class_id = $_GET['get_subject_info'];
        $subject_list = getSubjectsOfClass($class_id);
        $return_query = "";


        while($row = mysqli_fetch_assoc($subject_list)){
            extract($row);
            $subject_name = ucfirst($subject_name);
            $return_query .= "<option value='$subject_id'>$subject_name</option>";
        }

        echo $return_query;

    }
?>




