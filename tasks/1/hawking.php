<?php

final class hawking 
{
    public function __construct()
    {
        $this->bros();
        $this->brothers();
    }
    
    private function bros(): void
    {
        $env = parse_ini_file(".env");
        $connection = new PDO("mysql:host=mysql;dbname=" . $env['MYSQL_DATABASE'], $env['MYSQL_USER'], $env['MYSQL_PASSWORD']);
        
        $connection->query(file_get_contents("test.sql"));
    }

    private function brothers(): void
    {
        $env = parse_ini_file(".env");
        $connection = new PDO("mysql:host=mysql;dbname=" . $env['MYSQL_DATABASE'], $env['MYSQL_USER'], $env['MYSQL_PASSWORD']);
        
        for ($i = 0; $i < random_int(5, 50); $i++) {
            $scriptName = bin2hex(random_bytes(6));
            $startTime = time() - random_int(0, 86400*365*54);
            $endTime = $startTime + random_int(0, 86400);
            $result = ["normal", "illegal", "failed", "success"][random_int(0, 3)];

            $connection->query(<<<SQL
                insert into `test` (`script_name`, `start_time`, `end_time`, `result`) 
                values 
                ("{$scriptName}", $startTime, $endTime, "{$result}")
            SQL);
        }
    }

    public function production(): array
    {
        $env = parse_ini_file(".env");
        $connection = new PDO("mysql:host=mysql;dbname=" . $env['MYSQL_DATABASE'], $env['MYSQL_USER'], $env['MYSQL_PASSWORD']);
        
        $data = $connection->query(<<<SQL
            select * from `test` where `result` in ("normal", "success")
        SQL)->fetchAll();

        return $data;
    }
}
