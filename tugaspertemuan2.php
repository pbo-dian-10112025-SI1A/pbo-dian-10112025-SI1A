<?php
class KalkulatorSuhu {

    public function konversi($suhu, $dari, $ke) {

        if ($dari == "C" && $ke == "F") {
            return ($suhu * 9/5) + 32;
        }
        elseif ($dari == "F" && $ke == "C") {
            return ($suhu - 32) * 5/9;
        }
        elseif ($dari == "C" && $ke == "K") {
            return $suhu + 273.15;
        }
        elseif ($dari == "K" && $ke == "C") {
            return $suhu - 273.15;
        }
        elseif ($dari == "F" && $ke == "K") {
            return ($suhu - 32) * 5/9 + 273.15;
        }
        elseif ($dari == "K" && $ke == "F") {
            return ($suhu - 273.15) * 9/5 + 32;
        }
        else {
            return $suhu;
        }
    }
}

$hasil = null;

if(isset($_POST['hitung'])){
    $suhu = $_POST['suhu'];
    $dari = $_POST['dari'];
    $ke = $_POST['ke'];

    $kalkulator = new KalkulatorSuhu();
    $hasil = $kalkulator->konversi($suhu, $dari, $ke);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Suhu OOP</title>
</head>
<body>
    <h2>Kalkulator Konversi Suhu (OOP)</h2>
    <form method="post">
        Masukkan Suhu:
        <input type="number" name="suhu" required>
        <br><br>

        Dari:
        <select name="dari">
            <option value="C">Celsius</option>
            <option value="F">Fahrenheit</option>
            <option value="K">Kelvin</option>
        </select>

        Ke:
        <select name="ke">
            <option value="C">Celsius</option>
            <option value="F">Fahrenheit</option>
            <option value="K">Kelvin</option>
        </select>

        <br><br>
        <button type="submit" name="hitung">Hitung</button>
    </form>

    <?php if($hasil !== null){ ?>
        <h3>Hasil: <?php echo $hasil; ?></h3>
    <?php } ?>
</body>
</html>