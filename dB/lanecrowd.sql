-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 15, 2020 at 06:29 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lanecrowd`
--

-- --------------------------------------------------------

--
-- Table structure for table `album_`
--

CREATE TABLE `album_` (
  `album_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `album_desc` varchar(1000) NOT NULL,
  `images_path` text NOT NULL,
  `added_on` varchar(50) DEFAULT NULL,
  `tag_with` varchar(1000) DEFAULT NULL,
  `album_title` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album_`
--

INSERT INTO `album_` (`album_id`, `user_id`, `album_desc`, `images_path`, `added_on`, `tag_with`, `album_title`) VALUES
(1, 2, ' sds', 'assets/uploads/album/Album-image-2019-12-24-08-04-240.png,assets/uploads/album/Album-image-2019-12-24-08-04-241.png,assets/uploads/album/Album-image-2019-12-24-08-04-242.png,assets/uploads/album/Album-image-2019-12-24-08-04-243.jpg,assets/uploads/album/Album-image-2019-12-24-08-04-244.png', '24-12-2019 08:04:24', '1', 'album1'),
(2, 9, ' Test Album Description', 'assets/uploads/album/Album-image-2019-12-27-08-33-400.png,assets/uploads/album/Album-image-2019-12-27-08-33-401.png,assets/uploads/album/Album-image-2019-12-27-08-33-402.png,assets/uploads/album/Album-image-2019-12-27-08-33-403.png,assets/uploads/album/Album-image-2019-12-27-08-33-404.png,assets/uploads/album/Album-image-2019-12-27-08-33-405.png,assets/uploads/album/Album-image-2019-12-27-08-33-406.png,assets/uploads/album/Album-image-2019-12-27-08-33-407.png,assets/uploads/album/Album-image-2019-12-27-08-33-408.png,assets/uploads/album/Album-image-2019-12-27-08-33-409.png,assets/uploads/album/Album-image-2019-12-27-08-33-4010.png,assets/uploads/album/Album-image-2019-12-27-08-33-4011.png,assets/uploads/album/Album-image-2019-12-27-08-33-4012.png,assets/uploads/album/Album-image-2019-12-27-08-33-4113.png,assets/uploads/album/Album-image-2019-12-27-08-33-4114.png', '27-12-2019 08:33:41', '1', 'Test Album'),
(6, 10, ' Test Album Description', 'assets/uploads/album/Album-image-2020-01-11-06-38-140.gif,assets/uploads/album/Album-image-2020-01-11-06-38-141.gif,assets/uploads/album/Album-image-2020-01-11-06-38-142.gif,assets/uploads/album/Album-image-2020-01-11-06-38-143.gif,assets/uploads/album/Album-image-2020-01-11-06-38-144.png,assets/uploads/album/Album-image-2020-01-11-06-38-145.png', '11-01-2020 06:38:14', '1', 'Test Album'),
(7, 10, ' Another Album Description', 'assets/uploads/album/Album-image-2020-01-11-07-13-360.png,assets/uploads/album/Album-image-2020-01-11-07-13-361.png,assets/uploads/album/Album-image-2020-01-11-07-13-362.png,assets/uploads/album/Album-image-2020-01-11-07-13-363.jpg,assets/uploads/album/Album-image-2020-01-11-07-13-364.jpg,assets/uploads/album/Album-image-2020-01-11-07-13-365.jpg', '11-01-2020 07:13:36', '1', 'Another Album');

-- --------------------------------------------------------

--
-- Table structure for table `friends_`
--

CREATE TABLE `friends_` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `friend_id` int(11) NOT NULL DEFAULT 0,
  `friendship_started_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `follow_status` int(11) DEFAULT 1 COMMENT '1: Follow Me, 2: Don''t Follow Me'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends_`
--

INSERT INTO `friends_` (`id`, `user_id`, `friend_id`, `friendship_started_on`, `follow_status`) VALUES
(1, 2, 10, '0000-00-00 00:00:00', 1),
(2, 2, 12, '0000-00-00 00:00:00', 1),
(3, 16, 2, '0000-00-00 00:00:00', 1),
(4, 3, 2, '0000-00-00 00:00:00', 1),
(5, 2, 9, '2019-12-26 12:06:19', 1),
(6, 2, 7, '2019-12-26 12:48:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `friend_request`
--

CREATE TABLE `friend_request` (
  `req_id` int(11) NOT NULL,
  `sent_by` int(11) DEFAULT NULL,
  `sent_to` int(11) DEFAULT NULL,
  `request_status` int(11) NOT NULL DEFAULT 2 COMMENT '1: Accepted, 2: Pending, 3: Rejected'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend_request`
--

