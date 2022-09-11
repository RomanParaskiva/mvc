
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tickets`
--
CREATE DATABASE IF NOT EXISTS `tickets` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tickets`;

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `name`, `phone`, `email`, `created_at`, `user_id`, `description`) VALUES
(1, 'Test', '+79210000000', 'test@test.com', '2022-09-01 21:29:22', 1, 'asdasdasdasd asd asd asdfsdf fdsf sd sd dsf ds FS dsF &#13;&#10;FSD FD f fd f&#13;&#10;D FD F dsfd &#13;&#10;dfs sdfdsfdsf dsf&#13;&#10; d &#13;&#10;df ds fsd fSD FDs f&#13;&#10; dsf  fds'),
(2, 'Test2', '+7(953) 000-00-00', 'test@test.com', '2022-09-01 13:58:00', 1, 'asdczcasdadasfasf');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role` INT(1) NULL DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` char(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `buses` ( 
  `id` INT NOT NULL AUTO_INCREMENT ,
  `company` VARCHAR(255) NOT NULL ,
  `seats` INT NOT NULL ,
  `phone`  VARCHAR(20) NOT NULL ,
  PRIMARY KEY (`id`)
  ) ENGINE = InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `bus_routes` ( 
  `id` INT NOT NULL AUTO_INCREMENT , 
  `name` VARCHAR(255) NOT NULL , 
  PRIMARY KEY (`id`)
  ) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;


CREATE TABLE IF NOT EXISTS `bus_routes` ( 
  `id` INT NOT NULL AUTO_INCREMENT , 
  `name` VARCHAR(255) NOT NULL , 
  PRIMARY KEY (`id`)
  ) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS `calendar` ( 
  `id` INT NOT NULL AUTO_INCREMENT , 
  `date` DATE NOT NULL , 
  `bus_id` INT NOT NULL , 
  `route_id` INT NOT NULL , 
  PRIMARY KEY (`id`)
  ) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS `routesbuses` ( 
  `id` INT NOT NULL AUTO_INCREMENT , 
  `bus_id` INT NOT NULL ,
  `route_id` INT NOT NULL,
  PRIMARY KEY (`id`)
  ) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;

  ALTER TABLE `routesbuses` ADD FOREIGN KEY (`bus_id`) REFERENCES `buses`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
  ALTER TABLE `routesbuses` ADD FOREIGN KEY (`route_id`) REFERENCES `bus_routes`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created_at`) VALUES
(1, 'john.doe@example.com', '8a09fc6c715ced898b1eda73b95687f101ed849bb52becdfaa4f03189eadf2b4c673ea61a6d199710d0fc95ecdb49f9dcb31b733188fe5ef62caefe151a34683', '2022-08-27 13:10:07'),
(2, 'jane.doe@example.com', '8a09fc6c715ced898b1eda73b95687f101ed849bb52becdfaa4f03189eadf2b4c673ea61a6d199710d0fc95ecdb49f9dcb31b733188fe5ef62caefe151a34683', '2022-08-27 13:10:07');
COMMIT;