<?php
// Start the session
session_start();
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
$user_name=$_POST['username'];
$password=$_POST['password'];



// Insert data into mysql
$sql = "SELECT user_name, password, role, approved FROM user WHERE user_name='$user_name' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    //** 1. Check approval 2. redirect to correct page.  */
    while($row = mysqli_fetch_assoc($result)) {


        if ($row["approved"] == 1) {
            $role = $row["role"];

            // Set session variables
            $_SESSION['username'] = $user_name;
            $_SESSION['role']=$role;

            header("Location:home.php");

        } else {
            //echo "<div class=\"alert alert-success\">User not approved by system manager.</div>";
            echo "<script>
        alert(\"Not approved by system manager\");
            window.location.href='welcomePage.php';
                   </script>";
        }
    }

    }
else{

    echo" <script>
         alert(\"User does not exist\");
        window.location.href='welcomePage.php';
        </script>";

}

mysqli_close($conn);
?>



