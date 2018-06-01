

    /** basic select **/
    SELECT * FROM Employees;

    /** basic select column **/
    SELECT last_name FROM Employees;

    /** basic select column with condition **/
    SELECT last_name FROM Employees WHERE last_name = "Jack";


    /** select colum with partial match **/
    SELECT  last_name
    FROM    Employees
    WHERE   last_name LIKE "%ack%";


    /** select columns using a natural join **/
    SELECT   Employees.first_name,
             Employees.last_name,
             Experience.years
    FROM     Employees,
             Experience
    WHERE    Experience.employee_id = Employees.employee_id
    ORDER BY Employees.employee_id DESC;


    /** select columns using a natural join with conditions **/
    SELECT  Employees.first_name,
            Employees.last_name,
            Languages.language,
            Experience.years,
            Employees.city
    FROM    Employees,
            Languages,
            Experience
    WHERE   Experience.employee_id = Employees.employee_id 
    AND     Experience.language_id = Languages.language_id
    AND     Experience.years = 5
    AND     Employees.city = "Melbourne";
