# 🌱 Nourished Notes

**Developer:** Jovannah Moxey
**Status:** In Development / Portfolio Rebuild
**Original Project:** University Web Development Project

## About the Project

**Nourished Notes** is a faith-inspired, database-driven web application that combines daily Scripture-based encouragement with an e-commerce experience.

The project was originally developed as part of my Computer Science coursework and gave me hands-on experience building a full-stack web application using **PHP, MySQL, MongoDB, HTML, CSS, and JavaScript**.

I am currently revisiting Nourished Notes as a portfolio project — restoring its original functionality, improving the codebase and user experience, and preparing the application for a future live demo.

## ✨ Features

### Daily Scripture

Nourished Notes retrieves Scripture-based encouragement from a **MongoDB** collection and displays a daily quote to the user.

Each entry contains:

* A Scripture reference
* A Scripture-based quote
* A descriptive theme or adjective

### Customer Registration

Users can create an account through the registration system.

The application:

* Validates input on both the client and server
* Prevents duplicate email addresses
* Prevents duplicate usernames
* Securely hashes passwords before storage
* Retains appropriate form values when validation fails

### Authentication

The PHP authentication system supports:

* Customer login
* Secure password verification
* Customer logout
* Session-based authentication
* Personalized content for authenticated users
* Login and logout status messaging

Passwords are stored using PHP's `password_hash()` function and verified using `password_verify()`.

### E-Commerce

Nourished Notes includes the foundation for a database-driven storefront, including:

* Product categories
* Product information
* Pricing
* Inventory quantities
* Product imagery
* Customer accounts

Additional storefront functionality is being restored and refined as part of the portfolio rebuild.

## 🛠️ Technologies

* **PHP 8**
* **MySQL**
* **MongoDB**
* **PDO**
* **HTML5**
* **CSS3**
* **JavaScript**
* **PHP Sessions**
* **Git & GitHub**

## 🗄️ Database Architecture

Nourished Notes currently uses two database technologies.

**MySQL** manages structured relational application data, including:

* `my_customers`
* `my_categories`
* `my_products`

**MongoDB** stores the Scripture-based content used by the daily encouragement feature.

This project gave me experience working with both relational and document-oriented databases within the same PHP application.

## 📁 Project Structure

Key areas of the project include:

```text
common/          Shared PHP components such as the banner and navigation
pages/           Application pages including registration and login
scripts/         PHP processing and database connection scripts
scripts/mysql/   MySQL schema and database scripts
resources/       Supporting application resources
my_business.php  Main application page
```

## 🔐 Security

The application incorporates several basic security practices:

* Password hashing with `password_hash()`
* Password verification with `password_verify()`
* Server-side form validation
* Duplicate username and email prevention
* Session-based authentication

Database credentials and other sensitive configuration should not be committed to the public repository.

## 🚧 Current Development

I am currently revisiting the original university project and modernizing it for my software development portfolio.

Current work includes:

* Restoring the original MySQL data and functionality
* Restoring MongoDB integration
* Reviewing and refactoring older PHP code
* Improving project organization
* Refining the UI and user experience
* Improving configuration and credential management
* Preparing the application for deployment

## 🌿 What's Next

The goal is to transform Nourished Notes from an archived university assignment into a polished portfolio application while preserving the core concept that inspired the original project.

Planned improvements include continued code cleanup, storefront enhancements, UI refinements, improved configuration management, and a publicly accessible **live demo**.

---

**Nourished Notes** 🌱
*Nourishing faith, one note at a time.*
