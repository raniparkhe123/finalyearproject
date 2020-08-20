<div class="col-md-2">&nbsp;
    <?php
    if(isset($_POST['add_subject']) || isset($_POST['add_subject_form'])){
        extract($_POST);

        $insert_subject_query = "INSERT INTO subject(class_id, subject_name, subject_code, tid) VALUES ($class_id, '$subject_name', '$subject_code',$tid)";
        $insert_subject = mysqli_query($connection, $insert_subject_query);
        confirmQuery($insert_subject);

        header("Location: subjects.php");

    }
    ?>
</div>


<div class="col-md-8">

    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Add Subject</h4>
            <p class="card-category">Add A New Subject</p>
        </div>
        <div class="card-body">
            <form action="subjects.php?add_subject=new" method="post" name="add_subject_form">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="bmd-label-floating">Enter Subject Name</label>
                            <input type="text" class="form-control" name="subject_name" id="subject_name">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Enter Subject Code</label>
                            <input type="text" class="form-control" name="subject_code" id="subject_code">
                        </div>
                    </div>
                    <div class="col-md-12">
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
                                    <option value="<?php echo $class_id; ?>"><?php echo strtoupper($class_name) . " " . ucfirst($department_name); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Select Staff</label>
                            <select class="form-control black-select" name="tid" id="tid">
                                <option value="0" selected disabled>Select The Staff</option>
                                <?php

                                $getStaffQuery = "SELECT * FROM teaching_staff, user WHERE teaching_staff.user_id = user.user_id";
                                $staff = mysqli_query($connection, $getStaffQuery);
                                confirmQuery($staff);

                                while($row = mysqli_fetch_assoc($staff)){
                                    extract($row);
                                    ?>
                                    <option value="<?php echo $tid; ?>"><?php echo ucfirst($user_first_name) . " " . ucfirst($user_last_name); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary pull-right" name="add_subject">Add Subject</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>

</div>

<!--<div class="col-md-2">
    <iframe width="350" height="430" allow="microphone;" src="https://console.dialogflow.com/api-client/demo/embedded/dee11804-dae3-478a-9335-3a6d56c30fac"></iframe>
</div-->