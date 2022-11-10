-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2022 at 02:55 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gad`
--

-- --------------------------------------------------------

--
-- Table structure for table `coordinators_tbl`
--

CREATE TABLE `coordinators_tbl` (
  `coordinator_id` int(10) NOT NULL,
  `fname` text NOT NULL,
  `mname` text NOT NULL,
  `lname` text NOT NULL,
  `email` text NOT NULL,
  `contact_number` text NOT NULL,
  `school_id` int(10) NOT NULL,
  `department_id` int(10) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `profile_image` text NOT NULL,
  `date_created` text NOT NULL,
  `account_status` int(1) NOT NULL,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coordinators_tbl`
--

INSERT INTO `coordinators_tbl` (`coordinator_id`, `fname`, `mname`, `lname`, `email`, `contact_number`, `school_id`, `department_id`, `username`, `password`, `profile_image`, `date_created`, `account_status`, `code`) VALUES
(1, 'Juan', 'B', 'Delacruz', 'jaun@gmail.com', '09308242900', 4, 1, 'roden', 'roden', '', '2022-06-02', 0, ''),
(2, 'Nonoy', 'N', 'Nonoy', 'nonoy@gmail.com', '09308242901', 4, 2, 'nonoy', 'nonoy', '', '2022-06-02', 0, ''),
(3, 'diana', 'diana', 'diana', 'diana@gmail.com', '09365236563', 2, 3, 'diana', 'diana', '', '2022-06-02', 1, ''),
(4, 'James', 'Patlingrao', 'Dela Cruz', 'jamespdelacruz@gmail.com', '09508040858', 1, 4, 'james', 'james', '', '2022-06-06', 0, ''),
(5, 'Rickzel', 'Andrade', 'Barredo', 'rexel50@gmail.com', '09473934133', 1, 5, 'rexel', 'rexel', '', '2022-06-06', 0, ''),
(6, 'Princess', 'Alimpolos', 'Fuentes', 'princess@gmail.com', '09770538108', 4, 2, 'prin', 'prin', '', '2022-06-06', 0, ''),
(7, 'Leokem', 'Dalida', 'Candido', 'leokem@gmail.com', '09279656626', 4, 1, 'kem', 'kem', '', '2022-06-06', 0, ''),
(8, 'Daisy', 'Salvador', 'Ferrer', 'daisy@gmail.com', '09520146295', 4, 2, 'daisy', 'daisy', '', '2022-06-07', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `departments_tbl`
--

CREATE TABLE `departments_tbl` (
  `department_id` int(10) NOT NULL,
  `school_id` int(10) NOT NULL,
  `department_name` text NOT NULL,
  `department_abbreviation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments_tbl`
--

INSERT INTO `departments_tbl` (`department_id`, `school_id`, `department_name`, `department_abbreviation`) VALUES
(1, 4, 'Mechanical Engineering', 'M.E.'),
(2, 4, 'Civil Engineering ', 'C. E.'),
(3, 2, 'Electrical', 'E'),
(4, 1, 'Computer Science', 'C.S.'),
(5, 1, 'Information Technology', 'I.T.');

-- --------------------------------------------------------

--
-- Table structure for table `events_tbl`
--

CREATE TABLE `events_tbl` (
  `event_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `user_username` text NOT NULL,
  `event_title` text NOT NULL,
  `gender_scope` int(10) NOT NULL,
  `role_scope` int(10) NOT NULL,
  `event_date_start` text NOT NULL,
  `event_date_end` text NOT NULL,
  `event_time` text NOT NULL,
  `event_description` text NOT NULL,
  `date_created` text NOT NULL,
  `school_id` int(10) NOT NULL,
  `department_id` int(10) NOT NULL,
  `event_status` int(1) NOT NULL,
  `archive_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events_tbl`
--

INSERT INTO `events_tbl` (`event_id`, `user_id`, `user_username`, `event_title`, `gender_scope`, `role_scope`, `event_date_start`, `event_date_end`, `event_time`, `event_description`, `date_created`, `school_id`, `department_id`, `event_status`, `archive_status`) VALUES
(1, 4, 'james', 'This is new Event', 11, 0, '2022-06-08', 'N/A', '11:20', 'This is description', '2022-06-07', 1, 4, 0, 0),
(2, 4, 'james', 'This is another event', 0, 0, '2022-06-10', 'N/A', '00:00', 'This is another description', '2022-06-07', 1, 4, 0, 0),
(3, 0, 'admin', 'NEW EVENT', 0, 0, '2022-06-07', '2022-06-08', '01:55', 'EVENT', '2022-06-07', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gender_tbl`
--

CREATE TABLE `gender_tbl` (
  `gender_id` int(10) NOT NULL,
  `gender_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender_tbl`
--

INSERT INTO `gender_tbl` (`gender_id`, `gender_name`) VALUES
(10, 'Lesbian'),
(11, 'Gay'),
(12, 'Bisexual'),
(13, 'Transgender'),
(14, 'Male'),
(15, 'Female'),
(16, 'Asexual');

-- --------------------------------------------------------

--
-- Table structure for table `logs_tbl`
--

CREATE TABLE `logs_tbl` (
  `log_id` int(10) NOT NULL,
  `member_id` int(10) NOT NULL,
  `action` text NOT NULL,
  `log_date` text NOT NULL,
  `log_time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs_tbl`
--

INSERT INTO `logs_tbl` (`log_id`, `member_id`, `action`, `log_date`, `log_time`) VALUES
(1, 4, 'Logged In', '2022-06-07', '10:01 am'),
(2, 4, 'Logged Out', '2022-06-07', '10:03 am'),
(3, 4, 'Logged In', '2022-06-07', '02:15 pm'),
(4, 4, 'Logged In', '2022-06-23', '11:15 pm'),
(5, 4, 'Logged In', '2022-06-23', '11:41 pm'),
(6, 6, 'Logged In', '2022-06-24', '04:05 pm'),
(7, 6, 'Logged Out', '2022-06-24', '04:05 pm'),
(8, 4, 'Logged In', '2022-06-25', '11:00 pm');

-- --------------------------------------------------------

--
-- Table structure for table `members_tbl`
--

CREATE TABLE `members_tbl` (
  `member_id` int(10) NOT NULL,
  `fname` text NOT NULL,
  `mname` text NOT NULL,
  `lname` text NOT NULL,
  `gender` int(5) NOT NULL,
  `school_id` int(10) NOT NULL,
  `department_id` int(10) NOT NULL,
  `role` int(5) NOT NULL,
  `contact_number` text NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `account_status` int(1) NOT NULL,
  `date_created` text NOT NULL,
  `profile_image` text NOT NULL,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members_tbl`
--

INSERT INTO `members_tbl` (`member_id`, `fname`, `mname`, `lname`, `gender`, `school_id`, `department_id`, `role`, `contact_number`, `email`, `username`, `password`, `account_status`, `date_created`, `profile_image`, `code`) VALUES
(1, 'j', 'j', 'j', 11, 4, 2, 1, '09308212568', 'j@gmail.com', 'j', 'j', 0, '2022-06-02', '', ''),
(2, 'vanj', 'vanj', 'vanj', 11, 2, 3, 1, '09325632541', 'vanj@gmail.com', 'vanj', 'vanj', 0, '2022-06-02', '', ''),
(3, 'asd', 'asd', 'asd', 10, 2, 3, 1, '09508040858', 'jdrbtech@gmail.com', 'jas', 'jas', 1, '2022-06-02', '', ''),
(4, 'Prince', 'Apoya', 'Fuentes ', 10, 1, 4, 1, '09508040858', 'fuenteseramae@gmail.com', 'james', 'james', 0, '2022-06-06', '', ''),
(5, 'Jinky', 'Alonzo', 'Rosario', 15, 1, 4, 1, '09317185545', 'rosariojinky04@gmail.com', '2018-0372E', '050400', 0, '2022-06-06', '', ''),
(6, 'Leo', 'Dalida', 'Dilima', 11, 4, 2, 1, '09973616083', 'leo@gmail.com', 'Leo', 'roden', 0, '2022-06-06', '', ''),
(7, 'Ranel', 'Alimpolos ', 'Fuentes', 14, 4, 2, 1, '09770538105', 'fuentesranel08@gmail.com', 'DJCESS', 'RANEL08', 1, '2022-06-06', '', ''),
(8, 'Lejhon', 'Capunong', 'Dalida', 12, 4, 2, 1, '09509124569', 'lejhon@gmail.con', 'Lejhon', 'lejhon', 1, '2022-06-06', '', ''),
(9, 'Janiza', 'Despi', 'Apoya', 10, 1, 5, 1, '09639947123', 'apoyajaniza@gmail.com', 'LANGGA', 'JANIZA30', 0, '2022-06-06', '', ''),
(10, 'Duc', 'Cabalic', 'Engnacio', 12, 4, 1, 2, '09092734356', 'duc@gmail.com', 'Duc', 'duc', 1, '2022-06-06', '', ''),
(11, 'Arwin', 'Rosario', 'Bacas', 15, 4, 2, 1, '09317654352', 'arwinbacas@gmail.com', '2018-0378E', '12345', 0, '2022-06-06', '', ''),
(12, 'Fluminence', 'Baylon', 'Badando', 15, 4, 1, 1, '09075462132', 'Fluminence@gmail.com', 'Fluminence', 'Fluminence', 1, '2022-06-06', '', ''),
(13, 'Helcurt', 'Dy', 'Sy', 14, 4, 2, 1, '09317654882', 'helcurtsy@gmail.com', '2018-0375E', '12346', 1, '2022-06-06', '', ''),
(14, 'Angel', 'Fuentes', 'Dipon', 15, 4, 1, 1, '09092757869', 'Angel@gmail.com', 'Angel', 'angel', 1, '2022-06-06', '', ''),
(15, 'Chacha', 'Ling', 'Chu', 15, 4, 2, 1, '09107789345', 'lingchu30@gmail.com', 'LOVEME30', 'LOVE30', 1, '2022-06-06', '', ''),
(16, 'Marvin', 'Eun', 'Woo', 10, 4, 2, 1, '09770538308', 'marvinchu03@gmail.com', 'CHAEUNWOO', '12345678', 1, '2022-06-06', '', ''),
(17, 'Lancelot', 'Nam', 'Kang', 11, 4, 1, 1, '09317524888', 'lancelotkang@gmail.com', '2018-0275E', '12344', 1, '2022-06-06', '', ''),
(18, 'Pika', 'Chu', 'Choa', 11, 4, 2, 1, '09770538133', 'pikachu30@gmail.com', 'Chang', 'chang30', 1, '2022-06-06', '', ''),
(19, 'Lance', 'Bayot', 'Doyungan', 12, 4, 1, 2, '095003765', 'Lance@gmail.com', 'Lance', 'lance', 1, '2022-06-06', '', ''),
(20, 'Hayabusa', 'Uy', 'Wong', 13, 1, 5, 1, '09654278641', 'hayabusawong @gmail.com', '2018-0386E', '00000', 1, '2022-06-06', '', ''),
(21, 'Moca', 'Tapos', 'Fuentes', 10, 4, 1, 1, '09770538123', 'fuentesmoca@gmail.com', 'Vine', 'VINE23', 1, '2022-06-06', '', ''),
(22, 'Alucard', 'Si', 'Ong', 14, 4, 2, 1, '097366542871', 'alucardsi@gamil.com', '2018-0872E', '88888', 0, '2022-06-06', '', ''),
(23, 'Wade', 'Ramos', 'Dela Cruz', 11, 1, 4, 1, '09639073840', 'wade@gmail.com', 'wade', 'wade', 0, '2022-06-06', '', ''),
(24, 'Dave', 'Garcia', 'Dulnuan', 14, 1, 4, 1, '09061234567', 'dave@gmail.com', 'dave', 'dave', 0, '2022-06-06', '', ''),
(25, 'Seth', 'Dulnuan', 'Domingo', 14, 1, 4, 1, '09071234567', 'seth@gmail.com', 'seth', 'seth', 0, '2022-06-06', '', ''),
(26, 'Ivan', 'Domingo', 'Ramos', 12, 1, 4, 1, '09081234567', 'ivan@gmail.com', 'ivan', 'ivan', 1, '2022-06-06', '', ''),
(27, 'Riley', 'Ramos', 'Mendoza', 11, 1, 4, 1, '09091234567', 'riley@gmail.com', 'riley', 'riley', 1, '2022-06-06', '', ''),
(28, 'Gilbert', 'Mendoza', 'Valdez', 14, 1, 4, 1, '09101234567', 'gilbert@gmail.com', 'gilbert', 'gilbert', 1, '2022-06-06', '', ''),
(29, 'Jorge', 'Valdez', 'Bautista', 14, 1, 4, 1, '09111234567', 'jorge@gmail.com', 'jorge', 'jorge', 1, '2022-06-06', '', ''),
(30, 'Dan', 'Bautista', 'Fernandez', 13, 1, 4, 1, '09121234567', 'dan@gmail.com', 'dan', 'dan', 1, '2022-06-06', '', ''),
(31, 'Brian', 'Fernandez', 'Bautista', 14, 1, 4, 1, '09139876543', 'brian@gmail.com', 'brian', 'brian', 1, '2022-06-06', '', ''),
(32, 'Roberto', 'Fernandez', 'Flores', 11, 1, 4, 1, '09131234567', 'roberto@gmail.com', 'robert', 'robert', 1, '2022-06-06', '', ''),
(33, 'Ramon', 'Flores', 'De Guzman', 12, 1, 5, 1, '09141234567', 'ramon@gmail.com', 'ramon', 'ramon', 1, '2022-06-06', '', ''),
(34, 'Miles', 'De Guzman ', 'Flores', 12, 1, 5, 1, '09148765439', 'miles@gmail.com', 'miles', 'miles', 1, '2022-06-06', '', ''),
(35, 'Liam', 'De Guzman', 'Reyes', 12, 1, 5, 1, '09159876123', 'liam@gmail.com', 'liam', 'liam', 1, '2022-06-06', '', ''),
(36, 'Nathaniel', 'Reyes', 'Aquino', 14, 1, 5, 1, '09169876123', 'nathan@gmail.com', 'nat', 'nat', 1, '2022-06-06', '', ''),
(37, 'Ethan', 'Aquino', 'Soriano', 14, 1, 5, 1, '09179875439', 'ethan@gmail.com', 'ethan', 'ethan', 1, '2022-06-06', '', ''),
(38, 'Lewis', 'Soriano', 'Castillo', 13, 1, 5, 1, '09189876512', 'lewis@gmail.com', 'lewis', 'lewis', 1, '2022-06-06', '', ''),
(39, 'Milton', 'Antonio', 'Agustin', 13, 1, 5, 1, '09191235694', 'milton@gmail.com', 'mil', 'mil', 1, '2022-06-06', '', ''),
(40, 'Claude', 'Agustin ', 'Molina', 12, 1, 5, 1, '09207583284', 'claude@gmail.com', 'clau', 'clau', 1, '2022-06-06', '', ''),
(41, 'Joshua', 'Molina ', 'Lopez', 14, 1, 5, 1, '09215685432', 'lopez@gmail.com', 'josh', 'josh', 1, '2022-06-06', '', ''),
(42, 'Glen', 'Lopez', 'Manuel', 13, 1, 5, 1, '09219871236', 'glen@gmail.com', 'glen', 'glen', 1, '2022-06-06', '', ''),
(43, 'Harvey', 'Manuel', 'Castro', 14, 4, 2, 1, '09225439870', 'harvey@gmail.com', 'harv', 'harv', 1, '2022-06-06', '', ''),
(44, 'Blake', 'Castro', 'Corpuz', 14, 4, 2, 1, '09231462896', 'blake@gmail.com', 'blake', 'blake', 1, '2022-06-06', '', ''),
(45, 'Antonio', 'Corpuz', 'Gonzales', 14, 4, 2, 1, '09238761239', 'antonio@gmail.com', 'anton', 'anton', 1, '2022-06-06', '', ''),
(46, 'Cannor', 'Gonzales', 'Velasco', 14, 4, 2, 1, '09236549871', 'connor@gmail.com', 'can', 'can', 1, '2022-06-06', '', ''),
(47, 'Julian', 'Velasco', 'Villanueva', 14, 4, 2, 1, '09249876123', 'julian@gmail.com', 'jul', 'jul', 1, '2022-06-06', '', ''),
(48, 'Aidan', 'Villanueva', 'Tayaban', 14, 4, 2, 1, '09250975438', 'aidan@gmail.com', 'aidan', 'aidan', 1, '2022-06-06', '', ''),
(49, 'Harold', 'Tayaban', 'Martinez', 14, 4, 2, 1, '09260915826', 'harold@gmail.com', 'harold', 'harold', 1, '2022-06-06', '', ''),
(50, 'Conner', 'Martinez', 'Pascua', 12, 4, 2, 1, '09269815293', 'conner@gmail.com', 'conner', 'conner', 1, '2022-06-06', '', ''),
(51, 'Peter', 'Pascua', 'Mariano', 14, 4, 2, 1, '09270912385', 'peter@gmail.com', 'pet', 'pet', 1, '2022-06-06', '', ''),
(52, 'Hunter', 'Mariano', 'Martin', 14, 4, 2, 1, '09280912359', 'hunter@gmail.com', 'hunter', 'hunter', 1, '2022-06-06', '', ''),
(53, 'Eli', 'Martin', 'Bugtong', 14, 4, 1, 1, '09290492051', 'eli@gmail.com', 'eli', 'eli', 1, '2022-06-06', '', ''),
(54, 'Alberto', 'Butong ', 'Peralta', 11, 4, 1, 1, '09301276290', 'albert@gmail.com', 'albert', 'albert', 1, '2022-06-06', '', ''),
(55, 'Carlos', 'Peralta ', 'Santos', 11, 4, 1, 1, '09315309126', 'carlos@gmail.com', 'carl', 'carl', 1, '2022-06-06', '', ''),
(56, 'Shane', 'Santos', 'Rivera', 14, 4, 1, 1, '09320914824', 'shane@gmail.com', 'shan', 'shan', 0, '2022-06-06', '', ''),
(57, 'Aaron', 'Rivera', 'Carino', 11, 4, 1, 1, '09330192835', 'aaron@gmail.com', 'aaron', 'aaron', 1, '2022-06-06', '', ''),
(58, 'Marlin', 'Carino', 'Vicente', 14, 4, 1, 1, '09340917593', 'marlin@gmail.com', 'mar', 'mar', 1, '2022-06-06', '', ''),
(59, 'Paul', 'Vicente', 'Santiago', 14, 4, 1, 1, '09350912648', 'paul@gmail.com', 'paul', 'paul', 1, '2022-06-06', '', ''),
(60, 'Ricardo', 'Santiago', 'Guzman', 15, 4, 1, 1, '09360192837', 'ricardo@gmail.com', 'ric', 'ric', 1, '2022-06-06', '', ''),
(61, 'Hector', 'Guzman', 'Andres', 10, 4, 1, 1, '09370125486', 'hector@gmail.com', 'hec', 'hec', 1, '2022-06-06', '', ''),
(62, 'Alexis', 'Andres', 'Valera', 15, 4, 1, 1, '09380567439', 'alex@gmail.com', 'alex', 'alex', 1, '2022-06-06', '', ''),
(63, 'Adrian', 'Valera', 'Pablo', 13, 4, 2, 1, '09390912784', 'adrian@gmail.com', 'adrian', 'adrian', 1, '2022-06-06', '', ''),
(64, 'Kingston', 'Pablo', 'Javier', 11, 4, 2, 1, '09400981235', 'kingston@gmail.com', 'king', 'king', 1, '2022-06-06', '', ''),
(65, 'Douglas', 'Javier', 'Marcos', 14, 4, 2, 1, '09410593194', 'marcos@gmail.com', 'marcos', 'marcos', 1, '2022-06-06', '', ''),
(66, 'Gerald', 'Marcos', 'Torres', 13, 4, 2, 1, '09420942891', 'gerald@gmail.com', 'rald', 'rald', 1, '2022-06-06', '', ''),
(67, 'Joey', 'Torres', 'Perez', 12, 4, 2, 1, '09420958215', 'joey@gmail.com', 'joe', 'joe', 1, '2022-06-06', '', ''),
(68, 'Johnny', 'Perez', 'Pascual', 13, 4, 1, 1, '09440912370', 'john@gmail.com', 'john', 'john', 1, '2022-06-06', '', ''),
(69, 'Charlie', 'Pascual', 'Ramirez', 14, 4, 1, 1, '09453219403', 'charl@gmail.com', 'char', 'char', 1, '2022-06-06', '', ''),
(70, 'Scott', 'Ramirez', 'Ancheta', 12, 4, 1, 1, '09463109478', 'scott@gmail.com', 'scott', 'scott', 1, '2022-06-06', '', ''),
(71, 'Martin', 'Ancheta', 'Cruz', 14, 4, 1, 1, '09460912386', 'martin@gmail.com', 'martin', 'mart', 1, '2022-06-06', '', ''),
(72, 'Tristin', 'Cruz', 'Acosta', 13, 4, 1, 1, '09469810396', 'tris@gmail.com', 'tris', 'tris', 1, '2022-06-06', '', ''),
(73, 'Troy', 'Acosta', 'Miguel', 12, 1, 4, 1, '09470912739', 'troy@gmail.com', 'troy', 'troy', 1, '2022-06-06', '', ''),
(74, 'Tommy', 'Miguel', 'Ventura', 12, 1, 4, 1, '09470912382', 'tom@gmail.com', 'tom', 'tom', 1, '2022-06-06', '', ''),
(75, 'Ricky', 'Ventura', 'Segundo', 12, 1, 4, 1, '09480918401', 'ric@gmail.com', 'rick', 'rick', 1, '2022-06-06', '', ''),
(76, 'Victor', 'Segundo', 'Sabado', 14, 1, 4, 1, '09480973821', 'vic@gmail.com', 'vic', 'vic', 1, '2022-06-06', '', ''),
(77, 'Jessie', 'Sabado', 'Tomas', 14, 1, 4, 1, '09490951892', 'jes@gmail.com', 'jes', 'jes', 1, '2022-06-06', '', ''),
(78, 'Neil', 'Tomas', 'Basilio', 13, 1, 5, 1, '09490129275', 'neil@gmail.com', 'neil', 'neil', 1, '2022-06-06', '', ''),
(79, 'Ted', 'Basilio', 'Tuguinay', 12, 1, 5, 1, '09500162840', 'ted@gmail.com', 'ted', 'ted', 1, '2022-06-06', '', ''),
(80, 'Nick', 'Tuguinay', 'Binwag', 12, 1, 5, 1, '09510912629', 'nick@gmail.com', 'nick', 'nick', 1, '2022-06-06', '', ''),
(81, 'Wiley', 'Binwag', 'Binwag', 12, 1, 5, 1, '09520952951', 'wil@gmail.com', 'wil', 'wil', 1, '2022-06-06', '', ''),
(82, 'Morris', 'Manzano', 'Salvador', 11, 1, 5, 1, '09535389210', 'mor@gmail.com', 'morr', 'morr', 1, '2022-06-06', '', ''),
(83, 'Daisy', 'Manzano', 'Salvador', 15, 4, 2, 1, '09520910391', 'daisy', 'daisy', 'daisy', 1, '2022-06-07', '', ''),
(84, 'Deborah', 'Salvador', 'Ferrer', 15, 4, 2, 1, '09530910519', 'debo@gmail.com', 'deb', 'deb', 1, '2022-06-07', '', ''),
(85, 'Isabel', 'Ferrer', 'Dulay', 15, 4, 2, 1, '09542719825', 'isabel', 'isa', 'isa', 1, '2022-06-07', '', ''),
(86, 'Stella', 'Dulay', 'De Vera', 15, 4, 2, 1, '09550183290', 'stella@gmail.com', 'stel', 'stel', 1, '2022-06-07', '', ''),
(87, 'Debra', 'Juan', 'Sanchez', 10, 4, 2, 1, '09550932184', 'deb@gmail.com', 'debra', 'debra', 1, '2022-06-07', '', ''),
(88, 'Beverly', 'Sanchez', 'Jose', 13, 4, 2, 1, '09560982612', 'san@gmail,com', 'san', 'san', 1, '2022-06-07', '', ''),
(89, 'Vera', 'Jose', 'Viernes', 15, 4, 2, 1, '09571458029', 'vera@gmail.com', 'vera', 'vera', 1, '2022-06-07', '', ''),
(90, 'Angela', 'Viernes', 'Esteban', 15, 4, 2, 1, '09570934710', 'angel@gmail.com', 'angel', 'angel', 1, '2022-06-07', '', ''),
(91, 'Lucy', 'Esteban', 'Tadeo', 15, 4, 2, 1, '09573412093', 'lucy@gmail.com', 'lucy', 'lucy', 1, '2022-06-07', '', ''),
(92, 'Lauren', 'Tadeo', 'Mateo', 15, 4, 2, 1, '09580912348', 'lauren@gmail.com', 'lauren', 'lauren', 1, '2022-06-07', '', ''),
(93, 'Janet', 'Mateo', 'Barbosa', 15, 4, 2, 1, '09580947658', 'janet@gmail.com', 'janet', 'janet', 1, '2022-06-07', '', ''),
(94, 'Loretta', 'Barbosa', 'Marquez', 15, 4, 2, 1, '09601234398', 'lore@gmail.com', 'lore', 'lore', 1, '2022-06-07', '', ''),
(95, 'Tracey', 'Marquez', 'Bernal', 13, 4, 2, 1, '09540987654', 'tracey@gmail.com', 'tracey', 'tracey', 1, '2022-06-07', '', ''),
(96, 'Beatrice', 'Bernal', 'Pinkihan', 10, 4, 2, 2, '09550987601', 'bea@gmail.com', 'bea', 'bea', 1, '2022-06-07', '', ''),
(97, 'Sabrina', 'Pinkihan', 'Morales', 10, 4, 2, 1, '09560981237', 'sab@gmail.com', 'sab', 'sab', 1, '2022-06-07', '', ''),
(98, 'Melody', 'Morales', 'Cortez', 15, 4, 1, 1, '09560981241', 'melo@gmail.com', 'melo', 'melo', 1, '2022-06-07', '', ''),
(99, 'Chrysta', 'Cortez', 'Asuncion', 15, 4, 1, 1, '09578964310', 'crista', 'crista', 'crista', 1, '2022-06-07', '', ''),
(100, 'Christina', 'Asuncion', '	Benito', 15, 4, 1, 1, '09580923195', 'chris@gmail.com', 'chris', 'chris', 1, '2022-06-07', '', ''),
(101, 'Vicki', 'Benito', 'Padilla', 15, 4, 1, 1, '09590126549', 'vick@gmail.com', 'vick', 'vick', 1, '2022-06-07', '', ''),
(102, 'Molly', 'Padilla', 'Luis', 15, 4, 1, 1, '09601234098', 'moll@gmail.com', 'moll', 'moll', 1, '2022-06-07', '', ''),
(103, 'Alison', 'Luis', 'Diaz', 15, 4, 1, 1, '096196521', 'alison@gmail.com', 'alison', 'alison', 1, '2022-06-07', '', ''),
(104, 'Miranda', 'Diaz', 'Tolentino', 15, 4, 1, 1, '09620981263', 'miranda@gmail.com', 'miranda', 'miranda', 1, '2022-06-07', '', ''),
(105, 'Stephanie', 'Tolentino', 'Abad', 15, 4, 1, 1, '09630912369', 'step@gmail.com', 'step', 'step', 1, '2022-06-07', '', ''),
(106, 'Leona', 'Abad', 'Pedro', 15, 4, 1, 1, '09640912496', 'leon', 'Pedro', 'Pedro', 1, '2022-06-07', '', ''),
(107, 'Katrina', 'Pedro', 'Matias', 15, 4, 1, 1, '09651209638', 'kat@gmail.com', 'kat', 'kat', 1, '2022-06-07', '', ''),
(108, 'Mila', 'Matias', 'Gano', 15, 4, 1, 1, '09660974329', 'mila@gmail.com', 'mila', 'mila', 1, '2022-06-07', '', ''),
(109, 'Teresa', 'Gano', 'Navarro', 15, 4, 1, 1, '09670984572', 'tere@gmail.com', 'tere', 'tere', 1, '2022-06-07', '', ''),
(110, 'Gabriela', 'Navarro', 'Jimenez', 15, 4, 1, 1, '09680946810', 'gab@gmail.com', 'gab', 'gab', 1, '2022-06-07', '', ''),
(111, 'Ashley', 'Jimenez', 'Espiritu', 15, 4, 1, 1, '09680925194', 'ash@gmail.com', 'ash', 'ash', 1, '2022-06-07', '', ''),
(112, 'Nicole', 'Espiritu', 'Francisco', 15, 4, 1, 1, '09695467024', 'nicole@gmail.com', 'nicole', 'nicole', 1, '2022-06-07', '', ''),
(113, 'Valentina', 'Francisco', 'Alcantara', 15, 1, 4, 1, '09693822853', 'valen@gmail.com', 'valen', 'valen', 1, '2022-06-07', '', ''),
(114, 'Rose', 'Alcantara', 'Tamayo', 15, 1, 4, 1, '09702179542', 'tamayo@gmail.com', 'tamayo', 'tamayo', 1, '2022-06-07', '', ''),
(115, 'Juliana', 'Tamayo', 'Millare', 15, 1, 4, 1, '09710943218', 'julia@gmail.com', 'julia', 'julia', 1, '2022-06-07', '', ''),
(116, 'Alice', 'Millare', 'Trinidad', 15, 1, 4, 1, '09726785432', 'alice@gmail.com', 'alice', 'alice', 1, '2022-06-07', '', ''),
(117, 'Kathie', 'Trinidad', 'Felipe', 15, 1, 4, 1, '09720967361', 'kath@gmail.com', 'kath', 'kath', 1, '2022-06-07', '', ''),
(118, 'Gloria', 'Felipe', 'Pugong', 15, 1, 4, 1, '09742987610', 'gloria@gmail.com', 'gloria', 'gloria', 1, '2022-06-07', '', ''),
(119, 'Luna', 'Pugong', 'Sab-It', 15, 1, 4, 1, '09749805682', 'luna@gmail.com', 'luna', 'luna', 1, '2022-06-07', '', ''),
(120, 'Phoebe', 'Sab-It', 'De Leon', 15, 1, 4, 1, '09752897639', 'phoeb@gmail.com', 'phoeb', 'phoeb', 1, '2022-06-07', '', ''),
(121, 'Angelique', 'De Leon', 'Sison', 15, 1, 4, 1, '09760978245', 'angeli@gmail.com', 'angeli', 'angeli', 1, '2022-06-07', '', ''),
(122, 'Graciela', 'Ananayo', 'Dizon', 15, 1, 4, 1, '09760954329', 'graci@gmail.com', 'graci', 'graci', 1, '2022-06-07', '', ''),
(123, 'Gemma', 'Dizon', 'Turqueza', 15, 1, 4, 1, '09780943289', 'gemma@gmail.com', 'gemma', 'gemma', 1, '2022-06-07', '', ''),
(124, 'Katelynn', 'Turqueza', 'Liwan', 15, 1, 4, 1, '09790435728', 'kate@gmail.com', 'kate', 'kate', 1, '2022-06-07', '', ''),
(125, 'Danna', 'Liwan', 'Pacio', 10, 1, 4, 1, '09708765296', 'donna@gmail.com', 'donna', 'donna', 1, '2022-06-07', '', ''),
(126, 'Luisa', 'Pacio', 'Guillermo', 10, 1, 4, 1, '09712893517', 'luisa@gmail.com', 'luisa', 'luisa', 1, '2022-06-07', '', ''),
(127, 'Julie', 'Guillermo', 'Lucas', 15, 1, 4, 1, '09730965291', 'juli@gmail.com', 'juli', 'juli', 1, '2022-06-07', '', ''),
(128, 'Olive', 'Lucas', 'Rimando', 15, 1, 5, 1, '09720932781', 'olive@gmail.com', 'olive', 'olive', 1, '2022-06-07', '', ''),
(129, 'Carolina', 'Rimando', 'Carpio', 15, 1, 5, 1, '09748902710', 'carol@gmail.com', 'carol', 'carol', 1, '2022-06-07', '', ''),
(130, 'Harmony', 'Carpio', 'Dinamling', 15, 1, 5, 1, '09759831946', 'harm@gmail.com', 'harm', 'harm', 1, '2022-06-07', '', ''),
(131, 'Hanna', 'Dinamling', 'Dominguez', 15, 1, 5, 1, '09759853219', 'hana@gmail.com', 'hana', 'hana', 1, '2022-06-07', '', ''),
(132, 'Anabelle', 'Dominguez', 'Sibayan', 15, 1, 5, 1, '09760984532', 'anabel@gmail.com', 'anabel', 'anabel', 1, '2022-06-07', '', ''),
(133, 'Francesca', 'Sibayan', 'Bastian', 15, 1, 5, 1, '09789853920', 'fran@gmail.com', 'fran', 'fran', 1, '2022-06-07', '', ''),
(134, 'Whitney', 'Bastian', 'Bandao', 15, 1, 5, 1, '09796758329', 'white@gmail.com', 'white', 'white', 1, '2022-06-07', '', ''),
(135, 'Skyla', 'Bandao', 'Kimayong', 15, 1, 5, 1, '09790836281', 'sky@gmail.com', 'sky', 'sky', 1, '2022-06-07', '', ''),
(136, 'Nathalie', 'Kimayong', 'Blaza', 15, 1, 5, 1, '09808765409', 'nath@gmail.com', 'nath', 'nath', 1, '2022-06-07', '', ''),
(137, 'Sophie', 'Blaza', 'Blanza', 15, 1, 5, 1, '09810976529', 'sop@gmail.com', 'sop', 'sop', 1, '2022-06-07', '', ''),
(138, 'Hannah', 'Blanza', 'Banatao', 15, 1, 5, 1, '09810984730', 'hannah@gmail.com', 'hannah', 'hannah', 1, '2022-06-07', '', ''),
(139, 'Silvia', 'Banatao', 'Del Rosario', 15, 1, 5, 1, '098209367291', 'silva@gmail.com', 'silva', 'silva', 1, '2022-06-07', '', ''),
(140, 'Sophia', 'Del Rosario', 'Alunday', 15, 1, 5, 1, '098478905249', 'sophia@gmail.com', 'sophia', 'sophia', 1, '2022-06-07', '', ''),
(141, 'Della', 'Alunday', 'Marcelo', 15, 1, 5, 1, '09860963821', 'della@gmail.com', 'della', 'della', 1, '2022-06-07', '', ''),
(142, 'Myra', 'Marcelo', 'Gomez', 15, 1, 5, 1, '09801254093', 'myra@gmail.com', 'myra', 'myra', 1, '2022-06-07', '', ''),
(143, 'Kemvirl J', 'Arellado', 'Rubrico', 12, 1, 4, 1, '09155341245', 'kem.rubrico@gmail.com', 'Maria09', 'February01', 0, '2022-06-07', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `reports_tbl`
--

CREATE TABLE `reports_tbl` (
  `report_id` int(20) NOT NULL,
  `event_id` int(20) NOT NULL,
  `gender_id` int(10) NOT NULL,
  `no_attended` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports_tbl`
--

INSERT INTO `reports_tbl` (`report_id`, `event_id`, `gender_id`, `no_attended`) VALUES
(1, 1, 10, '3'),
(2, 1, 11, '4'),
(3, 1, 12, '3'),
(4, 1, 13, '3'),
(5, 1, 14, '2'),
(6, 1, 15, '1'),
(7, 2, 10, '1'),
(8, 2, 11, '1'),
(9, 2, 12, '1'),
(10, 2, 13, '1'),
(11, 2, 14, '1'),
(12, 2, 15, '1');

-- --------------------------------------------------------

--
-- Table structure for table `role_tbl`
--

CREATE TABLE `role_tbl` (
  `role_id` int(10) NOT NULL,
  `role_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_tbl`
--

INSERT INTO `role_tbl` (`role_id`, `role_name`) VALUES
(1, 'Student'),
(2, 'Staff'),
(3, 'Faculty'),
(4, 'Other Stakeholders');

-- --------------------------------------------------------

--
-- Table structure for table `schools_tbl`
--

CREATE TABLE `schools_tbl` (
  `school_id` int(10) NOT NULL,
  `school_name` text NOT NULL,
  `school_abbreviation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools_tbl`
--

INSERT INTO `schools_tbl` (`school_id`, `school_name`, `school_abbreviation`) VALUES
(1, 'Institute of Information and Compsuter Studies', 'CICS'),
(4, 'Engineering ', 'Eng\'r');

-- --------------------------------------------------------

--
-- Table structure for table `sms_tbl`
--

CREATE TABLE `sms_tbl` (
  `sms_id` int(10) NOT NULL,
  `send_by` text NOT NULL,
  `member_id` int(10) NOT NULL,
  `member_name` text NOT NULL,
  `sms_content` text NOT NULL,
  `contact_number` text NOT NULL,
  `date_sent` text NOT NULL,
  `sms_type` int(1) NOT NULL,
  `sms_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms_tbl`
--

INSERT INTO `sms_tbl` (`sms_id`, `send_by`, `member_id`, `member_name`, `sms_content`, `contact_number`, `date_sent`, `sms_type`, `sms_status`) VALUES
(1, 'james', 23, 'Wade Dela Cruz', 'Good day Wade Dela Cruz New Event Schedule. What: This is new Event When: June 8, 2022 To January 1, 1970 @ 11:20. Thank you.', '09639073840', '2022-06-07', 0, 0),
(2, 'james', 4, 'Prince Fuentes ', 'Good day Prince Fuentes  New Event Schedule. What: This is another event When: June 10, 2022 To January 1, 1970 @ 00:00. Thank you.', '09508040858', '2022-06-07', 0, 0),
(3, 'james', 23, 'Wade Dela Cruz', 'Good day Wade Dela Cruz New Event Schedule. What: This is another event When: June 10, 2022 To January 1, 1970 @ 00:00. Thank you.', '09639073840', '2022-06-07', 0, 0),
(4, '', 143, '', 'Good day Kemvirl J Rubrico, Your account has been approved. Thank you.', '09155341245', '2022-06-07', 0, 0),
(5, '', 5, '', 'Good day Jinky Rosario, Your account has been approved. Thank you.', '09317185545', '2022-06-07', 0, 0),
(6, '', 24, '', 'Good day Dave Dulnuan, Your account has been approved. Thank you.', '09061234567', '2022-06-07', 0, 0),
(7, '', 25, '', 'Good day Seth Domingo, Your account has been approved. Thank you.', '09071234567', '2022-06-07', 0, 0),
(8, 'admin', 1, 'j j', 'Good day j j New Event Schedule. What: NEW EVENT When: June 7, 2022 To June 8, 2022 @ 01:55. Thank you.', '09308212568', '2022-06-07', 0, 0),
(9, 'admin', 2, 'vanj vanj', 'Good day vanj vanj New Event Schedule. What: NEW EVENT When: June 7, 2022 To June 8, 2022 @ 01:55. Thank you.', '09325632541', '2022-06-07', 0, 0),
(10, 'admin', 4, 'Prince Fuentes ', 'Good day Prince Fuentes  New Event Schedule. What: NEW EVENT When: June 7, 2022 To June 8, 2022 @ 01:55. Thank you.', '09508040858', '2022-06-07', 0, 0),
(11, 'admin', 5, 'Jinky Rosario', 'Good day Jinky Rosario New Event Schedule. What: NEW EVENT When: June 7, 2022 To June 8, 2022 @ 01:55. Thank you.', '09317185545', '2022-06-07', 0, 0),
(12, 'admin', 9, 'Janiza Apoya', 'Good day Janiza Apoya New Event Schedule. What: NEW EVENT When: June 7, 2022 To June 8, 2022 @ 01:55. Thank you.', '09639947123', '2022-06-07', 0, 0),
(13, 'admin', 11, 'Arwin Bacas', 'Good day Arwin Bacas New Event Schedule. What: NEW EVENT When: June 7, 2022 To June 8, 2022 @ 01:55. Thank you.', '09317654352', '2022-06-07', 0, 0),
(14, 'admin', 22, 'Alucard Ong', 'Good day Alucard Ong New Event Schedule. What: NEW EVENT When: June 7, 2022 To June 8, 2022 @ 01:55. Thank you.', '097366542871', '2022-06-07', 0, 0),
(15, 'admin', 23, 'Wade Dela Cruz', 'Good day Wade Dela Cruz New Event Schedule. What: NEW EVENT When: June 7, 2022 To June 8, 2022 @ 01:55. Thank you.', '09639073840', '2022-06-07', 0, 0),
(16, 'admin', 24, 'Dave Dulnuan', 'Good day Dave Dulnuan New Event Schedule. What: NEW EVENT When: June 7, 2022 To June 8, 2022 @ 01:55. Thank you.', '09061234567', '2022-06-07', 0, 0),
(17, 'admin', 25, 'Seth Domingo', 'Good day Seth Domingo New Event Schedule. What: NEW EVENT When: June 7, 2022 To June 8, 2022 @ 01:55. Thank you.', '09071234567', '2022-06-07', 0, 0),
(18, 'admin', 56, 'Shane Rivera', 'Good day Shane Rivera New Event Schedule. What: NEW EVENT When: June 7, 2022 To June 8, 2022 @ 01:55. Thank you.', '09320914824', '2022-06-07', 0, 0),
(19, 'admin', 143, 'Kemvirl J Rubrico', 'Good day Kemvirl J Rubrico New Event Schedule. What: NEW EVENT When: June 7, 2022 To June 8, 2022 @ 01:55. Thank you.', '09155341245', '2022-06-07', 0, 0),
(20, 'admin', 6, 'Leo Dilima', 'Your Forgot Password Code is 601037', '09973616083', '2022-06-24', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `system_settings_tbl`
--

CREATE TABLE `system_settings_tbl` (
  `system_setting_id` int(10) NOT NULL,
  `system_title` text NOT NULL,
  `system_logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_settings_tbl`
--

INSERT INTO `system_settings_tbl` (`system_setting_id`, `system_title`, `system_logo`) VALUES
(1, 'Gender and Development  Management  Information  System with SMS Notification ', 'http://localhost/gad/system_images/');

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `user_id` int(10) NOT NULL,
  `fname` text NOT NULL,
  `mname` text NOT NULL,
  `lname` text NOT NULL,
  `email` text NOT NULL,
  `contact_number` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `profile_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`user_id`, `fname`, `mname`, `lname`, `email`, `contact_number`, `username`, `password`, `profile_image`) VALUES
(1, 'James', 'Patlingrao', 'Dela Cruz', 'roden@gmail.com', '09508040858', 'admin', 'admin', 'http://localhost/gad/profile_images/288972_nissan-cars-wallpapers-cars-backgrounds-cars-wallpapers_2560x1600_h.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coordinators_tbl`
--
ALTER TABLE `coordinators_tbl`
  ADD PRIMARY KEY (`coordinator_id`);

--
-- Indexes for table `departments_tbl`
--
ALTER TABLE `departments_tbl`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `events_tbl`
--
ALTER TABLE `events_tbl`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `gender_tbl`
--
ALTER TABLE `gender_tbl`
  ADD PRIMARY KEY (`gender_id`);

--
-- Indexes for table `logs_tbl`
--
ALTER TABLE `logs_tbl`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `members_tbl`
--
ALTER TABLE `members_tbl`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `reports_tbl`
--
ALTER TABLE `reports_tbl`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `role_tbl`
--
ALTER TABLE `role_tbl`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `schools_tbl`
--
ALTER TABLE `schools_tbl`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `sms_tbl`
--
ALTER TABLE `sms_tbl`
  ADD PRIMARY KEY (`sms_id`);

--
-- Indexes for table `system_settings_tbl`
--
ALTER TABLE `system_settings_tbl`
  ADD PRIMARY KEY (`system_setting_id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coordinators_tbl`
--
ALTER TABLE `coordinators_tbl`
  MODIFY `coordinator_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `departments_tbl`
--
ALTER TABLE `departments_tbl`
  MODIFY `department_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events_tbl`
--
ALTER TABLE `events_tbl`
  MODIFY `event_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gender_tbl`
--
ALTER TABLE `gender_tbl`
  MODIFY `gender_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `logs_tbl`
--
ALTER TABLE `logs_tbl`
  MODIFY `log_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `members_tbl`
--
ALTER TABLE `members_tbl`
  MODIFY `member_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `reports_tbl`
--
ALTER TABLE `reports_tbl`
  MODIFY `report_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `role_tbl`
--
ALTER TABLE `role_tbl`
  MODIFY `role_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schools_tbl`
--
ALTER TABLE `schools_tbl`
  MODIFY `school_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sms_tbl`
--
ALTER TABLE `sms_tbl`
  MODIFY `sms_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `system_settings_tbl`
--
ALTER TABLE `system_settings_tbl`
  MODIFY `system_setting_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
