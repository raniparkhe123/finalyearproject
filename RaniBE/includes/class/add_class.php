<div class="col-md-2">&nbsp;
    <?php
        if(isset($_POST['add_class']) || isset($_POST['add_class_form'])){
            extract($_POST);

            $insert_class_query = "INSERT INTO class(class_name, department_id) VALUES ('$class_name', $department_id)";
            $insert_class = mysqli_query($connection, $insert_class_query);
            confirmQuery($insert_class);

            header("Location: class.php");

        }
    ?>
</div>


<div class="col-md-8">

    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Add Class</h4>
            <p class="card-category">Add A New Class</p>
        </div>
        <div class="card-body">
            <form action="class.php?add_class=new" method="post" name="add_class_form">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="bmd-label-floating">Enter Class Name</label>
                            <input type="text" class="form-control" name="class_name" id="class_name">
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
                                    <option value="<?php echo $row['department_id']; ?>"><?php echo ucfirst($row['department_name']) ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary pull-right" name="add_class">Add Class</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>

</div>

<!--<div class="col-md-2">
    <iframe width="350" height="430" allow="microphone;" src="https://console.dialogflow.com/api-client/demo/embedded/dee11804-dae3-478a-9335-3a6d56c30fac"></iframe>
</div-->