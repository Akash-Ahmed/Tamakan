

## About Tamakan Online Coding Test Application

This laravel application are Developed php and laravel version 8. To install this application 
please follow those instructions.
- **Create a database locally named test utf8_general_ci**
- **Download composer https://getcomposer.org/download/**
- **Pull Laravel/php project from git provider.**
- **Rename .env.example file to .envinside your project root and fill the database information. (windows wont let you do it, so you have to open your console cd your project root directory and run mv .env.example .env )**
- **Open the console and cd your project root directory**
- **Run composer install or php composer.phar install**
- **Run php artisan key:generate**
- **Run php artisan migrate**
- **Run php artisan db:seed --class=CreateUsersSeeder**
- **Run php artisan serve**
- **To store API data Please Run http://127.0.0.1:8000/store_date**

## Admin access Information
- name =>Admin
- phone => 0147852369,
- email => rkakash46@gmail.com,
- password => 123456,

## API Information

- Login API http://127.0.0.1:8000/api/login
  ( Email & password are required )
- Registration API http://127.0.0.1:8000/api/register
  ( Name, Email, Phone Number, Password )
