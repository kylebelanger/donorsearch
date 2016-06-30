<?php

// Define global constants
define('DATABASE_NAME', 'donorsearch');
define('DATABASE_USER', 'user');
define('DATABASE_PASS', 'password');
define('DATABASE_HOST', 'localhost');

// Globals for data cache
$city_array = [];
$state_array = [];
$country_array = [];


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
    ini_set('memory_limit', '1256M');

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

            // array to hold seperated data in this line
            $lineData = explode('|', $line);
            $organizations[] = $lineData;
        }
    }

    $tes = array();

    for ($i = 0; $i < 10; $i++) {
        $tes[] = $organizations[$i];
    }

    print_r($tes);
/*
    for ($i = 0; $i < 50000; $i++) {
        $str = $organizations[$i];

        $arr = explode('|', $str);
        insertRecord($arr);
    }
*/

    // close the file
    fclose($file_contents);
}



/*  insertRecord
 *  Insert new record into table
 *
 *  @param Array - array of line data to insert
*/
function insertRecord($record) {

    global $city_array;
    //global $state_array;
    //global $country_array;

    // check city for match
    $city_key = checkMatch($city_array, $record[2]);
    // check state for match
    //$state_key = checkMatch($state_array, $record[3]);
    // check country for match
    //$country_key = checkMatch($country_array, $record[4]);

    // SQL query
    //$sql_insert = "INSERT "

    //print_r($city_array);
}

/*  checkMatch
 *  Check the global array variables for matching key values on this item
 *  to avoid having duplicate data entries in table
 *
 *  @param Array (reference)
 *  @param String - Value to check
 *
 *  @return Int - key value
*/
function checkMatch(&$type, $value) {

      $match = false;
      $return_key = null;

      // for each item in cache
      foreach ($type as $k => $v) {
          if ($value === $v) {
              $return_key = $k;
              $match = true;
          }
      }

      // if match is found
      if ($match == true) {
          // return key value for table reference
          //print("Found match...");
          return $return_key;
      }
      else {
          // add to array
          $type[] = $value;
          // return new key value
          return (count($type) - 1);
      }
}


?>
