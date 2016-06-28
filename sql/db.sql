-- Create the database
-- ---------------------------
DROP DATABASE IF EXISTS donorsearch;
CREATE DATABASE donorsearch;

-- Select the database
-- ---------------------------
USE donorsearch;

-- Begin creating tables
-- ---------------------------

-- Create table: city (FK)
CREATE TABLE city (
	city_id				INT							PRIMARY KEY		AUTO_INCREMENT,
	city_name			VARCHAR(150)		NOT NULL 			UNIQUE
);

-- Create table: state (FK)
CREATE TABLE state (
	state_id			INT						PRIMARY KEY		AUTO_INCREMENT,
	state_name		VARCHAR(2)		NOT NULL 			UNIQUE
);

-- Create table: country (FK)
CREATE TABLE country (
	country_id				INT							PRIMARY KEY		AUTO_INCREMENT,
	country_name			VARCHAR(150)		NOT NULL 			UNIQUE
);

-- Create table: organizations
CREATE TABLE organization (
	ein						INT							PRIMARY KEY		AUTO_INCREMENT,
	legal_name		VARCHAR(150),
	city_fk				INT,
	state_fk			INT,
	country_fk 		INT,
	description		TEXT,

	-- foreign key constraint
	CONSTRAINT organization_fk_city
		FOREIGN KEY (city_fk)
		references city (city_id),

	-- foreign key constraint
	CONSTRAINT organization_fk_state
		FOREIGN KEY (state_fk)
		references state (state_id),

		-- foreign key constraint
		CONSTRAINT organization_fk_country
			FOREIGN KEY (country_fk)
			references country (country_id)
);
