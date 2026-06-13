**Problem**

Query the Name of any student in STUDENTS who scored higher than  Marks. Order your output by the last three characters of each name. If two or more students both have names ending in the same last three characters (i.e.: Bobby, Robby, etc.), secondary sort them by ascending ID.

**Solution**

```sql
SELECT NAME
FROM STUDENTS
WHERE MARKS > 75
ORDER BY RIGHT(NAME, 3), ID;
```

get the data FROM STUDENTS table WHERe MARKS is greater than 75 and ORDER it BY the last 3 characters of their NAME
if the STUDENTS has the same last 3 char ORDER them BY their ID (ASCENDING ORDER is the default).
