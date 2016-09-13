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
-- Zrzucanie danych dla tabeli projekty.acl_classes: ~1 rows (około)
/*!40000 ALTER TABLE `acl_classes` DISABLE KEYS */;
INSERT INTO `acl_classes` (`id`, `class_type`) VALUES
	(2, 'AppBundle\\Entity\\Client');
/*!40000 ALTER TABLE `acl_classes` ENABLE KEYS */;

-- Zrzucanie danych dla tabeli projekty.acl_entries: ~3 rows (około)
/*!40000 ALTER TABLE `acl_entries` DISABLE KEYS */;
INSERT INTO `acl_entries` (`id`, `class_id`, `object_identity_id`, `security_identity_id`, `field_name`, `ace_order`, `mask`, `granting`, `granting_strategy`, `audit_success`, `audit_failure`) VALUES
	(2, 2, 1, 1, NULL, 0, 128, 1, 'all', 0, 0),
	(3, 2, 2, 1, NULL, 0, 128, 1, 'all', 0, 0),
	(4, 2, 3, 1, NULL, 0, 128, 1, 'all', 0, 0);
/*!40000 ALTER TABLE `acl_entries` ENABLE KEYS */;

-- Zrzucanie danych dla tabeli projekty.acl_object_identities: ~3 rows (około)
/*!40000 ALTER TABLE `acl_object_identities` DISABLE KEYS */;
INSERT INTO `acl_object_identities` (`id`, `parent_object_identity_id`, `class_id`, `object_identifier`, `entries_inheriting`) VALUES
	(1, NULL, 2, '6', 1),
	(2, NULL, 2, '7', 1),
	(3, NULL, 2, '8', 1);
/*!40000 ALTER TABLE `acl_object_identities` ENABLE KEYS */;

-- Zrzucanie danych dla tabeli projekty.acl_object_identity_ancestors: ~3 rows (około)
/*!40000 ALTER TABLE `acl_object_identity_ancestors` DISABLE KEYS */;
INSERT INTO `acl_object_identity_ancestors` (`object_identity_id`, `ancestor_id`) VALUES
	(1, 1),
	(2, 2),
	(3, 3);
/*!40000 ALTER TABLE `acl_object_identity_ancestors` ENABLE KEYS */;

-- Zrzucanie danych dla tabeli projekty.acl_security_identities: ~1 rows (około)
/*!40000 ALTER TABLE `acl_security_identities` DISABLE KEYS */;
INSERT INTO `acl_security_identities` (`id`, `identifier`, `username`) VALUES
	(1, 'AppBundle\\Entity\\User-user1', 1);
/*!40000 ALTER TABLE `acl_security_identities` ENABLE KEYS */;

-- Zrzucanie danych dla tabeli projekty.client: ~3 rows (około)
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` (`id`, `id_type_of_client`, `id_user_add`, `timestamp_add`, `name`, `nip`, `country`, `street`, `post_code`) VALUES
	(6, 1, 1, '2016-08-10 16:52:12', 'IMC S.A.', '123-345-67-89', 'Poland', 'Warszawska 1', '05-820'),
	(7, 1, 1, '2016-08-17 11:46:07', 'SIXT S.A.', '987-455-32-23', 'Poland', 'Arabska 9', '03-345'),
	(8, 1, 1, '2016-09-13 14:41:11', 'Klient Test 3', '234-435-94-94', 'Poland', 'Testowa 12', '03-998');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;

-- Zrzucanie danych dla tabeli projekty.notification: ~0 rows (około)
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;

-- Zrzucanie danych dla tabeli projekty.project: ~3 rows (około)
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` (`id`, `id_client`, `name`, `description`, `timestamp_add`) VALUES
	(1, 7, 'Aplikacja Pracownicy', 'Budowa aplikacji wspomagającej pracę działu HR', '2016-09-10 22:22:23'),
	(2, 7, 'Płatności PayU', 'Aplikacja wczytująca dane z pliku PDF oraz wspomagająca proces płatności online wraz z raportowaniem', '2016-09-10 22:22:53'),
	(3, 6, 'Aplikacja "Urlopy"', 'Budowa aplikacji na Symfony 2', '2016-09-12 22:07:23');
/*!40000 ALTER TABLE `project` ENABLE KEYS */;

