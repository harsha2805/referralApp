# Gamer Waitlist

Gamer Waitlist is an application that helps potential customers sign up for a waiting list for a new product.
- The first user starts at position 1, the next at position 100, the next at 101, and so on...
- If a new user signs up using his referral code, the parent user will move up one position.
- If a user reaches position 1, he will be emailed a coupon code.
- The administrator has the ability to view and delete users.


## Requirements

In order to begin, you will need the following software installed:

I recommend installing and defining 7zip in the system variables

- Composer (2.5.8)

- Laravel (10)

- XAMPP (or another web server solution)

## Installation

1. Clone this repository to your local machine:

	    git clone https://github.com/harsha2805/gamer.git

2. Navigate to the project directory:

	    cd gamer-waitlist

3. Install required dependencies using Composer:

	    composer install

4. Update the .env file:

	Open the .env file and configure the following settings:

		Ensure the correct port is set.

		Set the DB_DATABASE to your desired database name.

		Set the DB_USERNAME and DB_PASSWORD to your database credentials.

7. Run database migrations and seed the database:

	    php artisan migrate

	    php artisan db:seed --class = AdminUserSeeder

## To run the application:

    -Set up your local development server (XAMPP, for example) and make sure the project directory is accessible.
    -Visit the appropriate URL (e.g., http://localhost/gamer/public) in your web browser to access the application.

# Sample Data:

	Admin Role User:
		UserName->admin@gamerwaitlist.com
		Password->admin*!123
  # Features:

    - Login/Signup 
    - Admin Page: Admins can view and delete users.    
    - User Page: Users can see their current position and share the URL through WhatsApp, Facebook, Twitter, Telegram.
    - You can use Telescope to see what requests your application receives, database queries, and more.
        Here's how to install it: https://laravel.com/docs/10.x/telescope


        THIS IS MY FIRST PROJECT
