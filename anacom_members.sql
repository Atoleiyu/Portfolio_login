-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 
-- サーバのバージョン： 5.7.24
-- PHP のバージョン: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `anacom_members`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `tel` text NOT NULL,
  `mail` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `account`
--

INSERT INTO `account` (`id`, `tel`, `mail`, `pass`) VALUES
(1, '09047075952', 'gaogao1@hotmail.co.jp', '1234'),
(2, '', 'isato@me.com', '1234'),
(3, '09027230176', 'masanori@me.com', '1234');

-- --------------------------------------------------------

--
-- テーブルの構造 `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `zip` int(11) NOT NULL,
  `add1` varchar(50) NOT NULL,
  `add2` varchar(50) NOT NULL,
  `add3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `address`
--

INSERT INTO `address` (`id`, `zip`, `add1`, `add2`, `add3`) VALUES
(1, 1980083, '東京都', '青梅市本町', '205'),
(2, 3530002, '埼玉県', '志木市中宗岡', '1-13-18'),
(3, 1980083, '東京都', '青梅市本町', '205');

-- --------------------------------------------------------

--
-- テーブルの構造 `drink`
--

CREATE TABLE `drink` (
  `id` int(11) NOT NULL,
  `ticket` int(11) NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `drink`
--

INSERT INTO `drink` (`id`, `ticket`) VALUES
(1, 5);

-- --------------------------------------------------------

--
-- テーブルの構造 `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `furigana` text NOT NULL,
  `bday` date NOT NULL,
  `gender` text NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `members`
--

INSERT INTO `members` (`id`, `name`, `furigana`, `bday`, `gender`, `created_at`, `updated_at`) VALUES
(1, '稲葉 慎太郎', 'イナバ シンタロウ', '1995-05-17', '男性', '2021-01-13', '2022-01-13'),
(2, '高橋 功人', 'タカハシ イサト', '1995-06-30', '男性', '2021-01-13', '2022-01-13'),
(3, '稲葉 正則', 'イナバ マサノリ', '1966-03-27', '男性', '2021-01-13', '2022-01-13');

-- --------------------------------------------------------

--
-- テーブルの構造 `test`
--

CREATE TABLE `test` (
  `name` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `drink`
--
ALTER TABLE `drink`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルのAUTO_INCREMENT `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルのAUTO_INCREMENT `drink`
--
ALTER TABLE `drink`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルのAUTO_INCREMENT `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
