**Problem**

Query a list of CITY names from STATION for cities that have an even ID number. Print the results in any order, but exclude duplicates from the answer.

**Solution**

using modulo 
```sql
SELECT DISTINCT CITY
FROM STATION WHERE ID % 2 = 0;
```

or using MOD
```sql
SELECT DISTINCT CITY
FROM STATION WHERE MOD(ID, 2) = 0;
```

get the data FROM CITY,then filter WHERE ID is even, then SELECT the DISTINCT(unique) CITY.