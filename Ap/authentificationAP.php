<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors",1);
$conn = mysqli_connect("localhost","admin","1234","clinique_lpf");
if(!$conn) {
    die("connection pas marcher ".mysqli_connect_error());
}
echo'
</p> Page de connexion </p>
<form method="post" action="tableau_de_bord.php">
<label for="userID">Nom d\'utilisateur :</label>
<input id="userID" type="text" name="userID"> <br> <br>
<label for="mdp">Mot de passe :</label>
<input id="mdp" type="password" name="mdp"> <br> <br>
<input type="submit" value="Se connecter"> 
</form>  <br> <br>';

/*
$requete = 'Select * FROM personnel ;';
$result = mysqli_query($conn, $requete);
while($colonn = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    print_r( $colonn) ;
}*/

mysqli_close($conn);
?>
