<?php
exec('php artisan migrate');
exec('php artisan cache:clear');
exec('php artisan config:clear');
exec('php artisan route:clear');
echo "Artisan commands executed!";
