-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               9.0.1 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for travelwizard
CREATE DATABASE IF NOT EXISTS `travelwizard`;
USE `travelwizard`;

-- Dumping structure for table travelwizard.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `userID` int NOT NULL AUTO_INCREMENT,
  `adminName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table travelwizard.admins: ~0 rows (approximately)

-- Dumping structure for table travelwizard.bookings
CREATE TABLE bookings (
    bookingID INT AUTO_INCREMENT PRIMARY KEY,
    userID INT NOT NULL,
    packageID INT NOT NULL,
    destination VARCHAR(255) NOT NULL,
    departure_date DATE NOT NULL,
    return_date DATE NOT NULL,
    dateBooked TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('Pending', 'Confirmed', 'Cancelled') DEFAULT 'Pending'
);

-- Dumping data for table travelwizard.bookings: ~0 rows (approximately)

-- Dumping structure for table travelwizard.contactusrequests
CREATE TABLE IF NOT EXISTS `contactusrequests` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `admin_id` int DEFAULT NULL,
  `answered` tinyint(1) DEFAULT '0',
  `status` enum('open','closed') DEFAULT 'open',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `admin_id` (`admin_id`),
  CONSTRAINT `contactusrequests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `customers` (`userID`) ON DELETE SET NULL,
  CONSTRAINT `contactusrequests_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`userID`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table travelwizard.contactusrequests: ~2 rows (approximately)
INSERT INTO `contactusrequests` (`user_id`, `email`, `subject`, `message`, `admin_id`, `answered`, `status`, `created_at`) VALUES
    (2, 'dunworthsophie@gmail.com', 'Test', 'This is a database test', NULL, 0, 'open', '2025-03-14 12:59:05'),
    (2, 'dunworthsophie@gmail.com', 'Test2', 'Test number 2', NULL, 0, 'open', '2025-03-14 14:06:42');


-- Dumping structure for table travelwizard.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `userID` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table travelwizard.customers: ~2 rows (approximately)
INSERT INTO `customers` (`userID`, `username`, `email`, `password`, `created_at`) VALUES
	(2, 'soph123', 'dunworthsophie@gmail.com', '$2y$10$l9kJPM0YmXVAbbBIM6PyeOgCNWv7vRCgLbhJ/9.kD0SkZZ4Pn7x.K', '2025-03-14 12:39:43'),
	(3, 'milosz', 'wojegnrojgn@gmail', '$2y$10$puNrZgRcA5vk7DfdfyWIhu2q0WJwVTBCt1QMoCTb1RLo8ydossfdy', '2025-03-14 14:07:46');

-- Dumping structure for table travelwizard.destinations
CREATE TABLE IF NOT EXISTS `destinations` (
  `destinationID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`destinationID`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table travelwizard.destinations: ~118 rows (approximately)
