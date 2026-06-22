# SQL SET Operations Interview Questions

## Topics Covered

- UNION
- UNION ALL
- INTERSECT
- EXCEPT (or MINUS in Oracle)
- Combining SET operations with JOINs and subqueries

---

# Easy

## Question 1

You have two tables:

### customers_ph

| id | name |
|----|------|
| 1 | Maria |
| 2 | John |

### customers_us

| id | name |
|----|------|
| 1 | Anna |
| 2 | John |

Return all customer names from both tables **without duplicates**.

```sql
SELECT id, name FROM customers_ph
UNION
SELECT id, name FROM customers_us


```

---

## Question 2

Using the same tables, return all customer names **including duplicates**.
note: * is not good when in union because in union it need to be exactly the same column per query, same datatype, same column placing,
you can use * when seeing or mapping the data first and then map the column.

```sql
SELECT * FROM customers_ph
UNION ALL 
SELECT * FROM customers_us


```

---

## Question 3

Explain the difference between:

```sql
UNION
```
union return all distinct rows from both queries
each rows will only appear only ones because it returns the distinct data, it will nor return any duplicates data

and

```sql
UNION ALL
```

UNION ALL will return all rows and everythin will be return it will not remove any duplicates
you can use UNION ALL when checking if you have any duplicate data

---

## Question 4

You have:

### developers

| name |
|------|
| John |
| Maria |
| Ken |

### designers

| name |
|------|
| Maria |
| Anna |
| Ken |

Return people who appear in **both tables**.
NOte: this looks like INNER JOIN
```sql
SELECT name FROM developers 
INTERSECT
SELECT name FROM designers

```

---

# Intermediate

## Question 5

Tables:

### employees_2024

| employee_id |
|------------|
| 1 |
| 2 |
| 3 |

### employees_2025

| employee_id |
|------------|
| 2 |
| 3 |
| 4 |

Find employees who worked in **both years**.

```sql
SELECT employee_id FROM employee_2024
INTERSECT
SELECT employee_id FROM employee_2025


```

---

## Question 6

Find employees who worked in **2024 but not 2025**.

```sql
SELECT employee_id FROM employee_2024
EXCEPT
SELECT employee_id FROM employee_2025
```


---

## Question 7

Find employees who worked in **2025 but not 2024**.

```sql
SELECT employee_id FROM employee_2025
EXCEPT
SELECT employee_id FROM employee_2024
```
---

## Question 8

Return all unique employees who worked in either year.

```sql
SELECT employee_id FROM employee_2024
UNION
SELECT employee_id FROM employee_2025

```



---

## Question 9

Tables:

### students_math

| student_id |
|-----------|
| 1 |
| 2 |
| 3 |

### students_science

| student_id |
|-----------|
| 3 |
| 4 |
| 5 |

Find students enrolled in **exactly one subject**.

Expected Logic:

```text
Math Only
+
Science Only
```


```sql
SELECT student_id FROM students_math
EXCEPT
SELECT student_id FROM students_science

UNION

SELECT student_id FROM students_science
EXCEPT
SELECT student_id FROM students_math
```

---

# Intermediate-Advanced

## Question 10

Tables:

### orders_online

| customer_id |
|------------|
| 1 |
| 2 |
| 3 |

### orders_store

| customer_id |
|------------|
| 2 |
| 3 |
| 4 |

Find customers who purchased both online and in-store.

```sql
SELECT customer_id FROM orders_online
INTERSECT
SELECT customer_id FROM orders_store


```

---

## Question 11

Find customers who purchased **only online**.

```sql
SELECT customer_id FROM orders_online
EXCEPT 
SELECT customer_id FROM orders_store


```


---

## Question 12

Find customers who purchased **only in-store**.

```sql
SELECT customer_id FROM orders_store
EXCEPT 
SELECT customer_id FROM orders_online

```

---

## Question 13

Return customers who purchased from **at least one channel**.

```sql
SELECT customer_id FROM orders_online
UNION 
SELECT customer_id FROM orders_store


```


---

# Advanced

## Question 14

Tables:

### employees

| id | name |
|----|------|
| 1 | John |
| 2 | Maria |
| 3 | Ken |

### developers

| employee_id |
|------------|
| 1 |
| 2 |

### designers

| employee_id |
|------------|
| 2 |
| 3 |

### testers

| employee_id |
|------------|
| 1 |
| 3 |

Find employees who are:

```text
Developer AND Designer
```


```sql
SELECT employee_id FROM developers
INTERSECT
SELECT employee_id FROM designers

```

---

## Question 15

Find employees who are:

```text
Developer OR Designer
```

```sql
SELECT employee_id FROM developer
UNION 
SELECT employee_id FROM designers

```


---

## Question 16

Find employees who are:

```text
Developer BUT NOT Tester
```

