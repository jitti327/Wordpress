-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 04, 2018 at 12:26 PM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.12-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bike`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp_bike`
--

CREATE TABLE `wp_bike` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` int(11) NOT NULL,
  `price` float NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wp_bike`
--

INSERT INTO `wp_bike` (`id`, `vendor_id`, `type`, `name`, `value`, `price`, `parent_id`, `created_on`, `updated_on`) VALUES
(1, 0, '', 'Mountain Bike', 0, 1, 0, '2018-12-03 13:06:44', '0000-00-00 00:00:00'),
(2, 0, '', 'Trail / All Mountain', 0, 2, 1, '2018-12-03 13:06:44', '0000-00-00 00:00:00'),
(3, 0, '', 'Standard Bike', 0, 3, 2, '2018-12-03 13:06:44', '0000-00-00 00:00:00'),
(4, 2, '', 'Road Bike', 1, 1, 0, '2018-12-03 13:09:07', '0000-00-00 00:00:00'),
(5, 2, '', 'Mountain Bike', 1, 1, 0, '2018-12-03 13:11:11', '0000-00-00 00:00:00'),
(6, 2, '', 'Enduro Bike', 1, 2, 5, '2018-12-03 13:11:11', '0000-00-00 00:00:00'),
(7, 2, '', 'Standard Bike', 1, 3, 6, '2018-12-03 13:11:12', '0000-00-00 00:00:00'),
(8, 2, '', 'Road Bike', 1, 1, 0, '2018-12-04 04:17:29', '0000-00-00 00:00:00'),
(9, 2, '', 'Cruiser Bike', 1, 2, 0, '2018-12-04 04:17:29', '0000-00-00 00:00:00'),
(10, 2, '', 'Mountain Bike', 1, 3, 0, '2018-12-04 04:17:29', '0000-00-00 00:00:00'),
(11, 2, '', 'Downhill Bike', 1, 31, 10, '2018-12-04 04:17:29', '0000-00-00 00:00:00'),
(12, 2, '', 'Premium Bike', 1, 32, 11, '2018-12-04 04:17:30', '0000-00-00 00:00:00'),
(13, 2, '', 'Road Bike', 1, 0, 0, '2018-12-04 04:57:06', '0000-00-00 00:00:00'),
(14, 2, '', 'Road Bike', 1, 0, 0, '2018-12-04 05:08:59', '0000-00-00 00:00:00'),
(15, 2, '', 'Hybrid Bike', 1, 0, 0, '2018-12-04 05:08:59', '0000-00-00 00:00:00'),
(16, 2, '', 'Road Bike', 1, 0, 0, '2018-12-04 05:17:23', '0000-00-00 00:00:00'),
(17, 2, '', 'Cruiser Bike', 1, 0, 0, '2018-12-04 05:17:23', '0000-00-00 00:00:00'),
(18, 2, '', 'Road Bike', 1, 0, 0, '2018-12-04 05:19:31', '0000-00-00 00:00:00'),
(19, 2, '', 'Cruiser Bike', 1, 0, 0, '2018-12-04 05:19:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `wp_commentmeta`
--

CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_comments`
--

CREATE TABLE `wp_comments` (
  `comment_ID` bigint(20) UNSIGNED NOT NULL,
  `comment_post_ID` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `comment_author` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_comments`
--

INSERT INTO `wp_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'A WordPress Commenter', 'wapuu@wordpress.example', 'https://wordpress.org/', '', '2018-11-28 09:59:21', '2018-11-28 09:59:21', 'Hi, this is a comment.\nTo get started with moderating, editing, and deleting comments, please visit the Comments screen in the dashboard.\nCommenter avatars come from <a href=\"https://gravatar.com\">Gravatar</a>.', 0, '1', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_links`
--

CREATE TABLE `wp_links` (
  `link_id` bigint(20) UNSIGNED NOT NULL,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_options`
--

CREATE TABLE `wp_options` (
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `option_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_options`
--

INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'http://localhost/git-projects/Wordpress/Task/Bike', 'yes'),
(2, 'home', 'http://localhost/git-projects/Wordpress/Task/Bike', 'yes'),
(3, 'blogname', 'Bike-On-Rent', 'yes'),
(4, 'blogdescription', 'Just another WordPress site', 'yes'),
(5, 'users_can_register', '0', 'yes'),
(6, 'admin_email', 'jatinder.symbensoft@gmail.com', 'yes'),
(7, 'start_of_week', '1', 'yes'),
(8, 'use_balanceTags', '0', 'yes'),
(9, 'use_smilies', '1', 'yes'),
(10, 'require_name_email', '1', 'yes'),
(11, 'comments_notify', '1', 'yes'),
(12, 'posts_per_rss', '10', 'yes'),
(13, 'rss_use_excerpt', '0', 'yes'),
(14, 'mailserver_url', 'mail.example.com', 'yes'),
(15, 'mailserver_login', 'login@example.com', 'yes'),
(16, 'mailserver_pass', 'password', 'yes'),
(17, 'mailserver_port', '110', 'yes'),
(18, 'default_category', '1', 'yes'),
(19, 'default_comment_status', 'open', 'yes'),
(20, 'default_ping_status', 'open', 'yes'),
(21, 'default_pingback_flag', '0', 'yes'),
(22, 'posts_per_page', '10', 'yes'),
(23, 'date_format', 'F j, Y', 'yes'),
(24, 'time_format', 'g:i a', 'yes'),
(25, 'links_updated_date_format', 'F j, Y g:i a', 'yes'),
(26, 'comment_moderation', '0', 'yes'),
(27, 'moderation_notify', '1', 'yes'),
(28, 'permalink_structure', '/%year%/%monthnum%/%day%/%postname%/', 'yes'),
(29, 'rewrite_rules', 'a:89:{s:11:\"^wp-json/?$\";s:22:\"index.php?rest_route=/\";s:14:\"^wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:21:\"^index.php/wp-json/?$\";s:22:\"index.php?rest_route=/\";s:24:\"^index.php/wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:47:\"category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:42:\"category/(.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:23:\"category/(.+?)/embed/?$\";s:46:\"index.php?category_name=$matches[1]&embed=true\";s:35:\"category/(.+?)/page/?([0-9]{1,})/?$\";s:53:\"index.php?category_name=$matches[1]&paged=$matches[2]\";s:17:\"category/(.+?)/?$\";s:35:\"index.php?category_name=$matches[1]\";s:44:\"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:39:\"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:20:\"tag/([^/]+)/embed/?$\";s:36:\"index.php?tag=$matches[1]&embed=true\";s:32:\"tag/([^/]+)/page/?([0-9]{1,})/?$\";s:43:\"index.php?tag=$matches[1]&paged=$matches[2]\";s:14:\"tag/([^/]+)/?$\";s:25:\"index.php?tag=$matches[1]\";s:45:\"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:40:\"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:21:\"type/([^/]+)/embed/?$\";s:44:\"index.php?post_format=$matches[1]&embed=true\";s:33:\"type/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?post_format=$matches[1]&paged=$matches[2]\";s:15:\"type/([^/]+)/?$\";s:33:\"index.php?post_format=$matches[1]\";s:48:\".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$\";s:18:\"index.php?feed=old\";s:20:\".*wp-app\\.php(/.*)?$\";s:19:\"index.php?error=403\";s:18:\".*wp-register.php$\";s:23:\"index.php?register=true\";s:32:\"feed/(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:27:\"(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:8:\"embed/?$\";s:21:\"index.php?&embed=true\";s:20:\"page/?([0-9]{1,})/?$\";s:28:\"index.php?&paged=$matches[1]\";s:41:\"comments/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:36:\"comments/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:17:\"comments/embed/?$\";s:21:\"index.php?&embed=true\";s:44:\"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:39:\"search/(.+)/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:20:\"search/(.+)/embed/?$\";s:34:\"index.php?s=$matches[1]&embed=true\";s:32:\"search/(.+)/page/?([0-9]{1,})/?$\";s:41:\"index.php?s=$matches[1]&paged=$matches[2]\";s:14:\"search/(.+)/?$\";s:23:\"index.php?s=$matches[1]\";s:47:\"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:42:\"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:23:\"author/([^/]+)/embed/?$\";s:44:\"index.php?author_name=$matches[1]&embed=true\";s:35:\"author/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?author_name=$matches[1]&paged=$matches[2]\";s:17:\"author/([^/]+)/?$\";s:33:\"index.php?author_name=$matches[1]\";s:69:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:64:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:45:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$\";s:74:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]\";s:39:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$\";s:63:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]\";s:56:\"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:51:\"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:32:\"([0-9]{4})/([0-9]{1,2})/embed/?$\";s:58:\"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true\";s:44:\"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]\";s:26:\"([0-9]{4})/([0-9]{1,2})/?$\";s:47:\"index.php?year=$matches[1]&monthnum=$matches[2]\";s:43:\"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:38:\"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:19:\"([0-9]{4})/embed/?$\";s:37:\"index.php?year=$matches[1]&embed=true\";s:31:\"([0-9]{4})/page/?([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&paged=$matches[2]\";s:13:\"([0-9]{4})/?$\";s:26:\"index.php?year=$matches[1]\";s:58:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:68:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:88:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:83:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:83:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:64:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:53:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/embed/?$\";s:91:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&embed=true\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/trackback/?$\";s:85:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&tb=1\";s:77:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]\";s:72:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]\";s:65:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/page/?([0-9]{1,})/?$\";s:98:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&paged=$matches[5]\";s:72:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/comment-page-([0-9]{1,})/?$\";s:98:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&cpage=$matches[5]\";s:61:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)(?:/([0-9]+))?/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&page=$matches[5]\";s:47:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:57:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:77:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:72:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:72:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:53:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:64:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&cpage=$matches[4]\";s:51:\"([0-9]{4})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&cpage=$matches[3]\";s:38:\"([0-9]{4})/comment-page-([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&cpage=$matches[2]\";s:27:\".?.+?/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\".?.+?/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:57:\".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:33:\".?.+?/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:16:\"(.?.+?)/embed/?$\";s:41:\"index.php?pagename=$matches[1]&embed=true\";s:20:\"(.?.+?)/trackback/?$\";s:35:\"index.php?pagename=$matches[1]&tb=1\";s:40:\"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:35:\"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:28:\"(.?.+?)/page/?([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&paged=$matches[2]\";s:35:\"(.?.+?)/comment-page-([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&cpage=$matches[2]\";s:24:\"(.?.+?)(?:/([0-9]+))?/?$\";s:47:\"index.php?pagename=$matches[1]&page=$matches[2]\";}', 'yes'),
(30, 'hack_file', '0', 'yes'),
(31, 'blog_charset', 'UTF-8', 'yes'),
(32, 'moderation_keys', '', 'no'),
(33, 'active_plugins', 'a:0:{}', 'yes'),
(34, 'category_base', '', 'yes'),
(35, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(36, 'comment_max_links', '2', 'yes'),
(37, 'gmt_offset', '0', 'yes'),
(38, 'default_email_category', '1', 'yes'),
(39, 'recently_edited', 'a:2:{i:0;s:97:\"D:\\xampp\\htdocs\\git-projects\\Wordpress\\Task\\Bike/wp-content/themes/transport-lite-child/style.css\";i:2;s:0:\"\";}', 'no'),
(40, 'template', 'transport-lite', 'yes'),
(41, 'stylesheet', 'transport-lite-child', 'yes'),
(42, 'comment_whitelist', '1', 'yes'),
(43, 'blacklist_keys', '', 'no'),
(44, 'comment_registration', '0', 'yes'),
(45, 'html_type', 'text/html', 'yes'),
(46, 'use_trackback', '0', 'yes'),
(47, 'default_role', 'subscriber', 'yes'),
(48, 'db_version', '38590', 'yes'),
(49, 'uploads_use_yearmonth_folders', '1', 'yes'),
(50, 'upload_path', '', 'yes'),
(51, 'blog_public', '0', 'yes'),
(52, 'default_link_category', '2', 'yes'),
(53, 'show_on_front', 'posts', 'yes'),
(54, 'tag_base', '', 'yes'),
(55, 'show_avatars', '1', 'yes'),
(56, 'avatar_rating', 'G', 'yes'),
(57, 'upload_url_path', '', 'yes'),
(58, 'thumbnail_size_w', '150', 'yes'),
(59, 'thumbnail_size_h', '150', 'yes'),
(60, 'thumbnail_crop', '1', 'yes'),
(61, 'medium_size_w', '300', 'yes'),
(62, 'medium_size_h', '300', 'yes'),
(63, 'avatar_default', 'mystery', 'yes'),
(64, 'large_size_w', '1024', 'yes'),
(65, 'large_size_h', '1024', 'yes'),
(66, 'image_default_link_type', 'none', 'yes'),
(67, 'image_default_size', '', 'yes'),
(68, 'image_default_align', '', 'yes'),
(69, 'close_comments_for_old_posts', '0', 'yes'),
(70, 'close_comments_days_old', '14', 'yes'),
(71, 'thread_comments', '1', 'yes'),
(72, 'thread_comments_depth', '5', 'yes'),
(73, 'page_comments', '0', 'yes'),
(74, 'comments_per_page', '50', 'yes'),
(75, 'default_comments_page', 'newest', 'yes'),
(76, 'comment_order', 'asc', 'yes'),
(77, 'sticky_posts', 'a:0:{}', 'yes'),
(78, 'widget_categories', 'a:2:{i:2;a:4:{s:5:\"title\";s:0:\"\";s:5:\"count\";i:0;s:12:\"hierarchical\";i:0;s:8:\"dropdown\";i:0;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(79, 'widget_text', 'a:0:{}', 'yes'),
(80, 'widget_rss', 'a:0:{}', 'yes'),
(81, 'uninstall_plugins', 'a:0:{}', 'no'),
(82, 'timezone_string', '', 'yes'),
(83, 'page_for_posts', '0', 'yes'),
(84, 'page_on_front', '0', 'yes'),
(85, 'default_post_format', '0', 'yes'),
(86, 'link_manager_enabled', '0', 'yes'),
(87, 'finished_splitting_shared_terms', '1', 'yes'),
(88, 'site_icon', '0', 'yes'),
(89, 'medium_large_size_w', '768', 'yes'),
(90, 'medium_large_size_h', '0', 'yes'),
(91, 'wp_page_for_privacy_policy', '3', 'yes'),
(92, 'show_comments_cookies_opt_in', '0', 'yes'),
(93, 'initial_db_version', '38590', 'yes'),
(94, 'wp_user_roles', 'a:5:{s:13:\"administrator\";a:2:{s:4:\"name\";s:13:\"Administrator\";s:12:\"capabilities\";a:61:{s:13:\"switch_themes\";b:1;s:11:\"edit_themes\";b:1;s:16:\"activate_plugins\";b:1;s:12:\"edit_plugins\";b:1;s:10:\"edit_users\";b:1;s:10:\"edit_files\";b:1;s:14:\"manage_options\";b:1;s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:6:\"import\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:8:\"level_10\";b:1;s:7:\"level_9\";b:1;s:7:\"level_8\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:12:\"delete_users\";b:1;s:12:\"create_users\";b:1;s:17:\"unfiltered_upload\";b:1;s:14:\"edit_dashboard\";b:1;s:14:\"update_plugins\";b:1;s:14:\"delete_plugins\";b:1;s:15:\"install_plugins\";b:1;s:13:\"update_themes\";b:1;s:14:\"install_themes\";b:1;s:11:\"update_core\";b:1;s:10:\"list_users\";b:1;s:12:\"remove_users\";b:1;s:13:\"promote_users\";b:1;s:18:\"edit_theme_options\";b:1;s:13:\"delete_themes\";b:1;s:6:\"export\";b:1;}}s:6:\"editor\";a:2:{s:4:\"name\";s:6:\"Editor\";s:12:\"capabilities\";a:34:{s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;}}s:6:\"author\";a:2:{s:4:\"name\";s:6:\"Author\";s:12:\"capabilities\";a:10:{s:12:\"upload_files\";b:1;s:10:\"edit_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;s:22:\"delete_published_posts\";b:1;}}s:11:\"contributor\";a:2:{s:4:\"name\";s:11:\"Contributor\";s:12:\"capabilities\";a:5:{s:10:\"edit_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;}}s:10:\"subscriber\";a:2:{s:4:\"name\";s:10:\"Subscriber\";s:12:\"capabilities\";a:2:{s:4:\"read\";b:1;s:7:\"level_0\";b:1;}}}', 'yes'),
(95, 'fresh_site', '0', 'yes'),
(96, 'widget_search', 'a:2:{i:2;a:1:{s:5:\"title\";s:0:\"\";}s:12:\"_multiwidget\";i:1;}', 'yes'),
(97, 'widget_recent-posts', 'a:2:{i:2;a:2:{s:5:\"title\";s:0:\"\";s:6:\"number\";i:5;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(98, 'widget_recent-comments', 'a:2:{i:2;a:2:{s:5:\"title\";s:0:\"\";s:6:\"number\";i:5;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(99, 'widget_archives', 'a:2:{i:2;a:3:{s:5:\"title\";s:0:\"\";s:5:\"count\";i:0;s:8:\"dropdown\";i:0;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(100, 'widget_meta', 'a:2:{i:2;a:1:{s:5:\"title\";s:0:\"\";}s:12:\"_multiwidget\";i:1;}', 'yes'),
(101, 'sidebars_widgets', 'a:8:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}s:16:\"headerinfowidget\";a:0:{}s:15:\"footer-widget-1\";a:0:{}s:15:\"footer-widget-2\";a:0:{}s:15:\"footer-widget-3\";a:0:{}s:15:\"footer-widget-4\";a:0:{}s:13:\"array_version\";i:3;}', 'yes'),
(102, 'widget_pages', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(103, 'widget_calendar', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(104, 'widget_media_audio', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(105, 'widget_media_image', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(106, 'widget_media_gallery', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(107, 'widget_media_video', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(108, 'widget_tag_cloud', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(109, 'widget_nav_menu', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(110, 'widget_custom_html', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(111, 'cron', 'a:6:{i:1543906763;a:1:{s:34:\"wp_privacy_delete_old_export_files\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"hourly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:3600;}}}i:1543917563;a:3:{s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1543917647;a:1:{s:25:\"delete_expired_transients\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1543917821;a:1:{s:19:\"wp_scheduled_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1543919475;a:1:{s:30:\"wp_scheduled_auto_draft_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}s:7:\"version\";i:2;}', 'yes'),
(112, 'theme_mods_twentyseventeen', 'a:2:{s:18:\"custom_css_post_id\";i:-1;s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1543399429;s:4:\"data\";a:4:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}s:9:\"sidebar-2\";a:0:{}s:9:\"sidebar-3\";a:0:{}}}}', 'yes'),
(116, '_site_transient_update_core', 'O:8:\"stdClass\":4:{s:7:\"updates\";a:1:{i:0;O:8:\"stdClass\":10:{s:8:\"response\";s:6:\"latest\";s:8:\"download\";s:59:\"https://downloads.wordpress.org/release/wordpress-4.9.8.zip\";s:6:\"locale\";s:5:\"en_US\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:59:\"https://downloads.wordpress.org/release/wordpress-4.9.8.zip\";s:10:\"no_content\";s:70:\"https://downloads.wordpress.org/release/wordpress-4.9.8-no-content.zip\";s:11:\"new_bundled\";s:71:\"https://downloads.wordpress.org/release/wordpress-4.9.8-new-bundled.zip\";s:7:\"partial\";b:0;s:8:\"rollback\";b:0;}s:7:\"current\";s:5:\"4.9.8\";s:7:\"version\";s:5:\"4.9.8\";s:11:\"php_version\";s:5:\"5.2.4\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"4.7\";s:15:\"partial_version\";s:0:\"\";}}s:12:\"last_checked\";i:1543897014;s:15:\"version_checked\";s:5:\"4.9.8\";s:12:\"translations\";a:0:{}}', 'no'),
(121, '_site_transient_update_themes', 'O:8:\"stdClass\":4:{s:12:\"last_checked\";i:1543897016;s:7:\"checked\";a:5:{s:20:\"transport-lite-child\";s:5:\"1.0.0\";s:14:\"transport-lite\";s:3:\"1.0\";s:13:\"twentyfifteen\";s:3:\"2.0\";s:15:\"twentyseventeen\";s:3:\"1.7\";s:13:\"twentysixteen\";s:3:\"1.5\";}s:8:\"response\";a:0:{}s:12:\"translations\";a:0:{}}', 'no'),
(123, '_site_transient_timeout_browser_54f587746181ab7a3934401875df1515', '1544004050', 'no'),
(124, '_site_transient_browser_54f587746181ab7a3934401875df1515', 'a:10:{s:4:\"name\";s:6:\"Chrome\";s:7:\"version\";s:13:\"70.0.3538.110\";s:8:\"platform\";s:7:\"Windows\";s:10:\"update_url\";s:29:\"https://www.google.com/chrome\";s:7:\"img_src\";s:43:\"http://s.w.org/images/browsers/chrome.png?1\";s:11:\"img_src_ssl\";s:44:\"https://s.w.org/images/browsers/chrome.png?1\";s:15:\"current_version\";s:2:\"18\";s:7:\"upgrade\";b:0;s:8:\"insecure\";b:0;s:6:\"mobile\";b:0;}', 'no'),
(127, 'can_compress_scripts', '1', 'no'),
(141, 'current_theme', 'transport-lite-child', 'yes'),
(142, 'theme_mods_transport-lite-child', 'a:3:{i:0;b:0;s:18:\"nav_menu_locations\";a:0:{}s:18:\"custom_css_post_id\";i:-1;}', 'yes'),
(143, 'theme_switched', '', 'yes'),
(148, 'recently_activated', 'a:2:{s:79:\"custom-registration-form-builder-with-submission-manager/registration_magic.php\";i:1543401203;s:30:\"advanced-custom-fields/acf.php\";i:1543401133;}', 'yes'),
(149, 'acf_version', '5.7.7', 'yes'),
(151, 'rm_option_front_sub_page_id', '7', 'yes'),
(152, 'rm_option_front_login_page_id', '8', 'yes'),
(153, 'rm_option_inserted_sample_data', 'O:8:\"stdClass\":1:{s:5:\"forms\";a:2:{i:0;O:8:\"stdClass\":2:{s:7:\"form_id\";s:1:\"2\";s:9:\"form_type\";s:1:\"1\";}i:1;O:8:\"stdClass\":2:{s:7:\"form_id\";s:1:\"1\";s:9:\"form_type\";s:1:\"0\";}}}', 'no'),
(154, 'rm_option_install_date', '1543401148', 'no'),
(155, 'rm_option_install_type', 'basic', 'no'),
(156, 'rm_option_last_update_time', '1543401148', 'no'),
(157, 'rm_option_ex_chronos_db_version', '1', 'no'),
(158, 'rm_option_last_activation_time', '1543401149', 'no'),
(159, 'rm_option_db_version', '5.2', 'no'),
(160, 'widget_rm_otp_widget', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(161, 'widget_rm_form_widget', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(162, 'widget_rm_login_btn_widget', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(166, 'rm_option_automation_intro_time', '1543401150', 'no'),
(168, 'rm_option_rm_version', '4.1.1.0', 'yes'),
(170, 'rm_option_disable_login_popup', '1', 'no'),
(185, '_transient_is_multi_author', '0', 'yes'),
(252, '_site_transient_timeout_community-events-d41d8cd98f00b204e9800998ecf8427e', '1543853551', 'no'),
(253, '_site_transient_community-events-d41d8cd98f00b204e9800998ecf8427e', 'a:2:{s:8:\"location\";a:1:{s:2:\"ip\";b:0;}s:6:\"events\";a:0:{}}', 'no'),
(276, '_site_transient_timeout_theme_roots', '1543898814', 'no'),
(277, '_site_transient_theme_roots', 'a:5:{s:20:\"transport-lite-child\";s:7:\"/themes\";s:14:\"transport-lite\";s:7:\"/themes\";s:13:\"twentyfifteen\";s:7:\"/themes\";s:15:\"twentyseventeen\";s:7:\"/themes\";s:13:\"twentysixteen\";s:7:\"/themes\";}', 'no'),
(278, '_site_transient_update_plugins', 'O:8:\"stdClass\":5:{s:12:\"last_checked\";i:1543897017;s:7:\"checked\";a:2:{s:19:\"akismet/akismet.php\";s:5:\"4.0.8\";s:9:\"hello.php\";s:3:\"1.7\";}s:8:\"response\";a:1:{s:19:\"akismet/akismet.php\";O:8:\"stdClass\":12:{s:2:\"id\";s:21:\"w.org/plugins/akismet\";s:4:\"slug\";s:7:\"akismet\";s:6:\"plugin\";s:19:\"akismet/akismet.php\";s:11:\"new_version\";s:3:\"4.1\";s:3:\"url\";s:38:\"https://wordpress.org/plugins/akismet/\";s:7:\"package\";s:54:\"https://downloads.wordpress.org/plugin/akismet.4.1.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:59:\"https://ps.w.org/akismet/assets/icon-256x256.png?rev=969272\";s:2:\"1x\";s:59:\"https://ps.w.org/akismet/assets/icon-128x128.png?rev=969272\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:61:\"https://ps.w.org/akismet/assets/banner-772x250.jpg?rev=479904\";}s:11:\"banners_rtl\";a:0:{}s:6:\"tested\";s:3:\"5.0\";s:12:\"requires_php\";b:0;s:13:\"compatibility\";O:8:\"stdClass\":0:{}}}s:12:\"translations\";a:0:{}s:9:\"no_update\";a:1:{s:9:\"hello.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:25:\"w.org/plugins/hello-dolly\";s:4:\"slug\";s:11:\"hello-dolly\";s:6:\"plugin\";s:9:\"hello.php\";s:11:\"new_version\";s:3:\"1.6\";s:3:\"url\";s:42:\"https://wordpress.org/plugins/hello-dolly/\";s:7:\"package\";s:58:\"https://downloads.wordpress.org/plugin/hello-dolly.1.6.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:63:\"https://ps.w.org/hello-dolly/assets/icon-256x256.jpg?rev=969907\";s:2:\"1x\";s:63:\"https://ps.w.org/hello-dolly/assets/icon-128x128.jpg?rev=969907\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:65:\"https://ps.w.org/hello-dolly/assets/banner-772x250.png?rev=478342\";}s:11:\"banners_rtl\";a:0:{}}}}', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `wp_postmeta`
--

CREATE TABLE `wp_postmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_postmeta`
--

INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '_wp_page_template', 'default'),
(2, 3, '_wp_page_template', 'default');

-- --------------------------------------------------------

--
-- Table structure for table `wp_posts`
--

CREATE TABLE `wp_posts` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2018-11-28 09:59:21', '2018-11-28 09:59:21', 'Welcome to WordPress. This is your first post. Edit or delete it, then start writing!', 'Hello world!', '', 'publish', 'open', 'open', '', 'hello-world', '', '', '2018-11-28 09:59:21', '2018-11-28 09:59:21', '', 0, 'http://localhost/git-projects/Wordpress/Task/Bike/?p=1', 0, 'post', '', 1),
(2, 1, '2018-11-28 09:59:21', '2018-11-28 09:59:21', 'This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:\n\n<blockquote>Hi there! I\'m a bike messenger by day, aspiring actor by night, and this is my website. I live in Los Angeles, have a great dog named Jack, and I like pi&#241;a coladas. (And gettin\' caught in the rain.)</blockquote>\n\n...or something like this:\n\n<blockquote>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</blockquote>\n\nAs a new WordPress user, you should go to <a href=\"http://localhost/git-projects/Wordpress/Task/Bike/wp-admin/\">your dashboard</a> to delete this page and create new pages for your content. Have fun!', 'Sample Page', '', 'publish', 'closed', 'open', '', 'sample-page', '', '', '2018-11-28 09:59:21', '2018-11-28 09:59:21', '', 0, 'http://localhost/git-projects/Wordpress/Task/Bike/?page_id=2', 0, 'page', '', 0),
(3, 1, '2018-11-28 09:59:21', '2018-11-28 09:59:21', '<h2>Who we are</h2><p>Our website address is: http://localhost/git-projects/Wordpress/Task/Bike.</p><h2>What personal data we collect and why we collect it</h2><h3>Comments</h3><p>When visitors leave comments on the site we collect the data shown in the comments form, and also the visitor&#8217;s IP address and browser user agent string to help spam detection.</p><p>An anonymized string created from your email address (also called a hash) may be provided to the Gravatar service to see if you are using it. The Gravatar service privacy policy is available here: https://automattic.com/privacy/. After approval of your comment, your profile picture is visible to the public in the context of your comment.</p><h3>Media</h3><p>If you upload images to the website, you should avoid uploading images with embedded location data (EXIF GPS) included. Visitors to the website can download and extract any location data from images on the website.</p><h3>Contact forms</h3><h3>Cookies</h3><p>If you leave a comment on our site you may opt-in to saving your name, email address and website in cookies. These are for your convenience so that you do not have to fill in your details again when you leave another comment. These cookies will last for one year.</p><p>If you have an account and you log in to this site, we will set a temporary cookie to determine if your browser accepts cookies. This cookie contains no personal data and is discarded when you close your browser.</p><p>When you log in, we will also set up several cookies to save your login information and your screen display choices. Login cookies last for two days, and screen options cookies last for a year. If you select &quot;Remember Me&quot;, your login will persist for two weeks. If you log out of your account, the login cookies will be removed.</p><p>If you edit or publish an article, an additional cookie will be saved in your browser. This cookie includes no personal data and simply indicates the post ID of the article you just edited. It expires after 1 day.</p><h3>Embedded content from other websites</h3><p>Articles on this site may include embedded content (e.g. videos, images, articles, etc.). Embedded content from other websites behaves in the exact same way as if the visitor has visited the other website.</p><p>These websites may collect data about you, use cookies, embed additional third-party tracking, and monitor your interaction with that embedded content, including tracking your interaction with the embedded content if you have an account and are logged in to that website.</p><h3>Analytics</h3><h2>Who we share your data with</h2><h2>How long we retain your data</h2><p>If you leave a comment, the comment and its metadata are retained indefinitely. This is so we can recognize and approve any follow-up comments automatically instead of holding them in a moderation queue.</p><p>For users that register on our website (if any), we also store the personal information they provide in their user profile. All users can see, edit, or delete their personal information at any time (except they cannot change their username). Website administrators can also see and edit that information.</p><h2>What rights you have over your data</h2><p>If you have an account on this site, or have left comments, you can request to receive an exported file of the personal data we hold about you, including any data you have provided to us. You can also request that we erase any personal data we hold about you. This does not include any data we are obliged to keep for administrative, legal, or security purposes.</p><h2>Where we send your data</h2><p>Visitor comments may be checked through an automated spam detection service.</p><h2>Your contact information</h2><h2>Additional information</h2><h3>How we protect your data</h3><h3>What data breach procedures we have in place</h3><h3>What third parties we receive data from</h3><h3>What automated decision making and/or profiling we do with user data</h3><h3>Industry regulatory disclosure requirements</h3>', 'Privacy Policy', '', 'draft', 'closed', 'open', '', 'privacy-policy', '', '', '2018-11-28 09:59:21', '2018-11-28 09:59:21', '', 0, 'http://localhost/git-projects/Wordpress/Task/Bike/?page_id=3', 0, 'page', '', 0),
(4, 1, '2018-11-28 10:00:50', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'open', 'open', '', '', '', '', '2018-11-28 10:00:50', '0000-00-00 00:00:00', '', 0, 'http://localhost/git-projects/Wordpress/Task/Bike/?p=4', 0, 'post', '', 0),
(5, 1, '2018-11-28 10:31:15', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2018-11-28 10:31:15', '0000-00-00 00:00:00', '', 0, 'http://localhost/git-projects/Wordpress/Task/Bike/?post_type=acf-field-group&p=5', 0, 'acf-field-group', '', 0),
(6, 1, '2018-11-28 10:31:23', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2018-11-28 10:31:23', '0000-00-00 00:00:00', '', 0, 'http://localhost/git-projects/Wordpress/Task/Bike/?post_type=acf-field-group&p=6', 0, 'acf-field-group', '', 0),
(7, 1, '2018-11-28 10:32:26', '2018-11-28 10:32:26', '[RM_Front_Submissions]', 'Submissions', '', 'publish', 'closed', 'closed', '', 'rm_submissions', '', '', '2018-11-28 10:32:26', '2018-11-28 10:32:26', '', 0, 'http://localhost/git-projects/Wordpress/Task/Bike/rm_submissions/', 0, 'page', '', 0),
(8, 1, '2018-11-28 10:32:26', '2018-11-28 10:32:26', '[RM_Login]', 'Login', '', 'publish', 'closed', 'closed', '', 'rm_login', '', '', '2018-11-28 10:32:26', '2018-11-28 10:32:26', '', 0, 'http://localhost/git-projects/Wordpress/Task/Bike/rm_login/', 0, 'page', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_rm_fields`
--

CREATE TABLE `wp_rm_fields` (
  `field_id` int(6) UNSIGNED NOT NULL,
  `form_id` int(6) DEFAULT NULL,
  `page_no` int(6) UNSIGNED NOT NULL DEFAULT '1',
  `field_label` text COLLATE utf8mb4_unicode_ci,
  `field_type` text COLLATE utf8mb4_unicode_ci,
  `field_value` mediumtext COLLATE utf8mb4_unicode_ci,
  `field_order` int(6) DEFAULT NULL,
  `field_show_on_user_page` tinyint(1) DEFAULT NULL,
  `is_field_primary` tinyint(1) NOT NULL DEFAULT '0',
  `field_is_editable` tinyint(1) NOT NULL DEFAULT '0',
  `is_deletion_allowed` tinyint(1) NOT NULL DEFAULT '1',
  `field_options` mediumtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_rm_fields`
--

INSERT INTO `wp_rm_fields` (`field_id`, `form_id`, `page_no`, `field_label`, `field_type`, `field_value`, `field_order`, `field_show_on_user_page`, `is_field_primary`, `field_is_editable`, `is_deletion_allowed`, `field_options`) VALUES
(1, 1, 1, 'Your Email', 'Email', NULL, 2, NULL, 1, 0, 1, 'O:8:\"stdClass\":21:{s:18:\"field_is_multiline\";N;s:17:\"field_placeholder\";N;s:14:\"field_timezone\";N;s:16:\"field_max_length\";N;s:23:\"field_is_required_range\";N;s:27:\"field_is_required_max_range\";N;s:27:\"field_is_required_min_range\";N;s:24:\"field_is_required_scroll\";N;s:19:\"field_default_value\";N;s:15:\"field_css_class\";s:22:\"rm_form_default_fields\";s:22:\"field_textarea_columns\";N;s:19:\"field_textarea_rows\";N;s:17:\"field_is_required\";s:1:\"1\";s:21:\"field_is_show_asterix\";N;s:18:\"field_is_read_only\";N;s:21:\"field_is_other_option\";N;s:9:\"help_text\";s:73:\"Please enter an email address where we can send response to your message.\";s:4:\"icon\";O:8:\"stdClass\":5:{s:9:\"codepoint\";s:7:\"&#xe158\";s:8:\"fg_color\";s:6:\"000000\";s:8:\"bg_color\";s:6:\"FFFFFF\";s:5:\"shape\";s:6:\"square\";s:8:\"bg_alpha\";s:1:\"1\";}s:16:\"field_validation\";N;s:17:\"custom_validation\";N;s:12:\"tnc_cb_label\";N;}'),
(2, 1, 1, 'Your Name', 'Textbox', NULL, 0, 1, 0, 0, 1, 'O:8:\"stdClass\":21:{s:18:\"field_is_multiline\";N;s:17:\"field_placeholder\";s:0:\"\";s:14:\"field_timezone\";N;s:16:\"field_max_length\";s:0:\"\";s:23:\"field_is_required_range\";N;s:27:\"field_is_required_max_range\";s:0:\"\";s:27:\"field_is_required_min_range\";s:0:\"\";s:24:\"field_is_required_scroll\";N;s:19:\"field_default_value\";N;s:15:\"field_css_class\";s:0:\"\";s:22:\"field_textarea_columns\";N;s:19:\"field_textarea_rows\";N;s:17:\"field_is_required\";i:1;s:21:\"field_is_show_asterix\";N;s:18:\"field_is_read_only\";N;s:21:\"field_is_other_option\";s:0:\"\";s:9:\"help_text\";s:28:\"Please enter your full name.\";s:4:\"icon\";O:8:\"stdClass\":5:{s:9:\"codepoint\";s:7:\"&#xe7fd\";s:8:\"fg_color\";s:6:\"000000\";s:8:\"bg_color\";s:6:\"FFFFFF\";s:5:\"shape\";s:6:\"square\";s:8:\"bg_alpha\";s:1:\"1\";}s:16:\"field_validation\";s:0:\"\";s:17:\"custom_validation\";s:0:\"\";s:12:\"tnc_cb_label\";s:0:\"\";}'),
(3, 1, 1, 'Your Phone Number', 'Number', NULL, 1, 1, 0, 1, 1, 'O:8:\"stdClass\":21:{s:18:\"field_is_multiline\";N;s:17:\"field_placeholder\";N;s:14:\"field_timezone\";N;s:16:\"field_max_length\";s:2:\"14\";s:23:\"field_is_required_range\";N;s:27:\"field_is_required_max_range\";s:0:\"\";s:27:\"field_is_required_min_range\";s:0:\"\";s:24:\"field_is_required_scroll\";N;s:19:\"field_default_value\";N;s:15:\"field_css_class\";s:0:\"\";s:22:\"field_textarea_columns\";N;s:19:\"field_textarea_rows\";N;s:17:\"field_is_required\";N;s:21:\"field_is_show_asterix\";N;s:18:\"field_is_read_only\";N;s:21:\"field_is_other_option\";s:0:\"\";s:9:\"help_text\";s:43:\"Phone number can help us reach you quickly.\";s:4:\"icon\";O:8:\"stdClass\":5:{s:9:\"codepoint\";s:7:\"&#xe0b0\";s:8:\"fg_color\";s:6:\"000000\";s:8:\"bg_color\";s:6:\"FFFFFF\";s:5:\"shape\";s:6:\"square\";s:8:\"bg_alpha\";s:1:\"1\";}s:16:\"field_validation\";s:0:\"\";s:17:\"custom_validation\";s:0:\"\";s:12:\"tnc_cb_label\";s:0:\"\";}'),
(4, 1, 1, 'Message', 'Textarea', NULL, 3, NULL, 0, 0, 1, 'O:8:\"stdClass\":21:{s:18:\"field_is_multiline\";N;s:17:\"field_placeholder\";s:28:\"Type in your message here...\";s:14:\"field_timezone\";N;s:16:\"field_max_length\";s:0:\"\";s:23:\"field_is_required_range\";N;s:27:\"field_is_required_max_range\";s:0:\"\";s:27:\"field_is_required_min_range\";s:0:\"\";s:24:\"field_is_required_scroll\";N;s:19:\"field_default_value\";N;s:15:\"field_css_class\";s:0:\"\";s:22:\"field_textarea_columns\";s:0:\"\";s:19:\"field_textarea_rows\";s:0:\"\";s:17:\"field_is_required\";N;s:21:\"field_is_show_asterix\";N;s:18:\"field_is_read_only\";N;s:21:\"field_is_other_option\";s:0:\"\";s:9:\"help_text\";s:0:\"\";s:4:\"icon\";O:8:\"stdClass\":5:{s:9:\"codepoint\";s:7:\"&#xe0b7\";s:8:\"fg_color\";s:6:\"000000\";s:8:\"bg_color\";s:6:\"FFFFFF\";s:5:\"shape\";s:6:\"square\";s:8:\"bg_alpha\";s:1:\"1\";}s:16:\"field_validation\";s:0:\"\";s:17:\"custom_validation\";s:0:\"\";s:12:\"tnc_cb_label\";s:0:\"\";}'),
(5, 2, 1, 'Email', 'Email', NULL, 3, NULL, 1, 0, 1, 'O:8:\"stdClass\":21:{s:18:\"field_is_multiline\";N;s:17:\"field_placeholder\";N;s:14:\"field_timezone\";N;s:16:\"field_max_length\";N;s:23:\"field_is_required_range\";N;s:27:\"field_is_required_max_range\";N;s:27:\"field_is_required_min_range\";N;s:24:\"field_is_required_scroll\";N;s:19:\"field_default_value\";N;s:15:\"field_css_class\";s:22:\"rm_form_default_fields\";s:22:\"field_textarea_columns\";N;s:19:\"field_textarea_rows\";N;s:17:\"field_is_required\";s:1:\"1\";s:21:\"field_is_show_asterix\";N;s:18:\"field_is_read_only\";N;s:21:\"field_is_other_option\";N;s:9:\"help_text\";s:0:\"\";s:4:\"icon\";O:8:\"stdClass\":5:{s:9:\"codepoint\";s:7:\"&#xe0be\";s:8:\"fg_color\";s:6:\"000000\";s:8:\"bg_color\";s:6:\"FFFFFF\";s:5:\"shape\";s:6:\"square\";s:8:\"bg_alpha\";s:1:\"1\";}s:16:\"field_validation\";N;s:17:\"custom_validation\";N;s:12:\"tnc_cb_label\";N;}'),
(6, 2, 1, 'First Name', 'Fname', NULL, 1, NULL, 0, 0, 1, 'O:8:\"stdClass\":21:{s:18:\"field_is_multiline\";N;s:17:\"field_placeholder\";s:0:\"\";s:14:\"field_timezone\";N;s:16:\"field_max_length\";s:0:\"\";s:23:\"field_is_required_range\";N;s:27:\"field_is_required_max_range\";s:0:\"\";s:27:\"field_is_required_min_range\";s:0:\"\";s:24:\"field_is_required_scroll\";N;s:19:\"field_default_value\";N;s:15:\"field_css_class\";s:0:\"\";s:22:\"field_textarea_columns\";N;s:19:\"field_textarea_rows\";N;s:17:\"field_is_required\";i:1;s:21:\"field_is_show_asterix\";N;s:18:\"field_is_read_only\";N;s:21:\"field_is_other_option\";s:0:\"\";s:9:\"help_text\";s:0:\"\";s:4:\"icon\";O:8:\"stdClass\":5:{s:9:\"codepoint\";s:7:\"&#xe7fd\";s:8:\"fg_color\";s:6:\"000000\";s:8:\"bg_color\";s:6:\"FFFFFF\";s:5:\"shape\";s:6:\"square\";s:8:\"bg_alpha\";s:1:\"1\";}s:16:\"field_validation\";s:0:\"\";s:17:\"custom_validation\";s:0:\"\";s:12:\"tnc_cb_label\";s:0:\"\";}'),
(7, 2, 1, 'Last Name', 'Lname', NULL, 2, NULL, 0, 0, 1, 'O:8:\"stdClass\":21:{s:18:\"field_is_multiline\";N;s:17:\"field_placeholder\";s:0:\"\";s:14:\"field_timezone\";N;s:16:\"field_max_length\";s:0:\"\";s:23:\"field_is_required_range\";N;s:27:\"field_is_required_max_range\";s:0:\"\";s:27:\"field_is_required_min_range\";s:0:\"\";s:24:\"field_is_required_scroll\";N;s:19:\"field_default_value\";N;s:15:\"field_css_class\";s:0:\"\";s:22:\"field_textarea_columns\";N;s:19:\"field_textarea_rows\";N;s:17:\"field_is_required\";N;s:21:\"field_is_show_asterix\";N;s:18:\"field_is_read_only\";N;s:21:\"field_is_other_option\";s:0:\"\";s:9:\"help_text\";s:0:\"\";s:4:\"icon\";O:8:\"stdClass\":5:{s:9:\"codepoint\";s:7:\"&#xe7fd\";s:8:\"fg_color\";s:6:\"000000\";s:8:\"bg_color\";s:6:\"FFFFFF\";s:5:\"shape\";s:6:\"square\";s:8:\"bg_alpha\";s:1:\"1\";}s:16:\"field_validation\";s:0:\"\";s:17:\"custom_validation\";s:0:\"\";s:12:\"tnc_cb_label\";s:0:\"\";}'),
(8, 2, 1, 'Website', 'Website', NULL, 4, NULL, 0, 1, 1, 'O:8:\"stdClass\":21:{s:18:\"field_is_multiline\";N;s:17:\"field_placeholder\";N;s:14:\"field_timezone\";N;s:16:\"field_max_length\";N;s:23:\"field_is_required_range\";N;s:27:\"field_is_required_max_range\";s:0:\"\";s:27:\"field_is_required_min_range\";s:0:\"\";s:24:\"field_is_required_scroll\";N;s:19:\"field_default_value\";N;s:15:\"field_css_class\";s:0:\"\";s:22:\"field_textarea_columns\";N;s:19:\"field_textarea_rows\";N;s:17:\"field_is_required\";N;s:21:\"field_is_show_asterix\";N;s:18:\"field_is_read_only\";N;s:21:\"field_is_other_option\";s:0:\"\";s:9:\"help_text\";s:30:\"URL of your website (optional)\";s:4:\"icon\";O:8:\"stdClass\":5:{s:9:\"codepoint\";s:7:\"&#xe894\";s:8:\"fg_color\";s:6:\"000000\";s:8:\"bg_color\";s:6:\"FFFFFF\";s:5:\"shape\";s:6:\"square\";s:8:\"bg_alpha\";s:1:\"1\";}s:16:\"field_validation\";s:0:\"\";s:17:\"custom_validation\";s:0:\"\";s:12:\"tnc_cb_label\";s:0:\"\";}'),
(9, 2, 1, 'Do you agree with our terms and conditions?', 'Terms', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tempor metus nec elit auctor venenatis non facilisis nibh. In lorem neque, vulputate id metus id, rhoncus convallis eros. In urna erat, accumsan quis pretium nec, posuere in arcu. Nulla eleifend aliquet accumsan. Pellentesque consectetur sollicitudin orci nec suscipit. Donec sit amet risus suscipit, gravida nulla semper, interdum tellus. In cursus ultricies turpis, quis suscipit massa faucibus et. Vestibulum euismod est ac vehicula viverra. Aliquam quis est quis eros feugiat varius a non ligula.', 6, NULL, 0, 0, 1, 'O:8:\"stdClass\":21:{s:18:\"field_is_multiline\";N;s:17:\"field_placeholder\";N;s:14:\"field_timezone\";N;s:16:\"field_max_length\";N;s:23:\"field_is_required_range\";N;s:27:\"field_is_required_max_range\";s:0:\"\";s:27:\"field_is_required_min_range\";s:0:\"\";s:24:\"field_is_required_scroll\";N;s:19:\"field_default_value\";N;s:15:\"field_css_class\";s:0:\"\";s:22:\"field_textarea_columns\";N;s:19:\"field_textarea_rows\";N;s:17:\"field_is_required\";i:1;s:21:\"field_is_show_asterix\";N;s:18:\"field_is_read_only\";N;s:21:\"field_is_other_option\";s:0:\"\";s:9:\"help_text\";s:0:\"\";s:4:\"icon\";O:8:\"stdClass\":5:{s:9:\"codepoint\";s:0:\"\";s:8:\"fg_color\";s:6:\"000000\";s:8:\"bg_color\";s:6:\"FFFFFF\";s:5:\"shape\";s:6:\"square\";s:8:\"bg_alpha\";s:1:\"1\";}s:16:\"field_validation\";s:0:\"\";s:17:\"custom_validation\";s:0:\"\";s:12:\"tnc_cb_label\";s:13:\"Yes, I agree.\";}'),
(10, 2, 1, 'Divider', 'Divider', NULL, 0, NULL, 0, 0, 1, 'O:8:\"stdClass\":21:{s:18:\"field_is_multiline\";N;s:17:\"field_placeholder\";N;s:14:\"field_timezone\";N;s:16:\"field_max_length\";N;s:23:\"field_is_required_range\";N;s:27:\"field_is_required_max_range\";s:0:\"\";s:27:\"field_is_required_min_range\";s:0:\"\";s:24:\"field_is_required_scroll\";N;s:19:\"field_default_value\";N;s:15:\"field_css_class\";s:0:\"\";s:22:\"field_textarea_columns\";N;s:19:\"field_textarea_rows\";N;s:17:\"field_is_required\";N;s:21:\"field_is_show_asterix\";N;s:18:\"field_is_read_only\";N;s:21:\"field_is_other_option\";s:0:\"\";s:9:\"help_text\";s:0:\"\";s:4:\"icon\";O:8:\"stdClass\":5:{s:9:\"codepoint\";s:0:\"\";s:8:\"fg_color\";s:6:\"000000\";s:8:\"bg_color\";s:6:\"FFFFFF\";s:5:\"shape\";s:6:\"square\";s:8:\"bg_alpha\";s:1:\"1\";}s:16:\"field_validation\";s:0:\"\";s:17:\"custom_validation\";s:0:\"\";s:12:\"tnc_cb_label\";s:0:\"\";}'),
(11, 2, 1, 'Divider', 'Divider', NULL, 5, NULL, 0, 0, 1, 'O:8:\"stdClass\":21:{s:18:\"field_is_multiline\";N;s:17:\"field_placeholder\";N;s:14:\"field_timezone\";N;s:16:\"field_max_length\";N;s:23:\"field_is_required_range\";N;s:27:\"field_is_required_max_range\";s:0:\"\";s:27:\"field_is_required_min_range\";s:0:\"\";s:24:\"field_is_required_scroll\";N;s:19:\"field_default_value\";N;s:15:\"field_css_class\";s:0:\"\";s:22:\"field_textarea_columns\";N;s:19:\"field_textarea_rows\";N;s:17:\"field_is_required\";N;s:21:\"field_is_show_asterix\";N;s:18:\"field_is_read_only\";N;s:21:\"field_is_other_option\";s:0:\"\";s:9:\"help_text\";s:0:\"\";s:4:\"icon\";O:8:\"stdClass\":5:{s:9:\"codepoint\";s:0:\"\";s:8:\"fg_color\";s:6:\"000000\";s:8:\"bg_color\";s:6:\"FFFFFF\";s:5:\"shape\";s:6:\"square\";s:8:\"bg_alpha\";s:1:\"1\";}s:16:\"field_validation\";s:0:\"\";s:17:\"custom_validation\";s:0:\"\";s:12:\"tnc_cb_label\";s:0:\"\";}'),
(12, 2, 1, 'Divider', 'Divider', NULL, 7, NULL, 0, 0, 1, 'O:8:\"stdClass\":21:{s:18:\"field_is_multiline\";N;s:17:\"field_placeholder\";N;s:14:\"field_timezone\";N;s:16:\"field_max_length\";N;s:23:\"field_is_required_range\";N;s:27:\"field_is_required_max_range\";s:0:\"\";s:27:\"field_is_required_min_range\";s:0:\"\";s:24:\"field_is_required_scroll\";N;s:19:\"field_default_value\";N;s:15:\"field_css_class\";s:0:\"\";s:22:\"field_textarea_columns\";N;s:19:\"field_textarea_rows\";N;s:17:\"field_is_required\";N;s:21:\"field_is_show_asterix\";N;s:18:\"field_is_read_only\";N;s:21:\"field_is_other_option\";s:0:\"\";s:9:\"help_text\";s:0:\"\";s:4:\"icon\";O:8:\"stdClass\":5:{s:9:\"codepoint\";s:0:\"\";s:8:\"fg_color\";s:6:\"000000\";s:8:\"bg_color\";s:6:\"FFFFFF\";s:5:\"shape\";s:6:\"square\";s:8:\"bg_alpha\";s:1:\"1\";}s:16:\"field_validation\";s:0:\"\";s:17:\"custom_validation\";s:0:\"\";s:12:\"tnc_cb_label\";s:0:\"\";}');

-- --------------------------------------------------------

--
-- Table structure for table `wp_rm_forms`
--

CREATE TABLE `wp_rm_forms` (
  `form_id` int(6) UNSIGNED NOT NULL,
  `form_name` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_type` int(6) DEFAULT NULL,
  `form_user_role` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_user_role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_should_send_email` tinyint(1) DEFAULT NULL,
  `form_redirect` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_redirect_to_page` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_redirect_to_url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_should_auto_expire` tinyint(1) DEFAULT NULL,
  `form_options` text COLLATE utf8mb4_unicode_ci,
  `created_on` datetime DEFAULT NULL,
  `created_by` int(6) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  `modified_by` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_rm_forms`
--

INSERT INTO `wp_rm_forms` (`form_id`, `form_name`, `form_type`, `form_user_role`, `default_user_role`, `form_should_send_email`, `form_redirect`, `form_redirect_to_page`, `form_redirect_to_url`, `form_should_auto_expire`, `form_options`, `created_on`, `created_by`, `modified_on`, `modified_by`) VALUES
(1, 'Sample Contact Form', 0, NULL, NULL, 1, 'none', '0', NULL, NULL, 'O:8:\"stdClass\":59:{s:13:\"hide_username\";N;s:23:\"form_is_opt_in_checkbox\";N;s:19:\"mailchimp_relations\";N;s:16:\"form_opt_in_text\";N;s:21:\"form_should_user_pick\";N;s:20:\"form_is_unique_token\";N;s:16:\"form_description\";s:202:\"A standard contact form to get your started right away with RegistrationMagic. This form has Name, Phone No., Email and Message fields. To add this form to a page or post, use shortcode [rm_form ID=\"1\"]\";s:21:\"form_user_field_label\";N;s:16:\"form_custom_text\";s:45:\"Please fill out the form below to contact us.\";s:20:\"form_success_message\";s:69:\"Thank you! We have received your message and will reply back shortly.\";s:18:\"form_email_subject\";s:29:\"We have received your message\";s:18:\"form_email_content\";s:411:\"Dear {{Textbox_1234}},\r\n\r\nThis is a confirmation of the message you submitted through our site. We shall get back to you soon.\r\n\r\nFor your reference, below is a copy of your message. If any information is incorrect, please submit the form again with correct information.\r\n\r\nThank you!\r\n\r\nYour Name: {{Textbox_1234}}\r\n\r\nYour Phone: {{Number_1235}}\r\n\r\nYour Email: {{Email_1233}}\r\n\r\nMessage: {{Textarea_1236}}\";s:21:\"form_submit_btn_label\";s:4:\"Send\";s:21:\"form_submit_btn_color\";N;s:25:\"form_submit_btn_bck_color\";N;s:15:\"form_expired_by\";N;s:22:\"form_submissions_limit\";N;s:16:\"form_expiry_date\";N;s:25:\"form_message_after_expiry\";N;s:14:\"mailchimp_list\";N;s:22:\"mailchimp_mapped_email\";N;s:27:\"mailchimp_mapped_first_name\";N;s:26:\"mailchimp_mapped_last_name\";N;s:25:\"should_export_submissions\";i:0;s:25:\"export_submissions_to_url\";N;s:10:\"form_pages\";N;s:14:\"access_control\";N;s:14:\"style_btnfield\";N;s:10:\"style_form\";N;s:15:\"style_textfield\";N;s:10:\"auto_login\";N;s:12:\"cc_relations\";N;s:7:\"cc_list\";N;s:19:\"form_opt_in_text_cc\";N;s:26:\"form_is_opt_in_checkbox_cc\";N;s:12:\"aw_relations\";N;s:7:\"aw_list\";N;s:19:\"form_opt_in_text_aw\";N;s:26:\"form_is_opt_in_checkbox_aw\";N;s:14:\"enable_captcha\";s:7:\"default\";s:16:\"enable_mailchimp\";N;s:15:\"enable_ccontact\";N;s:13:\"enable_aweber\";N;s:20:\"display_progress_bar\";s:7:\"default\";s:18:\"sub_limit_antispam\";N;s:15:\"placeholder_css\";N;s:15:\"btn_hover_color\";N;s:20:\"field_bg_focus_color\";N;s:16:\"text_focus_color\";N;s:13:\"style_section\";N;s:11:\"style_label\";N;s:18:\"post_expiry_action\";N;s:19:\"post_expiry_form_id\";N;s:14:\"no_prev_button\";i:1;s:18:\"user_auto_approval\";s:7:\"default\";s:25:\"form_opt_in_default_state\";N;s:28:\"form_opt_in_default_state_cc\";N;s:28:\"form_opt_in_default_state_aw\";N;s:18:\"ordered_form_pages\";N;}', '2016-12-15 06:31:04', 1, '2016-12-15 06:51:04', 1),
(2, 'Sample Registration Form', 1, 'a:0:{}', 'subscriber', 1, 'none', '0', NULL, NULL, 'O:8:\"stdClass\":59:{s:13:\"hide_username\";i:0;s:23:\"form_is_opt_in_checkbox\";N;s:19:\"mailchimp_relations\";N;s:16:\"form_opt_in_text\";N;s:21:\"form_should_user_pick\";N;s:20:\"form_is_unique_token\";N;s:16:\"form_description\";s:415:\"This is a sample registration form that can be used to register users on your WordPress site. The form includes Username, Password, First Name, Last Name, Email, Website and Terms and Conditions fields. Feel free to edit them, remove them or add new ones as it suits your needs.\r\n\r\nPlease note, T&C field currently has dummy text. You will need to paste actual text of your terms and condition by editing the field.\";s:21:\"form_user_field_label\";s:0:\"\";s:16:\"form_custom_text\";s:48:\"Register with us by filling out the form below.\";s:20:\"form_success_message\";s:105:\"Thank you for registering with us! Once your account is active, we\'ll send you an email with the details.\";s:18:\"form_email_subject\";s:10:\"Thank you!\";s:18:\"form_email_content\";s:183:\"Hello {{Fname_1238}},\r\n\r\nThank you for registering with us. You will soon receive an account activation email. After that you can log into our website through login page.\r\n\r\nRegards.\";s:21:\"form_submit_btn_label\";s:0:\"\";s:21:\"form_submit_btn_color\";N;s:25:\"form_submit_btn_bck_color\";N;s:15:\"form_expired_by\";N;s:22:\"form_submissions_limit\";N;s:16:\"form_expiry_date\";N;s:25:\"form_message_after_expiry\";N;s:14:\"mailchimp_list\";N;s:22:\"mailchimp_mapped_email\";N;s:27:\"mailchimp_mapped_first_name\";N;s:26:\"mailchimp_mapped_last_name\";N;s:25:\"should_export_submissions\";i:0;s:25:\"export_submissions_to_url\";N;s:10:\"form_pages\";N;s:14:\"access_control\";N;s:14:\"style_btnfield\";s:0:\"\";s:10:\"style_form\";s:0:\"\";s:15:\"style_textfield\";s:0:\"\";s:10:\"auto_login\";N;s:12:\"cc_relations\";N;s:7:\"cc_list\";N;s:19:\"form_opt_in_text_cc\";N;s:26:\"form_is_opt_in_checkbox_cc\";N;s:12:\"aw_relations\";N;s:7:\"aw_list\";N;s:19:\"form_opt_in_text_aw\";N;s:26:\"form_is_opt_in_checkbox_aw\";N;s:14:\"enable_captcha\";s:7:\"default\";s:16:\"enable_mailchimp\";N;s:15:\"enable_ccontact\";N;s:13:\"enable_aweber\";N;s:20:\"display_progress_bar\";s:7:\"default\";s:18:\"sub_limit_antispam\";N;s:15:\"placeholder_css\";s:0:\"\";s:15:\"btn_hover_color\";s:0:\"\";s:20:\"field_bg_focus_color\";s:0:\"\";s:16:\"text_focus_color\";s:0:\"\";s:13:\"style_section\";s:0:\"\";s:11:\"style_label\";s:0:\"\";s:18:\"post_expiry_action\";N;s:19:\"post_expiry_form_id\";N;s:14:\"no_prev_button\";i:1;s:18:\"user_auto_approval\";s:7:\"default\";s:25:\"form_opt_in_default_state\";N;s:28:\"form_opt_in_default_state_cc\";N;s:28:\"form_opt_in_default_state_aw\";N;s:18:\"ordered_form_pages\";N;}', '2016-12-15 07:19:35', 1, '2016-12-15 09:16:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wp_rm_front_users`
--

CREATE TABLE `wp_rm_front_users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity_time` datetime DEFAULT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_rm_login`
--

CREATE TABLE `wp_rm_login` (
  `id` int(6) UNSIGNED NOT NULL,
  `m_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_rm_login`
--

INSERT INTO `wp_rm_login` (`id`, `m_key`, `value`) VALUES
(1, 'fields', '{\"form_fields\":[{\"username_accepts\":\"username\",\"field_label\":\"Username\",\"placeholder\":\"Enter Username\",\"input_selected_icon_codepoint\":\"\",\"icon_fg_color\":\"CBFFC2\",\"icon_bg_color\":\"FFFFFF\",\"icon_bg_alpha\":\"0.5\",\"icon_shape\":\"square\",\"field_css_class\":\"\",\"field_type\":\"username\"},{\"field_label\":\"Password\",\"placeholder\":\"Enter Password\",\"input_selected_icon_codepoint\":\"\",\"icon_fg_color\":\"FFFFFF\",\"icon_bg_color\":\"FFFFFF\",\"icon_bg_alpha\":\"0.5\",\"icon_shape\":\"square\",\"field_css_class\":\"test\",\"field_type\":\"password\"}]}'),
(2, 'redirections', '{\"redirection_type\":\"common\",\"redirection_link\":\"\",\"admin_redirection_link\":0,\"logout_redirection\":\"\",\"role_based_login_redirection\":[],\"administrator_login_redirection\":\"\",\"administrator_logout_redirection\":\"\",\"editor_login_redirection\":\"\",\"editor_logout_redirection\":\"\",\"author_login_redirection\":\"\",\"author_logout_redirection\":\"\",\"contributor_login_redirection\":\"\",\"contributor_logout_redirection\":\"\",\"subscriber_login_redirection\":\"\",\"subscriber_logout_redirection\":\"\",\"translator_login_redirection\":\"\",\"translator_logout_redirection\":\"\",\"customer_login_redirection\":\"\",\"customer_logout_redirection\":\"\"}'),
(3, 'validations', '{\"un_error_msg\":\"The login credentials you entered are incorrect. Please try again.\",\"pass_error_msg\":\"The login credentials you entered are incorrect. Please try again.\",\"en_recovery_link\":1,\"en_failed_user_notification\":0,\"en_failed_admin_notification\":0,\"en_captcha\":0,\"allowed_failed_attempts\":3,\"allowed_failed_duration\":60,\"en_ban_ip\":0,\"allowed_attempts_before_ban\":6,\"allowed_duration_before_ban\":60,\"ban_type\":\"temp\",\"ban_duration\":1440,\"ban_error_msg\":\"<div style=\\\"font-weight: 400;\\\" class=\\\"rm-failed-ip-error\\\">Your IP has been banned by the Admin due to repeated failed login attempts.<\\/div>\",\"notify_admin_on_ban\":1}'),
(4, 'recovery', '{\"en_pwd_recovery\":1,\"recovery_link_text\":\"Lost your password?\"}'),
(5, 'auth', '{\"otp_type\":\"numeric\",\"en_two_fa\":0,\"otp_length\":6,\"otp_expiry_action\":\"regenerate\",\"otp_expiry\":10,\"otp_regen_success_msg\":\"A new OTP was successfully sent to your email address!\",\"otp_regen_text\":\"Re-generate OTP\",\"otp_exp_msg\":\"Sorry, your OTP has expired. You can re-generate OTP using link below.\",\"otp_exp_restart_msg\":\"Sorry, your OTP has expired. You need to login again to proceed.\",\"otp_field_label\":\"Enter Your OTP\",\"msg_above_otp\":\"We emailed you a one-time-password (OTP) to your registered email address. Please enter it below to complete the login process.\",\"en_resend_otp\":1,\"otp_resend_text\":\"Did not received OTP? Resend it\",\"otp_resent_msg\":\"OTP was resent successfully to your email address!\",\"otp_resend_limit\":\"3\",\"allowed_incorrect_attempts\":5,\"invalid_otp_error\":\"The OTP you entered is incorrect.\",\"apply_on\":\"all\",\"disable_two_fa_for_admin\":1,\"enable_two_fa_for_roles\":[]}'),
(6, 'email_templates', '{\"failed_login_err\":\"<span style=\\\"font-weight: 400;\\\">There was a failed login attempt using your account username\\/ password {{username}} on our site {{sitename}} from IP {{Login_IP}} on {{login_time}}. If you have forgotten your password, you can easily reset it by visiting login page on our site. <\\/span>\\r\\n\\r\\n&nbsp;\\r\\n\\r\\n<span style=\\\"font-weight: 400;\\\">If you think it was an unauthorized login attempt, please contact site admin immediately.<\\/span>\",\"otp_message\":\"<span style=\\\"font-weight: 400;\\\">Here is your one-time-password (OTP) for logging into {{site_name}}. The OTP will automatically expire after {{OTP_expiry}} minutes.<\\/span>\\r\\n\\r\\n&nbsp;\\r\\n\\r\\n<span style=\\\"font-weight: 400;\\\">{{OTP}}<\\/span>\\r\\n\\r\\n&nbsp;\\r\\n\\r\\n<span style=\\\"font-weight: 400;\\\">If you think it was an unauthorized login attempt, please contact site admin immediately. <\\/span>\\r\\n\\r\\n&nbsp;\\r\\n\\r\\n<span style=\\\"font-weight: 400;\\\"><\\/span>\",\"failed_login_err_admin\":\"<span style=\\\"font-weight: 400;\\\">There was a failed login attempt using username\\/ password {{username}} on your site {{sitename}} from IP {{Login_IP}} on {{login_time}}.<\\/span>\\r\\n\\r\\n&nbsp;\\r\\n\\r\\n<span style=\\\"font-weight: 400;\\\">If you think this is an unauthorized login attempt<\\/span><i><span style=\\\"font-weight: 400;\\\">, <\\/span><\\/i><span style=\\\"font-weight: 400;\\\">you can also immediately ban the IP by clicking <\\/span><span style=\\\"font-weight: 400;\\\"><a href=\\\"http://localhost/git-projects/Wordpress/Task/Bike/wp-admin/admin.php?page=rm_options_security\\\">here</a><\\/span><span style=\\\"font-weight: 400;\\\">. <\\/span>\\r\\n\\r\\n<span style=\\\"font-weight: 400;\\\">You can managed the blocked IPs and\\/ or usernames by visiting <\\/span><span style=\\\"font-weight: 400;\\\"><a href=\\\"http://localhost/git-projects/Wordpress/Task/Bike/wp-admin/admin.php?page=rm_options_security\\\">this link</a><\\/span> <i><span style=\\\"font-weight: 400;\\\">Global Settings \\u2192 Security page link<\\/span><\\/i>\",\"ban_message_admin\":\"<span style=\\\"font-weight: 400;\\\">There were multiple failed login attempts from IP {{login_IP}}. As a preset security measure, RegistrationMagic has blocked the IP. Here are the details of the ban:<\\/span>\\r\\n\\r\\n&nbsp;\\r\\n\\r\\n<span style=\\\"font-weight: 400;\\\">Ban Period: {{ban_period}}<\\/span>\\r\\n\\r\\n<span style=\\\"font-weight: 400;\\\">Failed Login Attempts: {{ban_trigger}}<\\/span>\\r\\n\\r\\n<span style=\\\"font-weight: 400;\\\">If you think this IP is secure, you can lift the ban by clicking <\\/span><span style=\\\"font-weight: 400;\\\"><a href=\\\"http://localhost/git-projects/Wordpress/Task/Bike/wp-admin/admin.php?page=rm_options_security\\\">here</a><\\/span><span style=\\\"font-weight: 400;\\\">. <\\/span>\\r\\n\\r\\n<span style=\\\"font-weight: 400;\\\">You can managed the blocked IPs and\\/ or usernames by visiting <\\/span><span style=\\\"font-weight: 400;\\\"><a href=\\\"http://localhost/git-projects/Wordpress/Task/Bike/wp-admin/admin.php?page=rm_options_security\\\">this link</a><\\/span> <i><span style=\\\"font-weight: 400;\\\">Global Settings \\u2192 Security page link<\\/span><\\/i>\"}'),
(7, 'btn_config', '{\"register_btn\":\"Register\",\"login_btn\":\"Login\",\"align\":\"center\",\"display_register\":0}'),
(8, 'design', '{\"style_form\":\"\",\"style_textfield\":\"\",\"style_btnfield\":\"\",\"form_submit_btn_label\":\"Submit\",\"style_section\":\"\",\"form_id\":\"login\",\"placeholder_css\":\"\"}'),
(9, 'login_view', '{\"display_user_avatar\":1,\"display_user_name\":1,\"display_greetings\":1,\"greetings_text\":\"Welcome\",\"display_custom_msg\":1,\"custom_msg\":\"You are already logged in.\",\"separator_bar_color\":\"DDDDDD\",\"display_account_link\":1,\"account_link_text\":\"My Account\",\"display_logout_link\":1,\"logout_text\":\"Logout\"}'),
(10, 'log_retention', '{\"logs_retention\":\"records\",\"no_of_records\":1000,\"no_of_days\":7}');

-- --------------------------------------------------------

--
-- Table structure for table `wp_rm_login_log`
--

CREATE TABLE `wp_rm_login_log` (
  `id` int(6) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username_used` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ban` int(1) DEFAULT NULL,
  `result` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `failure_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ban_til` datetime DEFAULT NULL,
  `login_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_rm_notes`
--

CREATE TABLE `wp_rm_notes` (
  `note_id` int(11) NOT NULL,
  `submission_id` int(11) NOT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publication_date` datetime NOT NULL,
  `published_by` bigint(20) DEFAULT NULL,
  `last_edit_date` datetime DEFAULT NULL,
  `last_edited_by` bigint(20) DEFAULT NULL,
  `note_options` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_rm_paypal_fields`
--

CREATE TABLE `wp_rm_paypal_fields` (
  `field_id` int(6) UNSIGNED NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci,
  `class` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_label` longtext COLLATE utf8mb4_unicode_ci,
  `option_price` longtext COLLATE utf8mb4_unicode_ci,
  `option_value` longtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `require` longtext COLLATE utf8mb4_unicode_ci,
  `order` int(11) DEFAULT NULL,
  `extra_options` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_rm_paypal_logs`
--

CREATE TABLE `wp_rm_paypal_logs` (
  `id` int(6) UNSIGNED NOT NULL,
  `submission_id` int(6) DEFAULT NULL,
  `form_id` int(6) DEFAULT NULL,
  `invoice` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `txn_id` varchar(600) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `currency` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `log` longtext COLLATE utf8mb4_unicode_ci,
  `posted_date` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_proc` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill` longtext COLLATE utf8mb4_unicode_ci,
  `ex_data` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_rm_rules`
--

CREATE TABLE `wp_rm_rules` (
  `rule_id` int(6) UNSIGNED NOT NULL,
  `type` int(6) DEFAULT NULL,
  `attr_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attr_value` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operator` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_rm_sent_mails`
--

CREATE TABLE `wp_rm_sent_mails` (
  `mail_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub` longtext COLLATE utf8mb4_unicode_ci,
  `body` longtext COLLATE utf8mb4_unicode_ci,
  `sent_on` datetime DEFAULT NULL,
  `headers` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_id` int(11) DEFAULT NULL,
  `exdata` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read_by_user` tinyint(1) NOT NULL DEFAULT '0',
  `was_sent_success` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_rm_sessions`
--

CREATE TABLE `wp_rm_sessions` (
  `id` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_rm_sessions`
--

INSERT INTO `wp_rm_sessions` (`id`, `data`, `timestamp`) VALUES
('5fmrimtvmv5fjhjn9j3u5i5dkv', '', 1543401153),
('9sadvb6m73kmavlcsidqnbt8jr', '', 1543401203),
('dnqtb4i0kf9dgmn0od54rvf9g9', '', 1543401170),
('h8laa5rhg110hc131i2nm5eq6s', '', 1543401165),
('hkvqtl8uemud457u4eabibadqq', '', 1543401178),
('orceno7g8gboet582qgnibakv6', '', 1543401160),
('ri96v0kgo49rmnhepuu7c7jr7m', '', 1543401150),
('ufqnd77hlc0eqsnkl5rblpq5lv', '', 1543401195),
('vb8cmto03h2vm2d04ev8v8hbsv', '', 1543401203);

-- --------------------------------------------------------

--
-- Table structure for table `wp_rm_stats`
--

CREATE TABLE `wp_rm_stats` (
  `stat_id` int(11) NOT NULL,
  `form_id` int(6) DEFAULT NULL,
  `user_ip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ua_string` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visited_on` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submitted_on` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_taken` int(11) DEFAULT NULL,
  `submission_id` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_rm_submissions`
--

CREATE TABLE `wp_rm_submissions` (
  `submission_id` int(6) UNSIGNED NOT NULL,
  `form_id` int(6) DEFAULT NULL,
  `data` text COLLATE utf8mb4_unicode_ci,
  `user_email` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `child_id` int(6) NOT NULL DEFAULT '0',
  `last_child` int(6) NOT NULL DEFAULT '0',
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `submitted_on` datetime DEFAULT NULL,
  `unique_token` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_rm_submission_fields`
--

CREATE TABLE `wp_rm_submission_fields` (
  `sub_field_id` int(6) UNSIGNED NOT NULL,
  `submission_id` int(6) DEFAULT NULL,
  `field_id` int(6) DEFAULT NULL,
  `form_id` int(6) DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_rm_tasks`
--

CREATE TABLE `wp_rm_tasks` (
  `task_id` int(6) UNSIGNED NOT NULL,
  `form_id` int(6) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `must_rules` text COLLATE utf8mb4_unicode_ci,
  `any_rules` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) DEFAULT '1',
  `actions` text COLLATE utf8mb4_unicode_ci,
  `task_order` int(6) DEFAULT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_rm_task_exe_log`
--

CREATE TABLE `wp_rm_task_exe_log` (
  `texe_log_id` int(6) UNSIGNED NOT NULL,
  `task_id` int(6) DEFAULT NULL,
  `action` int(6) DEFAULT NULL,
  `sub_ids` longtext COLLATE utf8mb4_unicode_ci,
  `user_ids` longtext COLLATE utf8mb4_unicode_ci,
  `meta` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_termmeta`
--

CREATE TABLE `wp_termmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_terms`
--

CREATE TABLE `wp_terms` (
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_terms`
--

INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Uncategorized', 'uncategorized', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_relationships`
--

CREATE TABLE `wp_term_relationships` (
  `object_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_term_relationships`
--

INSERT INTO `wp_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_taxonomy`
--

CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_term_taxonomy`
--

INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wp_usermeta`
--

CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_usermeta`
--

INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'nickname', 'admin'),
(2, 1, 'first_name', ''),
(3, 1, 'last_name', ''),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'syntax_highlighting', 'true'),
(7, 1, 'comment_shortcuts', 'false'),
(8, 1, 'admin_color', 'fresh'),
(9, 1, 'use_ssl', '0'),
(10, 1, 'show_admin_bar_front', 'true'),
(11, 1, 'locale', ''),
(12, 1, 'wp_capabilities', 'a:1:{s:13:\"administrator\";b:1;}'),
(13, 1, 'wp_user_level', '10'),
(14, 1, 'dismissed_wp_pointers', 'wp496_privacy,theme_editor_notice'),
(15, 1, 'show_welcome_panel', '1'),
(16, 1, 'session_tokens', 'a:3:{s:64:\"c46100b0c1a6b20c8a7524500271a8f7935759980d25068dd6b0764881531ff2\";a:4:{s:10:\"expiration\";i:1543940957;s:2:\"ip\";s:3:\"::1\";s:2:\"ua\";s:114:\"Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.110 Safari/537.36\";s:5:\"login\";i:1543768157;}s:64:\"eba604532deae81db2ed2a5979dd13c0fb3d80bf06164d61506fad64b1a615ae\";a:4:{s:10:\"expiration\";i:1543983144;s:2:\"ip\";s:3:\"::1\";s:2:\"ua\";s:114:\"Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.110 Safari/537.36\";s:5:\"login\";i:1543810344;}s:64:\"971a9a53c6c418cc0c565d82b98a27cf7c4174675c1d3ac835488c5f47bdba3e\";a:4:{s:10:\"expiration\";i:1545051969;s:2:\"ip\";s:3:\"::1\";s:2:\"ua\";s:104:\"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36\";s:5:\"login\";i:1543842369;}}'),
(17, 1, 'wp_dashboard_quick_press_last_post_id', '4');

-- --------------------------------------------------------

--
-- Table structure for table `wp_users`
--

CREATE TABLE `wp_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_users`
--

INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'admin', '$P$B1cJLyyT0g2L8p2tcJLLWQhheGRkpY1', 'admin', 'jatinder.symbensoft@gmail.com', '', '2018-11-28 09:59:20', '', 0, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `wp_vendor`
--

CREATE TABLE `wp_vendor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp_bike`
--
ALTER TABLE `wp_bike`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_comments`
--
ALTER TABLE `wp_comments`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `comment_post_ID` (`comment_post_ID`),
  ADD KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  ADD KEY `comment_date_gmt` (`comment_date_gmt`),
  ADD KEY `comment_parent` (`comment_parent`),
  ADD KEY `comment_author_email` (`comment_author_email`(10));

--
-- Indexes for table `wp_links`
--
ALTER TABLE `wp_links`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `link_visible` (`link_visible`);

--
-- Indexes for table `wp_options`
--
ALTER TABLE `wp_options`
  ADD PRIMARY KEY (`option_id`),
  ADD UNIQUE KEY `option_name` (`option_name`);

--
-- Indexes for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_posts`
--
ALTER TABLE `wp_posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  ADD KEY `post_parent` (`post_parent`),
  ADD KEY `post_author` (`post_author`);

--
-- Indexes for table `wp_rm_fields`
--
ALTER TABLE `wp_rm_fields`
  ADD PRIMARY KEY (`field_id`);

--
-- Indexes for table `wp_rm_forms`
--
ALTER TABLE `wp_rm_forms`
  ADD PRIMARY KEY (`form_id`);

--
-- Indexes for table `wp_rm_front_users`
--
ALTER TABLE `wp_rm_front_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_rm_login`
--
ALTER TABLE `wp_rm_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_rm_login_log`
--
ALTER TABLE `wp_rm_login_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_rm_notes`
--
ALTER TABLE `wp_rm_notes`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `wp_rm_paypal_fields`
--
ALTER TABLE `wp_rm_paypal_fields`
  ADD PRIMARY KEY (`field_id`);

--
-- Indexes for table `wp_rm_paypal_logs`
--
ALTER TABLE `wp_rm_paypal_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_rm_rules`
--
ALTER TABLE `wp_rm_rules`
  ADD PRIMARY KEY (`rule_id`);

--
-- Indexes for table `wp_rm_sent_mails`
--
ALTER TABLE `wp_rm_sent_mails`
  ADD PRIMARY KEY (`mail_id`);

--
-- Indexes for table `wp_rm_sessions`
--
ALTER TABLE `wp_rm_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_rm_stats`
--
ALTER TABLE `wp_rm_stats`
  ADD PRIMARY KEY (`stat_id`);

--
-- Indexes for table `wp_rm_submissions`
--
ALTER TABLE `wp_rm_submissions`
  ADD PRIMARY KEY (`submission_id`);

--
-- Indexes for table `wp_rm_submission_fields`
--
ALTER TABLE `wp_rm_submission_fields`
  ADD PRIMARY KEY (`sub_field_id`);

--
-- Indexes for table `wp_rm_tasks`
--
ALTER TABLE `wp_rm_tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `wp_rm_task_exe_log`
--
ALTER TABLE `wp_rm_task_exe_log`
  ADD PRIMARY KEY (`texe_log_id`);

--
-- Indexes for table `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_terms`
--
ALTER TABLE `wp_terms`
  ADD PRIMARY KEY (`term_id`),
  ADD KEY `slug` (`slug`(191)),
  ADD KEY `name` (`name`(191));

--
-- Indexes for table `wp_term_relationships`
--
ALTER TABLE `wp_term_relationships`
  ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- Indexes for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  ADD PRIMARY KEY (`term_taxonomy_id`),
  ADD UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  ADD KEY `taxonomy` (`taxonomy`);

--
-- Indexes for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  ADD PRIMARY KEY (`umeta_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_users`
--
ALTER TABLE `wp_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wp_bike`
--
ALTER TABLE `wp_bike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_comments`
--
ALTER TABLE `wp_comments`
  MODIFY `comment_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wp_links`
--
ALTER TABLE `wp_links`
  MODIFY `link_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_options`
--
ALTER TABLE `wp_options`
  MODIFY `option_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;
--
-- AUTO_INCREMENT for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `wp_posts`
--
ALTER TABLE `wp_posts`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `wp_rm_fields`
--
ALTER TABLE `wp_rm_fields`
  MODIFY `field_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `wp_rm_forms`
--
ALTER TABLE `wp_rm_forms`
  MODIFY `form_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `wp_rm_front_users`
--
ALTER TABLE `wp_rm_front_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_rm_login`
--
ALTER TABLE `wp_rm_login`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `wp_rm_login_log`
--
ALTER TABLE `wp_rm_login_log`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_rm_notes`
--
ALTER TABLE `wp_rm_notes`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_rm_paypal_fields`
--
ALTER TABLE `wp_rm_paypal_fields`
  MODIFY `field_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_rm_paypal_logs`
--
ALTER TABLE `wp_rm_paypal_logs`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_rm_rules`
--
ALTER TABLE `wp_rm_rules`
  MODIFY `rule_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_rm_sent_mails`
--
ALTER TABLE `wp_rm_sent_mails`
  MODIFY `mail_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_rm_stats`
--
ALTER TABLE `wp_rm_stats`
  MODIFY `stat_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_rm_submissions`
--
ALTER TABLE `wp_rm_submissions`
  MODIFY `submission_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_rm_submission_fields`
--
ALTER TABLE `wp_rm_submission_fields`
  MODIFY `sub_field_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_rm_tasks`
--
ALTER TABLE `wp_rm_tasks`
  MODIFY `task_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_rm_task_exe_log`
--
ALTER TABLE `wp_rm_task_exe_log`
  MODIFY `texe_log_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_terms`
--
ALTER TABLE `wp_terms`
  MODIFY `term_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  MODIFY `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  MODIFY `umeta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `wp_users`
--
ALTER TABLE `wp_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
