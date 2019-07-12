<?php

declare(strict_types=1);

namespace Generators\Repositories\Db;

use Generators\Repositories\RepositoryInterface;

/**
 * @package Generators\Repositories\Db
 */
class Mysql implements RepositoryInterface
{
    private static $instance;
    private static $mysql;

    private function __construct(
        string $dataBase,
        string $host,
        string $user,
        string $password
    ) {
        self::$mysql = new \PDO(
            "mysql:dbname=" . $dataBase . ";host=". $host,
            $user,
            $password
        );
    }

    /**
     * @param string $dataBase
     * @param string $host
     * @param string $user
     * @param string $password
     * @return RepositoryInterface
     */
    public static function getInstance(
        string $dataBase,
        string $host,
        string $user,
        string $password
    ) {
        if (null === self::$instance) {
            self::$instance = new self($dataBase, $host, $user, $password);
        }

        return self::$instance;
    }

    /**
     * @param string $value
     * @param string $columnCounter
     * @return void
     * @throws \Exception
     */
    public function update(string $value, string $columnCounter): void
    {
        self::$mysql->beginTransaction();
        $select = self::$mysql->prepare("SELECT `sum`, $columnCounter FROM `test` FOR UPDATE");
        if (!$select->execute()) {
            throw new \Exception('[Mysql] SELECT not executed');
        }

        $sum = bcadd($value, $select->fetch(\PDO::FETCH_ASSOC)['sum']);
        $update = self::$mysql->prepare("UPDATE `test` SET `sum` = :sum, $columnCounter = $columnCounter + 1");
        $update->execute([':sum' => $sum]);
        self::$mysql->commit();
    }

    /**
     * @param string $columnCounter
     * @return int
     * @throws \Exception
     */
    public function getColumnCounterValue(string $columnCounter): int
    {
        $select = self::$mysql->prepare("SELECT $columnCounter FROM test");
        if (!$select->execute()) {
            throw new \Exception('[Mysql] SELECT not executed');
        }
        return (int)$select->fetch(\PDO::FETCH_ASSOC)[$columnCounter];
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }
}
