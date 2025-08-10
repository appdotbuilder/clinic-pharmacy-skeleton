# Clinic Pharmacy - Laravel 12 Skeleton

A clean Laravel 12 project skeleton with Blade templating and Bootstrap 5, ready for development.

## Features

- **Laravel 12**: Latest version of the Laravel framework
- **Blade Templating**: Server-side templating engine
- **Bootstrap 5**: Modern CSS framework for responsive design
- **Clean Architecture**: Organized file structure following Laravel conventions
- **Example Routes**: Sample routing patterns included

## Requirements

- PHP >= 8.2
- Composer
- XAMPP (for local development)
- VSCode (recommended editor)

## Local Setup Instructions (XAMPP + VSCode)

### 1. Install Prerequisites

1. **Download and Install XAMPP**
   - Visit [https://www.apachefriends.org](https://www.apachefriends.org)
   - Download XAMPP for your operating system
   - Install with Apache and MySQL modules

2. **Install Composer**
   - Visit [https://getcomposer.org](https://getcomposer.org)
   - Download and install Composer globally

3. **Install VSCode**
   - Download from [https://code.visualstudio.com](https://code.visualstudio.com)
   - Install recommended extensions:
     - PHP Intelephense
     - Laravel Blade Snippets
     - Prettier - Code formatter
     - Bootstrap 5 Quick Snippets

### 2. Project Setup

1. **Clone/Download the Project**
   ```bash
   # If using Git
   git clone <repository-url> clinic-pharmacy
   cd clinic-pharmacy
   
   # Or download and extract to your desired folder
   ```

2. **Move to XAMPP Directory**
   - Move the project folder to `C:\xampp\htdocs\clinic-pharmacy` (Windows)
   - Or `/Applications/XAMPP/htdocs/clinic-pharmacy` (Mac)

3. **Install Dependencies**
   ```bash
   composer install
   ```

4. **Environment Configuration**
   ```bash
   # Copy environment file (if .env.example exists)
   cp .env.example .env
   
   # Generate application key
   php artisan key:generate
   ```

5. **Database Setup**
   - Start XAMPP Control Panel
   - Start Apache and MySQL services
   - Open [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
   - Create a new database named `clinic_pharmacy`
   
   Update `.env` file with database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=clinic_pharmacy
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. **Run Migrations**
   ```bash
   php artisan migrate
   ```

### 3. Development Workflow

1. **Start Development Server**
   ```bash
   # Option 1: Using Artisan (recommended for Laravel)
   php artisan serve
   
   # Option 2: Using XAMPP
   # Access via http://localhost/clinic-pharmacy/public
   ```

2. **Open in VSCode**
   ```bash
   code .
   ```

3. **Access Application**
   - Artisan server: [http://localhost:8000](http://localhost:8000)
   - XAMPP server: [http://localhost/clinic-pharmacy/public](http://localhost/clinic-pharmacy/public)

### 4. Development Tips

**Useful Artisan Commands:**
```bash
# Create a new controller
php artisan make:controller ExampleController

# Create a new model with migration
php artisan make:model Example -m

# Create a new migration
php artisan make:migration create_examples_table

# Create a new seeder
php artisan make:seeder ExampleSeeder

# Run migrations
php artisan migrate

# Rollback migrations
php artisan migrate:rollback

# Seed database
php artisan db:seed

# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

**VSCode Setup:**
1. Open Command Palette (`Ctrl+Shift+P`)
2. Type "PHP: Select PHP Interpreter"
3. Choose your PHP installation path

**File Structure:**
```
clinic-pharmacy/
├── app/
│   ├── Http/Controllers/     # Controllers
│   ├── Models/              # Eloquent models
│   └── ...
├── database/
│   ├── migrations/          # Database migrations
│   └── seeders/            # Database seeders
├── resources/
│   ├── views/              # Blade templates
│   └── css/               # Stylesheets
├── routes/
│   └── web.php            # Web routes
└── public/                # Public assets
```

## Example Usage

### Creating a New Page

1. **Create a Route** (`routes/web.php`):
   ```php
   Route::get('/about', function () {
       return view('about');
   })->name('about');
   ```

2. **Create a Blade View** (`resources/views/about.blade.php`):
   ```html
   @extends('layouts.app')
   
   @section('content')
   <div class="container">
       <h1>About Us</h1>
       <p>This is the about page.</p>
   </div>
   @endsection
   ```

### Working with Bootstrap

The welcome page includes Bootstrap 5 via CDN. You can:
- Use Bootstrap classes directly in your Blade templates
- Customize Bootstrap variables in `resources/css/app.css`
- Add your own CSS styles

### Database Operations

1. **Create Migration:**
   ```bash
   php artisan make:migration create_posts_table
   ```

2. **Define Schema** (in the migration file):
   ```php
   Schema::create('posts', function (Blueprint $table) {
       $table->id();
       $table->string('title');
       $table->text('content');
       $table->timestamps();
   });
   ```

3. **Run Migration:**
   ```bash
   php artisan migrate
   ```

## Troubleshooting

**Common Issues:**

1. **"Class not found" errors:**
   ```bash
   composer dump-autoload
   ```

2. **Permission errors (Linux/Mac):**
   ```bash
   sudo chmod -R 775 storage bootstrap/cache
   ```

3. **Database connection errors:**
   - Check XAMPP MySQL is running
   - Verify database credentials in `.env`
   - Ensure database exists in phpMyAdmin

4. **CSS/JS not loading:**
   - Check file paths in Blade templates
   - Ensure files are in `public/` directory
   - Clear browser cache

## Next Steps

1. Build your application by adding:
   - Models and migrations for your data
   - Controllers for your business logic
   - Views for your user interface
   - Routes to connect everything

2. Consider adding:
   - Authentication (Laravel Breeze/UI)
   - Form validation
   - API endpoints
   - Testing

## Resources

- [Laravel Documentation](https://laravel.com/docs)
- [Bootstrap Documentation](https://getbootstrap.com/docs)
- [Laravel Blade Templates](https://laravel.com/docs/blade)
- [PHP Documentation](https://php.net/docs.php)

Happy coding! 🚀