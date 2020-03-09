-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09 مارس 2020 الساعة 19:57
-- إصدار الخادم: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharma`
--

-- --------------------------------------------------------

--
-- بنية الجدول `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `cart_quantity` int(11) NOT NULL,
  `cart_single_price` int(11) NOT NULL,
  `cart_total_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_street` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `customers`
--

INSERT INTO `customers` (`id`, `customer_firstname`, `customer_lastname`, `customer_city`, `customer_street`, `customer_phone`, `created_at`, `updated_at`) VALUES
(63, 'Menna', 'Emad', 'Minya', 'Adnan', '01157236299', '2020-02-29 14:46:17', '2020-02-29 14:46:17'),
(64, 'Azza', 'Eliwa', 'Aswan', 'Matar', '01234567890', '2020-02-29 14:47:05', '2020-02-29 14:47:05'),
(65, 'Yasmin', 'Kamal', 'Aswan', 'Atlas', '01234567899', '2020-02-29 14:48:12', '2020-02-29 14:48:12'),
(66, 'Nada', 'Emad', 'Aswan', 'matar', '01157236299', '2020-03-07 09:50:03', '2020-03-07 09:50:03'),
(67, 'Nada', 'Emad', 'Minya', 'Adnan', '01157236299', '2020-03-07 11:19:41', '2020-03-07 11:19:41'),
(68, 'Menna', 'mamdouh', 'Minya', 'Adnan', '01157236299', '2020-03-07 11:45:18', '2020-03-07 11:45:18'),
(69, 'Menna', 'Emad', 'KSA', 'Adnan', '01157236299', '2020-03-07 19:02:42', '2020-03-07 19:02:42'),
(70, 'Menna', 'Emad', 'egypt', 'Adnan', '01157236299', '2020-03-07 19:03:33', '2020-03-07 19:03:33'),
(71, 'Menna', 'Emad', 'Minya', 'Adnan', '01157236299', '2020-03-08 07:48:45', '2020-03-08 07:48:45'),
(72, 'Menna', 'Emad', 'Minya', 'adnan', '01157236299', '2020-03-09 16:33:35', '2020-03-09 16:33:35'),
(73, 'Menna', 'Emad', 'Minya', 'adnan', '01157236299', '2020-03-09 16:34:47', '2020-03-09 16:34:47'),
(74, 'Menna', 'mamdouh', 'Minya', 'Adnan', '01157236299', '2020-03-09 16:36:06', '2020-03-09 16:36:06'),
(75, 'Menna', 'mamdouh', 'Minya', 'Adnan', '01157236299', '2020-03-09 16:37:46', '2020-03-09 16:37:46'),
(76, 'Menna', 'mamdouh', 'Minya', 'Adnan', '01157236299', '2020-03-09 16:39:13', '2020-03-09 16:39:13'),
(77, 'Menna', 'mamdouh', 'Minya', 'Adnan', '01157236299', '2020-03-09 16:40:00', '2020-03-09 16:40:00'),
(78, 'Menna', 'mamdouh', 'Minya', 'Adnan', '01157236299', '2020-03-09 16:40:34', '2020-03-09 16:40:34'),
(79, 'Menna', 'mamdouh', 'Minya', 'Adnan', '01157236299', '2020-03-09 16:44:11', '2020-03-09 16:44:11'),
(80, 'Menna', 'mamdouh', 'Minya', 'Adnan', '01157236299', '2020-03-09 16:45:25', '2020-03-09 16:45:25'),
(81, 'Nada', 'Emad', 'Aswan', 'matar', '01157236299', '2020-03-09 16:51:07', '2020-03-09 16:51:07');

-- --------------------------------------------------------

--
-- بنية الجدول `deliveries`
--

CREATE TABLE `deliveries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `delivery_date` date NOT NULL,
  `delivery_time` time NOT NULL,
  `delivery_totalprice` int(11) DEFAULT NULL,
  `pharmacist_id` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `deliveryguy_id` int(11) DEFAULT NULL,
  `delivery_list` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `deliveries`
--

INSERT INTO `deliveries` (`id`, `delivery_date`, `delivery_time`, `delivery_totalprice`, `pharmacist_id`, `customer_id`, `deliveryguy_id`, `delivery_list`, `created_at`, `updated_at`) VALUES
(10, '2020-02-29', '19:16:00', 330, 13, 63, 1, 'Nan 2 400->1,onbrez 150mcgm->1', '2020-02-29 15:17:04', '2020-02-29 15:17:04'),
(11, '2020-02-29', '19:17:00', 5202, 13, 63, 1, 'Pystinon 60mg->1,Eprex 10000i->1,Eprex 4000i->1', '2020-02-29 15:18:04', '2020-02-29 15:18:04'),
(12, '2020-03-07', '11:50:03', 571, 14, 66, NULL, 'Tambocor 100mg->1', '2020-03-07 09:50:03', '2020-03-07 09:50:03'),
(13, '2020-03-07', '21:03:33', 86, 14, 70, NULL, 'Bronchicum->2,Rapido 180mg->1,Baby relief 12.5mg->2', '2020-03-07 19:03:33', '2020-03-07 19:03:33'),
(14, '2020-03-08', '09:48:45', 792, 14, 71, NULL, 'Nan 2 400->8', '2020-03-08 07:48:45', '2020-03-08 07:48:45'),
(15, '2020-03-09', '18:33:36', 582, 14, 72, NULL, 'Tambocor 100mg->1,Cerelac rice 125 gm->1', '2020-03-09 16:33:36', '2020-03-09 16:33:36'),
(16, '2020-03-09', '18:45:25', 297, 1, 80, NULL, 'Nan 2 400->3', '2020-03-09 16:45:25', '2020-03-09 16:45:25'),
(17, '2020-03-09', '18:51:07', 297, 1, 81, NULL, 'Nan 2 400->3', '2020-03-09 16:51:07', '2020-03-09 16:51:07');

-- --------------------------------------------------------

--
-- بنية الجدول `deliveryguys`
--

CREATE TABLE `deliveryguys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deliveryguy_firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deliveryguy_lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deliveryguy_salary` int(11) NOT NULL,
  `deliveryguy_startjob` date NOT NULL,
  `deliveryguy_city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deliveryguy_street` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deliveryguy_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `deliveryguys`
--

INSERT INTO `deliveryguys` (`id`, `deliveryguy_firstname`, `deliveryguy_lastname`, `deliveryguy_salary`, `deliveryguy_startjob`, `deliveryguy_city`, `deliveryguy_street`, `created_at`, `updated_at`, `deliveryguy_phone`) VALUES
(1, 'Morad', 'Adnan', 1000, '2020-02-04', 'Aswan', 'Mahmodia', NULL, '2020-02-29 15:21:11', '01789789789'),
(2, 'Kariem', 'Ashraf', 3000, '2017-03-01', 'Aswan', 'Madares', '2020-02-29 15:20:33', '2020-02-29 15:20:33', '01555566666');

-- --------------------------------------------------------

--
-- بنية الجدول `deliverylists`
--

CREATE TABLE `deliverylists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `medicine_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `deliverylists`
--

INSERT INTO `deliverylists` (`id`, `store_id`, `delivery_id`, `created_at`, `updated_at`, `medicine_id`) VALUES
(42, 30, 9, '2020-02-29 15:13:34', '2020-02-29 15:13:34', 10),
(43, 30, 10, '2020-02-29 15:17:04', '2020-02-29 15:17:04', 10),
(44, 221, 10, '2020-02-29 15:17:04', '2020-02-29 15:17:04', 29),
(45, 241, 11, '2020-02-29 15:18:04', '2020-02-29 15:18:04', 31),
(46, 210, 11, '2020-02-29 15:18:04', '2020-02-29 15:18:04', 28),
(47, 200, 11, '2020-02-29 15:18:04', '2020-02-29 15:18:04', 27),
(48, 39, 12, '2020-03-07 09:50:03', '2020-03-07 09:50:03', 11),
(49, 69, 13, '2020-03-07 19:03:33', '2020-03-07 19:03:33', 14),
(50, 69, 13, '2020-03-07 19:03:34', '2020-03-07 19:03:34', 14),
(51, 109, 13, '2020-03-07 19:03:34', '2020-03-07 19:03:34', 18),
(52, 99, 13, '2020-03-07 19:03:34', '2020-03-07 19:03:34', 17),
(53, 99, 13, '2020-03-07 19:03:34', '2020-03-07 19:03:34', 17),
(54, 31, 14, '2020-03-08 07:48:45', '2020-03-08 07:48:45', 10),
(55, 31, 14, '2020-03-08 07:48:45', '2020-03-08 07:48:45', 10),
(56, 31, 14, '2020-03-08 07:48:45', '2020-03-08 07:48:45', 10),
(57, 31, 14, '2020-03-08 07:48:45', '2020-03-08 07:48:45', 10),
(58, 31, 14, '2020-03-08 07:48:45', '2020-03-08 07:48:45', 10),
(59, 31, 14, '2020-03-08 07:48:45', '2020-03-08 07:48:45', 10),
(60, 31, 14, '2020-03-08 07:48:45', '2020-03-08 07:48:45', 10),
(61, 31, 14, '2020-03-08 07:48:45', '2020-03-08 07:48:45', 10),
(62, 39, 15, '2020-03-09 16:33:36', '2020-03-09 16:33:36', 11),
(63, 49, 15, '2020-03-09 16:33:36', '2020-03-09 16:33:36', 12),
(64, 31, 16, '2020-03-09 16:45:25', '2020-03-09 16:45:25', 10),
(65, 31, 16, '2020-03-09 16:45:26', '2020-03-09 16:45:26', 10),
(66, 31, 16, '2020-03-09 16:45:26', '2020-03-09 16:45:26', 10),
(67, 31, 17, '2020-03-09 16:51:07', '2020-03-09 16:51:07', 10),
(68, 32, 17, '2020-03-09 16:51:07', '2020-03-09 16:51:07', 10),
(69, 33, 17, '2020-03-09 16:51:07', '2020-03-09 16:51:07', 10);

-- --------------------------------------------------------

--
-- بنية الجدول `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `medicines`
--

