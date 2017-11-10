<?php

include 'header.php';
$txtFiles="";
?>
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <br>
                        <h1 class="text-center">Add Article: </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="well col-lg-6">

                        <!--form-->
                        <form class="form-horizontal" action="AddDocGetter.php" method="POST" enctype="multipart/form-data">



                            <!--Article Name Input-->
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="docName">Name:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="docName" value="" type="text" name="docName" placeholder="Article Name">
                                </div>
                            </div>


                            <!--Article Author Input-->
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="author">Author:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="author" type="text" name="author" placeholder="Artifact Author" />
                                </div>
                            </div>

                            <!--Category Radio-->
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="cate">Category:</label>
                                <div class="col-sm-10">
                                    <div class="radio">
                                        <label><input id ="cate" name="cate" type="radio" value="Category" onclick="catPicked('CategoryTxt')">Category</label>
                                    </div>
                                    <div class="radio">
                                        <label><input id ="subMain" name="cate" type="radio" value="Sub-Category" onclick="subPicked('CategoryTxt')">Sub-Category</label>
                                    </div>

                                    <div id="SubSelect"></div>
                                    <div  id="CategoryTxt"></div>

                                </div>
                            </div>

                            <!-- Upload Image -->
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="pics">Images:</label>
                                <div class="col-sm-10">
                                    <input class="file" id="pics" type="file" name="pics[]" multiple data-show-upload="false" data-show-caption="true">

                               </div>
                            </div>

                            <!--Language Radio-->
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="lang">Language:</label>
                                <div class="col-sm-10">
                                    <div class="radio">
                                        <label><input id ="hebrew" name="lang" type="radio" value="heb">Hebrew</label>
                                    </div>
                                    <div class="radio">
                                        <label><input id ="english" name="lang" type="radio" value="eng">English</label>
                                    </div>

                                </div>
                            </div>

                            <!--submit-->
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3"></div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
</div>
<!-- /#wrapper -->
<script>

    function myFunction2(selection) {

        var thisSelection = document.getElementById(selection).value;
        if (thisSelection == "") {
            document.getElementById("mySelect").innerHTML = "";
            return;
        }

        if (thisSelection == 'Name' || thisSelection == 'Author' || thisSelection == 'Key Word' ||thisSelection=='Category') {

            document.getElementById("searchByText").style.visibility = 'visible';
            document.getElementById("text").style.visibility = 'visible';
            document.getElementById("showMe").style.visibility = 'visible';
        }
    }
    function showHint(str) {
        var thisSelection = document.getElementById("mySelect").value;
        if (str.length == 0) {
            document.getElementById("suggestions").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("suggestions").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "Suggestions.php?q=" + str +"&thisSelection="+thisSelection, true);
            xmlhttp.send();
        }
    }


</script>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
<script>
    function catPicked(divName){
        $("#SubSelect").html("");
        $("#SubTextContainer").remove();
        $("#CatTextContainer").remove();
        var newdiv = document.createElement('div');
        newdiv.setAttribute("id","CatTextContainer");
        newdiv.innerHTML = "Category: <input class='form-control' type='text' name='cat' id='CatText' placeholder='Category'>";
        document.getElementById(divName).appendChild(newdiv);
    }
    function subPicked(divName){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {

                document.getElementById("SubSelect").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "Sub-Category.php", true);
        xmlhttp.send();

        $("#SubTextContainer").remove();
        $("#CatTextContainer").remove();
        var newdiv = document.createElement('div');
        newdiv.setAttribute("id","SubTextContainer");
        newdiv.innerHTML = "Sub Category: <input class='form-control' type='text' name='sub' id='SubText' placeholder='SubCategory'>";
        document.getElementById(divName).appendChild(newdiv);
    }
</script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<?php include 'footer.php';?>

</body>
</html>



