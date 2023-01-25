<?php
 include('db.php');
 $id=$_GET['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pretraga.css">
    <title>Приказ аранжмана</title>
</head>
<body>

    <header class="header">
        <div class="navtop" >
            <div class="logo">
                <a href=""></a>
            </div>

            <div class="navtop-list">
                <a href="login.html">Пријави се</a>
                <a href="job.html">Посао</a>
                <a href="contact.html">Контакт</a>
                <a href="about.html">О нама</a>
            </div>
        </div>
    </header>


    <div class="izbor"><select class="stranicenje">
        <option value="odaberi">Одабери број понуда</option>
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="100">100</option>
        <option value="200">200</option>
       
    </select></div>
    
    <div class="lista">
    <?php
    
    ini_set('memory_limit', '256M');
     $query ="SELECT smestaj.naziv_objekta as naziv,lokacija.mesto as lokacija,aranzman.termin_polazak as polazak,aranzman.cena as cena,tip_prevoza.naziv as prevoz,smestaj.id_smestaja as idsmest
     FROM smestaj,lokacija,aranzman,tip_prevoza,drzava
     WHERE drzava.id_kontinenta = '$id' AND lokacija.id_drzava = drzava.id_drzava AND aranzman.id_lokacije = lokacija.id_lokacije AND tip_prevoza.id = aranzman.id_prevoza AND smestaj.id_smestaja = aranzman.id_smestaja";

     if ($result = mysqli_query($con, $query)) {
        while ($row = mysqli_fetch_array($result)) {
            

    ?>
    
    <div class="kartice">
            
            <div>
                <h2 class="naziv"><?php echo $row['naziv'] ?><h2>
                <h4 class="destinacija"><?php echo $row['lokacija']?></h4>
            </div>
            <img class="slika" src="images/projekat.jpg">
            <div class="mala_lista">
                <div class="male_kartice">
                    <p class="paragraf">Polazak:<?php echo $row['polazak']?></p>
                </div>

                <div class="male_kartice">
                    <p class="paragraf">Destinacija:<?php echo $row['lokacija']?></p>
                </div>
                <div class="male_kartice">
                    <p class="paragraf">Prevoz:<?php echo $row['prevoz']?></p>
                </div>

                <div class="male_kartice">
                    <p class="paragraf">Cena:<?php echo $row['cena']?></p>
                </div> 
            </div>
            
            <a href="program.php?id=<?php echo $row['idsmest']?>"><div class="pozicija-dugme"><button class="dugme">Види понуду -></button></div></a>
            <?php
        }
    }
?>
</body>
</html>