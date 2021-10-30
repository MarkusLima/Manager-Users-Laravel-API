
## About Laravel

### Create projetc
30/01/2021

```
composer create-project --prefer-dist laravel/laravel blog "6.*"
```

### Create migrates

```
php artisan make:migration create_permissions_table
php artisan make:migration create_permission_users_table
php artisan make:migration create_addresses_table
```

![Alt text](./docs/data_base.PNG?raw=true "Database")


### Create models

```
php artisan make:model model/Address
php artisan make:model model/Permission
php artisan make:model model/PermissionUser
```








