# Laravel Project for Groenevingers
This project is a Laravel-based web application developed in collaboration with students. It consists of two major components:

Backend: Managing database


### Frontend: Website & Shop
Description:
The frontend of the project is a website and e-commerce shop designed for Groenevingers. It allows users to browse, search, and purchase products related to gardening, plants, and more. The website offers a user-friendly interface, responsive design, and intuitive navigation to ensure a smooth shopping experience.

### Features:
- Product Catalog: Display a list of available products with images, descriptions, and prices.
- Search & Filtering: Users can search for products and filter them based on categories, price ranges, etc.
- Product Details: Each product has a dedicated page with detailed information, reviews, and related products.
- Shopping Cart: Users can add products to their cart, view the cart, and proceed to checkout.
- User Authentication: Customers can register and log in to view their order history, save addresses, and manage their profiles.
- Order Management: Users can place orders, select shipping options, and receive confirmation emails.
- Payment Integration: Secure payment gateways to handle transactions (e.g., Stripe, PayPal, etc.).
- Blog: A section for blog posts about gardening tips, product updates, and more.


## Getting Started
Install/update composer and npm packages (GroeneVingersBeheer and GroeneVingersWeb)

```bash
composer install
composer update

npm install
npm update
```

Migrate and Seed a local database (GroeneVingersBeheer)

```bash
php artisan migrate:fresh --seed
```

Start the application: (GroeneVingersBeheer and GroeneVingersWeb)

```bash
php artisan serve
# and
npm run dev
```

Open http://localhost:8000 in your browser to see the result.
