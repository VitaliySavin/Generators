# Generators - test task

[![N|Solid](https://cdn1.savepice.ru/uploads/2019/7/12/2ab3c1832b7957689c4355606e4b09f9-full.png)](https://cdn1.savepice.ru/uploads/2019/7/12/2ab3c1832b7957689c4355606e4b09f9-full.png)

### Instructions

1. Create table in your database and execute INSERT SQL query:

```sql
CREATE TABLE IF NOT EXISTS `test` (
  `sum` varchar(500) DEFAULT NULL,
  `count_fib` smallint(6) DEFAULT NULL,
  `count_prime` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO test SET sum = '0', count_fib = 0, count_prime = 0;
```
2. Generate autoload files and install vendors:
```sh
$ composer install
```
3. Set DB connection params in Constants.php
4. Run in console
```sh
$ php runMulti.php
```
or run with optional params limit and delay, for example
```sh
$ php runMulti.php 2000 100 5000 200
```
where 2000 - prime limit, 100 - prime delay, 5000 - fib limit, 200 -fib delay

or run (will be run with default limit and delay (2000 100 5000 100))
```sh
$ ./runMulti.sh
```