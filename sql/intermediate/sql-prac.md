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

# Challenge 1

Display all users and their scores.

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

- first_name

---

# Challenge 3

Display users together with their continent.

Expected Columns:

- first_name
- country_name
- continent

---

# Challenge 4

Show all users and the total amount they spent.

Expected Columns:

- first_name
- total_spent

Hint:

- Use SUM()
- Use GROUP BY

---

# Challenge 5

Find users whose total spending exceeds 500.

Expected Columns:

- first_name
- total_spent

Hint:

- Use HAVING

---

# Challenge 6

Display each country and the number of users in it.

Expected Columns:

- country
- total_users

---

# Challenge 7

Find the highest score in each country.

Expected Columns:

- country
- highest_score

---

# Challenge 8

Display users whose score is above the average score.

Expected Columns:

- first_name
- score

Hint:

- Subquery required

---

# Challenge 9

Display users who have never placed an order.

Expected Columns:

- first_name

Hint:

- LEFT JOIN
- NULL check

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

---

# Challenge 12

Find countries with more than one user.

Expected Columns:

- country
- total_users

Hint:

- GROUP BY
- HAVING

---

# Challenge 13

Display users whose score is higher than every USA user's score.

Expected Columns:

- first_name
- score

Hint:

- Subquery

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