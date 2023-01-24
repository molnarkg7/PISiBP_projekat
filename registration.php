<?php
include 'baza_podataka.php';
if(isset($_POST["unoskorisnika"])){
    $user          = $_POST['Username'];
    $ime           = $_POST['Ime'];
    $prezime       = $_POST['Prezime'];
    $email         = $_POST['email'];
    $sifra1         = $_POST['Sifra'];
    $sifra2         = $_POST['Sifra2'];
    $telefon         = strval($_POST['mobilni']);
$conn = OpenCon();
$conn->query("SET NAMES 'utf8'");
if($sifra1 == $sifra2){
    $sql = "INSERT INTO `korisnik` (`ime`, `prezime`, `id_tipa`, `email`,`username`, `sifra`, `kontakt_telefon`) VALUES ('$ime', '$prezime', 1, '$email','$user', '$sifra1', '$telefon');";
    if($conn->query($sql)){
        echo '<script>alert("Унос успешан, проследићемо вас на страницу за пријављивање.")</script>';
        header( 'location: /login.php' );
    }
    else{
        echo '<script>alert("Грешка при уносу, проверите унете податке.")</script>';
    }
}else{
    echo '<script>alert("Шифре се не поклапају")</script>';
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
    <link rel="stylesheet" href="login.css">
    <title>Регистрација</title>
</head>
<body>
    <div class="center">
        <div class="login-page">
            <div class="form">
            <h1>Регистрација</h1>
              <form class="login-form" method="post" action="/registration.php">

              <input type="text" id="Username" name="Username" placeholder="Корисничко име" required>
              <input type="text" id="Ime" name="Ime" placeholder="Име" required>
              <input type="text" id="Prezime" name="Prezime" placeholder="Презиме" required>
              <input type="email" id="email" name="email" placeholder="Ваша мејл адреса" required>
              <input type="password" id="Sifra" name="Sifra" placeholder="Лозинка" required>
              <input type="password" id="Sifra2" name="Sifra2" placeholder="Потврдите лозинку" required>
              <input type="text" id="mobilni" name="mobilni" placeholder="Контакт телефон" required>
                
                <button name="unoskorisnika">Региструј се</button>

                <p class="message"> Већ сте регистровани? <a href="login.php"> Пријави се </a></p>


              </form>
            </div>
        </div> 
        </div>
</body>
</html>