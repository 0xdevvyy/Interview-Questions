**Problem**

Find the difference between the total number of CITY entries in the table and the number of distinct CITY entries in the table.

**Solution**

```sql
SELECT COUNT(CITY) - COUNT(DISTINCT CITY)
FROM STATION;
```

get the data FROM STATION, then SELECT the CITY and COUNT it and get also the DISTICT CITY and COUNT it
then the COUNT of the CITY and the DISTINCT CITY COUNT minus it and return the value.