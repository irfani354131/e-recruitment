<?php
 
    include 'koneksi.php';
 
    session_start();
 
    $jawab = $_SESSION['jawab'];
 
?>
 
<!DOCTYPE html>
 
<html>
 
<head>
 
    <title>Hasil Test</title>
 
</head>
 
<body>
 
    <h1>Hasil Latihan</h1>
 
    <h2>SCORE ANDA: <?php echo $_SESSION['score']; ?></h2>
 
    <table border="1">
 
        <tr>
 
            <td>NO</td>
 
            <td>Jawaban Anda</td>
 
            <td>Kunci Jawaban</td>
 
            <td>Status</td>
 
        </tr>
 
        <?php
 
            $i = 0;
 
            $benar = $salah = 0;
 
            $sql = mysql_query("select * from t_soal");
 
            while($key = mysql_fetch_array($sql)){
 
        ?>
 
        <tr>
 
            <td><?php echo $i+1; ?></td>
 
            <td><?php echo $jawab[$i] ?></td>
 
            <td><?php echo $key['kunci']; ?></td>
 
            <td>
 
                <?php
 
                    if ($jawab[$i] == $key['kunci']) {
 
                        echo "Benar";
 
                        $benar++;
 
                    }else{
 
                        echo "Salah";
 
                        $salah++;
 
                    }
 
                 ?>
 
            </td>
 
        </tr>
 
        <?php
 
                $i++;
 
            }
 
         ?>
 
    </table>
 
    <h3>Benar: <?php echo $benar; ?><br>
 
    Salah: <?php echo $salah; ?></h3>
 
    <a href="index.php">Kembali</a>
 
</body>
 
</html>