<?php
include 'connect.php';
# $_GET['menu']='5';


$picture = $_FILES['pphoto']['name'];
$title=$_POST['title'];
$about=$_POST['about'];
$content=$_POST['content'];
$category=$_POST['category'];
$date=date('d.m.Y.');
if(isset($_POST['archive'])){
 $archive=1;
}else{
 $archive=0;
}
$target_dir = 'img/'.$picture;




$sql="INSERT INTO vijesti (datum, naslov, sazetak, tekst, slika, kategorija,
arhiva) VALUES (?, ?, ?, ?, ?, ?, ?)";

   /* Inicijalizira statement objekt nad konekcijom */
$stmt=mysqli_stmt_init($dbc);

   /* Povezuje parametre statement objekt s upitom */
if (mysqli_stmt_prepare($stmt, $sql)){

   /* Povezuje parametre i njihove tipove s statement objektom */
   mysqli_stmt_bind_param($stmt,'sssssss',$date, $title, $about, $content, $picture,
   $category, $archive);

   /* Izvršava pripremljeni upit */
   mysqli_stmt_execute($stmt);
} 


/*
move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);
$query = "INSERT INTO vijesti (datum, naslov, sazetak, tekst, slika, kategorija,
arhiva) VALUES ('$date', '$title', '$about', '$content', '$picture',
'$category', '$archive')";
# echo $query;
$result = mysqli_query($dbc, $query) or die('Error querying database.');
mysqli_close($dbc);

*/


$newUrl = "index.php";
#$_GET['menu']='5';
header("Location: index.php?menu=5");
echo "USPJEH!";

?>