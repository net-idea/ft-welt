# Fenster & Türen-Welt - Symfony 7.4 Web Application

> **Premium e-commerce platform for windows and doors**  
> Symfony 7.4 • Bootstrap 5 • Webpack Encore • Docker-ready

---

## 📋 Table of Contents

1. [Quick Start](#-quick-start)
2. [System Requirements](#-system-requirements)
3. [Project Structure](#-project-structure)
4. [Installation](#-installation)
5. [Starting the Development Environment](#-starting-the-development-environment)
6. [Development Guide](#-development-guide)
7. [Deployment](#-deployment)
8. [Docker Support](#-docker-support)
9. [Troubleshooting](#-troubleshooting)
10. [Support & Contact](#-support--contact)

---

## 🚀 Quick Start

Using the Startup Script (Recommended for Beginners):

```bash
cd ft-welt.de
./develop.sh
```

Then open your browser: **http://localhost:8000**

Using Docker (Recommended for Production):

```bash
cd ft-welt.de
docker-compose up -d
```

Then open your browser: **http://localhost:8000**

---

## 💻 System Requirements

### Minimum Requirements

- **PHP:** 8.2 or higher
- **Node.js:** 18 or higher
- **Composer:** 2.5 or higher
- **npm/yarn:** 9 or higher

### Optional Dependencies

- **Docker & Docker Compose** (for containerized environments)
- **Symfony CLI** (for advanced development)
- **Mailpit** (for email testing)

### System Check

```bash
php --version
node --version
npm --version
composer --version
```

---

## 📁 Project Structure

```
ft-welt.de/
│
├── 📦 Backend Code
│   ├── src/                          # PHP code (Symfony application)
│   │   ├── Controller/               # Web controllers
│   │   ├── Entity/                   # Database models
│   │   ├── Form/                     # Form types
│   │   └── Kernel.php                # Application kernel
│   │
│   ├── config/                       # Configuration files
│   │   ├── packages/                 # Bundle configurations
│   │   ├── routes.yaml               # URL routing
│   │   └── services.yaml             # Service definitions
│   │
│   ├── migrations/                   # Database migrations
│   ├── tests/                        # PHPUnit tests
│   └── var/                          # Cache & log files
│
├── 🎨 Frontend Code
│   ├── assets/                       # Webpack Encore assets
│   │   ├── app.ts                    # Main entry point (JavaScript)
│   │   ├── styles/
│   │   │   ├── app.scss              # Main stylesheet
│   │   │   ├── theme.scss            # Theme variables
│   │   │   ├── buttons.scss          # Button styles
│   │   │   ├── form.scss             # Form styles
│   │   │   ├── navbar.scss           # Navigation styles
│   │   │   ├── footer.scss           # Footer styles
│   │   │   ├── header.scss           # Header styles
│   │   │   ├── _variables.scss       # SCSS variables
│   │   │   ├── _mixins.scss          # Reusable mixins
│   │   │   └── prefixer.scss         # Browser vendor prefixes
│   │   ├── scripts/                  # TypeScript modules
│   │   │   ├── navbar.ts             # Navigation logic
│   │   │   └── ...                   # Additional modules
│   │   └── images/                   # Images & assets
│   │
│   ├── public/                       # Public web root
│   │   ├── index.php                 # Front controller
│   │   ├── build/                    # Compiled assets
│   │   ├── images/                   # Image files
│   │   └── *.png, *.ico              # Favicons
│   │
│   └── templates/                    # Twig templates
│       ├── base.html.twig            # Master template
│       ├── page/                     # Page templates
│       ├── partials/                 # Reusable components
│       │   ├── navbar.html.twig      # Navigation
│       │   ├── footer.html.twig      # Footer
│       │   └── ...
│       └── email/                    # Email templates
│
├── 🔧 Configuration & Scripts
│   ├── docker-compose.yaml           # Docker compose setup
│   ├── Dockerfile                    # Container image definition
│   ├── webpack.config.js             # Webpack Encore configuration
│   ├── package.json                  # NPM dependencies
│   ├── composer.json                 # PHP dependencies
│   │
│   ├── 📜 Shell Scripts
│   │   ├── start-server.sh           # Quick start (development)
│   │   ├── develop.sh                # Full development setup
│   │   ├── deploy.sh                 # Production deployment
│   │   │
│   │   ├── _base.sh                  # Base utility functions
│   │   ├── apache.sh                 # Apache configuration
│   │   ├── nginx.sh                  # Nginx configuration
│   │   ├── assets.sh                 # Asset management
│   │   ├── composer.sh               # Composer commands
│   │   ├── php-cs-fixer.sh           # Code formatting
│   │   ├── phpstan.sh                # Code analysis
│   │   ├── phpunit.sh                # Unit tests
│   │   ├── lint.sh                   # Syntax checking
│   │   └── ...
│   │
│   ├── .env                          # Environment variables template
│   ├── .env.local                    # Local overrides (not committed)
│   └── .gitignore                    # Git ignore rules
│
├── 📚 Documentation
│   ├── README.md                     # This file
│   ├── biome.json                    # JavaScript formatter config
│   ├── phpunit.xml.dist              # PHPUnit configuration
│   ├── phpstan.neon                  # PHPStan configuration
│   ├── phpstan.dist.neon             # PHPStan defaults
│   ├── ecs.php                       # Code style configuration
│   └── importmap.php                 # Asset mapping
│
└── 📦 Dependencies
    ├── vendor/                       # Composer packages (not committed)
    ├── node_modules/                 # NPM packages (not committed)
    └── yarn.lock                     # Yarn lock file
```

---

## 🔨 Installation

### 1. Clone the Repository

```bash
git clone <repository-url>
cd ft-welt.de
```

### 2. Install Dependencies

#### Automated Setup (Recommended)

```bash
./develop.sh
```

This automatically:

- Installs Composer packages
- Installs NPM/Yarn packages
- Warms up Symfony cache
- Optionally runs database migrations
- Compiles assets
- Starts dev server and webpack watcher

#### Manual Installation

```bash
# PHP dependencies
composer install

# JavaScript/Node dependencies
yarn install

# Warm up Symfony cache
php bin/console cache:clear
php bin/console cache:warmup
```

### 3. Configure Environment

Create `.env.local` in the project root:

```bash
cp .env .env.local
```

Update the configuration as needed:

```env
APP_ENV=dev
APP_DEBUG=1
APP_SECRET=your-secret-key-here

# Database
DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"

# Email (development)
MAILER_DSN=smtp://localhost:1025
```

---

## ▶️ Starting the Development Environment

### Option 1: Quick Start Script

```bash
./start-server.sh
```

✅ Automatically starts:

- PHP built-in server (port 8000)
- Webpack Encore watcher (port 8080)
- Assets compile automatically on changes

### Option 2: Full Development Setup

```bash
./develop.sh
```

✅ Additionally:

- Installs dependencies if needed
- Offers database migration options
- Detailed error output

### Option 3: Using Symfony CLI

```bash
# Terminal 1: Watch assets
npm run watch

# Terminal 2: Start Symfony server
symfony server:start
```

### Option 4: Docker Container

```bash
docker-compose up -d
```

Services:

- **Web Server:** http://localhost:8000
- **Node Dev Server:** http://localhost:8080

---

## 🛠 Development Guide

### Compiling Assets

```bash
# Development build
npm run dev

# Watch mode (auto-compile on changes)
npm run watch

# Production build
npm run build
```

### Managing Cache

```bash
# Clear cache
php bin/console cache:clear

# Warm up cache
php bin/console cache:warmup

# Both at once
php bin/console cache:clear && php bin/console cache:warmup
```

### Database Management

```bash
# Create a new migration
php bin/console make:migration

# Run migrations
php bin/console doctrine:migrations:migrate

# Check migration status
php bin/console doctrine:migrations:status
```

### View Routes

```bash
php bin/console debug:router
```

### Code Quality

```bash
# PHPStan (static analysis)
vendor/bin/phpstan analyse
# or
./phpstan.sh

# Check code style
vendor/bin/ecs check
# or
./php-cs-fixer.sh

# Automatically fix code style
vendor/bin/ecs check --fix

# SCSS linting
npm run lint:scss
```

### Running Tests

```bash
# All tests
php bin/phpunit

# Specific test file
php bin/phpunit tests/Controller/HomeControllerTest.php

# With coverage report
php bin/phpunit --coverage-html=var/coverage
```

---

## 📦 Deployment

### Production Build

```bash
./deploy.sh
```

The script:

1. ✅ Installs Composer dependencies (no dev packages)
2. ✅ Installs NPM dependencies
3. ✅ Compiles assets for production
4. ✅ Runs database migrations
5. ✅ Clears and warms Symfony cache
6. ✅ Sets APP_ENV to `prod`

### Manual Deployment

```bash
# 1. PHP dependencies
composer install --no-dev --prefer-dist --optimize-autoloader

# 2. Node dependencies
npm ci

# 3. Compile assets
npm run build

# 4. Update database
php bin/console doctrine:migrations:migrate --no-interaction

# 5. Warm cache
php bin/console cache:warmup --env=prod
```

### Deploying to Production Server

```bash
# SSH to server
ssh user@example.com

# Run deployment
cd /var/www/html
./deploy.sh

# Or automatic with git hooks
git push production main  # triggers automatic deployment
```

---

## 🐳 Docker Support

### Docker Compose Services

```yaml
php         # PHP 8.3 FPM container
nginx       # Web server (port 8000)
node        # Node.js dev server (port 8080)
```

### Starting Docker

```bash
# Start in background
docker-compose up -d

# View logs
docker-compose logs -f

# Access PHP container
docker-compose exec php bash

# Build assets
docker-compose exec node npm run build

# Run tests
docker-compose exec php php bin/phpunit

# Stop containers
docker-compose down
```

### Docker for Production

```bash
# Build image
docker build -t ft-welt:latest .

# Run container
docker run -d \
  -p 8000:80 \
  -v /data/uploads:/var/www/html/public/uploads \
  -e APP_ENV=prod \
  -e DATABASE_URL="postgresql://..." \
  ft-welt:latest
```

---

## 🧪 Database & Email

### Database (SQLite for Development)

SQLite database is automatically created:

```
var/data.db
```

For production: Configure PostgreSQL or MySQL in `.env.local`:

```env
DATABASE_URL="postgresql://user:pass@localhost:5432/ft_welt"
```

### Email Testing (Mailpit)

```bash
# Start Mailpit with Docker
docker run -d -p 1025:1025 -p 8025:8025 axllent/mailpit

# Configure mailer (.env.local)
MAILER_DSN=smtp://localhost:1025

# Open web interface
# http://localhost:8025
```

---

## 🐛 Troubleshooting

### Issue: "Assets not found"

```bash
npm run dev
php bin/console cache:clear
```

### Issue: "Permission Denied" on var/ directory

```bash
chmod -R 777 var/
# or for production:
chown -R www-data:www-data var/
chmod -R 755 var/
```

### Issue: "Doctrine migrations missing"

```bash
# Create migrations directory
mkdir migrations

# Clear cache
php bin/console cache:clear
```

### Issue: "Composer out of memory"

```bash
# Give Composer more RAM
COMPOSER_MEMORY_LIMIT=-1 composer install
```

### Issue: "NPM modules not found"

```bash
# Clear cache
npm cache clean --force

# Reinstall
rm -rf node_modules package-lock.json
npm install
```

### Issue: "Docker port already in use"

```bash
# Change port in docker-compose.yaml
ports:
  - '9000:80'  # 8000 → 9000

# Or stop other container
docker ps
docker stop <container-id>
```

### Viewing Logs

```bash
# Symfony logs
tail -f var/log/dev.log
tail -f var/log/prod.log

# PHP-FPM logs (Docker)
docker-compose logs -f php

# Nginx logs (Docker)
docker-compose logs -f nginx
```

---

## 📊 Monitoring & Debugging

### Symfony Debug Toolbar

In development mode:

- Press `Ctrl + Shift + E` to open profiler
- View: Requests, queries, performance metrics

### Debug Console

```bash
# Interactive Symfony console
php bin/console tinker

# Examples:
$user = $entityManager->find('App\Entity\User', 1);
echo $user->getEmail();
```

### Performance Profiling

```bash
# Check execution times
tail -100 var/log/dev.log | grep "Execution time"

# View Doctrine queries
# Enable in config/services.yaml:
# profiler: { enabled: true }
```

---

## 📚 Additional Resources

### Official Documentation

- [Symfony 7.4 Docs](https://symfony.com/doc/7.4/index.html)
- [Webpack Encore](https://symfony.com/doc/current/frontend.html)
- [Bootstrap 5](https://getbootstrap.com/docs/5.3/)
- [Doctrine ORM](https://www.doctrine-project.org/)

### Common Tasks

- [Creating Routes](https://symfony.com/doc/7.4/routing.html)
- [Creating Entities](https://symfony.com/doc/7.4/doctrine.html)
- [Creating Forms](https://symfony.com/doc/7.4/forms.html)
- [Sending Emails](https://symfony.com/doc/7.4/mailer.html)
- [Building APIs](https://symfony.com/doc/7.4/serializer.html)

---

## 📞 Support & Contact

### Technical Support

- **Email:** mail@ft-welt.de
- **Phone:** +49 (0)157 - 81 61 20 54
- **Office:** +49 (0)30 - 39 80 59 53

### Reporting Issues

Please provide:

1. What you were trying to do
2. Complete error message
3. Your system info (OS, PHP version, etc.)
4. Relevant log files from `var/log/dev.log` or `var/log/prod.log`

### Feature Requests & Questions

- Contact the development team via email
- Describe the feature in detail
- Include use case examples

---

## 📋 Getting Started Checklist

- [ ] Repository cloned
- [ ] Dependencies installed (`composer install` & `npm install`)
- [ ] `.env.local` created and configured
- [ ] Development server started (`./start-server.sh` or `./develop.sh`)
- [ ] Website loads at http://localhost:8000
- [ ] Contact form functions correctly
- [ ] Assets load (CSS/JS/images)
- [ ] Tests pass (`./phpunit.sh`)

---

## 🎉 Ready to Go!

Your Symfony 7.4 application is ready for development and deployment!

**Happy coding!** 🚀
