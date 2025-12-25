Stack:

PHP 8.4

Laravel 12

MySQL (Docker)

Vue 3 + Inertia

Vite

Element Plus



Setup:

docker compose up -d

composer install

npm install

php artisan migrate:fresh --seed

npm run dev

Open http://localhost:8080



API

Endpoint:

GET /api/properties

Optional filters:

name (partial match)

bedrooms

bathrooms

storeys

garages

price_min


Frontend

Vue 3 with Inertia
AJAX requests via Axios
Element Plus UI
Search form with loader, results table
Initial page load fetches all properties

Returns JSON only.
