<h1><a href="index.php?menu=2">Kultura</a></h1>
<?php
include 'connect.php';
define('UPLPATH', 'img/');
?>
<section class="sport">
<?php
$query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='kultura' ORDER BY id DESC";
$result = mysqli_query($dbc, $query);
$i=0;
echo '<div class="resetka">';
while($row = mysqli_fetch_array($result)) {
echo '<article>';
echo'<div class="article">';
echo '<div class="sport_img">';
echo '<a href="clanak.php?id='.$row['id'].'">';
echo '<img id="slika" src="' . UPLPATH . $row['slika'] . '"/>';
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
