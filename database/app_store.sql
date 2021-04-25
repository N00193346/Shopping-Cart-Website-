-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2021 at 07:00 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `credit_card`
--

CREATE TABLE `credit_card` (
  `id` int(255) NOT NULL,
  `type` enum('Visa','Mastercard') NOT NULL,
  `name` varchar(16) NOT NULL,
  `card_number` int(16) NOT NULL,
  `cvc` int(3) NOT NULL,
  `exp_month` int(2) NOT NULL,
  `exp_year` int(2) NOT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `credit_card`
--

INSERT INTO `credit_card` (`id`, `type`, `name`, `card_number`, `cvc`, `exp_month`, `exp_year`, `customer_id`) VALUES
(21, 'Mastercard', 'Paul Doyle', 21654131, 303, 5, 21, 7),
(22, 'Visa', 'Jack Jackson', 2147483647, 348, 2, 22, 7);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `phone` int(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `address`, `phone`, `user_id`) VALUES
(6, 'Testing upload', 123456, 2),
(7, '123 Changing address ', 12345754, 9),
(8, 'testing address', 123456, 16),
(14, '\\sdfsefsdfsdfsdfs', 872154532, 22),
(15, 'dfsdfsfsdfdsfsdfsddfs', 54654, 23);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `filename`) VALUES
(1, 'uploads/161393028460329f2c4d465.png'),
(2, 'uploads/1614533124603bd204049b8.png'),
(3, 'uploads/1614533172603bd2345444a.png'),
(4, 'uploads/1614533272603bd2983fadb.png'),
(5, 'uploads/1614533386603bd30acf0ca.png'),
(6, 'uploads/1614769060603f6ba4ee635.jpg'),
(7, 'uploads/1614771626603f75aa23402.jpg'),
(8, 'uploads/1614772686603f79ce3a054.jpg'),
(9, 'uploads/1614772945603f7ad1c2495.jpg'),
(10, 'uploads/16148620196040d6c325e23.jpg'),
(11, 'uploads/1617884671606ef5ff1b6a2.jpg'),
(12, 'uploads/161841437860770b2a119e6.jpg'),
(13, 'uploads/161841471660770c7c5fb04.jpg'),
(14, 'uploads/161843896460776b347929d.jpg'),
(15, 'uploads/161903802660808f4a05d73.jpg'),
(16, 'uploads/161903811260808fa0a033f.jpg'),
(17, 'uploads/161903811260808fa0a17a3.jpg'),
(18, 'uploads/161903811260808fa0a5aee.jpg'),
(19, 'uploads/161903811260808fa0a6db0.jpg'),
(20, 'uploads/16190385036080912752705.jpg'),
(21, 'uploads/16190385036080912759aee.jpg'),
(22, 'uploads/1619038503608091275d58a.jpg'),
(23, 'uploads/1619038503608091275eb30.jpg'),
(24, 'uploads/161903857660809170dc0d3.jpg'),
(25, 'uploads/161903857660809170e2dbc.jpg'),
(26, 'uploads/161903857660809170e675d.jpg'),
(27, 'uploads/161903857660809170e76e7.jpg'),
(28, 'uploads/1619038645608091b5d465d.jpg'),
(29, 'uploads/1619038645608091b5d582d.jpg'),
(30, 'uploads/1619038645608091b5db7f1.jpg'),
(31, 'uploads/1619038645608091b5dc5d4.jpg'),
(32, 'uploads/1619038703608091ef95f5b.jpg'),
(33, 'uploads/1619038703608091ef973f5.jpg'),
(34, 'uploads/1619038703608091ef98514.jpg'),
(35, 'uploads/1619038703608091ef99123.jpg'),
(36, 'uploads/16191222156081d82731dae.jpg'),
(37, 'uploads/16191222156081d8273ead9.jpg'),
(38, 'uploads/16191222156081d8273f9d6.jpg'),
(39, 'uploads/16191222156081d82744249.jpg'),
(40, 'uploads/16191222636081d8572a481.jpg'),
(41, 'uploads/16191222636081d8572c78b.jpg'),
(42, 'uploads/16191222636081d85731aea.jpg'),
(43, 'uploads/16191222636081d857329b8.jpg'),
(44, 'uploads/16191223526081d8b001bab.jpg'),
(45, 'uploads/16191223526081d8b002d5c.jpg'),
(46, 'uploads/16191223526081d8b008bfd.jpg'),
(47, 'uploads/16191223526081d8b00e3a8.jpg'),
(48, 'uploads/16191224136081d8ed15b2a.jpg'),
(49, 'uploads/16191224136081d8ed16995.jpg'),
(50, 'uploads/16191224136081d8ed176c3.jpg'),
(51, 'uploads/16191224136081d8ed182ea.jpg'),
(52, 'uploads/16191225116081d94f6483a.jpg'),
(53, 'uploads/16191225116081d94f6b630.jpg'),
(54, 'uploads/16191225116081d94f6c617.jpg'),
(55, 'uploads/16191225116081d94f6d66a.jpg'),
(56, 'uploads/16191226866081d9fe89319.jpg'),
(57, 'uploads/16191226866081d9fe8cec6.jpg'),
(58, 'uploads/16191226866081d9fe90630.jpg'),
(59, 'uploads/16191226866081d9fe914da.jpg'),
(60, 'uploads/16191227486081da3c99ce8.jpg'),
(61, 'uploads/16191227486081da3c9d651.jpg'),
(62, 'uploads/16191227486081da3c9e42e.jpg'),
(63, 'uploads/16191227486081da3ca4d78.jpg'),
(64, 'uploads/16191228066081da76e3b33.jpg'),
(65, 'uploads/16191228066081da76e4edf.jpg'),
(66, 'uploads/16191228066081da76e5d3d.jpg'),
(67, 'uploads/16191228066081da76e6a6b.jpg'),
(68, 'uploads/16191228616081daad882cb.jpg'),
(69, 'uploads/16191228616081daad8be39.jpg'),
(70, 'uploads/16191228616081daad8f9bc.jpg'),
(71, 'uploads/16191228616081daad907e5.jpg'),
(72, 'uploads/16191229216081dae9cc338.jpg'),
(73, 'uploads/16191229216081dae9cd3f3.jpg'),
(74, 'uploads/16191229216081dae9d3b0e.jpg'),
(75, 'uploads/16191229216081dae9d764e.jpg'),
(76, 'uploads/16191229756081db1fa7043.jpg'),
(77, 'uploads/16191229756081db1fa878f.jpg'),
(78, 'uploads/16191229756081db1fa9712.jpg'),
(79, 'uploads/16191229756081db1faa546.jpg'),
(80, 'uploads/16191230226081db4e50c04.jpg'),
(81, 'uploads/16191230226081db4e58188.jpg'),
(82, 'uploads/16191230226081db4e5b906.jpg'),
(83, 'uploads/16191230226081db4e5f702.jpg'),
(84, 'uploads/16191230816081db895573a.jpg'),
(85, 'uploads/16191230816081db89594e6.jpg'),
(86, 'uploads/16191230816081db895a231.jpg'),
(87, 'uploads/16191230816081db8960b26.jpg'),
(88, 'uploads/16191231796081dbebf1b2e.jpg'),
(89, 'uploads/16191231806081dbec04d95.jpg'),
(90, 'uploads/16191231806081dbec05a4e.jpg'),
(91, 'uploads/16191231806081dbec0c7d5.jpg'),
(92, 'uploads/16191232266081dc1a70171.jpg'),
(93, 'uploads/16191232266081dc1a712a7.jpg'),
(94, 'uploads/16191232266081dc1a7222c.jpg'),
(95, 'uploads/16191232266081dc1a77681.jpg'),
(96, 'uploads/16191232736081dc49f3021.jpg'),
(97, 'uploads/16191232746081dc4a060db.jpg'),
(98, 'uploads/16191232746081dc4a0986d.jpg'),
(99, 'uploads/16191232746081dc4a0a37e.jpg'),
(100, 'uploads/16191233216081dc798909a.jpg'),
(101, 'uploads/16191233216081dc798a790.jpg'),
(102, 'uploads/16191233216081dc79903f5.jpg'),
(103, 'uploads/16191233216081dc7993f37.jpg'),
(104, 'uploads/16191233706081dcaa8951d.jpg'),
(105, 'uploads/16191233706081dcaa8cd7d.jpg'),
(106, 'uploads/16191233706081dcaa90a91.jpg'),
(107, 'uploads/16191233706081dcaa9199b.jpg'),
(108, 'uploads/16191234216081dcddd20ab.jpg'),
(109, 'uploads/16191234216081dcddd3569.jpg'),
(110, 'uploads/16191234216081dcddd92b9.jpg'),
(111, 'uploads/16191234216081dcdddced1.jpg'),
(112, 'uploads/16191235186081dd3e41669.jpg'),
(113, 'uploads/16191235186081dd3e4308f.jpg'),
(114, 'uploads/16191235186081dd3e43d9d.jpg'),
(115, 'uploads/16191235186081dd3e44a9a.jpg'),
(116, 'uploads/16191237096081ddfde689c.jpg'),
(117, 'uploads/16191237096081ddfde85b3.jpg'),
(118, 'uploads/16191237096081ddfde947c.jpg'),
(119, 'uploads/16191237096081ddfdea012.jpg'),
(120, 'uploads/16191237636081de337344f.jpg'),
(121, 'uploads/16191237636081de3376dd2.jpg'),
(122, 'uploads/16191237636081de3377987.jpg'),
(123, 'uploads/16191237636081de3378691.jpg'),
(124, 'uploads/16191238116081de6391513.jpg'),
(125, 'uploads/16191238116081de63926d1.jpg'),
(126, 'uploads/16191238116081de639884b.jpg'),
(127, 'uploads/16191238116081de6399561.jpg'),
(128, 'uploads/16191810946082be26e55e9.jpg'),
(129, 'uploads/16191810946082be26e8248.jpg'),
(130, 'uploads/16191810946082be26e9fa0.jpg'),
(131, 'uploads/16191810946082be26ebbd4.jpg'),
(132, 'uploads/16191811456082be59c9f61.jpg'),
(133, 'uploads/16191811456082be59cc899.jpg'),
(134, 'uploads/16191811456082be59cecac.jpg'),
(135, 'uploads/16191811456082be59d0a88.jpg'),
(136, 'uploads/161921165660833588b0ded.jpg'),
(137, 'uploads/16192116726083359883b66.jpg'),
(138, 'uploads/16192116726083359887328.jpg'),
(139, 'uploads/1619211672608335988adfb.jpg'),
(140, 'uploads/1619211672608335988e754.jpg'),
(141, 'uploads/161921433060833ffa6fe10.jpg'),
(142, 'uploads/161921433060833ffa710d9.jpg'),
(143, 'uploads/161921433060833ffa71db1.jpg'),
(144, 'uploads/161921433060833ffa72aac.jpg'),
(145, 'uploads/161921731160834b9fde876.jpg'),
(146, 'uploads/161921731160834b9fdf85c.jpg'),
(147, 'uploads/161921731160834b9fe0d26.jpg'),
(148, 'uploads/161921731160834b9fe19d4.jpg'),
(149, 'uploads/161921734560834bc113170.jpg'),
(150, 'uploads/161921734560834bc1143a2.jpg'),
(151, 'uploads/161921734560834bc115220.jpg'),
(152, 'uploads/161921734560834bc119d7f.jpg'),
(153, 'uploads/1619218457608350195f903.jpg'),
(154, 'uploads/1619218635608350cb1cfa0.jpg'),
(155, 'uploads/161927089460841cee87e52.jpg'),
(156, 'uploads/161927091060841cfec2db3.jpg'),
(157, 'uploads/161927156560841f8dc883c.jpg'),
(158, 'uploads/16192726026084239ab2655.jpg'),
(159, 'uploads/16192726026084239ab9dc6.jpg'),
(160, 'uploads/16192726026084239abd6bc.jpg'),
(161, 'uploads/16192726026084239abe735.jpg'),
(162, 'uploads/1619273769608428291d8f0.jpg'),
(163, 'uploads/161927835560843a13a4999.jpg'),
(164, 'uploads/161927865260843b3c0951a.jpg'),
(165, 'uploads/16192805106084427e0fa25.jpg'),
(166, 'uploads/16192805106084427e10d00.jpg'),
(167, 'uploads/16192805106084427e169cf.jpg'),
(168, 'uploads/16192805106084427e1a5bb.jpg'),
(169, 'uploads/1619280536608442984731c.jpg'),
(170, 'uploads/1619280550608442a68a1cb.jpg'),
(171, 'uploads/1619280550608442a68b12a.jpg'),
(172, 'uploads/1619280550608442a69186d.jpg'),
(173, 'uploads/1619280550608442a6955c2.jpg'),
(174, 'uploads/16192807006084433c46921.jpg'),
(175, 'uploads/16192807006084433c47eb8.jpg'),
(176, 'uploads/16192807006084433c48fbd.jpg'),
(177, 'uploads/16192807006084433c4dc22.jpg'),
(178, 'uploads/16192893866084652a9dc51.jpg'),
(179, 'uploads/16192893866084652a9fd91.jpg'),
(180, 'uploads/16192893866084652aa0a92.jpg'),
(181, 'uploads/16192893866084652aa16c0.jpg'),
(182, 'uploads/161929498060847b04efbc0.jpg'),
(183, 'uploads/161929498060847b04f3671.jpg'),
(184, 'uploads/161929498160847b05001e0.jpg'),
(185, 'uploads/161929498160847b050691f.jpg'),
(186, 'uploads/161929512860847b9821284.jpg'),
(187, 'uploads/161929512860847b9828c22.jpg'),
(188, 'uploads/161929512860847b982c1d9.jpg'),
(189, 'uploads/161929512860847b982d28b.jpg'),
(190, 'uploads/16193676866085970628d8b.jpg'),
(191, 'uploads/1619367713608597212aa9d.jpg'),
(192, 'uploads/1619367847608597a7de8ab.jpg'),
(193, 'uploads/161936867460859ae2f2465.jpg'),
(194, 'uploads/161936922760859d0b22d19.jpg'),
(195, 'uploads/161936932760859d6f2369a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `credit_card_id` int(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total` double(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `credit_card_id`, `date`, `total`) VALUES
(25, 7, 17, '2021-04-23 19:35:43', 1399.00),
(26, 7, 18, '2021-04-23 19:36:55', 1500.00),
(27, 7, 19, '2021-04-23 19:38:29', 1399.00),
(28, 7, 20, '2021-04-23 19:50:21', 489.00),
(29, 7, 20, '2021-04-23 19:58:20', 899.00),
(30, 7, 21, '2021-04-24 15:38:30', 1211.00),
(31, 7, 22, '2021-04-25 13:53:36', 899.00),
(32, 7, 23, '2021-04-25 14:27:52', 519.00);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(255) NOT NULL,
  `order_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(25, 27, 16, 1),
(26, 28, 27, 1),
(27, 29, 10, 1),
(29, 31, 10, 1),
(30, 32, 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `brand` varchar(1000) NOT NULL,
  `model` varchar(1000) NOT NULL,
  `price` double(7,2) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `image_id` int(255) NOT NULL,
  `image_id2` int(255) DEFAULT NULL,
  `image_id3` int(255) DEFAULT NULL,
  `image_id4` int(255) DEFAULT NULL,
  `category` enum('guitar','bass','drums') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand`, `model`, `price`, `description`, `image_id`, `image_id2`, `image_id3`, `image_id4`, `category`) VALUES
