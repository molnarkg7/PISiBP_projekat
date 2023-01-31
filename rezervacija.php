<?php
include 'baza_podataka.php';
session_start();
if(isset($_GET['pon'])){
    $idpon=$_GET['pon'];
}
if(isset($_GET['lok'])){
    $lok=$_GET['lok'];
}
if(isset($_POST["rezervacijaunos"])){
    $ime           = $_POST['ime'];
    $prezime       = $_POST['prezime'];
    $deca       = $_POST['putnicideca'];
    $odrasli       = $_POST['putniciodrasli'];
    $email         = $_POST['email'];
    $placanje         = $_POST['placanje'];
    $telefon         = strval($_POST['mobilni']);
    $komentar         = $_POST['komentar'];
    $idpon=$_POST["rezervacijaunos"];
    $lok=$_POST["lok"];

   
$conn = OpenCon();
$conn->query("SET NAMES 'utf8'");
$sql="SELECT id_korisnika FROM korisnik WHERE email='".$email."'"; 
$rezultat=mysqli_query($conn, $sql);
    if($rezultat->num_rows == 0){
        $sql = "INSERT INTO `korisnik` (`ime`, `prezime`, `id_tipa`, `email`, `kontakt_telefon`) VALUES ('$ime', '$prezime', 1, '$email', '$telefon');";
        if($conn->query($sql)){
            $sql = "INSERT INTO `rezervacija` (`id_aranzmana`, `id_korisnika`, id_lokacije, `nacin_placanja`, `broj_dece`, `broj_odraslih`, `komentar`, odobren) 
            SELECT ".$idpon.", id_korisnika,".$lok.", '".$placanje."', ".$deca.", ".$odrasli.", '".$komentar."', 0 FROM korisnik WHERE email='".$email."'";
         if($conn->query($sql)){
            echo '<script>alert("Резервација унета.")</script>';
            header( 'location: /index.php' );
         }else{
            $conn->query("DELETE FROM korisnik WHERE email='".$email."'");
            echo $conn->error;
        echo '<script>alert("Грешка при уносу, проверите унете податке.")</script>';
    }
    }
    else{
        echo $conn->error;
        echo '<script>alert("Грешка при уносу, проверите унете податке.")</script>';
    }
    }else{
        $sql = "INSERT INTO `rezervacija` (`id_aranzmana`, `id_korisnika`, id_lokacije, `nacin_placanja`, `broj_dece`, `broj_odraslih`, `komentar`, odobren) 
        SELECT ".$idpon.", id_korisnika,".$lok.", '".$placanje."', ".$deca.", ".$odrasli.", '".$komentar."', 0 FROM korisnik WHERE email='".$email."'";
         if($conn->query($sql)){
            echo '<script>alert("Резервација унета.")</script>';
            header( 'location: /index.php' );
         }else{
        echo '<script>alert("Грешка при уносу, проверите унете податке.")</script>';
        }
    }
    
CloseCon($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="login.css">
    <title>Резервација</title>
</head>
<body>
    <header class="header">
        <div class="navtop" >
            <div class="logo">
                <a href=""></a>
            </div>

            <div class="navtop-list">
            <?php 
            if($_SESSION['potvrdjenpristup'] == true)
            {
               echo'<a href="login.php?o=1">Одјави се</a>';
               if($_SESSION['id_tipa']==2){
                echo'<a href="admin.php">Контролна табла</a>';
               }
            }else{
                echo'<a href="login.php">Пријави се</a>';
            }
            ?>    
                <a href="job.html">Посао</a>
                <a href="contact.html">Контакт</a>
                <a href="about.html">О нама</a>
                <a href="index.php">Почетна страна</a>
            </div>
        </div>
    </header>

    <main class="main">

        <div class="center">
            <div class="login-page">
                <div class="form">
                <h1>Резервација</h1>
                  <form class="login-form" method="post" action="/rezervacija.php">
    
                  <input type="text" id="ime" name="ime" placeholder="Име" required>
                  <input type="text" id="prezime" name="prezime" placeholder="Презиме" required>
                  <input type="text" id="mobilni" name="mobilni" placeholder="Контакт телефон" required>
                  <input type="email" id="email" name="email" placeholder="Ваша мејл адреса" required>
                  <input type="text" id="putnici" name="putniciodrasli" placeholder="Број одраслих" required>
                  <input type="text" id="putnici" name="putnicideca" placeholder="Број деце" required>
                  <input type="text" id="lok" name="lok" value=<?php echo $lok ?> hidden>
                  <fieldset>
                    <legend>Изабери начин плаћања:</legend>
                
                    <div>
                      <input type="radio" id="kes" name="placanje" value="Кеш">
                      <label for="kes">Кеш</label>
                    </div>
                
                    <div>
                      <input type="radio" id="kartica" name="placanje" value="Картица">
                      <label for="kartica">Картица</label>
                    </div>
                </fieldset> </br>
                <textarea id="komentar" name="komentar" placeholder="Коментар"></textarea>
                    
                    <button name="rezervacijaunos" value="<?php echo $idpon?>">Резервиши</button>
     
                  </form>
                </div>
            </div> 
            </div>

    </main>

</body>
</html>