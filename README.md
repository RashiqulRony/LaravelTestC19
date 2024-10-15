## .:: CodeTest  ::.

#### Downloading composer package and dumping
~~~bash
composer install
~~~

### Copy code from `.env.example` to `.env` file
~~~bash
cp .env.example .env
~~~

#### Configure project
~~~bash
php artisan cache:clear
~~~
~~~bash
php artisan config:cache
~~~
~~~bash
php artisan key:generate
~~~

#### For Mail Sending Queue
~~~bash
php artisan queue:work
~~~

#### NPM Package
~~~npm
npm install
~~~

~~~npm
npm run dev
~~~
or
~~~npm
npm run build
~~~
### Create a database name and change credential in `.env` file

### migrate and seed database
~~~bash
php artisan migrate --seed
~~~

### Composer load now
~~~bash
composer dump-autoload
~~~

### Serving laravel project
~~~bash
php artisan serve
~~~

### Author Info
~~~
Name: Rashiqul Rony
Email: rashiqulrony@gmail.com
Github: https://github.com/RashiqulRony
~~~
