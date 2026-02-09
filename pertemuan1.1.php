<?php

class Belanja 
{
    var $jumlah=3;
    var $hargasatuan=2000;
    var $namabarang="pensil";

    function totalharga(): float|int
    {
        return $this->jumlah * $this->hargasatuan;
    }
}


?>