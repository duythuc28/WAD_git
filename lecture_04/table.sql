

    /** drop table(s) **/
    DROP TABLE IF EXISTS Employees;     /** resets the example **/
    DROP TABLE IF EXISTS Experience;    /** resets the example **/
    DROP TABLE IF EXISTS Languages;     /** resets the example **/


    /** create table named 'Employees' **/
    CREATE TABLE IF NOT EXISTS Employees (
        employee_id int NOT NULL AUTO_INCREMENT,    /** auto increment the id on insert **/
        last_name varchar(240) NOT NULL,
        first_name varchar(240) NOT NULL,
        address varchar(240) NULL,
        city varchar(240) NOT NULL,
        state varchar(8) NOT NULL,
        zip int NOT NULL,
        PRIMARY KEY (employee_id)   /** set the primary key **/
    );

    /** create table 'Languages' **/
    CREATE TABLE IF NOT EXISTS Languages (
        language_id int NOT NULL AUTO_INCREMENT,
        language varchar(240) NOT NULL,
        PRIMARY KEY (language_id)
    );

    /** create table 'Experience' **/
    CREATE TABLE IF NOT EXISTS Experience (
        language_id int NOT NULL,
        employee_id int NOT NULL,
        years int NOT NULL,
        PRIMARY KEY (language_id,employee_id)
    );


    /** alter table **/
    ALTER TABLE Employees
    ADD COLUMN extra VARCHAR(30);


