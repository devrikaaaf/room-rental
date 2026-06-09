<!-- the title of project -->
![Boarding House](img/banner.png)
# 🧠 Room Booking System
This project was developed to help boarding house owners manage their businesses. Not a few boarding house business owners who record the important data of their residents in books or paper. With this web management system, the owner can manage room & resident data, room booking process, resident payment records, to monthly income safely.  The application is built using PHP, MySQL, and FPDF, and is designed to be scalable and secure.

## 🚀 Features
* User registration and login functionality
* Room booking and management system
* Tenant information management
* Transaction information
* Invoice generation using FPDF
* Admin Dashboard
* Search functionality for rooms and tenants
* Validation logic for user input

## 🛠️ Tech Stack
* **Frontend**: PHP, HTML, CSS, JavaScript
* **Backend**: PHP, MySQL
* **Database**: MySQL
* **Libraries**: mysqli, FPDF

## 📂 Project Structure
```
rentalroom/
|-- booked_room.php
|-- booking.php
|-- dashboard.php
|-- income.php
|-- index.php
|-- r_add.php
|-- r_delete.php
|-- r_edit.php
|-- regis.php
|-- room.php
|-- room.sql
|-- t_add.php
|-- t_delete.php
|-- t_edit.php
|-- tenant.php
|-- tn_upstatus.php
|-- trans_process.php
|-- trans.php
|-- functionn.php/
|   |-- booking_process.php
|   |-- function.php
|-- invoice/
|   |-- fpdf.php
|-- img/
|   |-- 3.png
|   |-- coin.jpg
|   |-- login2.png
|   |-- loginp3.jpg
|   |-- logout1.png
|-- README.md
```

## 📦 Installation
To install the Room Booking System, follow these steps:
1. Clone the repository to your local machine
2. Create a MySQL database and import the schema from the `room.sql` file
3. Update the database connection settings in the `function.php` file
4. Install the FPDF library using Composer
5. Run the application on a PHP server

## 💻 Usage
1. Register as a user by filling out the registration form on the `regis.php` page
2. Log in to the application using the `index.php` page
3. Navigate to the dashboard to view key metrics and manage room information
4. Use the search functionality to find rooms and tenants
5. Book a room by filling out the booking form on the `booking.php` page
6. Manage payment transactions using the `trans.php` page




