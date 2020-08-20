<div class="col-md-12">

    <a href="class.php?add_class=new" class="btn btn-info pull-right"> <i class="fa fa-plus-square"></i> &nbsp; Add Class</a>
    <div class="clearfix"></div>

    <div class="card card-plain">
        <div class="card-header card-header-primary">
            <h4 class="card-title mt-0">Class</h4>
            <p class="card-category"> Here is a list of Classes</p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="">
                        <th>
                            Sr. No
                        </th>

                        <th>
                            Class Name
                        </th>

                        <th>
                            Department Name
                        </th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>

                    <?php
                        $class_query = "SELECT * FROM class, department WHERE department.department_id = class.department_id";
                        $class = mysqli_query($connection, $class_query);
                        $i = 1;

                        while($row = mysqli_fetch_assoc($class)) {
                            extract($row);
                            ?>
                            <tr>
                                <td>
                                    <?php echo $i++; ?>
                                </td>

                                <td>
                                    <?php echo strtoupper($class_name); ?>
                                </td>
                                <td>
                                    <?php echo strtoupper($department_name); ?>
                                </td>
                                <td><a class="btn btn-info" href="class.php?edit_class=<?php echo $class_id; ?>"> <i class="fa fa-pencil"></i> &nbsp;</a></td>
                                <td><a class="btn btn-danger" href="includes/functions.php?delete_class=<?php echo $class_id; ?>"> <i class="fa fa-times"></i> &nbsp;</a></td>
                            </tr>

                            <?php
                        }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>