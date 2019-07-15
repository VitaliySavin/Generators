<?php

declare(strict_types=1);

namespace Generators\Workers;

use Generators\Bus\BusFactory;
use Generators\Config;
use Generators\Producers\Implementations\FibonacciSequenceGenerator;
use Generators\Producers\Implementations\PrimeNumbersGenerator;
use Generators\Repositories\RepositoryFactory;
use Generators\Workers\Settings\Settings;

/**
 * @package Generators\Workers
 */
class Worker
{
    /**
     * @param string $type
     * @param string|null $limit
     * @param string|null $delay
     * @return \Generators\Workers\WorkerInterface
     * @throws \Exception
     */
    public static function create(
        string $type,
        string $limit = null,
        string $delay = null
    ): WorkerInterface {
        if (Config::TYPE_PRODUCER_PRIME === $type) {
            return new ProducerWorker(
                new PrimeNumbersGenerator(),
                BusFactory::create(Config::TYPE_BUS),
                Settings::create($type, $limit, $delay)
            );
        } elseif (Config::TYPE_PRODUCER_FIBONACCI === $type) {
            return new ProducerWorker(
                new FibonacciSequenceGenerator(),
                BusFactory::create(Config::TYPE_BUS),
                Settings::create($type, $limit, $delay)
            );
        } elseif (Config::TYPE_CONSUMER_PRIME === $type) {
            return new ConsumerWorker(
                RepositoryFactory::create(Config::TYPE_REPOSITORY_MYSQL),
                BusFactory::create(Config::TYPE_BUS),
                Settings::create($type, $limit)
            );
        } elseif (Config::TYPE_CONSUMER_FIBONACCI === $type) {
            return new ConsumerWorker(
                RepositoryFactory::create(Config::TYPE_REPOSITORY_MYSQL),
                BusFactory::create(Config::TYPE_BUS),
                Settings::create($type, $limit)
            );
        } else {
            throw new \Exception('type not allowed');
        }
    }
}
