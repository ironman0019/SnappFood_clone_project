## Snapp Food clone project

## Description
This project is an online food ordering website similar to persian snapp food site (https://snappfood.ir/). This project includes admin panel and seller panel (Restaurant owner's). The frontend of this project is written with bootstrap and taliwindcss together.

## Installation
1. Clone the project
2. Navigate to the project's root directory using terminal
3. Create `.env` file - `cp .env.example .env`
4. Execute `composer install`
5. Execute `npm install`
6. Set application key - `php artisan key:generate --ansi`
7. Execute migrations and seed data - `php artisan migrate --seed`
8. Start vite server - `npm run dev`
9. Start Artisan server - `php artisan serve`

## Note
1. The route for admin panel is /admin and the default username is admin and password is admin1234.
2. You can Change admin username & password in admin panel.

## Database ERD
![Alt text](/public/screenshots/Diagram.jpg?raw=true "Optional Title")

## Screenshots
![Alt text](/public/screenshots/1.jpg?raw=true "Optional Title") 
![Alt text](/public/screenshots/2.jpg?raw=true "Optional Title") 
![Alt text](/public/screenshots/3.jpg?raw=true "Optional Title") 
![Alt text](/public/screenshots/4.jpg?raw=true "Optional Title") 
![Alt text](/public/screenshots/5.jpg?raw=true "Optional Title") 
![Alt text](/public/screenshots/6.jpg?raw=true "Optional Title") 
