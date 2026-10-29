# 🎓 University Management System (UMS)

A web-based **University Management System** developed as a college mini project to organize student, course, and faculty information through a simple interface.

## 📌 Project Overview

The University Management System provides a central place to manage university-related information. It includes a login page, an admin dashboard, student and course management pages, and a faculty directory with individual profile pages.

## ✨ Features

- **Login System** – Login form with session-based access flow.
- **Admin Dashboard** – Central dashboard with links to major management sections.
- **Student Management** – Add, view, and edit student details.
- **Course Management** – Add and view course information.
- **Faculty Directory** – Display faculty members and filter them by course.
- **Faculty Search** – Search for faculty by information shown on their cards.
- **Faculty Profiles** – View a faculty member’s course, department, email, phone, designation, and experience.
- **Responsive UI** – Styled pages with cards, buttons, circular profile images, and hover effects.

> Note: The features available in your local version depend on the PHP pages and database tables you have configured.

## 🧰 Technologies Used

- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP
- **Database:** MySQL / MariaDB
- **Local development environment:** XAMPP
- **Version control:** Git and GitHub

## 📁 Project Structure

```text
ums/
├── index.php
├── login.php
├── dashboard.php
├── db.php
├── config.php
├── add_student.php
├── view_students.php
├── edit_student.php
├── add_course.php
├── view_courses.php
├── faculty.php
├── faculty_profile.php
├── logout.php
├── images/
└── README.md
```

This is a reference structure. Keep only the filenames that actually exist in your repository.

## ⚙️ Setup and Run Locally

### 1. Install XAMPP

Install XAMPP and start **Apache** and **MySQL** from the XAMPP Control Panel.

### 2. Copy the project

Place the project folder inside:

```text
C:\xampp\htdocs\ums
```

### 3. Create the database

1. Open [phpMyAdmin](http://localhost/phpmyadmin/).
2. Create or select the database used by your project.
3. Create/import the required tables for students, courses, faculty, and login accounts.

Use the database name and table/column names that match your PHP configuration.

### 4. Configure the database connection

Open `db.php` and/or `config.php` and check that the connection details match your local MySQL setup. For example:

```php
<?php
$conn = mysqli_connect("localhost", "root", "", "university_management");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
```

Use this example only if your database is named `university_management` and your local MySQL account uses these settings. Avoid committing real passwords or other secrets to GitHub.

### 5. Open the project

Visit:

- Login page: `http://localhost/ums/login.php`
- Home page: `http://localhost/ums/index.php`

Use a login account that already exists in your database. The redirect after login depends on your `login.php` role-handling logic.

## 🗃️ Database Notes

The PHP pages expect database tables and columns to match the SQL queries in the code. Common entities in this project include:

- `students` – student details and course reference
- `courses` – course information
- `faculty` – faculty details and profile image filename
- Login table – account credentials and, if implemented, user roles

Check your actual schema before running SQL statements. Back up your database before making schema changes.

## 🔐 Security Notes

This is a learning project. Before using it with real student data:

- Use prepared statements for database queries.
- Hash passwords with PHP `password_hash()` and verify them with `password_verify()`.
- Validate and escape user input.
- Check sessions and authorization on protected pages.
- Do not upload database passwords, real credentials, or private student/faculty information to GitHub.

## 🚀 Future Enhancements

- Role-based permissions for administrators and regular users
- Password reset and account registration
- Faculty add/edit/delete management
- Student and course reports
- Form validation and clearer error messages
- Pagination and improved search
- Secure authentication using prepared statements and hashed passwords

## 👩‍💻 Academic Project

**Project:** University Management System  
**Type:** College Mini Project / Course Activity

Built for learning web development, PHP database connectivity, CRUD operations, and user-interface design.

---

⭐ If you find this project useful, feel free to explore the code and suggest improvements.
