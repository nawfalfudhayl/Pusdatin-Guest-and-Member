-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Mar 2023 pada 15.53
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pusdatin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `book`
--

CREATE TABLE `book` (
  `ID` varchar(45) NOT NULL,
  `Judul` varchar(255) NOT NULL,
  `JenisDok` varchar(255) NOT NULL,
  `Kategori` varchar(255) NOT NULL,
  `TahunTerbit` int(6) NOT NULL,
  `ISBN` varchar(255) NOT NULL,
  `Pengarang` varchar(60) NOT NULL,
  `Penerbit` varchar(45) NOT NULL,
  `Gambar` varchar(255) NOT NULL,
  `PDF` varchar(255) NOT NULL,
  `Sinopsis` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `book`
--

INSERT INTO `book` (`ID`, `Judul`, `JenisDok`, `Kategori`, `TahunTerbit`, `ISBN`, `Pengarang`, `Penerbit`, `Gambar`, `PDF`, `Sinopsis`) VALUES
('092374', 'Buku Saku Panduan Isolasi Mandiri', 'E-Book', 'Kesehatan', 2020, '2345', 'Human Initiative', 'Human Initiative', 'Buku-Saku-Panduan-Isolasi-Mandiri-Cover.png', 'Bekal Ramadhan  Idul Fithri (4)  Batalkah Puasa Saya (Muhammad Saiyid Mahadhir, Lc.,MAg.) .pdf', 'hehe'),
('1234', 'Mengukur Senyum Dunia', 'E-Book', 'Sosial', 2021, '1234', 'Risty Nuraisa', 'Airlangga', 'HI_BOOK_INDONESIA_R08_112421-120221201_173153.png', 'Belum Qadha Puasa Sudah Masuk Ramadhan Berikutnya (Muhammad Aqil Haidar, Lc) .pdf', 'yoi'),
('2345', 'Newsletter', 'E-Book', 'Berita', 2022, '3456', 'Human Initiative', 'Gramedia', 'Newsletter-Edisi-Desember-2022-HI-1_page-0001.jpg', 'Berbagi Faedah Fikih Puasa dari Matan Abu Syuja (Muhammad Abduh Tuasikal).pdf', 'yes'),
('532890', 'Dukungan UMKM Program Pulih Bersama', 'E-Book', 'Ekonomi', 2020, '4567', 'Human Initiative', 'Human Initiative', 'umkm.png', 'Hadits Puasa dari Bulughul Maram (Muhammad Abduh Tuasikal).pdf', 'asik'),
('782349', 'Skripsi Bahan Baku Nasi Bakar', 'E-Reference', 'Skripsi', 2021, '', 'Alek', 'Universitas Gunasagu', 'Amy.jpg', 'Keutamaan Puasa (Dr. Shalih bin Fauzan al-Fauzan).pdf', ''),
('82364', 'Buku Saku Relawan Human Initiative', 'ProductHI', 'Sosial', 2020, '', 'Human Initiative', 'Human Initiative', 'buku_saku_relawan.png', 'Mendulang Laba di Bulan Puasa (Percikan Iman) .pdf', ''),
('89213', 'Data Kerelawanan Human Initiative', 'SpecialMember', 'Data Human Initiative', 2017, '', 'Human Initiative', 'Human Initiative', 'data_kerelawanan.jpg', '', ''),
('89374', 'Menuju Indonesia Pulih dari Pandemi Covid-19', 'E-Book', 'Kesehatan', 2021, '5678', 'Human Initiative', 'Human Initiative', 'Buku-Katalog-COVID-19-Vaksinasi-rev-00520221201_172727.png', '', 'rel'),
('93279234', 'Program Bantuan Kemanusiaan Gempa Sulawesi', 'E-Book', 'Sosial', 2022, '6789', 'Sulawesi Response Program Learning', 'Human Initiative', 'Sulawesi-report-2.png', '', 'au');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `MemberID` int(11) NOT NULL,
  `NamaMember` varchar(60) NOT NULL,
  `EmailMember` varchar(255) NOT NULL,
  `Telp` varchar(13) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `PasswordMember` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`MemberID`, `NamaMember`, `EmailMember`, `Telp`, `Username`, `PasswordMember`) VALUES
(2, 'anopbau', 'anop@gmail.com', '0832488930123', 'anop', '12345678'),
(3, 'alek', 'nawfalfudhayl@gmail.com', '0832488930123', 'alekbenjamin', '12345678'),
(4, 'joni', 'joni@gmail.com', '0281318264871', 'johnidep', '12345678'),
(5, 'juan', 'juan@gmail.com', '0832488930123', 'juanalek', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`MemberID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `MemberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
