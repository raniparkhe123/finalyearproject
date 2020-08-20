<?php
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<?php
    $title = "College Management | Concession";
    include_once ("includes/header.php");
?>
<?php
if($user_type != 3 && $user_type != 4)
    die("<div class='text-center'><h3 class='text-uppercase'>You Do not have access to use this page. Go back from <a href='dashboard.php'>Here</a></h3></div>");
?>
<body class="dark-edition">
  <div class="wrapper ">

      <?php
        $page = "concession";
        include_once ("includes/sidebar.php")
      ?>

    <div class="main-panel">
      <!-- Navbar -->
            <?php
                include_once ("includes/navbar.php");
            ?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <?php
                if($user_type == 3){

                    if(isset($_GET['view_concession']))
                        include_once ("includes/railway/edit_concession.php");
                     else
                        include_once ("includes/railway/view_concessions.php");
                } else if($user_type == 4){
                    if(isset($_GET['new_concession']))
                        include_once ("includes/railway/add_concession.php");
                    else
                        include_once ("includes/railway/view_concession.php");
                }
            ?>
          </div>
            <?php
                include_once ("includes/footer.php");
            ?>

    </div>
  </div>

  <!--   Core JS Files   -->
    <?php
        include_once ("includes/scripts.php");
    ?>


  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
</body>

</html>