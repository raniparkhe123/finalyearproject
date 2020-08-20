<?php
    ob_start();
?>



<!DOCTYPE html>
<html lang="en">

<?php
    $title = "College Management | Subjects";
    include_once ("includes/header.php");
?>
<?php
if($user_type > 2)
    die("<div class='text-center'><h3 class='text-uppercase'>You Do not have access to use this page. Go back from <a href='dashboard.php'>Here</a></h3></div>");
?>
<body class="dark-edition">
  <div class="wrapper ">

      <?php
        $page = "subjects";
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
                if(isset($_GET['add_subject'])){
                    include_once ("includes/subject/add_subject.php");
                } else if(isset($_GET['edit_subject'])){
                    include_once ("includes/subject/edit_subject.php");
                } else{
                    include_once ("includes/subject/view_subjects.php");
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