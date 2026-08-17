# sachefitnessgroup
### Sache Fitness Group - Gym System

A comprehensive web-based management system designed for **Sache Fitness Group** to streamline gym operations, member registrations, workout tracking, and administrative tasks. Built locally using the XAMPP stack. 

### 🚀 Features

* **Member Management**: Easily register, update, and track gym member profiles and membership statuses.
* **Trainer Scheduling**: Assign trainers to specific slots, classes, or individual members.
* **Subscription & Billing**: Track membership plans, renewals, and payments.
* **Dashboard Analytics**: Real-time insights into active members, daily attendance, and revenue.

### 🛠️ Tech Stack

* **Frontend**: HTML5, CSS3, JavaScript (Bootstrap)
* **Backend**: PHP
* **Database**: MySQL
* **Server Environment**: XAMPP

### 📦 Installation & Setup

Follow these steps to run the project locally on your machine using XAMPP: 

### 1. Prerequisites

Ensure you have [XAMPP](https://www.apachefriends.org/) installed on your Windows machine. 

### 2. Clone/Move the Project

Make sure the project folder sits directly inside your XAMPP server directory: 

bash

C:\xampp\htdocs\Gym-System

Use code with caution.

### 3. Database Configuration

1. Open the **XAMPP Control Panel** and start both **Apache** and **MySQL**.
2. Open your web browser and navigate to http://localhost/phpmyadmin/.
3. Create a new database named gym_system (or your preferred database name).
4. Look for the .sql backup file inside your project directory and **Import** it into your new database.
5. Update your database configuration file (e.g., config.php or connect.php) with your local credentials: 

php

$host = "localhost";
$user = "root";
$password = "";
$database = "gym_system";

Use code with caution.

### 4. Run the Application

Open your browser and navigate to: 

url

http://localhost/Gym-System

Use code with caution.

### 👥 Contributors

* **Joseph Njuguna** - Lead Developer ([@joseph-njuguna-coder](https://github.com/joseph-njuguna-coder))
