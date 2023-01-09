<?php

error_reporting(0);
$host = "localhost";
$user = "root";
$pass = "";
$vt_adi = "co2_map-kader_demir-derya_celiks";

$baglan = mysqli_connect($host, $user, $pass, $vt_adi) or die (mysql_error());

if($baglan){
    "Bağlantı başarılı";
}
else{
    echo "Bağlantı başarısız";
}

?>