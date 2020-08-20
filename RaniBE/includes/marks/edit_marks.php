<div class="col-md-2">
    <?php
        if(isset($_POST['edit_marks']) || isset($_POST['edit_marks_form'])){

            //print_r($_POST);
            extract($_POST);

            $mid = $_GET['edit_marks'];
            $edit_marks_query = "UPDATE marks SET marks = $marks WHERE mid = $mid";
            $edit_marks = mysqli_query($connection, $edit_marks_query);
            confirmQuery($edit_marks);

            header("Location: marks.php");

        }
    ?>
</div>

<?php
    $marks_student = getMarksDetails($_GET['edit_marks']);
    extract($marks_student);
?>

<div class="col-md-8">

    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Edit Marks</h4>
            <p class="card-category">Edit the Existing Marks</p>
        </div>
        <div class="card-body">
            <form action="marks.php?edit_marks=<?php echo $_GET['edit_marks']; ?>" method="post" name="edit_marks_form">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="bmd-label-floating">Student Name</label>
                            <input type="text" class="form-control" disabled value="<?php echo ucfirst($user_first_name) . ' ' . ucfirst($user_last_name); ?>">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="bmd-label-floating">Subject Name</label>
                            <input type="text" class="form-control" disabled value="<?php echo ucfirst($subject_name); ?>">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="bmd-label-floating">Student Marks</label>
                            <input type="text" class="form-control" name="marks" value="<?php echo ucfirst($marks); ?>">
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary pull-right" name="edit_marks">Edit Marks</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>



</div>
