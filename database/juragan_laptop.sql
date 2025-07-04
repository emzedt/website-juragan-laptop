-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2025 at 09:06 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `juragan_laptop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `usernameAdmin` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `usernameAdmin`, `password`) VALUES
(1, 'admin', '123'),
(2, 'adminkeren123', '124');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `idCheckout` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `ekspedisi` varchar(50) NOT NULL,
  `catatan` varchar(50) NOT NULL,
  `metode` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `totalharga` varchar(50) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `idProduk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`idCheckout`, `nama_lengkap`, `alamat`, `ekspedisi`, `catatan`, `metode`, `quantity`, `totalharga`, `tanggal_bayar`, `idProduk`) VALUES
(3, 'Muhammad Zaidan', 'Cisauk', 'JNE', 'Yang bagus ya bang', 'OVO', '1', '35999000', '2022-12-14', 9),
(4, 'Muhammad Zaidan', 'Cisauk', 'JNE', 'Yang bagus ya bang', 'OVO', '2', '115998000', '2022-12-14', 11),
(5, 'Muhammad Zaidan', 'Cisauk', 'JNE', 'Yang bagus ya bang', 'OVO', '2', '50398000', '2022-12-14', 12),
(6, 'Muhammad Zaidan', 'Cisauk', 'JNE', 'Plis kasih yang bagus', 'LinkAja', '1', '35999000', '2022-12-14', 9),
(7, 'Muhammad Zaidan', 'Cisauk', 'JNE', 'Plis kasih yang bagus', 'LinkAja', '1', '32999000', '2022-12-14', 10),
(8, 'Muhammad Zaidan', 'Cisauk', 'JNE', 'Plis kasih yang bagus', 'LinkAja', '1', '69999000', '2022-12-14', 16),
(17, 'Rafael Bani', 'Graha Raya', 'Sicepat', '-', 'Indomaret', '1', '35999000', '2022-12-17', 9),
(18, 'Rafael Bani', 'Graha Raya', 'JNE', '-', 'OVO', '1', '57999000', '2022-12-17', 11),
(19, 'Rafael Bani', 'Graha Raya', 'JNE', '-', 'DANA', '1', '28499000', '2022-12-17', 13),
(20, 'Rafael Bani', 'Graha Raya', 'JNE', 'Give me the best product you have :)', 'BCA', '2', '50398000', '2022-12-17', 12),
(21, 'Rafael Bani', 'Graha Raya', 'JNE', 'Give me the best product you have :)', 'BCA', '3', '58425000', '2022-12-17', 22),
(22, 'Rafael Bani', 'Graha Raya', 'JNE', 'Give me the best product you have :)', 'BCA', '4', '35300000', '2022-12-17', 25),
(23, 'Rafael Bani', 'Graha Raya', 'JNE', '-', 'DANA', '4', '35300000', '2022-12-17', 25),
(24, 'Kayla', 'pg', 'JNE', ',yg bagus', 'BCA', '1', '57999000', '2023-04-13', 11),
(25, 'Kayla', 'pg', 'JNE', ',yg bagus', 'BCA', '2', '50398000', '2023-04-13', 12),
(26, 'Muhammad Zaidan', 'cisauk', 'JNE', '---', 'BCA', '3', '107997000', '2024-11-07', 9);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'Laptop Gaming'),
(2, 'Laptop Kerja'),
(9, 'laptop aja');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `username` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`username`, `id`, `foto`, `nama_produk`, `harga_produk`, `quantity`, `total_harga`) VALUES
('adadeh', 12, 'omenbyhp16.png', 'OMEN BY HP 16', 25199000, 1, 25199000),
('adadeh', 21, 'redmibook15.png', 'REDMIBOOK 15', 6999000, 1, 6999000),
('zaidanint', 10, 'asusrogzephyrusg14.png', 'Asus ROG Zephyrus G14', 32999000, 2, 65998000),
('zaidanint', 11, 'msige76raider.png', 'MSI GE76 RAIDER', 57999000, 1, 57999000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `idPelanggan` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`idPelanggan`, `username`, `password`) VALUES
(1, 'zaidan', '123'),
(2, 'adadeh', 'adada'),
(10, 'Jordan', '12345'),
(11, 'bani', '123'),
(12, 'zaidanint', '123');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `harga_produk` double DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `ketersediaan_stok` enum('habis','tersedia') DEFAULT 'tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kategori_id`, `nama_produk`, `harga_produk`, `foto`, `detail`, `ketersediaan_stok`) VALUES
(9, 1, 'Asus ROG Zephyrus G15', 35999000, 'asusstrixg15.png', 'Specifications :\r\n\r\nNVIDIA® GeForce RTX™ 3070 Ti Laptop GPU\r\nWindows 11 Home\r\nAMD Ryzen™ 7 6800HS\r\n15.6 inch, WQHD (2560 x 1440) 16:9, Refresh Rate:165Hz\r\n1TB PCIe® 4.0 NVMe™ M.2 SSD', 'tersedia'),
(10, 1, 'Asus ROG Zephyrus G14', 32999000, 'asusrogzephyrusg14.png', 'Specifications :\r\n\r\n14-inch FHD+ 16:10 (1920 x 1200, WUXGA), 144Hz, 3ms, Adaptive-Sync, 170 viewing angle, IPS-level, 400nits, 100.00% sRGB, Pantone Validated\r\n8GB DDR5 on board + 8GB DDR5-4800 SO-DIMM\r\nMemory Slot: 1x DDR5 SO-DIMM slots , Max memory installed: 24GB\r\n512GB M.2 NVMe™ PCIe® 4.0 SSD\r\n\"M.2 SSD Slots(Including Used): 1 M.2 NVMe PCIe 4.0 SSD 512GB/1TB\r\nBacklit Chiclet Keyboard , Windows 11 Home\r\n4-speaker system with Smart Amplifier Technology, AI noise-canceling technology, Dolby Atmos, Hi-Res certification, Smart Amp Technology\"', 'tersedia'),
(11, 1, 'MSI GE76 RAIDER', 57999000, 'msige76raider.png', 'Specifications :\r\n\r\n11th Generation Intel® Core™ i9-11980 HK Processor (12 core, up to 5.0 GHz 24 MB Cache)\r\n65 GB DDR4 3200 MHZ Super Speed\r\nNVIDIA® GeForce® RTX 3080 16 GB Dedicated GDDR6X\r\n17.3 4K IPS 100 % Adobe RGB Equivalent\r\n1 TB NVMe PCIe SSD\r\nWindows 10 Original\r\n4-Cell Li-Polymer 99.9\r\n230W Slim adapter\r\nPer-Key RGB Backlight Keyboard', 'tersedia'),
(12, 1, 'OMEN BY HP 16', 25199000, 'omenbyhp16.png', 'Specifications :\r\n\r\nNVIDIA GeForce RTX 3070 (8 GB GDDR6,dedicated)\r\nAMD Ryzen 7 5800H (up to 4.4 GHz maxboost clock, 16 MB L3 cache, 8 cores,16 threads)\r\n16 GB DDR4-3200 MHz RAM (2 x 8 GB)\r\n512 GB PCIe NVMe TLC M.2 SSD\r\nBlack\r\nBacklit Keyboard ( No Numb lock )\r\n16.1, FHD (1920 x 1080), 144 Hz, IPS, microedge, anti-glare, Low Blue Light, 300 nits,72% NTSC', 'tersedia'),
(13, 1, 'ASUS ROG FLOW Z13', 28499000, 'asusflowz13.png', 'Specifications :\r\n\r\n12th Gen Intel® Core™ i7-12700H Processor 2.3 GHz (24M Cache, up to 4.7 GHz, 14 cores: 6 P-cores and 8 E-cores)\r\nNVIDIA® GeForce RTX™ 3050 Laptop GPU 4GB GDDR6 MUX Switch + Optimus\r\n1107.5MHz* at 40W (1057.5MHz Boost Clock+50MHz OC, 35W+5W Dynamic Boost)\r\n13.4-inch WUXGA (1920 x 1200) 16:10 Touch Screen IPS-level, Refresh Rate 120Hz Adaptive-Sync, Brightness 500nits, sRGB % 100% Pantone Validated\r\n16GB (8GB*2 LPDDR5 on board), 512GB M.2 2230 NVMe™ PCIe® 4.0 SSD\r\nWindows 11 Home , Office Home and Student 2021\r\n2-speaker system with Smart Amplifier Technology\r\nBacklit Chiclet Keyboard RGB', 'tersedia'),
(14, 1, 'HP PAVILION GAMING 15', 11399000, 'hppaviliongaming15.png', 'Specifications :\r\n\r\nWindows 11 Home\r\nNVIDIA® GeForce® GTX 1650 (4 GB GDDR6 dedicated)\r\nAMD Ryzen™ 5 5600H (up to 4.2 GHz max boost clock, 16 MB L3 cache, 6 cores, 12 threads)\r\n16 GB DDR4-3200 MHz RAM (2 x 8 GB)\r\n512 GB PCIe® NVMe™ M.2 SSD\r\n39.6 cm (15.6\") diagonal, FHD (1920 x 1080), 144 Hz, IPS, micro-edge, anti-glare, 250 nits, 45% NTSCSpecifications :\r\n\r\nWindows 11 Home\r\nNVIDIA® GeForce® GTX 1650 (4 GB GDDR6 dedicated)\r\nAMD Ryzen™ 5 5600H (up to 4.2 GHz max boost clock, 16 MB L3 cache, 6 cores, 12 threads)\r\n16 GB DDR4-3200 MHz RAM (2 x 8 GB)\r\n512 GB PCIe® NVMe™ M.2 SSD\r\n39.6 cm (15.6\") diagonal, FHD (1920 x 1080), 144 Hz, IPS, micro-edge, anti-glare, 250 nits, 45% NTSC', 'tersedia'),
(15, 1, 'ASUS TUF GAMING F15', 22999000, 'asustufgamingf15.png', 'Specifications :\r\n\r\nNVIDIA GeForce RTX 3070 Laptop GPU 8GB GDDR6 MUX Switch + Optimus\r\n12th Gen Intel Core i7-12700H Processor 2.3 GHz (24M Cache, up to 4.7 GHz, 14 cores: 6 P-cores and 8 E-cores)\r\n1460MHz* at 140W (1410MHz Boost Clock+50MHz OC, 115W+25W Dynamic Boost)\r\n15.6-inch FHD (1920 x 1080) 16:9, 300Hz Adaptive-Sync, Viewing Angle : 170, Panel Tech : Value IPS-level,\r\nBrightness : 300nits, sRGB % : 100% , 16GB(8GB DDR5-4800 SO-DIMM *2)\r\n1TB M.2 NVMe PCIe 3.0 SSD\r\nBacklit Chiclet Keyboard RGB\r\nWindows 11 Home , Office Home and Student 2021', 'tersedia'),
(16, 1, 'MSI STEALTH GS77', 69999000, 'msigs77.png', 'Specifications :\r\n\r\nDisplay 17.3\" UHD (3840*2160), 120Hz 100% Adobe\r\nVGA, V-RAM RTX3080Ti Laptop GPU GDDR6 16GB\r\nCPU Alder Lake i9-12900H\r\nKeyboard Per key RGB steelseries KB\r\nMemory DDR5 64GB (32GBx2 4800MHz)\r\nStorage 2TB NVMe PCIe Gen4x4 SSD\r\nWLAN Intel® Killer™ Wi-Fi 6E AX1675(i)\r\nOS Windows 11 Home', 'tersedia'),
(17, 1, 'ACER PREDATOR HELIOS 300', 24999000, 'acerhelios300.png', 'Specifications :\r\n\r\nIntel Core i9-11900H Processor 24M Cache, up to 4.80 GHz\r\nNVIDIA® GeForce® RTX 3070 with 8 GB GDDR6\r\nWindows 10 Home\r\n15.6\" QHD 2560 x 1440 LED IPS (165Hz), 100% In-plane Switching (IPS) Technology\r\n1*16 GB Dual-channel DDR4\r\n512 GB SSD PCIe NVMe\r\nHD webcam with 1280 x 720 resolution and 720p HD audio/video recording, Super high dynamic range imaging (SHDR)', 'tersedia'),
(19, 1, 'ASUS ROG STRIX G15', 19499000, 'asusstrixg15.png', 'Specifications :\r\n\r\nAMD Ryzen™ 7 6800H Mobile Processor (8-core/16-thread, 20MB cache, up to 4.7 GHz max boost)\r\nNVIDIA® GeForce RTX™ 3050 Laptop GPU 4GB GDDR6 ROG Boost: 1550MHz* at 95W (1500MHz Boost Clock+50MHz OC, 80W+15W Dynamic Boost)\r\n15.6-inch FHD (1920 x 1080) 16:9; Brightness 250nits ; Refresh Rate 144Hz ; sRGB % 62.5% ; Adaptive-Sync\r\n8GB DDR5-4800 SO-DIMM / 16GB DDR5-4800 SO-DIMM\r\n512GB M.2 NVMe™ PCIe® 4.0 SSD\r\nBacklit Chiclet Keyboard 4-Zone RGB', 'tersedia'),
(20, 2, 'INFINIX INBOOK X2', 5300000, 'infinix.png', 'Specifications :\r\n\r\nIntel® Core™ i5-1035G1 Processor 1.0 GHz (6M Cache, up to 3.6 GHz, 4 cores)\r\n8GB DDR4\r\nSSD 512GB M.2 NVMe PCIe 3.0\r\nWindows 11 Home\r\n14\" FHD (1920*1080) IPS 300 nits, Colour Gamut100% sRGB, Viewing Angle178 degrees\r\nIntel®️ UHD Graphics', 'tersedia'),
(21, 2, 'REDMIBOOK 15', 6999000, 'redmibook15.png', 'Specifications :\r\n\r\nIntel Core I3-1115G4 (4.1 GHz) 6MB SmartCache 2Cores 4Threads\r\n8 GB DDR4 3200 Mhz\r\n256 GB Intel PCIe NVMe M.2 SSD\r\nIntegrated Intel UHD Gen 11 Graphics\r\n15.6 FHD ( 1920 x 1080 ) 220 Nits, 45% NTSC PPI 141\r\nWIndows 10 Home x64 Original\r\nSpeaker stereo 2 W + 2 W Audio DTS', 'tersedia'),
(22, 2, 'MACBOOK PRO M1', 19475000, 'macbookprog.png', 'Specifications :\r\n\r\nApple M1 chip with 8-core CPU, 8-core GPU, and 16-core Neural Engine\r\n8GB unified memory\r\n256GB / 512GB SSD storage\r\n13-inch Retina display with True Tone\r\nMagic Keyboard , Touch Bar and Touch ID\r\nForce Touch trackpad , Two Thunderbolt / USB 4 ports', 'tersedia'),
(23, 2, 'MSI MODERN 14', 12999000, 'msi14.png', 'Specifications :\r\n\r\n14\" FHD (1920*1080), IPS-Level,Thin Bezel\r\nAMD Radeon™ Graphics, Ryzen 7 5700U\r\nSingle backlight KB(White) , DDR IV 8GB (3200MHz)\r\n512GB NVMe PCIe Gen3x4 SSD\r\nAMD Wi-Fi 6E RZ608 + BT5.1 , Windows11 Home', 'tersedia'),
(24, 2, 'LENOVO IDEAPAD S340', 8768300, 'lenovoidea.png', 'Specifications :\r\n\r\nIntel Core i5-1135G7 (4C / 8T, 2.4 / 4.2GHz, 8MB)\r\nNVIDIA GeForce MX350 2GB GDDR5\r\n4GB Soldered DDR4-3200 + 4GB SO-DIMM DDR4-3200\r\nOne memory soldered to systemboard, one DDR4 SO-DIMM slot, dual-channel capable\r\nMax Memory: Up to 12GB (4GB soldered + 8GB SO-DIMM) DDR4-3200 offering\r\n512GB SSD M.2 2242 PCIe 3.0x4 NVMe', 'tersedia'),
(25, 2, 'ASUS VIVOBOOK K403FA', 8825000, 'asusvivbook.png', 'Specifications :\r\n\r\nIntel Core i5-8265U\r\nWindows 10 Home\r\n8Gb DDR4 SoDimm\r\n14.0\" (16:9) LED backlit FHD (1920x1080) 60Hz , Integrated Intel UHD Graphics 620\r\n512GB PCIe® Gen3 x2 SSD\r\nIlluminated chiclet keyboard\r\nMulti-format card reader (SD/SDXC) , HDWebcam\r\nIntegrated Wireless + Bluetooth v4.2', 'tersedia'),
(26, 1, 'HP 14S-DQ2622TU', 7299000, 'hp.png', 'Specifications :\r\n\r\nWindows 11 Home\r\nIntel® Core™ i3-1115G4 , Chipset Intel® Integrated SoC\r\n4 GB DDR4-2666 MHz RAM (1 x 4 GB)\r\n512 GB PCIe® NVMe™ M.2 SSD\r\nD35.6 cm (14\") diagonal, FHD (1920 x 1080), IPS, micro-edge, BrightView, 250 nits, 45% NTSC\r\n35.6 cm (14\")\r\nIntel® UHD Graphics', 'tersedia'),
(27, 2, 'LENOVO YOGA C640', 14695000, 'yogac640.png', 'Specifications :\r\n\r\n13.3\" FHD (1920 x 1080) IPS, anti-glare, touchscreen, 300 nits\r\n10th Generation Intel® Core™ i7-10510U Processor (1.80 GHz, up to 4.90 GHz with Turbo Boost, 4 Cores, 8 MB Cache)\r\n16 GB DDR4 2400MHz (Soldered)\r\n512 GB PCIe SSD\r\nIntegrated Intel® UHD Graphics\r\nWindows 10 Home (64 bit) + Office Home Student\r\nUser-facing stereo speakers, Dolby Audio™ headphone system, Far-field microphones', 'tersedia'),
(28, 2, 'DELL INSPIRON 15-3585', 8750000, 'dellinspiron.png', 'Specifications :\r\n\r\nIntel Core™ I5-1135G7 ( 4.20 GHz - Frekuensi Turbo | 4 Core 8 Threads )\r\n8GB DDR4/ 16GB DDR4 ( Manual Upgrade )\r\n256GB M.2 NVMe™\r\nScreen 15.6-inch FHD WVA PANEL 45%NTSC\r\nIntel® IrisXe Graphic , Windows 11 Home\r\nFREE OFFICE HOME STUDENT ORIGINAL , Numpad Keyboard', 'tersedia'),
(29, 2, 'ACER SWIFT 3 SF314-42', 7200000, 'acerswiift3.png', 'Specifications :\r\n\r\nAMD Ryzen™ 5 5500U Hexa-Core processor (up to 8 MB L2 cache, up to 4.0 GHz)\r\n16GB onboard LPDDR4X Dual Channel Memory\r\n512 GB SSD PCIe Gen4 NVMe\r\n14\" IPS Full HD 1920 x 1080, 100% sRGB, high-brightness (300nits) Windows 11', 'tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `slide_show`
--

CREATE TABLE `slide_show` (
  `idSlide` int(11) NOT NULL,
  `namaSlide` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slide_show`
--

INSERT INTO `slide_show` (`idSlide`, `namaSlide`) VALUES
(2, 'banner_legion.jpg'),
(3, 'banner_macbook.png'),
(5, 'banner_rog.png');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `idVideo` int(11) NOT NULL,
  `namaVideo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`idVideo`, `namaVideo`) VALUES
(5, 'testimoni.mp4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`idCheckout`),
  ADD KEY `idProduk` (`idProduk`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`username`,`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`idPelanggan`,`username`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_produk` (`nama_produk`),
  ADD KEY `kategori_produk` (`kategori_id`);

--
-- Indexes for table `slide_show`
--
ALTER TABLE `slide_show`
  ADD PRIMARY KEY (`idSlide`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`idVideo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `idCheckout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `idPelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `slide_show`
--
ALTER TABLE `slide_show`
  MODIFY `idSlide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `idVideo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `checkout_ibfk_1` FOREIGN KEY (`idProduk`) REFERENCES `produk` (`id`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `kategori_produk` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
