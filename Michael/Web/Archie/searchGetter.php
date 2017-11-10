<?php
require_once 'header.php';
?>

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <br>
                <!--Open Table-->
                <h1 class="text-center">Search Results: </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <!--Table-->
                <div class="table-responsive">
                    <table class="table table-hover text-center">
                        <thead>
                        <tr>
                            <th style='display: none'>ID:</th>
                            <th></th>
                            <th>Name:</th>
                            <th>Category:</th>
                            <th>Date:</th>
                            <th>Author:</th>
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

                        // Get values from form
                        $SearchBy = $_POST['mySelect'];
                        $text = $_POST['searchByText'];
                        $modals="";
                        //Search database by type of search
                        if ($SearchBy == 'Key Word') {
                            $sql = "SELECT * FROM keywords, keyword_catalog, mainartifact, category, category_catalog, document WHERE mainartifact.document_id=category.document_id AND mainartifact.document_id=document.id AND document.page=0 AND category.category_id=category_catalog.category_id AND keywords.document_id=mainartifact.document_id AND keyword_catalog.keyword_id = keywords.keyword_id AND keyword_catalog.keyword_name='$text'";
                            $result = mysqli_query($conn, $sql);

                        }
                        if ($SearchBy == 'Name') {
                            $sql = "SELECT * FROM mainartifact, category, category_catalog, document WHERE mainartifact.document_id=category.document_id AND mainartifact.document_id=document.id AND document.page=0 AND category.category_id=category_catalog.category_id AND mainartifact.name='$text'";
                            $result = mysqli_query($conn, $sql);

                        }
                        if ($SearchBy == 'Author') {
                            $sql = "SELECT * FROM mainartifact, category, category_catalog, document WHERE mainartifact.document_id=category.document_id AND mainartifact.document_id=document.id AND document.page=0 AND category.category_id=category_catalog.category_id AND mainartifact.author='$text'";
                            $result = mysqli_query($conn, $sql);

                        }

                        if ($SearchBy == 'Category') {
                            $cats = array();
                            $i = 0;
                            $j = 1;
                            $stop = 0;

                            //Find root category
                            $sql1 = "SELECT category_id FROM category_catalog WHERE category_name='$text'";
                            $result = mysqli_query($conn, $sql1);

                            //check if root is in database
                            if (mysqli_num_rows($result) == 0) {
                                $stop = 1;
                                echo "<script>
                                        alert(\"Category does not exist\");
                                        window.location.href='search.php';
                                      </script>";
                            } else {
                                //Insert root into category array
                                $cats[$i] = $text;
                            }

                            //Enter loop as long as result is found and reached end of cats array
                            while ($stop != 1) {
                                $i = $i + 1;

                                //Find subcategories
                                $sql = "SELECT category_name FROM (SELECT category_id FROM category_catalog WHERE category_name='$text') AS combined, category_catalog WHERE combined.category_id = category_catalog.parent_id";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_array($result)) {   //Loop though results

                                    //insert category name into array
                                    $cats[$j] = $row['category_name'];

                                    $j = $j + 1;
                                    $text = $cats[$i];
                                }

                                //Reached end of array
                                if (mysqli_num_rows($result) == 0 && $i == $j) {
                                    $stop = 1;
                                }
                            }

                            $i = 0;
                            $counter = 0;

                            //holds string of modals

                            while ($i < count($cats)) {
                                $rowsOfTable = "SELECT * FROM mainartifact, category, category_catalog, document WHERE mainartifact.document_id=category.document_id AND mainartifact.document_id=document.id AND document.page=0 AND category.category_id=category_catalog.category_id AND category_catalog.category_name='$cats[$i]'";
                                $rowsOfTableRes = mysqli_query($conn, $rowsOfTable);

                                if (mysqli_num_rows($rowsOfTableRes) == 0) {
                                    $counter = $counter + 1;
                                }

                                while ($rowcat = mysqli_fetch_array($rowsOfTableRes)) {   //Creates a loop to loop through result


                                    //Print rows of table
                                    echo "<tr><td style='display: none'>" . $rowcat['document_id'] . "</td>
                                                      <td><img src=\"" . $rowcat['picture_file'] . "\" class=\"img-thumbnail\" width=\"80\" height=\"80\">
                                                      <br> <a href=\"" . $rowcat['text_file'] . "\" download='" . $rowcat['document_id'] . "-" . basename($rowcat['text_file']) . "'>  <input class=\"btn btn-primary btn-xs\" type=\"button\"  value=\"Download\"> </a>
                                                          <button class=\"btn btn-info btn-xs \" data-toggle=\"modal\" data-target='#firstModal".$rowcat['id']."' ".$rowcat['picture_file'].")'><span class='glyphicon glyphicon-search'></span></button>
                                                      </td>
                                                      <td>" . $rowcat['name'] . "</td> 
                                                      <td>" . $rowcat['category_name'] . "</td>
                                                      <td>" . $rowcat['date'] . "</td>
                                                      <td>" . $rowcat['author'] . "</td></tr>";
                                    //Strings modals
                                    $modals.=getModal($rowcat);
                                }
                                $i = $i + 1;
                            }

                            //Category exists but not documents are found for category
                            if ($counter == $i) {
                                echo "<script>
                                        alert(\"No documents found for this Category\");
                                        window.location.href='search.php';
                                        </script>";
                            }
                        }

                        //Print rows for other searchBy's
                        if ($SearchBy != 'Category') {
                            while ($row = mysqli_fetch_array($result)) {   //Creates a loop to loop through result
                                $modals.=getModal($row);
                                echo "<tr><td style='display: none'>" . $row['document_id'] . "</td>
                                                      <td><img src=\"" . $row['picture_file'] . "\" class=\"img-thumbnail\" width=\"80\" height=\"80\">
                                                      <br> <a href=\"" . $row['text_file'] . "\" download='" . $row['document_id'] . "-" . basename($row['text_file']) . "'>  <input class=\"btn btn-primary btn-xs\" type=\"button\"  value=\"Download\"> </a>
                                                          <button class=\"btn btn-info btn-xs \" data-toggle=\"modal\" data-target='#firstModal".$row['id']."' ".$row['picture_file'].")'><span class='glyphicon glyphicon-search'></span></button>
                                                      </td>
                                                      <td>" . $row['name'] . "</td> 
                                                      <td>" . $row['category_name'] . "</td>
                                                      <td>" . $row['date'] . "</td>
                                                      <td>" . $row['author'] . "</td></tr>";                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="col-lg-3"></div>
    </div>
</div>

<?php echo $modals;?>
</div>
<!-- /#page-content-wrapper -->

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



