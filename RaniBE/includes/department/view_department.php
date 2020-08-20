<div class="col-md-12">

    <a href="departments.php?add_department=new" class="btn btn-info pull-right"> <i class="fa fa-plus-square"></i> &nbsp; Add Department</a>
    <div class="clearfix"></div>

    <div class="card card-plain">
        <div class="card-header card-header-primary">
            <h4 class="card-title mt-0">Department</h4>
            <p class="card-category"> Here is a list of Departments</p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="">
                        <th>
                            Sr. No
                        </th>

                        <th>
                            Department Name
                        </th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>

                    <?php
                        $department_query = "SELECT * FROM department";
                        $department = mysqli_query($connection, $department_query);
                        $i = 1;

                        while($row = mysqli_fetch_assoc($department)) {
                            extract($row);
                            ?>
                            <tr>
                                <td>
                                    <?php echo $i++; ?>
                                </td>
                                <td>
                                    <?php echo strtoupper($department_name); ?>
                                </td>
                                <td><a class="btn btn-info" href="departments.php?edit_department=<?php echo $department_id; ?>"> <i class="fa fa-pencil"></i> &nbsp;
                                <td><a class="btn btn-danger" href="includes/functions.php?delete_department=<?php echo $department_id; ?>"> <i class="fa fa-times"></i> &nbsp;</a></td>
    

                            <?php
                        }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>