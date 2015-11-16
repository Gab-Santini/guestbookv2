DROP DATABASE IF EXISTS guestbook;
CREATE DATABASE guestbook;
USE guestbook;
CREATE TABLE `guestbook_entry` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `guestbook_entry` VALUES (1, 'Albert', 'arbert@hotmail.com', 'http://example.com', 'hello world' ),
									 (2, 'Gabriele', 'g.santini@gmail.com', 'http://www.blacksun.com', 'this is an example'),
									 (3, 'Walid', 'wmnasri@gmail.com', 'http://www.wmnasri.com', 'this is an other example');