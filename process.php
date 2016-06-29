<?php

// Define global constants
define('DATABASE_NAME', 'donorsearch');
define('DATABASE_USER', 'user');
define('DATABASE_PASS', 'password');
define('DATABASE_HOST', 'localhost');

// Include database class
include_once('php/database.php');

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
    // set memory limit
    ini_set('memory_limit', '256M');

    // get the file contents
    $file_contents = fopen($file["tmp_name"], "r");

    // declare array to hold each line in file
    $organizations = array();

    // for each line in file
    while (!feof($file_contents)) {
        // get current line in file
        $line = fgets($file_contents);

        // if line is empty or blank, skip
        if (($line !== " ") && ($line !== "") && (strlen($line) > 2)) {
            // push line to array
            $organizations[] = $line;
        }
    }

    $arr = array();

    for ($i = 0; $i < 10; $i++) {
      # code...
      $arr[] = $organizations[$i];
    }

    print_r($arr);

    // close the file
    fclose($file_contents);
}



/*  insertRecord
 *  Insert new record into table
 *
 *  @param Array - array of line data to insert
*/
function insertRecord($record) {

}


?>
