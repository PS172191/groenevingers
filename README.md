# Dit was een groepsproject voor Leerjaar 3

## Getting Started

Er staan 2 mappen in:
GroeneVingersBeheer is voor de back-end
GroeneVingersWeb is voor de front-end

Installeer/update composer en npm packages (GroeneVingersBeheer en GroeneVingersWeb)

```bash
composer install
composer update

npm install
npm update

```

Migrate en Seed een local database (GroeneVingersBeheer)
```bash
php artisan migrate:fresh --seed

```

Starten van de applicatie: (GroeneVingersBeheer en GroeneVingersWeb)

```bash
php artisan serve
# en
npm run dev

```

Open [http://localhost:8000](http://localhost:8000) met je browser om het resultaat te zien.

## Note: Ik heb alleen in GroeneVingersWeb gewerkt.
Highlights:
- Home Page
- Productencatalogus page
- Product page
- Login en Dashboard panels
- CRUD panels voor admin en medewerkers
