<?php

if (empty(glob("./hawking/*"))) {
    for ($i = 0; $i < 20; $i++) {
        $name = bin2hex(random_bytes(6));
    
        if (random_int(1, 10) > 7) {
            $name .= " -invalid-";
        }
        if (random_int(1, 10) > 3) {
            $name .= ".bros";
        }
    
        touch("./hawking/$name");
    }
}

foreach (glob("./hawking/*") as $file) {
    if (preg_match("/\.\/hawking\/[a-zA-Z0-9]+\.bros/", $file)) {
        print($file . "\n");
    }
}
