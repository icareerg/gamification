-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: 2016-09-02 11:42:40
-- 服务器版本： 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `gpm`
--

-- --------------------------------------------------------

--
-- 表的结构 `play_log`
--

CREATE TABLE `play_log` (
  `play_id` int(10) NOT NULL COMMENT 'ID',
  `player_id` int(5) NOT NULL COMMENT '玩家ID',
  `conduct_id` tinyint(1) NOT NULL COMMENT '行为',
  `duration_id` tinyint(1) NOT NULL COMMENT '时长类型ID',
  `rewards_penalties_id` int(5) NOT NULL COMMENT '奖惩类型ID',
  `experience` double NOT NULL COMMENT '经验值',
  `integral` double NOT NULL COMMENT '积分',
  `happen_time` int(10) NOT NULL COMMENT '时间'
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COMMENT='积分及经验获取记录';

--
-- 转存表中的数据 `play_log`
--

INSERT INTO `play_log` (`play_id`, `player_id`, `conduct_id`, `duration_id`, `rewards_penalties_id`, `experience`, `integral`, `happen_time`) VALUES
(3, 2, 1, 2, 2, 0, -200, 1470639427),
(4, 1, 1, 2, 2, 0, -200, 1470639427),
(5, 1, 4, 10, 1, 0, 200, 1470639427),
(8, 1, 1, 2, 2, 0, -200, 1470714468),
(9, 2, 1, 2, 2, 0, -200, 1470714468),
(10, 3, 1, 1, 1, 100, 100, 1470708600),
(11, 3, 1, 1, 1, 100, 100, 1470797830),
(12, 3, 1, 1, 1, 100, 100, 1470797830),
(13, 3, 1, 1, 1, 100, 100, 1470797830),
(14, 3, 1, 1, 1, 100, 100, 1470797830),
(15, 3, 1, 1, 1, 100, 100, 1470797830),
(16, 3, 1, 1, 1, 100, 100, 1470797830),
(17, 3, 2, 2, 1, 250, 250, 1470797830),
(18, 3, 1, 2, 1, 200, 200, 1470797830),
(19, 3, 2, 2, 1, 250, 250, 1470797830),
(20, 3, 3, 2, 2, 0, -100, 1470797830),
(21, 5, 1, 3, 1, 210, 210, 1470797830),
(22, 5, 1, 3, 1, 210, 210, 1470797830),
(23, 5, 1, 1, 1, 100, 100, 1470797830),
(24, 5, 3, 5, 2, 0, -50, 1470797830),
(25, 4, 1, 2, 1, 200, 200, 1470797830),
(26, 4, 1, 2, 2, 0, -40, 1470797830),
(27, 4, 1, 2, 1, 200, 200, 1470797830),
(28, 4, 1, 2, 2, 0, -40, 1470797830),
(29, 4, 1, 2, 2, 0, -200, 1470797830),
(30, 4, 1, 2, 2, 0, -40, 1470797830),
(31, 4, 2, 2, 2, 0, -250, 1470797830),
(32, 4, 1, 2, 2, 0, -40, 1470797830),
(33, 4, 1, 2, 1, 200, 200, 1470797830),
(34, 2, 1, 2, 1, 200, 200, 1470808672),
(35, 2, 1, 2, 2, 0, -120, 1470808672),
(36, 1, 1, 2, 2, 0, -100, 1470808672),
(37, 3, 2, 6, 1, 375, 375, 1470881816),
(38, 3, 1, 1, 1, 100, 100, 1471231982),
(39, 3, 1, 5, 1, 230, 230, 1471314089);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `play_log`
--
ALTER TABLE `play_log`
  ADD PRIMARY KEY (`play_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `play_log`
--
ALTER TABLE `play_log`
  MODIFY `play_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=42;