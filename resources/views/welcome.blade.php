@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">About</div>

                <div class="card-body">
                This system works with Laravel 9 and Vue 3
                <br>Is necessary download the following programs:
                <br>- PHP v8+ and Composer
                <br>- Node v10+ and npm
                <br>- Mysql or Mariadb
                <br>
                <br>Once this is done, you must install the packages with the following commands:
                <br>- npm install
                <br>- composer install
                <br>
                <br>To be able to interact with the database it is necessary to execute the commands:
                <br>- php artisan migrate
                <br>- php artisan db:seed
                <br>
                <br>Or you can run both at the same time with:
                <br>- php artisan migrate:fresh --seed
                <br>
                <br>Finally, the frameworks must be left running with the following commands:
                <br>- npm run dev
                <br>- php artisan serve
                <br>
                <br>Note: In the .env file you must set the DB_DATABASE variable to the name of your database that you created for the project.
                <br>
                <br>That's it, happy coding :)
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
