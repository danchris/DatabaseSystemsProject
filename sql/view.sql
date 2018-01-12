CREATE VIEW  TotalKHM AS SELECT  License_Plate, Kilometers FROM Vehicle GROUP BY License_Plate;

CREATE VIEW  AthensEmployees AS SELECT  First_Name, Last_Name, IRS FROM Employee WHERE (SELECT IRS FROM Works WHERE Works.IRS = Employee.IRS AND City="Athens" )GROUP BY IRS ORDER BY Last_Name;

