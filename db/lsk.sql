-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2024 at 11:40 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lsk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin1', '$2y$12$jZ.knX6SdQKL8TFVh8tCLu1nMN.q0r6./0tikHLjpDCf8sVw66D9y', '2024-04-04 02:16:31', '2024-04-04 02:16:31'),
(2, 'admin2', '$2y$10$/MzNYb/7uRPzRgItzOmePOL1/tmIDLrHWzZbG2zOKXq5Hfr.D34Tm', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `child`
--

CREATE TABLE `child` (
  `id` int NOT NULL,
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL,
  `id_parent` int NOT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `child`
--

INSERT INTO `child` (`id`, `name`, `date_of_birth`, `gender`, `id_parent`, `updated_at`, `created_at`) VALUES
(62, 'muhammad rozali', '2024-05-10', 'Laki-laki', 39, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'muhammad abdul', '2024-05-10', 'Laki-laki', 39, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 'muhammad sumbul', '2024-05-01', 'Laki-laki', 39, '2024-06-08 10:27:19', '2024-06-08 10:27:19');

--
-- Triggers `child`
--
DELIMITER $$
CREATE TRIGGER `after_child_update` AFTER UPDATE ON `child` FOR EACH ROW BEGIN
    DECLARE age_year INT;
    DECLARE age_month INT;
    DECLARE total_months INT;

    -- Hanya lakukan aksi jika date_of_birth diubah
    IF OLD.date_of_birth <> NEW.date_of_birth THEN
        -- Hapus semua data di tabel child_schedule yang terkait dengan id child yang diubah
        DELETE FROM child_schedule WHERE id_child = NEW.id;

        -- Hitung umur anak yang baru saja diperbarui dalam tahun dan bulan
        SET age_year = TIMESTAMPDIFF(YEAR, NEW.date_of_birth, CURDATE());
        SET age_month = TIMESTAMPDIFF(MONTH, NEW.date_of_birth, CURDATE()) % 12;

        -- Konversi umur menjadi total bulan untuk pencocokan yang lebih mudah
        SET total_months = (age_year * 12) + age_month;

        -- Cari semua jadwal imunisasi yang sesuai dengan umur anak
        INSERT INTO child_schedule (id_child, id_schedule, status, created_at, updated_at)
        SELECT NEW.id, id_schedule, 'belum', NOW(), NOW()
        FROM immunization_schedule
        WHERE (year * 12) + month >= total_months;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_insert_child` AFTER INSERT ON `child` FOR EACH ROW BEGIN
    DECLARE age_year INT;
    DECLARE age_month INT;
    DECLARE total_months INT;
    
    -- Hitung umur anak yang baru saja dimasukkan dalam tahun dan bulan
    SET age_year = TIMESTAMPDIFF(YEAR, NEW.date_of_birth, CURDATE());
    SET age_month = TIMESTAMPDIFF(MONTH, NEW.date_of_birth, CURDATE()) % 12;

    -- Konversi umur menjadi total bulan untuk pencocokan yang lebih mudah
    SET total_months = (age_year * 12) + age_month;

    -- Cari semua jadwal imunisasi yang sesuai dengan umur anak
    INSERT INTO child_schedule (id_child, id_schedule, status, created_at, updated_at)
    SELECT NEW.id, id_schedule, 'belum', NOW(), NOW()
    FROM immunization_schedule
    WHERE (year * 12) + month >= total_months;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `child_growth`
--

CREATE TABLE `child_growth` (
  `Id_growth` int NOT NULL,
  `age` varchar(30) NOT NULL,
  `weight` decimal(10,0) NOT NULL,
  `body_length` decimal(10,0) NOT NULL,
  `head_circumference` decimal(10,0) NOT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  `id_child` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `child_growth`
--

INSERT INTO `child_growth` (`Id_growth`, `age`, `weight`, `body_length`, `head_circumference`, `updated_at`, `created_at`, `id_child`) VALUES
(9, '2 bulan', 6, 34, 35, '2024-06-13 06:16:36', '2024-06-12 04:04:00', 62),
(14, '1 bulan', 5, 35, 53, '2024-06-13 06:16:55', '2024-06-13 06:16:47', 63),
(15, '1 bulan', 5, 35, 53, '2024-06-13 06:17:09', '2024-06-13 06:17:05', 105);

-- --------------------------------------------------------

--
-- Table structure for table `child_schedule`
--

CREATE TABLE `child_schedule` (
  `id_child_schedule` int NOT NULL,
  `id_child` int NOT NULL,
  `id_schedule` int NOT NULL,
  `status` enum('sudah','belum') NOT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `child_schedule`
--

INSERT INTO `child_schedule` (`id_child_schedule`, `id_child`, `id_schedule`, `status`, `updated_at`, `created_at`) VALUES
(69, 62, 207, 'belum', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 62, 208, 'belum', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 62, 209, 'belum', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 63, 207, 'belum', '2024-06-08 08:07:33', '0000-00-00 00:00:00'),
(77, 63, 208, 'belum', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 63, 209, 'belum', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 62, 206, 'belum', '2024-06-08 05:39:25', '0000-00-00 00:00:00'),
(84, 63, 206, 'belum', '2024-06-08 05:35:56', '0000-00-00 00:00:00'),
(92, 105, 206, 'belum', '2024-06-08 12:07:20', '2024-06-08 17:27:19'),
(93, 105, 207, 'belum', '2024-06-08 17:27:19', '2024-06-08 17:27:19'),
(94, 105, 208, 'belum', '2024-06-08 17:27:19', '2024-06-08 17:27:19'),
(95, 105, 209, 'belum', '2024-06-08 17:27:19', '2024-06-08 17:27:19'),
(96, 105, 214, 'belum', '2024-06-08 17:27:19', '2024-06-08 17:27:19');

-- --------------------------------------------------------

--
-- Table structure for table `history_imunization`
--

CREATE TABLE `history_imunization` (
  `id_history` int NOT NULL,
  `immunization_date` date NOT NULL,
  `id_child` int NOT NULL,
  `id_schedule` int NOT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `history_imunization`
--

INSERT INTO `history_imunization` (`id_history`, `immunization_date`, `id_child`, `id_schedule`, `updated_at`, `created_at`) VALUES
(25, '2024-06-01', 105, 206, '2024-06-08 10:41:17', '2024-06-08 10:41:17'),
(26, '2024-06-01', 105, 206, '2024-06-08 12:07:20', '2024-06-08 12:07:20');

-- --------------------------------------------------------

--
-- Table structure for table `immunization_schedule`
--

CREATE TABLE `immunization_schedule` (
  `id_schedule` int NOT NULL,
  `year` int NOT NULL,
  `month` int NOT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  `id_admin` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `immunization_schedule`
--

INSERT INTO `immunization_schedule` (`id_schedule`, `year`, `month`, `updated_at`, `created_at`, `id_admin`) VALUES
(206, 0, 1, '2024-06-15 06:00:29', '2024-06-03 09:00:49', 1),
(207, 0, 3, '2024-06-13 06:26:57', '2024-06-03 09:03:20', 1),
(208, 0, 4, '2024-06-03 09:04:48', '2024-06-03 09:04:33', 1),
(209, 0, 6, '2024-06-13 06:09:54', '2024-06-03 09:06:10', 1),
(214, 0, 2, '2024-06-08 08:33:31', '2024-06-08 08:33:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `information_vaccine`
--

CREATE TABLE `information_vaccine` (
  `id_information` int NOT NULL,
  `heading` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `id_admin` int NOT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `information_vaccine`
--

INSERT INTO `information_vaccine` (`id_information`, `heading`, `body`, `id_admin`, `updated_at`, `created_at`) VALUES
(3, 'Polio', 'Untuk mencegah penyakit polio, pemberian vaksin polio dapat dilakukan secara oral (Oral Poliovirus Vaccine/OPV) dan suntikan (Inactive Poliovirus Vaccine/IPV). Bayi mendapatkan imunisasi polio tipeOPV ketika ia baru lahir sampai usia 1 bulan.\r\n\r\nKemudian, pengulangan dilakukan setiap bulan, yaitu usia 2, 3, dan 4 bulan.Pengulangan diberikan secara OPV atau IPV bersamaan dengan vaksin DPT. Pemberian secara IPV minimal dua kali sebelum berumur 1 tahun.', 1, '2024-05-24 09:11:02', '0000-00-00 00:00:00'),
(4, 'BCG', '<p>Imunisasi BCG berfungsi untuk mencegah penyakit tuberkulosis (TBC). Jadwal imunisasi BCG hanya satu kali, yaitu segera setelah lahir atau sebelum bayi berusia 1 bulan.</p><p><br>Jika imunisasi BCG tidak dapat diberikan setelah waktu tersebut, pemberiannya harus segera sebelum terpapar infeksi.</p>', 1, '2024-06-15 09:57:36', '0000-00-00 00:00:00'),
(6, 'Dengue', 'Imunisasi dengue berfungsi untuk mencegah penyakit demam berdarah. Menurut IDAI, pemberian imunisasi dengue sesuai jadwal adalah saat si Kecil berusia 9-16 tahun dengan 3 dosis interval masing-masing 6 bulan. Pada usia ini, anak mendapatkan vaksin chimeric yellow fever dengue (CYD).\r\n\r\n\r\n\r\nNamun, vaksin ini diberikan pada anak yang pernah didiagnosis dengue dan dikonfirmasi dengan deteksi antigen (rapid dengue tes NS-1 atau PCR ELISA) atau IgM anti-dengue.link Jika tak ada konfirmasi tersebut, dapat dilakukan pemeriksaan serologi IgG dengue untuk mengetahui apakah anak pernah terinfeksi dengue sebelumnya. Sementara vaksin TAK-003 (backbone DEN-2) dapat diberikan pada anak yang memiliki anti\r\n\r\nbodi atau kekebalan terhadap dengue (seropositif) maupun yang tidak memiliki antibodi dengue (seronegatif).Pemberian vaksin TAK-003 (backbone DEN-2) dengue mulai dari usia 6 sampai 45 tahun dengan 2 dosis interval 3 bulan. Untuk mendapatkan informasi lebih lanjut tentang urutan atau agenda imunisasi bayi atau anak Anda, konsultasikan langsung kepada dokter anak.', 1, '2024-06-01 11:33:33', '2024-05-24 07:59:49'),
(27, 'Sinovac', 'Vaksin CoronaVac atau lebih sering disebut vaksin Sinovac adalah sebuah vaksin COVID-19 yang berasal dari virus yang telah dimatikan (inactivated virus).\r\n\r\nMateri genetik virus yang telah dihancurkan tidak bisa membuatnya memperbanyak diri. Akan tetapi, sisa-sisa virus ini tetap bisa mendorong sistem imun untuk membentuk kekebalan terhadap infeksi.\r\n\r\nVaksin Sinovac direkomendasikan untuk anak-anak, remaja, dewasa, dan lansia. Dosis vaksin 0,5 ml akan diberikan sebanyak dua kali dengan interval 14–28 hari setelah dosis pertama.\r\n\r\nBeberapa efek samping paling umum dari vaksin COVID-19 ini antara lain sakit kepala, nyeri pada daerah suntikan, dan keletihan.', 1, '2024-05-24 12:23:22', '2024-05-24 12:23:22'),
(28, 'AstraZeneca', 'Vaksin AstraZeneca yang dikembangkan oleh Universitas Oxford dan AstraZeneca merupakan vaksin COVID-19 bertipe vektor adenovirus non-replikasi (non-replicated viral vector).\r\n\r\nMateri genetik SARS-CoV-2 akan dikemas dalam virus lain (umumnya adenovirus penyebab flu) untuk menghasilkan antigen dan memicu respons kekebalan tubuh.\r\n\r\nJenis vaksin COVID-19 yang umum digunakan di Indonesia ini diberikan dalam dosis 0,5 ml sebanyak dua kali dengan interval 8–12 minggu setelah dosis pertama.\r\n\r\nEfek samping umum yang dirasakan setelah pemberian vaksin AstraZeneca di antaranya nyeri pada area suntikan, keletihan, meriang, sakit kepala, mual, muntah, nyeri otot, dan nyeri sendi.', 1, '2024-05-24 12:23:22', '2024-05-24 12:23:22'),
(29, 'Moderna', 'BPOM juga menyetujui penggunaan vaksin COVID-19 Moderna dari ModernaTX, Inc. berbasis messenger RNA (mRNA) untuk diberikan kepada masyarakat Indonesia.\r\n\r\nJenis vaksin dengan platform mRNA ini berisikan materi genetik virus yang memberikan instruksi kepada sel untuk memproduksi antigen SARS-CoV-2 sehingga tubuh membentuk respons imun.\r\n\r\nVaksin Moderna diberikan untuk orang berusia 18 tahun atau lebih. Dosis 0,5 ml akan diberikan sebanyak dua kali dengan interval 28 hari setelah dosis pertama.\r\n\r\nAdapun, efek samping yang umum dari vaksin COVID-19 ini meliputi pusing, mual, muntah, nyeri otot, nyeri sendi, keletihan, meriang, demam, dan sakit pada area suntikan.', 1, '2024-05-24 12:23:22', '2024-05-24 12:23:22'),
(30, 'Sinopharm', 'Vaksin Sinopharm yang dikembangkan oleh Beijing Institute of Biological Products Co., Ltd juga telah mendapatkan emergency use authorization (EUA) dari BPOM.\r\n\r\nSalah satu pilihan vaksinasi COVID-19 di Indonesia ini menggunakan platform inactivated virus untuk menstimulasi sistem kekebalan tubuh tanpa risiko menyebabkan penyakit.\r\n\r\nJenis vaksin COVID-19 ini dianjurkan untuk orang berusia 18 tahun atau lebih. Pemberian dosis 0,5 ml dilakukan sebanyak dua kali dengan interval 21–28 hari setelah dosis pertama.\r\n\r\nEfek samping vaksin Sinopharm mungkin hanya memicu sakit kepala. Namun, sebagian orang bisa merasakan gejala demam, keletihan, mual, diare, nyeri otot, dan nyeri sendi.', 1, '2024-05-24 12:23:22', '2024-05-24 12:23:22'),
(31, 'Pfizer', 'Selain Moderna, BPOM juga telah menyetujui vaksin Pfizer yang bertipe mRNA. Jenis vaksin ini dinilai memiliki tingkat efektivitas (efikasi) lebih tinggi, yakni di atas 90 persen.\r\n\r\nVakin COVID-19 yang diproduksi Pfizer and BioNTech ini bekerja dengan cara menginstruksikan sel untuk memproduksi antigen SARS-CoV-2. Cara ini akan merangsang respons kekebalan tubuh terhadap virus.\r\n\r\nOrang berusia 16 tahun atau lebih bisa menerima vaksin Pfizer. Adapun, dosis yang diberikan sebanyak dua kali dengan interval 21–28 hari setelah dosis pertama. \r\n\r\nEfek samping vaksin Pfizer di antaranya sakit kepala, nyeri pada area suntikan, nyeri otot, dan nyeri sendi. Gejala demam lebih sering terjadi setelah dosis kedua.', 1, '2024-05-24 12:23:22', '2024-05-24 12:23:22'),
(32, 'Novavax', 'BPOM telah menyetujui vaksin Covovax, merek dagang lain dari vaksin Novavax yang dibuat oleh Serum Institute of India Pvt. Ltd. yang menggunakan platform sub-unit protein.\r\n\r\nJenis vaksin COVID-19 bertipe sub-unit protein menggunakan protein coronavirus penyebab COVID-19 (SARS-CoV-2) yang diisolasi dan dimurnikan untuk memicu respons imun.\r\n\r\nDosis vaksin ini diberikan dua kali dengan interval 21 hari setelah dosis pertama. Akan tetapi, vaksin ini tidak memperoleh persetujuan Majelis Ulama Indonesia (MUI) terkait kehalalannya.', 1, '2024-05-24 12:24:01', '2024-05-24 12:24:01'),
(42, 'tes1', '<ol><li>sdad</li><li>jkh</li><li>hjg</li></ol><h2>&nbsp;</h2><p><a href=\"https://www.youtube.com/watch?v=S-EdgYINbfU&amp;t=913s\">link</a></p><p>BPOM telah menyetujui vaksin Covovax, merek dagang lain dari vaksin Novavax yang dibuat oleh Serum Institute of India Pvt. Ltd. yang menggunakan platform sub-unit protein. Jenis vaksin COVID-19 bertipe sub-unit protein menggunakan protein coronavirus penyebab COVID-19 (SARS-CoV-2) yang diisolasi dan dimurnikan untuk memicu respons imun. Dosis vaksin ini diberikan dua kali dengan interval 21 hari setelah dosis pertama. Akan tetapi, vaksin ini tidak memperoleh persetujuan Majelis Ulama Indonesia (MUI) terkait kehalalannya.</p><p>&nbsp;</p><p>Vaksin AstraZeneca yang dikembangkan oleh Universitas Oxford dan AstraZeneca merupakan vaksin COVID-19 bertipe vektor adenovirus non-replikasi (non-replicated viral vector). Materi genetik SARS-CoV-2 akan dikemas dalam virus lain (umumnya adenovirus penyebab flu) untuk menghasilkan antigen dan memicu respons kekebalan tubuh. Jenis vaksin COVID-19 yang umum digunakan di Indonesia ini diberikan dalam dosis 0,5 ml sebanyak dua kali dengan interval 8–12 minggu setelah dosis pertama. Efek samping umum yang dirasakan setelah pemberian vaksin AstraZeneca di antaranya nyeri pada area suntikan, keletihan, meriang, sakit kepala, mual, muntah, nyeri otot, dan nyeri sendi.</p>', 1, '2024-06-15 10:21:41', '2024-06-15 10:19:49');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id_parent` int NOT NULL,
  `email` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `username` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no_wa` varchar(225) NOT NULL,
  `otp` int DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`id_parent`, `email`, `username`, `password`, `no_wa`, `otp`, `updated_at`, `created_at`) VALUES
(39, 'mafiffudin28@gmail.com', 'pipu', '$2y$12$lUkOrf54JuTbaJ0khytd8u4mHF9.Yz4P1ChTMcgl0L8/BMczneTte', 'eyJpdiI6Im5yaXJVdWsxL1YyQkNJS2JFSFpxeHc9PSIsInZhbHVlIjoiU21rb2FpeXdEVHAyeTZOaGxCaEwrdz09IiwibWFjIjoiODhlZDE2NWNjNWM2ZTk3OGEwYjIyZDQxNzFiYTMxYTk4MmRhZmNmNmVjZTc3MWExNzNiOWY2MWVlOTgwYzRjZCIsInRhZyI6IiJ9', 144933, '2024-06-17 02:17:08', '2024-05-27 09:45:59');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vaccines`
--

CREATE TABLE `vaccines` (
  `id_vaccine` int NOT NULL,
  `type_vaccine` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_schedule` int NOT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vaccines`
--

INSERT INTO `vaccines` (`id_vaccine`, `type_vaccine`, `id_schedule`, `updated_at`, `created_at`) VALUES
(122, 'rotavirus', 206, '2024-06-03 09:02:04', '2024-06-03 09:02:04'),
(124, 'DPT-HiB 2', 207, '2024-06-03 09:03:20', '2024-06-03 09:03:20'),
(125, 'polio 2', 207, '2024-06-03 09:03:20', '2024-06-03 09:03:20'),
(126, 'hepatitis B 3', 207, '2024-06-03 09:03:20', '2024-06-03 09:03:20'),
(127, 'DPT-HiB 3', 208, '2024-06-03 09:04:33', '2024-06-03 09:04:33'),
(128, 'polio 3 (IPV atau polio suntik)', 208, '2024-06-03 09:04:33', '2024-06-03 09:04:33'),
(129, 'hepatitis B 4', 208, '2024-06-03 09:04:33', '2024-06-03 09:04:33'),
(130, 'rotavirus 2', 208, '2024-06-03 09:04:33', '2024-06-03 09:04:33'),
(140, 'Hepatitis B', 214, '2024-06-08 08:33:31', '2024-06-08 08:33:31'),
(142, 'Rotavirus', 214, '2024-06-08 08:33:31', '2024-06-08 08:33:31'),
(153, 'HIV', 206, '2024-06-12 12:44:00', '2024-06-12 12:44:00'),
(166, 'Hepatitis B', 209, '2024-06-13 06:09:51', '2024-06-13 06:09:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `child`
--
ALTER TABLE `child`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_parent` (`id_parent`);

--
-- Indexes for table `child_growth`
--
ALTER TABLE `child_growth`
  ADD PRIMARY KEY (`Id_growth`),
  ADD KEY `id_child` (`id_child`);

--
-- Indexes for table `child_schedule`
--
ALTER TABLE `child_schedule`
  ADD PRIMARY KEY (`id_child_schedule`),
  ADD KEY `id_child` (`id_child`,`id_schedule`),
  ADD KEY `id_schedule` (`id_schedule`);

--
-- Indexes for table `history_imunization`
--
ALTER TABLE `history_imunization`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `id_child` (`id_child`,`id_schedule`),
  ADD KEY `id_schedule` (`id_schedule`);

--
-- Indexes for table `immunization_schedule`
--
ALTER TABLE `immunization_schedule`
  ADD PRIMARY KEY (`id_schedule`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `information_vaccine`
--
ALTER TABLE `information_vaccine`
  ADD PRIMARY KEY (`id_information`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id_parent`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `vaccines`
--
ALTER TABLE `vaccines`
  ADD PRIMARY KEY (`id_vaccine`),
  ADD KEY `id_schedule` (`id_schedule`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `child`
--
ALTER TABLE `child`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `child_growth`
--
ALTER TABLE `child_growth`
  MODIFY `Id_growth` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `child_schedule`
--
ALTER TABLE `child_schedule`
  MODIFY `id_child_schedule` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=294;

--
-- AUTO_INCREMENT for table `history_imunization`
--
ALTER TABLE `history_imunization`
  MODIFY `id_history` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `immunization_schedule`
--
ALTER TABLE `immunization_schedule`
  MODIFY `id_schedule` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT for table `information_vaccine`
--
ALTER TABLE `information_vaccine`
  MODIFY `id_information` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id_parent` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vaccines`
--
ALTER TABLE `vaccines`
  MODIFY `id_vaccine` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `child`
--
ALTER TABLE `child`
  ADD CONSTRAINT `child_ibfk_1` FOREIGN KEY (`id_parent`) REFERENCES `parents` (`id_parent`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `child_growth`
--
ALTER TABLE `child_growth`
  ADD CONSTRAINT `child_growth_ibfk_1` FOREIGN KEY (`id_child`) REFERENCES `child` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `child_schedule`
--
ALTER TABLE `child_schedule`
  ADD CONSTRAINT `child_schedule_ibfk_1` FOREIGN KEY (`id_child`) REFERENCES `child` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `child_schedule_ibfk_2` FOREIGN KEY (`id_schedule`) REFERENCES `immunization_schedule` (`id_schedule`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `history_imunization`
--
ALTER TABLE `history_imunization`
  ADD CONSTRAINT `history_imunization_ibfk_1` FOREIGN KEY (`id_child`) REFERENCES `child` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `history_imunization_ibfk_2` FOREIGN KEY (`id_schedule`) REFERENCES `immunization_schedule` (`id_schedule`) ON UPDATE CASCADE;

--
-- Constraints for table `immunization_schedule`
--
ALTER TABLE `immunization_schedule`
  ADD CONSTRAINT `immunization_schedule_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `information_vaccine`
--
ALTER TABLE `information_vaccine`
  ADD CONSTRAINT `information_vaccine_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vaccines`
--
ALTER TABLE `vaccines`
  ADD CONSTRAINT `vaccines_ibfk_1` FOREIGN KEY (`id_schedule`) REFERENCES `immunization_schedule` (`id_schedule`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
