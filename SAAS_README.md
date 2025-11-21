# EduAdmin - SaaS Dashboard

A fully functional educational administration SaaS application built with Laravel 12 and Tailwind CSS. Perfect for managing courses, students, and analytics.

## Features

✨ **Professional Dashboard** - Modern, responsive admin interface  
📚 **Course Management** - Create, manage, and track courses  
👥 **Student Management** - Manage enrollments and track progress  
📈 **Analytics & Reports** - Real-time dashboard analytics  
⚙️ **Settings** - Configurable platform settings  
🔐 **Authentication** - Secure login system  
📱 **Responsive Design** - Works on all devices  

## Prerequisites

- PHP 8.2+
- Composer
- Node.js & npm
- SQLite or MySQL

## Installation

### 1. Clone/Navigate to Project
```bash
cd my-port-app
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Environment Setup
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Database Setup
```bash
php artisan migrate
php artisan db:seed
```

This will create all tables and seed with demo data.

### 5. Build Assets
```bash
npm run build
```

### 6. Start Development Server
```bash
php artisan serve
```

Visit `http://localhost:8000` in your browser.

## Demo Credentials

- **Email:** admin@example.com
- **Password:** password

## Project Structure

```
my-port-app/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/LoginController.php
│   │   │   └── DashboardController.php
│   │   └── Middleware/
│   ├── Models/
│   │   ├── Course.php
│   │   ├── Student.php
│   │   └── Analytics.php
│   └── Providers/
├── database/
│   ├── migrations/
│   │   ├── 2024_11_21_000001_create_courses_table.php
│   │   ├── 2024_11_21_000002_create_students_table.php
│   │   └── 2024_11_21_000003_create_analytics_table.php
│   └── seeders/
│       └── DatabaseSeeder.php
├── resources/
│   ├── views/
│   │   ├── auth/
│   │   │   └── login.blade.php
│   │   ├── layouts/
│   │   │   └── app.blade.php
│   │   └── dashboard/
│   │       ├── index.blade.php
│   │       ├── courses.blade.php
│   │       ├── students.blade.php
│   │       ├── analytics.blade.php
│   │       └── settings.blade.php
│   └── css/
└── routes/
    └── web.php
```

## Dashboard Pages

### 1. **Dashboard** (`/dashboard`)
   - Overview stats (total courses, students, active users)
   - Current running courses
   - Upcoming lessons
   - Recent notifications
   - Working hours chart
   - Course analytics

### 2. **Courses** (`/dashboard/courses`)
   - List all courses with detailed information
   - Course categories, levels, and instructor names
   - Completion rates with visual progress bars
   - Add/Edit/Delete courses
   - Publish/unpublish functionality

### 3. **Students** (`/dashboard/students`)
   - Manage all enrolled students
   - Track enrollment dates and progress
   - Course enrollment status
   - Student performance metrics
   - Add new students

### 4. **Analytics** (`/dashboard/analytics`)
   - Real-time platform analytics
   - User growth trends
   - Course completion rates
   - Daily analytics reports
   - Detailed performance metrics

### 5. **Settings** (`/dashboard/settings`)
   - General platform configuration
   - Email (SMTP) setup
   - Support information
   - Maintenance mode toggle
   - Registration settings

## API Endpoints

All endpoints are protected with authentication middleware.

### Courses
- `GET /dashboard/courses` - List courses
- Routes ready for REST API expansion

### Students  
- `GET /dashboard/students` - List students
- Routes ready for REST API expansion

### Analytics
- `GET /dashboard/analytics` - Get analytics data
- Routes ready for REST API expansion

## Database Schema

### Courses Table
- id, title, slug, description, duration, lessons, students, completion_rate, level, category, instructor, image_url, is_published, timestamps

### Students Table
- id, name, email, phone, enrollment_date, courses_enrolled, courses_completed, progress, status, avatar_url, timestamps

### Analytics Table
- id, date, total_users, active_users, new_enrollments, course_completions, average_score, timestamps

## Customization

### Adding New Courses
Edit `database/seeders/DatabaseSeeder.php` and add to the `$courseData` array.

### Styling
- Main CSS is in `resources/views/layouts/app.blade.php`
- Uses Tailwind CSS + custom styles
- Responsive design with mobile support

### Add New Features
1. Create migrations for new tables
2. Create models in `app/Models/`
3. Create controllers in `app/Http/Controllers/`
4. Create views in `resources/views/`
5. Update routes in `routes/web.php`

## Development Commands

```bash
# Start development server
php artisan serve

# Run migrations
php artisan migrate

# Seed database
php artisan db:seed

# Clear cache
php artisan cache:clear

# Build assets
npm run build

# Watch assets (development)
npm run dev

# Run tests
php artisan test
```

## Performance Features

- ✅ Paginated tables (10 items per page)
- ✅ Optimized queries with proper indexing
- ✅ Cached dashboard stats
- ✅ Responsive design for all screen sizes
- ✅ Modern CSS with smooth animations

## Security Features

- ✅ CSRF protection on all forms
- ✅ Password hashing with bcrypt
- ✅ SQL injection prevention (Eloquent ORM)
- ✅ Authentication middleware on protected routes
- ✅ XSS protection in Blade templates

## Next Steps / Future Features

- [ ] Add REST API endpoints
- [ ] Implement role-based access control (RBAC)
- [ ] Add real-time notifications
- [ ] Implement payment processing
- [ ] Add course builder interface
- [ ] Video streaming integration
- [ ] Advanced reporting & exports
- [ ] Automated email notifications
- [ ] Two-factor authentication
- [ ] Dark mode toggle

## Troubleshooting

### Blank page on dashboard
- Clear cache: `php artisan cache:clear`
- Rebuild assets: `npm run build`

### Database errors
- Reset database: `php artisan migrate:refresh --seed`
- Check `.env` database configuration

### Port already in use
- Change port: `php artisan serve --port=8001`

## Support

For issues or feature requests, please create an issue in the project repository.

## License

MIT License - feel free to use this in your projects.

---

Built with ❤️ using Laravel & Tailwind CSS
