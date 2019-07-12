<?php
$dir = dirname(__FILE__) . DIRECTORY_SEPARATOR;

exec("php {$dir}run.php consumerPrime & \
    php {$dir}run.php consumerFibonacci & \
    php {$dir}run.php producerPrime & \
    php {$dir}run.php producerFibonacci",
    $out,
    $exitCode
);