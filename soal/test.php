<?php
 
    session_start();
 
    $soal = $_SESSION['soal'];
 
    $no = $_SESSION['no'];
 
    if(isset($_POST['next'])){
 
        $_SESSION['jawab'][] = $_POST['option'];
 
        if($_POST['option'] == $soal[$no-2]['kunci']){
 
            $_SESSION['score'] = $_SESSION['score'] + 10;
 
        }
 
    }
 
    if(isset($soal[$no-1])){
 
?>
 
<!DOCTYPE html>
 
<html>
 
<head>
 
    <title>Latihan Soal</title>
 
</head>
 
<body>
 
<a href="index.php">Kembali ke soal 1</a>
 
    <form action="" method="POST">
 
        <p>
 
        <?php
 
            echo $no.". "; $_SESSION['no']++;
 
            echo $soal[$no-1]['soal'];
 
            $jawaban = $_SESSION['option'][$no-1];
 
            shuffle($jawaban);
 
        ?>
 
        </p>
 
        <?php
 
            for ($i=0; $i < 4; $i++) {
 
        ?>
 
            <input type="radio" name="option" value="<?php echo $jawaban[$i]; ?>" required/> <?php echo $jawaban[$i]; ?></br>
 
        <?php
 
            }
 
         ?>
 
        <input type="submit" name="next" value="next">
 
    </form>
 
</body>
 
</html>
 
<?php
 
    }else{
 
        header("location:result.php");
 
    }
 
?>