# Gamer Waitlist

Gamer Waitlist is an application that helps potential customers sign up for a waiting list for a new iPhone product.

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

-> Set up your local development server (XAMPP, for example) and make sure the project directory is accessible.

-> Visit the appropriate URL (e.g., http://localhost/gamer/public) in your web browser to access the application.

# Sample Data:

	Admin Role User:
		UserName->admin@gamerwaitlist.com
		Password->admin*!123
  # Features:

	-> Login/Signup
 
    -> Admin Page: Admins can view and delete users.
    
	-> User Page: Users can see their current position and share the URL through WhatsApp, Facebook, Twitter, Telegram.


Signup Page:
    ![image](https://github.com/harsha2805/gamer/assets/96760251/2e2924b1-94f6-4dde-8118-358c6c3beeb8)
NewUserPage:
    ![image](https://github.com/harsha2805/gamer/assets/96760251/b7c28cda-3c77-4abd-b705-cdb3399676de)
LoginPage:
    ![image](https://github.com/harsha2805/gamer/assets/96760251/1f471025-2bb8-44d9-9ef2-bcba15b37557)
AdminPage:
    ![image](https://github.com/harsha2805/gamer/assets/96760251/9f2ceb8c-e4e5-454c-9bde-945740470a46)
UserPage:
    ![image](https://github.com/harsha2805/gamer/assets/96760251/259a405b-d38c-4247-bedd-41d0369c2f9f)



