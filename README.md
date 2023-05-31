# ![Weather Demo APP]

Git Clone URL: https://github.com/ahimendradangi130392/weather_app.git

## Introduction

-   This Weather App Shows the Weather Details of user's searched locations
-   The project is taken to Laravel 7.29 Framework.

## Features

-   Location-Based Weather Details
-   Get the current location of users
-   Recent search locations
-   Current temperature
-   Weather description
-   Humidity
-   Wind speed
-   Any additional weather data you find relevant

## Prerequisite

-   PHP >= 7.2.5
-   BCMath PHP Extension
-   Ctype PHP Extension
-   Fileinfo PHP extension
-   JSON PHP Extension
-   Mbstring PHP Extension
-   OpenSSL PHP Extension
-   PDO PHP Extension
-   Tokenizer PHP Extension
-   XML PHP Extension

## Installation

Clone the repository
git clone https://github.com/ahimendradangi130392/weather_app.git

Switch to the repo folder
cd weather_app

Copy the example env file and make the required configuration changes in the .env file
cp .env.example .env

and paste that key ###### Required Key For the Weather APP

WEATHER_ENDPOINT = 'http://api.weatherapi.com/v1/'
WEATHER_KEY = 3dab0c0d9ac7435f97284029233005
MAPBOX_KEY = pk.eyJ1IjoidmlzaG51c2luZ2gxOTkwIiwiYSI6ImNsaWE4cmcydDAxY2kzbG11bW5jNDl4ZmQifQ.uRt6w3KkZVnIs1UK42DmoQ

Install all the dependencies using composer (if don't have install it [Composer](https://getcomposer.org/))
composer version 2.5
composer install

Run the database migrations (**Set the database connection in .env before migrating**)

php artisan migrate

Start the local development server

php artisan serve

You can now access the server at http://localhost:8000

## Note

-   Must Enable your location of browser
-   Use that site for api key https://www.weatherapi.com/
-   If free limit expired then create new key and update in .env
-   For location search use that website for api key https://www.mapbox.com/
-   create your own database
-   Upload .env file for ease use
-   To clear out these config settings and cache your updated settings, simply run:
    php artisan config:cache
    php artisan config:clear

    -- Enjoy :)
