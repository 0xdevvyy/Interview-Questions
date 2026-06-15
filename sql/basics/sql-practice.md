# SQL Practice Challenges

## Table: `users`

| id | first_name | country | score |
|----|------------|---------|------:|
| 1 | Maria | Germany | 350 |
| 2 | John | USA | 900 |
| 3 | Georg | UK | 750 |
| 4 | Martin | Germany | 500 |
| 5 | Peter | USA | 0 |
| 6 | lop | USA | 100 |

---
 **NOTE:** i will do this tomorrow morning, i will answer all of it.
# Easy

## 1. Get All Users From USA

Write a query to display all users whose country is `USA`.

```sql

SELECT * FROM users WHERE country = 'USA';

```

### Expected Columns

```sql
first_name, score
```

---

## 2. Find Users With Score Greater Than 500

Write a query to display users whose score is greater than `500`.


```sql

SELECT * FROM users WHERE score > 500;

```

### Expected Output

```text
John
Georg
```

---

## 3. Find Users With a Score of 0

Write a query to display users who have not scored any points.


```sql

SELECT * FROM users WHERE score = 0

```


### Expected Output

```text
Peter
```

---

## 4. Sort Users By Score Descending

Write a query to display all users ordered from highest score to lowest score.


```sql

SELECT * FROM users ORDER BY score DESC

```

---

## 5. Show Unique Countries

Write a query to display all distinct countries.

```sql 

SELECT DISTINCT country FROM users

```

### Expected Output

```text
Germany
USA
UK
```

---

# Medium

## 6. Count Users Per Country

Write a query that returns the number of users from each country.

```sql 


SELECT country, COUNT(id) as total_users 
    FROM users
    GROUP BY country;

```


### Expected Output

| country | total_users |
|----------|------------|
| Germany | 2 |
| USA | 3 |
| UK | 1 |

---

## 7. Calculate Average Score Per Country

Write a query that returns the average score for each country.

```sql 

SELECT country, AVG(score) as avg_score 
    FROM users
    GROUP BY country

```

### Expected Output

| country | avg_score |
|----------|-----------|
| Germany | 425 |
| USA | 333.33 |
| UK | 750 |

---

## 8. Find the Country With the Highest Average Score

Write a query that returns the country with the highest average score.

```sql

SELECT country, AVG(score) as avg_score FROM users
GROUP BY country
ORDER BY avg_score DESC
LIMIT 1

```

### Expected Output

```text
UK
```

---

## 9. Find Users Above the Overall Average Score

Write a query that returns all users whose score is higher than the average score of all users.

```sql

SELECT * FROM users WHERE score > (
    SELECT AVG(score) FROM users
)

```

### Hint

Use a subquery.

---

## 10. Find the Second Highest Score

Write a query that returns the second highest score in the table.

```sql

SELECT MAX(score) FROM users WHERE score < (
    SELECT MAX(score) FROM users
)

```


### Expected Output

```text
750
```

---

# Hard

## 11. Rank Users By Score

Write a query that ranks all users based on score from highest to lowest.

```sql

SELECT *, RANK() OVER (ORDER BY score DESC) AS rankings FROM users 

```

### Expected Output

| first_name | score | rank |
|------------|------:|------:|
| John | 900 | 1 |
| Georg | 750 | 2 |
| Martin | 500 | 3 |
| Maria | 350 | 4 |
| lop | 100 | 5 |
| Peter | 0 | 6 |

### Hint

Use:

```sql
RANK()
```

or

```sql
DENSE_RANK()
```

---

## 12. Find Users Scoring Above Their Country Average

Write a query that returns users whose score is greater than the average score of users from the same country.

```sql

SELECT first_name FROM users WHERE score > (
    SELECT AVG(score) from users
)

```



### Expected Output

| first_name |
|------------|
| John |
| Georg |
| Martin |

---

## 13. Find the Top Scorer From Each Country

Write a query that returns the highest-scoring user from every country.

