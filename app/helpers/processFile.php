<?php

// Define global constants
define('DATABASE_NAME', 'donorsearch');
define('DATABASE_USER', 'user');
define('DATABASE_PASS', 'password');
define('DATABASE_HOST', 'localhost');

// Include database class
include_once($_SERVER['DOCUMENT_ROOT'] . "/app/assets/php/db.php");

// Create new database object
$DB = new DBPDO();

// If uploaded file is valid
if(fileValidation($_FILES["file"]) == true) {
    // perform processing
    processFile($_FILES["file"]);
}
else {
    // return error
    echo "File is invalid";
}


/*  fileValidation
 *  Ensure that the file is a .txt format
 *
 *  @param Array - file metadata for processing
 *  @return boolean - file valid
*/
function fileValidation($file) {
    if ($file["type"] == "text/plain") {
        return true;
    }
    else {
        return false;
    }
}

/*  processFile
 *  Process the submitted file
 *
 *  @param Array - file for processing
*/
function processFile($file) {

    // Get global variable
    global $DB;

    // change file permission to read
    chmod($file["tmp_name"], 0444);

    // file contents
    $file_contents = $file["tmp_name"];

    $SQL_statement = "LOAD DATA INFILE '$file_contents' INTO TABLE organization FIELDS TERMINATED BY '|'
                        LINES TERMINATED BY '\n' IGNORE 2 LINES
                        (ein, legal_name, city_name, state_name, country_name, description);";

    // Run SQL query
    $DB->execute($SQL_statement);

    // redirect message
    echo("Upload complete... Redirecting.");

    // Complete? Re-direct to display page
    header('Location: ../views/display.php');
}



?>
