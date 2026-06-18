# Intermediate SQL JOIN Challenge Pack

These challenges are designed to push you beyond basic JOINs and prepare you for real-world developer interviews.

---

# Database Setup

## users

| id | first_name | country |
|----|------------|----------|
| 1 | Maria | Germany |
| 2 | John | USA |
| 3 | Georg | UK |
| 4 | Anna | USA |
| 5 | Ken | Japan |
| 6 | Lisa | Germany |

---

## scores

| id | user_id | score |
|----|---------|--------|
| 1 | 1 | 350 |
| 2 | 2 | 900 |
| 3 | 3 | 750 |
| 4 | 4 | 400 |
| 5 | 5 | 850 |

---

## orders

| id | user_id | amount |
|----|---------|---------|
| 1 | 1 | 120 |
| 2 | 1 | 300 |
| 3 | 2 | 500 |
| 4 | 4 | 250 |
| 5 | 5 | 700 |

---

## countries

| id | country_name | continent |
|----|--------------|------------|
| 1 | Germany | Europe |
| 2 | USA | North America |
| 3 | UK | Europe |
| 4 | Japan | Asia |

---

## Creatinf the database 
```sql
DROP DATABASE IF EXISTS sql_join_practice;

CREATE DATABASE sql_join_practice;

USE sql_join_practice;

CREATE TABLE users (
    id INT PRIMARY KEY,
    first_name VARCHAR(50),
    country VARCHAR(50)
);

CREATE TABLE scores (
    id INT PRIMARY KEY,
    user_id INT,
    score INT,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE orders (
    id INT PRIMARY KEY,
    user_id INT,
    amount DECIMAL(10,2),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE countries (
    id INT PRIMARY KEY,
    country_name VARCHAR(50),
    continent VARCHAR(50)
);

INSERT INTO users (id, first_name, country) VALUES
(1, 'Maria', 'Germany'),
(2, 'John', 'USA'),
(3, 'Georg', 'UK'),
(4, 'Anna', 'USA'),
(5, 'Ken', 'Japan'),
(6, 'Lisa', 'Germany');

INSERT INTO scores (id, user_id, score) VALUES
(1, 1, 350),
(2, 2, 900),
(3, 3, 750),
(4, 4, 400),
(5, 5, 850);

INSERT INTO orders (id, user_id, amount) VALUES
(1, 1, 120),
(2, 1, 300),
(3, 2, 500),
(4, 4, 250),
(5, 5, 700);

INSERT INTO countries (id, country_name, continent) VALUES
(1, 'Germany', 'Europe'),
(2, 'USA', 'North America'),
(3, 'UK', 'Europe'),
(4, 'Japan', 'Asia');

```




# Challenge 1

Display all users and their scores.


```sql

SELECT u.first_name, s.scores
FROM users AS u 
INNER JOIN scores AS s
ON u.id = s.user_id

```
note: INNER join is the default

sql execution order when it comes to join

first it will select the columns users.first_name, score.scores
then it gonna match the users.ID and scores.user_id if it doesn't find a match sql will not return that data 
that is when it comes to INNER join it will only return the data that have a match



Requirements:

- Use INNER JOIN
- Sort by score descending

Expected Columns:

- first_name
- score

---

# Challenge 2

Find users who do not have a score.

Requirements:

- Use LEFT JOIN

Expected Columns:

- first_name, country, score

```sql

SELECT u.first_name, u.country, s.score FROM users AS u 
LEFT JOIN scores AS s 
ON u.id = s.user_id

```

only LISA is the one who doesnt have a score, also i can use the WHERE clause(Left Anti JOIN) here to return only the users that doesnt have a score but i think seeing the data first works to, and then filter it if you see the data.

note: on how the LEFT JOIN works

first the PRIMARY table is the LEFT one which is users, 
sql will return all of the specified columns on the LEFT TABLE because that is the primary source of truth/data
and sql will check/compare the id if it match and if it doesnt match sql will just add NULL at the value.

---

# Challenge 3

Display users together with their continent.
need to match it with country and country_name?



Expected Columns:

- first_name
- country_name
- continent


```sql

SELECT u.first_name, u.country, c.continent
FROM users AS u
LEFT JOIN countries as c
ON u.country = c.country_name;

```



---

# Challenge 4

Show all users and the total amount they spent.

Expected Columns:

- first_name
- total_spent

Hint:

- Use SUM()
- Use GROUP BY


```sql

SELECT u.first_name, SUM(o.amount) AS total_amount
FROM users as u
LEFT JOIN orders as o
ON u.id = o.user_id
GROUP BY u.first_name


```

---

# Challenge 5

Find users whose total spending exceeds 500.

Expected Columns:

- first_name
- total_spent

Hint:

- Use HAVING


note: its the same as number 4 just add the having clause
```sql

SELECT u.first_name, SUM(o.amount) AS total_amount
FROM users as u
LEFT JOIN orders as o
ON u.id = o.user_id
GROUP BY u.first_name
HAVING total_amount > 500


```



---

# Challenge 6

Display each country and the number of users in it.

Expected Columns:

- country
- total_users


```sql

SELECT u.country, COUNT(c.country_name) AS total_users
FROM countries AS c
LEFT JOIN users AS u
ON c.country_name = u.country
GROUP BY u.country


```
---