```sql

SELECT * FROM users u WHERE score = (
    SELECT MAX(score)
        FROM users
        WHERE country = u.country        
)
ORDER BY score DESC
```

### Expected Output

| country | first_name | score |
|----------|------------|------:|
| Germany | Martin | 500 |
| USA | John | 900 |
| UK | Georg | 750 |

---

## 14. Find Countries With Total Score Greater Than 1000

Write a query that returns countries whose combined score greater than or equal `1000`.

note: changing the question, there will be no output if it exceeds than 1000.

```sql

SELECT country, SUM(score) as sum_country FROM users 
    GROUP BY country
    HAVING SUM(score) >= 1000;

```


### Expected Output

| country |
|---------|
| USA |

---

## 15. Calculate Each User's Contribution to Their Country's Total Score

Write a query that returns each user's percentage contribution to their country's total score.

```sql 

SELECY *, ROUND(score * 100 / (
    SELECT SUM(score) 
        FROM users u2
             WHERE u2.country = u1.country
    ), 2
) AS per_contribution FROM users u1

```


### Example Output

| first_name | country | percentage |
|------------|---------|-----------:|
| John | USA | 90.00 |
| Peter | USA | 0.00 |
| lop | USA | 10.00 |

---

# Interview Challenge

## Country Statistics Dashboard

Write a single query that returns:


```sql

SELECT country, 
    COUNT(id) as total_users,
    AVG(score) as avg_score,
    MAX(score) as highest_score,
    MIN(score) as lowest_score 
FROM users GROUP BY country

``

```text
country
total_users
average_score
highest_score
lowest_score
```

### Requirements

- Group results by country
- Order by average score descending

### Expected Output

| country | total_users | average_score | highest_score | lowest_score |
|----------|------------|--------------:|--------------:|-------------:|
| UK | 1 | 750 | 750 | 750 |
| Germany | 2 | 425 | 500 | 350 |
| USA | 3 | 333.33 | 900 | 0 |

### Skills Tested

- `SELECT`
- `GROUP BY`
- `COUNT()`
- `AVG()`
- `MAX()`
- `MIN()`
- `ORDER BY`

---

# Bonus Challenges

## 16. Find the Lowest Scoring User in Each Country

Return the user with the lowest score for every country.

```sql 

SELECT country, MIN(score) FROM users GROUP BY country

```



---

## 17. Find Countries With More Than One User


```sql 

SELECt country, COUNT(id) FROM users GROUP BY country HAVING COUNT(id) > 1;

```

Use `HAVING`.

### Expected Output

| country |
|----------|
| Germany |
| USA |

---

## 18. Display Users and Their Country Ranking

Rank users only within their own country.


```sql 

SELECT first_name, coutnry, score, 
    RANK() OVER (
        PARTITION BY country ORDER BY SCORE DESC
    ) AS rankings
    FROM users;
```



### Example

| first_name | country | score | rank |
|------------|---------|------:|------:|
| John | USA | 900 | 1 |
| lop | USA | 100 | 2 |
| Peter | USA | 0 | 3 |

### Hint

```sql
PARTITION BY country
```

---

## 19. Find the Difference Between Each User's Score and Their Country Average

```sql 

SELECT first_name, country,score
    AVG(score) AS country_avg
    score - AVG(score) OVER (PARTITION BY country) as difference
    FROM users
    GROUP BY first_name, country, score


```


Expected Columns:

```sql
first_name
country
score
country_average
difference
```

---

## 20. Find Countries Where Every User Has a Score Greater Than 300

Return only countries where all users scored above `300`.

```sql 

SELECT country, MIN(score) 
    FROM users 
    GROUP BY country 
    HAVING MIN(score) > 300; 

