<?php
require_once 'header.php';
?>

<div class="container " align>
    <div class="row">
        <div class=" col-md-offset-3 col-md-6">
            <br>
            <br>
            <br>
            <div class="well">

                <h2 align="center">ARCHIE! <br> <small>Computerized Textual Artifact Management System</small></h2>
               <div align="center"><img src="archieStyle/ArchieLogo.png" width="100" height="100" ></div>

            </div>
        </div>
    </div>
<br>
    <!--3 Headings-->
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



<script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<?php require_once 'footer.php'; ?>