INSERT INTO `destinations` (`destinationID`, `name`, `description`, `price`, `image`) VALUES
	(1, 'Mykonos', 'A beautiful Greek island known for its white-washed buildings and vibrant nightlife.', 2000, 'images/greekisland/greekisland2.png'),
	(2, 'Santorini', 'Famous for its stunning sunsets and white-washed buildings on a volcanic island.', 2000, 'images/greekisland/greekisland1.png'),
	(3, 'Paros', 'A charming island with crystal-clear waters and traditional Greek architecture.', 2000, 'images/greekisland/greekisland3.png'),
	(4, 'Naxos', 'The largest of the Cyclades islands, offering beautiful beaches and ancient ruins.', 2000, 'images/greekisland/greekisland4.png'),
	(5, 'Zakynthos', 'Home to the iconic Navagio Beach and crystal-clear waters.', 2000, 'images/greekisland/Greek Island Party Cruise.png'),
	(6, 'Seychelles', 'A paradise of white sand beaches and turquoise waters in the Indian Ocean.', 3500, 'images/maldives/maldives2.png'),
	(7, 'Mauritius', 'A volcanic island with stunning coral reefs and lush mountains.', 3500, 'images/maldives/maldives1.png'),
	(8, 'Sri Lanka', 'A culturally rich country with stunning beaches and lush tea plantations.', 3500, 'images/maldives/maldives3.png'),
	(9, 'Maldives', 'A tropical paradise with overwater bungalows and crystal-clear waters.', 3500, 'images/maldives/maldives.png'),
	(10, 'Paris', 'The romantic capital of France, home to the Eiffel Tower and Louvre Museum.', 1800, 'images/paris/paris.png'),
	(11, 'Lyon', 'A historical French city known for its gastronomy and Renaissance architecture.', 1800, 'images/paris/paris1.png'),
	(12, 'Bordeaux', 'Famous for its wine culture and beautiful Garonne River views.', 1800, 'images/paris/paris2.png'),
	(13, 'Marseille', 'A vibrant port city with a mix of French and Mediterranean cultures.', 1800, 'images/paris/paris3.png'),
	(14, 'Monaco', 'A glamorous city-state known for its casinos and luxurious lifestyle.', 1800, 'images/paris/paris4.png'),
	(15, 'Madrid', 'The capital of Spain, known for its grand boulevards and rich history.', 2250, 'images/spain/spain.png'),
	(16, 'Barcelona', 'A Catalan city famous for its unique architecture and Mediterranean beaches.', 2250, 'images/spain/spain1.png'),
	(17, 'Valencia', 'A beautiful Spanish city with futuristic architecture and great food.', 2250, 'images/spain/spain2.png'),
	(18, 'Alicante', 'A coastal city in Spain known for its golden beaches and historic sites.', 2250, 'images/spain/spain3.png'),
	(19, 'Malaga', 'A beautiful coastal city in Spain known for its art museums and beaches.', 2250, 'images/spain/spain4.png'),
	(20, 'Palma (Mallorca)', 'The stunning capital of Mallorca with a rich history and beautiful beaches.', 2250, 'images/spain/spain3.png'),
	(21, 'Colombia', 'A diverse South American country with vibrant culture and stunning landscapes.', 4800, 'images/southamerica/southamerica.png'),
	(22, 'Venezuela', 'Home to Angel Falls, the world’s highest waterfall, and stunning Caribbean beaches.', 4800, 'images/southamerica/southamerica1.png'),
	(23, 'Brazil', 'The largest country in South America, known for Rio de Janeiro, Amazon Rainforest, and vibrant culture.', 4800, 'images/southamerica/southamerica2.png'),
	(24, 'Argentina', 'Famous for tango, Patagonia, and its rich European heritage.', 4800, 'images/southamerica/southamerica3.png'),
	(25, 'Peru', 'Home to Machu Picchu and the Inca Trail, with breathtaking Andean landscapes.', 4800, 'images/southamerica/southamerica4.png'),
	(26, 'Panama', 'A country bridging Central and South America, famous for the Panama Canal.', 4800, 'images/southamerica/southamerica1.png'),
	(27, 'Costa Rica', 'A nature lover’s paradise with lush rainforests and stunning beaches.', 4800, 'images/southamerica/southamerica2.png'),
	(28, 'Mexico', 'A country known for its ancient ruins, stunning beaches, and vibrant culture.', 4800, 'images/southamerica/southamerica3.png'),
	(29, 'Dubai', 'A futuristic city in the UAE known for its luxury, skyscrapers, and desert adventures.', 3200, 'images/dubai/dubai.png'),
	(30, 'Abu Dhabi', 'The capital of the UAE, home to the Sheikh Zayed Grand Mosque.', 3200, 'images/dubai/dubai1.png'),
	(31, 'Doha', 'The capital of Qatar, a modern city with cultural heritage and luxury.', 3200, 'images/dubai/dubai2.png'),
	(32, 'Sydney', 'Australia’s largest city, known for the Opera House and stunning harbor.', 4500, 'images/australia/australia.png'),
	(33, 'Uluru', 'A massive sandstone monolith in Australia’s outback, sacred to Indigenous people.', 4500, 'images/australia/austrlia1.png'),
	(34, 'Great Barrier Reef', 'The world’s largest coral reef system, offering incredible diving experiences.', 4500, 'images/australia/australia2.png'),
	(35, 'Auckland', 'New Zealand’s largest city, a gateway to adventure and Maori culture.', 4500, 'images/australia/australia3.png'),
	(36, 'Rotorua', 'A geothermal wonderland in New Zealand, rich in Maori culture.', 4500, 'images/australia/australia4.png'),
	(37, 'Queenstown', 'A famous adventure hub in New Zealand known for skiing and bungee jumping.', 4500, 'images/australia/australia3.png'),
	(38, 'Cape Town', 'A stunning coastal city in South Africa with Table Mountain and Robben Island.', 6200, 'images/africa/africa.png'),
	(39, 'Johannesburg', 'South Africa’s largest city, rich in history and culture.', 6200, 'images/africa/africa1.png'),
	(40, 'Durban', 'A coastal city in South Africa known for its beaches and cultural diversity.', 6200, 'images/africa/africa.png'),
	(41, 'Stockholm', 'The capital of Sweden, known for its archipelago and historic old town.', 2800, 'images/nordic/nordic.png'),
	(42, 'Oslo', 'The capital of Norway, a city of Viking history and stunning fjords.', 2800, 'images/nordic/nordic1.png'),
	(43, 'Copenhagen', 'Denmark’s capital, famous for its colorful harbor and fairy-tale history.', 2800, 'images/nordic/nordic2.png'),
	(44, 'Helsinki', 'The capital of Finland, known for its design scene and Baltic charm.', 2800, 'images/nordic/nordic3.png'),
	(45, 'Amsterdam', 'A picturesque city with canals, museums, and a vibrant culture.', 2000, 'images/european/european1.png'),
	(46, 'Brussels', 'Belgium’s capital, known for its medieval architecture and chocolates.', 2000, 'images/european/european.png'),
	(47, 'Cologne', 'A historic German city famous for its Gothic cathedral.', 2000, 'images/european/european2.png'),
	(48, 'Prague', 'The fairytale capital of the Czech Republic with stunning architecture.', 2000, 'images/european/european3.png'),
	(49, 'Vienna', 'Austria’s imperial city, known for its palaces, music, and cafes.', 2000, 'images/european/european4.png'),
	(50, 'Zurich', 'Switzerland’s financial hub with stunning lake and mountain views.', 2000, 'images/european/european1.png'),
	(51, 'Geneva', 'A Swiss city known for its international organizations and scenic beauty.', 2000, 'images/european/european.png'),
	(52, 'Interlaken', 'A Swiss resort town nestled between lakes and mountains.', 2000, 'images/european/european4.png'),
	(53, 'Bangkok', 'Thailand’s capital, known for its temples, street food, and nightlife.', 3750, 'images/thialand/thialand.png'),
	(54, 'Chiang Mai', 'A cultural hub in northern Thailand, famous for its temples and markets.', 3750, 'images/thialand/thialand1.png'),
	(55, 'Hanoi', 'Vietnam’s capital, blending French colonial charm and ancient history.', 3750, 'images/thialand/thialand2.png'),
	(56, 'Halong Bay', 'A UNESCO site in Vietnam, famous for its limestone islands.', 3750, 'images/thialand/thialand3.png'),
	(57, 'Kuala Lumpur', 'Malaysia’s modern capital, home to the Petronas Towers.', 3750, 'images/thialand/thialand4.png'),
	(58, 'Bali', 'Indonesia’s paradise island, known for beaches and culture.', 3750, 'images/thialand/thialand1.png'),
	(59, 'Jakarta', 'Indonesia’s bustling capital, a blend of cultures and skyscrapers.', 3750, 'images/thialand/thialand2.png'),
	(60, 'Seoul', 'South Korea’s capital, a mix of ancient palaces and modern skyscrapers.', 6500, 'images/japan/japan.png'),
	(61, 'Tokyo', 'Japan’s high-tech capital with historic temples and neon-lit districts.', 6500, 'images/japan/japan1.png'),
	(62, 'Shanghai', 'China’s biggest city, known for its skyline and historic Bund.', 6500, 'images/japan/japan2.png'),
	(63, 'Hong Kong', 'A vibrant metropolis blending East and West, with stunning harbor views.', 6500, 'images/japan/japan3.png'),
	(64, 'Taipei', 'Taiwan’s capital, famous for night markets and Taipei 101.', 6500, 'images/japan/japan4.png'),
	(65, 'Manila', 'The Philippines’ capital, a city of contrasts with historic sites and malls.', 6500, 'images/japan/japan.png'),
	(66, 'Boracay', 'A small island in the Philippines, known for its white sand beaches.', 6500, 'images/japan/japan1.png'),
	(67, 'Montreal', 'A Canadian city with European charm and a thriving arts scene.', 2800, 'images/chicago/chicago.png'),
	(68, 'Toronto', 'Canada’s largest city, known for the CN Tower and multicultural vibe.', 2800, 'images/chicago/chicago1.png'),
	(69, 'Detroit', 'The Motor City, famous for its music and automotive history.', 2800, 'images/chicago/chicago2.png'),
	(70, 'Chicago', 'A major US city known for its architecture, deep-dish pizza, and jazz.', 2800, 'images/chicago/chicago3.png'),
	(71, 'Houston', 'A Texas metropolis, home to NASA and a diverse food scene.', 5200, 'images/texas/texas.png'),
	(72, 'Austin', 'The music capital of Texas, known for its live music and tech scene.', 5200, 'images/texas/texas1.png'),
	(73, 'Dallas', 'A modern city with cowboy culture and a bustling economy.', 5200, 'images/texas/texas2.png'),
	(74, 'New Orleans', 'A vibrant city famous for jazz, Mardi Gras, and Creole cuisine.', 5200, 'images/texas/texas3.png'),
	(75, 'Atlanta', 'A major city in Georgia, known for its history and Southern charm.', 5200, 'images/texas/texas4.png'),
	(76, 'Nashville', 'Music City, USA, home to country music legends.', 5200, 'images/texas/texas.png'),
	(77, 'Kentucky', 'A US state known for horse racing, bourbon, and bluegrass music.', 5200, 'images/texas/texas1.png'),
	(78, 'Alabama', 'A Southern US state with rich history and scenic landscapes.', 5200, 'images/texas/texas2.png'),
	(79, 'Savannah', 'A charming Georgian city with cobblestone streets and historic homes.', 5200, 'images/texas/texas3.png'),
	(80, 'Boston', 'One of America’s oldest cities, rich in history and culture.', 1400, 'images/newyork/newyork.png'),
	(81, 'New York', 'The Big Apple, a global city known for Broadway, skyscrapers, and Central Park.', 3500, 'images/newyork/newyork1.png'),
	(82, 'Philadelphia', 'A city steeped in American history, home to the Liberty Bell.', 3500, 'images/newyork/newyork2.png'),
	(83, 'Washington D.C.', 'The capital of the United States, filled with monuments and museums.', 3500, 'images/newyork/newyork3.png'),
	(84, 'Charlotte', 'A banking hub in North Carolina with a growing cultural scene.', 3500, 'images/newyork/newyork4.png'),
	(85, 'Miami', 'A beach city with Cuban influence, nightlife, and Art Deco charm.', 3500, 'images/newyork/newyork.png'),
	(86, 'Tahiti', 'A stunning island in French Polynesia, known for its lagoons.', 4350, 'images/hawaii/hawaii.png'),
	(87, 'Bora Bora', 'A luxury destination in French Polynesia, famous for overwater bungalows.', 4350, 'images/hawaii/hawaii1.png'),
	(88, 'Oahu', 'A Hawaiian island, home to Honolulu and Waikiki Beach.', 4350, 'images/hawaii/hawaii2.png'),
	(89, 'Maui', 'A Hawaiian paradise with stunning beaches and lush landscapes.', 4350, 'images/hawaii/hawaii3.png'),
	(90, 'Vancouver', 'Vancouver is known for its beautiful waterfront, city parks, and surrounding mountains.', 3300, 'images/la/la.png'),
	(91, 'Seattle', 'Offers a rich cultural scene with iconic landmarks like the Space Needle and Pike Place Market.', 3300, 'images/la/la1.png'),
	(92, 'Phoenix', 'Phoenix, Arizona, is famous for its desert landscape, hiking trails, and vibrant arts scene.', 3300, 'images/la/la2.png'),
	(93, 'San Francisco', 'Is a famous city known for the Golden Gate Bridge, Alcatraz Island, and diverse neighborhoods.', 3300, 'images/la/la3.png'),
	(94, 'Los Angeles', 'Is a cultural hub known for its entertainment industry, beaches, and vibrant atmosphere.', 3300, 'images/la/la1.png'),
	(95, 'Las Vegas', 'Is famous for its vibrant nightlife, casinos, and entertainment.', 3300, 'images/la/la4.png'),
	(96, 'Jamaica', 'Is known for its beautiful beaches, reggae music, and vibrant culture.', 4700, 'images/carribean/carribean.png'),
	(97, 'Cuba', 'Offers vibrant culture, rich history, and beautiful beaches.', 4700, 'images/carribean/carribean1.png'),
	(98, 'Puerto Rico', 'Is famous for its beautiful beaches, old town San Juan, and tropical rainforests.', 4700, 'images/carribean/carribean2.png'),
	(99, 'Dominican Republic', 'Offers stunning beaches, resorts, and rich cultural heritage. ', 4700, 'images/carribean/carribean3.png'),
	(100, 'Turks and Caicos', 'Is known for its stunning white-sand beaches and crystal-clear waters.', 4700, 'images/carribean/carribean4.png'),
	(101, 'Bahamas', 'Is an archipelago known for its beautiful beaches, crystal-clear water, and vibrant culture.', 4700, 'images/carribean/carribean.png'),
	(102, 'Saint Lucia', 'Is known for its volcanic beaches, lush rainforests, and luxurious resorts.', 4700, 'images/carribean/carribean1.png'),
	(103, 'Barbados', ' Is a Caribbean island known for its stunning beaches, rich culture, and vibrant nightlife.', 4700, 'images/carribean/carribean2.png'),
	(104, 'Trinidad and Tobago', 'Offers beautiful beaches, diverse wildlife, and rich culture.', 4700, 'images/carribean/carribean3.png'),
	(105, 'Milan', 'Is a global fashion capital known for its stunning architecture and vibrant nightlife.', 1700, 'images/italy/italy.png'),
	(106, 'Lake Como', 'Is known for its breathtaking landscapes, luxury villas, and charming villages.', 1700, 'images/italy/italy1.png'),
	(107, 'Venice', ' Is famous for its canals, gondola rides, and rich history.', 1700, 'images/italy/italy2.png'),
	(108, 'Florence', 'Is a Renaissance city known for its art, museums, and architecture..', 1700, 'images/italy/italy3.png'),
	(109, 'Tuscany', 'Is known for its beautiful rolling hills, vineyards, and charming towns.', 1700, 'images/italy/italy4.png'),
	(110, 'Pisa', 'Is home to the world-famous Leaning Tower and a charming medieval town.', 1700, 'images/italy/italy.png'),
	(111, 'Rome', ' Is a city steeped in history with landmarks like the Colosseum and the Vatican. ', 1700, 'images/italy/italy1.png'),
	(112, 'Vatican City', 'Is the heart of Catholicism, home to St. Peter’s Basilica and the Sistine Chapel.', 1700, 'images/italy/italy2.png'),
	(113, 'Naples', 'Is known for its historic sites and proximity to Pompeii and the Amalfi Coast.', 1700, 'images/italy/italy3.png'),
	(114, 'Pompeii', ' Is an ancient Roman city, famously preserved after the eruption of Mount Vesuvius. ', 1700, 'images/italy/italy4.png'),
	(115, 'Sicily', 'Is the largest Mediterranean island, known for its ancient ruins, beaches, and cuisine.', 1700, 'images/italy/italy.png'),
	(116, 'Rhodes', 'Is famous for its medieval Old Town, stunning beaches, and ancient ruins.', 1000, 'images/rhodes/rhodes1.png'),
	(117, 'Kos', 'Is known for its beautiful beaches, historical sites, and vibrant nightlife.', 1000, 'images/rhodes/rhodes2.png'),
	(118, 'Crete', 'Is the largest Greek island, known for its beaches, ancient ruins, and rich culture.', 1000, 'images/rhodes/rhodes3.png');

