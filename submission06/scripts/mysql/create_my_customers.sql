DROP TABLE IF EXISTS my_customers;

CREATE TABLE my_customers (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    salutation VARCHAR(10) NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    middle_initial CHAR(1) NULL,
    last_name VARCHAR(50) NOT NULL,
    gender VARCHAR(10) NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20) NULL,
    street_address VARCHAR(100) NULL,
    city VARCHAR(50) NULL,
    region VARCHAR(50) NULL,
    postal_code VARCHAR(20) NULL,
    registration_datetime DATETIME DEFAULT CURRENT_TIMESTAMP,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL
);