CREATE TABLE `medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medicine_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_price` int(11) NOT NULL,
  `medicine_companyname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_description` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `medicine_totalamount` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `medicine_ac` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `medicines`
--

INSERT INTO `medicines` (`id`, `medicine_name`, `medicine_price`, `medicine_companyname`, `medicine_description`, `medicine_image`, `type_id`, `medicine_totalamount`, `created_at`, `updated_at`, `medicine_ac`) VALUES
(10, 'Nan 2 400', 99, 'Nestle', 'Not to replace mother\'s milk. For Infants from birth to 6 months age. To be used within 3 weeks from opening.', '03082020005933nan_2_400_gm.jpeg', 5, 7, '2020-02-28 18:43:13', '2020-03-09 16:51:37', '--'),
(11, 'Tambocor 100mg', 571, '3M HealthCare limited', '--', '03082020005951Tambocor_100mg.jpg', 6, 10, '2020-02-28 18:47:44', '2020-03-07 22:59:51', '--'),
(12, 'Cerelac rice 125 gm', 11, 'Nestle', '--', '03082020010003Cerelac_rice_125_gm.jpg', 5, 10, '2020-02-28 18:58:59', '2020-03-07 23:00:03', '--'),
(13, 'Laxolac 3.35GM/5ML', 12, 'MUP (Medical Union Pharmaceuticals)', 'LAXOLAC (lactulose) for oral solution is indicated for the treatment of constipation. In patients with a history of chronic constipation, lactulose therapy increases the number of bowel movements per day and the number of days on which bowel movements occur.', '03082020010038Laxolac_3.35GM-5ML.jpg', 7, 10, '2020-02-28 19:05:03', '2020-03-07 23:00:38', 'Lactulose'),
(14, 'Bronchicum', 30, 'Sanofi-Aventis', 'To improve function of bronchi.', '03082020010051Bronchicum_100mg.jpg', 7, 10, '2020-02-28 19:48:18', '2020-03-07 23:00:51', '--'),
(15, 'Urivin', 11, 'Amoun', '--', '03082020010104Urivin.jpeg', 8, 10, '2020-02-28 19:53:39', '2020-03-07 23:01:04', '--'),
(17, 'Baby relief 12.5mg', 7, 'Pharaonia', 'Description A non-steroidal anti-inflammatory agent (NSAID) with antipyretic and analgesic actions. It is primarily available as the sodium salt. Indication : For the acute and chronic treatment of signs and symptoms of osteoarthritis and rheumatoid arthritis. Mechanism of action The antiinflammatory effects of diclofenac are believed to be due to inhibition of both leukocyte migration and the enzyme cylooxygenase (COX-1 and COX-2), leading to the peripheral inhibition of prostaglandin synthesis. As prostaglandins sensitize pain receptors, inhibition of their synthesis is responsible for the analgesic effects of diclofenac. Antipyretic effects may be due to action on the hypothalamus, resulting in peripheral dilation, increased cutaneous blood flow, and subsequent heat dissipation.', '03082020010128Baby_relief_12.5mg.jpeg', 10, 10, '2020-02-28 20:07:47', '2020-03-07 23:01:28', 'Diclofenac Sodium'),
(18, 'Rapido 180mg', 12, 'Sedico', 'About Fexofenadine Second Generation H1 Antagonist, Antihistamine. Mechanism of Action of Fexofenadine Fexofenadine blocks one type of peripheral receptor for histamine (the H1 receptor) and thus prevents activation of H1 receptor-containing cells by histamine (Histamine is released from histamine-storing cells (mast cells) and then attaches to other cells that have receptors for histamine. The attachment of the histamine to the receptors causes the cell to be \"activated,\" releasing other chemicals that produce the effects that we associate with allergy, e.g., sneezing.) and the allergic symptoms produced by it.', '02292020134655Rapido 180mg.jpeg', 9, 11, '2020-02-28 20:10:20', '2020-03-07 18:38:13', 'Fexofenadine'),
(19, 'Otrivin Baby 0.74%', 7, 'Novartis', 'About Sodium Chloride Topical Agent,Nasal Preparation, Nasal decongestant. Mechanism of Action of Sodium Chloride Sodium chloride is used as nasal drops or nasal spray to remove nasal congestion and moisten dry nasal passages. Indications for Sodium Chloride 1.Dry nasal passage 2.Nasal congestio', '03082020081451Otrivin_Baby_0.74%.jpg', 11, 11, '2020-02-28 20:13:56', '2020-03-08 06:14:51', '--'),
(20, 'Sediproct', 7, 'MUP (Medical Union Pharmaceuticals)', 'About Cinchocaine An amide derivative, most potent and toxic long-acting local anesthetics, A local anaesthetic Mechanism of Action of Cinchocaine Cinchocaine is a local anesthetic. It works by blocking the pathway of pain signals along nerves. It inhibits conduction of nerve impulses and decreases cell membrane permeability to ions at the site of the pain. This prevents an electrical signal building up and passing along the nerve fibres to the brain. In this way Cinchocaine causes About Hydrocortisone Topical Topical synthetic glucocorticoid, anti-inflammatory and anti-pruritic. Mechanism of Action of Hydrocortisone Topical The drug exerts it`s pharmacological action by penetrating and binding to cytoplasmic receptor protein and causes a structural change in steroid receptor complex. This structural change allows it`s migration in to the nucleus and then binding to specific sites on the DNA which leads to transcription of specific m-RNA and which ultimately regulates protein', '03082020081527Sediproct.jpg', 10, 10, '2020-02-28 20:18:23', '2020-03-08 06:15:27', '--'),
(21, 'H - formula 3%', 7, 'Pharaonia', 'Uses : in internal and external haemorrhoids, prophylaxis between attacks to prvent recurrence,anal pruritis , perianal eczema and pre and post-operatively. Lignocaine ,Cinchocaine and lidocaine : are local anesthetics, they relief pain accompanied with', '03082020081545H_formula_3%.jpg', 12, 10, '2020-02-28 20:24:28', '2020-03-08 06:15:45', '--'),
(22, 'Curazole 2%', 7, 'EVA Pharm', 'About Ketoconazole Imidazole derivative, A broad spectrum Antifungal. Mechanism of Action of Ketoconazole Ketoconazole is fungicidal or fungistatic depending on concentrations. I t inhibits the conversion of Lanosterol to 14 demethyl Lanosterol by inhibiting the cytochromeP450 enzyme 14 alpha demethylase and impair ergosterol synthesis. This will alter cell membrane and its permeability. This will results in loss of intracellular components. It also inhibits biosynthesis of triglycerides and phospholipids by fungi. It also inhibits several enzymes (e.g. Oxidative and peroxidative enzymes) which are involved in detoxification process. This will leads to cellular necrosis. Interactions for Ketoconazole Antacids & Histamine H2 antagonists: Increased gastric pH may inhibit ketoconazole absorption. Isoniazid: The bioavailability of Ketoconazole may be decreased. Rifampicin: Decreased serum levels of either drug may occur.', '03082020081603Curazole_2%.jpg', 12, 10, '2020-02-28 20:28:35', '2020-03-08 06:16:03', '--'),
(23, 'Growth Formula', 68, 'Biopharma', 'Indications: -malnourished patients -underweight people -Persons with increased nutritional needs (pregnant and lactating women) -hospitalized patients Dosage: 2 tablespoonful to a cup of milk or water 3 times daily . Boil milk or water before use.', '03082020081649Growth_Formula.jpg', 13, 10, '2020-02-28 20:32:21', '2020-03-08 06:16:49', '--'),
(24, 'Whey protien', 760, 'Rolab', '--', '03082020081702Whey_protien.jpeg', 13, 10, '2020-02-28 20:35:35', '2020-03-08 06:17:02', '--'),
(25, 'Silymarin Plus 140mg', 29, 'Sedico', 'About Silymarin A polyphenolic flavonoid, Hepatoprotective(antihepatotoxic),antioxidant. Mechanism of Action of Silymarin Silymarin stimulates RNA polymerase A and results in an increase in ribosomal protein synthesis and leads to the synthesis of new hepatocytes and also increase the regenerative ability of the liver. It stabilizes the hepatic cell membrane and prevents the penetration of toxin in to the cell and also slows the absorption of harmful substances in to the liver. Silymarin contains antioxidant flavanoid. It combines with free radicals formed from metabolic process and also from breakdown of toxic substances and neutralizes them. Because of its antioxidant action it has anti-inflammatory property and it is used in ulcerative colitis and in ulcers. It increases the glutathione content in the liver and intestine and also increases the activity of super oxide dismutase enzymes and is helpful in detoxifying actions of liver.', '03082020081720Silymarin_Plus_140mg.png', 8, 10, '2020-02-28 20:44:46', '2020-03-08 06:17:20', '--'),
(26, 'Protien Gainer', 29, 'El Obour', 'Scientific Name: Anabolic muscle &amp; power gain formulas with vitamins &amp; minerals.', '03082020081735Protien_Gainer.jpg', 6, 10, '2020-02-28 20:47:18', '2020-03-08 06:17:35', '--'),
(27, 'Eprex 4000i', 266, 'Janssen Cilag', 'Description Human erythropoietin with 2 aa substitutions to enhance glycosylation (5 N-linked chains), 165 residues (MW=37 kD). Produced in Chinese hamster ovary (CHO) cells by recombinant DNA technology. Indication For the treatment of anemia (from renal transplants or certain HIV treatment) Mechanism of action Darbepoetin alfa stimulates erythropoiesis by the same mechanism as endogenous erythropoietin. Erythropoietin interacts with progenitor stem cells to increase red cell production. Binding of erythropoietin to the erythropoietin receptor leads to receptor dimerization, which facilitates activation of JAK-STAT signaling pathways within the cytosol. Activated STAT (signal transducers and activators of transcription) proteins are then translocated to the nucleus where they serve as transcription factors which regulate the activation of specific genes involved in cell division or differentiation.', '03082020081745Eprex_4000i.jpg', 14, 10, '2020-02-28 20:54:09', '2020-03-08 06:17:45', '--'),
(28, 'Eprex 10000i', 4896, 'Janssen Cilag', 'Description Human erythropoietin with 2 aa substitutions to enhance glycosylation (5 N-linked chains), 165 residues (MW=37 kD). Produced in Chinese hamster ovary (CHO) cells by recombinant DNA technology. Indication For the treatment of anemia (from renal transplants or certain HIV treatment) Mechanism of action Darbepoetin alfa stimulates erythropoiesis by the same mechanism as endogenous erythropoietin. Erythropoietin interacts with progenitor stem cells to increase red cell production. Binding of erythropoietin to the erythropoietin receptor leads to receptor dimerization, which facilitates activation of JAK-STAT signaling pathways within the cytosol. Activated STAT (signal transducers and activators of transcription) proteins are then translocated to the nucleus where they serve as transcription factors which regulate the activation of specific genes involved in cell division or differentiation.', '03082020081758Eprex_10000i.jpg', 14, 11, '2020-02-28 21:04:13', '2020-03-08 06:17:58', '--'),
(29, 'onbrez 150mcgm', 231, 'Novartis', 'Bronchial asthma occurs due to the bronchial constriction made by the histamin & other mediators that result from the allergic reaction . -Anti-Asthma preperations include :- * Adrenergic including selective beta-2 adrenoceptor stimulants ( e.g.terbuta', '03082020081836onbrez_150mcgm.jpeg', 9, 10, '2020-02-28 21:08:52', '2020-03-08 06:18:36', '--'),
(30, 'PowerCaps 45mg', 20, 'ChemiPharm', 'About Ibuprofen NSAID, a propionic acid derivative, Analgesic and anti-inflammatory. Mechanism of Action of Ibuprofen Ibuprofen has analgesic, anti-inflammatory and antipyretic action. It acts by inhibiting Prostaglandin (PGs) synthesis and their release at the site of injury. Prostaglandins cause tenderness and amplify the action of other algesics. Ibuprofen inhibits cyclo-oxygenase enzyme and antagonizes prostaglandin actions. It also inhibits platelet aggregation and prolongs bleeding time. About Pseudoephedrine Alpha/Beta Adrenergic Agonist, a phenethylamine derivative, A nasal decongestant. Mechanism of Action of Pseudoephedrine It is a nasal decongestant with alpha-2 agonistic action. It produces local vasoconstriction, reduces blood flow, and causes shrinkage of mucosa which provides relief of nasal congestion. It reduces oedema of the nasal mucosa, thus improving ventilation, drainage and nasal stuffiness.', '03082020081852PowerCaps_45mg.jpg', 9, 9, '2020-02-28 21:11:37', '2020-03-08 06:18:52', '--'),
(31, 'Pystinon 60mg', 40, 'Alexandria', 'Indication For the treatment of myasthenia gravis. Pharmacodynamics Pyridostigmine is a parasympathomimetic and a reversible cholinesterase inhibitor. Since it is a quaternary amine, it is poorly absorbed in the gut and doesn\'t cross the blood-brain barrier. Pyridostigmine has a slightly longer duration of action than NEOSTIGMINE. It is used in the treatment of myasthenia gravis and to reverse the actions of muscle relaxants. Mechanism of action Pyridostigmine inhibits acetylcholinesterase in the synaptic cleft by competing with acetylcholine for attachment to acetylcholinesterase, thus slowing down the hydrolysis of acetylcholine, and thereby increases efficiency of cholinergic transmission in the neuromuscular junction and prolonges the effects of acetylcholine.', '03082020081908Pystinon_60mg.jpg', 6, 10, '2020-02-28 21:16:20', '2020-03-08 06:19:08', '--'),
(32, 'Vermizole 200mg', 10, 'Amoun', 'Indication: This medication is an anthelmintic, prescribed for tapeworm infections, hydatid cyst disease, cysticercosis or neurocysticercosis, capillariasis, cutaneous larva migrans, giardiasis, microsporidiosis including Septata intestinalis infection, intestinal parasites in immigrants, strongyloidiasis, trichinosis, trichostrongyliasis. It works by killing sensitive parasites. Dose: Hydatid cyst disease: PO- Adults >= 60 kg: 400 mg twice daily with meals for 28 days followed by a 14-day drug-free period. Repeat for 2 more cycles. Capillariasis: PO- Adults and Children >= 2 years: 200 mg twice daily for 10 days. Cutaneous larva migrans: PO- Adults: 400mg once daily for 3 days. Children: 5 mg/kg/day for 3 days. Giardiasis: PO- Adults: 400 mg once daily for 3 days. Trichinosis: PO- Adults: 400 mg twice daily for 15 days. Trichostrongyliasis: PO- Adults: 400 mg as a single dose.', '03082020081925Vermizole_200mg.jpg', 7, 11, '2020-02-28 21:18:53', '2020-03-08 06:19:25', '--'),
(33, 'Fluvermal 20MG/ML', 11, 'Janssen/MinaPharm', 'Indication: Flubendazol is used in the treatment of single or mixed infections caused by: Enterobiasis, ascariasis, hookworm, and trichuriasis Contraindications: Hypersensitivity to the drug Pregnancy and Lactation Side effects: Flubendazol is well tolerated but may cause: transient abdominal pain, diarrhea, headache, allergic reactions and raised liver enzyme values with the high doses. Dosage and administration: For the treatment of enterobiasis: Adults and children: l00mgas a single dose repeated if necessary after 2-3 weeks. For ascariasis, hook worm, and Trichuriasis: l00mg twice daily for 3 days', '03082020081941Fluvermal_20MG-ML.jpg', 7, 10, '2020-02-28 21:20:41', '2020-03-08 06:19:41', '--'),
(34, 'Aspocid 75mg', 8, 'CID', 'ACETYLSALICYLIC ACID Indication For use in the temporary relief of various forms of pain, inflammation associated with various conditions (including rheumatoid arthritis, juvenile rheumatoid arthritis, systemic lupus erythematosus, osteoarthritis, and ankylosing spondylitis), and is also used to reduce the risk of death and/or nonfatal myocardial infarction in patients with a previous infarction or unstable angina pectoris.', '03082020081952Aspocid_75mg.jpg', 6, 10, '2020-02-28 21:24:45', '2020-03-08 06:19:52', '--'),
(35, 'Antinal 200mg', 21, 'Amoun', 'Indications Infectious diarrhea in children and adults, chronic colitis, enterocolitis, as an adjunctive treatment in combined therapy of intestinal dysbiosis. Contraindication Hypersensitivity to 5-nitrofurane derivatives and/or other components of the drug. Dosage and administration Nifuroxazide should be taken orally, with or without meals. Adults and children over 6 years of age - 1 tablet 4 times daily (a daily dose - 800 mg). The treatment course is 5 - 7 days. Side effects Nifuroxazide is well tolerated- however, the following effects may be occasionally observed: gastrointestinal disorders: short-term abdominal pain, nausea, aggravation of diarrhea. Hypersensitivity reactions (require discontinuation of the drug): respiratory disorders: asthma- skin disorders: rash, pruritus.', '03082020082025Antinal_200mg.jpg', 9, 11, '2020-02-28 21:31:19', '2020-03-08 06:20:25', '--'),
(36, 'Diasmect 3 gm', 9, 'Pharaonia', 'DIOCTAHEDRAL SMECTITE Mode Of Action Dioctahedral has adsorbent properties and is used in the management of diarrhoea. Dioctahedral has unique properties that allow for the adsorption of different toxins (such as Rotavirus, E. Coli and Staphylococcus). Dioctahedral interacts with the mucosa increasing its quantity, quality and life span, accelerating the recovery of the infected mucosa. Indications Dioctahedral Semctite is primarily indicated in conditions like Diarrhoea, GI diseases, Oesophageal motility disorders. Drug Interactions May interfere with absorption of other substances when administered simultaneously.', '03082020082038Diasmect_3_gm.jpg', 8, 12, '2020-02-28 21:33:29', '2020-03-08 06:20:38', '--'),
(37, 'Arythrex 200mg', 72, 'Amoun', 'About Celecoxib Non-steroidal anti inflammatory drug (NSAID) ,COX-2 Selective inhibitor, Anti-inflammatory Agent. Mechanism of Action of Celecoxib This inhibits prostaglandin synthesis peripherally by selective noncompetitive inhibition of cyclooxygenase-2 (COX-2) enzyme. It binds with its polar sulfonamide side chain to a hydrophilic side pocket region close to the active COX-2 binding site (Both COX-1 and COX-2 catalyze the conversion of arachidonic acid to prostaglandin (PG) H2, the precursor of PGs and thromboxane). This results its anti-inflammatory action Indications for Celecoxib 1. Osteoarthritis 2. Rheumatoid arthritis 3. Acute gout Contra-indications of Celecoxib 1. Hypersensitivity to celecoxib 2. Allergic type reactions to sulphonamides /aspirin or other NSAIDs.', '03082020082049Arythrex_200mg.jpg', 9, 10, '2020-02-28 21:35:36', '2020-03-08 06:20:49', 'Celecoxib'),
(38, 'Fungican 150mg', 54, 'Amoun', 'About Fluconazole A triazole derivative, A board range Antifungal. Mechanism of Action of Fluconazole Fluconazole is fungicidal or fungistatic depending on the drug concentrations. I t inhibits the conversion of Lanosterol to 14 demethyl Lanosterol by inhibiting the cytochromeP450 enzyme 14 alpha demethylase and impair ergosterol synthesis Interactions for Fluconazole Cimetidine: Decreased efficacy of fluconazole. Cyclosporine: Increase in serum cyclosporine plasma concentration. Hydrochlorothiazide: Reduction in renal clearance of fluconazole. Phenytoin: Efficacy of phenytoin enhanced. Rifampicin: Efficacy of fluconazole decreased, higher dosage required. Sulfonylureas: Efficacy of tolbutamide, glyburide and glipizide increased. Warfarin: Potentiates the anticoagulant effect resulting in increase in prothrombin time. Indications for Fluconazole 1.Oesophageal candidiasis 2.Oropharyngeal candidiasis 3.Vaginal candidiasis 4.Systemic candidiasis 5.Cryptoc', '03082020082105Fungican_150mg.jpg', 9, 10, '2020-02-28 21:38:00', '2020-03-08 06:21:05', '--'),
(39, 'Otal 5 ml', 7, 'Amoun', 'Scientific Name: Framycetin 390mg+ gramycidin205mg+dexamethasone100mg+cinchocaine 1gm/100ml.', '03082020082118Otal_5_ml.jpg', 15, 10, '2020-02-28 21:40:16', '2020-03-08 06:21:18', '--'),
(40, 'Floxamo 500/500 mg', 36, 'Amoun', 'amoxycillin and flucloxacillin - generally exhibit an additive effect against sensitive bacteria and bacteria that are sensitive to amoxycillin or to flucloxacillin remain sensitive to the combination, showing that antagonism does not occur when the two components are combined. Typical indications include: Acute and chronic bronchitis Pelvic inflammatory disease Pneumonia Urinary tract infections Ear, nose and throat infections Skin and soft tissue infections Gynaecological infections', '03082020082133Floxamo_500-500_mg.jpg', 6, 10, '2020-02-28 21:42:01', '2020-03-08 06:21:33', '--'),
(41, 'Viotic 10 ml', 7, 'Amoun', 'Scientific Name: Flumetasone 0.02%+ Cliquinol 1%', '03082020082154Viotic_10_ml.png', 15, 10, '2020-02-28 21:44:08', '2020-03-08 06:21:54', '--');

