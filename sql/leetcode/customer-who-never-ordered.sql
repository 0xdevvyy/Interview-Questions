# Write your MySQL query statement below
SELECT name AS Customers FROM Customers AS c
LEFT JOIN Orders
ON c.id = Orders.customerId
WHERE Orders.customerId IS NULL