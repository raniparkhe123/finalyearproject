<div class="col-md-2">
    <?php
        if(isset($_POST['edit_class']) || isset($_POST['edit_class_form'])){

            extract($_POST);

            $class_id = $_GET['edit_class'];
            $edit_class_query = "UPDATE class SET class_name = '$class_name', department_id = $department_id WHERE class_id = $class_id";
            $edit_class = mysqli_query($connection, $edit_class_query);
            confirmQuery($edit_class);

            header("Location: class.php");

        }
    ?>
</div>

<?php
    $class = getClassDetails($_GET['edit_class']);
    extract($class);
?>

<div class="col-md-8">

    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Edit Class</h4>
            <p class="card-category">Edit the Existing Class</p>
        </div>
        <div class="card-body">
            <form action="class.php?edit_class=<?php echo $_GET['edit_class']; ?>" method="post" name="edit_class_form">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="bmd-label-floating">Enter Class Name</label>
                            <input type="text" class="form-control" name="class_name" id="class_name" value="<?php echo ucfirst($class_name); ?>">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Select Department</label>
                            <select class="form-control black-select" name="department_id" id="department_id">
                                <?php

                                $getDeptQuery = "SELECT * FROM department";
                                $dept = mysqli_query($connection, $getDeptQuery);
                                confirmQuery($dept);

                                while($row = mysqli_fetch_assoc($dept)){
                                    ?>
                                    <option value="<?php echo $row['department_id']; ?>" <?php if($row['department_id'] == $department_id) echo 'selected'; ?> ><?php echo ucfirst($row['department_name']) ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary pull-right" name="edit_class">Edit Class</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>



</div>
