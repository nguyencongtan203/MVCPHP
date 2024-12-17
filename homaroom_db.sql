-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 17, 2024 at 09:23 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homaroom_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Bàn Trà'),
(2, 'Kệ Tivi'),
(3, 'Sofa'),
(4, 'Bàn Ăn');

-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

DROP TABLE IF EXISTS `configuration`;
CREATE TABLE IF NOT EXISTS `configuration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `configuration`
--

INSERT INTO `configuration` (`id`, `name`) VALUES
(1, 'Thương hiệu'),
(2, 'Mã'),
(3, 'Mô tả'),
(4, 'Kích thước'),
(5, 'Chất liệu'),
(6, 'Màu sắc'),
(7, 'Tính năng'),
(8, 'Bảo hành');

-- --------------------------------------------------------

--
-- Table structure for table `configuration_details`
--

DROP TABLE IF EXISTS `configuration_details`;
CREATE TABLE IF NOT EXISTS `configuration_details` (
  `id_product` int NOT NULL,
  `id_configuration` int NOT NULL,
  `value` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_product`,`id_configuration`) USING BTREE,
  KEY `fkcofiguration_detailscofiguration` (`id_configuration`,`id_product`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `configuration_details`
--

INSERT INTO `configuration_details` (`id_product`, `id_configuration`, `value`) VALUES
(1, 1, 'HOMAROOM'),
(1, 2, 'BT-03'),
(1, 3, 'Bàn trà kiểu dáng độc đáo mới mang lại điểm nhấn sáng tạo cho phòng khách của bạn. Sản phẩm được làm từ gỗ tự nhiên kết hợp với kính cường lực, tạo nên sự hòa quyện giữa nét đẹp truyền thống và hiện đại. Bàn có kết cấu chắc chắn, chịu lực tốt, và dễ dàng vệ sinh.'),
(1, 4, 'Dài 1000mm x Rộng 600mm x Cao 450mm'),
(1, 5, 'Gỗ tự nhiên'),
(1, 6, 'Nâu gỗ'),
(1, 7, 'Chống trầy xước, chịu lực tốt, dễ vệ sinh'),
(1, 8, '12 tháng'),
(2, 1, 'HOMAROOM'),
(2, 2, 'KTV-1200'),
(2, 3, 'Bộ kệ tivi cao cấp KTV-1200 được thiết kế hiện đại, sang trọng, phù hợp với nhiều không gian phòng khách. Sản phẩm được làm từ gỗ tự nhiên, qua quy trình sản xuất tỉ mỉ đảm bảo độ bền và thẩm mỹ cao. Kệ có các ngăn chứa tiện lợi, giúp bạn dễ dàng sắp xếp các thiết bị điện tử và phụ kiện.'),
(2, 4, 'Dài 1200mm x Rộng 400mm x Cao 500mm'),
(2, 5, 'Gỗ tự nhiên'),
(2, 6, 'Đen và nâu'),
(2, 7, 'Chống trầy xước'),
(2, 8, '12 tháng'),
(3, 1, 'HOMAROOM'),
(3, 2, 'Sofa Chuky'),
(3, 3, 'Bộ sofa Chuky 2 món được làm từ gỗ sồi cao cấp, với thiết kế tinh tế, mang lại cảm giác ấm cúng và đẳng cấp cho phòng khách của bạn. Gỗ sồi được xử lý kỹ lưỡng, chống mối mọt và cong vênh, đảm bảo độ bền cao. Đệm ngồi êm ái, bọc vải nỉ chất lượng cao, tạo sự thoải mái tối đa khi sử dụng.'),
(3, 4, 'Dài 2000mm x Rộng 800mm x Cao 850mm'),
(3, 5, 'Gỗ sồi, vải nỉ'),
(3, 6, 'Nâu gỗ sồi, đệm màu nâu'),
(3, 7, 'Gỗ chống mối mọt, chống thấm nước'),
(3, 8, '24 tháng'),
(4, 1, 'HOMAROOM'),
(4, 2, 'TB-02'),
(4, 3, 'Bàn ăn thông minh xếp gọn là sản phẩm tiện ích cho những không gian nhỏ hẹp. Với khả năng xếp gọn dễ dàng, sản phẩm giúp tiết kiệm không gian và tăng tính linh hoạt cho người sử dụng. Bàn được làm từ gỗ công nghiệp cao cấp, phủ lớp melamine chống thấm nước và trầy xước.'),
(4, 4, 'Dài 1200mm x Rộng 750mm x Cao 750mm'),
(4, 5, 'Gỗ công nghiệp, phủ melamine'),
(4, 6, 'Nâu gỗ sồi, mặt bàn trắng'),
(4, 7, 'Gấp gọn, dễ di chuyển'),
(4, 8, '12 tháng');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_category` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fkproductcategory` (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `id_category`, `name`, `price`, `image`) VALUES
(1, 1, 'Bàn Trà Kiểu Dáng Độc Đáo Mới', 2800000, 'ban-tra-go.png'),
(2, 2, 'Bộ Kệ Tivi Cao Cấp KTV-1200', 3135000, 'ke-tivi-go.png'),
(3, 3, 'Bộ Sofa Chuky 2 Món Gỗ Sồi', 9800000, 'bo-sofa-go.png'),
(4, 4, 'Bàn Ăn Thông Minh Xếp Gọn', 1450000, 'ban-an-gap-nua.png'),
(26, 2, 'Bàn trà meoiu nuocsuoiiii', 10, 'aodai4.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'admin'),
(2, 'congtan', '81dc9bdb52d04dc20036dbd8313ed055', 'user');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `configuration_details`
--
ALTER TABLE `configuration_details`
  ADD CONSTRAINT `fkcofiguration_detailscofiguration` FOREIGN KEY (`id_configuration`) REFERENCES `configuration` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fkcofiguration_detailsproduct` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fkproductcategory` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