(9, 'Ibanez', 'RG5320C-DFM Prestige', 1829.00, 'The Ibanez Prestige series combines cutting-edge manufacturing techniques with world-renowned Japanese craftsmanship and precision. Bolstering this acclaimed lineup is the top-of-the-range 5000 series RG5320C-DFM, a high-performance electric guitar that takes the iconic Ibanez RG formula into the future!\r\n\r\nWith an incredible feature-set comprising DiMarzio pickups, a Lo-Pro Edge locking tremolo, stainless steel frets, Gotoh tuners and a \'Super Wizard\' neck — the Ibanez RG5320C-DFM lets you break new boundaries in speed, technique and tone.', 16, 17, 18, 19, 'guitar'),
(10, 'Ibanez ', 'RGD61ALA-MTR Axion Label ', 899.00, 'The Ibanez Axion Label series encompasses a range of ultra-modern electric guitars designed for the next-generation of metal players. Kitted out with cutting-edge features that you\'d expect to find on instruments over double their price, you\'ll find Ibanez\'s Axion Label models sporting aftermarket pickups and hardware from industry-leading brands like Fishman, DiMarzio, Gotoh & Schaller. Add exotic tonewoods and striking finishes into the mix — and the result is a stellar, forward-thinking guitar lineup made to meet the heaviest of demands!', 20, 21, 22, 23, 'guitar'),
(11, 'Ibanez ', 'RG6PKAG-NTF Premium', 1399.00, 'Built with a meticulous eye for detail in Indonesia, the Ibanez Premium series delivers simultaneously on both high-quality hardware and pickups for a brilliant, well-rounded playing experience - at a generous price-point to boot!\r\n\r\nWith an incredible feature-set comprising EMG pickups, an Edge locking tremolo, Jescar EVO gold frets, Gotoh tuners and a thin/flat \'Wizard\' neck — the Ibanez RG6PKAG-NTF lets you break new boundaries in speed, technique and tone.', 24, 25, 26, 27, 'guitar'),
(12, 'Ibanez ', 'AM2000H-BS Artstar Prestige Hollowbody', 569.00, 'The Ibanez Prestige series combines cutting-edge manufacturing techniques with world-renowned Japanese craftsmanship and precision. Bolstering this lineup is the gorgeous AM2000H-BS Artstar — a beautifully-made, compact hollowbody instrument that will captivate jazz guitarists with its warm, airy tone and luxurious playability.\r\n\r\nWith an incredible feature-set comprising Ibanez\'s Super 58 pickups, a rock-solid 3-piece Mahogany/Roasted Maple neck and Gotoh 510 tuners — the Ibanez AM2000H-BS is a high-end guitar made for the most serious of musicians', 28, 29, 30, 31, 'guitar'),
(13, 'Ibanez ', 'LB1-VL Lari Basilio Signature ', 2399.00, 'Essentially an elegant T-shaped version of their popular AZ guitar, Ibanez\'s LB1 has a stellar feature-set with many custom Lari-requested tweaks. Equipped with a set of Basilio\'s signature Seymour Duncan pickups, the LB1 sports further modern-day appointments that include a rock-solid Roasted Maple neck, stainless steel frets, Luminlay side dots, Gotoh locking tuners and a genuine bone nut.', 32, 33, 34, 35, 'guitar'),
(14, 'Fender', '75th Anniversary Telecaster', 849.00, 'The 75th Anniversary Telecaster is finished in Diamond Anniversary metallic with a matching painted headstock. The maple neck features a “Modern C” profile, medium jumbo frets and a satin finish for supreme comfort and playability. Vintage-style ‘50s Telecaster pickups provide warm and twangy tone while a 6-saddle bridge improves intonation. Every Anniversary Telecaster features a special 75th anniversary engraved neck plate and ships in a deluxe gig bag.', 36, 37, 38, 39, 'guitar'),
(15, 'Fender ', 'American Ultra Luxe Telecaster', 2099.00, 'This model features a unique Augmented “D” neck profile with Ultra rolled fingerboard edges for hours of playing comfort, and the tapered neck heel allows easy access to the highest register. A speedy 10”-14” compound-radius fingerboard with 22 stainless steel medium-jumbo frets means effortless and accurate soloing, while the Ultra Noiseless Vintage pickups and advanced wiring options provide endless tonal possibilities – without hum. Sculpted rear body contours are as beautiful as they are functional, increasing accessibility and comfort. Other features include sealed locking tuning machines, chrome hardware and bone nut.', 40, 41, 42, 43, 'guitar'),
(16, 'Fender ', 'Jim Root Strat', 1399.00, 'The Jim Root Stratocaster comes equipped with arguably the most widely revered shredding pickups - active EMGs - and that\'s all you need for Jim\'s huge sound! Two pickups, a selector switch and a volume control. Add black hardware, jumbo frets, and a compound profile neck for the perfect compromise between speed, comfort and accuracy, and you have the perfect modern metallers guitar - just as Jim Root himself ordered it!', 44, 45, 46, 47, 'guitar'),
(17, 'Dingwall ', 'Combustion 4 String ', 1949.00, 'The Combustion series from Dingwall brings unrivalled performance and a great sound, at an extremely reasonable price point. This has been achieved through a perfect pairing of Chinese manufacturing techniques and components and materials sourced from within North America. This well-rounded 4-string bass comes in a stunning Whalepoolburst finish, with a Quilt Maple Top.', 48, 49, 50, 51, 'bass'),
(18, 'Dingwall', 'Combustion 2 4-String Bass', 1749.00, 'The Combustion series from Dingwall brings unrivalled performance and a great sound, at an extremely reasonable price point. This has been achieved through a perfect pairing of Chinese manufacturing techniques and components and materials sourced from within North America. This well-rounded 4-string bass comes in a stunning Vintage Burst finish, with a Quilt Maple Top.', 52, 53, 54, 55, 'bass'),
(19, 'Dingwall', 'NG-3 5-String Bass', 1899.00, 'The Dingwall NG-3 is the signature instrument of Adam \"Nolly\" Getgood, producer and former bassist for progressive metal titans Periphery. Reflecting Nolly\'s highly-technical playing style, the NG-3 can meet the demands of any modern bass player, with its range of cutting-edge features.\r\n\r\nDingwall are renowned for crafting instruments of the utmost quality, and the NG-3 is no exception. Taking conventional construction to the next level with a multi-scale design, this bass offers immense playability while projecting some of the most precise tones we\'ve ever heard from a bass.', 56, 57, 58, 59, 'bass'),
(20, 'Dingwall', ' NG-3 Adam \"Nolly\" Getgood Signature 6-String Bas', 1999.00, 'The Dingwall NG-3 is the signature instrument of Adam \"Nolly\" Getgood, bassist for progressive metal titans Periphery. Reflecting Nolly\'s highly-technical playing style, the NG-3 can meet the demands of any modern bass player, with its range of cutting-edge features.\r\n\r\nDingwall are renowned for crafting instruments of the utmost quality, and the NG-3 is no exception. Taking conventional construction to the next level with a multi-scale design, this bass offers immense playability while projecting some of the most precise tones we\'ve ever heard from a bass.', 60, 61, 62, 63, 'bass'),
(21, 'Dingwall ', 'NG-3 4-String Electric Bass', 1899.00, 'The Dingwall NG-3 is the signature instrument of Adam “Nolly” Getgood, the powerhouse bassist for progressive metal heavyweights, Periphery. The bass is inspired by the Combustion model; however, it has been given its own unique look and feel. An alder body with a maple neck and fretboard, plus a custom made Darkglass Tone Capsule preamp makes it an impressive new addition to the Dingwall family. This version includes 3 pickups, 4-strings and boasts a striking Black Metallic finish with a matching headstock.', 64, 65, 66, 67, 'bass'),
(22, 'ESP ', 'LTD RB-1004SM NAT', 1299.00, 'This 4-String Bass Guitar boasts superior tone and response, providing you with ground rumbling lows whilst continuing to offer punchy and responsive mids, finished of with bright, sparkling high frequencies. This bass really does deliver high performance in every aspect of its nature. Showcasing a unique and exotic Solid Spalted Maple top, the LTD RB-1004BM from ESP is absolutely stunning and sounds as organic and authentic as it looks!\r\n\r\nFeaturing a Swamp Ash body and a 34\" 5-piece maple and walnut neck, this bass has plenty of room to breathe. Its 450mm fingerboard radius provides you, the player, with room to perfect your intonnation and finer technique, while offering a comfortable and enjoyable playing experience.', 68, 69, 70, 71, 'bass'),
(23, 'ESP ', 'LTD D4 Bass ', 649.00, 'ESP Guitars - one of the \"Big 3\" when it comes to making guitars & basses for Rock & Metal players. ESP guitars are available in two basic series - ESP & LTD. If it has ESP on the headstock then the guitar has been hand crafted in the ESP Japanese workshop. The quality of these ESP guitars is exceptional - they even have a custom shop that can custom make you anything you want! If the guitar has LTD on the headstock then these are made in other Far Eastern factories (normally Korea). These LTD guitars are made in larger quantities using an assembly line process - the quality is still great & the value for money is amazing. Over the last 30 years ESP has attracted 100\'s of the worlds best known guitarists & bass players.', 72, 73, 74, 75, 'bass'),
(24, 'ESP ', 'LTD AP-204', 519.00, 'The AP-204 combines traditional styling with the high-performance feel you expect from an ESP bass, all at a price you can afford.\r\n\r\nA bolt-on design at classic 34” scale that’s great for any kind of music, the AP-204 features a mahogany body, a comfortable thin U-shaped maple neck, and roasted jatoba fingerboard with 21 extra-jumbo frets.\r\n\r\nA sonically versatile bass, the AP-204 includes a set of ESP Designed LDP and LDJ pickups with active 2-band EQ, making it great for any genre of music from metal to funk to pop and more. Available in Snow White, Black Satin, and Natural Satin finishes.', 76, 77, 78, 79, 'bass'),
(25, 'ESP', 'E-II BTL-4 ', 2815.00, 'Available in an outstanding Black Natural Burst finish over an alder body with spalted maple top, the BTL basses offer a sonic signature powered by an Seymour Duncan SSB passive pickup set that’s paired with ESP’s own high-end active 3-band Cinnamon EQ system.\r\n\r\nThe extraordinary versatility of the bass’s controls (volume with push-pull preamp bypass as well as balance and discrete controls for bass, midrange, and treble frequencies) allows you to use this bass for any gig, in any style. High-end component include a Schaller straplock, Gotoh tuners, a Hipshot A style bridge, and a bone nut. Includes ESP hardshell form-fitting case.', 80, 81, 82, 83, 'bass'),
(26, 'ESP ', 'LTD Stream-1005', 1549.00, 'Part of the LTD Deluxe Series that’s designed for professional musical applications on stage and in the studio, the new Stream-1004 and 5-string Stream-1005 basses are returning to the LTD Bass Series by popular demand.\r\n\r\nWith its retro-cool shape combined with a modern feel and sound, the updated Stream-1004 and Stream-1005 offer premier features like a solid burled maple top over a swamp ash body, with a bolt-on 5-piece maple/purple heart neck with Macassar ebony fingerboard and block inlays.\r\n\r\nThe Stream-1004 and Stream-1005 also offers high-end components like Hipshot tuners, Hipshot bridge and EMG P and J pickup set. Available in Black Natural Burst finish.', 84, 85, 86, 87, 'bass'),
(27, 'Pearl ', 'Road Show Fusion kit', 489.00, 'If you want a great start to drumming or just a kit that comes ready with all the things you need to play then Pearl have something you\'re gonna love. The Road Show series kit is available in 4 colors and setup with hardware that wont let you down.\r\n\r\nSo what are the basics you want on a kit? Good quality shells, solid hardware and reinforced stands. Fortunately this kit has all of those things.... and its affordable... in a range of color wraps and it\'s backed up by Pearl\'s 2 year warranty.', 88, 89, 90, 91, 'drums'),
(28, 'Pearl ', 'Decade Maple Fusion ', 879.00, 'Pearl’s 70 years of drum craftsmanship culminate with the Decade Maple kit. Whether this is your first kit or the upgrade you\'ve been looking for the Decade range deserves your attention. With 5.4mm Maple shells, pro-level features, and gorgeous lacquer finishes, Decade helps elevate your performance at a price that was previously impossible.', 92, 93, 94, 95, 'drums'),
(29, 'Pearl ', 'EXX Export Rock Drum Kit', 679.00, 'The Pearl Export kit is back! The EXX Export drum kits are some of Pearl\'s best-selling beginner-intermediate level kits. You get a lot of quality for your money, but you also get everything you need from great Pearl Export shells down to quality 830 Series hardware. Just because the EXX Export is an affordable drum kit, doesn\'t mean that Pearl have skimped. They have used their years of experience to deliver highly-refined shells, and the latest drum hardware, at a price designed to satisfy drummers who require value-for-money.\r\n\r\nThis standard rock drum kit configuration is comprised of a 22\" kick, 12, 13 and 16\" toms, and a 14\" snare. Great for a wide range of genres especially rock music.', 96, 97, 98, 99, 'drums'),
(30, 'Pearl ', 'Masters Maple Reserve shell Pack', 2399.00, 'The North American Maple that goes into the shells construction was carefully chosen due to its unique properties. It was taken from the revered Masterworks Veneer Vault, so these premium materials are guaranteed to provide a superior sonic and playing experience. Power and musicality are present with every strike. \r\n\r\nThe 4+4 maple blend is characterised by a precise resonance, booming midrange and a sustained, warm low-end. Every shell boasts a 45-degree bearing edge too, ensuring more focus and additional resonant properties due to the low contact design. ', 100, 101, 102, 103, 'drums'),
(31, 'Pearl ', 'Reference Pure Shell Pack ', 2999.00, 'Every shell is crafted from a selection of reduced thickness premium wooden layers. The birch, maple and mahogany blend is sourced from the revered Masterworks vault. These plies are 30% thinner, which leads to improved resonance and sustain with every strike. These characteristics are further enhanced by the enhanced low end from the carefully selected heads. ', 104, 105, 106, 107, 'drums'),
(32, 'Tama', 'Star Walnut Shell Pack', 2999.00, 'STAR is the new flagship line for TAMA drums. It takes the knowledge and research we cultivated for the Starclassic series to the next level, by reexamining every detail to enhance shell resonance.\r\n\r\nWalnut has long been favored by furniture makers for both its beauty and durability. As a drum shell material, Walnut\'s naturally EQ\'ed tone has been praised by the drum community for both the stage and the studio. The new STAR Walnut shells project booming low end with enough cut to be heard through any mix.', 108, 109, 110, 111, 'drums'),
(33, 'Tama ', 'SLP Studio Maple 5pc', 1869.00, 'The Tama SLP Studio Maple Shell Pack can serve as the stunning centrepiece of your drum setup. Its gorgeous aesthetics aren\'t the only draw though, as this kit was designed to meet the forward-thinking demands of modern players.\r\n\r\nWith a kick, pair of high toms, and a dual dose of floor toms, you have the main essentials at your disposal. Just find your perfect snare to match up with this kit, and you\'ll have a truly enviable setup! ', 112, 113, 114, 115, 'drums'),
(34, 'Tama ', 'Superstar Classic Maple 5pc', 749.00, 'The Tama Superstar Classic Maple Shell Pack is one of the finest intermediate kits available today. Punching far above what its modest price-point suggests, this 5-piece shell pack encompasses all of the key ingredients required to form a highly versatile setup.\r\n\r\nWith a kick, a pair of high toms, a single floor tom and a snare, this shell pack can serve as the perfect foundation for your drum rig.', 116, 117, 118, 119, 'drums'),
(35, 'Tama ', 'Hyper-Drive Duo Shell Pack', 999.00, 'The Tama Hyper-Drive Duo Maple Shell Pack is a premium kit that reaches high-end hemispheres. This 4-piece shell pack encompasses all of the main components you\'ll need to form a highly versatile drum setup.\r\n\r\nWith a kick, a rack tom and a single floor tom, this shell pack also features a unique duo snare. This clever design allows you to switch the drum to work as a traditional snare, or as an additional floor tom. This means that if you have a favourite snare drum that you can\'t live without, rather than putting this one aside, you can simply turn it into another tom!', 120, 121, 122, 123, 'drums'),
(36, 'Tama ', 'Club Jam 4pc Shell Pack ', 479.00, 'The Tama Club Jam Shell Pack is a highly-affordable compact kit, combining the perks of modern portability with old-school vintage charm. This 4-piece shell pack consists of a kick, a single high tom, floor tom and a snare. Although a modest setup, this shell pack provides you with the key ingredients, allowing you to play multiple styles and genres without hindrance.', 124, 125, 126, 127, 'drums'),
(37, 'Fender ', 'Noventa Jazzmaster ', 889.00, 'Combining classic Fender style and dynamic single-coil pickups, the Noventa series delivers powerful tones, modern playability and dashing good looks.\r\n\r\nThe Noventa Jazzmaster® is an audacious sonic powerhouse – featuring three Noventa single-coil pickups, master volume and tone controls, and a Jazzmaster tremolo – its striking good looks are matched by the midrange bite, crisp highs and smooth lows of the Noventa pickups. The dynamic range of these pickups offers a wide array of multifaceted and robust tones – suitable for everything from hard rock to jazz and anything in-between. A Modern “C” neck with 21 medium jumbo frets and 9.5” radius fingerboard delivers a smooth blend of modern and vintage playability that is distinctly Fender.', 128, 129, 130, 131, 'guitar'),
(38, 'Fender ', 'Limited Edition Vintera \'70s Telecaster', 799.00, 'The Fender Telecaster is one of the world\'s most distinctive electric guitars, known for its single-cut body shape and double-dose of spanky-sounding single-coil pickups. This Vintera \'70s Tele keeps many coveted features intact that are true to the models which defined the decade; sure to satisfy traditionalists who seek vintage tones and a classic feel.\r\n\r\nFitted with a set of Custom Shop \"Twisted\" Tele single-coil pickups, this limited edition Fender Vintera \'70s Telecaster has a potent voice that\'ll outshine frankly any other guitar of a similar price. A period-correct neck profile, \"F\"-stamped tuners and a vintage-style bridge make this an inspiring time-capsule instrument with an iconic look, luscious tone and addictive feel.', 132, 133, 134, 135, 'guitar');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`) VALUES
(1, 'admin'),
(4, 'customer'),
(3, 'employee'),
(2, 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(256) NOT NULL,
  `name` varchar(64) NOT NULL,
  `role_id` int(11) UNSIGNED NOT NULL,
  `image_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `role_id`, `image_id`) VALUES
