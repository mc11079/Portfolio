<?php

require_once 'header.php';
?>
<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <br>
                <h1 class="text-center">Search for Documents</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="well col-lg-6">

                <!--form-->
                <form class="form-horizontal" action="searchGetter.php" method="POST" autocomplete="off">

                    <!--Search By Select-->
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="mySelect">Search:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="mySelect" name="mySelect" onchange="myFunction2(this.id)">
                                <option value="Nothing">Select...</option>
                                <option value="Key Word">Key Word</option>
                                <option value="Category">Category</option>
                                <option value="Name">Name</option>
                                <option value="Author">Author</option>
                            </select>
                        </div>
                    </div>
                    <div id="txtHint"></div>

                    <!--Search By Text-->
                    <div class="form-group" style="display: none" id="text1">
                        <label class="control-label col-sm-2" for="mySelect">Text:</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="searchByText" type="text" name="searchByText" placeholder="Insert text"  onkeyup="showHint(this.value)">
                            <br><br>
                            <label id="showMe">Suggestions: <span id="suggestions"></span></label>
                        </div>
                    </div>
                    <!--submit-->
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Search</button>
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

            //document.getElementById("searchByText").style.visibility = 'visible';
            //document.getElementById("text").style.visibility = 'visible';
            //document.getElementById("showMe").style.visibility = 'visible';
            document.getElementById("text1").style.display='block';
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
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<?php require_once 'footer.php';?>









