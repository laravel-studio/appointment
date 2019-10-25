## About Appointment Management System Application

## Setup

1. Go To root folder 
2. `git clone git@bitbucket.org:itobuztech/appointment.git`
3. `git checkout development`
4. `git checkout -b <yourbranch> development`
4. Copy .env.example file to .env and edit database credentials there
5. Run `composer install`
6. Run `php artisan key:generate`
7. Run `php artisan migrate`
8. Run `php artisan db:seed`

## To Build 

npm run development

npm run development -- --watch

## VUE 

In order to run the AJAX added the following MIX variable in .env file :

MIX_AJAX_URL="${APP_URL}"

## Routes


## APIs



## License
