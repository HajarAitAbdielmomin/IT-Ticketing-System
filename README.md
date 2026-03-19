# 🎫 Ticketing System
 
A web-based customer support ticketing system built with **Laravel** and **MySQL**, enabling clients to submit tickets and support agents to manage and resolve them.
 
---
 
## 📋 Prerequisites
 
Before getting started, make sure you have the following installed:
 
- [WampServer v3.2.3](https://www.wampserver.com/) (includes Apache, MySQL, PHP)
- [Composer](https://getcomposer.org/download/)
 
---

## 🚀 Installation & Setup
 
### Step 1 - Install Composer
 
Download and install Composer from the official website:
👉 https://getcomposer.org/download/
 
### Step 2 — Verify Composer Installation
 
Open a command prompt and run:
 
```bash
composer
```
 
You should see the Composer version and available commands printed in the terminal.
 
---
 
### Step 3 - Place the Project
 
Copy the project folder into your WampServer web directory:
 
```
C:\wamp64\www\
```
 
---
 
### Step 4 - Install Dependencies
 
Navigate to the project folder in your terminal and run:
 
```bash
composer install --no-scripts
```
 
---
 
### Step 5 - Generate Application Key
 
```bash
php artisan key:generate
```
 
This sets the `APP_KEY` value in the `.env` file located at the root of the project.
 
---
 
### Step 6 - Create the Database
 
Open **phpMyAdmin** and create a new database named:
 
```
ticketing
```
 
Then update your `.env` file with the following database configuration:
 
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ticketing
DB_USERNAME=root
DB_PASSWORD=
```
 
---
 
### Step 7 - Run Migrations
 
```bash
php artisan migrate
```
 
This will create all required tables in the `ticketing` database.
 
---

### Step 8 - Seed the Database
 
After migration, open **phpMyAdmin**, select the `ticketing` database, and populate the following tables in order:
 
`user` → `ticket_status` → `ticket` → `ticket_replies`
 
> ⚠️ Respect this order to avoid foreign key constraint errors.

---

### Step 9 - Start the Development Server
 
```bash
php artisan serve
```
 
The application will be available at: **http://127.0.0.1:8000**
 
---
 
## 🗂️ Database Schema Overview
 
| Table | Description |
|---|---|
| `user` | Stores client and support agent accounts (`role: 1` = agent, `0` = client) |
| `ticket_status` | Lookup table for ticket states: Processing, Solved, Unsolved |
| `ticket` | Core ticket records with title, topic, dates, and file attachments |
| `ticket_replies` | Threaded conversation between agents and clients per ticket |
 
---
 
## 🛠️ Tech Stack
 
- **Backend**: Laravel (PHP)
- **Database**: MySQL via phpMyAdmin
- **Server**: WampServer v3.2.3
- **Dependency Manager**: Composer
 
