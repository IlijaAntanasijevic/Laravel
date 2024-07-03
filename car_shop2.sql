-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2024 at 10:47 AM
-- Server version: 11.4.0-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_shop2`
--


-- --------------------------------------------------------

--
-- Table structure for table `bodies`
--

CREATE TABLE `bodies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bodies`
--

INSERT INTO `bodies` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Sedan', NULL, NULL),
(2, 'SUV', NULL, NULL),
(3, 'Coupe', NULL, NULL),
(4, 'Convertible', NULL, NULL),
(5, 'Hatchback', NULL, NULL),
(6, 'Wagon', NULL, NULL),
(10, 'Minivan', NULL, NULL),
(11, 'Pickup', NULL, NULL),
(14, 'Limousine', NULL, NULL),
(15, 'Compact', NULL, NULL),
(17, 'Cabriolet', NULL, NULL),
(18, 'Off-road', NULL, NULL),
(20, 'Kombi', '2024-03-11 08:20:13', '2024-03-11 08:20:13');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Toyota', NULL, NULL),
(2, 'Ford', NULL, NULL),
(4, 'Honda', NULL, NULL),
(5, 'Volkswagen', NULL, NULL),
(6, 'Nissan', NULL, NULL),
(7, 'Mercedes-Benz', NULL, NULL),
(8, 'BMW', NULL, NULL),
(9, 'Audi', NULL, NULL),
(10, 'Hyundai', NULL, NULL),
(11, 'Kia', NULL, NULL),
(15, 'Volvo', NULL, NULL),
(16, 'Mazda', NULL, NULL),
(25, 'Land Rover', NULL, NULL),
(27, 'Mitsubishi', NULL, NULL),
(29, 'Fiat', NULL, NULL),
(30, 'Alfa Romeo', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `kilometers` varchar(255) NOT NULL,
  `primary_image` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `year` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `registration` date DEFAULT NULL,
  `is_sold` tinyint(1) NOT NULL DEFAULT 0,
  `is_published` tinyint(1) NOT NULL DEFAULT 0,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `engine_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `drive_type_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `kilometers`, `primary_image`, `price`, `year`, `description`, `registration`, `is_sold`, `is_published`, `model_id`, `engine_id`, `color_id`, `drive_type_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Toyota Rav 4', '90000', '1710142555162351.png', 26000.00, '2019', 'The 2019 Toyota RAV4 is a compact crossover SUV that has gained popularity for its reliability, versatility, and efficiency.The 2019 Toyota RAV4 2.5L variant is equipped with a naturally aspirated inline-4 engine. It produces 220 horsepower, providing ample power for both city driving and highway cruising. This engine configuration typically offers a good balance between performance and fuel efficiency.\r\n\r\nThe 2019 RAV4 2.5L variant often comes paired with an 8-speed automatic transmission.\r\nThe transmission helps optimize power delivery and fuel efficiency while offering smooth shifts.\r\n\r\nWhile actual fuel efficiency may vary based on driving conditions and other factors, the 2.5L variant of the 2019 RAV4 generally delivers competitive fuel economy. Expect an average of around 25-30 miles per gallon (MPG) combined, with slightly higher numbers on the highway and slightly lower in the city.', '2024-03-28', 0, 1, 53, 12, 5, 3, 3, '2024-03-11 06:35:55', '2024-03-11 06:36:18'),
