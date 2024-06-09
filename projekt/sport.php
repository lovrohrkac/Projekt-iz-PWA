<h1><a href="index.php?menu=3">Sport</a></h1>
<?php
include 'connect.php';
?>
<section class="sport">
<?php
$query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='sport' ORDER BY id DESC";
$result = mysqli_query($dbc, $query);
 $i=0;
 echo '<div class="resetka">';
 while($row = mysqli_fetch_array($result)) {
 echo '<article>';
 echo'<div class="article">';
 echo '<div class="sport_img">';
 echo '<a href="clanak.php?id='.$row['id'].'">';
 echo '<img id="slika" src="' . 'img/' . $row['slika'] . '"/>';
 echo '</a></h4>';
 echo '</div>';
 echo '<div class="media_body">';
 echo '<h4 class="title">';
 echo '<a href="clanak.php?id='.$row['id'].'">';
 echo $row['naslov'];
 echo '</a></h4>';
 echo '</div></div>';
 echo '</article>';
 }
 echo '</div>';
 ?>
</section>


<?php
/*
echo '<section>

<h1>Sport</h1>
<div class="resetka">
<div><img src="slike/kišobran.jpg"/><h2>Šestinski kišobran</h2><p>Tradicijski kišobran koji nosi oznaku „Izvorno hrvatsko” Hrvatske gospodarske komore</p> <h2>10.50 eura</h2></div>
<div><img src="slike/nosnja.jpg"/><h2>Šestinska narodna nošnja</h2><p>Tradicijska nošnja Šestina i okolnih kvartova</p> <h2>33.00 eura</h2></div>
<div><img src="slike/mrkve.jpg"/><h2>Mrkva</h2><p>Najfinija mrkva za juhu</p> <h2>2.22 eura</h2></div>
<div><img src="slike/med.jpeg"/><h2>Med</h2><p>Domaći, potpuno prirodan med</p> <h2>5.50 eura</h2></div>
<div><img src="slike/jagode.jpg"/><h2>Jagode</h2><p>Prve ovogodišnje jagode</p> <h2>3.50 eura</h2></div>
<div><img src="slike/jabuka.jpg"/><h2>Jabuke</h2><p>Neprskane crvene jabuke</p> <h2>1.23 eura</h2></div>
</div>

</section>';

*/
?>