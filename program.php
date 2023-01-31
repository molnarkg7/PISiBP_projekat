<?php
 include('db.php');
 if(isset($_GET['lok'])){
 $lok=$_GET['lok'];
 }
if(isset($_GET['pon'])){
    $idpon=$_GET['pon'];
}
$querylok = "SELECT distinct(lokacija.mesto) as lok
FROM lokacija,provodi
WHERE provodi.id_ponude = ".$idpon."  AND provodi.id_lokacije = lokacija.id_lokacije AND lokacija.id_lokacije != ".$lok." ;
";
$query = "SELECT lokacija.mesto as lok,month(ponuda.termin_polazak) as mesec,year(ponuda.termin_polazak) as godina,ROUND(ponuda.cena_putovanja+ponuda.cena_prevoza,2) as cena,tip_prevoza.naziv as prevoz,smestaj.naziv_objekta as imesm,tip_smestaja.varijanta as varijanta,smestaj.kategorija_smestaja as zvezda,smestaj.internet_konekcija as wifi,smestaj.tv as tv,smestaj.klima as klima,smestaj.frizider as frizider,smestaj.sef as sef,smestaj.slika as slk,smestaj.slika1 as slk1,smestaj.slika2 as slk2,smestaj.slika3 as slk3,smestaj.slika as slk4,smestaj.slika as slk5,lokacija.slika as lokslk
FROM lokacija,provodi,ponuda,tip_prevoza,smestaj,tip_smestaja
WHERE provodi.id_ponude = ".$idpon."  AND lokacija.id_lokacije = ".$lok."  AND ponuda.id_ponude = provodi.id_ponude AND tip_prevoza.id = ponuda.id_prevoza AND smestaj.id_smestaja = provodi.id_smestaja AND tip_smestaja.id_tipa = smestaj.tip_smestaja
";
$query3 = "SELECT dani.opis as opis,dani.redni_br_dana as red
FROM dani,provodi 
WHERE dani.id_ponude = ".$idpon." AND provodi.id_ponude = dani.id_ponude GROUP BY dani.opis;
"

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <script
              src="https://code.jquery.com/jquery-3.1.1.js"
             integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
              crossorigin="anonymous"></script>
   

    <title>Преглед аранжмана</title>
