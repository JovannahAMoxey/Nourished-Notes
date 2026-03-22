Name: Jovannah Moxey
Student ID: U24
Submission: Submission 03
Website Title: Nourished Notes

Files and folders added/updated:

Updated:
- common/head.php
- common/banner.php
- common/navbar.php
- common/footer.php
- css/my_css.css
- my_business.php

New/Updated Scripts:
- scripts/get_datetime.php
- scripts/get_daily_quote_mongo.php
- scripts/process_feedback.php
- scripts/carousel.js

New Pages:
- pages/feedback_form.php

Resources:
- resources/quotes_mongo.json

Data Storage:
- data/feedback.txt

Existing folders used:
- images/products/

--------------------------------------------------

Features completed:

- Updated daily quote system to use MongoDB instead of a JSON file
- Implemented a PHP script to retrieve a daily quote from MongoDB
- The quote changes daily using a date-based selection method
- Added a fully functional feedback form under the "About Us" section
- Implemented client-side validation using HTML5 and pattern attributes
- Implemented server-side validation using PHP
- Created a feedback processing script that:
  - Validates all required inputs
  - Sends a confirmation email to the user
  - Sends a notification email to the business
  - Stores all feedback submissions in a server-side file
- Added a styled confirmation page after successful submission
- Added feedback form link to both the navigation menu and the sitemap
- Continued use of shared PHP includes for consistency across pages
- Maintained AJAX-based server date and time display in the banner
- Maintained rotating image carousel on the home page

--------------------------------------------------

Notes:

- The MongoDB database "u24" is used to store and retrieve quotes
- Quotes are initially loaded from resources/quotes_mongo.json
- The daily quote is selected using a date-based index (same quote per day)
- The feedback form requires all fields except the telephone number
- Input validation is performed both on the client side and server side
- Email functionality depends on the server configuration and may not function in all environments
- All feedback submissions are stored in data/feedback.txt in chronological order

--------------------------------------------------

Known issues:

- Email delivery may not work depending on server mail configuration
- Some navigation links (e.g., login, e-store) are placeholders for future development
- Minor UI styling improvements may still be in progress
