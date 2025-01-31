# 🌟 PHP CRUD Application (Object-Oriented Programming) 🌟

Welcome to the **PHP CRUD Application**, a streamlined web application for **managing user data** using **Create, Read, Update, and Delete** (CRUD) operations. This project is crafted with **Object-Oriented PHP**, responsive design powered by **Bootstrap**, and interactive functionality via **AJAX**.

## 📋 Project Overview

- **Modular OOP Code**: Clean code leveraging PHP classes.
- **Responsive User Interface**: Built with Bootstrap.
- **AJAX-Powered**: Enjoy smooth, real-time data updates without page refreshes.

---

## 🌐 Key Features

- **Efficient Data Management**: Effortlessly manage user data through a simple UI.
- **Responsive Design**: Adaptable to any screen size, ensuring mobile-friendliness.
- **AJAX Interactivity**: Fast, dynamic data handling to boost user engagement.

---

## 🛠️ Installation Guide

Follow these steps to set up the project locally:

### Step 1: Clone the Repository

   ```bash
git clone https://github.com/Jaysinh-dev-01/crud_oop.git
cd crud_oop
   ```

### Step 2: Database Setup

1. **Create a New Database** in your SQL management tool (e.g., phpMyAdmin) and name it `crud`.

2. **Run the SQL Code Below** to set up the `users` table:

   ```sql
   -- Database Setup for `crud` Application
   DROP TABLE IF EXISTS `users`;
   CREATE TABLE IF NOT EXISTS `users` (
       `id` int NOT NULL AUTO_INCREMENT,
       `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
       `age` int NOT NULL,
       `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
       `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
       `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
       `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
       `gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
       `skills` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
       `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
       `updated_at` datetime DEFAULT NULL,
       PRIMARY KEY (`id`)
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
   ```

3. **Configure Database Connection**: Update the database settings in `config.php` to match your local environment (e.g., host, username, password).

### Step 3: Run the Application

- Start your PHP server (e.g., [XAMPP](https://www.apachefriends.org/) or [WAMP](https://www.wampserver.com/)).
- Visit `http://localhost/crud_oop` in your browser.

---

## 📂 Project Structure

Here's an overview of the main files and their responsibilities in this application:

- **`index.php`**: Displays the main user form where new users can be added.
- **`table.php`**: Renders the list of users in a responsive table format.
- **`action.php`**: Contains logic for creating, reading, updating, and deleting users by handling requests and using `user.php` for database actions.
- **`user.php`**: Defines the OOP CRUD logic, including methods for interacting with the `users` table in the database.

- **`assets/`**: Contains CSS and JavaScript libraries (Bootstrap, FontAwesome, jQuery) for styling and interactive elements.

---

## ⚙️ Technologies Used

- **PHP (Object-Oriented)** for backend processing.
- **MySQL** for database management.
- **Bootstrap 5** for responsive design.
- **AJAX (with jQuery)** for interactivity and fast updates.

---

## 💻 Usage Instructions

- **Create Users**: Add new users by filling out the provided form in `index.php`.
- **View Users**: `table.php` displays all users in a responsive, AJAX-powered table.
- **Edit Users**: Modify user information by submitting changes via the form.
- **Delete Users**: Remove users with a single click in the table view.

---

## 🤝 Contributing

Contributions are welcome! Fork the repository, make your changes, and submit a pull request. Let’s make this project even better! 🚀

## 📜 License

This project is licensed under the [MIT License](LICENSE).

---

Enjoy managing data seamlessly! 😊