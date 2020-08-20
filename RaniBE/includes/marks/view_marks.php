<div class="col-md-12">


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
                            Subject Name
                        </th>

                        <th>
                            Subject Code
                        </th>

                        <th>
                            Professor
                        </th>
                        <th>Marks Obtained</th>

                    </thead>
                    <tbody>

                    <?php
                        $class_query = "SELECT * FROM marks, subject, teaching_staff, user WHERE marks.subject_id = subject.subject_id AND subject.tid = teaching_staff.tid AND teaching_staff.user_id = user.user_id AND marks.sid = $student_id";
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
                                    <?php echo strtoupper($subject_name); ?>
                                </td>
                                <td>
                                    <?php
                                        echo $subject_code;
                                    ?>
                                </td>
                                <td>
                                    <?php echo ucfirst($user_first_name) . " " . ucfirst($user_last_name); ?>
                                </td>
                                <td><?php echo $marks; ?></td>
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