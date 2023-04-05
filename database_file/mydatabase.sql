CREATE TABLE `booking` (
  `id_booking` varchar(12) NOT NULL,
  `tgl_booking` date NOT NULL,
  `batas_ambil` date NOT NULL,
  `id_user` int(11) NOT NULL
);

CREATE TABLE `booking_detail` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `id_booking` varchar(12) NOT NULL,
  `id_buku` int(11) NOT NULL
);

CREATE TABLE `buku` (
  `id` int(30) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `judul_buku` varchar(128) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `pengarang` varchar(64) NOT NULL,
  `penerbit` varchar(64) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `isbn` varchar(64) NOT NULL,
  `stok` int(11) NOT NULL,
  `dipinjam` int(11) NOT NULL,
  `dibooking` int(11) NOT NULL,
  `image` varchar(256) DEFAULT "book-default-cover.jpg"
);

CREATE TABLE `detail_pinjam` (
  `no_pinjam` varchar(12) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `denda` int(11) NOT NULL
);

CREATE TABLE `kategori` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `kategori` varchar(45) NOT NULL
);

CREATE TABLE `menu` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `menu` varchar(128) NOT NULL
);

CREATE TABLE `pinjam` (
  `no_pinjam` varchar(12) PRIMARY KEY NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `id_booking` varchar(12) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `status` ENUM ('Pinjam', 'Kembali') NOT NULL DEFAULT "Pinjam",
  `total_denda` int(11) NOT NULL
);

CREATE TABLE `role` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL
);

CREATE TABLE `temp` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `tgl_booking` datetime DEFAULT NULL,
  `id_user` varchar(12) NOT NULL,
  `email_user` varchar(128) DEFAULT NULL,
  `Id_buku` int(11) DEFAULT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `penulis` varchar(128) NOT NULL,
  `penerbit` varchar(128) NOT NULL,
  `tahun_terbit` year(4) NOT NULL
);

CREATE TABLE `user` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `tanggal_input` int(11) NOT NULL
);


INSERT INTO `buku` (`id`, `judul_buku`, `id_kategori`, `pengarang`, `penerbit`, `tahun_terbit`, `isbn`, `stok`, `dipinjam`, `dibooking`, `image`) VALUES
(1, 'Statistika dengan Program Komputer', 1, 'Ahmad Kholiqul Amin', 'Deep Publish', 2022, '9786022809432', 5, 1, 2, 'img1557402455.jpg'),
(2, 'Mudah Belajar Komputer untuk Anak', 1, 'Bambang Agus Setiawan', 'Huta Media', 2014, '9786025118500', 5, 3, 1, 'img1557402397.jpg'),
(3, 'PHP Komplet', 1, 'Jubilee', 'Elex Media Komputindo', 2017, '8346753547', 5, 1, 1, 'img1555522493.jpg'),
(4, 'Detektif Conan Ep 200', 9, 'Okigawa sasuke', 'Cultura', 2016, '874387583987', 5, 0, 0, 'img1557401465.jpg'),
(5, 'Bahasa Indonesia', 2, 'Umri Nur\'aini dan Indriyani', 'Pusat Perbukuan', 2015, '757254724884', 3, 0, 0, 'img1557402703.jpg'),
(6, 'Komunikasi Lintas Budaya', 5, 'Dr. Dedy Kurnia', 'Published', 2015, '878674646488', 5, 0, 0, 'img1557403156.jpg'),
(7, 'Kolaborasi Codeigniter dan Ajax dalam Perancangan CMS', 1, 'Anton Subagia', 'Elex Media komputindo', 2017, '43345356577', 5, 0, 0, 'img1557403502.jpg'),
(8, 'From Hobby to Money', 4, 'Deasylawati', 'Elex Media Komputindo', 2015, '87968686787879', 5, 0, 0, 'img1557403658.jpg'),
(9, 'Buku Saku Pramuka', 8, 'Rudi Himawan', 'Pusat Perbukuan', 2016, '97868687978796', 6, 0, 0, 'img1557404613.jpg'),
(10, 'Rahasia Keajaiban Bumi', 3, 'Nurul Ihsan', 'Luxima', 2014, '565756565768868', 5, 0, 0, 'img1557404689.jpg');
