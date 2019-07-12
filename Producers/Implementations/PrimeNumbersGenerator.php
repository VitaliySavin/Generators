<?php

declare(strict_types=1);

namespace Generators\Producers\Implementations;

use Generators\Producers\ProducerInterface;

/**
 * @package Generators\Producers\Implementations
 */
class PrimeNumbersGenerator implements ProducerInterface
{
    /**
     * @return \Traversable
     */
    public function build(): \Traversable
    {
        $start = 2;

        while (true) {
            if (!$this->isPrime($start)) {
                $start++;
                continue;
            }
            $start++;
            yield (string)($start-1);
        }
    }

    /**
     * @param int $number
     * @return bool
     */
    private function isPrime(int $number): bool
    {
        $result = true;

        for ($x = 2; $x <= sqrt($number); $x++) {
            if ($number % $x == 0) {
                $result = false;
                break;
            }
        }

        return $result;
    }
}
