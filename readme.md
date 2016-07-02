# DonorSearch

Web development example for filtering non-profit organizations from [IRS data](https://apps.irs.gov/app/eos/forwardToPub78Download.do).

## Description

Included below is a brief overview of the project structure and workflow.

### Structure

This web application features two views:
  * [index.html](https://github.com/kylesb/donorsearch/blob/master/index.html)

  The first page allows text/plain files to be uploaded via a form. File validation is performed on the client-side via HTML5 `input type='text/plain'`, as well as on the server-side via PHP.

  * [/app/views/display.html](https://github.com/kylesb/donorsearch/blob/master/app/views/display.php)

  The second page displays data in the view, and provides various sorting and filtering options.

  The directory tree of the project is outlined below with comments.

  ```sql
  -- contains core application files
  - app
        -- application assets - php class files, views, javascripts, and stylesheets
        - assets
              - css
              - data
              - js
              - php
        -- helper files for processing files and server-side logic
        - helpers
        -- views for displaying data
        - views
  -- contains database schema file for creating the database
  - db
        -- database build queries in mysql
        - sql
  -- index
  index.html
  -- readme
  readme.md
  ```

### Workflow

1. The uploaded file is sent to the server via a post request, and processed via a helper in [`app/helpers/processFile.php`](https://github.com/kylesb/donorsearch/blob/master/app/helpers/processFile.php). The uploaded file is checked for validation. The file is read into the table via the [`LOAD DATA INFILE`](http://dev.mysql.com/doc/refman/5.7/en/load-data.html) SQL query.

2. Once the upload is complete, a helper file [`app/helpers/processFile.php`](https://github.com/kylesb/donorsearch/blob/master/app/helpers/processFile.php) redirects to a view [`app/views/display.php`](https://github.com/kylesb/donorsearch/blob/master/app/views/display.php) to display the data. This view features various sorting and filtering operations on the data.

3. Filtering and sorting is performed asynchronously via XMLHTTP requests in [`app/assets/js/actions.js`](https://github.com/kylesb/donorsearch/blob/master/app/assets/js/actions.js). This file sends GET requests to a PHP helper  [`app/helpers/actions.php`](https://github.com/kylesb/donorsearch/blob/master/app/helpers/actions.php) which performs various queries on the database. The data is returned to be displayed on the view.  


## Languages

* PHP 5.6
* MySQL

## Acknowledgements

This project uses an open-source PHP/MySQL PDO connection class, available [here](https://github.com/a1phanumeric/PHP-MySQL-Class).

## Debugging / Testing

Debugging and testing was performed via XAMPP.
