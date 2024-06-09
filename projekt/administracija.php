<?php
$uspjesnaPrijava='';


session_start();
include 'connect.php';
define('UPLPATH', 'img/');

if (isset($_POST['prijava'])) {

 $prijavaImeKorisnika = $_POST['username1'];
 $prijavaLozinkaKorisnika = $_POST['lozinka'];
 $sql = "SELECT korisnicko_ime, lozinka, razina FROM korisnik
 WHERE korisnicko_ime = ?";
 $stmt = mysqli_stmt_init($dbc);
 if (mysqli_stmt_prepare($stmt, $sql)) {
 mysqli_stmt_bind_param($stmt, 's', $prijavaImeKorisnika);
 mysqli_stmt_execute($stmt);
 mysqli_stmt_store_result($stmt);
 }
 mysqli_stmt_bind_result($stmt, $imeKorisnika, $lozinkaKorisnika,
$levelKorisnika);
 mysqli_stmt_fetch($stmt);

 if (password_verify($_POST['lozinka'], $lozinkaKorisnika) &&
mysqli_stmt_num_rows($stmt) > 0) {
 $uspjesnaPrijava = true;


 if($levelKorisnika == 1) {
 $admin = true;
 }
 else {
 $admin = false;
 }

 $_SESSION['$username1'] = $imeKorisnika;
 $_SESSION['$level'] = $levelKorisnika;
 } else {
 $uspjesnaPrijava = false;

 if(strlen($prijavaImeKorisnika) == 0){
    echo '<p class="pform">Korisničko ime nije uneseno.</p>';
 }
 if(strlen($prijavaLozinkaKorisnika) == 0){
    echo '<p class="pform">Lozinka nije unesena.</p>';
 }
 if ((strlen($prijavaImeKorisnika) > 0) && (strlen($prijavaLozinkaKorisnika) > 0) && (mysqli_stmt_num_rows($stmt) > 0)) {
    echo '<p class="pform">Unijeli ste pogrešnu lozinku.</p>';
 }
if ((strlen($prijavaImeKorisnika) > 0) && (strlen($prijavaLozinkaKorisnika) > 0) && (mysqli_stmt_num_rows($stmt) == 0)) {
    echo '<p class="pform">Račun s tim korisničkim imenom ne postoji. Možete ga stvoriti <a href="index.php?menu=6">OVDJE</a></href></p>';
 }

 }

}

?>


<?php

 if (($uspjesnaPrijava == true && $admin == true) ||
(isset($_SESSION['$username1'])) && $_SESSION['$level'] == 1) {


 $query = "SELECT * FROM vijesti";
 $result = mysqli_query($dbc, $query);
 while($row = mysqli_fetch_array($result)) {

    
     echo '<form enctype="multipart/form-data" action="" method="POST">
     <div class="form-item">
     <label for="title">Naslov vijesti</label>
     <div class="form-field">
     <input type="text" name="title" class="form-field-textual"
    value="'.$row['naslov'].'">
     </div>
     </div>
     <div class="form-item">
     <label for="about">Kratki sadržaj vijesti</label>
     <div class="form-field">
     <textarea name="about" id="" cols="30" rows="10" class="formfield-textual">'.$row['sazetak'].'</textarea>
     </div>
     </div>
     <div class="form-item">
     <label for="content">Sadržaj vijesti:</label>
     <div class="form-field">
     <textarea name="content" id="" cols="30" rows="10" class="formfield-textual">'.$row['tekst'].'</textarea>
     </div>
     </div>
     <div class="form-item">
     <label for="pphoto">Slika:</label>
     <div class="form-field">
     <input type="file" class="input-text" id="pphoto"
    value="'.$row['slika'].'" name="pphoto"/> 
     </div>
     </div>
     <div class="form-item">
     <label for="category">Kategorija vijesti:</label>
     <div class="form-field">
     <select name="category" id="" class="form-field-textual"
    value="'.$row['kategorija'].'">
     <option value="sport">Sport</option>
     <option value="kultura">Kultura</option>
     </select>
     </div>
     </div>
     <div class="form-item">
     <label>Spremiti u arhivu:
     <div class="form-field">';
     if($row['arhiva'] == 0) {
     echo '<input type="checkbox" name="archive" id="archive"/>
     Potvrdite za pristanak';
     } else {
     echo '<input type="checkbox" name="archive" id="archive"
    checked/> Potvrdite za pristanak';
     }
     echo '</div>
     </label>
     </div>
     </div>
     <div class="form-item">
     <input type="hidden" name="id" class="form-field-textual"
    value="'.$row['id'].'">
     <button type="reset" value="Poništi">Poništi</button>
     <button type="submit" name="update" value="Prihvati">
    Izmjeni</button>
     <button type="submit" name="delete" value="Izbriši">
    Izbriši</button>
     </div>
     </form>';
    }
    if(isset($_POST['delete'])){
        $id=$_POST['id'];
        $query = "DELETE FROM vijesti WHERE id=$id ";
        $result = mysqli_query($dbc, $query);
       }
    
    if(isset($_POST['update'])){
    $picture = $_FILES['pphoto']['name'];
    $title=$_POST['title'];
    $about=$_POST['about'];
    $content=$_POST['content'];
    $category=$_POST['category'];
    if(isset($_POST['archive'])){
     $archive=1;
    }else{
     $archive=0;
    }
    $target_dir = 'img/'.$picture;
    move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);
    $id=$_POST['id'];
    $query = "UPDATE vijesti SET naslov='$title', sazetak='$about', tekst='$content',
    slika='$picture', kategorija='$category', arhiva='$archive' WHERE id=$id ";
    $result = mysqli_query($dbc, $query);
    }
    
 }
 
  else if ($uspjesnaPrijava == true && $admin == false) {

 echo '<p>Bok ' . $imeKorisnika . '! Uspješno ste prijavljeni, ali niste administrator.</p>';
 } else if (isset($_SESSION['$username1']) && $_SESSION['$level'] == 0) {

 echo '<p>Bok ' . $_SESSION['$username1'] . '! Uspješno ste prijavljeni, ali niste administrator.</p>';
 } else if ($uspjesnaPrijava == false) {
 ?>


 <form method="POST">

Korisničko ime<br>
<input type="text" name="username1" id="username1"/><br>
Lozinka<br>
<input type="password" name="lozinka" id="lozinka"/><br><br>
<button type="submit" name="prijava">Prijava</button>
</form>


<?php
 }
 ?>