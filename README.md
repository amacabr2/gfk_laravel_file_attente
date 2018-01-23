# gfk_laravel_file_attente

Small laravel project to test the jobs and queues of the framework. 
In this example we upload an image and the resizing of this image is done in the background.
The project was realized via the following tutorial: _[Laravel - Les files d'attentes](https://www.grafikart.fr/tutoriels/laravel/jobs-queue-889)_

##  Installation

- Install the project: `git clone https://github.com/amacabr2/gfk_laravel_file_attente.git` or download the archive.
- Install the dependencies: `composer install` or `composer update`.
- Run the migrations: `php artisan migrate` after creating the database.

## Use redis

To have the ability to perform the tasks in the background Redis technology is used.
For more information: [https://redis.io/](https://redis.io/)
In the file `.env` change the value for `QUEUE_DRIVER` => `sync` => `redis`
