-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 23, 2020 at 08:16 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `bms`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `id` int(11) NOT NULL,
  `title` varchar(256) COLLATE utf8mb4_turkish_ci NOT NULL,
  `url` varchar(512) COLLATE utf8mb4_turkish_ci NOT NULL,
  `note` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `owner` int(11) NOT NULL,
  `category` varchar(256) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `bookmark`
--

INSERT INTO `bookmark` (`id`, `title`, `url`, `note`, `owner`, `category`, `created`) VALUES
(72, 'Free 3D Models', 'https://www.cgtrader.com/free-3d-models', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, nostrum? Molestiae ullam incidunt quos fuga repellendus quo officia hic numquam quis quaerat illum velit nulla, tempora aliquam reprehenderit, dolore maiores.', 74, 'Java', '2020-05-06 15:29:11'),
(73, 'Yamaha Recent Motorbike Prices', 'https://www.yamaha-motor.eu/tr/tr/Deneyim/', 'A reprehenderit officiis mollitia tempora perferendis corrupti non nihil porro ipsa consequuntur error impedit similique pariatur commodi laudantium placeat, saepe quasi voluptas?\r\nDolorum, architecto! Autem laborum numquam voluptatum esse voluptatibus omnis minus reiciendis consequatur exercitationem, adipisci dolorum veritatis voluptates consequuntur sit illo voluptas, ipsa labore atque ratione hic? Ex cumque similique tempora.\r\nAd obcaecati dolor reiciendis delectus dicta ea, dolorem a porro, error', 74, '', '2020-05-06 15:51:53'),
(74, 'PHP Reference Page', 'http://www.php.net', 'This site is the main page for php functions.', 74, 'Web', '2020-05-06 15:52:26'),
(75, 'Learn about Material Design and our Project Team', 'https://materializecss.com/preloader.html', 'Created and designed by Google, Material Design is a design language that combines the classic principles of successful design along with innovation and technology. Google\'s goal is to develop a system of design that allows for a unified user experience across all their products on any platform.', 74, 'Web', '2020-05-06 15:53:23'),
(76, 'The new way to improve your programming skills while having fun and getting noticed', 'https://www.codingame.com/start', 'At CodinGame, our goal is to let programmers keep on improving their coding skills by solving the World\'s most challenging problems, learn new concepts, and get inspired by the best developers.', 74, '', '2020-05-06 15:54:50'),
(77, 'Unity ', 'https://unity.com/', 'Create, operate, and monetize your interactive and immersive experiences with the world’s most widely used real-time development platform.', 74, 'Java', '2020-05-06 15:56:26'),
(78, 'WebGL Fundamentals', 'https://webglfundamentals.org/', 'WebGL (Web Graphics Library) is often thought of as a 3D API. People think \"I\'ll use WebGL and magic I\'ll get cool 3d\". In reality WebGL is just a rasterization engine. It draws points, lines, and triangles based on code you supply. Getting WebGL to do anything else is up to you to provide code to use points, lines, and triangles to accomplish your task.', 74, '', '2020-05-06 15:57:32'),
(79, 'Exploring ES6', 'https://exploringjs.com/es6/', 'Free book for ES6', 74, '', '2020-05-06 15:58:49'),
(80, 'Clara.io for 3D Modelling', 'https://clara.io/learn/user-guide/modeling/modeling_basics', 'Modeling is the process of creating 3D geometric meshes that will eventually be textured, animated, and rendered in your final product.', 74, 'Java', '2020-05-06 15:59:53'),
(81, 'Bilkent', 'www.bilkent.com.tr', 'Bilkent University is one of the nation\'s leading research universities. It enrolls approximately 12500 students in faculties and schools on campus in Ankara.', 74, 'Bilkent', '2020-05-21 16:11:20'),
(82, 'Ankara', 'www.ankarabb.com', 'Ankara historically known as Ancyra and Angora, is the capital of Turkey. With a population of 4,587,558 in the urban centre (2014) and 5,150,072 in its province (2015), it is Turkey\'s second largest city after Istanbul (the former imperial capital), having outranked İzmir in the 20th century. Ankara covers an area of 24,521 km2 (9,468 sq mi).', 74, 'Bilkent', '2020-05-21 16:14:21'),
(83, 'Lorem', 'www.loremispum.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 74, 'Cpp', '2020-05-21 16:15:16'),
(84, 'CTIS', 'www.ctis.com', 'The program’s mission is to prepare the students for a promising career in the dynamic and fast developing field of information systems and to bring them up as individuals, competing in technical respects, having high self-confidence, apting to team work, and being experts in human relations.', 74, '', '2020-05-21 16:15:55'),
(85, 'Google', 'www.google.com', 'Google LLC is an American multinational technology company that specializes in Internet-related services and products, which include online advertising technologies, a search engine, cloud computing, software, and hardware. It is considered one of the Big Four technology companies alongside Amazon, Apple, and Facebook.', 74, 'Web', '2020-05-21 16:17:05'),
(86, 'YouTube', 'www.youtube.com', 'YouTube is an American online video-sharing platform headquartered in San Bruno, California. Three former PayPal employees—Chad Hurley, Steve Chen, and Jawed Karim—created the service in February 2005. Google bought the site in November 2006 for US$1.65 billion; YouTube now operates as one of Google\'s subsidiaries.', 74, '', '2020-05-21 16:17:55'),
(87, 'Canon', 'www.canon.com', 'Canon Inc. is a Japanese multinational corporation specializing in the manufacture of imaging and optical products, including cameras, camcorders, professional displays, TV broadcasting and film equipment, projectors, photocopiers, photolitography equipment (steppers, scanners), computer printers, image scanners, binoculars, microscopes, medical equipment (including Computer Tomography diagnostic systems, MRI and diagnostic ultrasound systems), LCD and OLED panel manufacturing equipment, CCTV solutions, imagining sensors, calculators, high precision positioning and measurement devices (such as rotary encoders), and custom optical components (including lenses) for third party companies. It is headquartered in Ōta, Tokyo, Japan.', 74, 'Others', '2020-05-21 16:20:09'),
(88, 'Vanity Fair', 'www.vanityfair.com', 'Vanity Fair has been the title of at least five magazines, including an 1859–1863 American publication, an 1868–1914 British publication, an unrelated 1902–1904 New York magazine, and a 1913–1936 American publication edited by Condé Nast, which was revived in 1983.', 74, '', '2020-05-21 16:21:39'),
(89, 'IMDB', 'www.imdb.com', 'IMDb is an online database of information related to films, television programs, home videos, video games, and streaming content online – including cast, production crew and personal biographies, plot summaries, trivia, ratings, and fan and critical reviews. An additional fan feature, message boards, was abandoned in February 2017. Originally a fan-operated website, the database is owned and operated by IMDb.com, Inc., a subsidiary of Amazon.', 74, 'Web', '2020-05-21 16:23:28'),
(90, 'Steam', 'www.steam.com', 'Steam is a video game digital distribution service by Valve. It was launched as a standalone software client in September 2003 as a way for Valve to provide automatic updates for their games, and expanded to include games from third-party publishers. Steam has also expanded into an online web-based and mobile digital storefront. Steam offers digital rights management (DRM), matchmaking servers, video streaming, and social networking services. It also provides the user with installation and automatic updating of games, and community features such as friends lists and groups, cloud saving, and in-game voice and chat functionality.', 74, 'Games', '2020-05-21 16:25:46'),
(92, 'Survivor', 'www.acunn.com', 'Survivor Turkey is the Turkish version of the popular reality Survivor. This version of the show has aired on both Kanal D in 2005, and on Show TV in 2006, 2007, and 2010. From the beginning Survivor was a success in Turkey, however, the cost of producing the show proved to be too much for Kanal D and even Show TV couldn\'t afford to produce the show on a yearly basis. Because of production costs the show was put on hiatus in 2007 and was brought back three years later. The prize for the first seasons of the show was 150,000 euros, for the second and third seasons 250,000 euros, and 500,000 dollars for the fourth season.', 74, 'Others', '2020-05-22 01:59:12'),
(93, 'Twitch', 'www.twitch.com', 'Twitch is a video live streaming service operated by Twitch Interactive, a subsidiary of Amazon. Introduced in June 2011 as a spin-off of the general-interest streaming platform, Justin.tv, the site primarily focuses on video game live streaming, including broadcasts of eSports competitions, in addition to music broadcasts, creative content, and more recently, \"in real life\" streams. Content on the site can be viewed either live or via video on demand.', 74, 'Others', '2020-05-22 02:00:07'),
(94, 'Reddit', 'www.reddit.com', 'Reddit is an American social news aggregation, web content rating, and discussion website. Registered members submit content to the site such as links, text posts, and images, which are then voted up or down by other members. Posts are organized by subject into user-created boards called \"subreddits\", which cover a variety of topics like news, science, movies, video games, music, books, fitness, food, and image-sharing. Submissions with more up-votes appear towards the top of their subreddit and, if they receive enough up-votes, ultimately on the site\'s front page. Despite strict rules prohibiting harassment, Reddit\'s administrators spend considerable resources on moderating the site.', 74, 'Others', '2020-05-22 02:01:07'),
(95, 'Dungeons & Dragons', 'www.dndbeyond.com', 'Dungeons & Dragons (commonly abbreviated as D&D or DnD) is a fantasy tabletop role-playing game (RPG) originally designed by Gary Gygax and Dave Arneson. It was first published in 1974 by Tactical Studies Rules, Inc. (TSR). The game has been published by Wizards of the Coast (now a subsidiary of Hasbro) since 1997. It was derived from miniature wargames, with a variation of the 1971 game Chainmail serving as the initial rule system. D&D\'s publication is commonly recognized as the beginning of modern role-playing games and the role-playing game industry.', 74, 'Games', '2020-05-22 02:02:14'),
(96, 'Netflix', 'www.netflix.com', 'Netflix, Inc. is an American media-services provider and production company headquartered in Los Gatos, California, founded in 1997 by Reed Hastings and Marc Randolph in Scotts Valley, California. The company\'s primary business is its subscription-based streaming service which offers online streaming of a library of films and television programs, including those produced in-house. As of April 2020, Netflix had over 182 million paid subscriptions worldwide, including 69 million in the United States. It is available worldwide except in the following: Mainland China (Due to local restrictions), Iran, Syria, North Korea, and Crimea (Due to U.S. sanctions). The company also has offices in Brazil, Netherlands, India, Japan and South Korea. Netflix is a member of the Motion Picture Association (MPA). Today, the company produces and distributes content from countries all over the globe.', 74, 'Others', '2020-05-22 02:03:40'),
(97, 'Microsoft Visual Studio', 'visualstudio.microsoft.com', 'Microsoft Visual Studio is an integrated development environment (IDE) from Microsoft. It is used to develop computer programs, as well as websites, web apps, web services and mobile apps. Visual Studio uses Microsoft software development platforms such as Windows API, Windows Forms, Windows Presentation Foundation, Windows Store and Microsoft Silverlight. It can produce both native code and managed code.', 74, 'Web', '2020-05-22 02:05:45'),
(98, 'Yemek Sepeti', 'www.yemeksepeti.com', 'Yemeksepeti (literally, \'food basket\') is an online food delivery company providing the facility to place food orders online from an affiliated network of restaurants without charging the user any extra fees. Yemeksepeti currently operates in 69 cities in Turkey and in Cyprus, with more than 25,000 member restaurants, 14 million users, and 480,000 daily orders.', 74, 'Others', '2020-05-22 02:06:32'),
(99, 'BanaBi', 'www.yemeksepeti.com/banabi', 'In April 2019, Yemeksepeti launched the online market shopping service with the Banabi sub-brand. Banabi delivers over 2,400 products to users in about 15 minutes. Currently, it started to work in 9 different countries with the same business model.', 74, 'Others', '2020-05-22 02:08:06'),
(100, 'Fate', 'www.evilhat.com', 'Fate is a generic role-playing game system based on the Fudge gaming system. It has no fixed setting, traits, or genre and is customizable. It is designed to offer minimal obstruction to role-playing by assuming players want to make fewer dice rolls.', 74, 'Games', '2020-05-22 02:09:51'),
(101, 'Filth Frank', 'www.youtube.com/filthfranktv', 'George Kusunoki Miller (born 18 September 1992), better known by his stage name Joji and formerly by his online aliases Filthy Frank and Pink Guy, is a Japanese singer-songwriter, record producer, author, and former Internet personality and comedian.', 75, '', '2020-05-23 17:59:48'),
(102, 'Shrek', 'www.dreamworks.com/shrek', 'Shrek is a 2001 American computer-animated comedy film loosely based on the 1990 fairy tale picture book of the same name by William Steig. Directed by Andrew Adamson and Vicky Jenson in their directorial debuts, it stars Mike Myers, Eddie Murphy, Cameron Diaz and John Lithgow as the voices of the lead characters. In the story, an ogre called Shrek (Myers) finds his swamp overrun by fairy tale creatures who have been banished by the corrupt Lord Farquaad (Lithgow) aspiring to be king. Shrek makes a deal with Farquaad to regain control of his swamp in return for rescuing Princess Fiona (Diaz), whom Farquaad intends to marry. With the help of Donkey (Murphy), Shrek embarks on his quest but soon falls in love with the princess, who is hiding a secret that will change his life forever.', 75, '', '2020-05-23 18:00:37'),
(103, 'Apple', 'www.apple.com', 'Apple Inc. is an American multinational technology company headquartered in Cupertino, California, that designs, develops, and sells consumer electronics, computer software, and online services. It is considered one of the Big Five technology companies, alongside Microsoft, Amazon, Google, and Facebook.', 75, '', '2020-05-23 18:01:33'),
(104, 'Tchibo', 'www.tchibo.com', 'Tchibo is a German chain of coffee retailers and cafés known for its range of non-coffee products that change weekly. The latter includes: clothing, furniture, household items, electronics and electrical appliances. In Germany, Tchibo\'s slogan is \"Every week a new world\" (German: Jede Woche eine neue Welt). Tchibo has further expanded its product range to sell services such as travel, insurance, and mobile-phone contracts.', 75, '', '2020-05-23 18:02:40'),
(105, 'HTML5', 'whatwg.org', 'Hypertext Markup Language (HTML) is the standard markup language for documents designed to be displayed in a web browser. It can be assisted by technologies such as Cascading Style Sheets (CSS) and scripting languages such as JavaScript.', 75, '', '2020-05-23 18:03:18'),
(106, 'c#', 'csharp.net', 'C# (pronounced see sharp, like the musical note C♯, but written with the number sign) is a general-purpose, multi-paradigm programming language encompassing strong typing, lexically scoped, imperative, declarative, functional, generic, object-oriented (class-based), and component-oriented programming disciplines. It was developed around 2000 by Microsoft as part of its .NET initiative and later approved as an international standard by Ecma (ECMA-334) in 2002 and ISO (ISO/IEC 23270) in 2003. Mono is the name of the free and open-source project to develop a compiler and runtime for the language. C# is one of the programming languages designed for the Common Language Infrastructure (CLI).', 76, '', '2020-05-23 18:22:17'),
(107, 'UFC', 'www.ufc.com', 'UFC 249: Ferguson vs. Gaethje was a mixed martial arts event produced by the Ultimate Fighting Championship that took place on May 9, 2020 at VyStar Veterans Memorial Arena in Jacksonville, Florida, United States. It was originally planned to take place on April 18 at Barclays Center in Brooklyn, New York, United States. Due to the COVID-19 pandemic, the event was eventually postponed (see section below). On April 21, the UFC confirmed that UFC 249 would be moved to May 9 and take place in Florida.', 76, '', '2020-05-23 18:23:12'),
(108, 'Piano Lessons', 'www.pianolessons.com', 'The piano is an acoustic, stringed musical instrument invented in Italy by Bartolomeo Cristofori around the year 1700 (the exact year is uncertain), in which the strings are struck by wooden hammers that are coated with a softer material. (Modern hammers are covered with dense wool felt; some early pianos used leather.) It is played using a keyboard, which is a row of keys (small levers) that the performer presses down or strikes with the fingers and thumbs of both hands to cause the hammers to strike the strings.', 76, '', '2020-05-23 18:25:02'),
(109, 'Udemy', 'www.udemy.com', 'Udemy, founded in May 2010, is an American online learning platform aimed at professional adults and students. As of Jan 2020, the platform has more than 50 million students and 57,000 instructors teaching courses in over 65 languages. There have been over 295 million course enrolments. Students and instructors come from 190+ countries and 2/3 of students are located outside of the U.S.', 76, '', '2020-05-23 18:25:53'),
(110, 'LinkedIn', 'www.linkedin.com', 'LinkedIn is an American business and employment-oriented online service that operates via websites and mobile apps. Launched on May 5, 2003, it is mainly used for professional networking, including employers posting jobs and job seekers posting their CVs. As of 2015, most of the company\'s revenue came from selling access to information about its members to recruiters and sales professionals. Since December 2016 it has been a wholly owned subsidiary of Microsoft. As of May 2020, LinkedIn had 690+ million registered members in 150 countries.', 76, '', '2020-05-23 18:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cID` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cID`, `name`) VALUES
(1, 'Cpp'),
(2, 'Web'),
(3, 'Java'),
(4, 'Bilkent'),
(5, 'Games'),
(6, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `sharedBookmark`
--

CREATE TABLE `sharedBookmark` (
  `id` int(11) NOT NULL,
  `sharedbmId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_turkish_ci NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_turkish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `bday` date DEFAULT NULL,
  `profile` varchar(100) COLLATE utf8mb4_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `bday`, `profile`) VALUES
(74, 'Gordon Freeman', 'gordon@mesa.com', '$2y$10$4ZhtSY9NatzHUDmZAm9GzewVubqQg3IDCMnV95hB7uS605hMtVcZK', '2020-05-20', '3325a2fba1a2ffb77d9bb2130d87804ece3ec030'),
(75, 'Niyazi Berkay Çokuysal', 'niyazi@gmail.com', '$2y$10$rul3MhBFgyaBxx/MmCx3neF4le6O8T9ydEQDHzo0y5fulejhtM4qa', NULL, '07eb529182a1d90519ea33ce64c63d8c9393acda'),
(76, 'Hüseyin Barış Ertaş', 'barış@gmail.com', '$2y$10$3jbZnTyEuXEtMVbBA.CQoedL2Xt0DsMACIy4YLJZYW0lLIaGH06sq', NULL, 'bbd40a234b9accbbcf518274fac77b1e76442cb4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner` (`owner`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cID`);

--
-- Indexes for table `sharedBookmark`
--
ALTER TABLE `sharedBookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sharedBookmark`
--
ALTER TABLE `sharedBookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD CONSTRAINT `bookmark_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `user` (`id`);
