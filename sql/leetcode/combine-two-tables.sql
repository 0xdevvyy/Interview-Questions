# Write your MySQL query statement below

/*
Explanation: 
There is no address in the address table for the personId = 1 so we return null in their city and state.
addressId = 1 contains information about the address of personId = 2.

*/


SELECT p.firstName, p.lastName, a.city, a.state FROM Person AS p
LEFT JOIN Address AS a
ON p.personId = a.personId
