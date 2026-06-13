**Problem**

Write a query that prints a list of employee names (i.e.: the name attribute) for employees in Employee having a salary greater than  per month who have been employees for less than  months. Sort your result by ascending employee_id.

**Solution**

```sql
SELECT NAME FROM EMPLOYEE WHERE SALARY > 2000 AND MONTHS < 10
ORDER BY EMPLOYEE_ID ASC;
```

get data FROM EMPLOYEE table, then filter WHERE the SALARY is equals to 2k AND 
WHERE MONTHS is less than 10, then ORDER it BY EMPLOYEE_ID in ASENDING order.
