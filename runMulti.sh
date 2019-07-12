#!/usr/bin/env bash

php run.php consumerPrime & \
php run.php consumerFibonacci & \
php run.php producerPrime & \
php run.php producerFibonacci