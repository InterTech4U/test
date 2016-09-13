-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Wersja serwera:               5.6.17 - MySQL Community Server (GPL)
-- Serwer OS:                    Win64
-- HeidiSQL Wersja:              8.2.0.4675
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Zrzut struktury tabela projekty.acl_classes
CREATE TABLE IF NOT EXISTS `acl_classes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class_type` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_69DD750638A36066` (`class_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.


-- Zrzut struktury tabela projekty.acl_entries
CREATE TABLE IF NOT EXISTS `acl_entries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class_id` int(10) unsigned NOT NULL,
  `object_identity_id` int(10) unsigned DEFAULT NULL,
  `security_identity_id` int(10) unsigned NOT NULL,
  `field_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ace_order` smallint(5) unsigned NOT NULL,
  `mask` int(11) NOT NULL,
  `granting` tinyint(1) NOT NULL,
  `granting_strategy` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `audit_success` tinyint(1) NOT NULL,
  `audit_failure` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_46C8B806EA000B103D9AB4A64DEF17BCE4289BF4` (`class_id`,`object_identity_id`,`field_name`,`ace_order`),
  KEY `IDX_46C8B806EA000B103D9AB4A6DF9183C9` (`class_id`,`object_identity_id`,`security_identity_id`),
  KEY `IDX_46C8B806EA000B10` (`class_id`),
  KEY `IDX_46C8B8063D9AB4A6` (`object_identity_id`),
  KEY `IDX_46C8B806DF9183C9` (`security_identity_id`),
  CONSTRAINT `FK_46C8B8063D9AB4A6` FOREIGN KEY (`object_identity_id`) REFERENCES `acl_object_identities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_46C8B806DF9183C9` FOREIGN KEY (`security_identity_id`) REFERENCES `acl_security_identities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_46C8B806EA000B10` FOREIGN KEY (`class_id`) REFERENCES `acl_classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.


-- Zrzut struktury tabela projekty.acl_object_identities
CREATE TABLE IF NOT EXISTS `acl_object_identities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_object_identity_id` int(10) unsigned DEFAULT NULL,
  `class_id` int(10) unsigned NOT NULL,
  `object_identifier` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `entries_inheriting` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_9407E5494B12AD6EA000B10` (`object_identifier`,`class_id`),
  KEY `IDX_9407E54977FA751A` (`parent_object_identity_id`),
  CONSTRAINT `FK_9407E54977FA751A` FOREIGN KEY (`parent_object_identity_id`) REFERENCES `acl_object_identities` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.


-- Zrzut struktury tabela projekty.acl_object_identity_ancestors
CREATE TABLE IF NOT EXISTS `acl_object_identity_ancestors` (
  `object_identity_id` int(10) unsigned NOT NULL,
  `ancestor_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`object_identity_id`,`ancestor_id`),
  KEY `IDX_825DE2993D9AB4A6` (`object_identity_id`),
  KEY `IDX_825DE299C671CEA1` (`ancestor_id`),
  CONSTRAINT `FK_825DE2993D9AB4A6` FOREIGN KEY (`object_identity_id`) REFERENCES `acl_object_identities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_825DE299C671CEA1` FOREIGN KEY (`ancestor_id`) REFERENCES `acl_object_identities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.


-- Zrzut struktury tabela projekty.acl_security_identities
CREATE TABLE IF NOT EXISTS `acl_security_identities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `identifier` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `username` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8835EE78772E836AF85E0677` (`identifier`,`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.


