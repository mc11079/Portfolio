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



$SearchBy=$_REQUEST['thisSelection'];

if ($SearchBy == 'Key Word') {
    $sql = "SELECT * FROM keyword_catalog";
    $result = mysqli_query($conn, $sql);
    $a=array();
    while ($row = mysqli_fetch_array($result)) {
        if(!in_array($row['keyword_name'], $a)){
            $a[] = $row['keyword_name'];
        }
    }
}
if ($SearchBy == 'Name') {
    $sql = "SELECT * FROM mainartifact";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
        $a[] = $row['name'];
    }
}

if ($SearchBy == 'Author') {
    $sql = "SELECT * FROM mainartifact";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
        $a[] = $row['author'];
    }
}

if ($SearchBy == 'Category') {
    $sql = "SELECT * FROM category_catalog";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
        $a[] = $row['category_name'];
    }
}

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len = strlen($q);
    foreach ($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;