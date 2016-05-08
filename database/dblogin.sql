-- phpMyAdmin SQL Dump
-- version 4.3.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: May 08, 2016 at 03:56 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dblogin`
--

-- --------------------------------------------------------

--
-- Table structure for table `eventParticipant`
--

CREATE TABLE `eventParticipant` (
  `eventId` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventParticipant`
--

INSERT INTO `eventParticipant` (`eventId`, `user_id`) VALUES
(34, 2);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventId` int(60) NOT NULL,
  `create_user_id` int(60) NOT NULL,
  `eventName` varchar(255) DEFAULT NULL,
  `eventDescription` text,
  `type` varchar(60) DEFAULT NULL,
  `address` text NOT NULL,
  `suburb` varchar(70) NOT NULL,
  `capacity` int(60) DEFAULT NULL,
  `curr_capa` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventId`, `create_user_id`, `eventName`, `eventDescription`, `type`, `address`, `suburb`, `capacity`, `curr_capa`, `date`, `status`) VALUES
(32, 1, 'run cat', 'have fun in running', 'Walking Dog', '132B Kensington Rd, Kensington VIC 3031, Australia', 'Kensington', 14, 1, '2016-05-08 17:00:00', 'active'),
(33, 2, 'fly to the sky', 'lol', 'Yoga', '15 Cambridge St, Maidstone VIC 3012, Australia', 'Maidstone', 14, 0, '2016-05-08 17:00:00', 'active'),
(34, 1, 'fly to the ground', 'lol', 'BBQ', '25 Van Ness Ave, Maribyrnong VIC 3032, Australia', 'Maribyrnong', 2, 2, '2016-05-08 19:00:00', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

CREATE TABLE `interest` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `postcode` int(11) NOT NULL,
  `street` varchar(255) NOT NULL,
  `interest` varchar(255) NOT NULL,
  `match_scale` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `Location_ID` int(3) NOT NULL DEFAULT '0',
  `Title` varchar(75) DEFAULT NULL,
  `Address` varchar(85) DEFAULT NULL,
  `Latitude` decimal(11,8) DEFAULT NULL,
  `Longitude` decimal(10,7) DEFAULT NULL,
  `Category` varchar(12) DEFAULT NULL,
  `post_id` int(11) NOT NULL,
  `rating_number` int(11) NOT NULL,
  `total_points` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `modified_at` date NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1 = Block, 0 = Unblock'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`Location_ID`, `Title`, `Address`, `Latitude`, `Longitude`, `Category`, `post_id`, `rating_number`, `total_points`, `created_at`, `modified_at`, `status`) VALUES
(1, 'Avondale Heights', '11 Clarendon St\rMelbourne, Australia', '-37.82415900', '144.9566390', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(2, 'Barkly Square', '40 Weston St\rMelbourne, Australia', '-37.77550400', '144.9653290', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(3, 'Box Hill', '823-825 Canterbury Rd\rMelbourne, Australia', '-37.82985800', '145.1315220', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(4, 'Brunswick High School Rims', '45-49 Dawson St\rMelbourne, Australia', '-37.77155200', '144.9551730', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(5, 'Cambellfield Primary', '2-10 Waratah St\rMelbourne, Australia', '-37.67495200', '144.9655940', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(6, 'Carinza Ave', '26 Carinza Avenue Melbourne, Australia', '-37.87296700', '144.7555460', 'basketball', 0, 1, 4, '0000-00-00', '2016-05-08', 1),
(7, 'Carlton Flats', '145-147 Palmerston St\rMelbourne, Australia', '-37.79648300', '144.9700780', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(8, 'ton Gardens', 'Rathdowne St next to IMAX\rMelbourne, Australia', '-37.81410700', '144.9632800', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(9, 'Coburg Stadium', '24 Outlook Rd\rMelbourne, Australia', '-37.86511400', '145.1152130', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(10, 'Crossway Court', '2 The Crossway\rMelbourne, Australia', '-37.74656600', '144.8671910', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(11, 'Curtain Square', '29-49 Curtain St\rMelbourne, Australia', '-37.63872000', '145.1946130', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(12, 'Dalton Road Basketball Court', '400 Dalton Rd\rMelbourne, Australia', '-37.65594400', '145.0322110', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(13, 'Elizabeth Street', '110 Elizabeth St\rMelbourne, Australia', '-37.81542800', '144.9637890', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(14, 'Essendon Primary School Rim', '38 Raleigh St\rMelbourne, Australia', '-37.67735400', '144.8998300', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(15, 'F1 Pit Strait Court (under construction)', '38 Raleigh St\rMelbourne, Australia', '-37.67735400', '144.8998300', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(16, 'Gaffney Street Outdoor Court', '187-195 Gaffney St\rMelbourne, Australia', '-37.73404100', '144.9521850', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(17, 'Harcourt Street', '1-63 Harcourt St\rMelbourne, Australia', '-37.81877400', '145.0554060', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(18, 'JJ Holland Park', 'south kensington\rMelbourne, Australia', '-37.79443000', '144.9302670', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(19, 'Jockey Warm Up Hoop', 'Princes Hwy\rMelbourne, Australia', '-37.78762600', '144.9251360', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(20, 'Julier Reserve', '140-142 Dunstan Parade\rMelbourne, Australia', '-37.83688200', '144.9202360', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(21, 'Kirkwood Reserve', '1 Browning St Melbourne, Australia', '-37.71849500', '145.0337620', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(22, 'Liberty Avenue Reserve', '77 Liberty Ave\rMelbourne, Australia', '-37.93180300', '145.2428030', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(23, 'Macleod Station', 'Somers Ave\rMelbourne, Australia', '-37.72011700', '145.0737000', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(24, 'Melbourne University', 'Tin Alley\rMelbourne, Australia', '-37.79629500', '144.9615790', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(25, 'Mill Park Redleap Reserve', 'Moorhead Drive\rMelbourne, Australia', '-37.66132700', '145.0604570', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(26, 'Monash Parkville (Half Court)', 'Royal Parade Service Ln\rMelbourne, Australia', '-37.85029000', '145.2366320', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(27, 'Moubray St Primary', '52 Moubray St\rMelbourne, Australia', '-37.84220000', '144.9517030', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(28, 'MSAC, Melborne Sports and Aquatic Centre', '24-26 Canterbury Rd\rMelbourne, Australia', '-37.83088400', '145.1378100', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(29, 'Noone St Commission Flats', '168-174 Alexandra Parade\rMelbourne, Australia', '-37.79408800', '144.9932270', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(30, 'North Melbourne Community Centre', 'LOT 7 Boundary Road\rMelbourne, Australia', '-38.01031300', '145.1029230', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(31, 'North Melbourne Football Club Indoor and Outdoor', '204-206 Arden St\rMelbourne, Australia', '-37.79987000', '144.9417280', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(32, 'Northcote High School', '29 St Georges Rd\rMelbourne, Australia', '-37.77398000', '144.9891480', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(33, 'Parkville Story Street', '77 Story St\rMelbourne, Australia', '-37.79746600', '144.9560670', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(34, 'Patterson Lakes Primary School', '234 McLeod Road\rMelbourne, Australia', '-38.07089500', '145.1447000', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(35, 'Peanut Farm Reserve', 'Blessington Street\rMelbourne, Australia', '-37.87022000', '144.9811280', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(36, 'Pentridge Court', 'Grassland Avenue\rMelbourne, Australia', '-37.73925900', '144.9731220', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(37, 'Port Rim', '36 Graham St\rMelbourne, Australia', '-37.84397500', '144.9466650', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(38, 'Prahran Park', '244-288 Malvern Road Melbourne, Australia', '-37.84741400', '144.9964430', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(39, 'Princes Hill Secondary', '47-89 Arnold St\rMelbourne, Australia', '-37.78235300', '144.9653330', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(40, 'Racecourse Road', 'Flemington\rMelbourne, Australia', '-37.78813200', '144.9311830', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(41, 'Reed Street', '1-19 Reed St\rMelbourne, Australia', '-37.84475100', '144.9453930', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(42, 'RMIT 2', '357-375 Russell St\rMelbourne, Australia', '-37.80808600', '144.9653530', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(43, 'RMIT Street Court', '376 Bowen St\rMelbourne, Australia', '-37.80859400', '144.9639430', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(44, 'Robbies Backyard Rim', '1034 Mt Alexander Rd\rMelbourne, Australia', '-37.74935400', '144.9141760', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(45, 'Snake Alley Hoop', '317-339 George St\rMelbourne, Australia', '-37.79950200', '144.9812050', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(46, 'St Mary Star Of The Sea', 'Victoria St\rMelbourne, Australia', '-37.80726000', '144.9688890', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(47, 'Strathmore', '400 Pascoe Vale Rd\rMelbourne, Australia', '-37.73781600', '144.9279110', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(48, 'Strathmore North Primary School', '68 Mascoma St\rMelbourne, Australia', '-37.72522900', '144.9166960', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(49, 'Strathmore Primary School', '14-34 Lloyd St\rMelbourne, Australia', '-37.74413400', '145.0553020', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(50, 'Sunbury Downs Basketball Court?', '6 Reghon Dr\rMelbourne, Australia', '-37.58333200', '144.7036610', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(51, 'The ''Glasshouse'' (Melbourne Tigers)', '10-20 Olympic Blvd\rMelbourne, Australia', '-37.82408100', '144.9798260', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(52, 'The Crescent', 'South Kensington\rMelbourne, Australia', '-37.79443000', '144.9302670', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(53, 'Thornbury Victoria Road', '370 Victoria Rd\rMelbourne, Australia', '-37.80542800', '144.9539930', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(54, 'Uncle Buck', 'Little Buckingham St Melbourne, Australia', '-37.81432400', '145.0023240', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(55, 'Victory Park', '2 Victory Parade\rMelbourne, Australia', '-37.71855100', '144.8916270', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(56, 'Westbury Street', '11-37 Westbury St\rMelbourne, Australia', '-37.86115800', '144.9969040', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(57, 'Windsor Smith', '104A Union St\rMelbourne, Australia', '-37.85490700', '144.9898560', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(58, 'Monash Sport', '2 Princes Avenue, Caulfield East VIC 3145', '-37.87718500', '145.0430940', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(59, 'Recreational Turf Surfaces', 'Caulfield Nort VIC 3161', '-37.87262300', '145.0249020', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(60, 'Newturf Solutions', '675 Dandenong Rd, Malvern VIC 3144', '-37.86689000', '145.0297260', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(61, 'Glen Iris Primary', '170 Glen Iris Rd, Glen Iris VIC 3146', '-37.85990500', '145.0656360', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(62, 'Playfit Social Basketball Club', 'Inkerman St, St Kilda VIC 3182', '-37.86372900', '144.9819150', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(63, 'Lunch time Basketball', '253 Tucker Rd, Melbourne VIC 3204', '-37.90935900', '145.0525140', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(64, 'Warriors Basketball Club', '200 E Boundary Rd, East Bentleigh VIC 3186', '-37.91588100', '145.0605290', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(65, 'Bentleigh Secondary College', '4 Vivien St, Bentleigh East VIC 3165', '-37.92713000', '145.0594630', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(66, 'Kings Sports', '9 Viking Ct, Cheltenham VIC 3192', '-37.95126500', '145.0677990', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(67, 'Moorabbin Indoor Sports', '2/117 Cochranes Rd, Moorabbin VIC 3189', '-37.94404900', '145.0770810', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(68, 'Newturf Australia', '3/347 Bay Rd, Cheltenham VIC 3192', '-37.95616000', '145.0416190', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(69, 'Sabres Basketball', '150 Tulip St, Cheltenham VIC 3192', '-37.96432800', '145.0349240', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(70, 'Warrawee Park Oval', 'Oakleigh VIC 3166', '-37.89846000', '145.0883790', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(71, 'Oakleigh Recreation Centre', '2A Park Rd, Oakleigh VIC 3166', '-37.89256400', '145.0974920', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(72, 'Brickmakers Park', 'Oakleigh VIC 3166', '-37.89846000', '145.0883790', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(73, 'Waverley Basketball Association', 'Corner Batesford Road & Power Avenue, Chadstone VIC 3148', '-37.87650100', '145.0947620', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(74, 'Jordan Reserve', 'Chadstone VIC 3148', '-37.88787600', '145.0952030', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(75, 'Ashburton Pool & Recreation Centre', '8 Warner Ave, Ashburton VIC 3147', '-37.86678600', '145.0849630', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(76, 'Deakin Sport and Recreation - Burwood Fitness Centre', '221 Burwood Hwy, Burwood VIC 3125', '-37.84596900', '145.1146420', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(77, 'Nunawading Basketball Centre', 'Burwood Hwy, Burwood East VIC 3151', '-37.85189200', '145.1522760', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(78, 'Glenburn Tennis Club', 'Mulgrave St, Glen Waverley VIC 3150', '-37.86852700', '145.1612470', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(79, 'Highview Park', 'Glen Waverley VIC 3150', '-37.88065800', '145.1737690', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(80, 'Bialik College Gringlas Sports Centre', '21 Cato St, Hawthorn East VIC 3123', '-37.84290600', '145.0446830', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(81, 'Hawthorn Basketball Association', '20-26 Liddiard St, Hawthorn VIC 3122', '-37.81931600', '145.0379700', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(82, 'The Stephenson Centre', 'Xavier College, 135 Barkers Road, Kew VIC 3101', '-37.81132100', '145.0302620', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(83, 'Xavier College Tennis Courts', 'Gellibrand st, Kew VIC 3101', '-37.80931300', '145.0322720', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(84, 'Collingwood Basketball Association', 'Collingwood College, McCutcheon Way, Collingwood VIC 3066', '-37.80335800', '144.9899060', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(85, 'Monash Sport', 'Monash University Clayton campus, 42 Scenic Boulevard, Clayton VIC 3800', '-37.91263900', '145.1366260', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(86, 'Waverley Basketball Association', 'Corner Batesford Road & Power Avenue, Chadstone VIC 3148', '-37.88220800', '145.1069240', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(87, 'Glen Iris Primary', '170 Glen Iris Rd, Glen Iris VIC 3146', '-37.85990500', '145.0656360', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(88, 'Aqualink Box Hill', 'Surrey Dr, Box Hill VIC 3128', '-37.82514700', '145.1180750', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(89, 'Action Kids', '3/9 Clarice Rd, Box Hill S VIC 3128', '-37.83613800', '145.1313560', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(90, 'Kew Sports', '1393 Burke Rd, East Kew VIC 3102', '-37.79558700', '145.0624350', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(91, 'Balwyn Leisure Centre', '230 Balwyn Rd, Balwyn North VIC 3104', '-37.80171100', '145.0840300', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(92, 'Boroondara Sports Complex', '271C Belmore Rd, Balwyn North VIC 3104', '-37.80329600', '145.0867620', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(93, 'Bulleen Templestowe Basketball Club', '33 Sheahans Rd, Victoria 3105', '-37.75962400', '145.0931160', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(94, 'David Barro Stadium', '191 Bulleen Rd, Victoria 3105', '-37.77214300', '145.0775910', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(95, 'Westgarth basketball court', '8 Urquhart St, Northcote VIC 3070', '-37.78466300', '144.9970490', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(96, 'Westgarth Primary School', '311 Clarke St, Melbourne VIC 3070', '-37.77764200', '145.0064690', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(97, 'Olympic Leisure Centre', '15 Alamein Rd, Heidelberg West VIC 3081', '-37.74029900', '145.0406010', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(98, 'Darebin Community Sports Stadium', '857 Plenty Rd, Reservoir VIC 3073', '-37.72150500', '145.0298060', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(99, 'Bundoora Netball & Sports Centre', 'Building 203 RMIT University/McKimmies Road Bundoora VIC Australia, 3083', '-37.67767500', '145.0556990', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(100, 'Yallambie Park Basketball Court', '303 Yallambie Rd, Yallambie VIC 3085', '-37.72637800', '145.1041390', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(101, 'Diamond Valley Sports and Fitness Centre', '44 Civic Dr, Greensborough VIC 3088', '-37.68859800', '145.1117900', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(102, 'Parade College', '1436 Plenty Rd, Bundoora VIC 3083', '-37.69050900', '145.0645080', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(103, 'Mill Park Basketball Stadium', 'Mill Park VIC 3082', '-37.66786100', '145.0622520', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(104, 'Manningham Templestowe Leisure Centre', '1/3 Anderson St, Templestowe VIC 3106', '-37.75887900', '145.1299260', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(105, 'Doncaster Basketball', 'east 3109, 18 Leeds St, Doncaster East VIC 3109', '-37.79011300', '145.1520000', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(106, 'Manningham DISC', '360-368 Springvale Rd, Donvale VIC 3111', '-37.79937600', '145.1772000', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(107, 'Serpell Primary School', 'Tuckers Rd, Templestowe VIC 3106', '-37.77010000', '145.1548650', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(108, 'Nunawading Community Centre', '16-20 Silver Grove, Nunawading VIC 3131', '-37.82035300', '145.1736800', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(109, 'Basketball practice court', '', '-37.83666100', '145.1754860', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(110, 'The Rings', '362 Canterbury Rd, Ringwood VIC 3134', '-37.83246500', '145.2231830', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(111, 'Aquinas College', '46 Great Ryrie St, Ringwood VIC 3134', '-37.82246900', '145.2368120', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(112, 'Maroondah City Council', '304A Maroondah Hwy, Ringwood East VIC 3134', '-37.80835800', '145.2414100', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(113, 'Bayswater Indoor Soccer Centre', '13 Burton Ct, Bayswater VIC 3153', '-37.84587800', '145.2714550', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(114, 'Kilsyth Basketball', 'Kilsyth Sports Centre, 115 Liverpool Rd, Kilsyth VIC 3137', '-37.81205000', '145.3178500', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(115, 'Oxley Stadium', 'Old Melbourne Rd, Chirnside Park VIC 3116', '-37.76353500', '145.3014850', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(116, 'Knox Regional Netball Centre', '9 Dempster St, Ferntree Gully VIC 3156', '-37.88933000', '145.2786610', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(117, 'Rowville Community Centre', '40 Fulham Rd, Rowville VIC 3178', '-37.91969200', '145.2392930', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(118, 'Dandenong Stadium', '270 Stud Rd, Dandenong VIC 3175', '-37.96417700', '145.2266700', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(119, 'Hallam Tennis Club', 'Frawley Rd, Hallam VIC 3803', '-38.00133200', '145.2684620', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(120, 'Timbarra Community Stadium', '181-197 Parkhill Dr, Berwick VIC 3806', '-38.01732600', '145.3228030', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(121, 'Berwick Leisure Centre Ymca', '79 Manuka Rd, Berwick VIC 3806', '-38.02972600', '145.3660290', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(122, 'Casey Indoor Leisure Centre', '04 Terry Vickerman, 65 Berwick-Cranbourne Rd, Cranbourne East VIC 3977', '-38.11269700', '145.2966460', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(123, 'Sandhurst Club', '75 Sandhurst Blvd, Sandhurst VIC 3977', '-38.07903600', '145.2103820', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(124, 'Andrew Bogut Basketball', '9 Tova Dr, Carrum Downs VIC 3201', '-38.09973700', '145.1639670', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(125, 'Frankston & District Basketball Association', '90 Bardia Avenue, Seaford VIC 3196', '-38.12059200', '145.1339770', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(126, 'Monash University', 'McMahons Rd, Frankston VIC 3199', '-38.15401700', '145.1365510', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(127, 'Western Port Basketball Association', '14 Edward Street, Somerville VIC 3912', '-38.22531500', '145.1724250', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(128, 'Mornington District Basketball Association Inc.', '1051 Nepean Highway, Mornington VIC 3931', '-38.21852600', '145.0588200', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(129, 'Southern Peninsula Basketball Association', 'Old White Hill Road, Dromana VIC 3936', '-38.34315700', '145.0086670', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(130, 'Pakenham & District Basketball Association', '4 Olympic Way, Pakenham VIC 3810', '-38.06412600', '145.4584070', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(131, 'Jump Crazy Trampoline Park', '14/99 Bald Hill Rd, Pakenham VIC 3810', '-38.08663700', '145.4986390', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(132, 'Warrandyte Basketball Association', '1 Drysdale Rd, Warrandyte VIC 3113', '-37.75037800', '145.2026150', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(133, 'Eltham High School', '30-60 Withers Way, Eltham VIC 3095', '-37.72517800', '145.1416500', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(134, 'YMCA - Community Bank Stadium', '129-163 Hurstbridge Rd, Diamond Creek VIC 3089', '-37.67350400', '145.1655640', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(135, 'Craigieburn Leisure Centre', '127 Craigieburn Rd, Craigieburn VIC 3064', '-37.59879300', '144.9352030', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(136, 'Glenroy College', '120 Glenroy Rd, Glenroy VIC 3046', '-37.70532400', '144.9275650', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(137, 'Keilor Basketball Netball Stadium', 'Stadium Dr, Keilor Park VIC 3042', '-37.71313900', '144.8478910', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(138, 'Maribyrnong College', 'River St, Maribyrnong VIC 3032', '-37.77974100', '144.8881530', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(139, 'Victoria University Community Sports Stadium', '417 Barkly St, Melbourne VIC 3011', '-37.79913400', '144.8866850', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(140, 'Footscray City College', 'Kinnear St, Footscray VIC 3011', '-37.79101500', '144.8925970', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(141, 'Victoria University Aquatic & Fitness Centre', 'Ballarat Rd, Footscray VIC 3011', '-37.79385800', '144.9003550', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(142, 'The Hub at Docklands', '80 Harbour Esplanade, Docklands VIC 3008', '-37.81957100', '144.9471810', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(143, 'Melbourne Sports & Aquatic Centre', '30 Aughtie Dr, Melbourne VIC 3206', '-37.84230200', '144.9611250', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(144, 'MSAC Basketball', '375 Albert Rd, Melbourne VIC 3205', '-37.84221800', '144.9604120', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(145, 'Springers Leisure Centre', '400 Cheltenham Rd, Keysborough VIC 3173', '-37.99612300', '145.1541810', 'basketball', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(146, 'knox bbq', 'Knox City Council, Burwood Highway, Wantirna South, Victoria, Australia', '-37.86579116', '145.2472527', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(147, 'knox bbq', 'Knox City Council, Burwood Highway, Wantirna South, Victoria, Australia', '-37.87351530', '145.2398713', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(148, 'Knox bbq', 'Knox City Council, Burwood Highway, Wantirna South, Victoria, Australia', '-37.85427122', '145.2127488', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(149, 'bbq', 'Knox City Council, Burwood Highway, Melbourne, Victoria, Australia', '-37.87072895', '145.3165547', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(150, 'bayster bbq1', 'Bayswater, Melbourne, Victoria, Australia', '-37.83851750', '145.2682871', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(151, 'bayster bbq 2', 'Bayswater, Melbourne, Victoria, Australia', '-37.83536547', '145.2550263', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(152, 'Bayswater bbq', 'Bayswater, Melbourne, Victoria, Australia', '-37.82387466', '145.2540499', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(153, 'Pascow BBq 1', 'Pascoe Vale, Victoria, Australia', '-37.71298580', '144.9551159', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(154, 'BBq doncaster', 'Ruffey Lake Park, Templestowe, Victoria, Australia', '-37.77785732', '145.1447475', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(155, 'Haaliday bbq', 'Halliday Park, Mitcham, Victoria, Australia', '-37.81014730', '145.1927350', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(156, 'Greensborough bbq', 'Greensborough Park, Greensborough, Victoria, Australia', '-37.69995000', '145.1062043', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(157, 'derbian BBq', 'Darebin, Ivanhoe, Victoria, Australia', '-37.77306937', '145.0328352', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(158, 'BBq ivanhoe', 'Ivanhoe East Primary School, Warncliffe Road, Ivanhoe East, Victoria, Australia', '-37.77927560', '145.0607407', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(159, 'Ivan hoe BBQ', 'Ivanhoe East Primary School, Warncliffe Road, Ivanhoe East, Victoria, Australia', '-37.78870456', '145.0574791', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(160, 'BBq greythorn', 'Greythorn Park, Melbourne, Victoria, Australia', '-37.79770299', '145.0950611', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(161, 'caulfield BBq 1', 'Caulfield Park, Caulfield North, Victoria, Australia', '-37.87247050', '145.0337952', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(162, 'Caulfield bbq 2', 'Caulfield Park, Caulfield North, Victoria, Australia', '-37.87061574', '145.0291496', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(163, 'Hurlingham Park', 'Hurlingham Park, Melbourne, Victoria, Australia', '-37.91079427', '145.0152960', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(164, 'Allnut Park', 'Allnutt Park, Melbourne, Victoria, Australia', '-37.91384086', '145.0314679', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(165, 'Wattle Grove res', 'Allnutt Park, McKinnon, Victoria, Australia', '-37.90879593', '145.0352015', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(166, 'Mckinnon bbq', 'McKinnon Road, Melbourne, Victoria, Australia', '-37.91309786', '145.0517229', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(167, 'BBq tablot', 'Talbot Park, Oakleigh South, Victoria, Australia', '-37.92584573', '145.1051549', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(168, 'clayton bbq', 'Monash University Clayton Campus, Wellington Road, Clayton, Victoria, Australia', '-37.90979614', '145.1168453', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(169, 'central BBq', 'Glen Waverley, Victoria, Australia', '-37.89151538', '145.1605205', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(170, 'oak BBq 1', 'Oakleigh, Victoria, Australia', '-37.90441991', '145.0638314', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(171, 'Deepeden park BBq', 'Deepdene Park, Balwyn, Victoria, Australia', '-37.81231430', '145.0682889', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(172, 'deepdene 2', 'Deepdene Park, Balwyn, Victoria, Australia', '-37.81156841', '145.0576459', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(173, 'deepen den 3', 'Deepdene Park, Balwyn, Victoria, Australia', '-37.80119291', '145.0488912', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(174, 'hays padock', 'Deepdene Park, Balwyn, Victoria, Australia', '-37.78993419', '145.0579892', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(175, 'Central garden bbq', 'Garden Street, Hawthorn East, Victoria, Australia', '-37.83992386', '145.0492934', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(176, 'port melbourne BBQ', 'Murphy Reserve, Port Melbourne, Victoria, Australia', '-37.83333653', '144.9318480', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(177, 'St kilda', 'Point Ormond, Elwood, Victoria, Australia', '-37.87991760', '144.9768949', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(178, 'noberl park', 'Sandown Raceway Motor Racing Circuit, Springvale, Victoria, Australia', '-37.95793036', '145.1708857', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(179, 'sundown park 3', 'Sandown Raceway Motor Racing Circuit, Springvale, Victoria, Australia', '-37.96821613', '145.1748339', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(180, 'wachter reserve', 'Wachter Reserve, Keysborough, Victoria, Australia', '-37.99062756', '145.1736969', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(181, 'anderson park', 'Anderson Park, Hawthorn East, Victoria, Australia', '-37.83984500', '145.0486485', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(182, 'anderson park 2', 'Anderson Park, Hawthorn East, Victoria, Australia', '-37.85380697', '145.0596348', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(183, 'graythorn', 'Ronald E Gray Reserve, Nunawading, Victoria, Australia', '-37.80694090', '145.1796703', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(184, 'Mullana', 'Mullauna College, Springfield Road, Mitcham, Victoria, Australia', '-37.81070443', '145.1918860', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(185, 'walker park', 'Walker Park, Nunawading, Victoria, Australia', '-37.81683507', '145.1814560', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(186, 'edgerton rd', 'Antonio Park Primary School, Whitehorse Road, Mitcham, Victoria, Australia', '-37.81595015', '145.2072676', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(187, 'Antonio park 2', 'Antonio Park Primary School, Whitehorse Road, Mitcham, Victoria, Australia', '-37.81155965', '145.2121063', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(188, 'ringwood School Of Yoga', 'Ringwood Lake Park, Maroondah Highway, Ringwood, Victoria, Australia', '-37.81276406', '145.2368222', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(189, 'cheong park', 'Cheong Park, Croydon, Victoria, Australia', '-37.80959760', '145.2673664', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(190, 'cro=ydoan park', 'Swinburne TAFE, Croydon, Victoria, Australia', '-37.79728970', '145.2830685', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(191, 'silicon', 'Silcock Reserve, Croydon, Victoria, Australia', '-37.78749206', '145.2874137', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(192, 'warrien', 'Warrien Reserve, Croydon North, Victoria, Australia', '-37.77998835', '145.2850476', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(193, 'hughes', 'Hughes Park, Croydon North, Victoria, Australia', '-37.76797427', '145.2984870', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(194, 'huge park bbq', 'Hughes Park, Croydon North, Victoria, Australia', '-37.76794034', '145.2984870', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(195, 'Edwardes park 1', 'Edwardes Lake, Reservoir, Victoria, Australia', '-37.71320635', '144.9909406', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(196, 'edwaredes park 2', 'Edwardes Lake, Reservoir, Victoria, Australia', '-37.71405509', '144.9953395', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(197, 'Hary atkinson central', 'Coburg North Primary School, O''Hea Street, Coburg, Victoria, Australia', '-37.73347941', '144.9670626', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(198, 'cobourgh lake', 'Coburg Lake, Lake Grove, Coburg North, Victoria, Australia', '-37.73444196', '144.9690306', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(199, 'allard park', 'Allard Park, Brunswick East, Victoria, Australia', '-37.76208880', '144.9791655', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(200, 'fleming park bbq', 'Moreland City Band, Fleming Park, Cross Street, Brunswick East, Victoria, Australia', '-37.77008353', '144.9768185', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(201, 'maethven park', 'Methven Park, Brunswick East, Victoria, Australia', '-37.77150832', '144.9728124', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(202, 'jeet bb1', 'Jack Roper Reserve, Camp Road, Broadmeadows, Victoria, Australia', '-37.69260675', '144.9364727', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(203, 'Montgomery park', 'Montgomery Street, Moonee Ponds, Victoria, Australia', '-37.75629739', '144.9306695', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(204, 'dustan park', 'Dunstan Reserve, Brunswick West, Victoria, Australia', '-37.75407621', '144.9387755', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(205, 'salomon reserve', 'Salmon Reserve, Strathmore, Victoria, Australia', '-37.74192517', '144.9111047', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(206, 'sakmon 2', 'Salmon Reserve, Essendon, Victoria, Australia', '-37.74331655', '144.9112763', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(207, 'allison park', 'Cliff Allison Park, Essendon, Victoria, Australia', '-37.74797263', '144.9152268', 'bbq', 0, 3, 12, '0000-00-00', '2016-05-08', 1),
(208, 'alf pearce park', 'Alf Pearce Park, Strathmore, Victoria, Australia', '-37.73429220', '144.9106056', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(209, 'essendon airport', 'Essendon Airport, English Street, Essendon Fields, Victoria, Australia', '-37.71404120', '144.9003554', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(210, 'AJ davis reserve', 'A J Davis Reserve, Airport West, Victoria, Australia', '-37.72700479', '144.8705480', 'bbq', 0, 1, 4, '0000-00-00', '2016-05-08', 1),
(211, 'cannings reserve BBq', 'Canning Reserve, Canning Street, Avondale Heights, Victoria, Australia', '-37.76876451', '144.8725182', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(212, 'Hanmer reserve', 'Hanmer Reserve, Yarraville, Victoria, Australia', '-37.81418545', '144.8977327', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(213, 'newport bbq', 'Newport Lakes Native Nursery Gagin, Newport, Victoria, Australia', '-37.84010076', '144.8707871', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(214, 'Keilor Park', 'Keilor Heights Primary School, Ronald Grove, Keilor East, Victoria, Australia', '-37.71970260', '144.8546260', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(215, 'Keilor Park', 'Keilor Heights Primary School, Ronald Grove, Keilor East, Victoria, Australia', '-37.73938099', '144.8553469', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(216, 'keilor 2', 'Keilor Primary School, Kennedy Street, Keilor, Victoria, Australia', '-37.71030614', '144.8396436', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(217, 'niddrie lake', 'Niddrie Lake, Keilor East, Victoria, Australia', '-37.73953287', '144.8751843', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(218, 'keilor 4', 'Rosehill Park, Keilor East, Victoria, Australia', '-37.74870728', '144.8724240', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(219, 'Thompson strret reserve', 'Thompson Street Reserve, Avondale Heights, Victoria, Australia', '-37.77086058', '144.8526356', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(220, 'Keilor spots', 'Keilor Park Sports Club, Stadium Drive, Keilor Park, Victoria, Australia', '-37.71501203', '144.8580973', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(221, 'near keilor', 'Keilor Football Club, Old Calder Highway, Keilor, Victoria, Australia', '-37.71717342', '144.8231883', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(222, 'keilor spots', 'Keilor, Victoria, Australia', '-37.72498179', '144.8242389', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(223, 'Lyndan park', 'Lynden Park, Lynden Street, Camberwell, Victoria, Australia', '-37.84347921', '145.0857570', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(224, 'Highfield park BBq', 'Highfield Park, Camberwell, Victoria, Australia', '-37.83616879', '145.0848361', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(225, 'wattl park', 'Wattle Park Public Golf Course, Burwood, Victoria, Australia', '-37.83891970', '145.1056946', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(226, 'burwood', 'Burwood, Victoria, Australia', '-37.84431175', '145.1173576', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(227, 'Howard dawson bbq', 'Howard Dawson Reserve, Glen Iris, Victoria, Australia', '-37.85078521', '145.0553413', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(228, 'MOunt waverely', 'Huntingtower School, Waimarie Drive, Mount Waverley, Victoria, Australia', '-37.87943809', '145.1358948', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(229, 'monash 22', 'Monash University Clayton Campus, Wellington Road, Clayton, Victoria, Australia', '-37.91096427', '145.1319407', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(230, 'east caulfield', 'East Caulfield Reserve, Dudley Street, Caulfield East, Victoria, Australia', '-37.87944999', '145.0462682', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(231, 'Heatherton', 'Le Page Park, Argus Street, Cheltenham, Victoria, Australia', '-37.95976644', '145.0710673', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(232, 'Norman luth reserve', 'Norman Luth Reserve, Springvale, Victoria, Australia', '-37.95500611', '145.1409235', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(233, 'The grange reserve', 'The Grange Reserve, Clayton South, Victoria, Australia', '-37.94595206', '145.1312131', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(234, 'Keeley Park', 'Westall Road, Clayton South, Victoria, Australia', '-37.93628146', '145.1269820', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(235, 'namatjira reserve', 'Namatjira Reserve, Clayton South, Victoria, Australia', '-37.93320781', '145.1102893', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(236, 'Clayton Bowling club', 'Keys Road Reserve, Cheltenham, Victoria, Australia', '-37.95146357', '145.0690665', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(237, 'Heighett reserve', 'Highett Reserve, Highett, Victoria, Australia', '-37.95099210', '145.0560757', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(238, 'sir william fry reserve', 'Sir William Fry Reserve, Highett, Victoria, Australia', '-37.95512203', '145.0487021', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(239, 'lyle anderson reserve', 'Highett Grove, Highett, Victoria, Australia', '-37.95186234', '145.0432850', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(240, 'peterson street reserve', 'Peterson Street Reserve, Highett, Victoria, Australia', '-37.94564915', '145.0259996', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(241, 'GL basterfield Park', 'G L Basterfield Park, Hampton East, Victoria, Australia', '-37.94002060', '145.0321438', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(242, 'Gr bricker reserve', 'G R Bricker Reserve, Moorabbin, Victoria, Australia', '-37.94104431', '145.0536732', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(243, 'Thomas street south reserve', 'Thomas Street Reserve, Hampton, Victoria, Australia', '-37.94085030', '145.0173226', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(244, 'Chelthenham Park', 'Cheltenham Park, Cheltenham, Victoria, Australia', '-37.96529854', '145.0517218', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(245, 'chelthenham park', 'Cheltenham Park, Cheltenham, Victoria, Australia', '-37.98219656', '145.0252001', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(246, 'Barbeque - Enterprize Park', '1-13 William St, Melbourne VIC 3000, Australia', '-37.82023907', '144.9599104', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(247, 'Barbeque - Barbeque (Docklands - not categorised)', '1-47 Harbour Esplanade, Docklands VIC 3008, Australia', '-37.82198673', '144.9472706', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(248, 'Barbeque - Brick Single Hotplate', '2A Spencer St, Melbourne VIC 3000, Australia', '-37.82178752', '144.9572679', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(249, 'Barbeque - Urban Design Single Hotplate', '262-264 Sturt St, Southbank VIC 3006, Australia', '-37.82997401', '144.9651600', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(250, 'Barbeque - Urban Design Double Hotplate', 'Capital City Trail, Melbourne VIC 3004, Australia', '-37.82778303', '144.9829530', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(251, 'Barbeque - Bluestone Double Hotplate', '105-127 Haines St, North Melbourne VIC 3051, Australia', '-37.79903182', '144.9434318', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(252, 'Barbeque - Urban Design Single Hotplate', '14H Calwell St, Kensington VIC 3031, Australia', '-37.78854743', '144.9262295', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(253, 'Barbeque - Urban Design Double Hotplate - Alexandra Park', 'Capital City Trail, Melbourne VIC 3004, Australia', '-37.82412642', '144.9775265', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(254, 'Barbeque - Urban Design Double Hotplate', 'Capital City Trail, Melbourne VIC 3004, Australia', '-37.82727010', '144.9811924', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(255, 'Barbeque - Urban Design Single Hotplate', '1 Elliott Ave, Parkville VIC 3052, Australia', '-37.78697855', '144.9529576', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(256, 'Barbeque - Urban Design Double Hotplate', '132B Kensington Rd, Kensington VIC 3031, Australia', '-37.79794614', '144.9214202', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(257, 'Barbeque - Urban Design Double Hotplate - Warun Biik Park', '78 Clifford Terrace, Kensington VIC 3031, Australia', '-37.79622324', '144.9266474', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(258, 'Barbeque - Urban Design Single Hotplate', '60 Altona St, Kensington VIC 3031, Australia', '-37.79780444', '144.9260951', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(259, 'Barbeque - Urban Design Single Hotplate', '12-92 Galada Ave, Parkville VIC 3052, Australia', '-37.77948642', '144.9398602', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(260, 'Barbeque - Urban Design Double Hotplate - Alexandra Park', 'Capital City Trail, Melbourne VIC 3004, Australia', '-37.82462242', '144.9779459', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(261, 'Barbeque - Fawkner Park Toddler Play Space', '65 Toorak Rd, South Yarra VIC 3141, Australia', '-37.83916336', '144.9806670', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(262, 'Barbeque - Urban Design Single Hotplate', '1 Southbank Blvd, Southbank VIC 3006, Australia', '-37.82074203', '144.9625030', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(263, 'Barbeque - Unknown model - JJ Holland Park', '108-110 Kensington Rd, Kensington VIC 3031, Australia', '-37.79744246', '144.9233707', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(264, 'Barbeque - Brick Single Hotplate', 'LOT 9 Buncle St, North Melbourne VIC 3051, Australia', '-37.79363713', '144.9403181', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(265, 'Barbeque - Urban Design Double Hotplate', 'Capital City Trail, Melbourne VIC 3004, Australia', '-37.82768004', '144.9824170', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(266, 'Barbeque - Urban Design Double Hotplate - Royal Park', '10 Brens Dr, Parkville VIC 3052, Australia', '-37.78545233', '144.9461880', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(267, 'Barbeque - Urban Design Double Hotplate', 'Peel St, West Melbourne VIC 3003, Australia', '-37.80957101', '144.9548589', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(268, 'Barbeque - Urban Design Double Hotplate Spanning Two Units - Alexandra Park', 'Burnley Tunnel, Melbourne VIC 3004, Australia', '-37.82426005', '144.9776466', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(269, 'Barbeque - Urban Design Double Hotplate', 'Capital City Trail, Parkville VIC 3052, Australia', '-37.78305874', '144.9443604', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(270, 'Barbeque - Barbeque (Docklands - not categorised)', '509/13 Point Park Cres, Docklands VIC 3008, Australia', '-37.82306496', '144.9418028', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(271, 'Barbeque - Urban Design Double Hotplate', '24-88 Commercial Rd, South Yarra VIC 3141, Australia', '-37.84238715', '144.9819082', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(272, 'Barbeque - Urban Design Single Hotplate', 'Elliott Ave, Parkville VIC 3052, Australia', '-37.78998720', '144.9450234', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(273, 'Barbeque - Urban Design Single Hotplate', 'Capital City Trail, Melbourne VIC 3004, Australia', '-37.81982134', '144.9748017', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(274, 'Barbeque - Urban Design Single Hotplate - Fawkner Park', '585-599 Punt Rd, South Yarra VIC 3141, Australia', '-37.84077622', '144.9839388', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(275, 'Barbeque - Brick Single Hotplate', '2A Spencer St, Melbourne VIC 3000, Australia', '-37.82177561', '144.9572878', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(276, 'Barbeque - Unknown Barbeque Type', '55 Victoria Harbour Promenade, Docklands VIC 3008, Australia', '-37.81889052', '144.9427550', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(277, 'Barbeque - Urban Design Single Hotplate', '121 Princes Park Dr, Carlton North VIC 3054, Australia', '-37.78507621', '144.9624290', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(278, 'Barbeque - Barbeque (Docklands - not categorised)', 'Navigation Dr, Docklands VIC 3008, Australia', '-37.82086901', '144.9465319', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(279, 'Barbeque - Urban Design Double Hotplate', 'Capital City Trail, Melbourne VIC 3004, Australia', '-37.82736307', '144.9814380', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(280, 'Barbeque - Urban Design Single Hotplate', '41 Bayswater Rd, Kensington VIC 3031, Australia', '-37.79375199', '144.9240406', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(281, 'Barbeque - Urban Design Double Hotplate', 'Capital City Trail, Melbourne VIC 3004, Australia', '-37.82753298', '144.9819081', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(282, 'Barbeque - Urban Design Double Hotplate', '51 Oak St, Parkville VIC 3052, Australia', '-37.78291659', '144.9436255', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(283, 'Barbeque - Urban Design Double Hotplate', 'Capital City Trail, Melbourne VIC 3004, Australia', '-37.82744680', '144.9816752', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(284, 'Barbeque - Urban Design Single Hotplate', '11 Old Poplar Rd, Parkville VIC 3052, Australia', '-37.78200107', '144.9566318', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(285, 'Barbeque - Barbeque (Docklands - not categorised)', '509/13 Point Park Cres, Docklands VIC 3008, Australia', '-37.82310280', '144.9418950', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(286, 'Barbeque - Urban Design Single Hotplate', '238-242 Bellair St, Kensington VIC 3031, Australia', '-37.79557202', '144.9307855', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(287, 'Barbeque - Urban Design Single Hotplate', '60 Altona St, Kensington VIC 3031, Australia', '-37.79782183', '144.9260743', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(288, 'Barbeque - Urban Design Single Hotplate', '121 Princes Park Dr, Carlton North VIC 3054, Australia', '-37.78503900', '144.9622264', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(289, 'Barbeque - Urban Design Double Hotplate', '70 Import Ln, Docklands VIC 3008, Australia', '-37.82045824', '144.9449401', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(290, 'Barbeque - Urban Design Double Hotplate Spanning Two Units - Alexandra Park', 'Capital City Trail, Melbourne VIC 3004, Australia', '-37.82444423', '144.9778024', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(291, 'Barbeque - Urban Design Single Hotplate', '100 Batman Ave, Melbourne VIC 3000, Australia', '-37.82009382', '144.9751031', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(292, 'Barbeque - Urban Design Single Hotplate', '276-280 Sturt St, Southbank VIC 3006, Australia', '-37.82964804', '144.9649660', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(293, 'Barbeque - Urban Design Single Hotplate', '1 Elliott Ave, Parkville VIC 3052, Australia', '-37.78681162', '144.9529508', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(294, 'Barbeque - Urban Design Double Hotplate - Alexandra Park', 'Capital City Trail, Melbourne VIC 3004, Australia', '-37.82452210', '144.9778661', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(295, 'Barbeque - Urban Design Double Hotplate', 'Capital City Trail, Melbourne VIC 3004, Australia', '-37.82773338', '144.9826847', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(296, 'Barbecue - Fawkner Park Toddler Play Space', '65 Toorak Rd, South Yarra VIC 3141, Australia', '-37.83921823', '144.9807240', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(297, 'Barbeque - Urban Design Double Hotplate', 'Capital City Trail, Melbourne VIC 3004, Australia', '-37.82785043', '144.9834050', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(298, 'Barbeque - Barbeque (Docklands - not categorised)', 'Navigation Dr, Docklands VIC 3008, Australia', '-37.81964344', '144.9460734', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(299, 'Barbeque - Docklands Barbeque - All Chromed - Docklands Community Gardens', '70 Geographe St, Docklands VIC 3008, Australia', '-37.82054853', '144.9453220', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(300, 'Barbeque - Enterprize Park', '1-13 William St, Melbourne VIC 3000, Australia', '-37.82023907', '144.9599104', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(301, 'Barbeque - Urban Design Single Hotplate', '262-264 Sturt St, Southbank VIC 3006, Australia', '-37.82997401', '144.9651600', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(302, 'Barbeque - Urban Design Single Hotplate', '262-264 Sturt St, Southbank VIC 3006, Australia', '-37.82997401', '144.9651600', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(303, 'LIONS PARK AND THE ISLAND', 'Cameron Rd, Anglesea, VIC, 3230, Australia', '-38.40942991', '144.1919849', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(304, 'WATERFORD PARK ESTATE RESERVE', 'Waterford Park Avenue, Knoxfield, VIC, 3180, Australia', '-37.90232720', '145.2569610', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(305, 'Burnside Heights Recreation Reserve', 'Tenterfield Drive, Burnside Heights, VIC, 3023, Australia', '-37.73004617', '144.7617434', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(306, 'Caroline Springs Town Centre Lake', 'Lake St, Caroline Springs, Victoria, Australia', '-37.73266783', '144.7448534', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(307, 'Peppercress Street Reserve', 'Peppercress St, Diggers Rest, VIC, 3427, Australia', '-37.61781558', '144.7087607', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1);
INSERT INTO `location` (`Location_ID`, `Title`, `Address`, `Latitude`, `Longitude`, `Category`, `post_id`, `rating_number`, `total_points`, `created_at`, `modified_at`, `status`) VALUES
(308, 'Bendigo Drive Reserve', 'Bendigo Dr, Eynesbury, VIC, 3338, Australia', '-37.78933843', '144.5589860', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(309, 'Peppercress Street Reserve second', 'Peppercress St, Diggers Rest, VIC, 3427, Australia', '-37.61806203', '144.7078702', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(310, 'Hannah Watts Park', 'Hannah Watts Park, Melton, Victoria, Australia', '-37.68372470', '144.5920188', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(311, 'Arthur Westlakes Reserve', 'Bulmans Rd, Melton West, VIC, 3337, Australia', '-37.66549989', '144.5490108', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(312, 'Navan Park', 'navan park, Galilee Boulevard, Melton West, Victoria, Australia', '-37.67097560', '144.5677329', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(313, 'Aspire Boulevard Reserve', 'Aspire, Reserve Road, Cheltenham, Victoria, Australia', '-37.96124027', '145.0371910', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(314, 'Taylors Hill All Abilities Playspace', '104 Taylors Hill Blvd, Taylors Hill, VIC, 3037, Australia', '-37.70765138', '144.7447727', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(315, 'Dandenong Park', 'Dandenong Park, Dandenong, Victoria, Australia', '-37.99407540', '145.2183257', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(316, 'Dawn Reserve', '27 - 35 Dawn Avenue, Dandenong, Victoria, Australia', '-37.99508300', '145.2021940', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(317, 'Fotheringham Reserve', 'Fotheringham Reserve, Dandenong, Victoria, Australia', '-37.97525090', '145.1945091', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(318, 'Hemmings Park', 'Hemmings Park, Dandenong, Victoria, Australia', '-37.98107220', '145.2083150', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(319, 'Keneally Reserve', 'Keneally Street, Dandenong South, Victoria, Australia', '-37.99353623', '145.2039961', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(320, 'Keshava Reserve', '28 Keshava Grove, Dandenong, Victoria, Australia', '-37.99949424', '145.1963832', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(321, 'Norine Cox Reserve', '2 Patchell Road, Dandenong, Victoria, Australia', '-38.00014300', '145.2036700', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(322, 'Lois Twohig Reserve', 'Lois Twohig Reserve, Carlton Road, Dandenong North, Victoria, Australia', '-37.96250340', '145.2167367', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(323, 'Allan Corrigan Reserve', '336-342 Corrigan Road, Keysborough, Victoria, Australia', '-37.98391378', '145.1641017', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(324, 'Keysborough Parish Resurrection', '402 - 418 Corrigan Road, Keysborough, Victoria, Australia', '-37.99002691', '145.1601607', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(325, 'Keysborough Reserve', 'Keysborough Reserve, Keysborough, Victoria, Australia', '-37.99435370', '145.1672490', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(326, 'Roth Hetherington Botanic Gardens', 'Kingsclere Ave, Keysborough, Victoria, Australia', '-37.98422666', '145.1681188', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(327, 'Tatterson Park', 'Tatterson Park, Keysborough, Victoria, Australia', '-37.99797630', '145.1555195', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(328, 'Racecourse Reserve', '2 Racecourse Road, Noble Park, Victoria, Australia', '-37.95009552', '145.1741869', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(329, 'Ross Reserve', 'Ross Reserve, Noble Park, Victoria, Australia', '-37.96120610', '145.1727694', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(330, 'G J Duggan Reserve', 'G J Duggan Reserve, Noble Park North, Victoria, Australia', '-37.94712070', '145.1889874', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(331, 'Norman Luth Reserve', 'Norman Luth Reserve, Springvale, Victoria, Australia', '-37.95416860', '145.1406875', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(332, 'Warner Reserve', 'Warner Reserve, Springvale, Victoria, Australia', '-37.94650820', '145.1603491', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(333, 'Alex Wilkie Nature Reserve', 'Alex Wilkie Nature Reserve, Springvale South, Victoria, Australia', '-37.97338990', '145.1533715', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(334, 'Amersham Reserve', 'Amersham Avenue, Springvale South, Victoria, Australia', '-37.96436854', '145.1470523', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(335, 'Burden Park', 'Burden Street, Springvale, Victoria, Australia', '-37.93958515', '145.1466936', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(336, 'Spring Valley Reserve', 'Springvale South, VIC, 3172, Australia', '-37.97133591', '145.1459220', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(337, 'Victory Park', 'Bath St, Chelsea, VIC, 3196, Australia', '-38.05424848', '145.1142006', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(338, 'Peter Scullin Reserve', 'Peter Scullin Reserve, Mordialloc, Victoria, Australia', '-38.00794660', '145.0841423', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(339, 'Kingston Heath Reserve', 'Kingston Heath Reserve, Cheltenham, Victoria, Australia', '-37.96741050', '145.0872731', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(340, 'Turner Road Reserve', 'Turner Rd, Highett, VIC, 3190, Australia', '-37.95124602', '145.0525501', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(341, 'Official opening of Carrum Surf Life Saving Club', '15 Old Post Office Ln, Carrum, VIC, 3197, Australia', '-38.07638840', '145.1212292', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(342, 'AK Lines Reserve', 'A K Lines Reserve, Watsonia, Victoria, Australia', '-37.70420310', '145.0875891', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(343, 'Aminya Reserve', 'Aminya Reserve, Watsonia, Victoria, Australia', '-37.71256100', '145.0781108', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(344, 'Anthony Beale Reserve', 'Anthony Beale Reserve, Saint Helena, Victoria, Australia', '-37.69164840', '145.1258580', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(345, 'Banksia Island Reserve', '275 Upper Heidelberg Rd, Ivanhoe, VIC, 3079, Australia', '-37.76577952', '145.0453956', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(346, 'Banyule Flats Reserve', 'Banyule Flats Reserve, Viewbank, Victoria, Australia', '-37.75037400', '145.0865551', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(347, 'Burke Road North Reserve', 'Burke Rd, Melbourne, Victoria, Australia', '-37.85296171', '145.0533613', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(348, 'Fotini Gardens', 'Fotini Garden, Bundoora, Victoria, Australia', '-37.69577660', '145.0685623', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(349, 'Greensborough War Memorial Park', 'War Memorial Park, Greensborough, Victoria, Australia', '-37.70617140', '145.0986198', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(350, 'Haward Walkway', 'Haward Walkway, Rosanna, Victoria, Australia', '-37.74630600', '145.0643592', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(351, 'Heidelberg Park and Heidelberg Park Rotunda', 'Heidelberg, VIC, 3084, Australia', '-37.75618039', '145.0703466', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(352, 'Ivanhoe Park', 'Ivanhoe Park, Ivanhoe East, Victoria, Australia', '-37.77281660', '145.0517493', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(353, 'Kalparrin Gardens', 'Kalparrin Gardens, Greensborough, Victoria, Australia', '-37.69856110', '145.0986198', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(354, 'Loyola Reserve', 'Loyola Reserve, Bundoora, VIC, 3083, Australia', '-37.70352380', '145.0751813', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(355, 'Macleod Reserve', 'Aberdeen Road, Macleod, VIC, 3085, Australia', '-37.72733881', '145.0700301', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(356, 'Malahang Reserve', 'Malahang Reserve, Heidelberg West, Victoria, Australia', '-37.74276910', '145.0441697', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(357, 'Malcolm Blair Reserve', 'Malcolm Blair Reserve Dog Park, Greensborough, Victoria, Australia', '-37.70383500', '145.1272371', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(358, 'Mental Health Reserve', '220-266 Greenwood Drive, Bundoora, VIC, 3083, Australia', '-37.70817470', '145.0752243', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(359, 'Montmorency Park', '83 Para Road, Montmorency, VIC, 3094, Australia', '-37.71812303', '145.1128209', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(360, 'Nellie Ibbott Park', 'Nellie Ibbott Reserve, Ivanhoe, VIC, 3079, Australia', '-37.76841610', '145.0374520', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(361, 'Pioneer Reserve', 'Campbell Hill Pioneer Reserve, Guildford, New South Wales, Australia', '-33.86908310', '151.0027470', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(362, 'Poulter Reserve', 'Diamond Valley Dog Obedience Club Inc., Greensborough, Victoria, Australia', '-37.70404070', '145.1096519', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(363, 'Price Park', 'Price Park, Viewbank, VIC, 3084, Australia', '-37.73615720', '145.0868998', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(364, 'Ramu Parade Reserve', 'Ramu Parade Reserve, Heidelberg West, Victoria, Australia', '-37.73574650', '145.0476149', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(365, 'Seddon Reserve', 'Seddon Reserve, Ivanhoe, VIC, 3079, Australia', '-37.76546870', '145.0317683', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(366, 'V.C Henderson Reserve', 'V.C Henderson Reserve, Rill Street, Heidelberg, Victoria, Australia', '-37.74960500', '145.0621620', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(367, 'Warrawee Park', 'Warrawee Park Oval, Oakleigh, Victoria, Australia', '-37.89641090', '145.0889679', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(368, 'Warringal Parklands', 'Warringal Parklands, Heidelberg, Victoria, Australia', '-37.75184940', '145.0779385', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(369, 'King William Reserve', 'King William St, Melbourne VIC 3068', '-37.80222120', '144.9767044', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(370, 'Gahan Reserve', 'Gahan Reserve, Park Street, Abbotsford, Victoria, Australia', '-37.80347700', '144.9944250', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(371, 'Golden Square Bicentennial Park', 'Golden Square Bicentennial Park, Stawell Street, Burnley, Victoria, Australia', '-37.82829000', '145.0094190', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(372, 'Darling Gardens', 'Darling Gardens, South Yarra, Victoria, Australia', '-37.83421840', '144.9919925', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(373, 'George Knott Reserve', 'George Knott Reserve, Heidelberg Road, Melbourne, Victoria, Australia', '-37.78401100', '145.0026220', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(374, 'Quarries Park', 'The Quarries Park, Clifton Hill, Victoria, Australia', '-37.79003150', '145.0042160', 'bbq', 0, 4, 17, '0000-00-00', '2016-05-08', 1),
(375, 'Cambridge Street Reserve', 'Cambridge Street Reserve, Cambridge Street, Maidstone, Victoria, Australia', '-37.78211260', '144.8720046', 'bbq', 0, 8, 31, '0000-00-00', '2016-05-08', 1),
(376, 'Williams Reserve', '1245 E Prairie Brook Dr, Palatine, IL 60074, United States', '42.13142730', '-88.0135796', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(377, 'Citizens Park', 'Citizens Park, Richmond, Victoria, Australia', '-37.81690400', '145.0007726', 'bbq', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(378, 'Curtain Square', 'Curtain St, Carlton North, Victoria, 3054, Australia', '-37.78884690', '144.9725108', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(379, 'WT Peterson Oval', 'WT Peterson Oval, Brunswick Street, Fitzroy North, Victoria, Australia', '-37.78910170', '144.9808036', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(380, 'Citizens Park', 'Highett Street, Richmond, Victoria, 3121, Australia', '-37.81598220', '145.0002128', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(381, 'JL Murphy Reserve', 'Murphy Reserve, Williamstown Road, Port Melbourne, Victoria, Australia', '-37.83554370', '144.9224596', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(382, 'Lagoon Reserve', 'Lagoon Reserve, Port Melbourne, VIC, 3207, Australia', '-37.84102730', '144.9441488', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(383, 'Gasworks Park', '21 Graham St, Albert Park, VIC, 3206, Australia', '-37.84369730', '144.9465305', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(384, 'Garden City Reserve', 'Garden City Reserve, Port Melbourne, VIC, 3207, Australia', '-37.83684390', '144.9305579', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(385, 'Flockhart Reserve', 'Flockhart St, Abbotsford, Victoria, 3067, Australia', '-37.80898100', '145.0074583', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(386, 'Albert Park', 'Aughtie Dr, Melbourne, Victoria, 3004, Australia', '-37.84621970', '144.9659680', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(387, 'Fawkner Park', 'Pasley St, South Yarra, VIC, 3141, Australia', '-37.84296560', '144.9843945', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(388, 'Como Park North', '355 Williams Rd N, South Yarra, VIC, 3141, Australia', '-37.83336900', '145.0054250', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(389, 'Middle Park Beach', 'Middle Beach, Middle Park, Victoria, Australia', '-37.85165060', '144.9558535', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(390, 'Travancore Park', 'Travancore Park, Travancore, VIC, 3032, Australia', '-37.78021750', '144.9374391', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(391, 'Burnley Park', 'Burnley Gardens, 500 Yarra Boulevard, Burnley, VIC, 3121, Australia', '-37.82945020', '145.0225355', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(392, 'Pridmore Park', 'Mason St, Hawthorn, Victoria, 3122, Australia', '-37.81661900', '145.0181274', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(393, 'Balfe Park', 'Brunswick East, VIC, 3057, Australia', '-37.76801650', '144.9778494', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(394, 'Princes Gardens', 'Princes Gardens, Prahran, Vit_ria, Australia', '-37.84720220', '144.9959182', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(395, 'Methven Park', 'Methven Park, Brunswick East, VIC, 3057, Australia', '-37.77125390', '144.9734025', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(396, 'Yarra Bend Park', 'Yarra Bend Park, Melbourne, Victoria, Australia', '-37.79405970', '145.0103998', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(397, 'Sumner Park', 'Sumner Park, Brunswick East, Victoria, Australia', '-37.77343260', '144.9858362', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(398, 'Gilpin Park', 'Gilpin Park, Brunswick, Victoria, Australia', '-37.76853760', '144.9512032', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(399, 'Merri Park', 'Merri Park, Northcote, Victoria, Australia', '-37.77227380', '144.9863118', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(400, 'St Kilda West Beach', '1 Cowderoy St St Kilda West VIC 3182', '-37.86007030', '144.9754218', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(401, 'Kirkdale Park', 'Kirkdale Street, Brunswick East, Victoria, Australia', '-37.77008790', '144.9820448', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(402, 'Fleming Park', 'Fleming Park, Brunswick East, VIC, 3057, Australia', '-37.76952980', '144.9756400', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(403, 'Brookville Gardens', 'Brookville Gardens, Toorak, VIC, 3142, Australia', '-37.84560530', '145.0092092', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(404, 'Phillips Reserve', 'Phillips Reserve, Brunswick East, Victoria, Australia', '-37.77017090', '144.9835577', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(405, 'Victoria Gardens', 'Victoria Street, Richmond, Victoria, Australia', '-37.81086560', '145.0036805', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(406, 'Clifton Park (Brunswick)', 'Clifton Park, Brunswick, Victoria, Australia', '-37.76655140', '144.9539563', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(407, 'Yarraville Gardens', 'Yarraville Gardens, Yarraville, Victoria, Australia', '-37.81382050', '144.8989117', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(408, 'Footscray Park', 'Footscray Park, Maribyrnong Boulevard, Footscray, VIC, 3011, Australia', '-37.79357150', '144.9054463', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(409, 'Foley Park', 'Foley Park, Foley Pl, Mill Park, VIC, 3082, Australia', '-37.66054400', '145.0815142', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(410, 'Reaburn Reserve', 'Pearson St, Brunswick West, VIC, 3055, Australia', '-37.76467940', '144.9494281', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(411, 'Braddy Reserve', 'Braddy Reserve, Brunswick West, VIC, 3055, Australia', '-37.76295660', '144.9386434', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(412, 'Jones Park', 'Albion Street, Brunswick East, VIC, 3057, Australia', '-37.76178024', '144.9792765', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(413, 'Roberts Reserve', 'Roberts Reserve, Brunswick East, Victoria, Australia', '-37.76070440', '144.9814921', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(414, 'Orrong park', 'Orrong Park, Prahran, Victoria, Australia', '-37.85077240', '145.0111032', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(415, 'Boroondara Park', 'Boroondara Park, Canterbury, Victoria, Australia', '-37.82423440', '145.0689781', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(416, 'Victory Square', 'Victory Square, Armadale, Victoria, Australia', '-37.85278670', '145.0140305', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(417, 'All Nations Park', 'All Nations Park, Northcote, Victoria, Australia', '-37.76858350', '145.0073152', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(418, 'Peanut Farm Reserve', 'Peanut Farm Reserve, Saint Kilda, Victoria, Australia', '-37.86973170', '144.9783939', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(419, 'Abrahams Reserve', 'Broadwater Bushland Reserve, Orford, VIC, 3284, Australia', '-38.21054300', '142.0473655', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(420, 'Mayer Park', 'Mayer Park, Thornbury, Victoria, Australia', '-37.75883260', '144.9863118', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(421, 'St Kilda Beach', 'St Kilda Beach, Middle Park, Victoria, Australia', '-37.86685950', '144.9730133', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(422, 'Kooyong Park', 'Kooyong Park, Kooyong, Victoria, Australia', '-37.83961560', '145.0376243', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(423, 'The Warmies (by The Spit)', 'The Warmies, Newport, VIC, 3015, Australia', '-37.84649420', '144.8993254', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(424, 'Dunstan Reserve', 'Peacock Street, Brunswick West, Victoria, 3055, Australia', '-37.75489140', '144.9401659', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(425, 'McDonell Park', 'Clifton St, Northcote, Victoria, 3070, Australia', '-37.76930808', '145.0151731', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(426, 'Armadale Reserve', 'Sutherland Rd, Armadale, Victoria, 3143, Australia', '-37.85872567', '145.0178547', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(427, 'Newport Park', 'Douglas Parade, Newport, Victoria, 3015, Australia', '-37.84357037', '144.8944903', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(428, 'Egan Reserve', 'Rennie St, Coburg, Victoria, 3058, Australia', '-37.75181492', '144.9808875', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(429, 'Greenwich Reserve', 'The Strand, Newport, Victoria, 3015, Australia', '-37.84705351', '144.8953760', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(430, 'Anderson Reserve', 'Linda St, Coburg, Victoria, 3058, Australia', '-37.75022351', '144.9585766', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(431, 'MO Moran Reserve', 'Marine Parade, St Kilda, Victoria, 3182, Australia', '-37.87236756', '144.9754402', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(432, 'Donald McLean Reserve', 'Donald McLean Reserve, The Avenue, Spotswood, Victoria, Australia', '-37.82617390', '144.8837807', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(433, 'Union St Reserve', 'Union St, Armadale, Victoria, 3143, Australia', '-37.85810873', '145.0235353', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(434, 'Pitcher Park', 'Separation St, Alphington, Victoria, 3078, Australia', '-37.77365195', '145.0284688', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(435, 'Sir Robert Menzies Reserve', 'Sir Robert Menzies Reserve, Malvern, Victoria, Australia', '-37.84516430', '145.0359019', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(436, 'Henderson Reserve', 'Watt St, Thornbury, Victoria, 3071, Australia', '-37.75273243', '144.9973908', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(437, 'AH Capp Reserve', 'A.h. Capp Reserve, Preston, Victoria, Australia', '-37.74983320', '144.9821806', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(438, 'Clarke St Reserve', 'Clarke St, Elwood, Victoria, 3184, Australia', '-37.87760242', '144.9857232', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(439, 'Greenmeadows Gardens', 'Green St, St Kilda East, Victoria, 3183, Australia', '-37.87336174', '145.0037511', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(440, 'Cruickshank Park', 'Austin Cres E, Yarraville, Victoria, 3013, Australia', '-37.81546871', '144.8760527', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(441, 'Thompson Reserve', 'Van Ness Ave, Maribyrnong, Victoria, 3032, Australia', '-37.77177560', '144.8960199', 'Dog Friendly', 0, 1, 3, '0000-00-00', '2016-05-08', 1),
(442, 'Malvern Cricket Ground', 'Malvern Cricket Ground, Malvern, Victoria, Australia', '-37.85599710', '145.0312516', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(443, 'Darebin Parklands', 'Darebin Parklands, Separation Street, Alphington, Victoria, Australia', '-37.77242330', '145.0341795', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(444, 'Penders Park', 'Penders Park, Thornbury, Victoria, Australia', '-37.75473050', '145.0069708', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(445, 'Aberfeldie Park', 'Aberfeldie Park, Aberfeldie, Victoria, Australia', '-37.76367100', '144.8999434', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(446, 'Tooronga Park', 'Tooronga Road, Hawthorn East, Victoria, Australia', '-37.84365016', '145.0459995', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(447, 'Hayes Park', 'Flinders St, Thornbury, Victoria, 3071, Australia', '-37.76056831', '145.0121461', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(448, 'Martin Reserve', 'Essex St, West Footscray, Victoria, 3012, Australia', '-37.79404579', '144.8768770', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(449, 'Adams Reserve', 'Milton Cres, Preston, Victoria, 3072, Australia', '-37.75031814', '145.0053712', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(450, 'Scovell Reserve', 'Scovell Cres, Maidstone, Victoria, 3012, Australia', '-37.78427479', '144.8779375', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(451, 'Hansen Reserve', 'Wattle St, West Footscray, Victoria, 3012, Australia', '-37.80440425', '144.8728663', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(452, 'McIvor Reserve', 'McIvor Reserve, Yarraville, Victoria, Australia', '-37.82107900', '144.8696839', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(453, 'Cross Keys Reserve (eastern end)', 'Bridge St, Essendon, Victoria, 3040, Australia', '-37.74476986', '144.9302151', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(454, 'TA Cochran Reserve', 'Collier St, Preston, Victoria, 3072, Australia', '-37.74883067', '145.0083411', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(455, 'Milton Gray Reserve', 'Milton Gray Reserve, Malvern, Victoria, Australia', '-37.86453540', '145.0351268', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(456, 'Edwards Reserve', 'Brunel St, South Kingsville, Victoria, 3015, Australia', '-37.82777125', '144.8699815', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(457, 'Cyril Curtain Reserve', 'Cyril Curtain Reserve, Williamstown, Victoria, Australia', '-37.87129170', '144.9040706', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(458, 'Newport Lakes Park', 'Lakes Drive, Newport, Victoria, Australia', '-37.84018395', '144.8708686', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(459, 'Gardiner Park', 'Carroll Cres, Glen Iris, Victoria, 3146, Australia', '-37.85137808', '145.0490517', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(460, 'HP Zwar Reserve', 'Bruce Cl, Preston, Victoria, 3072, Australia', '-37.74154881', '144.9960860', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(461, 'Brearly Reserve', 'Heliopolis St, Pascoe Vale South, Victoria, 3044, Australia', '-37.73894541', '144.9346626', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(462, 'Chifley Drive Reserve', 'Chifley Dr, Maribyrnong, Victoria, 3032, Australia', '-37.76475239', '144.8934525', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(463, 'Chelsworth Park', 'Irvine Rd, Ivanhoe, Victoria, 3079, Australia', '-37.77687464', '145.0486752', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(464, 'Williamstown Beach', 'Williamstown Beach, Williamstown, Victoria, Australia', '-37.86398130', '144.8945244', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(465, 'GH Mott Reserve', 'Gh Mott Reserve, Preston, Victoria, Australia', '-37.74446820', '145.0098979', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(466, 'Caulfield Park', 'Caulfield North, Victoria, Australia', '-37.87126793', '145.0279919', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(467, 'HLT Oulton Reserve', '3071 Albert St, East Melbourne, Victoria, Australia', '-37.81092760', '144.9813610', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(468, 'Village Green (Maribyrnong)', 'Village Way, Maribyrnong, Victoria, Australia', '-37.77120030', '144.8794806', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(469, 'Gloucester Reserve', 'Esplanade, Williamstown, Victoria, 3016, Australia', '-37.86748869', '144.8962317', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(470, 'WK Larkins Reserve', 'W K Larkins Reserve, Preston, Victoria, Australia', '-37.73121030', '144.9888939', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(471, 'Central Park', 'Central Park Road, Malvern East, Victoria, Australia', '-37.86677713', '145.0486974', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(472, 'TW Blake Park', 'T W Blake Park, Preston, Victoria, Australia', '-37.74191170', '145.0252238', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(473, 'AG Davis Reserve', 'Robertson St, Preston, Victoria, 3072, Australia', '-37.73460138', '145.0110437', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(474, 'Cranwell Reserve', 'Cranwell St, Braybrook, Victoria, 3019, Australia', '-37.77622715', '144.8570966', 'Dog Friendly', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(475, 'la trobe swimming', 'La Trobe University, Bundoora, Victoria, Australia', '-37.71970841', '145.0528578', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(476, 'Albert swim 1', 'Aughtie Dr, Albert Park, VIC, 3206, Australia', '-37.84650970', '144.9661519', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(477, 'albert 2', '375 Albert Rd, Albert Park, VIC, 3206, Australia', '-37.84221800', '144.9604120', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(478, 'Malvern swim 1', '1/2 Evandale Road, Malvern, VIC, 3144, Australia', '-37.86443400', '145.0285170', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(479, 'Mal swim 2', '97 Station St, Malvern, VIC, 3144, Australia', '-37.86702400', '145.0309870', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(480, 'Mal swim 3', '825 Dandenong Road, Malvern East, VIC, 3145, Australia', '-37.87459450', '145.0394697', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(481, 'Inkerman Swimming', '97 Alma Rd, St Kilda East, VIC, 3183, Australia', '-37.86244200', '144.9935570', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(482, 'Glen swim 1', '1409-1413 High St, Glen Iris, VIC, 3146, Australia', '-37.85753800', '145.0445040', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(483, 'Malv swim 4', '1401 Malvern Road, Malvern, VIC, 3144, Australia', '-37.85279200', '145.0407440', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(484, 'Ash bur swim', '8 Warner Ave, Ashburton, VIC, 3147, Australia', '-37.86678570', '145.0849634', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(485, 'bright swim', '140 Church St, Brighton, VIC, Australia', '-37.91623800', '144.9964910', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(486, 'hawthorn 1', '9A Hall St, Hawthorn East, Victoria, Australia', '-37.84397800', '145.0425460', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(487, 'Monash 1', '626 Waverley Rd, Glen Waverley, VIC, 3150, Australia', '-37.88792320', '145.1553906', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(488, 'MOnash 2', '10/270 Ferntree Gully Road, Notting Hill, VIC, 3168, Australia', '-37.90007200', '145.1311391', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(489, 'Height swim 1', '111 Chesterville Rd, Highett, VIC, 3190, Australia', '-37.95154300', '145.0570720', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(490, 'Cheltenham swim 1', '150 Tulip St, Cheltenham, VIC, Australia', '-37.96432800', '145.0349240', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(491, 'Alpine Pools and Spas', '21 Huntingdale Rd, Burwood, VIC, 3125, Australia', '-37.85683660', '145.1127106', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(492, 'Learn To Swim Victoria', '118 Cape St, Heidelberg, VIC, 3084, Australia', '-37.75498600', '145.0684710', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(493, 'Nemvon Pools', '41 Leicester St, Preston, Victoria, Australia', '-37.74348460', '144.9929568', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(494, 'Yarra Swimming Pools', 'Liat Way, Greensborough, Victoria, Australia', '-37.71378610', '145.0972714', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(495, 'Aqual Elite Pools', '27 Boyd St, Greensborough, VIC, 3088, Australia', '-37.69938600', '145.0919400', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(496, 'Thomastown Recreation', '54 Main St, Thomastown, VIC, 3074, Australia', '-37.67945190', '145.0061645', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(497, 'Melton Waves', '206 Coburns Rd, Melton, VIC, 3337, Australia', '-37.67885460', '144.5699874', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(498, 'Urban Swimming Pools', '3 Coleman St, Heathmont, VIC, 3135, Australia', '-37.82446500', '145.2475460', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(499, 'Aqualink Box Hill', 'Surrey Dr, Box Hill, VIC, 3128, Australia', '-37.82514740', '145.1180751', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(500, 'Watermarc', '1 Flintoff St, Greensborough, VIC, 3088, Australia', '-37.70430170', '145.1051035', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(501, 'Maribyrong Aquatic', 'Maribyrnong Aquatic Centre, Maribyrnong, Victoria, Australia', '-37.77706310', '144.8873913', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(502, 'Oak Park Aquatic', 'Oak Park Aquatic Centre, Pascoe Vale Road, Pascoe Vale, Victoria, Australia', '-37.72396840', '144.9212798', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(503, 'Aquarena', 'Westfield Doncaster, 139-153 Williamsons Rd, Doncaster, Victoria, Australia', '-37.78528150', '145.1257968', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(504, 'Cranbourne Indoor Swimming Pool', '65 Berwick-Cranbourne Rd, Cranbourne East, Victoria, Australia', '-38.11284850', '145.2974296', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(505, 'Sunshine Leisure Centre', 'Sunshine Leisure Centre, Kennedy Street, Sunshine, Victoria, Australia', '-37.78394670', '144.8347960', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(506, 'Healthways Recreation Centre', '1 - 11 Arcade Rd, Mont Albert North, Victoria, Australia', '-37.80875500', '145.1084870', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(507, 'Waves Leisure Centre', '111 Chesterville Rd, Highett, VIC, 3190, Australia', '-37.95154300', '145.0570720', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(508, 'Coburg Olympic Outdoor Pool', 'Murray Rd, Coburg, VIC, 3058, Australia', '-37.73542970', '144.9776807', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(509, 'The Lakes Health & Fitness Club', '555 Sunshine Ave, Taylors Lakes, Victoria, Australia', '-37.70318500', '144.8009030', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(510, 'Melbourne City Baths', '420 Swanston St, Melbourne, VIC, 3000, Australia', '-37.80695450', '144.9629492', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(511, 'Northcote Aquatics & Recreation Centre', '180 Victoria Rd, Northcote, VIC, 3070, Australia', '-37.76921100', '145.0125600', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(512, 'Lilydale Squash & Fitness Centre', '446 Maroondah Hwy, Lilydale, VIC, 3140, Australia', '-37.75645100', '145.3613430', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(513, 'Brunswick City Baths YMCA', '14 Dawson St, Brunswick, VIC, 3056, Australia', '-37.77099000', '144.9596630', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(514, 'State Swim Swimming Schools', '16 - 24 The Crossing, Caroline Springs, VIC, 3023, Australia', '-37.72571100', '144.7430100', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(515, 'Kilsyth Centenary Pool', '75 Hawthory Rd, Kilsyth, VIC, 3137, Australia', '-37.79761880', '145.3132163', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(516, 'Blue Gum Pools', '2/ 12 Gunyah Mews, St Albans, VIC, 3021, Australia', '-37.75205400', '144.8243360', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(517, 'Broadmeadows Swimming Centre', 'Goulburn St, Broadmeadows, VIC, 3047, Australia', '-37.68429340', '144.9349671', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(518, 'Swimsafe Murrumbeena', '5 Weeroona Rd, Murrumbeena, VIC, 3163, Australia', '-37.88632600', '145.0709130', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(519, 'Thomastown Recreation & Aquatic Centre', 'Main St, Thomastown, VIC, 3074, Australia', '-37.67863740', '144.9982433', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(520, 'O''Doherty''s Swimming Team Inc.', '137 Stud Rd, Dandenong, Victoria, Australia', '-37.97315260', '145.2229837', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(521, 'Camberwell Swim School', '2 Torrington St, Canterbury, VIC, 3126, Australia', '-37.81843800', '145.0604260', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(522, 'Kings Narre Warren', '4-12 The Avenue, Narre Warren South, Victoria, Australia', '-38.05738700', '145.3151940', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(523, 'Diamond Creek Swimming Pool', '1 Elizabeth St, Diamond Creek, VIC, 3089, Australia', '-37.67187200', '145.1558290', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(524, 'Carey Sports Complex', '169 Bulleen Road, Bulleen, VIC, 3105, Australia', '-37.77664870', '145.0786259', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(525, 'South Pacific @ St Kilda Sea Baths', '10 - 18 Jacka Blvd, St Kilda, VIC, 3182, Australia', '-37.86388980', '144.9720504', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(526, 'East Boundary Rd Pool', 'East Boundary Rd, Bentleigh East, VIC, 3165, Australia', '-37.92119250', '145.0598746', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(527, 'Kings Langwarrin', '19- 27 North Gateway, Langwarrin, VIC, 3910, Australia', '-38.15095100', '145.1988630', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(528, 'Re-Creation Health Clubs', '10 Railway Walk North, Hampton, VIC, 3188, Australia', '-37.93802000', '145.0017850', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(529, 'Pascoe Vale Outdoor Swimming Pool', 'Prospect St, Pascoe Vale, VIC, 3044, Australia', '-37.72816030', '144.9358657', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(530, 'Carlton Baths Community Centre', '248 Rathdowne St, Carlton, VIC, 3053, Australia', '-37.79350100', '144.9716610', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(531, 'North Melbourne Pool', '1 Macaulay Rd, North Melbourne, VIC, 3051, Australia', '-37.79885600', '144.9418820', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(532, 'North Lodge Swimming Academy', '137-139 Stud Rd, Dandenong, VIC, 3175, Australia', '-37.97311400', '145.2226610', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(533, 'Ivanhoe Aquatic & Fitness Centre', '170 Waterdale Rd, Ivanhoe, VIC, 3079, Australia', '-37.76223300', '145.0431780', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(534, 'Carey Sports Complex', '169 Bulleen Road, Bulleen, VIC, 3105, Australia', '-37.77664870', '145.0786259', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(535, 'Harold Holt Swim Centre', '1409 High St, Glen Iris, VIC, 3146, Australia', '-37.85853370', '145.0443093', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(536, 'Swimsafe Murrumbeena', '5 Weeroona Rd, Murrumbeena, VIC, 3163, Australia', '-37.88632600', '145.0709130', 'Swimming', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(537, 'Bridge Yoga Studio', '273 Bridge Rd, Richmond, VIC, 3121, Australia', '-37.81851100', '144.9985073', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(538, 'Dharma Yoga Health Centre', '81 Waverley Rd, Malvern East, VIC, 3145, Australia', '-37.87560000', '145.0472220', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(539, 'Ringwood School Of Yoga', '60 Goldsmith Ave, Ringwood North, VIC, 3134, Australia', '-37.79657000', '145.2274570', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(540, 'Brighton Recreational Centre', '93 Outer Crescent, Brighton, VIC, 3186, Australia', '-37.90984200', '144.9944110', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(541, 'Vic Institute of Yoga Education Teacher Training', '14 Thomas St, Hampton, VIC, 3188, Australia', '-37.93856200', '145.0042169', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(542, 'Yoga Jivana', '2 360 High St, Northcote, VIC, 3070, Australia', '-37.76954600', '144.9996440', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(543, 'Greensborough Yoga', '8 Jessop St, Greensborough, Victoria, Australia', '-37.70329700', '145.0984430', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(544, 'Hampton Yoga Centre', '14 Thomas St, Hampton, VIC, 3188, Australia', '-37.93856200', '145.0042169', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(545, 'Grasshopper Yoga Studio', '56 Eucalyptus Rd, Eltham, VIC, 3095, Australia', '-37.71697900', '145.1655290', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(546, 'Bikram''s Hot Yoga', '1/ 179 Bridge Rd, Richmond, VIC, 3121, Australia', '-37.81796900', '144.9957800', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(547, 'Action School Of Yoga', '275 Smith St, Fitzroy, VIC, 3065, Australia', '-37.80064200', '144.9836830', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(548, 'Yogaville', '21 Gilbert Rd, Preston, VIC, 3072, Australia', '-37.75038400', '144.9877780', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(549, 'Yogareal Yoga Studio - Albert Park', '1 45 Victoria Avenue, Albert Park, VIC, 3206, Australia', '-37.84273300', '144.9527350', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(550, 'Studio Yoga', '3-5 Studley Rd, Ivanhoe, VIC, 3079, Australia', '-37.76391800', '145.0478150', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(551, 'Studio 3 Australia', '691 Mount Alexander Road, Moonee Ponds, VIC, 3039, Australia', '-37.76478400', '144.9229380', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(552, 'Rise Yoga', '1/ 232 Bridge Rd, Richmond, VIC, 3121, Australia', '-37.81874700', '144.9983916', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(553, 'Yoga & Holistic Healing', '14 Pine Rd, Mooroolbark, VIC, 3138, Australia', '-37.79289600', '145.3298250', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(554, 'Body Bliss Well Being', '148 Williams Rd, Prahran, VIC, 3181, Australia', '-37.84970500', '145.0032930', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(555, 'Ihana Yoga', '1/ 82 Acland St, St Kilda, VIC, 3182, Australia', '-37.86722250', '144.9788200', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(556, 'Mudita Yoga Studio', '292a Charman Rd, Cheltenham, VIC, 3192, Australia', '-37.96732500', '145.0556350', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(557, 'Williamstown Yoga & Meditation', '109 Douglas Parade, Williamstown, VIC, 3016, Australia', '-37.85522500', '144.8970900', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(558, 'Bikram Yoga Fitzroy', '24-26 Johnston St, Fitzroy, VIC, 3065, Australia', '-37.79825200', '144.9757495', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(559, 'Bikram Yoga Glen Waverley', '263 Springvale Rd, Glen Waverley, VIC, 3150, Australia', '-37.87917600', '145.1654060', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(560, 'Yoga Arts Academy', '360 Little Collins St, Melbourne, VIC, 3000, Australia', '-37.81528300', '144.9626390', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(561, 'Yogareal - Robert Byrne', '45 Victoria Ave, Albert Park, VIC, 3206, Australia', '-37.84273300', '144.9527350', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(562, 'White Lotus Yoga Centre', '33 Ludbrook Ave, Caulfield South, VIC, 3162, Australia', '-37.89825800', '145.0161970', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(563, 'KX Yoga', '1A Winter St, Malvern, VIC, 3144, Australia', '-37.85984100', '145.0292240', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(564, 'Harmony School Of Yoga', '24 Sampson Dr, Mount Waverley, VIC, 3149, Australia', '-37.89177400', '145.1340020', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(565, 'Yoga In Mount Waverley', '21 Howell Dr, Mount Waverley, VIC, 3149, Australia', '-37.88778500', '145.1275860', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(566, 'Dhamma Sukha Meditation Centre', '69 Glendale Rd, Springvale, VIC, 3171, Australia', '-37.93578600', '145.1465310', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(567, 'Panditarama Melbourne Meditation Centre', 'Panditarama Melbourne Meditation Centre, Hope Street, Springvale, Victoria, Australia', '-37.93578900', '145.1487920', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(568, 'Mt Waverley Yoga Studio', 'Waverley Yoga Studio, Mount Waverley, Victoria, Australia', '-37.87754840', '145.1291477', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(569, 'Ananda Marga Meditation & Yoga Centre', '25 Hall St, Coburg, VIC, 3058, Australia', '-37.75299800', '144.9587930', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(570, 'Southern Yoga & Health Centre', 'Awards Australia, 1/ 24 Station Street, Moorabbin, Victoria, Australia', '-37.93418700', '145.0367750', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(571, 'Mudita Yoga Studio', '292a Charman Rd, Cheltenham, VIC, 3192, Australia', '-37.96732500', '145.0556350', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(572, 'Yoga at the Hub, Chadstone (Sonic Shakti Yoga)', 'Batesford Rd, Chadstone, Victoria, Australia', '-37.87572240', '145.0963299', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(573, 'Summer Healing Yoga', '61 Koornang Rd, Carnegie, VIC, 3163, Australia', '-37.88649600', '145.0572332', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(574, 'Moksha Yoga', '437A Centre Rd, Bentleigh, VIC, 3204, Australia', '-37.91844790', '145.0400442', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(575, 'Australian Yoga Teachers Network', '3 Brewer Rd, Brighton East, Victoria, Australia', '-37.91879900', '145.0242360', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(576, 'Yoga In Bayside', '8 Carr St, Brighton East, VIC, 3187, Australia', '-37.92804100', '145.0275790', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(577, 'Moorabbin Yoga School', '14 Oswald Thomas Ave, Hampton East, VIC, 3188, Australia', '-37.93572200', '145.0310970', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(578, 'Moorabbin Yoga School', '14 Oswald Thomas Ave, Hampton East, VIC, 3188, Australia', '-37.93572200', '145.0310970', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(579, 'Kalari Healing Centre', '302 Highett Rd, Highett, VIC, 3190, Australia', '-37.94913300', '145.0428810', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(580, 'Yoga In Mount Waverley', '21 Howell Drive, Mount Waverley, Victoria, Australia', '-37.88778500', '145.1275860', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(581, 'Hatha Yoga Cheltenham', '41 Follett Rd, Cheltenham, VIC, 3192, Australia', '-37.97082900', '145.0709880', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(582, 'Hatha Yoga Cheltenham', '41 Follett Rd, Cheltenham, VIC, 3192, Australia', '-37.97082900', '145.0709880', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(583, 'Mt Waverley Yoga Studio', '6 The Highway, Mount Waverley, VIC, 3149, Australia', '-37.87759500', '145.1293890', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(584, 'Sonic Shakti, Taste of Yoga classes', '94 Batesford Rd, Chadstone, VIC, 3148, Australia', '-37.87661700', '145.0994410', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(585, 'Fiona McCrae Hatha Yoga', '117 Murrumbeena Rd, Murrumbeena, VIC, 3163, Australia', '-37.89202700', '145.0654090', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(586, 'Fiona McCrae Hatha Yoga', '117 Murrumbeena Rd, Murrumbeena, VIC, 3163, Australia', '-37.89202700', '145.0654090', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(587, 'Clayton Aquatics and Health Club', 'Cooke St, Clayton, VIC, 3168, Australia', '-37.92699800', '145.1180337', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(588, 'Hampton Yoga Centre', '14 Thomas St, Hampton, VIC, 3188, Australia', '-37.93856200', '145.0042169', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(589, 'Ihana Yoga', '1/ 562 Hampton St, Hampton, VIC, 3188, Australia', '-37.93210600', '145.0040170', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(590, 'Bikram Yoga Glen Waverley', '263 Springvale Rd, Glen Waverley, VIC, 3150, Australia', '-37.87917600', '145.1654060', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(591, 'D.K. Yoga & Counselling Centre', '168 Thomas St, Brighton East, VIC, 3187, Australia', '-37.90372800', '145.0260320', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(592, 'Ashtanga Sanjay Melbourne', '4 Clarence St, Malvern East, VIC, 3145, Australia', '-37.87495380', '145.0414873', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(593, 'Sacred Places Yoga', '461 New Street, Brighton, Victoria, Australia', '-37.89385000', '144.9948290', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(594, 'Flavours of Yoga', '2A Barkly Ave, Malvern, VIC, 3144, Australia', '-37.86056900', '145.0283000', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(595, 'Yoga for You', '27 Mariemont Ave, Beaumaris, VIC, 3193, Australia', '-37.98331200', '145.0490220', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(596, 'Julie Wentworth Yoga', '9 Marquis St, Ashburton, VIC, 3147, Australia', '-37.86220500', '145.0787600', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(597, 'Julie Wentworth Yoga', '9 Marquis St, Ashburton, VIC, 3147, Australia', '-37.86220500', '145.0787600', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(598, 'AVIRIT Yoga Studio', '14 Willis Street, Hampton, Victoria, Australia', '-37.93663530', '145.0015586', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(599, 'Sundari Yoga Centre', '9 Cullinane Street, Black Rock, Victoria, Australia', '-37.97482700', '145.0213300', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(600, 'Re-Creation Health Clubs', '1438 High St, Glen Iris, VIC, 3146, Australia', '-37.85835100', '145.0413584', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(601, 'Sah Ram Yoga', '20 Griffiths St, Caulfield South, VIC, 3162, Australia', '-37.88994800', '145.0317920', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(602, 'E.M.P. Industrial Australasia Pty Ltd', '1396 High St, Malvern, VIC, 3144, Australia', '-37.85820900', '145.0395330', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(603, 'Levin Sandra', '38 Milroy St, Brighton East, VIC, 3187, Australia', '-37.90373600', '145.0116740', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(604, 'Mountain View Yoga', '8 Arlington Drive, Glen Waverley, VIC, 3150, Australia', '-37.88530790', '145.1780954', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(605, 'Fiona Low', '68 Glyndon Rd, Camberwell, VIC, 3124, Australia', '-37.84043900', '145.0788450', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(606, 'Experience Yoga', '2 Regent St, Brighton East, VIC, 3187, Australia', '-37.92358670', '145.0079653', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(607, 'Elevate Yoga Black Rock', '615A Balcombe Rd, Black Rock, VIC, 3193, Australia', '-37.97563190', '145.0163163', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(608, 'Summer Healing Yoga', '20-22 Kingsway, Glen Waverley, VIC, 3150, Australia', '-37.87906400', '145.1643980', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(609, 'KX Yoga', '1A Winter St, Malvern, VIC, 3144, Australia', '-37.85984100', '145.0292240', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(610, 'Peaceful Living Yoga', '9 Bear St, Mordialloc, VIC, 3195, Australia', '-38.00621700', '145.0890740', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(611, 'Peaceful Living Yoga', '9 Bear St, Mordialloc, VIC, 3195, Australia', '-38.00621700', '145.0890740', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1);
INSERT INTO `location` (`Location_ID`, `Title`, `Address`, `Latitude`, `Longitude`, `Category`, `post_id`, `rating_number`, `total_points`, `created_at`, `modified_at`, `status`) VALUES
(612, 'Flavours of Yoga', '2A Barkly Ave, Malvern, VIC, 3144, Australia', '-37.86056900', '145.0283000', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(613, 'Sri Yoga and Meditation', '44 Whyte St, Brighton, VIC, 3186, Australia', '-37.92213800', '145.0001960', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(614, 'La Vida Yoga', '20-22 Kingsway, Glen Waverley, VIC, 3150, Australia', '-37.87906400', '145.1643980', 'Yoga', 0, 0, 0, '0000-00-00', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `token` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`token`, `email`) VALUES
('1', 'aa@example.com'),
('YDUPBIFFBQ', 'aa@example.com'),
('HTYJWPZR2E', 'aa@example.com'),
('P5PHFJ1HET', 'aa@example.com'),
('26TUQB93WX', 'aa@example.com'),
('YUK3GG2HEL', 'aa@example.com'),
('ES2J3DCC6B', 'aa@example.com'),
('K5FKW3IKY6', 'aa@example.com'),
('ZKPKFRYVUV', 'aa@example.com'),
('14NG1ZJAI3', 'aa@example.com'),
('EXNQNIYZD4', 'aa@example.com'),
('HEPGF19KVQ', 'aa@example.com'),
('SPHCQH5SUP', 'aa@example.com'),
('9WNRRNCPAP', 'aa@example.com'),
('I6NR9D8ZS4', 'aa@example.com'),
('VYE39UV7CC', 'aa@example.com'),
('ZTE2IDATIY', 'aa@example.com'),
('S16K5WE6P1', 'aa@example.com'),
('L59Y3FRTDX', 'aa@example.com'),
('LJ1PGT6GGG', 'aa@example.com'),
('8IRD1YNQ8L', 'aa@example.com'),
('E75SZIGND7', 'aa@example.com'),
('YL9I649PM5', 'aa@example.com'),
('I4MXRPZNYP', 'aa@example.com'),
('IH18B6HTSD', 'kricma83@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rating_status` varchar(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `joining_date`, `rating_status`) VALUES
(1, 'kric', '12@11.com', '$2y$10$nMaXNfU.YP448go3y245nO9sEmlej9W/TSB0OhLvFgA71nVSv2ZVS', '2016-05-05 03:43:02', 'rated'),
(2, 'zoe', '1234@qq.com', '$2y$10$O7NcgNOlEGpk2ouc9aUqd.Zg9PZiGUgD6OI4HcbOAGsucnl0RoGQK', '2016-05-05 03:44:00', 'not rated'),
(3, 'jerry', 'jerry@123.com', '$2y$10$TCnWVSjuQ.HA2Rr6TUsuAubnb/L.txgf6iN8N.2Fn9sVKFai8YWqG', '2016-05-08 04:56:01', 'not rated');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(255) NOT NULL,
  `user_lname` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `suburb` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `family_size` int(11) NOT NULL,
  `interest` varchar(255) NOT NULL,
  `pet_number` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`user_id`, `user_fname`, `user_lname`, `dob`, `phone`, `email`, `postcode`, `suburb`, `address`, `family_size`, `interest`, `pet_number`) VALUES
(1, 'kricm', 'ma', '2016-05-05', '123456', '12@11.com', '3145', 'California, United States', 'California, United States', 1, 'BBQ, basketball, ', 1),
(2, 'zoe', 'huang', '2016-05-06', '1234567890', '1234@qq.com', '3145', 'Caulfield, Victoria, Australia', 'Caulfield, Victoria, Australia', 1, 'BBQ, basketball, pet, ', 1),
(3, 'jerry', 'zhang', '0000-00-00', '123456', 'jerry@123.com', '3168', 'Caulfield, Victoria, Australia', '900 Dandenong Road, Caulfield East, Victoria, Australia', 1, 'BBQ, basketball, ', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eventParticipant`
--
ALTER TABLE `eventParticipant`
  ADD PRIMARY KEY (`eventId`,`user_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventId`,`create_user_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`Location_ID`), ADD UNIQUE KEY `Location_ID` (`Location_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventId` int(60) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
