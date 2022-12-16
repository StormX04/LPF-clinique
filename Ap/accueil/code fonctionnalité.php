<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="unstyle.css" />
    <!----<script type="text/javascript" src="cours2.js"> </script>-->

    <title>Document</title>
</head>
<body>
<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors",1);
$conn = mysqli_connect("localhost","admin","1234","clinique_lpf");
if(!$conn) {
    die("connection pas marcher ".mysqli_connect_error());
}

/*
$reqUsrInfo = 'Select nom_utilisateur, Motdepasse FROM authentification;';
$result = mysqli_query($conn, $reqUsrInfo);
while($colonn = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	echo '<br><table style=" background-color: Lavender;  border-collapse: collapse;  border:5px solid #eb0227;"><tr><th style="background-color: gray; color: white; padding-right: 10px; padding-left: 10px; border-right:4px solid #eb0227;">username : </th><th style="background-color: darkgray; color: white; padding-right: 10px; padding-left: 10px; border-right:4px solid #eb0227;">password : </th></tr><tr>';
	foreach ($colonn as $value){
		echo '<td style="border-right:4px solid #eb0227;">'.$value.'</td>' ;
	}
	echo'</tr></table>' ;
	//print_r( $colonn) ;
	
}
*/ 
mysqli_close($conn);
?>
</body>
</html> 
