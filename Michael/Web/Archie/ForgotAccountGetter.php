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
$email=$_POST['email'];


// Insert data into mysql
$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);

$flag=false;


if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        if($email==$row["email"]){
            $username2="SELECT user.user_name, user.password FROM user WHERE user.email='$email'";
            $user_res=mysqli_query($conn, $username2);

            while($row2 = mysqli_fetch_assoc($user_res)){
                echo $user1;
                echo $pas;
            }
            if ($user_res) {
                echo "Found Email";
            }
            else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        }

            $flag=true;
        }
    }
    if(!$flag){
        echo "Email not found!";
    }

// the message
//$msg = "Username: $user1 \n Password: $pas";
//echo $msg;


// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
echo "Sending email!";
mail("mc11079@gmail.com","Archie: Account Recovery ",$msg);
echo "Email sent";
mysqli_close($conn);
?>