-- Dumping structure for table travelwizard.notifications
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `sent_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`userID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table travelwizard.notifications: ~0 rows (approximately)

-- Dumping structure for table travelwizard.packagedestinations
CREATE TABLE IF NOT EXISTS `packagedestinations` (
  `PackageID` int NOT NULL,
  `DestinationID` int NOT NULL,
  PRIMARY KEY (`PackageID`,`DestinationID`),
  KEY `DestinationID` (`DestinationID`),
  CONSTRAINT `packagedestinations_ibfk_1` FOREIGN KEY (`PackageID`) REFERENCES `packages` (`packageID`),
  CONSTRAINT `packagedestinations_ibfk_2` FOREIGN KEY (`DestinationID`) REFERENCES `destinations` (`destinationID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table travelwizard.packagedestinations: ~0 rows (approximately)

-- Dumping structure for table travelwizard.packages
CREATE TABLE IF NOT EXISTS `packages` (
  `packageID` int NOT NULL AUTO_INCREMENT,
  `packageName` varchar(255) NOT NULL,
  `airline` varchar(255) DEFAULT NULL,
  `price` float NOT NULL,
  `departureFlight` varchar(255) DEFAULT NULL,
  `returnFlight` varchar(255) DEFAULT NULL,
  `bookingDate` varchar(255) DEFAULT NULL,
  `destinations` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `packageType` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `hotels` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`packageID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table travelwizard.packages: ~19 rows (approximately)
INSERT INTO `packages` (`packageID`, `packageName`, `airline`, `price`, `departureFlight`, `returnFlight`, `bookingDate`, `destinations`, `packageType`, `hotels`) VALUES
	(6, 'Greek Island Party Cruise: Sun, Shots & Sea', 'Ryanair', 2000, 'Dublin (DUB) → Mykonos (JMK) at 10:30 AM', 'Zakynthos (ZTH) → Dublin (DUB) at 10:45 PM', 'June 15 - June 29, 2025; August 1 - August 15, 2025', 'Mykonos, Santorini, Paros, Naxos, Zakynthos', 'Luxury Beach & Island Hopping', 'Cavo Tagoo Mykonos, Katikies Hotel Santorini, Parilio Hotel Paros, Naxian Collection Naxos, Lesante Blu Luxury Hotel & Spa Zante'),
	(7, 'Tropical Treasures: Maldives, Seychelles & Beyond', 'Emirates', 3500, 'Dublin (DUB) → Seychelles (SEZ) at 8:00 AM', 'Maldives (MLE) → Dublin (DUB) at 10:15 PM', 'May 15 - May 30, 2025; July 10 - July 25, 2025', 'Seychelles, Mauritius, Sri Lanka, Maldives', 'Exclusive Tropical Paradise Experience', 'Four Seasons Resort Seychelles, One&Only Le Saint Géran Mauritius, Cinnamon Grand Colombo Sri Lanka, Soneva Fushi Maldives'),
	(8, 'C’est la vie dans France', 'Air France', 1800, 'Dublin (DUB) → Paris (CDG) at 9:00 AM', 'Nice (NCE) → Dublin (DUB) at 8:30 PM', 'May 10 - May 24, 2025; June 5 - June 19, 2025', 'Paris, Lyon, Bordeaux, Marseille, Monaco', 'Romantic French Getaway & Culture Tour', 'Le Meurice Paris, Villa Florentine Lyon, Les Sources de Caudalie Bordeaux, InterContinental Marseille - Hotel Dieu Marseille, Hotel de Paris Monte-Carlo Monaco'),
	(9, 'Costa del Sol & Beyond: A Spanish Dream', 'Iberia', 2250, 'Dublin (DUB) → Madrid (MAD) at 10:00 AM', 'Palma de Mallorca (PMI) → Dublin (DUB) at 9:00 PM', 'June 10 - June 24, 2025; September 5 - September 19, 2025', 'Madrid, Barcelona, Valencia, Alicante, Malaga, Palma (Mallorca)', 'Vibrant Spanish Cities & Beach Escape', 'The Westin Palace Madrid, Majestic Hotel & Spa Barcelona, The Westin Valencia, Meliá Alicante, Gran Hotel Miramar Malaga, Hotel Nixe Palace Mallorca'),
	(10, 'Amazon to Andes: A South American Adventure', 'LATAM Airlines', 4800, 'Dublin (DUB) → Bogotá (BOG) at 8:00 AM', 'Cancún (CUN) → Dublin (DUB) at 7:30 PM', 'July 1 - July 15, 2025; August 10 - August 24, 2025', 'Colombia, Venezuela, Brazil, Argentina, Peru, Panama, Costa Rica, Mexico', 'Ultimate Adventure Across South America', 'Hotel de la Opera Colombia, The Charlee Hotel Medellín, Gran Melia Caracas Hotel Venezuela, Hotel Venetur Mérida, Belmond Copacabana Palace Brazil, Hotel das Cataratas Iguazu, Alvear Palace Hotel Argentina, Park Hyatt Mendoza, Belmond Miraflores Park Peru, Belmond Hotel Monasterio Cusco, The Waldorf Astoria Panama, Grano de Oro Hotel Costa Rica, Four Seasons Hotel Mexico City, Rosewood Mayakoba Riviera Maya'),
	(11, 'Greek Island Party Cruise: Sun, Shots & Sea', 'Ryanair', 2000, 'Dublin (DUB) → Mykonos (JMK) at 10:30 AM', 'Zakynthos (ZTH) → Dublin (DUB) at 10:45 PM', 'June 15 - June 29, 2025; August 1 - August 15, 2025', 'Mykonos, Santorini, Paros, Naxos, Zakynthos', 'Luxury Beach & Island Hopping', 'Cavo Tagoo Mykonos, Katikies Hotel Santorini, Parilio Hotel Paros, Naxian Collection Naxos, Lesante Blu Luxury Hotel & Spa Zante'),
	(12, 'Tropical Treasures: Maldives, Seychelles & Beyond', 'Emirates', 3500, 'Dublin (DUB) → Seychelles (SEZ) at 8:00 AM', 'Maldives (MLE) → Dublin (DUB) at 10:15 PM', 'May 15 - May 30, 2025; July 10 - July 25, 2025', 'Seychelles, Mauritius, Sri Lanka, Maldives', 'Exclusive Tropical Paradise Experience', 'Four Seasons Resort Seychelles, One&Only Le Saint Géran Mauritius, Cinnamon Grand Colombo Sri Lanka, Soneva Fushi Maldives'),
	(13, 'C’est la vie dans France', 'Air France', 1800, 'Dublin (DUB) → Paris (CDG) at 9:00 AM', 'Nice (NCE) → Dublin (DUB) at 8:30 PM', 'May 10 - May 24, 2025; June 5 - June 19, 2025', 'Paris, Lyon, Bordeaux, Marseille, Monaco', 'Romantic French Getaway & Culture Tour', 'Le Meurice Paris, Villa Florentine Lyon, Les Sources de Caudalie Bordeaux, InterContinental Marseille - Hotel Dieu Marseille, Hotel de Paris Monte-Carlo Monaco'),
	(14, 'Costa del Sol & Beyond: A Spanish Dream', 'Iberia', 2250, 'Dublin (DUB) → Madrid (MAD) at 10:00 AM', 'Palma de Mallorca (PMI) → Dublin (DUB) at 9:00 PM', 'June 10 - June 24, 2025; September 5 - September 19, 2025', 'Madrid, Barcelona, Valencia, Alicante, Malaga, Palma (Mallorca)', 'Vibrant Spanish Cities & Beach Escape', 'The Westin Palace Madrid, Majestic Hotel & Spa Barcelona, The Westin Valencia, Meliá Alicante, Gran Hotel Miramar Malaga, Hotel Nixe Palace Mallorca'),
	(15, 'Amazon to Andes: A South American Adventure', 'LATAM Airlines', 4800, 'Dublin (DUB) → Bogotá (BOG) at 8:00 AM', 'Cancún (CUN) → Dublin (DUB) at 7:30 PM', 'July 1 - July 15, 2025; August 10 - August 24, 2025', 'Colombia, Venezuela, Brazil, Argentina, Peru, Panama, Costa Rica, Mexico', 'Ultimate Adventure Across South America', 'Hotel de la Opera Colombia, The Charlee Hotel Medellín, Gran Melia Caracas Hotel Venezuela, Hotel Venetur Mérida, Belmond Copacabana Palace Brazil, Hotel das Cataratas Iguazu, Alvear Palace Hotel Argentina, Park Hyatt Mendoza, Belmond Miraflores Park Peru, Belmond Hotel Monasterio Cusco, The Waldorf Astoria Panama, Grano de Oro Hotel Costa Rica, Four Seasons Hotel Mexico City, Rosewood Mayakoba Riviera Maya'),
	(16, 'The Northern Lights & Arctic Wonders', 'Scandinavian Airlines', 3100, 'Dublin (DUB) → Tromsø (TOS) at 6:45 AM', 'Reykjavik (KEF) → Dublin (DUB) at 8:30 PM', 'December 1 - December 10, 2025; February 5 - February 15, 2026', 'Norway, Sweden, Finland, Iceland', 'Aurora Borealis & Winter Adventure', 'Clarion Hotel The Edge Tromsø, Icehotel Sweden, Santa’s Igloos Arctic Circle Finland, The Retreat at Blue Lagoon Iceland'),
	(17, 'Mystical Wonders of Asia', 'Singapore Airlines', 2900, 'Dublin (DUB) → Bangkok (BKK) at 9:00 AM', 'Bali (DPS) → Dublin (DUB) at 11:15 PM', 'March 10 - March 24, 2025; October 5 - October 19, 2025', 'Thailand, Vietnam, Cambodia, Indonesia', 'Spiritual & Cultural Exploration', 'Mandarin Oriental Bangkok, Six Senses Ninh Van Bay Vietnam, Raffles Hotel Le Royal Cambodia, Four Seasons Resort Bali at Sayan'),
	(18, 'East Coast USA: Cities, Culture & Coastlines', 'Delta Airlines', 2600, 'Dublin (DUB) → New York (JFK) at 7:30 AM', 'Miami (MIA) → Dublin (DUB) at 9:45 PM', 'April 5 - April 19, 2025; September 10 - September 24, 2025', 'New York, Washington D.C., Philadelphia, Boston, Miami', 'Urban Exploration & Coastal Retreat', 'The Plaza Hotel NYC, The Hay-Adams Washington D.C., The Ritz-Carlton Philadelphia, The Liberty Boston, Fontainebleau Miami Beach'),
	(19, 'Best of Australia & New Zealand', 'Qantas', 5400, 'Dublin (DUB) → Sydney (SYD) at 10:00 AM', 'Auckland (AKL) → Dublin (DUB) at 11:30 PM', 'November 1 - November 20, 2025; February 10 - March 1, 2026', 'Sydney, Melbourne, Great Barrier Reef, Queenstown, Auckland', 'Nature, Adventure & City Life', 'Park Hyatt Sydney, Crown Towers Melbourne, Lizard Island Resort Great Barrier Reef, Eichardt’s Private Hotel Queenstown, Sofitel Auckland Viaduct Harbour'),
	(20, 'The Grand European Escape', 'Lufthansa', 3700, 'Dublin (DUB) → Berlin (BER) at 8:30 AM', 'Rome (FCO) → Dublin (DUB) at 10:15 PM', 'May 1 - May 21, 2025; July 5 - July 25, 2025', 'Germany, Netherlands, Switzerland, Italy', 'Cultural Highlights & Scenic Beauty', 'Hotel Adlon Kempinski Berlin, Waldorf Astoria Amsterdam, Badrutt’s Palace Hotel St. Moritz, Hassler Roma Rome'),
	(21, 'African Safari & Victoria Falls Adventure', 'Ethiopian Airlines', 4500, 'Dublin (DUB) → Nairobi (NBO) at 6:15 AM', 'Cape Town (CPT) → Dublin (DUB) at 9:45 PM', 'June 10 - June 24, 2025; August 15 - August 29, 2025', 'Kenya, Tanzania, South Africa, Zimbabwe', 'Wildlife Safari & Natural Wonders', 'Giraffe Manor Kenya, Singita Sasakwa Lodge Tanzania, The Silo Hotel Cape Town, Victoria Falls Hotel Zimbabwe'),
	(22, 'Himalayan Heights: Nepal & Bhutan Expedition', 'Qatar Airways', 3200, 'Dublin (DUB) → Kathmandu (KTM) at 7:00 AM', 'Paro (PBH) → Dublin (DUB) at 8:30 PM', 'April 15 - April 30, 2025; October 10 - October 25, 2025', 'Nepal, Bhutan', 'Mountain Trekking & Spiritual Journey', 'Dwarika’s Hotel Kathmandu, Amankora Bhutan'),
	(23, 'Japan in Bloom: Cherry Blossoms & Culture', 'Japan Airlines', 4000, 'Dublin (DUB) → Tokyo (NRT) at 10:00 AM', 'Osaka (KIX) → Dublin (DUB) at 9:00 PM', 'March 20 - April 5, 2025; April 10 - April 25, 2025', 'Tokyo, Kyoto, Osaka, Hiroshima, Hakone', 'Spring Blossoms & Japanese Heritage', 'Aman Tokyo, The Ritz-Carlton Kyoto, Conrad Osaka, Sheraton Grand Hiroshima, Gora Kadan Hakone'),
	(24, 'Mediterranean Magic: Italy, Greece & Croatia', 'Alitalia', 2900, 'Dublin (DUB) → Rome (FCO) at 9:30 AM', 'Dubrovnik (DBV) → Dublin (DUB) at 7:45 PM', 'May 5 - May 20, 2025; September 1 - September 16, 2025', 'Rome, Florence, Santorini, Athens, Dubrovnik', 'Luxury Mediterranean Getaway', 'Hotel de Russie Rome, Four Seasons Florence, Canaves Oia Suites Santorini, King George Athens, Villa Dubrovnik');

-- Dumping structure for table travelwizard.payments
CREATE TABLE payments (
    paymentID INT AUTO_INCREMENT PRIMARY KEY,
    userID INT NOT NULL,
    bookingID INT NOT NULL,
    payment_type ENUM('Full', 'Installments') NOT NULL,
    card_type ENUM('Credit', 'Debit') NOT NULL,
    cardholder_name VARCHAR(255) NOT NULL,
    card_number VARCHAR(16) NOT NULL,
    expiry_date VARCHAR(5) NOT NULL, -- Format: MM/YY
    cvc VARCHAR(3) NOT NULL,
    payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (bookingID) REFERENCES bookings(bookingID) ON DELETE CASCADE,
    FOREIGN KEY (userID) REFERENCES users(userID) ON DELETE CASCADE
);

-- Dumping data for table travelwizard.payments: ~0 rows (approximately)

-- Dumping structure for table travelwizard.reviews
CREATE TABLE IF NOT EXISTS `reviews` (
  `reviewID` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `reviewDescription` varchar(300) NOT NULL,
  PRIMARY KEY (`reviewID`),
  KEY `username` (`username`),
  CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`username`) REFERENCES `customers` (`username`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table travelwizard.reviews: ~0 rows (approximately)

-- Dumping structure for table travelwizard.users
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table travelwizard.users: ~2 rows (approximately)
INSERT INTO `users` (`userID`, `username`, `email`, `password`, `created_at`) VALUES
	(2, 'soph123', 'dunworthsophie@gmail.com', '$2y$10$l9kJPM0YmXVAbbBIM6PyeOgCNWv7vRCgLbhJ/9.kD0SkZZ4Pn7x.K', '2025-03-14 12:39:43'),
	(3, 'milosz', 'wojegnrojgn@gmail', '$2y$10$puNrZgRcA5vk7DfdfyWIhu2q0WJwVTBCt1QMoCTb1RLo8ydossfdy', '2025-03-14 14:07:46');


SELECT * FROM destinations;

ALTER TABLE bookings
ADD COLUMN departure DATE,
ADD COLUMN `return` DATE;

DESC bookings;

ALTER TABLE bookings ADD COLUMN first_name VARCHAR(255) NOT NULL;
ALTER TABLE bookings ADD COLUMN surname VARCHAR(255) NOT NULL;
ALTER TABLE bookings ADD COLUMN dob DATE NOT NULL;
ALTER TABLE bookings ADD COLUMN house_number VARCHAR(255) NOT NULL;
ALTER TABLE bookings ADD COLUMN road_name VARCHAR(255) NOT NULL;
ALTER TABLE bookings ADD COLUMN town VARCHAR(255) NOT NULL;
ALTER TABLE bookings ADD COLUMN county VARCHAR(255) NOT NULL;
ALTER TABLE bookings ADD COLUMN country VARCHAR(255) NOT NULL;
ALTER TABLE bookings ADD COLUMN eircode VARCHAR(255) NOT NULL;
ALTER TABLE bookings ADD COLUMN payment_type ENUM('full', 'installments') NOT NULL;
ALTER TABLE bookings ADD COLUMN card_type ENUM('credit', 'debit') NOT NULL;
ALTER TABLE bookings ADD COLUMN cardholder_name VARCHAR(255) NOT NULL;
ALTER TABLE bookings ADD COLUMN card_number VARCHAR(16) NOT NULL;
ALTER TABLE bookings ADD COLUMN expiry_date DATE NOT NULL;
ALTER TABLE bookings ADD COLUMN cvc VARCHAR(3) NOT NULL;
ALTER TABLE bookings ADD COLUMN passport_first_name VARCHAR(255) NOT NULL;
ALTER TABLE bookings ADD COLUMN passport_second_name VARCHAR(255) NOT NULL;
ALTER TABLE bookings ADD COLUMN passport_number VARCHAR(255) NOT NULL;
ALTER TABLE bookings ADD COLUMN passport_expiry DATE NOT NULL;
ALTER TABLE bookings ADD COLUMN passport_country VARCHAR(255) NOT NULL;
ALTER TABLE bookings ADD COLUMN emergency_name VARCHAR(255) NOT NULL;
ALTER TABLE bookings ADD COLUMN emergency_phone VARCHAR(255) NOT NULL;
ALTER TABLE bookings ADD COLUMN emergency_address TEXT NOT NULL;
ALTER TABLE bookings ADD COLUMN allergies TEXT;

DESC bookings;
/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;