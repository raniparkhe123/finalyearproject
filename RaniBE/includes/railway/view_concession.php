<div class="col-md-12">

    <a href="railway.php?new_concession=true" class="btn btn-info pull-right"> <i class="fa fa-plus-square"></i> &nbsp; Apply for Concession</a>
    <div class="clearfix"></div>

    <div class="card card-plain">
        <div class="card-header card-header-primary">
            <h4 class="card-title mt-0">Concessions</h4>
            <p class="card-category"> Here is a list of your applied concessions</p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="">
                        <th>
                            Sr. No
                        </th>

                        <th>
                            Station From
                        </th>

                        <th>Class</th>
                        <th>Period</th>
                        <th>Applied On</th>
                        <th>Status</th>
                    </thead>
                    <tbody>

                    <?php
                        $concession_query = "SELECT * FROM railway, student WHERE railway.sid = student.sid AND railway.sid = $student_id ORDER BY railway.timestamp DESC";
                        $concession = mysqli_query($connection, $concession_query);
                        $i = 1;

                        while($row = mysqli_fetch_assoc($concession)) {
                            extract($row);

                            $select_date_query = "SELECT DATE(timestamp) as applied_date FROM railway WHERE r_id = $r_id";
                            $get_date = mysqli_query($connection, $select_date_query);
                            confirmQuery($get_date);

                            $inner_row = mysqli_fetch_assoc($get_date);
                            $applied_date = $inner_row['applied_date'];

                            if($railway_class == 1)
                                $railway_class = "First";
                            else if($railway_class == 2)
                                $railway_class = "Second";

                            ?>
                            <tr>
                                <td>
                                    <?php echo $i++; ?>
                                </td>

                                <td>
                                    <?php echo strtoupper($from_station); ?>
                                </td>
                                <td>
                                    <?php echo strtoupper($railway_class); ?>
                                </td>
                                <td>
                                    <?php echo strtoupper($time_period); ?>
                                </td>
                                <td>
                                    <?php echo $applied_date; ?>
                                </td>
                                <td>
                                    <span class="<?php if($status == 'approved') echo 'text-success'; else if($status == 'pending') echo 'text-info'; else echo 'text-danger'; ?>" ><?php echo strtoupper($status); ?></span>
                                </td>
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