-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2021 at 02:15 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('10b54f9f-3044-4614-a032-0e49456835d7', 'App\\Notifications\\NotifyPengaduan', 'App\\User', 1, '{\"pengaduan\":{\"id\":12,\"nik\":\"3205052111990003\",\"nama\":\"qeqrqrqr\",\"telp\":\"09090909090\",\"email\":\"iswahyudialwi@gmail.com\",\"lat\":null,\"long\":null,\"jenis\":\"Keterangan Jandda\\/Duda\",\"deskripsi\":null,\"img1\":\"img1\\/dQArhm2ZhHIjud0INFqkn7bV0TPiOe5cbaj9CWee.jpg\",\"img2\":null,\"img3\":null,\"img4\":\"FotoKTP\\/UF7604qe7oaWl39H2vRsRWxQNofdyHH3M8St68Cf.jpg\",\"created_at\":\"2021-10-05T17:45:14.000000Z\",\"updated_at\":\"2021-10-05T17:45:14.000000Z\"},\"jenis\":\"Pengaduan\"}', '2021-12-07 14:25:15', '2021-10-05 17:45:14', '2021-12-07 14:25:15'),
('1310cf7b-267e-4749-84d2-82591d466f40', 'App\\Notifications\\NotifyPengaduan', 'App\\User', 1, '{\"pengaduan\":{\"id\":22,\"nik\":\"3205052911990003\",\"nama\":\"qeqrqrqr\",\"telp\":\"09090909090\",\"email\":\"iswahyudialwi@gmail.com\",\"lat\":null,\"long\":null,\"jenis\":\"Domisili\",\"deskripsi\":null,\"img1\":null,\"img2\":null,\"img3\":null,\"img4\":\"FotoKTP\\/PdpFciJheStpCAHxxrMR17frbkTyLxBlRGYNBrcC.jpg\",\"created_at\":\"2021-12-19T15:57:23.000000Z\",\"updated_at\":\"2021-12-19T15:57:23.000000Z\"},\"jenis\":\"Pengaduan\"}', '2021-12-19 16:59:01', '2021-12-19 15:57:24', '2021-12-19 16:59:01'),
('22fbe8db-441a-4707-9e32-69c0d1d176b0', 'App\\Notifications\\NotifyRegister', 'App\\User', 2, '{\"user\":{\"name\":\"alwi\",\"nama_perusahaan\":\"08966453778\",\"email\":\"iswahyudi@gmail.com\",\"status\":\"menunggu\",\"updated_at\":\"2021-12-21T04:04:23.000000Z\",\"created_at\":\"2021-12-21T04:04:23.000000Z\",\"id\":19},\"jenis\":\"Pengguna\"}', NULL, '2021-12-21 04:04:27', '2021-12-21 04:04:27'),
('257c6649-20a5-41c7-b789-56a13b3cde37', 'App\\Notifications\\NotifyPengaduan', 'App\\User', 1, '{\"pengaduan\":{\"id\":18,\"nik\":\"3205052911990003\",\"nama\":\"test\",\"telp\":\"09090909090\",\"email\":\"Nidafazilah07@gmail.com\",\"lat\":null,\"long\":null,\"jenis\":\"Keterangan Jandda\\/Duda\",\"deskripsi\":null,\"img1\":\"img1\\/TCdc3Hwl4doIPE6zaiUelpZmPkgVD93non8pw6vv.jpg\",\"img2\":\"img2\\/65Iv1frQJIHZoxiYvuTIkPlF6M1rp3DPGTvmA2RK.jpg\",\"img3\":\"img3\\/iO4jY2iFZNO8RlE1pBiyXjod3UsEdt51hmR5HxF3.jpg\",\"img4\":\"FotoKTP\\/ETgEZSMMVKzJpxRjAPUZqQc2YFQ1ih0Va60wkiy1.jpg\",\"created_at\":\"2021-12-18T15:33:49.000000Z\",\"updated_at\":\"2021-12-18T15:33:49.000000Z\"},\"jenis\":\"Pengaduan\"}', '2021-12-19 16:59:02', '2021-12-18 15:33:49', '2021-12-19 16:59:02'),
('26c30fba-6139-4ba9-9353-e10692d128c5', 'App\\Notifications\\NotifyPengaduan', 'App\\User', 1, '{\"pengaduan\":{\"id\":20,\"nik\":\"3205052911990003\",\"nama\":\"test\",\"telp\":\"09090909090\",\"email\":\"Nidafazilah07@gmail.com\",\"lat\":null,\"long\":null,\"jenis\":\"Keterangan Jandda\\/Duda\",\"deskripsi\":null,\"img1\":\"img1\\/QCyEISaMA9byvlzf2g5k3FAchxmqs5JaMeMS6ubI.jpg\",\"img2\":null,\"img3\":null,\"img4\":\"FotoKTP\\/pMNdlUpc7BYyz3gsCxFfsq2580h2JFYDe7LOflJu.jpg\",\"created_at\":\"2021-12-19T03:51:36.000000Z\",\"updated_at\":\"2021-12-19T03:51:36.000000Z\"},\"jenis\":\"Pengaduan\"}', '2021-12-19 16:59:02', '2021-12-19 03:51:36', '2021-12-19 16:59:02'),
('27441bc4-9f3f-4671-8f39-f5606b014f9f', 'App\\Notifications\\NotifyRegister', 'App\\User', 2, '{\"user\":{\"name\":\"asep\",\"nama_perusahaan\":\"aseppppp\",\"email\":\"asep@gmail.com\",\"status\":\"menunggu\",\"updated_at\":\"2021-12-19T16:02:25.000000Z\",\"created_at\":\"2021-12-19T16:02:25.000000Z\",\"id\":13},\"jenis\":\"Pengguna\"}', '2021-12-19 16:03:04', '2021-12-19 16:02:28', '2021-12-19 16:03:04'),
('2ada0750-c84e-44f9-a0f4-5d2fa847fad1', 'App\\Notifications\\NotifyPengaduan', 'App\\User', 1, '{\"pengaduan\":{\"id\":9,\"nik\":\"3205052911990003\",\"nama\":\"pol\",\"telp\":\"09090909090\",\"email\":\"alwiiswahyudi@rocketmail.com\",\"lat\":null,\"long\":null,\"jenis\":\"Keterangan Penguburan\",\"deskripsi\":null,\"img1\":\"img1\\/fJDoXKFhVaON38dCDURNO88SnQFHs5gLobiYz6VD.jpg\",\"img2\":null,\"img3\":null,\"img4\":\"FotoKTP\\/WGCdzo9wvQjfoS9hUaUiG6EbEbfbxPS3iLj00uHU.jpg\",\"created_at\":\"2021-10-05T17:33:17.000000Z\",\"updated_at\":\"2021-10-05T17:33:17.000000Z\"},\"jenis\":\"Pengaduan\"}', '2021-12-07 14:25:15', '2021-10-05 17:33:17', '2021-12-07 14:25:15'),
('31834126-8529-4f84-99d6-d201e6e94603', 'App\\Notifications\\NotifyPengaduan', 'App\\User', 1, '{\"pengaduan\":{\"id\":10,\"nik\":\"3205052911990003\",\"nama\":\"test\",\"telp\":\"09090909090\",\"email\":\"Nidafazilah07@gmail.com\",\"lat\":null,\"long\":null,\"jenis\":\"Domisili\",\"deskripsi\":null,\"img1\":\"img1\\/1hMmhkgX7VpVlJyZIig59gWsKUm4rjI1AouCUxME.jpg\",\"img2\":null,\"img3\":null,\"img4\":\"FotoKTP\\/snq1hIZJIJVy09IQ25V163F6KsjHBFCVonVq9ceC.jpg\",\"created_at\":\"2021-10-05T17:38:33.000000Z\",\"updated_at\":\"2021-10-05T17:38:33.000000Z\"},\"jenis\":\"Pengaduan\"}', '2021-12-07 14:25:15', '2021-10-05 17:38:33', '2021-12-07 14:25:15'),
('38e416dd-77b4-47a5-ac32-19d60da3baeb', 'App\\Notifications\\NotifyPengaduan', 'App\\User', 1, '{\"pengaduan\":{\"id\":2,\"nik\":\"3205052911990003\",\"nama\":\"qeqrqrqr\",\"telp\":\"09090909090\",\"email\":\"Nidafazilah02@gmail.com\",\"lat\":\"1212\",\"long\":\"323232\",\"jenis\":\"Pencemaran Air\",\"deskripsi\":\"lkkkkkkkkkkkkkkkkkkkkkkk\",\"img1\":\"FotoPengaduan\\/kK3TZ2KjJQ5i0CF51NBP8uPZqzMdVs468rkEWGWj.pdf\",\"img2\":\"FotoPengaduan\\/fqh0Sw0YhW0MGIEA4CXYLkNdjUMSqhQRmlCV5zGT.jpg\",\"img3\":\"FotoPengaduan\\/frWIfH7quEyglHNyKyF5KrSbwD83mnJURg8jYJKM.jpg\",\"img4\":\"FotoKTP\\/BD5mPOSXjDRsJFRsVkDGBQqZ4oUSYPNu3AwQmNUt.jpg\",\"created_at\":\"2021-10-05T14:36:22.000000Z\",\"updated_at\":\"2021-10-05T14:36:22.000000Z\"},\"jenis\":\"Pengaduan\"}', '2021-12-07 14:25:15', '2021-10-05 14:36:22', '2021-12-07 14:25:15'),
('3b349370-a42b-41f3-92f2-2daae7a7395e', 'App\\Notifications\\NotifyPengaduan', 'App\\User', 1, '{\"pengaduan\":{\"id\":13,\"nik\":\"3205052911990003\",\"nama\":\"Curug Orokl\",\"telp\":\"09090909090\",\"email\":\"iswahyudialwi@gmail.com\",\"lat\":null,\"long\":null,\"jenis\":\"Domisili\",\"deskripsi\":null,\"img1\":\"img1\\/lvuF6PRTTyxj4SjE4B3nZdtZKALNcCf0QZucSw29.jpg\",\"img2\":null,\"img3\":null,\"img4\":\"FotoKTP\\/c3lZOvsSgYbbMNqysBTfyJ8EvAwPNLlc4gouinpL.jpg\",\"created_at\":\"2021-10-05T17:48:16.000000Z\",\"updated_at\":\"2021-10-05T17:48:16.000000Z\"},\"jenis\":\"Pengaduan\"}', '2021-12-07 14:25:15', '2021-10-05 17:48:16', '2021-12-07 14:25:15'),
('462d5b69-9552-4984-a560-5c0ae5be0779', 'App\\Notifications\\NotifyRegister', 'App\\User', 2, '{\"user\":{\"name\":\"Sweet\",\"nama_perusahaan\":\"0892223334455\",\"email\":\"sweet@gmail.com\",\"status\":\"menunggu\",\"updated_at\":\"2021-12-19T16:18:34.000000Z\",\"created_at\":\"2021-12-19T16:18:34.000000Z\",\"id\":14},\"jenis\":\"Pengguna\"}', NULL, '2021-12-19 16:18:38', '2021-12-19 16:18:38'),
('4d8a4f4a-54f5-41f7-8222-1c45b6b5b57d', 'App\\Notifications\\NotifyPengaduan', 'App\\User', 1, '{\"pengaduan\":{\"id\":24,\"nik\":\"3205052911990003\",\"nama\":\"Ryan\",\"telp\":\"089777777777\",\"email\":\"sweett@gmail.com\",\"lat\":null,\"long\":null,\"jenis\":\"SKTM\",\"deskripsi\":null,\"img1\":\"img1\\/9nwox1grjuqtgL7pJQTuwNOdD2eTlfKUeOmDsOMI.png\",\"img2\":null,\"img3\":null,\"img4\":\"FotoKTP\\/OkcJ4IG9b0AvVCtiwAYolZWJ8xe0pmzzYLDavLmz.png\",\"created_at\":\"2021-12-21T02:20:43.000000Z\",\"updated_at\":\"2021-12-21T02:20:43.000000Z\"},\"jenis\":\"Pengajuan\"}', '2021-12-21 12:37:23', '2021-12-21 02:20:44', '2021-12-21 12:37:23'),
('4fa5c08e-5ef1-42d8-b4ee-c6ddd709c121', 'App\\Notifications\\NotifyPengaduan', 'App\\User', 1, '{\"pengaduan\":{\"id\":8,\"nik\":\"3205052911990003\",\"nama\":\"qeqrqrqr\",\"telp\":\"09090909090\",\"email\":\"admin@gmail.com\",\"lat\":null,\"long\":null,\"jenis\":\"Domisili\",\"deskripsi\":null,\"img1\":\"img1\\/V27IrDBl9M2ZeZqMLpGak1JpEoLCzVmWbiB6wYim.jpg\",\"img2\":null,\"img3\":null,\"img4\":\"FotoKTP\\/fuQo9ekY9WCOn6ynSYcVtnCPNZjVQjOzwT56y0FX.jpg\",\"created_at\":\"2021-10-05T16:32:00.000000Z\",\"updated_at\":\"2021-10-05T16:32:00.000000Z\"},\"jenis\":\"Pengaduan\"}', '2021-10-05 16:37:33', '2021-10-05 16:32:00', '2021-10-05 16:37:33'),
('50cd8b22-d4b7-4ec5-b5af-dbf8e783c1ed', 'App\\Notifications\\NotifyPengaduan', 'App\\User', 1, '{\"pengaduan\":{\"id\":6,\"nik\":\"3205052911990003\",\"nama\":\"ecec\",\"telp\":\"09090909090\",\"email\":\"Nidafazilah02@gmail.com\",\"lat\":null,\"long\":null,\"jenis\":\"Pengantar SKCK Desa\",\"deskripsi\":null,\"img1\":\"img1\\/uWfrdNf2H4VIuqOskqxen7DIdnXqjEx4uPky7ig4.jpg\",\"img2\":null,\"img3\":null,\"img4\":\"img4\\/6vuDOTNqt1njKMs8NlTg6Thzn7CJxVQKK010tHEt.jpg\",\"created_at\":\"2021-10-05T16:16:43.000000Z\",\"updated_at\":\"2021-10-05T16:16:43.000000Z\"},\"jenis\":\"Pengaduan\"}', '2021-10-05 17:16:17', '2021-10-05 16:16:43', '2021-10-05 17:16:17'),
('631b2d95-1e89-44b3-940a-a5f81d303a6a', 'App\\Notifications\\NotifyPengaduan', 'App\\User', 1, '{\"pengaduan\":{\"id\":15,\"nik\":\"3205052911990003\",\"nama\":\"test\",\"telp\":\"09090909090\",\"email\":\"alwinugraha@gmail.com\",\"lat\":null,\"long\":null,\"jenis\":\"SKTM\",\"deskripsi\":null,\"img1\":\"img1\\/KvVLpNQh10sjFIWZnwQuFcw8w2aexLLXamdjTEvp.png\",\"img2\":null,\"img3\":null,\"img4\":\"FotoKTP\\/AAmphmPC2UB3kZGV9q4gwL8uZNejwd6yOF4HYhvs.png\",\"created_at\":\"2021-12-13T07:48:45.000000Z\",\"updated_at\":\"2021-12-13T07:48:45.000000Z\"},\"jenis\":\"Pengaduan\"}', '2021-12-19 16:59:02', '2021-12-13 07:48:46', '2021-12-19 16:59:02'),
('6a014908-cd94-44a8-a6b7-1ee31677ad12', 'App\\Notifications\\NotifyRegister', 'App\\User', 2, '{\"user\":{\"name\":\"Rizky Maulana\",\"nama_perusahaan\":\"CV.HIMAGRIB\",\"email\":\"1606033@sttgarut.ac.id\",\"status\":\"menunggu\",\"updated_at\":\"2020-09-20T14:49:17.000000Z\",\"created_at\":\"2020-09-20T14:49:17.000000Z\",\"id\":3},\"jenis\":\"Pengguna\"}', '2021-12-18 15:54:18', '2020-09-20 21:49:23', '2021-12-18 15:54:18'),
('6bed7fa6-c072-4ab1-bdea-3a1467e4ab39', 'App\\Notifications\\NotifyPengaduan', 'App\\User', 1, '{\"pengaduan\":{\"id\":16,\"nik\":\"3205052911990003\",\"nama\":\"test\",\"telp\":\"09090909090\",\"email\":\"Nidafazilah07@gmail.com\",\"lat\":null,\"long\":null,\"jenis\":\"Surat Pindah\",\"deskripsi\":null,\"img1\":\"img1\\/L6es9KJjyDj7OJNYe7TNdRmd9x9ZjGTvnzybNwDq.jpg\",\"img2\":null,\"img3\":null,\"img4\":\"FotoKTP\\/aKigOImbRlkHBklCnoNvX0soRgmVzrsCA4kJbc0d.png\",\"created_at\":\"2021-12-16T00:32:30.000000Z\",\"updated_at\":\"2021-12-16T00:32:30.000000Z\"},\"jenis\":\"Pengaduan\"}', '2021-12-19 16:59:02', '2021-12-16 00:32:33', '2021-12-19 16:59:02'),
('6c37fa95-935d-4394-9b55-4e0b88958b78', 'App\\Notifications\\NotifyPengaduan', 'App\\User', 1, '{\"pengaduan\":{\"id\":19,\"nik\":\"3205052911990003\",\"nama\":\"xzxz\",\"telp\":\"09090909090\",\"email\":\"admin@gmail.com\",\"lat\":null,\"long\":null,\"jenis\":\"SKTM\",\"deskripsi\":null,\"img1\":null,\"img2\":null,\"img3\":null,\"img4\":\"FotoKTP\\/TDnWVmKKM9C5uNiPqxsIXk7REjQhdhMG7aH2iJfr.jpg\",\"created_at\":\"2021-12-18T16:35:25.000000Z\",\"updated_at\":\"2021-12-18T16:35:25.000000Z\"},\"jenis\":\"Pengaduan\"}', '2021-12-19 16:59:02', '2021-12-18 16:35:25', '2021-12-19 16:59:02'),
('722e0f23-240e-4767-98c5-e9b214c1f506', 'App\\Notifications\\NotifyPengaduan', 'App\\User', 1, '{\"pengaduan\":{\"id\":3,\"nik\":\"3205052111990003\",\"nama\":\"Gunung Papandayan\",\"telp\":\"09090909090\",\"email\":\"Nidafazilah02@gmail.com\",\"lat\":null,\"long\":null,\"jenis\":\"SKTM\",\"deskripsi\":\"asdsa\",\"img1\":\"FotoPengaduan\\/fSZxOhK5xE16s78sLV6GpN1oIeBJwZa4CvKSeWkY.pdf\",\"img2\":\"FotoPengaduan\\/z0TvXA4ujisF28EB5G2cHzm9t9MsveaIglifr0IK.pdf\",\"img3\":\"FotoPengaduan\\/sECZpd3lyd2otjk5Eq9XIFpDAZxKl4QgupGLANsO.pdf\",\"img4\":\"FotoKTP\\/tbqKQ4nJn0ItLq5gnxcL4OVc4tIsKgRMr918Wgvv.pdf\",\"created_at\":\"2021-10-05T15:19:31.000000Z\",\"updated_at\":\"2021-10-05T15:19:31.000000Z\"},\"jenis\":\"Pengaduan\"}', '2021-12-07 14:25:15', '2021-10-05 15:19:31', '2021-12-07 14:25:15'),
('7497c769-ceed-42cd-b4a0-d9b6696cff19', 'App\\Notifications\\NotifyPengaduan', 'App\\User', 1, '{\"pengaduan\":{\"id\":1,\"nik\":\"3205052111990003\",\"nama\":\"Gunung Papandayan\",\"telp\":\"09090909090\",\"email\":\"iswahyudialwi@gmail.com\",\"lat\":\"1212\",\"long\":\"323232\",\"jenis\":\"Illegal Logging\",\"deskripsi\":\"ghjkkkkkkjhkj\",\"img1\":\"FotoPengaduan\\/dYWtRO11FWWKmlzk36c1jHV3Y4RqiHJVRClL5Fxy.jpg\",\"img2\":\"FotoPengaduan\\/zHF7oSmRJRqnrWQYXDompm3DGRDUX8pyozaHnz8r.jpg\",\"img3\":\"FotoPengaduan\\/6zNM8kxFCJH3hCH1gV27yuivBr9WkQoAGwxwT2Na.png\",\"img4\":\"FotoKTP\\/v0sXKVNFxI4bVC5cP7Gou1SI3E2jVmUSLp7ihhII.png\",\"created_at\":\"2021-10-05T14:31:59.000000Z\",\"updated_at\":\"2021-10-05T14:31:59.000000Z\"},\"jenis\":\"Pengaduan\"}', '2021-12-07 14:25:15', '2021-10-05 14:32:00', '2021-12-07 14:25:15'),
('8820ae87-a523-4d8f-8319-e81e02666c10', 'App\\Notifications\\NotifyPengaduan', 'App\\User', 1, '{\"pengaduan\":{\"id\":26,\"nik\":\"3819238193811312\",\"nama\":\"Awenk\",\"telp\":\"0891231923123\",\"email\":\"admin@gmail.com\",\"lat\":null,\"long\":null,\"jenis\":\"Pengantar SKCK\",\"deskripsi\":null,\"img1\":\"img1\\/7A2SarlaW2StazG8fhwaKbfSVL9Ni7zoUCOMcrPn.png\",\"img2\":\"img2\\/sRTGpmJFUB9AexyDxyrfyj2mQSc31qyWNjqlnUZ1.png\",\"img3\":\"img3\\/oJl6ydSxv4BFCSyOsGPawMELCByVi53y9gEN0GmK.png\",\"img4\":\"FotoKTP\\/rIy8yrIChSYqj33VbNOiGjTOxwHRchBP29qMSWCC.png\",\"created_at\":\"2021-12-21T12:19:57.000000Z\",\"updated_at\":\"2021-12-21T12:19:57.000000Z\"},\"jenis\":\"Pengajuan\"}', '2021-12-21 12:37:16', '2021-12-21 12:19:57', '2021-12-21 12:37:16'),
('92a1cb0b-efd2-4aa0-b866-8e497a71abbb', 'App\\Notifications\\NotifyRegister', 'App\\User', 2, '{\"user\":{\"name\":\"zxcvasd\",\"nama_perusahaan\":\"asdzxc\",\"email\":\"zxc@gmail.com\",\"status\":\"menunggu\",\"updated_at\":\"2021-12-19T16:01:40.000000Z\",\"created_at\":\"2021-12-19T16:01:40.000000Z\",\"id\":12},\"jenis\":\"Pengguna\"}', NULL, '2021-12-19 16:01:45', '2021-12-19 16:01:45'),
('954bdf29-2aa8-4589-91d8-ca01c0c229c1', 'App\\Notifications\\NotifyPengaduan', 'App\\User', 1, '{\"pengaduan\":{\"id\":21,\"nik\":\"3205052911990003\",\"nama\":\"qqqq\",\"telp\":\"09090909090\",\"email\":\"Nidafazilah02@gmail.com\",\"lat\":null,\"long\":null,\"jenis\":\"Domisili\",\"deskripsi\":null,\"img1\":null,\"img2\":null,\"img3\":null,\"img4\":\"FotoKTP\\/io9ndP1ThjlVYQ0ZRHfd0zLNH3gY3EMisZOQW6uk.jpg\",\"created_at\":\"2021-12-19T04:04:49.000000Z\",\"updated_at\":\"2021-12-19T04:04:49.000000Z\"},\"jenis\":\"Pengaduan\"}', '2021-12-19 16:59:02', '2021-12-19 04:04:49', '2021-12-19 16:59:02'),
('9a642e01-3a42-45b1-a769-383d2799676d', 'App\\Notifications\\NotifyPengaduan', 'App\\User', 1, '{\"pengaduan\":{\"id\":23,\"nik\":\"3205052111990003\",\"nama\":\"sweet\",\"telp\":\"12345678910\",\"email\":\"sweett@gmail.com\",\"lat\":null,\"long\":null,\"jenis\":\"Domisili\",\"deskripsi\":null,\"img1\":\"img1\\/aVl0X7s95YEEJ61aeWECkRF6MOPEW420CbAVPJ23.png\",\"img2\":null,\"img3\":null,\"img4\":\"FotoKTP\\/3bRcr7egJSiqoBoAIoUgCmARrZj8aSNpDMxpUOZ2.png\",\"created_at\":\"2021-12-19T16:44:42.000000Z\",\"updated_at\":\"2021-12-19T16:44:42.000000Z\"},\"jenis\":\"Pengaduan\"}', '2021-12-19 16:59:01', '2021-12-19 16:44:43', '2021-12-19 16:59:01'),
('a8f336d5-a16e-496e-a40c-3d296882f7fb', 'App\\Notifications\\NotifyRegister', 'App\\User', 2, '{\"user\":{\"name\":\"Sweet\",\"nama_perusahaan\":\"0899999999\",\"email\":\"sweett@gmail.com\",\"status\":\"menunggu\",\"updated_at\":\"2021-12-19T16:34:12.000000Z\",\"created_at\":\"2021-12-19T16:34:12.000000Z\",\"id\":16},\"jenis\":\"Pengguna\"}', NULL, '2021-12-19 16:34:15', '2021-12-19 16:34:15'),
('a951bc24-2c98-48bf-955f-1b4f7c76b729', 'App\\Notifications\\NotifyPengaduan', 'App\\User', 1, '{\"pengaduan\":{\"id\":7,\"nik\":\"3205052911990003\",\"nama\":\"Curug Orokss\",\"telp\":\"09090909090\",\"email\":\"alwiiswahyudi@rocketmail.com\",\"lat\":null,\"long\":null,\"jenis\":\"Domisili\",\"deskripsi\":null,\"img1\":\"img1\\/AVkq2eagc3LcwX1GIs48vPxxU2yWWu3nT4jclmJA.jpg\",\"img2\":null,\"img3\":null,\"img4\":\"img4\\/ynKOPhpecBUXI3iuISQM9GL28sSh41MMDnIs0nIz.jpg\",\"created_at\":\"2021-10-05T16:22:45.000000Z\",\"updated_at\":\"2021-10-05T16:22:45.000000Z\"},\"jenis\":\"Pengaduan\"}', '2021-12-07 14:25:15', '2021-10-05 16:22:46', '2021-12-07 14:25:15'),
('ab8ca0ae-6e01-4180-9d21-5dc122dc6231', 'App\\Notifications\\NotifyPengaduan', 'App\\User', 1, '{\"pengaduan\":{\"id\":25,\"nik\":\"3205052911990003\",\"nama\":\"test\",\"telp\":\"12345678910\",\"email\":\"sweett@gmail.com\",\"lat\":null,\"long\":null,\"jenis\":\"SKTM\",\"deskripsi\":null,\"img1\":\"img1\\/DHLzx8MPIlreTb5s0IniLsfzFxggbCK6MiVdWCFl.png\",\"img2\":null,\"img3\":null,\"img4\":\"FotoKTP\\/wCZltklzAEuQQn3XUdMJ6VXClbIMkMu3Ew0HWMmL.png\",\"created_at\":\"2021-12-21T04:13:44.000000Z\",\"updated_at\":\"2021-12-21T04:13:44.000000Z\"},\"jenis\":\"Pengajuan\"}', '2021-12-21 12:12:21', '2021-12-21 04:13:44', '2021-12-21 12:12:21'),
('b5889068-dfee-4aa3-83d2-d7eadb9acaab', 'App\\Notifications\\NotifyPengaduan', 'App\\User', 1, '{\"pengaduan\":{\"id\":11,\"nik\":\"3205052911990003\",\"nama\":\"wewew\",\"telp\":\"09090909090\",\"email\":\"Nidafazilah07@gmail.com\",\"lat\":null,\"long\":null,\"jenis\":\"Domisili\",\"deskripsi\":null,\"img1\":\"img1\\/1geHiMPiNP3uT8mzQLBG5WgcSbpTzOqOSdbAYQLa.jpg\",\"img2\":null,\"img3\":null,\"img4\":\"FotoKTP\\/RMKcatL9SteflNotHkpnRJZ2WDosc3WMbIPM10BV.jpg\",\"created_at\":\"2021-10-05T17:41:02.000000Z\",\"updated_at\":\"2021-10-05T17:41:02.000000Z\"},\"jenis\":\"Pengaduan\"}', '2021-12-07 14:25:15', '2021-10-05 17:41:03', '2021-12-07 14:25:15'),
('b6f1eaa7-9127-44e1-90a2-2fd0c2068250', 'App\\Notifications\\NotifyPengaduan', 'App\\User', 1, '{\"pengaduan\":{\"id\":17,\"nik\":\"3205052111990003\",\"nama\":\"test\",\"telp\":\"09090909090\",\"email\":\"alwinugraha@gmail.com\",\"lat\":null,\"long\":null,\"jenis\":\"SKTM\",\"deskripsi\":null,\"img1\":null,\"img2\":\"img2\\/8R6TwDTUxd0V1c12B1LOx35BrBFdmCuxEr5QonVS.jpg\",\"img3\":null,\"img4\":\"FotoKTP\\/6CZwP7ohx9GHUPQY3CkV0n4qM6tdfG13ZigDpSPc.jpg\",\"created_at\":\"2021-12-18T15:30:43.000000Z\",\"updated_at\":\"2021-12-18T15:30:43.000000Z\"},\"jenis\":\"Pengaduan\"}', '2021-12-19 16:59:02', '2021-12-18 15:30:46', '2021-12-19 16:59:02'),
('ce49c99c-b567-4e9b-835a-4a5afd829489', 'App\\Notifications\\NotifyPelaporanStats', 'App\\User', 1, '{\"pelaporan\":{\"id\":1,\"nama\":\"Rizky Maulana\",\"telp\":\"08123456789\",\"email\":\"1606033@sttgarut.ac.id\",\"nama_perusahaan\":\"CV.HIMAGRIB\",\"bidang_usaha\":\"Apotek\",\"alamat\":\"Jl. Cimanuk\",\"jenis\":\"Air\",\"periode\":\"1\",\"tahun\":\"2025\",\"dokumentasi\":\"Pelaporan-Air\\/Periode-1\\/Tahun-2025\\/Dokumentasi\\/dUy70il0XfnDFjr30fJSJhxVbrVYWO6pzB6v0hwY.png\",\"dok_1\":\"Pelaporan-Air\\/Periode-1\\/Tahun-2025\\/Gambaran-Pengelolaan-Air\\/fIk888VSyYwFNc5OAAfb382ncGfs0ayDe2cWg4iY.docx\",\"dok_2\":\"Pelaporan-Air\\/Periode-1\\/Tahun-2025\\/Sertifikat-Uji-Lab\\/GKNFkWry8Uz505W5AB6Gu14lXg17b0PaXJI3RBnq.docx\",\"dok_3\":\"Pelaporan-Air\\/Periode-1\\/Tahun-2025\\/Izin-Ipalasa\\/9aRrJcv87I9bsZNAFvLLyag21NjIFlgAuFt2uWCY.docx\",\"dok_4\":null,\"status\":\"Reviewing\",\"user_id\":\"3\",\"created_at\":\"2020-10-22T16:23:59.000000Z\",\"updated_at\":\"2020-10-22T16:23:59.000000Z\"},\"jenis\":\"Pelaporan\"}', '2020-10-22 16:28:08', '2020-10-22 16:23:59', '2020-10-22 16:28:08'),
('d3a204c5-7837-4d18-a672-a36a2a6f6783', 'App\\Notifications\\NotifyPengaduan', 'App\\User', 1, '{\"pengaduan\":{\"id\":5,\"nik\":\"3205052111990003\",\"nama\":\"asep\",\"telp\":\"09090909090\",\"email\":\"alwiiswahyudi@rocketmail.com\",\"lat\":null,\"long\":null,\"jenis\":\"Domisili\",\"deskripsi\":null,\"img1\":\"FotoPengaduan\\/NDHWa9vN5HFR1OvrLpDkwWRMUlEvHxAYvpArHz9k.jpg\",\"img2\":\"FotoPengaduan\\/BTeB8OhGmdh6TQn71gPnysIdpcI1eAHpv4IEy5Pi.jpg\",\"img3\":null,\"img4\":\"FotoKTP\\/4nXlSotqoERhcLDpJ2cHWQWZNtfW6d00qQkVwSmm.jpg\",\"created_at\":\"2021-10-05T16:09:10.000000Z\",\"updated_at\":\"2021-10-05T16:09:10.000000Z\"},\"jenis\":\"Pengaduan\"}', '2021-12-07 14:25:15', '2021-10-05 16:09:10', '2021-12-07 14:25:15'),
('e8761173-69cf-487c-a6f4-283cac57f6e8', 'App\\Notifications\\NotifyPengaduan', 'App\\User', 1, '{\"pengaduan\":{\"id\":14,\"nik\":\"3205052111990003\",\"nama\":\"qeqrqrqr\",\"telp\":\"09090909090\",\"email\":\"admin@gmail.com\",\"lat\":null,\"long\":null,\"jenis\":\"Surat Pindah\",\"deskripsi\":null,\"img1\":\"img1\\/S6gMpJYbzDq1r7HI2Cl1akIO7BgXhO3Pyw1JNpoo.png\",\"img2\":null,\"img3\":\"img3\\/X53BIO8sPKKOMIzqSegvA9vmEta318ccR2B6h0ms.png\",\"img4\":\"FotoKTP\\/Augl29b1lu2EPFW5taEcYBfgNOn8tF8yIOrNDBLX.png\",\"created_at\":\"2021-12-12T06:39:39.000000Z\",\"updated_at\":\"2021-12-12T06:39:39.000000Z\"},\"jenis\":\"Pengaduan\"}', '2021-12-19 16:59:02', '2021-12-12 06:39:40', '2021-12-19 16:59:02'),
('ecb2cc5a-f743-4147-8f58-1d0ed6962b7d', 'App\\Notifications\\NotifyPengaduan', 'App\\User', 1, '{\"pengaduan\":{\"id\":4,\"nik\":\"3205052111990003\",\"nama\":\"Gunung Papandayan\",\"telp\":\"09090909090\",\"email\":\"Nidafazilah02@gmail.com\",\"lat\":null,\"long\":null,\"jenis\":\"Keterangan Jandda\\/Duda\",\"deskripsi\":null,\"img1\":\"FotoPengaduan\\/WXXAJGsnoYH3qIN76Vq4pGgdNYlAkYmVqGfyIu79.pdf\",\"img2\":\"FotoPengaduan\\/KIYJqMjAUKiGikMAwr3jcC5eTCpjDHa9sRQCzXZr.pdf\",\"img3\":null,\"img4\":\"FotoKTP\\/9i0nGaRP2VyBLaaervnGJdW1t4SDprqFrhJiux61.pdf\",\"created_at\":\"2021-10-05T16:00:08.000000Z\",\"updated_at\":\"2021-10-05T16:00:08.000000Z\"},\"jenis\":\"Pengaduan\"}', '2021-12-07 14:25:15', '2021-10-05 16:00:08', '2021-12-07 14:25:15'),
('efb23eba-bca4-4761-be31-7da19725c876', 'App\\Notifications\\NotifyRegister', 'App\\User', 2, '{\"user\":{\"nama_perusahaan\":\"CV.HIMAGRIB\",\"email\":\"1606033@sttgarut.ac.id\",\"status\":\"menunggu\",\"updated_at\":\"2020-09-20T12:02:58.000000Z\",\"created_at\":\"2020-09-20T12:02:58.000000Z\",\"id\":3},\"jenis\":\"Pengguna\"}', '2020-09-20 19:10:11', '2020-09-20 19:03:02', '2020-09-20 19:10:11'),
('fea9f26b-f577-4837-8e57-4c82ee615c50', 'App\\Notifications\\NotifyRegister', 'App\\User', 2, '{\"user\":{\"name\":\"Carl\",\"nama_perusahaan\":\"082114768955\",\"email\":\"carlJ@gmail.com\",\"status\":\"menunggu\",\"updated_at\":\"2021-12-19T16:32:01.000000Z\",\"created_at\":\"2021-12-19T16:32:01.000000Z\",\"id\":15},\"jenis\":\"Pengguna\"}', NULL, '2021-12-19 16:32:07', '2021-12-19 16:32:07'),
('fecbff9c-f6fd-4e13-a278-6283b5aa8bac', 'App\\Notifications\\NotifyRegister', 'App\\User', 2, '{\"user\":{\"name\":\"Anwar Fauzi\",\"nama_perusahaan\":\"PT. Rancamaya\",\"email\":\"anwar@gmail.com\",\"status\":\"menunggu\",\"updated_at\":\"2020-09-20T12:07:41.000000Z\",\"created_at\":\"2020-09-20T12:07:41.000000Z\",\"id\":4},\"jenis\":\"Pengguna\"}', '2020-09-20 19:08:07', '2020-09-20 19:07:45', '2020-09-20 19:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('1606033@sttgarut.ac.id', '$2y$10$YhVzwQekgqA/.N1YeTV3YeY0qzct3Yop9HZLwLFufsEr504sslhk.', '2020-09-20 22:52:59');

-- --------------------------------------------------------

--
-- Table structure for table `pelaporan`
--

CREATE TABLE `pelaporan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_perusahaan` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang_usaha` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis` enum('Air','Udara','LimbahB3','Lingkungan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `periode` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokumentasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dok_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dok_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dok_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dok_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Reviewing','Reviewed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Reviewing',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nik` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `nik`, `nama`, `telp`, `email`, `jenis`, `deskripsi`, `img1`, `img2`, `img3`, `img4`, `created_at`, `updated_at`) VALUES
(24, '3205052911990003', 'Ryan', '089777777777', 'sweett@gmail.com', 'SKTM', 'Ditolak', 'img1/9nwox1grjuqtgL7pJQTuwNOdD2eTlfKUeOmDsOMI.png', NULL, NULL, 'FotoKTP/OkcJ4IG9b0AvVCtiwAYolZWJ8xe0pmzzYLDavLmz.png', '2021-12-21 02:20:43', '2021-12-21 02:20:43'),
(26, '3819238193811312', 'Awenk', '0891231923123', 'admin@gmail.com', 'Pengantar SKCK', 'Selesai', 'img1/7A2SarlaW2StazG8fhwaKbfSVL9Ni7zoUCOMcrPn.png', 'img2/sRTGpmJFUB9AexyDxyrfyj2mQSc31qyWNjqlnUZ1.png', 'img3/oJl6ydSxv4BFCSyOsGPawMELCByVi53y9gEN0GmK.png', 'FotoKTP/rIy8yrIChSYqj33VbNOiGjTOxwHRchBP29qMSWCC.png', '2021-12-21 12:19:57', '2021-12-21 13:06:49');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pelapor` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_perusahaan` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang_usaha` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periode` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_dok_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_dok_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_dok_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_dok_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kesimpulan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_surat` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_verifikasi` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pelaporan_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_perusahaan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bidang_usaha` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('aktif','menunggu') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'menunggu',
  `roles` enum('Admin','Operator','User') COLLATE utf8mb4_unicode_ci DEFAULT 'User',
  `completed` enum('true','false') COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `telp`, `nama_perusahaan`, `bidang_usaha`, `alamat`, `jabatan`, `status`, `roles`, `completed`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$AgCcOvT5/RcTHIqbL6oIe.HJGimsdVJPsHBWFApQ9SqP75Q6Lirx.', NULL, NULL, NULL, NULL, NULL, 'aktif', 'Admin', 'false', NULL, NULL, '2020-09-20 19:34:59'),
(2, 'Operator', 'alwiiswahyudi@gmail.com', NULL, '$2y$12$AvUJIs8/y77x998.j/pvJuS8II21RpTxMp1mM3CbrEazsX4hw1v2K', NULL, NULL, NULL, NULL, NULL, 'aktif', 'Operator', 'false', NULL, NULL, NULL),
(16, 'Sweet', 'sweett@gmail.com', NULL, '$2y$10$rSflm00RozDgTBxjKBdG9OOxVctDwycBUfYMJIYpPHRd7MbnvqRSu', NULL, '0899999999', NULL, NULL, NULL, 'aktif', 'User', 'false', NULL, '2021-12-19 16:34:12', '2021-12-19 16:40:14'),
(17, 'alwi', 'alwi1@gmail.com', NULL, '$2y$10$tODyyjuIBEe/s/GehDVrt.ZCXzM.H/VRtRVkallL50NMZRpu6H8g2', NULL, '08966453778', NULL, NULL, NULL, 'menunggu', 'User', 'false', NULL, '2021-12-21 03:52:31', '2021-12-21 03:52:31'),
(18, 'alwi', 'iswahyudialwi@gmail.com', NULL, '$2y$10$KgWdFC8OutdYYDFfArGpBewl2pQf3L1F5Kr7PpFCuqjLt2qumV78O', NULL, '082114768955', NULL, NULL, NULL, 'menunggu', 'User', 'false', NULL, '2021-12-21 03:57:02', '2021-12-21 03:57:02'),
(19, 'alwi', 'iswahyudi@gmail.com', NULL, '$2y$10$lFSv7t7uPPoM6nIq6y/4eubK9eWcB4JMq5v56xvV3V5eVrevFCGMO', NULL, '08966453778', NULL, NULL, NULL, 'menunggu', 'User', 'false', NULL, '2021-12-21 04:04:23', '2021-12-21 04:04:23'),
(20, 'Awenk', 'bebas@gmail.com', NULL, '$2y$10$4WPDtE2.e6kUDkdQQ509ze3CZ3Mcqvn7lBsqHxymRu3gV4JChfbwe', NULL, '089609919291', NULL, NULL, NULL, 'aktif', 'User', 'false', NULL, '2021-12-21 12:16:00', '2021-12-21 12:16:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pelaporan`
--
ALTER TABLE `pelaporan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelaporan_user_id_foreign` (`user_id`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `review_pelaporan_id_foreign` (`pelaporan_id`),
  ADD KEY `review_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `pelaporan`
--
ALTER TABLE `pelaporan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pelaporan`
--
ALTER TABLE `pelaporan`
  ADD CONSTRAINT `pelaporan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_pelaporan_id_foreign` FOREIGN KEY (`pelaporan_id`) REFERENCES `pelaporan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `review_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
