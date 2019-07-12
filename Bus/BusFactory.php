<?php

declare(strict_types=1);

namespace Generators\Bus;

use Generators\Bus\Implementations\Redis;
use Generators\Config;

/**
 * @package Generators\Bus
 */
class BusFactory
{
    /**
     * @param string $type
     * @return BusInterface
     * @throws \Exception
     */
    public static function create(string $type): BusInterface
    {
        if (Config::TYPE_BUS === $type) {
            return new Redis(Config::REDIS['host'], Config::REDIS['port']);
        } else {
            throw new \Exception('bus type not allowed');
        }
    }
}
