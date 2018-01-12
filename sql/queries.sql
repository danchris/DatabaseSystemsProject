/* JOINS */

SELECT Reserves.License_Plate, Customer.Customer_ID FROM Reserves INNER JOIN Customer ON Reserves.Customer_ID=Customer.Customer_ID;

SELECT Vehicle.License_Plate, Vehicle.Type, Fuel_Type.Fuel_Type FROM Vehicle INNER JOIN Fuel_Type ON Vehicle.License_Plate=Fuel_Type.License_Plate;

/* AVG */

SELECT License_Plate, AVG(Payment_Amount) FROM Payment_Transaction GROUP BY License_Plate;

/* GROUP BY */

SELECT COUNT(Customer_ID), City FROM Customer GROUP BY City;

/* ORDER BY */

SELECT DISTINCT City FROM Customer GROUP BY Customer_ID;

/* HAVING */

SELECT License_Plate, Kilometers, Year FROM Vehicle GROUP BY License_Plate HAVING Kilometers > 100000;

/* NESTED */
SELECT Store_ID, Phone_Number FROM Phone_Number WHERE (SELECT Store_ID FROM Store WHERE Store.Store_ID = Phone_Number.Store_ID) ORDER BY Store_ID;

