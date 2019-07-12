<?php

declare(strict_types=1);

namespace Generators\Repositories;

use Generators\Config;
use Generators\Repositories\Db\Mysql;

/**
 * @package Generators\Repositories
 */
class RepositoryFactory
{
    /**
     * @param string $type
     * @return RepositoryInterface
     * @throws \Exception
     */
    public static function create(string $type): RepositoryInterface
    {
        if (Config::TYPE_REPOSITORY_MYSQL === $type) {
            return Mysql::getInstance(
                Config::MYSQL['db'],
                Config::MYSQL['host'],
                Config::MYSQL['user'],
                Config::MYSQL['password']
            );
        } else {
            throw new \Exception('bus type not allowed');
        }
    }
}
