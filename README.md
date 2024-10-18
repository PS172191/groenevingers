# This was a group project for Year 3

## Getting Started
There are 2 folders: 
GroeneVingersBeheer is for the back-end 
GroeneVingersWeb is for the front-end

Install/update composer and npm packages (GroeneVingersBeheer and GroeneVingersWeb)

```bash
Code kopiëren
composer install
composer update

npm install
npm update
```

Migrate and Seed a local database (GroeneVingersBeheer)

```bash
Code kopiëren
php artisan migrate:fresh --seed
```

Start the application: (GroeneVingersBeheer and GroeneVingersWeb)

```bash
Code kopiëren
php artisan serve
# and
npm run dev
```

Open http://localhost:8000 in your browser to see the result.

Note: I only worked on GroeneVingersWeb.
Highlights:
- Home Page
- Product catalog page
- Product page
- Login and Dashboard panels
- CRUD panels for admin and staff
