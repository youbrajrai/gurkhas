-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 02, 2023 at 05:15 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gurkhas`
--

-- --------------------------------------------------------

--
-- Table structure for table `boards`
--

CREATE TABLE `boards` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `joined_date` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `boards`
--

INSERT INTO `boards` (`id`, `user_id`, `joined_date`, `created_at`, `updated_at`) VALUES
(2, 203, 'सोम, असोज १८, २०७८', '2023-05-30 08:34:02', '2023-05-30 08:34:02'),
(3, 204, 'सोम, असोज १८, २०७८', '2023-05-30 08:37:06', '2023-05-30 08:37:06'),
(4, 205, 'मंगल, माघ १८, २०७८', '2023-05-30 08:40:58', '2023-05-30 08:40:58'),
(5, 206, 'शुक्र, असार १८, २०७८', '2023-05-30 08:47:50', '2023-05-30 08:47:50'),
(6, 207, 'शुक्र, असार १८, २०७८', '2023-05-30 08:51:40', '2023-05-30 08:51:40'),
(7, 208, 'मंगल, माघ १८, २०७८', '2023-05-30 09:04:10', '2023-05-30 09:04:10'),
(8, 209, 'बुध, माघ १९, २०७८', '2023-05-30 09:06:21', '2023-05-30 09:06:21');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint UNSIGNED NOT NULL,
  `branch_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `local_body` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ward_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `branch_code`, `title`, `province`, `district`, `local_body`, `ward_no`, `link`, `contact_no`, `fax_no`, `email`, `created_at`, `updated_at`) VALUES
