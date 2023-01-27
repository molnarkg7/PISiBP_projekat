<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include 'baza_podataka.php';
session_start();

if(isset($_GET["obrisi"])){
    $conn= OpenCon();
    mysqli_query($conn ,"SET NAMES 'utf8'");
    $sql="DELETE FROM korisnik where id_korisnika=".$_GET["obrisi"]; 
    $rezultat=mysqli_query($conn, $sql);
    if($rezultat){
        echo '<script>alert("Брисање успешно.")</script>';
    }
}

if(isset($_POST["unoskorisnika"])){
    $user          = $_POST['Username'];
    $ime           = $_POST['Ime'];
    $prezime       = $_POST['Prezime'];
    $email         = $_POST['email'];
    $sifra1         = $_POST['Sifra'];
    $telefon         = strval($_POST['mobilni']);
    $rola         = Intval($_POST['rola']);

    $conn = OpenCon();
    $conn->query("SET NAMES 'utf8'");

    $sql = "INSERT INTO `korisnik` (`ime`, `prezime`, `id_tipa`, `email`,`username`, `sifra`, `kontakt_telefon`) VALUES ('$ime', '$prezime', $rola, '$email','$user', '$sifra1', '$telefon');";
    if($conn->query($sql)){
        echo '<script>alert("Унос успешан.")</script>';;
    }
    else{
        echo '<script>alert("Грешка при уносу, проверите унете податке.")</script>';
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
    <link rel="stylesheet" href="admin.css">
    <title>Контролна табла</title>
</head>
<body>

  <header class="header">
    <div class="navtop" >
        <div class="logo">
            <a href=""></a>
        </div>
        <div class="navtop-list">
            <a href="dodaj.html">Додај понуду/аранжман</a>
            <a href="index.php">Почетна страна</a>
        </div>
    </div>
</header>

    <div class="admin">
        <h1 class="admin-naslov">Контролна табла</h1>
        <table>
          <tr>
            <th>ИД</th>
            <th>Корисничко име</th>
            <th>Име</th>
            <th>Презиме</th>
            <th>Мејл адреса</th>
            <th>Лозинка</th>           
            <th>Контакт телефон</th>
            <th>Рола</th>
            <th>Акција</th>
          </tr>

          <?php
            $conn= OpenCon();
            mysqli_query($conn ,"SET NAMES 'utf8'");
            $sql="SELECT * FROM `korisnik` JOIN tip_korisnika ON korisnik.id_tipa=tip_korisnika.id_tipa"; 
            $rezultat=mysqli_query($conn, $sql);
            if($rezultat->num_rows > 0){
            while($red = $rezultat->fetch_assoc()){
               
            ?>
          <tr>
            <td><?php echo $red['id_korisnika']?></td>
            <td><?php echo $red['username']?></td>
            <td><?php echo $red['ime']?></td>
            <td><?php echo $red['prezime']?></td>
            <td><?php echo $red['email']?></td>
            <td><?php echo $red['sifra']?></td>
            <td><?php echo $red['kontakt_telefon']?></td>
            <td><?php echo $red['naziv_tipa']?></td>
            <td>
              <button class="edit-btn">Измени</button>
              <a href=<?php echo "/admin.php?obrisi=".$red['id_korisnika']?>><button class="delete-btn">Обриши</button></a>
            </td>

            <?php

            }
        }
        ?>
          </tr>
        </table>  


        <div class="center">
          <div class="login-page">
              <div class="form">
              <h1>Додавање корисника</h1>
                <form class="login-form" method="post" action="/admin.php">
  
                <input type="text" id="Username" name="Username" placeholder="Корисничко име" required>
                <input type="text" id="Ime" name="Ime" placeholder="Име" required>
                <input type="text" id="Prezime" name="Prezime" placeholder="Презиме" required>
                <input type="email" id="email" name="email" placeholder="Мејл адреса" required>
                <input type="password" id="Sifra" name="Sifra" placeholder="Лозинка" required>
                <input type="text" id="mobilni" name="mobilni" placeholder="Контакт телефон" required>
                <select name="rola" required>
                    <option disabled selected>Рола:</option>
                    <option value="1">Радник</option>
                    <option value="2">Администратор</option>
                </select>
                  
                  <button name="unoskorisnika">Додај</button>
  
                </form>
              </div>
          </div> 
          </div>
        
        <div class="potvrda">
          <h1 class="potvrda-naslov">Потврда резервација</h1>
          <table>
            <tr>
              <th>Име</th>
              <th>Презиме</th>
              <th>Број телефона</th>
              <th>Мејл адреса</th>
              <th>Број одраслих</th>           
              <th>Број деце</th>
              <th>Начин плаћања</th>
              <th>Коментар</th>
              <th>Акција</th>
            </tr>
            <tr>
              <td>Драган</td>
              <td>Милорадовић</td>
              <td>0692568541</td>
              <td>gagi@gmail.com</td>
              <td>2</td>
              <td>1</td>
              <td>Кеш</td>
              <td>Нема</td>
              <td>

              <!--када кликне на дугме погледај да га врати на понуду коју купац/корисник хоће да резервише-->
              <a href=""><button class="delete-btn">Погледај</button></a> 
                <button class="delete-btn">Потврди</button>
                <button class="delete-btn">Одбиј</button>
              </td>
            </tr>
          </table> 
        </div>

    </div>

</body>
</html>
