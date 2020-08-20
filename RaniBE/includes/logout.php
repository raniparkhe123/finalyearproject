<?php ob_start(); ?>
<?php
session_start();

include_once("db.php");
include_once("functions.php");

$_SESSION['user_id']=null;
$_SESSION['user_type']=null;

session_destroy();

header("Location: ../index.php");

?>