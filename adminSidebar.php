<?php

function Adminsidebar(){

    $Adminsidebar = '
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
        
            <ul class="nav side-menu">
                <li><a href="admindex.php"><i class="fa fa-home"></i> Anasayfa </a></li>
                <li><a><i class="fa fa-leaf"></i> Ülke Karbon Değerleri İşlemler</a>
                    <ul class="nav child_menu">
                        <li><a href="ulkelertablo.php"> Tablo İşlemi</a></li>
                        <li><a href="adminGüncelle.php"> Karbon Verilerini Ekleme-Güncelleme</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-leaf"></i> Kıta Karbon Değerleri İşlemler</a>
                    <ul class="nav child_menu">
                        <li><a href="kitalartablo.php"> Tablo İşlemi</a></li>
                        <li><a href="adminGüncelleKita.php"> Karbon Verilerini Ekleme-Güncelleme </a></li>
                    </ul>
                </li>
        <li><a href="login.php"><i class="fa fa-power-off"></i> Çıkış </a></li>
    </div> 
    </div>
    ';
    echo $Adminsidebar;
}
?>
