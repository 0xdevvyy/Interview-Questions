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

---

## Question 2

Using the same tables, return all customer names **including duplicates**.

---

## Question 3

Explain the difference between:

```sql
UNION
```

and

```sql
UNION ALL
```

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

---

## Question 6

Find employees who worked in **2024 but not 2025**.

---

## Question 7

Find employees who worked in **2025 but not 2024**.

---

## Question 8

Return all unique employees who worked in either year.

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

---

## Question 11

Find customers who purchased **only online**.

---

## Question 12

Find customers who purchased **only in-store**.

---

## Question 13

Return customers who purchased from **at least one channel**.

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

---

## Question 15

Find employees who are:

```text
Developer OR Designer
```

---

## Question 16

Find employees who are:

```text
Developer BUT NOT Tester
```

---

## Question 17

Find employees who belong to all three groups:

```text
Developer
Designer
Tester
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

---

## Question 19

Find users who are neither premium nor banned.

---

## Question 20

Without using JOINs, return:

```text
All Active Users

UNION

All Premium Users

EXCEPT

All Banned Users
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

---

## Question 22

Why is `UNION ALL` usually faster than `UNION`?

---

## Question 23

Which set operation removes duplicates automatically?

---

## Question 24

What SQL operation is equivalent to an intersection?

---

## Question 25

How can you simulate `INTERSECT` in MySQL if it is not supported?

---

## Question 26

How can you simulate `EXCEPT` in MySQL?

---

## Question 27

Can columns have different names in a `UNION` query?

---

## Question 28

What happens if the column counts do not match in a `UNION`?

---

## Question 29

What happens if the data types do not match?

---

## Question 30

Which is generally faster: `UNION` or `UNION ALL`? Explain why.

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