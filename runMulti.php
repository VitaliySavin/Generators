<?php
$dir = dirname(__FILE__) . DIRECTORY_SEPARATOR;

$limitPrime = $argv[1] ?? '';
$delayPrime = $argv[2] ?? '';
$limitFib = $argv[3] ?? '';
$delayFib = $argv[4] ?? '';

exec("php {$dir}run.php consumerPrime {$limitPrime} & \
    php {$dir}run.php consumerFibonacci {$limitFib} & \
    php {$dir}run.php producerPrime {$limitPrime} {$delayPrime} & \
    php {$dir}run.php producerFibonacci {$limitFib} {$delayFib}",
    $out,
    $exitCode
);

$out = !empty($out[0]) ? $out[0] : '';
echo $out, PHP_EOL;
