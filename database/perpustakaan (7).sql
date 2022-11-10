-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2022 at 03:10 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(10) UNSIGNED NOT NULL,
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `kode_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isbn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sinopsis` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal` enum('pembelian','sumbangan','denda') COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `id_kategori`, `kode_buku`, `judul`, `pengarang`, `tahun_terbit`, `penerbit`, `isbn`, `stok`, `lokasi`, `sinopsis`, `last_code`, `asal`, `gambar`, `created_at`, `updated_at`) VALUES
(3, 3, 'Tek-3487', 'Pemrograman Dasar BID TKI Kelas X', 'Andi Novianto', 2014, 'Erlangga', '979-794-390-9', 155, 'AD1', 'Buku Pemrograman Dasar untuk SMK/MAK kelas X ini disusun dengan mengacu pada Kurikulum 2013 KI KD 2018. Dengan mempelajari buku ini, peserta didik diharapkan dapat menerapkan ilmu berupa keterampilan aplikatif. Adapun fitur-fitur yang disajikan untuk mendukung penyusunan buku ini adalah sebagai berikut.\r\nPendahuluan, berisi pengenalan serta ringkasan tentang topik yang akan diulas guna menstimulus dan memotivasi peserta didik mendalami materi lebih lanjut.\r\nInfo TIK, berisi info tambahan ringkas seputar topik yang sedang dibahas.\r\nZona Aktivitas, berisi tiga kegiatan yang dilakukan peserta didik, yaitu Uji Pengetahuan, Tugas Praktikum, dan Tugas Eksperimen yang membantu peserta didik mendalami pemahaman terhadap konsep yang dipelajari.\r\nContoh, berisi penyelesaian bentuk-bentuk soal yang berkaitan dengan materi yang sedang dipelajari.\r\nArti Kata, berisi pengertian dari kata-kata asing seputar materi yang dibahas.\r\nRangkuman, berisi ulasan singkat tentang materi yang diberikan untuk men', '1', 'pembelian', '6350295a41731.jpg', '2022-10-19 08:44:10', '2022-10-25 17:00:32'),
(4, 3, 'Tek-7078', 'Photoshop Mengolah Foto biasa Menjadi Wah', 'Asep Effendhy', 2013, 'Media Kita', '978-979-780-348-3', 1, 'AD2', 'Kadang kita sering kurang puas dengan foto yang kita jepret. Entah karena warna yang terasa flat, kurang dramatis, kurang tajam, dan lain-lain. Nah, bagaimana untuk membuatnya lebih bagus? Tentu saja dengan meracik ulang foto tersebut.\r\n\r\nBuku ini menjelaskan mulai dari pemahaman warna, sampai mengolah foto seperti mempertajam gambar, menghapus efek red eye, sampai meningkatkan detail gambar. Dengan pemahaman dasar dan praktik langsung tersebut, Anda dapat mengutak-atik foto menjadi lebih wah dengan cepat dan tentu saja, sesuai selera Anda.', '1', 'pembelian', '635029c4963c5.jpg', '2022-10-19 08:45:56', '2022-10-25 17:01:59'),
(5, 3, 'Tek-1812', 'Membasmi Virus Komputer Tak Perlu Printer', 'Putu Hadi', 2010, 'Gagas Media', '978-602-444-558-4', 1, 'AD2', 'Tiba-tiba komputer melambat. File yang kemarin bisa dibuka, sekarang tidak bisa dibuka lagi. Hati-hati, bisa jadi itu ulah si virus. Jangan didiamkan, karena virus akan terus berkembang biak dan memperparah kerusakan komputer.\r\n\r\nBuku ini mengajak kita berkenalan dengan beragam kriteria virus, belajar mengenali tanda-tanda kerusakan yang disebabkan oleh mereka, dan mendeteksi bagaimana cara kerja mereka di dalam komputer. Lalu, jangan ragu lagi, basmi saja sekarang!\r\n\r\nMembasminya, bisa tanpa antivirus atau langsung menggunakan antivirus. Nggak rumit, kok, karena di sini semua dijelaskan tahap demi tahap dan kamu tinggal mengikutinya. Kalau sudah bersih, rajin-rajinlah update antivirus dan mem-back up data. Buku ini juga dilengkapi daftar alamat website untuk meng-update antivirus.\r\nNggak perlu nunggu genius untuk membasmi virus.', '1', 'pembelian', '63502a2aa9491.jpg', '2022-10-19 08:47:38', '2022-10-25 17:04:32'),
(6, 3, 'Tek-5534', 'Teknologi Layanan Jaringan Kelas XI SMK', 'M Rizal', 2019, 'Bumi Aksara', '-', 21, 'AD1', 'Perkembangan dunia komputer menjadikan informasi merupakan hal yang sangat berharga dalam komputer. Setiap saat dibutuhkan pemindahan informasi dari satu tempat ke tempat yang lain. Hal ini dikenal dengan komunikasi data. Data akan ditransmisikan dari satu tempat ke tempat yang lain yang membutuhkan. Selain itu, komunikasi data berkaitan dengan pengiriman sinyal yang handal dan efisien melalui kanal komunikasi. Hal-hal tersebut mendorong akan pemahaman terhadap komunikasi data dan keterampilan dalam membangun berbagai arsitektur komunikasi data sangat dibutuhkan sejalan dengan kebutuhan teknologi informasi dan komunikasi.', '1', 'pembelian', '63502a8135ead.jpg', '2022-10-19 08:49:05', '2022-10-24 00:09:35'),
(7, 3, 'Tek-5979', 'Administrasi Infra Struktur Jaringan Kelas XI SMK TKJ', 'Andi Novianto', 2019, 'Erlangga', '978-602-486-545-0', 20, 'AD1', 'Administrasi Infrastruktur Jaringan kelas 11 adalah materi yang mempelajari tentang mengatur, mengkonfigurasi dan memanajemen perangkat jaringan beserta layanan-layanan jaringan menggunakan sistem operasi khusus jaringan seperti RoS dan switch OS. Pada umumnya, administrasi Infrastruktur jaringan ini di tangani oleh peralatan jaringan seperti Router dengan banyak layanan atau service yang ditujukan untuk melayani pengguna, seperti layanan internet, VLAN,routing,firewall dan lain-lain.', '1', 'pembelian', '63502b268f3f9.jpg', '2022-10-19 08:51:50', '2022-10-24 00:11:34'),
(8, 2, 'sej-7565', 'Sejarah Indonesia Smk/MA/SMK/MAK Kelas X', 'Ratna Hapsari, M Adil', 2014, 'Erlangga', '-', 28, 'AD3', 'alam K 13 ini diharapkan siswa tidak hanya menghafal, tetapi juga mampu melakukan penulisan dan mendiskripsikan setiap peristiwa sejarah yang terjadi. Selain itu, siswa diharapkan dapat mengaitkan berbagai peristiwa di daerahnya dengan peristiwa yang terjadi tingkat nasional maupun global. Oleh karena itu kemampuan melakukan analisis berbagai peristiwa sejarah sangat diperlukan.\r\n\r\nUntuk itu siswa diwajibkan selain membaca buku ini, juga harus mencari sumber-sumber rujukan lain yang relevan. Dengan mempelajari sejarah, diharapkan siswa bisa mengambil nilai-nilai setiap peristiwa sejarah yang terjadi untuk memperkuat rasa cinta tanah air, bangga dan meningkatkan nasionalisme.', '1', 'sumbangan', '63502bc90d924.jpg', '2022-10-19 08:54:33', '2022-10-25 21:23:51'),
(9, 2, 'sej-5909', 'Sejarah Indonesia SMK/MA/SMK/MAK Kelas XI', 'Ratna Hapsari, M Adil', 2013, 'Erlangga', '-', 1, 'AD3', 'alam K 13 ini diharapkan siswa tidak hanya menghafal, tetapi juga mampu melakukan penulisan dan mendiskripsikan setiap peristiwa sejarah yang terjadi. Selain itu, siswa diharapkan dapat mengaitkan berbagai peristiwa di daerahnya dengan peristiwa yang terjadi tingkat nasional maupun global. Oleh karena itu kemampuan melakukan analisis berbagai peristiwa sejarah sangat diperlukan.\r\n\r\nUntuk itu siswa diwajibkan selain membaca buku ini, juga harus mencari sumber-sumber rujukan lain yang relevan. Dengan mempelajari sejarah, diharapkan siswa bisa mengambil nilai-nilai setiap peristiwa sejarah yang terjadi untuk memperkuat rasa cinta tanah air, bangga dan meningkatkan nasionalisme.', '1', 'pembelian', '63502c541c689.jpg', '2022-10-19 08:56:52', '2022-10-24 00:12:43'),
(10, 6, 'Ola-7741', 'Pendidikan Jasmani Olahraga Dan Kesehatan Sma,Ma,Smk,Mak  Kelas XI', 'Kemdikbud', 2017, 'Kemdikbud', '-', 76, 'AD5', 'Pembelajaran Pendidikan Jasmani, Olahraga dan Kesehatan (PJOK) untuk Kelas XI SMA/ SMK yang disajikan dalam dan juga bukan materi pembelajaran yang dirancang hanya untuk mengasah kompetensi keterampilan olahraga peserta didik. PJOK adalah mata pelajaran yang membekali peserta didik dengan kemampuan untuk memiliki kebugaran dan keterampilan jasmani yang bermanfaat dalam kehidupan sehari-hari. Memiliki tujuan supaya peserta didik dapat memperoleh perubahan perilaku gerak, perilaku berolahraga dan perilaku sehat.Pada akhirnya aktivitas jasmani dibarengi dengan sikap yang sesuai sehingga hasil yang diperoleh adalah optimal. Pembelajarannya dirancang berbasis aktivitas terkait dengan sejumlah jenis gerak jasmani/ olahraga dan usaha-usaha menjaga kesehatan yang sesuai untuk peserta didik Kelas XI SMA/ SMK. Aktivitas-aktivitas tersebut dirancang untuk membuat peserta didik terbiasa melakukan gerak jasmani dan berolahraga dengan senang hati karena merasa perlu melakukannya dan sadar akan penti', '1', 'pembelian', '63502d3cb3052.jpg', '2022-10-19 09:00:44', '2022-10-24 00:13:54'),
(11, 6, 'Ola-7982', 'Matematika Smk/Ma/Mak Kelas XI', 'Yuliatun Alisyah', 2017, 'Bumi Aksara', '-', 8, 'AD6', 'Matematika adalah hasil abstraksi (pemikiran) manusia terhadap objek-objek di sekitar kita dan menyelesaikan masalah yang terjadi dalam kehidupan, sehingga dalam mempelajarinya kamu harus memikirkannya kembali, bagaimana pemikiran para penciptanya terdahulu. Belajar matematika sangat berguna bagi kehidupan. Cobalah membaca dan pahami materinya serta terapkan untuk menyelesaikan masalah-masalah kehidupan di lingkunganmu. Kamu punya kemampuan, kami yakin kamu pasti bisa melakukannya.\r\n\r\nBuku ini diawali dengan pengajuan masalah yang bersumber dari fakta dan lingkungan budaya siswa terkait dengan materi yang akan diajarkan. Tujuannya agar kamu mampu menemukan konsep dan prinsip matematika melalui pemecahan masalah yang diajukan dan mendalami sifat-sifat yang terkandung di dalamnya yang sangat berguna untuk memecahkan masalah kehidupan. Tentu, penemuan konsep dan prinsip matematika tersebut dilakukan oleh kamu dan teman-teman dalam kelompok belajar dengan bimbingan guru. Coba lakukan tugas', '1', 'pembelian', '63502dd80fd56.jpg', '2022-10-19 09:03:20', '2022-10-24 00:15:20'),
(12, 4, 'Bah-3836', 'Bahasa Indonesia Ekspresi Diri Dan Akademik Kelas XII Semester 2  SMA,MA,MAK,SMK', 'Kemdikbud', 2015, 'Kemdikbud', '-', 129, 'AD6', 'Buku Bahasa Indonesia Kelas XII ini menjabarkan usaha minimal yang harus dilakukan siswa untuk mencapai kompetensi yang diharapkan. Sesuai dengan pendekatan yang digunakan dalam Kurikulum 2013, siswa diajak untuk berani mencari sumber belajar lain yang tersedia dan terbentang luas di sekitarnya. Peran guru dalam meningkatkan dan menyesuaikan daya serap siswa dengan ketersediaan kegiatan pada buku ini sangat penting. Guru dapat memperkayanya dengan kreasi dalam bentuk kegiatan-kegiatan lain yang sesuai dan relevan yang bersumber dari lingkungan sosial dan alam.\r\n\r\nSebagai edisi pertama, buku ini sangat terbuka terhadap masukan dan akan terus diperbaiki untuk penyempurnaan. Oleh karena itu, kami mengundang para pembaca memberikan kritik, saran dan masukan untuk iv Kelas XII Semester 1 perbaikan dan penyempurnaan pada edisi berikutnya. Atas kontribusi tersebut, kami mengucapkan terima kasih.', '1', 'sumbangan', '63502ec0efc2c.jpg', '2022-10-19 09:07:13', '2022-10-24 00:16:18'),
(13, 4, 'Bah-8266', 'Produktif Berbahasa Indonesia 2 Kelas XI SMK', 'Yustinah', 2019, 'Erlangga', '-', 32, 'AD6', 'Buku Produktif Berbahasa Indonesia untuk SMK/MAK disusun berdasarkan Kurikulum 2013 (KI-KD 2017). Buku ini menekankan pada pembentukan aspek penguasaan pengetahuan, keterampilan, dan sikap secara utuh. Materi pembelajaran disajikan secara tematik dan integratif dengan menggunakan pendekatan saintifik melalui pembelajaran (1) pembangunan teks dan pemodelan, (2) pembangunan teks bersama, dan (3) pembangunan teks mandiri. Ketiga pembelajaran ini menggambarkan alur mengamati, mempertanyakan, mengeksplorasi, mengasosiasikan, dan mengomunikasikan.', '1', 'pembelian', '63502fab4e10e.jpg', '2022-10-19 09:11:07', '2022-10-24 00:18:32'),
(14, 1, 'Mat-3864', 'Matematika Untuk Smk/Mak Kelas X (1)', 'Hendi Senja Gumilar', 2016, 'Erlangga', '-', 2, 'AD5', 'Buku ini diawali dengan pengajuan masalah yang bersumber dari fakta dan lingkungan budaya siswa terkait dengan materi yang akan diajarkan. Tujuannya agar kamu mampu menemukan konsep dan prinsip matematika melalui pemecahan masalah yang diajukan dan mendalami sifat-sifat yang terkandung di dalamnya yang sangat berguna untuk memecahkan masalah kehidupan.\r\n\r\nTentu, penemuan konsep dan prinsip matematika tersebut dilakukan oleh kamu dan teman-teman dalam kelompok belajar dengan bimbingan guru. Coba lakukan tugasmu, mulailah berpikir, bertanya, berdiskusi, berdebat dengan orang/teman yang lebih memahami masalah. Ingat …!!!, tidak ada hasil tanpa usaha dan perbuatan. Asahlah pemahaman kamu dengan memecahkan masalah dan tugas yang tersedia. Di sana ada masalah otentik/nyata dan teka-teki untuk memampukan kamu berpikir logis, cermat, jujur dan tangguh menghadapi masalah.\r\n\r\nTerapkan pengetahuan yang telah kamu miliki, cermati apa yang diketahui, apa yang ditanyakan, konsep dan rumus mana yang ', '2', 'sumbangan', '6350328bbbf43.jpg', '2022-10-19 09:23:23', '2022-10-25 21:54:52');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Matematika', '2022-10-05 01:09:38', '2022-10-05 01:09:38'),
(2, 'sejarah', '2022-10-05 01:09:44', '2022-10-05 01:09:44'),
(3, 'Teknologi', '2022-10-05 01:45:36', '2022-10-05 01:45:36'),
(4, 'Bahasa Indonesia', '2022-10-05 01:45:41', '2022-10-19 09:05:39'),
(5, 'Masakan', '2022-10-05 01:45:50', '2022-10-05 01:45:50'),
(6, 'Olahraga', '2022-10-05 01:45:58', '2022-10-05 01:45:58');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(10) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_buku` int(10) UNSIGNED NOT NULL,
  `jml_hari` int(11) NOT NULL,
  `jml_buku` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(10) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nomor_induk` int(11) NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `id_user`, `nomor_induk`, `kelas`, `alamat`, `no_hp`, `created_at`, `updated_at`) VALUES
(4, 5, 1032936786, 'tkj 1', 'makassar', '04837437', '2022-10-06 13:48:05', '2022-10-06 13:48:05'),
(5, 7, 1032936787, 'X RPL 1', 'Jl. Ir. Sutami', '62895373885450', '2022-10-07 01:20:42', '2022-10-09 23:42:31'),
(6, 8, 647009778, 'XI TKJ', 'Binanga Polo', '+621242848413', '2022-10-19 09:26:35', '2022-10-19 09:26:35'),
(7, 9, 2147483647, 'XII TKJ', 'Toli-toli', '+627828803658', '2022-10-19 09:27:25', '2022-10-19 09:27:25'),
(8, 10, 74620152, 'XII TKJ', 'Motaha-Andoolo', '+621242648191', '2022-10-19 09:28:16', '2022-10-19 09:28:16'),
(9, 11, 51271634, 'X Akuntansi', 'Sela', '6281342146188', '2022-10-19 09:29:26', '2022-10-19 09:29:26'),
(10, 12, 2147483647, 'XI  Akuntansi', 'Perumahan Griya Jagong Permai Blok A/05', '6285242642950', '2022-10-19 09:30:28', '2022-10-19 09:30:28'),
(11, 13, 53673599, 'XII TKJ', 'Jl. Pelelangan Ikan', '6282196808199', '2022-10-19 09:32:57', '2022-10-19 09:32:57'),
(12, 14, 54779830, 'XI  Akuntansi', 'Taraweang', '+62884619088', '2022-10-19 09:34:01', '2022-10-19 09:34:01'),
(13, 15, 63569178, 'X Akuntansi', 'Lomboka', '6281242856609', '2022-10-19 09:35:09', '2022-10-19 09:35:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_11_22_160615_create_users_table', 1),
(2, '2021_11_25_072832_create_profile_table', 1),
(3, '2022_10_06_081825_create_kategori_table', 1),
(4, '2022_10_06_084328_create_buku_table', 1),
(5, '2022_10_06_105225_create_keranjang_table', 1),
(6, '2022_10_06_124727_create_pinjam_table', 1),
(7, '2022_10_07_132030_create_member_table', 1),
(8, '2022_10_07_145128_create_pengunjung_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id_pengunjung` int(10) UNSIGNED NOT NULL,
  `id_member` int(10) UNSIGNED NOT NULL,
  `tgl_berkunjung` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id_pengunjung`, `id_member`, `tgl_berkunjung`, `created_at`, `updated_at`) VALUES
(10, 4, '2022-10-07', '2022-10-06 15:16:20', '2022-10-06 15:16:20'),
(11, 5, '2022-10-08', '2022-10-07 02:05:32', '2022-10-07 02:05:32');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `id_pinjam` int(10) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_buku` int(10) UNSIGNED NOT NULL,
  `jml_hari` int(11) NOT NULL,
  `jml_buku` int(11) NOT NULL,
  `status` enum('blm_diambil','diambil','selesai') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'blm_diambil',
  `segment` int(11) NOT NULL DEFAULT 0,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `last_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`id_pinjam`, `id_user`, `id_buku`, `jml_hari`, `jml_buku`, `status`, `segment`, `tgl_pinjam`, `tgl_kembali`, `last_code`, `created_at`, `updated_at`) VALUES
(22, 7, 3, 1, 1, 'selesai', 2, '2022-10-20', '2022-10-20', '1', '2022-10-19 11:24:11', '2022-10-19 11:31:20'),
(23, 7, 3, 1, 1, 'selesai', 8, '2022-10-24', '2022-10-26', '1', '2022-10-23 21:45:39', '2022-10-25 17:00:33'),
(24, 13, 4, 1, 1, 'selesai', 8, '2022-10-25', '2022-10-26', '1', '2022-10-24 08:27:48', '2022-10-25 17:01:59'),
(25, 11, 5, 1, 1, 'selesai', 6, '2022-10-25', '2022-10-25', '1', '2022-10-24 08:58:39', '2022-10-24 09:03:50'),
(26, 11, 5, 1, 1, 'selesai', 8, '2022-10-25', '2022-10-26', '1', '2022-10-24 09:27:19', '2022-10-25 17:04:32'),
(27, 7, 8, 1, 1, 'selesai', 10, '2022-10-26', '2022-10-26', '1', '2022-10-25 21:20:39', '2022-10-25 21:23:51'),
(28, 7, 14, 1, 1, 'blm_diambil', 11, NULL, NULL, '1', '2022-10-25 21:54:52', '2022-10-25 21:54:52');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id_profile` int(10) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nisn` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ayah` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ayah` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ibu` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `tahun_lulus` year(4) NOT NULL,
  `no_ijazah` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_skhun` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id_profile`, `id_user`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `nisn`, `alamat`, `no_telp`, `nama_ayah`, `pekerjaan_ayah`, `nama_ibu`, `pekerjaan_ibu`, `tahun_masuk`, `tahun_lulus`, `no_ijazah`, `no_skhun`, `created_at`, `updated_at`) VALUES
