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
$docName = $_POST['docName'];
$date = date("Y-m-d");
$empName = $_SESSION["username"];
$author = $_POST['author'];
$lang = $_POST['lang'];

if (!empty($_POST["cat"])) {
    $cat = $_POST['cat'];
}
if (!empty($_POST["sub"])) {
    $sub = $_POST['sub'];
    $parent = $_POST['selectSub'];
}


// Insert into mainartifact Table
$mainArtifactSql = "INSERT INTO mainartifact(name, date, updater_name, author) VALUES ('$docName','$date','$empName','$author')";
$result = mysqli_query($conn, $mainArtifactSql);


//Get document ID
$newDocID = mysqli_insert_id($conn);

//Insert Category into DB

if (!empty($_POST["cat"])) {
    //Check if category already exists
    $check = "SELECT * FROM category_catalog WHERE category_name='$cat'";
    $check_res = mysqli_query($conn, $check);


    if (mysqli_num_rows($check_res) == 0) {
// Insert data into catalog table
        $catalogSql = "INSERT INTO category_catalog(category_name, parent_id) VALUES ('$cat',NULL)";
        $catalogResult = mysqli_query($conn, $catalogSql);
        $catID = mysqli_insert_id($conn);
    }
    else {
        //category already exists
        $getIDSql = "SELECT category_id FROM category_catalog WHERE category_name='$cat'";
        $catalogResult = mysqli_query($conn, $getIDSql);

        while ($row1 = mysqli_fetch_assoc($catalogResult)) {
            $catID = $row1['category_id'];
        }
    }


//Update category table with doc id and category ID
    $addCatSql = "INSERT INTO category(document_id, category_id) VALUES ('$newDocID','$catID')";
    $addCatResult = mysqli_query($conn, $addCatSql);
}

if (!empty($_POST["sub"])) {
    //Check if subCategory already exists
    $check = "SELECT * FROM category_catalog WHERE category_name='$sub'";
    $check_res = mysqli_query($conn, $check);

    //Doesn't exist
    if (mysqli_num_rows($check_res) == 0) {
        //Find parent Id
        $parentSQL = "SELECT category_id FROM category_catalog WHERE category_name='$parent'";
        $parentRes = mysqli_query($conn, $parentSQL);

        while ($prow = mysqli_fetch_assoc($parentRes)) {
            $parentID = $prow['category_id'];
        }

        // Insert data into catalog table
        $catalogSql = "INSERT INTO category_catalog(category_name, parent_id) VALUES ('$sub','$parentID')";
        $catalogResult = mysqli_query($conn, $catalogSql);
        $catID = mysqli_insert_id($conn);
    }
    else {
        //sub-category already exists
        $getIDSql = "SELECT category_id FROM category_catalog WHERE category_name='$sub'";
        $catalogResult = mysqli_query($conn, $getIDSql);

        while ($row1 = mysqli_fetch_assoc($catalogResult)) {
            $catID = $row1['category_id'];
        }
    }

    //Update category table with doc id and category ID
    $addCatSql = "INSERT INTO category(document_id, category_id) VALUES ('$newDocID','$catID')";
    $addCatResult = mysqli_query($conn, $addCatSql);
}


$uploaded=false;

//Retrieve files
if (isset($_FILES['pics']['name'])) {
    //Getting the total number of files
    $count = count($_FILES['pics']['name']);

    if (!$count) {
        echo "No chosen files";
    }
    else {
        // Processing each file iteratively
        for ($i = 0; $i < $count; $i++) {

            $file_name = $_FILES['pics']['name'][$i];
            $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

            //Uploading the file
            $tmp = $_FILES['pics']['tmp_name'][$i];
            $target_dir = $_SERVER["DOCUMENT_ROOT"] . "/files/";

            //move the file to an absolute path
            $target_file = $target_dir . basename($file_name);
            move_uploaded_file($tmp, $target_file);

            $database_pic_file = "/files/" . basename($file_name);

            //call OCR Function (with target file,i, nameWithoutJpeg)
            $txtFile= ocrFunc($database_pic_file, $i, $newDocID, $lang);

            $foundKeywords=searchForKeywords($conn, $txtFile,$newDocID,$lang);

            // Insert path to file
            //relative path the is saved in database
            $database_txt_file = "/files/" .basename($txtFile);
            $docSql = "INSERT INTO document (id, page, picture_file, text_file) VALUES ('$newDocID','$i','$database_pic_file','$database_txt_file')";
            $docResult = mysqli_query($conn, $docSql);

            // if successfully insert data into database, displays message "Successful".
            if ($docResult) {
                $uploaded = true;
            } else {
                $uploaded = false;
                echo mysqli_error($conn);
            }
        }
    }
}

