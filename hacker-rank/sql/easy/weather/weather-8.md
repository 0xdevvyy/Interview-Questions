**Problem**

Query the list of CITY names from STATION which have vowels (i.e., a, e, i, o, and u) as both their first and last characters. Your result cannot contain duplicates.

**Solution**

```sql
SELECT DISTINCT CITY
FROM STATION
WHERE CITY REGEXP '^[AEIOU].*[AEIOU]$';
```

^      means start of string
$      means end of string
[]     means character class
.      means any character
*      means zero or more
+      means one or more