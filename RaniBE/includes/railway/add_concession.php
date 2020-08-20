<div class="col-md-2">
    <?php
        if(isset($_POST['railway_form']) || isset($_POST['railway_apply'])){
            extract($_POST);
            //print_r($_POST);
            $insert_railway_query = "INSERT INTO railway(status, timestamp, railway_passno, from_station, to_station, railway_class, time_period, sid) VALUES ('pending', CURRENT_TIMESTAMP(), '$railway_passno', '$from_station', '$to_station', $railway_class, '$time_period', $student_id)";
            $insert_railway = mysqli_query($connection, $insert_railway_query);
            confirmQuery($insert_railway);

            header("Location: railway.php");

        }
    ?>
</div>


    <div class="col-md-8">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Railway Concession</h4>
          <p class="card-category">Apply for new concession</p>
        </div>
        <div class="card-body">
          <form action="railway.php?new_concession=true" method="post" name="railway_form">

              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="" class="bmd-label-floating">Railway pass number</label>
                          <input type="text" class="form-control" name="railway_passno">
                      </div>
                  </div>
              </div>

              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="bmd-label-floating">Station From</label>
                          <input type="text" class="form-control" name="from_station">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="bmd-label-floating">Station To</label>
                          <input type="text" class="form-control" name="to_station" id="to_station" readonly value="Bandra">
                      </div>
                  </div>
              </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Railway Class</label>

                            <select class="form-control black-select" name="railway_class" id="railway_class">
                                <option value="0" disabled selected>Select Class</option>
                                <option value="1">First</option>
                                <option value="2">Second</option>
                            </select>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Time Period</label>
                            <select class="form-control black-select" name="time_period" id="time_period">
                                <option value="0" disabled selected>Select Period</option>
                                <option value="monthly">Monthly</option>
                                <option value="quarterly">Quarterly</option>
                            </select>
                        </div>
                    </div>
                </div>



            <button type="submit" class="btn btn-primary pull-right" name="railway_apply">Apply Now</button>
            <div class="clearfix"></div>
          </form>
        </div>
      </div>
    </div>
