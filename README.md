#**\*\*\***// Blog Management System //**\*\*\***#

A full-stack Blog Management System built using Laravel and MySQL. The application allows administrators to create, edit, delete, and manage blog posts through a secure admin dashboard.

---

## Features

### Public Features

- View all blogs
- Read full blog details
- Filter blogs by category
- Search blogs by title
- Responsive user interface

### Admin Features

- Secure Admin Login
- Dashboard
- Create Blog Post
- Edit Blog Post
- Delete Blog Post
- Upload Blog Images
- Rich Text Editor (Quill Editor)
- Pagination
- Category Management

---

## Technologies Used

### Frontend

- HTML
- CSS
- Bootstrap 5
- JavaScript
- jQuery
- Quill Editor

### Backend

- Laravel
- PHP

### Database

- MySQL

---

## Project Structure

blog-management/
│
├── app/
├── bootstrap/
├── config/
├── database/
├── public/
│ └── uploads/
├── resources/
│ └── views/
├── routes/
├── storage/
└── vendor/

---

## Installation

### Clone Repository

```bash
git clone https://github.com/yourusername/blog-management.git
```

### Move Into Project

```bash
cd blog-management
```

### Install Dependencies

```bash
composer install
```

### Create Environment File

```bash
cp .env.example .env
```

### Generate Application Key

```bash
php artisan key:generate
```

### Configure Database

Update `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog_management
DB_USERNAME=root
DB_PASSWORD=
```

### Run Migrations

```bash
php artisan migrate
```

### Start Server

```bash
php artisan serve
```

Application will run on:

```text
http://127.0.0.1:8000
```

---

## Admin Login

### Create Admin User

Open Laravel Tinker:

```bash
php artisan tinker
```

Run:

```php
use App\Models\User;

User::create([
    'name' => 'Admin',
    'email' => 'admin@gmail.com',
    'password' => bcrypt('123456')
]);
```

## Screenshots

### Home Page

- Blog Listing
- Category Filter
- Search Feature

### Admin Dashboard

- Total Blogs
- Manage Blogs
- Add Blog

### Blog Editor

- Quill Rich Text Editor
- Image Upload
- Category Selection

---

## Author

Kanchan Kumari

MCA Student

---

## License

This project is developed for educational and internship evaluation purposes.
