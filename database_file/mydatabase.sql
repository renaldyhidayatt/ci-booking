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
