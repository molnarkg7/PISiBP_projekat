<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include 'baza_podataka.php';
session_start();





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
    <script> function funk(){
    var x = document.getElementById("lokacija").value;
    location.href='index.php?drzava=' + x;
    
    }</script>
</head>
<body class="body">
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
               /*if($_SESSION['id_tipa']==2){
                echo'<a href="odobravanjeOglasa.php">Одобри огласе</a>';
                echo'<a href="kontrolnatabla.php">Контролна табла</a>';
               }*/
            }else{
                echo'<a href="login.php">Пријави се</a>';
            }
            ?>    
                <a href="job.php">Посао</a>
                <a href="contact.php">Контакт</a>
                <a href="about.php">О нама</a>
            </div>
        </div>
    </header>

    <main>
        <section>
            <div class="background-img"><img id="pozadina" width="100%" height="600" src="images/pozadina.jpg"></div>
        </section>

        <form class="forms" action="/pretraga.php" method="post">
            <div class="search-bar">
        
                <select id="lokacija" name="drzava" onchange="funk()">
                    <option disabled selected>Држава:</option>
                    <?php
                    $conn= OpenCon();
                    mysqli_query($conn ,"SET NAMES 'utf8'");
                     $sql="SELECT * FROM `drzava`"; 
                     if(isset($_GET['drzava'])){
                        $idDrzava=$_GET['drzava'];
                    }
                     $rezultat=mysqli_query($conn ,$sql);
                     if($rezultat->num_rows > 0){
                     while($red = $rezultat->fetch_assoc()){
                        if($red["id_drzava"] == $idDrzava){
                            echo'<option  value="'.$red["id_drzava"].'" selected>'.$red["naziv"].'</option>';
                        }else{
                            echo'<option value="'.$red["id_drzava"].'">'.$red["naziv"].'</option>';
                        }
                     }
                    }
                    CloseCon($conn)
                    ?>
                </select>
                <select id="lokacija" name="lokacija">
                    <option disabled selected>Локација</option>
                    <?php
                    $conn= OpenCon();
                   mysqli_query($conn ,"SET NAMES 'utf8'");
                    if(isset($_GET['drzava'])){
                        $idDrzava=$_GET['drzava'];
                        $sql="SELECT * FROM `lokacija` WHERE id_drzava = ".$idDrzava.""; 
                    }else{
                        $sql="SELECT * FROM `lokacija`"; 
                    }
                     $rezultat=mysqli_query($conn, $sql);
                     if($rezultat->num_rows > 0){
                     while($red = $rezultat->fetch_assoc()){
                        echo'<option value="'.$red["id_lokacije"].'">'.$red["mesto"].'</option>';
                     }
                    }
                    CloseCon($conn)
                    ?>
                </select>
                
            <button type="submit" name="pretraga" ><i class="fa fa-search"></i></button>
            </div>


            <div class="transport-type" >
                <select id="transport" name="prevoz" >
                    <option  disabled selected>Изабери превоз:</option>
                    <option  value="1">Аутобус</option>
                    <option value="4">Воз</option>
                    <option value="2">Авион</option>
                    <option value="3">Крстарење</option>
                    <option value="5">Самостални</option>
                </select>
            </div>

            <div class="date-picker">
                <input type="date" id="pickDate" name="polazak">

                <input type="date" id="pickDate" name="povratak">
            </div>
                

        <section>
            <div class="grid">
                <div class="grid-info">
                   <img class="image" src="images/evropa.jpeg">
                   <button type="submit" name="pretraga" value="4" class="buttons">Европа -></button>  
                </div>
                <div class="grid-info">
                   <img class="image" src="images/azija.jpg">
                   <button type="submit" name="pretraga" value="1" class="buttons">Азија -></button>        
                </div>
                <div class="grid-info">
                   <img class="image" src="images/afrika.jpg">
                   <button type="submit" name="pretraga" value="2" class="buttons">Африка-></button>             
                </div>
                <div class="grid-info">
                   <img class="image" src="images/severna.jpg">
                   <button type="submit" name="pretraga" value="6" class="buttons">Северна Америка -></button>             
                </div>
                <div class="grid-info">
                   <img class="image" src="images/juzna.jpg">
                   <button type="submit" name="pretraga" value="5" class="buttons">Јужна Америка -></button>            
                </div>
                <div class="grid-info">
                   <img class="image"src="images/australia.jpg">
                   <button type="submit" name="pretraga" value="3" class="buttons">Аустралија -></button>           
               </div>
            </div>
        </section>
        </form>
    </main>

</body>
</html>
