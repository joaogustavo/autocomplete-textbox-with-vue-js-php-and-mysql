
CREATE TABLE `users` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(80) NOT NULL,
  `fullname` varchar(80) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `users` (`id`, `username`, `fullname`) VALUES
(1, 'joao', 'Joao Gustavo'),
(2, 'miles', 'Miles Davies'),
(3, 'duck', 'Duck Dodgers'),
(4, 'luke', 'Luke Skywalker'),
(5, 'blackalien', 'Gustavo Ribeiro'),
(6, 'cat', 'Oreo Bones'),
(7, 'doctordim', 'Claudio Rodriguez');
