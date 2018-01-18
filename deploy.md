### Deploydocument
1) Upload all the files to the server.(NOT /vendor)
2) Upload the .htaccess. It wil hide the /public from the url
3) Create a database on your server
4) Create a .env file (use .env.example) and fill in your details
5) SSH to your server
6) Go to the folder of this project
7) Run "composer install"
8) Run "php artisan migrate"
9) Run "php artisan seed" if you want the seed the database with data.
10) Make sure [Laravel Scheduler](https://laravel.com/docs/5.5/scheduling) is running.
    - In SSH "crontab -e" and add " * * * * * php /path/to/artisan schedule:run 1>> /dev/null 2>&1"
    - Save the file<br>

##### Done! :checkered_flag: