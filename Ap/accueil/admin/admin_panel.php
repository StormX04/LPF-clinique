<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="unstyle.css" />
    <!----<script type="text/javascript" src="cours2.js"> </script>-->

    <title>Page Admin</title>
</head>
<body>
<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors",1);

echo'<br> admin  <br> <br>';

echo '<label for="montreServ" style="padding-right : 0.7%;">Affiche les actions sur les services : </label><button id="montreServ" onclick="Affact(\'Service\')" >Afficher</button><br>';
include("lesServices.php");
echo'<br><br>';

echo '<label for="montrePerso" style="padding-right : 0.7%;">Affiche les actions sur le personnel : </label><button id="montrePerso" onclick="Affact(\'Personnel\')">Afficher</button> <br>';
include("lePersonnel.php");
echo '<script type="text/javascript"src="lejs.js"></script>';
//mysqli_close($conn);
?>
</body>
</html> 
