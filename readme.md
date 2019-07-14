## Warehouse Management

This php laravel application provides basic users, products and categories management for warehouses, this application also comes with a daily analytics cronjob that archives your data, as well as a database seeder to fill your app with test data.

### Installation Steps

- Clone repo
- Edit .env file with your database credentials

- In the terminal run the following commands
``` composer install ```
``` php artisan migrate --seed ```
``` sudo crontab -e ```

- scroll down to the buttom of the file and add the following line, changing the directory to your projects directory
``` * * * * * php /path/to/directory/artisan schedule:run 1>> /dev/null 2>&1 ```
and save changes to file

- finally run ``` php artisan schedule:run ```
  
By default this app needs authorization, you can log in with any of the seeded users, the default password is 'secret'  
