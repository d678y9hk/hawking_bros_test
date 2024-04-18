<?php


$env = parse_ini_file(".env");
$connection = new PDO("mysql:host=mysql;dbname=" . $env['MYSQL_DATABASE'], $env['MYSQL_USER'], $env['MYSQL_PASSWORD']);
$repeat = 10000;


print("tables: ");

$t = microtime(true);

$connection->query(file_get_contents("tables.sql"));

print(sprintf("%d ms\n", (microtime(true) - $t) * 1000));

print("query: ");

$t = microtime(true);

for ($i = 0; $i < $repeat; $i++) {
    $connection->query(file_get_contents("query.sql"));
}

$total = microtime(true) - $t;

print(sprintf("%d ms, (x$repeat)\n", $total * 1000));



print("# optimized\n");



print("tables: ");

$t = microtime(true);

$connection->query(file_get_contents("tables_optimized.sql"));

print(sprintf("%d ms\n", (microtime(true) - $t) * 1000));

print("query: ");

$t = microtime(true);

for ($i = 0; $i < $repeat; $i++) {
    $connection->query(file_get_contents("query_optimized.sql"));
}

$total = microtime(true) - $t;

print(sprintf("%d ms, (x$repeat)\n", $total * 1000));
