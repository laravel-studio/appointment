## About Appointment Management System Application
    It  is a demo project to book service based appointments with respect to the employees assigned to the service. The dashboard is designed with [AdminLTE](https://github.com/ColorlibHQ/AdminLTE). 

    ![Appointment Management System](https://github.com/laravel-studio/appointment/blob/master/public/images/screenshots/appointment-booking.png)

#### Admin login credentials
- __Email:__ `admin@admin.com`
- __Pass:__ `12345678`

## Setup

1. Go To root folder 
2. `git clone git@github.com:laravel-studio/appointment.git`
3. `cd appointment`
4. `git checkout development`
5. `git checkout -b <yourbranch> development`
6. Copy .env.example file to .env and edit database credentials there
7. In .env file change __CACHE_DRIVER=file__ to __CACHE_DRIVER=array__ and run `php artisan config:cache`
8. Run `composer install`
9. Run `php artisan key:generate`
10. Run `php artisan migrate`
11. Run `php artisan db:seed`

## To Build 

- `npm install`

- `npm run development`

- `npm run development -- --watch`

## VUE 

In order to run the AJAX added the following MIX variable in .env file :

MIX_AJAX_URL="${APP_URL}"

## Routes
```
// login
<your-local-url>/login

// registration
<your-local-url>/register

// password reset
<your-local-url>/password/reset

// dashboard
<your-local-url>/dashboard
```
- Visit __<base-url>/docs__ to see the __User Manual__ and __Developer Documentation__

## APIs


##### Roles Api(s)

- `<base-url>/rolelist`
- `<base-url>/addrole`
- `<base-url>/editrole/{id}`
- `<base-url>/deleterole/{id}`

##### Service Api(s)

- `<base-url>/serviceslist`
- `<base-url>/addservice`
- `editservice/{id}`
- `deleteservice/{id}`

##### Slots Api(s)

- `<base-url>/listslots`
- `<base-url>/addslot`
- `<base-url>/editslots/{id}`
- `<base-url>/deleteslots/{id}`

##### Employee Api(s)

- `<base-url>/addemployeebyadmin`
- `<base-url>/deleteusers/{id}`

##### Employee Services Api(s)

- `<base-url>/listemployeewithservices`
- `<base-url>/assignemployeewithservices`

## License
It is a demo project. So, feel free to use and re-use any way you want.