(2, 'Ford Fiesta', '22000', '1710143192315633.png', 13500.00, '2022', 'The 2020 Ford Fiesta 1.0L 75hp variant is designed for urban efficiency, featuring a compact yet stylish exterior perfect for navigating city streets. Its turbocharged inline-3 engine delivers a balance of power and fuel efficiency, ideal for daily commuting. Inside, the Fiesta offers a comfortable cabin with intuitive controls and ample space for passengers and cargo, enhancing the overall driving experience. Despite its smaller size, the Fiesta doesn\'t compromise on safety, with standard features such as airbags, stability control, and a rearview camera. Its nimble handling and responsive steering make maneuvering through tight spaces a breeze, while its smooth ride ensures comfort on longer journeys. Overall, the 2020 Ford Fiesta 1.0L 75hp variant is a versatile and practical choice for those seeking an affordable and efficient urban driving', NULL, 0, 1, 54, 13, 6, 1, 3, '2024-03-11 06:46:32', '2024-03-11 06:46:48'),
(3, 'Honda Civic Type R', '10000', '171014409965733.png', 35000.00, '2019', 'The Honda Civic Type R is a high-performance variant of the popular Civic lineup, known for its sporty design and exhilarating driving experience. Here\'s a description of the version equipped with a 2.0L engine producing 330 horsepower:\r\n\r\nThe Honda Civic Type R with its 2.0-liter turbocharged engine packs a potent punch, delivering an impressive 330 horsepower, making it one of the most powerful cars in its class. This engine is meticulously tuned to provide exhilarating acceleration and responsive throttle response, offering a thrilling driving experience both on the road and track. Paired with a precise 6-speed manual transmission, enthusiasts can enjoy full control over gear shifts, enhancing the engaging driving dynamics. With its aggressive aerodynamic styling, including a prominent rear wing and sculpted body lines, the Civic Type R exudes a sporty and aggressive demeanor that reflects its performance capabilities. Inside, the cabin features supportive bucket seats, a sport steering wheel, and advanced technology such as a touchscreen infotainment system with navigation and smartphone integration, blending comfort with performance-oriented features seamlessly. Despite its track-focused performance, the Civic Type R doesn\'t compromise on practicality, offering ample cargo space and comfortable seating for passengers, making it suitable for daily driving as well as spirited weekend adventures. Overall, the Honda Civic Type R with its 330 horsepower 2.0L engine represents the pinnacle of performance in the hot hatch segment, delivering an exhilarating driving experience that is sure to impress automotive enthusiasts.', '2025-01-22', 0, 1, 55, 14, 5, 2, 3, '2024-03-11 07:01:39', '2024-03-11 07:13:45'),
(4, 'Golf VIII GTI', '45000', '1710144496203519.png', 25000.00, '2021', 'The Golf 8 GTI, renowned for its blend of performance and practicality, features a 2.0-liter turbocharged engine delivering an impressive 245 horsepower, ensuring exhilarating acceleration and dynamic driving experiences. Paired with either a precise 6-speed manual transmission or an optional 7-speed DSG automatic gearbox, drivers have the choice between engaging manual control or seamless shifting for enhanced convenience. Its sporty exterior design cues, including distinctive GTI badges, aggressive front grille, and sleek LED headlights, reflect its performance-oriented nature, while maintaining the iconic Golf aesthetic. Inside, the GTI offers a driver-focused cockpit with bolstered sport seats, a flat-bottomed steering wheel, and high-quality materials throughout, creating a comfortable and immersive driving environment. Advanced technology features, such as a touchscreen infotainment system with smartphone integration, digital instrument cluster, and driver assistance systems, further elevate the driving experience while ensuring convenience and safety. Despite its sporty demeanor, the Golf 8 GTI remains versatile and practical, with ample cargo space and comfortable seating for passengers, making it suitable for everyday driving needs. Overall, the Golf 8 GTI 2.0 245hp continues the legacy of the iconic hot hatch, offering a perfect balance of performance, style, and functionality for enthusiasts and daily commuters alike.', NULL, 0, 1, 25, 15, 5, 3, 3, '2024-03-11 07:08:16', '2024-03-11 07:13:46'),
(5, 'Volkswagen Polo', '59000', '1710144816706485.png', 9600.00, '2016', 'The Volkswagen Polo 1.1 with its 81 horsepower 1.1-liter engine offers a perfect balance of efficiency and practicality, making it an ideal choice for urban driving and daily commuting. Its compact size and nimble handling make navigating through city streets a breeze, while its fuel-efficient engine ensures economical operation. The Polo\'s stylish exterior design, characterized by clean lines and modern details, exudes a sense of sophistication and timeless elegance. Inside, the cabin is thoughtfully designed with high-quality materials and ergonomic controls, providing a comfortable and inviting environment for both driver and passengers. Despite its smaller engine size, the Polo offers ample interior space, with enough room to accommodate passengers and cargo comfortably. Advanced technology features, such as a touchscreen infotainment system, smartphone integration, and driver assistance systems, enhance the driving experience while ensuring convenience and safety on the road. Overall, the Volkswagen Polo 1.1 81hp combines practicality, efficiency, and style, making it a versatile and appealing choice for drivers seeking a compact car with premium features.', '2024-10-03', 0, 1, 24, 16, 2, 1, 3, '2024-03-11 07:13:36', '2024-03-11 07:13:48'),
(6, 'Nissan Qashqai ACENTA', '74440', '1710145360371551.png', 18000.00, '2022', 'The Nissan Qashqai Acenta trim offers a blend of comfort, technology, and versatility, making it a popular choice in the compact SUV segment. With its stylish exterior design featuring sleek lines and a bold grille, the Qashqai Acenta exudes a modern and dynamic presence on the road. Inside, the cabin is spacious and well-appointed, with premium materials and thoughtful design elements creating a comfortable and inviting atmosphere for passengers. The Acenta trim typically comes equipped with a range of advanced features, including a touchscreen infotainment system with smartphone integration, dual-zone automatic climate control, and a suite of driver assistance technologies such as lane departure warning and automatic emergency braking. Additionally, the Qashqai Acenta offers ample cargo space and flexible seating configurations, making it practical for everyday use and weekend adventures alike. Overall, the Nissan Qashqai Acenta strikes a perfect balance between style, comfort, and functionality, appealing to drivers who prioritize both performance and convenience in their vehicle choice.', NULL, 1, 1, 27, 17, 6, 3, 4, '2024-03-11 07:22:40', '2024-03-12 07:50:17'),
(7, 'GLE 53 AMG', '15000', '1710145905164262.png', 95000.00, '2022', 'The Mercedes-Benz GLE 53 AMG is a high-performance SUV that combines luxury, power, and advanced technology for an exhilarating driving experience. With its AMG-tuned 3.0-liter turbocharged inline-six engine producing around 429 horsepower, the GLE 53 AMG offers breathtaking acceleration and dynamic handling. This powerplant is often paired with an innovative EQ Boost mild hybrid system, providing additional bursts of power when needed and enhancing overall efficiency. The GLE 53 AMG features an array of performance-enhancing features such as AMG-tuned suspension, sport exhaust system, and advanced all-wheel drive system, ensuring exceptional agility and stability on various road conditions. In terms of design, the GLE 53 AMG boasts a bold and muscular exterior with AMG-specific styling cues, including a distinctive grille, aerodynamic enhancements, and larger alloy wheels. Inside, the cabin is lavishly appointed with premium materials, cutting-edge technology, and luxurious amenities, offering a refined and comfortable environment for passengers. Advanced infotainment and driver assistance systems further elevate the driving experience, providing convenience, connectivity, and safety features. Overall, the Mercedes-Benz GLE 53 AMG is a versatile and impressive SUV that delivers outstanding performance, luxury, and innovation, making it a top choice for discerning drivers seeking the ultimate driving machine.', '2024-12-26', 0, 1, 59, 18, 6, 3, 4, '2024-03-11 07:31:45', '2024-03-11 07:35:12'),
(8, 'Mercedes-Benz ML 250', '305000', '1710146105964955.png', 11990.00, '2013', 'The Mercedes-Benz ML 250, also known as the Mercedes-Benz GLE 250d in some markets, is a mid-size luxury SUV that offers a blend of comfort, performance, and efficiency. Powered by a 2.1-liter turbocharged diesel engine, the ML 250 delivers a balance of power and fuel efficiency, making it an ideal choice for long-distance cruising and everyday driving. With around 200 horsepower and ample torque, it provides strong acceleration and confident highway passing. The ML 250 typically features Mercedes-Benz\'s renowned 4MATIC all-wheel-drive system, ensuring excellent traction and stability in various road conditions. In terms of design, the ML 250 boasts a sleek and sophisticated exterior with Mercedes-Benz\'s signature styling cues, including a prominent grille, sculpted body lines, and elegant LED lighting. Inside, the cabin offers a luxurious and comfortable environment with high-quality materials, advanced technology, and spacious seating for five passengers. Features such as a multimedia infotainment system, premium audio system, and driver assistance technologies enhance the driving experience while providing convenience and safety. Overall, the Mercedes-Benz ML 250 represents a compelling choice for those seeking a premium SUV with refined performance, comfort, and versatility.', NULL, 0, 1, 58, 19, 8, 3, 4, '2024-03-11 07:35:05', '2024-03-11 07:35:13'),
(9, 'Mercedes-Benz CLS 400', '191800', '1710146476782946.png', 36800.00, '2018', 'The Mercedes-Benz CLS 400 is a luxury four-door coupe that epitomizes elegance, performance, and cutting-edge technology. Powered by a potent 3.0-liter V6 turbocharged engine, the CLS 400 delivers around 329 horsepower and an abundance of torque, ensuring exhilarating acceleration and dynamic driving experiences. With its smooth-shifting 9-speed automatic transmission, the CLS 400 effortlessly translates power to the wheels, providing a refined and engaging driving experience. The exterior design of the CLS 400 is characterized by its sleek and athletic profile, featuring flowing lines, a sculpted hood, and an expressive front grille, exuding sophistication and sportiness. Inside the cabin, the CLS 400 offers a luxurious and well-appointed environment, with premium materials, exquisite craftsmanship, and advanced technology throughout. Comfort features such as heated and ventilated seats, ambient lighting, and dual-zone climate control ensure a pleasurable driving experience for both the driver and passengers. Advanced infotainment and driver assistance systems further elevate the CLS 400, providing connectivity, convenience, and safety on the road. Overall, the Mercedes-Benz CLS 400 is a compelling choice for those seeking a luxurious and performance-oriented vehicle that makes a statement on the road', '2024-10-04', 0, 1, 57, 20, 6, 1, 4, '2024-03-11 07:41:16', '2024-03-11 07:57:16'),
(10, 'BMW 320d xDrive', '178000', '1710146866215494.png', 28000.00, '2020', 'The BMW 320d 2020 is a luxury compact sedan that offers a perfect balance of performance, efficiency, and comfort. Powered by a 2.0-liter turbocharged diesel engine, the 320d delivers impressive performance with around 190 horsepower and a substantial amount of torque, providing strong acceleration and responsive handling. Paired with an efficient 8-speed automatic transmission, the 320d ensures smooth gear shifts and optimal fuel efficiency. The exterior design of the 320d is characterized by its sleek and modern silhouette, featuring BMW\'s iconic kidney grille, sculpted lines, and aerodynamic elements, reflecting both elegance and athleticism. Inside, the cabin offers a luxurious and driver-centric environment, with premium materials, intuitive controls, and advanced technology at your fingertips. Comfort features such as power-adjustable seats, dual-zone automatic climate control, and ambient lighting enhance the driving experience, while advanced infotainment and driver assistance systems provide connectivity, convenience, and safety on the road. Overall, the BMW 320d 2020 is a sophisticated and refined sedan that delivers an exceptional driving experience for discerning drivers who seek performance and luxury in a compact package.', NULL, 0, 1, 31, 21, 5, 3, 4, '2024-03-11 07:47:46', '2024-03-11 07:57:18'),
(11, 'M5 Competition xDrive', '11000', '1710147225371068.png', 102890.00, '2023', 'The BMW M5 Competition xDrive is an epitome of high-performance luxury sedans, blending breathtaking power, precision engineering, and sophisticated comfort. With a robust 4.4-liter twin-turbocharged V8 engine, the M5 Competition xDrive roars to life with an impressive 610 horsepower, catapulting it from 0 to 60 mph in just over 3 seconds. This powerhouse is coupled with BMW\'s renowned xDrive all-wheel-drive system, ensuring optimal traction and stability, even in challenging road conditions. The exterior design of the M5 Competition xDrive is characterized by aggressive styling cues, including enlarged air intakes, a distinctive grille, and M-specific accents, hinting at its formidable performance capabilities. Inside, the cabin exudes luxury and refinement, with premium materials, ergonomic seating, and advanced technology seamlessly integrated throughout. Comfort features such as heated and ventilated seats, ambient lighting, and a premium sound system create a cocoon of luxury for both driver and passengers. Advanced infotainment and driver assistance systems further elevate the driving experience, providing connectivity, convenience, and safety on every journey. With its combination of raw power, precise handling, and opulent comfort, the BMW M5 Competition xDrive stands as a true pinnacle of automotive excellence, offering an unparalleled driving experience that satisfies even the most discerning enthusiasts.', '2025-02-28', 0, 1, 33, 22, 2, 3, 4, '2024-03-11 07:53:45', '2024-03-11 07:57:20'),
(12, 'BMW X6', '71451', '1710147429915144.png', 38000.00, '2015', 'The BMW X6 with its 3.0-liter engine and 370 horsepower offers a compelling blend of performance, luxury, and versatility in the luxury SUV segment. Powered by a turbocharged inline-six engine, the X6 delivers ample power for exhilarating acceleration and confident highway cruising, while maintaining impressive fuel efficiency for its size and class. The X6\'s sleek and athletic exterior design exudes confidence and presence on the road, with BMW\'s signature kidney grille, sculpted lines, and aggressive styling cues adding to its sporty appeal. Inside, the cabin offers a luxurious and technologically advanced environment, with premium materials, ergonomic design, and cutting-edge features throughout. Comfort amenities such as heated and ventilated seats, dual-zone automatic climate control, and ambient lighting ensure a refined driving experience for both driver and passengers. The X6 also boasts a host of advanced infotainment and driver assistance systems, providing connectivity, convenience, and safety on every journey. With its combination of performance, luxury, and versatility, the BMW X6 3.0 370hp stands as a formidable contender in the competitive luxury SUV market, appealing to drivers who seek both style and substance in their vehicle choice.', NULL, 0, 1, 34, 23, 5, 3, 4, '2024-03-11 07:57:09', '2024-03-11 07:57:21'),
(13, 'A6 TFSI SPORT', '35000', '171014804385420.png', 33000.00, '2021', 'The Audi A6 TFSI Sport represents a perfect fusion of luxury, performance, and cutting-edge technology, making it a top choice in the executive sedan segment. Powered by a turbocharged TFSI engine, the A6 TFSI Sport offers a balance of power and efficiency, providing responsive acceleration and smooth highway cruising. The Sport trim level emphasizes athleticism with features like sport-tuned suspension, larger alloy wheels, and more aggressive styling cues. The exterior design of the A6 exudes sophistication and modernity, with Audi\'s signature Singleframe grille, sleek LED headlights, and flowing lines creating a dynamic and elegant presence on the road. Inside, the cabin is meticulously crafted with premium materials, exquisite detailing, and advanced technology, offering a luxurious and comfortable environment for both driver and passengers. The A6 TFSI Sport comes equipped with a range of amenities, including leather upholstery, heated seats, tri-zone automatic climate control, and a state-of-the-art infotainment system with touchscreen interface and smartphone integration. Advanced driver assistance features further enhance safety and convenience, providing peace of mind on every journey. Overall, the Audi A6 TFSI Sport combines performance, luxury, and refinement to deliver an exceptional driving experience that caters to the needs of discerning drivers.', NULL, 1, 1, 35, 24, 6, 3, 5, '2024-03-11 08:07:23', '2024-03-11 08:34:39'),
(14, 'Audi Q8 TDI', '98000', '1710148307775943.png', 61000.00, '2019', 'The Audi Q8 TDI is a luxury SUV that embodies sophistication, performance, and versatility. Powered by a TDI (Turbocharged Direct Injection) diesel engine, the Q8 TDI offers strong and efficient performance, delivering ample torque for confident acceleration and towing capabilities. The TDI engine is known for its fuel efficiency, making the Q8 TDI a practical choice for long-distance driving and everyday commuting. The exterior design of the Q8 exudes presence and prestige, with a bold grille, sleek LED headlights, and sculpted lines that give it a commanding presence on the road. Inside, the cabin offers a luxurious and spacious environment, with high-quality materials, meticulous craftsmanship, and advanced technology throughout. The Q8 TDI is equipped with a range of comfort and convenience features, including leather upholstery, heated and ventilated seats, tri-zone automatic climate control, and a panoramic sunroof. Advanced infotainment and driver assistance systems further enhance the driving experience, providing connectivity, entertainment, and safety on every journey. With its combination of performance, luxury, and practicality, the Audi Q8 TDI stands as a formidable contender in the luxury SUV segment, appealing to drivers who seek both style and substance in their vehicle choice.', NULL, 0, 1, 36, 25, 5, 3, 5, '2024-03-11 08:11:47', '2024-03-11 08:33:24'),
(15, 'Audi TT Competition', '66000', '1710148544593038.png', 29950.00, '2017', 'The Audi TT is a compact sports car renowned for its sleek design, dynamic performance, and advanced technology. Available in coupe and roadster variants, the TT boasts a striking exterior with its distinctive silhouette, bold lines, and signature Audi grille, creating a timeless and sporty appearance. Under the hood, the TT offers a range of powerful engines, including turbocharged four-cylinder units and potent TTS and TT RS variants, delivering exhilarating acceleration and agile handling. The interior of the TT is characterized by its minimalist and driver-focused design, featuring high-quality materials, refined craftsmanship, and cutting-edge technology. The TT\'s cabin offers comfortable seating for two passengers and a host of modern amenities, including a digital instrument cluster, touchscreen infotainment system, and advanced driver assistance features. Despite its compact size, the TT provides a thrilling driving experience with precise steering, responsive brakes, and a well-tuned suspension that delivers excellent cornering capabilities. Overall, the Audi TT embodies the perfect combination of style, performance, and innovation, making it a standout choice for enthusiasts seeking a premium sports car experience.', '2024-08-29', 0, 1, 60, 26, 2, 3, 5, '2024-03-11 08:15:44', '2024-03-11 08:33:26'),
(16, 'Hyundai i40', '115693', '17101489925446.png', 8000.00, '2012', 'The Hyundai i40 Kombi, introduced in 2012, is a stylish and practical mid-size station wagon that offers a blend of comfort, efficiency, and versatility. With its sleek exterior design featuring Hyundai\'s signature Fluidic Sculpture design language, the i40 Kombi presents a modern and dynamic appearance on the road. The spacious interior provides ample room for passengers and cargo, making it an ideal choice for families and travelers alike. Under the hood, the i40 Kombi offers a range of gasoline and diesel engine options, providing a balance of performance and fuel efficiency to suit various driving preferences. The i40 Kombi is equipped with a range of convenience and safety features, including touchscreen infotainment systems, Bluetooth connectivity, and advanced driver assistance systems such as lane departure warning and automatic emergency braking. Overall, the Hyundai i40 Kombi offers a compelling combination of style, practicality, and value, making it a versatile choice for those in need of a spacious and reliable family car.', '2024-10-31', 0, 1, 61, 27, 5, 1, 5, '2024-03-11 08:23:12', '2024-03-11 08:33:27'),
(17, 'Kia Rio', '11000', '1710149403147894.png', 14900.00, '2022', 'The Kia Rio is a compact car known for its affordability, fuel efficiency, and practicality. Available in both sedan and hatchback body styles, the Rio offers versatility to suit various lifestyles and preferences. Despite its compact size, the Rio boasts a spacious and well-designed interior with comfortable seating for passengers and ample cargo space, making it suitable for both daily commuting and longer trips. The Rio is typically powered by a fuel-efficient four-cylinder engine, providing adequate power for city driving and highway cruising while delivering impressive fuel economy. In terms of features, the Rio offers modern amenities such as touchscreen infotainment systems, smartphone integration, and driver assistance technologies like lane departure warning and automatic emergency braking, depending on the trim level. With its combination of affordability, efficiency, and practicality, the Kia Rio appeals to budget-conscious buyers seeking a reliable and economical mode of transportation without sacrificing comfort or convenience.', NULL, 0, 1, 40, 28, 8, 1, 5, '2024-03-11 08:30:03', '2024-03-11 08:33:28'),
(18, 'Kia Sportage', '98200', '1710149583380036.png', 11590.00, '2013', 'The Kia Sportage is a compact crossover SUV that offers a compelling combination of style, versatility, and value. Known for its sleek design and modern features, the Sportage stands out in its segment. With its distinctive tiger-nose grille, aggressive front fascia, and sculpted body lines, the Sportage exudes confidence and sophistication on the road.\r\n\r\nInside, the Sportage boasts a spacious and well-appointed cabin, with comfortable seating for five passengers and ample cargo space to accommodate your belongings. The interior is adorned with high-quality materials and modern amenities, including touchscreen infotainment systems, smartphone integration, and available driver assistance features such as blind-spot monitoring and lane-keeping assist.\r\n\r\nUnder the hood, the Sportage offers a choice of efficient yet capable engines, providing a balance of performance and fuel economy. Whether you opt for the standard gasoline engine or the available turbocharged option, you can expect responsive acceleration and smooth power delivery.\r\n\r\nOn the road, the Sportage delivers a comfortable and composed ride, with nimble handling and responsive steering making it well-suited for both city streets and winding roads. Available all-wheel drive further enhances traction and stability, providing confidence in various driving conditions.\r\n\r\nOverall, the Kia Sportage is a versatile and well-rounded crossover SUV that caters to the needs of modern drivers, offering style, comfort, and technology at an attractive price point.', NULL, 0, 1, 41, 29, 5, 3, 5, '2024-03-11 08:33:03', '2024-03-11 08:33:30'),
(19, 'Volvo XC60 B4', '77000', '1710150215577237.png', 29490.00, '2021', 'The Volvo XC60 is a luxury compact SUV that embodies Scandinavian design, innovative technology, and exceptional safety features. Renowned for its elegant and sophisticated exterior styling, the XC60 exudes a sense of understated luxury and modernity on the road. With its distinctive Thor\'s Hammer LED headlights, sleek lines, and sculpted body panels, the XC60 makes a bold statement wherever it goes.\r\n\r\nInside, the XC60 offers a refined and luxurious cabin that prioritizes comfort and convenience. High-quality materials, such as premium leather upholstery and genuine wood trim, create an inviting atmosphere for passengers. The XC60\'s interior is also highly configurable, with spacious seating for up to five occupants and versatile cargo space that can be easily adjusted to accommodate your needs.\r\n\r\nIn terms of technology, the XC60 is equipped with a range of advanced features designed to enhance the driving experience. A large touchscreen infotainment system, compatible with Apple CarPlay and Android Auto, provides seamless connectivity and access to your favorite apps and entertainment options. The XC60 also offers a suite of driver assistance features, including adaptive cruise control, lane-keeping assist, and automatic emergency braking, to help keep you safe on the road.\r\n\r\nWhen it comes to performance, the XC60 offers a choice of powerful yet efficient engines, including turbocharged and supercharged options, that deliver responsive acceleration and confident handling. Available all-wheel drive further enhances traction and stability, making the XC60 well-suited for a variety of driving conditions.\r\n\r\nOverall, the Volvo XC60 is a standout choice in the luxury SUV segment, offering a perfect blend of style, comfort, technology, and safety that appeals to discerning drivers who prioritize quality and refinement.', '2025-01-17', 0, 1, 62, 30, 2, 3, 5, '2024-03-11 08:43:35', '2024-03-11 08:51:53'),
(20, 'Mazda 3', '5', '1710150479255119.png', 18990.00, '2022', 'The Mazda 3 is a compact car that stands out in its segment for its striking design, engaging driving dynamics, and upscale interior. Available as both a sedan and a hatchback, the Mazda 3 combines sporty styling with refined features to offer a premium driving experience.\r\n\r\nOne of the standout features of the Mazda 3 is its sleek and modern exterior design, characterized by Mazda\'s Kodo design language. With its sculpted lines, bold grille, and distinctive LED headlights, the Mazda 3 exudes a sense of elegance and sophistication on the road.\r\n\r\nInside, the Mazda 3 boasts a high-quality interior that rivals luxury cars in its class. Premium materials, such as soft-touch surfaces and available leather upholstery, create a comfortable and inviting environment for both driver and passengers. The Mazda 3\'s cabin is also equipped with advanced technology features, including a large touchscreen infotainment system, smartphone integration, and available premium audio systems, providing connectivity and entertainment on the go.\r\n\r\nIn terms of performance, the Mazda 3 offers a responsive and engaging driving experience. Available with a choice of efficient yet peppy engines, including a Skyactiv-G gasoline engine and a Skyactiv-D diesel engine (depending on the market), the Mazda 3 delivers smooth acceleration and nimble handling. The Mazda 3\'s precise steering and well-tuned suspension further enhance its agility and stability, making it a joy to drive on both city streets and winding roads.\r\n\r\nOverall, the Mazda 3 is a well-rounded compact car that impresses with its stylish design, upscale interior, and enjoyable driving dynamics. Whether you\'re looking for a practical daily driver or a fun-to-drive commuter, the Mazda 3 offers a compelling combination of features and performance that sets it apart from the competition.', NULL, 0, 1, 45, 31, 2, 1, 5, '2024-03-11 08:47:59', '2024-03-12 07:57:01'),
(21, 'Mazda 6 SKYACTIV-G', '8000', '1710150708310035.png', 40000.00, '2022', 'The Mazda 6 is a midsize sedan that stands out in its segment for its sleek design, upscale interior, and engaging driving dynamics. With its elegant and sporty exterior styling, the Mazda 6 exudes a sense of sophistication and refinement on the road.\r\n\r\nOne of the defining features of the Mazda 6 is its striking design, characterized by Mazda\'s Kodo design language. With its flowing lines, bold grille, and sleek LED headlights, the Mazda 6 has a commanding presence that turns heads wherever it goes.\r\n\r\nInside, the Mazda 6 boasts a premium interior that rivals luxury cars in its class. High-quality materials, such as soft-touch surfaces and available Nappa leather upholstery, create a luxurious and comfortable environment for both driver and passengers. The Mazda 6\'s cabin is also equipped with advanced technology features, including a large touchscreen infotainment system, smartphone integration, and available premium audio systems, providing connectivity and entertainment on the go.\r\n\r\nIn terms of performance, the Mazda 6 offers a dynamic and responsive driving experience. Available with a choice of efficient yet powerful engines, including a Skyactiv-G gasoline engine and a Skyactiv-D diesel engine (depending on the market), the Mazda 6 delivers smooth acceleration and agile handling. The Mazda 6\'s precise steering and well-tuned suspension further enhance its agility and stability, making it a joy to drive on both city streets and highways.\r\n\r\nOverall, the Mazda 6 is a stylish and sophisticated sedan that impresses with its design, interior quality, and driving dynamics. Whether you\'re commuting to work or taking a weekend road trip, the Mazda 6 offers a comfortable and enjoyable driving experience that sets it apart from the competition.', '2024-09-05', 0, 1, 43, 32, 6, 1, 5, '2024-03-11 08:51:48', '2024-03-12 07:57:04'),
(22, 'Land Rover Discovery', '3500', '1710151158916830.png', 75900.00, '2023', 'The Land Rover Discovery is a versatile and capable luxury SUV that excels both on and off the road. Known for its rugged yet refined design, the Discovery offers a perfect blend of luxury, comfort, and off-road prowess.\r\n\r\nOne of the key features of the Discovery is its iconic boxy design, which not only gives it a distinctive appearance but also contributes to its practicality and versatility. With its tall roofline and large windows, the Discovery offers spacious seating for up to seven passengers, along with ample cargo space to accommodate gear and luggage for all your adventures.\r\n\r\nInside, the Discovery boasts a luxurious and well-appointed cabin, with premium materials, exquisite craftsmanship, and advanced technology throughout. Depending on the trim level, features such as leather upholstery, heated and ventilated seats, panoramic sunroof, and dual-zone climate control are available to enhance comfort for both driver and passengers. The Discovery\'s infotainment system includes a touchscreen display with navigation, smartphone integration, and a range of connectivity options, keeping you entertained and informed on the go.\r\n\r\nIn terms of performance, the Discovery offers a range of powerful engines, including petrol and diesel options, providing strong acceleration and capable towing capabilities. Land Rover\'s Terrain Response system, available on certain trim levels, allows you to tailor the vehicle\'s performance to suit different driving conditions, whether you\'re traversing rocky trails or navigating city streets.\r\n\r\nWith its rugged capabilities, luxurious amenities, and advanced technology, the Land Rover Discovery is well-suited for those who seek a versatile and capable SUV that can handle any adventure with style and comfort.', NULL, 0, 1, 46, 33, 9, 3, 6, '2024-03-11 08:59:18', '2024-03-12 07:57:09'),
(23, 'Mitsubishi Pajero', '50259', '1710151461993564.png', 33000.00, '2018', 'The Mitsubishi Pajero is a rugged and capable SUV known for its off-road prowess, durability, and spacious interior. Renowned for its reliability and versatility, the Pajero has been a popular choice for adventurers and families alike.\r\n\r\nWith its robust body-on-frame construction and advanced four-wheel-drive system, the Pajero is well-equipped to tackle challenging terrain and adverse weather conditions with ease. Whether you\'re navigating rocky trails or traversing sandy dunes, the Pajero\'s off-road capabilities ensure confident performance in a variety of environments.\r\n\r\nThe Pajero\'s exterior design features a bold and muscular appearance, with rugged styling cues such as a prominent grille, high ground clearance, and protective skid plates, highlighting its adventurous spirit. Inside, the Pajero offers a spacious and comfortable cabin with seating for up to seven passengers, making it ideal for long journeys and family outings. The interior is well-appointed with quality materials and modern amenities, including touchscreen infotainment systems, Bluetooth connectivity, and available premium audio systems, ensuring a comfortable and enjoyable driving experience for all occupants.\r\n\r\nIn terms of performance, the Pajero is typically powered by a range of robust engines, providing ample power and torque for both on-road driving and off-road adventures. Available diesel and petrol options offer a balance of performance and fuel efficiency, while advanced suspension systems and off-road driving modes enhance traction and stability in challenging conditions.\r\n\r\nOverall, the Mitsubishi Pajero is a versatile and capable SUV that offers a combination of ruggedness, comfort, and practicality, making it a popular choice for drivers seeking adventure and exploration without compromising on comfort or reliability.', NULL, 0, 1, 47, 34, 6, 3, 6, '2024-03-11 09:04:21', '2024-03-12 07:57:16'),
(24, 'Mitsubishi Lancer', '85580', '1710151639743301.png', 15480.00, '2002', 'The Mitsubishi Lancer is a compact sedan known for its sporty styling, agile handling, and reliability. With a history spanning several decades, the Lancer has established itself as a popular choice among drivers seeking a balance of performance and practicality.\r\n\r\nThe exterior design of the Lancer is characterized by its sleek and athletic profile, featuring a distinctive front grille, sculpted body lines, and available rear spoiler, giving it a sporty and dynamic appearance. Inside, the Lancer offers a comfortable and well-appointed cabin, with seating for up to five passengers and ample headroom and legroom for all occupants. The interior is equipped with modern amenities such as touchscreen infotainment systems, smartphone integration, and available premium audio systems, ensuring a connected and enjoyable driving experience.\r\n\r\nIn terms of performance, the Lancer offers a range of engine options, including efficient four-cylinder units and more powerful turbocharged engines in certain trim levels. Responsive steering and nimble handling make the Lancer a pleasure to drive, whether navigating city streets or winding country roads. Additionally, available all-wheel-drive systems provide added traction and stability in adverse weather conditions.\r\n\r\nWhile the Lancer is no longer in production as of recent years, it remains a popular choice on the used car market due to its reputation for reliability, affordability, and sporty driving dynamics. Whether you\'re a commuter seeking fuel efficiency or an enthusiast looking for a spirited ride, the Mitsubishi Lancer offers a compelling combination of features and performance.', NULL, 0, 1, 48, 35, 1, 2, 6, '2024-03-11 09:07:19', '2024-03-12 07:57:32'),
(25, 'Fiat 500', '55369', '1710152077487290.png', 9900.00, '2018', 'The Fiat 500 is an iconic city car renowned for its compact size, retro styling, and cheerful personality. Originally introduced in the 1950s, the Fiat 500 has remained a beloved choice for urban commuters and drivers seeking a stylish and economical ride.\r\n\r\nThe Fiat 500\'s exterior design is characterized by its cute and playful appearance, with round headlights, a rounded roofline, and a distinctive silhouette that pays homage to its vintage predecessor. Despite its small dimensions, the Fiat 500 offers a surprising amount of interior space, with seating for up to four passengers and clever storage solutions throughout the cabin.\r\n\r\nInside, the Fiat 500 features a charming and well-appointed interior, with a range of customization options available to suit individual tastes. From colorful upholstery choices to premium trim materials, the Fiat 500 allows drivers to personalize their ride to reflect their unique style. Despite its retro-inspired design, the Fiat 500 is equipped with modern amenities such as touchscreen infotainment systems, smartphone integration, and available driver assistance features for added convenience and safety.\r\n\r\nIn terms of performance, the Fiat 500 offers a range of engine options, including efficient gasoline and diesel engines, as well as an all-electric variant for eco-conscious drivers. Responsive steering and nimble handling make the Fiat 500 ideal for navigating crowded city streets, while its compact size allows for easy parking and maneuverability in tight spaces.\r\n\r\nOverall, the Fiat 500 is a charming and practical city car that combines style, efficiency, and affordability, making it a popular choice for drivers seeking a fun and functional ride for urban adventures.', NULL, 0, 1, 50, 36, 2, 1, 6, '2024-03-11 09:14:37', '2024-03-12 07:59:16'),
(28, 'BMW X6', '13000', '1710236300384002.png', 31330.00, '2016', 'The BMW X6 with its 3.0-liter engine and 370 horsepower offers a compelling blend of performance, luxury, and versatility in the luxury SUV segment. Powered by a turbocharged inline-six engine, the X6 delivers ample power for exhilarating acceleration and confident highway cruising, while maintaining impressive fuel efficiency for its size and class. The X6\'s sleek and athletic exterior design exudes confidence and presence on the road, with BMW\'s signature kidney grille, sculpted lines, and aggressive styling cues adding to its sporty appeal. Inside, the cabin offers a luxurious and technologically advanced environment, with premium materials, ergonomic design, and cutting-edge features throughout. Comfort amenities such as heated and ventilated seats, dual-zone automatic climate control, and ambient lighting ensure a refined driving experience for both driver and passengers. The X6 also boasts a host of advanced infotainment and driver assistance systems, providing connectivity, convenience, and safety on every journey. With its combination of performance, luxury, and versatility, the BMW X6 3.0 370hp stands as a formidable contender in the competitive luxury SUV market, appealing to drivers who seek both style and substance in their vehicle choice.', '2024-10-02', 0, 1, 34, 39, 6, 3, 3, '2024-03-12 08:38:20', '2024-03-12 08:38:58');

