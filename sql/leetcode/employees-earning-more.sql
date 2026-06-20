# Write your MySQL query statement below
-- Write a solution to find the employees who earn more than their managers.

SELECT e.name AS Employee
FROM Employee e
JOIN Employee m
    ON e.managerId = m.id
WHERE e.salary > m.salary;