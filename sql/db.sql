-- Create the database
-- ---------------------------
DROP DATABASE IF EXISTS donorsearch;
CREATE DATABASE donorsearch;

-- Select the database
-- ---------------------------
USE donorsearch;

-- Begin creating tables
-- ---------------------------

-- Create table: organizations
CREATE TABLE organization (
	ein						INT							PRIMARY KEY		AUTO_INCREMENT,
	legal_name		VARCHAR(150),
	city_name			VARCHAR(150),
	state_name		VARCHAR(150),
	country_name 	VARCHAR(150),
	description		TEXT
);

-- create index for city
CREATE INDEX organization_city_name_ix
	ON organization (city_name DESC);

-- create index for state
CREATE INDEX organization_state_name_ix
	ON organization (state_name DESC);

-- create index for country
CREATE INDEX organization_country_name_ix
	ON organization (country_name DESC);
