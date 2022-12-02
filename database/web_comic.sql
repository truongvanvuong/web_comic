


CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adminEmail` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `adminUser` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adminPass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(2, 'Vuong', 'Vuong712gmail.com', 'Vuong', 'c1c6f70a1a4e494fc7419d1da89ea57b', 1);


CREATE TABLE `tbl_binhluan` (
  `binhluan_id` int(11) NOT NULL,
  `tenbinhluan` varchar(255) NOT NULL,
  `email_bl` varchar(255) NOT NULL,
  `binhluan` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `tbl_binhluan` (`binhluan_id`, `tenbinhluan`, `email_bl`, `binhluan`, `product_id`, `blog_id`, `image`) VALUES
(10, 'Vuong', 'khaivuong712@gmail.com', 'Truyện hay và nhiều ý nghĩa', 93, 0, '');



CREATE TABLE `tbl_brand` (
  `brandId` int(11) UNSIGNED NOT NULL,
  `brandName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(17, 'ALPHA BOOK'),
(18, 'NXB ĐHQG'),
(19, 'NXB Hà Nội'),
(20, 'NXB Kim đồng'),
(21, 'Nxb Trẻ'),
(22, 'NXB DÂN TRÍ'),
(23, 'NXB GIÁO DỤC'),
(24, 'NXB THANH NIÊN'),
(25, 'NXB VĂN HỌC'),
(26, 'NXB HỒNG ĐỨC');


