<?php

require_once 'header.php';
$_SESSION['role']="Welcome!";


?>

<div class="container ">
    <div class="row">
        <div class=" col-md-offset-3 col-md-6">
            <br>
            <br>
            <br>
            <div class="well">

                <h2>Login</h2>

                <!--form-->
                <form class="form-horizontal" action="WelcomePageGetter.php" method="POST" >

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
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="Password">
                        </div>
                    </div>
                    <!--submit-->
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Login</button>
                        </div>
                    </div>
                </form>
                <a href="signup.php" type="button" class="btn btn-link">Sign up</a> <br>
                <a href="forgotAccount.php" type="button" class="btn btn-link">Forgot Account?</a>


            </div>

        </div>
    </div>

    <div class="row" align="center">
        <div class="row">
            <div class="col-md-4">
                <img class="img-circle" src="archieStyle/icon_convert.png" alt="Translate Image" width="140" height="140">
                <h2>Convert Articles</h2>
                <p>Conversion of articles scanned as <code>.JPEG, .PNG, .GIF, .BMP, .TIFF, .PDF, .DjVu</code> to <code>text</code>
                    for an easy referencing and searching experience.</p>
            </div><!-- /.col-lg-4 -->
            <div class="col-md-4">
                <img class="img-circle" src="archieStyle/searchPic.png" alt="Generic placeholder image" width="140" height="140">
                <h2>Search Articles</h2>
                <p>Articles saved in a organized database for easy retrieval. Search database by title, author, key words and categories.</p>
            </div><!-- /.col-lg-4 -->
            <div class="col-md-4">
                <img class="img-circle" src="archieStyle/savePic.png" alt="Generic placeholder image" width="140" height="140">
                <h2>Save Articles</h2>
                <p>After browsing, save articles that interest you for future reference.</p>
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->

    </div>

</div>

<!--3 Headings-->









<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<?php require_once 'footer.php';?>