(1, '1', 'Head Office', '3', 'Kathmandu', 'Dillibazar', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d883.0765200556485!2d85.32669516958649!3d27.70783439851141!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1909bad86221%3A0x179262ebb110e487!2sCharkhal%20Rd%2030-33%2C%20Kathmandu%2044600!5e0!3m2!1sen!2snp!4v1684992351057!5m2!1sen!2snp', '01-4437401, 4437403, 4430527', NULL, 'info@gurkhasfinance.com.np', NULL, NULL),
(2, '2', 'Boudha Branch', '3', 'Kathmandu', 'Boudha', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d882.972563130554!2d85.3609821695865!3d27.72067459851095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1bda47e404a7%3A0xc0fe1b5ada11e2ef!2sBoudhanath%20Sadak%2C%20Kathmandu%2044600!5e0!3m2!1sen!2snp!4v1684994423824!5m2!1sen!2snp', '01-4561155, 4590522', NULL, 'boudha@gurkhasfinance.com.np', NULL, NULL),
(3, '3', 'Damak Branch', '1', 'Jhapa', 'Damak', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d351.1987663910683!2d87.70238712541064!3d26.66409067007174!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e591e6cc30886d%3A0xd10b65356f0c378!2sDamak%2057217!5e0!3m2!1sen!2snp!4v1684994499297!5m2!1sen!2snp', '023-575389', NULL, 'damak@gurkhasfinance.com.np', NULL, NULL),
(4, '4', 'Dharan Branch', '1', 'Sunsari', 'Dharan', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d890.2212047106838!2d87.28480386958447!3d26.81179589854424!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ef419935f9d4c3%3A0x8288f916c6658333!2sBhanu%20Chowk%2C%20Dharan%2056700!5e0!3m2!1sen!2snp!4v1684994590789!5m2!1sen!2snp', '025-533791, 533790', NULL, 'dharan@gurkhasfinance.com.np', NULL, NULL),
(5, '5', 'Newroad Kathmandu Branch', '3', 'Kathmandu', 'New Road', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d883.1139072109263!2d85.31057476958648!3d27.703215198511547!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1855097129e1%3A0xe57183f4c8e523d!2sEverest%20Bank%20Building%2C%20Khechapukhu%20Sadak%2C%20Kathmandu%2044600!5e0!3m2!1sen!2snp!4v1684994612728!5m2!1sen!2snp', '01-5713241, 5713041, 5713228', NULL, 'newroad@gurkhasfinance.com.np', NULL, NULL),
(6, '6', 'Itahari Sunsari Branch', '1', 'Sunsari', 'Itahari', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d445.6893382956211!2d87.27426163462464!3d26.664016300000014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ef6d1234ccab47%3A0xd6ecb063e438e36!2sEthinic%20Wears!5e0!3m2!1sen!2snp!4v1684994733974!5m2!1sen!2snp', '025-586928', NULL, 'itahari@gurkhasfinance.com.np', NULL, NULL),
(7, '7', 'Birtamod Jhapa Branch', '1', 'Jhapa', 'Britamod', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d891.5363552561121!2d87.99118486958407!3d26.643825998550543!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e5ba5fd3dbe783%3A0x27537e8d1b35409a!2sJXVR%2BGP7%2C%20Birtamode%2057204!5e0!3m2!1sen!2snp!4v1684994780542!5m2!1sen!2snp', '023-536421', NULL, 'birtamode@gurkhasfinance.com.np', NULL, NULL),
(8, '8', 'Satdobato Branch', '3', 'Lalitpur', 'Satdobato', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d883.4990037659478!2d85.32152466958635!3d27.6555949985133!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb177ce230a50d%3A0x771214970bcb88c0!2sSatdobato%20Tutepani%20Marg%2C%20Lalitpur%2044700!5e0!3m2!1sen!2snp!4v1684994822302!5m2!1sen!2snp', '5151232, 5151247', NULL, 'satdobato@gurkhasfinance.com.np', NULL, NULL),
(9, '9', 'Narayangardh Branch', '3', 'Chitwan', 'Bharatpur Height', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d220.8069991828751!2d84.42769038372957!3d27.689115000000374!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3994fb30a78f05fb%3A0xf336ac37fb6607b0!2sShruti%20Music%20School!5e0!3m2!1sen!2snp!4v1684994862938!5m2!1sen!2snp', '056-523850', NULL, 'narayangadh@gurkhasfinance.com.np', NULL, NULL),
(10, '10', 'Suryabinayak - Bhaktapur Branch', '3', 'Bhaktapur', 'Suryabinayak', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d883.4181327124076!2d85.42715756958641!3d27.66560159851293!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1b5394929625%3A0xa9d864ec5347bd59!2sBhulaan%20Ganesh%20Temple!5e0!3m2!1sen!2snp!4v1684994888459!5m2!1sen!2snp', '01 6619268, 6619267', NULL, 'bhaktapur@gurkhasfinance.com.np', NULL, NULL),
(11, '11', 'Rabi - Panchthar Branch', '1', 'Panchthar', 'Rabi', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d565.6847519766628!2d87.68870382171976!3d26.93110534218916!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e5f0256045d809%3A0x66e5f116722dea08!2sRabi%2057300!5e0!3m2!1sen!2snp!4v1684994913472!5m2!1sen!2snp', '024-412107, 412108', NULL, 'rabi@gurkhasfinance.com.np', NULL, NULL),
(12, '12', 'Janagal, Banepa - Kavre Branch', '3', 'kavrepalanchok', 'Janagal,Banepa', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d883.6907491344234!2d85.51337476958633!3d27.63185599851412!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb0f31914fe3e1%3A0x515ba301833cc6f8!2sPulbazar%2C%20Ugratara%20Janagal%2045210!5e0!3m2!1sen!2snp!4v1684994938008!5m2!1sen!2snp', '011-663148', NULL, 'janagal@gurkhasfinance.com.np', NULL, NULL),
(13, '13', 'Chaumala - Kailali Branch', '7', 'Kailali', 'Chaumala', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1748.6180478059005!2d80.74014477474086!3d28.772216397933853!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39a18b7507e6d355%3A0x7e736f0c5ab36eea!2sCity%20Express%20Money%20Transfer!5e0!3m2!1sen!2snp!4v1684994961298!5m2!1sen!2snp', '091-418052', NULL, 'chaumala@gurkhasfinance.com.np', NULL, NULL),
(14, '14', 'Bijauri - Dang Branch', '5', 'Dang', 'Bijauri', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d879.7733018255418!2d82.34011796958741!3d28.11319029849704!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3997f31ec74bfa49%3A0xd5dc187186f4c24f!2sDilli%20Fancy%20Store!5e0!3m2!1sen!2snp!4v1684994985035!5m2!1sen!2snp', '082-411126', NULL, 'bijauri@gurkhasfinance.com.np', NULL, NULL),
(15, '15', 'Lakhan Chowk - Bhairahawa Branch', '5', 'Rupandehi', 'Bhairahawa', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d884.3419003746552!2d83.46184156958613!3d27.55109969851707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39969ae2f1166ec7%3A0x7eaa9c87e4d3e9a4!2sThutipipal%2C%20Padsari%2032900!5e0!3m2!1sen!2snp!4v1684995007948!5m2!1sen!2snp', '071-429346', NULL, 'lakhanchowk@gurkhasfinance.com.np', NULL, NULL),
(16, '16', 'Bhedetar - Dhankuta Branch', '1', 'Dhankuta', 'Bhedetar', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d444.9209074504104!2d87.32049303036014!3d26.860070400000023!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ef43278f0d2435%3A0xfbc6bd23d831efb0!2sSangurigadhi%20Rural%20Municipality!5e0!3m2!1sen!2snp!4v1684995051557!5m2!1sen!2snp', '025 400064', NULL, 'bhedetar@gurkhasfinance.com.np', NULL, NULL),
(17, '17', 'Chhapradi - Siraha Branch', '2', 'Siraha', 'Chhapradi', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d603.185675809794!2d86.41986440194437!3d26.737963773085955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ee97071126ccdb%3A0x9e29e4ec393997f2!2sSharma%20Furniture%20Udhyog!5e0!3m2!1sen!2snp!4v1684995074935!5m2!1sen!2snp', '9852831520', NULL, 'chapradi@gurkhasfinance.com.np', NULL, NULL),
(18, '18', 'Pokhara - Kaski Branch', '4', 'Kaski', 'Pokhara', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d239.6011913412696!2d83.98658593623323!3d28.224199353215088!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3995944fbb006395%3A0xf5555d4167fd0d6d!2sChiple%20Dhunga%20Rd%2C%20Pokhara%2033700!5e0!3m2!1sen!2snp!4v1684995095586!5m2!1sen!2snp', '061 541984', NULL, 'pokhara@gurkhasfinance.com.np', NULL, NULL),
(19, '19', 'Annapurna - Bhojpur Branch', '1', 'Bhojpur', 'Annapurna', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d600.6869396995276!2d86.97249661977281!3d27.20531443326097!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e8d471fe479f89%3A0x21270fcfa56641d1!2sTyamkemaiyung%2C%2057000!5e0!3m2!1sen!2snp!4v1684995115803!5m2!1sen!2snp', '9851212379, 9813812307', NULL, 'bhojpur@gurkhasfinance.com.np', NULL, NULL),
(20, '20', 'Tallo Bazaar - Surkhet Branch', '6', 'Surkhet', 'Tallo Bazaar', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d352.6170041503592!2d81.61583089182028!3d28.593745815640222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39a285f0ca3d4153%3A0x1471ad866a92bfde!2sBirendranagar%2021700!5e0!3m2!1sen!2snp!4v1684995134647!5m2!1sen!2snp', '083-524936', NULL, 'surkhet@gurkhasfinance.com.np', NULL, NULL),
(21, '21', 'Dhamboji-Nepalgunj Branch', '5', 'Banke', 'Nepalgunj', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d220.03162612706194!2d81.63029459765268!3d28.070103895194837!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399867148627d723%3A0x8db16b71b38e437a!2s3JCJ%2B24M%2C%20Dhambhoji%202%2C%20Nepalgunj%2021900!5e0!3m2!1sen!2snp!4v1684995154356!5m2!1sen!2snp', '081-535003, 081-535004', NULL, 'nepalgunj@gurkhasfinance.com.np', NULL, NULL),
(22, '22', 'Linkroad, Ghantaghar - Birgunj Branch', '2', 'Parsa', 'Birgunj', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d597.3840240110545!2d84.87974591732412!3d27.014316733621165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39935440e1a86fbd%3A0xdb044a4e46d47423!2z4KSy4KS_4KSC4KSVIOCksOCli-CkoSwgQmlyZ3VuaiA0NDMwMA!5e0!3m2!1sen!2snp!4v1684995174307!5m2!1sen!2snp', '051-531479', NULL, 'birgunj@gurkhasfinance.com.np', NULL, NULL),
(23, '23', 'Balaju, Kathmandu-Gongabu Branch', '3', 'Kathmandu', 'Balaju', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d220.71323680517628!2d85.31529998523689!3d27.73544213989298!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19fd0778fb9f%3A0x37f59df6a92e105!2sN%20S%20Medical%20Center!5e0!3m2!1sen!2snp!4v1684995199058!5m2!1sen!2snp', '01-4964132,4383708', NULL, 'gongabu@gurkhasfinance.com.np', NULL, NULL),
(24, '24', 'Beltar Chaudandigadhi-6, Udayapur Branch', '1', 'Udayapur', 'Beltar', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3560.9196712453995!2d86.87642927531414!3d26.81068627670808!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eedf0a6ec99e35%3A0xab62aeb717e550d7!2sBeltar%20Bazar%2C%20Beltar%20Basaha%2056300!5e0!3m2!1sen!2snp!4v1684995222273!5m2!1sen!2snp', '035-440053, 9849322391', NULL, 'beltar@gurkhasfinance.com.np', NULL, NULL),
(25, '25', 'Hetauda Branch', '3', 'Makwanpur', 'Hetauda', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1770.703325230972!2d85.02914016555994!3d27.425434796109666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb49858e6561f9%3A0xdc5bf386821c3192!2sAH2%2C%20Hetauda%2044107!5e0!3m2!1sen!2snp!4v1684995240281!5m2!1sen!2snp', '057- 590524, 057- 590525, 9841185539', NULL, 'hetauda@gurkhasfinance.com.np', NULL, NULL),
(26, '26', 'Barahathawa Branch', '2', 'Sarlahi', 'Barahathawa', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3554.9656618579934!2d85.46045627532087!3d26.999635976595403!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ec849959685d17%3A0x8e26451cf1743055!2sBarahathawa%2045800!5e0!3m2!1sen!2snp!4v1684995260467!5m2!1sen!2snp', '046- 540248, 9808835018', NULL, 'barahathawa@gurkhasfinance.com.np', NULL, NULL),
(27, '27', 'Koteshwor Exension Counter', '3', 'Kathmandu', 'Koteshwor', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d113063.75569736169!2d85.272771812507!3d27.6789030897954!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19edb07fd77f%3A0x6c3f764e8c3bd5ae!2sSeti%20Opi%20Marga%2C%20Kathmandu%2044600!5e0!3m2!1sen!2snp!4v1684995278598!5m2!1sen!2snp', '01-4610764, 4610765', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

CREATE TABLE `charges` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `charges_charge_type`
--

CREATE TABLE `charges_charge_type` (
  `id` bigint UNSIGNED NOT NULL,
  `charge_id` bigint UNSIGNED NOT NULL,
  `charge_type_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `charge_types`
--

CREATE TABLE `charge_types` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ch_favorites`
--

CREATE TABLE `ch_favorites` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint NOT NULL,
  `favorite_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ch_favorites`
--

INSERT INTO `ch_favorites` (`id`, `user_id`, `favorite_id`, `created_at`, `updated_at`) VALUES
('b1561b25-dd57-4441-9514-176aaad72b21', 1, 30, '2023-05-03 10:54:07', '2023-05-03 10:54:07'),
('fe729e04-6611-4494-9608-ddeb459493b7', 1, 31, '2023-05-16 04:50:42', '2023-05-16 04:50:42');

-- --------------------------------------------------------

--
-- Table structure for table `ch_messages`
--

CREATE TABLE `ch_messages` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` bigint NOT NULL,
  `to_id` bigint NOT NULL,
  `body` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ch_messages`
--

INSERT INTO `ch_messages` (`id`, `from_id`, `to_id`, `body`, `attachment`, `seen`, `created_at`, `updated_at`) VALUES
('07f405ef-2c27-473d-8fcc-0daf75af32f8', 24, 1, 'gggg', NULL, 1, '2023-05-10 06:56:49', '2023-05-10 06:56:49'),
('0bd11cea-0483-4d33-80b8-0ff551994875', 31, 1, 'yee', NULL, 1, '2023-05-16 08:32:44', '2023-05-16 08:32:45'),
('0d9ffc40-b0bd-4e4a-a074-f7fdcdf58551', 1, 31, 'hello', NULL, 1, '2023-05-16 04:50:47', '2023-05-16 06:21:00'),
('115bac1c-d9ad-43d2-9d4f-2e89781ea3f7', 1, 24, '', '{\"new_name\":\"6a11b4c9-11d4-4497-afd9-7a4cab467cd1.png\",\"old_name\":\"ramesh_bro.png\"}', 1, '2023-05-04 11:30:21', '2023-05-09 11:04:27'),
('136cc637-17c8-40d4-a523-fd42c842c7cf', 31, 1, 'sfdfdfdfdf', NULL, 1, '2023-05-16 08:31:53', '2023-05-16 08:31:54'),
('26495522-7d94-4f02-911d-a56477a20d56', 1, 31, 'fff', NULL, 1, '2023-05-16 06:25:48', '2023-05-16 08:31:34'),
('279c2743-ef5e-468a-a5ed-a067c7fc1ecc', 31, 1, 'sdgsdgsdgsdg', NULL, 1, '2023-05-16 06:25:26', '2023-05-16 06:25:32'),
('2842b0ca-9f8d-4268-890b-af61b3a078e9', 1, 24, 'when do you do', NULL, 1, '2023-05-11 12:07:14', '2023-05-11 12:07:15'),
('2938d998-00db-484a-aa11-9bf6f4e42aaa', 1, 24, 'hello', NULL, 1, '2023-05-10 06:56:57', '2023-05-10 06:56:57'),
('32ae08e1-1764-46e2-984c-88142fda87b5', 1, 24, 'jjj', NULL, 1, '2023-05-10 06:57:12', '2023-05-10 06:58:07'),
('354ec87d-dfc5-408f-aef5-deac7f2c5b3f', 31, 1, 'ae lolo majale jau good bye', NULL, 1, '2023-05-16 08:33:09', '2023-05-16 08:33:10'),
('35a6cc00-ebc7-4a89-84f6-aff50b6238e6', 24, 1, 'dgdgdfgdfg', NULL, 1, '2023-05-11 12:08:33', '2023-05-11 12:08:36'),
('3baee025-2d07-4b52-bb48-398cd657a40b', 24, 1, 'sdsdsd', NULL, 1, '2023-05-11 12:04:26', '2023-05-11 12:04:35'),
('3d76576d-f7b3-4000-8d6a-0be3ba74b744', 1, 31, 'hello', NULL, 1, '2023-05-16 08:31:28', '2023-05-16 08:31:34'),
('4f06e7bc-b5ad-4f4a-a232-3890086b0895', 1, 30, '', '{\"new_name\":\"407ad7f2-17c4-41c8-b902-d32eccc89e80.jpg\",\"old_name\":\"neelam-bohora.jpg\"}', 0, '2023-05-04 10:49:04', '2023-05-04 10:49:04'),
('4f2ebb98-e9bd-4f4b-8210-76e366ba975c', 24, 1, 'ddd', NULL, 1, '2023-05-11 12:00:57', '2023-05-11 12:04:35'),
('575b9762-6ac2-4a5d-97d3-41b2d44fab93', 1, 24, 'dfsadsa', NULL, 1, '2023-05-11 12:07:41', '2023-05-11 12:07:42'),
('58aab0f1-e7e4-47b5-ad92-36f5601e0c9b', 1, 30, '', '{\"new_name\":\"26a9b504-68a1-4a4b-9f4b-8f931b073a33.png\",\"old_name\":\"ramesh_bro.png\"}', 0, '2023-05-04 10:48:42', '2023-05-04 10:48:42'),
('5cb5ee2b-a968-47c9-991e-a41b5dbc7dac', 1, 31, 'ggg', NULL, 1, '2023-05-16 06:25:35', '2023-05-16 06:25:36'),
('64d56146-1058-4a49-be05-6c2d1098ba5c', 1, 31, 'ma ghar farkane vaneko', NULL, 1, '2023-05-16 08:32:59', '2023-05-16 08:33:00'),
('65187b0c-38d1-4d73-ba77-ceef564ad182', 1, 24, 'hello', NULL, 1, '2023-05-11 12:05:11', '2023-05-11 12:06:49'),
('67fdff23-6f0f-4c10-b372-855eacf21b5d', 1, 30, 'hi', NULL, 0, '2023-05-03 10:53:49', '2023-05-03 10:53:49'),
('688d900c-f905-41af-a788-152353eb7093', 24, 1, 'sdfsdfdsfsd', NULL, 1, '2023-05-11 12:07:35', '2023-05-11 12:07:35'),
('72e42eb5-55cb-4e64-89f3-9f2073c3b201', 31, 1, 'dinesh', NULL, 1, '2023-05-16 06:21:07', '2023-05-16 06:23:18'),
('733d5256-db16-4e7b-bf53-a0e970e2fd98', 1, 24, 'where do you do', NULL, 1, '2023-05-11 12:05:31', '2023-05-11 12:06:49'),
('76bbf99f-b8d1-4d41-8193-c0d476ddc52f', 1, 24, 'bro', NULL, 1, '2023-05-11 12:05:09', '2023-05-11 12:06:49'),
('88c080a6-35fb-414e-bcb1-71e7348284fc', 24, 1, 'sdbfsdf', NULL, 1, '2023-05-11 12:07:08', '2023-05-11 12:07:09'),
('8b1bf517-efb9-41b0-a326-b83c5f800fc8', 1, 24, 'when do you do', NULL, 1, '2023-05-11 12:05:40', '2023-05-11 12:06:49'),
('8c4fd91a-517c-4cbf-a257-ce5fc8c2fc75', 31, 1, 'dfdfdfdf', NULL, 1, '2023-05-16 08:32:02', '2023-05-16 08:32:02'),
('8e075142-d877-4bdd-8991-1d1211fe3c20', 31, 1, 'jkdngsdg', NULL, 1, '2023-05-16 06:24:48', '2023-05-16 06:24:48'),
('92a10060-6b6e-4cae-9215-cd6bd46ff1e4', 1, 24, 'why do you do', NULL, 1, '2023-05-11 12:05:22', '2023-05-11 12:06:49'),
('9c0e0ff4-8e3a-4b67-9ba9-67d8944a57fb', 31, 1, 'hello dinesh sir', NULL, 1, '2023-05-16 06:22:10', '2023-05-16 06:23:18'),
('9c14ffc4-05d0-4457-be7d-d22026c75aee', 1, 30, '', '{\"new_name\":\"5811aa42-d97a-4a92-a18a-e04d5ec531b0.png\",\"old_name\":\"ramesh_bro.png\"}', 0, '2023-05-04 09:17:00', '2023-05-04 09:17:00'),
('9d669d6d-9dc5-454e-87b6-524fc610bf6a', 33, 1, 'hello sir', NULL, 1, '2023-05-16 11:09:36', '2023-05-17 04:12:03'),
('a14ef920-30f4-4c18-acb2-677b6ddd81a1', 1, 30, '🤪', NULL, 0, '2023-05-04 10:53:59', '2023-05-04 10:53:59'),
('a68015ad-a4c8-4c83-8a39-b5db195b9693', 1, 31, 'ggfgfgf', NULL, 1, '2023-05-16 06:23:21', '2023-05-16 06:23:22'),
('ba319c99-2f72-4637-ae45-1a0346d59c0f', 24, 1, 'hello', NULL, 1, '2023-05-11 11:47:18', '2023-05-11 12:04:35'),
('bd0e4d57-b62c-4f51-9d5c-4aeef9935988', 31, 1, 'hello dinesh sir', NULL, 1, '2023-05-16 06:25:13', '2023-05-16 06:25:32'),
('bedbe018-fafd-496d-859e-bcb8d7414746', 1, 24, 'shh', NULL, 1, '2023-05-10 06:56:41', '2023-05-10 06:56:42'),
('c34dc7d5-3b5d-4430-84f3-c4fda0716541', 24, 1, 'sdsdsd', NULL, 1, '2023-05-11 12:06:54', '2023-05-11 12:07:03'),
('cb2096d1-2587-43dd-bdb5-fbe14b648e75', 1, 24, 'This is the person', NULL, 1, '2023-05-04 11:30:29', '2023-05-09 11:04:27'),
('d0c2cfce-074d-4ebb-b6a4-c08175b9ac1e', 1, 24, 'dsadas', NULL, 1, '2023-05-11 12:08:23', '2023-05-11 12:08:30'),
('d720371d-e322-4e3b-a1dd-9ddaa1c0c4af', 24, 1, '😃', NULL, 1, '2023-05-09 11:41:19', '2023-05-10 06:56:37'),
('da83aed0-c02a-47a1-b6f9-681733441b43', 1, 31, 'byeeeee', NULL, 1, '2023-05-16 08:33:13', '2023-05-16 08:33:14'),
('e0857df2-95fb-4530-b3ee-e4fed86fcff1', 1, 24, 'mmm', NULL, 1, '2023-05-10 06:57:47', '2023-05-10 06:58:07'),
('e67d5c00-c55f-4549-b390-1b2a1393fa46', 1, 24, 'who do you do', NULL, 1, '2023-05-11 12:05:59', '2023-05-11 12:06:49'),
('e9a77a5d-04e4-43ff-ac3d-54f395d47f66', 1, 31, 'ae timi sanxae xau', NULL, 1, '2023-05-16 08:32:16', '2023-05-16 08:32:17'),
('ec8b56f2-5fec-45b3-90f9-5c6ff6ae9aa1', 24, 1, 'sildg', NULL, 1, '2023-05-10 06:58:12', '2023-05-10 06:58:45'),
('ed9fcc9a-5465-4356-aeb6-1de046dae4a8', 1, 24, 'jow do you do', NULL, 1, '2023-05-11 12:05:17', '2023-05-11 12:06:49'),
('fdbaf8ab-7aa1-4dd2-bc78-cb1b117ac40c', 31, 1, 'xaena aleek biram i ho ma', NULL, 1, '2023-05-16 08:32:26', '2023-05-16 08:32:27'),
('fdf4a2c0-8f0a-4074-ace0-533ff1f15a3a', 1, 24, 'what do you do', NULL, 1, '2023-05-11 12:05:53', '2023-05-11 12:06:49'),
('fe18a8e4-6c06-4ab4-ae50-939896e82632', 24, 1, 'hello', NULL, 1, '2023-05-10 06:56:20', '2023-05-10 06:56:37');

-- --------------------------------------------------------

--
-- Table structure for table `committees`
--

CREATE TABLE `committees` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `committee_level_id` bigint UNSIGNED NOT NULL,
  `joined_date` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `committees`
--

INSERT INTO `committees` (`id`, `user_id`, `committee_level_id`, `joined_date`, `created_at`, `updated_at`) VALUES
(1, 4, 3, 'बिही, जेठ ११, २०८०', '2023-05-30 01:46:51', '2023-05-30 01:46:51'),
(2, 3, 5, 'सोम, जेठ ८, २०८०', '2023-05-30 01:47:47', '2023-05-30 01:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `committee_levels`
--

CREATE TABLE `committee_levels` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `committee_levels`
--

INSERT INTO `committee_levels` (`id`, `title`, `created_at`, `updated_at`) VALUES
(3, 'Board Level', '2023-05-10 11:09:48', '2023-05-17 05:27:46'),
(5, 'Management Level', '2023-05-10 11:10:17', '2023-05-10 11:10:17');

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `agreement_date` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `name`, `agreement_date`, `expiry_date`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'Delivery Contract', 'मंगल, जेठ ९, २०८०', 'बिही, जेठ ३२, २०८०', '<p>This is delivery Contract from NIC Asia.</p>', '2023-04-21 03:51:37', '2023-05-22 05:10:13'),
(2, 'Krisha Maharjan', 'मंगल, जेठ ९, २०८०', 'बुध, सावन १७, २०८०', '<p>agreed</p>', '2023-05-10 08:22:55', '2023-05-22 05:10:24'),
(4, 'Demo', 'सोम, जेठ ८, २०८०', 'बुध, भदौ १३, २०८०', 'Demo', '2023-05-22 05:10:40', '2023-05-22 05:10:40');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, '-', NULL, NULL),
(2, 'Company Secretary', NULL, NULL),
(3, 'Risk', NULL, NULL),
(4, 'IT-Head', NULL, NULL),
(5, 'Finance/Account-Head', NULL, NULL),
(6, 'HR', NULL, NULL),
(7, 'Recovery', NULL, NULL),
(8, 'Credit-Head', NULL, NULL),
(9, 'Branch Manager', NULL, NULL),
(10, 'Legal', NULL, NULL),
(11, 'CRMD', NULL, NULL),
(12, 'IT', NULL, NULL),
(13, 'AML-CFT', NULL, NULL),
(14, 'Treasury', NULL, NULL),
(15, 'Liability Management Department', NULL, NULL),
(16, 'Card/Mobile', NULL, NULL),
(17, 'Operation In-charge', NULL, NULL),
(18, 'Clearing', NULL, NULL),
(19, 'Share', NULL, NULL),
(20, 'CAD', NULL, NULL),
(21, 'Finance', NULL, NULL),
(22, 'Teller', NULL, NULL),
(23, 'GAD', NULL, NULL),
(24, 'Internal Audit', NULL, NULL),
(25, 'CSD', NULL, NULL),
(26, 'Credit Sales', NULL, NULL),
(27, 'Share Loan', NULL, NULL),
(28, 'AML/CFT & Compliance', NULL, NULL),
(29, 'Depository Participant (DP)', NULL, NULL),
(30, 'Driver', NULL, NULL),
(31, 'Gold Tester', NULL, NULL),
(32, 'Messenger', NULL, NULL),
(33, 'Teller/ CSD', NULL, NULL),
(34, 'Operaitons', NULL, NULL),
(35, 'Marketing', NULL, NULL),
(36, 'Operation & Credit', NULL, NULL),
(37, 'Branch In-Charge', NULL, NULL),
(38, 'Regional Manager', NULL, NULL),
(39, 'Board', '2023-05-30 08:28:52', '2023-05-30 08:28:52');

-- --------------------------------------------------------

--
-- Table structure for table `deprive_sectors`
--

CREATE TABLE `deprive_sectors` (
  `id` bigint UNSIGNED NOT NULL,
  `interest_head_id` bigint UNSIGNED NOT NULL,
  `particulars` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `interest_rate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deprive_sectors`
--

INSERT INTO `deprive_sectors` (`id`, `interest_head_id`, `particulars`, `interest_rate`, `created_at`, `updated_at`) VALUES
(1, 1, '[\"Indirect Lending ( Wholesale or institutional )\",\"Dircet lending ( All types ) \",\"Yuba Tathasana Byabasai Swarogarkosh\",\"Home Loan for Earthquake Victim \",\"Other all types of Sahuliyatpurna Karja \",\"Base Rate of Fagun , 2077\",\"Penal Interest onpast due loans and expired loans\",]', '[\"Base Rate + Up to 2.5% or ( As per agreement )\",\"Base Rate + Up to 2.5%\", \"As per NRB norms\", \"As per NRB norms \",\"As per NRB norms\", \"9.64%\",\"+2 applicable rate ( Base rate + applied premium)\"]', NULL, NULL),
(2, 2, '[\"--\"]', '[\"--\"]', NULL, NULL),
(3, 3, '[\"--\"]', '[\"--\"]', NULL, NULL),
(4, 4, '[\"Indirect Lending ( Wholesale or institutional )\",\"Dircet lending ( All types ) \",\"Yuba Tathasana Byabasai Swarogarkosh\",\"Home Loan for Earthquake Victim \",\"Other all types of Sahuliyatpurna Karja \",\"Base Rate of Jestha , 2078\",\"Penal Interest onpast due loans and expired loans \" ]', '[\"Base Rate + Up to 2.5% or ( As per agreement )\",\"Base Rate + Up to 2.5%\", \"As per NRB norms\", \"As per NRB norms \",\"As per NRB norms \",\"10.05%\",\"+2 applicable rate ( Base rate + applied premium)\"]', NULL, NULL),
(5, 5, '[\"Indirect Lending ( Wholesale or institutional )\",\"Dircet lending ( All types ) \",\"Yuba Tathasana Byabasai Swarogarkosh\",\"Home Loan for Earthquake Victim\", \"Other all types of Sahuliyatpurna Karja\", \"Base Rate of Ashad , 2078\",\"Penal Interest onpast due loans and expired loans\" ]', '[\"Base Rate + Up to 2.5% or ( As per agreement )\",\"Base Rate + Up to 2.5%\", \"As per NRB norms \",\"As per NRB norms\", \"As per NRB norms\", \"9.40%\",\"+2 applicable rate ( Base rate + applied premium)\"]', NULL, NULL),
(6, 6, '[\"Indirect Lending ( Wholesale or institutional )\",\"Dircet lending ( All types )\", \"Yuba Tathasana Byabasai Swarogarkosh\",\"Home Loan for Earthquake Victim\", \"Other all types of Sahuliyatpurna Karja\", \"Base Rate of Shrawan, 2078\",\"Penal Interest onpast due loans and expired loans\",]', '[\"Base Rate + Up to 2.5% or ( As per agreement )\",\"Base Rate + Up to 2.5%\", \"As per NRB norms\", \"As per NRB norms\", \"As per NRB norms\", \"10.26%\",\"+2 applicable rate ( Base rate + applied premium)\"]', NULL, NULL),
(7, 7, '[\"Indirect Lending ( Wholesale or institutional )\",\"Dircet lending ( All types )\", \"Yuba Tathasana Byabasai Swarogarkosh\",\"Home Loan for Earthquake Victim\", \"Other all types of Sahuliyatpurna Karja\", \"Base Rate of Bhadra, 2078\",\"Penal Interest onpast due loans and expired loans\"]', '[\"Base Rate + Up to 2.5% or ( As per agreement )\",\"Base Rate + Up to 2.5%\", \"As per NRB norms\", \"As per NRB norms\", \"As per NRB norms\", \"9.16%\",\"+2 applicable rate ( Base rate + applied premium)\"]', NULL, NULL),
(8, 8, '[\"Indirect Lending ( Wholesale or institutional )\",\"Dircet lending ( All types )\", \"Yuba Tathasana Byabasai Swarogarkosh\",\"Home Loan for Earthquake Victim\", \"Other all types of Sahuliyatpurna Karja\", \"Base Rate of Aswin, 2078\",\"Penal Interest onpast due loans and expired loans\",]', '[\"Base Rate + Up to 2.5% or ( As per agreement )\",\"Base Rate + Up to 2.5%\", \"As per NRB norms\", \"As per NRB norms\", \"As per NRB norms\", \"9.74%\",\"+2 applicable rate ( Base rate + applied premium)\"]', NULL, NULL),
(9, 9, '[\"Indirect Lending ( Wholesale or institutional )\",\"Dircet lending ( All types )\", \"Yuba Tathasana Byabasai Swarogarkosh\",\"Home Loan for Earthquake Victim \",\"Other all types of Sahuliyatpurna Karja\", \"Base Rate of Kartik , 2078\",\"Penal Interest onpast due loans and expired loans\"]', '[\"Base Rate + Up to 2.5% or ( As per agreement )\",\"Base Rate + Up to 2.5%\", \"As per NRB norms\", \"As per NRB norms\", \"As per NRB norms\", \"9.93%\",\"+2 applicable rate ( Base rate + applied premium)\"]', NULL, NULL),
(10, 10, '[\"Indirect Lending ( Wholesale or institutional )\",\"Dircet lending ( All types )\", \"Yuba Tathasana Byabasai Swarogarkosh\",\"Home Loan for Earthquake Victim\", \"Other all types of Sahuliyatpurna Karja\", \"Base Rate of Mangsir , 2078\",\"Penal Interest onpast due loans and expired loans\"]', '[\"Base Rate + Up to 2.5% or ( As per agreement )\",\"Base Rate + Up to 2.5%\", \"As per NRB norms\", \"As per NRB norms\", \"As per NRB norms\", \"10.33%\",\"+2 applicable rate ( Base rate + applied premium)\"]', NULL, NULL),
(11, 11, '[\"Indirect Lending ( Wholesale or institutional )\",\"Dircet lending ( All types )\", \"Yuba Tathasana Byabasai Swarogarkosh\",\"Home Loan for Earthquake Victim\", \"Other all types of Sahuliyatpurna Karja\", \"Base Rate of Poush , 2078\",\"Penal Interest onpast due loans and expired loans\" ]', '[\"Base Rate + Up to 2.5% or ( As per agreement )\",\"Base Rate + Up to 2.5%\", \"As per NRB norms\", \"As per NRB norms\", \"As per NRB norms\", \"10.77%\",\"+2 applicable rate ( Base rate + applied premium)\"]', NULL, NULL),
(12, 12, '[\"Indirect Lending ( Wholesale or institutional )\",\"Dircet lending ( All types )\", \"Yuba Tathasana Byabasai Swarogarkosh\",\"Home Loan for Earthquake Victim\", \"Other all types of Sahuliyatpurna Karja\", \"Base Rate of Magh  , 2078\",\"Penal Interest onpast due loans and expired loans\"]', '[\"Base Rate + Up to 2.5% or ( As per agreement )\",\"Base Rate + Up to 2.5%\", \"As per NRB norms\", \"As per NRB norms\", \"As per NRB norms\", \"11.11%\",\"+2 applicable rate ( Base rate + applied premium)\"]', NULL, NULL),
(13, 13, '[\"--\"]', '[\"--\"]', NULL, NULL),
(14, 14, '[\"--\"]', '[\"--\"]', NULL, NULL),
(15, 15, '[\"--\"]', '[\"--\"]', NULL, NULL),
(16, 16, '[\"--\"]', '[\"--\"]', NULL, NULL),
(17, 17, '[\"--\"]', '[\"--\"]', NULL, NULL),
(18, 18, '[\"--\"]', '[\"--\"]', NULL, NULL),
(19, 19, '[\"--\"]', '[\"--\"]', NULL, NULL),
(20, 20, '[\"--\"]', '[\"--\"]', NULL, NULL),
(21, 21, '[\"--\"]', '[\"--\"]', NULL, NULL),
(22, 22, '[\"--\"]', '[\"--\"]', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint UNSIGNED NOT NULL,
  `sub_document_type_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `sub_document_type_id`, `title`, `created_at`, `updated_at`) VALUES
(6, 3, 'sample loan 1', '2023-05-30 11:07:28', '2023-05-30 11:07:28'),
(7, 1, 'circulars1', '2023-05-30 11:07:47', '2023-05-30 11:07:47'),
(8, 5, 'zsdfg', '2023-05-30 11:09:14', '2023-05-30 11:09:14'),
(9, 3, 'sasdasd', '2023-05-30 11:10:32', '2023-05-30 11:10:32');

-- --------------------------------------------------------

--
-- Table structure for table `document_types`
--

CREATE TABLE `document_types` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `document_types`
--

INSERT INTO `document_types` (`id`, `title`, `created_at`, `updated_at`) VALUES
(4, 'Credit', '2023-04-27 00:11:40', '2023-04-27 00:11:40'),
(5, 'Admin', '2023-04-27 00:11:48', '2023-04-27 00:11:48'),
(6, 'HR', '2023-04-27 00:11:56', '2023-04-27 00:12:08'),
(7, 'Forms', '2023-04-27 00:12:16', '2023-04-27 00:12:16'),
(8, 'Circulars', '2023-05-10 10:55:27', '2023-05-10 11:59:13');

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `position_id` bigint UNSIGNED NOT NULL,
  `department_id` bigint UNSIGNED NOT NULL,
  `branch_id` bigint UNSIGNED NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `order` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`id`, `user_id`, `position_id`, `department_id`, `branch_id`, `status`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, '1', 1, NULL, '2023-06-01 11:27:01'),
(2, 2, 2, 1, 1, '1', 2, NULL, '2023-06-02 04:44:11'),
(3, 3, 3, 2, 1, '1', 3, NULL, NULL),
(4, 4, 4, 3, 1, '1', 4, NULL, NULL),
(5, 5, 5, 4, 1, '1', 5, NULL, NULL),
(6, 6, 6, 5, 1, '1', 6, NULL, NULL),
(7, 7, 6, 6, 1, '1', 7, NULL, NULL),
(8, 8, 6, 7, 1, '1', 8, NULL, NULL),
(9, 9, 7, 8, 1, '1', 9, NULL, NULL),
(10, 10, 7, 9, 1, '1', 10, NULL, NULL),
(11, 11, 7, 10, 1, '1', 11, NULL, NULL),
(12, 12, 8, 11, 1, '1', 12, NULL, NULL),
(13, 13, 9, 12, 1, '1', 13, NULL, NULL),
(14, 14, 9, 13, 1, '1', 14, NULL, NULL),
(15, 15, 9, 14, 1, '1', 15, NULL, NULL),
(16, 16, 10, 15, 1, '1', 16, NULL, NULL),
(17, 17, 10, 16, 1, '1', 17, NULL, NULL),
(18, 18, 10, 17, 1, '1', 18, NULL, NULL),
(19, 19, 10, 18, 1, '1', 19, NULL, NULL),
(20, 20, 11, 19, 1, '1', 20, NULL, NULL),
(21, 21, 11, 12, 1, '1', 21, NULL, NULL),
(22, 22, 11, 20, 1, '1', 22, NULL, NULL),
(23, 23, 11, 11, 1, '1', 23, NULL, NULL),
(24, 24, 11, 21, 1, '1', 24, NULL, NULL),
(25, 25, 11, 20, 1, '1', 25, NULL, NULL),
(26, 26, 11, 22, 1, '1', 26, NULL, NULL),
(27, 27, 11, 20, 1, '1', 27, NULL, NULL),
(28, 28, 11, 7, 1, '1', 28, NULL, NULL),
(29, 29, 11, 7, 1, '1', 29, NULL, NULL),
(30, 30, 11, 23, 1, '1', 30, NULL, NULL),
(31, 31, 11, 24, 1, '1', 31, NULL, NULL),
(32, 32, 12, 25, 2, '1', 1, NULL, NULL),
(33, 33, 12, 18, 1, '1', 32, NULL, NULL),
(34, 34, 12, 11, 1, '1', 33, NULL, NULL),
(35, 35, 12, 25, 1, '1', 34, NULL, NULL),
(36, 36, 12, 26, 1, '1', 35, NULL, NULL),
(37, 37, 12, 21, 1, '1', 36, NULL, NULL),
(38, 38, 12, 23, 1, '1', 37, NULL, NULL),
(39, 39, 12, 25, 1, '1', 38, NULL, NULL),
(40, 40, 12, 26, 1, '1', 39, NULL, NULL),
(41, 41, 12, 16, 1, '1', 40, NULL, NULL),
(42, 42, 12, 18, 1, '1', 41, NULL, NULL),
(43, 43, 12, 19, 1, '1', 42, NULL, NULL),
(44, 44, 12, 6, 1, '1', 43, NULL, NULL),
(45, 45, 12, 27, 1, '1', 44, NULL, NULL),
(46, 46, 13, 6, 1, '1', 45, NULL, NULL),
(47, 47, 13, 25, 1, '1', 46, NULL, NULL),
(48, 48, 13, 28, 1, '1', 47, NULL, NULL),
(49, 49, 13, 26, 1, '1', 48, NULL, NULL),
(50, 50, 13, 29, 1, '1', 49, NULL, NULL),
(51, 51, 12, 1, 1, '1', 50, NULL, NULL),
(52, 52, 13, 1, 1, '1', 51, NULL, NULL),
(53, 53, 13, 7, 1, '1', 52, NULL, NULL),
(54, 54, 13, 7, 1, '1', 53, NULL, NULL),
(55, 55, 14, 1, 1, '1', 54, NULL, NULL),
(56, 56, 14, 1, 1, '1', 55, NULL, NULL),
(57, 57, 15, 1, 1, '1', 56, NULL, NULL),
(58, 58, 16, 1, 1, '1', 57, NULL, NULL),
(59, 59, 17, 30, 1, '1', 58, NULL, NULL),
(60, 60, 18, 1, 1, '1', 59, NULL, NULL),
(61, 61, 6, 9, 2, '1', 2, NULL, NULL),
(62, 62, 19, 31, 2, '1', 3, NULL, NULL),
(63, 63, 11, 17, 2, '1', 4, NULL, NULL),
(64, 64, 12, 22, 2, '1', 5, NULL, NULL),
(65, 65, 12, 26, 2, '1', 6, NULL, NULL),
(66, 66, 15, 1, 2, '1', 7, NULL, NULL),
(67, 67, 8, 9, 3, '1', 1, NULL, NULL),
(68, 68, 12, 26, 3, '1', 2, NULL, NULL),
(69, 69, 12, 25, 3, '1', 3, NULL, NULL),
(70, 70, 13, 25, 3, '1', 4, NULL, NULL),
(71, 71, 15, 1, 3, '1', 5, NULL, NULL),
(72, 72, 9, 9, 4, '1', 1, NULL, NULL),
(73, 73, 11, 25, 4, '1', 2, NULL, NULL),
(74, 74, 12, 25, 4, '1', 3, NULL, NULL),
(75, 75, 12, 22, 4, '1', 4, NULL, NULL),
(76, 76, 12, 26, 4, '1', 5, NULL, NULL),
(77, 77, 15, 1, 4, '1', 6, NULL, NULL),
(78, 78, 7, 9, 5, '1', 1, NULL, NULL),
(79, 79, 19, 31, 5, '1', 2, NULL, NULL),
(80, 80, 11, 17, 5, '1', 3, NULL, NULL),
(81, 81, 12, 22, 5, '1', 4, NULL, NULL),
(82, 82, 12, 26, 5, '1', 5, NULL, NULL),
(83, 83, 12, 25, 5, '1', 6, NULL, NULL),
(84, 84, 15, 32, 5, '1', 7, NULL, NULL),
(85, 85, 8, 9, 6, '1', 1, NULL, NULL),
(86, 86, 12, 26, 6, '1', 2, NULL, NULL),
(87, 87, 12, 26, 6, '1', 3, NULL, NULL),
(88, 88, 12, 25, 6, '1', 4, NULL, NULL),
(89, 89, 12, 33, 6, '1', 5, NULL, NULL),
(90, 90, 8, 9, 7, '1', 1, NULL, NULL),
(91, 91, 12, 17, 8, '1', 1, NULL, NULL),
(92, 92, 11, 34, 7, '1', 2, NULL, NULL),
(93, 93, 12, 26, 7, '1', 3, NULL, NULL),
(94, 94, 13, 22, 7, '1', 4, NULL, NULL),
(95, 95, 13, 25, 7, '1', 5, NULL, NULL),
(96, 96, 20, 25, 7, '1', 6, NULL, NULL),
(97, 97, 15, 1, 7, '1', 7, NULL, NULL),
(98, 98, 15, 1, 8, '1', 2, NULL, NULL),
(99, 99, 15, 32, 6, '1', 3, NULL, NULL),
(100, 100, 8, 9, 8, '1', 4, NULL, NULL),
(101, 101, 19, 31, 8, '1', 5, NULL, NULL),
(102, 102, 12, 22, 8, '1', 6, NULL, NULL),
(103, 103, 12, 26, 8, '1', 7, NULL, NULL),
(104, 104, 13, 26, 8, '1', 8, NULL, NULL),
(105, 105, 13, 25, 8, '1', 9, NULL, NULL),
(106, 106, 11, 9, 9, '1', 1, NULL, NULL),
(107, 107, 13, 25, 9, '1', 2, NULL, NULL),
(108, 108, 15, 32, 9, '1', 3, NULL, NULL),
(109, 109, 8, 9, 10, '1', 1, NULL, NULL),
(110, 110, 19, 31, 10, '1', 2, NULL, NULL),
(111, 111, 11, 17, 10, '1', 3, NULL, NULL),
(112, 112, 11, 22, 10, '1', 4, NULL, NULL),
(113, 113, 12, 26, 10, '1', 5, NULL, NULL),
(114, 114, 13, 35, 10, '1', 6, NULL, NULL),
(115, 115, 15, 1, 10, '1', 7, NULL, NULL),
(116, 116, 12, 9, 11, '1', 1, NULL, NULL),
(117, 117, 12, 26, 11, '1', 2, NULL, NULL),
(118, 118, 13, 25, 11, '1', 3, NULL, NULL),
(119, 119, 15, 1, 11, '1', 4, NULL, NULL),
(120, 120, 11, 9, 12, '1', 1, NULL, NULL),
(121, 121, 11, 26, 12, '1', 2, NULL, NULL),
(122, 122, 12, 25, 12, '1', 3, NULL, NULL),
(123, 123, 15, 1, 12, '1', 4, NULL, NULL),
(124, 124, 9, 9, 13, '1', 1, NULL, NULL),
(125, 125, 19, 31, 13, '1', 2, NULL, NULL),
(126, 126, 12, 36, 13, '1', 3, NULL, NULL),
(127, 127, 12, 22, 13, '1', 4, NULL, NULL),
(128, 128, 13, 26, 13, '1', 5, NULL, NULL),
(129, 129, 15, 1, 13, '1', 6, NULL, NULL),
(130, 130, 8, 9, 14, '1', 1, NULL, NULL),
(131, 131, 12, 33, 14, '1', 2, NULL, NULL),
(132, 132, 13, 25, 14, '1', 3, NULL, NULL),
(133, 133, 13, 22, 14, '1', 4, NULL, NULL),
(134, 134, 13, 25, 14, '1', 5, NULL, NULL),
(135, 135, 15, 1, 14, '1', 6, NULL, NULL),
(136, 136, 8, 9, 15, '1', 1, NULL, NULL),
(137, 137, 8, 26, 15, '1', 2, NULL, NULL),
(138, 138, 19, 31, 15, '1', 3, NULL, NULL),
(139, 139, 12, 22, 15, '1', 4, NULL, NULL),
(140, 140, 13, 25, 15, '1', 5, NULL, NULL),
(141, 141, 21, 1, 15, '1', 6, NULL, NULL),
(142, 142, 11, 9, 16, '1', 1, NULL, NULL),
(143, 143, 12, 1, 16, '1', 2, NULL, NULL),
(144, 144, 13, 22, 16, '1', 3, NULL, NULL),
(145, 145, 13, 26, 16, '1', 4, NULL, NULL),
(146, 146, 15, 1, 16, '1', 5, NULL, NULL),
(147, 147, 12, 37, 17, '1', 1, NULL, NULL),
(148, 148, 12, 26, 17, '1', 2, NULL, NULL),
(149, 149, 12, 33, 17, '1', 3, NULL, NULL),
(150, 150, 20, 25, 17, '1', 4, NULL, NULL),
(151, 151, 14, 1, 17, '1', 5, NULL, NULL),
(152, 152, 9, 9, 18, '1', 1, NULL, NULL),
(153, 153, 11, 17, 18, '1', 2, NULL, NULL),
(154, 154, 12, 26, 18, '1', 3, NULL, NULL),
(155, 155, 12, 22, 18, '1', 4, NULL, NULL),
(156, 156, 21, 1, 18, '1', 5, NULL, NULL),
(157, 157, 12, 37, 19, '1', 1, NULL, NULL),
(158, 158, 13, 36, 19, '1', 2, NULL, NULL),
(159, 159, 21, 32, 19, '1', 3, NULL, NULL),
(160, 160, 15, 1, 19, '1', 4, NULL, NULL),
(161, 161, 8, 9, 20, '1', 1, NULL, NULL),
(162, 162, 12, 26, 20, '1', 2, NULL, NULL),
(163, 163, 13, 22, 20, '1', 3, NULL, NULL),
(164, 164, 13, 25, 20, '1', 4, NULL, NULL),
(165, 165, 21, 32, 20, '1', 5, NULL, NULL),
(166, 166, 4, 38, 21, '1', 1, NULL, NULL),
(167, 167, 9, 9, 21, '1', 2, NULL, NULL),
(168, 168, 12, 33, 21, '1', 3, NULL, NULL),
(169, 169, 12, 26, 21, '1', 4, NULL, NULL),
(170, 170, 13, 25, 21, '1', 5, NULL, NULL),
(171, 171, 19, 31, 21, '1', 6, NULL, NULL),
(172, 172, 15, 1, 21, '1', 7, NULL, NULL),
(173, 173, 9, 9, 22, '1', 1, NULL, NULL),
(174, 174, 12, 26, 22, '1', 2, NULL, NULL),
(175, 175, 12, 33, 22, '1', 3, NULL, NULL),
(176, 176, 20, 22, 22, '1', 4, NULL, NULL),
(177, 177, 21, 32, 22, '1', 5, NULL, NULL),
(178, 178, 9, 9, 23, '1', 1, NULL, NULL),
(179, 179, 12, 17, 23, '1', 2, NULL, NULL),
(180, 180, 12, 25, 23, '1', 3, NULL, NULL),
(181, 181, 13, 26, 23, '1', 4, NULL, NULL),
(182, 182, 15, 32, 23, '1', 5, NULL, NULL),
(183, 183, 10, 9, 24, '1', 1, NULL, NULL),
(184, 184, 12, 26, 24, '1', 2, NULL, NULL),
(185, 185, 12, 17, 24, '1', 3, NULL, NULL),
(186, 186, 13, 25, 24, '1', 4, NULL, NULL),
(187, 187, 20, 35, 24, '1', 5, NULL, NULL),
(188, 188, 15, 1, 24, '1', 6, NULL, NULL),
(189, 189, 8, 1, 25, '1', 1, NULL, NULL),
(190, 190, 12, 26, 25, '1', 2, NULL, NULL),
(191, 191, 13, 25, 25, '1', 3, NULL, NULL),
(192, 192, 13, 22, 25, '1', 4, NULL, NULL),
(193, 193, 13, 25, 25, '1', 5, NULL, NULL),
(194, 194, 8, 9, 26, '1', 1, NULL, NULL),
(195, 195, 12, 26, 26, '1', 2, NULL, NULL),
(196, 196, 12, 34, 26, '1', 3, NULL, NULL),
(197, 197, 13, 25, 26, '1', 4, NULL, NULL),
(198, 198, 14, 1, 26, '1', 5, NULL, NULL),
(199, 199, 11, 37, 27, '1', 1, NULL, NULL),
(200, 200, 11, 25, 27, '1', 2, NULL, NULL),
(201, 201, 13, 22, 27, '1', 3, NULL, NULL),
(202, 202, 15, 1, 27, '1', 4, NULL, NULL),
(203, 203, 22, 39, 1, '1', 1, '2023-05-30 08:33:22', '2023-05-30 08:33:22'),
(204, 204, 23, 39, 1, '1', 2, '2023-05-30 08:35:46', '2023-05-30 08:36:17'),
(205, 205, 23, 39, 1, '1', 3, '2023-05-30 08:39:27', '2023-05-30 08:39:27'),
(206, 206, 23, 39, 1, '1', 5, '2023-05-30 08:46:57', '2023-05-30 08:46:57'),
(207, 207, 23, 39, 1, '1', 6, '2023-05-30 08:51:01', '2023-05-30 08:51:01'),
(208, 208, 23, 39, 1, '1', 7, '2023-05-30 09:03:36', '2023-05-30 09:03:36'),
(209, 209, 23, 39, 1, '1', 8, '2023-05-30 09:05:45', '2023-05-30 09:05:45');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fiscal_years`
--

CREATE TABLE `fiscal_years` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fiscal_years`
--

INSERT INTO `fiscal_years` (`id`, `title`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(2, '2079/2080', 'बुध, असार १, २०७९', 'बिही, सावन ३२, २०८०', '2023-05-09 04:52:19', '2023-05-22 08:34:22'),
(3, '2080/2081', 'शुक्र, असार १, २०८०', 'शुक्र, सावन ३२, २०८१', '2023-05-09 06:40:36', '2023-05-22 08:34:56'),
(6, '2081/2082', 'शुक्र, असार १, २०८१', 'आईत, असार ३१, २०८०', '2023-05-22 08:35:26', '2023-05-22 08:35:26'),
(7, '2078/2079', 'मंगल, असार १, २०७८', 'मंगल, सावन ३१, २०७९', '2023-05-26 07:17:53', '2023-05-26 07:17:53'),
(8, '2077/2078', 'सोम, असार १, २०७७', 'बिही, असार ३१, २०७८', '2023-05-26 07:37:48', '2023-05-26 07:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `fixed_deposits`
--

CREATE TABLE `fixed_deposits` (
  `id` bigint UNSIGNED NOT NULL,
  `interest_head_id` bigint UNSIGNED NOT NULL,
  `particulars` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `individual` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `individual_remit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `institutional` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `institutional_renew` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fixed_deposits`
--

INSERT INTO `fixed_deposits` (`id`, `interest_head_id`, `particulars`, `individual`, `individual_remit`, `institutional`, `institutional_renew`, `created_at`, `updated_at`) VALUES
(1, 1, '[\"3 Months  1 Year\",\"Above 1 Year to 3 Years\",\"3 Years Above\"]', '[\"8.5%(Monthly/Quarterly/Maturity )\",\"8.75%(Quarterly/Maturity )\",\"9%(Quarterly/Maturity )\"]', '[\"--\",\"--\",\"--\"]', '[\"7%(Quarterly/Maturity )\",\"7.5&(Quarterly/Maturity )\",\"8%(Quarterly/Maturity )\"]', '[\"--\",\"--\",\"--\"]', NULL, '2023-05-28 10:22:18'),
(2, 2, '[\"3 Months  1 Year\",\"Above 1 Year to 3 Years\",\"3 Years Above\"]', '[\"8.5%(Monthly/Quarterly/Maturity )\",\"8.75%(Quarterly/Maturity )\",\"9%(Quarterly/Maturity )\"]', '[\"--\",\"--\",\"--\"]', '[\"8%(Quarterly/Maturity )\",\"8.25%(Quarterly/Maturity )\",\"8.5%(Quarterly/Maturity )\"]', '[\"--\",\"--\",\"--\"]', NULL, NULL),
(3, 3, '[\"3 Months  1 Year\",\"Above 1 Year to 3 Years\",\"3 Years Above\"]', '[\"8.5%(Monthly/Quarterly/Maturity )\",\"8.75%(Quarterly/Maturity )\",\"9%(Quarterly/Maturity )\"]', '[\"--\",\"--\",\"--\"]', '[\"8%(Quarterly/Maturity )\",\"8.25%(Quarterly/Maturity )\",\"8.5%(Quarterly/Maturity )\"]', '[\"--\",\"--\",\"--\"]', NULL, NULL),
(4, 4, '[\"3 Months  1 Year\",\"Above 1 Year to 3 Years\",\"3 Years Above\"]', '[\"8.5%(Monthly/Quarterly/Maturity )\",\"8.75%(Quarterly/Maturity )\",\"9%(Quarterly/Maturity )\"]', '[\"--\",\"--\",\"--\"]', '[\"8.5%(Quarterly/Maturity )\",\"8.75%(Quarterly/Maturity )\",\"9%(Quarterly/Maturity )\"]', '[\"--\",\"--\",\"--\"]', NULL, NULL),
(5, 5, '[\"3 Years Above\",\"Above 1 year\"]', '[\"9.35%(Monthly/Quarterly/Maturity )\",\"9.60%(Quarterly/Maturity )\"]', '[\"--\",\"--\"]', '[\"8.35%(Quarterly/Maturity )\",\"8.6%(Quarterly/Maturity )\"]', '[\"--\",\"--\"]', NULL, NULL),
(6, 6, '[\"3 Months Above\",\"Saving Deposit\"]', '[\"10.35%  (Monthly/Quarterly/Maturity )\",\"--\"]', '[\"--\",\"--\"]', '[\"9.35% (Monthly/Quarterly/Maturity )\",\"6.5% to 7%\"]', '[\"--\",\"--\"]', NULL, NULL),
(7, 7, '[\"3 Months Above\",\"Saving Deposit\",\"Call Deposit\"]', '[\"10.35%  (Monthly/Quarterly/Maturity )\",\"--\",\"--\"]', '[\"--\",\"--\",\"--\"]', '[\"9.35% (Monthly/Quarterly/Maturity )\",\"6.5% to 7%\",\"up to 3.25%\"]', '[\"--\",\"--\",\"--\"]', NULL, NULL),
(8, 8, '[\"3 Months Above\",\"Saving Deposit\",\"Call Deposit\"]', '[\"10.65%  (Monthly/Quarterly/Maturity )\",\"--\",\"--\"]', '[\"--\",\"--\",\"--\"]', '[\"9.65% (Monthly/Quarterly/Maturity )\",\"6.5% to 7%\",\"up to 3.25%\"]', '[\"--\",\"--\",\"--\"]', NULL, NULL),
(9, 9, '[\"3 Months Above\",\"Maximum fixed deposit intrest rate \",\"Saving Deposit\",\"Call Deposit\"]', '[\"11.71%  (Monthly/Quarterly/Maturity )\",\"--\",\"--\",\"--\"]', '[\"--\",\"--\",\"--\",\"--\"]', '[\"10.71% (Monthly/Quarterly/Maturity )\",\"7% to 7.5%\",\"up to 3.5%\",\"--\"]', '[\"--\",\"--\",\"--\",\"--\"]', NULL, NULL),
(10, 10, '[\"3 Months\",\"6 Months to 9 Months \",\"1 year\",\"2 Years and Above \"]', '[\"11.71%(Monthly/Quarterly/Maturity )\",\"12.10%(Monthly/Quarterly/Maturity )\",\"12.15%(Monthly/Quarterly/Maturity )\",\"12.25% (Quarterly/Maturity )\"]', '[\"--\",\"--\",\"--\",\"--\"]', '[\"--\",\"--\",\"--\",\"--\"]', '[\"--\",\"--\",\"--\",\"--\"]', NULL, NULL),
(11, 11, '[\"3 months\",\"6 months\",\"9 months\",\"1 Year to below 2 years\",\"2 Years and Above\"]', '[\"12% Monthly/Quarterly/Maturity\",\"12.05% Monthly/Quarterly/Maturity\",\"12.1% Monthly/Quarterly/Maturity\",\"12.15% Monthly/Quarterly/Maturity\",\"12.25% Monthly/Quarterly/Maturity\"]', '[\"--\",\"--\",\"--\",\"--\",\"--\"]', '[\"11% Monthly/Quarterly/Maturity\",\"11.05% Monthly/Quarterly/Maturity\",\"11.1% Monthly/Quarterly/Maturity\",\"11.15% Monthly/Quarterly/Maturity\",\"11.25% Monthly/Quarterly/Maturity\"]', '[\"--\",\"--\",\"--\",\"--\",\"--\"]', NULL, NULL),
(12, 12, '[\"3 months\",\"6 months\",\"9 months\",\"1 Year to below 2 years\",\"2 Years and Above\"]', '[\"12% Monthly/Quarterly/Maturity\",\"12.05% Monthly/Quarterly/Maturity\",\"12.1% Monthly/Quarterly/Maturity\",\"12.15% Monthly/Quarterly/Maturity\",\"12.25% Monthly/Quarterly/Maturity\"]', '[\"--\",\"--\",\"--\",\"--\",\"--\"]', '[\"11% Monthly/Quarterly/Maturity\",\"11.05% Monthly/Quarterly/Maturity\",\"11.1% Monthly/Quarterly/Maturity\",\"11.15% Monthly/Quarterly/Maturity\",\"11.25% Monthly/Quarterly/Maturity\"]', '[\"--\",\"--\",\"--\",\"--\",\"--\"]', NULL, NULL),
(13, 13, '[\"3 months\",\"6 months\",\"9 months\",\"1 Year to below 2 years\",\"2 Years and Above\"]', '[\"12.00%\",\"12.05%\",\"12.10%\",\"12.15%\",\"12.25%\"]', '[\"13.00%\",\"13.05%\",\"13.10%\",\"13.15%\",\"13.25%\"]', '[\"11.00%\",\"11.05%\",\"11.10%\",\"11.15%\",\"11.25%\"]', '[\"11.10%\",\"11.15%\",\"11.20%\",\"11.25%\",\"11.35%\"]', NULL, NULL),
(14, 14, '[\"3 months\",\"6 months\",\"9 months\",\"1 Year to below 2 years\",\"2 Years and Above\"]', '[\"12.00%\",\"12.05%\",\"12.10%\",\"12.15%\",\"12.25%\"]', '[\"13.00%\",\"13.05%\",\"13.10%\",\"13.15%\",\"13.25%\"]', '[\"10.00%\",\"10.05%\",\"10.10%\",\"10.15%\",\"10.25%\"]', '[\"10.50%\",\"10.55%\",\"10.60%\",\"10.65%\",\"10.65%\"]', NULL, NULL),
(15, 15, '[\"3 months\",\"6 months\",\"9 months\",\"1 Year to below 2 years\",\"2 Years and Above\"]', '[\"13.20%\",\"13.30%\",\"13.35%\",\"13.45%\",\"13.47%\"]', '[\"14.20%\",\"14.30%\",\"14.35%\",\"14.45%\",\"14.47%\"]', '[\"11.20%\",\"11.30%\",\"11.35%\",\"11.45%\",\"11.47%\"]', '[\"11.70%\",\"11.80%\",\"11.85%\",\"11.95%\",\"11.97%\"]', NULL, NULL),
(16, 16, '[\"3 months\",\"6 months\",\"9 months\",\"1 Year to below 2 years\",\"2 Years and Above\"]', '[\"13.20%\",\"13.30%\",\"13.35%\",\"13.45%\",\"13.47%\"]', '[\"14.20%\",\"14.30%\",\"14.35%\",\"14.45%\",\"14.47%\"]', '[\"11.20%\",\"11.30%\",\"11.35%\",\"11.45%\",\"11.47%\"]', '[\"11.70%\",\"11.80%\",\"11.85%\",\"11.95%\",\"11.97%\"]', NULL, NULL),
(17, 17, '[\"3 months\",\"6 months\",\"9 months\",\"1 Year to below 2 years\",\"2 Years and Above\"]', '[\"13.00%\",\"13.05%\",\"13.10%\",\"13.30%\",\"13.35%\"]', '[\"14.00%\",\"14.05%\",\"14.10%\",\"14.30%\",\"14.35%\"]', '[\"11.00%\",\"11.05%\",\"11.10%\",\"11.30%\",\"11.35%\"]', '[\"11.50%\",\"11.55%\",\"11.60%\",\"11.80%\",\"11.85%\"]', NULL, NULL),
(18, 18, '[\"3 months\",\"6 months\",\"9 months\",\"1 Year to below 2 years\",\"2 Years and Above\"]', '[\"13.00%\",\"13.05%\",\"13.10%\",\"13.30%\",\"13.35%\"]', '[\"14.00%\",\"14.05%\",\"14.10%\",\"14.30%\",\"14.35%\"]', '[\"11.00%\",\"11.05%\",\"11.10%\",\"11.30%\",\"11.35%\"]', '[\"11.50%\",\"11.55%\",\"11.60%\",\"11.80%\",\"11.85%\"]', NULL, NULL),
(20, 20, '[\"3 months\",\"6 months\",\"9 months\",\"1 Year to below 2 years\",\"2 Years and Above\",\"3 Years and above\"]', '[\"12.10%\",\"12.20%\",\"12.25%\",\"12.35%\",\"12.50%\",\"13.00%\"]', '[\"13.10%\",\"13.20%\",\"13.25%\",\"13.35%\",\"13.50%\",\"14.00%\"]', '[\"10.10%\",\"10.20%\",\"10.25%\",\"10.35%\",\"10.50%\",\"11.00%\"]', '[\"10.60%\",\"10.70%\",\"10.75%\",\"10.85%\",\"10.85%\",\"11.00%\"]', NULL, NULL),
(21, 21, '[\"3 months\",\"6 months\",\"9 months\",\"12 Months to Below 24 Months\",\"24 Months to Below 36 Months\",\"36 Months and Above\"]', '[\"11.85%\",\"11.95%\",\"12.00%\",\"12.10%\",\"12.20%\",\"12.50%\"]', '[\"12.85%\",\"12.95%\",\"13.00%\",\"13.10%\",\"13.20%\",\"13.50%\"]', '[\"--\",\"9.95%\",\"10.00%\",\"10.10%\",\"10.20%\",\"10.50%\"]', '[\"--\",\"10.45%\",\"10.50%\",\"10.60%\",\"10.70%\",\"11.00%\"]', NULL, NULL),
(22, 22, '[\"3 month\",\"6 months\",\"9 months\",\"12 Months to Below 24 Months\",\"24 Months to Below 36 Months\"]', '[\"10.60%\",\"10.75%\",\"10.90%\",\"11.10%\",\"11.25%\"]', '[\"11.60%\",\"11.75%\",\"11.90%\",\"12.10%\",\"12.25%\"]', '[\"--\",\"8.75%\",\"8.90%\",\"9.10%\",\"9.25%\"]', '[\"--\",\"--\",\"--\",\"--\",\"--\"]', NULL, '2023-05-28 10:38:21'),
(23, 23, '[\"3 months\",\"6 months\",\"9 months\",\"12 Months to Below 24 Months\",\"24 Months to Below 36 Months\"]', '[\"10.60%\",\"10.75%\",\"10.90%\",\"11.10%\",\"11.25%\"]', '[\"11.60%\",\"11.75%\",\"11.90%\",\"12.10%\",\"12.25%\"]', '[\"--\",\"8.75%\",\"8.90%\",\"9.10%\",\"9.25%\"]', '[\"--\",\"--\",\"--\",\"--\",\"--\"]', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fixed_interests`
--

CREATE TABLE `fixed_interests` (
  `id` bigint UNSIGNED NOT NULL,
  `interest_head_id` bigint UNSIGNED NOT NULL,
  `particulars` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `upto5years` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fivetotenyears` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `above10years` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fixed_interests`
--

INSERT INTO `fixed_interests` (`id`, `interest_head_id`, `particulars`, `upto5years`, `fivetotenyears`, `above10years`, `created_at`, `updated_at`) VALUES
(1, 1, '[\"Home Loan\",\"Auto Loan/HP Loan\",\"Other Retail Loan\"]', '[\"14.50%\",\"14.50%\",\"14.50%\"]', '[\"15.00%\",\"15.00%\",\"15.00%\"]', '[\"15.50%\",\"--\",\"15.50%\"]', NULL, NULL),
(2, 2, '[\"Home Loan\",\"Auto Loan/HP Loan\",\"Other Retail Loan\"]', '[\"14.50%\",\"14.50%\",\"14.50%\"]', '[\"15.00%\",\"15.00%\",\"15.00%\"]', '[\"15.50%\",\"--\",\"15.50%\"]', NULL, NULL),
(3, 3, '[\"Home Loan\",\"Auto Loan/HP Loan\",\"Other Retail Loan\"]', '[\"14.50%\",\"14.50%\",\"14.50%\"]', '[\"15.00%\",\"15.00%\",\"15.00%\"]', '[\"15.50%\",\"--\",\"15.50%\"]', NULL, NULL),
(4, 4, '[\"Home Loan\",\"Auto Loan/HP Loan\",\"Other Retail Loan\"]', '[\"14.50%\",\"14.50%\",\"14.50%\"]', '[\"15.00%\",\"15.00%\",\"15.00%\"]', '[\"15.50%\",\"--\",\"15.50%\"]', NULL, NULL),
(5, 5, '[\"Home Loan\",\"Auto Loan/HP Loan\",\"Other Retail Loan\"]', '[\"14.50%\",\"14.50%\",\"14.50%\"]', '[\"15.00%\",\"15.00%\",\"15.00%\"]', '[\"15.50%\",\"--\",\"15.50%\"]', NULL, NULL),
(6, 6, '[\"Home Loan\",\"Auto Loan/HP Loan\",\"Other Retail Loan\"]', '[\"14.50%\",\"14.50%\",\"14.50%\"]', '[\"15.00%\",\"15.00%\",\"15.00%\"]', '[\"15.50%\",\"--\",\"15.50%\"]', NULL, NULL),
(7, 7, '[\"Home Loan\",\"Auto Loan/HP Loan\",\"Other Retail Loan\"]', '[\"14.50%\",\"14.50%\",\"14.50%\"]', '[\"15.00%\",\"15.00%\",\"15.00%\"]', '[\"15.50%\",\"--\",\"15.50%\"]', NULL, NULL),
(8, 8, '[\"Home Loan\",\"Auto Loan/HP Loan\",\"Other Retail Loan\"]', '[\"14.50%\",\"14.50%\",\"14.50%\"]', '[\"15.00%\",\"15.00%\",\"15.00%\"]', '[\"15.50%\",\"--\",\"15.50%\"]', NULL, NULL),
(9, 9, '[\"Home Loan\",\"Auto Loan/HP Loan\",\"Other Retail Loan\"]', '[\"14.50%\",\"14.50%\",\"14.50%\"]', '[\"15.00%\",\"15.00%\",\"15.00%\"]', '[\"15.50%\",\"--\",\"15.50%\"]', NULL, NULL),
(10, 10, '[\"Home Loan\",\"Auto Loan/HP Loan\",\"Other Retail Loan\"]', '[\"14.50%\",\"14.50%\",\"14.50%\"]', '[\"15.00%\",\"15.00%\",\"15.00%\"]', '[\"15.50%\",\"--\",\"15.50%\"]', NULL, NULL),
(11, 11, '[\"Home Loan\",\"Auto Loan/HP Loan\",\"Other Retail Loan\"]', '[\"15.00%\",\"15.00%\",\"15.00%\"]', '[\"15.50%\",\"15.50%\",\"15.50%\"]', '[\"16.00%\",\"--\",\"16.00%\"]', NULL, NULL),
(12, 12, '[\"Home Loan\",\"Auto Loan/HP Loan\",\"Other Retail Loan\"]', '[\"15.00%\",\"15.00%\",\"15.00%\"]', '[\"15.50%\",\"15.50%\",\"15.50%\"]', '[\"16.00%\",\"--\",\"16.00%\"]', NULL, NULL),
(13, 13, '[\"Home Loan\",\"Auto Loan/HP Loan\",\"Other Retail Loan\"]', '[\"15.00%\",\"15.00%\",\"15.00%\"]', '[\"15.50%\",\"15.50%\",\"15.50%\"]', '[\"16.00%\",\"--\",\"16.00%\"]', NULL, NULL),
(14, 14, '[\"Home Loan\",\"Auto Loan/HP Loan\",\"Other Retail Loan\"]', '[\"15.00%\",\"15.00%\",\"15.00%\"]', '[\"15.50%\",\"15.50%\",\"15.50%\"]', '[\"16.00%\",\"--\",\"16.00%\"]', NULL, NULL),
(15, 15, '[\"Home Loan\",\"Auto Loan/HP Loan\",\"Other Retail Loan\"]', '[\"17.00%\",\"17.00%\",\"17.00%\"]', '[\"17.50%\",\"17.50%\",\"17.50%\"]', '[\"18.00%\",\"--\",\"18.00%\"]', NULL, NULL),
(16, 16, '[\"Home Loan\",\"Auto Loan/HP Loan\",\"Other Retail Loan\"]', '[\"17.00%\",\"17.00%\",\"17.00%\"]', '[\"17.50%\",\"17.50%\",\"17.50%\"]', '[\"18.00%\",\"--\",\"18.00%\"]', NULL, NULL),
(17, 17, '[\"Home Loan\",\"Auto Loan/HP Loan\",\"Other Retail Loan\"]', '[\"17.00%\",\"17.00%\",\"17.00%\"]', '[\"17.50%\",\"17.50%\",\"17.50%\"]', '[\"18.00%\",\"--\",\"18.00%\"]', NULL, NULL),
(18, 18, '[\"Home Loan\",\"Auto Loan/HP Loan\",\"Other Retail Loan\"]', '[\"17.00%\",\"17.00%\",\"17.00%\"]', '[\"17.50%\",\"17.50%\",\"17.50%\"]', '[\"18.00%\",\"--\",\"18.00%\"]', NULL, NULL),
(19, 19, '[\"Home Loan\",\"Auto Loan/HP Loan\",\"Other Retail Loan\"]', '[\"17.00%\",\"17.00%\",\"17.00%\"]', '[\"17.50%\",\"17.50%\",\"17.50%\"]', '[\"18.00%\",\"--\",\"18.00%\"]', NULL, NULL),
(20, 20, '[\"Home Loan\",\"Auto Loan/HP Loan\",\"Other Retail Loan\"]', '[\"17.00%\",\"17.00%\",\"17.00%\"]', '[\"17.50%\",\"17.50%\",\"17.50%\"]', '[\"18.00%\",\"--\",\"18.00%\"]', NULL, NULL),
(21, 21, '[\"Home Loan\",\"Auto Loan/HP Loan\",\"Other Retail Loan\"]', '[\"15.00%\",\"15.00%\",\"15.00%\"]', '[\"15.50%\",\"15.50%\",\"15.50%\"]', '[\"16.00%\",\"--\",\"16.00%\"]', NULL, NULL),
(22, 22, '[\"Home Loan\",\"Auto Loan/HP Loan\",\"Other Retail Loan\"]', '[\"15.00%\",\"15.00%\",\"15.00%\"]', '[\"15.50%\",\"15.50%\",\"15.50%\"]', '[\"16.00%\",\"--\",\"16.00%\"]', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `insurances`
--

CREATE TABLE `insurances` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` bigint UNSIGNED NOT NULL,
  `insurance_company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `insurance_amount` double(12,2) NOT NULL,
  `insurance_start_date` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `insurance_expiry_date` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `insurances`
--

INSERT INTO `insurances` (`id`, `name`, `branch_id`, `insurance_company`, `insurance_amount`, `insurance_start_date`, `insurance_expiry_date`, `created_at`, `updated_at`) VALUES
(1, 'Life Insurance', 1, '10000', 10000.00, 'मंगल, जेठ १६, २०८०', 'बिही, जेठ १८, २०८०', '2023-05-31 03:35:11', '2023-05-31 03:35:11');

-- --------------------------------------------------------

--
-- Table structure for table `interest_heads`
--

CREATE TABLE `interest_heads` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fiscal_year_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interest_heads`
--

INSERT INTO `interest_heads` (`id`, `title`, `month`, `fiscal_year_id`, `created_at`, `updated_at`) VALUES
(1, 'Baisakh, 2077/2078', '1', 8, NULL, NULL),
(2, 'Shrawan, 2078/2079', '4', 7, NULL, NULL),
(3, 'Bhadra, 2078/2079', '5', 7, NULL, NULL),
(4, 'Aswin, 2078/2079', '6', 7, NULL, NULL),
(5, 'Kartik, 2078/2079', '7', 7, NULL, NULL),
(6, 'Mangsir, 2078/2079', '8', 7, NULL, NULL),
(7, 'Poush, 2078/2079', '9', 7, NULL, NULL),
(8, 'Magh, 2078/2079', '10', 7, NULL, NULL),
(9, 'Falgun, 2078/2079', '11', 7, NULL, NULL),
(10, 'Chaitra, 2078/2079', '12', 7, NULL, '2023-05-28 17:04:13'),
(11, 'Jestha, 2078/2079', '2', 7, NULL, NULL),
(12, 'Asar, 2078/2079', '3', 7, NULL, NULL),
(13, 'Shrawan, 2079/2080', '4', 2, NULL, NULL),
(14, 'Bhadra, 2079/2080', '5', 2, NULL, NULL),
(15, 'Aswin, 2079/2080', '6', 2, NULL, NULL),
(16, 'Kartik, 2079/2080', '7', 2, NULL, NULL),
(17, 'Mangsir, 2079/2080', '8', 2, NULL, NULL),
(18, 'Poush, 2079/2080', '9', 2, NULL, NULL),
(19, 'Magh, 2079/2080', '10', 2, NULL, NULL),
(20, 'Falgun, 2079/2080', '11', 2, NULL, NULL),
(21, 'Baisakh, 2079/2080', '1', 2, NULL, NULL),
(22, 'Jestha, 2079/2080', '2', 2, NULL, NULL),
(23, 'Asar, 2079/2080', '3', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `leave_from` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `leave_to` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `leave_type` enum('paid','unpaid','sick') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `user_id`, `leave_from`, `leave_to`, `leave_type`, `created_at`, `updated_at`) VALUES
(1, 31, '2023-06-03', '2023-06-04', 'unpaid', '2023-04-24 23:55:49', '2023-06-02 04:01:57'),
(3, 33, '2023-06-01', '2023-06-05', 'paid', '2023-05-22 06:23:59', '2023-06-02 04:30:03'),
(6, 2, '2023-05-25', '2023-06-01', 'paid', '2023-05-30 10:23:34', '2023-05-30 10:23:34'),
(7, 2, '2023-05-25', '2023-06-01', 'paid', '2023-05-30 10:23:53', '2023-05-30 10:23:53'),
(8, 3, '2023-05-30', '2023-06-01', 'paid', '2023-06-01 12:05:11', '2023-06-01 12:05:11');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` bigint UNSIGNED NOT NULL,
  `interest_head_id` bigint UNSIGNED NOT NULL,
  `particulars` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `interest_rate` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `interest_head_id`, `particulars`, `interest_rate`, `created_at`, `updated_at`) VALUES
(1, 1, '[\"Home Loan\",\"Personal Loan(OD/Term)\",\"Share Loan\",\"Gold Loan\",\"Business/Working Capital Loan\",\"Agriculture/SME/Education Loan\",\"Small Farm Individual Loan\",\"Hire Purchase\",\"Real Estate Loan\",\"Professional Loan/Bridge Gap Loan\",\"Loan Against FD\",\"Consortium Loan\"]', '[\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"Coupon rate + Up to 2 % or BR whichever is higher\",\"As per Consortium Decision\"]', NULL, NULL),
(2, 2, '[\"Home Loan\",\"Personal Loan(OD/Term)\",\"Share Loan\",\"Gold Loan\",\"Business/Working Capital Loan\",\"Agriculture/SME/Education Loan\",\"Small Farm Individual Loan\",\"Hire Purchase\",\"Real Estate Loan\",\"Professional Loan/Bridge Gap Loan\",\"Loan Against FD\",\"Consortium Loan\"]', '[\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"Coupon rate + Up to 2 % or BR whichever is higher\",\"As per Consortium Decision\"]', NULL, NULL),
(3, 3, '[\"Home Loan\",\"Personal Loan(OD/Term)\",\"Share Loan\",\"Gold Loan\",\"Business/Working Capital Loan\",\"Agriculture/SME/Education Loan\",\"Small Farm Individual Loan\",\"Hire Purchase\",\"Real Estate Loan\",\"Professional Loan/Bridge Gap Loan\",\"Loan Against FD\",\"Consortium Loan\"]', '[\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"Coupon rate + Up to 2 % or BR whichever is higher\",\"As per Consortium Decision\"]', NULL, NULL),
(4, 4, '[\"Home Loan\",\"Personal Loan(OD/Term)\",\"Share Loan\",\"Gold Loan\",\"Business/Working Capital Loan\",\"Agriculture/SME/Education Loan\",\"Small Farm Individual Loan\",\"Hire Purchase\",\"Real Estate Loan\",\"Professional Loan/Bridge Gap Loan\",\"Loan Against FD\",\"Consortium Loan\"]', '[\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"Coupon rate + Up to 2 % or BR whichever is higher\",\"As per Consortium Decision\"]', NULL, NULL),
(5, 5, '[\"Home Loan\",\"Personal Loan(OD/Term)\",\"Share Loan\",\"Gold Loan\",\"Business/Working Capital Loan\",\"Agriculture/SME/Education Loan\",\"Small Farm Individual Loan\",\"Hire Purchase\",\"Real Estate Loan\",\"Professional Loan/Bridge Gap Loan\",\"Loan Against FD\",\"Consortium Loan\"]', '[\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"Coupon rate + Up to 2 % or BR whichever is higher\",\"As per Consortium Decision\"]', NULL, NULL),
(6, 6, '[\"Home Loan\",\"Personal Loan(OD/Term)\",\"Share Loan\",\"Gold Loan\",\"Business/Working Capital Loan\",\"Agriculture/SME/Education Loan\",\"Small Farm Individual Loan\",\"Hire Purchase\",\"Real Estate Loan\",\"Professional Loan/Bridge Gap Loan\",\"Loan Against FD\",\"Consortium Loan\"]', '[\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"Coupon rate + Up to 2 % or BR whichever is higher\",\"As per Consortium Decision\"]', NULL, NULL),
(7, 7, '[\"Home Loan\",\"Personal Loan(OD/Term)\",\"Share Loan\",\"Gold Loan\",\"Business/Working Capital Loan\",\"Agriculture/SME/Education Loan\",\"Small Farm Individual Loan\",\"Hire Purchase\",\"Real Estate Loan\",\"Professional Loan/Bridge Gap Loan\",\"Loan Against FD\",\"Consortium Loan\"]', '[\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"Coupon rate + Up to 2 % or BR whichever is higher\",\"As per Consortium Decision\"]', NULL, NULL),
(8, 8, '[\"Home Loan\",\"Personal Loan(OD/Term)\",\"Share Loan\",\"Gold Loan\",\"Business/Working Capital Loan\",\"Agriculture/SME/Education Loan\",\"Small Farm Individual Loan\",\"Hire Purchase\",\"Real Estate Loan\",\"Professional Loan/Bridge Gap Loan\",\"Loan Against FD\",\"Consortium Loan\"]', '[\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"Coupon rate + Up to 2 % or BR whichever is higher\",\"As per Consortium Decision\"]', NULL, NULL),
(9, 9, '[\"Home Loan\",\"Personal Loan(OD/Term)\",\"Share Loan\",\"Gold Loan\",\"Business/Working Capital Loan\",\"Agriculture/SME/Education Loan\",\"Small Farm Individual Loan\",\"Hire Purchase\",\"Real Estate Loan\",\"Professional Loan/Bridge Gap Loan\",\"Loan Against FD\",\"Consortium Loan\"]', '[\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"Coupon rate + Up to 2 % or BR whichever is higher\",\"As per Consortium Decision\"]', NULL, NULL),
(10, 10, '[\"Home Loan\",\"Personal Loan(OD/Term)\",\"Share Loan\",\"Gold Loan\",\"Business/Working Capital Loan\",\"Agriculture/SME/Education Loan\",\"Small Farm Individual Loan\",\"Hire Purchase\",\"Real Estate Loan\",\"Professional Loan/Bridge Gap Loan\",\"Loan Against FD\",\"Consortium Loan\"]', '[\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"BR + Up to 5%\",\"Coupon rate + Up to 2 % or BR whichever is higher\",\"As per Consortium Decision\"]', NULL, NULL),
(11, 11, '[\"Home Loan\",\"Personal Loan(OD/Term)\",\"Share Loan\",\"Gold Loan\",\"Business/Working Capital Loan\",\"Agriculture/SME/Education Loan\",\"Small Farm Individual Loan\",\"Hire Purchase\",\"Real Estate Loan\",\"Professional Loan/Bridge Gap Loan\",\"Loan Against FD\",\"Consortium Loan\",\"Indirect Lending (Wholesale or Institutional)\",\"Direct lending (All types)\",\"Yuba Tatha sana Byabasai Swarogarkosh\",\"Home Loan for Earthquake Victim\",\"Other all types of Sahuliyatpurna Karja\",\"Base rate of Baishakh end, 2079\",\"Third Quarter Average Base Rate\",\"Penal Interest on past due loans and expired loans\"]', '[\"BR + Up to 6%\",\"BR + Up to 6%\",\"BR + Up to 6%\",\"BR + Up to 6%\",\"BR + Up to 6%\",\"BR + Up to 6%\",\"BR + Up to 6%\",\"BR + Up to 6%\",\"BR + Up to 6%\",\"BR + Up to 6%\",\"Coupon rate + Up to 2 \"%,\"As per Consortium Decision\",\"Base Rate + Up to 2.5% or (as per agreement)\",\"Base Rate + Up to 2.5%\",\"As per NRB norms\",\"As per NRB norms\",\"As per NRB norms\",\"11.92%\",\"11.45%\",\"+2 applicable rate (Base rate + applied premium)\"]', NULL, NULL),
(12, 12, '[\"Home Loan\",\"Personal Loan(OD/Term)\",\"Share Loan\",\"Gold Loan\",\"Business/Working Capital Loan\",\"Agriculture/SME/Education Loan\",\"Small Farm Individual Loan\",\"Hire Purchase\",\"Real Estate Loan\",\"Professional Loan/Bridge Gap Loan\",\"Loan Against FD\",\"Consortium Loan\",\"Indirect Lending (Wholesale or Institutional)\",\"Direct lending (All types)\",\"Yuba Tatha sana Byabasai Swarogarkosh\",\"Home Loan for Earthquake Victim\",\"Other all types of Sahuliyatpurna Karja\",\"Base rate of Baishakh end, 2079\",\"Third Quarter Average Base Rate\",\"Spread Rate (2079 Baisakh)\",\"Penal Interest on past due loans and expired loans\"]', '[\"BR + Up to 6%\",\"BR + Up to 6%\",\"BR + Up to 6%\",\"BR + Up to 6%\",\"BR + Up to 6%\",\"BR + Up to 6%\",\"BR + Up to 6%\",\"BR + Up to 6%\",\"BR + Up to 6%\",\"BR + Up to 6%\",\"Coupon rate + Up to 2 %\",\"As per Consortium Decision\",\"Base Rate + Up to 6% or (as per agreement)\",\"Base Rate + Up to 6%\",\"As per NRB norms\",\"As per NRB norms\",\"As per NRB norms\",\"11.48%\",\"11.45%\",\"4.90%\",\"+2 applicable rate (Base rate + applied premium)\"]', NULL, NULL),
(13, 13, '[\"Home Loan\",\"Personal Loan(OD/Term)\",\"Share Loan\",\"Gold Loan\",\"Business/Working Capital Loan\",\"Agriculture/SME/Education Loan\",\"Small Farm Individual Loan\",\"Hire Purchase\",\"Real Estate Loan\",\"Professional Loan/Bridge Gap Loan\",\"Loan Against FD\",\"Consortium Loan\",\"Indirect Lending (Wholesale or Institutional)\",\"Direct lending (All types)\",\"Base rate of Ashad end,2079\",\"Third Quarter Average Base Rate\",\"Spread Rate (2079 Jestha)\"]', '[\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"Coupon rate + Up to 2 %\",\"As per Consortium Decision\",\"Base Rate + Up to 7% or (as per agreement)\",\"BR + Up to 7%\",\"11.20%\",\"11.45%\",\"4.90%\"]', NULL, NULL),
(14, 14, '[\"Home Loan\",\"Personal Loan(OD/Term)\",\"Share Loan\",\"Gold Loan\",\"Business/Working Capital Loan\",\"Agriculture/SME/Education Loan\",\"Small Farm Individual Loan\",\"Hire Purchase\",\"Real Estate Loan\",\"Professional Loan/Bridge Gap Loan\",\"Loan Against FD\",\"Consortium Loan\",\"Indirect Lending (Wholesale or Institutional)\",\"Direct lending (All types)\",\"Base rate of Ashad end,2079\",\"Fourth Quarter Average Base Rate\",\"Spread Rate (2079 Shrawan)\"]', '[\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"Coupon rate + Up to 2 %\",\"As per Consortium Decision\",\"Base Rate + Up to 7% or (as per agreement)\",\"BR + Up to 7%\",\"11.93%\",\"11.54%\",\"4.86%\"]', NULL, NULL),
(15, 15, '[\"Home Loan\",\"Personal Loan(OD/Term)\",\"Share Loan\",\"Gold Loan\",\"Business/Working Capital Loan\",\"Agriculture/SME/Education Loan\",\"Small Farm Individual Loan\",\"Hire Purchase\",\"Real Estate Loan\",\"Professional Loan\",\"Loan Against FD\",\"Consortium Loan\",\"Indirect Lending (Wholesale or Institutional)\",\"Direct lending (All types)\",\"Base rate of Shrawan end, 2079\",\"Fourth Quarter Average Base Rate\",\"Spread Rate (2079 Shrawan)\"]', '[\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"Coupon rate + Up to 2 %\",\"As per Consortium Decision\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"12.46%\",\"11.54%\",\"4.93%\"]', NULL, NULL),
(16, 16, '[\"Home Loan\",\"Personal Loan(OD/Term)\",\"Share Loan\",\"Gold Loan\",\"Business/Working Capital Loan\",\"Agriculture/SME/Education Loan\",\"Small Farm Individual Loan\",\"Hire Purchase\",\"Real Estate Loan\",\"Professional Loan\",\"Loan Against FD\",\"Consortium Loan\",\"Indirect Lending (Wholesale or Institutional)\",\"Direct lending (All types)\",\"Base rate of Bhadra end, 2079\",\"Fourth Quarter Average Base Rate\",\"Spread Rate (2079 Bhadra)\"]', '[\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"Coupon rate + Up to 2 %\",\"As per Consortium Decision\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"12.84%\",\"11.54%\",\"4.81%\"]', NULL, NULL),
(17, 17, '[\"Home Loan\",\"Personal Loan(OD/Term)\",\"Share Loan\",\"Gold Loan\",\"Business/Working Capital Loan\",\"Agriculture/SME/Education Loan\",\"Small Farm Individual Loan\",\"Hire Purchase\",\"Real Estate Loan\",\"Professional Loan/Bridge Gap Loan\",\"Loan Against FD\",\"Consortium Loan\",\"Indirect Lending (Wholesale or Institutional)\",\"Direct lending (All types)\",\"Base rate of Ashoj end,2079\",\"Fourth Quarter Average Base Rate\",\"Spread Rate (2079 Ashoj)\"]', '[\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"Coupon rate + Up to 2 % or BR whichever is higher\",\"As per Consortium Decision\",\"Base Rate + Up to 7% or (as per agreement)\",\"Base Rate + Up to 7%\",\"12.67%\",\"12.66%\",\"4.79%\"]', NULL, NULL),
(18, 18, '[\"Home Loan\",\"Personal Loan(OD/Term)\",\"Share Loan\",\"Gold Loan\",\"Business/Working Capital Loan\",\"Agriculture/SME/Education Loan\",\"Small Farm Individual Loan\",\"Hire Purchase\",\"Real Estate Loan\",\"Professional Loan/Bridge Gap Loan\",\"Loan Against FD\",\"Consortium Loan\",\"Indirect Lending (Wholesale or Institutional)\",\"Direct lending (All types)\",\"Base rate of Kartik end,2079\",\"First Quarter Average Base Rate\",\"Spread Rate (2079 Kartik)\"]', '[\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"Coupon rate + Up to 2 % or BR whichever is higher\",\"As per Consortium Decision\",\"Base Rate + Up to 7% or (as per agreement)\",\"Base Rate + Up to 7%\",\"12.72%\",\"12.66%\",\"4.89%\"]', NULL, NULL),
(19, 19, '[\"Home Loan\",\"Personal Loan(OD/Term)\",\"Share Loan\",\"Gold Loan\",\"Business/Working Capital Loan\",\"Agriculture/SME/Education Loan\",\"Small Farm Individual Loan\",\"Hire Purchase\",\"Real Estate Loan\",\"Professional Loan/Bridge Gap Loan\",\"Loan Against FD\",\"Consortium Loan\",\"Indirect Lending (Wholesale or Institutional)\",\"Direct lending (All types)\",\"Base rate of Mangsir end, 2079\",\"First Quarter Average Base Rate\",\"Spread Rate (2079 Mangsir)\"]', '[\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"Coupon rate + Up to 2 % or BR whichever is higher\",\"As per Consortium Decision\",\"Base Rate + Up to 7%\",\"Base Rate + Up to 7%\",\"12.71%\",\"12.66%\",\"4.89%\"]', NULL, NULL),
(20, 20, '[\"Home Loan\",\"Personal Loan(OD/Term)\",\"Share Loan\",\"Gold Loan\",\"Business/Working Capital Loan\",\"Agriculture/SME/Education Loan\",\"Small Farm Individual Loan\",\"Hire Purchase\",\"Real Estate Loan\",\"Professional Loan/Bridge Gap Loan\",\"Loan Against FD\",\"Consortium Loan\",\"Indirect Lending (Wholesale or Institutional)\",\"Direct lending (All types)\",\"Base rate of Mangsir end, 2079\",\"Second Quarter Average Base Rate\",\"Spread Rate (2079 Poush)\"]', '[\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"Coupon rate + Up to 2 % or BR whichever is higher\",\"As per Consortium Decision\",\"Base Rate + Up to 7% or (as per agreement)\",\"Base Rate + Up to 7%\",\"12.86%\",\"12.76%\",\"4.77%\"]', NULL, NULL),
(21, 21, '[\"Home Loan\",\"Personal Loan(OD/Term)\",\"Share Loan\",\"Gold Loan\",\"Business/Working Capital Loan\",\"Agriculture/SME/Education Loan\",\"Small Farm Individual Loan\",\"Hire Purchase\",\"Real Estate Loan\",\"Professional Loan/Bridge Gap Loan\",\"Loan Against FD\",\"Consortium Loan\",\"Indirect Lending (Wholesale or Institutional)\",\"Direct lending (All types)\",\"Base rate of Falgun end, 2079\",\"Second Quarter Average Base Rate\",\"Spread Rate (2079 Falgun)\"]', '[\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"Coupon rate + Up to 2 % or BR whichever is higher\",\"As per Consortium Decision\",\"Base Rate + Up to 2% or (as per agreement)\",\"Base Rate + Up to 7%\",\"12.71%\",\"12.76%\",\"4.74%\"]', NULL, NULL),
(22, 22, '[\"Home Loan\",\"Personal Loan(OD/Term)\",\"Share Loan\",\"Gold Loan\",\"Business/Working Capital Loan\",\"Agriculture/SME/Education Loan\",\"Small Farm Individual Loan\",\"Hire Purchase\",\"Real Estate Loan\",\"Professional Loan/Bridge Gap Loan\",\"Loan Against FD\",\"Consortium Loan\",\"Indirect Lending (Wholesale or Institutional)\",\"Direct lending (All types)\",\"Base rate of Chaitra end, 2079\",\"Second Quarter Average Base Rate\",\"Spread Rate (2079 Chaitra)\"]', '[\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"BR + Up to 7%\",\"Coupon rate + Up to 2 % or BR whichever is higher\",\"As per Consortium Decision\",\"Base Rate + Up to 2%\",\"Base Rate + Up to 7%\",\"12.60%\",\"12.71%\",\"4.73%\"]', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loan_deposits`
--

CREATE TABLE `loan_deposits` (
  `id` bigint UNSIGNED NOT NULL,
  `branch_id` bigint UNSIGNED NOT NULL,
  `loan_issued` double(12,2) NOT NULL,
  `deposit` double(12,2) NOT NULL,
  `created_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loan_deposits`
--

INSERT INTO `loan_deposits` (`id`, `branch_id`, `loan_issued`, `deposit`, `created_date`, `created_at`, `updated_at`) VALUES
(1, 1, 1005000.00, 150000.00, '2023-05-04', '2023-04-21 03:47:27', '2023-06-01 11:39:15'),
(2, 1, 1000.00, 2000.00, '2023-05-03', '2023-05-03 10:47:07', '2023-05-03 10:47:07'),
(4, 2, 1600000.00, 1002000.00, '2023-05-31', '2023-05-10 06:33:46', '2023-06-01 11:39:29'),
(5, 1, 45000.00, 10000.00, '2023-05-17', '2023-05-16 10:49:41', '2023-05-16 10:49:41'),
(6, 1, 450000.00, 450000.00, '2023-05-22', '2023-05-30 09:48:49', '2023-05-30 09:48:49'),
(7, 1, 1002000.00, 1002000.00, '2023-06-19', '2023-05-30 09:49:14', '2023-06-01 11:38:55');

-- --------------------------------------------------------

--
-- Table structure for table `medias`
--

CREATE TABLE `medias` (
  `id` bigint UNSIGNED NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mediable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mediable_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medias`
--

INSERT INTO `medias` (`id`, `file_name`, `file_path`, `mediable_type`, `mediable_id`, `created_at`, `updated_at`) VALUES
(1, '1685618821_images(1).png', 'media/user/1685618821_images(1).png', 'App\\Models\\User', 1, NULL, '2023-06-01 11:27:01'),
(2, '1685681051_logo.png', 'media/user/1685681051_logo.png', 'App\\Models\\User', 2, NULL, '2023-06-02 04:44:11'),
(3, 'Mukunda Shrestha.jpg', 'media/user/Mukunda Shrestha.jpg', 'App\\Models\\User', 3, NULL, NULL),
(4, 'Deepak Neupane.jpg', 'media/user/Deepak Neupane.jpg', 'App\\Models\\User', 4, NULL, NULL),
(5, 'Sujan Joshi.jpg', 'media/user/Sujan Joshi.jpg', 'App\\Models\\User', 5, NULL, NULL),
(6, 'Yan Singh Rai.jpg', 'media/user/Yan Singh Rai.jpg', 'App\\Models\\User', 6, NULL, NULL),
(7, 'Shambhu Rai.jpg', 'media/user/Shambhu Rai.jpg', 'App\\Models\\User', 7, NULL, NULL),
(8, 'Bharat Bahadur Thapa Chettri.jpg', 'media/user/Bharat Bahadur Thapa Chettri.jpg', 'App\\Models\\User', 8, NULL, NULL),
(9, 'Dinesh Tamang.jpg', 'media/user/Dinesh Tamang.jpg', 'App\\Models\\User', 9, NULL, NULL),
(10, 'Susil Koirala.jpg', 'media/user/Susil Koirala.jpg', 'App\\Models\\User', 10, NULL, NULL),
(11, 'Raushan Kumar Singh.jpg', 'media/user/Raushan Kumar Singh.jpg', 'App\\Models\\User', 11, NULL, NULL),
(12, 'Yogendra Suwal.jpg', 'media/user/Yogendra Suwal.jpg', 'App\\Models\\User', 12, NULL, NULL),
(13, 'Saisab Dhital.png', 'media/user/Saisab Dhital.png', 'App\\Models\\User', 13, NULL, NULL),
(14, 'Sahana Tuladhar.jpg', 'media/user/Sahana Tuladhar.jpg', 'App\\Models\\User', 14, NULL, NULL),
(15, 'Sunina Malakar.jpg', 'media/user/Sunina Malakar.jpg', 'App\\Models\\User', 15, NULL, NULL),
(16, 'Lila Timilsina.jpg', 'media/user/Lila Timilsina.jpg', 'App\\Models\\User', 16, NULL, NULL),
(17, 'Arjesh Ram Nakarmi.jpg', 'media/user/Arjesh Ram Nakarmi.jpg', 'App\\Models\\User', 17, NULL, NULL),
(18, 'Shanti Thing Tamang.jpg', 'media/user/Shanti Thing Tamang.jpg', 'App\\Models\\User', 18, NULL, NULL),
(19, 'Samjhana Bajracharya.png', 'media/user/Samjhana Bajracharya.png', 'App\\Models\\User', 19, NULL, NULL),
(20, 'Subash Rai.jpg', 'media/user/Subash Rai.jpg', 'App\\Models\\User', 20, NULL, NULL),
(21, 'Bashudev Timalsina.jpg', 'media/user/Bashudev Timalsina.jpg', 'App\\Models\\User', 21, NULL, NULL),
(22, 'Lina K.S.C Rai.png', 'media/user/Lina K.S.C Rai.png', 'App\\Models\\User', 22, NULL, NULL),
(23, 'Sandhya Rai.png', 'media/user/Sandhya Rai.png', 'App\\Models\\User', 23, NULL, NULL),
(24, 'Srijana Pun.jpg', 'media/user/Srijana Pun.jpg', 'App\\Models\\User', 24, NULL, NULL),
(25, 'Milan Tiwari.jpg', 'media/user/Milan Tiwari.jpg', 'App\\Models\\User', 25, NULL, NULL),
(26, 'Laxmi Dahal.png', 'media/user/Laxmi Dahal.png', 'App\\Models\\User', 26, NULL, NULL),
(27, 'Sangita Shrestha.jpg', 'media/user/Sangita Shrestha.jpg', 'App\\Models\\User', 27, NULL, NULL),
(28, 'Dipak Raj Dahal.jpg', 'media/user/Dipak Raj Dahal.jpg', 'App\\Models\\User', 28, NULL, NULL),
(29, 'Lochan Bhattarai.jpg', 'media/user/Lochan Bhattarai.jpg', 'App\\Models\\User', 29, NULL, NULL),
(30, 'Ganesh Man Bajracharya.jpg', 'media/user/Ganesh Man Bajracharya.jpg', 'App\\Models\\User', 30, NULL, NULL),
(31, 'Siddhartha Khawas.jpg', 'media/user/Siddhartha Khawas.jpg', 'App\\Models\\User', 31, NULL, NULL),
(32, 'Hasana Bajracharya.jpg', 'media/user/Hasana Bajracharya.jpg', 'App\\Models\\User', 32, NULL, NULL),
(33, 'Sowrnima Rai.jpg', 'media/user/Sowrnima Rai.jpg', 'App\\Models\\User', 33, NULL, NULL),
(34, 'Jenny Rai.jpg', 'media/user/Jenny Rai.jpg', 'App\\Models\\User', 34, NULL, NULL),
(35, 'Bebika Khadka.jpg', 'media/user/Bebika Khadka.jpg', 'App\\Models\\User', 35, NULL, NULL),
(36, 'Saraswati Budha Magar.jpg', 'media/user/Saraswati Budha Magar.jpg', 'App\\Models\\User', 36, NULL, NULL),
(37, 'Abhishek Shrestha.jpg', 'media/user/Abhishek Shrestha.jpg', 'App\\Models\\User', 37, NULL, NULL),
(38, 'Susma Rai.jpg', 'media/user/Susma Rai.jpg', 'App\\Models\\User', 38, NULL, NULL),
(39, 'Sunita Tamang.jpg', 'media/user/Sunita Tamang.jpg', 'App\\Models\\User', 39, NULL, NULL),
(40, 'Pratap Shrestha.jpg', 'media/user/Pratap Shrestha.jpg', 'App\\Models\\User', 40, NULL, NULL),
(41, 'Pooja Kumari Subedi.png', 'media/user/Pooja Kumari Subedi.png', 'App\\Models\\User', 41, NULL, NULL),
(42, 'Rasanti Shrestha.png', 'media/user/Rasanti Shrestha.png', 'App\\Models\\User', 42, NULL, NULL),
(43, 'Pratima Rai.jpg', 'media/user/Pratima Rai.jpg', 'App\\Models\\User', 43, NULL, NULL),
(44, 'Sumnima Chemjong.jpg', 'media/user/Sumnima Chemjong.jpg', 'App\\Models\\User', 44, NULL, NULL),
(45, 'Amrit Kala Gurung.jpg', 'media/user/Amrit Kala Gurung.jpg', 'App\\Models\\User', 45, NULL, NULL),
(46, 'Nisha Rai.jpg', 'media/user/Nisha Rai.jpg', 'App\\Models\\User', 46, NULL, NULL),
(47, 'Sarita Rai.jpg', 'media/user/Sarita Rai.jpg', 'App\\Models\\User', 47, NULL, NULL),
(48, 'Sandesh Rai.jpg', 'media/user/Sandesh Rai.jpg', 'App\\Models\\User', 48, NULL, NULL),
(49, 'Prabesh Khadka.jpg', 'media/user/Prabesh Khadka.jpg', 'App\\Models\\User', 49, NULL, NULL),
(50, 'Asmita Basnet.jpg', 'media/user/Asmita Basnet.jpg', 'App\\Models\\User', 50, NULL, NULL),
(51, 'Nodh Nath Gelal.jpg', 'media/user/Nodh Nath Gelal.jpg', 'App\\Models\\User', 51, NULL, NULL),
(52, 'Bishnu Prasad Khatiwada.jpg', 'media/user/Bishnu Prasad Khatiwada.jpg', 'App\\Models\\User', 52, NULL, NULL),
(53, 'Ram Bahadur Khadka.jpg', 'media/user/Ram Bahadur Khadka.jpg', 'App\\Models\\User', 53, NULL, NULL),
(54, 'Sunil Thapa.jpg', 'media/user/Sunil Thapa.jpg', 'App\\Models\\User', 54, NULL, NULL),
(55, 'Krishna Kumari Poudel.png', 'media/user/Krishna Kumari Poudel.png', 'App\\Models\\User', 55, NULL, NULL),
(56, 'Anita Tamang.jpg', 'media/user/Anita Tamang.jpg', 'App\\Models\\User', 56, NULL, NULL),
(57, 'Mamik Mauni.png', 'media/user/Mamik Mauni.png', 'App\\Models\\User', 57, NULL, NULL),
(58, 'Sunil Dangol.jpg', 'media/user/Sunil Dangol.jpg', 'App\\Models\\User', 58, NULL, NULL),
(59, 'Dipen Thapa.jpg', 'media/user/Dipen Thapa.jpg', 'App\\Models\\User', 59, NULL, NULL),
(60, 'Pramila Limbu.jpg', 'media/user/Pramila Limbu.jpg', 'App\\Models\\User', 60, NULL, NULL),
(61, 'Nilam Rai.jpg', 'media/user/Nilam Rai.jpg', 'App\\Models\\User', 61, NULL, NULL),
(62, 'Rajeshor Joshi.jpg', 'media/user/Rajeshor Joshi.jpg', 'App\\Models\\User', 62, NULL, NULL),
(63, 'Esha Lamsal.jpg', 'media/user/Esha Lamsal.jpg', 'App\\Models\\User', 63, NULL, NULL),
(64, 'Kiran Devi Rai.jpg', 'media/user/Kiran Devi Rai.jpg', 'App\\Models\\User', 64, NULL, NULL),
(65, 'Subash Basnet.jpg', 'media/user/Subash Basnet.jpg', 'App\\Models\\User', 65, NULL, NULL),
(66, 'Shushila Rai.jpg', 'media/user/Shushila Rai.jpg', 'App\\Models\\User', 66, NULL, NULL),
(67, 'Rajin Rai.jpg', 'media/user/Rajin Rai.jpg', 'App\\Models\\User', 67, NULL, NULL),
(68, 'Prem Dewan.jpg', 'media/user/Prem Dewan.jpg', 'App\\Models\\User', 68, NULL, NULL),
(69, 'Asmita Rai.jpg', 'media/user/Asmita Rai.jpg', 'App\\Models\\User', 69, NULL, NULL),
(70, 'Anita Ale Magar.jpg', 'media/user/Anita Ale Magar.jpg', 'App\\Models\\User', 70, NULL, NULL),
(71, 'Kushal Adhikari.jpg', 'media/user/Kushal Adhikari.jpg', 'App\\Models\\User', 71, NULL, NULL),
(72, 'Jeevan Kumar Rai.jpg', 'media/user/Jeevan Kumar Rai.jpg', 'App\\Models\\User', 72, NULL, NULL),
(73, 'Bishnu Maya Kandangwa.jpg', 'media/user/Bishnu Maya Kandangwa.jpg', 'App\\Models\\User', 73, NULL, NULL),
(74, 'Saru Ninglekhu.jpg', 'media/user/Saru Ninglekhu.jpg', 'App\\Models\\User', 74, NULL, NULL),
(75, 'Tika Maya Pradhan.jpg', 'media/user/Tika Maya Pradhan.jpg', 'App\\Models\\User', 75, NULL, NULL),
(76, 'Bharat Kumar Luitel.jpg', 'media/user/Bharat Kumar Luitel.jpg', 'App\\Models\\User', 76, NULL, NULL),
(77, 'Binda Rai.jpg', 'media/user/Binda Rai.jpg', 'App\\Models\\User', 77, NULL, NULL),
(78, 'Naresh Lal Joshi.jpg', 'media/user/Naresh Lal Joshi.jpg', 'App\\Models\\User', 78, NULL, NULL),
(79, 'Bhusan Shakya.jpg', 'media/user/Bhusan Shakya.jpg', 'App\\Models\\User', 79, NULL, NULL),
(80, 'Rama Lama.jpg', 'media/user/Rama Lama.jpg', 'App\\Models\\User', 80, NULL, NULL),
(81, 'Sirjana Basyal.jpg', 'media/user/Sirjana Basyal.jpg', 'App\\Models\\User', 81, NULL, NULL),
(82, 'Amrit Rai.jpg', 'media/user/Amrit Rai.jpg', 'App\\Models\\User', 82, NULL, NULL),
(83, 'Yashoda Rai.jpg', 'media/user/Yashoda Rai.jpg', 'App\\Models\\User', 83, NULL, NULL),
(84, 'Sumitra Chaudhary.jpg', 'media/user/Sumitra Chaudhary.jpg', 'App\\Models\\User', 84, NULL, NULL),
(85, 'Dhiraj Kumar Gurung.jpg', 'media/user/Dhiraj Kumar Gurung.jpg', 'App\\Models\\User', 85, NULL, NULL),
(86, 'Asha Ram Sah.jpg', 'media/user/Asha Ram Sah.jpg', 'App\\Models\\User', 86, NULL, NULL),
(87, 'Phiroj Sene.jpg', 'media/user/Phiroj Sene.jpg', 'App\\Models\\User', 87, NULL, NULL),
(88, 'Rajita Rai.jpg', 'media/user/Rajita Rai.jpg', 'App\\Models\\User', 88, NULL, NULL),
(89, 'Prashiksha Rai.jpg', 'media/user/Prashiksha Rai.jpg', 'App\\Models\\User', 89, NULL, NULL),
(90, 'Rohita Ingnam.jpg', 'media/user/Rohita Ingnam.jpg', 'App\\Models\\User', 90, NULL, NULL),
(91, 'Gayatri Sapkota.jpg', 'media/user/Gayatri Sapkota.jpg', 'App\\Models\\User', 91, NULL, NULL),
(92, 'Nomita Thapa.jpg', 'media/user/Nomita Thapa.jpg', 'App\\Models\\User', 92, NULL, NULL),
(93, 'Bikky Yakso Limbu.jpg', 'media/user/Bikky Yakso Limbu.jpg', 'App\\Models\\User', 93, NULL, NULL),
(94, 'Sandhya Upreti.jpg', 'media/user/Sandhya Upreti.jpg', 'App\\Models\\User', 94, NULL, NULL),
(95, 'Ranjana Niraula.jpg', 'media/user/Ranjana Niraula.jpg', 'App\\Models\\User', 95, NULL, NULL),
(96, 'Joti Lingden.jpg', 'media/user/Joti Lingden.jpg', 'App\\Models\\User', 96, NULL, NULL),
(97, 'Sushila Lama.jpg', 'media/user/Sushila Lama.jpg', 'App\\Models\\User', 97, NULL, NULL),
(98, 'Renu Thapa Pulami Magar.jpg', 'media/user/Renu Thapa Pulami Magar.jpg', 'App\\Models\\User', 98, NULL, NULL),
(99, 'Mitra Rai.jpg', 'media/user/Mitra Rai.jpg', 'App\\Models\\User', 99, NULL, NULL),
(100, 'Sunita Rai.jpg', 'media/user/Sunita Rai.jpg', 'App\\Models\\User', 100, NULL, NULL),
(101, 'Kamal Amatya.png', 'media/user/Kamal Amatya.png', 'App\\Models\\User', 101, NULL, NULL),
(102, 'Nisha Deshar.jpg', 'media/user/Nisha Deshar.jpg', 'App\\Models\\User', 102, NULL, NULL),
(103, 'Pradip Sunuwar.jpg', 'media/user/Pradip Sunuwar.jpg', 'App\\Models\\User', 103, NULL, NULL),
(104, 'Jibraj Rai.jpg', 'media/user/Jibraj Rai.jpg', 'App\\Models\\User', 104, NULL, NULL),
(105, 'Srijal Thapa Magar.jpg', 'media/user/Srijal Thapa Magar.jpg', 'App\\Models\\User', 105, NULL, NULL),
(106, 'Ratna Bahadur Thapa.jpg', 'media/user/Ratna Bahadur Thapa.jpg', 'App\\Models\\User', 106, NULL, NULL),
(107, 'Binita Tamang.jpg', 'media/user/Binita Tamang.jpg', 'App\\Models\\User', 107, NULL, NULL),
(108, 'Satya Devi Ojha.jpg', 'media/user/Satya Devi Ojha.jpg', 'App\\Models\\User', 108, NULL, NULL),
(109, 'Pramila Chaulagain.jpg', 'media/user/Pramila Chaulagain.jpg', 'App\\Models\\User', 109, NULL, NULL),
(110, 'Raghu Nath Raut.jpg', 'media/user/Raghu Nath Raut.jpg', 'App\\Models\\User', 110, NULL, NULL),
(111, 'Punya Prabha Bimali.jpg', 'media/user/Punya Prabha Bimali.jpg', 'App\\Models\\User', 111, NULL, NULL),
(112, 'Sujata Rai.jpg', 'media/user/Sujata Rai.jpg', 'App\\Models\\User', 112, NULL, NULL),
(113, 'Bijaya Lama.jpg', 'media/user/Bijaya Lama.jpg', 'App\\Models\\User', 113, NULL, NULL),
(114, 'Roshan Sulu.png', 'media/user/Roshan Sulu.png', 'App\\Models\\User', 114, NULL, NULL),
(115, 'Maiya Kesari Prajapati.jpg', 'media/user/Maiya Kesari Prajapati.jpg', 'App\\Models\\User', 115, NULL, NULL),
(116, 'Nagendra Lawati.jpg', 'media/user/Nagendra Lawati.jpg', 'App\\Models\\User', 116, NULL, NULL),
(117, 'Dinesh Rai.jpg', 'media/user/Dinesh Rai.jpg', 'App\\Models\\User', 117, NULL, NULL),
(118, 'Junita Rai.jpg', 'media/user/Junita Rai.jpg', 'App\\Models\\User', 118, NULL, NULL),
(119, 'Bikram Thebe.jpg', 'media/user/Bikram Thebe.jpg', 'App\\Models\\User', 119, NULL, NULL),
(120, 'Shova Bajracharya.jpg', 'media/user/Shova Bajracharya.jpg', 'App\\Models\\User', 120, NULL, NULL),
(121, 'Dewak Shrestha.jpg', 'media/user/Dewak Shrestha.jpg', 'App\\Models\\User', 121, NULL, NULL),
(122, 'Sunita Shrestha.jpg', 'media/user/Sunita Shrestha.jpg', 'App\\Models\\User', 122, NULL, NULL),
(123, 'Arjun Prasad Khatiwada.jpg', 'media/user/Arjun Prasad Khatiwada.jpg', 'App\\Models\\User', 123, NULL, NULL),
(124, 'Shanti Chand (Singh).jpg', 'media/user/Shanti Chand (Singh).jpg', 'App\\Models\\User', 124, NULL, NULL),
(125, 'Ram Bahadur Singh.jpg', 'media/user/Ram Bahadur Singh.jpg', 'App\\Models\\User', 125, NULL, NULL),
(126, 'Muna Paudel.jpg', 'media/user/Muna Paudel.jpg', 'App\\Models\\User', 126, NULL, NULL),
(127, 'Hansa Raj Dhungana.jpg', 'media/user/Hansa Raj Dhungana.jpg', 'App\\Models\\User', 127, NULL, NULL),
(128, 'Nabin Shah.jpg', 'media/user/Nabin Shah.jpg', 'App\\Models\\User', 128, NULL, NULL),
(129, 'Kailash Rana.jpg', 'media/user/Kailash Rana.jpg', 'App\\Models\\User', 129, NULL, NULL),
(130, 'Ram Bahadur Rawal.jpg', 'media/user/Ram Bahadur Rawal.jpg', 'App\\Models\\User', 130, NULL, NULL),
(131, 'Topendra Oli.jpg', 'media/user/Topendra Oli.jpg', 'App\\Models\\User', 131, NULL, NULL),
(132, 'Gita Sharma.jpg', 'media/user/Gita Sharma.jpg', 'App\\Models\\User', 132, NULL, NULL),
(133, 'Yagya Raj O.C..jpg', 'media/user/Yagya Raj O.C..jpg', 'App\\Models\\User', 133, NULL, NULL),
(134, 'Sonuja Rawat.jpg', 'media/user/Sonuja Rawat.jpg', 'App\\Models\\User', 134, NULL, NULL),
(135, 'Shila Chaudhary.jpg', 'media/user/Shila Chaudhary.jpg', 'App\\Models\\User', 135, NULL, NULL),
(136, 'Manish Acharya.jpg', 'media/user/Manish Acharya.jpg', 'App\\Models\\User', 136, NULL, NULL),
(137, 'Prakash Bhattarai.jpg', 'media/user/Prakash Bhattarai.jpg', 'App\\Models\\User', 137, NULL, NULL),
(138, 'Krishna Prasad Upadhyaya.jpg', 'media/user/Krishna Prasad Upadhyaya.jpg', 'App\\Models\\User', 138, NULL, NULL),
(139, 'Dhan Kumari Pun.jpg', 'media/user/Dhan Kumari Pun.jpg', 'App\\Models\\User', 139, NULL, NULL),
(140, 'Sachin Dahal.jpg', 'media/user/Sachin Dahal.jpg', 'App\\Models\\User', 140, NULL, NULL),
(141, 'Bishnu Maya Chauhan.jpg', 'media/user/Bishnu Maya Chauhan.jpg', 'App\\Models\\User', 141, NULL, NULL),
(142, 'Suman Subba.jpg', 'media/user/Suman Subba.jpg', 'App\\Models\\User', 142, NULL, NULL),
(143, 'Rajendra Subba.jpg', 'media/user/Rajendra Subba.jpg', 'App\\Models\\User', 143, NULL, NULL),
(144, 'Nanda Kumari Magar.jpg', 'media/user/Nanda Kumari Magar.jpg', 'App\\Models\\User', 144, NULL, NULL),
(145, 'Nabin Limbu.jpg', 'media/user/Nabin Limbu.jpg', 'App\\Models\\User', 145, NULL, NULL),
(146, 'Pusparaj Rai.jpg', 'media/user/Pusparaj Rai.jpg', 'App\\Models\\User', 146, NULL, NULL),
(147, 'Uma Raj Gurung.jpg', 'media/user/Uma Raj Gurung.jpg', 'App\\Models\\User', 147, NULL, NULL),
(148, 'Saroj Kumar Sah.jpg', 'media/user/Saroj Kumar Sah.jpg', 'App\\Models\\User', 148, NULL, NULL),
(149, 'Pinkal Sah.jpg', 'media/user/Pinkal Sah.jpg', 'App\\Models\\User', 149, NULL, NULL),
(150, 'Roshan Thakuri.jpg', 'media/user/Roshan Thakuri.jpg', 'App\\Models\\User', 150, NULL, NULL),
(151, 'Brij Lal Sada.jpg', 'media/user/Brij Lal Sada.jpg', 'App\\Models\\User', 151, NULL, NULL),
(152, 'Harati Mathema.png', 'media/user/Harati Mathema.png', 'App\\Models\\User', 152, NULL, NULL),
(153, 'Sujata Manandhar.jpg', 'media/user/Sujata Manandhar.jpg', 'App\\Models\\User', 153, NULL, NULL),
(154, 'Priya Gurung.jpg', 'media/user/Priya Gurung.jpg', 'App\\Models\\User', 154, NULL, NULL),
(155, 'Anju Pun.jpg', 'media/user/Anju Pun.jpg', 'App\\Models\\User', 155, NULL, NULL),
(156, 'Sagar Moktan.jpg', 'media/user/Sagar Moktan.jpg', 'App\\Models\\User', 156, NULL, NULL),
(157, 'Suraj Rai.jpg', 'media/user/Suraj Rai.jpg', 'App\\Models\\User', 157, NULL, NULL),
(158, 'Salina Rai.jpg', 'media/user/Salina Rai.jpg', 'App\\Models\\User', 158, NULL, NULL),
(159, 'Iwan Rai.jpg', 'media/user/Iwan Rai.jpg', 'App\\Models\\User', 159, NULL, NULL),
(160, 'Koushila Rai.jpg', 'media/user/Koushila Rai.jpg', 'App\\Models\\User', 160, NULL, NULL),
(161, 'Tap Bahadur Khadka.png', 'media/user/Tap Bahadur Khadka.png', 'App\\Models\\User', 161, NULL, NULL),
(162, 'Sarita Sinjali Magar.jpg', 'media/user/Sarita Sinjali Magar.jpg', 'App\\Models\\User', 162, NULL, NULL),
(163, 'Junu Budhathoki.png', 'media/user/Junu Budhathoki.png', 'App\\Models\\User', 163, NULL, NULL),
(164, 'Upendra Simkhada.jpg', 'media/user/Upendra Simkhada.jpg', 'App\\Models\\User', 164, NULL, NULL),
(165, 'Kamala Chaudhary.png', 'media/user/Kamala Chaudhary.png', 'App\\Models\\User', 165, NULL, NULL),
(166, 'Gyanendra Iwahang.png', 'media/user/Gyanendra Iwahang.png', 'App\\Models\\User', 166, NULL, NULL),
(167, 'Samyang Rai.jpg', 'media/user/Samyang Rai.jpg', 'App\\Models\\User', 167, NULL, NULL),
(168, 'Sneha Singh.jpg', 'media/user/Sneha Singh.jpg', 'App\\Models\\User', 168, NULL, NULL),
(169, 'Madan Yadav.jpg', 'media/user/Madan Yadav.jpg', 'App\\Models\\User', 169, NULL, NULL),
(170, 'Rabindra Basnet.jpg', 'media/user/Rabindra Basnet.jpg', 'App\\Models\\User', 170, NULL, NULL),
(171, 'Love Raj Shrestha.jpg', 'media/user/Love Raj Shrestha.jpg', 'App\\Models\\User', 171, NULL, NULL),
(172, 'Bimal Khatri.jpg', 'media/user/Bimal Khatri.jpg', 'App\\Models\\User', 172, NULL, NULL),
(173, 'Pramod Kumar Jha.jpg', 'media/user/Pramod Kumar Jha.jpg', 'App\\Models\\User', 173, NULL, NULL),
(174, 'Ujjwal Dangol.jpg', 'media/user/Ujjwal Dangol.jpg', 'App\\Models\\User', 174, NULL, NULL),
(175, 'Anand Raj Kumar Pal.jpg', 'media/user/Anand Raj Kumar Pal.jpg', 'App\\Models\\User', 175, NULL, NULL),
(176, 'Rubi Kumari Sah.jpg', 'media/user/Rubi Kumari Sah.jpg', 'App\\Models\\User', 176, NULL, NULL),
(177, 'Sita Kumari Mahato.jpg', 'media/user/Sita Kumari Mahato.jpg', 'App\\Models\\User', 177, NULL, NULL),
(178, 'Biswash Khadka.jpg', 'media/user/Biswash Khadka.jpg', 'App\\Models\\User', 178, NULL, NULL),
(179, 'Khil Maya Ghising.jpg', 'media/user/Khil Maya Ghising.jpg', 'App\\Models\\User', 179, NULL, NULL),
(180, 'Radhika Basnet.jpg', 'media/user/Radhika Basnet.jpg', 'App\\Models\\User', 180, NULL, NULL),
(181, 'Dipesh Rai.jpg', 'media/user/Dipesh Rai.jpg', 'App\\Models\\User', 181, NULL, NULL),
(182, 'Dik Laxmi Rai.jpg', 'media/user/Dik Laxmi Rai.jpg', 'App\\Models\\User', 182, NULL, NULL),
(183, 'Jiban Kaji Karki.jpg', 'media/user/Jiban Kaji Karki.jpg', 'App\\Models\\User', 183, NULL, NULL),
(184, 'Bijay Kumar Rai.jpg', 'media/user/Bijay Kumar Rai.jpg', 'App\\Models\\User', 184, NULL, NULL),
(185, 'Renuka Magar.jpg', 'media/user/Renuka Magar.jpg', 'App\\Models\\User', 185, NULL, NULL),
(186, 'Bishnu Bahadur Baruwal.jpg', 'media/user/Bishnu Bahadur Baruwal.jpg', 'App\\Models\\User', 186, NULL, NULL),
(187, 'Niju Shrestha.jpg', 'media/user/Niju Shrestha.jpg', 'App\\Models\\User', 187, NULL, NULL),
(188, 'Kesharman Tamang.jpg', 'media/user/Kesharman Tamang.jpg', 'App\\Models\\User', 188, NULL, NULL),
(189, 'Rajan Shilpakar.jpg', 'media/user/Rajan Shilpakar.jpg', 'App\\Models\\User', 189, NULL, NULL),
(190, 'Suraj Shrestha.jpg', 'media/user/Suraj Shrestha.jpg', 'App\\Models\\User', 190, NULL, NULL),
(191, 'Shristi Tamang.jpg', 'media/user/Shristi Tamang.jpg', 'App\\Models\\User', 191, NULL, NULL),
(192, 'Sarmila Muktan.jpg', 'media/user/Sarmila Muktan.jpg', 'App\\Models\\User', 192, NULL, NULL),
(193, 'Smritee Muktan.jpg', 'media/user/Smritee Muktan.jpg', 'App\\Models\\User', 193, NULL, NULL),
(194, 'Dilip Kumar Mandal.jpg', 'media/user/Dilip Kumar Mandal.jpg', 'App\\Models\\User', 194, NULL, NULL),
(195, 'Sameer Kamat.jpg', 'media/user/Sameer Kamat.jpg', 'App\\Models\\User', 195, NULL, NULL),
(196, 'Nishu Kumari Gupta.jpg', 'media/user/Nishu Kumari Gupta.jpg', 'App\\Models\\User', 196, NULL, NULL),
(197, 'Soniya Rai.jpg', 'media/user/Soniya Rai.jpg', 'App\\Models\\User', 197, NULL, NULL),
(198, 'Buddhi Lal Bhuju.jpg', 'media/user/Buddhi Lal Bhuju.jpg', 'App\\Models\\User', 198, NULL, NULL),
(199, 'Prasanna Subba Pomo.jpg', 'media/user/Prasanna Subba Pomo.jpg', 'App\\Models\\User', 199, NULL, NULL),
(200, 'Sangita Subedi.jpg', 'media/user/Sangita Subedi.jpg', 'App\\Models\\User', 200, NULL, NULL),
(201, 'Pramila Gurung.jpg', 'media/user/Pramila Gurung.jpg', 'App\\Models\\User', 201, NULL, NULL),
(202, 'Renuka Rai.jpg', 'media/user/Renuka Rai.jpg', 'App\\Models\\User', 202, NULL, NULL),
(203, '1685435602_Default.jpg', 'media/user/1685435602_Default.jpg', 'App\\Models\\User', 203, '2023-05-30 08:33:22', '2023-05-30 08:33:22'),
(204, '1685435746_Default.jpg', 'media/user/1685435746_Default.jpg', 'App\\Models\\User', 204, '2023-05-30 08:35:46', '2023-05-30 08:35:46'),
(205, '1685435967_Default.jpg', 'media/user/1685435967_Default.jpg', 'App\\Models\\User', 205, '2023-05-30 08:39:27', '2023-05-30 08:39:27'),
(206, '1685436417_Default.jpg', 'media/user/1685436417_Default.jpg', 'App\\Models\\User', 206, '2023-05-30 08:46:57', '2023-05-30 08:46:57'),
(207, '1685436661_Default.jpg', 'media/user/1685436661_Default.jpg', 'App\\Models\\User', 207, '2023-05-30 08:51:01', '2023-05-30 08:51:01'),
(208, '1685437416_Default.jpg', 'media/user/1685437416_Default.jpg', 'App\\Models\\User', 208, '2023-05-30 09:03:36', '2023-05-30 09:03:36'),
(209, '1685437545_Default.jpg', 'media/user/1685437545_Default.jpg', 'App\\Models\\User', 209, '2023-05-30 09:05:45', '2023-05-30 09:05:45'),
(211, '1685440534_TEST-PDF.PDF', 'media/vendor/1685440534_TEST-PDF.PDF', 'Pages\\Models\\Vendor', 4, '2023-05-30 09:54:59', '2023-05-30 09:55:34'),
(212, '1685440747_testPDF.pdf', 'media/notice/1685440747_testPDF.pdf', 'Pages\\Models\\Notice', 5, '2023-05-30 09:59:07', '2023-05-30 09:59:07'),
(214, '1685442299_testPDF.pdf', 'media/notice/1685442299_testPDF.pdf', 'Pages\\Models\\Notice', 7, '2023-05-30 10:24:59', '2023-05-30 10:24:59'),
(215, '1685444848_testPDF.pdf', 'media/document/1685444848_testPDF.pdf', 'Pages\\Models\\Document', 6, '2023-05-30 11:07:28', '2023-05-30 11:07:28'),
(216, '1685444867_testPDF.pdf', 'media/document/1685444867_testPDF.pdf', 'Pages\\Models\\Document', 7, '2023-05-30 11:07:47', '2023-05-30 11:07:47'),
(217, '1685444954_testPDF.pdf', 'media/document/1685444954_testPDF.pdf', 'Pages\\Models\\Document', 8, '2023-05-30 11:09:14', '2023-05-30 11:09:14'),
(218, '1685445032_testPDF.pdf', 'media/document/1685445032_testPDF.pdf', 'Pages\\Models\\Document', 9, '2023-05-30 11:10:32', '2023-05-30 11:10:32'),
(219, '1685504111_YoubrajraiCV_11zon.pdf', 'media/insurance/1685504111_YoubrajraiCV_11zon.pdf', 'Pages\\Models\\Insurance', 1, '2023-05-31 03:35:12', '2023-05-31 03:35:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_03_999999_add_active_status_to_users', 1),
(6, '2023_03_03_999999_add_avatar_to_users', 1),
(7, '2023_03_03_999999_add_dark_mode_to_users', 1),
(8, '2023_03_03_999999_add_messenger_color_to_users', 1),
(9, '2023_03_03_999999_create_chatify_favorites_table', 1),
(10, '2023_03_03_999999_create_chatify_messages_table', 1),
(11, '2023_03_27_060917_update_users-details', 1),
(12, '2023_03_27_061329_create_roles_table', 1),
(13, '2023_03_27_061350_create_positions_table', 1),
(14, '2023_03_27_061402_create_departments_table', 1),
(16, '2023_03_27_061550_create_permissions_table', 1),
(17, '2023_03_27_061649_create_role_user_table', 1),
(19, '2023_03_27_061706_create_permission_role_table', 1),
(24, '2023_04_06_175503_create_policy_table', 1),
(25, '2023_04_06_190102_create_media_table', 1),
(31, '2023_04_06_091154_create_charges_charge_type_table', 7),
(33, '2023_04_06_091154_create_charges_table', 9),
(37, '2023_03_27_061402_create_charge_types_table', 13),
(40, '2023_03_27_061402_create_committee_levels_table', 15),
(42, '2023_04_06_091154_create_committees_table', 16),
(43, '2023_04_06_175503_create_contracts_table', 17),
(44, '2023_04_06_175503_create_insurances_table', 18),
(45, '2023_04_06_091154_create_boards_table', 19),
(47, '2023_03_27_061402_create_vendor_types_table', 20),
(48, '2023_03_27_061402_create_vendor_categories_table', 21),
(49, '2023_04_06_091154_create_vendors_table', 21),
(53, '2023_04_06_091154_create_fixed_deposits_table', 25),
(54, '2023_04_06_091154_create_saving_deposits_table', 26),
(55, '2023_04_06_091154_create_loans_table', 27),
(56, '2023_04_06_091154_create_deprive_sectors_table', 28),
(57, '2023_04_06_091154_create_fixed_interests_table', 29),
(63, '2023_04_06_091154_create_standard_terrifs_table', 31),
(65, '2023_03_27_061413_create_branches_table', 32),
(67, '2023_04_06_175503_create_rates_table', 33),
(68, '2023_04_06_175503_create_loan_deposts_table', 34),
(73, '2023_04_06_175503_create_leave_table', 38),
(75, '2023_04_06_091154_create_outstations_table', 39),
(76, '2023_03_27_061706_create_employee_details_table', 40),
(77, '2023_03_27_061402_create_notice_types_table', 41),
(78, '2023_04_06_175503_create_notice_table', 42),
(83, '2023_03_27_061402_create_document_types_table', 43),
(84, '2023_03_27_061402_create_sub_document_types_table', 43),
(86, '2023_04_06_091154_create_documents_table', 44),
(87, '2023_03_27_061402_create_fiscal_years_table', 45),
(88, '2023_03_27_061402_create_interest_heads_table', 46),
(89, '2023_03_27_061402_create_standard_terrif_heads_table', 47),
(90, '2023_03_27_061402_create_chargeType_table', 48),
(91, '2023_03_27_061402_create_sub_committee_levels_table', 48),
(92, '2023_05_24_061402_update_branches_table', 48),
(93, '2023_05_24_061402_update_users_table', 48);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint UNSIGNED NOT NULL,
  `notice_type_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `on_date` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `notice_type_id`, `title`, `description`, `on_date`, `created_at`, `updated_at`) VALUES
(4, 5, 'Sonam Loshar', '<p>This is Festival Celebrated by gurung Community.</p>', '2023-05-22', '2023-05-22 04:33:16', '2023-05-22 04:33:31'),
(5, 7, 'Day for Elimination of Caste based Discrimination', '<p>dsaf</p>', '2023-06-02', '2023-05-30 09:59:07', '2023-06-02 04:39:36'),
(7, 5, 'sadfg', 'asdf', '2023-05-22', '2023-05-30 10:24:59', '2023-05-30 10:24:59');

-- --------------------------------------------------------

--
-- Table structure for table `notice_types`
--

CREATE TABLE `notice_types` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notice_types`
--

INSERT INTO `notice_types` (`id`, `title`, `created_at`, `updated_at`) VALUES
(5, 'Festival', '2023-05-10 11:05:02', '2023-05-10 11:05:02'),
(7, 'General', '2023-05-10 12:05:12', '2023-05-10 12:05:12');

-- --------------------------------------------------------

--
-- Table structure for table `outstations`
--

CREATE TABLE `outstations` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `travel_place` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `outtime` datetime NOT NULL,
  `estimated_return_time` datetime NOT NULL,
  `actual_return_time` datetime DEFAULT NULL,
  `remarks` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `outstations`
--

INSERT INTO `outstations` (`id`, `user_id`, `travel_place`, `outtime`, `estimated_return_time`, `actual_return_time`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 1, 'Gwarkopur', '2023-05-31 09:00:00', '2023-07-02 20:00:00', '2023-05-31 15:00:00', 'Going for Bank', '2023-04-25 00:22:21', '2023-06-02 04:28:35'),
(2, 2, 'NRB', '2023-06-01 09:00:00', '2023-06-05 10:08:00', NULL, 'audit', '2023-06-02 04:27:28', '2023-06-02 04:43:11');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'branch_access', '2023-04-09 03:10:17', '2023-04-11 06:27:44'),
(2, 'user_access', '2023-04-11 06:03:21', '2023-04-11 06:27:35'),
(3, 'vendor_access', '2023-04-11 22:38:03', '2023-04-11 22:38:03'),
(4, 'insurance_access', '2023-04-11 22:38:15', '2023-04-11 22:38:15'),
(5, 'contract_access', '2023-04-11 22:38:28', '2023-04-11 22:38:28'),
(6, 'policy_access', '2023-04-11 22:38:38', '2023-04-11 22:38:38'),
(7, 'leave_access', '2023-04-11 22:38:46', '2023-04-11 22:38:46'),
(8, 'outstation_access', '2023-04-11 22:38:55', '2023-04-11 22:38:55'),
(9, 'board_access', '2023-04-11 22:39:03', '2023-04-11 22:39:03'),
(10, 'document_access', '2023-04-11 22:39:18', '2023-04-11 22:39:18'),
(12, 'rate_access', '2023-04-11 22:39:41', '2023-04-11 22:39:41'),
(13, 'notice_access', '2023-04-11 22:39:53', '2023-04-11 22:39:53'),
(14, 'committee_access', '2023-04-11 22:40:03', '2023-04-11 22:40:03'),
(15, 'vendorcategory_access', '2023-04-11 22:40:19', '2023-04-11 22:40:19'),
(16, 'vendortype_access', '2023-04-11 22:41:09', '2023-04-11 22:41:09'),
(17, 'position_access', '2023-04-11 22:41:29', '2023-04-11 22:41:29'),
(18, 'department_access', '2023-04-11 22:41:40', '2023-04-11 22:41:40'),
(19, 'documenttype_access', '2023-04-11 22:42:00', '2023-04-26 22:28:32'),
(21, 'committeelevel_access', '2023-04-11 22:42:21', '2023-04-11 22:42:21'),
(22, 'vendor_create', '2023-04-11 22:44:41', '2023-04-11 22:44:41'),
(23, 'insurance_create', '2023-04-11 22:44:51', '2023-04-11 22:44:51'),
(24, 'contract_create', '2023-04-11 22:44:59', '2023-04-11 22:44:59'),
(25, 'policy_create', '2023-04-11 22:45:07', '2023-04-11 22:45:07'),
(26, 'leave_create', '2023-04-11 22:45:15', '2023-04-11 22:45:15'),
(27, 'outstation_create', '2023-04-11 22:45:23', '2023-04-11 22:45:23'),
(28, 'board_create', '2023-04-11 22:45:30', '2023-04-11 22:45:30'),
(29, 'branch_create', '2023-04-11 22:45:37', '2023-04-11 22:45:37'),
(30, 'document_create', '2023-04-11 22:45:44', '2023-04-11 22:45:44'),
(32, 'rate_create', '2023-04-11 22:46:25', '2023-04-11 22:46:25'),
(33, 'notice_create', '2023-04-11 22:46:35', '2023-04-11 22:46:35'),
(34, 'committee_create', '2023-04-11 22:46:55', '2023-04-11 22:46:55'),
(35, 'vendorcategory_create', '2023-04-11 22:47:09', '2023-04-11 22:47:09'),
(36, 'vendortype_create', '2023-04-11 22:47:20', '2023-04-11 22:47:20'),
(37, 'position_create', '2023-04-11 22:47:33', '2023-04-11 22:47:33'),
(38, 'department_create', '2023-04-11 22:47:44', '2023-04-11 22:47:44'),
(39, 'vendor_delete', '2023-04-11 22:47:52', '2023-04-11 22:47:52'),
(40, 'documenttype_create', '2023-04-11 22:48:06', '2023-04-26 22:28:45'),
(42, 'committeelevel_create', '2023-04-11 22:48:29', '2023-04-11 22:48:29'),
(43, 'user_create', '2023-04-12 00:51:37', '2023-04-12 00:51:37'),
(44, 'user_edit', '2023-04-12 00:54:16', '2023-04-12 00:54:16'),
(45, 'interest_access', '2023-04-12 01:16:45', '2023-04-12 01:16:45'),
(46, 'interest_create', '2023-04-12 01:16:57', '2023-04-12 01:16:57'),
(47, 'interest_edit', '2023-04-12 01:17:06', '2023-04-12 01:17:06'),
(48, 'interest_delete', '2023-04-12 01:17:14', '2023-04-12 01:17:14'),
(49, 'interesthead_access', '2023-04-12 01:17:31', '2023-04-12 01:17:31'),
(50, 'interesthead_create', '2023-04-12 01:17:42', '2023-04-12 01:17:42'),
(51, 'interesthead_delete', '2023-04-12 01:17:56', '2023-04-12 01:17:56'),
(52, 'interesthead_edit', '2023-04-12 01:18:10', '2023-04-12 01:18:10'),
(53, 'fixeddeposit_create', '2023-04-12 03:28:09', '2023-04-12 03:28:09'),
(54, 'standardterrifhead_access', '2023-04-18 03:37:54', '2023-04-18 03:37:54'),
(55, 'standardterrifhead_create', '2023-04-18 03:38:03', '2023-04-18 03:38:03'),
(56, 'standardterrifhead_edit', '2023-04-18 03:38:16', '2023-04-18 03:38:16'),
(57, 'standardterrifhead_delete', '2023-04-18 03:38:25', '2023-04-18 03:38:25'),
(58, 'fixeddeposit_create', '2023-04-19 22:50:15', '2023-04-19 22:50:15'),
(59, 'fixeddeposit_access', '2023-04-19 22:50:33', '2023-04-19 22:50:33'),
(60, 'fixeddeposit_edit', '2023-04-19 22:50:42', '2023-04-19 22:50:42'),
(61, 'fixeddeposit_delete', '2023-04-19 22:50:52', '2023-04-19 22:50:52'),
(62, 'savingdeposit_access', '2023-04-19 23:07:41', '2023-04-19 23:07:41'),
(63, 'savingdeposit_create', '2023-04-19 23:12:19', '2023-04-19 23:12:19'),
(64, 'savingdeposit_edit', '2023-04-19 23:15:12', '2023-04-19 23:15:12'),
(65, 'savingdeposit_delete', '2023-04-19 23:15:24', '2023-04-19 23:15:24'),
(66, 'loan_access', '2023-04-19 23:15:37', '2023-04-19 23:15:37'),
(67, 'loan_create', '2023-04-19 23:15:44', '2023-04-19 23:15:44'),
(68, 'loan_edit', '2023-04-19 23:16:09', '2023-04-19 23:16:09'),
(69, 'loan_delete', '2023-04-19 23:16:16', '2023-04-19 23:16:16'),
(70, 'deprivesector_access', '2023-04-19 23:16:38', '2023-04-19 23:16:38'),
(71, 'deprivesector_create', '2023-04-19 23:16:48', '2023-04-19 23:16:48'),
(72, 'deprivesector_edit', '2023-04-19 23:16:53', '2023-04-19 23:16:53'),
(73, 'deprivesector_delete', '2023-04-19 23:17:00', '2023-04-19 23:17:00'),
(74, 'fixedinterest_access', '2023-04-19 23:17:49', '2023-04-19 23:17:49'),
(75, 'fixedinterest_create', '2023-04-19 23:17:56', '2023-04-19 23:17:56'),
(76, 'fixedinterest_edit', '2023-04-19 23:18:04', '2023-04-19 23:18:04'),
(77, 'fixedinterest_delete', '2023-04-19 23:18:12', '2023-04-19 23:18:12'),
(78, 'vendor_edit', '2023-04-19 23:18:26', '2023-04-19 23:18:26'),
(79, 'standardterrif_access', '2023-04-19 23:18:41', '2023-04-19 23:18:41'),
(80, 'standardterrif_create', '2023-04-19 23:18:49', '2023-04-19 23:18:49'),
(81, 'standardterrif_edit', '2023-04-19 23:19:00', '2023-04-19 23:19:00'),
(82, 'standardterrif_delete', '2023-04-19 23:19:07', '2023-04-19 23:19:07'),
(83, 'role_access', '2023-04-19 23:19:19', '2023-04-19 23:19:19'),
(84, 'role_create', '2023-04-19 23:19:27', '2023-04-19 23:19:27'),
(85, 'role_edit', '2023-04-19 23:19:35', '2023-04-19 23:19:35'),
(86, 'role_delete', '2023-04-19 23:19:43', '2023-04-19 23:19:43'),
(87, 'permission_access', '2023-04-19 23:19:57', '2023-04-19 23:19:57'),
(88, 'permission_create', '2023-04-19 23:20:03', '2023-04-19 23:20:03'),
(89, 'permission_edit', '2023-04-19 23:20:09', '2023-04-19 23:20:09'),
(90, 'permission_delete', '2023-04-19 23:20:15', '2023-04-19 23:20:15'),
(91, 'interest', '2023-04-19 23:35:29', '2023-04-19 23:35:29'),
(92, 'insurance', '2023-04-19 23:35:37', '2023-04-19 23:35:37'),
(93, 'standardterrif', '2023-04-19 23:35:47', '2023-04-19 23:35:47'),
(94, 'contract', '2023-04-19 23:35:55', '2023-04-19 23:35:55'),
(95, 'policyandproductpaper', '2023-04-19 23:36:07', '2023-04-19 23:36:07'),
(96, 'vendor', '2023-04-19 23:36:14', '2023-04-19 23:36:14'),
(97, 'leave', '2023-04-19 23:36:59', '2023-04-19 23:36:59'),
(98, 'outstation', '2023-04-19 23:37:05', '2023-04-19 23:37:05'),
(99, 'board-member', '2023-04-19 23:37:19', '2023-04-19 23:37:19'),
(100, 'branch', '2023-04-19 23:37:25', '2023-04-19 23:37:25'),
(101, 'document', '2023-04-19 23:37:35', '2023-04-19 23:37:35'),
(103, 'rate', '2023-04-19 23:37:55', '2023-04-19 23:37:55'),
(104, 'notice', '2023-04-19 23:38:04', '2023-04-19 23:38:04'),
(105, 'committee', '2023-04-19 23:39:54', '2023-04-19 23:39:54'),
(106, 'vendor-category', '2023-04-19 23:40:05', '2023-04-19 23:40:05'),
(107, 'vendor-type', '2023-04-19 23:40:15', '2023-04-19 23:40:15'),
(108, 'position', '2023-04-19 23:45:12', '2023-04-19 23:45:12'),
(109, 'department', '2023-04-19 23:45:19', '2023-04-19 23:45:19'),
(110, 'document-type', '2023-04-19 23:45:29', '2023-04-26 22:28:17'),
(112, 'committee-level', '2023-04-19 23:46:29', '2023-04-19 23:46:29'),
(113, 'interest-head', '2023-04-19 23:46:40', '2023-04-19 23:46:40'),
(114, 'standard-terrif-head', '2023-04-19 23:46:52', '2023-04-19 23:46:52'),
(115, 'team-member', '2023-04-19 23:47:01', '2023-04-19 23:47:01'),
(116, 'loandeposit_access', '2023-04-20 22:50:25', '2023-04-20 22:50:25'),
(117, 'loandeposit_create', '2023-04-20 22:50:36', '2023-04-20 22:50:36'),
(118, 'loandeposit_edit', '2023-04-20 22:50:42', '2023-04-20 22:50:42'),
(119, 'loandeposit_delete', '2023-04-20 22:50:48', '2023-04-20 22:50:48'),
(120, 'loan-deposit', '2023-04-21 00:01:07', '2023-04-21 00:01:07'),
(121, 'user_delete', '2023-04-21 02:04:51', '2023-04-21 02:04:51'),
(122, 'board_edit', '2023-04-21 02:07:41', '2023-04-21 02:07:41'),
(123, 'board_delete', '2023-04-21 02:07:49', '2023-04-21 02:07:49'),
(124, 'committeelevel_edit', '2023-04-21 02:08:57', '2023-04-21 02:08:57'),
(125, 'committeelevel_delete', '2023-04-21 02:09:07', '2023-04-21 02:09:07'),
(126, 'documenttype_edit', '2023-04-21 02:12:49', '2023-04-26 22:28:56'),
(127, 'documenttype_delete', '2023-04-21 02:12:56', '2023-04-26 22:29:06'),
(128, 'department_edit', '2023-04-21 02:19:30', '2023-04-21 02:19:30'),
(129, 'department_delete', '2023-04-21 02:19:41', '2023-04-21 02:19:41'),
(130, 'position_edit', '2023-04-21 02:26:22', '2023-04-21 02:26:22'),
(131, 'position_delete', '2023-04-21 02:26:32', '2023-04-21 02:26:32'),
(132, 'vendortype_edit', '2023-04-21 02:29:31', '2023-04-21 02:29:31'),
(133, 'vendortype_delete', '2023-04-21 02:29:41', '2023-04-21 02:29:41'),
(134, 'vendorcategory_edit', '2023-04-21 02:30:37', '2023-04-21 02:30:37'),
(135, 'vendorcategory_delete', '2023-04-21 02:30:57', '2023-04-21 02:30:57'),
(136, 'branch_edit', '2023-04-21 02:54:20', '2023-04-21 02:54:20'),
(137, 'branch_delete', '2023-04-21 02:54:35', '2023-04-21 02:54:35'),
(138, 'insurance_edit', '2023-04-21 03:48:37', '2023-04-21 03:48:37'),
(139, 'insurance_delete', '2023-04-21 03:48:48', '2023-04-21 03:48:48'),
(140, 'contract_edit', '2023-04-21 03:51:56', '2023-04-21 03:51:56'),
(141, 'contract_delete', '2023-04-21 03:52:04', '2023-04-21 03:52:04'),
(142, 'policy_edit', '2023-04-21 03:54:34', '2023-04-21 03:54:34'),
(143, 'policy_delete', '2023-04-21 03:54:42', '2023-04-21 03:54:42'),
(144, 'leave_edit', '2023-04-21 03:55:43', '2023-04-21 03:55:43'),
(145, 'leave_delete', '2023-04-21 03:55:51', '2023-04-21 03:55:51'),
(146, 'outstation_edit', '2023-04-21 03:58:14', '2023-04-21 03:58:14'),
(147, 'outstation_delete', '2023-04-21 03:58:21', '2023-04-21 03:58:21'),
(148, 'document_edit', '2023-04-21 04:00:13', '2023-04-21 04:00:13'),
(149, 'document_delete', '2023-04-21 04:00:21', '2023-04-21 04:00:21'),
(150, 'rate_edit', '2023-04-21 04:01:28', '2023-04-21 04:01:28'),
(151, 'rate_delete', '2023-04-21 04:01:35', '2023-04-21 04:01:35'),
(152, 'notice_edit', '2023-04-21 04:03:16', '2023-04-21 04:03:16'),
(153, 'notice_delete', '2023-04-21 04:03:23', '2023-04-21 04:03:23'),
(154, 'committee_delete', '2023-04-21 04:04:08', '2023-04-21 04:04:08'),
(155, 'committee_edit', '2023-04-21 04:04:19', '2023-04-21 04:04:19'),
(156, 'notice-type', '2023-04-26 05:14:59', '2023-04-26 05:14:59'),
(157, 'noticetype_access', '2023-04-26 05:15:12', '2023-04-26 05:15:12'),
(158, 'noticetype_create', '2023-04-26 05:15:19', '2023-04-26 05:15:19'),
(159, 'noticetype_edit', '2023-04-26 05:15:25', '2023-04-26 05:15:25'),
(160, 'noticetype_delete', '2023-04-26 05:15:31', '2023-04-26 05:15:31'),
(161, 'subdocument-type', '2023-04-26 05:56:57', '2023-04-26 22:26:47'),
(162, 'subdocumenttype_access', '2023-04-26 05:57:20', '2023-04-26 22:27:20'),
(163, 'subdocumenttype_create', '2023-04-26 05:57:27', '2023-04-26 22:27:32'),
(164, 'subdocumenttype_edit', '2023-04-26 05:57:35', '2023-04-26 22:27:48'),
(165, 'subdocumenttype_delete', '2023-04-26 05:57:44', '2023-04-26 22:27:59'),
(166, 'fiscalyear_access', '2023-05-09 04:47:34', '2023-05-09 04:47:34'),
(167, 'fiscalyear_create', '2023-05-09 04:47:43', '2023-05-09 04:47:43'),
(168, 'fiscalyear_edit', '2023-05-09 04:47:50', '2023-05-09 04:47:50'),
(169, 'fiscalyear_delete', '2023-05-09 04:47:58', '2023-05-09 04:47:58'),
(170, 'roles', '2023-05-09 08:03:43', '2023-05-09 08:11:48'),
(171, 'permissions', '2023-05-09 08:11:38', '2023-05-09 08:11:38'),
(173, 'fiscalyear', '2023-05-09 10:56:49', '2023-05-09 10:56:49');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint UNSIGNED NOT NULL,
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 85, 1, NULL, NULL),
(2, 1, 1, NULL, NULL),
(3, 2, 1, NULL, NULL),
(4, 3, 1, NULL, NULL),
(5, 4, 1, NULL, NULL),
(6, 5, 1, NULL, NULL),
(7, 6, 1, NULL, NULL),
(8, 7, 1, NULL, NULL),
(9, 8, 1, NULL, NULL),
(11, 10, 1, NULL, NULL),
(13, 12, 1, NULL, NULL),
(14, 13, 1, NULL, NULL),
(15, 14, 1, NULL, NULL),
(17, 16, 1, NULL, NULL),
(18, 17, 1, NULL, NULL),
(22, 21, 1, NULL, NULL),
(24, 23, 1, NULL, NULL),
(25, 24, 1, NULL, NULL),
(26, 25, 1, NULL, NULL),
(27, 26, 1, NULL, NULL),
(28, 27, 1, NULL, NULL),
(29, 28, 1, NULL, NULL),
(30, 29, 1, NULL, NULL),
(31, 30, 1, NULL, NULL),
(33, 32, 1, NULL, NULL),
(34, 33, 1, NULL, NULL),
(35, 34, 1, NULL, NULL),
(36, 35, 1, NULL, NULL),
(37, 36, 1, NULL, NULL),
(38, 37, 1, NULL, NULL),
(39, 38, 1, NULL, NULL),
(40, 39, 1, NULL, NULL),
(41, 40, 1, NULL, NULL),
(43, 42, 1, NULL, NULL),
(44, 43, 1, NULL, NULL),
(45, 44, 1, NULL, NULL),
(46, 45, 1, NULL, NULL),
(47, 46, 1, NULL, NULL),
(48, 47, 1, NULL, NULL),
(49, 48, 1, NULL, NULL),
(50, 49, 1, NULL, NULL),
(51, 50, 1, NULL, NULL),
(52, 51, 1, NULL, NULL),
(53, 52, 1, NULL, NULL),
(54, 53, 1, NULL, NULL),
(55, 54, 1, NULL, NULL),
(56, 55, 1, NULL, NULL),
(57, 56, 1, NULL, NULL),
(58, 57, 1, NULL, NULL),
(59, 58, 1, NULL, NULL),
(60, 59, 1, NULL, NULL),
(63, 62, 1, NULL, NULL),
(67, 66, 1, NULL, NULL),
(71, 70, 1, NULL, NULL),
(72, 71, 1, NULL, NULL),
(73, 72, 1, NULL, NULL),
(74, 73, 1, NULL, NULL),
(75, 74, 1, NULL, NULL),
(76, 75, 1, NULL, NULL),
(77, 76, 1, NULL, NULL),
(78, 77, 1, NULL, NULL),
(80, 79, 1, NULL, NULL),
(84, 83, 1, NULL, NULL),
(86, 86, 1, NULL, NULL),
(87, 87, 1, NULL, NULL),
(88, 88, 1, NULL, NULL),
(89, 89, 1, NULL, NULL),
(90, 90, 1, NULL, NULL),
(91, 91, 1, NULL, NULL),
(92, 92, 1, NULL, NULL),
(93, 93, 1, NULL, NULL),
(94, 94, 1, NULL, NULL),
(98, 98, 1, NULL, NULL),
(103, 103, 1, NULL, NULL),
(113, 113, 1, NULL, NULL),
(114, 114, 1, NULL, NULL),
(115, 115, 1, NULL, NULL),
(116, 116, 1, NULL, NULL),
(117, 117, 1, NULL, NULL),
(118, 118, 1, NULL, NULL),
(119, 119, 1, NULL, NULL),
(120, 120, 1, NULL, NULL),
(121, 121, 1, NULL, NULL),
(122, 122, 1, NULL, NULL),
(123, 123, 1, NULL, NULL),
(124, 124, 1, NULL, NULL),
(125, 125, 1, NULL, NULL),
(126, 126, 1, NULL, NULL),
(127, 127, 1, NULL, NULL),
(128, 128, 1, NULL, NULL),
(129, 129, 1, NULL, NULL),
(130, 130, 1, NULL, NULL),
(131, 131, 1, NULL, NULL),
(138, 138, 1, NULL, NULL),
(139, 139, 1, NULL, NULL),
(140, 140, 1, NULL, NULL),
(141, 141, 1, NULL, NULL),
(142, 142, 1, NULL, NULL),
(143, 143, 1, NULL, NULL),
(146, 146, 1, NULL, NULL),
(147, 147, 1, NULL, NULL),
(148, 148, 1, NULL, NULL),
(149, 149, 1, NULL, NULL),
(150, 150, 1, NULL, NULL),
(151, 151, 1, NULL, NULL),
(154, 154, 1, NULL, NULL),
(155, 155, 1, NULL, NULL),
(156, 1, 2, NULL, NULL),
(157, 2, 2, NULL, NULL),
(158, 3, 2, NULL, NULL),
(159, 4, 2, NULL, NULL),
(160, 5, 2, NULL, NULL),
(161, 6, 2, NULL, NULL),
(162, 7, 2, NULL, NULL),
(163, 8, 2, NULL, NULL),
(164, 9, 2, NULL, NULL),
(165, 10, 2, NULL, NULL),
(167, 12, 2, NULL, NULL),
(168, 13, 2, NULL, NULL),
(169, 14, 2, NULL, NULL),
(170, 15, 2, NULL, NULL),
(171, 16, 2, NULL, NULL),
(172, 17, 2, NULL, NULL),
(173, 18, 2, NULL, NULL),
(174, 19, 2, NULL, NULL),
(176, 21, 2, NULL, NULL),
(177, 22, 2, NULL, NULL),
(178, 23, 2, NULL, NULL),
(179, 24, 2, NULL, NULL),
(180, 25, 2, NULL, NULL),
(181, 26, 2, NULL, NULL),
(182, 27, 2, NULL, NULL),
(183, 28, 2, NULL, NULL),
(184, 29, 2, NULL, NULL),
(185, 30, 2, NULL, NULL),
(187, 32, 2, NULL, NULL),
(188, 33, 2, NULL, NULL),
(189, 34, 2, NULL, NULL),
(190, 35, 2, NULL, NULL),
(191, 36, 2, NULL, NULL),
(192, 37, 2, NULL, NULL),
(193, 38, 2, NULL, NULL),
(194, 39, 2, NULL, NULL),
(195, 40, 2, NULL, NULL),
(197, 42, 2, NULL, NULL),
(198, 43, 2, NULL, NULL),
(199, 44, 2, NULL, NULL),
(200, 45, 2, NULL, NULL),
(201, 46, 2, NULL, NULL),
(202, 47, 2, NULL, NULL),
(203, 48, 2, NULL, NULL),
(204, 49, 2, NULL, NULL),
(205, 50, 2, NULL, NULL),
(206, 51, 2, NULL, NULL),
(207, 52, 2, NULL, NULL),
(208, 53, 2, NULL, NULL),
(209, 54, 2, NULL, NULL),
(210, 55, 2, NULL, NULL),
(211, 56, 2, NULL, NULL),
(212, 57, 2, NULL, NULL),
(213, 58, 2, NULL, NULL),
(214, 59, 2, NULL, NULL),
(215, 60, 2, NULL, NULL),
(216, 61, 2, NULL, NULL),
(217, 62, 2, NULL, NULL),
(218, 63, 2, NULL, NULL),
(219, 64, 2, NULL, NULL),
(220, 65, 2, NULL, NULL),
(221, 66, 2, NULL, NULL),
(222, 67, 2, NULL, NULL),
(223, 68, 2, NULL, NULL),
(224, 69, 2, NULL, NULL),
(225, 70, 2, NULL, NULL),
(226, 71, 2, NULL, NULL),
(227, 72, 2, NULL, NULL),
(228, 73, 2, NULL, NULL),
(229, 74, 2, NULL, NULL),
(230, 75, 2, NULL, NULL),
(231, 76, 2, NULL, NULL),
(232, 77, 2, NULL, NULL),
(233, 78, 2, NULL, NULL),
(234, 79, 2, NULL, NULL),
(235, 80, 2, NULL, NULL),
(236, 81, 2, NULL, NULL),
(237, 82, 2, NULL, NULL),
(246, 91, 2, NULL, NULL),
(247, 92, 2, NULL, NULL),
(248, 93, 2, NULL, NULL),
(249, 94, 2, NULL, NULL),
(250, 95, 2, NULL, NULL),
(251, 96, 2, NULL, NULL),
(252, 97, 2, NULL, NULL),
(253, 98, 2, NULL, NULL),
(254, 99, 2, NULL, NULL),
(255, 100, 2, NULL, NULL),
(256, 101, 2, NULL, NULL),
(258, 103, 2, NULL, NULL),
(259, 104, 2, NULL, NULL),
(260, 105, 2, NULL, NULL),
(268, 113, 2, NULL, NULL),
(269, 114, 2, NULL, NULL),
(270, 115, 2, NULL, NULL),
(271, 116, 2, NULL, NULL),
(272, 117, 2, NULL, NULL),
(273, 118, 2, NULL, NULL),
(274, 119, 2, NULL, NULL),
(275, 120, 2, NULL, NULL),
(276, 121, 2, NULL, NULL),
(293, 138, 2, NULL, NULL),
(294, 139, 2, NULL, NULL),
(295, 140, 2, NULL, NULL),
(296, 141, 2, NULL, NULL),
(297, 142, 2, NULL, NULL),
(298, 143, 2, NULL, NULL),
(299, 144, 2, NULL, NULL),
(300, 145, 2, NULL, NULL),
(301, 146, 2, NULL, NULL),
(302, 147, 2, NULL, NULL),
(303, 148, 2, NULL, NULL),
(304, 149, 2, NULL, NULL),
(305, 150, 2, NULL, NULL),
(306, 151, 2, NULL, NULL),
(307, 152, 2, NULL, NULL),
(308, 153, 2, NULL, NULL),
(312, 157, 1, NULL, NULL),
(321, 166, 1, NULL, NULL),
(325, 170, 1, NULL, NULL),
(326, 171, 1, NULL, NULL),
(329, 9, 1, NULL, NULL),
(330, 15, 1, NULL, NULL),
(331, 18, 1, NULL, NULL),
(332, 19, 1, NULL, NULL),
(333, 22, 1, NULL, NULL),
(334, 60, 1, NULL, NULL),
(335, 61, 1, NULL, NULL),
(336, 63, 1, NULL, NULL),
(337, 64, 1, NULL, NULL),
(338, 65, 1, NULL, NULL),
(339, 67, 1, NULL, NULL),
(340, 68, 1, NULL, NULL),
(341, 69, 1, NULL, NULL),
(342, 78, 1, NULL, NULL),
(343, 80, 1, NULL, NULL),
(344, 81, 1, NULL, NULL),
(345, 82, 1, NULL, NULL),
(346, 84, 1, NULL, NULL),
(347, 95, 1, NULL, NULL),
(348, 96, 1, NULL, NULL),
(349, 97, 1, NULL, NULL),
(350, 99, 1, NULL, NULL),
(351, 100, 1, NULL, NULL),
(352, 101, 1, NULL, NULL),
(353, 104, 1, NULL, NULL),
(354, 105, 1, NULL, NULL),
(355, 106, 1, NULL, NULL),
(356, 107, 1, NULL, NULL),
(357, 108, 1, NULL, NULL),
(358, 109, 1, NULL, NULL),
(359, 110, 1, NULL, NULL),
(360, 112, 1, NULL, NULL),
(361, 132, 1, NULL, NULL),
(362, 133, 1, NULL, NULL),
(363, 134, 1, NULL, NULL),
(364, 135, 1, NULL, NULL),
(365, 136, 1, NULL, NULL),
(366, 137, 1, NULL, NULL),
(367, 144, 1, NULL, NULL),
(368, 145, 1, NULL, NULL),
(369, 152, 1, NULL, NULL),
(370, 153, 1, NULL, NULL),
(371, 156, 1, NULL, NULL),
(372, 158, 1, NULL, NULL),
(373, 159, 1, NULL, NULL),
(374, 160, 1, NULL, NULL),
(375, 161, 1, NULL, NULL),
(376, 162, 1, NULL, NULL),
(377, 163, 1, NULL, NULL),
(378, 164, 1, NULL, NULL),
(379, 165, 1, NULL, NULL),
(380, 167, 1, NULL, NULL),
(381, 168, 1, NULL, NULL),
(382, 169, 1, NULL, NULL),
(383, 173, 1, NULL, NULL),
(388, 5, 4, NULL, NULL),
(389, 6, 4, NULL, NULL),
(390, 7, 4, NULL, NULL),
(391, 8, 4, NULL, NULL),
(392, 9, 4, NULL, NULL),
(393, 10, 4, NULL, NULL),
(394, 12, 4, NULL, NULL),
(396, 14, 4, NULL, NULL),
(400, 18, 4, NULL, NULL),
(550, 3, 4, NULL, NULL),
(551, 4, 4, NULL, NULL),
(552, 59, 4, NULL, NULL),
(553, 79, 4, NULL, NULL),
(554, 92, 4, NULL, NULL),
(555, 95, 4, NULL, NULL),
(556, 97, 4, NULL, NULL),
(557, 98, 4, NULL, NULL),
(558, 101, 4, NULL, NULL),
(559, 103, 4, NULL, NULL),
(560, 104, 4, NULL, NULL),
(561, 109, 4, NULL, NULL),
(562, 91, 4, NULL, NULL),
(563, 93, 4, NULL, NULL),
(564, 116, 4, NULL, NULL),
(565, 13, 4, NULL, NULL),
(566, 62, 4, NULL, NULL),
(567, 66, 4, NULL, NULL),
(568, 70, 4, NULL, NULL),
(569, 74, 4, NULL, NULL),
(570, 44, 4, NULL, NULL),
(571, 2, 4, NULL, NULL),
(572, 115, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Interest Rate Renewal', '<p>THis is policy made for interest rate renewal for year 2023.</p>', '2023-04-21 03:54:16', '2023-04-21 03:54:16'),
(2, 'policy', 'policy', '2023-05-11 04:33:45', '2023-05-11 04:33:45');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'C.E.O', NULL, NULL),
(3, 'AGM', NULL, NULL),
(4, 'Sr. Manager', NULL, NULL),
(5, 'Deputy Manager', NULL, NULL),
(6, 'Assistant Manager', NULL, NULL),
(7, 'Sr. Officer', NULL, NULL),
(8, 'Officer', NULL, NULL),
(9, 'Jr. Officer', NULL, NULL),
(10, 'Superviser', NULL, NULL),
(11, 'Sr. Assistant', NULL, NULL),
(12, 'Assistant', NULL, NULL),
(13, 'Jr. Assistant', NULL, NULL),
(14, 'Sr. Messenger', NULL, NULL),
(15, 'Messenger', NULL, NULL),
(16, 'Sr. Driver', NULL, NULL),
(17, 'Driver', NULL, NULL),
(18, 'Cleaner', NULL, NULL),
(19, 'Gold Incharge', NULL, NULL),
(20, 'Trainee. Assistant', NULL, NULL),
(21, 'Messenger (Contract)', NULL, NULL),
(22, 'Chairman', '2023-05-30 08:28:32', '2023-05-30 08:28:32'),
(23, 'Director', '2023-05-30 08:28:42', '2023-05-30 08:28:42');

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` bigint UNSIGNED NOT NULL,
  `base_rate` double(8,2) NOT NULL,
  `spread_rate` double(8,2) NOT NULL,
  `cost_fund` double(12,2) NOT NULL,
  `yield_rate` double(8,2) NOT NULL,
  `month` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `base_rate`, `spread_rate`, `cost_fund`, `yield_rate`, `month`, `year`, `created_at`, `updated_at`) VALUES
(2, 11.00, 11.00, 11.00, 11.00, '2', 2080, '2023-04-28 06:07:56', '2023-05-03 10:52:26'),
(3, 11.00, 11.00, 11.00, 11.00, '3', 2080, '2023-04-28 06:08:12', '2023-05-30 09:57:30');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2023-04-09 03:10:30', '2023-04-09 03:10:30'),
(2, 'manager', '2023-04-12 00:53:41', '2023-04-12 00:53:41'),
(4, 'employee', '2023-05-16 10:45:47', '2023-05-16 10:45:47');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 3, 1, NULL, NULL),
(4, 4, 1, NULL, NULL),
(5, 5, 1, NULL, NULL),
(6, 6, 1, NULL, NULL),
(7, 7, 1, NULL, NULL),
(8, 8, 1, NULL, NULL),
(9, 9, 1, NULL, NULL),
(10, 10, 1, NULL, NULL),
(11, 11, 1, NULL, NULL),
(12, 12, 1, NULL, NULL),
(13, 13, 1, NULL, NULL),
(14, 14, 1, NULL, NULL),
(15, 15, 1, NULL, NULL),
(16, 16, 1, NULL, NULL),
(17, 17, 1, NULL, NULL),
(18, 18, 1, NULL, NULL),
(19, 19, 1, NULL, NULL),
(20, 20, 1, NULL, NULL),
(21, 21, 1, NULL, NULL),
(22, 22, 1, NULL, NULL),
(23, 23, 1, NULL, NULL),
(24, 24, 1, NULL, NULL),
(25, 25, 1, NULL, NULL),
(26, 26, 1, NULL, NULL),
(27, 27, 1, NULL, NULL),
(28, 28, 1, NULL, NULL),
(29, 29, 1, NULL, NULL),
(30, 30, 1, NULL, NULL),
(31, 31, 1, NULL, NULL),
(32, 32, 1, NULL, NULL),
(33, 33, 1, NULL, NULL),
(34, 34, 1, NULL, NULL),
(35, 35, 1, NULL, NULL),
(36, 36, 1, NULL, NULL),
(37, 37, 1, NULL, NULL),
(38, 38, 1, NULL, NULL),
(39, 39, 1, NULL, NULL),
(40, 40, 1, NULL, NULL),
(41, 41, 1, NULL, NULL),
(42, 42, 1, NULL, NULL),
(43, 43, 1, NULL, NULL),
(44, 44, 1, NULL, NULL),
(45, 45, 1, NULL, NULL),
(46, 46, 1, NULL, NULL),
(47, 47, 1, NULL, NULL),
(48, 48, 1, NULL, NULL),
(49, 49, 1, NULL, NULL),
(50, 50, 1, NULL, NULL),
(51, 51, 1, NULL, NULL),
(52, 52, 1, NULL, NULL),
(53, 53, 1, NULL, NULL),
(54, 54, 1, NULL, NULL),
(55, 55, 1, NULL, NULL),
(56, 56, 1, NULL, NULL),
(57, 57, 1, NULL, NULL),
(58, 58, 1, NULL, NULL),
(59, 59, 1, NULL, NULL),
(60, 60, 1, NULL, NULL),
(61, 61, 1, NULL, NULL),
(62, 62, 1, NULL, NULL),
(63, 63, 1, NULL, NULL),
(64, 64, 1, NULL, NULL),
(65, 65, 1, NULL, NULL),
(66, 66, 1, NULL, NULL),
(67, 67, 1, NULL, NULL),
(68, 68, 1, NULL, NULL),
(69, 69, 1, NULL, NULL),
(70, 70, 1, NULL, NULL),
(71, 71, 1, NULL, NULL),
(72, 72, 1, NULL, NULL),
(73, 73, 1, NULL, NULL),
(74, 74, 1, NULL, NULL),
(75, 75, 1, NULL, NULL),
(76, 76, 1, NULL, NULL),
(77, 77, 1, NULL, NULL),
(78, 78, 1, NULL, NULL),
(79, 79, 1, NULL, NULL),
(80, 80, 1, NULL, NULL),
(81, 81, 1, NULL, NULL),
(82, 82, 1, NULL, NULL),
(83, 83, 1, NULL, NULL),
(84, 84, 1, NULL, NULL),
(85, 85, 1, NULL, NULL),
(86, 86, 1, NULL, NULL),
(87, 87, 1, NULL, NULL),
(88, 88, 1, NULL, NULL),
(89, 89, 1, NULL, NULL),
(90, 90, 1, NULL, NULL),
(91, 91, 1, NULL, NULL),
(92, 92, 1, NULL, NULL),
(93, 93, 1, NULL, NULL),
(94, 94, 1, NULL, NULL),
(95, 95, 1, NULL, NULL),
(96, 96, 1, NULL, NULL),
(97, 97, 1, NULL, NULL),
(98, 98, 1, NULL, NULL),
(99, 99, 1, NULL, NULL),
(100, 100, 1, NULL, NULL),
(101, 101, 1, NULL, NULL),
(102, 102, 1, NULL, NULL),
(103, 103, 1, NULL, NULL),
(104, 104, 1, NULL, NULL),
(105, 105, 1, NULL, NULL),
(106, 106, 1, NULL, NULL),
(107, 107, 1, NULL, NULL),
(108, 108, 1, NULL, NULL),
(109, 109, 1, NULL, NULL),
(110, 110, 1, NULL, NULL),
(111, 111, 1, NULL, NULL),
(112, 112, 1, NULL, NULL),
(113, 113, 1, NULL, NULL),
(114, 114, 1, NULL, NULL),
(115, 115, 1, NULL, NULL),
(116, 116, 1, NULL, NULL),
(117, 117, 1, NULL, NULL),
(118, 118, 1, NULL, NULL),
(119, 119, 1, NULL, NULL),
(120, 120, 1, NULL, NULL),
(121, 121, 1, NULL, NULL),
(122, 122, 1, NULL, NULL),
(123, 123, 1, NULL, NULL),
(124, 124, 1, NULL, NULL),
(125, 125, 1, NULL, NULL),
(126, 126, 1, NULL, NULL),
(127, 127, 1, NULL, NULL),
(128, 128, 1, NULL, NULL),
(129, 129, 1, NULL, NULL),
(130, 130, 1, NULL, NULL),
(131, 131, 1, NULL, NULL),
(132, 132, 1, NULL, NULL),
(133, 133, 1, NULL, NULL),
(134, 134, 1, NULL, NULL),
(135, 135, 1, NULL, NULL),
(136, 136, 1, NULL, NULL),
(137, 137, 1, NULL, NULL),
(138, 138, 1, NULL, NULL),
(139, 139, 1, NULL, NULL),
(140, 140, 1, NULL, NULL),
(141, 141, 1, NULL, NULL),
(142, 142, 1, NULL, NULL),
(143, 143, 1, NULL, NULL),
(144, 144, 1, NULL, NULL),
(145, 145, 1, NULL, NULL),
(146, 146, 1, NULL, NULL),
(147, 147, 1, NULL, NULL),
(148, 148, 1, NULL, NULL),
(149, 149, 1, NULL, NULL),
(150, 150, 1, NULL, NULL),
(151, 151, 1, NULL, NULL),
(152, 152, 1, NULL, NULL),
(153, 153, 1, NULL, NULL),
(154, 154, 1, NULL, NULL),
(155, 155, 1, NULL, NULL),
(156, 156, 1, NULL, NULL),
(157, 157, 1, NULL, NULL),
(158, 158, 1, NULL, NULL),
(159, 159, 1, NULL, NULL),
(160, 160, 1, NULL, NULL),
(161, 161, 1, NULL, NULL),
(162, 162, 1, NULL, NULL),
(163, 163, 1, NULL, NULL),
(164, 164, 1, NULL, NULL),
(165, 165, 1, NULL, NULL),
(166, 166, 1, NULL, NULL),
(167, 167, 1, NULL, NULL),
(168, 168, 1, NULL, NULL),
(169, 169, 1, NULL, NULL),
(170, 170, 1, NULL, NULL),
(171, 171, 1, NULL, NULL),
(172, 172, 1, NULL, NULL),
(173, 173, 1, NULL, NULL),
(174, 174, 1, NULL, NULL),
(175, 175, 1, NULL, NULL),
(176, 176, 1, NULL, NULL),
(177, 177, 1, NULL, NULL),
(178, 178, 1, NULL, NULL),
(179, 179, 1, NULL, NULL),
(180, 180, 1, NULL, NULL),
(181, 181, 1, NULL, NULL),
(182, 182, 1, NULL, NULL),
(183, 183, 1, NULL, NULL),
(184, 184, 1, NULL, NULL),
(185, 185, 1, NULL, NULL),
(186, 186, 1, NULL, NULL),
(187, 187, 1, NULL, NULL),
(188, 188, 1, NULL, NULL),
(189, 189, 1, NULL, NULL),
(190, 190, 1, NULL, NULL),
(191, 191, 1, NULL, NULL),
(192, 192, 1, NULL, NULL),
(193, 193, 1, NULL, NULL),
(194, 194, 1, NULL, NULL),
(195, 195, 1, NULL, NULL),
(196, 196, 1, NULL, NULL),
(197, 197, 1, NULL, NULL),
(198, 198, 1, NULL, NULL),
(199, 199, 1, NULL, NULL),
(200, 200, 1, NULL, NULL),
(201, 201, 1, NULL, NULL),
(202, 202, 1, NULL, NULL),
(203, 203, 1, NULL, NULL),
(204, 204, 1, NULL, NULL),
(205, 205, 1, NULL, NULL),
(206, 206, 1, NULL, NULL),
(207, 207, 1, NULL, NULL),
(208, 208, 1, NULL, NULL),
(209, 209, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `saving_deposits`
--

CREATE TABLE `saving_deposits` (
  `id` bigint UNSIGNED NOT NULL,
  `interest_head_id` bigint UNSIGNED NOT NULL,
  `particulars` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_balance` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `interest_rate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saving_deposits`
--

INSERT INTO `saving_deposits` (`id`, `interest_head_id`, `particulars`, `min_balance`, `interest_rate`, `created_at`, `updated_at`) VALUES
(1, 1, '[\"Bal Bachat\",\"Regular Saving\",\"Payroll Savings\",\"Couple Saving\",\"Welfare Saving\",\"Student Savings\",\"JesthaNagarik\",\"Shareholders Savings\",\"Nari Bachat\",\"Gurkha Pension Savings\",\"Special Savings\",\"Remittance Saving\"]', '[\"100\",\"200\",\"200\",\"200\",\"0\",\"200\",\"250\",\"200\",\"250\",\"500\",\"5000\",\"200\"]', '[\"6.00%\",\"6.00%\",\"6.00%\",\"6.00%\",\"6.00%\",\"6.00%\",\"6.50%\",\"6.50%\",\"6.50%\",\"6.50%\",\"6.50%\",\"6.00%\"]', NULL, NULL),
(2, 2, '[\"Special Savings\",\"Bal Bachat\",\"Nari Bachat\",\"JesthaNagarik\",\"Gurkha Pension Savings\",\"Shareholders Savings\",\"Payroll Savings\",\"Regular Saving\",\"Remittance Saving\",\"Couple Saving\",\"Welfare Saving\",\"Student Savings\"]', '[\"5000\",\"100\",\"250\",\"250\",\"500\",\"200\",\"200\",\"200\",\"200\",\"200\",\"0\",\"200\"]', '[\"6.50%\",\"6.00%\",\"6.50%\",\"6.50%\",\"6.50%\",\"6.50%\",\"6.00%\",\"6.00%\",\"6.00%\",\"6.00%\",\"6.00%\",\"6.00%\"]', NULL, NULL),
(3, 3, '[\"Special Savings\",\"Bal Bachat\",\"Nari Bachat\",\"JesthaNagarikGurkha Pension Savings\",\"Shareholders Savings\",\"Payroll Savings\",\"Regular Saving\",\"Remittance Saving\",\"Couple Saving\",\"Welfare Saving\",\"Student Savings\"]', '[\"5000\",\"100\",\"250\",\"250\",\"500\",\"200\",\"200\",\"200\",\"200\",\"200\",\"0\",\"200\"]', '[\"6.50%\",\"6.00%\",\"6.50%\",\"6.50%\",\"6.50%\",\"6.50%\",\"6.00%\",\"6.00%\",\"6.00%\",\"6.00%\",\"6.00%\",\"6.00%\"]', NULL, NULL),
(4, 4, '[\"Special Savings\",\"Bal Bachat\",\"Nari Bachat\",\"JesthaNagarik\",\"Gurkha Pension Savings\",\"Shareholders Savings\"Regular Saving\",\"Remittance Saving\",\"Couple Saving\",\"Welfare Saving\",\"Student Savings\"]', '[\"5000\",\"100\",\"250\",\"250\",\"500\",\"200\",\"200\",\"200\",\"200\",\"200\",\"0\",\"200\"]', '[\"6.50%\",\"6.00%\",\"6.50%\",\"6.50%\",\"6.50%\",\"6.50%\",\"6.00%\",\"6.00%\",\"6.00%\",\"6.00%\",\"6.00%\",\"6.00%\"]', NULL, NULL),
(5, 5, '[\"Special Savings\",\"Bal Bachat\",\"Nari Bachat\",\"JesthaNagarik\",\"Gurkha Pension Savings\",\"Shareholders Savings\",\"Payroll Savings\",\"Regular Saving\",\"Remittance Saving\",\"Couple Saving\",\"Welfare Saving\",\"Student Savings\"]', '[\"5000\",\"100\",\"250\",\"250\",\"500\",\"200\",\"200\",\"200\",\"200\",\"200\",\"0\",\"200\"]', '[\"6.50%\",\"6.00%\",\"6.50%\",\"6.50%\",\"6.50%\",\"6.50%\",\"6.00%\",\"6.00%\",\"6.00%\",\"6.00%\",\"6.00%\",\"6.00%\"]', NULL, NULL),
(11, 11, '[\"Special Savings\",\"Bal Bachat\",\"Nari Bachat\",\"JesthaNagarik\",\"Gurkha Pension Savings\",\"Shareholders Savings\",\"Payroll Savings\",\"Regular Saving\",\"Remittance Saving\",\"Couple Saving\",\"Welfare Saving\",\"Student Savings\",\"Staff Saving \",\"Corporate flexible saving \",]', '[\"5000\",\"100\",\"250\",\"250\",\"500\",\"200\",\"200\",\"200\",\"200\",\"200\",0\"200\",\"200\",\"1000\",]', '[\"7.50%\",\"7.00%\",\"7.50%\",\"7.50%\",\"7.50%\",\"7.50%\",\"7.00%\",\"7.00%\",\"7.00%\",\"7.00%\",\"7.00%\",\"7.00%\",\"7.50%\",\"up to 3.50%\",]', NULL, NULL),
(12, 12, '[\"Special Savings\",\"Bal Bachat\",\"Nari Bachat\",\"JesthaNagarik\",\"Gurkha Pension Savings\",\"Shareholders Savings\",\"Payroll Savings\",\"Regular Saving\",\"Remittance Saving\",\"Couple Saving\",\"Welfare Saving\",\"Student Savings\",\"Non-profitable org. saving\",\"Corporate flexible saving\"]', '[\"5000\",\"100\",\"250\",\"250\",\"500\",\"200\",\"200\",\"200\",\"200\",\"0\",\"200\",\"200\",\"1000\",\"1000\"]', '[\"7.50%\",\"7.25%\",\"7.50%\",\"7.50%\",\"7.50%\",\"7.50%\",\"7.25%\",\"7.25%\",\"7.25%\",\"7.25%\",\"7.25%\",\"7.25%\",\"7.25%\",\"Up to 3.62%\"]', NULL, NULL),
(13, 13, '[\"Bal Bachat\",\"Nari Bachat\",\"JesthaNagarik\",\"Gurkha Pension Savings\",\"Shareholders Savings\",\"Payroll Savings\",\"Regular Saving\",\"Remittance Saving\",\"Couple Saving\",\"Welfare Saving\",\"Student Savings\",\"Staff Saving\",\"Non-profitable org. saving\",\"Special Savings\",\"Corporate flexible saving\"]', '[\"100\",\"250\",\"250\",\"500\",\"200\",\"200\",\"200.00\",\"200\",\"200\",\"0\",\"200\",\"200\",\"1000\",\"5000\",\"1000\"]', '[\"7.25%\",\"7.50%\",\"7.50%\",\"7.50%\",\"7.50%\",\"7.25%\",\"7.25%\",\"7.25%\",\"7.25%\",\"7.25%\",\"7.25%\",\"7.50%\",\"7.25%\",\"9%\",\"Up to 3.62%\"]', NULL, NULL),
(14, 14, '[\"Bal Bachat\",\"Regular Saving\",\"Payroll Savings\",\"Couple Saving\",\"Welfare Saving\",\"Student Savings\",\"Non-profitable org. saving\",\"Nari Bachat\",\"JesthaNagarik\",\"Shareholders Savings\",\"Staff Saving\",\"Gurkha Pension Savings\",\"Special Savings\",\"Remittance Saving\",\"Corporate flexible saving\"]', '[\"100\",\"200\",\"200\",\"200\",\"0\",\"200\",\"1000.00\",\"250\",\"250\",\"200\",\"200\",\"5000\",\"5000\",\"200\",\"1000\"]', '[\"7.25%\",\"7.25%\",\"7.25%\",\"7.25%\",\"7.25%\",\"7.25%\",\"7.25%\",\"7.50%\",\"7.50%\",\"7.50%\",\"7.50%\",\"9.00%\",\"9.00%\",\"10.00%\",\"Up to 3.62%\"]', NULL, NULL),
(15, 15, '[\"Bal Bachat\",\"Regular Saving\",\"Payroll Savings\",\"Couple Saving\",\"Welfare Saving\",\"Student Savings\",\"Non-profitable org. saving\",\"Jestha Nagarik Saving\",\"Shareholders Savings\",\"Staff Saving\",\"Nari Bachat\",\"Gurkha Pension Savings\",\"Special Savings\",\"Remittance Saving\",\"Corporate flexible saving\"]', '[\"100\",\"200\",\"200\",\"200\",\"0\",\"200\",\"1000\",\"250\",\"200\",\"200\",\"250\",\"5000\",\"5000\",\"200\",\"1000\"]', '[\"7.25%\",\"7.25%\",\"7.25%\",\"7.25%\",\"7.25%\",\"7.25%\",\"7.25%\",\"7.50%\",\"7.50%\",\"7.50%\",\"9.00%\",\"9.00%\",\"9.25%\",\"10.25%\",\"Up to 3.62%\"]', NULL, NULL),
(16, 16, '[\"Bal Bachat\",\"Regular Saving\",\"Payroll Savings\",\"Couple Saving\",\"Welfare Saving\",\"Student Savings\",\"Non-profitable org. saving\",\"Jestha Nagarik Saving\",\"Shareholders Savings\",\"Staff Saving\",\"Nari Bachat\",\"Gurkha Pension Savings\",\"Special Savings\",\"Remittance Saving\",\"Corporate flexible saving\"]', '[\"100\",\"200\",\"200\",\"200\",\"0\",\"200\",\"1,000.00\",\"250\",\"200\",\"200\",\"250\",\"5000\",\"5000\",\"200\",\"1000\"]', '[\"8.47%\",\"8.47%\",\"8.47%\",\"8.47%\",\"8.47%\",\"8.47%\",\"8.47%\",\"8.47%\",\"8.47%\",\"8.47%\",\"8.47%\",\"10.00%\",\"10.00%\",\"11.00%\",\"Up to 4.23%\"]', NULL, NULL),
(17, 17, '[\"Bal Bachat\",\"Regular Saving\",\"Payroll Savings\",\"Couple Saving\",\"Welfare Saving\",\"Student Savings\",\"Non-profitable org. saving\",\"Jestha Nagarik Saving\",\"Shareholders Savings\",\"Staff Saving\",\"Nari Bachat\",\"Gurkha Pension Savings\",\"Special Savings\",\"Remittance Saving\",\"Corporate flexible saving\"]', '[\"100\",\"200\",\"200\",\"200\",\"0\",\"200\",\"1,000.00\",\"250\",\"200\",\"200\",\"250\",\"5000\",\"5000\",\"200\",\"1000\"]', '[\"8.47%\",\"8.47%\",\"8.47%\",\"8.47%\",\"8.47%\",\"8.47%\",\"8.47%\",\"8.47%\",\"8.47%\",\"8.47%\",\"8.47%\",\"10.00%\",\"10.00%\",\"11.00%\",\"Up to 4.23%\"]', NULL, NULL),
(18, 18, '[\"Bal Bachat\",\"Regular Saving\",\"Payroll Savings\",\"Couple Saving\",\"Welfare Saving\",\"Student Savings\",\"Non-profitable org. saving\",\"JesthaNagarik\",\"Shareholders Savings\",\"Staff Saving\",\"Nari Bachat\",\"Gurkha Pension Savings\",\"Special Savings\",\"Remittance Saving\",\"Corporate flexible saving\"]', '[\"100\",\"200\",\"200\",\"200\",\"0\",\"200\",\"1,000.00\",\"250\",\"200\",\"200\",\"250\",\"5000\",\"5000\",\"200\",\"1000\"]', '[\"8.47%\",\"8.47%\",\"8.47%\",\"8.47%\",\"8.47%\",\"8.47%\",\"8.47%\",\"8.47%\",\"8.47%\",\"8.47%\",\"8.47%\",\"10.00%\",\"10.00%\",\"11.00%\",\"Up to 4.23%\"]', NULL, NULL),
(19, 19, '[\"Bal Bachat\",\"Regular Saving\",\"Payroll Savings\",\"Couple Saving\",\"Welfare Saving\",\"Student Savings\",\"Non-profitable org. saving\",\"JesthaNagarik\",\"Shareholders Savings\",\"Staff Saving\",\"Nari Bachat\",\"Gurkha Pension Savings\",\"Special Savings\",\"Remittance Saving\",\"Corporate flexible saving\"]', '[\"100\",\"200\",\"0\",\"200\",\"0\",\"200\",\"1,000.00\",\"250\",\"200\",\"200\",\"250\",\"5000\",\"5000\",\"200\",\"1000\"]', '[\"8.47%\",\"8.47%\",\"8.47%\",\"8.47%\",\"8.47%\",\"8.47%\",\"8.47%\",\"8.47%\",\"8.47%\",\"8.47%\",\"8.47%\",\"10.00%\",\"10.00%\",\"10.00%\",\"Up to 4.23%\"]', NULL, NULL),
(20, 20, '[\"Bal Bachat\",\"Regular Saving\",\"Payroll Savings\",\"Couple Saving\",\"Welfare Saving\",\"Student Savings\",\"Non-profitable org. saving\",\"JesthaNagarik\",\"Shareholders Savings\",\"Staff Saving\",\"Nari Bachat\",\"Gurkha Pension Savings\",\"Special Savings\",\"Remittance Saving\",\"Corporate flexible saving\"]', '[\"100\",\"200\",\"0\",\"200\",\"0\",\"200\",\"1,000.00\",\"250\",\"200\",\"200\",\"250\",\"5000\",\"5000\",\"200\",\"1000\"]', '[\"8.00%\",\"8.00%\",\"8.00%\",\"8.00%\",\"8.00%\",\"8.00%\",\"8.00%\",\"8.00%\",\"8.00%\",\"8.00%\",\"8.00%\",\"9.00%\",\"9.00%\",\"10.00%\",\"Up to 4.00%\"]', NULL, NULL),
(21, 21, '[\"Bal Bachat\",\"Regular Saving\",\"Payroll Savings\",\"Couple Saving\",\"Welfare Saving\",\"Student Savings\",\"Non-profitable org. saving\",\"JesthaNagarik\",\"Shareholders Savings\",\"Staff Saving\",\"Nari Bachat\",\"Gurkha Pension Savings\",\"Special Savings\",\"Remittance Saving\",\"Corporate flexible saving\",]', '[\"100\",\"200\",\"0\",\"200\",\"0\",\"200\",\"1,000.00\",\"250\",\"200\",\"200\",\"250\",\"5000\",\"5000\",\"200\",\"1000\"]', '[\"8.00%\",\"8.00%\",\"8.00%\",\"8.00%\",\"8.00%\",\"8.00%\",\"8.00%\",\"8.00%\",\"8.00%\",\"8.00%\",\"8.00%\",\"9.00%\",\"9.00%\",\"10.00%\",\"Up to 4.00%\"]', NULL, NULL),
(22, 22, '[\"Bal Bachat\",\"Regular Saving\",\"Payroll Savings\",\"Couple Saving\",\"Welfare Saving\",\"Student Savings\",\"Non-profitable org. saving\",\"JesthaNagarik\",\"Shareholders Savings\",\"Staff Saving\",\"Nari Bachat\",\"Gurkha Pension Savings\",\"Special Savings\",\"Remittance Saving\",\"Corporate flexible saving\"]', '[\"100\",\"200\",\"0\",\"200\",\"0\",\"200\",\"1,000.00\",\"250\",\"200\",\"200\",\"250\",\"5000\",\"5000\",\"200\",\"1000\"]', '[\"7.00%\",\"7.00%\",\"7.00%\",\"7.00%\",\"7.00%\",\"7.00%\",\"7.00%\",\"7.00%\",\"7.00%\",\"7.00%\",\"7.00%\",\"7.50%\",\"7.50%\",\"8.00%\",\"Up to 3.5%\"]', NULL, NULL),
(23, 23, '[\"Bal Bachat\",\"Regular Saving\",\"Payroll Savings\",\"Couple Saving\",\"Welfare Saving\",\"Student Savings\",\"Non-profitable org. saving\",\"JesthaNagarik\",\"Shareholders Savings\",\"Staff Saving\",\"Nari Bachat\",\"Gurkha Pension Savings\",\"Special Savings\",\"Remittance Saving\",\"Corporate flexible saving\"]', '[\"100\",\"200\",\"0\",\"200\",\"0\",\"200\",\"1,000.00\",\"250\",\"200\",\"200\",\"250\",\"5000\",\"5000\",\"200\",\"1000\"]', '[\"7.00%\",\"7.00%\",\"7.00%\",\"7.00%\",\"7.00%\",\"7.00%\",\"7.00%\",\"7.00%\",\"7.00%\",\"7.00%\",\"7.00%\",\"7.50%\",\"7.50%\",\"8.00%\",\"Up to 3.5%\"]', NULL, NULL),
(24, 9, '[\"3 month\"]', '[\"100\"]', '[\"0\"]', '2023-05-28 10:45:50', '2023-05-28 10:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `standard_terrifs`
--

CREATE TABLE `standard_terrifs` (
  `id` bigint UNSIGNED NOT NULL,
  `standard_terrif_head_id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `particulars` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `standard_terrifs`
--

INSERT INTO `standard_terrifs` (`id`, `standard_terrif_head_id`, `type`, `particulars`, `rate`, `created_at`, `updated_at`) VALUES
(1, 1, 'mobile-banking', '[\"Membership Fee\",\"PIN Reset\"]', '[\"Rs. 300\\/- Individual Account, Rs. 350\\/- Institutional Account\",\"Rs. 100\\/-\"]', '2023-05-09 06:23:14', '2023-05-09 11:31:26'),
(2, 1, 'debit-card', '[\"Membership Fee\",\"Annual Fee\",\"Balance Inquiry\"]', '[\"Free\",\"Rs. 350\\/-\",\"Rs. 5\\/-(SCT Network)\"]', '2023-05-09 06:23:30', '2023-05-09 11:30:34'),
(3, 3, 'debit-card', '[\"Non soluta distin\"]', '[\"30\"]', '2023-06-02 05:02:22', '2023-06-02 05:02:22'),
(4, 1, 'charges', '[\"Loan Penal Charge\",\"Loan Procesing Charge\",\"CIB Charge\"]', '[\"2 % of Remaining Loan Balance\",\"1.25 % of Loan\",\"As per actual\"]', '2023-05-09 11:32:02', '2023-05-09 11:32:38');

-- --------------------------------------------------------

--
-- Table structure for table `standard_terrif_heads`
--

CREATE TABLE `standard_terrif_heads` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fiscal_year_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `standard_terrif_heads`
--

INSERT INTO `standard_terrif_heads` (`id`, `title`, `month`, `fiscal_year_id`, `created_at`, `updated_at`) VALUES
(1, 'Standard Terrif Chaitra,2079/2080', '2', 2, '2023-05-09 06:19:04', '2023-05-09 06:20:38'),
(2, 'Standard Terrif Chaitra,2069/2070', '12', 3, '2023-05-09 06:41:07', '2023-05-16 11:07:08'),
(3, 'Standard Terrif Baishak,2079/2080', '1', 2, '2023-05-30 09:50:41', '2023-05-30 09:51:10');

-- --------------------------------------------------------

--
-- Table structure for table `sub_committee_levels`
--

CREATE TABLE `sub_committee_levels` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `committee_level_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_document_types`
--

CREATE TABLE `sub_document_types` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_type_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_document_types`
--

INSERT INTO `sub_document_types` (`id`, `title`, `document_type_id`, `created_at`, `updated_at`) VALUES
(1, 'HR Related', 8, '2023-04-26 22:38:48', '2023-05-10 11:09:35'),
(2, 'Sample Form', 6, '2023-04-27 00:12:51', '2023-05-10 11:08:17'),
(3, 'Sample Form', 4, '2023-04-27 00:13:08', '2023-04-27 00:13:08'),
(4, 'Loan Form', 6, '2023-04-27 00:13:24', '2023-05-10 11:08:25'),
(5, 'Loan Form', 4, '2023-04-27 00:13:33', '2023-04-27 00:13:33'),
(6, 'Registration Form', 5, '2023-04-27 00:13:48', '2023-05-10 11:09:41'),
(7, 'Registration Form', 4, '2023-04-27 00:13:56', '2023-04-27 00:13:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '0',
  `dark_mode` tinyint(1) NOT NULL DEFAULT '0',
  `messenger_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `joined_date` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `employee_code`, `name`, `email`, `email_verified_at`, `password`, `active_status`, `dark_mode`, `messenger_color`, `address`, `contact_no`, `mobile_no`, `joined_date`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'E001', 'admin', 'admin@gmail.com', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f3', 'kathmandu', NULL, '9876543210', '10/19/2078', NULL, NULL, '2023-06-01 11:27:01'),
(2, 'E00298', 'Santosh Kumar Ghimire', 'santosh.ghimire@gurkhasfinance.com.np', NULL, '$2y$10$Y6IW/ZIZd2.iTM5mVc5r3eTxDJU9bQ9OpYCQEVva6DJRygErIaCCu', 0, 0, '#2180f4', 'Janakpur-5, Ramechhap', NULL, '9851155376', '2078/10/19', NULL, NULL, '2023-06-02 04:44:10'),
(3, 'E00004', 'Mukunda Shrestha', 'mukunda@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f5', 'naxal-5, Kathmandu', NULL, '9849352128', '2051/07/21', NULL, NULL, NULL),
(4, 'E00332', 'Deepak Neupane', 'deepak.neupane@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f6', 'Panchkhal-10, Kavrepalanchowk', NULL, '9851241115', '2078/12/11', NULL, NULL, NULL),
(5, 'E00095', 'Sujan Joshi', 'sujan@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f7', 'Kathmandu-1, Kathmandu', NULL, '9851045476', '2061/06/01', NULL, NULL, NULL),
(6, 'E00084', 'Yan Singh Rai', 'yan.rai@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f8', 'Dharan-17, Sunsari', NULL, '9851009070', '2066/09/01', NULL, NULL, NULL),
(7, 'E00034', 'Shambhu Rai', 'shambhu.rai@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f9', 'Thindinkha-2, Bhojpur', NULL, '9841374982', '2071/06/01', NULL, NULL, NULL),
(8, 'E00301', 'Bharat Bahadur Thapa Chettri', 'bharat.chettry@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f10', 'Hetauda-9, Makwanpur', NULL, '9851130599', '2077/08/15', NULL, NULL, NULL),
(9, 'E00065', 'Dinesh Tamang', 'dinesh.tamang@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f11', 'Kuntadevi-4, Okhaldhunga', NULL, '9841484313', '2065/04/01', NULL, NULL, NULL),
(10, 'E00205', 'Susil Koirala', 'susil.koirala@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f12', 'Basheshwor-1, Sindhuli', NULL, '9849525003', '2074/09/28', NULL, NULL, NULL),
(11, 'E00330', 'Raushan Kumar Singh', 'raushan.singh@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f13', 'Manara Shiswa-1, Mahotari', NULL, '9841708812', '2078/08/16', NULL, NULL, NULL),
(12, 'E00038', 'Yogendra Suwal', 'yogendra.suwal@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f14', 'kathmandu-14, kathmandu', NULL, '9851241119', '2071/11/04', NULL, NULL, NULL),
(13, 'E00268', 'Saisab Dhital', 'saisab.dhital@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f15', 'Palungtar-1, Gorkha', NULL, '9863268047', '2076/03/15', NULL, NULL, NULL),
(14, 'E00087', 'Sahana Tuladhar', 'sahana.tuladhar@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f16', 'Tebahal Tole-22, Kathmandu', NULL, '9841351030', '2066/10/19', NULL, NULL, NULL),
(15, 'E00086', 'Sunina Malakar', 'sunina.malakar@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f17', 'Naya Naikap-, Kathmandu', NULL, '9803197440', '2066/05/28', NULL, NULL, NULL),
(16, 'E00012', 'Lila Timilsina', 'lila.timilsina@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f18', 'Kathmandu-7, Kathmandu', NULL, '9841223525', '2063/04/15', NULL, NULL, NULL),
(17, 'E00094', 'Arjesh Ram Nakarmi', 'arjesh.nakarmi@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f19', 'Kathmandu-18, Kathmandu', NULL, '9849005546', '2065/02/09', NULL, NULL, NULL),
(18, 'E00096', 'Shanti Thing Tamang', 'shanti.tamang@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f20', 'Chughare-7, Lalitpur', NULL, '9841553022', '2065/11/28', NULL, NULL, NULL),
(19, 'E00085', 'Samjhana Bajracharya', 'samjhana.bajracharya@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f21', 'Samakhushi-29, Kathmandu', NULL, '9841250964', '2066/05/08', NULL, NULL, NULL),
(20, 'E00317', 'Subash Rai', 'subas.rai@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f22', 'Champe-3, Bhojpur', NULL, '9803338418', '2077/11/25', NULL, NULL, NULL),
(21, 'E00232', 'Bashudev Timalsina', 'bashudev.timalsina@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f23', 'Pangretar-1, Dandadihee-1, , Sindhupalchowk', NULL, '9841464686', '2075/01/09', NULL, NULL, NULL),
(22, 'E00036', 'Lina K.S.C Rai', 'lina@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f24', 'Battisputali-9, Kathmandu', NULL, '9841696120', '2071/10/21', NULL, NULL, NULL),
(23, 'E00045', 'Sandhya Rai', 'sandhya@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f25', 'Sitalpati-6, Sankhuwasabha', NULL, '9840012681', '2072/01/02', NULL, NULL, NULL),
(24, 'E00075', 'Srijana Pun', 'srijana.pun@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f26', 'Tangram-9, Baglung', NULL, '9849933712', '2073/06/18', NULL, NULL, NULL),
(25, 'E00348', 'Milan Tiwari', 'milan.tiwari@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f27', 'Paiyu-6, Parbat', NULL, '9860732519', '2079/09/17', NULL, NULL, NULL),
(26, 'E00091', 'Laxmi Dahal', 'laxmi.dahal@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f28', 'Barunewshwor-3, Okhaldhunga', NULL, '9841612375', '2066/09/20', NULL, NULL, NULL),
(27, 'E00017', 'Sangita Shrestha', 'sangita.shrestha@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f29', 'Kathmandu-25, Kathmandu', NULL, '9841288335', '2065/04/01', NULL, NULL, NULL),
(28, 'E00299', 'Dipak Raj Dahal', 'dipak.dahal@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f30', 'Majhuwa-3, Sindhuli', NULL, '9845288133', '2077/08/15', NULL, NULL, NULL),
(29, 'E00302', 'Lochan Bhattarai', 'lochan.bhattarai@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f31', 'Panchakanya-5, Sunsari', NULL, '9849815313', '2077/09/19', NULL, NULL, NULL),
(30, 'E00119', 'Ganesh Man Bajracharya', 'admin@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f32', 'Gumdi-6, Dhading', NULL, '9841730537', '2073/06/18', NULL, NULL, NULL),
(31, 'E00331', 'Siddhartha Khawas', 'siddhartha.khawas@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f33', 'Dharampur-8, Jhapa', NULL, '9842634119', '2078/11/01', NULL, NULL, NULL),
(32, 'E00163', 'Hasana Bajracharya', 'hasana.bajracharya@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f34', 'Sakotha-11, Bhaktapur', NULL, '9843723973', '2074/07/15', NULL, NULL, NULL),
(33, 'E00165', 'Sowrnima Rai', 'sowrnima.rai@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f35', 'Phuyetappa-3, Illam', NULL, '9862222862', '2074/07/15', NULL, NULL, NULL),
(34, 'E00194', 'Jenny Rai', 'jenny.rai@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f36', 'Rajarani-5, Dhankuta', NULL, '9804340655', '2074/08/01', NULL, NULL, NULL),
(35, 'E00219', 'Bebika Khadka', 'bebika.khadka@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f37', 'Prakashpur-1, Sunsari', NULL, '9866787875', '2074/08/07', NULL, NULL, NULL),
(36, 'E00269', 'Saraswati Budha Magar', 'saraswoti.magar@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f38', 'Ghorahi-18, Dang', NULL, '9841180875', '2076/04/01', NULL, NULL, NULL),
(37, 'E00278', 'Abhishek Shrestha', 'abhishek.shrestha@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f39', 'Bhaktapur-1, Bhaktapur', NULL, '9808938576', '2076/04/12', NULL, NULL, NULL),
(38, 'E00279', 'Susma Rai', 'susma.rai@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f40', 'Dhankuta-4, Dhankuta', NULL, '9842061887', '2076/04/15', NULL, NULL, NULL),
(39, 'E00282', 'Sunita Tamang', 'sunita.tamang@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f41', 'Katari-8, Udayapur', NULL, '9843798526', '2076/04/19', NULL, NULL, NULL),
(40, 'E00285', 'Pratap Shrestha', 'pratap.shrestha@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f42', 'Bhardeu-8, Lalitpur', NULL, '9843515027', '2076/04/23', NULL, NULL, NULL),
(41, 'E00173', 'Pooja Kumari Subedi', 'pooja.subedi@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f43', 'Gaushala-6, Mahottari', NULL, '9845679222,9819880432', '2074/07/15', NULL, NULL, NULL),
(42, 'E00174', 'Rasanti Shrestha', 'rasanti.shrestha@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f44', 'Ghity-22, Lalitpur', NULL, '9843257618', '2074/07/15', NULL, NULL, NULL),
(43, 'E00189', 'Pratima Rai', 'pratima.rai@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f45', 'Bhulke-5, Bhojpur', NULL, '9823757807', '2074/08/01', NULL, NULL, NULL),
(44, 'E00188', 'Sumnima Chemjong', 'sumnima.chemjong@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f46', 'Pauwasartap-2, Panchthar', NULL, '9843935017', '2074/08/01', NULL, NULL, NULL),
(45, 'E00215', 'Amrit Kala Gurung', 'amrit.gurung@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f47', 'Inaruwa-3, Sunsari', NULL, '9801072030,986102262', '2074/09/03', NULL, NULL, NULL),
(46, 'E00308', 'Nisha Rai', 'nisha.rai@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f48', 'Shanischare-1, Morang', NULL, '9808445543', '2077/11/02', NULL, NULL, NULL),
(47, 'E00309', 'Sarita Rai', 'sarita.rai@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f49', 'Khotang-6, Khotang', NULL, '9848675133', '2077/11/02', NULL, NULL, NULL),
(48, 'E00310', 'Sandesh Rai', 'sandesh.rai@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f50', 'Phedi-1, Khotang', NULL, '9849862236', '2077/11/02', NULL, NULL, NULL),
(49, 'E00313', 'Prabesh Khadka', 'prabesh.khadka@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f51', 'Govinda Tole-1, Bara', NULL, '9860379537', '2077/11/05', NULL, NULL, NULL),
(50, 'E00314', 'Asmita Basnet', 'asmita.basnet@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f52', 'Mansebung-2, Ilam', NULL, '9808434228', '2077/11/05', NULL, NULL, NULL),
(51, 'E00015', 'Nodh Nath Gelal', 'nodh.gelal@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f53', 'Jhaukhel-3, Bhaktapur', NULL, '9841366157', '2052/08/29', NULL, NULL, NULL),
(52, 'E00019', 'Bishnu Prasad Khatiwada', 'bishnu.khatiwada@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f54', 'Kalleri-7, Dhading', NULL, '9841557549', '2053/04/05', NULL, NULL, NULL),
(53, 'E00090', 'Ram Bahadur Khadka', 'ram.khadka@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f55', 'Ladavir-8, Sindhuli', NULL, '9841404427', '2062/02/01', NULL, NULL, NULL),
(54, 'E00089', 'Sunil Thapa', 'sunil.thapa@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f56', 'Maharajgunj-3, Kathmandu', NULL, '9843755188', '2061/08/20', NULL, NULL, NULL),
(55, 'E00023', 'Krishna Kumari Poudel', 'krishan.poudel@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f57', 'Madi Mulkharka-9, Shankhuwasabha', NULL, '9842381957', '2063/10/18', NULL, NULL, NULL),
(56, 'E00079', 'Anita Tamang', 'anita.tamang@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f58', 'Kuntadevi-4, Okhaldhunga', NULL, '9813649543', '2061/06/01', NULL, NULL, NULL),
(57, 'E00162', 'Mamik Mauni', 'mamik.mauni@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f59', 'Gauriganga-7, Kailali', NULL, '9864274368', '2074/07/08', NULL, NULL, NULL),
(58, 'E00122', 'Sunil Dangol', 'sunil.dangol@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f60', 'Bajrayogini-5, Kathmandu', NULL, '9843637395', '2073/12/13', NULL, NULL, NULL),
(59, 'E00352', 'Dipen Thapa', 'dipen.thapa@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f61', 'Tathali-3, Bhaktapur', NULL, '9869724630', '2079/11/23', NULL, NULL, NULL),
(60, 'E00304', 'Pramila Limbu', 'pramila.limbu@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f62', 'Menchhyayem-5, Terathum', NULL, '9841601499', '2077/10/01', NULL, NULL, NULL),
(61, 'E00059', 'Nilam Rai', 'nilam.rai@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f63', 'Jeetpur-1, Ilam', NULL, '9851113703', '2061/06/01', NULL, NULL, NULL),
(62, 'E00306', 'Rajeshor Joshi', 'rameshwor.joshi@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f64', 'sakhu-4, Kathmandu', NULL, '9841671103', '2077/10/14', NULL, NULL, NULL),
(63, 'E00073', 'Esha Lamsal', 'esha.lamsal@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f65', 'Lalitpur-7, Lalitpur', NULL, '9841807763', '2065/08/23', NULL, NULL, NULL),
(64, 'E00240', 'Kiran Devi Rai', 'kiran.rai@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f66', 'Likhuwapokhari-9, Khotang', NULL, '9862123891', '2075/09/01', NULL, NULL, NULL),
(65, 'E00175', 'Subash Basnet', 'subash.basnet@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f67', 'Ghaderi, Ghyang-3, Dolakha', NULL, '9843690674', '2074/08/01', NULL, NULL, NULL),
(66, 'E00145', 'Shushila Rai', 'boudha@gurkhasinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f68', 'Dalgaun-4, Bhojpur', NULL, '9843930289', '2074/01/11', NULL, NULL, NULL),
(67, 'E00263', 'Rajin Rai', 'rajin.rai@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f69', 'Olane-9, Panchthar', NULL, '9842650510', '2076/03/01', NULL, NULL, NULL),
(68, 'E00191', 'Prem Dewan', 'prem.dewan@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f70', 'Banjho-2, Ilam', NULL, '9807929233', '2074/08/12', NULL, NULL, NULL),
(69, 'E00222', 'Asmita Rai', 'ashmita.rai@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f71', 'Lakhanpur-1, Jhapa', NULL, '9817924834', '2074/11/22', NULL, NULL, NULL),
(70, 'E00337', 'Anita Ale Magar', 'anita.magar@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f72', 'Mahamai-3, Ilam', NULL, '9860497429', '2079/03/27', NULL, NULL, NULL),
(71, 'E00295', 'Kushal Adhikari', 'damak@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f73', 'Damak-7, Jhapa ', NULL, '9801451125', '2076/11/18', NULL, NULL, NULL),
(72, 'E00114', 'Jeevan Kumar Rai', 'jeevan.rai@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f74', 'Belhara-1, Dhankuta', NULL, '9842168260', '2073/06/18', NULL, NULL, NULL),
(73, 'E00046', 'Bishnu Maya Kandangwa', 'bishnu.kandangwa@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f75', 'Chatedhunga-1, Terhathum', NULL, '9813339553', '2072/02/14', NULL, NULL, NULL),
(74, 'E00103', 'Saru Ninglekhu', 'saru.nigleku@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f76', 'Mudebas-4, Dhankuta', NULL, '9824339835', '2073/06/18', NULL, NULL, NULL),
(75, 'E00147', 'Tika Maya Pradhan', 'tika.pradhan@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f77', 'Hangpang-9, Taplejung', NULL, '9815010700', '2074/08/01', NULL, NULL, NULL),
(76, 'E00280', 'Bharat Kumar Luitel', 'bharat.luitel@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f78', 'Bhadrapur-4, Jhapa', NULL, '9807906416', '2076/04/15', NULL, NULL, NULL),
(77, 'E00148', 'Binda Rai', 'dharan@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f79', 'Khoku-2, Dhankuta', NULL, '9807026860', '2073/05/12', NULL, NULL, NULL),
(78, 'E00355', 'Naresh Lal Joshi', 'nareshlaljoshi@gmail.com', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f80', 'Samakhushi-29, Kathmandu', NULL, NULL, '', NULL, NULL, NULL),
(79, 'E00120', 'Bhusan Shakya', 'bhusan.shakya@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f81', 'Barabishe-8, Dolakha', NULL, '9841316591', '2073/07/18', NULL, NULL, NULL),
(80, 'E00088', 'Rama Lama', 'rama.lama@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f82', 'Bhumlutar-3, Kavre', NULL, '9841724371', '2066/05/01', NULL, NULL, NULL),
(81, 'E00217', 'Sirjana Basyal', 'sirjana.basyal@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f83', 'Jagatradevi-8, Syanja', NULL, '9843819360', '2074/10/02', NULL, NULL, NULL),
(82, 'E00251', 'Amrit Rai', 'amrit.rai@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f84', 'Deurali-6, Bhojpur', NULL, '9842343971', '2075/05/05', NULL, NULL, NULL),
(83, 'E00272', 'Yashoda Rai', 'yashoda.rai@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f85', 'Ratancha-3, khotang', NULL, '9823329890', '2076/04/01', NULL, NULL, NULL),
(84, 'E00083', 'Sumitra Chaudhary', 'newroad@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f86', 'Dulari-1, Morang', NULL, '9844600592', '2066/11/02', NULL, NULL, NULL),
(85, 'E00248', 'Dhiraj Kumar Gurung', 'dhiraj.gurung@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f87', 'Bharatpur-9, Chitwan', NULL, '9845050230', '2075/05/17', NULL, NULL, NULL),
(86, 'E00182', 'Asha Ram Sah', 'asharam.sah@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f88', 'Bhawanipur-8, Siraha', NULL, '9813307224', '2074/08/01', NULL, NULL, NULL),
(87, 'E00146', 'Phiroj Sene', 'phiroj.sene@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f89', 'Solma-5, Terhathum', NULL, '9842077852', '2074/07/15', NULL, NULL, NULL),
(88, 'E00141', 'Rajita Rai', 'rajita.rai@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f90', 'Itahari-4, Sunsari', NULL, '9841116979', '2074/07/15', NULL, NULL, NULL),
(89, 'E00242', 'Prashiksha Rai', 'prashiksha.rai@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f91', 'Ramprashad-8, Bhojpur', NULL, '9814359368', '2075/09/01', NULL, NULL, NULL),
(90, 'E00062', 'Rohita Ingnam', 'rohita.ingnam@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f92', 'Aathrai-4, Terhathum', NULL, '9843009497', '2061/06/01', NULL, NULL, NULL),
(91, 'E00170', 'Gayatri Sapkota', 'gayatri.sapkota@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f93', 'Bhattedanda-1, Lalitpur', NULL, '9845778459', '2074/08/01', NULL, NULL, NULL),
(92, 'E00080', 'Nomita Thapa', 'nomita.thapa@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f94', 'Dhulabari-1, Jhapa', NULL, '9844611856', '2066/09/01', NULL, NULL, NULL),
(93, 'E00290', 'Bikky Yakso Limbu', 'bikky.yakso@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f95', 'Biratnagar-16, Morang', NULL, '9824010122', '2076/05/10', NULL, NULL, NULL),
(94, 'E00049', 'Sandhya Upreti', 'sandhya.upreti@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f96', 'Surunga-9, Jhapa', NULL, '9815066056', '2074/08/01', NULL, NULL, NULL),
(95, 'E00104', 'Ranjana Niraula', 'ranjana.niraula@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f97', 'Birtamod-6, Jhapa', NULL, '9746876083', '2074/08/01', NULL, NULL, NULL),
(96, 'E00351', 'Joti Lingden', 'birtamode@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f98', 'Dharan-16, Sunsari, Dharan', NULL, '9819374044', '2079/10/09', NULL, NULL, NULL),
(97, 'E00081', 'Sushila Lama', 'birtamod@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f99', 'Lalpur-6, Siraha', NULL, '9849463196', '2065/10/07', NULL, NULL, NULL),
(98, 'E00177', 'Renu Thapa Pulami Magar', 'Satdobato@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f100', 'Ishworpur-1, Sarlahi', NULL, '9824857437', '2073/07/03', NULL, NULL, NULL),
(99, 'E00160', 'Mitra Rai', 'itahari@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f101', 'Basihkhora-2, Bhojpur', NULL, '9818219555,9819339840', '2074/04/01', NULL, NULL, NULL),
(100, 'E00064', 'Sunita Rai', 'sunita.rai@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f102', 'Dharan-18, Sunsari', NULL, '9804086667', '2065/10/02', NULL, NULL, NULL),
(101, 'E00193', 'Kamal Amatya', 'kamal.amatya@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f103', 'Siddhathanagar,Maltole-13, Rupandehi', NULL, '9841276112', '2074/09/02', NULL, NULL, NULL),
(102, 'E00169', 'Nisha Deshar', 'nisha.deshar@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f104', 'Chapagaun-3, Lalitpur', NULL, '9851095559', '2074/08/01', NULL, NULL, NULL),
(103, 'E00270', 'Pradip Sunuwar', 'pradip.sunuwar@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f105', 'Kamalamai-4, sindhuili', NULL, '9860030311', '2076/04/01', NULL, NULL, NULL),
(104, 'E00307', 'Jibraj Rai', 'jibraj.rai@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f106', 'Baikunthe-5, Bhojpur', NULL, '9862567809', '2077/11/02', NULL, NULL, NULL),
(105, 'E00318', 'Srijal Thapa Magar', 'srijal.magar@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f107', 'Jamune Tole-4, Okhaldhunga', NULL, '9841223948', '2078/07/02', NULL, NULL, NULL),
(106, 'E00055', 'Ratna Bahadur Thapa', 'ratna.thapa@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f108', 'Prithivinarayan-2, Gorkha', NULL, '9841762903', '2065/07/25', NULL, NULL, NULL),
(107, 'E00293', 'Binita Tamang', 'binita.tamang@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f109', 'Bharatpur-10, Chitawan', NULL, '9811157518', '2076/09/14', NULL, NULL, NULL),
(108, 'E00133', 'Satya Devi Ojha', 'narayanghat@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f110', 'Purkot-10, Tanahu', NULL, '9861564036', '2074/04/01', NULL, NULL, NULL),
(109, 'E00011', 'Pramila Chaulagain', 'pramila.chaulagain@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f111', 'Kattike Deurali-7, Kavre', NULL, '9841822091', '2062/04/20', NULL, NULL, NULL),
(110, 'E00171', 'Raghu Nath Raut', 'raghu.raut@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f112', 'Sirutar-1, Bhaktapur', NULL, '9841509372', '2074/07/15', NULL, NULL, NULL),
(111, 'E00093', 'Punya Prabha Bimali', 'punya.bimali@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f113', 'Govindpur-5, Morang', NULL, '9841735926', '2064/12/01', NULL, NULL, NULL),
(112, 'E00102', 'Sujata Rai', 'sujata.rai@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f114', 'Phuyetappa-3, Ilam', NULL, '9849172369', '2073/06/18', NULL, NULL, NULL),
(113, 'E00176', 'Bijaya Lama', 'bijaya.lama@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f115', 'Khayarmar-3, Mahottari', NULL, '9869540057', '2074/07/15', NULL, NULL, NULL),
(114, 'E00077', 'Roshan Sulu', 'roshan.sulu@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f116', 'Chauchhe-9, Bhaktapur', NULL, '9841585372', '2065/11/15', NULL, NULL, NULL),
(115, 'E00154', 'Maiya Kesari Prajapati', 'bhaktapur@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f117', 'Bhaktapur-1, Bhaktapur', NULL, '9813746125', '2073/04/01', NULL, NULL, NULL),
(116, 'E00166', 'Nagendra Lawati', 'nagendra.lawati@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f118', 'Kurumba-1, Panchathar', NULL, '9807945598', '2074/08/01', NULL, NULL, NULL),
(117, 'E00153', 'Dinesh Rai', 'dinesh.rai@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f119', 'Chulachuli-7, Ilam', NULL, '9844680109', '2074/08/01', NULL, NULL, NULL),
(118, 'E00243', 'Junita Rai', 'junita.rai@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f120', 'Rabi-2, Pachathar', NULL, '9807926538,9863780781', '2075/11/01', NULL, NULL, NULL),
(119, 'E00132', 'Bikram Thebe', 'rabi@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f121', 'jamuna-4, Panchathar', NULL, '98150732077', '2074/01/14', NULL, NULL, NULL),
(120, 'E00067', 'Shova Bajracharya', 'shova.bajracharya@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f122', 'Kirtipur-11, Kathmandu', NULL, '9843055933', '2065/11/01', NULL, NULL, NULL),
(121, 'E00315', 'Dewak Shrestha', 'dewak.shrestha@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f123', 'Janagal-10, Kavrepalanchowck', NULL, '9851128004', '2077/11/05', NULL, NULL, NULL),
(122, 'E00164', 'Sunita Shrestha', 'sunita.shrestha@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f124', 'Uggrachandi-, Kavrapalanchowk', NULL, '9849318933', '2074/08/01', NULL, NULL, NULL),
(123, 'E00129', 'Arjun Prasad Khatiwada', 'janagal@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f125', 'Kalleri-7, DHADING', NULL, '9810262666', '2074/05/12', NULL, NULL, NULL),
(124, 'E00063', 'Shanti Chand (Singh)', 'shanti.singh@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f126', 'Basauti-5, Kailali', NULL, '9841845702', '2065/10/23', NULL, NULL, NULL),
(125, 'E00138', 'Ram Bahadur Singh', 'ram.singh@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f127', 'Campusroad-8, Kailali', NULL, '9868561031', '2074/05/11', NULL, NULL, NULL),
(126, 'E00137', 'Muna Paudel', 'muna.paudel@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f128', 'Chaumala-7, Kailali', NULL, '9848558747', '2074/08/01', NULL, NULL, NULL),
(127, 'E00124', 'Hansa Raj Dhungana', 'hansa.dhungana@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f129', 'Chaumala-1, Kailali', NULL, '9824630526', '2074/11/01', NULL, NULL, NULL),
(128, 'E00297', 'Nabin Shah', 'nabin.shah@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f130', 'Dipayal Sligadhi-7, Doti', NULL, '9860511220', '2078/08/20', NULL, NULL, NULL),
(129, 'E00125', 'Kailash Rana', 'chaumala@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f131', 'Chaumala-2, Kailali', NULL, '9811638779', '2074/01/19', NULL, NULL, NULL),
(130, 'E00101', 'Ram Bahadur Rawal', 'ram.rawal@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f132', 'Kalika-1, Achaam', NULL, '9841218980', '2064/04/06', NULL, NULL, NULL),
(131, 'E00276', 'Topendra Oli', 'topendra.oli@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f133', 'Bijahuri-9, Dang', NULL, '9868997287', '2076/04/02', NULL, NULL, NULL),
(132, 'E00167', 'Gita Sharma', 'gita.sharma@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f134', 'Daruwa-6, Dang', NULL, '9847879043', '2074/02/21', NULL, NULL, NULL),
(133, 'E00223', 'Yagya Raj O.C.', 'yagya.oc@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f135', 'Ghorahi-10, Rolpa', NULL, '9844955724', '2074/07/15', NULL, NULL, NULL),
(134, 'E00324', 'Sonuja Rawat', 'sonuja.rawat@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f136', 'Tulsipur-13, Dang', NULL, '9867969578', '2078/06/15', NULL, NULL, NULL),
(135, 'E00140', 'Shila Chaudhary', 'bijauri@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f137', 'Manpur-1, Dang', NULL, '9844945937', '2074/02/21', NULL, NULL, NULL),
(136, 'E00346', 'Manish Acharya', 'manish.acharya@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f138', 'Taulihawa-1, Kapilvastu', NULL, '9857051716,9814463919', '2079/07/14', NULL, NULL, NULL),
(137, 'E00303', 'Prakash Bhattarai', 'prakash.bhattarai@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f139', 'Tilottama-9, Rupandehi', NULL, '9867209121', '2077/09/19', NULL, NULL, NULL),
(138, 'E00139', 'Krishna Prasad Upadhyaya', 'krishna.upadhyaya@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f140', 'Annapurna Tole-8, Rupandehi', NULL, '9841924091', '2074/03/18', NULL, NULL, NULL),
(139, 'E00156', 'Dhan Kumari Pun', 'dhan.pun@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f141', 'Chiliya-6, Rupandehi', NULL, '9849389966', '2074/08/01', NULL, NULL, NULL),
(140, 'E00311', 'Sachin Dahal', 'sachin.dahal@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f142', 'Bhairahawa-1, Rupandehi', NULL, '9846898947', '2077/11/02', NULL, NULL, NULL),
(141, 'E00334', 'Bishnu Maya Chauhan', 'lakhanchowk@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f143', 'Jhadewa-8, palpa', NULL, '9819490101', '2079/01/02', NULL, NULL, NULL),
(142, 'E00037', 'Suman Subba', 'suman@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f144', 'Mahendranagar-4, Sunsari', NULL, '9842035294', '2071/10/19', NULL, NULL, NULL),
(143, 'E00043', 'Rajendra Subba', 'rajendra.subba@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f145', 'Maunabudhuk-6, Dhankuta', NULL, '9816332609', '2072/02/13', NULL, NULL, NULL),
(144, 'E00245', 'Nanda Kumari Magar', 'nanda.magar@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f146', 'Bhedetar-7, Dhunkuta', NULL, '9804099307', '2075/10/01', NULL, NULL, NULL),
(145, 'E00326', 'Nabin Limbu', 'nabin.limbu@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f147', 'Myanglung-1, Terathum', NULL, '9842179207', '2078/08/01', NULL, NULL, NULL),
(146, 'E00196', 'Pusparaj Rai', 'bhedetar@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f148', 'Bhedetar-5, Dhankuta', NULL, '9815345396', '2074/04/29', NULL, NULL, NULL),
(147, 'E00210', 'Uma Raj Gurung', 'uma.gurung@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f149', 'Hansapur-9, Gorkha', NULL, '9803049826', '2074/11/02', NULL, NULL, NULL),
(148, 'E00184', 'Saroj Kumar Sah', 'saroj.sha@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f150', 'Pipra West-2, Saptari', NULL, '9815741333', '2074/07/22', NULL, NULL, NULL),
(149, 'E00224', 'Pinkal Sah', 'pinkal.sah@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f151', 'Dhangadimai-1, Siraha', NULL, '9826700043', '2074/09/01', NULL, NULL, NULL),
(150, 'E00329', 'Roshan Thakuri', 'roshan.thakuri@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f152', 'Bardibas-14, Mahotari', NULL, '9819829259', '2079/08/18', NULL, NULL, NULL),
(151, 'E00076', 'Brij Lal Sada', 'chapradi@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f153', 'Aurahi-5, Mahottari', NULL, '9841674993', '2061/10/21', NULL, NULL, NULL),
(152, 'E00066', 'Harati Mathema', 'harati.mathema@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f154', 'Kathmandu-23, Kathmandu', NULL, '9841814785', '2064/12/01', NULL, NULL, NULL),
(153, 'E00144', 'Sujata Manandhar', 'sujata.manandhar@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f155', 'Pukchowk-5, Butwal', NULL, '9846120369', '2074/05/19', NULL, NULL, NULL),
(154, 'E00150', 'Priya Gurung', 'priya.gurung@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f156', 'Pokhara-17, Kaski', NULL, '9816112773', '2074/07/15', NULL, NULL, NULL),
(155, 'E00151', 'Anju Pun', 'anju.pun@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f157', 'Banau-9, Parbat', NULL, '9819165787', '2074/08/01', NULL, NULL, NULL),
(156, 'E00353', 'Sagar Moktan', 'pokhara@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f158', 'makwanpur-6, Makawanpur', NULL, '9814161126', '2079/12/19', NULL, NULL, NULL),
(157, 'E00253', 'Suraj Rai', 'suraj.rai@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f159', 'Beltar-1, Udayapur', NULL, '9813812307', '2076/04/01', NULL, NULL, NULL),
(158, 'E00142', 'Salina Rai', 'salina.rai@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f160', 'Prakashpur-8, Sunsari', NULL, '9805312106', '2074/08/01', NULL, NULL, NULL),
(159, 'E00350', 'Iwan Rai', 'iwan.rai@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f161', 'Temkemaiyung-6, Bhojpur', NULL, '9862046442', '2079/09/01', NULL, NULL, NULL),
(160, 'E00305', 'Koushila Rai', 'koushila.rai@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f162', 'Khawa-9, Bhojpur', NULL, '9810415978', '2077/10/01', NULL, NULL, NULL),
(161, 'E00185', 'Tap Bahadur Khadka', 'tap.khadka@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f163', 'Narayan-7, Dailekh', NULL, '9849123159', '2074/08/06', NULL, NULL, NULL),
(162, 'E00168', 'Sarita Sinjali Magar', 'sarita.magar@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f164', 'Birendranagar-6, Surkhet', NULL, '9868098410', '2074/09/01', NULL, NULL, NULL),
(163, 'E00249', 'Junu Budhathoki', 'junu.budhathoki@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f165', 'Birendranagar-5, Surkhet', NULL, '9848108877', '2075/04/15', NULL, NULL, NULL),
(164, 'E00198', 'Upendra Simkhada', 'upendra.simkhada@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f166', 'Mugra-1, Kalikot', NULL, '9866945629', '2074/08/14', NULL, NULL, NULL),
(165, 'E00349', 'Kamala Chaudhary', 'surkhet@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f167', 'Birendranagar-20, Surkhet', NULL, '9814549918', '2079/09/21', NULL, NULL, NULL),
(166, 'E00247', 'Gyanendra Iwahang', 'gyanendra.iwahang@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f168', 'Budhimorang-2, Dhankuta', NULL, '9842114987', '2075/05/10', NULL, NULL, NULL),
(167, 'E00340', 'Samyang Rai', 'samyang.rai@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f169', 'Budhanilkantha-4, Kathmandu', NULL, '9810350760', '2079/05/16', NULL, NULL, NULL),
(168, 'E00274', 'Sneha Singh', 'sneha.singh@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f170', 'Nepalgunj-5, Banke', NULL, '9813615418', '2076/04/02', NULL, NULL, NULL),
(169, 'E00286', 'Madan Yadav', 'madan.yadav@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f171', 'Kohalpur-15, Banke', NULL, '9812532768', '2076/04/20', NULL, NULL, NULL),
(170, 'E00178', 'Rabindra Basnet', 'rabindra.basnet@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f172', 'Annapurna,Annapurna-9, Bhojpur', NULL, '9825389568', '2074/07/08', NULL, NULL, NULL),
(171, 'E00209', 'Love Raj Shrestha', 'love.shrestha@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f173', 'Nepalgunj-8, Banke', NULL, '9848030212', '2074/12/01', NULL, NULL, NULL),
(172, 'E00229', 'Bimal Khatri', 'nepalgunj@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f174', 'Binauna-9, Banke', NULL, '9848030212', '2074/11/13', NULL, NULL, NULL),
(173, 'E00338', 'Pramod Kumar Jha', 'pramod.jha@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f175', 'Salempur-6, Sarlahi', NULL, '9844264696', '2079/05/05', NULL, NULL, NULL),
(174, 'E00187', 'Ujjwal Dangol', 'ujjwal.dangol@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f176', 'Birgunj-6, Parsa', NULL, '9807265591', '2074/08/01', NULL, NULL, NULL),
(175, 'E00226', 'Anand Raj Kumar Pal', 'ananda.pal@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f177', 'Banjariya-3, Bara', NULL, '9809218767', '2074/09/18', NULL, NULL, NULL),
(176, 'E00344', 'Rubi Kumari Sah', 'rubi.sah@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f178', 'Basatpur-2, Bara', NULL, '9804248448', '2079/06/25', NULL, NULL, NULL),
(177, 'E00354', 'Sita Kumari Mahato', 'birgunj@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f179', 'Govindapur-8, Lahan', NULL, '9802954064', '2080/01/03', NULL, NULL, NULL),
(178, 'E00100', 'Biswash Khadka', 'biswash.khadka@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f180', 'Jorpati-3, Kathmandu', NULL, '9851041830', '2061/08/21', NULL, NULL, NULL),
(179, 'E00052', 'Khil Maya Ghising', 'khilmaya.ghising@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f181', 'Gelu-7, Ramechhap', NULL, '9861828655', '2074/07/15', NULL, NULL, NULL),
(180, 'E00234', 'Radhika Basnet', 'radhika.basnet@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f182', 'ANARMANI-4, Jhapa', NULL, '9804015280', '2075/04/08', NULL, NULL, NULL),
(181, 'E00292', 'Dipesh Rai', 'dipesh.rai@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f183', 'Budanilkantha-11, Kathmandu', NULL, '9818192432', '2076/08/10', NULL, NULL, NULL),
(182, 'E00265', 'Dik Laxmi Rai', 'gongabu@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f184', 'Khawa-9, Bhojpur', NULL, '9863807056', '2076/02/19', NULL, NULL, NULL),
(183, 'E00099', 'Jiban Kaji Karki', 'jiban.karki@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f185', 'Rampur-1, Okhaldhung', NULL, '9849322391', '2066/02/25', NULL, NULL, NULL),
(184, 'E00199', 'Bijay Kumar Rai', 'bijaya.rai@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f186', 'Buipa-9, Khotang', NULL, '9808873762', '2074/09/09', NULL, NULL, NULL),
(185, 'E00048', 'Renuka Magar', 'renuka.magar@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f187', 'Sundar Haraincha-10, morang', NULL, '9862063479', '2066/07/24', NULL, NULL, NULL),
(186, 'E00078', 'Bishnu Bahadur Baruwal', 'bishnu.brauwal@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f188', 'Khimti-5, Ramechhap', NULL, '9860028623', '2066/08/16', NULL, NULL, NULL),
(187, 'E00321', 'Niju Shrestha', 'niju.shrestha@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f189', 'Beltar-2, Udayapur', NULL, '9842955888', '2078/11/01', NULL, NULL, NULL),
(188, 'E00322', 'Kesharman Tamang', 'beltar@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f190', 'Beltar-9, Udayapur', NULL, '9808248499', '2078/05/01', NULL, NULL, NULL),
(189, 'E00342', 'Rajan Shilpakar', 'rajan.shilpakar@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f191', 'Hetauda-10, Makawanpur', NULL, '9845104734', '2079/05/26', NULL, NULL, NULL),
(190, 'E00068', 'Suraj Shrestha', 'suraj.shrestha@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f192', 'Taulachhen-1, Bhaktapur', NULL, '9841884912', '2066/06/26', NULL, NULL, NULL),
(191, 'E00291', 'Shristi Tamang', 'shristi.tamang@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f193', 'Pigauri-9, Ramechhap', NULL, '9869691552', '2076/08/10', NULL, NULL, NULL),
(192, 'E00312', 'Sarmila Muktan', 'sarmila.muktan@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f194', 'Padampokhari-12, Makawanpur', NULL, '9865025148', '2077/11/02', NULL, NULL, NULL),
(193, 'E00328', 'Smritee Muktan', 'smritee.muktan@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f195', 'Kailash-4, Makwanpur', NULL, '9807197118', '2079/08/04', NULL, NULL, NULL),
(194, 'E00341', 'Dilip Kumar Mandal', 'dilip.mandal@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f196', 'Haripur-9, Sarlahi', NULL, '9844107612', '2079/05/24', NULL, NULL, NULL),
(195, 'E00213', 'Sameer Kamat', 'sameer.kamat@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f197', 'Pokharvinda-3, Siraha', NULL, '9808835018', '2074/10/07', NULL, NULL, NULL),
(196, 'E00252', 'Nishu Kumari Gupta', 'nishu.gupta@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f198', 'Madar-6, Siraha', NULL, '9816776172,9745562903', '2075/05/17', NULL, NULL, NULL),
(197, 'E00323', 'Soniya Rai', 'soniya.rai@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f199', 'Saniarjun-4, Jhapa', NULL, '9860093881', '2078/05/20', NULL, NULL, NULL),
(198, 'E00020', 'Buddhi Lal Bhuju', 'buddhi.bhuju@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f200', 'Katunje-4, Bhaktapur', NULL, '9841907261', '2054/04/07', NULL, NULL, NULL),
(199, 'E00053', 'Prasanna Subba Pomo', 'prasanna.subba@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f201', 'Urlabari-4, Morang', NULL, '9849715358', '2074/08/01', NULL, NULL, NULL),
(200, 'E00060', 'Sangita Subedi', 'sangita.subedi@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f202', 'Kirtipur-19, Kathmandu', NULL, '9843140213', '2065/11/09', NULL, NULL, NULL),
(201, 'E00241', 'Pramila Gurung', 'pramila.gurung@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f203', 'Shreenathkot-4, Gorkha', NULL, '9819134278', '2075/11/01', NULL, NULL, NULL),
(202, 'E00320', 'Renuka Rai', 'koteshwor@gurkhasfinance.com.np', NULL, '$2y$10$tyfFaMCoCyJGO/l1ylqrkOmm6KzXYr6hWEjt41GeVeJsAeN17ocdy', 0, 0, '#2180f204', 'Nirmali Danda-8, Khotang', NULL, '9818733090', '2078/05/01', NULL, NULL, NULL),
(203, 'E00001', 'Dekendra Kumar Rai', 'dekindra.rai@gfinance.com', NULL, '$2y$10$2EsStgJHQCeoDNJXfNDnX.D5Zcm17A8iLlu71xRiqeFe7w1wRRvxS', 0, 0, NULL, 'None', 'None', 'None', 'सोम, असोज १८, २०७८', NULL, '2023-05-30 08:33:22', '2023-05-30 08:33:22'),
(204, 'E00002', 'Karna Bahadur Rai', 'karna.rai@gfinance.com', NULL, '$2y$10$RvzyXaGuzwc4.rfDfSl6guyZkvzqQJjrytmuNSV.cX5WT1OxOL9QW', 0, 0, NULL, 'None', 'None', 'None', 'सोम, असोज १८, २०७८', NULL, '2023-05-30 08:35:46', '2023-05-30 08:36:17'),
(205, 'E00003', 'Kalpana Khapung', 'kalpana.khapung@gfinance.com', NULL, '$2y$10$KUXkZrXAI9F1xoKG6VjJgumi1b3a8i3GVTbISejxz72BU5GCuy8Pq', 0, 0, NULL, 'None', 'None', 'None', 'मंगल, माघ १८, २०७८', NULL, '2023-05-30 08:39:27', '2023-05-30 08:39:27'),
(206, 'E00005', 'Gaurab Budathoki', 'gaurab.budathoki@gfinance.com', NULL, '$2y$10$lAEuxFHHQK6u5VkxSsZ97uuc9Od9F0gqiC0VLPjAlbsKxp/JPFh.6', 0, 0, NULL, 'None', 'None', 'None', 'शुक्र, असार १८, २०७८', NULL, '2023-05-30 08:46:57', '2023-05-30 08:46:57'),
(207, 'E00006', 'Narendra Kumar Agrawal', 'narendra.agrawal@gfinance.com', NULL, '$2y$10$OFZiOMuZdijPci8T.AZDI.bo320tkGecZeQaAiivmzv7TUcJBzelm', 0, 0, NULL, 'None', 'None', 'None', 'शुक्र, असार १८, २०७८', NULL, '2023-05-30 08:51:01', '2023-05-30 08:51:01'),
(208, 'E00007', 'Neelam Bohora', 'neelam.bohara@gfinance.com', NULL, '$2y$10$T3fAq5jx3RCbkZzrTpCp.e2QQLyWGoCIhN/2y2dro6PMFhDB2GIsW', 0, 0, NULL, 'None', 'None', 'None', 'मंगल, माघ १८, २०७८', NULL, '2023-05-30 09:03:36', '2023-05-30 09:03:36'),
(209, 'E00008', 'Sagar Kumar Sharma', 'sagar.sharma@gfinance.com', NULL, '$2y$10$EnftvDctsPYTTNrs0V5jy.EPhxjOq8TV27WVVskXP.82j.vTheKb2', 0, 0, NULL, 'None', 'None', 'None', 'बुध, माघ १९, २०७८', NULL, '2023-05-30 09:05:45', '2023-05-30 09:05:45');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_category_id` bigint UNSIGNED NOT NULL,
  `vendor_type_id` bigint UNSIGNED NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_details` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_start_date` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_expiry_date` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `vendor_category_id`, `vendor_type_id`, `address`, `contact_person`, `contact_details`, `contract_start_date`, `contract_expiry_date`, `created_at`, `updated_at`) VALUES
(2, 'vendor18', 2, 1, 'balwater', 'karma', '98478956987', 'सोम, जेठ ८, २०८०', 'सोम, जेठ ८, २०८०', '2023-05-10 08:34:28', '2023-05-10 08:34:28'),
(3, 'Sam Electronics', 2, 2, 'Kathmandu,Jhamsikel', 'Sam Chaudhary', '9810245775', 'मंगल, जेठ ९, २०८०', 'बिही, असार २१, २०८०', '2023-05-22 06:15:29', '2023-05-22 06:15:29'),
(4, 'Sandeep Karki', 11, 2, 'imadol', 'sandeep', '986772722', 'सोम, जेठ १, २०८०', 'बुध, पौष १५, २०८३', '2023-05-30 09:54:59', '2023-05-30 09:55:34');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_categories`
--

CREATE TABLE `vendor_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_categories`
--

INSERT INTO `vendor_categories` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Laptops', '2023-04-21 02:30:22', '2023-04-21 02:30:22'),
(2, 'Hardwares', '2023-05-10 08:27:33', '2023-05-10 08:27:33'),
(4, 'IT', '2023-05-10 08:38:38', '2023-05-10 08:38:38'),
(11, 'test', '2023-05-22 09:29:49', '2023-05-22 09:29:49');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_types`
--

CREATE TABLE `vendor_types` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_types`
--

INSERT INTO `vendor_types` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', '2023-04-21 02:28:04', '2023-04-21 02:28:04'),
(2, 'IT', '2023-05-10 08:38:29', '2023-05-10 08:38:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boards`
--
ALTER TABLE `boards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charges_charge_type`
--
ALTER TABLE `charges_charge_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charge_types`
--
ALTER TABLE `charge_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committees`
--
ALTER TABLE `committees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committee_levels`
--
ALTER TABLE `committee_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deprive_sectors`
--
ALTER TABLE `deprive_sectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_types`
--
ALTER TABLE `document_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fiscal_years`
--
ALTER TABLE `fiscal_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fixed_deposits`
--
ALTER TABLE `fixed_deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fixed_interests`
--
ALTER TABLE `fixed_interests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurances`
--
ALTER TABLE `insurances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interest_heads`
--
ALTER TABLE `interest_heads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_deposits`
--
ALTER TABLE `loan_deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice_types`
--
ALTER TABLE `notice_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outstations`
--
ALTER TABLE `outstations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saving_deposits`
--
ALTER TABLE `saving_deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standard_terrifs`
--
ALTER TABLE `standard_terrifs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standard_terrif_heads`
--
ALTER TABLE `standard_terrif_heads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_committee_levels`
--
ALTER TABLE `sub_committee_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_document_types`
--
ALTER TABLE `sub_document_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_categories`
--
ALTER TABLE `vendor_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_types`
--
ALTER TABLE `vendor_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boards`
--
ALTER TABLE `boards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `charges`
--
ALTER TABLE `charges`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `charges_charge_type`
--
ALTER TABLE `charges_charge_type`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `charge_types`
--
ALTER TABLE `charge_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `committees`
--
ALTER TABLE `committees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `committee_levels`
--
ALTER TABLE `committee_levels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deprive_sectors`
--
ALTER TABLE `deprive_sectors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `document_types`
--
ALTER TABLE `document_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_details`
--
ALTER TABLE `employee_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fiscal_years`
--
ALTER TABLE `fiscal_years`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fixed_deposits`
--
ALTER TABLE `fixed_deposits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fixed_interests`
--
ALTER TABLE `fixed_interests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `insurances`
--
ALTER TABLE `insurances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `interest_heads`
--
ALTER TABLE `interest_heads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_deposits`
--
ALTER TABLE `loan_deposits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `medias`
--
ALTER TABLE `medias`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notice_types`
--
ALTER TABLE `notice_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `outstations`
--
ALTER TABLE `outstations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `policy`
--
ALTER TABLE `policy`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `saving_deposits`
--
ALTER TABLE `saving_deposits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `standard_terrifs`
--
ALTER TABLE `standard_terrifs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `standard_terrif_heads`
--
ALTER TABLE `standard_terrif_heads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_committee_levels`
--
ALTER TABLE `sub_committee_levels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_document_types`
--
ALTER TABLE `sub_document_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor_categories`
--
ALTER TABLE `vendor_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor_types`
--
ALTER TABLE `vendor_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
