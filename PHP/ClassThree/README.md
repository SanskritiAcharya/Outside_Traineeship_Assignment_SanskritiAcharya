# PHP Login System

This is a user registration and login system built with PHP and MySQL.

## Setup

1. Open phpMyAdmin and create a database
2. Create a `users` table with these columns:
   - `userid` — INT, AUTO_INCREMENT, PRIMARY KEY
   - `username` — VARCHAR(50)
   - `password` — VARCHAR(255)
3. Open `db.php` and update the database name to match yours

## How to Run

Go: `http://localhost/folder-name/register.php`

## Pages

- `register.php` — Create a new account
- `login.php` — Log in to your account
- `welcome.php` — Shown after successful login
- `logout.php` — Logs you out and redirects to login

## Files

- `database.php` — Database connection
- `register.php` — Registration page
- `login.php` — Login page
- `welcome.php` — Protected welcome page
- `logout.php` — Destroys session and logs out