-- Select the database
-- ---------------------------
USE donorsearch;

LOAD DATA LOCAL INFILE '/Applications/XAMPP/xamppfiles/htdocs/donorsearch/data.txt' INTO TABLE organization FIELDS TERMINATED BY '|'
    OPTIONALLY ENCLOSED BY '"' LINES TERMINATED BY '\n' IGNORE 2 LINES
    (ein, legal_name, city_name, state_name, country_name, description);
