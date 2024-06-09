<?php
/*
include 'connect.php';
define('UPLPATH', 'img/');
?>
<section class="sport">
<?php
$query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='sport' LIMIT 4";
$result = mysqli_query($dbc, $query);
 $i=0;
  while($row = mysqli_fetch_array($result)) {
 echo '<article>';
 echo'<div class="article">';
 echo '<div class="sport_img">';
 echo '<img src="' . UPLPATH . $row['slika'] . '"';
 echo '</div>';
 echo '<div class="media_body">';
 echo '<h4 class="title">';
 echo '<a href="clanak.php?id='.$row['id'].'">';
 echo $row['naslov'];
 echo '</a></h4>';
 echo '</div></div>';
 echo '</article>';
 }?>
</section>
*/

include 'connect.php';


    if(isset($_GET['menu'])) { $menu   = (int)$_GET['menu']; }

    if(isset($_GET['action'])) { $action   = (int)$_GET['action']; }
	
	
    if(!isset($_POST['_action_']))  { $_POST['_action_'] = FALSE;  }
    
	if (!isset($menu)) { $menu = 1; }

    ?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header>
<img id="logo" src="img/zgtimes.png">
<nav>

<?php
include("menu.php");
?>

</nav>
</header>

<main>
<?php
if (!isset($menu) || $menu == 1) { 
    echo '<title>Naslovnica</title>';
    include("naslovnica.php"); 

}
	else if ($menu == 2) { 
        echo '<title>Kultura</title>';
        include("kultura.php"); 

    }
	else if ($menu == 3) { 
        echo '<title>Sport</title>';
        include("sport.php"); 
    }
    else if ($menu == 4) {
        echo '<title>Administracija</title>';
        include("administracija.php");
    }
    else if ($menu == 5) {
        echo '<title>Unos</title>';
        include("unos.html");
    }
    else if ($menu == 6) {
        echo '<title>Registracija</title>';
        include("registracija.php");
    }
?>

</main>


<footer>
<?php
print"<div>© Lovro Hrkać lhrkac@tvz.hr ". date('Y') . '.</div>';
?>
</footer>

</body>
</html>
