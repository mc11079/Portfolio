<?php

require_once 'header.php';
?>
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <br>
                        <h1 class="text-center">Approved Users: </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <!--Table-->
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Username:</th>
                                    <th>Role:</th>
                                </tr>
                                </thead>
                                <tbody>

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

        //***** APPROVED USERS************

        // Insert data into mysql
        $sql = "SELECT user_name, role FROM user WHERE approved=1";
        $result = mysqli_query($conn, $sql);
        $i=1;

        while ($row = mysqli_fetch_array($result)) {   //Creates a loop to loop through results
            echo "<tr><td> <button onclick=\"deleteT1Func($i)\" type=\"button\" class=\"btn btn-default btn-sm\"><span class=\"glyphicon glyphicon-remove\"></span></button></td>
                      <td>" . $row['user_name'] . "</td>
                      <td>" . $row['role'] . "</td></tr>";
            $i++;
        }

        echo "</table>"; //Close the table in HTML

        echo "<div id=\"option\"></div>"

        //***** UNAPPROVED USERS************
        ?>
                                </tbody>
                            </table>
                        </div>


        <br><br>
                        <h1 class="text-center">Unapproved Users: </h1>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Username:</th>
                                    <th>Role:</th>
                                </tr>
                                </thead>
                                <tbody>

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

            // Insert data into mysql
            $sql0 = "SELECT user_name, role FROM user WHERE approved=0";
            $result0 = mysqli_query($conn, $sql0);
            $j=1;

            while ($row = mysqli_fetch_array($result0)) {   //Creates a loop to loop through results
                echo "<tr><td> <button onclick=\"deleteT2Func($j)\" type=\"button\" class=\"btn btn-default btn-sm\"><span class=\"glyphicon glyphicon-remove\"></span></button></td>
                      <td> <button onclick=\"approveFunc($j)\" type=\"button\" class=\"btn btn-default btn-sm\"><span class=\"glyphicon glyphicon-ok\"></span></button></td>
                      <td>" . $row['user_name'] . "</td>
                      <td>" . $row['role'] . "</td></tr>";
                $j++;
            }

            echo "</table>"; //Close the table in HTML
            echo "<div id=\"option2\"></div>"

            ?>

            <br><br><br>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>

        <script>
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>
        <script>

            function deleteT1Func(num) {
                var con=confirm('Are you sure you want to delete?');
                if(con==true){
                    var myAction= "deleteT1";
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            eval(xmlhttp.responseText);
                            console.log(xmlhttp.responseText);
                            window.location.reload();
                        }
                    };
                    xmlhttp.open("GET", "Delete&Add.php?myAction="+ myAction +"&num="+num, true);
                    xmlhttp.send();
                }
            }
            function deleteT2Func(num) {
                var con=confirm('Are you sure you want to delete?');
                if(con==true){
                    var myAction= "deleteT2";
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            eval(xmlhttp.responseText);
                            console.log(xmlhttp.responseText);
                            window.location.reload();
                        }
                    };
                    xmlhttp.open("GET", "Delete&Add.php?myAction="+ myAction +"&num="+num, true);
                    xmlhttp.send();
                }
            }

            function approveFunc(num) {
                var myAction= "approve";
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        eval(xmlhttp.responseText);
                        console.log(xmlhttp.responseText);
                        window.location.reload();
                    }
                };
                xmlhttp.open("GET", "Delete&Add.php?myAction="+ myAction + "&num="+num, true);
                xmlhttp.send();
            }

        </script>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
                integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
                crossorigin="anonymous"></script>
        <?php require_once 'footer.php';?>


