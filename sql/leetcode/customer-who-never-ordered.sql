# Write your MySQL query statement below

-- Write a solution to find all customers who never order anything.

-- Return the result table in any order.

SELECT name AS Customers FROM Customers AS c
LEFT JOIN Orders
ON c.id = Orders.customerId
WHERE Orders.customerId IS NULL