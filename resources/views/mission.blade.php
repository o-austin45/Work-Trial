<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                margin: 0 1em;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .title {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 14px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div id="app" class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    The Mission
                </div>

                <example-component></example-component>

                <div class="tasks">
                    To start the dev environment open a command line and type

                    <span class="code-block">tsk api:start</span>

                    A fresh Laravel app will be available at localhost:9080

                    <ul>
                        <li><a href="https://laravel.com/docs/5.8/controllers">https://laravel.com/docs/5.8/controllers</a></li>
                        <li><a href="https://laravel.com/docs/5.8/routing">https://laravel.com/docs/5.8/routing</a></li>
                        <li><a href="https://vuejs.org/">https://vuejs.org/</a></li>
                        <li><a href="https://router.vuejs.org/">https://router.vuejs.org/</a></li>
                    </ul>
                    
                    <p>
                        When using artisan be sure to use ‘tsk’ instead of ‘php’ when using the command line
                    </p>
                    
                    <h3>Randy images</h3>
                    <ol>
                        <li>Create a controller and routes at /images/asc, /images/desc and /images/random that returns an array of URLs for 4 images in ascending alphabetical file name order, descending order and a random order that varies every time</li>
                        <li>Make three Vue pages at /images/asc/, /images/desc/ and /images/random/ that show the images returned from the above routes</li>
                    </ol>
                        
                    <h3>Animals</h3>
                    <ul>
                        <li><a href="https://laravel.com/docs/5.8/migrations">https://laravel.com/docs/5.8/migrations</a></li>
                        <li> <a href="https://laravel.com/docs/5.8/eloquent">https://laravel.com/docs/5.8/eloquent</a></li>
                    </ul>
                    <p>A database already exists which can be accessed by going to localhost:9090. You should only need to access the database when checking that your migrations worked</p>
                    <ol>
                        <li>Create a model and database table for animals. The table should contain the following fields:
                        <q>id, name, class (mammal, bird, etc.), conservation_status and latin_name.</q> Enter data for 5 different animals (find the info on Wikipedia)</li>
                        <li>Create a new controller and a route at /animals/list/ that returns all animals in alphabetical order.</li>
                        <li>Create a Vue page that lists all the animals in a table.</li>
                        <li>Create a route in your controller to return a specific animal by passing through an ID. e.g. /animals/get/1/</li>
                        <li>Create a Vue page that shows all the stored data about the animal. Clicking on an animal in the table you made in step 3 should navigate to that animal’s page</li>
                    </ol>
                    
                    <h3>Cars, manufacturers and fuel types</h3>
                    <ul>
                        <li><a href="https://laravel.com/docs/6.x/eloquent-relationships">https://laravel.com/docs/6.x/eloquent-relationships</a></li>
                    </ul>
                    <ol>
                        <li>Create models and tables for Car, Manufacturer and FuelType. These models should be linked via relations. One manufacturer has many cars, one car has one manufacturer. One car has one fuel type.One fuel type has many cars. Manufacturer and fuel type are not linked. The tables should have the following fields
                            Car: name, seats, doors, top_speed
                            Manufacturer: name
                            FuelType: name </li>
                        <li> Fill the tables with data for 5 manufacturers, 10 cars and 3 fuel types (petrol, diesel, electric)</li>
                        <li> Create the controller and routes for /cars/list/ and /cars/get/1/</li>
                        <li>Modify the /cars/list/ command to take GET parameters  ?manufacturer=...?fueltype=...</li>
                        <li>Make a Vue page for the car list and a Vue page for each individual car.</li>
                        <h4>Stretch Goals</h4>
                        <li>Make all of your car and manufacturer routes utilise Laravel resources</li>
                        <li>Create an interface and route for adding new cars and manufacturers</li>
                        <li> Using Laravel middleware, prevent a user from adding new cars and manufacturers unless they also provide a password. The password should be checked against a copy stored in Laravel’s .env file</li>
                        <li>Create an analytics page that shows how many cars there are per manufacturer and fuel type (includes installing Chart js npm)</li>
                        <li> Create a basic ‘order’ flow for Cars.</li>
                        <li>                    Add a ‘buy’ button to the car page
                        </li>
                        <li>Add a basic cart page with a ‘place order’ button which creates an order in the database and redirects you to an order receipt page</li>
                        <li> Add a chart to the analytics page which shows how many times each car has been purchased, and purchases over time</li>
                        <li>Add a search bar to the car list page. The search bar must be able to search for cars by name and manufacturer name in a single query</li>
                        <li> Track searches, add a table of most popular searches to the analytics page.</li>
                    </ol>
                </div>
            </div>
        </div>
    </body>

    <script src="{{ mix('js/app.js') }}"></script>
</html>