CREATE TABLE `tbl_cart` (
  `cartId` int(11) UNSIGNED NOT NULL,
  `productId` int(11) NOT NULL,
  `sId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `tbl_cart` (`cartId`, `productId`, `sId`, `productName`, `price`, `quantity`, `image`) VALUES
(119, 95, 'd4663aqp3989eddpsq4m86udkv', 'Chiết Chi', '119000', 1, '9bee977fc4051552c20ee96fc258f3bc.jpg');



CREATE TABLE `tbl_category` (
  `catId` int(11) UNSIGNED NOT NULL,
  `catName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(26, 'Truyện Tiên hiệp'),
(27, 'Truyện Huyền huyễn'),
(28, 'Truyện Ngôn Tình'),
(29, 'Truyện Dị Thám'),
(30, 'Truyện kinh di'),
(31, 'truyện linh dị'),
(32, 'truyện xuyên không'),
(33, 'Truyện Học Đường'),
(34, 'Truyện Dị Giới'),
(35, 'Truyện Du Hý'),
(38, 'Truyện Đam Mỹ'),
(39, 'Truyện Tranh'),
(40, 'TIỂU THUYẾT');



CREATE TABLE `tbl_compare` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



INSERT INTO `tbl_compare` (`id`, `customer_id`, `productId`, `productName`, `price`, `image`) VALUES
(8, 6, 32, 'Bố Già', '88000', '6d2f68aada.jpg'),
(9, 6, 53, 'Bách Khoa Tri Thức - Hóa Học', '42000', '213937a166.jfif');



CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zipcode`, `phone`, `email`, `password`) VALUES
(6, 'Nguyễn Hải Long', '175 Tây Sơn, Đống Đa , Hà Nội', 'Thành phố Hà Nội', 'Việt Nam', '332001', '0879380438', 'nguyenhailongchy@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(17, 'Trần Anh Tú', 'Ha Noi', '', 'null', '', '0336265078', 'trananhtu712@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f'),
(18, 'Truong Van Vuong', 'Ha Noi - Phuc Tho - tam thuan', '', 'Hà Nội', '', '0336265078', 'khaivuong@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f'),
(19, 'Truong Van Vuong', 'Ha Noi', '', 'hn', '', '0336265078', 'khaivuong712@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f'),
(21, 'Truong Van Vuong', 'Ha Noi', '', 'Hà Nội', '', '0336265078', 'khaivuong11@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(22, 'Truong Van Vuong', 'Ha Noi', '', 'Hà Nội', '', '0336265078', 'vuong@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(23, 'Trần Anh Tú', 'Phúc Thọ - Hà Nội', '', 'Hà Nội', '', '0336265078', 'tu123@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f');



CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_order` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



INSERT INTO `tbl_order` (`id`, `productId`, `productName`, `customer_id`, `quantity`, `price`, `image`, `status`, `date_order`) VALUES
(130, 91, 'Mãi Mãi Là Bao Xa', 19, 1, '118000', '0909abcc53dea1b53e253bc35266f1af.jpg', 0, '2022-05-03 17:25:21'),
(132, 95, 'Chiết Chi', 19, 1, '119000', '9bee977fc4051552c20ee96fc258f3bc.jpg', 0, '2022-05-04 17:02:56'),
(133, 92, 'Nếu Không Là Tình Yêu', 19, 1, '108000', '6ed805a1e8484fc97addd6d25d0ee047.jpg.webp', 0, '2022-05-13 20:47:07'),
(134, 95, 'Chiết Chi', 19, 1, '119000', '9bee977fc4051552c20ee96fc258f3bc.jpg', 0, '2022-05-13 20:47:07'),
(135, 95, 'Chiết Chi', 18, 1, '119000', '9bee977fc4051552c20ee96fc258f3bc.jpg', 0, '2022-05-14 21:52:39'),
(136, 93, 'Lắng Nghe Tiếng Nắng Phần 1', 18, 1, '99000', 'f60a1ca366a29085bd7e929df7ba5b9c.jpg', 0, '2022-05-14 21:53:08');



CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `painter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_code` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `productQuantity` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_soldout` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `product_remain` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `catId` int(11) UNSIGNED NOT NULL,
  `brandId` int(11) UNSIGNED NOT NULL,
  `product_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `listed_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(255) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



INSERT INTO `tbl_product` (`productId`, `productName`, `author`, `painter`, `supplier`, `product_code`, `productQuantity`, `product_soldout`, `product_remain`, `catId`, `brandId`, `product_desc`, `type`, `listed_price`, `price`, `image`) VALUES
(76, 'Đến Ngày Gặp Anh', 'Ryousuke Nanasaki', 'Yoshi Tsukizuki', 'zgroup', '', '', '0', '', 28, 22, 'Đến ngày gặp anh là câu chuyện tình với đủ các cung bậc hỉ nộ ái ố của một chàng trai trong hành trình chông gai đi tìm định mệnh của đời mình, từ mối tình đầu khi còn là sinh viên, trang web hẹn hò đầu tiên đến quãng ngày chung sống dưới một mái nhà với người mà cậu yêu.', 1, '115000', 99000, 'Doingaygapanh.jpg'),
(77, 'Sơn Trà Đỏ', 'Mita Rokuju', 'Chưa Cập Nhật', 'Chưa Cập Nhật', '', '', '0', '', 38, 19, 'Ngày xửa ngày xưa, có một chàng trai vốn luôn sống lủi thủi một mình. Anh đưa một nhóc quỷ về nuôi nấng nhưng sau đó đã trả nó về với rừng, dù rằng sau này lòng anh luôn đau đáu trăn trở về bóng hình đó.\r\nVài năm sau, bé quỷ một lần nữa xuất hiện trước mắt chàng trai ấy … Dù không hiểu được tiếng nói của nhau, tình cảm của họ vẫn chạm đến nơi sâu thẳm bên trong tâm hồn nhau. Cuốn BL này sẽ kể bạn nghe về câu chuyện tình yêu giữa người và quỷ, ấm áp và rung động cõi lòng.', 0, '95000', 85000, 'son tra do.jpg'),
(79, 'Khởi Đầu Mới Là Trở Về Nhà', 'Cocomi', 'Chưa Cập Nhật', 'XYZ', '', '', '0', '', 39, 19, 'Sinh ra và lớn lên ở vùng quê nghèo hẻo lánh, Kozuka Mitsuomi sau đó đã lên Tokyo học cấp ba và làm việc tại nơi đây. Tuy nhiên cuộc sống đô thị chẳng dễ dàng chút nào. Cậu bị đuổi việc và đành quay trở về quê hương sau 10 năm xa cách.\r\nMười năm, làng quê của cậu vẫn như xưa, thứ duy nhất thay đổi chính là cuộc gặp gỡ với Yamato, cậu bạn đồng niên và là con nuôi của ông Kumai hàng xóm.\r\nMột câu chuyện ấm áp giữa một chàng trai mang một mặc cảm khi bị đuổi việc và người bạn có nụ cười hồn nhiên, vô tư, giọng nói dịu dàng, tấm lòng nhân ái …\r\n“Nè … tại sao lúc ấy cậu lại hôn tui?”', 0, '79000', 69000, 'img_6686_1_1_1_1.jpg'),
(84, 'Thiên Quan Tứ Phúc Tập 1', 'Mặc Hương Đồng Khứu', 'Chưa Cập Nhật', 'Zgroup', '', '', '0', '', 27, 22, 'Chuyện bắt đầu từ tám trăm năm trước...\r\nMột thái tử điện hạ được vạn người ngưỡng vọng, phi thăng thành tiên. Những tưởng thế là mỹ mãn, nào ngờ y phi thăng hai lần thì hai lần bị đánh xuống trần, từ thần tướng tay hoa tay kiếm muôn dân thờ phụng trở thành tiên nhân đồng nát lang thang khắp ngõ hẻm hang cùng, không có lấy một ngôi miếu thờ, từ giai thoại thành trò cười của tam giới. Đến lần này, sau tám trăm năm, y rốt cuộc cũng phi thăng lần thứ ba, một lần nữa trở lại Thiên đình.\r\n\r\nGặp lại bao người xưa, những chuyện cũ cũng lần lượt được vén lên.\r\n\r\nTám trăm năm qua lưu lạc hồng trần, y đã trải qua những khổ nạn gì? Rốt cuộc là ai đã đẩy y đến thảm cảnh ấy?\r\n\r\nĐôi nét tác giả\r\n\r\nMặc Hương Đồng Khứu, tác giả của trang văn học mạng Tấn Giang, được rất nhiều độc giả biết tới qua cuốn tiểu thuyết Ma đạo tổ sư. Hai tiểu thuyết khác là Hệ thống tự cứu của nhân vật phản diện và Thiên quan tứ phúc cũng đánh giá cao trên các trang văn học.\r\nCác tác phẩm của Mặc Hương Đồng Khứu được bạn đọc yêu thích bởi tình tiết chặt chẽ, câu chuyện mới lạ và mang giá trị nhân văn sâu sắc, cùng phong cách hài hước đặc trưng.', 0, '159000', 139000, '118087351_252537175725948_1753576288010280772_n.jpg'),
(85, 'Thiên Quan Tứ Phúc Tập 2', 'Mặc Hương Đồng Khứu', 'Chưa Cập Nhật', 'Chưa Cập Nhật', '', '', '0', '', 27, 22, 'Gặp lại Thích Dung, chuyện xưa hé lộ, vị thần quan non trẻ lần đầu nếm trải mùi vị đắng cay, ngày xưa điện vàng thềm ngọc, cha mẹ thương yêu, tín đồ tôn thờ, giờ hóa dĩ vãng đau thương.\r\n\r\nTrong đoạn ký ức xa xôi đó thấp thoáng một nhành hoa trắng, là ai vẫn dõi theo y…\r\n\r\nTrở về thực tại, quán Bồ Tề đã xập xệ nay còn nuôi ba miệng ăn, Tạ Liên bất đắc dĩ quay về nghề cũ, không ngờ phải đối mặt oán linh quỷ thai… Một đứa trẻ không cha... Chuyện này là thế nào? Cha đứa trẻ này là ai?\r\n\r\nBiến cố dồn dập, nay đến Phong Sư bị cuốn vào một chuỗi sự kiện liên hoàn, quá khứ bị lật lại, liệu lần này hắn có thể thoát khỏi tay Bạch Thoại Chân Tiên…\r\n\r\nĐôi nét tác giả\r\n\r\nNghề nghiệp: Tiểu thuyết gia của mạng văn học Tấn Giang.\r\n\r\n\"Gặp được người, chỉ ba chữ này thôi đã là một trong những chuyện lãng mạn nhất thế giới.”\r\n\r\nCác tác phẩm đã xuất bản tại Việt Nam: Ma đạo tổ sư, Hệ thống tự cứu của nhân vật phản diện.\r\n', 0, '159000', 139000, 'bia-1_tqtp2_tb2021.jpg'),
(86, 'Thiên Quan Tứ Phúc Tập 3', 'Mặc Hương Đồng Khứu', 'Chưa Cập Nhật', 'Zgroup', '', '', '0', '', 27, 19, 'Gặp lại Thích Dung, chuyện xưa hé lộ, vị thần quan non trẻ lần đầu nếm trải mùi vị đắng cay, ngày xưa điện vàng thềm ngọc, cha mẹ thương yêu, tín đồ tôn thờ, giờ hóa dĩ vãng đau thương.\r\n\r\nTrong đoạn ký ức xa xôi đó thấp thoáng một nhành hoa trắng, là ai vẫn dõi theo y…\r\n\r\nTrở về thực tại, quán Bồ Tề đã xập xệ nay còn nuôi ba miệng ăn, Tạ Liên bất đắc dĩ quay về nghề cũ, không ngờ phải đối mặt oán linh quỷ thai… Một đứa trẻ không cha... Chuyện này là thế nào? Cha đứa trẻ này là ai?\r\n\r\nBiến cố dồn dập, nay đến Phong Sư bị cuốn vào một chuỗi sự kiện liên hoàn, quá khứ bị lật lại, liệu lần này hắn có thể thoát khỏi tay Bạch Thoại Chân Tiên…\r\n\r\nĐôi nét tác giả\r\n\r\nNghề nghiệp: Tiểu thuyết gia của mạng văn học Tấn Giang.\r\n\r\n\"Gặp được người, chỉ ba chữ này thôi đã là một trong những chuyện lãng mạn nhất thế giới.”\r\n\r\nCác tác phẩm đã xuất bản tại Việt Nam: Ma đạo tổ sư, Hệ thống tự cứu của nhân vật phản diện.\r\n', 0, '149000', 127000, 'bia-1_thien-quan-tu-phuc_tap-3_mem.jpg'),
(89, 'Thiên Quan Tứ Phúc Tập 4', 'Mặc Hương Đồng Khứu', 'Chưa Cập Nhật', 'Zgroup', '', '', '0', '', 27, 19, 'Tạ Liên và Sư Thanh Huyền tiếp tục truy tìm chân tướng của Bạch Thoại Chân Tiên, nhưng nào ngờ lại bị cuốn về nơi biển khơi dậy sóng, quỷ thần đối đầu, người phàm cũng bị kéo vào vòng vây. Cuối cùng sự thật hé lộ nơi Hắc Thủy Quỷ Vực, tội ác năm xưa bị phơi bày.\r\n\r\nKẻ vong mạng, người mất tích. Còn chưa rõ liệu kết cục có vẹn toàn, chuyện mới lại ập đến.\r\n\r\nNúi Đồng Lô mở rộng cánh cửa, lôi kéo chúng quỷ vào một cuộc chiến tàn sát hòng tạo ra một Tuyệt Cảnh Quỷ Vương mới. Giữa lúc vạn quỷ xao động, Hoa Thành pháp lực suy yếu, Thích Dung bỏ trốn, song song đó lại xuất hiện thêm một Cẩm Y Tiên vào cuộc.', 0, '159000', 144000, 'bia-mem_tqtp-4.jpg'),
(90, 'Người Lạ Bên Bờ Biển', 'Kii Kanna', 'Chưa Cập Nhật', 'AMAK - XYZ', '', '', '0', '', 38, 22, 'Anh chàng nhà văn trẻ Shun đã tình cờ bắt gặp hình bóng cô đơn của cậu học sinh cấp ba Mio trong khi cậu bé đang ngắm biển một mình. Shun liền quyết định bắt chuyện với cậu nhưng chẳng lâu sau, Mio buộc phải rời khỏi hòn đảo nơi hai người họ sinh sống. Ba năm sau, Mio nay đã trưởng thành và quay trở về, cậu bé năm nào thổ lộ tình cảm của mình với Shun nhưng lại không được đối phương chấp nhận. Rốt cuộc lý do của Shun là gì và liệu câu chuyện tình trên hòn đảo nhỏ thuộc tỉnh Okinawa sẽ kết thúc ra sao?\r\n\r\nAmak xin được mang đến với các bạn cuốn manga thể loại BL, \"Người lạ bên bờ biển/Umibe no Étranger\", tác phẩm mở đầu cho series \"L\'étranger\" nổi tiếng của tác giả Kii Kanna đã được chuyển thể thành anime và nhận được nhiều lời khen ngợi từ phía người hâm mộ. Hãy cùng chào đón cặp đôi Shun x Mio các bạn nhé!', 0, '85000', 72000, 'a98d0e92cdd5b6545faf96be320cde7a.jpg'),
(91, 'Mãi Mãi Là Bao Xa', 'Diệp Lạc Vô Tâm', 'Chưa Cập Nhật', 'Chưa Cập Nhật', '', '', '0', '', 28, 23, 'Bạch Lăng Lăng, nữ sinh khoa Điện khí, trẻ trung, xinh đẹp và rất tự hào khi quen được một người bạn lý tưởng qua mạng, chàng du học sinh của một trường nổi tiếng của Mỹ, người mang biệt danh “nhà khoa học”: Mãi Mãi Là Bao Xa. Qua những cuộc chuyện trò trên QQ, Lăng Lăng đã gắn bó với chàng trai đó lúc nào cô cũng không hay, cảm xúc lớn dần, sự chia sẻ lớn dần và đến một ngày cô phát hiện ra mình đã yêu người con trai “tài giỏi” và không một chút khuyết điểm ấy. Nhưng sự tỉnh táo giúp cô ý thức được rằng, thế giới mạng chỉ là ảo, họ ở cách nhau cả một đại dương mênh mông, anh lại quá xuất sắc và ưu tú, mối quan hệ của họ sẽ không có kết quả gì. Nhất là khi anh thông báo, nếu anh tiếp tục sự nghiệp nghiên cứu lần này, rất có thể anh phải định cư bên Mỹ, mãi mãi không trở về. Khi nghe tin đó, cô đã gục xuống trước màn hình máy tính và khóc. Tất cả như sụp đổ, tia hy vọng cuối cùng dập tắt, anh sẽ không về nước nữa, khoảng cách giữa họ là mãi mãi… Cô cay đắng nói với anh lời từ biệt và đưa nick của anh vào danh sách đen, không bao giờ xuất hiện khi cô đăng nhập QQ nữa…\r\n\r\nTrở thành học viên của khoa Vật liệu, bao thách thức và khó khăn chờ đón cô, dưới sự dìu dắt và yêu cầu quá cao của thầy hướng dẫn, cô dần dần làm quen với công việc… Những buổi thảo luận, những lần thí nghiệm, những sự giúp đỡ, những lời quan tâm chân thành, và cộng thêm vẻ ngoài lạnh lùng, điễm tĩnh, rất đẹp của Dương Lam Hàng, trái tim Lăng Lăng cũng xao động. Một bên là người gần gũi với cô hằng ngày, chăm lo cho cô, nâng đỡ cô từng chút một, một bên là chàng trai ở mãi tận nơi xa, chưa một lần gặp mặt. Lăng Lăng giằng xé và không biết trái tim mình nghiêng về bên nào nhiều hơn. Đến khi cảm xúc vỡ òa, cô quyết định dừng học bởi không muốn gặp người thầy đã chiếm giữ vị trí trong trái tim cô, cô muốn chung thủy với tình cảm cho chàng trai Mãi Mãi Là Bao Xa, người chia sẻ và dành cho cô tình cảm chân thành, thì cũng là lúc cô phát hiện ra hình như Dương Lam Hàng và người cô yêu có thật nhiều điểm tương đồng. Mãi Mãi Là Bao Xa nói anh đã về nước và sẽ đến gặp cô… Vậy người thầy bên cô bấy lâu nay là ai?', 1, '135000', 118000, '0909abcc53dea1b53e253bc35266f1af.jpg'),
(92, 'Nếu Không Là Tình Yêu', 'Diệp Lạc Vô Tâm', 'Chưa Cập Nhật', 'Chưa Cập Nhật', '', '', '0', '', 28, 25, 'Có câu nói,con người trong cả một đời dù sao cũng phải làm vài chuyện khiến bản thân hối hận, như thế cuộc đời mới hoàn chỉnh.\r\nCho đến tận bây giờ, tôi chỉ làm hai việc giúp cuộc đời mình hoàn chỉnh. Đó là việc đầu tiên là yêu anh và việc thứ hai là gả cho anh.\r\nAnh đã từng nói với tôi, nếu em thật sự yêu một người, dù anh ta không yêu em, em cũng phải tìm mọi cách giành được anh ta, bằng không cả đời này em sẽ không hạnh phúc. Tôi tin vào lời khuyên đó, vì vậy tôi đã sử dụng mọi cách có thể. Cuối cùng, tôi cũng có được anh nhưng rồi tôi lại rời xa anh.\r\nKhi gặp hôn nhân sau hai mươi năm chờ đợi, liệu anh có phân biệt rõ, bao nhiêu là tình thân, bao nhiêu là tình yêu?\r\nKhi hai thân thể hòa nhập là một, liệu anh có phân biệt rõ, bao nhiêu là dục vọng, bao nhiêu là nghĩa vụ?\r\nLúc gặp lại, lướt qua vai nhau, liệu anh có phân biệt rõ, bao nhiêu là quyến luyến, bao nhiêu là bất lực?\r\nLúc mười đầu ngón tay đan chặt vào nhau, anh nói ra câu “Anh yêu em, từ rất lâu rồi…”, em mới biết, người động lòng không chỉ có một mình em.\r\n\r\nGiá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....', 1, '132000', 108000, '6ed805a1e8484fc97addd6d25d0ee047.jpg.webp'),
(93, 'Lắng Nghe Tiếng Nắng Phần 1', 'Fumino Yuki', 'Chưa Cập Nhật', 'IPM', '', '', '0', '', 28, 25, 'Một hôm, như thường lệ, cậu ngồi câm lặng dưới tán lá cho bữa trưa một mình.\r\n\r\nBất thần, một người từ trên cao kéo theo bóng nắng đổ nhào xuống chỗ cậu.\r\n\r\nTrái ngược như ồn ào và lặng lẽ, nhưng cũng xâm lấn như ồn ào vào lặng lẽ, người ấy đã từng bước hiện diện rõ rệt trong đời cậu. Lôi cậu ra khỏi lối sinh hoạt cô đơn buồn tẻ. Làm cậu buồn cười vì kiểu chép bài như gà bới. Cổ vũ cậu rằng khuyết tật đâu phải là cái tội. Giúp cậu tìm thấy niềm vui trong việc nấu ăn cho chỉ một người. Và khiến cậu, lần đầu tiên trong đời quyết giãi bày tình cảm…\r\n\r\nĐể rồi, người ấy ngơ ngác.\r\n\r\nĐể rồi, cậu thấy thương tổn.', 1, '110000', 99000, 'f60a1ca366a29085bd7e929df7ba5b9c.jpg'),
(94, 'Lắng Nghe Tiếng Nắng Phần 2', 'Fumino Yuki', 'Chưa Cập Nhật', 'IPM', '', '', '0', '', 28, 25, 'Phần tiếp theo của Lắng nghe tiếng nắng - Kể về hạnh phúc. Taiichi đã tìm ra điều bản thân muốn theo đuổi và đi làm cho một công ty chuyên hỗ trợ người khiếm thính, còn Kohei tiếp tục cuộc sống sinh viên. Thế nhưng, giữa hai người tưởng như rất hợp nhau bắt đầu xuất hiện những bất đồng trong suy nghĩ. Liệu cuộc tình của hai chàng trai này sẽ đi tới đâu?', 1, '260000', 246000, '993cb76ac8ee5e1c706d6d3372abfb74.jpg_720x720q80.jpg_.webp'),
(95, 'Chiết Chi', 'Khốn Ỷ Nguy Lâu', 'Chưa Cập Nhật', 'Chưa Cập Nhật', '', '', '0', '', 40, 26, '“Lục Tu Văn nói, y muốn tìm một người, mà y là độc nhất vô nhị trong mắt người đó. \r\n… đến tận lúc chết y vẫn không tìm ra” \r\nLục Tu Văn từ nhỏ đã là một thiên tài võ thuật, được giáo chủ Ma Giáo lúc bấy giờ vô cùng yêu thích, còn được định sẵn sẽ là người kế nghiệp sau này. Nhưng vì tính cách kiêu ngạo, ngang tàng lại độc ác, thâm trầm nên mọi người xung quanh đều ghét y. Một trong số đó chính là Đoàn Lăng. \r\nĐoàn Lăng sinh ra trong một danh môn chính phái, tuổi còn nhỏ đã bị bắt cóc đến Ma Giáo, chịu số phận làm sư đệ của yêu nghiệt Lục Tu Văn, bị hành đến mức mỗi lần nhắc tới cái tên này đều hận nghiến răng nghiến lợi. Người duy nhất đối xử tốt với hắn trong những năm tháng như địa ngục ấy chỉ có Lục Tu Ngôn – đệ đệ sinh đôi của Lục Tu Văn. \r\nCũng từ giây phút đó, cuộc tình đầy ân oán thù hận đan xen giữa hư và thực bắt đầu giữa ba con người Lục Tu Văn – Đoàn Lăng – Lục Tu Ngôn. Bí mật 10 năm trước được giấu kín, 10 năm sau gặp lại, vật đổi sao dời, một kẻ thân bại danh liệt mình đầy thương tích, một người thoát ra trở thành đại hiệp được người đời ngưỡng mộ. \r\n“Bình thường hắn luôn nhận ra sự khác biệt giữa huynh đệ họ, nhưng lại nhận nhầm vào đúng khoảnh khắc quan trọng nhất. Chỉ vì một sai lầm đó, hắn không những mất mười năm cuồng si, lại còn tận mắt nhìn người yêu thương chết trong lòng, mà không hề hay biết.”\r\n10 năm gặp lại, thứ Lục Tu Văn nhận được là ánh mắt ghét bỏ, hận thù của Đoàn Lăng. \r\n10 năm đánh đổi, thân bại danh liệt chẳng đợi nổi ngày nắm hoa đào rơi… ', 1, '139000', 119000, '9bee977fc4051552c20ee96fc258f3bc.jpg'),
(96, 'Từ Ngày Mai Hãy Làm Người Hạnh Phúc', 'Toái Toái', 'Chưa Cập Nhật', 'Chưa Cập Nhật', '', '', '0', '', 40, 18, 'Ngày hôm nay của bạn thế nào, có mệt không?\r\n\r\nNgày hôm nay của bạn có đang hoang mang mơ hồ?\r\n\r\nNgày hôm nay của bạn có đang hoài nghi bản thân?\r\n\r\nVậy thì cuốn sách “Từ ngày mai hãy làm người hạnh phúc” này là dành cho bạn. “Từ ngày mai hãy làm người hạnh phúc” sẽ đồng hành bên bạn, dịu dàng gửi gắm các thông điệp ý nghĩa chân thành và tích cực về tình thân, tình bạn, tình yêu… dễ dàng chạm tới trái tim bạn, vỗ về sự tủi thân trong bạn, xoa dịu nỗi cô độc của bạn.\r\n\r\nNhững con người khác nhau với những câu chuyện khác nhau, nhưng đều là những băn khoăn trăn trở của người trẻ trên hành trình trưởng thành, phấn đấu trở thành một “bản thân” tốt đẹp hơn, hạnh phúc hơn ở tương lai.\r\n\r\nThực chất, hạnh phúc không phải thứ gì quá mức to lớn xa vời, mà chỉ là những điều rất đỗi nhỏ bé ở xung quanh ta. Tựa như lúc tuyết phủ rợp trời, được lim dim thiếp đi trong căn nhà sáng ánh đèn, bên chậu than hồng ấm áp đã là niềm hạnh phúc to lớn nhất của cuộc đời vậy.\r\n\r\n“Mỗi ngày là khởi đầu, cũng là kết thúc. Mỗi ngày đều chỉ là quá khứ của ngày mai.\r\n\r\nHãy hướng tới ngày mai với tình yêu, đối đãi với mọi người, mọi chuyện bằng lòng yêu thương.\r\n\r\nHãy yêu cuộc đời giật gấu vá vai của mình.\r\n\r\nHãy bước về phía trước với lòng yêu thương, cho đến khi bạn trở nên thuần khiết, bao dung, tâm hồn trong sáng, khoáng đạt.\r\n\r\nTừ ngày mai hãy làm người hạnh phúc.”', 1, '118000', 94000, '173c1daa1d8d4af9fb1e5bc1c469719a.jpg.webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `sliderId` int(11) NOT NULL,
  `sliderName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_warehouse`
--

CREATE TABLE `tbl_warehouse` (
  `id_warehouse` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `sl_nhap` varchar(50) NOT NULL,
  `sl_ngaynhap` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_warehouse`
--

INSERT INTO `tbl_warehouse` (`id_warehouse`, `id_sanpham`, `sl_nhap`, `sl_ngaynhap`) VALUES
(1, 22, '5', '2019-07-16 18:31:22'),
(2, 21, '10', '2019-07-16 18:32:03'),
(3, 21, '3', '2019-07-16 18:42:59'),
(4, 20, '5', '2019-07-16 18:51:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Chỉ mục cho bảng `tbl_binhluan`
--
ALTER TABLE `tbl_binhluan`
  ADD PRIMARY KEY (`binhluan_id`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Chỉ mục cho bảng `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `catId` (`catId`,`brandId`),
  ADD KEY `brandId` (`brandId`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`sliderId`);

--
-- Chỉ mục cho bảng `tbl_warehouse`
--
ALTER TABLE `tbl_warehouse`
  ADD PRIMARY KEY (`id_warehouse`);

--
-- Chỉ mục cho bảng `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_binhluan`
--
ALTER TABLE `tbl_binhluan`
  MODIFY `binhluan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `tbl_compare`
--
ALTER TABLE `tbl_compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `sliderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
