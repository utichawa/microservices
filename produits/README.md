# Product Endpoint

## Installation 

### Pre-requirements 

* PHP : >= 7.2

### Installation

 * Copy **.env.example** to **.env**
 * Set up the database config in **.env**
 * Replace the APP_URL, L5_SWAGGER_CONST_HOST attributes of the .env file.
 * Execute this commands 
```bash
composer install
php artisan key:generate
php artisan migrate
```

### Swagger

To generate the new docs of swagger after changing it, you should run 

```bash
php artisan l5-swagger:generate
```
