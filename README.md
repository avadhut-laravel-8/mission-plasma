## Installation guide

- Exatract zip
- Project database file is in db folder
- Create and Import database and set database configuration in .env file
- Type php artisan serve on project root folder in  terminal
- Then project will open on http://127.0.0.1:8000
- Access creadentials:
		 Email Address: admin@gmail.com
		 Password: 12345678

## Git project installation

- Clone the project using: git clone https://github.com/avadhut-laravel-8/mission-plasma.git
- Rename .env.example file to .env and set database configuration
- Import database.sql to our database the file is in db folder
- Open terminal on project root directory and use following commands:
  
  composer install
  php artisan key:generate
  php artisan config:cache

- To serve the application use: php artisan serve command
- Then the application will be available on: url: http://127.0.0.1:8000
