<?php
class tabung
{    
    function data($r,$t)
    {
        echo "Phi = 3.14";
        echo "<br>";
        echo "Jari-jari = ".$r;
        echo "<br>";
        echo "Tinggi  = ".$t;
        echo "<br>";
        $volume = 3.14*$r*$r*$t;
        echo "<hr>";
        echo "Volume Tabung adalah ".$volume;
        echo "<hr>";
        $luaspermukaan = 2*3.14*$r*($t+$r);
        echo "Luas permukaan Tabung adlaah : ".$luaspermukaan;
        echo "<hr>";
  
        $luasselimut = 2*3.14*$r*$t;
        echo "Luas selimut Tabung adalah ".$luasselimut;
        echo "<hr>";
    }
}
?>