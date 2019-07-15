<?php
$dir = dirname(__FILE__) . DIRECTORY_SEPARATOR;

$limit = $argv[1] ?? '';
$delay = $argv[2] ?? '';

exec("php {$dir}run.php consumerPrime {$limit} & \
    php {$dir}run.php consumerFibonacci {$limit} & \
    php {$dir}run.php producerPrime {$limit} {$delay} & \
    php {$dir}run.php producerFibonacci {$limit} {$delay}",
    $out,
    $exitCode
);