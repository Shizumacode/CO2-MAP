<?php

function sidebar(){

    $sidebar = '
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section" >
            <ul class="nav side-menu">
                <li><a href="index.php"><i class="fa fa-home"></i> Anasayfa </a></li>
                <li><a><i class="fa fa-line-chart"></i> Karbon Emisyonu </a>
                    <ul class="nav child_menu">
                        <li><a href="dunya.php"> Dünya Geneli Karbon Dağılımı </a></li>
                        <li><a href="kita.php"> Kıtalara Göre Karbon Dağılımı </a></li>
                        <li><a href="sektor.php"> Sektörlere Göre Karbon Dağılımı </a></li>
                    </ul>
                </li>
                <li><a href="iletisim.php"><i class="fa fa-envelope-o"></i> Bize Ulaşın </a></li>
        <li><a href="login.php"><i class="fa fa-power-off"></i> Çıkış </a></li>
    </div> 
    </div>
    ';
    echo $sidebar;
}
?>
