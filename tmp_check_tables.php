<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
$tables = ['products', 'stocks', 'suppliers', 'users', 'sessions'];
foreach ($tables as $table) {
    $exists = Illuminate\Support\Facades\DB::select("SHOW TABLES LIKE '$table'");
    echo $table . ': ' . (count($exists) ? 'exists' : 'missing') . PHP_EOL;
}
