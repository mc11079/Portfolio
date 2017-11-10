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

//KEY: 0381bb41bb95ddcc7915524f3ce6abbe

//*******STEP 1: Upload picture file from DB********
$file = realpath($_SERVER["DOCUMENT_ROOT"] . "/files/TestOCR.jpg");

//*******STEP 2: Upload files to newOCR server
//make a POST request to the method's /v1/upload URI and add the query parameter key=api_key
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://api.newocr.com/v1/upload?key=0381bb41bb95ddcc7915524f3ce6abbe');
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
//var_dump($data);

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
curl_setopt($ch, CURLOPT_URL, 'http://api.newocr.com/v1/ocr?key=0381bb41bb95ddcc7915524f3ce6abbe&file_id=' . $file_id . '&page=1&lang=eng&psm=3');
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
var_dump($data);

//*******STEP 5: Pull file text from $text array
$text = $data["data"]["text"];
echo $text;

//*******STEP 6: Create file and write/ append to it:
//**Name??

//if first page:
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = "Mickey Mouse\n";
fwrite($myfile, $txt);
$txt = "Minnie Mouse\n";
fwrite($myfile, $txt);
fclose($myfile);

//else
$myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
$txt = "Mickey Mouse\n";
fwrite($myfile, $txt);
$txt = "Minnie Mouse\n";
fwrite($myfile, $txt);
fclose($myfile);





?>
