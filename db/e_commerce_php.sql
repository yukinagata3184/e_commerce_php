-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2025-01-13 12:11:48
-- サーバのバージョン： 10.4.32-MariaDB
-- PHP のバージョン: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `e_commerce_php`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `m_gender`
--

DROP TABLE IF EXISTS `m_gender`;
CREATE TABLE `m_gender` (
  `gender_id` tinyint(3) UNSIGNED NOT NULL,
  `gender_explain` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `m_gender`
--

INSERT INTO `m_gender` (`gender_id`, `gender_explain`) VALUES
(1, '男性'),
(2, '女性'),
(3, '未回答');

-- --------------------------------------------------------

--
-- テーブルの構造 `m_group`
--

DROP TABLE IF EXISTS `m_group`;
CREATE TABLE `m_group` (
  `group_id` int(10) UNSIGNED NOT NULL,
  `group_explain` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `m_group`
--

INSERT INTO `m_group` (`group_id`, `group_explain`) VALUES
(1, '食料品'),
(2, '衣類');

-- --------------------------------------------------------

--
-- テーブルの構造 `m_member`
--

DROP TABLE IF EXISTS `m_member`;
CREATE TABLE `m_member` (
  `member_cd` int(10) UNSIGNED NOT NULL,
  `member_id` varchar(64) NOT NULL,
  `member_password` varchar(255) NOT NULL,
  `member_name` varchar(100) NOT NULL,
  `member_email` varchar(100) NOT NULL,
  `member_tel` int(10) UNSIGNED NOT NULL,
  `member_zip_code` int(10) UNSIGNED NOT NULL,
  `prefecture_id` tinyint(3) UNSIGNED NOT NULL,
  `member_address` varchar(200) NOT NULL,
  `member_room_number` varchar(100) DEFAULT NULL,
  `member_birth` date DEFAULT NULL,
  `member_gender` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `m_member`
--

INSERT INTO `m_member` (`member_cd`, `member_id`, `member_password`, `member_name`, `member_email`, `member_tel`, `member_zip_code`, `prefecture_id`, `member_address`, `member_room_number`, `member_birth`, `member_gender`) VALUES
(1, 'user1', 'password1', 'ユーザ太郎', 'user1@example.com', 1111111111, 1111111, 1, '札幌市架空1-1', '101号室', '2001-01-01', '1'),
(2, 'user2', 'password2', 'ユーザ花子', 'user2@example.com', 2222222222, 2222222, 2, '青森市架空2-2', '202号室', '2002-02-02', '2');

-- --------------------------------------------------------

--
-- テーブルの構造 `m_prefecture`
--

DROP TABLE IF EXISTS `m_prefecture`;
CREATE TABLE `m_prefecture` (
  `prefecture_id` tinyint(3) UNSIGNED NOT NULL,
  `prefecture_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `m_prefecture`
--

INSERT INTO `m_prefecture` (`prefecture_id`, `prefecture_name`) VALUES
(1, '北海道'),
(2, '青森県'),
(3, '岩手県'),
(4, '宮城県'),
(5, '秋田県'),
(6, '山形県'),
(7, '福島県'),
(8, '茨城県'),
(9, '栃木県'),
(10, '群馬県'),
(11, '埼玉県'),
(12, '千葉県'),
(13, '東京都'),
(14, '神奈川県'),
(15, '新潟県'),
(16, '富山県'),
(17, '石川県'),
(18, '福井県'),
(19, '山梨県'),
(20, '長野県'),
(21, '岐阜県'),
(22, '静岡県'),
(23, '愛知県'),
(24, '三重県'),
(25, '滋賀県'),
(26, '京都府'),
(27, '大阪府'),
(28, '兵庫県'),
(29, '奈良県'),
(30, '和歌山県'),
(31, '鳥取県'),
(32, '島根県'),
(33, '岡山県'),
(34, '広島県'),
(35, '山口県'),
(36, '徳島県'),
(37, '香川県'),
(38, '愛媛県'),
(39, '高知県'),
(40, '福岡県'),
(41, '佐賀県'),
(42, '長崎県'),
(43, '熊本県'),
(44, '大分県'),
(45, '宮崎県'),
(46, '鹿児島県'),
(47, '沖縄県');

-- --------------------------------------------------------

--
-- テーブルの構造 `m_product`
--

DROP TABLE IF EXISTS `m_product`;
CREATE TABLE `m_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name_jpn` varchar(200) NOT NULL,
  `product_value` int(10) UNSIGNED NOT NULL,
  `product_explain` varchar(1000) DEFAULT NULL,
  `product_image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `m_product`
--

INSERT INTO `m_product` (`product_id`, `product_name_jpn`, `product_value`, `product_explain`, `product_image`) VALUES
(1, '商品1', 100, '商品1です。', 'product1.jpg'),
(2, '商品2', 200, '商品2です。', 'product2.jpg');

-- --------------------------------------------------------

--
-- テーブルの構造 `m_season`
--

DROP TABLE IF EXISTS `m_season`;
CREATE TABLE `m_season` (
  `season_id` int(10) UNSIGNED NOT NULL,
  `season_explain` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `m_season`
--

INSERT INTO `m_season` (`season_id`, `season_explain`) VALUES
(1, '1月'),
(2, '2月'),
(3, '3月'),
(4, '4月'),
(5, '5月'),
(6, '6月'),
(7, '7月'),
(8, '8月'),
(9, '9月'),
(10, '10月'),
(11, '11月'),
(12, '12月');

-- --------------------------------------------------------

--
-- テーブルの構造 `t_buy_history`
--

DROP TABLE IF EXISTS `t_buy_history`;
CREATE TABLE `t_buy_history` (
  `buy_history_id` int(10) UNSIGNED NOT NULL,
  `member_cd` int(10) UNSIGNED NOT NULL,
  `sales_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `t_contact`
--

DROP TABLE IF EXISTS `t_contact`;
CREATE TABLE `t_contact` (
  `contact_id` int(10) UNSIGNED NOT NULL,
  `contact_name` varchar(100) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `contact_tel` varchar(15) NOT NULL,
  `contact_details` varchar(1000) NOT NULL,
  `member_cd` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `t_credit_card`
--

DROP TABLE IF EXISTS `t_credit_card`;
CREATE TABLE `t_credit_card` (
  `member_cd` int(10) UNSIGNED NOT NULL,
  `credit_card_number` varchar(16) NOT NULL,
  `credit_card_expiration` int(11) NOT NULL,
  `credit_card_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `t_customer_info`
--

DROP TABLE IF EXISTS `t_customer_info`;
CREATE TABLE `t_customer_info` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_zip_code` varchar(7) NOT NULL,
  `prefecture_id` tinyint(3) UNSIGNED NOT NULL,
  `customer_address` varchar(200) NOT NULL,
  `customer_room_number` varchar(100) DEFAULT NULL,
  `customer_birth` date DEFAULT NULL,
  `gender_id` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `t_group`
--

DROP TABLE IF EXISTS `t_group`;
CREATE TABLE `t_group` (
  `group_cd` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `t_group`
--

INSERT INTO `t_group` (`group_cd`, `group_id`, `product_id`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- テーブルの構造 `t_sales`
--

DROP TABLE IF EXISTS `t_sales`;
CREATE TABLE `t_sales` (
  `sales_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `sales_num` int(10) UNSIGNED NOT NULL,
  `sales_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `t_season`
--

DROP TABLE IF EXISTS `t_season`;
CREATE TABLE `t_season` (
  `season_cd` int(10) UNSIGNED NOT NULL,
  `season_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `t_season`
--

INSERT INTO `t_season` (`season_cd`, `season_id`, `product_id`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- テーブルの構造 `t_stock`
--

DROP TABLE IF EXISTS `t_stock`;
CREATE TABLE `t_stock` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `stock_num` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `t_stock`
--

INSERT INTO `t_stock` (`product_id`, `stock_num`) VALUES
(1, 5),
(2, 20);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `m_gender`
--
ALTER TABLE `m_gender`
  ADD PRIMARY KEY (`gender_id`);

--
-- テーブルのインデックス `m_group`
--
ALTER TABLE `m_group`
  ADD PRIMARY KEY (`group_id`);

--
-- テーブルのインデックス `m_member`
--
ALTER TABLE `m_member`
  ADD PRIMARY KEY (`member_cd`),
  ADD KEY `prefecture_id` (`prefecture_id`);

--
-- テーブルのインデックス `m_prefecture`
--
ALTER TABLE `m_prefecture`
  ADD PRIMARY KEY (`prefecture_id`);

--
-- テーブルのインデックス `m_product`
--
ALTER TABLE `m_product`
  ADD PRIMARY KEY (`product_id`);

--
-- テーブルのインデックス `m_season`
--
ALTER TABLE `m_season`
  ADD PRIMARY KEY (`season_id`);

--
-- テーブルのインデックス `t_buy_history`
--
ALTER TABLE `t_buy_history`
  ADD PRIMARY KEY (`buy_history_id`),
  ADD KEY `member_cd` (`member_cd`),
  ADD KEY `sales_id` (`sales_id`);

--
-- テーブルのインデックス `t_contact`
--
ALTER TABLE `t_contact`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `member_cd` (`member_cd`);

--
-- テーブルのインデックス `t_credit_card`
--
ALTER TABLE `t_credit_card`
  ADD PRIMARY KEY (`member_cd`),
  ADD KEY `member_cd` (`member_cd`);

--
-- テーブルのインデックス `t_customer_info`
--
ALTER TABLE `t_customer_info`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `prefecture_id` (`prefecture_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- テーブルのインデックス `t_group`
--
ALTER TABLE `t_group`
  ADD PRIMARY KEY (`group_cd`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `product_id` (`product_id`);

--
-- テーブルのインデックス `t_sales`
--
ALTER TABLE `t_sales`
  ADD PRIMARY KEY (`sales_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- テーブルのインデックス `t_season`
--
ALTER TABLE `t_season`
  ADD PRIMARY KEY (`season_cd`),
  ADD KEY `season_id` (`season_id`),
  ADD KEY `product_id` (`product_id`);

--
-- テーブルのインデックス `t_stock`
--
ALTER TABLE `t_stock`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `m_group`
--
ALTER TABLE `m_group`
  MODIFY `group_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- テーブルの AUTO_INCREMENT `m_member`
--
ALTER TABLE `m_member`
  MODIFY `member_cd` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- テーブルの AUTO_INCREMENT `m_product`
--
ALTER TABLE `m_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- テーブルの AUTO_INCREMENT `m_season`
--
ALTER TABLE `m_season`
  MODIFY `season_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- テーブルの AUTO_INCREMENT `t_buy_history`
--
ALTER TABLE `t_buy_history`
  MODIFY `buy_history_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `t_contact`
--
ALTER TABLE `t_contact`
  MODIFY `contact_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `t_customer_info`
--
ALTER TABLE `t_customer_info`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `t_group`
--
ALTER TABLE `t_group`
  MODIFY `group_cd` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- テーブルの AUTO_INCREMENT `t_sales`
--
ALTER TABLE `t_sales`
  MODIFY `sales_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `t_season`
--
ALTER TABLE `t_season`
  MODIFY `season_cd` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `m_member`
--
ALTER TABLE `m_member`
  ADD CONSTRAINT `m_member_ibfk_1` FOREIGN KEY (`prefecture_id`) REFERENCES `m_prefecture` (`prefecture_id`) ON UPDATE CASCADE;

--
-- テーブルの制約 `t_buy_history`
--
ALTER TABLE `t_buy_history`
  ADD CONSTRAINT `t_buy_history_ibfk_1` FOREIGN KEY (`member_cd`) REFERENCES `m_member` (`member_cd`) ON UPDATE CASCADE,
  ADD CONSTRAINT `t_buy_history_ibfk_2` FOREIGN KEY (`sales_id`) REFERENCES `t_sales` (`sales_id`) ON UPDATE CASCADE;

--
-- テーブルの制約 `t_contact`
--
ALTER TABLE `t_contact`
  ADD CONSTRAINT `t_contact_ibfk_1` FOREIGN KEY (`member_cd`) REFERENCES `m_member` (`member_cd`) ON UPDATE CASCADE;

--
-- テーブルの制約 `t_credit_card`
--
ALTER TABLE `t_credit_card`
  ADD CONSTRAINT `t_credit_card_ibfk_1` FOREIGN KEY (`member_cd`) REFERENCES `m_member` (`member_cd`) ON UPDATE CASCADE;

--
-- テーブルの制約 `t_customer_info`
--
ALTER TABLE `t_customer_info`
  ADD CONSTRAINT `t_customer_info_ibfk_1` FOREIGN KEY (`prefecture_id`) REFERENCES `m_prefecture` (`prefecture_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `t_customer_info_ibfk_2` FOREIGN KEY (`gender_id`) REFERENCES `m_gender` (`gender_id`) ON UPDATE CASCADE;

--
-- テーブルの制約 `t_group`
--
ALTER TABLE `t_group`
  ADD CONSTRAINT `t_group_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `m_group` (`group_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `t_group_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `m_product` (`product_id`) ON UPDATE CASCADE;

--
-- テーブルの制約 `t_sales`
--
ALTER TABLE `t_sales`
  ADD CONSTRAINT `t_sales_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `m_product` (`product_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `t_sales_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `t_customer_info` (`customer_id`) ON UPDATE CASCADE;

--
-- テーブルの制約 `t_season`
--
ALTER TABLE `t_season`
  ADD CONSTRAINT `t_season_ibfk_1` FOREIGN KEY (`season_id`) REFERENCES `m_season` (`season_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `t_season_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `m_product` (`product_id`) ON UPDATE CASCADE;

--
-- テーブルの制約 `t_stock`
--
ALTER TABLE `t_stock`
  ADD CONSTRAINT `t_stock_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `m_product` (`product_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
