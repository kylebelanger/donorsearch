-- Test scripts for inserting dummy data
-- ---------------------------

-- Insert city
INSERT INTO `donorsearch`.`city` (`city_name`) VALUES ('Columbia');

-- Insert state
INSERT INTO `donorsearch`.`state` (`state_name`) VALUES ('MD');

-- Insert country
INSERT INTO `donorsearch`.`country` (`country_name`) VALUES ('United States');

-- Insert organization
INSERT INTO `donorsearch`.`organization` (`legal_name`, `city_fk`, `state_fk`, `country_fk`,`description`)
  VALUES
  ('Enoch Pratt Free Library', '1', '1', '1', 'Initial record'),
  ('Orleans Public Library', '1', '1', '1', 'Record two');
