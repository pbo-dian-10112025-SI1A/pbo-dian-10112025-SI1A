<?php

class ProdukToko {
    public $namaProduk;
    public $harga;
    public $stok;
    
    public function __construct($namaProduk, $harga, $stok){
        $this->namaProduk = $namaProduk;
        $this->harga = $harga;
        $this->stok = $stok;
    }
}

$data = [];

while(true){
    echo "\n===== MENU TOKO =====\n";
    echo "1. Tampilkan Data Produk\n";
    echo "2. Tambah Produk\n";
    echo "3. Update Produk\n";
    echo "4. Hapus Produk\n";
    echo "5. Keluar\n";
    echo "Pilih menu: ";
    $menu = trim(fgets(STDIN));

    switch($menu){

        case 1:
            echo "\n===== Tampilan Data Produk =====\n";
            echo "No | Nama Produk | Harga | Stok \n";
            $no = 1;
            foreach($data as $d){
                echo $no++." | ".$d->namaProduk." | Rp".number_format($d->harga,0,",",".")." | ".$d->stok." \n";
            }
        break;

        case 2:
            echo "Masukkan Nama Produk: ";
            $nama = trim(fgets(STDIN));

            echo "Masukkan Harga: ";
            $hrg = trim(fgets(STDIN));

            echo "Masukkan Stok: ";
            $stk = trim(fgets(STDIN));

            $data[] = new ProdukToko($nama,$hrg,$stk);
        break;

        case 3:
            echo "Nomor yang diupdate: ";
            $i = trim(fgets(STDIN))-1;

            echo "Nama Baru: ";
            $nama = trim(fgets(STDIN));

            echo "Harga Baru: ";
            $hrg = trim(fgets(STDIN));

            echo "Stok Baru: ";
            $stk = trim(fgets(STDIN));

            $data[$i] = new ProdukToko($nama,$hrg,$stk);
        break;

        case 4:
            echo "Nomor yang dihapus: ";
            $i = trim(fgets(STDIN))-1;
            unset($data[$i]);
            $data = array_values($data);
        break;

        case 5:
            exit;
    }
}

?>