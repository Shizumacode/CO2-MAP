<?php
    session_start();
    ob_start();

    require "connection.php";	

    function ipCek(){
      if (!empty($_SERVER['HTTP_CLIENT_IP']))
      {
          $ip=$_SERVER['HTTP_CLIENT_IP'];
      }
      else
      {
          $ip=$_SERVER['REMOTE_ADDR'];
      }
      return $ip;
    }

    function logEkle($logİslem){
      $islemTipi = "";
      if ($logİslem == "login") {$islemTipi = "Giriş";}
      elseif ($logİslem == "logout") {$islemTipi = "Çıkış";}
      elseif ($logİslem == "logout") {$islemTipi = "Çıkış";}
      
      $tarih = date("Y-m-d H:i:s").date_default_timezone_set('UTC');
      $ipAdresi = ipCek();
      $kullaniciID = $_SESSION["kullaniciID"];
      require "connection.php";

      if ($personel_ID) {
        $query = mysqli_query($baglan, "INSERT INTO logkayit (logID , kullaniciID , ipAdress, islemTipi , islemTarihi)
                                        VALUES(NULL , '$kullaniciID', '$ipAdresi' , '$islemTipi' , NOW() )");
      }
      if ($query){
        return true;
      }else {
        return false;
      }
  }
?>
