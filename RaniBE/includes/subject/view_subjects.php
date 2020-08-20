<div class="col-md-12">

    <a href="subjects.php?add_subject=new" class="btn btn-info pull-right"> <i class="fa fa-plus-square"></i> &nbsp; Add Subject</a>
    <div class="clearfix"></div>

    <div class="card card-plain">
        <div class="card-header card-header-primary">
            <h4 class="card-title mt-0">Subjects</h4>
            <p class="card-category"> Here is a list of Subjects</p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="">
                        <th>
                            Sr. No
                        </th>
                        <th>
                            Subject Name
                        </th>
                        <th>
                            Class Name
                        </th>
                        <th>
                            Subject Code
                        </th>
                        <th>
                            Teacher Name
                        </th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>

                    <?php
                        $subjects_query = "SELECT * FROM subject, class, teaching_staff, department, user WHERE subject.class_id = class.class_id AND teaching_staff.tid = subject.tid AND teaching_staff.user_id = user.user_id AND department.department_id = class.department_id";
                        $subjects = mysqli_query($connection, $subjects_query);
                        $i = 1;

                        while($row = mysqli_fetch_assoc($subjects)) {
                            extract($row);
                            ?>
                            <tr>
                                <td>
                                    <?php echo $i++; ?>
                                </td>
                                <td>
                                    <?php echo ucfirst($subject_name); ?>
                                </td>
                                <td>
                                    <?php echo strtoupper($class_name) . " " . strtoupper($department_name); ?>
                                </td>
                                <td>
                                    <?php echo $subject_code; ?>
                                </td>
                                <td>
                                    <?php echo ucfirst($user_first_name) . " " . ucfirst($user_last_name); ?>
                                </td>
                                <td><a class="btn btn-info" href="subjects.php?edit_subject=<?php echo $subject_id; ?>"> <i class="fa fa-pencil"></i> &nbsp;</a></td>
                                <td><a class="btn btn-danger" href="includes/functions.php?delete_subject=<?php echo $subject_id; ?>"> <i class="fa fa-times"></i> &nbsp;</a></td>
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