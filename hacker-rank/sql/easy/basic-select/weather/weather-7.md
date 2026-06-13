**Problem**

Query the list of CITY names ending with vowels (a, e, i, o, u) from STATION. Your result cannot contain duplicates.

**Solution**

```sql
SELECT DISTINCT CITY
FROM STATION
WHERE CITY REGEXP '[AEIOU]$';
```

$ just means at the end
