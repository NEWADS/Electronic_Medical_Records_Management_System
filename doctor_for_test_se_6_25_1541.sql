-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-06-25 07:41:39
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor_for_test_se`
--

-- --------------------------------------------------------

--
-- 表的结构 `doctor_a`
--

CREATE TABLE `doctor_a` (
  `Doctor_ID` int(16) NOT NULL COMMENT '医生ID',
  `Doctor_Name` text NOT NULL COMMENT '医生姓名',
  `Doctor_Key` varchar(16) NOT NULL COMMENT '医生密码'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `doctor_a`
--

INSERT INTO `doctor_a` (`Doctor_ID`, `Doctor_Name`, `Doctor_Key`) VALUES
(334, '久保带人', 'coat'),
(810, '远野后辈', 'acceed');

-- --------------------------------------------------------

--
-- 表的结构 `patient_test`
--

CREATE TABLE `patient_test` (
  `Patient_Name` text NOT NULL COMMENT '病人姓名',
  `Patient_Age` int(16) NOT NULL DEFAULT '24' COMMENT '病人年龄',
  `Patient_Height` int(16) NOT NULL DEFAULT '170' COMMENT '病人身高（cm）',
  `Patient_Weight` int(16) NOT NULL DEFAULT '74' COMMENT '病人体重（KG）',
  `Patient_Male` char(4) NOT NULL DEFAULT 'M' COMMENT '病人性别',
  `User_Name` varchar(48) NOT NULL COMMENT '病人账号名',
  `Patient_Key` varchar(16) DEFAULT NULL COMMENT '病人密码',
  `Sign_in_time` date NOT NULL DEFAULT '1919-08-10' COMMENT '病历录入时间',
  `Disease_Name` varchar(128) NOT NULL DEFAULT 'HOMO' COMMENT '所得疾病',
  `Discribe` text COMMENT '症状描述',
  `Solution` text COMMENT '解决方案',
  `Doctor_ID` int(11) NOT NULL COMMENT '管理医生ID'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `patient_test`
--

INSERT INTO `patient_test` (`Patient_Name`, `Patient_Age`, `Patient_Height`, `Patient_Weight`, `Patient_Male`, `User_Name`, `Patient_Key`, `Sign_in_time`, `Disease_Name`, `Discribe`, `Solution`, `Doctor_ID`) VALUES
('田所浩二', 24, 170, 74, 'M', 'YJSNPI', '114514', '1919-08-10', 'HOMO', '24岁，是homo。喜欢雷普后辈，是人间之屑。', '给我食雪三公斤啊三公斤！', 334),
('TNOK', 24, 182, 74, 'M', 'tnok', '1919', '1919-03-04', 'HOMO', NULL, NULL, 334),
('水鸭', 24, 182, 74, 'M', 'ShuiYa', NULL, '1919-08-10', 'HOMO', NULL, NULL, 334),
('KMR', 24, 182, 74, 'M', 'KMR', NULL, '1919-08-10', 'HOMO', NULL, NULL, 810),
('铃木福', 24, 182, 74, 'M', 'foo', NULL, '1919-08-10', 'HOMO', NULL, NULL, 334),
('便乘池沼', 24, 182, 74, 'M', 'UMR', NULL, '1919-08-10', 'HOMO', NULL, NULL, 810),
('长友佑都', 24, 182, 74, 'M', 'INTER', NULL, '1919-08-10', 'HOMO', NULL, NULL, 810),
('本田圭佑', 24, 182, 74, 'M', 'HND', NULL, '1919-08-10', 'HOMO', NULL, NULL, 334),
('西寺村太', 24, 170, 74, 'M', 'NSDR', NULL, '1919-08-10', 'HOMO', NULL, NULL, 334);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor_a`
--
ALTER TABLE `doctor_a`
  ADD PRIMARY KEY (`Doctor_ID`),
  ADD UNIQUE KEY `Doctor_ID` (`Doctor_ID`);

--
-- Indexes for table `patient_test`
--
ALTER TABLE `patient_test`
  ADD PRIMARY KEY (`User_Name`),
  ADD UNIQUE KEY `User_name` (`User_Name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