if ($uploaded) {
    echo "<script>
        alert('New document added successfully! Keywords found:".json_encode($foundKeywords)."');
        window.location.href='addArticle.php';
        </script>";
}
else{
    echo "error!";
}




function ocrFunc($target_file, $i,$file_name, $lang){
    $path_parts = pathinfo($target_file);
    $name= $path_parts['filename'];


    //KEY: b521b2e35f2e76a17710fdbfe894505a

    //*******STEP 1: Upload picture file from DB********
        $file = realpath($_SERVER["DOCUMENT_ROOT"] . $target_file);

    //*******STEP 2: Upload files to newOCR server
    //make a POST request to the method's /v1/upload URI and add the query parameter key=api_key
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://api.newocr.com/v1/upload?key=b521b2e35f2e76a17710fdbfe894505a');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_SAFE_UPLOAD, FALSE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array('file' => '@' . $file));
        $result = curl_exec($ch);
        curl_close($ch);

    //if the request succeeds, the server returns the HTTP 200 OK status code along with any metadata:
        /*
         HTTP/1.1 200 OK
        Content-Type: application/json
        {
          "status": "success",
          "data":
          {
            "file_id": "6fa11ac55c10ade5dd4d6126c34d1e08",
            "pages": 257
          }
        }*/

//Response from server in $data array
    $data = json_decode($result, true);

//*******STEP 3: Pull file_id from $data array
   $file_id = $data["data"]["file_id"];

//*******STEP 4: After uploading the file, recognize the page
//make a GET request to the method's /v1/ocr URI and add the query parameters,
    /*
     * Query parameters
    *file_id - file identifier obtained from /v1/upload
    *page - page number in the multi-page documents such as PDF, TIFF, DJVU
    *lang - language(s) used for OCR (allowed values are: afraraazebelbenbulcatceschi_simchi_trachrdan_frakdandeu_frakdeuellengenmepoequesteusfinfrafrkfrmglggrchebhinhrvhunindislita_olditajpnkankorlavlitmalmkdmltmsanldnorosdpolporronrusrus+engslk_frakslkslvspa_oldspasqisrpswaswetamteltglthaturukrukr+engvie
    *psm - page segmentation mode. Allowed values are:
            3 = Fully automatic page segmentation
            6 = Assume a single uniform block of text
    *rotate - image rotation in degrees. Allowed values are: 0, 90, 180, 270
     * */

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://api.newocr.com/v1/ocr?key=b521b2e35f2e76a17710fdbfe894505a&file_id=' . $file_id . '&page=1&lang='.$lang.'&psm=3');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $result = curl_exec($ch);
    curl_close($ch);

//If the request succeeds, the server returns the HTTP 200 OK status code along with any metadata:
    /*
     HTTP/1.1 200 OK
    Content-Type: application/json
    {
      "status": "success",
      "data":
      {
        "text": "Recognized text",
        "progress": "100"
      }
    }
    }*/

    $data = json_decode($result, true);

//*******STEP 5: Pull file text from $text array
    $text = $data["data"]["text"];

//*******STEP 6: Create file and write/ append to it:

    if($i==0){
        $myfile = fopen($_SERVER["DOCUMENT_ROOT"] . "/files/documentNumber".$file_name.".txt", "w") or die("Unable to open file!");
        fwrite($myfile, $text);
        fwrite($myfile,"\n");
        fclose($myfile);
    }
    else{
        $myfile = fopen($_SERVER["DOCUMENT_ROOT"] . "/files/documentNumber".$file_name.".txt", "a") or die("Unable to open file!");
        fwrite($myfile, $text);
        fwrite($myfile,"\n");
        fclose($myfile);
    }

    $file_name = "documentNumber".$file_name.".txt";


    return $file_name;

}
function searchForKeywords($conn, $txtFile, $newDocID, $lang){


    //Find Keywords
    $readFile=fopen($_SERVER["DOCUMENT_ROOT"]. "/files/".basename($txtFile),"r") or die("Unable to open file!");
    //Read text from file
    $readText=fread($readFile,filesize($_SERVER["DOCUMENT_ROOT"]. "/files/".basename($txtFile)));

    //disregard punctuation
    $readText= str_replace("."," ",$readText);
    $readText= str_replace(","," ",$readText);
    $readText= str_replace("!"," ",$readText);
    $readText= str_replace("?"," ",$readText);
    $readText= str_replace(":"," ",$readText);

    $foundKeywords = array();


    if($lang=='eng') {
        //retreive keywords from DB
        $findKeywords = "SELECT * FROM keyword_catalog";
        $keywordResult = mysqli_query($conn, $findKeywords);

        //Remove upercase letters
        $lowercaseTxt = strtolower($readText);


        while ($rowKey = mysqli_fetch_assoc($keywordResult)) {
            $keyword = $rowKey['keyword_name'];
            $keyid = $rowKey['keyword_id'];

            //if keyword found in text insert into DB
            if (strpos($lowercaseTxt, $keyword) !== false) {
                $addkeywordSql = "INSERT INTO keywords(document_id , keyword_id) VALUES ('$newDocID','$keyid')";
                $addkeywordResult = mysqli_query($conn, $addkeywordSql);
                if (!in_array($keyword, $foundKeywords)) {
                    $foundKeywords[] = $keyword;
                }
            }
        }
    }
    if($lang=='heb'){
        $hebrewKeywords = array("1"=>"יהודי", "2"=>"תרבות", "3"=>"נכס", "4"=>"לאבמאמר", "5"=>"פלאפון",
                                "6"=>"מחשב", "7"=>"רכב", "8"=>"רדיו", "9"=>"הייטק", "10"=>"אינטרנט",
                                "11"=>"פלאפון", "12"=>"אינטרנט", "13"=>"עיתון", "14"=>"מילים", "15"=> "עמודים",
                                "16"=>"מלחמה", "17"=>"היטלר", "18"=> "גרמניה", "19"=> "יהודי", "20"=> "פלאפון",
                                "21"=>"פייסבוק", "22"=>"עברית", "23"=>"אנגלית", "24"=>"ירושלים", "25"=>"רוק",
                                "26"=>"מילים", "27"=>"תעשייה", "28"=>"בעלות הברית", "29"=>"עצמאות", "30"=>"מזרח התיכון",
                                "31"=>"תרגום", "32"=>"מפתח", "33"=>"כתיבה", "34"=>"טעיות", "35"=>"סרט",
                                "36"=>"אצבע", "37"=>"עתיק", "38"=> "מרשטת", "39"=> "השטג", "40"=>"מפורסמים",
                                "41"=> "אינטרנט", "42"=>"מלה", "43"=>"מכונה", "44"=>"לאום", "45"=>"הסוכנות היהודית",
                                "46"=>"גולן", "47"=>"תזמורת", "48"=>"להקה", "49"=>"החיפושיות", "50"=>"פסטיבל",
                                "51"=>"קפיטליסטים", "52"=>"כסף", "53"=> "ארגון", "54"=>"בעלי מניות", "55"=>"אהבה",
                                "56"=>"מערכת יחסים", "57"=>"נפש");
        foreach($hebrewKeywords as $keyid => $keyword) {
            if (strpos($readText, $keyword) !== false) {
                $addkeywordSql = "INSERT INTO keywords(document_id , keyword_id) VALUES ('$newDocID','$keyid')";
                $addkeywordResult = mysqli_query($conn, $addkeywordSql);
                if (!in_array($keyword, $foundKeywords)) {
                    $foundKeywords[] = $keyword;
                }
            }
        }
    }
    //close file
    fclose($readFile);

    return $foundKeywords;

}
?>
