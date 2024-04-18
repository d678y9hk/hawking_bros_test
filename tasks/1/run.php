<?php

require_once("./hawking.php");

$hawking = new hawking();

$data = $hawking->production();

foreach ($data as $row) {
    print(sprintf("%s \t %s \t %s \t %s \n", $row['script_name'], date("Y-m-d H:i:s", $row['start_time']), date("Y-m-d H:i:s", $row['end_time']), $row['result']));
}

print(sprintf("%d rows \n", count($data)));
