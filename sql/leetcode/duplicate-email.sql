# Write your MySQL query statement below
-- Write a solution to report all the duplicate emails. Note that it's guaranteed that the email field is not NULL.
SELECT email FROM Person
WHERE COUNT(email) > 1