-- --------------------------------------------------------

--
-- Table structure for table `car_equipment`
--

CREATE TABLE `car_equipment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `equipment_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_equipment`
--

INSERT INTO `car_equipment` (`id`, `car_id`, `equipment_id`, `created_at`, `updated_at`) VALUES
(78, 1, 1, NULL, NULL),
(79, 1, 2, NULL, NULL),
(80, 1, 3, NULL, NULL),
(81, 1, 19, NULL, NULL),
(82, 1, 20, NULL, NULL),
(83, 1, 37, NULL, NULL),
(84, 1, 41, NULL, NULL),
(85, 2, 12, NULL, NULL),
(86, 2, 13, NULL, NULL),
(87, 2, 15, NULL, NULL),
(88, 2, 17, NULL, NULL),
(89, 2, 19, NULL, NULL),
(90, 2, 29, NULL, NULL),
(91, 3, 2, NULL, NULL),
(92, 3, 3, NULL, NULL),
(93, 3, 4, NULL, NULL),
(94, 3, 8, NULL, NULL),
(95, 3, 13, NULL, NULL),
(96, 3, 25, NULL, NULL),
(97, 4, 1, NULL, NULL),
(98, 4, 2, NULL, NULL),
(99, 4, 17, NULL, NULL),
(100, 4, 19, NULL, NULL),
(101, 4, 21, NULL, NULL),
(102, 4, 41, NULL, NULL),
(103, 5, 4, NULL, NULL),
(104, 5, 5, NULL, NULL),
(105, 5, 6, NULL, NULL),
(106, 5, 26, NULL, NULL),
(107, 6, 1, NULL, NULL),
(108, 6, 2, NULL, NULL),
(109, 6, 4, NULL, NULL),
(110, 6, 22, NULL, NULL),
(111, 6, 23, NULL, NULL),
(112, 6, 31, NULL, NULL),
(113, 6, 37, NULL, NULL),
(114, 6, 40, NULL, NULL),
(115, 7, 1, NULL, NULL),
(116, 7, 2, NULL, NULL),
(117, 7, 11, NULL, NULL),
(118, 7, 12, NULL, NULL),
(119, 7, 13, NULL, NULL),
(120, 7, 14, NULL, NULL),
(121, 7, 15, NULL, NULL),
(122, 7, 16, NULL, NULL),
(123, 7, 19, NULL, NULL),
(124, 7, 20, NULL, NULL),
(125, 7, 35, NULL, NULL),
(126, 7, 36, NULL, NULL),
(127, 7, 37, NULL, NULL),
(128, 7, 41, NULL, NULL),
(129, 8, 13, NULL, NULL),
(130, 8, 16, NULL, NULL),
(131, 8, 17, NULL, NULL),
(132, 8, 19, NULL, NULL),
(133, 8, 20, NULL, NULL),
(134, 9, 1, NULL, NULL),
(135, 9, 2, NULL, NULL),
(136, 9, 3, NULL, NULL),
(137, 9, 5, NULL, NULL),
(138, 9, 6, NULL, NULL),
(139, 9, 27, NULL, NULL),
(140, 9, 28, NULL, NULL),
(141, 9, 29, NULL, NULL),
(142, 9, 34, NULL, NULL),
(143, 9, 35, NULL, NULL),
(144, 9, 37, NULL, NULL),
(145, 10, 1, NULL, NULL),
(146, 10, 2, NULL, NULL),
(147, 10, 3, NULL, NULL),
(148, 10, 13, NULL, NULL),
(149, 10, 17, NULL, NULL),
(150, 10, 18, NULL, NULL),
(151, 10, 28, NULL, NULL),
(152, 10, 35, NULL, NULL),
(153, 10, 36, NULL, NULL),
(154, 11, 1, NULL, NULL),
(155, 11, 2, NULL, NULL),
(156, 11, 3, NULL, NULL),
(157, 11, 4, NULL, NULL),
(158, 11, 5, NULL, NULL),
(159, 11, 6, NULL, NULL),
(160, 11, 7, NULL, NULL),
(161, 11, 8, NULL, NULL),
(162, 11, 10, NULL, NULL),
(163, 11, 12, NULL, NULL),
(164, 11, 13, NULL, NULL),
(165, 11, 19, NULL, NULL),
(166, 11, 20, NULL, NULL),
(167, 11, 26, NULL, NULL),
(168, 11, 27, NULL, NULL),
(169, 11, 28, NULL, NULL),
(170, 11, 37, NULL, NULL),
(171, 12, 1, NULL, NULL),
(172, 12, 4, NULL, NULL),
(173, 12, 5, NULL, NULL),
(174, 12, 16, NULL, NULL),
(175, 12, 17, NULL, NULL),
(176, 12, 30, NULL, NULL),
(177, 12, 31, NULL, NULL),
(178, 12, 41, NULL, NULL),
(179, 13, 1, NULL, NULL),
(180, 13, 2, NULL, NULL),
(181, 13, 3, NULL, NULL),
(182, 13, 4, NULL, NULL),
(183, 13, 5, NULL, NULL),
(184, 13, 18, NULL, NULL),
(185, 13, 19, NULL, NULL),
(186, 14, 1, NULL, NULL),
(187, 14, 2, NULL, NULL),
(188, 14, 4, NULL, NULL),
(189, 14, 5, NULL, NULL),
(190, 14, 13, NULL, NULL),
(191, 14, 14, NULL, NULL),
(192, 14, 30, NULL, NULL),
(193, 14, 31, NULL, NULL),
(194, 14, 36, NULL, NULL),
(195, 14, 37, NULL, NULL),
(196, 15, 2, NULL, NULL),
(197, 15, 3, NULL, NULL),
(198, 15, 13, NULL, NULL),
(199, 15, 14, NULL, NULL),
(200, 16, 1, NULL, NULL),
(201, 16, 2, NULL, NULL),
(202, 16, 3, NULL, NULL),
(203, 16, 6, NULL, NULL),
(204, 16, 7, NULL, NULL),
(205, 16, 19, NULL, NULL),
(206, 16, 20, NULL, NULL),
(207, 16, 30, NULL, NULL),
(208, 16, 40, NULL, NULL),
(209, 17, 1, NULL, NULL),
(210, 17, 3, NULL, NULL),
(211, 17, 4, NULL, NULL),
(212, 17, 13, NULL, NULL),
(213, 17, 20, NULL, NULL),
(214, 17, 21, NULL, NULL),
(215, 17, 22, NULL, NULL),
(216, 17, 23, NULL, NULL),
(217, 17, 34, NULL, NULL),
(218, 17, 35, NULL, NULL),
(219, 17, 39, NULL, NULL),
(220, 18, 1, NULL, NULL),
(221, 18, 4, NULL, NULL),
(222, 18, 5, NULL, NULL),
(223, 18, 6, NULL, NULL),
(224, 19, 1, NULL, NULL),
(225, 19, 2, NULL, NULL),
(226, 19, 3, NULL, NULL),
(227, 19, 8, NULL, NULL),
(228, 19, 9, NULL, NULL),
(229, 19, 13, NULL, NULL),
(230, 19, 14, NULL, NULL),
(231, 19, 26, NULL, NULL),
(232, 19, 27, NULL, NULL),
(233, 19, 28, NULL, NULL),
(234, 19, 38, NULL, NULL),
(235, 20, 1, NULL, NULL),
(236, 20, 2, NULL, NULL),
(237, 20, 3, NULL, NULL),
(238, 20, 9, NULL, NULL),
(239, 20, 10, NULL, NULL),
(240, 20, 25, NULL, NULL),
(241, 20, 26, NULL, NULL),
(242, 20, 40, NULL, NULL),
(243, 21, 1, NULL, NULL),
(244, 21, 2, NULL, NULL),
(245, 21, 3, NULL, NULL),
(246, 21, 15, NULL, NULL),
(247, 21, 16, NULL, NULL),
(248, 21, 26, NULL, NULL),
(249, 21, 27, NULL, NULL),
(250, 21, 41, NULL, NULL),
(251, 22, 1, NULL, NULL),
(252, 22, 2, NULL, NULL),
(253, 22, 4, NULL, NULL),
(254, 22, 5, NULL, NULL),
(255, 22, 14, NULL, NULL),
(256, 22, 15, NULL, NULL),
(257, 22, 16, NULL, NULL),
(258, 22, 20, NULL, NULL),
(259, 22, 21, NULL, NULL),
(260, 22, 22, NULL, NULL),
(261, 22, 23, NULL, NULL),
(262, 22, 24, NULL, NULL),
(263, 22, 25, NULL, NULL),
(264, 22, 26, NULL, NULL),
(265, 22, 35, NULL, NULL),
(266, 22, 37, NULL, NULL),
(267, 23, 1, NULL, NULL),
(268, 23, 4, NULL, NULL),
(269, 23, 25, NULL, NULL),
(270, 23, 36, NULL, NULL),
(271, 23, 39, NULL, NULL),
(272, 24, 1, NULL, NULL),
(273, 24, 4, NULL, NULL),
(274, 24, 5, NULL, NULL),
(275, 24, 13, NULL, NULL),
(276, 24, 18, NULL, NULL),
(277, 24, 19, NULL, NULL),
(278, 24, 30, NULL, NULL),
(279, 25, 1, NULL, NULL),
(280, 25, 3, NULL, NULL),
(281, 25, 4, NULL, NULL),
(282, 25, 13, NULL, NULL),
(283, 25, 17, NULL, NULL),
(284, 25, 36, NULL, NULL),
(286, 28, 1, NULL, NULL),
(287, 28, 2, NULL, NULL),
(288, 28, 3, NULL, NULL),
(289, 28, 7, NULL, NULL),
(290, 28, 21, NULL, NULL),
(291, 28, 22, NULL, NULL),
(292, 28, 37, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `car_models`
--

CREATE TABLE `car_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `body_id` bigint(20) UNSIGNED NOT NULL,
  `seat_id` bigint(20) UNSIGNED NOT NULL,
  `doors_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_models`