-- --------------------------------------------------------

--
-- بنية الجدول `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_02_05_150619_create_pharmacists_table', 1),
(4, '2020_02_05_151219_create_pharmacists_phone_table', 2),
(5, '2020_02_05_151400_create_delivery_guys_table', 3),
(6, '2020_02_05_151604_create_delivery_guys_phone_table', 3),
(7, '2020_02_05_151842_create_types_table', 4),
(8, '2020_02_05_152422_create_types_table', 5),
(9, '2020_02_05_152527_create_medicines_table', 6),
(10, '2020_02_05_153014_create_stores_table', 7),
(11, '2020_02_05_153233_create_customers_table', 8),
(12, '2020_02_05_153441_create_sales_table', 9),
(13, '2020_02_05_154107_create_sales_list_table', 10),
(14, '2020_02_05_154255_create_deliveries_table', 11),
(15, '2020_02_05_154447_create_deliveries_list_table', 12),
(16, '2020_02_05_171135_create_pharmacists_phone_table', 13),
(17, '2020_02_05_171308_create_delivery_guys_phone_table', 13),
(18, '2020_02_05_171836_create_deliveries_table', 14),
(19, '2020_02_05_172147_create_sales_table', 14),
(20, '2020_02_05_173706_create_pharmacist_phones_table', 15),
(21, '2020_02_05_173914_create_delivery_guy_phones_table', 15),
(22, '2020_02_05_174257_create_delivery_lists_table', 16),
(23, '2020_02_05_174330_create_sale_lists_table', 16),
(24, '2020_02_05_180214_create_medicines_table', 17),
(25, '2020_02_06_231154_create_stores_table', 18),
(26, '2020_02_07_002615_create_delivery_guys_table', 19),
(27, '2020_02_07_103330_create_sales_table', 20),
(28, '2020_02_07_103820_create_deliveries_table', 21),
(29, '2020_02_07_103934_create_customers_table', 22),
(30, '2020_02_07_190050_add_pharmacist_phone_to_pharmacists_table', 23),
(31, '2020_02_07_190235_add_deliveryguy_phone_to_deliveryguys_table', 24),
(32, '2020_02_08_195753_add_medicine_totalamount_to_medicines_table', 25),
(33, '2020_02_09_075551_create_medicines_table', 26),
(34, '2020_02_10_192340_create_sales_table', 27),
(35, '2020_02_12_121258_add_medicine_id_to_salelists_table', 28),
(36, '2020_02_12_142236_add_medicine_id_to_deliverylists_table', 29),
(37, '2020_02_13_151829_create_products_table', 30),
(38, '2020_02_13_151854_create_carts_table', 31),
(39, '2020_02_16_201731_create_carts_table', 32),
(40, '2019_08_19_000000_create_failed_jobs_table', 33),
(41, '2020_02_17_073833_create_users_table', 34),
(42, '2020_02_17_081338_create_carts_table', 35),
(43, '2020_02_17_084345_create_carts_table', 36),
(44, '2020_02_20_114016_create_users_table', 37),
(45, '2020_02_24_112441_add_pharmacist_email_and_pharmacist_login_id_to_pharmacists_table', 38),
(46, '2020_02_24_115717_create_deliveries_table', 38),
(47, '2020_02_25_212126_add_sale_list_to_sales_table', 39),
(48, '2020_02_25_213229_add_delivery_list_to_deliveries_table', 40),
(49, '2020_02_25_214311_create_deliveries_table', 41),
(50, '2020_02_29_004149_add_medicine_ac_to_medicines_table', 42);

-- --------------------------------------------------------

--
-- بنية الجدول `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `pharmacists`
--

