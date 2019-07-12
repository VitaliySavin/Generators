<?php

namespace Generators;

/**
 * @package Generators
 */
class Config
{
    public const TYPE_CONSUMER_PRIME = 'consumerPrime';
    public const TYPE_CONSUMER_FIBONACCI = 'consumerFibonacci';
    public const TYPE_PRODUCER_PRIME = 'producerPrime';
    public const TYPE_PRODUCER_FIBONACCI = 'producerFibonacci';

    public const TYPE_BUS = 'redis';
    public const TYPE_REPOSITORY_MYSQL = 'mysql';

    public const REDIS = [
        'host' => 'redis',
        'port' => 6379,
    ];

    public const MYSQL = [
        'user' => '',
        'password' => '',
        'db' => '',
        'table' => 'test',
        'host' => '',
    ];

    public const WORKER_SETTINGS = [
        'fibonacci' => [
            'limit' => 2000,
            'delay' => 100,
            'channel' => 'fibonacci',
            'columnCounter' => 'count_fib',
        ],
        'prime' => [
            'limit' => 5000,
            'delay' => 100,
            'channel' => 'prime',
            'columnCounter' => 'count_prime',
        ],
    ];
}
