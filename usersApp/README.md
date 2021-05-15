# Users App

get users from json files

## How to setup the project
- cd to project root
- in the root directory run  `docker exec -it parent-app-users-app-php bash` to start using the php container
- then run `COMPOSER_MEMORY_LIMIT=-1 composer install`

## How to call api

- in postman VIRTUAL_HOST:PORT/api/v1/users
- you can use filter as /api/v1/users?balanceMin=200&balanceMax=300&currency=EUR

## How to run the unit testing 

in progect root `php artisan test`
