**Problem**

Query all attributes of every Japanese city in the CITY table. The COUNTRYCODE for Japan is JPN.

**Solution**

```sql
SELECT *
FROM CITY
WHERE COUNTRYCODE = 'JPN';
```

get the data FROM CITY table and will filter WHERE COUNTRYCODE is equals to 'JPN'
and will SELECT * all the column.