```




# Data Modification Challenges (INSERT, UPDATE, ALTER, DELETE, DROP)

## Table: `users`

| id | first_name | country | score |
|----|------------|---------|------:|
| 1 | Maria | Germany | 350 |
| 2 | John | USA | 900 |
| 3 | Georg | UK | 750 |
| 4 | Martin | Germany | 500 |
| 5 | Peter | USA | 0 |
| 6 | lop | USA | 100 |

---

# INSERT Challenges

## 21. Add a New User

Insert the following record:

| id | first_name | country | score |
|----|------------|---------|------:|
| 7 | Anna | Germany | 650 |

```sql
INSERT INTO PERSONS
VALUE (7,'Anna', 'Germany', 650)

you can add the columns but sql will know it that you will add values in all of the columns
just make sure that the values are complete and the Values data types are correct

```

---

## 22. Add Multiple Users

```sql

INSERT INTO PERSONS
VALUE 
    (8,'James', 'USA', 450)
    (9,'Lucas', 'UK', 300)

```

Insert:

| id | first_name | country | score |
|----|------------|---------|------:|
| 8 | James | USA | 450 |
| 9 | Lucas | UK | 300 |

---

## 23. Add a User With a NULL Score


```sql

INSERT INTO PERSONS
VALUE 
    (10,'Sarah', 'Canada', NULL)
```


Insert:

| id | first_name | country | score |
|----|------------|---------|------:|
| 10 | Sarah | Canada | NULL |

---

# UPDATE Challenges

## 24. Update Peter's Score

Peter completed a challenge.

Update his score from `0` to `200`.


```sql
UPDATE users 
SET score = 200
where id = 5

SELECT * FROM users where id = 5

note check the where clause before you execute the update query
```

---

## 25. Increase All USA Users' Scores by 100

```sql
UPDATE users 
SET score = score + 100
WHERE country = 'USA'

```



Current:

| first_name | score |
|------------|------:|
| John | 900 |
| Peter | 0 |
| lop | 100 |

Expected:

| first_name | score |
|------------|------:|
| John | 1000 |
| Peter | 100 |
| lop | 200 |

---

## 26. Change lop's Name

```sql 
UPDATE users
SET first_name = 'Lopez'
WHERE id = 6

```


Update:

```text
lop → Lopez
```

---

## 27. Give Every User Below 300 Points a Bonus of 50

Update all users whose score is less than `300`.

```sql

UPDATE users
SET score = score + 50
WHERE score < 300


```




---

## 28. Change Country Name

```sql
UPDATE users 
SET country = 'United Kingdom'
WHERE country = 'UK'


```




Rename:

```text
UK → United Kingdom
```

for all matching users.

---

# DELETE Challenges

## 29. Delete Users With a Score of 0

Remove all users whose score is zero.

```sql
DELETE from users WHERE score = 0

note: the same as Update check first which of the where clause you're deleting before executing it


```



---

## 30. Delete All Users From Germany

Remove every German user.

```sql
DELETE FROM users WHERE country = 'Germany'

```

---

## 31. Delete the Lowest Scoring User

Delete the user with the lowest score in the table.


```sql
DELETE FROM users ORDER BY score ASC LIMIT 1


or by using the subquery


DELETE FROM users WHERE score = (
    SELECT MIN(score) FROM users
)


```

---

# ALTER TABLE Challenges

## 32. Add an Email Column

```sql
ALTER TABLE users
ADD email VARCHAR(100) NOT NULL


```

Add a new column:

```sql
email VARCHAR(100)
```

---

## 33. Add a Created At Column


```sql
ALTER TABLE users
ADD created_at DATETIME()


```

Add:

```sql
created_at DATETIME
```

---

## 34. Rename a Column

```sql
ALTER TABLE users
RENAME COLUMN first_name TO name


```


Rename:

```sql
first_name
```

to:

```sql
name
```

---

## 35. Change Score Data Type


```sql

ALTER TABLE users
MODIFY COLUMN score DECIMAL(10,2)

