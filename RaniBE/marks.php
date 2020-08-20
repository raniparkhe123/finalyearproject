<?php
    ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<?php
    $title = "College Management | Marks";
    include_once ("includes/header.php");
?>
<?php
if($user_type != 2 && $user_type != 4)
    die("<div class='text-center'><h3 class='text-uppercase'>You Do not have access to use this page. Go back from <a href='dashboard.php'>Here</a></h3></div>");
?>
<body class="dark-edition">
  <div class="wrapper ">

      <?php
        $page = "marks";
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
                if($user_type == 4){
                    include_once ("includes/marks/view_marks.php");
                } else if($user_type == 2){
                    if(isset($_GET['add_marks'])){
                        include_once ("includes/marks/add_marks.php");
                    } else if(isset($_GET['edit_marks'])){
                        include_once ("includes/marks/edit_marks.php");
                    }else{
                        include_once ("includes/marks/view_all_marks.php");
                    }
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


  <script src="assets/js/pages/marks.js" type="text/javascript"></script>
</body>

</html>