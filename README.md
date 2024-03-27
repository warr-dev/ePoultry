# e-Poultry 
e-Poultry is a web API to control and monitor data from poultry sensors. It was built using Laravel

## Running

### host machine
#### Prerequisites
- php
- mysql
- composer
### Running
    - `cp .env.example .env`
    - edit database fields matching your database on `.env` file
    - `php artisan key generate`
    - `composer install`
    - `php artisan migrate:fresh --seed`
    - `php artisan storage:link` to make client availablle via /client
    - run via webserver (nginx, apache, etc) or `php artisan serve` for development