# Challenge 7

Find the highest score in each country.

Expected Columns:

- country
- highest_score

```sql

SELECT
    u.country,
    MAX(s.score) AS highest_score
FROM users u
JOIN scores s
    ON u.id = s.user_id
GROUP BY u.country;

```

---

# Challenge 8

Display users whose score is above the average score.

Expected Columns:

- first_name
- score

Hint:

- Subquery required


```sql

SELECT u.first_name, s.score FROM users AS u
LEFT JOIN scores as s
ON u.id = s.user_id
WHERE s.score >= (
	SELECT AVG(s.score) FROM scores AS scores
);

```

---

# Challenge 9

Display users who have never placed an order.

Expected Columns:

- first_name
- amount

Hint:

- LEFT JOIN
- NULL check



```sql

SELECT u.first_name, o.amount FROM users AS u
LEFT JOIN orders AS o
ON u.id = o.user_id
WHERE o.amount IS NULL


```

---

# Challenge 10

Find the user who spent the most money.

Expected Columns:

- first_name
- total_spent

Hint:

- GROUP BY
- ORDER BY
- LIMIT

```sql

SELECT u.first_name, SUM(o.amount) AS total_spent FROM users AS u
LEFT JOIN orders AS o
ON u.id = o.user_id
GROUP BY u.first_name
ORDER BY total_spent DESC
LIMIT 1


```


---

# Challenge 11

Display every order together with:

- user name
- country
- continent
- order amount

Use all tables.

Expected Columns:

- first_name
- country_name
- continent
- amount

i didn't know that this ones work HAHAHAHA
```sql
SELECT 
	u.first_name,
    c.country_name,
    c.continent,
    o.amount 
FROM users AS u
INNER JOIN orders AS o
INNER JOIN countries AS c
ON u.id = o.user_id AND u.country = c.country_name

```

OR 

```sql

SELECT 
    u.first_name,
    c.country_name,
    c.continent,
    o.amount
FROM users u
INNER JOIN orders o
    ON u.id = o.user_id
INNER JOIN countries c
    ON u.country = c.country_name;


```

---

# Challenge 12

Find countries with more than one user.

Expected Columns:

- country
- total_users

Hint:

- GROUP BY
- HAVING


note: i just get the code at number 6 and i just added the HAVING CLAUSE
```sql

SELECT u.country, COUNT(c.country_name) AS total_users
FROM countries AS c
LEFT JOIN users AS u
ON c.country_name = u.country
GROUP BY u.country
HAVING total_users > 1


```
---

# Challenge 13

Display users whose score is higher than every USA user's score.

Expected Columns:

- first_name
- score

Hint:

- Subquery
this one will not show any result because there is no one who's higher than every USA user's score, unless you changed the data



```sql

SELECT u.first_name, s.score FROM users AS u
LEFT JOIN scores AS s
ON u.id = s.user_id
WHERE s.score > (
  SELECT MAX(s2.score)
    FROM users u2
    JOIN scores s2
        ON u2.id = s2.user_id
    WHERE u2.country = 'USA'
)


```

---

# Challenge 14

Rank users by score manually.

Expected Output:

| first_name | score |
|------------|--------|
| John | 900 |
| Ken | 850 |
| Georg | 750 |
| Anna | 400 |
| Maria | 350 |

Requirements:

- No window functions
- ORDER BY only

note: i just use the code in challenge 13 and remove the subquery and then use ORDER BY clause
```sql

SELECT u.first_name, s.score FROM users AS u
LEFT JOIN scores AS s
ON u.id = s.user_id
ORDER BY s.score DESC


```

---

# Challenge 15

Find users who:

- Have a score
- Have at least one order
- Spent more than 300

Expected Columns:

- first_name
- score
- total_spent

Use:

- Multiple JOINs
- GROUP BY
- HAVING


```sql

SELECT u.first_name, s.score, SUM(o.amount) AS total_amount
FROM users AS u
LEFT JOIN scores AS s
ON u.id = s.user_id
LEFT JOIN orders as o
ON u.id = o.user_id
GROUP BY u.first_name, s.score
HAVING total_amount > 300


```
---

# Boss Fight

Create a report showing:

- first_name
- country
- continent
- score
- total_spent

Requirements:

1. Join all tables.
2. Include users without orders.
3. Display 0 if they have no orders.
4. Show only users with score above 300.
5. Sort by total_spent descending.
6. If total_spent is equal, sort by score descending.

Expected SQL Topics:

- INNER JOIN
- LEFT JOIN
- GROUP BY
- COALESCE
- ORDER BY
- Aggregate Functions

---

# Nightmare Interview Challenge

Without using ChatGPT, Google, StackOverflow, or documentation:

Write one query that returns:

- first_name
- country
- score
- total_spent

Rules:

- User must have a score.
- User must have at least one order.
- Score must be above country average score.
- Total spending must be above overall average spending.
- Sort by score descending.

Topics Tested:

- JOIN
- GROUP BY
- HAVING
- Subqueries
- Aggregate Functions
- Filtering
- Multi-table Relationships

This is close to the difficulty of a real junior-to-mid SQL interview question.