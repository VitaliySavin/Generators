<?php

declare(strict_types=1);

namespace Generators\Workers;

use Generators\Bus\BusInterface;
use Generators\Producers\ProducerInterface;
use Generators\Workers\Settings\ProducerWorkerSettingsInterface;

/**
 * @package Generators\Workers
 */
class ProducerWorker implements WorkerInterface
{
    /**
     * @var ProducerInterface
     */
    private $producer;

    /**
     * @var BusInterface
     */
    private $bus;

    /**
     * @var int
     */
    private $delay;

    /**
     * @var ProducerWorkerSettingsInterface
     */
    private $settings;

    /**
     * @param ProducerInterface $producer
     * @param BusInterface $bus
     * @param ProducerWorkerSettingsInterface $settings
     */
    public function __construct(
        ProducerInterface $producer,
        BusInterface $bus,
        ProducerWorkerSettingsInterface $settings
    ) {
        $this->producer = $producer;
        $this->bus = $bus;
        $this->settings = $settings;
    }

    /**
     * @return void
     */
    public function run(): void
    {
        if (0 === $this->settings->getLimit()) {
            return;
        }

        $start = 0;

        foreach ($this->producer->build() as $value) {
            $this->bus->push($this->settings->getChannel(), $value);
            $start++;
            if ($start >= $this->settings->getLimit()) {
                break;
            }
            usleep($this->settings->getDelay());
        }
    }
}
