# popular-php
 
## Steps of creating project
1. Start new laravel project
2. Create base for GitHub API calls
3. Create index.blade.php
4. Create model, migration, and controller
5. Install tailwindcss and postcss
6. Set default route to index.blade.php

## Requirements
- Webserver
- MySQL
- PHP 8.2 or higher
- Composer

## Installation instructions
1. Copy the files to a location readable by the webserver
2. Serve from the public directory
3. Edit the contents of .env.example to reflect your environment's settings
4. Run `php artisan migrate`
    - If the table `hudakgit` does not already exist, you will be prompted to create it - input yes and press enter
5. Run `composer install`