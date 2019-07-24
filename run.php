<?php

require_once __DIR__ . '/vendor/autoload.php';

use Generators\Workers\Worker;

try {
    Worker::create(
        $argv[1],
        $argv[2] ?? null,
        $argv[3] ?? null
    )->run();
} catch (\Throwable $exception) {
    echo $exception->getMessage();
}
