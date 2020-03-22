

## Installation

<b>Requirement</b>
<p>
PHP 7.4
<br>
Mysql 5.8
<br>
Composer
</p>

Clone the REPO,
<br>
cd to the tasklist directory
<br>
Open your CMD
<br>
Type composer install
<br>
Copy and rename the .example.env to .env
<br>
 fill up your db details 
<br>
<p>
DB_CONNECTION=mysql
    <br>
DB_HOST=127.0.0.1
    <br>
DB_PORT=3306
    <br>
DB_DATABASE=laravel
    <br>
DB_USERNAME=root
    <br>
DB_PASSWORD=
    </p>
    <br>
   
In your Console type
    <br>
php artisan migrate
<br>
Thats all

<b> #Issues</b>
<br>
The view is scattered or not rendered well

#solution 

The library used in this project is pulled from a CDN
Connecting to the internet will resolve it.
