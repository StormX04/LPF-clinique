<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors",1);
$conn = mysqli_connect("localhost","root","root","lpf_clinique");
if(!$conn) {
    die("connection pas marcher ".mysqli_connect_error());
}
echo'admin test';




mysqli_close($conn);
?>
