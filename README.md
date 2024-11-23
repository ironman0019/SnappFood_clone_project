## Snapp Food clone project

## Description
This project is an online food ordering website similar to persian snapp food site (https://snappfood.ir/). This project includes admin panel and seller panel (Restaurant owner's). The frontend of this project is written with bootstrap and taliwindcss together.
This project includes api routes and functions and uses sanctum package for user authentication.Also it includes sending emails and use jobs, queue, event & event listeners and notifications & more!

## Installation
1. Clone the project
2. Navigate to the project's root directory using terminal
3. Create `.env` file - `cp .env.example .env`
4. Config `.env` file mysql & mail setup.
5. Execute `composer install`
6. Execute `npm install`
7. Set application key - `php artisan key:generate --ansi`
8. Execute migrations and seed data - `php artisan migrate --seed`
9. Start vite server - `npm run dev`
10. Start Artisan server - `php artisan serve`
11. Start Queue listener - `php artisan queue:listen`
12. Link the storage in public folder for images - `php artisan storage:link`

## Useing Docker
1. Config `.env` file.
2. Run `docker-compose up --build`.
3. You can access the project in your localhost port 8000 in your browser: `localhost:8000`
### Note
1. Please wait until the docker-compose works finished (at the end you should see Starting Laravel development server... in your terminal).
2. If you had any error make sure that the ports that I defined in docker-compose file are not occupied.
3. You can access the phpMyAdmin in your browser on port 8001: `localhost:8001`.
4. You can run `php artisan commands` in laravel-app container for example: `docker exec -it laravel-app php artisan db:seed`.

## Note
1. The route for admin panel is /admin and the default username is admin and password is admin1234.
2. You can Change admin username & password in admin panel.
3. You can read api docs at `/docs/api` url. for example: `localhost:8000/docs/api`.

## Database ERD
![Alt text](/public/screenshots/Diagram.jpg?raw=true "Optional Title")

## Screenshots
![Alt text](/public/screenshots/1.jpg?raw=true "Optional Title") 
![Alt text](/public/screenshots/2.jpg?raw=true "Optional Title") 
![Alt text](/public/screenshots/3.jpg?raw=true "Optional Title") 
![Alt text](/public/screenshots/4.jpg?raw=true "Optional Title") 
![Alt text](/public/screenshots/5.jpg?raw=true "Optional Title") 
![Alt text](/public/screenshots/6.jpg?raw=true "Optional Title") 

## TODO
1. Add documentation for api. (Done)
2. Dockerize the project. (Done)
