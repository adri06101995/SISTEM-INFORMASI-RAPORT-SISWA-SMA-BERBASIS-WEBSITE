-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2020 at 01:34 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sekolah`
--
CREATE DATABASE IF NOT EXISTS `sekolah` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sekolah`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE IF NOT EXISTS `tb_guru` (
  `nip` varchar(20) NOT NULL,
  `nama_guru` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `jk` text NOT NULL,
  `status_guru` text NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` text NOT NULL,
  `foto` text NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`nip`, `nama_guru`, `username`, `password`, `no_tlp`, `alamat`, `jk`, `status_guru`, `tempat_lahir`, `tanggal_lahir`, `agama`, `foto`) VALUES
('1231243535', 'Syamsul Huda', 'syamsul', 'syamsul', '081243546758', 'Mandala', 'Laki-laki', 'PNS', 'Surabaya', '1995-10-23', 'ISLAM', '5cfe55fff4045.jpg'),
('1242334522', 'Ulfiyah', 'ulfiyah', 'ulfiyah', '081267853454', 'Samaofa', 'Perempuan', 'Honor', 'Muna', '1994-03-12', 'ISLAM', '5cfe56ddae696.jpg'),
('23235364546', 'Amaludin', 'amaludin', 'amaludin', 'amaludin', 'Waena', 'Laki-laki', 'Honor', 'Poso', '1989-09-01', 'ISLAM', '5cfe572cbe5d4.jpg'),
('238203842038', 'yayan ruhian', 'yayan', 'yayan', '086673766327', 'rusun pancoran', 'Laki-laki', 'Kontrak', 'terminal angkat', '2020-12-31', 'ISLAM', '5e7f217a92f69.jpg'),
('345345223', 'Faiz Najmuddin', 'faiz', 'faiz', '08345644343', 'Waena', 'Laki-laki', 'Kontrak', 'Buton', '1992-12-09', 'ISLAM', '5cfe578d8454c.jpg'),
('34564564645', 'Azkiyatin', 'azkiyatin', 'azkiyatin', '081287433489', 'Dok 98', 'Perempuan', 'PNS', 'Wamena', '1991-10-08', 'ISLAM', '5cfe580439cf6.jpg'),
('34945792457', 'Siti Inayah', 'siti', 'siti', '081212484398', 'Yoka', 'Perempuan', 'PNS', 'Bandung', '1985-12-09', 'ISLAM', '5cfe59528e36d.jpg'),
('4352705793', 'Sri Mulyati', 'sri', 'sri', '081234128957', 'Mando', 'Perempuan', 'PNS', 'Jember', '1991-07-12', 'ISLAM', '5cfe58f5ec8b0.jpg'),
('78901231', 'Jamal Adriyanto', 'jamal', 'jamal', '081232431124', 'Samofa', 'Laki-laki', 'Kontrak', 'Biak', '1995-10-06', 'ISLAM', '5cfe5594a7a7d.jpg'),
('89587237284', 'Sirojul Munir', 'sirojul', 'sirojul', '08122311231', 'Dolog', 'Laki-laki', 'Honor', 'Brebes', '1994-09-12', 'ISLAM', '5cfe567d00fbf.jpg'),
('9573495739', 'Agus Fahmi', 'agus', 'agus', '081234537856', 'Mandala', 'Laki-laki', 'Kontrak', 'Nabire', '1992-08-12', 'ISLAM', '5cfe58760c0b9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_japel`
--

CREATE TABLE IF NOT EXISTS `tb_japel` (
  `id_japel` varchar(5) NOT NULL,
  `id_kelas` varchar(5) NOT NULL,
  `id_thn_ajar` varchar(5) NOT NULL,
  `file` text NOT NULL,
  PRIMARY KEY (`id_japel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_japel`
--

INSERT INTO `tb_japel` (`id_japel`, `id_kelas`, `id_thn_ajar`, `file`) VALUES
('JD001', 'KL002', 'TH001', '5cbf1fcde3993.pdf'),
('JD002', 'KL003', 'TH003', '5cee98b580b7e.doc'),
('JD003', 'KL004', 'TH004', '5e7f22b36bd6e.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE IF NOT EXISTS `tb_kelas` (
  `id_kelas` varchar(5) NOT NULL,
  `id_walikelas` varchar(5) NOT NULL,
  `nama_kelas` text NOT NULL,
  `kapasitas` text NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `id_walikelas`, `nama_kelas`, `kapasitas`) VALUES
('KL001', 'WL001', 'Kelas X', '28'),
('KL002', 'WL002', 'Kelas XI', '28'),
('KL003', 'WL003', 'Kelas XII', '28'),
('KL004', 'WL006', 'kelas ipa 13', '40');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelsis`
--

CREATE TABLE IF NOT EXISTS `tb_kelsis` (
  `id_kelsis` varchar(5) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama_siswa` text NOT NULL,
  `id_kelas` varchar(5) NOT NULL,
  `id_thn_ajar` varchar(5) NOT NULL,
  PRIMARY KEY (`id_kelsis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelsis`
--

INSERT INTO `tb_kelsis` (`id_kelsis`, `nis`, `nama_siswa`, `id_kelas`, `id_thn_ajar`) VALUES
('KS001', '12324354', 'Rizal Arey', 'KL001', 'TH001'),
('KS002', '1234234', 'Sharul', 'KL001', 'TH001'),
('KS003', '13457623', 'Jamal Adriyanto', 'KL001', 'TH001'),
('KS004', '23412132', 'Akbar Tanjung', 'KL001', 'TH001'),
('KS005', '23415642', 'Fatur Akbar', 'KL002', 'TH002'),
('KS006', '34542345', 'Marlon Wanggai', 'KL002', 'TH002'),
('KS007', '67895463', 'Agus triyanto', 'KL002', 'TH002'),
('KS008', '78347656', 'Krisstovel Edoway', 'KL003', 'TH003'),
('KS009', '78901234', 'Herman Msen', 'KL003', 'TH003'),
('KS010', '98786574', 'Rian Kendek', 'KL003', 'TH003'),
('KS011', '99238437744', 'wiro sableng', 'KL004', 'TH004');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mapel`
--

CREATE TABLE IF NOT EXISTS `tb_mapel` (
  `id_mapel` varchar(5) NOT NULL,
  `nama_mapel` text NOT NULL,
  `nip` varchar(25) NOT NULL,
  PRIMARY KEY (`id_mapel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mapel`
--

INSERT INTO `tb_mapel` (`id_mapel`, `nama_mapel`, `nip`) VALUES
('MP002', 'IPA', '1234 '),
('MP003', 'Matematika', '347548'),
('MP004', 'Agama', '1231243535 '),
('MP005', 'PKN', '1242334522 '),
('MP006', 'Bahasa Indonesia', '23235364546 '),
('MP007', 'Bahasa Inggris', '345345223 '),
('MP008', 'Matematika', '34564564645 '),
('MP009', 'Ekonomi', '34945792457 '),
('MP010', 'Sosialogi', '4352705793 '),
('MP011', 'Geografi', '89587237284 '),
('MP012', 'Sejarah', '1242334522 '),
('MP013', 'Penjaskes', '9573495739 '),
('MP014', 'ilmu sihir tingkat dewa', '238203842038 ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_materi`
--

CREATE TABLE IF NOT EXISTS `tb_materi` (
  `id_materi` varchar(5) NOT NULL,
  `id_mapel` varchar(5) NOT NULL,
  `file` text NOT NULL,
  PRIMARY KEY (`id_materi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_materi`
--

INSERT INTO `tb_materi` (`id_materi`, `id_mapel`, `file`) VALUES
('MT001', 'MP002', '5ccfc74fedd60.doc'),
('MT002', 'MP014', '5e7f24353189a.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE IF NOT EXISTS `tb_nilai` (
  `id_nilai` varchar(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `id_kelas` varchar(6) NOT NULL,
  `tahun_ajaran` text NOT NULL,
  `mapel` text NOT NULL,
  `tgs1` int(3) NOT NULL,
  `tgs2` int(3) NOT NULL,
  `tgs3` int(3) NOT NULL,
  `uts` int(3) NOT NULL,
  `uas` int(3) NOT NULL,
  `rata` int(20) NOT NULL,
  PRIMARY KEY (`id_nilai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `nis`, `id_kelas`, `tahun_ajaran`, `mapel`, `tgs1`, `tgs2`, `tgs3`, `uts`, `uas`, `rata`) VALUES
('Nl001', '1234', 'KL002', '2016/2017', 'Matematika', 12, 12, 12, 12, 12, 0),
('Nl002', '12345', 'KL002', '2016/2017', 'Matematika', 12, 32, 12, 32, 12, 0),
('Nl003', '2342', 'KL003', '2016/2017', 'Matematika', 12, 34, 54, 6, 3, 0),
('Nl005', '12345', 'KL002', '2018/2019', 'IPA', 20, 30, 40, 50, 60, 40),
('Nl006', '2342', 'KL003', '2019/2020', 'Matematika', 60, 70, 80, 90, 60, 72),
('Nl007', '12345', 'KL002', '2018/2019', 'IPA', 20, 40, 80, 98, 78, 63),
('Nl008', '12324354', 'KL001', '2016/2017', 'IPA', 60, 78, 98, 70, 70, 75),
('Nl009', '1234234', 'KL001', '2016/2017', 'IPA', 89, 90, 80, 70, 60, 78),
('Nl010', '13457623', 'KL001', '2016/2017', 'IPA', 90, 90, 90, 90, 90, 90),
('Nl011', '23412132', 'KL001', '2016/2017', 'IPA', 60, 70, 80, 90, 60, 72),
('Nl012', '23415642', 'KL002', '2018/2019', 'Matematika', 78, 86, 78, 98, 70, 82),
('Nl013', '34542345', 'KL002', '2018/2019', 'Matematika', 67, 98, 78, 98, 68, 82),
('Nl014', '67895463', 'KL002', '2018/2019', 'Matematika', 78, 98, 78, 98, 90, 88),
('Nl015', '78347656', 'KL003', '2019/2020', 'Agama', 87, 98, 68, 67, 65, 77),
('Nl016', '78901234', 'KL003', '2019/2020', 'Agama', 80, 90, 70, 60, 80, 76),
('Nl017', '98786574', 'KL003', '2019/2020', 'Agama', 67, 87, 85, 75, 95, 82),
('Nl018', '13457623', 'KL001', '2016/2017', 'Geografi', 80, 86, 85, 75, 85, 82),
('Nl019', '99238437744', 'KL004', '2020/2021', 'ilmu sihir tingkat dewa', 60, 75, 80, 90, 85, 78);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengumuman`
--

CREATE TABLE IF NOT EXISTS `tb_pengumuman` (
  `id_pengumuman` varchar(5) NOT NULL,
  `tgl_pengumuman` text NOT NULL,
  `isi_pengumuman` text NOT NULL,
  PRIMARY KEY (`id_pengumuman`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengumuman`
--

INSERT INTO `tb_pengumuman` (`id_pengumuman`, `tgl_pengumuman`, `isi_pengumuman`) VALUES
('PN008', '29-May-2019', 'Di beritahukan kepada seluruh orang tua siswa bahwa pengambilan raport dilaksanakan pada hari senin tanggal 05 Agustus 2019. '),
('PN009', '10-Jun-2019', 'Di beritahukan kepada seluruh siswa untuk datang menghadiri kegiatan kerja bakti di sekolah pada tanggal 06 Agustus 2019.'),
('PN010', '10-Jun-2019', 'Diberitahukan kepada seluruh siswa yang belum mendaftarkan diri pada kegiatan pengembangan diri siswa agar segera mendaftar pada ketua kelas masing-masing. pendaftaran paling lambat tanggal 10 Agustus 2019.'),
('PN011', '28-Mar-2020', 'blblblblblblbblbllaasasa\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE IF NOT EXISTS `tb_siswa` (
  `nis` varchar(20) NOT NULL,
  `nama_siswa` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `level` text NOT NULL,
  `no_hp_ortu` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `jk` text NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` text NOT NULL,
  `foto` text NOT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `nama_siswa`, `username`, `password`, `level`, `no_hp_ortu`, `alamat`, `jk`, `tempat_lahir`, `tanggal_lahir`, `agama`, `foto`) VALUES
('12324354', 'Rizal Arey', 'rizal', 'rizal', 'siswa', '08563467213', 'Entrop', 'Perempuan', 'Jayapura', '1993-06-12', 'ISLAM', '5cfe4fff1c71f.jpg'),
('1234234', 'Sharul', 'sharul', 'sharul', 'siswa', '08223453478', 'koya', 'Laki-laki', 'Jayapura', '1996-10-12', 'ISLAM', '5cfe52163615a.jpg'),
('13457623', 'Jamal Adriyanto', 'jamal', 'jamal', 'siswa', '085623456787', 'Samofa', 'Laki-laki', 'Biak', '1995-10-06', 'ISLAM', '5cfe4e7e076a4.jpg'),
('23412132', 'Akbar Tanjung', 'akbar', 'akbar', 'siswa', '081254367896', 'Perumnas 12', 'Laki-laki', 'Makasar', '1995-08-23', 'ISLAM', '5cfe53d004478.jpg'),
('23415642', 'Fatur Akbar', 'fatur', 'fatur', 'siswa', '081234345678', 'Waena', 'Laki-laki', 'Jayapura', '1995-10-05', 'ISLAM', '5cfe5317a1380.jpg'),
('34542345', 'Marlon Wanggai', 'marlon', 'marlon', 'siswa', '082234567834', 'Pasar Ikan', 'Laki-laki', 'Serui', '1995-09-10', 'KRISTEN', '5cfe4f9eecf23.jpg'),
('67895463', 'Agus triyanto', 'agus', 'agus', 'siswa', '08523456784', 'Samofa', 'Laki-laki', 'Biak', '1996-08-14', 'ISLAM', '5cfe4f399d92d.jpg'),
('78347656', 'Krisstovel Edoway', 'kriss', 'kriss', 'siswa', '08223457338', 'Gang Sempit', 'Laki-laki', 'Nabire', '1996-12-09', 'KRISTEN', '5cfe52a09ede4.jpg'),
('78901234', 'Herman Msen', 'herman', 'herman', 'siswa', '08123412678', 'Yasdas', 'Laki-laki', 'Biak', '1995-08-12', 'KRISTEN', '5cfe546063417.jpg'),
('98786574', 'Rian Kendek', 'rian', 'rian', 'siswa', '085234562376', 'Asrama Korem', 'Laki-laki', 'Biak', '1996-02-14', 'ISLAM', '5cfe4ee0263eb.jpg'),
('99238437744', 'wiro sableng', 'wiro', 'wiro', 'siswa', '08434353', 'kolong jembatan', 'Laki-laki', 'goa jepang', '2020-12-31', 'ISLAM', '5e7f20ff914c4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_staf`
--

CREATE TABLE IF NOT EXISTS `tb_staf` (
  `nik` varchar(20) NOT NULL,
  `nama_staf` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `level` text NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` text NOT NULL,
  `alamat` text NOT NULL,
  `agama` text NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `foto` text NOT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_staf`
--

INSERT INTO `tb_staf` (`nik`, `nama_staf`, `username`, `password`, `level`, `tempat_lahir`, `tanggal_lahir`, `jk`, `alamat`, `agama`, `no_hp`, `foto`) VALUES
('1234', 'jamal ', '1234', '1234', 'Admin', 'biak', '2019-04-04', 'Laki-laki', 'Abepura', 'ISLAM', '085244642030', '5ccb04f4b2b4d.jpg'),
('4321', 'jamal adriyanto', 'admin', 'admin', 'Admin', 'biak', '2020-12-31', 'Laki-laki', 'samofa', 'ISLAM', '085244642030', '5ccb0129ab90f.jpg'),
('893294872394', 'iko uwais', 'iko', 'iko', 'staf biasa', 'mobil telkomsel', '2020-12-31', 'Laki-laki', 'belakang rutan', 'ISLAM', '08676567', '5e7f21f921ff8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_thn_ajar`
--

CREATE TABLE IF NOT EXISTS `tb_thn_ajar` (
  `id_thn_ajar` varchar(5) NOT NULL,
  `semester` text NOT NULL,
  `nama_thn_ajar` text NOT NULL,
  PRIMARY KEY (`id_thn_ajar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_thn_ajar`
--

INSERT INTO `tb_thn_ajar` (`id_thn_ajar`, `semester`, `nama_thn_ajar`) VALUES
('TH001', 'Ganjil', '2016/2017'),
('TH002', 'Genap', '2018/2019'),
('TH003', 'Ganjil', '2019/2020'),
('TH004', 'Genap', '2020/2021');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` varchar(20) NOT NULL,
  `nama_lengkap` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `level` text NOT NULL,
  `foto` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_wakel`
--

CREATE TABLE IF NOT EXISTS `tb_wakel` (
  `id_walikelas` varchar(5) NOT NULL,
  `nama_guruwali` text NOT NULL,
  PRIMARY KEY (`id_walikelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_wakel`
--

INSERT INTO `tb_wakel` (`id_walikelas`, `nama_guruwali`) VALUES
('WL001', 'Syamsul Huda'),
('WL002', 'Ulfiyah'),
('WL003', 'Amaludin'),
('WL004', 'Faiz Najmuddin'),
('WL005', 'Azkiyatin'),
('WL006', 'yayan ruhian');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