-- Zrzut struktury tabela projekty.client
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identyfikator klienta / podmiotu',
  `id_type_of_client` int(11) NOT NULL COMMENT 'Typ klienta / podmiotu',
  `id_user_add` int(11) NOT NULL COMMENT 'Użytkownik wprowadzający dane',
  `timestamp_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data dodania',
  `name` varchar(255) COLLATE utf8_polish_ci NOT NULL COMMENT 'Nazwa',
  `nip` varchar(25) COLLATE utf8_polish_ci NOT NULL COMMENT 'Numer NIP',
  `country` varchar(50) COLLATE utf8_polish_ci NOT NULL COMMENT 'Kraj',
  `street` varchar(255) COLLATE utf8_polish_ci NOT NULL COMMENT 'Ulica i numer budynku / lokalu',
  `post_code` varchar(10) COLLATE utf8_polish_ci NOT NULL COMMENT 'Kod pocztowy',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`),
  KEY `FK_client_type_of_client` (`id_type_of_client`),
  KEY `FK_client_user` (`id_user_add`),
  CONSTRAINT `FK_client_type_of_client` FOREIGN KEY (`id_type_of_client`) REFERENCES `type_of_client` (`id`),
  CONSTRAINT `FK_client_user` FOREIGN KEY (`id_user_add`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- Data exporting was unselected.


-- Zrzut struktury tabela projekty.notification
CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identyfikator powiadomienia / zgłoszenia',
  `id_task` int(11) NOT NULL COMMENT 'Identyfikator zadania, którego dotyczy powiadomienie / zgłoszenie',
  `id_type_of_notification` int(11) NOT NULL COMMENT 'Identyfikator typu powiadomienia / zgłoszenia',
  `title` varchar(255) COLLATE utf8_polish_ci NOT NULL COMMENT 'Tytuł',
  `assign_to_user` int(11) NOT NULL COMMENT 'Przypisany użytkownik',
  `description` text COLLATE utf8_polish_ci NOT NULL COMMENT 'Opis',
  `timestamp_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data dodania',
  PRIMARY KEY (`id`),
  KEY `FK_notification_task` (`id_task`),
  KEY `FK_notification_type_of_notification` (`id_type_of_notification`),
  KEY `FK_notification_user` (`assign_to_user`),
  CONSTRAINT `FK_notification_task` FOREIGN KEY (`id_task`) REFERENCES `task` (`id`),
  CONSTRAINT `FK_notification_type_of_notification` FOREIGN KEY (`id_type_of_notification`) REFERENCES `type_of_notification` (`id`),
  CONSTRAINT `FK_notification_user` FOREIGN KEY (`assign_to_user`) REFERENCES `team` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- Data exporting was unselected.


-- Zrzut struktury tabela projekty.project
CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identyfikator projektu',
  `id_client` int(11) NOT NULL COMMENT 'Identyfikator klienta',
  `name` varchar(255) COLLATE utf8_polish_ci NOT NULL COMMENT 'Nazwa',
  `description` text COLLATE utf8_polish_ci NOT NULL COMMENT 'Opis',
  `timestamp_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data dodania',
  PRIMARY KEY (`id`),
  KEY `FK__client` (`id_client`),
  CONSTRAINT `FK__client` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- Data exporting was unselected.


-- Zrzut struktury tabela projekty.project_status
CREATE TABLE IF NOT EXISTS `project_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identyfikator rekordu',
  `id_project` int(11) NOT NULL DEFAULT '0' COMMENT 'Identyfikator projektu',
  `id_status_of_project` int(11) NOT NULL DEFAULT '0' COMMENT 'Identyfikator statusu projektu',
  `timestamp_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data dodania',
  `description` text COLLATE utf8_polish_ci NOT NULL COMMENT 'Opis',
  PRIMARY KEY (`id`),
  KEY `FK__project` (`id_project`),
  KEY `FK__status_of_project` (`id_status_of_project`),
  CONSTRAINT `FK__project` FOREIGN KEY (`id_project`) REFERENCES `project` (`id`),
  CONSTRAINT `FK__status_of_project` FOREIGN KEY (`id_status_of_project`) REFERENCES `status_of_project` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- Data exporting was unselected.


-- Zrzut struktury tabela projekty.status_of_project
CREATE TABLE IF NOT EXISTS `status_of_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identyfikator statusu projektu',
  `name` varchar(50) COLLATE utf8_polish_ci NOT NULL COMMENT 'Nazwa statusu projektu',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT 'Status rekordu [ 1 - aktywny, 0 - nieaktywny ]',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- Data exporting was unselected.


-- Zrzut struktury tabela projekty.status_of_task
CREATE TABLE IF NOT EXISTS `status_of_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identyfikator statusu zadania',
  `name` varchar(50) COLLATE utf8_polish_ci NOT NULL COMMENT 'Nazwa statusu zadania',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT 'Status rekordu [ 1 - aktywny, 0 - nieaktywny ]',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- Data exporting was unselected.


-- Zrzut struktury tabela projekty.task
CREATE TABLE IF NOT EXISTS `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identyfikator zadania',
  `id_task` int(11) DEFAULT NULL COMMENT 'Identyfikator zadania wyższego szczebla',
  `id_project` int(11) NOT NULL COMMENT 'Identyfikator projektu',
  `id_status_of_task` int(11) NOT NULL DEFAULT '1' COMMENT 'Identyfikator statusu zadania',
  `assign_to_user` int(11) NOT NULL COMMENT 'Identyfikator przypisanego użytkownika',
  `name` varchar(255) COLLATE utf8_polish_ci NOT NULL COMMENT 'Nazwa zadania',
  `description` text COLLATE utf8_polish_ci NOT NULL COMMENT 'Opis',
  `timestamp_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data dodania',
  `priorytet` tinyint(4) NOT NULL DEFAULT '3' COMMENT 'Priorytet (1-najwyższy, 2 - średni, 3 - niski)',
  PRIMARY KEY (`id`),
  KEY `FK_task_task` (`id_task`),
  KEY `FK_task_project` (`id_project`),
  KEY `FK_task_status_of_task` (`id_status_of_task`),
  KEY `FK_task_team` (`assign_to_user`),
  CONSTRAINT `FK_task_team` FOREIGN KEY (`assign_to_user`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_task_project` FOREIGN KEY (`id_project`) REFERENCES `project` (`id`),
  CONSTRAINT `FK_task_status_of_task` FOREIGN KEY (`id_status_of_task`) REFERENCES `status_of_task` (`id`),
  CONSTRAINT `FK_task_task` FOREIGN KEY (`id_task`) REFERENCES `task` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- Data exporting was unselected.


-- Zrzut struktury tabela projekty.team
CREATE TABLE IF NOT EXISTS `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identyfikator rekordu (ale nie zespołu)',
  `id_project` int(11) NOT NULL COMMENT 'Projekt',
  `id_user` int(11) NOT NULL COMMENT 'Użytkownik - członek zespołu',
  `timestamp_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data dodania',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT 'Status rekordu [ 1 - aktywny, 0 - nieaktywny ]',
  PRIMARY KEY (`id`),
  KEY `FK_team_project` (`id_project`),
  KEY `FK_team_user` (`id_user`),
  CONSTRAINT `FK_team_project` FOREIGN KEY (`id_project`) REFERENCES `project` (`id`),
  CONSTRAINT `FK_team_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- Data exporting was unselected.


-- Zrzut struktury tabela projekty.type_of_client
CREATE TABLE IF NOT EXISTS `type_of_client` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identyfikator typu klienta / podmiotu',
  `name` varchar(50) COLLATE utf8_polish_ci NOT NULL COMMENT 'Nazwa',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT 'Status rekordu [ 1 - aktywny, 0 - nieaktywny ]',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- Data exporting was unselected.


-- Zrzut struktury tabela projekty.type_of_notification
CREATE TABLE IF NOT EXISTS `type_of_notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identyfikato typu powiadomienia / zgłoszenia',
  `name` varchar(50) COLLATE utf8_polish_ci NOT NULL COMMENT 'Nazwa',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT 'Status rekordu [ 1 - aktywny, 0 - nieaktywny ]',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- Data exporting was unselected.


-- Zrzut struktury tabela projekty.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.


-- Zrzut struktury tabela projekty.work
CREATE TABLE IF NOT EXISTS `work` (
  `id` int(11) NOT NULL COMMENT 'Identyfikator rekordu',
  `id_task` int(11) NOT NULL COMMENT 'Identyfikator zadania',
  `timestamp_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data dodania',
  `timestamp_start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Rozpoczęcie pracy',
  `timestamp_stop` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Zakończenie pracy',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT 'Status rekordu [ 1 - aktywny, 0 - nieaktywny ]',
  PRIMARY KEY (`id`),
  KEY `FK__task` (`id_task`),
  CONSTRAINT `FK__task` FOREIGN KEY (`id_task`) REFERENCES `task` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
