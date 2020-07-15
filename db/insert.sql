INSERT INTO `home_slideshow` (`id`, `img_url`, `title`, `caption`, `img_order`, `created_at`) VALUES
(32, '../img/home-slideshow/cool-background.5f0db4d76e1be.png', 'stars', 'mistery', 1, '2020-07-14 13:36:23'),
(33, '../img/home-slideshow/martin-211-unsplash.5f0db4f25a690.jpg', 'wall', 'rough', 2, '2020-07-14 13:36:50'),
(35, '../img/home-slideshow/ilya-pavlov-87438-unsplash.5f0db691a9432.jpg', 'code', 'hard', 5, '2020-07-14 13:43:45'),
(36, '../img/home-slideshow/background-business-camera-593322.5f0db81f2a122.jpg', 'Macbook', 'modern', 4, '2020-07-14 13:50:23');


INSERT INTO `service_categories` (`id`, `name`) VALUES
(1, 'wedding'),
(2, 'birthday'),
(3, 'party');

INSERT INTO `services` (`service_categories_id`, `title`, `subtitle`, `description`, `img_url`) VALUES
(3, 'indoor party', 'so warm', 'let us have a party oudoor', './img/service-thumbnails/martin-211-unsplash.5f0da19866b6d.jpg'),
(3, 'outdoor party', 'so funny', 'let us have a party indoor', './img/service-thumbnails/background-business-camera-593322.5f07d1907768a.jpg');


INSERT INTO `managers` (`id`, `fullname`, `username`, `email`, `password`, `level`, `img_url`, `last_activity_time`, `created_at`) VALUES
(24, 'Nguyen Thanh Hung', 'nthung', 'nthung@gmail.com', 'hung123', 'admin', '../img/managers/cool-background.5f073199edd97.png', '2020-07-12 02:40:26', '2020-07-09 15:02:49'),
(25, 'Nguyen Thanh Tung', 'admin', 'nttung@gmail.com', 'admin', 'super-admin', '../img/managers/background-business-camera-593322.5f07d1907768a.jpg', '2020-07-12 14:59:13', '2020-07-10 02:25:20'),
(29, 'Ngo Thi Mai', 'ntmai', 'ntmai@gmail.com', 'mai123', 'manager', '../img/managers/gal-gadot-2880x1800-red-carpet-european-premiere-4k-3338.5f09e5f4dd38e.jpg', '2020-07-11 16:16:52', '2020-07-11 16:16:52'),
(30, 'Nguyen Thanh Minh', 'ntminh', 'ntminh@gmail.com', 'duc123', 'manager', '../img/managers/ilya-pavlov-87438-unsplash.5f0a86455c132.jpg', '2020-07-12 03:52:48', '2020-07-11 16:36:25');