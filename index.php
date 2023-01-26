<?php
 include('db.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title>2УЂН</title>
</head>
<body class="body">
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
            </div>
        </div>
    </header>

    <main>
        <section>
            <div class="background-img"><img id="pozadina" width="100%" height="600" src="images/pozadina.jpg"></div>
        </section>

        <div class="forms">
            <div class="search-bar">
                <input type="text" placeholder="Претражи...">
                <button type="submit"><i class="fa fa-search"></i></button>
            </div>

            <div class="transport-type">
                <select id="transport">
                    <option value="choose">Изабери превоз:</option>
                    <option value="bus">Аутобус</option>
                    <option value="train">Воз</option>
                    <option value="plane">Авион</option>
                    <option value="boat">Крстарење</option>
                    <option value="yourself">Самостални</option>
                </select>
            </div>

            <div class="date-picker">
                <input type="date" id="pickDate">

                <input type="date" id="pickDate">
            </div>
        </div>

        <section>
            <div class="grid">
                <div class="grid-info">
                   <img class="image" src="images/evropa.jpeg">
                   <a href="pretraga.php?user=4"><button class="buttons">Европа -></button></a>
                </div>
                <div class="grid-info">
                   <img class="image" src="images/azija.jpg">
                   <a href="pretraga.php?user=1"><button class="buttons">Азија -></button></a>                  
                </div>
                <div class="grid-info">
                   <img class="image" src="images/afrika.jpg">
                   <a href="pretraga.php?user=2"><button class="buttons">Африка-></button></a>               
                </div>
                <div class="grid-info">
                   <img class="image" src="images/severna.jpg">
                   <a href="pretraga.php?user=6"><button class="buttons">Северна Америка -></button></a>              
                </div>
                <div class="grid-info">
                   <img class="image" src="images/juzna.jpg">
                   <a href="pretraga.php?user=5"><button class="buttons">Јужна Америка -></button></a>              
                </div>
                <div class="grid-info">
                   <img class="image"src="images/australia.jpg">
                   <a href="pretraga.php?user=3"><button class="buttons">Аустралија -></button></a>              
               </div>
            </div>
        </section>
    </main>

</body>
</html>