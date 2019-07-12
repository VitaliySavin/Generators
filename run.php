<?php

use Generators\Workers\Worker;

spl_autoload_register(function ($class) {
    $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    include_once dirname(dirname(__FILE__)). DIRECTORY_SEPARATOR. $fileName . '.php';
});

try {
    Worker::create($argv[1])->run();
} catch (\Throwable $exception) {
    echo $exception->getMessage();
}