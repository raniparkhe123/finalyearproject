<div class="col-md-12">

    <a href="marks.php?add_marks=new" class="btn btn-info pull-right"> <i class="fa fa-plus-square"></i> &nbsp; Add Marks</a>
    <div class="clearfix"></div>

    <div class="card card-plain">
        <div class="card-header card-header-primary">
            <h4 class="card-title mt-0">Marks</h4>
            <p class="card-category"> Here is a list of your Marks</p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="">
                        <th>
                            Sr. No
                        </th>

                        <th>
                            Student Name
                        </th>

                        <th>
                            Subject Name
                        </th>

                        <th>
                            Subject Code
                        </th>

                        <th>Marks Obtained</th>

                        <th></th>

                    </thead>
                    <tbody>

                    <?php
                        $marks_query = "SELECT * FROM marks, subject, student, user, teaching_staff WHERE marks.subject_id = subject.subject_id AND marks.sid = student.sid AND student.user_id = user.user_id AND subject.tid = teaching_staff.tid AND teaching_staff.user_id = $user_id ORDER BY subject.subject_name";
                        $marks_get = mysqli_query($connection, $marks_query);
                        $i = 1;

                        while($row = mysqli_fetch_assoc($marks_get)){
                            extract($row);
                            ?>
                            <tr>
                                <td>
                                    <?php echo $i++; ?>
                                </td>

                                <td>
                                    <?php echo ucfirst($user_first_name) . " " . ucfirst($user_last_name); ?>
                                </td>
                                <td>
                                    <?php echo ucfirst($subject_name); ?>
                                </td>
                                <td>
                                    <?php
                                        echo $subject_code;
                                    ?>
                                </td>
                                <td><?php echo $marks; ?></td>
                                <td><a class="btn btn-info" href="marks.php?edit_marks=<?php echo $mid; ?>"> <i class="fa fa-pencil"></i> &nbsp;</a></td>
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