# DonorSearch

Web development example for filtering non-profit organizations from IRS data.

## Languages

* PHP 5.6
* MySQL

## Description

This web application features two pages. The first page allows text/plain files to be uploaded via a form. File validation is performed on the client-side via HTML5 `input type='text/plain'`, as well as on the server-side via PHP.

The file is sent to the server via a post request, and processed in `php/process.php`. The file is checked for validation, then inserted into the table through a PHO SQL statement. The file is read into the table via the `READ DATA INFILE` query.

Once the upload is complete, `process.php` redirects to `display.php` which performs various sorting and filtering queries on the dataset.
The connection to MySQL is performed via a class (php/database.php) which offers various PHP/MySQL PMO operations.

## Debugging / Testing

Debugging and testing was performed via XAMPP.
