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

echo "Parent Category: <select name = 'selectSub' >";
echo "<option>Select Parent Category</option>";

$sql = "SELECT * FROM category_catalog ";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
    $a[] = $row['category_name'];
}
foreach ($a as $name){
    echo "<option value=$name> $name</option>";
}
echo "</select>";