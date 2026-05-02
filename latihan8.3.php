<?php

echo "Silahkan Masukkan Username:";
$input_nama = fopen("php://stdin","r");
$nama = trim(fgets($input_nama));

echo "Welcome, $nama";

?>