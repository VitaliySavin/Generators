<?php

declare(strict_types=1);

namespace Generators\Bus\Implementations;

use Generators\Bus\BusInterface;
use Predis\Client;

/**
 * @package Generators\Bus\Implementations
 */
class Redis implements BusInterface
{
    private $redis;

    /**
     * @param string $host
     * @param int $port
     * @throws \Exception
     */
    public function __construct(string $host, int $port)
    {
        $this->redis = new Client([
            'scheme' => 'tcp',
            'host'   => $host,
            'port'   => $port,
        ]); 
    }

    /**
     * @param string $key
     * @param string $value
     * @return int
     */
    public function push(string $key, string $value)
    {
        return $this->redis->rpush($key, [$value]);
    }

    /**
     * @param string $key
     * @return string
     */
    public function pop(string $key)
    {
        return $this->redis->lpop($key);
    }
}
