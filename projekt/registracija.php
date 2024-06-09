<?php

$registriranKorisnik = 0;
$msg = '';


  $local = "localhost";
  $username = "root";
  $password = "";
  $baza = "projekt";


  $dbc = mysqli_connect($local, $username, $password, $baza) or die ('Error connecting to MYSQL Server.' . mysqli_connect_error());

if ($dbc) {
  if (isset($_POST["ime"]) && isset($_POST["prezime"]) && isset($_POST["username1"]) && isset($_POST["pass"]) && isset($_POST["slanje"])) {

    $username1 = $_POST['username1'];
$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$lozinka = $_POST['pass'];
$hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
$razina = 0;

$sql = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?";
$stmt = mysqli_stmt_init($dbc);
if (mysqli_stmt_prepare($stmt, $sql)) {
 mysqli_stmt_bind_param($stmt, 's', $username1);
 mysqli_stmt_execute($stmt);
 mysqli_stmt_store_result($stmt);
 }
if(mysqli_stmt_num_rows($stmt) > 0){
  $msg="Korisničko ime već postoji!";

}else{
 
 $sql = "INSERT INTO korisnik (ime, prezime,korisnicko_ime, lozinka,
razina)VALUES (?, ?, ?, ?, ?)";
 $stmt = mysqli_stmt_init($dbc);
 if (mysqli_stmt_prepare($stmt, $sql)) {
 mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $username1,
$hashed_password, $razina);
 mysqli_stmt_execute($stmt);
 $registriranKorisnik = 1;
 }
}
mysqli_close($dbc);


  }
}



?>


<?php


 if($registriranKorisnik == 1) {
 echo '<p>Korisnik je uspješno registriran!</p>';
 } else {
 
  
 ?>

 <section role="main">
 <form enctype="multipart/form-data" action="" method="POST">
 <div class="form-item">
 <span id="porukaIme" class="bojaPoruke"></span>
 <label for="title">Ime: </label>
 <div class="form-field">
 <input type="text" name="ime" id="ime" class="form-fieldtextual">
 </div>
 </div>
 <div class="form-item">
 <span id="porukaPrezime" class="bojaPoruke"></span>
 <label for="about">Prezime: </label>
 <div class="form-field">
 <input type="text" name="prezime" id="prezime" class="formfield-textual">
 </div>
 </div>
 <div class="form-item">
 <span id="porukaUsername" class="bojaPoruke"></span>

 <label for="content">Korisničko ime:</label>

 <?php echo '<br><span class="bojaPoruke">'.$msg.'</span>'; ?>
 <div class="form-field">
 <input type="text" name="username1" id="username1" class="formfield-textual">
 </div>
 </div>
 <div class="form-item">
 <span id="porukaPass" class="bojaPoruke"></span>
 <label for="pphoto">Lozinka: </label>
 <div class="form-field">
 <input type="password" name="pass" id="pass" class="formfield-textual">
 </div>
 </div>
 <div class="form-item">
 <span id="porukaPassRep" class="bojaPoruke"></span>
 <label for="pphoto">Ponovite lozinku: </label>
 <div class="form-field">
 <input type="password" name="passRep" id="passRep"
class="form-field-textual">
 </div>
 </div>

 <div class="form-item">
 <button type="submit" value="Prijava"
id="slanje" name="slanje">Prijava</button>
 </div>
 </form>

 </section>
 <script type="text/javascript">
 document.getElementById("slanje").onclick = function(event) {

 var slanjeForme = true;

 var poljeIme = document.getElementById("ime");
 var ime = document.getElementById("ime").value;

 if (ime.length == 0) {
 slanjeForme = false;
 poljeIme.style.border="1px dashed red";
 document.getElementById("porukaIme").innerHTML="<br>Unesite ime!<br>";
 } else {
 poljeIme.style.border="1px solid green";
 document.getElementById("porukaIme").innerHTML="";
 }

 var poljePrezime = document.getElementById("prezime");
 var prezime = document.getElementById("prezime").value;
 if (prezime.length == 0) {
 slanjeForme = false;

 poljePrezime.style.border="1px dashed red";

document.getElementById("porukaPrezime").innerHTML="<br>Unesite prezime!<br>";
 } else {
 poljePrezime.style.border="1px solid green";
 document.getElementById("porukaPrezime").innerHTML="";
 }


 var poljeUsername = document.getElementById("username1");
 var username = document.getElementById("username1").value;

 if (username.length == 0) {
 slanjeForme = false;
 poljeUsername.style.border="1px dashed red";

document.getElementById("porukaUsername").innerHTML="<br>Unesite korisničko ime!<br>";
 } else {

 poljeUsername.style.border="1px solid green";
 document.getElementById("porukaUsername").innerHTML="";
 
}
 


 var poljePass = document.getElementById("pass");
 var pass = document.getElementById("pass").value;
 var poljePassRep = document.getElementById("passRep");
 var passRep = document.getElementById("passRep").value;
 if (pass.length == 0 || passRep.length == 0 || pass != passRep) {
 slanjeForme = false;
 poljePass.style.border="1px dashed red";
 poljePassRep.style.border="1px dashed red";
 document.getElementById("porukaPass").innerHTML="<br>Lozinke nisu iste ili nisu navedene!<br>";

document.getElementById("porukaPassRep").innerHTML="<br>Lozinke nisu iste ili nisu navedene!<br>";
 } else {
 poljePass.style.border="1px solid green";
 poljePassRep.style.border="1px solid green";
 document.getElementById("porukaPass").innerHTML="";
 document.getElementById("porukaPassRep").innerHTML="";
 }

 if (slanjeForme != true) {
 event.preventDefault();
 }


 };

 </script>
 <?php
 }
 ?>