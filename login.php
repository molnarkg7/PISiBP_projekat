<?php
include 'baza_podataka.php';
session_start();
if(isset($_GET["o"])){
  $_SESSION["potvrdjenpristup"] = false;
  $_SESSION['korisnik']=0;
  $_SESSION['id_tipa']=0;
}
if(isset($_GET["nijeprijavljen"])){
  echo '<script>alert("Да бисте поставили оглас, морате бити пријављени.")</script>';
}
set_url("http://localhost:3000/login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Пријава</title>
</head>
<body>
    
    <div class="center">
        <div class="login-page">
            <div class="form">
            <h1>Пријава</h1>
              <form class="login-form">

                <input type="text" placeholder="Корисничко име"  name="user" />
                <input type="password" placeholder="Лозинка"  name="pass" />

                <input type="submit" name="logovanje" value="Пријави се">
                
                <p class="message"> Нисте регистровани? <a href="registration.php"> Направи налог </a></p>
                <?php
                    if(isset($_GET["logovanje"])){
                      
                      $conn = OpenCon();
                      $conn->query("SET NAMES 'utf8'");
                      $sql = "SELECT * FROM korisnik";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while($red = $result->fetch_assoc()) {
                          if($_GET["pass"]==$red["sifra"] && $_GET["user"]==$red["username"]){
                            $_SESSION['potvrdjenpristup']=true;
                            $_SESSION['korisnik']=$red["id_korisnika"];
                            $_SESSION['id_tipa']=$red["id_tipa"];
                            echo '<script>window.open("index.php", "_self")</script>';
                          }
                        }
                        echo '<script>alert("Корисничко име или лозинка нису валидни.")</script>';
                      }
                    }
                    ?>
              </form>
              </div>
            </div>
        </div>

</body>
</html>