CREATE TABLE `pharmacists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pharmacist_firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pharmacist_lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pharmacist_salary` int(11) NOT NULL,
  `pharmacist_startjob` date NOT NULL,
  `pharmacist_city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pharmacist_street` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pharmacist_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `pharmacist_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `pharmacists`
--

INSERT INTO `pharmacists` (`id`, `pharmacist_firstname`, `pharmacist_lastname`, `pharmacist_salary`, `pharmacist_startjob`, `pharmacist_city`, `pharmacist_street`, `created_at`, `updated_at`, `pharmacist_phone`, `user_id`, `pharmacist_email`) VALUES
(13, 'Nada', 'Emad', 5000, '2019-12-31', 'Aswan', 'Taameen', '2020-02-29 14:50:25', '2020-02-29 14:50:25', '01223334444', 16, 'nadaemad@hotmail.com'),
(14, 'Esraa', 'Abdelhakiem', 4000, '2020-01-01', 'Cairo', 'Haram', '2020-02-29 15:24:37', '2020-02-29 15:24:37', '01236666666', 19, 'esraaabdelhakiem@gmail.com');

-- --------------------------------------------------------

--
-- بنية الجدول `salelists`
--

CREATE TABLE `salelists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `medicine_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `salelists`
--

INSERT INTO `salelists` (`id`, `store_id`, `sale_id`, `created_at`, `updated_at`, `medicine_id`) VALUES
(144, 29, 76, '2020-02-29 14:56:12', '2020-02-29 14:56:12', 10),
(145, 29, 76, '2020-02-29 14:56:12', '2020-02-29 14:56:12', 10),
(146, 29, 77, '2020-02-29 15:07:32', '2020-02-29 15:07:32', 10),
(147, 231, 77, '2020-02-29 15:07:32', '2020-02-29 15:07:32', 30),
(148, 231, 77, '2020-02-29 15:07:32', '2020-02-29 15:07:32', 30),
(149, 29, 78, '2020-02-29 15:09:30', '2020-02-29 15:09:30', 10),
(150, 231, 78, '2020-02-29 15:09:30', '2020-02-29 15:09:30', 30),
(151, 231, 78, '2020-02-29 15:09:30', '2020-02-29 15:09:30', 30),
(152, 29, 79, '2020-02-29 15:10:59', '2020-02-29 15:10:59', 10),
(153, 231, 79, '2020-02-29 15:10:59', '2020-02-29 15:10:59', 30),
(154, 232, 79, '2020-02-29 15:10:59', '2020-02-29 15:10:59', 30),
(155, 221, 80, '2020-03-05 07:39:59', '2020-03-05 07:39:59', 29),
(156, 221, 80, '2020-03-05 07:39:59', '2020-03-05 07:39:59', 29),
(157, 170, 80, '2020-03-05 07:39:59', '2020-03-05 07:39:59', 24),
(158, 170, 80, '2020-03-05 07:39:59', '2020-03-05 07:39:59', 24),
(159, 170, 80, '2020-03-05 07:40:00', '2020-03-05 07:40:00', 24),
(160, 345, 80, '2020-03-05 07:40:00', '2020-03-05 07:40:00', 41),
(161, 89, 80, '2020-03-05 07:40:00', '2020-03-05 07:40:00', 16),
(162, 89, 80, '2020-03-05 07:40:00', '2020-03-05 07:40:00', 16);

-- --------------------------------------------------------

--
-- بنية الجدول `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_date` date NOT NULL,
  `sale_time` time NOT NULL,
  `sale_totalprice` int(11) DEFAULT NULL,
  `pharmacist_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sale_list` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `sales`
--

INSERT INTO `sales` (`id`, `sale_date`, `sale_time`, `sale_totalprice`, `pharmacist_id`, `created_at`, `updated_at`, `sale_list`) VALUES
(77, '2020-02-29', '19:07:00', 139, 13, '2020-02-29 15:07:32', '2020-02-29 15:07:32', 'Nan 2 400->1,PowerCaps 45mg->2'),
(80, '2020-03-05', '11:38:00', 3009, 13, '2020-03-05 07:39:59', '2020-03-05 07:39:59', 'onbrez 150mcgm->2,Whey protien->3,Viotic 10 ml->1,Panadol Cold & Flu 500mg->2');

-- --------------------------------------------------------

--
-- بنية الجدول `stores`
--

CREATE TABLE `stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_expire` date NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `stores`
--

INSERT INTO `stores` (`id`, `store_expire`, `medicine_id`, `created_at`, `updated_at`) VALUES
(34, '2023-11-02', 10, '2020-02-28 21:47:48', '2020-02-28 21:47:48'),
(35, '2023-11-02', 10, '2020-02-28 21:47:52', '2020-02-28 21:47:52'),
(36, '2023-11-02', 10, '2020-02-28 21:47:56', '2020-02-28 21:47:56'),
(37, '2023-11-02', 10, '2020-02-28 21:47:59', '2020-02-28 21:47:59'),
(38, '2023-11-02', 10, '2020-02-28 21:48:03', '2020-02-28 21:48:03'),
(39, '2023-11-02', 11, '2020-02-28 21:49:34', '2020-02-28 21:49:34'),
(40, '2023-11-02', 11, '2020-02-28 21:49:38', '2020-02-28 21:49:38'),
(41, '2022-12-22', 11, '2020-02-28 21:50:04', '2020-02-28 21:50:04'),
(42, '2022-12-22', 11, '2020-02-28 21:50:07', '2020-02-28 21:50:07'),
(43, '2022-12-22', 11, '2020-02-28 21:50:10', '2020-02-28 21:50:10'),
(44, '2022-12-22', 11, '2020-02-28 21:50:13', '2020-02-28 21:50:13'),
(45, '2022-12-22', 11, '2020-02-28 21:50:18', '2020-02-28 21:50:18'),
(46, '2022-12-22', 11, '2020-02-28 21:50:21', '2020-02-28 21:50:21'),
(47, '2022-12-22', 11, '2020-02-28 21:50:24', '2020-02-28 21:50:24'),
(48, '2022-12-22', 11, '2020-02-28 21:50:28', '2020-02-28 21:50:28'),
(49, '2022-12-22', 12, '2020-02-28 21:50:53', '2020-02-28 21:50:53'),
(50, '2022-12-22', 12, '2020-02-28 21:50:56', '2020-02-28 21:50:56'),
(51, '2022-12-22', 12, '2020-02-28 21:51:00', '2020-02-28 21:51:00'),
(52, '2022-12-22', 12, '2020-02-28 21:51:03', '2020-02-28 21:51:03'),
(53, '2022-12-22', 12, '2020-02-28 21:51:07', '2020-02-28 21:51:07'),
(54, '2022-12-22', 12, '2020-02-28 21:51:10', '2020-02-28 21:51:10'),
(55, '2022-12-22', 12, '2020-02-28 21:51:23', '2020-02-28 21:51:23'),
(56, '2022-12-22', 12, '2020-02-28 21:51:26', '2020-02-28 21:51:26'),
(57, '2022-12-22', 12, '2020-02-28 21:51:29', '2020-02-28 21:51:29'),
(58, '2022-12-22', 12, '2020-02-28 21:51:32', '2020-02-28 21:51:32'),
(59, '2022-12-22', 13, '2020-02-28 21:52:22', '2020-02-28 21:52:22'),
(60, '2022-12-22', 13, '2020-02-28 21:52:25', '2020-02-28 21:52:25'),
(61, '2022-12-22', 13, '2020-02-28 21:52:28', '2020-02-28 21:52:28'),
(62, '2022-12-22', 13, '2020-02-28 21:52:31', '2020-02-28 21:52:31'),
(63, '2022-12-22', 13, '2020-02-28 21:52:34', '2020-02-28 21:52:34'),
(64, '2022-12-22', 13, '2020-02-28 21:52:36', '2020-02-28 21:52:36'),
(65, '2022-12-22', 13, '2020-02-28 21:52:39', '2020-02-28 21:52:39'),
(66, '2022-12-22', 13, '2020-02-28 21:52:42', '2020-02-28 21:52:42'),
(67, '2022-12-22', 13, '2020-02-28 21:52:45', '2020-02-28 21:52:45'),
(68, '2022-12-22', 13, '2020-02-28 21:52:48', '2020-02-28 21:52:48'),
(69, '2023-10-22', 14, '2020-02-28 21:53:24', '2020-02-28 21:53:24'),
(70, '2023-10-22', 14, '2020-02-28 21:53:27', '2020-02-28 21:53:27'),
(71, '2023-10-22', 14, '2020-02-28 21:53:30', '2020-02-28 21:53:30'),
(72, '2023-10-22', 14, '2020-02-28 21:53:32', '2020-02-28 21:53:32'),
(73, '2023-10-22', 14, '2020-02-28 21:53:35', '2020-02-28 21:53:35'),
(74, '2023-10-22', 14, '2020-02-28 21:53:38', '2020-02-28 21:53:38'),
(75, '2023-10-22', 14, '2020-02-28 21:53:40', '2020-02-28 21:53:40'),
(76, '2023-10-22', 14, '2020-02-28 21:53:43', '2020-02-28 21:53:43'),
(77, '2023-10-22', 14, '2020-02-28 21:53:46', '2020-02-28 21:53:46'),
(78, '2023-10-22', 14, '2020-02-28 21:53:48', '2020-02-28 21:53:48'),
(79, '2023-09-22', 15, '2020-02-28 21:54:16', '2020-02-28 21:54:16'),
(80, '2023-09-22', 15, '2020-02-28 21:54:19', '2020-02-28 21:54:19'),
(81, '2023-09-22', 15, '2020-02-28 21:54:22', '2020-02-28 21:54:22'),
(82, '2023-09-22', 15, '2020-02-28 21:54:27', '2020-02-28 21:54:27'),
(83, '2023-09-22', 15, '2020-02-28 21:54:29', '2020-02-28 21:54:29'),
(84, '2023-09-22', 15, '2020-02-28 21:54:32', '2020-02-28 21:54:32'),
(85, '2023-09-22', 15, '2020-02-28 21:54:36', '2020-02-28 21:54:36'),
(86, '2023-09-22', 15, '2020-02-28 21:54:39', '2020-02-28 21:54:39'),
(87, '2023-09-22', 15, '2020-02-28 21:54:42', '2020-02-28 21:54:42'),
(88, '2023-09-22', 15, '2020-02-28 21:54:44', '2020-02-28 21:54:44'),
(99, '2021-07-22', 17, '2020-02-28 21:56:27', '2020-02-28 21:56:27'),
(100, '2021-07-22', 17, '2020-02-28 21:56:30', '2020-02-28 21:56:30'),
(101, '2021-07-22', 17, '2020-02-28 21:56:33', '2020-02-28 21:56:33'),
(102, '2021-07-22', 17, '2020-02-28 21:56:36', '2020-02-28 21:56:36'),
(103, '2021-07-22', 17, '2020-02-28 21:56:38', '2020-02-28 21:56:38'),
(104, '2021-07-22', 17, '2020-02-28 21:56:41', '2020-02-28 21:56:41'),
(105, '2021-07-22', 17, '2020-02-28 21:56:44', '2020-02-28 21:56:44'),
(106, '2021-07-22', 17, '2020-02-28 21:56:47', '2020-02-28 21:56:47'),
(107, '2021-07-22', 17, '2020-02-28 21:56:51', '2020-02-28 21:56:51'),
(108, '2021-07-22', 17, '2020-02-28 21:56:54', '2020-02-28 21:56:54'),
(109, '2021-05-02', 18, '2020-02-28 21:57:38', '2020-02-28 21:57:38'),
(110, '2021-05-02', 18, '2020-02-28 21:57:40', '2020-02-28 21:57:40'),
(111, '2021-05-02', 18, '2020-02-28 21:57:43', '2020-02-28 21:57:43'),
(112, '2021-05-02', 18, '2020-02-28 21:57:46', '2020-02-28 21:57:46'),
(113, '2021-05-02', 18, '2020-02-28 21:57:49', '2020-02-28 21:57:49'),
(114, '2021-05-02', 18, '2020-02-28 21:57:51', '2020-02-28 21:57:51'),
(115, '2021-05-02', 18, '2020-02-28 21:57:54', '2020-02-28 21:57:54'),
(116, '2021-05-02', 18, '2020-02-28 21:57:57', '2020-02-28 21:57:57'),
(117, '2021-05-02', 18, '2020-02-28 21:58:00', '2020-02-28 21:58:00'),
(118, '2021-05-02', 18, '2020-02-28 21:58:03', '2020-02-28 21:58:03'),
(119, '2021-05-15', 19, '2020-02-28 21:58:38', '2020-02-28 21:58:38'),
(120, '2021-05-15', 19, '2020-02-28 21:58:41', '2020-02-28 21:58:41'),
(121, '2021-05-15', 19, '2020-02-28 21:58:43', '2020-02-28 21:58:43'),
(122, '2021-05-15', 19, '2020-02-28 21:58:49', '2020-02-28 21:58:49'),
(123, '2021-05-15', 19, '2020-02-28 21:58:52', '2020-02-28 21:58:52'),
(124, '2021-05-15', 19, '2020-02-28 21:58:54', '2020-02-28 21:58:54'),
(125, '2021-05-15', 19, '2020-02-28 21:58:57', '2020-02-28 21:58:57'),
(126, '2021-05-15', 19, '2020-02-28 21:59:01', '2020-02-28 21:59:01'),
(127, '2021-05-15', 19, '2020-02-28 21:59:04', '2020-02-28 21:59:04'),
(128, '2021-05-15', 19, '2020-02-28 21:59:07', '2020-02-28 21:59:07'),
(129, '2021-05-15', 19, '2020-02-28 21:59:09', '2020-02-28 21:59:09'),
(130, '2021-11-15', 20, '2020-02-28 21:59:38', '2020-02-28 21:59:38'),
(131, '2021-11-15', 20, '2020-02-28 21:59:42', '2020-02-28 21:59:42'),
(132, '2021-11-15', 20, '2020-02-28 21:59:45', '2020-02-28 21:59:45'),
(133, '2021-11-15', 20, '2020-02-28 21:59:48', '2020-02-28 21:59:48'),
(134, '2021-11-15', 20, '2020-02-28 21:59:50', '2020-02-28 21:59:50'),
(135, '2021-11-15', 20, '2020-02-28 21:59:53', '2020-02-28 21:59:53'),
(136, '2021-11-15', 20, '2020-02-28 21:59:56', '2020-02-28 21:59:56'),
(137, '2021-11-15', 20, '2020-02-28 21:59:59', '2020-02-28 21:59:59'),
(138, '2021-11-15', 20, '2020-02-28 22:00:01', '2020-02-28 22:00:01'),
(139, '2021-11-15', 20, '2020-02-28 22:00:05', '2020-02-28 22:00:05'),
(140, '2022-11-06', 21, '2020-02-28 22:00:43', '2020-02-28 22:00:43'),
(141, '2022-11-06', 21, '2020-02-28 22:00:45', '2020-02-28 22:00:45'),
(142, '2022-11-06', 21, '2020-02-28 22:00:48', '2020-02-28 22:00:48'),
(143, '2022-11-06', 21, '2020-02-28 22:00:51', '2020-02-28 22:00:51'),
(144, '2022-11-06', 21, '2020-02-28 22:00:54', '2020-02-28 22:00:54'),
(145, '2022-11-06', 21, '2020-02-28 22:00:56', '2020-02-28 22:00:56'),
(146, '2022-11-06', 21, '2020-02-28 22:00:59', '2020-02-28 22:00:59'),
(147, '2022-11-06', 21, '2020-02-28 22:01:01', '2020-02-28 22:01:01'),
(148, '2022-11-06', 21, '2020-02-28 22:01:04', '2020-02-28 22:01:04'),
(149, '2022-11-06', 21, '2020-02-28 22:01:07', '2020-02-28 22:01:07'),
(150, '2023-01-06', 22, '2020-02-28 22:01:46', '2020-02-28 22:01:46'),
(151, '2023-01-06', 22, '2020-02-28 22:01:49', '2020-02-28 22:01:49'),
(152, '2023-01-06', 22, '2020-02-28 22:01:52', '2020-02-28 22:01:52'),
(153, '2023-01-06', 22, '2020-02-28 22:01:55', '2020-02-28 22:01:55'),
(154, '2023-01-06', 22, '2020-02-28 22:01:57', '2020-02-28 22:01:57'),
(155, '2023-01-06', 22, '2020-02-28 22:02:00', '2020-02-28 22:02:00'),
(156, '2023-01-06', 22, '2020-02-28 22:02:02', '2020-02-28 22:02:02'),
(157, '2023-01-06', 22, '2020-02-28 22:02:05', '2020-02-28 22:02:05'),
(158, '2023-01-06', 22, '2020-02-28 22:02:08', '2020-02-28 22:02:08'),
(159, '2023-01-06', 22, '2020-02-28 22:02:10', '2020-02-28 22:02:10'),
(160, '2023-08-08', 23, '2020-02-28 22:02:43', '2020-02-28 22:02:43'),
(161, '2023-08-08', 23, '2020-02-28 22:02:46', '2020-02-28 22:02:46'),
(162, '2023-08-08', 23, '2020-02-28 22:02:48', '2020-02-28 22:02:48'),
(163, '2023-08-08', 23, '2020-02-28 22:02:51', '2020-02-28 22:02:51'),
(164, '2023-08-08', 23, '2020-02-28 22:02:54', '2020-02-28 22:02:54'),
(165, '2023-08-08', 23, '2020-02-28 22:02:56', '2020-02-28 22:02:56'),
(166, '2023-08-08', 23, '2020-02-28 22:02:59', '2020-02-28 22:02:59'),
(167, '2023-08-08', 23, '2020-02-28 22:03:01', '2020-02-28 22:03:01'),
(168, '2023-08-08', 23, '2020-02-28 22:03:04', '2020-02-28 22:03:04'),
(169, '2023-08-08', 23, '2020-02-28 22:03:07', '2020-02-28 22:03:07'),
(170, '2022-08-08', 24, '2020-02-28 22:03:34', '2020-02-28 22:03:34'),
(171, '2022-08-08', 24, '2020-02-28 22:03:37', '2020-02-28 22:03:37'),
(172, '2022-08-08', 24, '2020-02-28 22:03:41', '2020-02-28 22:03:41'),
(173, '2022-08-08', 24, '2020-02-28 22:03:43', '2020-02-28 22:03:43'),
(174, '2022-08-08', 24, '2020-02-28 22:03:47', '2020-02-28 22:03:47'),
(175, '2022-08-08', 24, '2020-02-28 22:03:50', '2020-02-28 22:03:50'),
(176, '2022-08-08', 24, '2020-02-28 22:03:53', '2020-02-28 22:03:53'),
(177, '2022-08-08', 24, '2020-02-28 22:03:55', '2020-02-28 22:03:55'),
(178, '2022-08-08', 24, '2020-02-28 22:03:59', '2020-02-28 22:03:59'),
(179, '2022-08-08', 24, '2020-02-28 22:04:02', '2020-02-28 22:04:02'),
(180, '2022-08-08', 25, '2020-02-28 22:04:50', '2020-02-28 22:04:50'),
(181, '2022-08-08', 25, '2020-02-28 22:04:53', '2020-02-28 22:04:53'),
(182, '2022-08-08', 25, '2020-02-28 22:04:57', '2020-02-28 22:04:57'),
(183, '2022-08-08', 25, '2020-02-28 22:05:02', '2020-02-28 22:05:02'),
(184, '2022-08-08', 25, '2020-02-28 22:05:05', '2020-02-28 22:05:05'),
(185, '2022-08-08', 25, '2020-02-28 22:05:09', '2020-02-28 22:05:09'),
(186, '2022-08-08', 25, '2020-02-28 22:05:12', '2020-02-28 22:05:12'),
(187, '2022-08-08', 25, '2020-02-28 22:05:15', '2020-02-28 22:05:15'),
(188, '2022-08-08', 25, '2020-02-28 22:05:18', '2020-02-28 22:05:18'),
(189, '2022-08-08', 25, '2020-02-28 22:05:22', '2020-02-28 22:05:22'),
(190, '2022-08-28', 26, '2020-02-28 22:09:27', '2020-02-28 22:09:27'),
(191, '2022-08-28', 26, '2020-02-28 22:09:29', '2020-02-28 22:09:29'),
(192, '2022-08-28', 26, '2020-02-28 22:09:33', '2020-02-28 22:09:33'),
(193, '2022-08-28', 26, '2020-02-28 22:09:36', '2020-02-28 22:09:36'),
(194, '2022-08-28', 26, '2020-02-28 22:09:39', '2020-02-28 22:09:39'),
(195, '2022-08-28', 26, '2020-02-28 22:09:42', '2020-02-28 22:09:42'),
(196, '2022-08-28', 26, '2020-02-28 22:09:45', '2020-02-28 22:09:45'),
(197, '2022-08-28', 26, '2020-02-28 22:09:50', '2020-02-28 22:09:50'),
(198, '2022-08-28', 26, '2020-02-28 22:09:53', '2020-02-28 22:09:53'),
(199, '2022-08-28', 26, '2020-02-28 22:09:56', '2020-02-28 22:09:56'),
(200, '2023-06-28', 27, '2020-02-28 22:10:36', '2020-02-28 22:10:36'),
(201, '2023-06-28', 27, '2020-02-28 22:10:40', '2020-02-28 22:10:40'),
(202, '2023-06-28', 27, '2020-02-28 22:10:43', '2020-02-28 22:10:43'),
(203, '2023-06-28', 27, '2020-02-28 22:10:46', '2020-02-28 22:10:46'),
(204, '2023-06-28', 27, '2020-02-28 22:10:50', '2020-02-28 22:10:50'),
(205, '2023-06-28', 27, '2020-02-28 22:11:08', '2020-02-28 22:11:08'),
(206, '2023-06-28', 27, '2020-02-28 22:11:11', '2020-02-28 22:11:11'),
(207, '2023-06-28', 27, '2020-02-28 22:11:14', '2020-02-28 22:11:14'),
(208, '2023-06-28', 27, '2020-02-28 22:11:17', '2020-02-28 22:11:17'),
(209, '2023-06-28', 27, '2020-02-28 22:11:26', '2020-02-28 22:11:26'),
(210, '2022-06-28', 28, '2020-02-28 22:13:14', '2020-02-28 22:13:14'),
(211, '2022-06-28', 28, '2020-02-28 22:13:19', '2020-02-28 22:13:19'),
(212, '2022-06-28', 28, '2020-02-28 22:13:21', '2020-02-28 22:13:21'),
(213, '2022-06-28', 28, '2020-02-28 22:13:24', '2020-02-28 22:13:24'),
(214, '2022-06-28', 28, '2020-02-28 22:13:27', '2020-02-28 22:13:27'),
(215, '2022-06-28', 28, '2020-02-28 22:13:30', '2020-02-28 22:13:30'),
(216, '2022-06-28', 28, '2020-02-28 22:13:32', '2020-02-28 22:13:32'),
(217, '2022-06-28', 28, '2020-02-28 22:13:32', '2020-02-28 22:13:32'),
(218, '2022-06-28', 28, '2020-02-28 22:13:35', '2020-02-28 22:13:35'),
(219, '2022-06-28', 28, '2020-02-28 22:13:38', '2020-02-28 22:13:38'),
(220, '2022-06-28', 28, '2020-02-28 22:13:41', '2020-02-28 22:13:41'),
(221, '2022-06-28', 29, '2020-02-28 22:14:44', '2020-02-28 22:14:44'),
(222, '2022-06-28', 29, '2020-02-28 22:14:46', '2020-02-28 22:14:46'),
(223, '2022-06-28', 29, '2020-02-28 22:14:49', '2020-02-28 22:14:49'),
(224, '2022-06-28', 29, '2020-02-28 22:14:52', '2020-02-28 22:14:52'),
(225, '2022-06-28', 29, '2020-02-28 22:14:55', '2020-02-28 22:14:55'),
(226, '2022-06-28', 29, '2020-02-28 22:14:57', '2020-02-28 22:14:57'),
(227, '2022-06-28', 29, '2020-02-28 22:15:00', '2020-02-28 22:15:00'),
(228, '2022-06-28', 29, '2020-02-28 22:15:03', '2020-02-28 22:15:03'),
(229, '2022-06-28', 29, '2020-02-28 22:15:05', '2020-02-28 22:15:05'),
(230, '2022-06-28', 29, '2020-02-28 22:15:08', '2020-02-28 22:15:08'),
(233, '2022-06-28', 30, '2020-02-28 22:15:38', '2020-02-28 22:15:38'),
(234, '2022-06-28', 30, '2020-02-28 22:15:41', '2020-02-28 22:15:41'),
(235, '2022-06-28', 30, '2020-02-28 22:15:43', '2020-02-28 22:15:43'),
(236, '2022-06-28', 30, '2020-02-28 22:15:46', '2020-02-28 22:15:46'),
(237, '2022-06-28', 30, '2020-02-28 22:15:49', '2020-02-28 22:15:49'),
(238, '2022-06-28', 30, '2020-02-28 22:15:51', '2020-02-28 22:15:51'),
(239, '2022-06-28', 30, '2020-02-28 22:15:54', '2020-02-28 22:15:54'),
(240, '2022-06-28', 30, '2020-02-28 22:15:57', '2020-02-28 22:15:57'),
(241, '2023-06-01', 31, '2020-02-28 22:16:31', '2020-02-28 22:16:31'),
(242, '2023-06-01', 31, '2020-02-28 22:16:34', '2020-02-28 22:16:34'),
(243, '2023-06-01', 31, '2020-02-28 22:16:37', '2020-02-28 22:16:37'),
(244, '2023-06-01', 31, '2020-02-28 22:16:40', '2020-02-28 22:16:40'),
(245, '2023-06-01', 31, '2020-02-28 22:16:43', '2020-02-28 22:16:43'),
(246, '2023-06-01', 31, '2020-02-28 22:16:46', '2020-02-28 22:16:46'),
(247, '2023-06-01', 31, '2020-02-28 22:16:49', '2020-02-28 22:16:49'),
(248, '2023-06-01', 31, '2020-02-28 22:16:52', '2020-02-28 22:16:52'),
(249, '2023-06-01', 31, '2020-02-28 22:16:55', '2020-02-28 22:16:55'),
(250, '2023-06-01', 31, '2020-02-28 22:16:58', '2020-02-28 22:16:58'),
(251, '2023-06-06', 32, '2020-02-28 22:17:35', '2020-02-28 22:17:35'),
(252, '2023-06-06', 32, '2020-02-28 22:17:38', '2020-02-28 22:17:38'),
(253, '2023-06-06', 32, '2020-02-28 22:17:41', '2020-02-28 22:17:41'),
(254, '2023-06-06', 32, '2020-02-28 22:17:43', '2020-02-28 22:17:43'),
(255, '2023-06-06', 32, '2020-02-28 22:17:46', '2020-02-28 22:17:46'),
(256, '2023-06-06', 32, '2020-02-28 22:17:48', '2020-02-28 22:17:48'),
(257, '2023-06-06', 32, '2020-02-28 22:17:51', '2020-02-28 22:17:51'),
(258, '2023-06-06', 32, '2020-02-28 22:17:53', '2020-02-28 22:17:53'),
(259, '2023-06-06', 32, '2020-02-28 22:17:56', '2020-02-28 22:17:56'),
(260, '2023-06-06', 32, '2020-02-28 22:17:58', '2020-02-28 22:17:58'),
(261, '2023-06-06', 32, '2020-02-28 22:18:01', '2020-02-28 22:18:01'),
(262, '2023-09-06', 33, '2020-02-28 22:18:30', '2020-02-28 22:18:30'),
(263, '2023-09-06', 33, '2020-02-28 22:18:34', '2020-02-28 22:18:34'),
(264, '2023-09-06', 33, '2020-02-28 22:18:37', '2020-02-28 22:18:37'),
(265, '2023-09-06', 33, '2020-02-28 22:18:40', '2020-02-28 22:18:40'),
(266, '2023-09-06', 33, '2020-02-28 22:18:43', '2020-02-28 22:18:43'),
(267, '2023-09-06', 33, '2020-02-28 22:18:45', '2020-02-28 22:18:45'),
(268, '2023-09-06', 33, '2020-02-28 22:18:48', '2020-02-28 22:18:48'),
(269, '2023-09-06', 33, '2020-02-28 22:18:51', '2020-02-28 22:18:51'),
(270, '2023-09-06', 33, '2020-02-28 22:18:54', '2020-02-28 22:18:54'),
(271, '2023-09-06', 33, '2020-02-28 22:18:57', '2020-02-28 22:18:57'),
(272, '2022-09-06', 34, '2020-02-28 22:19:39', '2020-02-28 22:19:39'),
(273, '2022-09-06', 34, '2020-02-28 22:19:42', '2020-02-28 22:19:42'),
(274, '2022-09-06', 34, '2020-02-28 22:19:44', '2020-02-28 22:19:44'),
(275, '2022-09-06', 34, '2020-02-28 22:19:47', '2020-02-28 22:19:47'),
(276, '2022-09-06', 34, '2020-02-28 22:19:50', '2020-02-28 22:19:50'),
(277, '2022-09-06', 34, '2020-02-28 22:19:54', '2020-02-28 22:19:54'),
(278, '2022-09-06', 34, '2020-02-28 22:19:56', '2020-02-28 22:19:56'),
(279, '2022-09-06', 34, '2020-02-28 22:19:59', '2020-02-28 22:19:59'),
(280, '2022-09-06', 34, '2020-02-28 22:20:03', '2020-02-28 22:20:03'),
(281, '2022-09-06', 34, '2020-02-28 22:20:06', '2020-02-28 22:20:06'),
(282, '2022-09-06', 35, '2020-02-28 22:20:43', '2020-02-28 22:20:43'),
(283, '2022-09-06', 35, '2020-02-28 22:20:46', '2020-02-28 22:20:46'),
(284, '2022-09-06', 35, '2020-02-28 22:20:49', '2020-02-28 22:20:49'),
(285, '2022-09-06', 35, '2020-02-28 22:20:54', '2020-02-28 22:20:54'),
(286, '2022-09-06', 35, '2020-02-28 22:20:57', '2020-02-28 22:20:57'),
(287, '2022-09-06', 35, '2020-02-28 22:20:59', '2020-02-28 22:20:59'),
(288, '2022-09-06', 35, '2020-02-28 22:21:02', '2020-02-28 22:21:02'),
(289, '2022-09-06', 35, '2020-02-28 22:21:04', '2020-02-28 22:21:04'),
(290, '2022-09-06', 35, '2020-02-28 22:21:07', '2020-02-28 22:21:07'),
(291, '2022-09-06', 35, '2020-02-28 22:21:10', '2020-02-28 22:21:10'),
(292, '2022-09-06', 35, '2020-02-28 22:21:14', '2020-02-28 22:21:14'),
(293, '2023-09-22', 36, '2020-02-28 22:21:53', '2020-02-28 22:21:53'),
(294, '2023-09-22', 36, '2020-02-28 22:21:57', '2020-02-28 22:21:57'),
(295, '2023-09-22', 36, '2020-02-28 22:21:59', '2020-02-28 22:21:59'),
(296, '2023-09-22', 36, '2020-02-28 22:22:04', '2020-02-28 22:22:04'),
(297, '2023-09-22', 36, '2020-02-28 22:22:08', '2020-02-28 22:22:08'),
(298, '2023-09-22', 36, '2020-02-28 22:22:14', '2020-02-28 22:22:14'),
(299, '2023-09-22', 36, '2020-02-28 22:22:17', '2020-02-28 22:22:17'),
(300, '2023-09-22', 36, '2020-02-28 22:22:20', '2020-02-28 22:22:20'),
(301, '2023-09-22', 36, '2020-02-28 22:22:23', '2020-02-28 22:22:23'),
(302, '2023-09-22', 36, '2020-02-28 22:22:25', '2020-02-28 22:22:25'),
(303, '2023-09-22', 36, '2020-02-28 22:22:28', '2020-02-28 22:22:28'),
(304, '2023-09-22', 36, '2020-02-28 22:22:31', '2020-02-28 22:22:31'),
(305, '2021-09-09', 37, '2020-02-28 22:23:17', '2020-02-28 22:23:17'),
(306, '2021-09-09', 37, '2020-02-28 22:23:20', '2020-02-28 22:23:20'),
(307, '2021-09-09', 37, '2020-02-28 22:23:22', '2020-02-28 22:23:22'),
(308, '2021-09-09', 37, '2020-02-28 22:23:25', '2020-02-28 22:23:25'),
(309, '2021-09-09', 37, '2020-02-28 22:23:28', '2020-02-28 22:23:28'),
(310, '2021-09-09', 37, '2020-02-28 22:23:30', '2020-02-28 22:23:30'),
(311, '2021-09-09', 37, '2020-02-28 22:23:33', '2020-02-28 22:23:33'),
(312, '2021-09-09', 37, '2020-02-28 22:23:36', '2020-02-28 22:23:36'),
(313, '2021-09-09', 37, '2020-02-28 22:23:39', '2020-02-28 22:23:39'),
(314, '2021-09-09', 37, '2020-02-28 22:23:42', '2020-02-28 22:23:42'),
(315, '2021-09-09', 38, '2020-02-28 22:24:19', '2020-02-28 22:24:19'),
(316, '2021-09-09', 38, '2020-02-28 22:24:22', '2020-02-28 22:24:22'),
(317, '2021-09-09', 38, '2020-02-28 22:24:24', '2020-02-28 22:24:24'),
(318, '2021-09-09', 38, '2020-02-28 22:24:27', '2020-02-28 22:24:27'),
(319, '2021-09-09', 38, '2020-02-28 22:24:29', '2020-02-28 22:24:29'),
(320, '2021-09-09', 38, '2020-02-28 22:24:32', '2020-02-28 22:24:32'),
(321, '2021-09-09', 38, '2020-02-28 22:24:34', '2020-02-28 22:24:34'),
(322, '2021-09-09', 38, '2020-02-28 22:24:36', '2020-02-28 22:24:36'),
(323, '2021-09-09', 38, '2020-02-28 22:24:39', '2020-02-28 22:24:39'),
(324, '2021-09-09', 38, '2020-02-28 22:24:41', '2020-02-28 22:24:41'),
(325, '2022-03-15', 39, '2020-02-28 22:25:21', '2020-02-28 22:25:21'),
(326, '2022-03-15', 39, '2020-02-28 22:25:24', '2020-02-28 22:25:24'),
(327, '2022-03-15', 39, '2020-02-28 22:25:27', '2020-02-28 22:25:27'),
(328, '2022-03-15', 39, '2020-02-28 22:25:30', '2020-02-28 22:25:30'),
(329, '2022-03-15', 39, '2020-02-28 22:25:33', '2020-02-28 22:25:33'),
(330, '2022-03-15', 39, '2020-02-28 22:25:35', '2020-02-28 22:25:35'),
(331, '2022-03-15', 39, '2020-02-28 22:25:38', '2020-02-28 22:25:38'),
(332, '2022-03-15', 39, '2020-02-28 22:25:40', '2020-02-28 22:25:40'),
(333, '2022-03-15', 39, '2020-02-28 22:25:43', '2020-02-28 22:25:43'),
(334, '2022-03-15', 39, '2020-02-28 22:25:46', '2020-02-28 22:25:46'),
(335, '2022-03-15', 40, '2020-02-28 22:26:15', '2020-02-28 22:26:15'),
(336, '2022-03-15', 40, '2020-02-28 22:26:18', '2020-02-28 22:26:18'),
(337, '2022-03-15', 40, '2020-02-28 22:26:22', '2020-02-28 22:26:22'),
(338, '2022-03-15', 40, '2020-02-28 22:26:25', '2020-02-28 22:26:25'),
(339, '2022-03-15', 40, '2020-02-28 22:26:28', '2020-02-28 22:26:28'),
(340, '2022-03-15', 40, '2020-02-28 22:26:31', '2020-02-28 22:26:31'),
(341, '2022-03-15', 40, '2020-02-28 22:26:34', '2020-02-28 22:26:34'),
(342, '2022-03-15', 40, '2020-02-28 22:26:37', '2020-02-28 22:26:37'),
(343, '2022-03-15', 40, '2020-02-28 22:26:40', '2020-02-28 22:26:40'),
(344, '2022-03-15', 40, '2020-02-28 22:26:43', '2020-02-28 22:26:43'),
(345, '2022-03-15', 41, '2020-02-28 22:27:12', '2020-02-28 22:27:12'),
(346, '2022-03-15', 41, '2020-02-28 22:27:15', '2020-02-28 22:27:15'),
(347, '2022-03-15', 41, '2020-02-28 22:27:19', '2020-02-28 22:27:19'),
(348, '2022-03-15', 41, '2020-02-28 22:27:22', '2020-02-28 22:27:22'),
(349, '2022-03-15', 41, '2020-02-28 22:27:25', '2020-02-28 22:27:25'),
(350, '2022-03-15', 41, '2020-02-28 22:27:28', '2020-02-28 22:27:28'),
(351, '2022-03-15', 41, '2020-02-28 22:27:31', '2020-02-28 22:27:31'),
(352, '2022-03-15', 41, '2020-02-28 22:27:34', '2020-02-28 22:27:34'),
(353, '2022-03-15', 41, '2020-02-28 22:27:37', '2020-02-28 22:27:37'),
(354, '2022-03-15', 41, '2020-02-28 22:27:39', '2020-02-28 22:27:39'),
(355, '2024-01-01', 10, '2020-02-29 15:25:07', '2020-02-29 15:25:07'),
(356, '2022-09-02', 30, '2020-02-29 15:25:47', '2020-02-29 15:25:47'),
(359, '2020-03-10', 10, '2020-03-07 13:00:14', '2020-03-07 13:19:03'),
(361, '2020-04-01', 18, '2020-03-07 18:38:07', '2020-03-07 18:38:07');

-- --------------------------------------------------------

--
-- بنية الجدول `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `types`
--

