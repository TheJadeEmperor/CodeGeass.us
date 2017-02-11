-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 23, 2010 at 09:16 PM
-- Server version: 5.1.43
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `codegeas_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `affiliate`
--

CREATE TABLE IF NOT EXISTS `affiliate` (
  `rec` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(2) NOT NULL,
  `contact` varchar(1) NOT NULL,
  `respond` varchar(1) NOT NULL,
  `affiliate` varchar(1) NOT NULL,
  `subscribe` varchar(1) NOT NULL,
  `list` varchar(1) NOT NULL,
  PRIMARY KEY (`rec`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Dumping data for table `affiliate`
--

INSERT INTO `affiliate` (`rec`, `name`, `url`, `email`, `type`, `contact`, `respond`, `affiliate`, `subscribe`, `list`) VALUES
(1, '7 Cardinal Sins', 'http://sevencardinalsins.proboards.com', 'aronic1302@gmail.com', 'fo', 'N', 'N', 'N', 'Y', ''),
(3, 'The Best Anime Sites ', 'http://thebestanimes.com', '', 'l', 'Y', 'N', 'N', 'Y', ''),
(2, 'geass.net', 'http://code-geass.net', '', 'w', 'Y', 'Y', 'Y', 'N', ''),
(4, 'Anime Requiem', 'http://animerequiem.itopsites.com', '', 'l', 'N', 'N', 'N', 'Y', ''),
(5, 'Demon Awakens', 'http://www.marheavenj.net/cgr2/', 'diana@marheavenj.net  ', 'f', 'Y', 'N', 'N', 'Y', ''),
(6, 'Stage 0', 'http://www.stage0.altervista.org', 'dorothy@marheavenj.net', 'w', 'Y', 'N', 'N', 'N', ''),
(7, 'Natsukage', 'http://geass.natsukage.nu/', 'fan@natsukage.nu', 'f', 'Y', 'N', 'N', 'N', ''),
(8, 'anime.akichigo.org', 'http://anime.akichigo.org/codegeass/', 'akizuki.hikoto@hotmail.co.jp', 'w', 'Y', 'Y', 'Y', 'N', ''),
(9, 'White Knight - Suzaku', 'http://leena.beautiful-beast.net/suzaku/', 'whiteknight_suzaku@yahoo.com ', 'f', 'Y', 'N', 'N', 'Y', ''),
(10, 'Lelouch', 'http://lelouch.dokkasou.net/', 'lelouch@dokkasou.net', 'f', 'Y', 'N', 'N', 'Y', ''),
(11, 'Code Knightmare', 'http://www.codeknightmare.com/', 'webmistress@codeknightmare.com', 'w', 'Y', 'N', 'N', 'N', ''),
(12, 'Lelouch', 'http://fan.sakuradreams.net/lelouch/', 'sakuradreams@gmail.com', 'f', 'Y', 'Y', 'N', 'N', ''),
(13, 'Milly', 'http://www.kiri-no-hana.net/milly/', 'akira@kiri-no-hana.net', 'f', 'Y', 'N', 'N', 'N', ''),
(14, 'Stage 0', 'http://www.stage0.altervista.org', 'Euphemia_Li_Britannia@hotmail.it', 'w', 'Y', 'N', 'N', 'N', ''),
(15, 'CC', 'http://cc.lamperouge.net/', 'kirie@sky-pirate.org', 'f', 'Y', 'N', 'N', 'N', ''),
(16, 'Kaidoku Funou', 'http://kaidoku.lamperouge.net/', 'twilightsview@yahoo.com', 'f', 'Y', 'N', 'N', 'N', ''),
(17, '', ' ', ' ', 'fo', 'Y', 'N', 'N', 'N', ''),
(18, 'Gilbert', 'http://fallingslowly.altervista.org/gilbert/', 'ransie@hotmail.com', 'f', 'Y', 'Y', 'Y', 'N', ''),
(19, 'Lelouch', 'http://lelouch.lamperouge.net/', 'kirie@sky-pirate.org', 'f', 'Y', 'N', 'N', 'N', ''),
(20, 'Get Blue Spheres', 'http://getbluespheres.kg13.com/', '', 'w', 'Y', 'Y', 'Y', 'N', ''),
(21, 'Want Midna Back', 'http://www.wantmidnaback.com/', 'geckat@gmail.com', 'fo', 'Y', 'Y', 'N', 'N', ''),
(22, ' ', ' ', ' ', 'w', 'Y', 'N', 'N', 'N', ''),
(23, 'Kira', 'http://kira.nu/', 'kuchiki.hime@gmail.com  ', 'w', 'Y', 'N', 'N', 'N', ''),
(24, 'Kallen', 'http://fans.aternal-abyss.net/hidden/', 'icery@atermal-abyss.net', 'f', 'Y', 'N', 'N', 'N', ''),
(25, 'Diethard Reid', 'http://sensational.villetta.nu/', 'marek@yours-to-break.net', 'f', 'Y', 'N', 'N', 'N', ''),
(26, 'Mosaic', 'http://mosaic.natsukage.nu/affiliates.php', 'fan@natsukage.nu', 'f', 'Y', 'N', 'N', 'N', ''),
(27, 'Schneizel', 'http://fan.dokkasou.net/schneizel/', 'fan@dokkasou.net  ', 'f', 'Y', 'N', 'N', 'N', ''),
(28, 'Schneizel & Lelouch', 'http://codegeass.org/aku/', 'fans@niamhme.net', 'f', 'Y', 'N', 'N', 'N', ''),
(29, 'Cornelia le Britannia', 'http://star-catcher.net/witch/', 'chiqui@asuran.net', 'f', 'Y', 'N', 'N', 'N', ''),
(30, 'Euphemia', 'http://euphemia.natsukage.nu/', 'rileth@black-arrow.org', 'f', 'Y', 'N', 'N', 'N', ''),
(31, 'Villeta Nu', 'http://fan.villetta.nu/', 'marek@yours-to-break.net', 'f', 'Y', 'N', 'N', 'Y', ''),
(32, 'forever', 'http://reiji-maigo.net/', 'marek@yours-to-break.net ', 'f', 'Y', 'N', 'N', 'N', ''),
(33, 'Jeremiah', 'http://jeremiah.natsukage.nu/', ' fan@natsukage.nu  ', 'f', 'Y', 'N', 'N', 'Y', ''),
(34, 'Lloyd', 'http://www.losstarot.net/lloyd', 'catchtherobin@gmail.com  ', 'f', 'Y', 'N', 'N', 'Y', ''),
(35, 'Test Website ', 'www.codegeass.us', 'louie.benjamin@gmail.com', 'fo', 'Y', 'N', 'N', 'N', ''),
(36, 'Animal X: Asaba Minato', 'http://fan.devilstrill.net/minato/', 'eravariel@hotmail.com', 'f', 'Y', 'N', 'N', 'Y', ''),
(37, ' ', ' ', ' ', '', 'Y', 'N', 'N', 'N', ''),
(51, 'Chess Piece', 'http://z11.invisionfree.com/Chess_Piece/', 'elbride_designs@yahoo.com', 'fo', 'Y', 'N', 'Y', 'Y', ''),
(38, 'Nina Einstein', 'http://broken.villetta.nu/', 'marek@yours-to-break.net  ', 'f', 'Y', 'N', 'N', 'Y', ''),
(39, 'Mao', ' http://mao.lamperouge.net/affiliates.php', 'kirie@sky-pirate.org', 'f', 'Y', 'N', 'N', 'Y', ''),
(40, 'Rolo', ' http://rolo.shinshoku.net/site.php', 'athrun@asukira.net', 'f', 'Y', 'N', 'N', 'Y', ''),
(41, 'Xingke', ' http://xingke.radiant-illusion.net/', 'ravennox@radiant-illusion.net ', 'f', 'Y', 'Y', 'Y', 'Y', ''),
(42, 'Anya', ' http://anya.star-song.org/ ', 'puresea.konbatiru@gmail.com', 'f', 'Y', 'Y', 'Y', 'Y', ''),
(43, 'Stage 0 ', 'http://www.stage0.altervista.org', ' miriallia@libero.it', 'w', 'Y', 'N', 'N', 'N', ''),
(44, 'Gino', 'http://fan.kira.nu/gino/', 'firstofme@gmail.com', 'f', 'Y', 'N', 'N', 'Y', ''),
(45, 'Allied Anime', 'http://alliedanime.com', 'admin@alliedanime.com', 'w', 'Y', 'Y', 'Y', 'N', ''),
(46, 'Gilbert and Cornelia', 'http://fallingslowly.altervista.org/fairytale/', 'ransie@hotmail.com', 'f', 'Y', 'Y', 'Y', 'Y', ''),
(47, 'Vibrations', 'http://fan.ethereal-world.net/cgmusic/', 'fan@ethereal-world.net', 'f', 'Y', 'Y', 'Y', 'Y', ''),
(48, 'Clovis & Lelouch', 'http://codegeass.org/waited/', 'fans@niamhme.net', 'f', 'Y', 'N', 'N', 'N', ''),
(49, '', '', ' ', 'fo', 'Y', 'N', 'N', 'N', ''),
(50, 'Jeremiah & Lelouch', 'http://codegeass.org/defender/', 'fans@niamhme.net', 'f', 'Y', 'N', 'N', 'N', ''),
(52, 'Sayoko', 'http://codegeass.org/sayoko/ ', 'fans@niamhme.net', 'f', 'Y', 'N', 'N', 'N', ''),
(53, 'Iasan Mink & Riki', 'http://across-my-skin.net/ank/riki', 'kellie@beautiful-beast.net', 'f', 'Y', 'Y', 'Y', 'N', ''),
(54, 'Gino & Anya', 'http://fuujin.org/ginoanya/', 'kanki@blazeawat.net', 'f', 'Y', 'N', 'N', 'N', ''),
(55, 'Lelouch & CC', 'http://rebellion.wild-snow.net/', 'kuchiki.hime@gmail.com', 'f', 'Y', 'N', 'N', 'N', ''),
(56, 'CC & Suzaku', 'http://fan.d-tecnolife.net/sxc/', 'hana@d-tecnolife.net', 'f', 'Y', 'N', 'N', 'N', ''),
(57, 'Gino & Kallen', 'http://www.marheavenj.net/ainotype', 'dorothy@marheavenj.net', 'f', 'Y', 'N', 'N', 'N', ''),
(58, 'Lelouch & Shirley', 'http://fated.villetta.nu/', 'marek@yours-to-break.net', 'f', 'Y', 'N', 'N', 'N', ''),
(59, 'Lelouch & Rolo', 'http://fan.jukkou.net/bond/', 'fan@jukkou.net', 'f', 'Y', 'N', 'N', 'N', ''),
(60, 'Bokura no Oukoku (Our Kingdom): Basil, Kyle Rei', 'http://our-kingdom.org/rei/', 'fan@dokkasou.net', 'f', 'Y', 'N', 'N', 'N', ''),
(61, 'Bokura no Oukoku (Our Kingdom): Nonaka Akira', 'http://fan.deathly-flower.net/akira/', 'admin@deathly-flower.net', 'f', 'Y', 'N', 'N', 'N', ''),
(62, 'Crimson Spell : Hallwill', 'http://our-kingdom.org/hallwill', 'fan@dokkasou.net', 'f', 'Y', 'N', 'N', 'N', ''),
(63, 'Finder no Hyouteki: Fei Long', 'http://www.mod-soul.net/feilong', 'garnet@mod-soul.net', 'f', 'Y', 'N', 'N', 'N', ''),
(67, '(Embracing Love): Iwaki Kyosuke', 'http://iwaki.mod-soul.net/', 'garnet@mod-soul.net', 'f', 'Y', 'N', 'N', 'N', ''),
(64, 'Finder no Hyouteki: Takaba Akihito', 'http://fan.liquid-ego.net/takaba/', 'liquid.ego.net@gmail.com', 'f', 'Y', 'N', 'N', 'N', ''),
(65, 'Gantz: Katou Masaru', 'http://katou.shinshoku.net/', 'athrun@asukira.net', 'f', 'Y', 'N', 'N', 'N', ''),
(66, 'Gantz: Reika', 'http://euonym.freehostia.com/reika/', 'lithiumxrose@gmail.com', 'f', 'Y', 'N', 'N', 'N', ''),
(68, '(Embracing Love): Kato Youji', 'http://fan.whiteplums.com/kato/', 'webmaster@rubyjuls.com', 'f', 'Y', 'N', 'N', 'N', ''),
(69, 'Junjou Romantica: Kamijou Hiroki', 'http://fan.jukkou.net/hiroki/omake.php', 'fan@jukkou.net', 'f', '', '', '', '', ''),
(70, 'Junjou Romantica: Kusama Nowaki', 'http://www.tieria-erde.net/heart/', 'tsuki.no.cookie@gmail.com', 'f', '', '', '', '', ''),
(71, 'Junjou Romantica: Miyagi You', 'http://fan.nocturnal-romance.net/you/', 'ritsuka.soubi@gmail.com ', 'f', '', '', '', '', ''),
(72, 'Junjou Romantica: Takahashi Misaki', 'http://misaki.ohmydarling.org/', 'sarah@ohmydarling.org ', 'f', '', '', '', '', ''),
(73, 'Junjou Romantica: Takatsuki Shinobu', 'http://fan.nocturnal-romance.net/shinobu/', 'ritsuka.soubi@gmail.com ', 'f', '', '', '', '', ''),
(74, 'Kizuna: Araki Masanori', 'http://across-my-skin.net/masa/', 'kellie @beautiful-beast [dot] net', 'f', '', '', '', '', ''),
(75, 'Kizuna: Sagano Kai', 'http://across-my-skin.net/kai/', 'kellie @beautiful-beast [dot] net', 'f', '', '', '', '', ''),
(76, 'Love Mode: Aoe Kiichi', 'http://wild-rock.org/kiichi/', 'mykafl@gmail.com', 'f', '', '', '', '', ''),
(77, 'Love Mode: Aoe Reiji', 'http://glassforte.com/reiji/', 'arionwing@gmail.com', 'f', 'Y', 'N', 'N', 'N', ''),
(78, 'Love mode: Shirakawa Naoya', 'http://fans.magical-intentions.com/naoya/', 'aikousha.fl@gmail.com <aikousha.fl@gmail.com>', 'f', '', '', '', '', ''),
(79, 'Mnemosyne no Musume-tachi: Asougi Rin', 'http://tieria-erde.net/immortal/', 'tsuki.no.cookie ( @ ) gmail.com <tsuki.no.cookie (', 'f', '', '', '', '', ''),
(80, 'No Money: Kanou Somuku', 'http://wild-rock.org/kanou/', 'mykafl@gmail.com', 'f', '', '', '', '', ''),
(81, 'Sex Pistols (Love Pistols): Fujiwara Shiro', 'http://across-my-skin.net/shiro/', 'kellie @ beautiful-beast [dot] net', 'f', '', '', '', '', ''),
(82, 'Sex Pistols (Love Pistols): Madarame Kunimasa', 'http://kunimasa.love-pistols.org/', 'fanlisting.sb@gmail[DOT]com', 'f', '', '', '', '', ''),
(83, 'Sex Pistols (Love Pistols): Madarame Yonekuni', 'http://across-my-skin.net/yonekuni/', 'kellie @ beautiful-beast [dot] net', 'f', '', '', '', '', ''),
(84, 'Sex Pistols (Love Pistols): Tsuburaya Norio', 'http://norio.love-pistols.org/', 'fanlisting.sb@gmail[DOT]com', 'f', '', '', '', '', ''),
(85, 'Three Wolves Mountain : Susugi Kaya', 'http://kaya.fatplushie.co.uk/', 'chanfan_65@yahoo[dot]co[dot]uk', 'f', '', '', '', '', ''),
(86, 'Under Grand Hotel (UGH): Owari Sen', 'http://across-my-skin.net/sen/', 'kellie @ beautiful-beast [dot] net', 'f', '', '', '', '', ''),
(87, 'Under Grand Hotel (UGH): Sword Fish', 'http://across-my-skin.net/sword/', 'kellie @ beautiful-beast [dot] net', 'f', '', '', '', '', ''),
(88, '801 Media', 'http://fans.magical-intentions.com/801media/', 'aikousha.fl @ gmail.com <aikousha.fl { @ } gma', 'f', '', '', '', '', '');
