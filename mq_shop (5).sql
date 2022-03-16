-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2022 at 04:38 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mq_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_config`
--

CREATE TABLE `tbl_config` (
  `id` int(11) NOT NULL,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `detail` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_config`
--

INSERT INTO `tbl_config` (`id`, `code`, `name`, `detail`, `date_added`, `last_modified`) VALUES
(1, 'total_visits', 'Tên truy cập', '490', '0000-00-00 00:00:00', '2008-12-09 11:55:18'),
(2, 'currencyUnit', 'Đơn vị tiền tệ', 'VNĐ', '0000-00-00 00:00:00', '2012-05-12 12:41:10'),
(3, 'adminEmail', 'Email', 'lenhattruong@yahoo.com', '0000-00-00 00:00:00', '2012-05-12 12:41:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_content`
--

CREATE TABLE `tbl_content` (
  `id` int(11) NOT NULL,
  `code` varchar(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `parent` int(11) NOT NULL DEFAULT '0',
  `subject` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `detail_short` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `detail` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_large` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lang` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `new` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_content`
--

INSERT INTO `tbl_content` (`id`, `code`, `name`, `parent`, `subject`, `detail_short`, `detail`, `image`, `image_large`, `sort`, `status`, `date_added`, `last_modified`, `lang`, `new`) VALUES
(35, '', 'Event', 33, 'subject Event', 'short Event', 'long Event', NULL, NULL, 0, 0, '2008-04-29 22:54:02', '2008-04-29 22:54:02', 'en', NULL),
(119, '', 'Introduction', 29, '', '<p>\r\n<tr>\r\n</tr>\r\n<span class=\"text_xanh\">Những nguy&ecirc;n tắc mới của dụng cụ cắt (Phần 1)</span><br />\r\n<em><img height=\"80\" hspace=\"6\" src=\"http://viettienthanh.net/demo/minh_thang1/images/dungcucat1210081.jpg\" width=\"100\" align=\"left\" vspace=\"4\" alt=\"\" />Ng&agrave;nh c&ocirc;ng nghệ cắt gọt đ&atilde; c&oacute; những bước ph&aacute;t triển nhanh ch&oacute;ng nhằm đ&aacute;p ứng nhu cầu thay đổi v&agrave; sử dụng c&aacute;c vật liệu ph&ocirc;i chất lượng cao hơn. C&aacute;c nh&agrave; m&aacute;y gia c&ocirc;ng cơ kh&iacute; cần được th&ocirc;ng tin về những chủng loại dụng cụ cắt, với chất lượng tốt từ c&aacute;c nh&agrave; cung cấp kh&aacute;c nhau.<br />\r\n</em><br />\r\nNg&agrave;nh c&ocirc;ng nghệ cắt gọt đ&atilde; c&oacute; những bước ph&aacute;t triển nhanh ch&oacute;ng nhằm đ&aacute;p ứng nhu cầu thay đổi v&agrave; sử dụng c&aacute;c vật liệu ph&ocirc;i chất lượng cao hơn. C&aacute;c nh&agrave; m&aacute;y gia c&ocirc;ng cơ kh&iacute; cần được th&ocirc;ng tin về những chủng loại dụng cụ cắt, với chất lượng tốt từ c&aacute;c nh&agrave; cung cấp kh&aacute;c nhau. </p>', '<p align=\"justify\"><font size=\"3\"><img height=\"160\" hspace=\"5\" width=\"200\" align=\"left\" alt=\"\" src=\"/vantindat/images/Image/dungcucat1210081.jpg\" />&nbsp;<span class=\"text_xanh\">Những nguy&ecirc;n tắc mới của dụng cụ cắt (Phần 1)</span><br />\r\n<em>Ng&agrave;nh c&ocirc;ng nghệ cắt gọt đ&atilde; c&oacute; những bước ph&aacute;t triển nhanh ch&oacute;ng nhằm đ&aacute;p ứng nhu cầu thay đổi v&agrave; sử dụng c&aacute;c vật liệu ph&ocirc;i chất lượng cao hơn. C&aacute;c nh&agrave; m&aacute;y gia c&ocirc;ng cơ kh&iacute; cần được th&ocirc;ng tin về những chủng loại dụng cụ cắt, với chất lượng tốt từ c&aacute;c nh&agrave; cung cấp kh&aacute;c nhau.<br />\r\n</em><br />\r\nNg&agrave;nh c&ocirc;ng nghệ cắt gọt đ&atilde; c&oacute; những bước ph&aacute;t triển nhanh ch&oacute;ng nhằm đ&aacute;p ứng nhu cầu thay đổi v&agrave; sử dụng c&aacute;c vật liệu ph&ocirc;i chất lượng cao hơn. C&aacute;c nh&agrave; m&aacute;y gia c&ocirc;ng cơ kh&iacute; cần được th&ocirc;ng tin về những chủng loại dụng cụ cắt, với chất lượng tốt từ c&aacute;c nh&agrave; cung cấp kh&aacute;c nhau. </font></p>\r\n<font size=\"3\">\r\n<p align=\"justify\"><font size=\"3\">&nbsp;<span class=\"text_xanh\">Những nguy&ecirc;n tắc mới của dụng cụ cắt (Phần 1)</span><br />\r\n<em>Ng&agrave;nh c&ocirc;ng nghệ cắt gọt đ&atilde; c&oacute; những bước ph&aacute;t triển nhanh ch&oacute;ng nhằm đ&aacute;p ứng nhu cầu thay đổi v&agrave; sử dụng c&aacute;c vật liệu ph&ocirc;i chất lượng cao hơn. C&aacute;c nh&agrave; m&aacute;y gia c&ocirc;ng cơ kh&iacute; cần được th&ocirc;ng tin về những chủng loại dụng cụ cắt, với chất lượng tốt từ c&aacute;c nh&agrave; cung cấp kh&aacute;c nhau.<br />\r\n</em><br />\r\nNg&agrave;nh c&ocirc;ng nghệ cắt gọt đ&atilde; c&oacute; những bước ph&aacute;t triển nhanh ch&oacute;ng nhằm đ&aacute;p ứng nhu cầu thay đổi v&agrave; sử dụng c&aacute;c vật liệu ph&ocirc;i chất lượng cao hơn. C&aacute;c nh&agrave; m&aacute;y gia c&ocirc;ng cơ kh&iacute; cần được th&ocirc;ng tin về những chủng loại dụng cụ cắt, với chất lượng tốt từ c&aacute;c nh&agrave; cung cấp kh&aacute;c nhau. </font></p>\r\n</font>', NULL, NULL, 1, 0, '2008-12-05 14:51:10', '2008-12-17 08:58:50', 'en', NULL),
(38, '', 'Service', 20, '', '<p align=\"justify\"><span class=\"text_xanh\">Những nguy&ecirc;n tắc mới của dụng cụ cắt (Phần 1) (16-10-2008 07:58:50)</span><em><br />\r\nNg&agrave;nh c&ocirc;ng nghệ cắt gọt đ&atilde; c&oacute; những bước ph&aacute;t triển nhanh ch&oacute;ng nhằm đ&aacute;p ứng nhu cầu thay đổi v&agrave; sử dụng c&aacute;c vật liệu ph&ocirc;i chất lượng cao hơn. C&aacute;c nh&agrave; m&aacute;y gia c&ocirc;ng cơ kh&iacute; cần được th&ocirc;ng tin về những chủng loại dụng cụ cắt, với chất lượng tốt từ c&aacute;c nh&agrave; cung cấp kh&aacute;c nhau. </em></p>\r\n<div align=\"justify\"><strong><br />\r\n</strong></div>\r\n<p align=\"justify\"><img height=\"150\" alt=\"\" hspace=\"8\" width=\"350\" align=\"left\" src=\"http://viettienthanh.net/demo/minh_thang1/images/dungcucat1210081.jpg\" />Trong c&ocirc;ng nghệ kim loại, kh&ocirc;ng c&oacute; sự lựa chọn kh&aacute;c ngo&agrave;i việc chấp nhận những c&ocirc;ng nghệ hiện đại. Những y&ecirc;u cầu trong gia c&ocirc;ng cắt gọt đ&atilde; c&oacute; từ l&acirc;u v&agrave; ng&agrave;y c&agrave;ng đ&ograve;i hỏi ở mức cao hơn v&agrave; chỉ c&ocirc;ng nghệ hiện đại mới c&oacute; khả năng đ&aacute;p ứng được những y&ecirc;u cầu đ&oacute;. </p>\r\n<p align=\"justify\">Chris Mill, gi&aacute;m đốc dự &aacute;n ph&aacute;t triển ng&agrave;nh h&agrave;ng kh&ocirc;ng với Sandvik Coromant, đ&atilde; lấy c&ocirc;ng nghiệp h&agrave;ng kh&ocirc;ng l&agrave;m v&iacute; dụ minh họa. Để đ&aacute;p ứng được những y&ecirc;u cầu sản xuất của c&ocirc;ng nghiệp h&agrave;ng kh&ocirc;ng trong 20 năm, năng suất gia c&ocirc;ng sẽ cần tăng l&ecirc;n ba lần trong khoảng thời gian giữa b&acirc;y giờ v&agrave; tiếp theo. Điều n&agrave;y có khả thi hay kh&ocirc;ng? </p>\r\n<p align=\"justify\">&Yacute; định tăng l&ecirc;n ba lần năng suất gia c&ocirc;ng sẽ k&eacute;o theo số lượng m&aacute;y c&ocirc;ng cụ tăng l&ecirc;n ba lần, với những phương thức gia c&ocirc;ng cơ kh&iacute; vốn c&oacute; như ng&agrave;y nay. </p>\r\n<p align=\"justify\">&quot;Kh&ocirc;ng hợp l&yacute;&quot;, &ocirc;ng ta n&oacute;i. Việc tăng số lượng m&aacute;y c&ocirc;ng cụ l&ecirc;n đồng nghĩa với việc tăng số lượng nh&acirc;n vi&ecirc;n điều khiển m&aacute;y l&ecirc;n mức tương tự như vậy. Thật kh&oacute; để h&igrave;nh dung, với một số lượng phương tiện m&aacute;y m&oacute;c ấy cần bố tr&iacute; số lượng nh&acirc;n sự c&oacute; đủ chuy&ecirc;n m&ocirc;n như thế n&agrave;o để điều khiển m&aacute;y. </p>\r\n<p align=\"justify\">Kh&ocirc;ng, năng suất tăng l&ecirc;n sẽ đến từ những c&ocirc;ng nghệ ti&ecirc;n tiến m&agrave; ở đ&oacute; cho ph&eacute;p với c&ugrave;ng một lượng nh&acirc;n vi&ecirc;n nhưng c&oacute; thể gi&aacute;m s&aacute;t được một khối lượng c&ocirc;ng việc lớn hơn nhiều. </p>\r\n<p align=\"justify\"><strong>Vậy c&ocirc;ng nghệ hiện đại nay sẽ đến từ đ&acirc;u?</strong> </p>\r\n<p align=\"justify\">M&aacute;y c&ocirc;ng cụ đang ph&aacute;t triển mạnh, ng&agrave;y c&agrave;ng trở n&ecirc;n nhanh ch&oacute;ng v&agrave; ch&iacute;nh x&aacute;c hơn. Tuy nhi&ecirc;n, bản th&acirc;n ph&ocirc;i li&ecirc;̣u kh&ocirc;ng ph&aacute;t triển theo c&aacute;ch gia tăng giống như vậy, ch&uacute;ng đang thay đổi một c&aacute;ch căn bản. Ng&agrave;y nay ph&ocirc;i gia c&ocirc;ng kh&ocirc;ng chỉ c&oacute; y&ecirc;u cầu về mức độ ch&iacute;nh x&aacute;c m&agrave; c&ograve;n ở chất lượng nguy&ecirc;n liệu, do vậy khi nhận h&agrave;ng, đơn vị sản xuất sẽ gặp phải những vật liệu mới th&acirc;̣m chí chưa hề gặp. Đ&oacute; l&agrave; những vật liệu bao gồm hợp kim titan, c&aacute;c loại hợp kim tr&ecirc;n nền niken v&agrave; th&eacute;p &eacute;p graphit (CGI), </p>', '', NULL, NULL, 0, 0, '2008-04-29 22:55:25', '2008-12-17 09:00:45', 'en', NULL),
(40, 'http://www.mail.yahoo.com.vn', 'mail yahoo', 19, '', '', '', '', NULL, 0, 0, '2008-04-29 22:56:40', '2008-11-27 00:10:42', 'en', NULL),
(148, 'http://www.trangvangwebsite.com', 'trang vàng', 10, '', '', '', 'images/content/link_s148.jpg', NULL, 2, 0, '2009-06-08 11:06:27', '2009-06-08 11:51:07', 'vn', NULL),
(149, 'http://www.thuonggiavietnam.net', 'thương gia', 10, '', '', '', 'images/content/link_s149.jpg', NULL, 3, 0, '2009-06-08 11:07:00', '2009-06-08 11:51:15', 'vn', NULL),
(150, 'http://www.trangvangwebsite.com', 'trang vàng', 10, '', '', '', 'images/content/link_s150.jpg', NULL, 4, 0, '2009-06-08 11:07:19', '2009-06-08 11:51:21', 'vn', NULL),
(182, 'http://thuonggiavietnam.org/', '', 76, '', '', '', 'images/content/advleft_bottom_s200.gif', NULL, 0, 0, '2009-12-29 12:28:14', '2009-12-29 12:28:14', 'vn', NULL),
(154, '', 'Dịch vụ', 9, '', '<font size=\"3\" color=\"#000000\"><strong>Shop MQ:<br />\r\n<br />\r\n</strong>- Chuyên cung cấp mọi loại mặt hàng<br />\r\n<br />\r\n- Giao tận nhà.<br />\r\n<br />\r\n- Freeship choi mọi hóa đơn từ 99K</font>', '', NULL, NULL, 0, 0, '2009-06-08 11:46:05', '2012-05-12 21:38:42', 'vn', NULL),
(173, '', 'Bảng giá', 74, '', '', '', 'images/content/download_s173.doc', NULL, 0, 0, '2009-06-22 10:28:39', '2012-05-12 12:23:42', 'vn', NULL),
(183, 'http://tiengiangco.net', 'Tin học Tiền Giang', 77, '', '', '', 'images/content/advright_bottom_s257.jpg', NULL, 0, 0, '2009-12-29 12:57:50', '2012-05-12 11:54:23', 'vn', NULL),
(159, 'http://www.google.com.vn', 'Công ty TNHH ABC', 71, '', '', '', 'images/content/customer_s159.jpg', NULL, 1, 0, '2009-06-08 12:02:12', '2009-06-12 15:38:55', 'vn', NULL),
(160, 'http://www.thuonggiavietnam.net', 'Khách hàng 123', 71, '', '', '', 'images/content/customer_s160.jpg', NULL, 2, 0, '2009-06-08 12:02:56', '2009-06-12 15:38:44', 'vn', NULL),
(161, 'http://www.trangvangwebsite.com', 'Công ty truyền thông', 71, '', '', '', 'images/content/customer_s161.jpg', NULL, 3, 0, '2009-06-08 13:43:52', '2009-06-12 15:37:44', 'vn', NULL),
(166, '', 'Giới thiệu', 73, '', '', '<div align=\"justify\">\r\n<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\">\r\n    <tbody>\r\n        <tr>\r\n            <td class=\"name\" align=\"center\"><span><font size=\"2\">Dịch vụ kế to&aacute;n </font></span></td>\r\n        </tr>\r\n        <tr>\r\n            <td class=\"margin_content\"><font size=\"2\">Th&ocirc;ng tin đang cập nhật ... </font></td>\r\n        </tr>\r\n        <tr>\r\n            <td class=\"name\" align=\"center\"><font size=\"2\">Dịch vụ k&ecirc; khai v&agrave; tư vấn thuế</font></td>\r\n        </tr>\r\n        <tr>\r\n            <td class=\"margin_content\"><font size=\"2\">Th&ocirc;ng tin đang cập nhật ... </font></td>\r\n        </tr>\r\n        <tr>\r\n            <td class=\"name\" align=\"center\"><font size=\"2\">Dịch vụ Tư vấn t&agrave;i ch&iacute;nh Doanh nghiệp </font></td>\r\n        </tr>\r\n        <tr>\r\n            <td class=\"margin_content\"><font size=\"2\">Th&ocirc;ng tin đang cập nhật ... </font></td>\r\n        </tr>\r\n        <tr>\r\n            <td class=\"name\" align=\"center\"><font size=\"2\">Dịch vụ thiết lập dự &aacute;n đầu tư </font></td>\r\n        </tr>\r\n        <tr>\r\n            <td class=\"margin_content\"><font size=\"2\">Th&ocirc;ng tin đang cập nhật ... </font></td>\r\n        </tr>\r\n        <tr>\r\n            <td class=\"name\" align=\"center\"><font size=\"2\">Dịch vụ thẩm định dự &aacute;n đầu tư </font></td>\r\n        </tr>\r\n        <tr>\r\n            <td class=\"margin_content\"><font size=\"2\">Th&ocirc;ng tin đang cập nhật ... </font></td>\r\n        </tr>\r\n        <tr>\r\n            <td class=\"name\" align=\"center\"><font size=\"2\">Dịch vụ tư vấn đầu tư t&agrave;i ch&iacute;nh</font></td>\r\n        </tr>\r\n        <tr>\r\n            <td class=\"margin_content\"><font size=\"2\">Th&ocirc;ng tin đang cập nhật ... </font></td>\r\n        </tr>\r\n        <tr>\r\n            <td class=\"name\" align=\"center\"><font size=\"2\">Dịch vụ thu thập th&ocirc;ng tin, ph&acirc;n t&iacute;ch v&agrave; điều tra thị trường</font></td>\r\n        </tr>\r\n        <tr>\r\n            <td class=\"margin_content\"><font size=\"2\">Th&ocirc;ng tin đang cập nhật ... </font></td>\r\n        </tr>\r\n        <tr>\r\n            <td class=\"name\" align=\"center\"><font size=\"2\">Dịch vụ hỗ trợ ph&aacute;p l&yacute;</font></td>\r\n        </tr>\r\n        <tr>\r\n            <td class=\"margin_content\"><font size=\"2\">Th&ocirc;ng tin đang cập nhật ... </font></td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</div>', NULL, NULL, 0, 0, '0000-00-00 00:00:00', '2009-06-12 15:21:13', 'vn', NULL),
(30, '', 'liên hệ', 30, '<div align=\"center\"><img width=\"165\" height=\"57\" align=\"middle\" alt=\"\" src=\"/vantindat/images/Image/hotline.jpg\" /><br />\r\n</div>', '<font size=\"2\" face=\"Tahoma\">&nbsp;</font><!--[if gte mso 9]><xml>\r\n<w:LatentStyles DefLockedState=\"false\" DefUnhideWhenUsed=\"true\"\r\nDefSemiHidden=\"true\" DefQFormat=\"false\" DefPriority=\"99\"\r\nLatentStyleCount=\"267\">\r\n<w:LsdException Locked=\"false\" Priority=\"0\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Normal\" />\r\n<w:LsdException Locked=\"false\" Priority=\"9\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"heading 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 3\" />\r\n<w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 4\" />\r\n<w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 5\" />\r\n<w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 6\" />\r\n<w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 7\" />\r\n<w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 8\" />\r\n<w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 9\" />\r\n<w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 3\" />\r\n<w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 4\" />\r\n<w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 5\" />\r\n<w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 6\" />\r\n<w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 7\" />\r\n<w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 8\" />\r\n<w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 9\" />\r\n<w:LsdException Locked=\"false\" Priority=\"35\" QFormat=\"true\" Name=\"caption\" />\r\n<w:LsdException Locked=\"false\" Priority=\"10\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Title\" />\r\n<w:LsdException Locked=\"false\" Priority=\"1\" Name=\"Default Paragraph Font\" />\r\n<w:LsdException Locked=\"false\" Priority=\"11\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtitle\" />\r\n<w:LsdException Locked=\"false\" Priority=\"22\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Strong\" />\r\n<w:LsdException Locked=\"false\" Priority=\"20\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Emphasis\" />\r\n<w:LsdException Locked=\"false\" Priority=\"59\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Table Grid\" />\r\n<w:LsdException Locked=\"false\" UnhideWhenUsed=\"false\" Name=\"Placeholder Text\" />\r\n<w:LsdException Locked=\"false\" Priority=\"1\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"No Spacing\" />\r\n<w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light Shading\" />\r\n<w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light List\" />\r\n<w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light Grid\" />\r\n<w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Shading 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Shading 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium List 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium List 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 3\" />\r\n<w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Dark List\" />\r\n<w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful Shading\" />\r\n<w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful List\" />\r\n<w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful Grid\" />\r\n<w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light Shading Accent 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light List Accent 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light Grid Accent 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 1\" />\r\n<w:LsdException Locked=\"false\" UnhideWhenUsed=\"false\" Name=\"Revision\" />\r\n<w:LsdException Locked=\"false\" Priority=\"34\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"List Paragraph\" />\r\n<w:LsdException Locked=\"false\" Priority=\"29\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Quote\" />\r\n<w:LsdException Locked=\"false\" Priority=\"30\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Quote\" />\r\n<w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Dark List Accent 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful List Accent 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light Shading Accent 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light List Accent 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light Grid Accent 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Dark List Accent 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful List Accent 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light Shading Accent 3\" />\r\n<w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light List Accent 3\" />\r\n<w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light Grid Accent 3\" />\r\n<w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 3\" />\r\n<w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 3\" />\r\n<w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 3\" />\r\n<w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 3\" />\r\n<w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 3\" />\r\n<w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 3\" />\r\n<w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 3\" />\r\n<w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Dark List Accent 3\" />\r\n<w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 3\" />\r\n<w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful List Accent 3\" />\r\n<w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 3\" />\r\n<w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light Shading Accent 4\" />\r\n<w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light List Accent 4\" />\r\n<w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light Grid Accent 4\" />\r\n<w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 4\" />\r\n<w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 4\" />\r\n<w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 4\" />\r\n<w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 4\" />\r\n<w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 4\" />\r\n<w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 4\" />\r\n<w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 4\" />\r\n<w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Dark List Accent 4\" />\r\n<w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 4\" />\r\n<w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful List Accent 4\" />\r\n<w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 4\" />\r\n<w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light Shading Accent 5\" />\r\n<w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light List Accent 5\" />\r\n<w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light Grid Accent 5\" />\r\n<w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 5\" />\r\n<w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 5\" />\r\n<w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 5\" />\r\n<w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 5\" />\r\n<w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 5\" />\r\n<w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 5\" />\r\n<w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 5\" />\r\n<w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Dark List Accent 5\" />\r\n<w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 5\" />\r\n<w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful List Accent 5\" />\r\n<w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 5\" />\r\n<w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light Shading Accent 6\" />\r\n<w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light List Accent 6\" />\r\n<w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light Grid Accent 6\" />\r\n<w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 6\" />\r\n<w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 6\" />\r\n<w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 6\" />\r\n<w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 6\" />\r\n<w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 6\" />\r\n<w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 6\" />\r\n<w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 6\" />\r\n<w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Dark List Accent 6\" />\r\n<w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 6\" />\r\n<w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful List Accent 6\" />\r\n<w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 6\" />\r\n<w:LsdException Locked=\"false\" Priority=\"19\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtle Emphasis\" />\r\n<w:LsdException Locked=\"false\" Priority=\"21\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Emphasis\" />\r\n<w:LsdException Locked=\"false\" Priority=\"31\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtle Reference\" />\r\n<w:LsdException Locked=\"false\" Priority=\"32\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Reference\" />\r\n<w:LsdException Locked=\"false\" Priority=\"33\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Book Title\" />\r\n<w:LsdException Locked=\"false\" Priority=\"37\" Name=\"Bibliography\" />\r\n<w:LsdException Locked=\"false\" Priority=\"39\" QFormat=\"true\" Name=\"TOC Heading\" />\r\n</w:LatentStyles>\r\n</xml><![endif]--><!--[if gte mso 10]>\r\n<style>\r\n/* Style Definitions */\r\ntable.MsoNormalTable\r\n{mso-style-name:\"Table Normal\";\r\nmso-tstyle-rowband-size:0;\r\nmso-tstyle-colband-size:0;\r\nmso-style-noshow:yes;\r\nmso-style-priority:99;\r\nmso-style-qformat:yes;\r\nmso-style-parent:\"\";\r\nmso-padding-alt:0cm 5.4pt 0cm 5.4pt;\r\nmso-para-margin:0cm;\r\nmso-para-margin-bottom:.0001pt;\r\nline-height:115%;\r\nmso-pagination:widow-orphan;\r\nfont-size:11.0pt;\r\nfont-family:\"Calibri\",\"sans-serif\";\r\nmso-ascii-font-family:Calibri;\r\nmso-ascii-theme-font:minor-latin;\r\nmso-fareast-font-family:\"Times New Roman\";\r\nmso-fareast-theme-font:minor-fareast;\r\nmso-hansi-font-family:Calibri;\r\nmso-hansi-theme-font:minor-latin;\r\nmso-bidi-font-family:\"Times New Roman\";\r\nmso-bidi-theme-font:minor-bidi;}\r\n</style>\r\n<![endif]-->\r\n<h2>Shop MQ</h2>\r\nVăn ph&ograve;ng: 234 Hoàng Quốc Việt<br />\r\nĐT: 0999999<br />\r\nEmail: <a href=\"mailto:MQ@gmail.com\">info@MQ.com</a><br />\r\nWebsite: <a href=\"https://plus.google.com/u/0/101740367695515335148\" title=\"Thiết kế website, thiết kế trang web\">http://MQ.com</a><br />\r\n<br />\r\nMọi &yacute; kiến, xin gửi về địa chỉ email: <a href=\"mailto:ShopMQ.com\">info@ShopMQ.com</a>\r\n<p align=\"center\"><span style=\"font-size:10.0pt\"></span></p>', '', NULL, NULL, 0, 0, '2008-03-29 11:35:26', '2013-05-23 14:17:25', 'vn', NULL),
(144, '', 'Tuyển dụng', 70, '', '<p align=\"justify\"><font face=\"Tahoma\" size=\"2\">Th&ocirc;ng tin tuyển dụng đang cập nhật !.</font></p>', '', NULL, NULL, 0, 0, '2009-06-08 10:27:42', '2009-06-08 10:59:55', 'vn', NULL),
(125, '', 'Nhà phát minh Vân Nguyễn nói về thuốc nghệ', 66, '', '', '', 'images/upload/TakeMeToYourHeart.wma', NULL, 1, 0, '2008-12-18 09:04:55', '2008-12-18 09:07:50', 'vn', NULL),
(126, '', 'Thuốc nghệ tại Canada', 66, '', '', '', 'images/upload/Mandy_Westlife.wma', NULL, 2, 0, '2008-12-18 09:08:56', '2008-12-18 09:21:44', 'vn', NULL),
(31, '', 'Contact', 31, '', '<font size=\"3\">\r\n<div style=\"FONT-WEIGHT: bold; COLOR: rgb(24,130,237); TEXT-ALIGN: center\"><font size=\"2\">Shop MQ Ltd.,&nbsp;</font></div>\r\n<div style=\"COLOR: rgb(24,130,237); TEXT-ALIGN: center\"></div>\r\n</font>', '', NULL, NULL, 0, 0, '2008-03-29 11:36:06', '2008-12-17 09:10:19', 'en', NULL),
(43, 'http://mail.yahoo.com.vn', 'mail yahoo', 26, '', '', '', 'images/content/advleft_s43.gif', NULL, 0, 0, '2008-05-01 23:50:46', '2008-06-18 14:50:50', 'en', NULL),
(44, 'http://www.google.com.vn', 'google', 27, '', '', '', 'images/content/advright_s44.jpg', NULL, 1, 0, '2008-05-01 23:51:17', '2008-11-27 21:11:34', 'en', NULL),
(49, 'thehoipro200x', 'Ho tro ky thuat ', 36, '', '', '', NULL, NULL, 0, 0, '2008-06-02 11:30:58', '2009-06-08 11:52:19', 'vn', NULL),
(50, 'support', 'Support', 37, '', '', '', NULL, NULL, 0, 0, '2008-06-02 11:31:10', '2008-06-02 11:31:27', 'en', NULL),
(179, 'hỗ trợ tài chính', 'hỗ trợ tài chính', 11, '', '', '', NULL, NULL, 2, 0, '2009-12-02 16:27:40', '2012-05-12 12:26:39', 'vn', NULL),
(167, '', 'Giới thiệu', 28, '', '<h2>MT Furniture</h2>\r\nVăn phòng: 234 Hoàng Quốc Việt<br />\r\nĐT: 09999999<br />\r\nEmail: <a href=\"mailto:info@shopmq.com\">info@shopmq.com</a><br />\r\nWebsite: <a href=\"https://plus.google.com/u/0/101740367695515335148\" title=\"Mang đến giá cả và chất lượng tốt nhất\">http://shopmq.com</a><br />\r\n<br />\r\nMọi ý kiến, xin gửi về địa chỉ email: <a href=\"mailto:info@shopmq.com\">info@shopmq.com</a>', '', NULL, NULL, 0, 0, '2009-06-16 15:02:09', '2021-11-12 09:01:30', 'vn', NULL),
(175, 'http://google.com.vn', 'google', 75, '', '', '', 'images/content/logo_s175.jpg', NULL, 1, 0, '2009-11-19 14:42:23', '2009-11-19 14:42:23', 'vn', NULL),
(180, 'http://lcnew.com.vn/?frame=news', '', 76, '', '', '', 'images/content/advleft_bottom_s180.gif', NULL, 0, 0, '2009-12-29 12:25:26', '2009-12-29 12:25:26', 'vn', NULL),
(181, 'http://lcnew.com.vn/', '', 76, '', '', '', 'images/content/advleft_bottom_s181.gif', NULL, 0, 0, '2009-12-29 12:26:18', '2009-12-29 12:26:18', 'vn', NULL),
(191, 'http://raovattiengiang.com.vn/', 'Rao vặt Tiền Giang', 77, '', '', '', 'images/content/advright_bottom_s191.jpg', NULL, 2, 0, '2012-05-12 11:56:49', '2020-12-25 20:22:21', 'vn', NULL),
(186, 'kinhdoanh', 'Kinh doanh', 11, '', '', '', NULL, NULL, 1, 0, '2009-12-29 13:00:40', '2020-12-25 20:05:09', 'vn', NULL),
(187, '', 'Những tên tội phạm ngớ ngẩn trong năm', 8, '', 'Đ&aacute;nh ghen gi&ugrave;m, giả cảnh s&aacute;t để thị uy tội phạm, hay đơn giản chỉ l&agrave; k&eacute;o nhau đi &quot;xin&quot; vịt về l&agrave;m mồi nhậu... cũng khiến nhiều người phải trả gi&aacute; bằng những năm th&aacute;ng t&ugrave; đ&agrave;y.', '<p align=\"justify\"><strong><font color=\"#4f4f4f\">C&aacute;i miệng l&agrave;m khổ c&aacute;i th&acirc;n&rdquo;</font></strong></p>\r\n<p class=\"Normal\" align=\"justify\">Một ng&agrave;y đầu th&aacute;ng 12, ph&ograve;ng xử &aacute;n của TAND huyện V&acirc;n Canh, tỉnh B&igrave;nh Định đ&ocirc;ng người dự kh&aacute;n một c&aacute;ch kh&aacute;c thường. Bị c&aacute;o V&otilde; Trung Khoa (55 tuổi) phạm tội &ldquo;cố &yacute; g&acirc;y thương t&iacute;ch&rdquo;, nhưng nguy&ecirc;n nh&acirc;n dẫn đến vụ &aacute;n mới ch&iacute;nh l&agrave; điều khiến người ta phải x&igrave; x&agrave;o, b&agrave;n t&aacute;n.</p>\r\n<p class=\"Normal\" align=\"justify\">Theo cơ quan điều tra, hồi đầu năm, trong một buổi &ldquo;tr&agrave; dư tửu hậu&rdquo; với bạn b&egrave;, &ocirc;ng Khoa h&ugrave;ng hồn tuy&ecirc;n bố đ&atilde; từng ăn nằm với hầu hết đ&agrave;n b&agrave; ở x&atilde; Canh Vinh. Mặc d&ugrave; c&aacute;c &ldquo;đệ tử lưu linh&rdquo; h&ocirc;m ấy đều cho rằng &ocirc;ng Khoa n&oacute;i kho&aacute;c nhưng chuyện cứ thế truyền hết miệng người n&agrave;y đến người kh&aacute;c.</p>\r\n<p class=\"Normal\" align=\"justify\">Thế l&agrave;, cuộc sống của người d&acirc;n tại đ&acirc;y bắt đầu bị đảo lộn. H&agrave;ng x&oacute;m nghi kỵ lẫn nhau. Thậm ch&iacute; c&oacute; nhiều gia đ&igrave;nh m&acirc;u thuẫn chuyện cơm &aacute;o gạo tiền nhưng cuối cuộc c&atilde;i v&atilde;, người chồng tự nhi&ecirc;n đổ vấy cho vợ l&agrave; kẻ lăng lo&agrave;n, ngoại t&igrave;nh với&hellip; l&atilde;o Khoa. Tức kh&iacute; v&igrave; bị đổ oan, nhiều b&agrave; vợ họp nhau lại quyết t&igrave;m thủ phạm tung tin đồn nhảm để &ldquo;l&agrave;m cho ra nhẽ&rdquo;.</p>\r\n<p class=\"Normal\" align=\"justify\">&ldquo;Lệnh&rdquo; truyền đi, chẳng bao l&acirc;u một nh&oacute;m đ&agrave;n b&agrave; đ&atilde; c&oacute; mặt đ&ocirc;ng đủ trước cửa nh&agrave; &ocirc;ng Khoa để &ldquo;hỏi tội&rdquo; về việc tung tin đồn. Suốt buổi h&ocirc;m đ&oacute;, &ocirc;ng chủ nh&agrave; mệt nho&agrave;i v&igrave; phải ph&acirc;n trần, cho rằng m&igrave;nh kh&ocirc;ng dại g&igrave; l&agrave;m chuyện đ&oacute; m&agrave; do c&oacute; kẻ n&agrave;o gh&eacute;t &ocirc;ng n&ecirc;n mới dựng chuyện n&oacute;i thế.</p>\r\n<p class=\"Normal\" align=\"justify\">Kh&ocirc;ng thỏa m&atilde;n với lời giải th&iacute;ch tr&ecirc;n, một phụ nữ sấn tới chửi mắng &ocirc;ng Khoa thậm tệ khiến &ldquo;gia chủ&rdquo; tức giận đ&aacute;nh b&agrave; n&agrave;y g&acirc;y thương t&iacute;ch 16%. Ngay sau đ&oacute;, nạn nh&acirc;n đ&atilde; y&ecirc;u cầu cơ quan chức năng khởi tố &ocirc;ng Khoa.</p>\r\n<p class=\"Normal\" align=\"justify\">X&eacute;t thấy nạn nh&acirc;n cũng c&oacute; một phần lỗi, TAND huyện V&acirc;n Canh đ&atilde; tuy&ecirc;n phạt &ocirc;ng Khoa mức &aacute;n 6 th&aacute;ng t&ugrave; về tội &ldquo;cố &yacute; g&acirc;y thương t&iacute;ch&rdquo; v&agrave; buộc bồi thường hơn 10 triệu đồng.</p>\r\n<p class=\"Normal\" align=\"justify\"><font color=\"#4f4f4f\"><strong>&ldquo;Thổi t&ugrave; v&agrave; h&agrave;ng tổng&rdquo;</strong></font></p>\r\n<p class=\"Normal\" align=\"justify\">Ng&agrave;y 15/12, Phạm Thanh Tuyền (37 tuổi) trong điệu bộ qu&ecirc; m&ugrave;a thẫn thờ rời v&agrave;nh m&oacute;ng ngựa rồi lủi thủi ngồi b&oacute; gối trong g&oacute;c ph&ograve;ng xử &aacute;n. N&eacute;t mặt ảm đạm, Tuyền ph&acirc;n bua về h&agrave;nh vi phạm tội của m&igrave;nh: &ldquo;Cũng tại t&iacute;nh t&ocirc;i rất gh&eacute;t mấy &ocirc;ng ngoại t&igrave;nh n&ecirc;n b&acirc;y giờ phải đi t&ugrave; v&igrave; chuyện... của người kh&aacute;c&rdquo;.</p>\r\n<p class=\"Normal\" align=\"justify\">Theo lời kể, năm 2008, vợ chồng Tuyền dắt d&iacute;u nhau từ Đồng Th&aacute;p l&ecirc;n TP HCM t&igrave;m việc l&agrave;m. Hằng ng&agrave;y, vợ chồng đi l&agrave;m thu&ecirc;, c&ograve;n 3 đứa con nhỏ cũng chia nhau đi b&aacute;n v&eacute; số.</p>\r\n<p class=\"normal\" align=\"justify\">C&ocirc;ng việc dần ổn định, chồng Tuyền gọi anh rể l&ecirc;n th&agrave;nh phố c&ugrave;ng đi l&agrave;m phụ hồ với m&igrave;nh. Được một thời gian, &ocirc;ng anh n&agrave;y nảy sinh t&igrave;nh cảm với một phụ nữ t&ecirc;n Hoa n&ecirc;n n&oacute;i dối l&agrave; đ&atilde; ly dị vợ v&agrave; chuyển đến ở hẳn nh&agrave; b&agrave; n&agrave;y.</p>\r\n<p class=\"normal\" align=\"justify\">Thấy việc &ldquo;chướng mắt&rdquo;, Tuyền gọi điện về qu&ecirc; kể hết sự t&igrave;nh với chị chồng v&agrave; giục phải nhanh ch&oacute;ng &quot;l&agrave;m cho ra nhẽ&quot;. Sau đ&oacute;, Tuyền v&agrave; chị chồng t&igrave;m đến &quot;ổ nhền nhện&quot; n&oacute;i hết sự t&igrave;nh. Chị Hoa hứa sẽ cắt đứt mọi quan hệ v&agrave; đuổi người t&igrave;nh khỏi nh&agrave;. Nhưng vẫn c&ograve;n ấm ức, tối h&ocirc;m đ&oacute;, được chị chồng rủ quay lại để n&oacute;i chuyện &ldquo;phải quấy&rdquo;, Tuyền đ&atilde; đồng &yacute; ngay. </p>\r\n<p class=\"normal\" align=\"justify\">Đến nơi, thấy chị Hoa từ chối tiếp chuyện v&igrave; đang c&oacute; kh&aacute;ch, những người đ&agrave;n b&agrave; liền x&ocirc;ng v&agrave;o đ&aacute;nh chủ nh&agrave;. Tuyền th&igrave; lột quần của nạn nh&acirc;n vứt đi. Thế l&agrave; Tuyền bị xử phạt 3 th&aacute;ng t&ugrave; về tội &ldquo;l&agrave;m nhục người kh&aacute;c&rdquo;, c&ograve;n những c&uacute; đ&aacute;nh của người chị chồng với t&igrave;nh địch chẳng g&acirc;y thương t&iacute;ch n&ecirc;n kh&ocirc;ng bị xử l&yacute;.</p>\r\n<p class=\"Normal\" align=\"justify\"><font color=\"#4f4f4f\"><strong>&ldquo;Ốc mượn hồn&rdquo;</strong></font></p>\r\n<p class=\"Normal\" align=\"justify\">Theo một thẩm ph&aacute;n, c&oacute; lẽ vụ &aacute;n hai người đ&agrave;n &ocirc;ng bu&ocirc;n trứng tự phong cho m&igrave;nh l&agrave; &ldquo;cảnh s&aacute;t h&igrave;nh sự&rdquo; để &ldquo;giữ g&igrave;n an ninh trật tự&rdquo; tại thị trấn T&acirc;n Nghĩa (huyện H&agrave;m T&acirc;n) thuộc v&agrave;o loại &ldquo;xưa nay hiếm&rdquo;. Bởi theo vị n&agrave;y, hầu hết những người phạm tội &ldquo;giả mạo cấp bậc, chức vụ&rdquo; đều v&igrave; mục đ&iacute;ch tư lợi c&aacute; nh&acirc;n, c&ograve;n hai anh l&aacute;i bu&ocirc;n d&ugrave;ng chi&ecirc;u &ldquo;ốc mượn hồn&rdquo; lại chỉ muốn &ldquo;dẹp loạn&rdquo; tại địa phương m&igrave;nh.</p>\r\n<p class=\"Normal\" align=\"justify\">Theo nội dung vụ &aacute;n, trong qu&aacute; tr&igrave;nh bu&ocirc;n b&aacute;n trứng, Nguyễn Văn Dũng v&agrave; Nguyễn Quang H&ugrave;ng rất bức x&uacute;c trước nhiều tệ nạn mại d&acirc;m, cờ bạc&hellip; đang ho&agrave;nh h&agrave;nh tại thị trấn nhỏ b&eacute; n&agrave;y. Một dịp t&igrave;nh cờ, Dũng nhặt được đ&ocirc;i gi&agrave;y của ng&agrave;nh c&ocirc;ng an đ&atilde; hỏng n&ecirc;n đem về sửa chữa v&agrave; sử dụng. Tự ngắm trong gương thấy m&igrave;nh bỗng &ldquo;oai&rdquo; hẳn, người n&agrave;y nảy sinh &yacute; định rủ H&ugrave;ng sắm th&ecirc;m c&aacute;i cặp da để &ldquo;đi l&agrave;m c&ocirc;ng an&rdquo; đến những tụ điểm ăn chơi &ldquo;xử l&yacute;&rdquo;.</p>\r\n<p class=\"Normal\" align=\"justify\">Theo đ&oacute;, ng&agrave;y 26/2, hai vị &ldquo;c&aacute;n bộ&rdquo; ph&aacute;t hiện nữ nh&acirc;n vi&ecirc;n một qu&aacute;n &ldquo;vui vẻ&rdquo; nổi tiếng đang c&ugrave;ng kh&aacute;ch mua d&acirc;m đến nh&agrave; trọ n&ecirc;n ập v&agrave;o &ldquo;lập bi&ecirc;n bản&rdquo;. Sau khi &ldquo;cảnh c&aacute;o&rdquo;, H&ugrave;ng v&agrave; Dũng đ&atilde; từ chối thẳng thừng số tiền &ldquo;bồi dưỡng&rdquo; v&agrave; kh&ocirc;ng qu&ecirc;n răn đe, bắt chủ nh&agrave; trọ viết cam kết, thực hiện đ&uacute;ng quy định kinh doanh.</p>\r\n<p class=\"Normal\" align=\"justify\">Cứ thế, chỉ trong một thời gian ngắn, hai &ldquo;cảnh s&aacute;t h&igrave;nh sự&rdquo; đ&atilde; đến nhiều tụ điểm b&aacute;t nh&aacute;o tại thị trấn T&acirc;n Nghĩa y&ecirc;u cầu &ldquo;giữ g&igrave;n an ninh trật tự&rdquo;, buộc chủ qu&aacute;n phải cam kết kh&ocirc;ng hoạt động chứa chấp mại d&acirc;m, cờ bạc... D&ugrave; những người n&agrave;y lu&ocirc;n d&uacute;i &ldquo;phong b&igrave;&rdquo; v&agrave; kh&ocirc;ng t&iacute;nh tiền thuốc, nước, nhưng H&ugrave;ng v&agrave; Dũng đều từ chối thẳng thừng, thậm ch&iacute; c&ograve;n đ&ograve;i &ldquo;lập bi&ecirc;n bản&rdquo; về h&agrave;nh vi &ldquo;hối lộ&rdquo;.</p>\r\n<p class=\"Normal\" align=\"justify\">Trước sự mẫn c&aacute;n của hai vị &ldquo;c&aacute;n bộ c&ocirc;ng an&rdquo;, h&agrave;ng chục g&aacute;i mại d&acirc;m đ&atilde; rủ nhau rời khỏi địa phương v&igrave; sợ bị bắt, thậm ch&iacute; một qu&aacute;n đ&egrave;n mờ cũng phải đ&oacute;ng cửa. Thời gian sau, do nghi ngờ, c&aacute;c chủ qu&aacute;n đ&atilde; tố c&aacute;o sự việc n&ecirc;n H&ugrave;ng v&agrave; Dũng bị c&ocirc;ng an huyện H&agrave;m T&acirc;n bắt ngay sau đ&oacute;.</p>\r\n<p class=\"normal\" align=\"justify\">Tại hai cấp t&ograve;a x&eacute;t xử, H&ugrave;ng v&agrave; Dũng khai nhận to&agrave;n bộ h&agrave;nh vi phạm tội nhưng cho rằng m&igrave;nh l&agrave;m như vậy v&igrave; muốn cho cuộc sống tốt đẹp hơn, kh&ocirc;ng vụ lợi bản th&acirc;n hay mục đ&iacute;ch kh&aacute;c, kh&ocirc;ng biết như thế l&agrave; phạm tội... Tuy nhi&ecirc;n, ng&agrave;y 23/10, TAND tỉnh B&igrave;nh Thuận vẫn tuy&ecirc;n phạt mỗi bị c&aacute;o 9 th&aacute;ng t&ugrave; về tội &ldquo;giả mạo cấp bậc, chức vụ&rdquo;.</p>\r\n<p class=\"Normal\" align=\"justify\"><font color=\"#4f4f4f\"><strong>M&oacute;n thịt vịt gi&aacute; đắt</strong></font></p>\r\n<p class=\"Normal\" align=\"justify\">Vụ &aacute;n &ldquo;hi hữu&rdquo; n&agrave;y xảy ra ở L&acirc;m Đồng nhưng lại khiến kh&ocirc;ng &iacute;t những người l&agrave;m luật tr&ecirc;n cả nước phải tranh c&atilde;i bởi ranh giới x&aacute;c định tội danh để quyết định h&igrave;nh phạt đối với c&aacute;c bị c&aacute;o l&agrave; qu&aacute; mỏng manh. C&ograve;n với những người trong cuộc, đ&acirc;y sẽ l&agrave; b&agrave;i học &ldquo;để đời&rdquo; cho c&aacute;ch h&agrave;nh xử trong cuộc sống.</p>\r\n<p class=\"Normal\" align=\"justify\">Theo c&aacute;o trạng, tối 28/9/2008, Trương Ngọc Quyền, Vy Ho&agrave;ng Bảo Hưng, Vy Kim Long v&agrave; Nguyễn Thanh H&agrave; rủ nhau gầy s&ograve;ng nhậu. Cuộc vui đang độ cao tr&agrave;o th&igrave; hết mồi nhậu, Quyền sực nhớ nh&agrave; h&agrave;ng x&oacute;m c&oacute; nu&ocirc;i cả ng&agrave;n con vịt v&agrave; đ&atilde; từng xin được một con vịt qu&egrave; về l&agrave;m thịt n&ecirc;n xung phong đi &ldquo;kiếm mồi&rdquo;.</p>\r\n<p class=\"Normal\" align=\"justify\">Tuy nhi&ecirc;n, vừa ngỏ lời, Quyền kh&ocirc;ng những bị từ chối thẳng m&agrave; c&ograve;n bị bạn của người coi vịt mắng cho một trận. Do trước đ&oacute; c&oacute; m&acirc;u thuẫn với gia đ&igrave;nh người n&agrave;y, Quyền tức giận rủ cả nh&oacute;m sang &ldquo;l&agrave;m cho một trận&rdquo;. Ph&aacute;t hiện &ldquo;kẻ lạ&rdquo;, người coi vịt cầm đ&egrave;n pin đi ra th&igrave; bị Hưng n&eacute;m đ&aacute; n&ecirc;n chạy trở lại nh&agrave; đ&oacute;ng cửa. Sau đ&oacute;, nh&oacute;m Quyền đ&atilde; bắt 2 con vịt đưa về l&agrave;m mồi nhậu tiếp.</p>\r\n<p class=\"Normal\" align=\"justify\">Sự việc đổ bể, 3 người h&ugrave;n tiền đền cho chủ đ&agrave;n vịt 2 triệu đồng nhưng vẫn bị bắt, c&ograve;n H&agrave; nhanh ch&acirc;n bỏ trốn. Sau nhiều lần trả hồ sơ, ng&agrave;y 10/8, TAND huyện Đức Trọng (tỉnh L&acirc;m Đồng) đ&atilde; tuy&ecirc;n phạt Trương Ngọc Quyền 5 năm t&ugrave;, Vy Ho&agrave;ng Bảo Hưng v&agrave; Vy Kim Long mỗi người 4 năm t&ugrave; về tội &ldquo;cướp t&agrave;i sản&rdquo;. Qu&aacute; &ldquo;cay đắng&rdquo;, cả 3 người đ&atilde; l&agrave;m đơn kh&aacute;ng c&aacute;o k&ecirc;u oan v&igrave; cho rằng m&igrave;nh kh&ocirc;ng chủ &yacute; k&eacute;o sang cướp vịt m&agrave; chỉ muốn &ldquo;h&ugrave;&rdquo; người đ&atilde; mắng chửi Quyền.</p>\r\n<p class=\"Normal\" align=\"justify\">Ng&agrave;y 26/10, TAND tỉnh L&acirc;m Đồng nhận định vụ &aacute;n c&ograve;n nhiều điểm chưa r&otilde;, cấp sơ thẩm tuy&ecirc;n c&aacute;c bị c&aacute;o phạm tội &ldquo;cướp t&agrave;i sản&rdquo; l&agrave; chưa đủ cơ sở n&ecirc;n đ&atilde; tuy&ecirc;n hủy bản &aacute;n tr&ecirc;n để điều tra, x&eacute;t xử lại.</p>\r\n<p class=\"Normal\" align=\"justify\">Như vậy, đến l&uacute;c n&agrave;y, Quyền v&agrave; c&aacute;c bạn của m&igrave;nh vẫn phải hồi hộp lo sợ cho bản &aacute;n sắp tới d&agrave;nh cho m&igrave;nh chỉ v&igrave; m&oacute;n thịt vịt đắt gi&aacute;.</p>\r\n<p class=\"Normal\" align=\"justify\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; (Theo VN Express)</p>\r\n<p class=\"Normal\" align=\"justify\">&nbsp;</p>', 'images/content/news_s187.jpg', NULL, 0, 0, '2009-12-29 13:06:48', '2009-12-29 13:06:48', 'vn', 0);
INSERT INTO `tbl_content` (`id`, `code`, `name`, `parent`, `subject`, `detail_short`, `detail`, `image`, `image_large`, `sort`, `status`, `date_added`, `last_modified`, `lang`, `new`) VALUES
(188, '', 'Khám phá lăng mộ Tào Tháo', 8, '', 'Trong khu mộ được cho l&agrave; của T&agrave;o Th&aacute;o c&oacute; ba bộ xương, một nam v&agrave; hai nữ, c&ugrave;ng b&agrave;i vị khắc chữ &quot;Ngụy Vũ đế&quot;. <br />', '<table cellspacing=\"0\" cellpadding=\"3\" width=\"1\" align=\"center\" border=\"0\">\r\n    <tbody>\r\n        <tr>\r\n            <td><img height=\"314\" alt=\"Mộ của Tào Tháo có diện tích 740 m2\" src=\"http://vnexpress.net/Files/Subject/3B/A1/73/11/Tao.jpg\" width=\"470\" /></td>\r\n        </tr>\r\n        <tr>\r\n            <td class=\"Image\">C&aacute;c nh&agrave; khảo cổ học Trung Quốc bắt đầu khai quật mộ được cho l&agrave; của Ngụy vương T&agrave;o Th&aacute;o từ cuối năm ngo&aacute;i. Đ&acirc;y l&agrave; cảnh b&ecirc;n trong khu mộ c&oacute; diện t&iacute;ch 740 m2 v&agrave; được chia th&agrave;nh hai ngăn. C&aacute;c nh&agrave; khoa học cho rằng T&agrave;o Th&aacute;o đ&atilde; được ch&ocirc;n c&ugrave;ng vợ v&agrave; một nữ hầu. Người ta c&ograve;n t&igrave;m thấy những tấm b&agrave;i vị c&oacute; d&ograve;ng chữ &quot;Ngụy Vũ đế&quot;. Ảnh: <em>Reuters</em>.</td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<table cellspacing=\"0\" cellpadding=\"3\" width=\"1\" align=\"center\" border=\"0\">\r\n    <tbody>\r\n        <tr>\r\n            <td><img height=\"304\" src=\"http://vnexpress.net/Files/Subject/3B/A1/73/11/caocao6.gif\" width=\"450\" border=\"1\" alt=\"\" /></td>\r\n        </tr>\r\n        <tr>\r\n            <td class=\"Image\">Một cừa v&ograve;m b&ecirc;n trong khu mộ. Ảnh: <em>Reuters. </em></td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<table cellspacing=\"0\" cellpadding=\"3\" width=\"1\" align=\"center\" border=\"0\">\r\n    <tbody>\r\n        <tr>\r\n            <td><img height=\"234\" alt=\"Toàn cảnh ngôi mộ nhìn từ trên cao. Ảnh: Reuters.\" src=\"http://vnexpress.net/Files/Subject/3B/A1/73/11/Tao1.jpg\" width=\"470\" /></td>\r\n        </tr>\r\n        <tr>\r\n            <td class=\"Image\">To&agrave;n cảnh ng&ocirc;i mộ nh&igrave;n từ tr&ecirc;n cao. Ảnh: <em>Reuters</em>.</td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<table cellspacing=\"0\" cellpadding=\"3\" width=\"1\" align=\"center\" border=\"0\">\r\n    <tbody>\r\n        <tr>\r\n            <td><img height=\"316\" alt=\"Lối dẫn xuống mộ.\" src=\"http://vnexpress.net/Files/Subject/3B/A1/73/11/Tao2.jpg\" width=\"470\" /></td>\r\n        </tr>\r\n        <tr>\r\n            <td class=\"Image\">Lối dẫn xuống mộ. Ảnh: <em>Reuters.</em></td>\r\n        </tr>\r\n    </tbody>\r\n</table>', 'images/content/news_s188.jpg', NULL, 0, 0, '2009-12-29 13:09:53', '2009-12-29 13:09:53', 'vn', 0),
(189, '', 'Căn hộ triệu USD trung tâm Sài Gòn kén khách', 8, '', 'Giới bu&ocirc;n địa ốc S&agrave;i G&ograve;n đang bị &quot;cho&aacute;ng&quot; về dự &aacute;n căn hộ triệu đ&ocirc; tr&ecirc;n đảo Kim Cương, c&aacute;ch trung t&acirc;m quận 1, hơn 10 ph&uacute;t đi du thuyền, chỉ ch&agrave;o b&aacute;n hạn chế, kh&aacute;ch gi&agrave;u sang danh tiếng mới được &quot;chọn mặt gửi v&agrave;ng&quot;.', '<p class=\"Normal\" align=\"justify\">Tin đồn về dự án bất động sản ở quận nhì (quận 2) trên đảo Kim Cương cung cấp cho thị trường những căn hộ có vị trí, thiết kế, chất lượng và môi trường sống thuộc hàng độc nhất vô nhị ở TP HCM, đã khiến dư luận xôn xao. Các căn hộ này có giá cao nhất lên đến 3 triệu USD một căn, tọa lạc trên cù lao hình giọt nước nổi lên trên sông Sài Gòn. Nhiều người truyền tai nhau là siêu sao Holywood Brad Pitt và ca sĩ Tuấn Ngọc đã đến tham quan, đặt hàng mua một căn. </p>\r\n<p class=\"Normal\" align=\"justify\">Cũng theo nhiều tin đồn trong suốt năm qua, chủ đầu tư dự án không bán căn hộ đại trà mà chọn lọc cư dân tương lai theo tiêu chuẩn đặc biệt, thậm chí cấm chuyển nhượng. Đồng thời chủ đầu tư còn tậu hẳn một du thuyền trị giá vài triệu USD từ Anh về Việt Nam, chỉ để đưa đón khách VIP đến tham quan hòn đảo và tìm hiểu về dự án. </p>\r\n<div align=\"justify\">\r\n<table cellspacing=\"0\" cellpadding=\"3\" width=\"1\" align=\"center\" border=\"0\">\r\n    <tbody>\r\n        <tr>\r\n            <td><img height=\"220\" src=\"http://vnexpress.net/Files/Subject/3B/A1/72/ED/a-tb-diamond-f-2.jpg\" width=\"450\" border=\"1\" alt=\"\" /></td>\r\n        </tr>\r\n        <tr>\r\n            <td class=\"Image\">Du thuyền trị giá 2 triệu USD được chủ đầu tư dự án Diamond Island mua từ Anh quốc có tên gọi Princess 58 Yacht vượt qua chuyến hành trình dài tới Singapore rồi đến Việt Nam, sau đó Princess 58 được đổi quốc tịch Việt Nam với tên mới là Diamond Island. Ảnh: <em designtimesp=\"2213\">princess.co.uk.</em> </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</div>\r\n<p class=\"Normal\" align=\"justify\">Tọa lạc ngay ngã ba sông Sài Gòn và sông Giồng Ông Tố, quận 2, chỉ mất 10 phút đi bằng ca nô từ bến Bạch Đằng phía trung tâm Sài Gòn, là tới hòn đảo này. Bên phải dự án đối diện với bến du thuyền trên sông Giồng Ông Tố là khu đô thị Thủ Thiêm đã được quy hoạch thành trung tâm mới của TP HCM. Bên trái của đảo tiếp giáp với sông Sài Gòn, gần cầu Phú Mỹ nối quận 7 và quận 2. Tuy nhiên, để vào được hòn đảo mọi người sẽ phải đi bằng một con đường độc đạo vì tất cả các mặt của dự án đều là sông nước. </p>\r\n<p class=\"Normal\" align=\"justify\">Có khá nhiều giai thoại được thêu dệt về cái tên của hòn đảo này. Có người kể rằng, tên Kim Cương ra đời sau khi các chủ nhân của đảo mời một nhà phong thủy đến xem địa thế. Do đảo nằm ở vị trí “thanh long thụ châu” tức ngọc trong miệng rồng nên được đặt tên là Kim Cương. Tuy nhiên cũng có lời bình phẩm từ trên cao nhìn xuống cù lao rất giống hình tam giác, được phủ đầy cây cối như một viên ngọc xanh duy nhất trên sông Sài Gòn nên được gán cho cái tên của loại trang sức quý hiếm có kết cấu bền vững, vĩnh cửu là Kim Cương. </p>\r\n<div align=\"justify\">\r\n<table cellspacing=\"0\" cellpadding=\"3\" width=\"1\" align=\"center\" border=\"0\">\r\n    <tbody>\r\n        <tr>\r\n            <td><img height=\"320\" src=\"http://vnexpress.net/Files/Subject/3B/A1/72/ED/a-diamond-6.jpg\" width=\"450\" border=\"1\" alt=\"\" /></td>\r\n        </tr>\r\n        <tr>\r\n            <td class=\"Image\">Vị trí tuyệt đẹp và phối cảnh của Diamond Island. Ảnh: <em designtimesp=\"2224\">C.C.</em></td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</div>\r\n<p class=\"Normal\" align=\"justify\">Đây là hòn đảo được UBND TP HCM tổ chức bán đấu giá quyền sử dụng đất. Công ty cổ phần Bình Thiên An đã thắng đấu giá để sở hữu cả đảo Kim Cương và xây dựng dự án căn hộ cao cấp tại đây. Nhiều nguồn tin không chính thức về nguồn gốc thâm cung bí sử của dự án này, từ khâu đấu giá, tổ chức cuộc thi thiết kế kiến trúc quốc tế đến lúc thực hiện, bán sản phẩm đều kỳ lạ và không khác gì chuyện chỉ có trên phim. Trong đó, kiến trúc của căn hộ Diamond Island là một trong những đề tài được bàn tán nhiều nhất. </p>\r\n<p class=\"Normal\" align=\"justify\">Người thiết kế dự án này là kiến trúc sư lừng danh của Nhật Bản, Arata Isozaki. Ông là người đã giành giải nhì cuộc thi có tổng giải thưởng một triệu USD để tìm kiếm thiết kế phù hợp nhất cho công trình này, tổ chức năm 2008. Ông cũng là một trong những cây đại thụ của kiến trúc quốc tế với các công trình: Tháp nghệ thuật Mito (Nhật Bản), Viện bảo tàng nghệ thuật đương đại (Los Angeles-Mỹ), Nhà ga trung tâm Bologna (Italy), Trung tâm nghệ thuật Shanghai Zendai Himalayas (Trung Quốc), Nhà thi đấu thể thao thế vận hội mùa hè 1992 (Tây Ban Nha). </p>\r\n<div align=\"justify\">\r\n<table cellspacing=\"0\" cellpadding=\"3\" width=\"1\" align=\"center\" border=\"0\">\r\n    <tbody>\r\n        <tr>\r\n            <td><img height=\"320\" src=\"http://vnexpress.net/Files/Subject/3B/A1/72/ED/a-diamond-15.jpg\" width=\"450\" border=\"1\" alt=\"\" /></td>\r\n        </tr>\r\n        <tr>\r\n            <td class=\"Image\">Kiến trúc sư Arata Isozaki trong cuộc thi một triệu USD tìm kiếm giải pháp thiết kế và phương án thi công phù hợp nhất cho dự án trên đảo Kim Cương. Dù đạt hạng nhì nhưng tác phẩm của ông Arata vẫn được chọn vì kiến trúc độc đáo. Ảnh: <em designtimesp=\"2235\">C.C.</em></td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</div>\r\n<p class=\"Normal\" align=\"justify\">Từ những yếu tố tự nhiên của hòn đảo và vị trí phong thủy hiếm có, ông Arata Isozaki đã đưa ra thiết kế dạng tổ ong cho các tòa nhà. Phối hợp hướng gió trên không, hướng nước của hai dòng chảy dưới sông Sài Gòn và sông Giồng Ông Tố, ông Arata sáng tạo nên kết cấu dạng lệch tầng. Cấu trúc này khiến các căn hộ đều có nhiều mặt tiếp xúc với không gian bên ngoài, thông thoáng và chan hòa với thiên nhiên xung quanh. </p>\r\n<p class=\"Normal\" align=\"justify\">Ý tưởng thiết kế này thậm chí còn tuân thủ đúng cái tên của hòn đảo vì nhìn từ nhiều góc khác nhau, mỗi căn hộ sẽ có hình dạng như một viên kim cương lấp lánh. Để làm nổi bật các vila, ông sáng tạo thêm những ngọn đồi cao 9m với sườn dốc thoải nhẹ xuống, giấu kín toàn bộ các công trình hạ tầng và đường giao thông bên dưới giúp hòn đảo vươn lên như một mảng xanh trên sông Sài Gòn. </p>\r\n<div align=\"justify\">\r\n<table cellspacing=\"0\" cellpadding=\"3\" width=\"1\" align=\"center\" border=\"0\">\r\n    <tbody>\r\n        <tr>\r\n            <td><img height=\"320\" src=\"http://vnexpress.net/Files/Subject/3B/A1/72/ED/a-diamond-8.jpg\" width=\"450\" border=\"1\" alt=\"\" /></td>\r\n        </tr>\r\n        <tr>\r\n            <td class=\"Image\">Một phối cảnh của dự án với các căn hộ có hình tổ ong và không gian mở về phía chân trời. Ảnh: <em designtimesp=\"2246\">C.C.</em></td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</div>\r\n<p class=\"Normal\" align=\"justify\">Trao đổi với <em designtimesp=\"22597\">VnExpress.net</em> ngày 26/12 về tin đồn Brad Pitt và Tuấn Ngọc đặt hàng dự án Diamond Island, Tổng giám đốc Công ty cổ phần Bình Thiên An (BTA) Trịnh Thanh Huy xác nhận: \"<strong designtimesp=\"8325\"><font color=\"#4f4f4f\">Họ đã đến đây nhưng chưa đưa ra quyết định cuối cùng. Chúng tôi quảng bá dự án trên các kênh thông tin quốc tế nên người nước ngoài hoặc nhân vật nổi tiếng thế giới quan tâm không có gì lạ</font></strong>\". </p>\r\n<p class=\"Normal\" align=\"justify\">Ông Huy thừa nhận, dự án Diamond Island có 1.100 căn hộ nhưng chỉ bán 50%, tức có khoảng 500 căn sẽ chào bán cho những khách hàng đã được chọn lựa kỹ lưỡng. Điều kiện ràng buộc ghi rõ trong hợp đồng là trong 2 năm không được chuyển nhượng. \"Chúng tôi có một cơ sở dữ liệu lên đến 10.000 khách hàng ưu tú, thành đạt và đứng đắn để giới thiệu dự án. Trung bình cứ 2 khách được mời mua, sẽ có một người ngỏ ý đặt hàng\", ông Huy tiết lộ. </p>\r\n<p class=\"Normal\" align=\"justify\">Lãnh đạo Công ty BTA trần tình, mặc dù giá bán từ 300.000 đến 3 triệu USD mỗi căn (không tính theo m2), là mức giá cao nhất Việt Nam tính đến năm 2009, nhưng doanh nghiệp vẫn chưa có lãi nên quyết định giữ lại 50% sản phẩm. </p>\r\n<p class=\"Normal\" align=\"justify\">Giải thích việc tiếp thị lạ đời, không bán đại trà mà chọn mặt gửi vàng, ông Huy cho hay, đó là cách xây dựng nền tảng ban đầu cho cư dân tương lai theo tiêu chí tạo một cộng đồng văn minh, môi trường xã hội thân thiện, nhân văn, thì dự án sẽ có giá trị cao. Ông tiết lộ thêm, ngoài danh sách người thành đạt được chủ đầu tư chọn lọc để bán dự án, những khách hàng chính thức cũng sẽ được lựa chọn láng giềng tương lai, tức là có quyền tiếp thị cho bạn bè cùng đẳng cấp đến tham quan và mua căn hộ. </p>\r\n<p class=\"Normal\" align=\"justify\">Thống kê sơ bộ của BTA, dự án chỉ bán hơn 50 căn hill vila và sky vila trị giá 1-3 triệu USD, hiện nay 40% căn hộ có giá 1-2 triệu USD đã bán hết. Ông Huy còn dự báo rằng, trong vòng 2 năm nữa, giá của dự án sẽ tăng từ 50-100%. </p>', 'images/content/news_s189.jpg', NULL, 0, 0, '2009-12-29 13:14:12', '2009-12-29 13:18:18', 'vn', 0),
(192, '', 'Samsung Galaxy S III ra mắt với màn hình 4,8 inch1', 8, '', '<!--[if gte mso 9]><xml>\r\n<w:LatentStyles DefLockedState=\"false\" DefUnhideWhenUsed=\"true\"\r\nDefSemiHidden=\"true\" DefQFormat=\"false\" DefPriority=\"99\"\r\nLatentStyleCount=\"267\">\r\n<w:LsdException Locked=\"false\" Priority=\"0\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Normal\" />\r\n<w:LsdException Locked=\"false\" Priority=\"9\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"heading 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 3\" />\r\n<w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 4\" />\r\n<w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 5\" />\r\n<w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 6\" />\r\n<w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 7\" />\r\n<w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 8\" />\r\n<w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 9\" />\r\n<w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 3\" />\r\n<w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 4\" />\r\n<w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 5\" />\r\n<w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 6\" />\r\n<w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 7\" />\r\n<w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 8\" />\r\n<w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 9\" />\r\n<w:LsdException Locked=\"false\" Priority=\"35\" QFormat=\"true\" Name=\"caption\" />\r\n<w:LsdException Locked=\"false\" Priority=\"10\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Title\" />\r\n<w:LsdException Locked=\"false\" Priority=\"1\" Name=\"Default Paragraph Font\" />\r\n<w:LsdException Locked=\"false\" Priority=\"11\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtitle\" />\r\n<w:LsdException Locked=\"false\" Priority=\"22\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Strong\" />\r\n<w:LsdException Locked=\"false\" Priority=\"20\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Emphasis\" />\r\n<w:LsdException Locked=\"false\" Priority=\"59\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Table Grid\" />\r\n<w:LsdException Locked=\"false\" UnhideWhenUsed=\"false\" Name=\"Placeholder Text\" />\r\n<w:LsdException Locked=\"false\" Priority=\"1\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"No Spacing\" />\r\n<w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light Shading\" />\r\n<w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light List\" />\r\n<w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light Grid\" />\r\n<w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Shading 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Shading 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium List 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium List 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 3\" />\r\n<w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Dark List\" />\r\n<w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful Shading\" />\r\n<w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful List\" />\r\n<w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful Grid\" />\r\n<w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light Shading Accent 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light List Accent 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light Grid Accent 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 1\" />\r\n<w:LsdException Locked=\"false\" UnhideWhenUsed=\"false\" Name=\"Revision\" />\r\n<w:LsdException Locked=\"false\" Priority=\"34\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"List Paragraph\" />\r\n<w:LsdException Locked=\"false\" Priority=\"29\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Quote\" />\r\n<w:LsdException Locked=\"false\" Priority=\"30\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Quote\" />\r\n<w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Dark List Accent 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful List Accent 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 1\" />\r\n<w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light Shading Accent 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light List Accent 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light Grid Accent 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Dark List Accent 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful List Accent 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 2\" />\r\n<w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light Shading Accent 3\" />\r\n<w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light List Accent 3\" />\r\n<w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light Grid Accent 3\" />\r\n<w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 3\" />\r\n<w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 3\" />\r\n<w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 3\" />\r\n<w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 3\" />\r\n<w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 3\" />\r\n<w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 3\" />\r\n<w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 3\" />\r\n<w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Dark List Accent 3\" />\r\n<w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 3\" />\r\n<w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful List Accent 3\" />\r\n<w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 3\" />\r\n<w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light Shading Accent 4\" />\r\n<w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light List Accent 4\" />\r\n<w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light Grid Accent 4\" />\r\n<w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 4\" />\r\n<w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 4\" />\r\n<w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 4\" />\r\n<w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 4\" />\r\n<w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 4\" />\r\n<w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 4\" />\r\n<w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 4\" />\r\n<w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Dark List Accent 4\" />\r\n<w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 4\" />\r\n<w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful List Accent 4\" />\r\n<w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 4\" />\r\n<w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light Shading Accent 5\" />\r\n<w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light List Accent 5\" />\r\n<w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light Grid Accent 5\" />\r\n<w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 5\" />\r\n<w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 5\" />\r\n<w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 5\" />\r\n<w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 5\" />\r\n<w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 5\" />\r\n<w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 5\" />\r\n<w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 5\" />\r\n<w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Dark List Accent 5\" />\r\n<w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 5\" />\r\n<w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful List Accent 5\" />\r\n<w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 5\" />\r\n<w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light Shading Accent 6\" />\r\n<w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light List Accent 6\" />\r\n<w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Light Grid Accent 6\" />\r\n<w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 6\" />\r\n<w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 6\" />\r\n<w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 6\" />\r\n<w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 6\" />\r\n<w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 6\" />\r\n<w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 6\" />\r\n<w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 6\" />\r\n<w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Dark List Accent 6\" />\r\n<w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 6\" />\r\n<w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful List Accent 6\" />\r\n<w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 6\" />\r\n<w:LsdException Locked=\"false\" Priority=\"19\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtle Emphasis\" />\r\n<w:LsdException Locked=\"false\" Priority=\"21\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Emphasis\" />\r\n<w:LsdException Locked=\"false\" Priority=\"31\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtle Reference\" />\r\n<w:LsdException Locked=\"false\" Priority=\"32\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Reference\" />\r\n<w:LsdException Locked=\"false\" Priority=\"33\" SemiHidden=\"false\"\r\nUnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Book Title\" />\r\n<w:LsdException Locked=\"false\" Priority=\"37\" Name=\"Bibliography\" />\r\n<w:LsdException Locked=\"false\" Priority=\"39\" QFormat=\"true\" Name=\"TOC Heading\" />\r\n</w:LatentStyles>\r\n</xml><![endif]--><!--[if gte mso 10]>\r\n<style>\r\n/* Style Definitions */\r\ntable.MsoNormalTable\r\n{mso-style-name:\"Table Normal\";\r\nmso-tstyle-rowband-size:0;\r\nmso-tstyle-colband-size:0;\r\nmso-style-noshow:yes;\r\nmso-style-priority:99;\r\nmso-style-qformat:yes;\r\nmso-style-parent:\"\";\r\nmso-padding-alt:0cm 5.4pt 0cm 5.4pt;\r\nmso-para-margin:0cm;\r\nmso-para-margin-bottom:.0001pt;\r\nline-height:115%;\r\nmso-pagination:widow-orphan;\r\nfont-size:11.0pt;\r\nfont-family:\"Calibri\",\"sans-serif\";\r\nmso-ascii-font-family:Calibri;\r\nmso-ascii-theme-font:minor-latin;\r\nmso-fareast-font-family:\"Times New Roman\";\r\nmso-fareast-theme-font:minor-fareast;\r\nmso-hansi-font-family:Calibri;\r\nmso-hansi-theme-font:minor-latin;\r\nmso-bidi-font-family:\"Times New Roman\";\r\nmso-bidi-theme-font:minor-bidi;}\r\n</style>\r\n<![endif]-->\r\n<h2><span style=\"font-size:12.0pt;font-family:\">Galaxy S III có màn hình Super AMOLED đ&ocirc;̣ ph&acirc;n giải HD. Máy sử dụng chip xử lý 4 nh&acirc;n t&ocirc;́c đ&ocirc;̣ 1,4 GHz, thi&ecirc;́t k&ecirc;́ th&acirc;n thi&ecirc;̣n m&ocirc;i trường và được bán ra cu&ocirc;́i tháng này.</span></h2>', '<font size=\"2\" face=\"Tahoma\" color=\"#333333\">\r\n<p class=\"Normal\">Samsung  gọi sự ki&ecirc;̣n này là ngày ra sản ph&acirc;̉m lớn nh&acirc;́t trong năm. JK  Shin, quản lý b&ocirc;̣ ph&acirc;̣n di đ&ocirc;̣ng của Samsung c&acirc;̀m model mới tr&ecirc;n tay  và cho biết, thi&ecirc;́t bị có màn hình Super AMOLED r&ocirc;̣ng 4,8 inch,  máy ảnh 8 megapixel và chạy Android 4.0.</p>\r\n<table width=\"1\" cellspacing=\"0\" cellpadding=\"3\" border=\"0\" align=\"center\">\r\n    <tbody>\r\n        <tr>\r\n            <td><img width=\"480\" height=\"335\" border=\"1\" src=\"http://vnexpress.net/Files/Subject/3b/bd/64/85/galaxy_s_iii_1.jpg\" alt=\"\" /></td>\r\n        </tr>\r\n        <tr>\r\n            <td align=\"center\" class=\"Image\">Galaxy S III n&ocirc;́i ti&ecirc;́p thành c&ocirc;ng dòng Galaxy S trước đ&acirc;y. Ảnh: <em>Phương Thúy.</em></td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<p class=\"Normal\">Galaxy S III sử dụng chip xử lý 4 nh&acirc;n Exynos 4212  Quad, t&ocirc;́c đ&ocirc;̣ 1,4 GHz tr&ecirc;n n&ecirc;̀n ARM Cortex v&agrave; RAM 1 GB. Sản phẩm mỏng  8,6 mm, dày hơn model năm ngoái. Máy ảnh 8 megapixel cho phép quay  phim Full HD với đèn flash và m&ocirc;̣t camera phía trước có đ&ocirc;̣ ph&acirc;n  giải g&acirc;̀n 2 megapixel. Gi&ocirc;́ng HTC One X, Galaxy S III cũng cho phép  vừa quay phim, chụp hình cùng lúc.</p>\r\n<p class=\"Normal\">Các đại di&ecirc;̣n của Samsung nh&acirc;́n mạnh vào thi&ecirc;́t  k&ecirc;́ của máy với cảm hứng lấy từ nước, gió, sỏi hay lá c&acirc;y.  Galaxy S III có hai màu trắng và xanh thẫm. H&atilde;ng n&agrave;y cho rằng,  thi&ecirc;́t bị có m&ocirc;̣t màn hình th&ocirc;ng minh, cho phép nh&acirc;̣n di&ecirc;̣n mắt  người dùng và th&acirc;́u hi&ecirc;̉u, lắng nghe được.</p>\r\n<p class=\"Normal\">Chia sẻ mạng xã h&ocirc;̣i cũng được Samsung chú trọng  b&ecirc;n cạnh khả năng k&ecirc;́t n&ocirc;́i Wi-Fi Direct, c&ocirc;ng ngh&ecirc;̣ NFC. Nhà sản  xu&acirc;́t Hàn Qu&ocirc;́c cũng phát tri&ecirc;̉n c&ocirc;ng ngh&ecirc;̣ chia sẻ hình ảnh l&ecirc;n  màn hình lớn với t&ecirc;n gọi All Share Play. Tính năng Direct Call cho  phép người dùng khi đang soạn thảo, chỉ c&acirc;̀m đưa máy l&ecirc;n g&acirc;̀n  tay, cu&ocirc;̣c gọi sẽ được thực hi&ecirc;̣n.</p>\r\n<table width=\"1\" cellspacing=\"0\" cellpadding=\"3\" border=\"0\" align=\"center\">\r\n    <tbody>\r\n        <tr>\r\n            <td><img width=\"480\" height=\"319\" border=\"1\" src=\"http://vnexpress.net/Files/Subject/3b/bd/64/85/galaxy_s_iii_2.jpg\" alt=\"\" /></td>\r\n        </tr>\r\n        <tr>\r\n            <td align=\"center\" class=\"Image\">Máy sẽ bán sớm vào cu&ocirc;́i tháng này. Ảnh: <em>Phương Thúy.</em></td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<p class=\"Normal\">Khác với nhi&ecirc;̀u năm khi chọn MWC làm nơi giới  thi&ecirc;̣u sản ph&acirc;̉m, sự ki&ecirc;̣n Mobile Unpacked 2012 năm nay được Samsung  t&ocirc;̉ chức ở London (Anh). S&acirc;n kh&acirc;́u hoành tráng ở đượcSamsung trang  trí bằng hai màu xanh và trắng. Đ&acirc;y là những màu sắc chính  của sản ph&acirc;̉m sắp ra mắt. Hãng đã trình chi&ecirc;́u những hình ảnh  minh họa với th&ocirc;ng đi&ecirc;̣p &quot;thi&ecirc;́t k&ecirc;́ vì con người&quot; và nh&acirc;̣n được  sự tán thưởng của 1.000 khách tham gia.</p>\r\n<p class=\"Normal\">Smartphone mới của Samsung ra đời trong b&ocirc;́i cảnh  hãng vừa giành được vị trí s&ocirc;́ m&ocirc;̣t tr&ecirc;n thị trường di đ&ocirc;̣ng.  Tu&acirc;̀n trước, họ c&ocirc;ng b&ocirc;́ lãi kỷ lục 5,2 tỷ USD, trong đó nh&acirc;́n  mạnh vào sự thành c&ocirc;ng của Galaxy S II.</p>\r\n<p class=\"Normal\">Galaxy S III n&ocirc;́i ti&ecirc;́p với sự hứa hẹn dành  nhi&ecirc;̀u ng&acirc;n sách hơn cho marketing. Máy dự ki&ecirc;́n sẽ ti&ecirc;u thụ tr&ecirc;n  mức 20 tri&ecirc;̣u chi&ecirc;́c, vượt xa model ti&ecirc;̀n nhi&ecirc;̣m. Các nhà ph&acirc;n tích  cho rằng, Galaxy S III là đ&ocirc;́i thủ lớn với các t&ecirc;n tu&ocirc;̉i khác và  có th&ecirc;̉ giúp Samsung duy trì vị th&ecirc;́ d&acirc;̃n đ&acirc;̀u.</p>\r\n<table width=\"1\" cellspacing=\"0\" cellpadding=\"3\" border=\"0\" align=\"center\">\r\n    <tbody>\r\n        <tr>\r\n            <td><img width=\"480\" height=\"312\" border=\"1\" src=\"http://vnexpress.net/Files/Subject/3b/bd/64/85/galaxy_s_ii_vs_galaxy_s_ii.jpg\" alt=\"\" /></td>\r\n        </tr>\r\n        <tr>\r\n            <td align=\"center\" class=\"Image\">Galaxy S III c&oacute; hai m&agrave;u trắng v&agrave; xanh đậm. Ảnh: <em>Phương Thu&yacute;.</em></td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<p class=\"Normal\">Galaxy S III sẽ được bán ra tại 145 qu&ocirc;́c gia và  296 nhà mạng, trước ti&ecirc;n l&agrave; ở ch&acirc;u &Acirc;u cuối th&aacute;ng n&agrave;y. Máy có ba  phi&ecirc;n bản dung lượng 16, 32 và 64 GB.</p>\r\n<p align=\"right\" class=\"Normal\"><strong>nguon: sohoa.net</strong></p>\r\n</font>', 'images/content/news_s192.jpg', NULL, 1, 0, '2012-05-12 12:03:48', '2013-05-23 13:28:50', 'vn', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_content_category`
--

CREATE TABLE `tbl_content_category` (
  `id` int(11) NOT NULL,
  `code` varchar(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `parent` int(11) NOT NULL DEFAULT '0',
  `subject` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `detail_short` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `detail` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_large` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lang` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_content_category`
--

INSERT INTO `tbl_content_category` (`id`, `code`, `name`, `parent`, `subject`, `detail_short`, `detail`, `image`, `image_large`, `sort`, `status`, `date_added`, `last_modified`, `lang`) VALUES
(1, '', 'Danh mục gốc', 0, '', '', '', NULL, NULL, 0, 0, '0000-00-00 00:00:00', '2009-11-19 09:04:12', ''),
(8, 'vn_news', 'Tin tức & Sự kiện', 2, '', '', '', NULL, NULL, 0, 0, '2009-11-19 09:04:12', '2009-11-19 09:04:12', 'vn'),
(9, 'vn_service', 'Dịch vụ', 2, '', '', '', NULL, NULL, 0, 0, '2009-11-19 09:04:12', '2009-11-19 09:04:12', 'vn'),
(10, 'vn_link', 'Liên kết website', 2, '', '', '', NULL, NULL, 0, 0, '2009-11-19 09:04:12', '2009-11-19 09:04:12', 'vn'),
(11, 'vn_yahoo', 'Hỗ trợ trực tuyến(yahoo)', 2, '', '', '', NULL, NULL, 0, 0, '2009-11-19 09:04:12', '2009-11-19 09:04:12', 'vn'),
(3, 'en', 'English', 1, '', '', '', NULL, NULL, 0, 0, '2009-11-19 09:04:12', '2009-11-19 09:04:12', 'en'),
(2, 'vn', 'Việt nam', 1, '', '', '', NULL, NULL, 0, 0, '2009-11-19 09:04:12', '2009-11-19 09:04:12', 'vn'),
(75, 'vn_logo', 'Logo Quảng cáo', 2, NULL, NULL, NULL, NULL, NULL, 0, 0, '2009-11-19 09:04:12', '2009-11-19 09:04:12', 'vn'),
(76, 'vn_advleft_bottom', 'Quảng cáo trái dưới', 2, NULL, NULL, NULL, NULL, NULL, 0, 0, '2009-11-19 09:04:12', '2009-11-19 09:04:12', 'vn'),
(24, 'vn_advleft_top', 'Quảng cáo trái trên', 2, '', '', '', NULL, NULL, 0, 0, '2009-11-19 09:04:12', '2009-11-19 09:04:12', 'vn'),
(25, 'vn_advright_top', 'Quảng cáo phải trên', 2, '', '', '', NULL, NULL, 0, 0, '2009-11-19 09:04:12', '2009-11-19 09:04:12', 'vn'),
(28, 'vn_intro', 'Giới thiệu', 2, '', '', '', NULL, NULL, 0, 0, '2009-11-19 09:04:12', '2009-11-19 09:04:12', 'vn'),
(30, 'vn_contact', 'Liên hệ', 2, '', '', '', NULL, NULL, 0, 0, '2009-11-19 09:04:12', '2009-11-19 09:04:12', 'vn'),
(74, 'vn_download', 'Download bảng giá', 2, NULL, NULL, NULL, NULL, NULL, 0, 0, '2009-11-19 09:04:12', '2009-11-19 09:04:12', 'vn'),
(77, 'vn_advright_bottom', 'Quảng cáo phải dưới', 2, NULL, NULL, NULL, NULL, NULL, 0, 0, '2009-11-19 09:04:12', '2009-11-19 09:04:12', 'vn');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `sex` int(3) DEFAULT NULL,
  `company` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `uid` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `pwd` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`id`, `name`, `sex`, `company`, `address`, `city`, `country`, `tel`, `fax`, `email`, `website`, `uid`, `pwd`, `status`, `date_added`, `last_modified`) VALUES
(8, 'nguyễn thế hợi', 0, 'vietnext', 'Hoc mon', 'ho chi minh', 'Vietnam', '123456', '08123456789', 'thehoipro200@yahoo.com.vn', 'www.vietnextco.com', 'thehoi', '123456', 0, '2008-04-10 23:51:45', '2021-06-28 20:04:02'),
(10, 'aliababa', 0, 'vietnext', 'doan thi diem', 'ho chi minh', 'Vietnam', '123456', '321654', 'thehoipor200x@yahoo.com', 'aaaaaaa', 'nguyenthehoi', '123456', 0, '2009-06-22 15:10:59', '2021-06-28 20:03:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `member_id` int(11) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `code`, `member_id`, `date_added`, `last_modified`) VALUES
(28, '0', 10, '2009-06-22 15:12:03', '0000-00-00 00:00:00'),
(27, '0', 8, '2009-06-22 14:14:53', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL DEFAULT '0',
  `price` float DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`id`, `order_id`, `product_id`, `quantity`, `price`, `status`) VALUES
(15, 20, 29, 20, 0, 0),
(16, 21, 27, 5, 0, 0),
(17, 21, 31, 6, 0, 0),
(18, 21, 29, 7, 0, 0),
(19, 22, 29, 30, 0, 0),
(20, 22, 32, 20, 0, 0),
(21, 22, 28, 10, 0, 0),
(22, 23, 28, 1, 0, 0),
(23, 23, 27, 1, 0, 0),
(24, 23, 29, 1, 0, 0),
(25, 24, 125, 1, 0, 0),
(26, 25, 127, 5, 0, 0),
(27, 26, 127, 5, 0, 0),
(28, 26, 150, 1, 0, 0),
(29, 27, 152, 10, 0, 0),
(30, 28, 152, 10, 100, 0),
(31, 28, 153, 4, 150, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `code` varchar(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `parent` int(11) NOT NULL DEFAULT '0',
  `subject` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `detail_short` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `detail` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_large` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lang` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `code`, `name`, `parent`, `subject`, `detail_short`, `detail`, `image`, `image_large`, `sort`, `status`, `date_added`, `last_modified`, `lang`, `price`) VALUES
(277, 'a1', '<center>Đèn chùm', 163, '', '-Thương hiệu: MQ</br>\r\n-Xuát xứ: Việt Nam</br>\r\n-Kích thước: 15*70 (cm) loại 18 bóng, 15*78 (cm) loại 24 bóng, 15*86 (cm) loại 36 bóng', '', 'images/product/product_s520.jpg', 'images/product/product_l520.jpg', 0, 0, '2012-05-14 13:11:46', '2012-05-14 13:15:37', 'vn', 6000000),
(278, 'A7', '<center>Sofa', 164, '', '-Thương hiệu: GK</br>\r\n-Xuất xứ: Việt Nam</br>\r\n-Chất liệu êm ái, thoải mái khi ngồi thư  giãn', '', 'images/product/product_s527.jpg', 'images/product/product_l527.jpg', 0, 0, '2012-05-14 13:14:13', '2012-05-14 13:15:28', 'vn', 28000000),
(292, 'A8', '<center>Bàn học', 165, NULL, '-Thương hiệu: HD</br>\r\n-Xuất xứ: Việt Nam</br>\r\n-Phù hợp cho học sinh,  sinh viên\r\n', NULL, 'images/product/product_s528.jpg', 'images/product/product_l528.jpg', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'vn', 2500000),
(293, 'A10', '<center>Bàn trang điểm', 165, NULL, '-Thương hiệu: Mỹ Quỳnh</br>\r\n-Xuất xứ: Việt Nam</br>\r\n-Giúp cho phái đẹp dễ dàng chăm sóc da, trang điểm nhanh hơn, tiện hơn </br>', NULL, 'images/product/product_s530.jpg', 'images/product/product_l530.jpg', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'v', 999999),
(294, 'A17', '<center>Tủ bếp', 166, NULL, '-Thương hiêu: ET</br>\r\n-Xuất xứ: Việt Nam</br>\r\n', NULL, 'images/product/product_s536.jpg', 'images/product/product_l536.jpg', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'vn', 90000000),
(300, 'A23', '<center>Tủ gỗ treo quần áo', 166, NULL, '-Kích thước : 1800 x 2000 mm .</br>\r\n-Tủ 2 cánh lùa hiện đại .</br>\r\n-Gỗ MDF phủ melamine cao cấp .</br>\r\n-Xuất xứ: Việt Nam\r\n', NULL, 'images/product/product_s544.jpg', 'images/product/product_l544.jpg', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'vn', 7800000),
(301, 'A25', '<center>Tủ bếp Acrlic', 166, NULL, '-Chất Liệu : Cánh Acrylic bóng gương + Thùng Melamin</br>\r\n\r\n-Xuất sứ : Xưởng Nội Thất Trường Sơn\r\n</br>\r\n-Bảo hành : 03 năm\r\n</br>\r\n-Màu sắc : Theo thiết kế 3D\r\n</br>\r\n-Kích thước : Theo Thiết kế 3D', NULL, 'images/product/product_s543.jpg', 'images/product/producr_l543.jpg', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'vn', 5900000),
(302, 'A26', '<center>Bộ bàn ăn thông minh', 167, NULL, '-Xuát xứ: Mỹ</br>\r\n-Thiết kế: Hiện đại</br>\r\n-Bàn size 170 thu gọn 135*85', NULL, 'images/product/product_s545.jpg', 'images/product/product_l545.jpg', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'vn', 11000000),
(303, 'A27', '<center>Giường ngủ hiện đại', 168, NULL, '-Kích thước: Rộng:160cm x Dài:200cm xCao:30cm</br>\r\n-Chất liệu: gỗ MDF phủ melamine</br>\r\n-Màu sắc: trắng</br>\r\n-Bảo hành:12 tháng</br>\r\n-Chú ý:Nhận đặt hàng kích thước và màu sắc theo yêu cầu', NULL, 'images/product/product_s546.jpg', 'images/product/product_l546.jpg', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'vn', 9500000),
(502, 'g03', 'ghế', 169, '', '', '', 'images/product/product_s702.jpg', 'images/product/product_l702.jpg', 7, 0, '2021-01-11 13:44:51', '2021-01-11 13:44:51', 'vn', 5000000),
(304, 'G07', 'Giường', 168, NULL, NULL, NULL, 'images/product/product_s552.jpg', 'images/product/product_s552.jpg', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
(280, 'A18', '<center>Sofa da đẹp', 164, '', '-Mã sản phẩm: NTX206\r\n-Xuất xứ: Nội Thất Xinh\r\n-Bảo hành: 5 năm\r\n-Màu sắc: Màu xám nhạt\r\n-Chất liệu: Da cao cấp\r\n-Kích thước: 2700*1700*980mm', '', 'images/product/product_s540.jpg', 'images/product/product_l540.jpg', 0, 0, '2012-05-14 16:10:48', '2012-05-14 16:12:28', 'vn', 39900000),
(298, 'A22', 'Bộ bàn ăn sang trọng', 167, NULL, '-Thiết kế theo phong cách Bắc Âu sang trọng.</br>\r\n-Mặt đá dễ dàng vệ sinh lau chùi</br>\r\n-Chân bàn thiết kế rời dễ lắp đặt vận chuyển.</br>\r\n-Khung bàn ghế được thiết kế gỗ tự nhiên tần bì sồi.</br>\r\n-Màu sơn khung đa dạng, da bọc màu sắc đa dạng theo yêu cầu.</br>\r\n-Miễn phí vận chuyển nội thành Hà Nội</br>\r\n-Bảo hành 12 tháng</br>\r\n-Thương hiệu: MOGEN', NULL, 'images/product/product_s539.jpg', 'images/product/product_l539.jpg', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'vn', 23000000),
(299, 'A22', 'Sofa đa năng', 164, NULL, '-Màu sắc: xanh dương</br>\r\n-Xuất xứ: Việt Nam</br>\r\n-Kích thước: 190 x 90 x 90 (cm)', NULL, 'images/product/product_s542.jpg', 'images/product/product_l542.jpg', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'vn', 15000000),
(281, 'A2', 'Đèn trang trí phòng', 163, '', '-Thương hiệu:PP</br>\r\n-Xuát xứ: Trung Quốc</br>\r\n- đèn trang trí đơn giản phù hợp không gian phòng khách phòng ăn phòng ngủ tạo bầu không khí sang trọng</br>\r\n-Bảo hành:2 năm</br>', '', 'images/product/product_s521.jpg', 'images/product/product_l521.jpg', 0, 0, '2012-05-14 16:16:37', '2012-05-14 16:16:37', 'vn', 2000000),
(279, 'A11', '<center>Bàn trà', 165, NULL, '-Thương hiệu: TP</br>\r\n-Xuất xứ: Việ Nam</br>\r\n-Phù hợp với mọi thiết kế của ngôi  nhà<br>\r\n\r\n', NULL, 'images/product/product_s531.jpg', 'images/product/product_l531.jpg', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'vn', 5),
(291, 'A12 ', 'Bàn trang điểm đẹp', 165, NULL, '-Thương hiệu: QR</br>\r\n-Xuất xứ: Việt Nam</br>\r\n-Phù hợp với không gian trong phòng của bạn</br>\r\n', NULL, 'images/product/product_s532.jpg', 'images/product/product_l532.jpg', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'v', 1900000),
(282, 'A3', 'Đèn ngủ treo tường', 163, '', '-Thương hiệu: SV</br>\r\n-Xuất xứ: Mỹ</br>\r\n-Đèn được thiết kế sang trọng, bắt mắt<br>', '', 'images/product/product_s522.jpg', 'images/product/product_l522.jpg', 1, 0, '2020-05-14 16:18:25', '2020-05-14 16:18:25', 'vn', 3500000),
(283, 'A15', '<center>Bàn làm việc', 165, '', '-Thương hiệu: LL</br>\r\n-Xuất xứ: Việt Nam</br>\r\n-Bảo hành: 1 tháng</br>', '', 'images/product/product_s534.jpg', 'images/product/product_l534.jpg', 0, 0, '2012-05-14 16:20:29', '2012-05-14 16:20:29', 'vn', 2000000),
(284, 'A19', 'Sofa nhập khẩu', 164, '', '-Xuất xứ: Nhập khẩu Malaysia\r\n-Bảo hành: 10 năm\r\n-Màu sắc: Ghi xám\r\n-Chất liệu: 100% da bò thật\r\n-Kích thước: 2450 x 1570 x 710/910 mm', '', 'images/product/product_s541.jpg', 'images/product/product_l541.jpg', 0, 0, '2012-05-14 16:23:05', '2012-05-14 16:23:05', 'vn', 50800000),
(285, 'A4', 'Đèn trang trí phòng khách', 163, '', '-Thương hiệu: UK</br>\r\n-Xuất xứ: Hàn Quốc</br>\r\n-Mang xu hướng trang nhã, hài hòa với ngôi nhà của bạn</br>\r\n-Bảo hành: 2 tháng</br>', '', 'images/product/product_s523.jpg', 'images/product/product_l523.jpg', 1, 0, '2012-05-14 16:25:07', '2012-05-14 16:25:07', 'vn', 1800000),
(286, 'A5', 'Đèn gắn tường', 163, '', '-Thương hiệu JP</br>\r\n- Xuất xứ: Nhật Bản</br>\r\n-Với thiết kế tinh tế, bắt mắt đèn ngủ JP sẽ mang lại cho bạn cảm giác thư thái khi bước vào căn phòng của mình\r\n-Bảo hành: 1 năm</br>', '', 'images/product/product_s524.jpg', 'images/product/product_l524.jpg', 1, 0, '2012-05-14 16:27:07', '2012-05-14 21:11:15', 'vn', 450000),
(296, 'A6', 'Đèn trang trí gắn tường', 163, NULL, '-Xuất xứ: Việt Nam\r\n-Thương hiệu: KM\r\n-Bảo hành:2 tháng', NULL, 'images/product/product_s526.jpg', 'images/product/product_l526.jpg', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'vn', 599999),
(287, 'A9', 'Bàn học và làm việc', 165, '', '-Thương hiệu: HH</br>\r\n-Xuất xứ: Việt Nam</br>\r\n-Thích hợp cho làm việc và học tập\r\n\r\n', '', 'images/product/product_s529.jpg', 'images/product/product_l529.jpg', 0, 0, '2012-05-14 16:28:50', '2012-05-14 16:28:50', 'vn', 2100000),
(288, 'A20', '<center>Bộ bàn ăn', 167, '', '-Thiết kế theo phong cách Bắc Âu sang trọng</br>\r\n-Mặt đá dễ dàng vệ sinh lau chùi</br>\r\n-Chân bàn thiết kế rời dễ lắp đặt vận chuyển.</br>\r\n-Khung bàn ghế được thiết kế gỗ tự nhiên tần bì sồi.</br>\r\n-Màu sơn khung đa dạng, da bọc màu sắc đa dạng theo yêu cầu.</br>\r\n-Miễn phí vận chuyển nội thành Hà Nội</br>\r\n-Bảo hành 12 tháng</br>\r\n-Thương hiệu: MOGEN</br>', '', 'images/product/product_s537.jpg', 'images/product/product_l537.jpg', 0, 0, '2012-05-14 16:30:37', '2012-05-14 21:10:14', 'vn', 17000000),
(297, 'A21', '<center>Bộ bàn ăn gỗ', 167, NULL, '-Bộ sản phẩm gồm 1 bàn và 6 ghế.</br>\r\n-Màu sắc: nâu.</br>\r\n-Chất liệu: gỗ xoan, mặt kính dày.</br>\r\n-Kích thước: dài 1.6m x rộng 0.8m x cao 0.75m.</br>\r\n-Đóng gói trong thùng carton, dễ dàng vận chuyển, không lo trầy xước.</br>\r\n-Hàng luôn có sẵn, giao trong ngày, thanh toán khi nhận hàng và kiểm tra hàng.</br>\r\n-Miễn phí vận chuyển trong khu vực TP.HN.</br>\r\n-Sở hữu đủ 3 yếu tố: rẻ, đẹp, bền.', NULL, 'images/product/product_s538.jpg', 'ímages/product/product_l538.jpg', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'vn', 23000000),
(289, 'A14', 'Bàn trà hình vuông', 165, '', '-Thương hiệu: AD</br>\r\n-Xuát xứ: Việt Nam</br>\r\n- Với thiết kế tiện lợi sẽ mang lại cho bạn cảm giác thích thú', '', 'images/product/product_s533.jpg', 'images/product/product_l533.jpg', 0, 0, '2012-05-14 16:32:20', '2012-05-14 16:32:20', 'vn', 27000000),
(295, 'A5', 'Đèn mâm ốp trần trang trí', 163, NULL, '-Thương hiệu: JH</br>\r\n-Xuất xứ: Việt Nam</br>', NULL, 'images/product/product_s525.jpg', 'images/product/product_l525.jpg', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'vn', 7500000),
(290, 'A16', '<center>Tủ quần áo', 166, '', '- Thương hiệu: GD</br>\r\n- Xuất xứ: Việt Nam</br>\r\n', '', 'images/product/product_s535.jpg', 'images/product/product_l535.jpg', 0, 0, '2012-05-14 16:34:14', '2012-05-14 21:07:48', 'vn', 21000000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_category`
--

CREATE TABLE `tbl_product_category` (
  `id` int(11) NOT NULL,
  `code` varchar(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `parent` int(11) NOT NULL DEFAULT '0',
  `subject` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `detail_short` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `detail` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_large` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lang` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_category`
--

INSERT INTO `tbl_product_category` (`id`, `code`, `name`, `parent`, `subject`, `detail_short`, `detail`, `image`, `image_large`, `sort`, `status`, `date_added`, `last_modified`, `lang`) VALUES
(1, NULL, 'Danh mục gốc', 0, NULL, NULL, NULL, NULL, NULL, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, 'vn', 'Việt nam', 1, '', '', '', NULL, NULL, 0, 0, '2008-03-24 08:36:30', '2008-03-27 10:29:34', 'vn'),
(77, '', 'Sản phẩm ', 2, '', '', '', NULL, NULL, 1, 0, '2008-12-17 08:43:26', '2009-10-13 11:44:49', 'vn'),
(163, '', 'Đèn trang trí', 77, '', '', '', NULL, NULL, 1, 0, '2012-05-14 12:29:56', '2012-05-14 12:29:56', 'vn'),
(164, '', 'Sofa', 77, '', '', '', NULL, NULL, 2, 0, '2012-05-14 12:30:29', '2012-05-14 12:30:29', 'vn'),
(165, '', 'Bàn', 77, '', '', '', NULL, NULL, 3, 0, '2012-05-14 12:30:57', '2012-05-14 12:30:57', 'vn'),
(166, '', 'Tủ ', 77, '', '', '', NULL, NULL, 4, 0, '2012-05-14 12:31:09', '2012-05-14 12:31:09', 'vn'),
(167, '', 'Bộ bàn ăn', 77, '', '', '', NULL, NULL, 5, 0, '2012-05-14 12:31:38', '2012-05-14 12:31:38', 'vn'),
(168, '', 'Giường ngủ', 77, '', '', '', NULL, NULL, 6, 0, '2012-05-14 12:32:12', '2012-05-14 12:32:12', 'vn'),
(169, '', 'Ghế', 77, '', '', '', NULL, NULL, 7, 0, '2012-05-14 12:32:26', '2012-05-14 12:32:26', 'vn'),
(170, '', 'Kệ sách', 77, '', '', '', NULL, NULL, 8, 0, '2012-05-14 12:33:05', '2012-05-14 12:33:05', 'vn'),
(171, '', 'Rèm', 77, '', '', '', NULL, NULL, 9, 0, '2012-05-14 21:06:08', '2012-05-14 21:06:08', 'vn'),
(172, '', 'Kệ tivi', 77, '', '', '', NULL, NULL, 10, 0, '2012-05-14 21:06:21', '2012-05-14 21:06:21', 'vn'),
(173, '', 'Sản phẩm khác', 77, '', '', '', NULL, NULL, 11, 0, '2012-05-14 21:09:25', '2012-05-14 21:09:25', 'vn');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_new`
--

CREATE TABLE `tbl_product_new` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lang` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_new`
--

INSERT INTO `tbl_product_new` (`id`, `product_id`, `sort`, `status`, `date_added`, `last_modified`, `lang`) VALUES
(28, 157, 0, 0, '2009-11-19 10:19:10', '2009-11-19 10:19:10', 'vn'),
(29, 156, 0, 0, '2009-11-19 10:19:10', '2009-11-19 10:19:10', 'vn'),
(30, 155, 0, 0, '2009-11-19 10:19:10', '2009-11-19 10:19:10', 'vn'),
(31, 154, 0, 0, '2009-11-19 10:19:10', '2009-11-19 10:19:10', 'vn'),
(32, 153, 0, 0, '2009-11-19 10:19:10', '2009-11-19 10:19:10', 'vn'),
(33, 152, 0, 0, '2009-11-19 10:19:10', '2009-11-19 10:19:10', 'vn'),
(34, 177, 0, 0, '2009-12-03 15:01:55', '2009-12-03 15:01:55', 'vn'),
(35, 173, 0, 0, '2009-12-03 15:01:55', '2009-12-03 15:01:55', 'vn'),
(36, 172, 0, 0, '2009-12-03 15:01:55', '2009-12-03 15:01:55', 'vn'),
(37, 228, 0, 0, '2009-12-03 15:02:35', '2009-12-03 15:02:35', 'vn'),
(38, 227, 0, 0, '2009-12-03 15:02:35', '2009-12-03 15:02:35', 'vn'),
(39, 168, 0, 0, '2009-12-03 15:02:58', '2009-12-03 15:02:58', 'vn'),
(40, 167, 0, 0, '2009-12-03 15:02:58', '2009-12-03 15:02:58', 'vn'),
(41, 166, 0, 0, '2009-12-03 15:02:58', '2009-12-03 15:02:58', 'vn'),
(42, 165, 0, 0, '2009-12-03 15:02:58', '2009-12-03 15:02:58', 'vn'),
(43, 238, 0, 0, '2012-05-10 23:53:18', '2012-05-10 23:53:18', 'vn'),
(44, 239, 0, 0, '2012-05-10 23:59:06', '2012-05-10 23:59:06', 'vn'),
(45, 240, 0, 0, '2012-05-11 00:05:41', '2012-05-11 00:05:41', 'vn'),
(46, 241, 0, 0, '2012-05-12 08:26:01', '2012-05-12 08:26:01', 'vn'),
(47, 242, 0, 0, '2012-05-12 08:31:56', '2012-05-12 08:31:56', 'vn'),
(48, 243, 0, 0, '2012-05-12 08:36:18', '2012-05-12 08:36:18', 'vn'),
(49, 244, 0, 0, '2012-05-12 08:38:17', '2012-05-12 08:38:17', 'vn'),
(50, 245, 0, 0, '2012-05-12 08:40:21', '2012-05-12 08:40:21', 'vn'),
(51, 246, 0, 0, '2012-05-12 08:42:35', '2012-05-12 08:42:35', 'vn'),
(52, 248, 0, 0, '2012-05-12 10:34:24', '2012-05-12 10:34:24', 'vn'),
(53, 249, 0, 0, '2012-05-12 10:35:46', '2012-05-12 10:35:46', 'vn'),
(54, 250, 0, 0, '2012-05-12 10:45:37', '2012-05-12 10:45:37', 'vn'),
(55, 251, 0, 0, '2012-05-12 10:52:04', '2012-05-12 10:52:04', 'vn'),
(56, 252, 0, 0, '2012-05-12 10:54:18', '2012-05-12 10:54:18', 'vn'),
(57, 253, 0, 0, '2012-05-12 10:57:12', '2012-05-12 10:57:12', 'vn'),
(58, 254, 0, 0, '2012-05-12 10:58:54', '2012-05-12 10:58:54', 'vn'),
(59, 255, 0, 0, '2012-05-12 11:01:03', '2012-05-12 11:01:03', 'vn'),
(60, 256, 0, 0, '2012-05-12 11:03:40', '2012-05-12 11:03:40', 'vn'),
(61, 257, 0, 0, '2012-05-12 11:05:11', '2012-05-12 11:05:11', 'vn'),
(62, 259, 0, 0, '2012-05-12 11:11:17', '2012-05-12 11:11:17', 'vn'),
(63, 260, 0, 0, '2012-05-12 11:12:17', '2012-05-12 11:12:17', 'vn'),
(64, 261, 0, 0, '2012-05-12 11:13:14', '2012-05-12 11:13:14', 'vn'),
(65, 262, 0, 0, '2012-05-12 11:17:12', '2012-05-12 11:17:12', 'vn'),
(66, 263, 0, 0, '2012-05-12 11:18:47', '2012-05-12 11:18:47', 'vn'),
(67, 265, 0, 0, '2012-05-12 11:26:42', '2012-05-12 11:26:42', 'vn'),
(68, 271, 0, 0, '2012-05-12 11:39:36', '2012-05-12 11:39:36', 'vn'),
(69, 273, 0, 0, '2012-05-12 11:41:56', '2012-05-12 11:41:56', 'vn'),
(70, 277, 0, 0, '2012-05-14 13:11:58', '2012-05-14 13:11:58', 'vn'),
(71, 279, 0, 0, '2012-05-14 13:47:42', '2012-05-14 13:47:42', 'vn'),
(72, 280, 0, 0, '2012-05-14 16:10:52', '2012-05-14 16:10:52', 'vn'),
(73, 281, 0, 0, '2012-05-14 16:16:41', '2012-05-14 16:16:41', 'vn'),
(74, 282, 0, 0, '2012-05-14 16:18:29', '2012-05-14 16:18:29', 'vn'),
(75, 283, 0, 0, '2012-05-14 16:20:32', '2012-05-14 16:20:32', 'vn'),
(76, 284, 0, 0, '2012-05-14 16:23:09', '2012-05-14 16:23:09', 'vn'),
(77, 285, 0, 0, '2012-05-14 16:25:10', '2012-05-14 16:25:10', 'vn'),
(78, 286, 0, 0, '2012-05-14 16:27:10', '2012-05-14 16:27:10', 'vn'),
(80, 288, 0, 0, '2012-05-14 16:30:40', '2012-05-14 16:30:40', 'vn'),
(81, 289, 0, 0, '2012-05-14 16:32:24', '2012-05-14 16:32:24', 'vn'),
(82, 290, 0, 0, '2012-05-14 16:34:18', '2012-05-14 16:34:18', 'vn');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_special`
--

CREATE TABLE `tbl_product_special` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lang` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_special`
--

INSERT INTO `tbl_product_special` (`id`, `product_id`, `sort`, `status`, `date_added`, `last_modified`, `lang`) VALUES
(44, 154, 0, 0, '2009-11-19 10:19:19', '2009-11-19 10:19:19', 'vn'),
(43, 156, 0, 0, '2009-11-19 10:19:19', '2009-11-19 10:19:19', 'vn'),
(42, 157, 0, 0, '2009-11-19 10:19:19', '2009-11-19 10:19:19', 'vn'),
(45, 153, 0, 0, '2009-11-19 10:19:19', '2009-11-19 10:19:19', 'vn'),
(46, 228, 0, 0, '2009-12-09 09:38:40', '2009-12-09 09:38:40', 'vn'),
(47, 224, 0, 0, '2009-12-09 09:38:40', '2009-12-09 09:38:40', 'vn'),
(48, 223, 0, 0, '2009-12-09 09:38:40', '2009-12-09 09:38:40', 'vn'),
(49, 176, 0, 0, '2009-12-09 09:38:49', '2009-12-09 09:38:49', 'vn'),
(50, 175, 0, 0, '2009-12-09 09:38:49', '2009-12-09 09:38:49', 'vn'),
(51, 171, 0, 0, '2009-12-09 09:38:49', '2009-12-09 09:38:49', 'vn'),
(52, 170, 0, 0, '2009-12-09 09:38:49', '2009-12-09 09:38:49', 'vn'),
(53, 238, 0, 0, '2012-05-10 23:53:25', '2012-05-10 23:53:25', 'vn'),
(54, 239, 0, 0, '2012-05-10 23:59:10', '2012-05-10 23:59:10', 'vn'),
(55, 240, 0, 0, '2012-05-11 00:05:46', '2012-05-11 00:05:46', 'vn'),
(56, 245, 0, 0, '2012-05-12 08:40:26', '2012-05-12 08:40:26', 'vn'),
(57, 249, 0, 0, '2012-05-12 10:36:23', '2012-05-12 10:36:23', 'vn'),
(58, 259, 0, 0, '2012-05-12 11:11:21', '2012-05-12 11:11:21', 'vn'),
(59, 265, 0, 0, '2012-05-12 11:26:46', '2012-05-12 11:26:46', 'vn'),
(60, 271, 0, 0, '2012-05-12 11:39:39', '2012-05-12 11:39:39', 'vn'),
(61, 273, 0, 0, '2012-05-12 11:41:59', '2012-05-12 11:41:59', 'vn'),
(62, 277, 0, 0, '2012-05-14 13:15:07', '2012-05-14 13:15:07', 'vn'),
(63, 280, 0, 0, '2012-05-14 16:10:55', '2012-05-14 16:10:55', 'vn'),
(64, 284, 0, 0, '2012-05-14 16:23:13', '2012-05-14 16:23:13', 'vn'),
(65, 290, 0, 0, '2012-05-14 16:34:21', '2012-05-14 16:34:21', 'vn');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `pwd` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `uid`, `pwd`) VALUES
(1, 'admin', 'c199bb14d24400178202d742fe96fd71'),
(2, 'nbamin', '25f9e794323b453885f5181f1b624d0b'),
(3, 'ntadmin', '70ce772b68ee3ac16ed71bca7824c27e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_visitor`
--

CREATE TABLE `tbl_visitor` (
  `session_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `activity` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `member` enum('y','n') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'n',
  `ip_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user_agent` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_visitor`
--

INSERT INTO `tbl_visitor` (`session_id`, `activity`, `member`, `ip_address`, `url`, `user_agent`) VALUES
('u4gjobi8dik2j696fjrgjufm83', '2022-02-18 09:08:07', 'n', '::1', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_config`
--
ALTER TABLE `tbl_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_content`
--
ALTER TABLE `tbl_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_content_category`
--
ALTER TABLE `tbl_content_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product_category`
--
ALTER TABLE `tbl_product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product_new`
--
ALTER TABLE `tbl_product_new`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product_special`
--
ALTER TABLE `tbl_product_special`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_visitor`
--
ALTER TABLE `tbl_visitor`
  ADD PRIMARY KEY (`session_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_config`
--
ALTER TABLE `tbl_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_content`
--
ALTER TABLE `tbl_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `tbl_content_category`
--
ALTER TABLE `tbl_content_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=503;

--
-- AUTO_INCREMENT for table `tbl_product_category`
--
ALTER TABLE `tbl_product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `tbl_product_new`
--
ALTER TABLE `tbl_product_new`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `tbl_product_special`
--
ALTER TABLE `tbl_product_special`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