INSERT INTO `types` (`id`, `type_name`, `created_at`, `updated_at`) VALUES
(5, 'Infant Milk', '2020-02-28 18:39:17', '2020-02-28 18:39:17'),
(6, 'Tablets', '2020-02-28 18:45:55', '2020-02-28 18:45:55'),
(7, 'Syrup', '2020-02-28 18:59:37', '2020-02-28 18:59:37'),
(8, 'Sachets', '2020-02-28 19:51:06', '2020-02-28 19:51:06'),
(9, 'Capsule', '2020-02-28 19:56:57', '2020-02-28 19:56:57'),
(10, 'Supp', '2020-02-28 20:07:01', '2020-02-28 20:07:01'),
(11, 'Nasal Drops', '2020-02-28 20:13:12', '2020-02-28 20:13:12'),
(12, 'Cream', '2020-02-28 20:23:44', '2020-02-28 20:23:44'),
(13, 'Powder', '2020-02-28 20:31:28', '2020-02-28 20:31:28'),
(14, 'Ampoules', '2020-02-28 20:53:26', '2020-02-28 20:53:26'),
(15, 'Ear Drops', '2020-02-28 21:39:22', '2020-02-28 21:39:22');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `usertype`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@windowslive.com', '$2y$10$xcMHXJpLFnSp3VHtsj1xtOq81QBXxzFQP079Bk6yeBlPmF9Hgj2Sm', 'admin', '2020-02-20 09:52:32', '2020-02-20 09:52:32'),
(16, 'Nada Emad', 'nadaemad@hotmail.com', '$2y$10$3giP8GoCFg1HNO9seUqhY.LSgQNQsj3jvWWwQHK0xdZK2l4uxcEQm', 'pharmacist', '2020-02-29 15:27:14', '2020-02-29 15:27:14'),
(18, 'Rahma Mamdouh', 'o.e.6.9.2000@gmail.com', '$2y$10$VTO9T2t.btSsR4NPJj9wVOWa.kohDPTW4vGeRxT2/y093vqmS4yb6', 'user', '2020-03-04 12:24:27', '2020-03-04 12:24:27'),
(19, 'Esraa Abdelhakiem', 'esraaabdelhakiem@gmail.com', '$2y$10$Gh9N/d.cmWxPAXiZ.q3i3..e1MuSYDre0dJWBapEX8d9p5iKQBEbi', 'pharmacist', '2020-03-07 08:39:48', '2020-03-07 08:39:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `carts_medicine_id_unique` (`medicine_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveryguys`
--
ALTER TABLE `deliveryguys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliverylists`
--
ALTER TABLE `deliverylists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `medicines_medicine_name_unique` (`medicine_name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pharmacists`
--
ALTER TABLE `pharmacists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salelists`
--
ALTER TABLE `salelists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `types_type_name_unique` (`type_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `deliveryguys`
--
ALTER TABLE `deliveryguys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deliverylists`
--
ALTER TABLE `deliverylists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `pharmacists`
--
ALTER TABLE `pharmacists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `salelists`
--
ALTER TABLE `salelists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=362;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
