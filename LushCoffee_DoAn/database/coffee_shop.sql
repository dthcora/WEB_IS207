CREATE DATABASE coffee_shop;
USE coffee_shop;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+07:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Table structure for `admins`
CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(108) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reset_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reset_expiry` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `reset_code`, `reset_expiry`) VALUES
(1, 'admin', 'admin@coffeeshop.com', '123456', NULL, NULL),
(2, 'dathao', 'dathao@coffeeshop.com', '123456', NULL, NULL),
(3, 'hongngoc', 'hongngoc@coffeeshop.com', '123456', NULL, NULL),
(4, 'thaonguyen', 'thaonguyen@coffeeshop.com', '123456', NULL, NULL),
(5, 'khoinguyen', 'khoinguyen@coffeeshop.com', '123', NULL, NULL);

-- Table structure for `categories`
CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Cà phê'),
(2, 'Trà'),
(3, 'Bánh'),
(4, 'Cà phê/Nóng'),
(5, 'Cà phê/Lạnh'),
(7, 'Trà/Trà sữa'),
(6, 'Trà/Trái cây'),
(8, 'Bánh/Mặn'),
(9, 'Bánh/Ngọt'),
(10, 'Topping');

-- Table structure for `orders`
CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_cost` decimal(10,2) NOT NULL,
  `order_status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `user_phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `orders` (`order_id`, `order_cost`, `order_status`, `user_id`, `user_phone`, `user_address`, `order_date`) VALUES
(1, 185000.00, 'Completed', 1, '0937465992', '123 Phan Chu Trinh, TP Hồ Chí Minh', '2024-1-22 10:30:00'),
(2, 215000.00, 'Pending', 2, '0398927444', '456 Lê Lợi, TP Hồ Chí Minh', '2024-12-23 08:15:00'),
(3, 340000.00, 'Processing', 3, '0909456721', '789 Nguyễn Trãi, TP Hồ Chí Minh', '2024-12-24 14:45:00'),
(4, 270000.00, 'Completed', 4, '0934567832', '123 Lê Văn Sỹ, TP Hồ Chí Minh', '2024-12-24 18:30:00'),
(5, 450000.00, 'Pending', 5, '0937567289', '456 Hoàng Văn Thụ, TP Hồ Chí Minh', '2024-12-25 09:00:00'),
(6, 320000.00, 'Processing', 6, '0918234567', '789 Đinh Bộ Lĩnh, TP Hồ Chí Minh', '2024-12-25 11:30:00'),
(7, 270000.00, 'Completed', 7, '0906123784', '123 Nguyễn Văn Cừ, TP Hồ Chí Minh', '2024-12-25 13:45:00'),
(8, 520000.00, 'Pending', 8, '0936784512', '456 Cách Mạng Tháng 8, TP Hồ Chí Minh', '2024-12-26 09:20:00'),
(9, 150000.00, 'Completed', 9, '0901234567', '12 Nguyễn Huệ, TP Hồ Chí Minh', '2024-01-05 10:15:00'),
(10, 220000.00, 'Pending', 10, '0912345678', '34 Lê Lợi, TP Hồ Chí Minh', '2024-01-18 15:45:00'),
(11, 180000.00, 'Processing', 11, '0923456789', '56 Phạm Ngũ Lão, TP Hồ Chí Minh', '2024-02-10 12:30:00'),
(12, 250000.00, 'Completed', 12, '0934567890', '78 Nguyễn Trãi, TP Hồ Chí Minh', '2024-02-28 16:00:00'),
(13, 300000.00, 'Pending', 13, '0945678901', '90 Lý Tự Trọng, TP Hồ Chí Minh', '2024-03-12 09:30:00'),
(14, 170000.00, 'Processing', 14, '0956789012', '11 Nam Kỳ Khởi Nghĩa, TP Hồ Chí Minh', '2024-03-24 11:15:00'),
(15, 280000.00, 'Completed', 15, '0967890123', '22 Hai Bà Trưng, TP Hồ Chí Minh', '2024-04-07 14:20:00'),
(16, 320000.00, 'Pending', 16, '0978901234', '33 Cách Mạng Tháng Tám, TP Hồ Chí Minh', '2024-04-30 18:50:00'),
(17, 200000.00, 'Processing', 17, '0989012345', '44 Nguyễn Văn Linh, TP Hồ Chí Minh', '2024-05-15 08:10:00'),
(18, 400000.00, 'Completed', 18, '0990123456', '55 Phan Đình Phùng, TP Hồ Chí Minh', '2024-05-27 10:40:00'),
(19, 360000.00, 'Pending', 19, '0901122334', '66 Đinh Tiên Hoàng, TP Hồ Chí Minh', '2024-06-14 09:25:00'),
(20, 180000.00, 'Processing', 20, '0912233445', '77 Hoàng Diệu, TP Hồ Chí Minh', '2024-06-21 14:00:00'),
(21, 290000.00, 'Completed', 21, '0923344556', '88 Điện Biên Phủ, TP Hồ Chí Minh', '2024-07-05 13:15:00'),
(22, 210000.00, 'Pending', 22, '0934455667', '99 Võ Văn Tần, TP Hồ Chí Minh', '2024-07-18 16:30:00'),
(23, 330000.00, 'Processing', 23, '0945566778', '101 Nguyễn Thị Minh Khai, TP Hồ Chí Minh', '2024-08-10 10:00:00'),
(24, 280000.00, 'Completed', 24, '0956677889', '102 Võ Thị Sáu, TP Hồ Chí Minh', '2024-08-25 17:50:00'),
(25, 450000.00, 'Pending', 25, '0967788990', '103 Phạm Văn Đồng, TP Hồ Chí Minh', '2024-09-12 08:45:00'),
(26, 220000.00, 'Processing', 26, '0978899001', '104 Trường Chinh, TP Hồ Chí Minh', '2024-09-30 15:20:00'),
(27, 260000.00, 'Completed', 27, '0989900112', '105 Tôn Đức Thắng, TP Hồ Chí Minh', '2024-10-05 14:40:00'),
(28, 310000.00, 'Pending', 28, '0990011223', '106 Lạc Long Quân, TP Hồ Chí Minh', '2024-10-19 18:15:00'),
(29, 340000.00, 'Processing', 29, '0900123456', '107 Hồ Biểu Chánh, TP Hồ Chí Minh', '2024-11-11 09:35:00'),
(30, 290000.00, 'Completed', 30, '0911234567', '108 Nguyễn Hồng Đào, TP Hồ Chí Minh', '2024-11-27 16:10:00'),
(31, 500000.00, 'Pending', 31, '0922345678', '109 Trần Hưng Đạo, TP Hồ Chí Minh', '2024-12-10 08:55:00'),
(32, 410000.00, 'Processing', 32, '0933456789', '110 Đoàn Văn Bơ, TP Hồ Chí Minh', '2024-12-29 14:25:00');