INSERT INTO `friend_request` (`req_id`, `sent_by`, `sent_to`, `request_status`) VALUES
(3, 7, 2, 1),
(4, 9, 2, 2),
(8, 10, 23, 2),
(9, 2, 11, 2),
(10, 2, 5, 2),
(11, 2, 19, 2),
(18, 10, 18, 2);

-- --------------------------------------------------------

--
-- Table structure for table `friend_status`
--

CREATE TABLE `friend_status` (
  `status_id` int(11) NOT NULL,
  `status_image_path` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `posted_by` int(11) NOT NULL,
  `posted_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `friend_status`
--

INSERT INTO `friend_status` (`status_id`, `status_image_path`, `posted_by`, `posted_on`) VALUES
(1, 'Status-image-2019-12-26-10-59-160.jpg', 2, '2019-12-26 10:33:22');

-- --------------------------------------------------------

--
-- Table structure for table `group_categories`
--

CREATE TABLE `group_categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `like_or_dislike`
--

CREATE TABLE `like_or_dislike` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_slug` int(11) DEFAULT NULL,
  `like_or_dislike` int(11) NOT NULL DEFAULT 0 COMMENT '1: Like, 2: Dislike'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `like_or_dislike`
--

INSERT INTO `like_or_dislike` (`id`, `post_id`, `user_id`, `post_slug`, `like_or_dislike`) VALUES
(1, 5, 10, NULL, 1),
(5, 10, 10, NULL, 1),
(6, 9, 10, NULL, 1),
(7, 8, 10, NULL, 1),
(8, 7, 10, NULL, 1),
(9, 6, 10, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages_`
--

CREATE TABLE `messages_` (
  `msg_id` int(11) NOT NULL,
  `sent_by` int(11) NOT NULL,
  `sent_to` int(11) NOT NULL,
  `message_` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `sent_on` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `read_status` int(11) NOT NULL DEFAULT 0 COMMENT '0: Not Read, 1: Read'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `messages_`
--

INSERT INTO `messages_` (`msg_id`, `sent_by`, `sent_to`, `message_`, `sent_on`, `read_status`) VALUES
(1, 2, 10, 'Hi', NULL, 1),
(2, 10, 10, 'Hi,\r\nHow Are You?', NULL, 1),
(15, 2, 10, '😘😘😘😘', '24-12-2019 11:39:17', 1),
(16, 2, 10, 'kya haal hai??', '24-12-2019 12:14:04', 1),
(17, 2, 10, 'heloo', 'Tue Dec 24 2019 12:35:11 +0100', 1),
(18, 2, 10, '😞😛😛', 'Tue Dec 24 2019 13:09:54 +0100', 1),
(19, 2, 10, '😞😛😛', 'Tue Dec 24 2019 13:09:59 +0100', 1),
(52, 2, 10, 'Thiss', 'Tue Dec 24 2019 13:47:28 +0100', 1),
(53, 2, 10, 'sss', 'Tue Dec 24 2019 13:47:52 +0100', 1),
(54, 2, 10, '😘😘😘sdfsdf', 'Tue Dec 24 2019 13:50:37 +0100', 1),
(69, 2, 10, 'Hello Rahul', 'Wed Dec 25 2019 10:25:09 +0100', 1),
(78, 2, 10, 'Hi, Ritika', NULL, 1),
(79, 9, 10, 'YY\n\n', 'Wed Dec 25 2019 11:12:50 +0100', 1),
(80, 9, 10, 'YYYY', NULL, 1),
(81, 2, 10, 'Hello Ravish', 'Wed Dec 25 2019 11:50:46 +0100', 1),
(82, 12, 10, '???', 'Wed Dec 25 2019 11:51:11 +0100', 1),
(83, 2, 10, 'ml', 'Wed Dec 25 2019 11:51:24 +0100', 1),
(84, 2, 10, 'working', 'Wed Dec 25 2019 11:51:47 +0100', 1),
(85, 2, 10, 'Hi', 'Wed Dec 25 2019 11:55:41 +0100', 1),
(86, 12, 10, 'Hhh', 'Wed Dec 25 2019 11:56:08 +0100', 1),
(87, 2, 10, 'dddfdf', 'Wed Dec 25 2019 11:56:22 +0100', 1),
(88, 2, 10, 'sdfs', 'Wed Dec 25 2019 11:56:25 +0100', 1),
(89, 12, 10, 'Mererr', 'Wed Dec 25 2019 11:56:32 +0100', 1),
(90, 2, 10, 'worrk', 'Wed Dec 25 2019 11:57:18 +0100', 1),
(91, 12, 10, 'Perfect', 'Wed Dec 25 2019 11:57:40 +0100', 1),
(92, 2, 10, 'asfasfd', 'Wed Dec 25 2019 11:59:34 +0100', 1),
(93, 2, 10, 'sdfs', 'Wed Dec 25 2019 12:02:13 +0100', 1),
(94, 2, 10, 'sdfsdf', 'Wed Dec 25 2019 12:02:14 +0100', 1),
(95, 2, 10, 'sdf', 'Wed Dec 25 2019 12:02:15 +0100', 1),
(96, 2, 10, 'sd', 'Wed Dec 25 2019 12:02:16 +0100', 1),
(97, 2, 10, 'sdf', 'Wed Dec 25 2019 12:02:17 +0100', 1),
(98, 2, 10, 'sdf', 'Wed Dec 25 2019 12:02:17 +0100', 1),
(99, 2, 10, 'sdf', 'Wed Dec 25 2019 12:02:18 +0100', 1),
(100, 2, 10, 'sdf', 'Wed Dec 25 2019 12:02:18 +0100', 1),
(101, 2, 10, 'sdf', 'Wed Dec 25 2019 12:02:18 +0100', 1),
(102, 2, 10, 'sdf', 'Wed Dec 25 2019 12:02:18 +0100', 1),
(103, 2, 10, 'sdf', 'Wed Dec 25 2019 12:02:19 +0100', 1),
(104, 2, 10, 'sdf', 'Wed Dec 25 2019 12:02:19 +0100', 1),
(105, 2, 10, 'sdf', 'Wed Dec 25 2019 12:02:19 +0100', 1),
(106, 2, 10, 'sdf', 'Wed Dec 25 2019 12:02:20 +0100', 1),
(107, 2, 10, 'sdf', 'Wed Dec 25 2019 12:02:20 +0100', 1),
(108, 12, 10, 'Hello', 'Wed Dec 25 2019 12:02:29 +0100', 1),
(109, 12, 10, 'Working  ', 'Wed Dec 25 2019 12:02:40 +0100', 1),
(110, 2, 10, 'Working', 'Wed Dec 25 2019 12:30:27 +0100', 1),
(111, 12, 10, 'Kha jane ka plan hai?', 'Wed Dec 25 2019 12:30:54 +0100', 1),
(112, 12, 10, 'H', 'Thu Dec 26 2019 08:25:26 +0100', 1),
(113, 10, 10, 'erter', 'Fri Jan 03 2020 13:06:26 +0100', 1),
(114, 10, 10, '', 'Fri Jan 03 2020 13:06:34 +0100', 1),
(115, 10, 10, 'ghj\n\n', 'Tue Jan 07 2020 11:49:22 +0100', 1),
(116, 10, 10, 'hgjhg\n\n', 'Tue Jan 07 2020 11:49:28 +0100', 1),
(117, 10, 10, 'jty', 'Tue Jan 07 2020 11:49:50 +0100', 1),
(118, 9, 10, 'ddfgdf', NULL, 1),
(119, 10, 10, 'dgdfgdg', NULL, 1),
(120, 10, 10, 'hfhfgh', 'Tue Jan 07 2020 11:51:08 +0100', 1),
(121, 10, 10, 'fhfg', 'Tue Jan 07 2020 11:51:14 +0100', 1),
(122, 10, 10, 'fghfgh', 'Tue Jan 07 2020 11:51:17 +0100', 1),
(123, 10, 10, 'fghfh', 'Tue Jan 07 2020 11:51:22 +0100', 1),
(124, 10, 10, 'fghfhf', 'Tue Jan 07 2020 11:51:26 +0100', 1),
(125, 10, 10, 'HH\n\n', 'Tue Jan 07 2020 12:07:44 +0100', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications_`
--

CREATE TABLE `notifications_` (
  `id` int(11) NOT NULL,
  `notification_` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `notify_by` int(11) NOT NULL,
  `notify_to` int(11) NOT NULL,
  `status_` int(11) NOT NULL COMMENT '0: Un-Read, 1: Read',
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `notifications_`
--

INSERT INTO `notifications_` (`id`, `notification_`, `notify_by`, `notify_to`, `status_`, `added_on`) VALUES
(1, '2dfddfgdf', 12, 10, 1, '2020-01-09 11:48:46');

-- --------------------------------------------------------

--
-- Table structure for table `post_`
--

CREATE TABLE `post_` (
  `post_id` int(11) NOT NULL,
  `post` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `post_files` text DEFAULT NULL,
  `post_type` int(11) NOT NULL DEFAULT 0 COMMENT '0: Text, 1 : Image, 2: Video',
  `posted_by` int(11) DEFAULT NULL,
  `total_likes` int(11) NOT NULL,
  `post_shared_id` int(11) NOT NULL,
  `initial_post_id` int(11) NOT NULL,
  `initially_posted_by` int(11) NOT NULL,
  `posted_on` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_`
--

INSERT INTO `post_` (`post_id`, `post`, `post_files`, `post_type`, `posted_by`, `total_likes`, `post_shared_id`, `initial_post_id`, `initially_posted_by`, `posted_on`) VALUES
(5, NULL, 'post-images-2020-01-06-12-15-53.png', 1, 10, 1, 0, 0, 10, '2020-01-06 12:15:53'),
(6, NULL, 'post-images-2020-01-09-12-11-21.png', 1, 2, 1, 0, 0, 2, '2020-01-09 12:11:21'),
(7, NULL, 'post-images-2020-01-09-12-21-40.png', 1, 2, 1, 0, 0, 2, '2020-01-09 12:21:40'),
(8, 'Only Text', NULL, 0, 10, 1, 0, 0, 10, '2020-01-09 13:42:00'),
(9, NULL, 'post-images-2020-01-09-13-46-35.png', 1, 10, 1, 0, 0, 10, '2020-01-09 13:46:35'),
(10, NULL, '56821.mp4', 2, 10, 1, 0, 0, 10, '2020-01-09 13:47:07');

-- --------------------------------------------------------

--
-- Table structure for table `post_comments_`
--

CREATE TABLE `post_comments_` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `commented_by_` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `commented_on` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_comments_`
--

INSERT INTO `post_comments_` (`id`, `post_id`, `commented_by_`, `comment`, `commented_on`) VALUES
(1, 5, 10, '<div>First Comment</div><div><br>  </div>', '06-01-2020 12:16:05'),
(2, 5, 10, '<div>  sdfds</div><div><br></div>', '06-01-2020 12:35:38'),
(3, 5, 10, '<div>  ddd</div><div><br></div>', '06-01-2020 01:56:22'),
(4, 6, 2, '<br><div><img src=\"http://onesignal.github.io/emoji-picker/lib/img//blank.gif\" class=\"img\" style=\"display:inline-block;width:25px;height:25px;background:url(\'http://onesignal.github.io/emoji-picker/lib/img//emoji_spritesheet_0.png\') -100px 0px no-repeat;background-size:675px 175px;\" alt=\":relaxed:\"><img src=\"http://onesignal.github.io/emoji-picker/lib/img//blank.gif\" class=\"img\" style=\"display:inline-block;width:25px;height:25px;background:url(\'http://onesignal.github.io/emoji-picker/lib/img//emoji_spritesheet_0.png\') -100px 0px no-repeat;background-size:675px 175px;\" alt=\":relaxed:\"><img src=\"http://onesignal.github.io/emoji-picker/lib/img//blank.gif\" class=\"img\" style=\"display:inline-block;width:25px;height:25px;background:url(\'http://onesignal.github.io/emoji-picker/lib/img//emoji_spritesheet_0.png\') -100px 0px no-repeat;background-size:675px 175px;\" alt=\":relaxed:\"><img src=\"http://onesignal.github.io/emoji-picker/lib/img//blank.gif\" class=\"img\" style=\"display:inline-block;width:25px;height:25px;background:url(\'http://onesignal.github.io/emoji-picker/lib/img//emoji_spritesheet_0.png\') -100px 0px no-repeat;background-size:675px 175px;\" alt=\":relaxed:\"></div>  ', '09-01-2020 12:18:36'),
(5, 6, 2, '<br><div><img src=\"http://onesignal.github.io/emoji-picker/lib/img//blank.gif\" class=\"img\" style=\"display:inline-block;width:25px;height:25px;background:url(\'http://onesignal.github.io/emoji-picker/lib/img//emoji_spritesheet_0.png\') -100px 0px no-repeat;background-size:675px 175px;\" alt=\":relaxed:\"><img src=\"http://onesignal.github.io/emoji-picker/lib/img//blank.gif\" class=\"img\" style=\"display:inline-block;width:25px;height:25px;background:url(\'http://onesignal.github.io/emoji-picker/lib/img//emoji_spritesheet_0.png\') -100px 0px no-repeat;background-size:675px 175px;\" alt=\":relaxed:\"><img src=\"http://onesignal.github.io/emoji-picker/lib/img//blank.gif\" class=\"img\" style=\"display:inline-block;width:25px;height:25px;background:url(\'http://onesignal.github.io/emoji-picker/lib/img//emoji_spritesheet_0.png\') -100px 0px no-repeat;background-size:675px 175px;\" alt=\":relaxed:\"><img src=\"http://onesignal.github.io/emoji-picker/lib/img//blank.gif\" class=\"img\" style=\"display:inline-block;width:25px;height:25px;background:url(\'http://onesignal.github.io/emoji-picker/lib/img//emoji_spritesheet_0.png\') -100px 0px no-repeat;background-size:675px 175px;\" alt=\":relaxed:\"></div><div><br></div>  ', '09-01-2020 12:18:39'),
(6, 6, 2, '<br><div><img src=\"http://onesignal.github.io/emoji-picker/lib/img//blank.gif\" class=\"img\" style=\"display:inline-block;width:25px;height:25px;background:url(\'http://onesignal.github.io/emoji-picker/lib/img//emoji_spritesheet_0.png\') -100px 0px no-repeat;background-size:675px 175px;\" alt=\":relaxed:\"><img src=\"http://onesignal.github.io/emoji-picker/lib/img//blank.gif\" class=\"img\" style=\"display:inline-block;width:25px;height:25px;background:url(\'http://onesignal.github.io/emoji-picker/lib/img//emoji_spritesheet_0.png\') -100px 0px no-repeat;background-size:675px 175px;\" alt=\":relaxed:\"><img src=\"http://onesignal.github.io/emoji-picker/lib/img//blank.gif\" class=\"img\" style=\"display:inline-block;width:25px;height:25px;background:url(\'http://onesignal.github.io/emoji-picker/lib/img//emoji_spritesheet_0.png\') -100px 0px no-repeat;background-size:675px 175px;\" alt=\":relaxed:\"><img src=\"http://onesignal.github.io/emoji-picker/lib/img//blank.gif\" class=\"img\" style=\"display:inline-block;width:25px;height:25px;background:url(\'http://onesignal.github.io/emoji-picker/lib/img//emoji_spritesheet_0.png\') -100px 0px no-repeat;background-size:675px 175px;\" alt=\":relaxed:\"></div><div><br></div><div><br></div>  ', '09-01-2020 12:18:39');

-- --------------------------------------------------------

--
-- Table structure for table `recent_activity`
--

CREATE TABLE `recent_activity` (
  `id` int(11) NOT NULL,
  `activity_` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `done_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `recent_activity`
--

INSERT INTO `recent_activity` (`id`, `activity_`, `user_id`, `done_on`) VALUES
(1, 'Changed His Cover Photo', 2, '2019-12-26 11:41:47');

-- --------------------------------------------------------

--
-- Table structure for table `stories_`
--

CREATE TABLE `stories_` (
  `story_id` int(11) NOT NULL,
  `story` text DEFAULT NULL,
  `story_files` text DEFAULT NULL,
  `story_type` int(11) NOT NULL DEFAULT 0 COMMENT '0: Text, 1 : Image, 2: Video',
  `posted_by` int(11) DEFAULT NULL,
  `posted_on` varchar(50) DEFAULT NULL,
  `story_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stories_`
--

INSERT INTO `stories_` (`story_id`, `story`, `story_files`, `story_type`, `posted_by`, `posted_on`, `story_status`) VALUES
(1, NULL, 'stories-images-2020-01-10-08-43-13.png', 1, 2, '10-Jan-2020 08:43:13', 1),
(3, NULL, 'stories-images-2020-01-10-08-43-13.png', 1, 2, NULL, 1),
(4, NULL, 'stories-images-2020-01-10-10-08-30.png', 1, 2, '10-Jan-2020 10:08:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `bio_graphy` text DEFAULT NULL,
  `profile_picture` varchar(155) DEFAULT NULL,
  `cover_photo` varchar(150) DEFAULT NULL,
  `status` int(20) NOT NULL DEFAULT 0 COMMENT '0=registered;1=activated;2=deactivated',
  `login_Status` int(11) NOT NULL DEFAULT 0 COMMENT '0: Online, 1: Offline',
  `signup_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `phone`, `password`, `full_name`, `bio_graphy`, `profile_picture`, `cover_photo`, `status`, `login_Status`, `signup_time`) VALUES
(1, 'admin@admin.com', NULL, '$5$rounds=10000$c/3MpnTnVgpW9r48$OPzRNzIjYjHgQrYB7pEgC6Va4zAalLMil1eyA8NALrA', 'Parveen Dahiya', NULL, 'profile7.jpg', NULL, 0, 0, '2019-12-23 07:23:07'),
(2, 'ravish3474@outlook.com', NULL, '$5$rounds=10000$j6VO4rQ//QACos7u$Dj2p4VAqqRdGyURdz7RuWEYp9iZtt/JCLCCjnu3MH84', 'Mirza Ravish Beg', NULL, 'profile10.jpg', 'cover1.jpg', 0, 0, '2019-12-19 07:24:44'),
(3, 'suraj@admin.com', NULL, '$5$rounds=10000$qAWTmoYBDRsP9Qqk$NnsjMYt2KwgC86y4j0yyzU/v.J.I9BpcdTAoNTsd8e/', 'Suraj', NULL, 'profile11.jpg', NULL, 0, 0, '2019-12-23 07:25:38'),
(4, 'mumtaz@admin.com', NULL, '$5$rounds=10000$DwzX5yGDTtsamI9u$Fp307BaRRSvVlz.t4QwkEjP5X7pgkJ9cSNrLBKDdid/', 'Mumtaz', NULL, 'profile5.jpg', NULL, 0, 0, '2019-12-23 07:26:27'),
(5, 'sayra@admin.com', NULL, '$5$rounds=10000$JLvIz5.B3nmsvNmv$BrqztezAfv9QI23iEJpgYCKCmT9FsN/yclbDsPqY9o/', 'Sayra Bano', NULL, 'profile2.jpg', NULL, 0, 0, '2019-12-23 07:26:53'),
(6, 'malhotra@admin.com', NULL, '$5$rounds=10000$ACa/kO9luha4LtQy$JDwJVSr7EbJL6.UspYlDw4Pwq/d2r8RB55RdIjeega.', 'Rishab Malhotra', NULL, 'profile12.jpg', 'cover5.jpg', 0, 0, '2019-12-23 07:28:19'),
(7, 'shreya@admin.com', NULL, '$5$rounds=10000$Z0F1bjwgXZ4Yv/XB$FSXoSEny4QZxBsDzKErI5VGpAOgzlAx5oWO7aVo5C05', 'Shreya', NULL, 'profile5.jpg', NULL, 0, 0, '2019-12-23 07:29:21'),
(8, 'sid@admin.com', NULL, '$5$rounds=10000$5VxgVj1sjEPzahsL$bAUJUlQ6/emTK/ATVND1GKRv9fITtPyhQVEobHJt8C3', 'Sidhart', NULL, 'profile10.jpg', NULL, 0, 0, '2019-12-23 07:29:46'),
(9, 'ritika@admin.com', NULL, '$5$rounds=10000$N19XH/Mj6ini4uEv$goPM2CaQjFChY4NSsQuOpeuY/J.qgCg5y5xyUimqL6/', 'Ritika', NULL, 'Profile1.jpg', 'cover2.jpg', 0, 0, '2019-12-23 07:30:14'),
(10, 'dpk@admin.com', NULL, '$5$rounds=10000$9ctwb0hTu6eV0D0Y$kvGDKmkeO.rRTKj/RDG0uKQsBh7dyTMW3MYdeMsUeb0', 'Deepak Nouliya', 'teste', 'profile12.jpg', 'cover-image-2020-01-10-10-32-26.png', 0, 1, '2019-12-23 07:32:01'),
(11, 'ravish@admin.com', NULL, '$5$rounds=10000$Qdavsj7RY6tNMcZV$OvbqLB2eSfBTPPAvwdghyDGnrOhLzpRgZAVDshFOmX6', 'Ravish Beg', NULL, 'profile10.jpg', NULL, 0, 0, '2019-12-23 07:32:25'),
(12, 'rahul@admin.com', NULL, '$5$rounds=10000$KRT6Jh35tbcGMbKk$RRqjfKNBV55evcv/BBKYuoenW02ng8j0mnc7s790oE7', 'Rahul Kumar', NULL, 'profile4.jpg', 'cover5.jpg', 0, 1, '2019-12-23 07:32:51'),
(13, 'shivam@admin.com', NULL, '$5$rounds=10000$mfMPYC2oMTGN7uhN$gt7XZJPrleWsxbXtKVc5ZRqGmmb35Bimyi3IhN4mKo/', 'Shivam Saini', NULL, 'profile10.jpg', NULL, 0, 0, '2019-12-23 07:33:34'),
(14, 'shubham@admin.com', NULL, '$5$rounds=10000$mB2mNMtAjYEuNO8I$70a/smdmpmkDUacGuJXfeSWAW/eUFl6SJMuUoIBdat7', 'Shubham Bhatt', NULL, 'profile6.jpg', NULL, 0, 0, '2019-12-23 07:34:00'),
(15, 'vaishali@admin.com', NULL, '$5$rounds=10000$j6VO4rQ//QACos7u$Dj2p4VAqqRdGyURdz7RuWEYp9iZtt/JCLCCjnu3MH84', 'Vaishali', NULL, 'profile1.jpg', NULL, 0, 0, '2019-12-23 07:34:28'),
(16, 'mkaif@admin.com', NULL, '$5$rounds=10000$VRWvaG/OKg6SfFIB$fxxlA3v.fAZstBZj/sbAwJ1K9Ab1ZnDy3JHG9UI3Yn3', 'Md Kaif', NULL, 'profile6.jpg', 'cover1.jpg', 0, 0, '2019-12-23 07:34:55'),
(17, 'piyush@admin.com', NULL, '$5$rounds=10000$KbLoa7OQFtH1A5ir$wr.KpVirFDyseVxkRavayvsd3dLuoVp1TqsDTnNbU51', 'Piyush Mohan', NULL, 'profile8.jpg', NULL, 0, 0, '2019-12-23 07:35:21'),
(18, 'rekha@admin.com', NULL, '$5$rounds=10000$t9f2nsnr.oOJ7Puy$UMjXSf5UNgTbAyhbo3/PjOWjFeo1uW9YUW/4Kh4TABD', 'Rekha', NULL, 'profile3.jpg', NULL, 0, 0, '2019-12-23 07:36:52'),
(19, 'shus@admin.com', NULL, '$5$rounds=10000$KQhI/spHRP9Ssf83$Gyyyt5tGh/naW2SrVJLIHGFlHZW0jBpRtpGA23PcC/4', 'Shusmita', NULL, 'profile2.jpg', NULL, 0, 0, '2019-12-23 07:37:50'),
(20, 'ritu@admin.com', NULL, '$5$rounds=10000$Rqw8HdfNqDAraS1w$jyvjjYkfxOPYeV5DL6pkv8LX.vc01x2Ma0iEXGFrEY3', 'Ritu Tiwari', NULL, 'profile5.jpg', NULL, 0, 0, '2019-12-23 07:39:12'),
(21, 'pinky@admin.com', NULL, '$5$rounds=10000$DnZcEjoRhS0wGK3R$0hNCAfd4AOf8iq.4qfVXteB4SD3zEhh/WJaf0mQ.6SC', 'Pinky', NULL, 'profile5.jpg', NULL, 0, 0, '2019-12-23 07:39:36'),
(22, 'nishu@admin.com', NULL, '$5$rounds=10000$haEaGDNQKJFXk4O1$.pS/yPm3.jvo1zSQE2CiGHkwcEf31kPWFqF2B.z9DL5', 'Nishu', NULL, 'profile3.jpg', NULL, 0, 0, '2019-12-23 07:40:00'),
(23, 'ranju@admin.com', NULL, '$5$rounds=10000$fhjVQIrgPdIOMdIP$mrAXWk30hvEvhwqYXbJQ1XYVKpnfRRfDeUVsRzIIAh8', 'Ranju', NULL, 'profile2.jpg', NULL, 0, 0, '2019-12-23 07:40:20'),
(24, 'adm@admin.com', NULL, '$5$rounds=10000$t4Cz2qmEP09bk2it$nnVQA4IltpGIXIZ2zaFeCqMKBaqqPfD9q/OQDD2uK5/', 'G Nagendran', NULL, 'profile10.jpg', NULL, 0, 0, '2019-12-23 07:42:34'),
(25, 'pChauhan@admin.com', NULL, '$5$rounds=10000$mtz5OHJIalDfrC0r$h4xclBTayP.HJ9U5/47vseorDYFgpA6FuT.k3vyJIq9', 'Priyanka Chauhan', NULL, 'profile3.jpg', NULL, 0, 0, '2019-12-23 07:43:07');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_` varchar(2155) NOT NULL,
  `city_` int(11) NOT NULL,
  `state_` int(11) NOT NULL,
  `country_` int(11) NOT NULL,
  `near_by_` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `group_category` varchar(150) NOT NULL,
  `group_cover_photo` varchar(255) NOT NULL,
  `group_members` text NOT NULL,
  `total_posts` int(11) NOT NULL,
  `group_created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `group_name`, `group_category`, `group_cover_photo`, `group_members`, `total_posts`, `group_created_on`) VALUES
(1, 'TEST GROUP', 'Entertainment', 'Group-image-2020-01-09-12-59-160.jpg', '1,2,3,4', 0, '2020-01-06 07:14:00'),
(2, 'Group TWO', 'Nature', 'Group-image-2020-01-09-12-59-110.jpg', '5,2,3,8', 0, '2020-01-23 09:26:00'),
(3, 'Group Three', 'Love', 'Group-image-2020-01-09-12-59-16045.jpg', '3,45,8', 0, '2020-01-21 06:00:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_page`
--

CREATE TABLE `user_page` (
  `id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_page`
--

INSERT INTO `user_page` (`id`, `page_name`, `category`, `user_id`, `created_on`) VALUES
(1, 'pageName', 2, 10, '2020-01-13 09:42:54'),
(2, 'ONe Page', 2, 10, '2020-01-13 09:57:09'),
(3, 'j,mj', 1, 10, '2020-01-13 09:58:03'),
(4, 'yjnghj', 2, 10, '2020-01-13 09:58:17'),
(5, 'wetete', 1, 10, '2020-01-13 09:59:03'),
(6, 'ddd', 2, 10, '2020-01-13 09:59:14'),
(7, 'sdfsdf', 1, 10, '2020-01-13 09:59:45'),
(8, 'dfdf', 1, 10, '2020-01-13 10:01:05'),
(9, 'asdf', 1, 10, '2020-01-13 10:04:29'),
(10, 'sdfds', 1, 10, '2020-01-13 10:05:12'),
(11, '', 0, 10, '2020-01-13 10:06:21'),
(12, 'sdf', 3, 10, '2020-01-13 10:08:22'),
(13, 'sdfsd', 2, 10, '2020-01-13 10:08:47');

-- --------------------------------------------------------

--
-- Table structure for table `user_relationship_status`
--

CREATE TABLE `user_relationship_status` (
  `id` int(11) NOT NULL,
  `relationship_status` enum('Single','Married','Divorced','Complicated','Separated') NOT NULL DEFAULT 'Single',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_school_details`
--

CREATE TABLE `user_school_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `school` varchar(100) NOT NULL,
  `from_` int(11) NOT NULL,
  `to_` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_school_details`
--

INSERT INTO `user_school_details` (`id`, `user_id`, `school`, `from_`, `to_`, `description`) VALUES
(1, 10, 'sdfsdfs', 2020, 2020, 'sasdfasf');

-- --------------------------------------------------------

--
-- Table structure for table `user_skills`
--

CREATE TABLE `user_skills` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_skill` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_skills`
--

INSERT INTO `user_skills` (`id`, `user_id`, `user_skill`) VALUES
(2, 10, 'sdfds');

-- --------------------------------------------------------

--
-- Table structure for table `user_university_details`
--

CREATE TABLE `user_university_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `university` varchar(200) DEFAULT NULL,
  `from_` int(11) DEFAULT NULL,
  `to_` int(11) DEFAULT NULL,
  `graduated` int(11) DEFAULT NULL COMMENT '1: Graduate, 0: Not Graduated',
  `course` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `degree` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_university_details`
--

INSERT INTO `user_university_details` (`id`, `user_id`, `university`, `from_`, `to_`, `graduated`, `course`, `description`, `degree`) VALUES
(1, 10, 'sfasdfsa', 2020, 2020, 1, 'CSE', 'Descrip', 'BTECH');

-- --------------------------------------------------------

--
-- Table structure for table `user_work_details`
--

CREATE TABLE `user_work_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `workedFrom` int(11) DEFAULT NULL,
  `workedTo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_work_details`
--

INSERT INTO `user_work_details` (`id`, `user_id`, `company_name`, `position`, `country`, `state`, `city`, `description`, `workedFrom`, `workedTo`) VALUES
(1, 10, 'Test', 'dd', 2, 2, 2, 'sdsdfss', 2020, 2020),
(2, 10, 'sdfs', 'sdf', 0, 2, 2, 'ssdf', 2020, 2020);

-- --------------------------------------------------------

--
-- Table structure for table `videos_`
--

CREATE TABLE `videos_` (
  `video_id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `video_path` text NOT NULL,
  `uploaded_on` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos_`
--

INSERT INTO `videos_` (`video_id`, `user_id`, `video_path`, `uploaded_on`) VALUES
(1, 2, 'videos-2019-12-24-08-26-03.mp4', '2019-12-24 08:26:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album_`
--
ALTER TABLE `album_`
  ADD PRIMARY KEY (`album_id`);

--
-- Indexes for table `friends_`
--
ALTER TABLE `friends_`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friend_request`
--
ALTER TABLE `friend_request`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `friend_status`
--
ALTER TABLE `friend_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `group_categories`
--
ALTER TABLE `group_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like_or_dislike`
--
ALTER TABLE `like_or_dislike`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages_`
--
ALTER TABLE `messages_`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `notifications_`
--
ALTER TABLE `notifications_`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_`
--
ALTER TABLE `post_`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `post_comments_`
--
ALTER TABLE `post_comments_`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recent_activity`
--
ALTER TABLE `recent_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories_`
--
ALTER TABLE `stories_`
  ADD PRIMARY KEY (`story_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_page`
--
ALTER TABLE `user_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_relationship_status`
--
ALTER TABLE `user_relationship_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_school_details`
--
ALTER TABLE `user_school_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_university_details`
--
ALTER TABLE `user_university_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_work_details`
--
ALTER TABLE `user_work_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos_`
--
ALTER TABLE `videos_`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album_`
--
ALTER TABLE `album_`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `friends_`
--
ALTER TABLE `friends_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `friend_request`
--
ALTER TABLE `friend_request`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `friend_status`
--
ALTER TABLE `friend_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `group_categories`
--
ALTER TABLE `group_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `like_or_dislike`
--
ALTER TABLE `like_or_dislike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `messages_`
--
ALTER TABLE `messages_`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `notifications_`
--
ALTER TABLE `notifications_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post_`
--
ALTER TABLE `post_`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `post_comments_`
--
ALTER TABLE `post_comments_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `recent_activity`
--
ALTER TABLE `recent_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stories_`
--
ALTER TABLE `stories_`
  MODIFY `story_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_page`
--
ALTER TABLE `user_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_relationship_status`
--
ALTER TABLE `user_relationship_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_school_details`
--
ALTER TABLE `user_school_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_skills`
--
ALTER TABLE `user_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_university_details`
--
ALTER TABLE `user_university_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_work_details`
--
ALTER TABLE `user_work_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `videos_`
--
ALTER TABLE `videos_`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
