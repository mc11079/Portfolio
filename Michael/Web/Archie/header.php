<?php
// Start the session
session_start();


if (isset($_POST['logoutBtn'])){
    session_destroy();
    header("Location:welcomePage.php");
}

if (!isset($_SESSION['role'])){
    header("Location:welcomePage.php");
}



//$page = $_SERVER['PHP_SELF'];
//$sec = "25";
//header("Refresh: $sec; url=$page");
require_once 'functions.php';
?>

<!-- HTML CODE -->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>ARCHIE:<?php echo $_SESSION['role']?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="archieStyle/sidebar.css" />

</head>
<body>
<?php
require_once 'nav.php';
if ($_SESSION['role']=="Archive Employee"||$_SESSION['role']=="Manager"||$_SESSION['role']=="Researcher") {
  require_once  'sidebar.php';
}
?>


