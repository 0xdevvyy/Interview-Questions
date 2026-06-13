**Problem**

Query all columns for all American cities in the CITY table with populations larger than 100000. The CountryCode for America is USA.

**Solution**

```sql
SELECT *
FROM CITY
WHERE COUNTRYCODE = 'USA'
  AND POPULATION > 100000;
```

get the data FROM CITY table, filter the data WHERE the COUNTRYCODE is equals to 'USA'
AND WHERE the POPULATION is greater than 100k, and will SELECT which column will be returned.
