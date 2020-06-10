DROP DATABASE IF EXISTS `painters`;

CREATE SCHEMA `painters` DEFAULT CHARACTER SET utf8;
USE `painters`;

CREATE TABLE `exposition_halls` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `owner` int,
  `name` varchar(255),
  `area` int,
  `address` varchar(255),
  `tel` varchar(255)
);

CREATE TABLE `owners` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `type` int,
  `name` varchar(255),
  `address` varchar(255),
  `tel` varchar(255)
);

CREATE TABLE `owner_types` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255)
);

CREATE TABLE `expositions` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `hall` int,
  `type` int,
  `start_date` datetime,
  `end_date` datetime
);

CREATE TABLE `exposition_types` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255)
);

CREATE TABLE `members` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `education` int,
  `city` int,
  `born_date` date,
  `summary` text
);

CREATE TABLE `cities` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255)
);

CREATE TABLE `educations` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `education_type` int,
  `place` varchar(255)
);

CREATE TABLE `education_types` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255)
);

CREATE TABLE `expositions_members` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `exposition` int,
  `member` int
);

CREATE TABLE `works` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `type` int,
  `create_date` date
);

CREATE TABLE `work_types` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255)
);

CREATE TABLE `attributes` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `type` int,
  `value` varchar(255)
);

CREATE TABLE `attribute_types` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255)
);

CREATE TABLE `works_attributes` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `work` int,
  `attribute` int
);

CREATE TABLE `members_works` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `member` int,
  `work` int
);

ALTER TABLE `owners` ADD FOREIGN KEY (`type`) REFERENCES `owner_types` (`id`);

ALTER TABLE `exposition_halls` ADD FOREIGN KEY (`owner`) REFERENCES `owners` (`id`);

ALTER TABLE `expositions` ADD FOREIGN KEY (`hall`) REFERENCES `exposition_halls` (`id`);

ALTER TABLE `expositions` ADD FOREIGN KEY (`type`) REFERENCES `exposition_types` (`id`);

ALTER TABLE `members` ADD FOREIGN KEY (`city`) REFERENCES `cities` (`id`);

ALTER TABLE `educations` ADD FOREIGN KEY (`education_type`) REFERENCES `education_types` (`id`);

ALTER TABLE `members` ADD FOREIGN KEY (`education`) REFERENCES `educations` (`id`);

ALTER TABLE `expositions_members` ADD FOREIGN KEY (`exposition`) REFERENCES `expositions` (`id`);

ALTER TABLE `expositions_members` ADD FOREIGN KEY (`member`) REFERENCES `members` (`id`);

ALTER TABLE `works` ADD FOREIGN KEY (`type`) REFERENCES `work_types` (`id`);

ALTER TABLE `attributes` ADD FOREIGN KEY (`type`) REFERENCES `attribute_types` (`id`);

ALTER TABLE `works_attributes` ADD FOREIGN KEY (`work`) REFERENCES `works` (`id`);

ALTER TABLE `works_attributes` ADD FOREIGN KEY (`attribute`) REFERENCES `attributes` (`id`);

ALTER TABLE `members_works` ADD FOREIGN KEY (`member`) REFERENCES `members` (`id`);

ALTER TABLE `members_works` ADD FOREIGN KEY (`work`) REFERENCES `works` (`id`);