</head>
<body>
    <header class="header">
        <div class="navtop" >
            <div class="logo">
                <a href=""></a>
            </div>

            <div class="navtop-list">
                <a href="login.php">Пријави се</a>
                <a href="job.html">Посао</a>
                <a href="contact.html">Контакт</a>
                <a href="about.html">О нама</a>
                <a href="index.php">Почетна страна</a>
            </div>
        </div>
    </header>

    <main class="main">
        <?php
            mysqli_query($con ,"SET NAMES 'utf8'");
            if ($result = mysqli_query($con, $query)) {
            $row = mysqli_fetch_array($result)
        ?>   
        <div class="aranzman-main">

            <div class="ime-slika-aranzmana">
                <div class="ime-aranzmana">
                    <p class="naslov-aranzmana">
                    <h2 class="naziv"><?php echo $row['lok']." ";
                        if($row['mesec'] == "1"){
                            echo 'Јануар';
                        }elseif($row['mesec'] == "2"){
                            echo 'Фебруар';
                        }elseif($row['mesec'] == "3"){
                            echo 'Март';
                        }elseif($row['mesec'] == "4"){
                            echo 'Април';
                        }elseif($row['mesec'] == "5"){
                            echo 'Мај';
                        }elseif($row['mesec'] == "6"){
                            echo 'Јун';
                        }elseif($row['mesec'] == "7"){
                            echo 'Јул';
                        }elseif($row['mesec'] == "8"){
                            echo 'Август';
                        }elseif($row['mesec'] == "9"){
                            echo 'Септембар';
                        }elseif($row['mesec'] == "10"){
                            echo 'Октобар';
                        }elseif($row['mesec'] == "11"){
                            echo 'Новебар';
                        }elseif($row['mesec'] == "12"){
                            echo 'Децембар';
                        }
                        echo " ".$row['godina'].".";
                        ?><h2>
                    </p>
                       
                    <p class="lokacija-aranzmana"><i><?php echo $row['lok'] ?></i>,<?php if ($result1 = mysqli_query($con, $querylok)) {while ($row1 = mysqli_fetch_array($result1)) { echo $row1['lok']; }}?></p>
                    
                </div>
                

                <div class="slika-aranzmana">
                    
                    <div class="slider-outer">
                        <img  src="images/arrow.png" class="prev">
                        <div class ="slider-inner">
                            <img src="<?php echo $row['lokslk'] ?>" class="active">
                            <img src="<?php echo $row['slk'] ?>" class="active">
                            <img src="<?php echo $row['slk1'] ?>" class="active">
                            <img src="<?php echo $row['slk2'] ?>" class="active">
                            <img src="<?php echo $row['slk3'] ?>" class="active">
                            <img src="<?php echo $row['slk4'] ?>" class="active">
                            <img src="<?php echo $row['slk5'] ?>" class="active">                             
                        </div>
                        <img  src="images/right-arrow.png" class="next">
                        
                    </div>
                </div>
                </div>
                            
                <div class="cena-aranzmana">
                <p class="cena">
                    Укупна цена аранжмана:
                    <?php echo $row['cena'] ?>
                </p>
                <p class="prevoz">Превоз:<br><?php echo $row['prevoz'] ?>
                </p>
                </div>
            </div>
        
            <div class="opis-aranzmana">
           
                <p class="opis">
                <?php
                if ($result = mysqli_query($con, $query3)) {
                    while($row3 = mysqli_fetch_array($result)){
                ?>
                
                    Dan<?php echo $row3['red'] ?>: <?php echo $row3['opis'] ?>.
                </p>
                <?php
                }}
                ?>
                
            </div>
            
            <div class="opis-smestaj">
                <p class="smestaj">
                    Смештај:
                    <?php echo $row['imesm']?>,TIP SOBE:<?php echo $row['varijanta']?>,BROJ ZVEZDA:<?php echo $row['zvezda']?>,WIFI: <?php if($row['wifi'] == 1) {echo "IMA";} else {echo "NEMA";} ?>,KLIMA: <?php if($row['klima'] == 1) {echo "IMA";} else {echo "NEMA";} ?>,TV: <?php if($row['tv'] == 1) {echo "IMA";} else {echo "NEMA";} ?>,FRIZIDER: <?php if($row['frizider'] == 1) {echo "IMA";} else {echo "NEMA";} ?>,SEF: <?php if($row['sef'] == 1) {echo "IMA";} else {echo "NEMA";} ?>..
                </p>
            </div>
            <div class="napomena">
                <p class="napomena-text">Напомена за аранжман</p>
            </div>
            <div class="btn-rezervisi">
                <a href="rezervacija.php?pon=<?php echo $idpon?>&lok=<?php echo $lok?>" ><button class="button-rezervacija">Резервиши</button></a>
                <button class="button-uredi">Уреди</button>
                <button class="button-obrisi">Обриши</button>
            </div>
        <?php
            }
        
        ?>
    </main>
    <script>
        $(document).ready(function(){
    $('.next').on('click',function(){
        var currentImg = $('.active');
        var nextImg = currentImg.next();


        if(nextImg.length){
            currentImg.removeClass('active').css('z-index',-10);
            nextImg.addClass('active').css('z-index',10); 
        }
    });
});

$(document).ready(function(){
    $('.prev').on('click',function(){
        var currentImg = $('.active');
        var prevImg = currentImg.prev();


        if(prevImg.length){
            currentImg.removeClass('active').css('z-index',-10);
            prevImg.addClass('active').css('z-index',10); 
        }
    });
});

    </script>
   
</body>
</html>
