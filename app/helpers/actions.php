<?php

/*  actions
 *  Performs various GET operations and queries on the database
 *  Returns HTML string data response (i.e. "<table><tr></tr></table>") to display on view
 *
*/

// Define global constants
define('DATABASE_NAME', 'donorsearch');
define('DATABASE_USER', 'user');
define('DATABASE_PASS', 'password');
define('DATABASE_HOST', 'localhost');

// Include database class
include_once("../assets/php/database.php");

// Create new database object
$DB = new DBPDO();

// Get the query from request
$query = json_decode($_GET['q'], true);

// default records
$records = null;


/*  If filter is not null?
 *  ________________________________
*/
if ($query[1] != "") {
      // Initial records
      $records = $DB->fetchAll("SELECT * FROM organization
                                WHERE $query[0] LIKE '%$query[1]%' LIMIT 1050");

      // print table on DOM
      echo("<table>
              <tr class='header'>
                <td>EIN</td>
                <td>Organization</td>
                <td>City</td>
                <td>State</td>
                <td>Country</td>
                <td>Description</td>
              </tr>");

      // foreach record
      foreach ($records as $key => $value) {
        // grid formatting
        $class = "blank";
        if ($key % 2 == 0) {
            $class = "highlight";
        }
        // print record
        echo("<tr class='{$class}'>
                <td>{$value['ein']}</td>
                <td>{$value['legal_name']}</td>
                <td>{$value['city_name']}</td>
                <td>{$value['state_name']}</td>
                <td>{$value['country_name']}</td>
                <td>{$value['description']}</td>
              </tr>");
      }

      echo("</table>");
}
/*  else perform sorting operations
 *  ________________________________
*/
else {
    /*  query key: "legal_name"
     *  ________________________________
    */
    if ($query[0] == "legal_name") {
          // Initial records
          $records = $DB->fetchAll("SELECT * FROM organization
                                    LIMIT 30");

          // print table on DOM
          echo("<table>
                  <tr class='header'>
                    <td>EIN</td>
                    <td>Organization</td>
                    <td>City</td>
                    <td>State</td>
                    <td>Country</td>
                    <td>Description</td>
                  </tr>");

          // foreach record
          foreach ($records as $key => $value) {
            // grid formatting
            $class = "blank";
            if ($key % 2 == 0) {
                $class = "highlight";
            }
            // print record
            echo("<tr class='{$class}'>
                    <td>{$value['ein']}</td>
                    <td>{$value['legal_name']}</td>
                    <td>{$value['city_name']}</td>
                    <td>{$value['state_name']}</td>
                    <td>{$value['country_name']}</td>
                    <td>{$value['description']}</td>
                  </tr>");
          }

          echo("</table>");
    }
    /*  query key: "city_name"
     *  ________________________________
    */
    elseif ($query[0] == "city_name") {
          // Initial records
          $records = $DB->fetchAll("SELECT * FROM organization
                                    WHERE city_name IS NOT NULL
                                          and trim(coalesce(city_name, '')) <>''
                                    GROUP BY city_name
                                    ORDER BY city_name
                                    LIMIT 30");

          // print table on DOM
          echo("<table>
                  <tr class='header'>
                    <td>EIN</td>
                    <td>Organization</td>
                    <td>City</td>
                    <td>State</td>
                    <td>Country</td>
                    <td>Description</td>
                  </tr>");

          // foreach record
          foreach ($records as $key => $value) {
            // grid formatting
            $class = "blank";
            if ($key % 2 == 0) {
                $class = "highlight";
            }
            // print record
            echo("<tr class='{$class}'>
                    <td>{$value['ein']}</td>
                    <td>{$value['legal_name']}</td>
                    <td>{$value['city_name']}</td>
                    <td>{$value['state_name']}</td>
                    <td>{$value['country_name']}</td>
                    <td>{$value['description']}</td>
                  </tr>");
          }

          echo("</table>");
    }
    /*  query key: "state_name"
     *  ________________________________
    */
    elseif ($query[0] == "state_name") {
          // Initial records
          $records = $DB->fetchAll("SELECT state_name, COUNT(*)
                                    FROM organization
                                    WHERE state_name IS NOT NULL
                                          and trim(coalesce(state_name, '')) <>''
                                    GROUP BY state_name
                                    ORDER BY state_name");

          // print table on DOM
          echo("<table>
                  <tr class='header'>
                    <td>State Name</td>
                    <td>Record Count</td>
                  </tr>");

          // foreach record
          foreach ($records as $key => $value) {
            // grid formatting
            $class = "blank";
            if ($key % 2 == 0) {
                $class = "highlight";
            }
            // print record
            echo("<tr class='{$class}'>
                    <td>{$value['state_name']}</td>
                    <td>{$value['COUNT(*)']}</td>
                  </tr>");
          }

          echo("</table>");
    }
    /*  query key: "foundation"
     *  ________________________________
    */
    elseif ($query[0] == "foundation") {
          // Initial records
          $records = $DB->fetchAll("SELECT * FROM organization
                                    WHERE legal_name LIKE '%foundation%' LIMIT 30");

          // print table on DOM
          echo("<table>
                  <tr class='header'>
                    <td>EIN</td>
                    <td>Organization</td>
                    <td>City</td>
                    <td>State</td>
                    <td>Country</td>
                    <td>Description</td>
                  </tr>");

          // foreach record
          foreach ($records as $key => $value) {
            // grid formatting
            $class = "blank";
            if ($key % 2 == 0) {
                $class = "highlight";
            }
            // print record
            echo("<tr class='{$class}'>
                    <td>{$value['ein']}</td>
                    <td>{$value['legal_name']}</td>
                    <td>{$value['city_name']}</td>
                    <td>{$value['state_name']}</td>
                    <td>{$value['country_name']}</td>
                    <td>{$value['description']}</td>
                  </tr>");
          }

          echo("</table>");
    }
}

?>