(1, 1, 'L', 'jl;', '2021-11-26', 'jlkjlj', 'ljlj', 'jl', 'jlj', 'ljl', 'jljl', 'jlkjl', 2000, 2000, 'jlkjlkj', 'lkjl', '2021-11-23 11:34:44', '2021-11-23 11:56:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Administrator','pustakawan','anggota') COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', NULL, '$2y$10$N6nmGrHUtLAw5/5SlPZqEehn.S5KDNDFHf1yuW184mEw5zLWhVeLm', 'Administrator', '61b5cf20cb753.jpg', NULL, '2021-11-23 09:06:43', '2021-12-10 18:29:52'),
(5, 'sam', 'sam@mail.com', NULL, '$2y$10$JqDSaIM2frvGqB92t7vIXeoDoJYzsUK5MKv4cLn9pzHa2BlL0Q6em', 'anggota', '63402ee4cdfcd.jpg', NULL, '2022-10-06 13:48:05', '2022-10-06 13:51:32'),
(6, 'pustakawan', 'pustakawan@mail.com', NULL, '$2y$10$YEdrdLNSvtiGVNyL/zb8tuzaU7faiAsaBVSKhaE3TOBeCqw.QrDK.', 'pustakawan', '', NULL, '2022-10-06 14:48:19', '2022-10-06 14:48:19'),
(7, 'Ratna', 'ratnajalil@gmail.com', NULL, '$2y$10$nx8qwuB/N9KMy8nwgsjYMeUjT38KTL.XAEXCQo3p83h2ioZm1Htgy', 'anggota', '', NULL, '2022-10-07 01:20:42', '2022-10-09 23:42:31'),
(8, 'Abd. Rahman Kahar', 'rahmankahar@mail.com', NULL, '$2y$10$bVCkbN0VeAjp7t62q88Lcup9oDVFv.0tJl.UNs2quYotKDSp4e766', 'anggota', '', NULL, '2022-10-19 09:26:35', '2022-10-19 09:26:35'),
(9, 'Abdul Haris Pratama', 'abdulharis@mail.com', NULL, '$2y$10$iB9R9N1Czs/e.ZJISYJwfO/5VYhS8r2bVZcs5bBQhGzr6Xh3p2c8G', 'anggota', '', NULL, '2022-10-19 09:27:25', '2022-10-19 09:27:25'),
(10, 'Abdul Mushawwir K', 'abdulmushawwir@mail.com', NULL, '$2y$10$a6vo7MHy/z7YBR4uwMWBROSU2uUP9QWm3UODzaPLKDE2Qmnx7Tufq', 'anggota', '', NULL, '2022-10-19 09:28:16', '2022-10-19 09:28:16'),
(11, 'Afrizal', 'afrizal@mail.com', NULL, '$2y$10$3wlYFU5bu/6nDVQ4icMVKulJyxU794hnNPJojqQ0przjWkKLV69vG', 'anggota', '', NULL, '2022-10-19 09:29:26', '2022-10-19 09:29:26'),
(12, 'Afryan Rezky Pratama', 'afryanrezky@mail.com', NULL, '$2y$10$x5atNYt/EKEKMGy2uETH5..9pD9s3kfGAOdcQWlOo65Gp9UoMgcKG', 'anggota', '', NULL, '2022-10-19 09:30:28', '2022-10-19 09:30:28'),
(13, 'Agil', 'agil@mail.com', NULL, '$2y$10$c0FBa/MpkzbKfpMmX1JjfO3I2Bbva8cPAA8pQbibHL9BM/CacqpGK', 'anggota', '', NULL, '2022-10-19 09:32:57', '2022-10-19 09:32:57'),
(14, 'Aliya Repalina', 'aliyarepalina@mail.com', NULL, '$2y$10$ZPCG8QckaWSxwy/3oou7ROz/oNOLTEH0dRF3uOKHB/rRGfx2OOIUe', 'anggota', '', NULL, '2022-10-19 09:34:01', '2022-10-19 09:34:01'),
(15, 'Amriana Aulia Putri', 'amrianaaulia@mail.com', NULL, '$2y$10$4cXIbulgFnXKgaoYQxU2d.MECeWOG0dpm2OHxcsiRJuSXMyGvnf/m', 'anggota', '', NULL, '2022-10-19 09:35:09', '2022-10-19 09:35:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `buku_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `keranjang_id_user_foreign` (`id_user`),
  ADD KEY `keranjang_id_buku_foreign` (`id_buku`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`),
  ADD KEY `member_id_user_foreign` (`id_user`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`),
  ADD KEY `pengunjung_id_member_foreign` (`id_member`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `pinjam_id_user_foreign` (`id_user`),
  ADD KEY `pinjam_id_buku_foreign` (`id_buku`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profile`),
  ADD KEY `profile_id_user_foreign` (`id_user`);

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
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id_pengunjung` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id_pinjam` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_id_buku_foreign` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjang_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD CONSTRAINT `pengunjung_id_member_foreign` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD CONSTRAINT `pinjam_id_buku_foreign` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pinjam_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
