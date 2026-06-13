**Problem**

Query the list of CITY names from STATION that do not start with vowels. Your result cannot contain duplicates.

**Solution**

```sql
SELECT DISTINCT CITY
FROM STATION
WHERE CITY NOT REGEXP '^[AEIOU]';
```


vice versa for the number 9 just add '[]$' to it 