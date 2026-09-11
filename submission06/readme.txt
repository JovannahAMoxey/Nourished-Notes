Name: Jovannah Moxey
Student ID: U24
Submission: Submission 04
Website Title: Nourished Notes

Files and folders added/updated:

Updated:
- common/banner.php
- common/navbar.php
- pages/sitemap.php
- my_business.php

New Pages:
- pages/register.php
- pages/login.php

New Scripts:
- scripts/connect_to_database.php
- scripts/process_registration.php
- scripts/process_login.php
- scripts/process_logout.php

MySQL Scripts:
- scripts/mysql/create_my_customers.sql

--------------------------------------------------

Features completed:

- Created a MySQL table (my_customers) to store customer data
- Implemented a customer registration system:
  - Validates user input on both client and server side
  - Prevents duplicate email addresses
  - Prevents duplicate usernames
  - Stores passwords securely using password hashing
  - Retains form values when validation fails
- Implemented a login system:
  - Verifies username and password using secure password comparison
  - Displays appropriate error messages for invalid login attempts
- Implemented a logout system:
  - Logs out users by clearing session data
  - Displays appropriate messages depending on login state
- Used PHP sessions to track logged-in users
- Personalized the welcome message in the banner using session data
- Updated navigation and sitemap links to include:
  - Register
  - Log In
  - Log Out
- Maintained consistent layout using shared PHP includes

--------------------------------------------------

Notes:

- Passwords are stored securely using PHP’s password_hash() function
- Login verification is performed using password_verify()
- Session variables are used to store user information after login or registration
- Logout messages are displayed on the login page using session-based messaging
- The banner dynamically updates to display a personalized welcome message when a user is logged in

--------------------------------------------------

Known issues:

- Some UI elements (e.g., e-store features) are placeholders for future submissions
- Minor styling improvements may still be in progress