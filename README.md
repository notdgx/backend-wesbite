# Backend Web Development 

![Backend Web Development Banner](assets/Backend%20Web%20Development%20Infographic.png)

[![GitHub repo](https://img.shields.io/badge/GitHub-Repository-blue?logo=github)](https://github.com/notdgx/backend-wesbite)
[![PHP](https://img.shields.io/badge/Language-PHP-777BB4?logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/Database-MySQL-4479A1?logo=mysql&logoColor=white)](https://www.mysql.com/)

A practical coursework repository and documentation website for **Backend Web Development** using **PHP and MySQL**, developed for the **BCA 3rd Semester** curriculum.

---

## Student & Course Information

- **Student:** Daisy Dhiman
- **Roll No:** 4205/25 (Section A)
- **Course / Semester:** BCA 3rd Semester
- **Subject:** Backend Web Development
- **Submitted To:** Mr. Gaurav Sir
- [GitHub Repository](https://github.com/notdgx/backend-wesbite)

---

## Overview

This repository contains full syllabus notes, 120 practical PHP problem solutions, and an end-to-end user management web application:
- **Comprehensive Notes & Practicals:** Covers PHP fundamentals from basic syntax, variables, operators, and control structures to form handling, file I/O, and MySQL database integration.
- **Documentation Website (`index.html` & `webpages/`):** A clean static website for navigating through notes and practical questions.
- **Working PHP Project (`project/`):** An Online Registration & User Management System with automatic database setup, session authentication, and full CRUD operations.

---

## Project Structure

```
backend-wesbite/
├── index.html                   # Main portal landing page
├── README.md                    # Project documentation
│
├── assets/                      # Diagrams, infographics, and UI screenshots
│   ├── Backend Web Development Infographic.png   # Hero banner
│   ├── hero.jpg
│   └── project-*.png            # Screenshots of the CRUD project
│
├── webpages/                    # Topic pages and theory notes
│   ├── notes.html               # Full syllabus notes (Units I - IV)
│   ├── php-basics-variables-constants-data-types.html
│   ├── operators-and-expressions.html
│   ├── decision-making-statements.html
│   ├── looping-constructs.html
│   ├── string-handling.html
│   ├── arrays.html
│   ├── php-functions.html
│   ├── html-forms-get-post-server-side-validation.html
│   ├── file-handling.html
│   ├── mysql-database-connectivity.html
│   ├── php-project.html         # Walkthrough of the Registration Project
│   └── style.css                # Website stylesheet
│
└── project/                     # Online User Registration & Management System
    ├── connect.php              # Auto-creates database (`college_db`) & `user` table
    ├── register.html / .php     # User registration form & handler
    ├── index.php                # User login page
    ├── home.php                 # Dashboard listing all registered users
    ├── edit.php / update.php    # Edit user profile and details
    ├── delete.php               # Delete user record & uploaded photo
    ├── logout.php               # Session termination
    └── stylesheet.css           # Project styling
```

---

## Topics & Practicals Summary

| # | Topic / Module | Description & Highlights |
| :-: | :--- | :--- |
| **01** | **Full Syllabus Notes** | Web architectures, client-server models, HTTP protocol, DNS, IP addressing, PHP runtime, and MySQL database fundamentals. |
| **02** | **PHP Basics & Data Types** | Variables, constants, data types, type casting, `echo`/`print`, and output formatting. |
| **03** | **Operators & Expressions** | Arithmetic, relational, logical, assignment, conditional/ternary, and bitwise operators. |
| **04** | **Decision-Making Statements** | `if`, `if-else`, nested `if`, `if-else-if` ladder, and `switch-case` constructs. |
| **05** | **Looping Constructs** | `while`, `do-while`, `for`, `foreach` loops, and loop control with `break` and `continue`. |
| **06** | **String Handling** | Built-in string functions (`strlen`, `strrev`, `strpos`, `substr`, `strcmp`, `trim`, casing). |
| **07** | **Arrays** | Indexed arrays, associative arrays, multidimensional arrays, and array manipulation functions. |
| **08** | **PHP Functions** | User-defined functions, parameterized functions, default arguments, return types, and recursion. |
| **09** | **HTML Forms & Validation** | `GET` vs `POST` methods, form handling, sanitization, and server-side validation. |
| **10** | **File Handling** | Reading, writing, appending files (`fopen`, `fread`, `fwrite`, `fclose`), and file upload handling. |
| **11** | **MySQL Database Connectivity** | `mysqli` procedural & OOP connection, error handling, SQL queries (`INSERT`, `SELECT`, `UPDATE`, `DELETE`). |
| **12** | **PHP CRUD Project** | End-to-end User Registration, Login, Session Management, Profile Updates, and Image Uploads. |

---

## How to Run the PHP Project (`project/`)

The included user management system runs locally via **XAMPP** or any local PHP/MySQL environment:

1. **Copy to XAMPP htdocs:**
   Copy the `project/` folder into your XAMPP htdocx 
2. **Start Services:**
   Open the **XAMPP Control Panel** and start both **Apache** and **MySQL**.
3. **Open in Browser:**
   Navigate to:
   ```
   http://localhost/Registration/index.php
   ```
4. **Automatic Database Setup:**
   `connect.php` automatically creates the database (`college_db`) and the `user` table on first run—no manual SQL import required.

---

## Related Repositories

- [data-structures](https://github.com/notdgx/data-structures)
- [python-learning](https://github.com/notdgx/python-learning)
- [numpy-learning](https://github.com/notdgx/numpy-learning)
- [C_Questions](https://github.com/notdgx/C_Questions)
- [CPP_Questions](https://github.com/notdgx/CPP_Questions)

---

## License & Academic Integrity

This codebase is created for academic coursework and assignment submissions under BCA Semester 3 (Backend Web Development).
