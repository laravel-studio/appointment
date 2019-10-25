# Initial Setup
---

- [Description](/{{route}}/{{version}}/initialsetup/#description)

<a name="description"></a>
## Description

This portion is `strictly` for `developers` only. Any kind of `change` in `directory` or file in the `repository` structure can `breake` the `app` in your `local server`.

#### Setup

1. Go To `root` folder.
2. Clone the `repository`.
3. Copy `.env.example` file to `.env` and `edit` database credentials there
4. Change `APP_URL` value to `http://localhost/<your-root-folder>/public` or `http://your-site-url.com` to get the documentation urls working properly.
5. Run `composer install`
6. Run `php artisan key:generate`
7. Run `php artisan migrate`
8. Run `php artisan db:seed`

#### To Build

* npm run development
* npm run development -- --watch

#### VUE

* In order to run the AJAX added the following MIX variable in .env file :
* MIX_AJAX_URL="${APP_URL}"