--

INSERT INTO `car_models` (`id`, `model_id`, `brand_id`, `body_id`, `seat_id`, `doors_id`, `created_at`, `updated_at`) VALUES
(19, 11, 1, 17, 1, 1, '2024-03-11 05:58:27', '2024-03-11 05:58:27'),
(20, 12, 2, 5, 4, 1, '2024-03-11 05:59:13', '2024-03-11 05:59:13'),
(21, 13, 1, 2, 4, 2, '2024-03-11 05:59:33', '2024-03-11 05:59:33'),
(22, 14, 4, 5, 4, 1, '2024-03-11 06:00:05', '2024-03-11 06:00:05'),
(23, 15, 5, 5, 4, 2, '2024-03-11 06:00:55', '2024-03-11 06:00:55'),
(24, 16, 5, 5, 4, 2, '2024-03-11 06:01:17', '2024-03-11 06:01:17'),
(25, 17, 5, 5, 4, 2, '2024-03-11 06:01:57', '2024-03-11 06:01:57'),
(26, 18, 5, 14, 4, 2, '2024-03-11 06:02:16', '2024-03-11 06:02:16'),
(27, 19, 6, 2, 4, 2, '2024-03-11 06:03:02', '2024-03-11 06:03:02'),
(31, 23, 8, 14, 4, 2, '2024-03-11 06:06:12', '2024-03-11 06:06:12'),
(33, 25, 8, 14, 4, 2, '2024-03-11 06:07:37', '2024-03-11 06:07:37'),
(34, 26, 8, 2, 4, 2, '2024-03-11 06:07:58', '2024-03-11 06:07:58'),
(35, 27, 9, 14, 4, 2, '2024-03-11 06:08:23', '2024-03-11 06:08:23'),
(36, 28, 9, 2, 4, 2, '2024-03-11 06:08:57', '2024-03-11 06:08:57'),
(37, 29, 9, 3, 3, 1, '2024-03-11 06:09:15', '2024-03-11 06:09:15'),
(38, 30, 10, 5, 4, 2, '2024-03-11 06:10:59', '2024-03-11 06:10:59'),
(39, 31, 10, 2, 4, 2, '2024-03-11 06:11:19', '2024-03-11 06:11:19'),
(40, 32, 11, 5, 4, 2, '2024-03-11 06:11:40', '2024-03-11 06:11:40'),
(41, 33, 11, 2, 4, 2, '2024-03-11 06:11:57', '2024-03-11 06:11:57'),
(42, 34, 15, 2, 7, 2, '2024-03-11 06:12:39', '2024-03-11 06:12:39'),
(43, 35, 16, 14, 4, 2, '2024-03-11 06:13:46', '2024-03-11 06:13:46'),
(44, 36, 16, 2, 4, 2, '2024-03-11 06:14:04', '2024-03-11 06:14:04'),
(45, 37, 16, 5, 4, 2, '2024-03-11 06:15:04', '2024-03-11 06:15:04'),
(46, 38, 25, 2, 4, 2, '2024-03-11 06:16:04', '2024-03-11 06:16:04'),
(47, 39, 27, 2, 3, 1, '2024-03-11 06:16:37', '2024-03-11 06:16:37'),
(48, 40, 27, 5, 4, 2, '2024-03-11 06:17:10', '2024-03-11 06:17:10'),
(49, 41, 29, 5, 4, 2, '2024-03-11 06:17:34', '2024-03-11 06:17:34'),
(50, 42, 29, 5, 3, 1, '2024-03-11 06:17:49', '2024-03-11 06:17:49'),
(53, 10, 1, 2, 4, 2, '2024-03-11 06:35:55', '2024-03-11 06:35:55'),
(54, 12, 2, 5, 4, 2, '2024-03-11 06:46:32', '2024-03-11 06:46:32'),
(55, 14, 4, 5, 4, 2, '2024-03-11 07:01:39', '2024-03-11 07:01:39'),
(57, 46, 7, 3, 3, 2, '2024-03-11 07:23:48', '2024-03-11 07:23:48'),
(58, 47, 7, 2, 4, 2, '2024-03-11 07:23:57', '2024-03-11 07:23:57'),
(59, 48, 7, 2, 4, 2, '2024-03-11 07:24:16', '2024-03-11 07:24:16'),
(60, 29, 9, 3, 1, 1, '2024-03-11 08:15:44', '2024-03-11 08:15:44'),
(61, 30, 10, 20, 4, 2, '2024-03-11 08:23:12', '2024-03-11 08:23:12'),
(62, 34, 15, 2, 6, 2, '2024-03-11 08:43:35', '2024-03-11 08:43:35');

