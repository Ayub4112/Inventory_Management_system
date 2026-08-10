<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
$tables = ['products', 'suppliers', 'stocks'];
foreach ($tables as $table) {
    $exists = Illuminate\Support\Facades\DB::select("SHOW TABLES LIKE '$table'");
    echo "$table: " . (count($exists) ? 'exists' : 'missing') . PHP_EOL;
    if (count($exists)) {
        $rows = Illuminate\Support\Facades\DB::select("SHOW CREATE TABLE $table");
        echo $rows[0]->{'Create Table'} . PHP_EOL;
    }
}
