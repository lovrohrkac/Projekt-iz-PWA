

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header>
<img id="logo" src="img/zgtimes.png"/>
<nav>

<?php
include("menu.php");
?>

</nav>
</header>

<main>
<?php
include 'connect.php';
define('UPLPATH', 'img/');
    $id   = (int)$_GET['id'];
    $query = "SELECT * FROM vijesti WHERE id=$id";

    $result = mysqli_query($dbc, $query);
    
    $result = mysqli_fetch_array($result);
    ?>

<section role="main" id="clanak">
 <div class="row">
 <h1 id="naslov" class="title"><?php
 echo $result['naslov'];
 ?></h1>
 <p>Objavljeno <?php
 echo "<span>".$result['datum']."</span>";
 ?></p>
 </div>
 <section class="slika">
 <?php
 echo '<img id="slika" src="' . UPLPATH . $result['slika'] . '"/>';
 ?>
 </section>
 <section class="about">
 <p>
 <?php
 echo "<i>".$result['sazetak']."</i>";
 ?>
 </p>
 </section>
 <section class="sadrzaj">

 <?php
echo '<pre>'.$result['tekst'].'</pre>';
 ?>

<?php
 echo '<title>'.$result['naslov'].'</title>';
 ?>
 </section>
 </section>
 </main>


 <footer>
<?php
print"<div>© Lovro Hrkać lhrkac@tvz.hr ". date('Y') . '.</div>';
?>
</footer>

</body>
</html>

