# Sales Tax App

This application calculates sales taxes for different products according to specified rules. The user interface allows you to add products to a cart, apply import duties, and generate a receipt.

## Technologies Used

- Laravel
- Laravel Sail (Docker)
- MySQL
- Tailwind CSS
- Vue.js

## Prerequisites

- Docker Desktop installed and running
- Composer installed
- Node.js and npm installed

## Project Setup

1. **Clone the repository:**
   ```sh
   git clone https://github.com/ChilliPipper/salestax.git
   cd salestax

2. **Install Composer dependencies:**
    ```sh
    composer install

4. **Start Sail services:**

    ```sh
    ./vendor/bin/sail up -d

5. **Run migrations and seeders:**

    ```sh
    ./vendor/bin/sail artisan migrate --seed    

6. **Install Node.js dependencies**

    ./vendor/bin/sail npm install
    ./vendor/bin/sail npm run dev

7. **Start de development server**

    ./vendor/bin/sail artisan serve

**The application will be available at http://localhost.**

## License

This project is licensed under the MIT License.

