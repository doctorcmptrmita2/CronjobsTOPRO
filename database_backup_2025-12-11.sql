-- MySQL dump 10.13  Distrib 9.1.0, for Win64 (x86_64)
--
-- Host: localhost    Database: cronjobs_topro
-- ------------------------------------------------------
-- Server version	9.1.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `api_tokens`
--

DROP TABLE IF EXISTS `api_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `api_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `api_tokens_token_unique` (`token`),
  KEY `api_tokens_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `api_tokens`
--

LOCK TABLES `api_tokens` WRITE;
/*!40000 ALTER TABLE `api_tokens` DISABLE KEYS */;
INSERT INTO `api_tokens` VALUES (1,2,'Default','0518690bfa7baed2687f8158659653d2008fc347a2c42f7b15ed21ead0f1a670',NULL,'2025-12-10 18:33:44','2025-12-10 18:33:44');
/*!40000 ALTER TABLE `api_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('laravel-cache-test@test.com|127.0.0.1:timer','i:1765475537;',1765475537),('laravel-cache-test@test.com|127.0.0.1','i:1;',1765475537);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `check_runs`
--

DROP TABLE IF EXISTS `check_runs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `check_runs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `check_id` bigint unsigned NOT NULL,
  `checked_at` timestamp NOT NULL,
  `response_time_ms` int unsigned DEFAULT NULL,
  `status_code` smallint unsigned DEFAULT NULL,
  `is_up` tinyint(1) NOT NULL,
  `error_message` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dns_time_ms` int unsigned DEFAULT NULL,
  `connect_time_ms` int unsigned DEFAULT NULL,
  `tls_time_ms` int unsigned DEFAULT NULL,
  `ttfb_ms` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `check_runs_check_id_checked_at_index` (`check_id`,`checked_at`),
  KEY `check_runs_check_id_is_up_index` (`check_id`,`is_up`),
  KEY `check_runs_checked_at_index` (`checked_at`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `check_runs`
--

LOCK TABLES `check_runs` WRITE;
/*!40000 ALTER TABLE `check_runs` DISABLE KEYS */;
INSERT INTO `check_runs` VALUES (1,1,'2025-12-11 15:35:02',826,200,1,NULL,NULL,NULL,NULL,NULL,'2025-12-11 15:35:02','2025-12-11 15:35:02');
/*!40000 ALTER TABLE `check_runs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `checks`
--

DROP TABLE IF EXISTS `checks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `checks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `http_method` enum('GET','HEAD','POST') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'GET',
  `interval_seconds` int unsigned NOT NULL DEFAULT '60',
  `timeout_seconds` int unsigned NOT NULL DEFAULT '30',
  `expected_status_from` smallint unsigned NOT NULL DEFAULT '200',
  `expected_status_to` smallint unsigned NOT NULL DEFAULT '299',
  `headers_json` json DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci,
  `keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword_should_exist` tinyint(1) NOT NULL DEFAULT '1',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `last_checked_at` timestamp NULL DEFAULT NULL,
  `last_status_code` smallint unsigned DEFAULT NULL,
  `last_response_time_ms` int unsigned DEFAULT NULL,
  `is_up` tinyint(1) NOT NULL DEFAULT '1',
  `last_down_at` timestamp NULL DEFAULT NULL,
  `last_up_at` timestamp NULL DEFAULT NULL,
  `uptime_percentage` decimal(5,2) NOT NULL DEFAULT '100.00',
  `avg_response_time_ms` int unsigned DEFAULT NULL,
  `consecutive_failures` int unsigned NOT NULL DEFAULT '0',
  `alert_email_enabled` tinyint(1) NOT NULL DEFAULT '1',
  `alert_threshold` tinyint unsigned NOT NULL DEFAULT '2',
  `alert_sent` tinyint(1) NOT NULL DEFAULT '0',
  `locked_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `checks_user_id_is_active_index` (`user_id`,`is_active`),
  KEY `checks_is_active_last_checked_at_index` (`is_active`,`last_checked_at`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checks`
--

