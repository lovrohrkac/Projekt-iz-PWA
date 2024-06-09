-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 07:35 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `prezime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `korisnicko_ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `lozinka` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'Ivan', 'Ivan', 'Ivan', '$2y$10$am8oAr6fsqTdbKrx5iVlb.BcCWFQiXfci.e1dxPg4Y7RjlAkz1aia', 1),
(2, 'Iva', 'Ivić', 'Iva', '$2y$10$hPDy617jzSPtrgKs0A4gpO.VG/mjkHzdu6.0AhPkQaCxWof4QGyZq', 0),
(11, 'a', 'a', 'Luka', '$2y$10$cmBbx0VY6AtpizzgPikSkOHgxBs.7TrWFwwiOPPG9LzvERdmyRf6a', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `naslov` varchar(300) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `sazetak` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `tekst` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `slika` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `kategorija` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(1, '31.05.2024.', 'U Osijeku održana Sportska konferencija Osječko-baranjske županije, ovogodišnje Europske regije sporta', 'Osijek, 28. svibnja 2024. - Na Sportskoj konferenciji Osječko-baranjske županije, organizirane u povodu dobivanja titule ovogodišnje Europske regije sporta istaknuta su dva prioriteta.', 'Osnovni cilj Osječko-baranjske županije, kao ovogodišnje Europske regije sporta (ERS), izgradnja je nove i poboljšanje postojeće sportske infrastrukture, ali i slanje poruke mladima o dobrobitima bavljenja sportom.\r\n\r\n\r\n\r\nGlavni tajnik Hrvatskog olimpijskog odbora (HOO) Siniša Krajač rekao je kako je ova konferencija jedan od dokaza dobre suradnje HOO-a i ove županije, koja dokazuje svu širinu svojih sportskih aktivnosti i čiji se gradovi redovito kandidiraju za sve projekte HOO-a, namijenjene razvoju sporta djece i mladih, što je i baza hrvatskog sporta.\r\n\r\n- Istok Hrvatske vrlo je bitan za zadržavanje mladih na ovome prostoru, a upravo je sport ona djelatnost, po kojoj se može vidjeti perspektiva. Ova županija ulaže u sport, a to rade samo oni koji se zalažu da im stanovništvo ostane živjeti na svojim prostorima - poručio je Krajač.\r\n\r\n\r\n\r\nDržavni tajnik Ministarstva turizma i sporta Tomislav Družak istaknuo je kako sportska zajednica Osječko-baranjske županije među najaktivnijima u Hrvatskoj, što se vidi kroz cijeli niz organizaranih konferencija i događanja te kroz dobru suradnju s Ministarstvom na provedbi projekata Vlade RH.\r\n\r\n- Preko županijskih sportskih zajednica, ove godine smo osigurali potpore veće od sedam milijuna eura, i tu je sportska zajednica ove Županije povukla najviše sredstava - dodao je Družak.\r\n\r\n\r\n\r\nOsječko-baranjski župan Mato Lukić ocijenio je kako je titula ERS-a na odličnoj adresi u ovoj županiji, u kojoj je 1784. u Osijeku, registrirana prva sportska udruga u Hrvatskoj - streljačko društvo.\r\n\r\n- Osnovni cilj Županije kao ERS-a je promidžba sporta, posebice djece i mladih, zbog čega ćemo poboljšati postojeću i izgraditi novu infrastrukturu, za što smo prošle i ove godine izdvojilo 800 tisuća eura, za naše jedinice lokalne samouprave, sportske udruge i klubove - rekao je Lukić.\r\n\r\n\r\n\r\nMeđimurski župan Matija Posavec podsjetio je kako je ta Županija titulu ERS nosila 2022. godine, a to je iskoristila kako bi obnovila sportsku infrastrukturu, igrališta te popularizirala profesionalni i rekreativni sport.\r\n\r\n- Posebno mi je drago da smo organizirali cijeli spektar aktivnosti bavljenja sportom za osobe s invaliditetom, tako da je to bila prilika koju smo dobro iskoristili - istaknuo je Posavec.\r\n\r\n\r\n\r\nKonferencija je okupila oko 200 sudionika, sportaša, sportskih djelatnika, predstavnika sportskih saveza i drugih dužnosnika. U sklopu skupa održana je panel-rasprava \"Europska regija sporta - jučer danas sutra\" i \"Sportska ostavština naših olimpijaca\", kao i nekoliko edukativnih radionica. ', 'siniša-krajač.jpg', 'sport', 0),
(2, '31.05.2024.', 'Stanišić: Njemačku trese nogometna euforija, naše navijače pogotovo', '- Njemačku trese nogometna euforija, naše navijače pogotovo, kazao je za web-stranicu HNS-a hrvatski nogometni reprezentativac Josip Stanišić, koji će se uskoro pridružiti Vatrenima na pripremama u Rijeci. ', '- Znam da neće biti jednostavno doći do ulaznica, ali isto tako znam da ćemo na Euru imati ogromnu podršku. Očekivanja? Najvažnije je da svi zdravi dočekamo prvenstvo, da, kao i uvijek, na terenu i van terena dišemo kao jedan i da damo svoj maksimum. U tom slučaju rezultat neće izostati, kazao je Stanišić, koji je imao sezonu iz snova. \r\n\r\n\r\n\r\nNa početku sezone došao je u Bayer Leverkusen na posudbu iz njemačkog velikana Bayerna da bi skupljao dragocjene minute i iskustvo igranja u jednoj od najboljih liga na svijetu, a njezin kraj dočekao kao jedan od heroja. Apotekari su prvi put u povijesti osvojili naslov njemačkog prvaka, a prije nekoliko dana ponijeli naslov osvajača njemačkog Kupa za duplu krunu. Mogla je biti i trostruka, ali Atalanta Marija Pašalića u finalu Europske lige jednostavno je bila bolja...\r\n\r\n\r\n\r\n- Nije to bio naš dan, Atalanta je igrala odlično i zaslužila osvojiti Europsku ligu. Drago mi je zbog Marija, čestitao sam mu poslije utakmice. Bez obzira na sve, nemamo za čime žaliti, odigrali smo sjajnu sezonu na koju možemo biti itekako ponosni. Jesam li umoran? Sezona je bila naporna, igrali smo na tri fronta i skupili maksimalan broj utakmica pa je nemoguće ne biti malo umoran. Međutim, isplatio se sav taj umor, kaže za hns.family Josip Stanišić, koji ni u snu nije mogao sanjati ovakav rasplet kad je na temelju jednogodišnjeg posudbenog ugovora postajao igrač Bayer Leverkusena.\r\n\r\n\r\n\r\n- Kakva je to ludnica bila na terenu. Naši su navijači puno prije kraja utakmice bili na travnjaku ili uz sami rub travnjaka, spremni proslaviti povijesnu titulu njemačkog prvaka. Pa onda sama proslava... Neviđeno! Cijeli život sjećat ću se tih fantastičnih trenutaka i znati da sam bio dio povijesti. Zbog ove sezone svi smo mi igrači preko noći postali legende. Vjerujem da se ovakva sezona neće tako brzo ponoviti. Uostalom, tijekom sezone smo izgubili samo jednu utakmicu. To nije mala stvar. Ne postoji samo jedna formula. U cijeloj toj priči trebalo je, naravno, i jako puno sreće, ali uspjeli smo. Pritom je jako bitno istaknuti činjenicu da nitko u momčadi nije bio ozbiljnije ozlijeđen, izuzev Bonifacea koji je pauzirao tri mjeseca, a i svatko je od nas igrača, rekao bih, nadmašio samoga sebe. I to se vidjelo na terenu, kazao je Stanišić koji ne zna gdje će igrati naredne sezone.\r\n\r\n\r\n\r\n- Predstavnici Bayerna bili su u kontaktu sa mnom tijekom sezone, cijenim što su mi čestitali na uspjesima, što je lijepa gesta na kojoj im zahvaljujem. Moja budućnost? Ugovor o posudbi mi je istekao, igrač sam Bayerna, i to je sve što u ovom trenutku mogu reći na tu temu. ', 'stanisic.jpg', 'sport', 0),
(3, '31.05.2024.', 'VATERPOLO: Splitski Jadran prvak Hrvatske', 'Vaterpolisti splitskog Jadrana slavili su u trećoj finalnoj utakmici PH u Poljudu protiv dubrovačkoga Juga s 11-8 (3-1, 4-3, 2-2, 2-1) te s glatkih 3-0 u pobjedama obranili naslov prvaka Hrvatske.', 'Jadran je lani, također u finalu protiv Juga, ali s 3-2, postao prvi put prvak.\r\n\r\nMarcelić i Fatović najbolji: Bili smo prava ekipa od početka sezone\r\nPerica Bukić dodijelio je nagradu Lorenu Fatoviću \r\nDvoboj u Splitu pripao je jadranašima, koji su u poluvremenu imali tri razlike, a s tom prednošću se ušlo i u zadnju četvrtinu. Splitska momčad je iskustvom sačuvala pobjedu i uslijedilo je slavlje izabranika Jure Marelje. \r\n\r\n\r\n\r\nKod Jadrana je Loren Fatović dao četiri, a Konstantin Harkov i Jere Marinić-Kragić po tri gola, dok se još u strijelce upisao i Josip Vrlić, a vratar Ivan Marcelić je imao 11 obrana. Kod Juga su po dva gola dali Franko Lazić i Maro Joković.\r\n\r\nVK Jadran - VK Jug Adriatic osiguranje \r\nVK Jadran - VK Jug Adriatic osiguranje\r\nFoto: Ivana Ivanovic / PIXSELL\r\nJug je ostao na 17 naslova.\r\n\r\n\r\nPrimorje EB osvojilo brončanu medalju\r\n\r\n\r\nUoči treće finalne utakmice u Splitu, u Rijeci je odigrana treća i zaključna utakmica za treće mjesto u Prvenstvu Hrvatske.\r\n\r\n\r\n\r\nPrimorje EB je izrazito uvjerljivo, neočekivano lagano i visoko, ali apsolutno zasluženo svladale gosta iz Zagreba, momčad Mladosti sa 16-7.\r\n\r\n\r\n\r\nOsvajači PH:\r\n\r\n2011./12. Jug (Dubrovnik)    \r\n\r\n2012./13. Jug (Dubrovnik) \r\n\r\n2013./14. Primorje (Rijeka)\r\n\r\n2014./15. Primorje (Rijeka)\r\n\r\n2015./16. Jug (Dubrovnik)  \r\n\r\n2016./17. Jug (Dubrovnik)  \r\n\r\n2017./18. Jug (Dubrovnik)  \r\n\r\n2018./19. Jug (Dubrovnik)  \r\n\r\n2019./20. Jug (Dubrovnik)  \r\n\r\n2020./21. Mladost (Zagreb)\r\n\r\n2021./22. Jug (Dubrovnik)\r\n\r\n2022./23. Jadran (Split)', 'VATERPOLO.jpg', 'sport', 0),
(4, '31.05.2024.', 'Prihvaćen program 70. Splitskog ljeta', 'Program 70. Splitskog ljeta prihvaćen je u utorak na sjednici Festivalskog vijeća kojim je predsjedala ministrica kulture i medija Nina Obuljen Koržinek. Jubilarno izdanje jednoga od najstarijih i najuglednijih kazališnih festivala u Hrvatskoj donosi četiri premijerna naslova - jedan operni, dva dramska i jedan baletni - te niz repriznih i gostujućih izvedbi uz bogat koncertni i popratni program. Festival će se održati od 15. srpnja do 14. kolovoza.', '- Program 70. Splitskog ljeta bogat je i ambiciozan, ali i u skladu s našim produkcijskim mogućnostima - izjavio je ravnatelj 70. Splitskog ljeta i intendant Hrvatskog narodnog kazališta Split Vicko Bilandžić: - U sklopu opernog programa izvest će se tri naslova. Premijerno će scenski biti postavljena kantata \"Carmina Burana\" Carla Orffa na Peristilu gdje tradicionalno otvaramo Splitsko ljeto. Izvedbama će ravnati maestro Ivan Hut, a režirat će je svjetski poznati operni redatelj Michał Znaniecki. Uz reprize nezaobilazne \"Aide\" na Peristilu i \"Era s onoga svijeta\" koji je sjajno zaživio na novoj pozornici na Benama, za završnicu festivala priprema se i operni gala-koncert u  Galeriji Meštrović, na jednoj od najatraktivnijih splitskih otvorenih scena - naglasio je ravnatelj Splitskog ljeta.  \r\n\r\n\"Gospođa Bovary\" baletna je premijera koreografkinje Valentine Turcu kojom se Splitsko ljeto nakon duljeg vremena vraća na scenu na Prokurativama, a reprizno će se na Benama izvesti i \"Veliki Gatsby\", jedna od najuspješnijih baletnih produkcija splitskog HNK posljednjih sezona. Dramski program donosi dva premijerna naslova - monodramu \"Judita\" u režiji Dražena Krešića kojom se, u meditativnom ambijentu crkve sv. Jere na Marjanu, obilježava 500 godina od smrti oca hrvatske književnosti Marka Marulića, te dramu \"Priče s trajekta\", autorski projekt redateljice Anice Tomić, dramskog pisca Ivora Martinića i dramaturginje Jelene Kovačić, te dvadesetak glumaca splitskog HNK i gostujućih glumaca. Izvedbom na trajektu privezanom na Gatu sv. Duje u splitskoj luci, Splitsko ljeto nastavlja tradiciju ambijentalnih predstava, jedne od ključnih značajki festivala. U repriznom dramskom programu Splitskog ljeta i ove godine svoj scenski život na Sustipanu nastavlja \"Smij i suze starega Splita\", najdugovječnija od aktualnih dramskih predstava festivala i splitskog teatra, a na Plinaru, u dvorište HNK Split vraća se i prošlogodišnja uspješnica \"Gazdarica\" uz atraktivne gostujuće dramske naslove. \r\n\r\nKoncertni je program raznovrstan, koncipiran u širokom stilskom spektru, s izvođačima od velikih do manjih ansambala i renomiranih solista sa snažnim naglaskom na hrvatske izvođače dokazane ne samo na domaćim nego i svjetskim scenama. Od Ladarica i Orkestra Hrvatske ratne mornarice do nastupa proslavljenog talijanskog tenora, operne zvijezde Fabija Armiliata, koji je nastupao u njujorškom Metropolitanu i milanskoj Scali, niz je glazbeničkih imena kojima će se obogatiti glazbeni program jubilarnog izdanja Splitskog ljeta. A u popratnom programu izdvaja se izložba 70. godina Splitskog ljeta kojom se i Muzej grada Splita pridružuje velikom jubileju.  \r\n\r\nU brojkama, 70. Splitsko ljeto donosi gotovo 50 scenskih izvedbi, od čega devet opernih, sedamnaest dramskih, četiri baletne te čak petnaest koncerata na šesnaest lokacija u gradu i van Splita. ', 'f_33236551_1280.jpg', 'kultura', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
