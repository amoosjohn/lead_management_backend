## Installation process

- Clone the repository with __git clone__
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate
- Run __php artisan db:seed (to import data for leads table)
- Run __php artisan serve
- That's it: launch the main URL.

## Requirement
- For Laravel Framework 10.15.0
- PHP Version 8.1
- MYSQL Version 8.0.31
