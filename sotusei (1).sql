-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 8 月 05 日 03:06
-- サーバのバージョン： 10.4.19-MariaDB
-- PHP のバージョン: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `sotusei`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `input_table`
--

CREATE TABLE `input_table` (
  `id` int(12) NOT NULL,
  `name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hope_outdoor` int(1) NOT NULL DEFAULT 0,
  `hope_lifestyle` int(1) NOT NULL DEFAULT 0,
  `hope_career` int(1) NOT NULL DEFAULT 0,
  `hope_fitness` int(1) NOT NULL DEFAULT 0,
  `hope_food` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `input_table`
--

INSERT INTO `input_table` (`id`, `name`, `pass`, `age`, `gender`, `company`, `hope_outdoor`, `hope_lifestyle`, `hope_career`, `hope_fitness`, `hope_food`) VALUES
(29, '坂藤', '', '４１', '男', 'SGE', 0, 0, 0, 0, 0),
(30, '大庭', '', '４１', '男', 'SGES', 0, 0, 0, 0, 0),
(31, '万善', '', '４１', '男', 'SG', 0, 0, 0, 0, 0),
(32, '中村', '', '４９', '男', 'SG', 0, 0, 0, 0, 0),
(33, '濱野', '', '２４', '女', 'SG', 0, 0, 0, 0, 0),
(34, '門田', '', '２３', '女', 'SGE', 0, 0, 0, 0, 0),
(35, '今村', '', '２４', '男', 'SGE', 0, 0, 0, 0, 0),
(36, '山川', '', '２５', '男', 'SGE', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `message_table`
--

CREATE TABLE `message_table` (
  `id` int(12) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `good` int(1) NOT NULL DEFAULT 0,
  `deleted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `users_table`
--

CREATE TABLE `users_table` (
  `id` int(12) NOT NULL,
  `username` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` int(1) NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users_table`
--

INSERT INTO `users_table` (`id`, `username`, `password`, `is_admin`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'gs_00', 'gsf00@gs.com', 1, 0, '2021-07-03 17:18:07', '2021-07-03 17:18:07');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `input_table`
--
ALTER TABLE `input_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `message_table`
--
ALTER TABLE `message_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `input_table`
--
ALTER TABLE `input_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- テーブルの AUTO_INCREMENT `message_table`
--
ALTER TABLE `message_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
