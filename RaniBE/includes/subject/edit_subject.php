<div class="col-md-2">&nbsp;
    <?php
        if(isset($_POST['edit_subject']) || isset($_POST['edit_subject_form'])){

            extract($_POST);

            $subject_id = $_GET['edit_subject'];
            $edit_subject_query = "UPDATE subject SET class_id=$class_id,subject_name='$subject_name',subject_code='$subject_code',tid=$tid WHERE subject_id = $subject_id";
            $edit_subject = mysqli_query($connection, $edit_subject_query);
            confirmQuery($edit_subject);

            header("Location: subjects.php");

        }
    ?>
</div>

<?php
    $subject = getSubjectDetails($_GET['edit_subject']);
    extract($subject);
?>

<div class="col-md-8">

    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Edit Subject</h4>
            <p class="card-category">Edit the existing Subject</p>
        </div>
        <div class="card-body">
            <form action="subjects.php?edit_subject=<?php echo $_GET['edit_subject']; ?>" method="post" name="edit_subject_form">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="bmd-label-floating">Enter Subject Name</label>
                            <input type="text" class="form-control" name="subject_name" id="subject_name" value="<?php echo ucfirst($subject_name); ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Enter Subject Code</label>
                            <input type="text" class="form-control" name="subject_code" id="subject_code" value="<?php echo $subject_code; ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Select Class</label>
                            <select class="form-control black-select" name="class_id" id="class_id">
                                <?php

                                $getClassQuery = "SELECT * FROM class, department WHERE class.department_id = department.department_id";
                                $classes = mysqli_query($connection, $getClassQuery);
                                confirmQuery($classes);

                                while($row = mysqli_fetch_assoc($classes)){

                                    ?>
                                    <option value="<?php echo $row['class_id']; ?>" <?php if($class_id == $row['class_id'])  echo 'selected'; ?>><?php echo strtoupper($row['class_name']) . " " . ucfirst($row['department_name']); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Select Staff</label>
                            <select class="form-control black-select" name="tid" id="tid">
                                <?php

                                $getStaffQuery = "SELECT * FROM teaching_staff, user WHERE teaching_staff.user_id = user.user_id";
                                $staff = mysqli_query($connection, $getStaffQuery);
                                confirmQuery($staff);

                                while($row = mysqli_fetch_assoc($staff)){
                                    ?>
                                    <option value="<?php echo $row['tid']; ?>" <?php if($row['tid'] == $tid) echo 'selected'; ?> ><?php echo ucfirst($row['user_first_name']) . " " . ucfirst($row['user_last_name']); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary pull-right" name="edit_subject">Edit Subject</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>



</div>
