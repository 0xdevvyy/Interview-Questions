**Problem**

Query the NAME field for all American cities in the CITY table with populations larger than 120000. The CountryCode for America is USA.

**Solution**

```sql
SELECT NAME
FROM CITY
WHERE COUNTRYCODE = 'USA'
  AND POPULATION > 120000;
```

sql will get all of the data FROM CITY table, WHERE the COUNTRYCODE is equals to 'USA'
AND the POPULATION is greater than 120k, and SELECT or return only the NAME column.