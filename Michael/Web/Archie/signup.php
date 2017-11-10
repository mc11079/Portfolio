<?php
require_once'header.php';
$_SESSION['role']="Sign Up";


?>

<div class="container">
    <div class="row">
        <div class=" col-md-offset-3 col-md-6">
            <h2 class="text-center">Archie <br>
                <small class="text-center">Computerized Artifact Management System</small>
            </h2>

            <div class="well">

                <h2>Sign Up <br>
                    <small>Please fill in the following fields:</small></h2>


                <!--form-->
                <form class="form-horizontal" action="SignUpGetter.php" method="POST">

                    <!--Name-->
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Name:</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="name" type="text" name="name" placeholder="Your Full Name">
                        </div>
                    </div>

                    <!--Username-->
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="username">Username:</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="username" type="text" name="username"
                                   placeholder="Username">
                        </div>
                    </div>
                    <!--Password-->
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="password">Password:</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="password" type="password" name="password"
                                   placeholder="Password">
                        </div>
                    </div>
                    <!--Email-->
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="email" type="email" name="email"
                                   placeholder="Valid Email Address">
                        </div>
                    </div>
                    <!--Radio-->
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="role">Role:</label>
                        <div class="col-sm-10">
                            <div class="radio">
                                <label><input id="role" type="radio" name="role" value="Researcher">Researcher</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="role" value="Archive Employee"> Archive
                                    Employee</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="role" value="Manager"> Manager</label>
                            </div>
                        </div>
                    </div>
                    <!--submit-->
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Sign In</button>
                        </div>
                    </div>
                </form>



            </div>

        </div>
    </div>


</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<?php require_once 'footer.php';?>



