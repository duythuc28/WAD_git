
    /** insert row(s) => 'Employees' **/
    INSERT INTO Employees(last_name, first_name, address, city, state, zip) VALUES ("Jack", "Llack", "123 Fake Street", "Adelaide",  "NYC", 00001);
    INSERT INTO Employees(last_name, first_name, address, city, state, zip) VALUES ("Aack", "Jlack", "124 Fake Street", "Melbourne", "NYC", 00002);
    INSERT INTO Employees(last_name, first_name, address, city, state, zip) VALUES ("Dack", "Elack", "125 Fake Street", "Melbourne", "NYC", 00003);
    INSERT INTO Employees(last_name, first_name, address, city, state, zip) VALUES ("Fack", "Flack", "126 Fake Street", "Brisbane",  "NYC", 00004);
    INSERT INTO Employees(last_name, first_name, address, city, state, zip) VALUES ("Back", "Xlack", "127 Fake Street", "Sydney",    "NYC", 00005);


    /** insert row(s) => 'Languages' **/
    INSERT INTO Languages(language) VALUES ("french");
    INSERT INTO Languages(language) VALUES ("german");
    INSERT INTO Languages(language) VALUES ("spanish");
    INSERT INTO Languages(language) VALUES ("italian");
    INSERT INTO Languages(language) VALUES ("american");


    /** insert row(s) => 'Experience' **/
    INSERT INTO Experience(language_id, employee_id, years) VALUES (1, 1, 5);
    INSERT INTO Experience(language_id, employee_id, years) VALUES (2, 2, 5);
    INSERT INTO Experience(language_id, employee_id, years) VALUES (3, 3, 10);
    INSERT INTO Experience(language_id, employee_id, years) VALUES (4, 4, 10);


    /** update row(s) => 'Languages' **/
	UPDATE Languages SET language="korean" WHERE language="french";

	/** update row(s) => 'Languages' **/
	DELETE FROM Languages WHERE language = "italian";