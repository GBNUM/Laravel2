web: cd public && php -S 0.0.0.0:$PORT
worker: php worker.php
worker: php artisan migrate:refresh
worker: php artisan migrate