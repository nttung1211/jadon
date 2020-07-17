INSERT INTO `home_slideshow` (`id`, `img_url`, `title`, `caption`, `img_order`, `created_at`) VALUES
(32, '../img/home-slideshow/wall.5f1031963db53.jpg', 'stars', 'mistery', 1, '2020-07-14 06:36:23'),
(33, '../img/home-slideshow/colors.5f1031ae0a6ce.jpg', 'wall', 'rough', 2, '2020-07-14 06:36:50'),
(35, '../img/home-slideshow/dna.5f1031b53ef16.jpg', 'code', 'hard', 5, '2020-07-14 06:43:45'),
(36, '../img/home-slideshow/blue.5f1031bc7e957.png', 'Macbook', 'modern', 4, '2020-07-14 06:50:23'),
(37, '../img/home-slideshow/devices.5f1031f46e8bc.jpg', 'apple products', 'delicate', 6, '2020-07-16 10:54:44');


INSERT INTO `service_categories` (`id`, `name`) VALUES
(1, 'wedding'),
(2, 'birthday'),
(3, 'party');

INSERT INTO `services` (`service_categories_id`, `title`, `subtitle`, `description`, `img_url`) VALUES
(3, 'indoor party', 'so warm', 'let us have a party oudoor', './img/service-thumbnails/martin-211-unsplash.5f0da19866b6d.jpg'),
(3, 'outdoor party', 'so funny', 'let us have a party indoor', './img/service-thumbnails/background-business-camera-593322.5f07d1907768a.jpg');


INSERT INTO `managers` (`id`, `fullname`, `username`, `email`, `password`, `level`, `img_url`, `last_activity_time`, `created_at`) VALUES
(25, 'Nguyen Thanh Tung', 'admin', 'nttung@gmail.com', '$2y$10$MweEAMGW4GqgVpVcUNW/GeEabeLiH42FIS5K98crDald6v3SC00hG', 'super-admin', '../img/managers/code.5f10387bd26b3.jpg', '2020-07-16 11:35:04', '2020-07-09 12:25:20'),
(30, 'Nguyen Anh Duc', 'naduc', 'naduc@gmail.com', '$2y$10$kUtcgwbMuqiXiFnVKlS78udTeg.jwGjdsiVCKaNEvpjNqnHEfiT2K', 'admin', '../img/managers/dna.5f103a3fc8612.jpg', '2020-07-16 11:34:41', '2020-07-16 11:10:54'),
(24, 'Nguyen Thanh Hung', 'nthung', 'nthung@gmail.com', '$2y$10$iUkwi7XIXhddHWKWyGCmeOaypZ4rz74iZ6129PVvTcbgNvqduj86G', 'admin', '../img/managers/blue.5f10381a8b960.png', '2020-07-16 11:20:58', '2020-07-09 01:02:49'),
(29, 'Ngo Thi Mai', 'ntmai', 'ntmai@gmail.com', '$2y$10$3F1lWsVsYACoTN78Bozd4eJKz4rePZnOjkbCAbmqCiV4j0JxVIlWa', 'manager', '../img/managers/gal-galdot.5f1039e1a8358.jpg', '2020-07-16 11:28:33', '2020-07-11 02:16:52');