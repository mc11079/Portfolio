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

// Get values from form
$name=$_POST['name'];
$user_name=$_POST['username'];
$password=$_POST['password'];
$role=$_POST['role'];
$email=$_POST['email'];


if($role=='Manager'){

    //auto approve manager users
    $sql = "INSERT INTO user (name,user_name,password,role,email,approved) VALUES ('$name','$user_name','$password','$role','$email',1)";
    $result=mysqli_query($conn, $sql);
}
else{
    $sql = "INSERT INTO user (name,user_name,password,role,email) VALUES ('$name','$user_name','$password','$role','$email')";
    $result=mysqli_query($conn, $sql);
}

// if successfully insert data into database, displays message "Successful". 
if($result){
    echo "<script>
        window.location.href='../welcomePage.php';
        </script>";
}

else {
    echo mysqli_error($conn);
}
?>

<?php
// close connection 
mysqli_close($conn);
?>