(2, 'sarah@bloggs.com', '$2y$10$5kmfqH6smlxNHUA2HSqZMuLQaz2LhAnzXdgoJzREZVBxihsHjRmly', 'Bernadette Bashirian', 4, NULL),
(3, 'doyler1991@hotmail.com', '$2y$10$aQ/qQiGhzZrG/cIOshmOXeU8CWD5PQ4qrZ4Dc1S76hlENrB90dBSC', 'Paul Doyle', 1, NULL),
(9, 'testing@test.ie', '$2y$10$vk2uDVo3sBXcQ/vYmsdNnOaINHs1SSZLnDZi5joRKS2wvER/e/8rW', 'Tim Change', 4, 195),
(16, 'testingcustomerid@testing.com', '$2y$10$R2hCwXEHCLH36ekRzXywZedBmBZ8/lAbC1665izg.1O.kR.revG4m', 'Testing Customer Id', 4, NULL),
(22, 'jj@hotmail.com', '$2y$10$WVsVmCIGwhAepFbHRWN0Peffxxt5m/55.OcubXJYB.nwGqOE6t19y', 'JJJJJ', 4, 14),
(23, 'mm@hotmail.com', '$2y$10$UZQoqAMFJPMLnXSOoJw0Ie11/2Rf5malrQuajQdVsK8QW6gVavDES', 'Mary Mc Donald', 4, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credit_card`
--
ALTER TABLE `credit_card`
  ADD PRIMARY KEY (`id`),
  ADD KEY `credit_card_ibfk_1` (`customer_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`user_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `orders_ibfk_2` (`credit_card_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_id` (`image_id`),
  ADD KEY `image_id2` (`image_id2`),
  ADD KEY `image_id3` (`image_id3`),
  ADD KEY `image_id4` (`image_id4`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_title_unique` (`title`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id` (`role_id`),
  ADD KEY `image_id` (`image_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credit_card`
--
ALTER TABLE `credit_card`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `credit_card`
--
ALTER TABLE `credit_card`
  ADD CONSTRAINT `credit_card_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`image_id2`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`image_id3`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `products_ibfk_4` FOREIGN KEY (`image_id4`) REFERENCES `images` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `users_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
