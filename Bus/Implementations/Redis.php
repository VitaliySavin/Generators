<?php

declare(strict_types=1);

namespace Generators\Bus\Implementations;

use Generators\Bus\BusInterface;

/**
 * @package Generators\Bus\Implementations
 */
class Redis implements BusInterface
{
    private $host;
    private $port;

    /**
     * @param string $host
     * @param int $port
     * @throws \Exception
     */
    public function __construct(string $host, int $port)
    {
        if (!$this->isInstalled()) {
            throw new \Exception('redis-cli not installed');
        }

        $this->host = $host;
        $this->port = $port;
    }

    /**
     * @param string $key
     * @param string $value
     * @return string
     */
    public function push(string $key, string $value)
    {
        $result = $this->execute(sprintf('RPUSH %s %s', $key, $value));
        $result = $result[0];
        return $result;
    }

    /**
     * @param string $key
     * @return string|null
     */
    public function pop(string $key)
    {
        $result = $this->execute(sprintf('LPOP %s', $key));
        $result = '' !== $result[0] ? $result[0] : null;
        return $result;
    }

    /**
     * @return bool
     */
    private function isInstalled(): bool
    {
        exec("redis-cli -v", $out);
        return !empty($out);
    }

    /**
     * @param string $cmd
     * @return array
     */
    private function execute(string $cmd)
    {
        exec(sprintf('redis-cli -h %s -p %d %s', $this->host, $this->port, $cmd), $out);
        return $out;
    }
}
