
# Use library db for all functions
USE library;

# This function searches for a specific member based on their ID number
# and uses an if to determine overdue items
CREATE FUNCTION find_member(PID INT) RETURNS VARCHAR
BEGIN
	# initilize variables
  	DECLARE NAME_FOUND VARCHAR DEFAULT "";
  	DECLARE DUE_DATE DATE;

  		# select member data based on ID paremeter
		SELECT checkout_due INTO DUE_DATE FROM checkout WHERE member_id = PID;
		SELECT MEMBER_NAME INTO NAME_FOUND FROM members WHERE member_id = PID;

		# determine if member has items overdue
		IF DUE_DATE > NOW() THEN
			RETURN NAME_FOUND & 'has items are overdue';
		ELSE
			SELECT 'No items are overdue';
		END IF;
END//

--

# This function counts the number of item based on a unique catalog ID number
CREATE FUNCTION find_author(NAME VARCHAR) RETURNS INT
  BEGIN
  	# initilize variables
    	DECLARE NAME_FOUND VARCHAR DEFAULT "";
    	DECLARE ITEM_COUNT INT DEFAULT 0;

  	declare c_max int unsigned default 50;
  	declare c_counter int unsigned default 0;

  	SELECT item_id FROM checkout WHERE item_id = NAME;

  	start transaction;
  		while ITEM_COUNT < c_max do
  		set ITEM_COUNT=v_counter+1;
  	end while;
  	commit;

  	RETURN ITEM_COUNT;

  END//

--

CREATE FUNCTION find_city(CITY VARCHAR) RETURNS INT
BEGIN
  RETURN city_id FROM city WHERE city_id = CITY;
END//














































declare c_max int unsigned default 50;
declare c_counter int unsigned default 0;

  truncate table foo;
  start transaction;
  while c_counter < c_max do
    insert into foo (val) values ();
    set v_counter=v_counter+1;
  end while;
  commit;
end #
