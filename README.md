## TEST REMOTE KLEDO

sebelum running project ini, langkah-langkah yg harus di lakukan:
- setelah melakukan git clone/ download project ini, running `composer install`
- copy isi file `.env.example` ke `.env`
- edit file `.env` dan file `phpunit.xml` . untuk file `phpunit.xml` databasenya gunakan yg `mysql-testing`
- isi hal-hal penting di dalam `.env` seperti `DB_DATABASE`,`DB_USERNAME`,`DB_PASSWORD` ,`TESTING_DB_DATABASE`,`TESTING_DB_USERNAME`,`TESTING_DB_PASSWORD`
- untuk migration bisa ketik `php artisan migrate --database={connectionnya}`
- untuk running testingnya bisa ketik `php artisan test`