LOCK TABLES `checks` WRITE;
/*!40000 ALTER TABLE `checks` DISABLE KEYS */;
INSERT INTO `checks` VALUES (1,2,'Google Homepage','https://www.google.com','GET',60,30,200,299,NULL,NULL,NULL,1,1,'2025-12-11 15:35:02',200,826,1,NULL,'2025-12-11 15:35:02',100.00,826,0,1,2,0,NULL,'2025-12-11 15:35:01','2025-12-11 15:35:02');
/*!40000 ALTER TABLE `checks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_runs`
--

DROP TABLE IF EXISTS `job_runs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_runs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `job_id` bigint unsigned NOT NULL,
  `ran_at` timestamp NOT NULL,
  `status_code` smallint DEFAULT NULL,
  `duration_ms` int unsigned DEFAULT NULL,
  `success` tinyint(1) NOT NULL,
  `error_message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `response_snippet` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `job_runs_job_id_ran_at_index` (`job_id`,`ran_at`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_runs`
--

LOCK TABLES `job_runs` WRITE;
/*!40000 ALTER TABLE `job_runs` DISABLE KEYS */;
INSERT INTO `job_runs` VALUES (1,3,'2025-12-10 19:18:36',200,1693,1,NULL,'<!DOCTYPE html>\r\n<html lang=\"en\">\r\n<head>\r\n    <meta charset=\"UTF-8\">\r\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n    <title>Home - CronJobs.to</title>\r\n    <meta name=\"description\" content=\"Easily manage your scheduled tasks. Modern cron job management platform.\">\r\n    <meta name=\"keywords\" content=\"cron job, task scheduler, automation, monitoring, scheduled tasks\">\r\n    \r\n    <!-- TailwindCSS CDN -->\r\n    <script src=\"https://cdn.tailwindcss.com\"></script>\r\n   ','2025-12-10 19:18:38','2025-12-10 19:18:38'),(2,5,'2025-12-11 15:00:33',200,1610,1,NULL,'<!DOCTYPE html>\r\n<html lang=\"en\">\r\n<head>\r\n    <meta charset=\"utf-8\">\r\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\r\n    <title>AdsReady - AdSense & SEO Readiness Analyzer</title>\r\n                                <link rel=\"stylesheet\" href=\"https://adsready.io/build/assets/app-CVgPL3iY.css\">\r\n                            <script type=\"module\" src=\"https://adsready.io/build/assets/app-DqzHJBl2.js\"></script>\r\n            </head>\r\n<body>\r\n    <div id=\"app\"></div>\r\n<scrip','2025-12-11 15:00:35','2025-12-11 15:00:35'),(3,5,'2025-12-11 15:00:35',200,636,1,NULL,'<!DOCTYPE html>\r\n<html lang=\"en\">\r\n<head>\r\n    <meta charset=\"utf-8\">\r\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\r\n    <title>AdsReady - AdSense & SEO Readiness Analyzer</title>\r\n                                <link rel=\"stylesheet\" href=\"https://adsready.io/build/assets/app-CVgPL3iY.css\">\r\n                            <script type=\"module\" src=\"https://adsready.io/build/assets/app-DqzHJBl2.js\"></script>\r\n            </head>\r\n<body>\r\n    <div id=\"app\"></div>\r\n<scrip','2025-12-11 15:00:36','2025-12-11 15:00:36'),(4,5,'2025-12-11 15:00:36',200,668,1,NULL,'<!DOCTYPE html>\r\n<html lang=\"en\">\r\n<head>\r\n    <meta charset=\"utf-8\">\r\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\r\n    <title>AdsReady - AdSense & SEO Readiness Analyzer</title>\r\n                                <link rel=\"stylesheet\" href=\"https://adsready.io/build/assets/app-CVgPL3iY.css\">\r\n                            <script type=\"module\" src=\"https://adsready.io/build/assets/app-DqzHJBl2.js\"></script>\r\n            </head>\r\n<body>\r\n    <div id=\"app\"></div>\r\n<scrip','2025-12-11 15:00:36','2025-12-11 15:00:36'),(5,5,'2025-12-11 15:00:36',200,675,1,NULL,'<!DOCTYPE html>\r\n<html lang=\"en\">\r\n<head>\r\n    <meta charset=\"utf-8\">\r\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\r\n    <title>AdsReady - AdSense & SEO Readiness Analyzer</title>\r\n                                <link rel=\"stylesheet\" href=\"https://adsready.io/build/assets/app-CVgPL3iY.css\">\r\n                            <script type=\"module\" src=\"https://adsready.io/build/assets/app-DqzHJBl2.js\"></script>\r\n            </head>\r\n<body>\r\n    <div id=\"app\"></div>\r\n<scrip','2025-12-11 15:00:37','2025-12-11 15:00:37'),(6,6,'2025-12-11 15:00:37',NULL,3928,0,'HTTP request returned status code 503:\n<html>\r\n<head><title>503 Service Temporarily Unavailable</title></head>\r\n<body>\r\n<center><h1>503 Service Temporarily Una (truncated...)\n',NULL,'2025-12-11 15:00:41','2025-12-11 15:00:41'),(7,6,'2025-12-11 15:00:41',200,4398,1,NULL,'{\n  \"args\": {}, \n  \"headers\": {\n    \"Host\": \"httpbin.org\", \n    \"User-Agent\": \"GuzzleHttp/7\", \n    \"X-Amzn-Trace-Id\": \"Root=1-693b06ca-09d762cc1f74c6aa4fe568ca\"\n  }, \n  \"origin\": \"81.214.167.220\", \n  \"url\": \"https://httpbin.org/get\"\n}\n','2025-12-11 15:00:46','2025-12-11 15:00:46'),(8,6,'2025-12-11 15:00:46',200,22170,1,NULL,'{\n  \"args\": {}, \n  \"headers\": {\n    \"Host\": \"httpbin.org\", \n    \"User-Agent\": \"GuzzleHttp/7\", \n    \"X-Amzn-Trace-Id\": \"Root=1-693b06ce-052fcab069916e9811e1db4b\"\n  }, \n  \"origin\": \"81.214.167.220\", \n  \"url\": \"https://httpbin.org/get\"\n}\n','2025-12-11 15:01:08','2025-12-11 15:01:08'),(9,6,'2025-12-11 15:01:08',200,33381,1,NULL,'{\n  \"args\": {}, \n  \"headers\": {\n    \"Host\": \"httpbin.org\", \n    \"User-Agent\": \"GuzzleHttp/7\", \n    \"X-Amzn-Trace-Id\": \"Root=1-693b0703-12a8f6ba445ff3f77e05b3f5\"\n  }, \n  \"origin\": \"81.214.167.220\", \n  \"url\": \"https://httpbin.org/get\"\n}\n','2025-12-11 15:01:41','2025-12-11 15:01:41'),(10,6,'2025-12-11 15:01:41',NULL,33488,0,'HTTP request returned status code 503:\n<html>\r\n<head><title>503 Service Temporarily Unavailable</title></head>\r\n<body>\r\n<center><h1>503 Service Temporarily Una (truncated...)\n',NULL,'2025-12-11 15:02:15','2025-12-11 15:02:15'),(11,5,'2025-12-11 15:02:15',200,763,1,NULL,'<!DOCTYPE html>\r\n<html lang=\"en\">\r\n<head>\r\n    <meta charset=\"utf-8\">\r\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\r\n    <title>AdsReady - AdSense & SEO Readiness Analyzer</title>\r\n                                <link rel=\"stylesheet\" href=\"https://adsready.io/build/assets/app-CVgPL3iY.css\">\r\n                            <script type=\"module\" src=\"https://adsready.io/build/assets/app-DqzHJBl2.js\"></script>\r\n            </head>\r\n<body>\r\n    <div id=\"app\"></div>\r\n<scrip','2025-12-11 15:02:15','2025-12-11 15:02:15'),(12,5,'2025-12-11 15:02:16',200,885,1,NULL,'<!DOCTYPE html>\r\n<html lang=\"en\">\r\n<head>\r\n    <meta charset=\"utf-8\">\r\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\r\n    <title>AdsReady - AdSense & SEO Readiness Analyzer</title>\r\n                                <link rel=\"stylesheet\" href=\"https://adsready.io/build/assets/app-CVgPL3iY.css\">\r\n                            <script type=\"module\" src=\"https://adsready.io/build/assets/app-DqzHJBl2.js\"></script>\r\n            </head>\r\n<body>\r\n    <div id=\"app\"></div>\r\n<scrip','2025-12-11 15:02:16','2025-12-11 15:02:16'),(13,7,'2025-12-11 15:39:23',200,0,1,NULL,'Heartbeat received','2025-12-11 15:39:23','2025-12-11 15:39:23'),(14,7,'2025-12-11 15:39:40',200,0,1,NULL,'Heartbeat received','2025-12-11 15:39:40','2025-12-11 15:39:40');
/*!40000 ALTER TABLE `job_runs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `type` enum('cron','heartbeat') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cron',
  `heartbeat_token` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heartbeat_interval` int unsigned DEFAULT NULL,
  `last_ping_at` timestamp NULL DEFAULT NULL,
  `heartbeat_grace` int unsigned DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `http_method` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers_json` json DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci,
  `timeout_seconds` smallint unsigned NOT NULL DEFAULT '10',
  `expected_status_from` smallint unsigned NOT NULL DEFAULT '200',
  `expected_status_to` smallint unsigned NOT NULL DEFAULT '299',
  `schedule_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interval_minutes` int unsigned DEFAULT NULL,
  `daily_time` time DEFAULT NULL,
  `weekly_day_of_week` tinyint unsigned DEFAULT NULL,
  `cron_expression` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Europe/Istanbul',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `max_retries` tinyint unsigned NOT NULL DEFAULT '3',
  `failure_alert_threshold` tinyint unsigned NOT NULL DEFAULT '3',
  `alert_email_enabled` tinyint(1) NOT NULL DEFAULT '1',
  `last_run_at` timestamp NULL DEFAULT NULL,
  `next_run_at` timestamp NULL DEFAULT NULL,
  `last_status_code` smallint DEFAULT NULL,
  `last_duration_ms` int unsigned DEFAULT NULL,
  `last_error_message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `consecutive_failures` int unsigned NOT NULL DEFAULT '0',
  `locked_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `jobs_heartbeat_token_unique` (`heartbeat_token`),
  KEY `jobs_user_id_foreign` (`user_id`),
  KEY `jobs_next_run_at_index` (`next_run_at`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES (1,2,'cron',NULL,NULL,NULL,NULL,'Cron test',NULL,'https://api.example.com/cron/test','GET',NULL,NULL,30,200,299,'cron',NULL,NULL,NULL,'*/15 * * * *','UTC',1,3,3,1,NULL,NULL,NULL,NULL,NULL,0,NULL,'2025-12-10 19:06:11','2025-12-10 19:06:11'),(2,2,'cron',NULL,NULL,NULL,NULL,'Test',NULL,'https://api.example.com/test','GET',NULL,NULL,30,200,299,'cron',NULL,NULL,NULL,'*/15 * * * *','UTC',1,3,3,1,NULL,'2025-12-10 19:15:00',NULL,NULL,NULL,0,NULL,'2025-12-10 19:07:29','2025-12-10 19:07:29'),(3,2,'cron',NULL,NULL,NULL,NULL,'cronjobs.to',NULL,'https://cronjobs.to/','GET',NULL,NULL,30,200,299,'cron',NULL,NULL,NULL,'*/15 * * * *','UTC',1,3,3,1,'2025-12-10 19:18:36','2025-12-10 19:30:00',200,1693,NULL,0,NULL,'2025-12-10 19:13:06','2025-12-10 19:18:38'),(4,3,'cron',NULL,NULL,NULL,NULL,'jsonplaceholder.typicode.com/posts/1',NULL,'https://jsonplaceholder.typicode.com/posts/1','GET',NULL,NULL,30,200,299,'cron',NULL,NULL,NULL,'0 * * * *','UTC',1,3,3,1,NULL,'2025-12-10 20:00:00',NULL,NULL,NULL,0,NULL,'2025-12-10 19:34:39','2025-12-10 19:34:39'),(5,2,'cron',NULL,NULL,NULL,NULL,'adsready',NULL,'https://adsready.io/','GET',NULL,NULL,30,200,299,'interval',15,'00:00:00',1,'*/15 * * * *','UTC',1,3,3,1,'2025-12-11 15:02:16','2025-12-11 15:17:16',200,885,NULL,0,NULL,'2025-12-11 14:52:03','2025-12-11 15:02:16'),(6,2,'cron',NULL,NULL,NULL,NULL,'Test Job',NULL,'https://httpbin.org/get','GET',NULL,NULL,30,200,299,'interval',15,'00:00:00',1,'*/15 * * * *','UTC',1,3,3,1,'2025-12-11 15:01:41','2025-12-11 15:16:41',NULL,33488,'HTTP request returned status code 503:\n<html>\r\n<head><title>503 Service Temporarily Unavailable</title></head>\r\n<body>\r\n<center><h1>503 Service Temporarily Una (truncated...)\n',1,NULL,'2025-12-11 14:57:19','2025-12-11 15:02:15'),(7,2,'heartbeat','AT4dXufk0AerWaojUtkv2SN7gtmTwaOV',5,'2025-12-11 15:39:40',2,'Test Heartbeat',NULL,'https://example.com','GET',NULL,NULL,10,200,299,'interval',15,NULL,NULL,NULL,'Europe/Istanbul',1,3,3,1,NULL,NULL,NULL,NULL,NULL,0,NULL,'2025-12-11 15:38:02','2025-12-11 15:39:40');
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'2025_12_10_200023_create_plans_table',1),(4,'2025_12_10_200024_add_profile_fields_to_users_table',1),(5,'2025_12_10_200024_create_job_runs_table',1),(6,'2025_12_10_200024_create_jobs_table',1),(7,'2025_12_10_200025_create_api_tokens_table',1),(8,'2025_12_10_201734_create_queue_jobs_table',1),(9,'2025_12_10_210000_create_status_pages_table',2),(10,'2025_12_11_100000_add_heartbeat_to_jobs_table',3),(11,'2025_12_11_182119_create_checks_table',4),(12,'2025_12_11_182126_create_check_runs_table',4),(13,'2025_12_11_183224_add_check_limits_to_plans_table',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plans`
--

DROP TABLE IF EXISTS `plans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `plans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_jobs` int unsigned NOT NULL,
  `max_checks` int unsigned NOT NULL DEFAULT '5',
  `min_check_interval_seconds` int unsigned NOT NULL DEFAULT '60',
  `min_interval_minutes` int unsigned NOT NULL,
  `log_retention_days` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `plans_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plans`
--

LOCK TABLES `plans` WRITE;
/*!40000 ALTER TABLE `plans` DISABLE KEYS */;
INSERT INTO `plans` VALUES (1,'Free','free',5,3,60,15,30,'2025-12-10 17:29:07','2025-12-11 15:33:15'),(2,'Pro','pro',100,50,30,1,90,'2025-12-10 17:29:07','2025-12-11 15:33:15');
/*!40000 ALTER TABLE `plans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `queue_jobs`
--

DROP TABLE IF EXISTS `queue_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `queue_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `queue_jobs_queue_index` (`queue`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `queue_jobs`
--

LOCK TABLES `queue_jobs` WRITE;
/*!40000 ALTER TABLE `queue_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `queue_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('DQ2L9j6dwqdym44pJiPRDPBW9hIXDTAQMUOd9iuj',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; tr-TR) WindowsPowerShell/5.1.19041.6456','YTozOntzOjY6Il90b2tlbiI7czo0MDoiV3U4TEgzb0RQSzd4cEp5cnphM3pkS3V6eTVveG45R3ZvWlZmakljTSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo3OiJsYW5kaW5nIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1765480237),('W6UMVRXXrfDk3VzRvO0KYs8EXdk9QHE7e9ksw0Kj',2,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoidmk0N2I2TGZWajBPaGVnM3pwS3F6WDAwSVFieFY3eWlVZ0QwSUtHTiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo3OiJsYW5kaW5nIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9',1765480350),('55X98I1G7GqrT6cBK0mlVO1jvRk94OsBEzyuhwZW',2,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Cursor/2.2.9 Chrome/138.0.7204.251 Electron/37.7.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiWDZ1Ujk4ekliNE4xMWkxVUxTY1JnRFk5UlRlQUF0WkZHbEs3c01IeCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjIxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAiO3M6NToicm91dGUiO3M6NzoibGFuZGluZyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==',1765479134),('uzTFkzK6deboD8crZIqh3efzD3lk6XPXPF06yglR',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; tr-TR) WindowsPowerShell/5.1.19041.6456','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZXBXTU5Pa3ZEVGl6cjVhdFpsSG9uQWFEWk5JR3gxWUFkd0NVNU50QSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo3OiJsYW5kaW5nIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1765479144),('J6whYSIOGQgyE3dJveGqoqs1H34xXu5nJom2sSc8',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; tr-TR) WindowsPowerShell/5.1.19041.6456','YTozOntzOjY6Il90b2tlbiI7czo0MDoiQjRTYjBUcTd0U0VUY214WU05aG1TSFdJVE10Y1hTNWhQazdvNUxSWCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdGF0dXMvbXktc2VydmljZSI7czo1OiJyb3V0ZSI7czoxMzoic3RhdHVzLnB1YmxpYyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1765478518);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_page_jobs`
--

DROP TABLE IF EXISTS `status_page_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status_page_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `status_page_id` bigint unsigned NOT NULL,
  `job_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `status_page_jobs_status_page_id_job_id_unique` (`status_page_id`,`job_id`),
  KEY `status_page_jobs_job_id_foreign` (`job_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_page_jobs`
--

LOCK TABLES `status_page_jobs` WRITE;
/*!40000 ALTER TABLE `status_page_jobs` DISABLE KEYS */;
INSERT INTO `status_page_jobs` VALUES (1,1,5,NULL,NULL);
/*!40000 ALTER TABLE `status_page_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_pages`
--

DROP TABLE IF EXISTS `status_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status_pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_public` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `status_pages_slug_unique` (`slug`),
  KEY `status_pages_user_id_is_public_index` (`user_id`,`is_public`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_pages`
--

LOCK TABLES `status_pages` WRITE;
/*!40000 ALTER TABLE `status_pages` DISABLE KEYS */;
INSERT INTO `status_pages` VALUES (1,2,'My Service Status','my-service',NULL,1,'2025-12-11 15:40:19','2025-12-11 15:40:59');
/*!40000 ALTER TABLE `status_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `timezone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Europe/Istanbul',
  `notification_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `plan_id` bigint unsigned DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_plan_id_foreign` (`plan_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@cronjobs.to','2025-12-10 17:29:07','Europe/Istanbul','admin@cronjobs.to','$2y$12$AwnSbq4UFU9btWGApdo.xelR9L5SIPseuYVVj2Iru25wqTcmGxrwe','FJilttSjklEn5XXM1E8oe04KyZ5Pv33N40p9Vec4K8x4fCAM1Yd1RREkW4CH','2025-12-10 17:29:08','2025-12-10 17:29:08',1,1),(2,'Demo User','demo@cronjobs.to','2025-12-11 14:55:43','UTC',NULL,'$2y$12$EcyxTtzCOM4j65ZG24CQOefEjMkas8yLmvO2QfTEIhtXe3/abS2vG',NULL,'2025-12-10 18:04:45','2025-12-11 14:55:43',NULL,0),(3,'Test User','testuser@example.com',NULL,'UTC','testuser@example.com','$2y$12$nTMuXxyps6.9ioZ9C9s6KOhP5W2iF0iPEVey6gC4xDI94DBk9pEn2',NULL,'2025-12-10 19:34:39','2025-12-11 06:14:24',1,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-12-11 22:20:02
