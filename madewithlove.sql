CREATE DATABASE madewithlove;
USE madewithlove;

CREATE USER "madewithlove"@"localhost" IDENTIFIED BY "Ye8grYm4god9ju7";
GRANT ALL ON madewithlove.* TO 'madewithlove'@'localhost';
FLUSH PRIVILEGES;

CREATE TABLE `todos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `complete` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;