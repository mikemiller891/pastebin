# Pastebin

![Laravel](https://github.com/mikemiller891/pastebin/workflows/Laravel/badge.svg)

## About Pastebin

It's a pastebin. Carefully hand-crafted using Laravel and Tailwind CSS. 

### Features

  * No user-side Java-script
  * No passwords
  * Pastes are stored in a database
  
### Forking [WIP]

#### Requirements

  * [Composer](https://getcomposer.org)
  * [npm](https://www.npmjs.com)
  * [git](https://git-scm.com)
  * [Laravel Envoy](https://laravel.com/docs/8.x/envoy) (For deployment)

#### Checklist

  - Clone And Build
      - [ ] ``$ git clone https://github.com/mikemiller891/pastebin.git pastebin``
      - [ ] ``$ cd pastebin``
      - [ ] ``$ cp .env.example .env``
      - [ ] ``$ composer install``
      - [ ] ``$ php artisan key:generate``
      - [ ] ``$ npm install``
      - [ ] ``$ npm run dev``
  - Create Local Database
      - [ ] ``$ mkdir -p /tmp/database/sqlite/pastebin``
      - [ ] ``$ touch /tmp/database/sqlite/pastebin``
      - [ ] ``$ php artisan migrate``
  - Test
      - [ ] ``$ vendor/bin/phpunit``
  - Run
      - [ ] ``$ php artisan serve``

### Deployment [WIP]

#### Server Requirements

  * [PHP](https://php.net)
  * [MySQL](https://www.mysql.com)/[Maria DB](https://mariadb.org)

#### Checklist

  - [ ] Edit the ``.env`` file. Change the ``DEPLOY_*`` variables to suit your needs. 
  - [ ] Edit the ``.env.production`` file to suit your needs.
  - [ ] Create the ``envoy`` user on web server. 
  This user should be able to securely ``ssh`` into the web server without a password, 
  and run ``sudo`` without a password. 
  This user should also have read/write access the ``DEPLOY_TMP`` and ``DEPLOY_PATH`` directories.
  - [ ] ``$ envoy run check-user``
  - [ ] ``$ envoy run init``
  - [ ] Configure your web server to serve a site from ``current/public`` under your deployment path. If everything is working correctly then you will see a placeholder page at env('APP_URL'). 
  - [ ] ``$ envoy run deploy``
  
## Demo

  * http://pastebin.gnomad.xyz
  * http://kbscl3jol77t43azfwu372bdeondzx6fz4t2ydjir43hjnw3vveplbqd.onion

## License

Pastebin is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
