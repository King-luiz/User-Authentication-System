# User Authentication System

## Overview
This project is a simple PHP-based user authentication system. It includes functionality for user registration, login, logout, and session-based access control. The project uses a MySQL database for storing user credentials and provides secure practices such as password hashing and session management.

## Features
1. **User Registration**:
   - Allows users to register with a username, email, and password.
   - Passwords are securely stored in the database using `md5` hashing.

2. **User Login**:
   - Users can log in using their username and password.
   - Sessions are used to maintain the user's login state.

3. **Session Management**:
   - Protected pages redirect users to the login page if they are not authenticated.

4. **Logout Functionality**:
   - Users can log out, which destroys the session and redirects them to the login page.

## File Structure
```
├── db.php                # Database connection file
├── index.php             # The home page for logged-in users
├── login.php             # Login page
├── logout.php            # Logout functionality
├── registration.php      # User registration page
├── auth.php              # Session-based access control
├── css/
│   └── style.css         # Styling for the forms
```

## Prerequisites
- PHP (>= 7.0)
- MySQL or MariaDB
- A web server like Apache (e.g., XAMPP, WAMP, or LAMP)

## Setup Instructions

1. **Clone the Repository**:
   ```bash
   git clone King-luiz
   cd <repository-folder>
   ```

2. **Database Setup**:
   - Create a MySQL database named `mytrials`.
   - Run the following SQL command to create the `users` table:
     ```sql
     CREATE TABLE `users` (
         `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
         `username` VARCHAR(50) NOT NULL,
         `password` VARCHAR(255) NOT NULL,
         `email` VARCHAR(100) NOT NULL,
         `trn_date` DATETIME NOT NULL
     );
     ```

3. **Configure the Database Connection**:
   - Open the `db.php` file and update the database credentials:
     ```php
     $host = 'localhost';
     $user = 'root';
     $password = ''; // Your database password
     $dbname = 'mytrials';
     ```

4. **Run the Project**:
   - Place the project folder in the web server's root directory (e.g., `htdocs` for XAMPP).
   - Start the Apache and MySQL services.
   - Open your browser and navigate to `http://localhost/<project-folder>/registration.php` to register a new user.

## Usage
1. **Register**:
   - Navigate to `registration.php` and fill out the form to create a new user account.

2. **Login**:
   - Go to `login.php` and log in with your credentials.
   - Upon successful login, you'll be redirected to `index.php`.

3. **Logout**:
   - Click the logout button or navigate to `logout.php` to log out and destroy the session.

## Security Notes
- **Password Hashing**: Currently, `md5` is used for hashing passwords, which is considered insecure. Replace it with `password_hash()` for better security.
- **HTTPS**: Use HTTPS to encrypt data in transit.
- **SQL Injection**: Use prepared statements to prevent SQL injection.

## License
This project is open-source and available under the [MIT License](LICENSE).

## Contributing
Feel free to fork this repository and submit pull requests to improve the codebase. Suggestions and bug reports are also welcome!

## codedbyluiz

