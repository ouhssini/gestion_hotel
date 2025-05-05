# 🏨 Laravel Hotel Management System

A simple hotel management system built with Laravel.

## 🚀 Installation

Follow these steps to set up the project:

### 1. Clone the repository

```bash
git clone https://github.com/ouhssini/gestion_hotel.git
cd gestion_hotel
```

### 2. Install PHP dependencies

```bash
composer install
```

### 3. Install JavaScript dependencies

```bash
npm install
```

### 4. Copy the environment file

```bash
cp .env.example .env
```

### 5. Generate application key

```bash
php artisan key:generate
```

### 6. Configure the database

Edit the `.env` file with your database credentials:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

### 7. Run migrations and seeders

```bash
php artisan migrate --seed
```

### 8. Build frontend assets

```bash
npm run build
```

### 9. Start the development server

```bash
php artisan serve
```

Your application should now be running at: [http://localhost:8000](http://localhost:8000)

## 🔐 Authentication

Log in with the following credentials:

- **Email**: `test@example.com`
- **Password**: `password`

## 📚 Features

- ✅ Authentication (Login/Register)
- ✅ Client management
- ✅ Room (Chambre) management
- ✅ Room type management
- ✅ Reservation management
- ✅ Dashboard with key statistics

## 📋 Requirements

- PHP >= 8.1
- Composer
- Node.js and NPM
- MySQL 5.7+ or MariaDB

## 🛠️ Commands Reference

| Task                           | Command                         |
|--------------------------------|---------------------------------|
| Install PHP dependencies       | `composer install`             |
| Install JS dependencies        | `npm install`                  |
| Copy environment file          | `cp .env.example .env`         |
| Migrate and seed the database  | `php artisan migrate --seed`   |
| Start development server       | `php artisan serve`            |
| Build frontend assets          | `npm run build`                |