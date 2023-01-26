# popular-php

## Requirements
- Apache Webserver
- MySQL 8.0.28 or higher
- PHP 8.2 or higher
- Composer
- NPM

## Installation instructions
1. Copy the files to a location readable by the webserver
2. Make the `public` and `storage` folders readable and writeable by the webserver user
3. Serve from the public directory
    - Enable `mod_rewrite`
4. Generate a new personal access token on GitHub at `https://github.com/settings/tokens`
    - The token only needs the `public_repo` option selected
    - Expiration date should last as long as you intend to use the program without having to generate a new token
    - Generate and copy token
5. Edit the contents of .env.example to reflect your environment's settings and rename file to .env
    - Paste the GitHub token on `GITHUB_TOKEN` line
6. From the popular-php folder in the command line, run `php artisan migrate`
    - If the table `hudakgit` does not already exist, you will be prompted to create it - input `yes` and press enter
7. From the popular-php folder in the command line, run `composer install`
8. From the popular-php folder in the command line, run `npm install`
9. From the popular-php folder in the command line, run `php artisan key:generate`

## Using the app
This app is a single page. Use the `Update Repo List` link to download the initial repository list or update the list later.

Due to rate limiting imposed on the GitHub API, updating the repository list will fail if attempted more than 3 times in a minute.

Click the repository's name to view it on GitHub.