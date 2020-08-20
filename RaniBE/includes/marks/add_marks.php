<div class="col-md-2">&nbsp;
    <?php
        if(isset($_POST['add_marks']) || isset($_POST['add_marks_form'])){
            extract($_POST);
            $i = 0;
            //print_r($_POST);
            foreach ($sid as $student){
                $current_marks = $marks[$i++];
                $insert_marks_query = "INSERT INTO marks(subject_id, sid, marks) VALUES ($subject_id, $student, $current_marks)";
                $insert_marks = mysqli_query($connection, $insert_marks_query);
                confirmQuery($insert_marks);
            }
            header("Location: marks.php");

        }
    ?>
</div>


<?php if(isset($_POST['middleware_submit']) || isset($_POST['middleware_form'])){ ?>

    <?php
        $received_class_id = $_POST['class_id'];
        $received_subject_id = $_POST['subject_id'];

        $subject_details = getSubjectDetails($received_subject_id);
        $students_list = getStudentsOfClass($received_class_id);
    ?>

<div class="col-md-8">

    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Add Marks</h4>
            <p class="card-category">Insert Marks of Students</p>
        </div>
        <div class="card-body">
            <form action="marks.php?add_marks=new" method="post" name="add_marks_form">

                <?php while($row = mysqli_fetch_assoc($students_list)){
                    extract($row);
                ?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">

                            <input type="text" hidden name="subject_id" value="<?php echo $received_subject_id; ?>">
                            <label for="" class="bmd-label-floating">Student Name</label>
                            <input type="text" hidden name="sid[]" value="<?php echo $sid; ?>">
                            <input type="text" class="form-control" name="student_name[]" id="student_name" disabled value="<?php echo ucfirst($user_first_name) . ' ' . ucfirst($user_last_name); ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="bmd-label-floating">Subject Selected</label>
                            <input type="text" class="form-control" disabled value="<?php echo ucfirst($subject_details['subject_name']); ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="bmd-label-floating">Student Marks</label>
                            <input type="text" class="form-control" name="marks[]" id="marks">
                        </div>
                    </div>
                </div>
                <?php } ?>

                <button type="submit" class="btn btn-primary pull-right" name="add_marks">Add Marks</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>

</div>

<?php } else if(!(isset($_POST['add_marks']) || isset($_POST['add_marks_form']))) {
    ?>
    <div class="col-md-8">

        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Add Marks</h4>
                <p class="card-category">Insert Marks of Students</p>
            </div>
            <div class="card-body">
                <form action="marks.php?add_marks=new" method="post" name="middleware_form">
                    <div class="row">
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
                                        <option value="<?php echo $class_id; ?>"><?php echo strtoupper($class_name) . " " . ucfirst($department_name); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Select Subject</label>
                                <select class="form-control black-select" name="subject_id" id="subject_id">
                                    <option value="0" selected disabled>Select Subject</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary pull-right" name="middleware_submit">Proceed to Add</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>

    </div>
<?php
} ?>

<!--<div class="col-md-2">
    <iframe width="350" height="430" allow="microphone;" src="https://console.dialogflow.com/api-client/demo/embedded/dee11804-dae3-478a-9335-3a6d56c30fac"></iframe>
</div-->