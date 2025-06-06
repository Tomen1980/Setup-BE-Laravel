# Application 

## Description
This is a simple application that allows users to create, read, update and delete tasks. This application use some technologies like:
- Laravel 12
- MySQL
- PhpMyAdmin   
- Redis
- Docker
- FrankenPHP

## Requirements
1. Account Github
2. Git CLI
3. Docker
4. php 8.2 or higher
5. Code Editor

## Installation
1. Clone the repository
2. Run `composer install`
3. Run `cp .env.docker .env`
4. Run service docker application
5. Run `php artisan key:generate`
6. Build application with docker `docker-compose up --build`
7. Run `docker-compose exec app php artisan migrate` if exist error run ` docker-compose exec app php artisan migrate:fresh`. you can seed data by running `docker-compose exec app php artisan db:seed`

## Notes
1. if you change file in env, dockerfile, docker-compose.yml, you need to rebuild application with docker `docker-compose up --build`
2. if you want to run the application make sure the docker is running and run `docker-compose up`
3. if you want to stop the application run `docker-compose down`
4. if you want to see the running image you run `docker ps`
5. when you change the code and if it is not updated in the browser run `docker-compose exec app php artisan config:clear` and `docker-compose exec app php artisan cache:clear`
6. visit `docs/api`

## Running Application

```
Redis

docker-compose exec redis redis-cli
```

```
App execute cli

docker-compose exec app [--options]
```

