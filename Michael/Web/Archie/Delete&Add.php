<?php

$servername = "localhost";
$username = "root";
$password = '';
$dbname = "Archie";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Start the session
session_start();


//echo "alert('User has been approved!');";
$num = $_REQUEST['num'];
$myAction = $_REQUEST['myAction'];
//$i=1;
//$flag=true;
if($myAction=='deleteT1'){
    $sql = "SELECT * FROM user WHERE approved=1";
    $allUsers = mysqli_query($conn, $sql);
}
else{
    $sql = "SELECT * FROM user WHERE approved=0";
    $allUsers = mysqli_query($conn, $sql);
}



if ($allUsers = mysqli_query($conn, $sql)) {
    // Seek to row num-1
    mysqli_data_seek($allUsers, $num - 1);

    // Fetch row
    $row = mysqli_fetch_row($allUsers);

    $user = $row[1];

    // Free result set
    mysqli_free_result($allUsers);
}

if ($myAction == "deleteT1" || $myAction =="deleteT2") {

    $deleteSql = "DELETE FROM user WHERE user.user_name='$user'";
    if ($conn->query($deleteSql) === TRUE) {
       echo "alert('User \"$user\" has been deleted!');";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}


if ($myAction == "approve") {

    $approveSql = "UPDATE user SET user.approved=1 WHERE user.user_name='$user'";

    if ($conn->query($approveSql) === TRUE) {
        echo "alert('User \"$user\" has been approved!');";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

