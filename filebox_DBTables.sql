--Create Tables for ibox app

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(65) NOT NULL DEFAULT '',
  `lastname` varchar(65) NOT NULL DEFAULT '',
  `password` varchar(65) NOT NULL DEFAULT '',
  `email` varchar(65) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) DEFAULT CHARSET=utf8;

CREATE TABLE `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(50) NOT NULL,
  `filedesc` varchar(50) NOT NULL DEFAULT '',
  `fileurl` varchar(100) NOT NULL DEFAULT '',
  `uploadtime` datetime NOT NULL,
  `updatetime` datetime,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;

commit;