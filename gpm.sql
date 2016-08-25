-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: 2016-08-25 09:34:18
-- 服务器版本： 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `gpm`
--

-- --------------------------------------------------------

--
-- 表的结构 `account`
--

CREATE TABLE `account` (
  `account_id` int(10) NOT NULL COMMENT '编号',
  `account_type` tinyint(4) NOT NULL COMMENT '充值/取现',
  `happen_time` int(10) NOT NULL COMMENT '时间',
  `integral` double NOT NULL COMMENT '积分',
  `player_id` int(10) NOT NULL COMMENT '玩家ID'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `account`
--

INSERT INTO `account` (`account_id`, `account_type`, `happen_time`, `integral`, `player_id`) VALUES
(1, 0, 1470639427, 50, 1);

-- --------------------------------------------------------

--
-- 表的结构 `duration`
--

CREATE TABLE `duration` (
  `duration_id` tinyint(1) NOT NULL COMMENT '时长类型ID',
  `duration_name` varchar(50) NOT NULL COMMENT '时长'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `duration`
--

INSERT INTO `duration` (`duration_id`, `duration_name`) VALUES
(1, '小于等于10分钟'),
(2, '11-20分钟'),
(3, '21-30分钟'),
(4, '31-45分钟'),
(5, '46-60分钟'),
(6, '61-90分钟'),
(7, '91-120分钟'),
(8, '121-180分钟'),
(9, '181-240分钟'),
(10, '其它');

-- --------------------------------------------------------

--
-- 表的结构 `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1471587749),
('m130524_201442_init', 1471587854);

-- --------------------------------------------------------

--
-- 表的结构 `player`
--

CREATE TABLE `player` (
  `player_id` int(10) NOT NULL COMMENT '玩家ID',
  `player_name` varchar(50) NOT NULL COMMENT '玩家名称',
  `passwd` varchar(50) NOT NULL COMMENT '密码',
  `level_id` tinyint(1) NOT NULL COMMENT '玩家级别',
  `experience` double NOT NULL DEFAULT '0' COMMENT '玩家经验值',
  `integral` double NOT NULL DEFAULT '0' COMMENT '玩家积分'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `player`
--

INSERT INTO `player` (`player_id`, `player_name`, `passwd`, `level_id`, `experience`, `integral`) VALUES
(1, '陈鹏威', '21c3cd2bca7392cffaae943109127c01', 1, 0, -250),
(2, '贾伟', '96e79218965eb72c92a549dd5a330112', 1, 200, -270),
(3, '王超军', '92a35d8b542d4b11a6430f4db05c7e8d', 1, 2105, 2055),
(4, '陈廷亮', '96e79218965eb72c92a549dd5a330112', 1, 600, 40),
(5, '李雪坤', '96e79218965eb72c92a549dd5a330112', 5, 542, 520);

-- --------------------------------------------------------

--
-- 表的结构 `player_conduct`
--

CREATE TABLE `player_conduct` (
  `conduct_id` tinyint(1) NOT NULL,
  `conduct_name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `player_conduct`
--

INSERT INTO `player_conduct` (`conduct_id`, `conduct_name`) VALUES
(1, '矿'),
(2, '零件'),
(3, '装备'),
(4, '充值');

-- --------------------------------------------------------

--
-- 表的结构 `player_level`
--

CREATE TABLE `player_level` (
  `level_id` int(10) NOT NULL COMMENT '级别ID',
  `level_name` varchar(50) NOT NULL COMMENT '级别名称'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `player_level`
--

INSERT INTO `player_level` (`level_id`, `level_name`) VALUES
(1, '躺尸'),
(2, '路人'),
(3, '配角'),
(4, '猪脚'),
(5, '影帝');

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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COMMENT='积分及经验获取记录';

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

-- --------------------------------------------------------

--
-- 表的结构 `rewards_penalties`
--

CREATE TABLE `rewards_penalties` (
  `rewards_penalties_id` int(5) NOT NULL COMMENT '奖惩类型ID',
  `rewards_penalties_name` varchar(20) NOT NULL COMMENT '奖惩类型'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `rewards_penalties`
--

INSERT INTO `rewards_penalties` (`rewards_penalties_id`, `rewards_penalties_name`) VALUES
(1, '奖励'),
(2, '惩罚');

-- --------------------------------------------------------

--
-- 表的结构 `rule_conduct`
--

CREATE TABLE `rule_conduct` (
  `rule_id` int(10) NOT NULL COMMENT '主键',
  `level_id` tinyint(1) NOT NULL COMMENT '玩家级别ID',
  `conduct_id` tinyint(1) NOT NULL COMMENT '行为ID',
  `rewards_penalties_id` int(5) NOT NULL DEFAULT '1' COMMENT '奖惩类型ID',
  `experience` double NOT NULL COMMENT '经验值',
  `integral` double NOT NULL COMMENT '积分'
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `rule_conduct`
--

INSERT INTO `rule_conduct` (`rule_id`, `level_id`, `conduct_id`, `rewards_penalties_id`, `experience`, `integral`) VALUES
(1, 1, 1, 1, 200, 200),
(2, 1, 1, 2, 0, -200),
(3, 1, 2, 1, 250, 250),
(4, 1, 2, 2, 0, -250),
(5, 1, 3, 1, 300, 300),
(6, 1, 3, 2, 0, -300),
(7, 2, 1, 1, 225, 225),
(8, 2, 1, 2, 0, -225),
(9, 2, 2, 1, 275, 275),
(10, 2, 2, 2, 0, -275),
(11, 2, 3, 1, 325, 325),
(12, 2, 3, 2, 0, -325),
(13, 3, 1, 1, 250, 250),
(14, 3, 1, 2, 0, -250),
(15, 3, 2, 1, 300, 300),
(16, 3, 2, 2, 0, -300),
(17, 3, 3, 1, 350, 350),
(18, 3, 3, 2, 0, -350),
(19, 4, 1, 1, 275, 275),
(20, 4, 1, 2, 0, -275),
(21, 4, 2, 1, 325, 325),
(23, 4, 2, 2, 0, -325),
(30, 4, 3, 1, 375, 375),
(31, 4, 3, 2, 0, -375),
(32, 5, 1, 1, 300, 300),
(33, 5, 1, 2, 0, -300),
(34, 5, 2, 1, 350, 350),
(35, 5, 2, 2, 0, -350),
(36, 5, 3, 1, 400, 400),
(37, 5, 3, 2, 0, -400);

-- --------------------------------------------------------

--
-- 表的结构 `rule_duration`
--

CREATE TABLE `rule_duration` (
  `rule_id` int(10) NOT NULL COMMENT '主键',
  `conduct_id` tinyint(1) NOT NULL COMMENT '行为类别ID',
  `duration_id` tinyint(1) NOT NULL COMMENT '时长类型ID',
  `percentage` double NOT NULL COMMENT '百分比'
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `rule_duration`
--

INSERT INTO `rule_duration` (`rule_id`, `conduct_id`, `duration_id`, `percentage`) VALUES
(1, 1, 1, 0.5),
(9, 1, 2, 1),
(10, 1, 3, 1.05),
(11, 1, 4, 1.1),
(12, 1, 5, 1.15),
(13, 1, 6, 1.2),
(14, 1, 8, 1.5),
(15, 1, 9, 1.7),
(16, 2, 1, 0.55),
(17, 2, 2, 1.1),
(18, 2, 3, 1.2),
(20, 2, 4, 1.3),
(21, 2, 5, 1.4),
(22, 2, 6, 1.5),
(23, 2, 7, 1.7),
(24, 2, 8, 2.1),
(25, 2, 9, 2.5),
(26, 3, 1, 0.6),
(27, 3, 2, 1.2),
(28, 3, 3, 1.35),
(29, 3, 4, 1.5),
(30, 3, 5, 1.65),
(31, 3, 6, 1.8),
(32, 3, 7, 2.05),
(33, 3, 8, 2.55),
(34, 3, 9, 3.05);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(3, 'admin', 'oKZeva693EC1d1_5uQeWfFQnLXmv7djt', '$2y$13$QTTFpS1StEKzTxStskDpN.sQyICVBIsMVfDnCTLyW2.hgvEhsSZdG', NULL, 'admin@admin.com', 10, 1471592203, 1471592203);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `duration`
--
ALTER TABLE `duration`
  ADD PRIMARY KEY (`duration_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`player_id`);

--
-- Indexes for table `player_conduct`
--
ALTER TABLE `player_conduct`
  ADD PRIMARY KEY (`conduct_id`);

--
-- Indexes for table `player_level`
--
ALTER TABLE `player_level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `play_log`
--
ALTER TABLE `play_log`
  ADD PRIMARY KEY (`play_id`);

--
-- Indexes for table `rewards_penalties`
--
ALTER TABLE `rewards_penalties`
  ADD PRIMARY KEY (`rewards_penalties_id`);

--
-- Indexes for table `rule_conduct`
--
ALTER TABLE `rule_conduct`
  ADD PRIMARY KEY (`rule_id`);

--
-- Indexes for table `rule_duration`
--
ALTER TABLE `rule_duration`
  ADD PRIMARY KEY (`rule_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '编号',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `duration`
--
ALTER TABLE `duration`
  MODIFY `duration_id` tinyint(1) NOT NULL AUTO_INCREMENT COMMENT '时长类型ID',AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `player_conduct`
--
ALTER TABLE `player_conduct`
  MODIFY `conduct_id` tinyint(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `player_level`
--
ALTER TABLE `player_level`
  MODIFY `level_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '级别ID',AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `play_log`
--
ALTER TABLE `play_log`
  MODIFY `play_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `rewards_penalties`
--
ALTER TABLE `rewards_penalties`
  MODIFY `rewards_penalties_id` int(5) NOT NULL AUTO_INCREMENT COMMENT '奖惩类型ID',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rule_conduct`
--
ALTER TABLE `rule_conduct`
  MODIFY `rule_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键',AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `rule_duration`
--
ALTER TABLE `rule_duration`
  MODIFY `rule_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键',AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;