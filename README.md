## Laravel CMS

**Laravel Tetra CMS** is a content management system where you create category,tag,post,user,role,permission etc.

### Installation

-   `git clone https://github.com/tawhid-coder/laravel-cms.git tetracms`
-   `cd tetracms`
-   `cp .env.example .env`
-   `composer install`
-   `php artisan key:generate`
-   Create a database and inform _.env_
-   Set APP_URL , APP_NAME to \*.env\_
-   `php artisan migrate --seed` to create and populate tables with dummy data
-   Inform _config/mail.php_ for email sends
-   `php artisan serve` to start the app on http://localhost:8000/

### Features

-   Post
-   Tag
-   Category
-   Comment/Reply
-   Authentication (registration, login, logout, password reset, mail confirmation)
-   Users roles : roles,permission (No Package : Custom Made)
-   Admin dashboard (Custom Made)

### Packages included

-   image intervention

### Tricks

To test application the database is seeding with users :

-   SuperAdministrator : email = superadmin@superadmin.com, password = password
-   Administrator : email = admin@admin.com, password = password
-   Author : email = author@author.com, password = password