-- --------------------------------------------------------

--
-- Table structure for table `car_safeties`
--

CREATE TABLE `car_safeties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `safety_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_safeties`
--

INSERT INTO `car_safeties` (`id`, `car_id`, `safety_id`, `created_at`, `updated_at`) VALUES
(153, 1, 1, NULL, NULL),
(154, 1, 2, NULL, NULL),
(155, 1, 3, NULL, NULL),
(156, 1, 4, NULL, NULL),
(157, 1, 10, NULL, NULL),
(158, 1, 16, NULL, NULL),
(159, 1, 18, NULL, NULL),
(160, 1, 21, NULL, NULL),
(161, 1, 22, NULL, NULL),
(162, 1, 37, NULL, NULL),
(163, 2, 1, NULL, NULL),
(164, 2, 2, NULL, NULL),
(165, 2, 3, NULL, NULL),
(166, 2, 4, NULL, NULL),
(167, 2, 9, NULL, NULL),
(168, 2, 10, NULL, NULL),
(169, 2, 21, NULL, NULL),
(170, 3, 1, NULL, NULL),
(171, 3, 2, NULL, NULL),
(172, 3, 3, NULL, NULL),
(173, 3, 5, NULL, NULL),
(174, 3, 10, NULL, NULL),
(175, 3, 11, NULL, NULL),
(176, 3, 12, NULL, NULL),
(177, 3, 15, NULL, NULL),
(178, 3, 17, NULL, NULL),
(179, 3, 25, NULL, NULL),
(180, 3, 32, NULL, NULL),
(181, 4, 1, NULL, NULL),
(182, 4, 2, NULL, NULL),
(183, 4, 3, NULL, NULL),
(184, 4, 4, NULL, NULL),
(185, 4, 7, NULL, NULL),
(186, 4, 8, NULL, NULL),
(187, 4, 9, NULL, NULL),
(188, 4, 32, NULL, NULL),
(189, 4, 33, NULL, NULL),
(190, 4, 41, NULL, NULL),
(191, 4, 42, NULL, NULL),
(192, 5, 1, NULL, NULL),
(193, 5, 2, NULL, NULL),
(194, 5, 4, NULL, NULL),
(195, 5, 7, NULL, NULL),
(196, 5, 11, NULL, NULL),
(197, 5, 21, NULL, NULL),
(198, 5, 22, NULL, NULL),
(199, 5, 24, NULL, NULL),
(200, 5, 44, NULL, NULL),
(201, 6, 1, NULL, NULL),
(202, 6, 2, NULL, NULL),
(203, 6, 3, NULL, NULL),
(204, 6, 7, NULL, NULL),
(205, 6, 9, NULL, NULL),
(206, 6, 10, NULL, NULL),
(207, 6, 24, NULL, NULL),
(208, 6, 25, NULL, NULL),
(209, 6, 32, NULL, NULL),
(210, 6, 39, NULL, NULL),
(211, 6, 44, NULL, NULL),
(212, 7, 1, NULL, NULL),
(213, 7, 2, NULL, NULL),
(214, 7, 3, NULL, NULL),
(215, 7, 4, NULL, NULL),
(216, 7, 5, NULL, NULL),
(217, 7, 6, NULL, NULL),
(218, 7, 9, NULL, NULL),
(219, 7, 10, NULL, NULL),
(220, 7, 11, NULL, NULL),
(221, 7, 19, NULL, NULL),
(222, 7, 20, NULL, NULL),
(223, 7, 26, NULL, NULL),
(224, 7, 27, NULL, NULL),
(225, 7, 28, NULL, NULL),
(226, 7, 35, NULL, NULL),
(227, 7, 36, NULL, NULL),
(228, 7, 40, NULL, NULL),
(229, 7, 43, NULL, NULL),
(230, 7, 44, NULL, NULL),
(231, 8, 1, NULL, NULL),
(232, 8, 2, NULL, NULL),
(233, 8, 5, NULL, NULL),
(234, 8, 6, NULL, NULL),
(235, 8, 16, NULL, NULL),
(236, 8, 17, NULL, NULL),
(237, 8, 20, NULL, NULL),
(238, 8, 31, NULL, NULL),
(239, 8, 43, NULL, NULL),
(240, 9, 1, NULL, NULL),
(241, 9, 2, NULL, NULL),
(242, 9, 3, NULL, NULL),
(243, 9, 7, NULL, NULL),
(244, 9, 9, NULL, NULL),
(245, 9, 10, NULL, NULL),
(246, 9, 26, NULL, NULL),
(247, 9, 27, NULL, NULL),
(248, 9, 36, NULL, NULL),
(249, 9, 37, NULL, NULL),
(250, 9, 43, NULL, NULL),
(251, 10, 1, NULL, NULL),
(252, 10, 2, NULL, NULL),
(253, 10, 3, NULL, NULL),
(254, 10, 6, NULL, NULL),
(255, 10, 8, NULL, NULL),
(256, 10, 9, NULL, NULL),
(257, 10, 10, NULL, NULL),
(258, 10, 18, NULL, NULL),
(259, 10, 19, NULL, NULL),
(260, 10, 28, NULL, NULL),
(261, 10, 30, NULL, NULL),
(262, 10, 37, NULL, NULL),
(263, 11, 1, NULL, NULL),
(264, 11, 2, NULL, NULL),
(265, 11, 3, NULL, NULL),
(266, 11, 4, NULL, NULL),
(267, 11, 5, NULL, NULL),
(268, 11, 6, NULL, NULL),
(269, 11, 7, NULL, NULL),
(270, 11, 10, NULL, NULL),
(271, 11, 11, NULL, NULL),
(272, 11, 12, NULL, NULL),
(273, 11, 13, NULL, NULL),
(274, 11, 19, NULL, NULL),
(275, 11, 20, NULL, NULL),
(276, 11, 27, NULL, NULL),
(277, 11, 28, NULL, NULL),
(278, 11, 37, NULL, NULL),
(279, 11, 38, NULL, NULL),
(280, 11, 39, NULL, NULL),
(281, 12, 1, NULL, NULL),
(282, 12, 2, NULL, NULL),
(283, 12, 3, NULL, NULL),
(284, 12, 4, NULL, NULL),
(285, 12, 9, NULL, NULL),
(286, 12, 10, NULL, NULL),
(287, 12, 17, NULL, NULL),
(288, 12, 18, NULL, NULL),
(289, 12, 31, NULL, NULL),
(290, 12, 32, NULL, NULL),
(291, 12, 38, NULL, NULL),
(292, 12, 39, NULL, NULL),
(293, 13, 1, NULL, NULL),
(294, 13, 2, NULL, NULL),
(295, 13, 3, NULL, NULL),
(296, 13, 4, NULL, NULL),
(297, 13, 7, NULL, NULL),
(298, 13, 8, NULL, NULL),
(299, 13, 14, NULL, NULL),
(300, 13, 15, NULL, NULL),
(301, 14, 1, NULL, NULL),
(302, 14, 2, NULL, NULL),
(303, 14, 3, NULL, NULL),
(304, 14, 4, NULL, NULL),
(305, 14, 5, NULL, NULL),
(306, 14, 16, NULL, NULL),
(307, 14, 17, NULL, NULL),
(308, 14, 30, NULL, NULL),
(309, 14, 31, NULL, NULL),
(310, 14, 37, NULL, NULL),
(311, 14, 38, NULL, NULL),
(312, 15, 2, NULL, NULL),
(313, 15, 3, NULL, NULL),
(314, 15, 4, NULL, NULL),
(315, 15, 13, NULL, NULL),
(316, 15, 14, NULL, NULL),
(317, 15, 15, NULL, NULL),
(318, 15, 19, NULL, NULL),
(319, 15, 21, NULL, NULL),
(320, 15, 31, NULL, NULL),
(321, 15, 34, NULL, NULL),
(322, 15, 40, NULL, NULL),
(323, 16, 1, NULL, NULL),
(324, 16, 2, NULL, NULL),
(325, 16, 3, NULL, NULL),
(326, 16, 11, NULL, NULL),
(327, 16, 12, NULL, NULL),
(328, 16, 13, NULL, NULL),
(329, 16, 21, NULL, NULL),
(330, 16, 22, NULL, NULL),
(331, 16, 30, NULL, NULL),
(332, 16, 31, NULL, NULL),
(333, 16, 32, NULL, NULL),
(334, 17, 1, NULL, NULL),
(335, 17, 2, NULL, NULL),
(336, 17, 3, NULL, NULL),
(337, 17, 8, NULL, NULL),
(338, 17, 16, NULL, NULL),
(339, 17, 17, NULL, NULL),
(340, 18, 1, NULL, NULL),
(341, 18, 2, NULL, NULL),
(342, 18, 3, NULL, NULL),
(343, 18, 7, NULL, NULL),
(344, 18, 9, NULL, NULL),
(345, 19, 1, NULL, NULL),
(346, 19, 2, NULL, NULL),
(347, 19, 3, NULL, NULL),
(348, 19, 4, NULL, NULL),
(349, 19, 6, NULL, NULL),
(350, 19, 7, NULL, NULL),
(351, 19, 12, NULL, NULL),
(352, 19, 13, NULL, NULL),
(353, 19, 21, NULL, NULL),
(354, 19, 22, NULL, NULL),
(355, 19, 23, NULL, NULL),
(356, 19, 28, NULL, NULL),
(357, 19, 29, NULL, NULL),
(358, 19, 39, NULL, NULL),
(359, 19, 44, NULL, NULL),
(360, 20, 1, NULL, NULL),
(361, 20, 2, NULL, NULL),
(362, 20, 3, NULL, NULL),
(363, 20, 4, NULL, NULL),
(364, 20, 5, NULL, NULL),
(365, 20, 9, NULL, NULL),
(366, 20, 10, NULL, NULL),
(367, 20, 25, NULL, NULL),
(368, 20, 26, NULL, NULL),
(369, 20, 39, NULL, NULL),
(370, 20, 40, NULL, NULL),
(371, 21, 1, NULL, NULL),
(372, 21, 2, NULL, NULL),
(373, 21, 3, NULL, NULL),
(374, 21, 12, NULL, NULL),
(375, 21, 13, NULL, NULL),
(376, 21, 17, NULL, NULL),
(377, 21, 18, NULL, NULL),
(378, 21, 26, NULL, NULL),
(379, 21, 27, NULL, NULL),
(380, 21, 29, NULL, NULL),
(381, 21, 41, NULL, NULL),
(382, 22, 1, NULL, NULL),
(383, 22, 2, NULL, NULL),
(384, 22, 3, NULL, NULL),
(385, 22, 4, NULL, NULL),
(386, 22, 5, NULL, NULL),
(387, 22, 6, NULL, NULL),
(388, 22, 7, NULL, NULL),
(389, 22, 8, NULL, NULL),
(390, 22, 9, NULL, NULL),
(391, 22, 10, NULL, NULL),
(392, 22, 16, NULL, NULL),
(393, 22, 17, NULL, NULL),
(394, 22, 18, NULL, NULL),
(395, 22, 19, NULL, NULL),
(396, 22, 28, NULL, NULL),
(397, 22, 29, NULL, NULL),
(398, 22, 37, NULL, NULL),
(399, 22, 38, NULL, NULL),
(400, 23, 1, NULL, NULL),
(401, 23, 2, NULL, NULL),
(402, 23, 3, NULL, NULL),
(403, 23, 6, NULL, NULL),
(404, 23, 11, NULL, NULL),
(405, 23, 12, NULL, NULL),
(406, 23, 17, NULL, NULL),
(407, 23, 18, NULL, NULL),
(408, 23, 34, NULL, NULL),
(409, 23, 42, NULL, NULL),
(410, 24, 1, NULL, NULL),
(411, 24, 2, NULL, NULL),
(412, 24, 3, NULL, NULL),
(413, 24, 4, NULL, NULL),
(414, 24, 11, NULL, NULL),
(415, 24, 12, NULL, NULL),
(416, 24, 18, NULL, NULL),
(417, 24, 19, NULL, NULL),
(418, 24, 28, NULL, NULL),
(419, 24, 29, NULL, NULL),
(420, 25, 1, NULL, NULL),
(421, 25, 2, NULL, NULL),
(422, 25, 5, NULL, NULL),
(423, 25, 6, NULL, NULL),
(424, 25, 12, NULL, NULL),
(425, 25, 20, NULL, NULL),
(426, 25, 21, NULL, NULL),
(429, 28, 1, NULL, NULL),
(430, 28, 2, NULL, NULL),
(431, 28, 3, NULL, NULL),
(432, 28, 4, NULL, NULL),
(433, 28, 5, NULL, NULL),
(434, 28, 6, NULL, NULL),
(435, 28, 7, NULL, NULL),
(436, 28, 10, NULL, NULL),
(437, 28, 12, NULL, NULL),
(438, 28, 13, NULL, NULL),
(439, 28, 22, NULL, NULL),
(440, 28, 23, NULL, NULL),
(441, 28, 36, NULL, NULL),
(442, 28, 37, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'red', NULL, NULL),
(2, 'blue', NULL, NULL),
(3, 'green', NULL, NULL),
(4, 'yellow', NULL, NULL),
(5, 'black', NULL, NULL),
(6, 'white', NULL, NULL),
(7, 'silver', NULL, NULL),
(8, 'gray', NULL, NULL),
(9, 'brown', NULL, NULL),
(10, 'orange', NULL, NULL),
(11, 'purple', NULL, NULL),
(12, 'gold', NULL, NULL),
(13, 'pink', NULL, NULL),
(14, 'bronze', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doors`
--

