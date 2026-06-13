**Problem**

Query the list of CITY names from STATION that do not start with vowels and do not end with vowels. Your result cannot contain duplicates.

**Solution**

```sql
SELECT DISTINCT CITY
FROM STATION
WHERE CITY REGEXP '^[^AEIOU]'
  AND CITY REGEXP '[^AEIOU]$';
```