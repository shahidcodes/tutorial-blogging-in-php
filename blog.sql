-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2015 at 01:22 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`) VALUES
(1, 'HTML'),
(2, 'CSS'),
(3, 'JAVASCRIPT'),
(4, 'PHP'),
(5, 'MYSQL'),
(6, 'JQUERY'),
(7, 'PYTHON');

-- --------------------------------------------------------

--
-- Table structure for table `hits`
--

CREATE TABLE IF NOT EXISTS `hits` (
`id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `hits` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hits`
--

INSERT INTO `hits` (`id`, `pid`, `hits`) VALUES
(1, 3, 3),
(2, 21, 3),
(3, 1, 7),
(4, 23, 1),
(5, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`id` int(11) NOT NULL,
  `post_title` varchar(300) NOT NULL,
  `post_content` text NOT NULL,
  `tags` text NOT NULL,
  `date` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `cat_name` varchar(10) NOT NULL,
  `slug` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_title`, `post_content`, `tags`, `date`, `modified`, `cat_name`, `slug`) VALUES
(1, 'HTML Introduction', 'HTML is a markup language for describing web documents (web pages).\r\n\r\n    HTML stands for Hyper Text Markup Language\r\n    A markup language is a set of markup tags\r\n    HTML documents are described by HTML tags\r\n    Each HTML tag describes different document content\r\nExample Explained\r\n\r\n    The DOCTYPE declaration defines the document type to be HTML\r\n    The text between <html> and </html> describes an HTML document\r\n    The text between <head> and </head> provides information about the document\r\n    The text between <title> and </title> provides a title for the document\r\n    The text between <body> and </body> describes the visible page content\r\n    The text between <h1> and </h1> describes a heading\r\n    The text between <p> and </p> describes a paragraph\r\n\r\nUsing this description, a web browser can display a document with a heading and a paragraph.', 'html', '2015-10-12 11:17:13', '0000-00-00 00:00:00', 'HTML', 'html-intoduction'),
(2, 'HTML Editors', '<h2>Write HTML Using Notepad or TextEdit</h2>\r\n<p>HTML can be edited by using professional HTML editors like:\r\n\r\n    Microsoft WebMatrix\r\n    Sublime Text\r\n\r\nHowever, for learning HTML we recommend a text editor like Notepad (PC) or TextEdit (Mac).\r\n\r\nWe believe using a simple text editor is a good way to learn HTML.\r\n\r\nFollow the 4 steps below to create your first web page with Notepad.\r\n</p>', 'html-editor, html lesson 2', '2015-10-12 11:20:23', '0000-00-00 00:00:00', 'HTML', 'html-editor');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(64) NOT NULL,
  `name` text NOT NULL,
  `joined` datetime NOT NULL,
  `group` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `name`, `joined`, `group`) VALUES
(1, 'neoxactor', '8a7cb8a899a131239895adb9d79e0ddd218672b81915cb2951bdf77b5897312c', 'üWv#¿8¸‹N•ö†m¸ôî½Qóšù\\¾…ôL', 'Neo', '2015-10-09 09:55:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_session`
--

CREATE TABLE IF NOT EXISTS `users_session` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hits`
--
ALTER TABLE `hits`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_session`
--
ALTER TABLE `users_session`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hits`
--
ALTER TABLE `hits`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users_session`
--
ALTER TABLE `users_session`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
