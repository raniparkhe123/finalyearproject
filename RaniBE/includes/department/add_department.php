<div class="col-md-2">&nbsp;
    <?php
        if(isset($_POST['add_department']) || isset($_POST['add_department_form'])){
            extract($_POST);

            $insert_department_query = "INSERT INTO department(department_name) VALUES ('$department_name')";
            $insert_department = mysqli_query($connection, $insert_department_query);
            confirmQuery($insert_department);

            header("Location: departments.php");

        }
    ?>
</div>


<div class="col-md-8">

    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Add Department</h4>
            <p class="card-category">Add A New Department</p>
        </div>
        <div class="card-body">
            <form action="departments.php?add_department=new" method="post" name="add_department_form">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="bmd-label-floating">Enter Department Name</label>
                            <input type="text" class="form-control" name="department_name" id="department_name">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary pull-right" name="add_department">Add Department</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>

</div>

<!--<div class="col-md-2">
    <iframe width="350" height="430" allow="microphone;" src="https://console.dialogflow.com/api-client/demo/embedded/dee11804-dae3-478a-9335-3a6d56c30fac"></iframe>
</div-->