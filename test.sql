CREATE TABLE IF NOT EXISTS `test` (
  `sum` varchar(500) DEFAULT NULL,
  `count_fib` smallint(6) DEFAULT NULL,
  `count_prime` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO test SET sum = '0', count_fib = 0, count_prime = 0;