-- Table structure for `order_items`
CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `product_price` decimal(10,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_size` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '' -- Empty string for items without size
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `user_id`, `order_date`, `product_price`, `product_quantity`, `product_size`) VALUES
(1, 1, 1, 1, '2024-12-22 10:30:00', 35000.00, 2, 'L'),
(2, 1, 21, 1, '2024-12-22 10:30:00', 40000.00, 1, 'M'),

(3, 2, 31, 2, '2024-12-23 08:15:00', 35000.00, 1, 'L'),
(4, 2, 44, 2, '2024-12-23 08:15:00', 25000.00, 5, NULL),

(5, 3, 23, 3, '2024-12-24 14:45:00', 20000.00, 1, 'M'),
(6, 3, 41, 3, '2024-12-24 14:45:00', 40000.00, 1, NULL),
(7, 3, 61, 3, '2024-12-24 14:45:00', 30000.00, 1, NULL),

(8, 4, 6, 4, '2024-12-24 18:30:00', 20000.00, 1, 'S'),
(9, 4, 42, 4, '2024-12-24 18:30:00', 30000.00, 1, NULL),
(10, 4, 68, 4, '2024-12-24 18:30:00', 25000.00, 1, NULL),

(11, 5, 33, 5, '2024-12-25 09:00:00', 30000.00, 1, 'L'),
(12, 5, 44, 5, '2024-12-25 09:00:00', 10000.00, 1, NULL),
(13, 5, 70, 5, '2024-12-25 09:00:00', 50000.00, 1, NULL),

(14, 6, 7, 6, '2024-12-25 11:30:00', 30000.00, 1, 'R'),
(15, 6, 8, 6, '2024-12-25 11:30:00', 25000.00, 1, 'L'),
(16, 6, 49, 6, '2024-12-25 11:30:00', 50000.00, 1, NULL),

(17, 7, 19, 7, '2024-12-25 13:45:00', 20000.00, 1, 'S'),
(18, 7, 47, 7, '2024-12-25 13:45:00', 40000.00, 1, NULL),
(19, 7, 67, 7, '2024-12-25 13:45:00', 60000.00, 1, NULL),

(20, 8, 12, 8, '2024-12-26 09:20:00', 25000.00, 1, 'L'),
(21, 8, 28, 8, '2024-12-26 09:20:00', 30000.00, 1, NULL),
(22, 8, 63, 8, '2024-12-26 09:20:00', 50000.00, 1, NULL);


-- Table structure for `products`
CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `status_products_id` int(11) NOT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` decimal(10,2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `products` (`product_id`, `product_name`, `category_id`, `status_products_id`, `product_description`, `product_image`, `product_price`, `quantity`) VALUES
(1, 'Coldbrew', 5, 1, 'Cà phê ủ lạnh, vị thanh mát.', 'coldbrew.jpg', 35000, 100),
(2, 'Bạc xỉu', 5, 1, 'Cà phê sữa đá pha vị béo ngọt.', 'bacxiu.jpg', 39000, 80),
(3, 'Cà phê muối', 5, 1, 'Cà phê kết hợp với muối, độc đáo.', 'caphemuoi.jpg', 39000, 70),
(4, 'Cà phê caramel', 5, 1, 'Cà phê đậm đà với caramel.', 'caphecaramel.jpg', 49000, 50),
(5, 'Cà phê trứng', 4, 1, 'Cà phê với lớp kem trứng bồng bềnh.', 'caphetrung.jpg', 39000, 40),
(6, 'Espresso', 4, 1, 'Hương vị cà phê đậm đà, mạnh mẽ.', 'espresso.jpg', 30000, 100),
(7, 'Latte', 5, 1, 'Cà phê với sữa tươi, mịn màng.', 'latte.jpg', 45000, 60),
(8, 'Cappuccino', 5, 1, 'Cà phê với bọt sữa, vị thơm nhẹ.', 'cappuccino.jpg', 42000, 70),
(9, 'Cà phê sữa đá', 5, 1, 'Cà phê đá kết hợp với sữa đặc béo ngậy.', 'icedcaphe.jpg', 35000, 50),
(10, 'Cà phê sữa', 4, 1, 'Cà phê nóng kết hợp với sữa đặc béo ngậy.', 'caphesua.jpg', 35000, 40),
(11, 'Macchiato', 5, 1, 'Cà phê với lớp kem sữa béo ngậy.', 'macchiato.jpg', 40000, 50),
(12, 'Mocha', 5, 1, 'Cà phê kết hợp với vị sô cô la đắng ngọt.', 'mocha.jpg', 42000, 60),
(13, 'Cà phê đen đá', 5, 1, 'Cà phê đen pha đá mát lạnh.', 'denda.jpg', 30000, 80),
(14, 'Cà phê đen nóng', 4, 1, 'Cà phê đen đậm vị, nóng hổi.', 'dennong.jpg', 30000, 100),
(15, 'Affogato', 4, 1, 'Cà phê espresso kết hợp kem lạnh.', 'affogato.jpg', 55000, 30),
(16, 'Cà phê dừa', 5, 1, 'Cà phê hòa quyện với cốt dừa thơm béo.', 'caphedua.jpg', 49000, 40),
(17, 'Cà phê Chocolate', 5, 1, 'Cà phê với sô cô la đậm vị ngọt ngào.', 'caphechoco.jpg', 45000, 50),
(18, 'Irish Coffee', 4, 1, 'Cà phê với hương vị rượu đặc trưng.', 'irishcoffee.jpg', 50000, 30),
(19, 'Americano', 5, 1, 'Cà phê pha loãng theo phong cách Mỹ.', 'americano.jpg', 35000, 70),
(20, 'Flat White', 4, 1, 'Cà phê với sữa tươi, mịn màng.', 'flatwhite.jpg', 38000, 60),



-- SP trà
(21, 'Trà Xoài', 6, 1, 'Trà trái cây vị xoài tươi ngon.', 'traxoai.jpg', 45000, 50),
(22, 'Trà Dâu Tây', 6, 1, 'Trà trái cây vị dâu ngọt ngào.', 'tradautay.jpg', 45000, 60),
(23, 'Trà Trái Cây Nhiệt Đới', 6, 1, 'Trà đậm đà vị trái cây tươi.', 'tratraicay.jpg', 50000, 100),
(24, 'Trà Mãng Cầu', 6, 1, 'Trà trái cây chua ngọt đậm vị mãng cầu.', 'tramangcau.jpg', 50000, 85),
(25, 'Trà Vải', 6, 1, 'Trà trái cây vị vải thơm lừng.', 'travai.jpg', 45000, 70),
(26, 'Trà Cam Xả', 6, 1, 'Trà trái cây thanh mát với cam và xả.', 'tracamxa.jpg', 50000, 90),
(27, 'Trà Đào', 6, 1, 'Trà trái cây vị đào dịu nhẹ.', 'tradao.jpg', 48000, 75),
(28, 'Trà Chanh Tươi', 6, 1, 'Trà chanh kết hợp với hương sả thơm mát.', 'trachanh.jpg', 30000, 80),
(29, 'Trà Chanh Thái Xanh', 6, 1, 'Trà thanh mát với vị tắc chua ngọt.', 'trachanhtx.jpg', 35000, 60),
(30, 'Trà Dưa Hấu', 6, 1, 'Trà trái cây vị dưa hấu tươi.', 'traduahau.jpg', 40000, 70),
(31, 'Trà Sữa Chocolate', 7, 1, 'Trà sữa chocolate thơm ngon.', 'trasuachocolate.jpg', 50000, 100),
(32, 'Trà Sữa Matcha', 7, 1, 'Trà sữa matcha thơm mát.', 'trasuamatcha.jpg', 52000, 80),
(33, 'Trà Sữa Khoai Môn', 7, 1, 'Trà sữa khoai môn béo ngậy.', 'trasuakhoaimon.jpg', 55000, 70),
(34, 'Trà Sữa Trân Châu', 7, 1, 'Trà sữa thơm ngon cùng trân châu dai giòn.', 'trasua.jpg', 50000, 80),
(35, 'Trà Sữa Ô Long', 7, 1, 'Trà sữa ô long thanh tao.', 'trasuaolong.jpg', 52000, 90),
(36, 'Trà Sữa Kem Trứng', 7, 1, 'Trà sữa cùng kem trứng béo ngậy.', 'trasuakemtrung.jpg', 55000, 70),
(37, 'Trà Sữa Dâu', 7, 1, 'Trà sữa vị dâu ngọt ngào.', 'trasuadau.jpg', 50000, 60),
(38, 'Trà Sữa Thái Xanh', 7, 1, 'Trà sữa Thái vị trà xanh đặc trưng.', 'trasuathaixanh.jpg', 55000, 85),
(39, 'Trà Sữa Thái Đỏ', 7, 1, 'Trà sữa Thái vị trà đỏ đậm đà.', 'trasuathaido.jpg', 55000, 80),
(40, 'Trà Sữa Hồng Trà', 7, 1, 'Trà sữa hồng trà thanh nhẹ.', 'trasuahongtra.jpg', 60000, 90),


-- SP bánh
(41, 'Croissant', 8, 1, 'Thơm ngậy mùi bơ sữa.', 'croissant.jpg', 25000, 80),
(42, 'Bánh Bông Lan', 9, 1, 'Bánh bông lan ngọt mềm mịn.', 'banhbonglan.jpg', 20000, 100),
(43, 'Bánh Patechaud', 8, 1, 'Bánh patechaude thơm ngon mềm ẩm.', 'patechaud.jpg', 30000, 60),
(44, 'Bánh Su Kem', 9, 1, 'Bánh su kem ngọt mát.', 'banhsukem.jpg', 18000, 120),
(45, 'Bánh Ngọt Chocolate', 9, 1, 'Bánh chocolate ngọt béo.', 'banhchocolate.jpg', 22000, 90),
(46, 'Bánh Mochi Matcha', 9, 1, 'Bánh matcha mochi mềm dẻo.', 'mochimatcha.jpg', 25000, 80),
(47, 'Bánh Mousse Matcha', 9, 1, 'Bánh mousse matcha ngọt ngào, mịn màng.', 'moussematcha.jpg', 27000, 100),
(48, 'Bánh Panna Cotta', 9, 1, 'Bánh panna cotta ngọt ngào với hương vị trái cây tươi.', 'pannacotta.jpg', 28000, 120),
(49, 'Bánh Macaron', 9, 1, 'Bánh macaron giòn tan với màu sắc bắt mắt.', 'macaron.jpg', 35000, 90),
(50, 'Bánh Churros', 9, 1, 'Bánh churros giòn tan, thơm phức.', 'churros.jpg', 25000, 110),
(51, 'Bánh Cheesecake Dâu', 9, 1, 'Cheesecake dâu mềm mịn, ngọt dịu.', 'cheesecake.jpg', 40000, 70),
(52, 'Bánh Tiramisu', 9, 1, 'Bánh tiramisu hương vị Ý, thơm nồng vị cà phê.', 'tiramisu.jpg', 45000, 80),
(53, 'Bánh Crepe Trái Cây', 9, 1, 'Crepe mỏng mịn cuộn trái cây tươi.', 'crepe.jpg', 38000, 60),
(54, 'Bánh Red Velvet', 9, 1, 'Bánh red velvet đỏ mịn, thơm mùi cacao.', 'redvelvet.jpg', 50000, 50),
(55, 'Bánh Quiche Lorraine', 8, 1, 'Bánh quiche nhân thịt xông khói và phô mai.', 'quiche.jpg', 55000, 40),
(56, 'Bánh Mì Bơ Tỏi', 8, 1, 'Bánh mặn nướng cùng bơ tỏi thơm lừng.', 'botoi.jpg', 30000, 100),
(57, 'Bánh Scone', 8, 1, 'Bánh scone thơm lừng ăn kèm mứt và kem tươi.', 'scone.jpg', 30000, 70),
(58, 'Bánh Pizza Mini', 8, 1, 'Bánh pizza nhỏ gọn với nhân phô mai và xúc xích.', 'pizza.jpg', 60000, 50),
(59, 'Bánh Mì Hoa Cúc', 9, 1, 'Bánh bơ mềm mịn, phủ hạnh nhân giòn rụm.', 'hoacuc.jpg', 35000, 90),
(60, 'Bánh Tart Chanh', 9, 1, 'Bánh tart nhân chanh chua ngọt, lớp vỏ giòn tan.', 'tartchanh.jpg', 32000, 80),

-- SP topping
(61, 'Trân Châu Đen', 10, 1, 'Trân châu đen dẻo thơm.', 'tranchauden.jpg', 10000, 150),
(62, 'Trân Châu Trắng', 10, 1, 'Trân châu trắng giòn, ngọt vừa.', 'tranchautrang.jpg', 10000, 100),
(63, 'Thạch Dừa', 10, 1, 'Thạch dừa giòn ngọt.', 'thachdua.jpg', 8000, 200),
(64, 'Dừa Khô', 10, 1, 'Dừa khô sấy giòn, dễ ăn.', 'duakho.jpg', 8000, 250),
(65, 'Chocolate', 10, 1, 'Chocolate đen bùi, ngọt đậm đà.', 'chocolate.jpg', 15000, 120),
(66, 'Sương Sáo', 10, 1, 'Sương sáo mát lạnh, dễ chịu.', 'suongsao.jpg', 10000, 180),
(67, 'Thạch Phô Mai', 10, 1, 'Thạch phô mai béo ngậy, mềm mịn.', 'thachphomai.jpg', 15000, 150),
(68, 'Thạch Khoai Dẻo', 10, 1, 'Thạch khoai dẻo, giòn sần sật.', 'khoaideo.jpg', 15000, 130),
(69, 'Pudding', 10, 1, 'Pudding mềm mịn, thơm béo.', 'pudding.jpg', 15000, 100),
(70, 'Thạch hoa đậu biếc', 10, 1, 'Thạch dai giòn thơm ngọt mùi đậu biếc.', 'daubiec.jpg', 15000, 200);


-- Table structure for `users`
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(108) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert data into `users`
INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_fullname`, `user_phone`, `created_at`, `updated_at`) VALUES
(1, 'dthao', 'ptdt@gmail.com', '123456', 'Phạm Trần Dạ Thảo', '0937465992', '2024-12-21 10:00:00', '2024-12-21 10:00:00'),
(2, 'hngoc', 'nthn@gmail.com', '123456', 'Nguyễn Thị Hồng Ngọc', '0398927444', '2024-12-22 08:30:00', '2024-12-22 08:30:00'),
(3, 'thnguyen', 'nptn@gmail.com', '123456', 'Nguyễn Phan Thảo Nguyên', '0972638449', '2024-12-22 12:00:00', '2024-12-22 12:00:00'),
(4, 'knguyen', 'nlkn@gmail.com', '123456', 'Nguyễn Lâm Khôi Nguyên', '0982738248', '2024-12-23 09:15:00', '2024-12-23 09:15:00'),
(5, 'hminh', 'hminh@gmail.com', '123456', 'Hoàng Minh', '0912345678', '2024-12-23 14:20:00', '2024-12-23 14:20:00'),
(6, 'tnam', 'tnam@gmail.com', '123456', 'Trần Nam', '0945678901', '2024-12-23 16:40:00', '2024-12-23 16:40:00'),
(7, 'ptuyen', 'ptuyen@gmail.com', '123456', 'Phạm Tuyền', '0987123456', '2024-12-24 10:15:00', '2024-12-24 10:15:00'),
(8, 'btrung', 'btrung@gmail.com', '123456', 'Bùi Trung', '0934567890', '2024-12-24 11:00:00', '2024-12-24 11:00:00'),
(9, 'qmai', 'qmai@gmail.com', '123456', 'Quỳnh Mai', '0912987654', '2024-12-24 13:30:00', '2024-12-24 13:30:00'),
(10, 'hvy', 'hvy@gmail.com', '123456', 'Hồng Vy', '0909123456', '2024-12-24 15:45:00', '2024-12-24 15:45:00'),
(11, 'dquynh', 'dquynh@gmail.com', '123456', 'Đặng Quỳnh', '0934561234', '2024-12-25 09:00:00', '2024-12-25 09:00:00'),
(12, 'tduong', 'tduong@gmail.com', '123456', 'Trần Dương', '0908765432', '2024-12-25 10:30:00', '2024-12-25 10:30:00'),
(13, 'nvy', 'nvy@gmail.com', '123456', 'Nguyễn Vy', '0987123456', '2024-12-25 12:00:00', '2024-12-25 12:00:00'),
(14, 'vlien', 'vlien@gmail.com', '123456', 'Vũ Liên', '0971234567', '2024-12-25 14:15:00', '2024-12-25 14:15:00'),
(15, 'pthang', 'pthang@gmail.com', '123456', 'Phạm Thắng', '0919876543', '2024-12-25 15:30:00', '2024-12-25 15:30:00'),
(16, 'mkhoi', 'mkhoi@gmail.com', '123456', 'Mai Khôi', '0907654321', '2024-12-26 08:45:00', '2024-12-26 08:45:00'),
(17, 'hhoa', 'hhoa@gmail.com', '123456', 'Hà Hoa', '0936549871', '2024-12-26 10:00:00', '2024-12-26 10:00:00'),
(18, 'hluan', 'hluan@gmail.com', '123456', 'Hoàng Luân', '0983216547', '2024-12-26 13:20:00', '2024-12-26 13:20:00'),
(19, 'tphong', 'tphong@gmail.com', '123456', 'Trần Phong', '0923456789', '2024-12-26 15:00:00', '2024-12-26 15:00:00'),
(20, 'qlinh', 'qlinh@gmail.com', '123456', 'Quang Linh', '0945671234', '2024-12-26 16:45:00', '2024-12-26 16:45:00');

-- Table structure for slider
CREATE TABLE slider (
  slider_id int(11) NOT NULL,
  slider_name varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  slider_image varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO slider (slider_id, slider_name, slider_image) VALUES
(1, 'Banner 1', 'banner.jpg'),
(2, 'Banner 2', 'banner-2.jpg'),
(3, 'Banner 3', 'banner_3.jpg');

-- Table structure for status_products
CREATE TABLE status_products (
  status_products_id int(11) NOT NULL,
  status_products_name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO status_products (status_products_id, status_products_name) VALUES
(1, 'Available'),
(2, 'Unavailable');
-- Adding indexes and constraints
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `UX_Constraint` (`admin_email`);

ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

ALTER TABLE `status_products`
  ADD PRIMARY KEY (`status_products_id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UX_Constraint` (`user_email`);

-- Adding AUTO_INCREMENT
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3,
  MODIFY `product_size` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL;

ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `status_products`
  MODIFY `status_products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

-- Adding constraints
ALTER TABLE `orders`
ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

select * from orders;