-- Zrzucanie danych dla tabeli projekty.project_status: ~0 rows (około)
/*!40000 ALTER TABLE `project_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `project_status` ENABLE KEYS */;

-- Zrzucanie danych dla tabeli projekty.status_of_project: ~1 rows (około)
/*!40000 ALTER TABLE `status_of_project` DISABLE KEYS */;
INSERT INTO `status_of_project` (`id`, `name`, `status`) VALUES
	(1, 'Nowy', 1);
/*!40000 ALTER TABLE `status_of_project` ENABLE KEYS */;

-- Zrzucanie danych dla tabeli projekty.status_of_task: ~4 rows (około)
/*!40000 ALTER TABLE `status_of_task` DISABLE KEYS */;
INSERT INTO `status_of_task` (`id`, `name`, `status`) VALUES
	(1, 'Nowe', 1),
	(2, 'W trakcie realizacji', 1),
	(3, 'Skierowane do testów wewnętrznych', 1),
	(4, 'Zakończone', 1);
/*!40000 ALTER TABLE `status_of_task` ENABLE KEYS */;

-- Zrzucanie danych dla tabeli projekty.task: ~3 rows (około)
/*!40000 ALTER TABLE `task` DISABLE KEYS */;
INSERT INTO `task` (`id`, `id_task`, `id_project`, `id_status_of_task`, `assign_to_user`, `name`, `description`, `timestamp_add`, `priorytet`) VALUES
	(7, NULL, 2, 4, 1, 'Analiza zapytania ofertowego', 'Analiza zapytania, weryfikacja możliwości importowania danych z otrzymanego pliku PDF, przygotowanie oferty.', '2016-09-10 23:12:27', 3),
	(8, NULL, 2, 1, 1, 'Przygotowanie projektu bazy danych', 'Budowa bazy danych', '2016-09-10 23:15:03', 2),
	(9, NULL, 1, 1, 1, 'Analiza aplikacji', 'test', '2016-09-12 14:22:09', 1);
/*!40000 ALTER TABLE `task` ENABLE KEYS */;

-- Zrzucanie danych dla tabeli projekty.team: ~2 rows (około)
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` (`id`, `id_project`, `id_user`, `timestamp_add`, `status`) VALUES
	(1, 2, 1, '2016-08-31 22:46:41', 1),
	(2, 1, 1, '2016-09-10 22:47:08', 1);
/*!40000 ALTER TABLE `team` ENABLE KEYS */;

-- Zrzucanie danych dla tabeli projekty.type_of_client: ~3 rows (około)
/*!40000 ALTER TABLE `type_of_client` DISABLE KEYS */;
INSERT INTO `type_of_client` (`id`, `name`, `status`) VALUES
	(1, 'Klient', 1),
	(2, 'Podwykonawca', 1),
	(3, 'Dostawca', 1);
/*!40000 ALTER TABLE `type_of_client` ENABLE KEYS */;

-- Zrzucanie danych dla tabeli projekty.type_of_notification: ~4 rows (około)
/*!40000 ALTER TABLE `type_of_notification` DISABLE KEYS */;
INSERT INTO `type_of_notification` (`id`, `name`, `status`) VALUES
	(1, 'Oczekuje na weryfikację', 1),
	(2, 'W trakcie weryfikacji', 1),
	(3, 'Błąd podczas realizacji zadania', 1),
	(4, 'Rozbudowa / modyfikacja', 1);
/*!40000 ALTER TABLE `type_of_notification` ENABLE KEYS */;

-- Zrzucanie danych dla tabeli projekty.user: ~1 rows (około)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `first_name`, `last_name`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`) VALUES
	(1, 'Mariusz', 'Makowski', 'user1', 'user1', 'mariusz@mariusz.biz', 'mariusz@mariusz.biz', 1, '7wakxg43i48wk4cgwkwows8ok4gw0w4', '$2y$13$a5QdfNJxChR/iXSl43cXOuplB6zcepfal4M/2oiGcN5JSmWPrDTL.', '2016-09-10 22:33:43', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Zrzucanie danych dla tabeli projekty.work: ~0 rows (około)
/*!40000 ALTER TABLE `work` DISABLE KEYS */;
/*!40000 ALTER TABLE `work` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
