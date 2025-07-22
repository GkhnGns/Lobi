-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 22 Tem 2025, 21:02:57
-- Sunucu sürümü: 10.11.10-MariaDB-log
-- PHP Sürümü: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `u968988525_esc23db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ampayar`
--

CREATE TABLE `ampayar` (
  `amp_id` int(11) NOT NULL,
  `amp_domain` varchar(255) NOT NULL,
  `amp_sub` varchar(255) DEFAULT NULL,
  `amp_baslik` varchar(150) NOT NULL,
  `amp_iletisim` text NOT NULL,
  `amp_headerarkarenk` varchar(25) DEFAULT NULL,
  `amp_headeryazirenk` varchar(25) DEFAULT NULL,
  `amp_baslikarkarenk` varchar(25) DEFAULT NULL,
  `amp_baslikyazirenk` varchar(25) DEFAULT NULL,
  `amp_ilanarkarenk` varchar(25) DEFAULT NULL,
  `amp_ilanyazirenk` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `ampayar`
--

INSERT INTO `ampayar` (`amp_id`, `amp_domain`, `amp_sub`, `amp_baslik`, `amp_iletisim`, `amp_headerarkarenk`, `amp_headeryazirenk`, `amp_baslikarkarenk`, `amp_baslikyazirenk`, `amp_ilanarkarenk`, `amp_ilanyazirenk`) VALUES
(1, 'https://elaziglobi.com/amp', 'esc', 'Elazığ Lobi', 'https://api.whatsapp.com/send?phone=+40734043430', '#ce0056', '#ffffff', '#ce0056', '#ffffff', '#ce0056', '#ffffff');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `asistan`
--

CREATE TABLE `asistan` (
  `id` int(11) NOT NULL,
  `site_user` varchar(255) NOT NULL,
  `site_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `asistan`
--

INSERT INTO `asistan` (`id`, `site_user`, `site_pass`) VALUES
(1, 'admin', 'U2lmcmUuMjM1Njg5'),
(2, 'pavlus', 'LTMyMUFzZDMyMUFzZC0=');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id` int(11) NOT NULL,
  `siteadi` text NOT NULL,
  `logoyazi` varchar(20) NOT NULL,
  `meta` text NOT NULL,
  `anahtar` text NOT NULL,
  `telefon` text NOT NULL,
  `telefonyazi` text NOT NULL,
  `siteurl` text NOT NULL,
  `ampurl` text NOT NULL,
  `anasayfa` longtext NOT NULL,
  `yanpanel` longtext NOT NULL,
  `copyright` varchar(255) NOT NULL,
  `yanpanelbaslik` varchar(255) NOT NULL,
  `ustalanyazisi` text NOT NULL,
  `head` longtext NOT NULL,
  `footer` longtext NOT NULL,
  `mapsapi` text DEFAULT NULL,
  `analytics` varchar(50) DEFAULT NULL,
  `renk_arka` varchar(50) NOT NULL,
  `renk_headerarka` varchar(50) NOT NULL,
  `renk_headeryazi` varchar(50) NOT NULL,
  `renk_paketbaslik` varchar(50) NOT NULL,
  `renk_paketyazi` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `siteadi`, `logoyazi`, `meta`, `anahtar`, `telefon`, `telefonyazi`, `siteurl`, `ampurl`, `anasayfa`, `yanpanel`, `copyright`, `yanpanelbaslik`, `ustalanyazisi`, `head`, `footer`, `mapsapi`, `analytics`, `renk_arka`, `renk_headerarka`, `renk_headeryazi`, `renk_paketbaslik`, `renk_paketyazi`) VALUES
(1, 'Elazığ Lobi', 'Elazığ Lobi', 'Elazığ Escort, Elazığ Esc, Elazığ Eskort, Elazig lobi, Elazığ lobi, ', 'elazig escort, elazig eskort, elaziğ escort, elazığ escort, elazığ eskort, elaziğ eskort, elazığ esc, elazığ eskprt, elazig escirt,Elazig lobi,Elazığ lobi', '+40734043430', 'İlan Ver', 'https://elaziglobi.com/', 'https://elaziglobi.com/amp/', 'Sitemize Verilen İlanlardan, ilan ve reklam veren Telefon Numarası Sahibi Kişiler Sorumludur. Elazığ Lobi Sadece İlanları Yayınlamakla Sorumludur.', '<p>Elazığ Lobi&nbsp;Tamamı Gerçek Kişilerin Verdiği İlanları Yayınlayan Escort İlan Servisidir. Siteye İlan Verdirmek İçin Üstteki İLAN VER Butonuna Basmanız Yeterlidir.</p>\r\n', 'Copyright © 2025 Her Hakkı Saklıdır. kopyalanması, çoğaltılması ve dağıtılması halinde yasal haklarımız işletilecektir.', 'Elazığ Escort', '<h1><strong>ATM</strong>&#39;lerden para yatırmayın. Aksi halde biz sorumlu değiliz.<br />\r\n<strong>Farklı Numaralardan adımıza para istemektedirler. Lütfen itibar etmeyiniz.</strong></h1>\r\n', '', '<a href=\"//www.dmca.com/Protection/Status.aspx?ID=46c0a4d6-2e7d-4e59-a988-4b4f45b9b312\" title=\"DMCA.com Protection Status\" class=\"dmca-badge\"> <img src =\"https://images.dmca.com/Badges/dmca_protected_sml_120m.png?ID=46c0a4d6-2e7d-4e59-a988-4b4f45b9b312\"  alt=\"DMCA.com Protection Status\" /></a>  <script src=\"https://images.dmca.com/Badges/DMCABadgeHelper.min.js\"> </script>', '', 'G-EFRJ43801P', '#ffffff', '#ff0000', '#ffffff', '#a000cc', '#ffffff');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
  `baslik` varchar(255) NOT NULL,
  `aciklama` longtext NOT NULL,
  `resim` varchar(255) NOT NULL,
  `meta` text NOT NULL,
  `anahtar` text NOT NULL,
  `seo` varchar(255) NOT NULL,
  `odak_kelime` text DEFAULT NULL,
  `odak_link` text DEFAULT NULL,
  `paylasim` varchar(255) DEFAULT NULL,
  `tarih` varchar(255) NOT NULL,
  `saat` varchar(255) NOT NULL,
  `yil` varchar(255) NOT NULL,
  `hit` int(11) NOT NULL,
  `durum` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `etiketler`
--

CREATE TABLE `etiketler` (
  `id` int(11) NOT NULL,
  `konu` int(11) NOT NULL,
  `baslik` text NOT NULL,
  `seo` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gunluk`
--

CREATE TABLE `gunluk` (
  `auto` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `hit` varchar(200) CHARACTER SET latin5 COLLATE latin5_bin NOT NULL,
  `tarih` text CHARACTER SET latin5 COLLATE latin5_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `gunluk`
--

INSERT INTO `gunluk` (`auto`, `id`, `hit`, `tarih`) VALUES
(30, 27, '9', '22-07-2025'),
(29, 26, '6', '22-07-2025'),
(28, 25, '5', '22-07-2025'),
(27, 18, '5', '22-07-2025'),
(26, 13, '32', '12-07-2025'),
(25, 24, '8', '22-07-2025');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `baslik` varchar(255) NOT NULL,
  `odak` varchar(255) NOT NULL,
  `meta` text NOT NULL,
  `anahtar` text NOT NULL,
  `aciklama` longtext DEFAULT NULL,
  `seo` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`id`, `baslik`, `odak`, `meta`, `anahtar`, `aciklama`, `seo`) VALUES
(36, 'Elazığ', 'Elazığ Merkez', 'Elazığ\\\'daki kaliteli escortların tek adresi', 'elazığ escort, elazığ eskort,elazığ bayan,elazığ üniversiteli escort,elazığ otele gelen escort,elazığ türbanlı escort,elazığ gerçek escort,elazığ dul bayan,elazığ eve gelen escort', 'Elazığ&#39;daki kaliteli escortların tek adresi', 'elazig');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `linkler`
--

CREATE TABLE `linkler` (
  `id` int(11) NOT NULL,
  `baslik` text NOT NULL,
  `url` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `linkler`
--

INSERT INTO `linkler` (`id`, `baslik`, `url`) VALUES
(1, 'Elazığ', 'https://www.elaziglobi.com/');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resimler`
--

CREATE TABLE `resimler` (
  `id` int(11) NOT NULL,
  `uye_id` int(11) NOT NULL,
  `resim` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `resimler`
--

INSERT INTO `resimler` (`id`, `uye_id`, `resim`) VALUES
(2, 13, 'meltem-13-20220303233819-750a.jpg'),
(3, 13, 'meltem-13-20220303233819-7d70.jpg'),
(4, 13, 'meltem-13-20220303233819-7ddd.jpg'),
(5, 13, 'meltem-13-20220303233819-dbf7.jpg'),
(6, 13, 'meltem-13-20220303233819-99df.jpg'),
(7, 14, 'lale-14-20220303234850-dba6.jpg'),
(8, 14, 'lale-14-20220303234850-37ca.jpg'),
(9, 14, 'lale-14-20220303234850-79b3.jpg'),
(10, 14, 'lale-14-20220303234850-7228.jpg'),
(11, 14, 'lale-14-20220303234850-a263.jpg'),
(12, 15, 'ebru-15-20220304000106-22e6.jpg'),
(13, 15, 'ebru-15-20220304000106-7a38.jpg'),
(14, 15, 'ebru-15-20220304000106-e58c.jpg'),
(15, 15, 'ebru-15-20220304000106-65c7.jpg'),
(16, 15, 'ebru-15-20220304000106-7414.jpg'),
(17, 16, 'derya-16-20220304001928-ec05.jpg'),
(18, 16, 'derya-16-20220304001928-66e3.jpg'),
(19, 16, 'derya-16-20220304001928-e919.jpg'),
(20, 16, 'derya-16-20220304001928-bbe1.jpg'),
(21, 16, 'derya-16-20220304001928-3413.jpg'),
(22, 17, 'kader-17-20220304003402-9a97.jpg'),
(23, 17, 'kader-17-20220304003402-507e.jpg'),
(24, 17, 'kader-17-20220304003402-3d8d.jpg'),
(25, 17, 'kader-17-20220304003402-1f57.jpg'),
(26, 18, 'cansu-18-20220304053957-a2e1.jpg'),
(27, 18, 'cansu-18-20220304053957-89de.jpg'),
(28, 18, 'cansu-18-20220304053957-18c5.jpg'),
(29, 18, 'cansu-18-20220304053957-0b92.jpg'),
(30, 18, 'cansu-18-20220304053957-6f7d.jpg'),
(31, 19, 'efsun-19-20220308052446-755b.jpg'),
(32, 19, 'efsun-19-20220308052446-b9e5.jpg'),
(33, 19, 'efsun-19-20220308052446-a77b.jpg'),
(34, 19, 'efsun-19-20220308052446-dfa7.jpg'),
(35, 19, 'efsun-19-20220308052446-f710.jpg'),
(36, 20, 'selin-20-20220308053533-1159.jpg'),
(37, 20, 'selin-20-20220308053533-1b22.jpg'),
(38, 20, 'selin-20-20220308053533-21c4.jpg'),
(39, 20, 'selin-20-20220308053533-6317.jpg'),
(40, 20, 'selin-20-20220308053533-8ab0.jpg'),
(41, 20, 'selin-20-20220308053533-c823.jpg'),
(42, 21, 'gamze-21-20220308054041-4ddc.jpg'),
(43, 21, 'gamze-21-20220308054041-95e3.jpg'),
(44, 21, 'gamze-21-20220308054041-28bd.jpg'),
(45, 21, 'gamze-21-20220308054041-37bb.jpg'),
(46, 21, 'gamze-21-20220308054041-8692.jpg'),
(47, 22, 'betul-22-20220308222716-d09c.jpg'),
(48, 22, 'betul-22-20220308222716-5393.jpg'),
(49, 22, 'betul-22-20220308222716-2563.jpg'),
(50, 22, 'betul-22-20220308222716-780c.jpg'),
(51, 22, 'betul-22-20220308222716-9a24.jpg'),
(52, 22, 'betul-22-20220308222716-328c.jpg'),
(53, 22, 'betul-22-20220308222716-6f1b.jpg'),
(54, 23, 'idil-23-20220308224134-d1a3.jpg'),
(55, 23, 'idil-23-20220308224134-a103.jpg'),
(56, 23, 'idil-23-20220308224134-e5c8.jpg'),
(57, 23, 'idil-23-20220308224134-84c1.jpg'),
(58, 23, 'idil-23-20220308224134-8c79.jpg'),
(59, 23, 'idil-23-20220308224134-1543.jpg'),
(60, 23, 'idil-23-20220308224134-08e5.jpg'),
(61, 24, 'gizem-24-20220308225544-41d6.jpg'),
(62, 24, 'gizem-24-20220308225544-a619.jpg'),
(63, 24, 'gizem-24-20220308225544-ca67.jpg'),
(64, 24, 'gizem-24-20220308225544-3fa4.jpg'),
(65, 25, 'ruya-25-20220308230254-c26f.jpg'),
(66, 25, 'ruya-25-20220308230254-abb5.jpg'),
(67, 25, 'ruya-25-20220308230254-4d0e.jpg'),
(68, 25, 'ruya-25-20220308230254-1567.jpg'),
(69, 25, 'ruya-25-20220308230254-3827.jpg'),
(70, 25, 'ruya-25-20220308230254-e9d5.jpg'),
(79, 27, 'seval-27-20250712211015-f92d.jpg'),
(80, 26, 'vip-escort-cansu-26-20250714063852-9490.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeetiketler`
--

CREATE TABLE `uyeetiketler` (
  `id` int(11) NOT NULL,
  `konu` int(11) NOT NULL,
  `baslik` text NOT NULL,
  `seo` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `uyeetiketler`
--

INSERT INTO `uyeetiketler` (`id`, `konu`, `baslik`, `seo`) VALUES
(427, 26, 'Temiz ve güvenli Escort', 'temiz-ve-guvenli-escort'),
(426, 26, 'Temiz Escort', 'temiz-escort'),
(425, 26, 'Elazığ Eskort', 'elazig-eskort'),
(424, 26, 'Elazığ Escort Cansu', 'elazig-escort-cansu'),
(423, 26, 'Elazığ Cansu', 'elazig-cansu'),
(422, 26, 'Escort cansu', 'escort-cansu'),
(421, 26, 'elazig eskort', 'elazig-eskort'),
(420, 26, 'elazig esc', 'elazig-esc'),
(419, 26, 'elazığ esc', 'elazig-esc'),
(418, 26, 'elazığ escort', 'elazig-escort'),
(417, 27, 'elazig escort seval', 'elazig-escort-seval'),
(416, 27, 'eskort seval', 'eskort-seval'),
(415, 27, 'elazig escort seval', 'elazig-escort-seval'),
(414, 27, 'eskort seval', 'eskort-seval'),
(413, 27, 'elazig escort seval', 'elazig-escort-seval'),
(412, 27, 'eskort seval', 'eskort-seval'),
(411, 27, 'elazig escort seval', 'elazig-escort-seval'),
(410, 27, 'eskort seval', 'eskort-seval'),
(409, 18, 'Elazığ Escort Kumsal', 'elazig-escort-kumsal'),
(408, 27, 'elaig escort seval', 'elaig-escort-seval'),
(407, 27, 'eskort seval', 'eskort-seval'),
(406, 18, 'Elazığ Escort Kumsal', 'elazig-escort-kumsal'),
(405, 26, 'Temiz ve güvenli Escort', 'temiz-ve-guvenli-escort'),
(404, 26, 'Temiz Escort', 'temiz-escort'),
(403, 26, 'Elazığ Eskort', 'elazig-eskort'),
(402, 26, 'Elazığ Escort Cansu', 'elazig-escort-cansu'),
(401, 26, 'Elazığ Cansu', 'elazig-cansu'),
(400, 26, 'Escort cansu', 'escort-cansu'),
(399, 26, 'elazig eskort', 'elazig-eskort'),
(398, 26, 'elazig esc', 'elazig-esc'),
(397, 26, 'elazığ esc', 'elazig-esc'),
(396, 26, 'elazığ escort', 'elazig-escort'),
(395, 24, 'elazığ lobi', 'elazig-lobi'),
(394, 24, 'elazığ escort', 'elazig-escort'),
(393, 24, 'Elazığ Kızı Gizem', 'elazig-kizi-gizem'),
(392, 18, 'Elazığ Escort Kumsal', 'elazig-escort-kumsal'),
(391, 27, 'elaig escort seval', 'elaig-escort-seval'),
(390, 27, 'eskort seval', 'eskort-seval'),
(389, 27, 'elaig escort seval', 'elaig-escort-seval'),
(388, 27, 'eskort seval', 'eskort-seval'),
(387, 26, 'Temiz ve güvenli Escort', 'temiz-ve-guvenli-escort'),
(386, 26, 'Temiz Escort', 'temiz-escort'),
(385, 26, 'Elazığ Eskort', 'elazig-eskort'),
(384, 26, 'Elazığ Escort Cansu', 'elazig-escort-cansu'),
(383, 26, 'Elazığ Cansu', 'elazig-cansu'),
(382, 26, 'Escort cansu', 'escort-cansu'),
(381, 26, 'elazig eskort', 'elazig-eskort'),
(380, 26, 'elazig esc', 'elazig-esc'),
(379, 26, 'elazığ esc', 'elazig-esc'),
(378, 26, 'elazığ escort', 'elazig-escort'),
(377, 26, 'Temiz ve güvenli Escort', 'temiz-ve-guvenli-escort'),
(376, 26, 'Temiz Escort', 'temiz-escort'),
(375, 26, 'Elazığ Eskort', 'elazig-eskort'),
(374, 26, 'Elazığ Escort Cansu', 'elazig-escort-cansu'),
(373, 26, 'Elazığ Cansu', 'elazig-cansu'),
(372, 26, 'Escort cansu', 'escort-cansu'),
(371, 26, 'elazig eskort', 'elazig-eskort'),
(370, 26, 'elazig esc', 'elazig-esc'),
(369, 26, 'elazığ esc', 'elazig-esc'),
(368, 26, 'elazığ escort', 'elazig-escort'),
(367, 26, 'Temiz ve güvenli Escort', 'temiz-ve-guvenli-escort'),
(366, 26, 'Temiz Escort', 'temiz-escort'),
(365, 26, 'Elazığ Eskort', 'elazig-eskort'),
(364, 26, 'Elazığ Escort Cansu', 'elazig-escort-cansu'),
(363, 26, 'Elazığ Cansu', 'elazig-cansu'),
(362, 26, 'Escort cansu', 'escort-cansu'),
(361, 26, 'elazig eskort', 'elazig-eskort'),
(360, 26, 'elazig esc', 'elazig-esc'),
(359, 26, 'elazığ esc', 'elazig-esc'),
(358, 26, 'elazığ escort', 'elazig-escort'),
(357, 18, 'Elazığ Escort Kumsal', 'elazig-escort-kumsal'),
(356, 26, 'Temiz ve güvenli Escort', 'temiz-ve-guvenli-escort'),
(355, 26, 'Temiz Escort', 'temiz-escort'),
(354, 26, 'Elazığ Eskort', 'elazig-eskort'),
(353, 26, 'Elazığ Escort Cansu', 'elazig-escort-cansu'),
(352, 26, 'Elazığ Cansu', 'elazig-cansu'),
(351, 26, 'Escort cansu', 'escort-cansu'),
(350, 26, 'elazig eskort', 'elazig-eskort'),
(349, 26, 'elazig esc', 'elazig-esc'),
(348, 26, 'elazığ esc', 'elazig-esc'),
(347, 26, 'elazığ escort', 'elazig-escort'),
(346, 26, 'Temiz ve güvenli Escort', 'temiz-ve-guvenli-escort'),
(345, 26, 'Temiz Escort', 'temiz-escort'),
(344, 26, 'Elazığ Eskort', 'elazig-eskort'),
(343, 26, 'Elazığ Escort Cansu', 'elazig-escort-cansu'),
(342, 26, 'Elazığ Cansu', 'elazig-cansu'),
(341, 26, 'Escort cansu', 'escort-cansu'),
(340, 26, 'elazig eskort', 'elazig-eskort'),
(339, 26, 'elazig esc', 'elazig-esc'),
(338, 26, 'elazığ esc', 'elazig-esc'),
(337, 26, 'elazığ escort', 'elazig-escort'),
(336, 24, 'elazığ lobi', 'elazig-lobi'),
(335, 24, 'elazığ escort', 'elazig-escort'),
(334, 24, 'Elazığ Kızı Gizem', 'elazig-kizi-gizem'),
(333, 18, '', ''),
(332, 26, 'Temiz ve güvenli Escort', 'temiz-ve-guvenli-escort'),
(331, 26, 'Temiz Escort', 'temiz-escort'),
(330, 26, 'Elazığ Eskort', 'elazig-eskort'),
(329, 26, 'Elazığ Escort Cansu', 'elazig-escort-cansu'),
(328, 26, 'Elazığ Cansu', 'elazig-cansu'),
(327, 26, 'Escort cansu', 'escort-cansu'),
(326, 26, 'elazig eskort', 'elazig-eskort'),
(325, 26, 'elazig esc', 'elazig-esc'),
(324, 26, 'elazığ esc', 'elazig-esc'),
(323, 26, 'elazığ escort', 'elazig-escort'),
(322, 13, 'elazığ eve gelen escort', 'elazig-eve-gelen-escort'),
(321, 13, 'elazığ otele gelen escort', 'elazig-otele-gelen-escort'),
(320, 13, 'elazığ gerçek escort', 'elazig-gercek-escort'),
(319, 13, 'elazığ masaj salonu', 'elazig-masaj-salonu'),
(318, 13, 'elazığ elit escort', 'elazig-elit-escort'),
(317, 26, 'Temiz ve güvenli Escort', 'temiz-ve-guvenli-escort'),
(316, 26, 'Temiz Escort', 'temiz-escort'),
(315, 26, 'Elazığ Eskort', 'elazig-eskort'),
(314, 26, 'Elazığ Escort Cansu', 'elazig-escort-cansu'),
(313, 26, 'Elazığ Cansu', 'elazig-cansu'),
(278, 13, 'elazığ elit escort', 'elazig-elit-escort'),
(279, 13, 'elazığ masaj salonu', 'elazig-masaj-salonu'),
(280, 13, 'elazığ gerçek escort', 'elazig-gercek-escort'),
(281, 13, 'elazığ otele gelen escort', 'elazig-otele-gelen-escort'),
(282, 13, 'elazığ eve gelen escort', 'elazig-eve-gelen-escort'),
(312, 26, 'Escort cansu', 'escort-cansu'),
(311, 26, 'elazig eskort', 'elazig-eskort'),
(310, 26, 'elazig esc', 'elazig-esc'),
(309, 26, 'elazığ esc', 'elazig-esc'),
(289, 25, 'Elazığ 19 Yaşında Çıtır Escort Rüya', 'elazig-19-yasinda-citir-escort-ruya'),
(290, 25, 'elazığescort', 'elazigescort'),
(291, 24, 'Elazığ Kızı Gizem', 'elazig-kizi-gizem'),
(292, 24, 'elazığ escort', 'elazig-escort'),
(293, 24, 'elazığ lobi', 'elazig-lobi'),
(294, 24, 'Elazığ Kızı Gizem', 'elazig-kizi-gizem'),
(295, 24, 'elazığ escort', 'elazig-escort'),
(296, 24, 'elazığ lobi', 'elazig-lobi'),
(297, 13, 'elazığ elit escort', 'elazig-elit-escort'),
(298, 13, 'elazığ masaj salonu', 'elazig-masaj-salonu'),
(299, 13, 'elazığ gerçek escort', 'elazig-gercek-escort'),
(300, 13, 'elazığ otele gelen escort', 'elazig-otele-gelen-escort'),
(301, 13, 'elazığ eve gelen escort', 'elazig-eve-gelen-escort'),
(308, 26, 'elazığ escort', 'elazig-escort'),
(303, 24, 'Elazığ Kızı Gizem', 'elazig-kizi-gizem'),
(304, 24, 'elazığ escort', 'elazig-escort'),
(305, 24, 'elazığ lobi', 'elazig-lobi'),
(306, 25, 'Elazığ 19 Yaşında Çıtır Escort Rüya', 'elazig-19-yasinda-citir-escort-ruya'),
(307, 25, 'elazığescort', 'elazigescort');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `id` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
  `isim` varchar(255) NOT NULL,
  `telefon` varchar(255) NOT NULL,
  `sehir` varchar(255) NOT NULL,
  `semt` varchar(255) NOT NULL,
  `aciklama` longtext NOT NULL,
  `meta` text NOT NULL,
  `anahtar` text NOT NULL,
  `odak_kelime` varchar(255) NOT NULL,
  `odak_link` varchar(255) NOT NULL,
  `seviye` varchar(255) NOT NULL,
  `resim` varchar(255) DEFAULT NULL,
  `seo` varchar(255) NOT NULL,
  `durum` varchar(255) NOT NULL,
  `tarih` varchar(255) NOT NULL,
  `btarih` varchar(255) NOT NULL,
  `sira` int(11) NOT NULL,
  `hit` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `kategori`, `isim`, `telefon`, `sehir`, `semt`, `aciklama`, `meta`, `anahtar`, `odak_kelime`, `odak_link`, `seviye`, `resim`, `seo`, `durum`, `tarih`, `btarih`, `sira`, `hit`) VALUES
(18, 36, 'Kumsal', '0541 630 2421', 'Elazığ', 'Elazığ Merkez', 'Adı&nbsp;:&nbsp;Kumsal<br />\r\nSemt&nbsp;: Elazığ<br />\r\nGörüşme Yeri&nbsp;:&nbsp;OTEL &amp; EV &amp;APART&amp;REZİDANS<br />\r\nYaş&nbsp;:&nbsp;32<br />\r\nBoy&nbsp;:&nbsp;170<br />\r\nKilo&nbsp;:&nbsp;63<br />\r\nSaç Reni&nbsp;:&nbsp;SARIŞIN<br />\r\nFizik&nbsp;:&nbsp;SIKI VE DOLGUN', 'Elazığ Escort Kumsal', 'Elazığ Escort Kumsal', 'Elazığ Escort Kumsal', '1', 'platin', 'kumsal-20250713003648.png', 'kumsal', 'Yayında', '2022-03-04', '2025-08-08', 3, 596),
(24, 36, 'Gizem', '0535 878 47 43', 'Elazığ', 'Elazığ Merkez', '<h1>İsim<strong>:</strong>&nbsp;Gizem<br />\r\nYaş<strong>:</strong>&nbsp;22<br />\r\nKilo<strong>:</strong>&nbsp;55<br />\r\nBoy<strong>:</strong>&nbsp;170<br />\r\nUyruk<strong>:</strong>&nbsp;Türk<br />\r\nSemt<strong>:</strong>&nbsp;&nbsp;Elazığ<br />\r\nGörüşme Yeri<strong>:</strong>&nbsp;Ev, Hotel, Apart ve Rezidans</h1>\r\n', 'Elazığ Kızı Gizem', 'Elazığ Kızı Gizem,elazığ escort,elazığ lobi', 'Elazığ Kızı Gizem', '', 'platin', 'gizem-20250713002726.jpg', 'gizem', 'Yayında', '2022-03-08', '2025-08-08', 4, 493),
(25, 36, 'RÜYA', '0535 878 47 43', 'Elazığ', 'Elazığ', '<h1>İsim<strong>:</strong>&nbsp;Rüya<br />\r\nYaş<strong>:</strong>&nbsp;19<br />\r\nKilo<strong>:</strong>&nbsp;55<br />\r\nBoy<strong>:</strong>&nbsp;170<br />\r\nUyruk<strong>:</strong>&nbsp;Türk<br />\r\nSemt<strong>:</strong>&nbsp; Elazığ<br />\r\nGörüşme Yeri<strong>:</strong>&nbsp;Ev, otel ve Rezidans</h1>\r\n', 'Elazığ 19 Yaşında Çıtır Escort Rüya', 'Elazığ 19 Yaşında Çıtır Escort Rüya,elazığescort', 'Elazığ 19 Yaşında Çıtır Escort Rüya', '', 'gold', 'ruya-20220308230220.jpg', 'ruya', 'Yayında', '2022-03-08', '2025-08-08', 4, 416),
(26, 36, 'Vip Escort Cansu', '05321773874', 'Elazığ', 'Elazığ Merkez', 'Merhaba Elit Beyler, Ben Cansu, Kısa süreliğine Elazığdayım. Kendine güvenen, temizliğine özel gösteren elit beyler ararsa sevinirim.<br />\r\nEv, Otel ve Rezidanslarda görüşmelerimi yapıyorum.<br />\r\n<br />\r\nKendi Yerim Yok.', 'Elazığ Cansu, Elazığ Escort Cansu, Elazığ Eskort, Temiz Escort, Temiz ve güvenli Escort', 'elazığ escort, elazığ esc, elazig esc, elazig eskort, Escort cansu,Elazığ Cansu, Elazığ Escort Cansu, Elazığ Eskort, Temiz Escort, Temiz ve güvenli Escort', 'elazığ escort, elazığ esc, elazig esc, elazig eskort, Escort cansu', '1', 'platin', 'vip-escort-cansu-20250713003027.jpg', 'vip-escort-cansu', 'Yayında', '2025-07-12', '2025-08-12', 2, 425),
(27, 36, 'Seval', '05530405023', 'Elazığ', 'Elazığ Merkez', 'Merhaba Elit Beyler, Ben esmer bomba Seval. Kendine güvenen, temizliğine özel gösteren elit beyler ararsa sevinirim.<br />\r\nEv, Otel ve Rezidanslarda görüşmelerimi yapıyorum.<br />\r\n<br />\r\nSemt&nbsp;: Elazığ<br />\r\nGörüşme Yeri&nbsp;:&nbsp;OTEL &amp; APART &amp; REZİDANS<br />\r\nYaş&nbsp;: 22<br />\r\nBoy&nbsp;:&nbsp;168<br />\r\nKilo&nbsp;: 58<br />\r\nSaç Reni&nbsp;:&nbsp;SİYAH<br />\r\nFizik&nbsp;:&nbsp;SIKI VE DOLGUN', 'Elazığ seval, Elazığ Escort seval, Elazığ Eskort, Temiz Escort, Temiz ve güvenli Escort', 'eskort seval,elazig escort seval', 'elazığ escort, elazığ esc, elazig esc, elazig eskort, Escort seval', '', 'platin', 'seval-20250714094817.png', 'seval', 'Yayında', '2025-07-12', '2025-07-26', 1, 408);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ampayar`
--
ALTER TABLE `ampayar`
  ADD PRIMARY KEY (`amp_id`);

--
-- Tablo için indeksler `asistan`
--
ALTER TABLE `asistan`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `etiketler`
--
ALTER TABLE `etiketler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `gunluk`
--
ALTER TABLE `gunluk`
  ADD PRIMARY KEY (`auto`);

--
-- Tablo için indeksler `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `linkler`
--
ALTER TABLE `linkler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `resimler`
--
ALTER TABLE `resimler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uyeetiketler`
--
ALTER TABLE `uyeetiketler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ampayar`
--
ALTER TABLE `ampayar`
  MODIFY `amp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `asistan`
--
ALTER TABLE `asistan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Tablo için AUTO_INCREMENT değeri `etiketler`
--
ALTER TABLE `etiketler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- Tablo için AUTO_INCREMENT değeri `gunluk`
--
ALTER TABLE `gunluk`
  MODIFY `auto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Tablo için AUTO_INCREMENT değeri `linkler`
--
ALTER TABLE `linkler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Tablo için AUTO_INCREMENT değeri `resimler`
--
ALTER TABLE `resimler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- Tablo için AUTO_INCREMENT değeri `uyeetiketler`
--
ALTER TABLE `uyeetiketler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=428;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
