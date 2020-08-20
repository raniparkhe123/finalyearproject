<div class="col-md-2">

</div>

<?php
    $concession = getConcessionDetails($_GET['view_concession']);
    extract($concession);
    $userDetails = getUserDetails($user_id);
    extract($userDetails);
?>

    <div class="col-md-8">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Railway Concession</h4>
          <p class="card-category">View applied concession</p>
        </div>
        <div class="card-body">
          <form action="railway.php?view_concession=<?php echo $_GET['view_concession']; ?>" method="post" name="railway_concession">

              <div class="row">

                  <div class="col-md-4">
                      <div class="form-group">
                          <label for="" class="bmd-label-floating">Student Name</label>
                          <input type="text" class="form-control" disabled value="<?php echo $user_first_name . ' ' . $user_last_name; ?>">
                      </div>
                  </div>

                  <div class="col-md-4">
                      <div class="form-group">
                          <label for="" class="bmd-label-floating">Student Date Of Birth</label>
                          <input type="text" class="form-control" disabled value="<?php echo $user_dob; ?>">
                      </div>
                  </div>

                  <div class="col-md-4">
                      <div class="form-group">
                          <label for="" class="bmd-label-floating">Student Contact</label>
                          <input type="text" class="form-control" disabled value="<?php echo $user_phone; ?>">
                      </div>
                  </div>

                  <div class="col-md-8">
                      <div class="form-group">
                          <label for="" class="bmd-label-floating">Student Address</label>
                          <textarea disabled class="form-control"><?php echo $user_address; ?></textarea>
                      </div>
                  </div>

                  <?php
                      $select_date_query = "SELECT DATE(timestamp) as applied_date FROM railway WHERE r_id = $r_id";
                      $get_date = mysqli_query($connection, $select_date_query);
                      confirmQuery($get_date);

                      $inner_row = mysqli_fetch_assoc($get_date);
                      $applied_date = $inner_row['applied_date'];
                  ?>

                  <div class="col-md-4">
                      <div class="form-group">
                          <label for="" class="bmd-label-floating">Applied On</label>
                          <textarea disabled class="form-control"><?php echo $applied_date; ?></textarea>
                      </div>
                  </div>




              </div>

              <div class="row">

                  <div class="col-md-4">
                      <div class="form-group">
                          <label for="" class="bmd-label-floating">Railway pass number</label>
                          <input type="text" class="form-control" disabled value="<?php echo $railway_passno; ?>" name="railway_passno">
                      </div>
                  </div>

                  <div class="col-md-4">
                      <div class="form-group">
                          <label class="bmd-label-floating">Station From</label>
                          <input type="text" class="form-control" disabled value="<?php echo $from_station; ?>" name="from_station">
                      </div>
                  </div>

                  <div class="col-md-4">
                      <div class="form-group">
                          <label class="bmd-label-floating">Station To</label>
                          <input type="text" class="form-control" disabled value="Bandra">
                      </div>
                  </div>
              </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Railway Class</label>
                            <input type="text" class="form-control" disabled value="<?php if($railway_class == 1) echo 'First'; else if($railway_class == 2) echo 'Second'; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Time Period</label>
                            <input type="text" class="form-control" disabled value="<?php echo strtoupper($time_period); ?>">
                        </div>
                    </div>
                </div>


                <?php if($status == 'pending'){ ?>
                    <td><a class="btn btn-danger pull-right" href="includes/functions.php?deny_concession=<?php echo $r_id; ?>"> <i class="fa fa-times"></i> &nbsp;</a></td>
                    <td><a class="btn btn-success pull-right" href="includes/functions.php?approve_concession=<?php echo $r_id; ?>&user_x=<?php echo $user_email; ?>"> <i class="fa fa-check"></i> &nbsp;</a></td>

              <?php } ?>
            <div class="clearfix"></div>
          </form>
        </div>
      </div>
    </div>
