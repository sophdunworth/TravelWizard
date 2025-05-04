CREATE DATABASE `travelwizard1`;
USE `travelwizard1`;

CREATE TABLE `admins` (
  `userID` int NOT NULL AUTO_INCREMENT,
  `adminName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `bookings` (
  `bookingID` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `package_id` int NOT NULL,
  `dateBooked` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('pending','confirmed','cancelled') DEFAULT 'pending',
  `first_name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `house_number` varchar(255) NOT NULL,
  `road_name` varchar(255) NOT NULL,
  `town` varchar(255) NOT NULL,
  `county` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `eircode` varchar(255) NOT NULL,
  `payment_type` enum('full','installments') NOT NULL,
  `card_type` enum('credit','debit') NOT NULL,
  `cardholder_name` varchar(255) NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `expiry_date` date NOT NULL,
  `cvc` varchar(3) NOT NULL,
  `passport_first_name` varchar(255) NOT NULL,
  `passport_second_name` varchar(255) NOT NULL,
  `passport_number` varchar(255) NOT NULL,
  `passport_country` varchar(255) NOT NULL,
  `emergency_name` varchar(255) NOT NULL,
  `emergency_phone` varchar(255) NOT NULL,
  `emergency_address` text NOT NULL,
  `allergies` text,
  PRIMARY KEY (`bookingID`),
  KEY `user_id` (`user_id`),
  KEY `package_id` (`package_id`),
  CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `customers` (`userID`) ON DELETE CASCADE,
  CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `packages` (`packageID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `customers` (
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

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE `bookings` (
  `bookingID` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `package_id` int NOT NULL,
  `dateBooked` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('pending','confirmed','cancelled') DEFAULT 'pending',
  `first_name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `house_number` varchar(255) NOT NULL,
  `road_name` varchar(255) NOT NULL,
  `town` varchar(255) NOT NULL,
  `county` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `eircode` varchar(255) NOT NULL,
  `payment_type` enum('full','installments') NOT NULL,
  `card_type` enum('credit','debit') NOT NULL,
  `cardholder_name` varchar(255) NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `expiry_date` date NOT NULL,
  `cvc` varchar(3) NOT NULL,
  `passport_first_name` varchar(255) NOT NULL,
  `passport_second_name` varchar(255) NOT NULL,
  `passport_number` varchar(255) NOT NULL,
  `passport_country` varchar(255) NOT NULL,
  `emergency_name` varchar(255) NOT NULL,
  `emergency_phone` varchar(255) NOT NULL,
  `emergency_address` text NOT NULL,
  `allergies` text,
  PRIMARY KEY (`bookingID`),
  KEY `user_id` (`user_id`),
  KEY `package_id` (`package_id`),
  CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `customers` (`userID`) ON DELETE CASCADE,
  CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `packages` (`packageID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `destinations` (
  `destinationID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`destinationID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `packages` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `bookings` (
  `bookingID` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `package_id` int NOT NULL,
  `dateBooked` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('pending','confirmed','cancelled') DEFAULT 'pending',
  `first_name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `house_number` varchar(255) NOT NULL,
  `road_name` varchar(255) NOT NULL,
  `town` varchar(255) NOT NULL,
  `county` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `eircode` varchar(255) NOT NULL,
  `payment_type` enum('full','installments') NOT NULL,
  `card_type` enum('credit','debit') NOT NULL,
  `cardholder_name` varchar(255) NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `expiry_date` date NOT NULL,
  `cvc` varchar(3) NOT NULL,
  `passport_first_name` varchar(255) NOT NULL,
  `passport_second_name` varchar(255) NOT NULL,
  `passport_number` varchar(255) NOT NULL,
  `passport_country` varchar(255) NOT NULL,
  `emergency_name` varchar(255) NOT NULL,
  `emergency_phone` varchar(255) NOT NULL,
  `emergency_address` text NOT NULL,
  `allergies` text,
  PRIMARY KEY (`bookingID`),
  KEY `user_id` (`user_id`),
  KEY `package_id` (`package_id`),
  CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `customers` (`userID`) ON DELETE CASCADE,
  CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `packages` (`packageID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `contactusrequests` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `notifications` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `sent_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`userID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `packagedestinations` (
  `PackageID` int NOT NULL,
  `DestinationID` int NOT NULL,
  `packagedestinationsID` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`PackageID`,`DestinationID`),
  KEY `DestinationID` (`DestinationID`),
  CONSTRAINT `packagedestinations_ibfk_1` FOREIGN KEY (`PackageID`) REFERENCES `packages` (`packageID`),
  CONSTRAINT `packagedestinations_ibfk_2` FOREIGN KEY (`DestinationID`) REFERENCES `destinations` (`destinationID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `payments` (
  `bookingID` int NOT NULL,
  `amountPaid` float NOT NULL,
  `payment_status` enum('pending','completed','failed') DEFAULT 'pending',
  `transactionDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `amountPending` float NOT NULL,
  PRIMARY KEY (`bookingID`),
  CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`bookingID`) REFERENCES `bookings` (`bookingID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `reviews` (
  `reviewID` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `reviewDescription` varchar(300) NOT NULL,
  PRIMARY KEY (`reviewID`),
  KEY `username` (`username`),
  CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`username`) REFERENCES `customers` (`username`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `contactusrequests` (`id`, `user_id`, `email`, `subject`, `message`, `admin_id`, `answered`, `status`, `created_at`) VALUES
(3,  2,  'dunworthsophie@gmail.com',  'Test',  'This is a database test',  NULL,  0,  'open',  '2025-03-14 12:59:05'),
(4,  2,  'dunworthsophie@gmail.com',  'Test2',  'Test number 2',  NULL,  0,  'open',  '2025-03-14 14:06:42')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `user_id` = VALUES(`user_id`), `email` = VALUES(`email`), `subject` = VALUES(`subject`), `message` = VALUES(`message`), `admin_id` = VALUES(`admin_id`), `answered` = VALUES(`answered`), `status` = VALUES(`status`), `created_at` = VALUES(`created_at`);


INSERT INTO `packages` (`packageID`, `packageName`, `airline`, `price`, `departureFlight`, `returnFlight`, `bookingDate`, `destinations`, `packageType`, `hotels`) VALUES
(1,  'Greek Island Party Cruise: Sun, Shots & Sea',  'Ryanair',  2000,  'Dublin (DUB) → Mykonos (JMK) at 10:30 AM',  'Zakynthos (ZTH) → Dublin (DUB) at 10:45 PM',  'June 15 - June 29, 2025; August 1 - August 15, 2025',  'Mykonos, Santorini, Paros, Naxos, Zakynthos',  'Beach Getaway',  'Cavo Tagoo Mykonos Katikies Hotel Santorini, Parilio Hotel Paros, Naxian Collection Naxos, Lesante Blu Luxury Hotel & Spa Zante'),
(2,  'Tropical Treasures: Maldives, Seychelles & Beyond',  'Emirates',  3500,  'Dublin (DUB) → Seychelles (SEZ) at 8:00 AM',  'Maldives (MLE) → Dublin (DUB) at 10:15 PM',  'May 15 - May 29, 2025; August 10 - August 24, 2025',  'Seychelles, Mauritius, Sri Lanka, Maldives',  'Beach Getaway',  'Four Seasons Resort Seychelles, One&Only Le Saint Géran Mauritius, Cinnamon Grand Colombo Sri Lanka, Soneva Fushi Maldives'),
(3,  'C’est la vie dans France',  'Air France',  1800,  'Dublin (DUB) → Paris (CDG) at 9:00 AM',  'Nice (NCE) → Dublin (DUB) at 8:30 PM',  'May 10 - May 25, 2025; September 15 - September 30, 2025',  'Paris, Lyon, Bordeaux, Marseille, Monaco',  'City Breaks',  'Le Meurice Paris, Villa Florentine Lyon, Les Sources de Caudalie Bordeaux, InterContinental Marseille - Hotel Dieu Marseille, Hotel de Paris Monte-Carlo Monaco'),
(4,  'Costa del Sol & Beyond: A Spanish Dream',  'Iberia',  2250,  'Dublin (DUB) → Madrid (MAD) - 10:00 AM',  'Palma de Mallorca (PMI) → Dublin (DUB) - 9:00 PM',  'June 10 - July 1, 2025; August 10 - August 31, 2025',  'Madrid, Barcelona, Valencia, Alicante, Malaga, Palma (Mallorca)',  'City Breaks',  'The Westin Palace, Madrid, Majestic Hotel & Spa Barcelona, The Westin Valencia, Meliá Alicante, Gran Hotel Miramar Malaga, Hotel Nixe Palace Mallorca'),
(5,  'Amazon to Andes: A South American Adventure',  'LATAM Airlines',  4800,  'Dublin (DUB) → Bogotá (BOG) - 8:00 AM',  'Cancún (CUN) → Dublin (DUB) - 7:30 PM',  'July 1 - July 29, 2025; September 1 - September 29, 2025',  'Colombia, Venezuela, Brazil, Argentina, Peru, Panama, Costa Rica, Mexico',  'Adventure Tours',  'Hotel de la Opera Columbia, The Charlee Hotel Medellín, Gran Melia Caracas Hotel Venuezuela, Hotel Venetur Mérida, Belmond Copacabana Palace Brazil, Hotel das Cataratas Iguazu, Alvear Palace Hotel Argentina, Park Hyatt Mendoza, Belmond Miraflores Park Peru, Belmond Hotel Monasterio Cusco, The Waldorf Astoria Panama, Grano de Oro Hotel Costa Rica, Four Seasons Hotel Mexico City, Rosewood Mayakoba Riviera Maya'),
(6,  'Arabian Nights: A Grand Tour of the Gulf',  'Emirates',  3200,  'Dublin (DUB) → Dubai (DXB) at 9:00 AM',  'Doha (DOH) → Dublin (DUB) at 8:00 PM',  'May 10 - May 24, 2025; November 5 - November 19, 2025',  'Dubai, Abu Dhabi, Doha',  'Cultural Experiences',  'Burj Al Arab Jumeirah Dubai, Emirates Palace Abu Dhabi, The Ritz-Carlton, Doha Qatar'),
(7,  'The Land Down Under: From the Outback to Kiwi Wonders',  'Qantas',  4500,  'Dublin (DUB) - London (LON) - Sydney (SYD) at 10:00 AM',  'Queenstown (ZQN) - London (LON) - Dublin (DUB) at 7:00 PM',  'May 15 - May 30, 2025; August 10 - August 25, 2025',  'Sydney, Uluru, Great Barrier Reef, Auckland, Rotorua, Queenstown',  'Adventure Tours',  'The Langham, Sydney, Sails in the Desert Uluru, Shangri-La Hotel The Marina Cairns, SKYCITY Grand Hotel Auckland, Polynesian Spa Resort Rotoura, The Rees Hotel & Luxury Apartments Queenstown'),
(8,  'African Safari: Culture, Wildlife, and Coastal Wonders',  'South African Airways',  6200,  'Dublin (DUB) - Cape Town (CPT) at 9:00 AM',  'Durban (DUR) - Dublin (DUB) at 8:00 PM',  'June 1 - June 14, 2025; September 1 - September 14, 2025',  'Cape Town, Johannesburg, Durban',  'Adventure Tours',  'One&Only Cape Town, The Saxon Hotel Villas & Spa Johannesburg, The Oyster Box Hotel Durban'),
(9,  'Aurora & Fjords: The Best of Scandinavia',  'Scandinavian Airlines',  2800,  'Dublin (DUB) → Stockholm (ARN) at 10:00 AM',  'Stockholm (ARN) → Dublin (DUB) at 7:00 PM',  'October 5 - October 19, 2025; April 10 - April 24, 2025',  'Stockholm, Oslo, Copenhagen, Helsinki',  'Cultural Experiences',  'Grand Hôtel Stockholm, The Thief Oslo Norway, Hotel dAngleterre Denmark, Hotel Kämp Finland, Nobis Hotel Sweden'),
(10,  'Grand European Escapade',  'Various European Carriers',  2000,  'Dublin (DUB) → Amsterdam (AMS) at 10:00 AM',  'Zurich (ZRH) → Dublin (DUB) at 7:00 PM',  'April 15 - May 6, 2025; September 10 - October 1, 2025',  'Amsterdam, Brussels, Cologne, Prague, Vienna, Zurich, Geneva, Interlaken',  'Cultural Experiences',  'Hotel De L’Europe Amsterdam, The Dominican Belgium, Excelsior Hotel Ernst Germany, Four Seasons Hotel Prague, Hotel Sacher Austria, Badrutt’s Palace Hotel Zurich, Four Seasons Hotel des Bergues Geneva, Victoria Jungfrau Grand Hotel & Spa Interlaken'),
(11,  'South East Asia Uncovered',  'Aegean Airlines, Olympic Air, Aer Lingus',  3750,  'Dublin (DUB) → Athens (ATH) Rhodes (RHO) at 10:00 AM',  'Crete (HER) → Athens (ATH) → Dublin (DUB) at 7:00 PM',  'June 10 - June 24, 2025; August 10 - August 24, 2025',  'Bangkok, Chiang Mai, Hanoi, Halong Bay, Kuala Lumpur, Bali, Jakarta',  'Cultural Experiences',  'Mandarin Oriental Bangkok, Four Seasons Resort Chiang Mai, Sofitel Legend Metropole Hanoi, The St. Regis Kuala Lumpur, The Mulia, Nusa Dua, The Ritz-Carlton Jakarta, Taman Mini Indonesia Indah'),
(12,  'Sun, Spice & Serenity: Southeast Asia Uncovered',  'Various Southeast Asian Carriers',  3750,  'Dublin (DUB) → Bangkok (BKK) at 10:00 AM',  'Jakarta (CGK) → Dublin (DUB) at 10:00 PM',  'July 5 - July 23, 2025; September 5 - September 23, 2025',  'Bangkok, Chiang Mai, Hanoi, Halong Bay, Kuala Lumpur, Bali, Jakarta',  'Cultural Experiences',  'Mandarin Oriental Bangkok, Four Seasons Resort Chiang Mai, Sofitel Legend Metropole Hanoi, The St. Regis Kuala Lumpur, The Mulia Nusa Dua, The Ritz-Carlton Jakarta'),
(13,  'Legends of the East: Culture, Cities & Temples',  'Korean Air, Japan Airlines, China Eastern, Cathay Pacific, EVA Air, Philippine Airlines',  6500,  'Dublin (DUB) → Seoul (ICN) at 10:00 AM',  'Manila (MNL) → Dublin (DUB) at 08:00 AM',  'June 5 - June 26, 2025; August 10 - August 31, 2025',  'Seoul, Tokyo, Shanghai, Hong Kong, Taipei, Manila, Boracay',  'Cultural Experiences',  'Four Seasons Hotel Seoul, The Peninsula Tokyo, The Peninsula Shanghai, The Ritz-Carlton Hong Kong, W Taipei Taiwan, Solaire Resort & Casino Philippines, Shangri-La’s Boracay Resort & Spa'),
(14,  'Central Cities Discovery: Culture, History & Skyline',  'Air Canada, Delta Airlines, United Airlines',  2800,  'Dublin (DUB) → Montreal (YUL) at 09:30 AM',  'Chicago (ORD) → Dublin (DUB) at 07:00 PM',  'April 10 - April 24, 2025; September 5 - September 19, 2025',  'Montreal, Toronto, Detroit, Chicago',  'City Breaks',  'Hotel Le Germain Montreal, Four Seasons Hotel Toronto, The Westin Book Cadillac Detroit, The Langham, Chicago'),
(15,  'Southern Charm: A Deep South Road Trip Adventure',  'American Airlines, Delta Airlines, Southwest Airlines',  5200,  'Dublin (DUB) → Houston (IAH) - 9:00 AM',  'Atlanta (ATL) → Dublin (DUB) - 12:00 PM',  'June 1 - June 24, 2025; September 1 - September 24, 2025',  'Houston, Austin, Dallas, New Orleans, Atlanta, Nashville, Kentucky, Alabama, Savannah',  'Cultural Experiences',  'The Post Oak Hotel Texas, The Driskill Hotel Austin, The Ritz-Carlton Dallas, The Roosevelt New Orleans, The St. Regis Atlanta, The Hermitage Hotel Tennessee, 21c Museum Hotel Lexington Kentucky, The Elyton Hotel Alabama, Renaissance Mobile Riverview Plaza Hotel, The Gastonian Georgia'),
(16,  'East Coast Explorer: From History to Beaches',  'Delta Airlines, JetBlue, American Airlines',  3500,  'Dublin (DUB) → Boston (BOS) at 7:45 AM',  'Miami (MIA) → Dublin (DUB) at 8:45 PM',  'June 5 - June 23, 2025; December 10 - December 28, 2025',  'Boston, New York, Philadelphia, Washington D.C., Charlotte, Miami',  'City Breaks',  'Fairmont Copley Plaza Boston, The Langham New York Fifth Avenue, The Rittenhouse Hotel Philadelphia, The Willard InterContinental Washington, The Ritz-Carlton Charlotte, The Ritz-Carlton Key Biscayne Miami'),
(17,  'Aloha to Adventure: Exploring the Pacific Islands',  'Air Tahiti Nui, Hawaiian Airlines',  4350,  'Dublin (DUB) → Tahiti (PPT) at 8:00 AM',  'Maui (OGG) → Dublin (DUB) at 10:00 PM',  'July 10 - July 22, 2025; September 5 - September 17, 2025',  'Tahiti, Bora Bora, Oahu, Maui',  'Adventure Tours',  'InterContinental Tahiti Resort & Spa, Four Seasons Resort Bora Bora, The Royal Hawaiian, a Luxury Collection Resort, Hotel Wailea, Relais & Châteaux'),
(18,  'Golden Coast Gateway: Beaches, Cities & Road Trip',  'Air Canada, Alaska Airlines, United Airlines',  3300,  'Dublin (DUB) → Vancouver (YVR) at 7:00 AM',  'Las Vegas (LAS) → Dublin (DUB) at 11:00 PM',  'July 1 - July 22, 2025; September 10 - October 1, 2025',  'Vancouver, Seattle, Phoenix, San Francisco, Los Angeles, Las Vegas',  'Beach Getaway',  'Fairmont Pacific Rim Vancouver, The Four Seasons Hotel Seattle, The Phoenician, The Ritz-Carlton San Francisco, The Beverly Hills Hotel Las Angeles, The Venetian Resort Las Vegas'),
(19,  'Caribbean Bliss: Sun, Sand & Serenity',  'American Airlines, JetBlue, Caribbean Airlines',  4700,  'Dublin (DUB) → Miami (MIA) → Montego Bay (MBJ) at 9:00 AM',  'Port of Spain (POS) → Miami (MIA) → Dublin (DUB) at 6:00 PM',  'May 1 - May 28, 2025; August 1 - August 28, 2025',  'Jamaica, Cuba, Puerto Rico, Dominican Republic, Turks and Caicos, Bahamas, Saint Lucia, Barbados, Trinidad and Tobago',  'Beach Getaway',  'Half Moon Resort Jamaica, Gran Hotel Manzana Kempinski Cuba, Condado Vanderbilt Hotel Peurto Rico, Eden Roc Cap Cana Dominican Republic, Amanyara Resort Turks and Caicos, Atlantis Paradise Island Bahamas, Sugar Beach, A Viceroy Resort Saint Lucia, Sandy Lane Hotel Barbados, Hyatt Centric Leadenhall Trinidad and Tobago'),
(20,  'La Dolce Vita',  'Aer Lingus',  1700,  'Dublin (DUB) → Milan (MXP) at 8:00 AM',  'Catania (CTA) → Dublin (DUB) at 5:00 AM',  'June 15 - July 8, 2025; August 20 - September 12, 2025',  'Milan, Lake Como, Venice, Florence, Tuscany, Pisa, Rome, Vatican City, Naples, Pompeii, Sicilly',  'City Breaks',  'Hotel Principe di Savoia Milan, Hotel Danieli Venice, Four Seasons Hotel Firenze Florence, Hotel Bologna Pisa, Hotel de Russie Rome, Grand Hotel Vesuvio Naples, Villa Igiea Sicily, Palace Catania, The Phoenicia Malta'),
(21,  'Greek Island Odyssey',  'Aegean Airlines, Olympic Air, Aer Lingus',  1000,  'Dublin (DUB) → Athens (ATH) Rhodes (RHO) at 10:00 AM',  'Crete (HER) → Athens (ATH) → Dublin (DUB) at 7:00 PM',  'June 10 - June 24, 2025; August 10 - August 24, 2025',  'Rhodes, Kos, Crete',  'Beach Getaway',  'Kallithea Horizon Royal Lindos Rhodes, Kipriotis Village Resort Kos, Blue Palace Luxury Collection Resort Crete');


INSERT INTO `packagedestinations` (`PackageID`, `DestinationID`, `packagedestinationsID`) VALUES
(17, 90, 'PD090'),
(17, 91, 'PD091'),
(17, 92, 'PD092'),
(17, 93, 'PD093'),
(17, 94, 'PD094'),
(17, 95, 'PD095'),
(18, 96, 'PD096'),
(18, 97, 'PD097'),
(18, 98, 'PD098'),
(18, 99, 'PD099'),
(18, 100, 'PD100'),
(18, 101, 'PD101'),
(18, 102, 'PD102'),
(18, 103, 'PD103'),
(18, 104, 'PD104'),
(19, 105, 'PD105'),
(19, 106, 'PD106'),
(19, 107, 'PD107'),
(19, 108, 'PD108'),
(19, 109, 'PD109'),
(19, 110, 'PD110'),
(19, 111, 'PD111'),
(19, 112, 'PD112'),
(19, 113, 'PD113'),
(19, 114, 'PD114'),
(19, 115, 'PD115'),
(20, 116, 'PD116'),
(20, 117, 'PD117'),
(20, 118, 'PD118');