CREATE TABLE `doors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doors`
--

INSERT INTO `doors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '2/3', NULL, NULL),
(2, '4/5', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `drive_types`
--

CREATE TABLE `drive_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drive_types`
--

INSERT INTO `drive_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Front-wheel', NULL, NULL),
(2, 'Rear-wheel', NULL, NULL),
(3, 'Four-Wheel(AWD)', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `engines`
--

CREATE TABLE `engines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `engine_value` smallint(6) NOT NULL,
  `horsepower` smallint(6) NOT NULL,
  `fuel_id` bigint(20) UNSIGNED NOT NULL,
  `transmission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `engines`
--

INSERT INTO `engines` (`id`, `engine_value`, `horsepower`, `fuel_id`, `transmission_id`, `created_at`, `updated_at`) VALUES
(1, 1687, 141, 4, 2, NULL, NULL),
(2, 1725, 128, 3, 2, NULL, NULL),
(3, 1505, 156, 4, 1, NULL, NULL),
(4, 1615, 100, 3, 3, NULL, NULL),
(5, 1961, 144, 2, 1, NULL, NULL),
(6, 1404, 142, 3, 3, NULL, NULL),
(7, 1900, 150, 1, 1, '2024-03-10 16:40:35', '2024-03-10 16:40:35'),
(8, 1900, 150, 1, 1, '2024-03-10 17:25:14', '2024-03-10 17:25:14'),
(9, 1900, 150, 1, 1, '2024-03-10 17:52:54', '2024-03-10 17:52:54'),
(10, 1900, 150, 1, 1, '2024-03-10 19:04:56', '2024-03-10 19:04:56'),
(11, 3600, 200, 3, 1, '2024-03-11 05:32:51', '2024-03-11 05:32:51'),
(12, 2489, 218, 2, 1, '2024-03-11 06:35:55', '2024-03-11 06:35:55'),
(13, 1084, 75, 1, 2, '2024-03-11 06:46:32', '2024-03-11 06:46:32'),
(14, 1996, 330, 1, 2, '2024-03-11 07:01:39', '2024-03-11 07:01:39'),
(15, 1986, 245, 1, 1, '2024-03-11 07:08:16', '2024-03-11 07:08:16'),
(16, 1197, 81, 1, 2, '2024-03-11 07:13:36', '2024-03-11 07:13:36'),
(17, 1332, 103, 4, 2, '2024-03-11 07:22:40', '2024-03-11 07:22:40'),
(18, 2999, 450, 1, 1, '2024-03-11 07:31:45', '2024-03-11 07:31:45'),
(19, 2145, 200, 2, 1, '2024-03-11 07:35:05', '2024-03-11 07:35:05'),
(20, 2925, 330, 2, 1, '2024-03-11 07:41:16', '2024-03-11 07:41:16'),
(21, 1995, 190, 1, 1, '2024-03-11 07:47:46', '2024-03-11 07:47:46'),
(22, 4395, 610, 1, 1, '2024-03-11 07:53:45', '2024-03-11 07:53:45'),
(23, 2993, 370, 2, 1, '2024-03-11 07:57:09', '2024-03-11 07:57:09'),
(24, 1984, 250, 1, 1, '2024-03-11 08:07:23', '2024-03-11 08:07:23'),
(25, 2967, 330, 2, 1, '2024-03-11 08:11:47', '2024-03-11 08:11:47'),
(26, 1984, 210, 1, 1, '2024-03-11 08:15:44', '2024-03-11 08:15:44'),
(27, 1591, 130, 1, 2, '2024-03-11 08:23:12', '2024-03-11 08:23:12'),
(28, 998, 98, 1, 2, '2024-03-11 08:30:03', '2024-03-11 08:30:03'),
(29, 1591, 130, 1, 3, '2024-03-11 08:33:03', '2024-03-11 08:33:03'),
(30, 1969, 180, 1, 1, '2024-03-11 08:43:35', '2024-03-11 08:43:35'),
(31, 1998, 115, 4, 2, '2024-03-11 08:47:59', '2024-03-11 08:47:59'),
(32, 2488, 180, 1, 1, '2024-03-11 08:51:48', '2024-03-11 08:51:48'),
(33, 2997, 290, 2, 1, '2024-03-11 08:59:18', '2024-03-11 08:59:18'),
(34, 3200, 180, 2, 1, '2024-03-11 09:04:21', '2024-03-11 09:04:21'),
(35, 1997, 420, 1, 2, '2024-03-11 09:07:19', '2024-03-11 09:07:19'),
(36, 1242, 65, 1, 2, '2024-03-11 09:14:37', '2024-03-11 09:14:37'),
(37, 2000, 150, 1, 1, '2024-03-11 09:19:30', '2024-03-11 09:19:30'),
(38, 2500, 150, 1, 1, '2024-03-12 07:42:43', '2024-03-12 07:42:43'),
(39, 2993, 310, 2, 1, '2024-03-12 08:38:20', '2024-03-12 08:38:20');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Air Conditioning (A/C)', NULL, NULL),
(2, 'Xenon Headlights', NULL, NULL),
(3, 'Heated Seats', NULL, NULL),
(4, 'Power Windows', NULL, NULL),
(5, 'Power Door Locks', NULL, NULL),
(6, 'Keyless Entry', NULL, NULL),
(7, 'Remote Start', NULL, NULL),
(8, 'Power Adjustable Seats', NULL, NULL),
(9, 'Leather Seats', NULL, NULL),
(10, 'Sunroof/Moonroof', NULL, NULL),
(11, 'Navigation System', NULL, NULL),
(12, 'Bluetooth Connectivity', NULL, NULL),
(13, 'USB Ports', NULL, NULL),
(14, 'Auxiliary Input', NULL, NULL),
(15, 'Touchscreen Display', NULL, NULL),
(16, 'Apple CarPlay', NULL, NULL),
(17, 'Android Auto', NULL, NULL),
(18, 'Wireless Charging Pad', NULL, NULL),
(19, 'Cruise Control', NULL, NULL),
(20, 'Backup Camera', NULL, NULL),
(21, 'Parking Sensors', NULL, NULL),
(22, 'Blind Spot Monitoring', NULL, NULL),
(23, 'Lane Departure Warning System', NULL, NULL),
(24, 'Rain-Sensing Wipers', NULL, NULL),
(25, 'Automatic Headlights', NULL, NULL),
(26, 'Fog Lights', NULL, NULL),
(27, 'Alloy Wheels', NULL, NULL),
(28, 'Roof Rails', NULL, NULL),
(29, 'Towing Package', NULL, NULL),
(30, 'Fold-flat Seats', NULL, NULL),
(31, 'Third-row Seating', NULL, NULL),
(32, 'Rear Entertainment System', NULL, NULL),
(33, 'Automatic Emergency Braking', NULL, NULL),
(34, 'Adaptive Cruise Control', NULL, NULL),
(35, 'Collision Warning System', NULL, NULL),
(36, 'Power Tailgate', NULL, NULL),
(37, '360-degree Camera System', NULL, NULL),
(38, 'Heated Steering Wheel', NULL, NULL),
(39, 'Ventilated Seats', NULL, NULL),
(40, 'Multi-zone Climate Control', NULL, NULL),
(41, 'Adaptive Suspension', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fuels`
--

CREATE TABLE `fuels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fuels`
--

INSERT INTO `fuels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Gasoline', NULL, NULL),
(2, 'Diesel', NULL, NULL),
(3, 'Electric', NULL, NULL),
(4, 'Hybrid', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `path`, `car_id`, `created_at`, `updated_at`) VALUES
(77, '17101425555822885.png', 1, NULL, NULL),
(78, '17101425554489180.png', 1, NULL, NULL),
(79, '17101431925930641.png', 2, NULL, NULL),
(80, '17101431922154685.png', 2, NULL, NULL),
(81, '17101440999452958.png', 3, NULL, NULL),
(82, '17101440998028919.png', 3, NULL, NULL),
(83, '17101440996760779.png', 3, NULL, NULL),
(84, '17101444967825292.png', 4, NULL, NULL),
(85, '17101444962616614.png', 4, NULL, NULL),
(86, '17101444962265230.png', 4, NULL, NULL),
(87, '17101448166631419.png', 5, NULL, NULL),
(88, '17101448164179093.png', 5, NULL, NULL),
(89, '17101453601346530.png', 6, NULL, NULL),
(90, '17101453609499166.png', 6, NULL, NULL),
(91, '17101459056199467.png', 7, NULL, NULL),
(92, '17101459054758680.png', 7, NULL, NULL),
(93, '17101459052077993.png', 7, NULL, NULL),
(94, '17101459056554295.png', 7, NULL, NULL),
(95, '1710145905976615.png', 7, NULL, NULL),
(96, '17101461056839703.png', 8, NULL, NULL),
(97, '17101464767978304.png', 9, NULL, NULL),
(98, '17101464764926883.png', 9, NULL, NULL),
(99, '17101468666303003.png', 10, NULL, NULL),
(100, '17101472251170873.png', 11, NULL, NULL),
(101, '17101472254933752.png', 11, NULL, NULL),
(102, '17101474294369929.png', 12, NULL, NULL),
(103, '17101474293250630.png', 12, NULL, NULL),
(104, '17101480439021372.png', 13, NULL, NULL),
(105, '17101480432981354.png', 13, NULL, NULL),
(106, '1710148307285160.png', 14, NULL, NULL),
(107, '17101483074542388.png', 14, NULL, NULL),
(108, '17101485447081967.png', 15, NULL, NULL),
(109, '17101485443691119.png', 15, NULL, NULL),
(110, '17101485444801673.png', 15, NULL, NULL),
(111, '17101489927066477.png', 16, NULL, NULL),
(112, '17101494035586402.png', 17, NULL, NULL),
(113, '17101494033933383.png', 17, NULL, NULL),
(114, '17101495838673770.png', 18, NULL, NULL),
(115, '17101502158142909.png', 19, NULL, NULL),
(116, '17101502154427265.png', 19, NULL, NULL),
(117, '17101504795371311.png', 20, NULL, NULL),
(118, '17101504794666509.png', 20, NULL, NULL),
(119, '17101507081515280.png', 21, NULL, NULL),
(120, '17101507084661037.png', 21, NULL, NULL),
(121, '17101511589247308.png', 22, NULL, NULL),
(122, '17101511586043888.png', 22, NULL, NULL),
(123, '1710151461435394.png', 23, NULL, NULL),
(124, '17101514612838961.png', 23, NULL, NULL),
(125, '17101516393104614.png', 24, NULL, NULL),
(126, '17101520773125702.png', 25, NULL, NULL),
(127, '17101520777670137.png', 25, NULL, NULL),
(128, '17102363004647757.png', 28, NULL, NULL),
(129, '17102363003688673.png', 28, NULL, NULL),
(130, '17102363001513610.png', 28, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `route` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `route`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'home', 0, NULL, NULL),
(2, 'Contact', 'contact', 1, NULL, NULL),
(3, 'Cars', 'cars.index', 2, NULL, NULL),
(4, 'Car Comparison', 'car.comparison', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2024_02_27_183404_create_menus_table', 1),
(3, '2024_02_27_183541_create_colors_table', 1),
(4, '2024_02_27_183827_create_fuels_table', 1),
(5, '2024_02_27_184149_create_transmissions_table', 1),
(6, '2024_02_27_184218_create_drive_types_table', 1),
(7, '2024_02_27_184245_create_engines_table', 1),
(8, '2024_02_27_184747_create_bodies_table', 1),
(9, '2024_02_27_184802_create_brands_table', 1),
(10, '2024_02_27_184814_create_seats_table', 1),
(11, '2024_02_27_184846_create_doors_table', 1),
(12, '2024_02_27_184932_create_roles_table', 1),
(13, '2024_02_27_184949_create_models', 1),
(14, '2024_02_27_184950_create_users_table', 1),
(15, '2024_02_27_184951_create_car_models_table', 1),
(16, '2024_02_27_185239_create_cars_table', 1),
(17, '2024_02_27_190456_create_safeties_table', 1),
(18, '2024_02_27_190518_create_equipment_table', 1),
(19, '2024_02_27_192213_create_images_table', 1),
(20, '2024_02_29_122203_create_car_safeties_table', 1),
(21, '2024_02_29_122322_create_car_equipment_table', 1),
(22, '2024_03_02_151204_create_wish_list', 1);

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Q8', NULL, NULL),
(2, 'A6', NULL, NULL),
(3, 'A3', NULL, NULL),
(4, '320d', NULL, NULL),
(5, 'M5', NULL, NULL),
(6, 'X5', NULL, NULL),
(7, 'Test 2', '2024-03-10 19:02:12', '2024-03-10 19:02:12'),
(8, 'Test 2', '2024-03-10 19:02:27', '2024-03-10 19:02:27'),
(9, 'Test 2', '2024-03-11 05:41:54', '2024-03-11 05:41:54'),
(10, 'RAV 4', '2024-03-11 05:57:54', '2024-03-11 05:57:54'),
(11, 'Supra', '2024-03-11 05:58:27', '2024-03-11 05:58:27'),
(12, 'Fiesta', '2024-03-11 05:59:13', '2024-03-11 05:59:13'),
(13, 'Kuga', '2024-03-11 05:59:33', '2024-03-11 05:59:33'),
(14, 'Civic', '2024-03-11 06:00:05', '2024-03-11 06:00:05'),
(15, 'Golf 5', '2024-03-11 06:00:55', '2024-03-11 06:00:55'),
(16, 'Polo', '2024-03-11 06:01:17', '2024-03-11 06:01:17'),
(17, 'Golf 8', '2024-03-11 06:01:57', '2024-03-11 06:01:57'),
(18, 'Passat B6', '2024-03-11 06:02:16', '2024-03-11 06:02:16'),
(19, 'Qashai', '2024-03-11 06:03:02', '2024-03-11 06:03:02'),
(20, 'GLE 350', '2024-03-11 06:04:31', '2024-03-11 06:04:31'),
(21, 'ML 250', '2024-03-11 06:04:50', '2024-03-11 06:04:50'),
(22, 'CLS 400', '2024-03-11 06:05:28', '2024-03-11 06:05:28'),
(23, '320', '2024-03-11 06:06:12', '2024-03-11 06:06:12'),
(24, 'X6', '2024-03-11 06:06:57', '2024-03-11 06:06:57'),
(25, 'M5', '2024-03-11 06:07:37', '2024-03-11 06:07:37'),
(26, 'X6', '2024-03-11 06:07:58', '2024-03-11 06:07:58'),
(27, 'A6', '2024-03-11 06:08:23', '2024-03-11 06:08:23'),
(28, 'Q8', '2024-03-11 06:08:57', '2024-03-11 06:08:57'),
(29, 'TT', '2024-03-11 06:09:15', '2024-03-11 06:09:15'),
(30, 'i40', '2024-03-11 06:10:59', '2024-03-11 06:10:59'),
(31, 'Kona', '2024-03-11 06:11:19', '2024-03-11 06:11:19'),
(32, 'Rio', '2024-03-11 06:11:40', '2024-03-11 06:11:40'),
(33, 'Sportage', '2024-03-11 06:11:57', '2024-03-11 06:11:57'),
(34, 'XC60', '2024-03-11 06:12:39', '2024-03-11 06:12:39'),
(35, '6', '2024-03-11 06:13:46', '2024-03-11 06:13:46'),
(36, 'CX-30', '2024-03-11 06:14:04', '2024-03-11 06:14:04'),
(37, '3', '2024-03-11 06:15:04', '2024-03-11 06:15:04'),
(38, 'Discovery', '2024-03-11 06:16:04', '2024-03-11 06:16:04'),
(39, 'Pajero', '2024-03-11 06:16:37', '2024-03-11 06:16:37'),
(40, 'Lancer', '2024-03-11 06:17:10', '2024-03-11 06:17:10'),
(41, 'Evo', '2024-03-11 06:17:34', '2024-03-11 06:17:34'),
(42, '500', '2024-03-11 06:17:49', '2024-03-11 06:17:49'),
(43, 'MiTo', '2024-03-11 06:18:25', '2024-03-11 06:18:25'),
(44, 'Giulietta', '2024-03-11 06:19:40', '2024-03-11 06:19:40'),
(45, 'GLE', '2024-03-11 07:23:36', '2024-03-11 07:23:36'),
(46, 'CLS', '2024-03-11 07:23:48', '2024-03-11 07:23:48'),
(47, 'ML', '2024-03-11 07:23:57', '2024-03-11 07:23:57'),
(48, 'GLE', '2024-03-11 07:24:16', '2024-03-11 07:24:16'),
(49, 'Test 2', '2024-03-11 19:29:53', '2024-03-11 19:29:53'),
(50, 'Test', '2024-03-12 08:08:39', '2024-03-12 08:08:39');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'user', NULL, NULL),
(2, 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `safeties`
--

CREATE TABLE `safeties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `safeties`
--

INSERT INTO `safeties` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'ABS', NULL, NULL),
(2, 'Airbags', NULL, NULL),
(3, 'Electronic Stability Control (ESC)', NULL, NULL),
(4, 'Traction Control System (TCS)', NULL, NULL),
(5, 'Adaptive Cruise Control (ACC)', NULL, NULL),
(6, 'Blind Spot Monitoring (BSM)', NULL, NULL),
(7, 'Lane Departure Warning (LDW)', NULL, NULL),
(8, 'Forward Collision Warning (FCW)', NULL, NULL),
(9, 'Automatic Emergency Braking (AEB)', NULL, NULL),
(10, 'Backup Camera', NULL, NULL),
(11, 'Tire Pressure Monitoring System (TPMS)', NULL, NULL),
(12, 'Electronic Brakeforce Distribution (EBD)', NULL, NULL),
(13, 'Brake Assist (BA)', NULL, NULL),
(14, 'Vehicle Stability Assist (VSA)', NULL, NULL),
(15, 'Collision Mitigation Braking System (CMBS)', NULL, NULL),
(16, 'Pedestrian Detection System', NULL, NULL),
(17, 'Cross Traffic Alert (CTA)', NULL, NULL),
(18, 'Pre-Collision System', NULL, NULL),
(19, 'Lane Keeping Assist (LKA)', NULL, NULL),
(20, 'Emergency Brake Assist (EBA)', NULL, NULL),
(21, 'Hill Start Assist (HSA)', NULL, NULL),
(22, 'Dynamic Brake Control (DBC)', NULL, NULL),
(23, 'Roll Stability Control (RSC)', NULL, NULL),
(24, 'Emergency Stop Signal (ESS)', NULL, NULL),
(25, 'Driver Attention Monitoring', NULL, NULL),
(26, 'Traffic Sign Recognition', NULL, NULL),
(27, 'Isofix Child Seat Anchors', NULL, NULL),
(28, 'Whiplash Protection System (WPS)', NULL, NULL),
(29, 'Rearview Camera', NULL, NULL),
(30, 'Park Assist', NULL, NULL),
(31, 'Automatic High Beams (AHB)', NULL, NULL),
(32, 'Rain Sensing Wipers', NULL, NULL),
(33, 'Automatic Headlights', NULL, NULL),
(34, 'Child Safety Locks', NULL, NULL),
(35, 'Anti-Whiplash Front Head Restraints', NULL, NULL),
(36, 'Lane Departure Prevention', NULL, NULL),
(37, 'Lane Change Assist', NULL, NULL),
(38, 'Fatigue Detection System', NULL, NULL),
(39, 'Adaptive Headlights', NULL, NULL),
(40, 'Driver Knee Airbag', NULL, NULL),
(41, 'Passenger Knee Airbag', NULL, NULL),
(42, 'Side Impact Airbags', NULL, NULL),
(43, 'Seatbelt Pretension', NULL, NULL),
(44, 'Energy-absorbing Steering Column', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `value`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, NULL),
(2, 3, NULL, NULL),
(3, 4, NULL, NULL),
(4, 5, NULL, NULL),
(5, 6, NULL, NULL),
(6, 7, NULL, NULL),
(7, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transmissions`
--

CREATE TABLE `transmissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transmissions`
--

INSERT INTO `transmissions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Automatic', NULL, NULL),
(2, 'Manual', NULL, NULL),
(3, 'Semi-Automatic', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `password`, `email`, `phone`, `address`, `city`, `avatar`, `role_id`, `created_at`, `updated_at`) VALUES
(2, 'Ilija', 'Antanasijevic', '$2y$12$hwLf5jiJ6dtsELtiFDteC.rfvZMKBLzONLZL4HdfU57k7nV538fHW', 'ilija0125@gmail.com', '1458256', 'Paracin', 'Paracin', 'default.jpg', 2, '2024-03-10 16:25:18', '2024-03-10 16:25:18'),
(3, 'Bill', 'Martinez', '$2y$12$GCEDgF8nfRb.lmpiUQVv2eW9JG2KnMhHXNBU4/lZfWZqnOuPNcNLC', 'bill@gmail.com', '2153264574', 'PA 18067', 'Northampton', '1710231972.jpg', 1, '2024-03-10 21:08:40', '2024-03-12 08:27:22'),
(4, 'Jerry', 'Thomas', '$2y$12$0Bt8NDV57387uStnm4bbput1qT90kt0sN7OI1GqgD2ENSr/Age71a', 'jerryThomas@gmail.com', '2679716943', 'Pennsylvania(PA) 19108', 'Philadelphia', '1710145041.jpg', 1, '2024-03-11 07:17:21', '2024-03-11 07:17:21'),
(5, 'Abbie', 'Clemons', '$2y$12$MbLLrtdl6wYXzWfjG6YYFOGaeHJtbzI7DdAoLBQxsmoIp7WuK557G', 'abbie@gmail.com', '486874240', 'Arkansas 72', 'Fort Smith', '1710147794.jpg', 1, '2024-03-11 08:03:14', '2024-03-11 08:38:20'),
(6, 'Deloris', 'Robison', '$2y$12$bnnJY3W88//pd3YGnxmT6.EbprCx6/vMRo0cTzHsHTfYYQTDk9e8.', 'deloris@gmail.com', '78965854120', 'Missouri(MO)', 'Belleview', '1710150831.jpg', 1, '2024-03-11 08:53:51', '2024-03-11 08:53:51'),
(7, 'Testt', 'Test', '$2y$12$oswikEWPh96ZSsAO7se//udf2HpyxTFGoPtBJA9Uc.r4PNp8JWLv.', 'testIlija@gmail.com', '7898874574', 'TestIlija', 'TestIlija', 'default.jpg', 1, '2024-03-12 07:35:49', '2024-03-12 08:27:57');

-- --------------------------------------------------------

--
-- Table structure for table `wish_list`
--

CREATE TABLE `wish_list` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wish_list`
--

INSERT INTO `wish_list` (`id`, `user_id`, `car_id`, `created_at`, `updated_at`) VALUES
(14, 3, 24, '2024-03-12 06:58:52', '2024-03-12 06:58:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bodies`
--
ALTER TABLE `bodies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cars_model_id_foreign` (`model_id`),
  ADD KEY `cars_engine_id_foreign` (`engine_id`),
  ADD KEY `cars_color_id_foreign` (`color_id`),
  ADD KEY `cars_drive_type_id_foreign` (`drive_type_id`),
  ADD KEY `cars_user_id_foreign` (`user_id`);

--
-- Indexes for table `car_equipment`
--
ALTER TABLE `car_equipment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_equipment_car_id_foreign` (`car_id`),
  ADD KEY `car_equipment_equipment_id_foreign` (`equipment_id`);

--
-- Indexes for table `car_models`
--
ALTER TABLE `car_models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_models_model_id_foreign` (`model_id`),
  ADD KEY `car_models_brand_id_foreign` (`brand_id`),
  ADD KEY `car_models_body_id_foreign` (`body_id`),
  ADD KEY `car_models_seat_id_foreign` (`seat_id`),
  ADD KEY `car_models_doors_id_foreign` (`doors_id`);

--
-- Indexes for table `car_safeties`
--
ALTER TABLE `car_safeties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_safeties_car_id_foreign` (`car_id`),
  ADD KEY `car_safeties_safety_id_foreign` (`safety_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doors`
--
ALTER TABLE `doors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drive_types`
--
ALTER TABLE `drive_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `engines`
--
ALTER TABLE `engines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `engines_fuel_id_foreign` (`fuel_id`),
  ADD KEY `engines_transmission_id_foreign` (`transmission_id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuels`
--
ALTER TABLE `fuels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_car_id_foreign` (`car_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `safeties`
--
ALTER TABLE `safeties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transmissions`
--
ALTER TABLE `transmissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `wish_list`
--
ALTER TABLE `wish_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wish_list_user_id_foreign` (`user_id`),
  ADD KEY `wish_list_car_id_foreign` (`car_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bodies`
--
ALTER TABLE `bodies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `car_equipment`
--
ALTER TABLE `car_equipment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;

--
-- AUTO_INCREMENT for table `car_models`
--
ALTER TABLE `car_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `car_safeties`
--
ALTER TABLE `car_safeties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=443;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `doors`
--
ALTER TABLE `doors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `drive_types`
--
ALTER TABLE `drive_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `engines`
--
ALTER TABLE `engines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `fuels`
--
ALTER TABLE `fuels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `safeties`
--
ALTER TABLE `safeties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transmissions`
--
ALTER TABLE `transmissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `cars_drive_type_id_foreign` FOREIGN KEY (`drive_type_id`) REFERENCES `drive_types` (`id`),
  ADD CONSTRAINT `cars_engine_id_foreign` FOREIGN KEY (`engine_id`) REFERENCES `engines` (`id`),
  ADD CONSTRAINT `cars_model_id_foreign` FOREIGN KEY (`model_id`) REFERENCES `car_models` (`id`),
  ADD CONSTRAINT `cars_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `car_equipment`
--
ALTER TABLE `car_equipment`
  ADD CONSTRAINT `car_equipment_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `car_equipment_equipment_id_foreign` FOREIGN KEY (`equipment_id`) REFERENCES `equipment` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `car_models`
--
ALTER TABLE `car_models`
  ADD CONSTRAINT `car_models_body_id_foreign` FOREIGN KEY (`body_id`) REFERENCES `bodies` (`id`),
  ADD CONSTRAINT `car_models_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `car_models_doors_id_foreign` FOREIGN KEY (`doors_id`) REFERENCES `doors` (`id`),
  ADD CONSTRAINT `car_models_model_id_foreign` FOREIGN KEY (`model_id`) REFERENCES `models` (`id`),
  ADD CONSTRAINT `car_models_seat_id_foreign` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`id`);

--
-- Constraints for table `car_safeties`
--
ALTER TABLE `car_safeties`
  ADD CONSTRAINT `car_safeties_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `car_safeties_safety_id_foreign` FOREIGN KEY (`safety_id`) REFERENCES `safeties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `engines`
--
ALTER TABLE `engines`
  ADD CONSTRAINT `engines_fuel_id_foreign` FOREIGN KEY (`fuel_id`) REFERENCES `fuels` (`id`),
  ADD CONSTRAINT `engines_transmission_id_foreign` FOREIGN KEY (`transmission_id`) REFERENCES `transmissions` (`id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `wish_list`
--
ALTER TABLE `wish_list`
  ADD CONSTRAINT `wish_list_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`),
  ADD CONSTRAINT `wish_list_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
