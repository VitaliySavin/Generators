<?php

declare(strict_types=1);

namespace Generators\Workers;

use Generators\Repositories\RepositoryInterface;
use Generators\Bus\BusInterface;
use Generators\Workers\Settings\ConsumerWorkerSettingsInterface;

/**
 * @package Generators\Workers
 */
class ConsumerWorker implements WorkerInterface
{
    /**
     * @var BusInterface
     */
    private $bus;

    /**
     * @var RepositoryInterface
     */
    private $repository;

    /**
     * @var ConsumerWorkerSettingsInterface
     */
    private $settings;

    /**
     * @param RepositoryInterface $repository
     * @param BusInterface $bus
     * @param ConsumerWorkerSettingsInterface $settings
     */
    public function __construct(
        RepositoryInterface $repository,
        BusInterface $bus,
        ConsumerWorkerSettingsInterface $settings
    ) {
        $this->bus = $bus;
        $this->repository = $repository;
        $this->settings = $settings;
    }

    /**
     * @return void
     */
    public function run(): void
    {
        while ($this->isUpdateAllowed()) {
            $value = $this->bus->pop($this->settings->getChannel());
            if (is_null($value)) {
                continue;
            }
            $this->repository->update($value, $this->settings->getColumnCounter());
        }
    }

    /**
     * @return bool
     */
    private function isUpdateAllowed(): bool
    {
        return $this->repository->getColumnCounterValue($this->settings->getColumnCounter())
            < $this->settings->getLimit();
    }
}
