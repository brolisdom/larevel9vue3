### This system works with Laravel 9 and Vue 3

Is necessary download the following programs:
- PHP v8+ and Composer
- Node v10+ and npm
- Mysql or Mariadb

Once this is done, you must install the packages with the following commands:
- npm install
- composer install

To be able to interact with the database it is necessary to execute the commands:
- php artisan migrate
- php artisan db:seed
Or you can run both at the same time with:
- php artisan migrate:fresh --seed

Finally, the frameworks must be left running with the following commands:
- npm run dev
- php artisan serve

**Note: In the .env file you must set the DB_DATABASE variable to the name of your database that you created for the project.**

That's it, happy coding :)