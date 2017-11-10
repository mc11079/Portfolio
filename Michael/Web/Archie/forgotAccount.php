<?php
require_once 'header.php';
$_SESSION['role']="Forgot Account";


?>
<div class="container">
    <div class="row">
        <div class=" col-md-offset-3 col-md-6">
            <h2 class="text-center">Archie <br>
                <small class="text-center">Computerized Artifact Management System</small>
            </h2>

            <div class="well">

                <h2>Forgot Account <br>
                    <small>Please fill in the following field:</small>
                </h2>

                <!--form-->
                <form class="form-horizontal" action="old/ForgotAccountGetter.php" method="POST">

                    <!--Email-->
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="email" type="email" name="email"
                                   placeholder="Registered Email Address">
                        </div>
                    </div>

                    <!--submit-->
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Find</button>
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



