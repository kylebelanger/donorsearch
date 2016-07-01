<?php

// Define global constants
define('DATABASE_NAME', 'donorsearch');
define('DATABASE_USER', 'user');
define('DATABASE_PASS', 'password');
define('DATABASE_HOST', 'localhost');

// Include database class
include_once("../assets/php/database.php");

// Create new database object
$DB = new DBPDO();

// Initial records
$records = $DB->fetchAll("SELECT * FROM organization LIMIT 30");

?>

<!DOCTYPE html>
<html>

  <head>
      <meta charset="utf-8">
      <title>DonorSearch</title>
      <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    </head>

  <body>
      <h2>DonorSearch</h2>
      <p>Example for filtering non-profit organizations from <a href="https://apps.irs.gov/app/eos/forwardToPub78Download.do">IRS dataset</a>.</p>

      <hr>

      <p>Please use the options below to filter and sort the data. Currently displaying <u><?php echo(count($records)); ?> records</u>.</p>

      <ul>
        <li>
            <form action="?" method="get">
              <select>
                <option value="City">All</option>
                <option value="City">City</option>
                <option value="State">State</option>
                <option value="Foundation">By type: 'Foundation'</option>
              </select>
            </form>
        </li>
        <li>
          <form action="?" method="get">
            <input type="text" placeholder="Filter data">
            <input type="submit">
          </form>
        </li>
      </ul>

      <table>
        <tr class="header">
          <td>EIN</td>
          <td>Organization</td>
          <td>City</td>
          <td>State</td>
          <td>Country</td>
          <td>Description</td>
        </tr>

      <?php
        foreach ($records as $key => $value) {
          // grid formatting
          $class = "blank";
          if ($key % 2 == 0) {
              $class = "highlight";
          }
          // for each record
          echo("<tr class='{$class}'>
                  <td>{$value['ein']}</td>
                  <td>{$value['legal_name']}</td>
                  <td>{$value['city_name']}</td>
                  <td>{$value['state_name']}</td>
                  <td>{$value['country_name']}</td>
                  <td>{$value['description']}</td>
                </tr>");
        }
      ?>

    </table>

  </body>

  <script src="../assets/js/actions.js">
  </script>

</html>
