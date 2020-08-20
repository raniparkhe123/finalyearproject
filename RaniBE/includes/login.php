<?php
ob_start();
session_start();
?>
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        <?php echo $title; ?>
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />

    <link href="../assets/css/styles.css" rel="stylesheet" />
</head>
<?php

	if(isset($_POST['user_login']) || isset($_POST['login_form'])){

	    include_once ("db.php");
	    include_once ("functions.php");

        extract($_POST);

        $query="select * from user where user_email='$user_email'";
        $select_user_details=mysqli_query($connection,$query);
        confirmQuery($query);

        $db_user_password = $db_user_id = $db_user_email = "";

        if($row=mysqli_fetch_assoc($select_user_details)){
            $db_user_id = $row['user_id'];
            $db_user_password = $row['user_password'];
            $db_user_email = $row['user_email'];
            $db_user_type = $row['user_type'];

            if(password_verify($user_password,$db_user_password) && $user_email===$db_user_email){
                $_SESSION['user_id'] = $db_user_id;
                $_SESSION['user_type'] = $db_user_type;
                header("Location: ../dashboard.php");
            } else{
                header("Location: ../index.php?wrong_info=true");
            }

        } else{
            header("Location: ../index.php?wrong_info=true");
        }


    }


?>