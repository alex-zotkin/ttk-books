PHP 8.3
<br/>MySQL


Устновка:
1. <code>composer install</code>
2. создайте базу данных. В проекте использовались следующие значения:
   <code>
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=ttk_books
        DB_USERNAME=root
        DB_PASSWORD=
   </code>
3. Запустите миграции.
       <br/><code>php artisan migrate</code> - созданние таблиц с пустыми данными
       <br/><code>php artisan migrate --seed</code>  - созданние таблиц с заполнением данных

4. Запустите сервер бд и паралельно сервер laravel
       <code>php artisan serve</code>
