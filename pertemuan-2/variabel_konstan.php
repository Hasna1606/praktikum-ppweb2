<?php 
    //menfinisikan konstanta
    define("PHI", 3.14);
    define("DBNAME", "Inventori");
    define("DBSERVER", "Localhost");

    $jari = 8;
    $luas = PHI * $jari *$jari;
    $kell = 2 * PHI * $jari;

    echo "luas Lingakaran dengan jari " .$jari. ":" .$luas;
    echo "<br/>Keliling : ".$kell;
?>

<hr>
<?php
    echo "Nama database : " .DBNAME;
    echo "<br/>Lokasi Database : " .DBSERVER;
?>