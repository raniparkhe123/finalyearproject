<div class="col-md-12">

    <div class="card card-plain">
        <div class="card-header card-header-primary">
            <h4 class="card-title mt-0">Concession</h4>
            <p class="card-category"> Here is a list of Applied Concessions</p>
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
                        <th>From Station</th>
                        <th>Applied On</th>
                        <th>Status</th>
                        <th></th>
                    </thead>
                    <tbody>

                    <?php
                    $concession_query = "SELECT * FROM railway, student WHERE railway.sid = student.sid ORDER BY railway.timestamp DESC";
                    $concession = mysqli_query($connection, $concession_query);
                    $i = 1;


                    while($row = mysqli_fetch_assoc($concession)) {
                        extract($row);

                        $select_date_query = "SELECT DATE(timestamp) as applied_date FROM railway WHERE r_id = $r_id";
                        $get_date = mysqli_query($connection, $select_date_query);
                        confirmQuery($get_date);

                        $inner_row = mysqli_fetch_assoc($get_date);
                        $applied_date = $inner_row['applied_date'];

                        $user = getUserDetails($user_id);

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
                                <?php
                                    echo ucfirst($user['user_first_name']) . " " . ucfirst($user['user_last_name']);
                                ?>
                            </td>

                            <td>
                                <?php echo strtoupper($from_station); ?>
                            </td>

                            <td>
                                <?php echo $applied_date; ?>
                            </td>
                            <td> <?php echo strtoupper($status); ?> </td>
                            <td>
                                <a class="btn btn-info" href="railway.php?view_concession=<?php echo $r_id; ?>"> <i class="fa fa-eye"></i> &nbsp;</a></td>
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