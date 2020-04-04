# Advanced Transport Requisition Management
The advanced Transport Requisition Management can automate your transportation management problems at your organization.
##

## Requirements
* PHP >= 7.2
* cURL, mcrypt, zip, unzip, libmcrypt-dev, git Extensions
* [Apache HTTP](https://httpd.apache.org/download.cgi) or [Nginx](https://www.nginx.com/) server
* [MySQL](https://dev.mysql.com/) database
* [Composer](https://getcomposer.org/) php package manager
* [npm](https://www.npmjs.com/) node package manager

## Installation
    git clone https://github.com/NazmusShakib/transport-requisition-management.git
Switch to the repo folder

    cd transport-requisition-management

Install all the dependencies

    composer install && npm install

Build npm dependencies

    npm run dev

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate --seed

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone https://github.com/NazmusShakib/transport-requisition-management.git
    cd transport-requisition-management
    composer install && npm install
    npm run dev
    cp .env.example .env
    php artisan key:generate
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate --seed
    php artisan serve
    
##    
> ### Some useful commands that I use most often to manage Docker. Basically that boils down to the following

Execute command in docker container from host PC:

    docker exec -ti req_app php artisan key:generate
    docker exec -ti req_app php artisan migrate:fresh --seed

Enter into container:
  
    docker exec -ti req_app bash

Find out the IP address of a container:

>$ docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' req_db
>
>$ docker inspect --format='{{.Name}} {{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' $(docker ps -q)    

To stop all running containers:

    docker stop $(docker ps -a -q)
    docker container stop $(docker container ls -aq)
    
To clear containers:

    docker rm -f $(docker ps -a -q)

To clear images:

    docker rmi -f $(docker images -a -q)

To clear volumes:

    docker volume rm $(docker volume ls -q)

To clear networks:

    docker network rm $(docker network ls | tail -n+2 | awk '{if($2 !~ /bridge|none|host/){ print $1 }}')

## License

©2020 licensed under the [MIT license](https://opensource.org/licenses/MIT).
