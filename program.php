<?php
 include('db.php');
 $id=$_GET['id'];

 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Преглед аранжмана</title>
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

    <main class="main">   
        <div class="aranzman-main">

            <div class="ime-slika-aranzmana">
                <div class="ime-aranzmana">
                    <p class="naslov-aranzmana">Наслов</p>

                    <p class="lokacija-aranzmana">Локација</p>
                </div>

                <div class="slika-aranzmana">
                    <img class="slika-smestaj" src="images/hotel.jpg">
                </div>
            </div>
            <div class="cena-aranzmana">
                <p class="cena">
                    Укупна цена аранжмана:
                    21.000рсд
                </p>
                <p class="prevoz">Могући начини превоза:</p>
            </div>
        </div>
            <div class="opis-aranzmana">
                <p class="opis">
                    Детаљан опис
                </p>
            </div>
            <div class="opis-smestaj">
                <p class="smestaj">
                    Смештај:
                    име, тип, категорија, интернет, клима, тв, фрижидер, сеф..
                </p>
            </div>
            <div class="napomena">
                <p class="napomena-text">Напомена за аранжман</p>
            </div>
            <div class="btn-rezervisi">
                <a href="rezervacija.html" ><button class="button-rezervacija">Резервиши</button></a>
            </div>
    </main>
</body>
</html>