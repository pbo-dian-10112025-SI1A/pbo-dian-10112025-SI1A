<?php

class Segitiga {

    private $tinggi;
    private $data = [];

    // setter
    public function setTinggi($tinggi){
        $this->tinggi = $tinggi;
    }

    // getter
    public function getTinggi(){
        return $this->tinggi;
    }

    // segitiga piramida
    public function segitigaNaik(){
        $t = $this->getTinggi();

        for($i=1; $i <= $t; $i++){
            for($j=$t; $j > $i; $j--){
                echo "&nbsp;&nbsp;";
            }
            for($k=1; $k <= $i; $k++){
                echo "* ";
            }
            echo "<br>";
        }
    }

    // segitiga terbalik
    public function segitigaTurun(){
        $t = $this->getTinggi();

        for($i=$t; $i >= 1; $i--){
            for($j=$t; $j > $i; $j--){
                echo "&nbsp;&nbsp;";
            }
            for($k=1; $k <= $i; $k++){
                echo "* ";
            }
            echo "<br>";
        }
    }

    // diamond
    public function diamond(){
        $t = $this->getTinggi();

        // atas
        for($i=1; $i <= $t; $i++){
            for($j=$t; $j > $i; $j--){
                echo "&nbsp;&nbsp;";
            }
            for($k=1; $k <= $i; $k++){
                echo "* ";
            }
            echo "<br>";
        }

        // bawah
        for($i=$t-1; $i >= 1; $i--){
            for($j=$t; $j > $i; $j--){
                echo "&nbsp;&nbsp;";
            }
            for($k=1; $k <= $i; $k++){
                echo "* ";
            }
            echo "<br>";
        }
    }
}

// objek
$segitiga = new Segitiga();
$segitiga->setTinggi(6);

echo "<h3>Segitiga 1</h3>";
$segitiga->segitigaNaik();

echo "<br><h3>Segitiga 2</h3>";
$segitiga->segitigaTurun();

echo "<br><h3>Segitiga 3</h3>";
$segitiga->diamond();

?>