```


Change:

```sql
score INT
```

to:

```sql
score DECIMAL(10,2)
```

---

## 36. Add a Default Value

Set a default value of:

```sql
ALTER TABLE users
ALTER COLUMN score SET DEFAULT 0
```

for the `score` column.

---

## 37. Add a New Status Column

```sql
ALTER TABLE users
ADD status VARCHAR(20) NOT NULL


```

Add:

```sql
status VARCHAR(20)
```

with default value:

```text
active
```

---

## 38. Drop the Status Column

```sql  
ALTER TABLE users
DROP COLUMN status


```

Remove:

```sql
status
```

from the table.

---

# DROP Challenges

## 39. Drop the Users Table

```sql

DROP TABLE users 

TRUNCATE TABLE users

```

Delete the entire table.

### Warning

This removes:

- Structure
- Data
- Indexes

---

## 40. Drop a Database


```sql
DROP DATABASE myDB

```


Delete a database named:

```sql
practice_db
```

### Warning

This removes everything inside the database.

---

# Mixed Interview Challenges

## 41. Add a New Column and Update Existing Records

1. Add:

```sql
ALTER TABLE users
ADD COLUMN bonus INT NOT NULL



```



```sql
bonus INT
```

2. Set:

```text
bonus = 100
```

for users with score greater than `500`.


```sql
UPDATE users
SET bonus = 100
WHERE score > 500


```

---

## 42. Create a Country Leaderboard

1. Add a column:

```sql
ALTER TABLE users
ADD COLUMN rank_in_country INT NOT NULL

```

```sql
rank_in_country INT
```

2. Update the ranking based on score.
note: will answer this.
```sql 

UPDATE users
SET rank_in_country 
WHERE score = (
    SET score RANK() OVER (ORDER BY score) FROM users
)


```


---

## 43. Archive Inactive Users

1. Create:

```sql
CREATE TABLE archive_users (
    id INT NOT NULL,
    //same as structure as the user

    CONSTRAINED pk_arch_users PRIMARY KEY (id)
)


```

```sql
archived_users
```

table.

2. Move users with score below `100`.
s
```sql
INSERT INTO archive_users (id, first_name, country, score)
SELECT id, first_name, country, score 
    FROM users 
    WHERE score < 100


```

3. Delete them from the original table.

```sql
DELETE FROM users WHERE score < 100


```


---

## 44. Soft Delete Challenge
is this in users table or archive? i will use users table for now

1. Add:

```sql
ALTER TABLE users
ADD deleted_at DATETIME NULL



```

```sql
deleted_at DATETIME NULL
```

2. Instead of deleting users, update `deleted_at` with the current timestamp.

---

## 45. Migration Challenge (Laravel Style)


```sql 
ALTER TABLE users
ADD created_at DATETIME 

```

Transform the table from:

| id | first_name | country | score |
|----|------------|---------|------:|

to:

| id | first_name | last_name | email | country | score | created_at |
|----|------------|-----------|-------|---------|------:|------------|

Using only `ALTER TABLE` statements.

---

# Expert Challenge

Starting from the original table:

1. Add an `email` column.s
2. Add a `status` column with default value `active`.
3. Update all USA users to `premium`.
4. Increase scores below 300 by 50.
5. Delete users with score still below 100.
6. Display the final table sorted by score descending.

```sql
ALTER TABLE users
ADD email VARCHAR(30) NOT NULL,
ADD status VARCHAR(10) SET DEFAULT TO 'active',
```

3. it doesnt specify which column should i update premium into 
```sql
UPDATE FROM user
SET status = 'premium'
WHERE country = 'USA'

```

4.
```sql
UPDATE FROM users 
SET score = score + 50
WHERE score < 300

```

5.

```sql
DELETE FROM users 
WHERE score < 100


```

6.

```sql
SELECT * FROM users 
ORDER BY score DESC


```


### Skills Tested

- INSERT
- UPDATE
- DELETE
- ALTER TABLE
- DROP TABLE
- DEFAULT
- WHERE
- ORDER BY
- Data Migration