<?php

declare(strict_types=1);

namespace Generators\Workers\Settings;

use Generators\Config;

/**
  * @package Generators\Workers\Settings
 */
class Settings
{
    /**
     * @param string $type
     * @return ConsumerWorkerSettings|ProducerWorkerSettings
     * @throws \Exception
     */
    public static function create(string $type)
    {
        if (Config::TYPE_CONSUMER_PRIME === $type) {
            return new ConsumerWorkerSettings(
                Config::WORKER_SETTINGS['prime']['channel'],
                Config::WORKER_SETTINGS['prime']['columnCounter'],
                Config::WORKER_SETTINGS['prime']['limit']
            );
        } elseif (Config::TYPE_CONSUMER_FIBONACCI === $type) {
            return new ConsumerWorkerSettings(
                Config::WORKER_SETTINGS['fibonacci']['channel'],
                Config::WORKER_SETTINGS['fibonacci']['columnCounter'],
                Config::WORKER_SETTINGS['fibonacci']['limit']
            );
        } elseif (Config::TYPE_PRODUCER_PRIME === $type) {
            return new ProducerWorkerSettings(
                Config::WORKER_SETTINGS['prime']['channel'],
                Config::WORKER_SETTINGS['prime']['delay'],
                Config::WORKER_SETTINGS['prime']['limit']
            );
        } elseif (Config::TYPE_PRODUCER_FIBONACCI === $type) {
            return new ProducerWorkerSettings(
                Config::WORKER_SETTINGS['fibonacci']['channel'],
                Config::WORKER_SETTINGS['fibonacci']['delay'],
                Config::WORKER_SETTINGS['fibonacci']['limit']
            );
        } else {
            throw new \Exception('type not allowed');
        }
    }
}
