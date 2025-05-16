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

## Installation
1. Clone the repository
2. Run `composer install`
3. Run `cp .env.docker .env`
4. Run service docker application
5. Run `php artisan key:generate`
6. Run `php artisan migrate` if exist error run `php artisan migrate:fresh`. you can seed data by running `php artisan db:seed`
7. Build application with docker `docker-compose up --build`

## Notes
1. if you change file in env, dockerfile, docker-compose.yml, you need to rebuild application with docker `docker-compose up --build`
2. if you want to run the application make sure the docker is running and run `docker-compose up`
3. if you want to stop the application run `docker-compose down`
4. if you want to see the running image you run `docker ps`

## Running Application

```
Redis

docker-compose exec redis redis-cli
```

```
App execute cli

docker-compose exec app [--options]
```