```sql
SELECT employee_id FROM developer
EXCEPT 
SELECT employee_id FROM developer

```

---

## Question 17

Find employees who belong to all three groups:

```text
Developer
Designer
Tester
```

```sql
SELECT employee_id FROM developers
INTERSECT 
SELECT employee_id FROM designers
INTERSECT 
SELECT employee_id FROM testers

```



---

# Expert

## Question 18

Tables:

### users

| id | country |
|----|---------|
| 1 | USA |
| 2 | UK |
| 3 | Germany |

### premium_users

| user_id |
|---------|
| 1 |
| 2 |

### banned_users

| user_id |
|---------|
| 2 |

Return users who are premium but not banned.

```sql


SELECT user_id FROM premium_users
EXCEPT 
SELECT user_id FROM banned_users


```

---

## Question 19

Find users who are neither premium nor banned.

```sql

SELECT id FROM users
EXCEPT
SELECT user_id FROM premium_users
EXCEPT
SELECT user_id FROM banned_users;

```



---

## Question 20

Without using JOINs, return:

the text is the query itself 
```text
All Active Users

UNION

All Premium Users

EXCEPT

All Banned Users
```


```sql

SELECT id FROM users
UNION 
SELECT user_id FROM premium_users
EXCEPT 
SELECT user_id FROM banned_users

```

---

# Nightmare Interview Challenge

Database:

### users

| id | name |
|----|------|
| 1 | John |
| 2 | Maria |
| 3 | Ken |
| 4 | Anna |

### php_developers

| user_id |
|---------|
| 1 |
| 2 |
| 3 |

### laravel_developers

| user_id |
|---------|
| 1 |
| 2 |

### mysql_developers

| user_id |
|---------|
| 1 |
| 2 |
| 4 |

### react_developers

| user_id |
|---------|
| 2 |
| 4 |

Write one query that returns users who:

- Know PHP
- Know Laravel
- Know MySQL
- Do NOT know React

Expected Logic:

```text
PHP
INTERSECT
Laravel
INTERSECT
MySQL
EXCEPT
React
```

---

# Theory Questions

## Question 21

When would you use `UNION ALL` instead of `UNION`?

```text
You can use UNION ALL when you want to get all of the data, and to check if you want to know any duplicate data


```

---

## Question 22

Why is `UNION ALL` usually faster than `UNION`?

```text
UNION ALL doesn't check anything it just joins and return all of the data, but UNION has to check any duplicate data before it return the data to you 
```

---

## Question 23

Which set operation removes duplicates automatically?

```text
UNION
```

---

## Question 24

What SQL operation is equivalent to an intersection?

```text
the answer is in the question itself "INTERSECT"
```

---

## Question 25

How can you simulate `INTERSECT` in MySQL if it is not supported?

```text
using  INNER JOIN, IN.
```


---

## Question 26

How can you simulate `EXCEPT` in MySQL?
```text
i can use the where clause or NOT IN and LEFT JOIN 

```



---

## Question 27

Can columns have different names in a `UNION` query?

```text
yes, you just need that the columns are at the same order, same datatype.

```

---

## Question 28

What happens if the column counts do not match in a `UNION`?

```text
it will result to an error


```
---

## Question 29

What happens if the data types do not match?

```text

It will result in an error, because UNION needs to be exactly the same, column order and data type
in the column order if it is the same data type and all the data will be jumble 
example:

first_name
last_name

UNION

last_name
Firstname


other data will result to 
lastname | firstname
and firstname | lastname
```

---

## Question 30

Which is generally faster: `UNION` or `UNION ALL`? Explain why.

```text
UNION ALL is much faster because it will just return and join all of the data rather than checking it first if there is a duplicate

first UNION all will just merge all of the data and will return it to you in UNION 
it will get all of the data of the first table and then it will check 1 by 1 if there is any duplicate data in the other table if there is not and then that data will be returned to you 

UNION is just basically doing DISTINCT, it is doing sorting first 
UNION ALL is just basically returning you the data of both table, it will not check anything just and will just return all the nuber of rows, this one is just ehh here is the data that you want, 

her eis another explanation that i just thought of 
your mother ordered you to go to a supermarket and buy all of the items in the list
and at the same time you're grandmother also ordered you to go get some items on her list 

and now you are in the supermarket and you take a look at both of the list and then you see that there is a same items in the list but you still buy all of the items 
that your grandmother and your mother asked you to buy, you just get all of the items and you just finished the chore that's it.


but in UNION you will buy just one item even if you see a duplicate in the list in your grandmothers list. my grammar is bad HAHAHAHA

```


---

# Bonus Challenge

Without using:

- INTERSECT
- EXCEPT
- MINUS

Write solutions for Questions 5–20 using only:

- JOIN
- EXISTS
- NOT EXISTS
- IN
- NOT IN

This is a common SQL interview requirement because many MySQL versions do not support all SET operations.