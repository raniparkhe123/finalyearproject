<div class="col-md-2">
    <?php
        if(isset($_POST['edit_department']) || isset($_POST['edit_department_form'])){

            extract($_POST);

            $department_id = $_GET['edit_department'];
            $edit_department_query = "UPDATE department SET department_name = '$department_name' WHERE department_id = $department_id";
            $edit_department = mysqli_query($connection, $edit_department_query);
            confirmQuery($edit_department);

            header("Location: departments.php");

        }
    ?>
</div>

<?php
    $department = getDepartmentDetails($_GET['edit_department']);
    extract($department);
?>

<div class="col-md-8">

    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Edit Department</h4>
            <p class="card-category">Edit the Existing Department</p>
        </div>
        <div class="card-body">
            <form action="departments.php?edit_department=<?php echo $_GET['edit_department']; ?>" method="post" name="edit_department_form">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="bmd-label-floating">Enter Department Name</label>
                            <input type="text" class="form-control" name="department_name" id="department_name" value="<?php echo ucfirst($department_name); ?>">
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary pull-right" name="edit_department">Edit Department</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>



</div>
