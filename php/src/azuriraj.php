<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include '/var/www/html/baza_podataka.php';
session_start();

if($_SESSION["potvrdjenpristup"] != true ){
    echo '<script>window.open("index.php", "_self")</script>';
  }

if(isset($_GET["oglas"])){
    $idPon = $_GET["oglas"];
}
if(isset($_GET["lok"])){
    $idLok = $_GET["lok"];
}

if(isset($_POST["azuriraj"])){
    $conn = OpenCon();
    mysqli_query($conn ,"SET NAMES 'utf8'");
    $query="SELECT COUNT(*) as brojProvodi FROM `provodi` JOIN smestaj ON provodi.id_smestaja=smestaj.id_smestaja JOIN lokacija ON provodi.id_lokacije=lokacija.id_lokacije WHERE id_ponude=".$idPon;
    if ($result = mysqli_query($conn, $query)) {
        $red = mysqli_fetch_array($result);
        $brojProvodi= $red["brojProvodi"];    
    }
    $query="SELECT count(*) as brojDana FROM `dani` WHERE id_ponude=".$idPon;
    if ($result = mysqli_query($conn, $query)) {
        $red = mysqli_fetch_array($result);
        $brojDana= $red["brojDana"];    
    }
    $polazak = $_POST["pickDate"];
    $cena = $_POST["Cena"];
    $cenaPrevoza = $_POST["CenaPrevoza"];
    $polazna = $_POST["polazna"];
    $dana1=$_POST["dana1"];
    $ukupnoDana=$dana1;
    $lokacija1=$_POST["lokacija1"];
    $smestaj1=$_POST["smestaj1"];
    $prevoz=$_POST["prevoz"];

    for($i=2; $i<$brojDana+1; $i++){
        if(isset($_POST["dana".$i]) && $_POST["dana".$i] != "choose"){
            $dana2 = $_POST["dana".$i];
            $ukupnoDana = $ukupnoDana + $dana2; 
        }
    }
    $sql = "UPDATE `ponuda` SET `termin_polazak` = '".$polazak."', `termin_povratak` = '".$polazak."' + INTERVAL ($ukupnoDana) DAY, `cena_putovanja` = ".$cena.", `cena_prevoza` = ".$cenaPrevoza.", `id_prevoza`= ".$prevoz.", `id_lokacije_polaska` = ".$polazna."  WHERE id_ponude=".$idPon.";";
  
    if($conn->query($sql)){
        for($i=1; $i<$brojProvodi; $i++){
            $sql = "UPDATE `provodi` SET `br_dana` = ".$_POST["dana".$i].", `id_lokacije` = ".$_POST["lokacija".$i].", `id_smestaja` = ".$_POST["smestaj".$i]." WHERE id_ponude=".$idPon." AND id=".$_POST["idProvodi".$i].";";
            $conn->query($sql);
        }
        
        for($i=1; $i<$brojDana; $i++){
            $sql = "UPDATE `dani` SET `opis` = '".$_POST["opis".$i]."' WHERE id_ponude=".$idPon." AND redni_br_dana=".$i.";";
            $conn->query($sql);
            $sql = "DELETE FROM sadrzi_ativnosti WHERE id_programa=".$_POST["idPrograma".$i].";";
            if($conn->query($sql)){
                if(isset($_POST["banja".$i])){
                    $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) VALUES (".$_POST["idPrograma".$i].", ".$_POST["banja".$i].")";
                    $conn->query($sql);
                }
                if(isset($_POST["jezero".$i])){
                    $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) VALUES (".$_POST["idPrograma".$i].", ".$_POST["jezero".$i].")";
                     $conn->query($sql);
                }
                if(isset($_POST["stadion".$i])){
                    $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) VALUES (".$_POST["idPrograma".$i].", ".$_POST["stadion".$i].")";

                     $conn->query($sql);
                }
                if(isset($_POST["muzej".$i])){
                    $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) VALUES (".$_POST["idPrograma".$i].", ".$_POST["muzej".$i].")";
                     $conn->query($sql);
                }
                if(isset($_POST["opera".$i])){
                    $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) VALUES (".$_POST["idPrograma".$i].", ".$_POST["opera".$i].")";
                     $conn->query($sql);
                }
                if(isset($_POST["park".$i])){
                    $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) VALUES (".$_POST["idPrograma".$i].", ".$_POST["park".$i].")";
                     $conn->query($sql);
                } if(isset($_POST["klub".$i])){
                    $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) VALUES (".$_POST["idPrograma".$i].", ".$_POST["klub".$i].")";
                     $conn->query($sql);
                }
                if(isset($_POST["krstarenje".$i])){
                    $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) VALUES (".$_POST["idPrograma".$i].", ".$_POST["krstarenje".$i].")";
                     $conn->query($sql);
                }
                if(isset($_POST["soping".$i])){
                    $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) VALUES (".$_POST["idPrograma".$i].", ".$_POST["soping".$i].")";
                     $conn->query($sql);
                }
                if(isset($_POST["brod".$i])){
                    $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) VALUES (".$_POST["idPrograma".$i].", ".$_POST["brod".$i].")";
                     $conn->query($sql);
                }
            }
        }
        echo '<script>alert("Ажурирање успешно")</script>';
    }else{
        echo '<script>alert("'.$conn->error.'")</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="dodaj.css">
    <title>Додај понуду/аранжман</title>
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
            }else{
                echo'<a href="login.php">Пријави се</a>';
            }
            ?>    
                <a href="admin.php">Контролна табла</a>
                <a href="index.php">Почетна страна</a>
            </div>
        </div>
    </header>
    <form method="post" action="/azuriraj.php?oglas=<?php echo $idPon."&lok=".$idLok?>">
    <div class="dodaj-ponudu-container">
        <div class="dodaj-left">

                <div class="naslov-container">
                    <h1 class="naslov-dodaj">Ажурирај аранжман</h1>
                </div>

                <?php
                $conn = OpenCon();
                mysqli_query($conn ,"SET NAMES 'utf8'");
                $query="SELECT * FROM ponuda WHERE id_ponude=".$idPon;
                if ($result = mysqli_query($conn, $query)) {
                    $red = mysqli_fetch_array($result);
                ?>

                <div class="dodaj-date-picker">
                    <label>Изабери датум поласка:</label>
                    <input type="date" id="pickDate" name="pickDate" value=<?php echo $red["termin_polazak"];?>  required>
                    <!--<input type="date" id="pickDate">-->
                </div>

                <div class="dodaj-inputs">
                    <input type="text" id="Cena" name="Cena" value=<?php echo $red["cena_putovanja"];?>  required>
                    <input type="text" id="CenaPrevoza" name="CenaPrevoza" value=<?php echo $red["cena_prevoza"];?>  required>
                </div>
                <div class="dodaj-select-menu">

                    <select class="polazna-lokacija" id="polazna" name="polazna" required>
                        <option value="choose" selected >Изабери полазну локацију:</option>
                        <?php
                        $query2="SELECT * FROM lokacija";
                        $result2=mysqli_query($conn ,$query2);
                        if($result2->num_rows > 0){
                        while($row2 = $result2->fetch_assoc()){
                            if($red["id_lokacije_polaska"] ==$row2["id_lokacije"]){
                                echo ' <option value="'.$row2["id_lokacije"].'" selected>'.$row2["mesto"].'</option>';
                            }else{
                                echo ' <option value="'.$row2["id_lokacije"].'">'.$row2["mesto"].'</option>';
                            }
                           
                            }
                        }
                        ?>
                    </select><br/>

                    <?php
                    $query2="SELECT * FROM `provodi` JOIN smestaj ON provodi.id_smestaja=smestaj.id_smestaja JOIN lokacija ON provodi.id_lokacije=lokacija.id_lokacije WHERE id_ponude=".$idPon;
                    $result2=mysqli_query($conn ,$query2);
                        if($result2->num_rows > 0){
                            $i=0;
                        while($row2 = $result2->fetch_assoc()){
                            $i++;
                            echo '<input type="hidden" name="idProvodi'.$i.'" id="idProvodi'.$i.'" value='.$row2["id"].' />';
                            
                            echo ' <select class="lokacija-putovanja" id="lokacija'.$i.'" name="lokacija'.$i.'">';
                            $query3="SELECT * FROM lokacija";
                            $result3=mysqli_query($conn ,$query3);
                            if($result3->num_rows > 0){
                            while($row3 = $result3->fetch_assoc()){
                                if($row2["id_lokacije"] == $row3["id_lokacije"]){
                                    echo ' <option value="'.$row3["id_lokacije"].'" selected>'.$row3["mesto"].'</option>';
                                }else{
                                    echo ' <option value="'.$row3["id_lokacije"].'">'.$row3["mesto"].'</option>';
                                    }
                                }
                            }
                            echo '</select>';
                            echo '<select class="lokacija-putovanja" id="smestaj'.$i.'" name="smestaj'.$i.'" >';
                            $query3="SELECT id_smestaja, naziv_objekta FROM smestaj";
                            $result3=mysqli_query($conn ,$query3);
                            if($result3->num_rows > 0){
                            while($row3 = $result3->fetch_assoc()){
                                if($row2["id_smestaja"] == $row3["id_smestaja"]){
                                echo ' <option value="'.$row3["id_smestaja"].'" selected>'.$row3["naziv_objekta"].'</option>';
                                }else{
                                    echo ' <option value="'.$row3["id_smestaja"].'">'.$row3["naziv_objekta"].'</option>';
                                    }
                                }
                            }
                            echo '</select>';
                            echo '<select class="lokacija-putovanja" id="dana'.$i.'" name="dana'.$i.'">';
                            for($j=1; $j<6; $j++){
                                if($j == $row2["br_dana"]){
                                    echo '<option value="'.$j.'" selected>'.$j.'</option>';
                                }else{
                                    echo '<option value="'.$j.'">'.$j.'</option>';
                                }
                            }
                            echo '</select><br/>';

                        }
                    }
                }
                    ?>


                    <select class="nacin-prevoza" id="prevoz" name="prevoz" value=<?php echo $red["id_prevoza"]?>>
                        <option value="1">Аутобус</option>
                        <option value="4">Воз</option>
                        <option value="2">Авион</option>
                        <option value="3">Крстарење</option>
                        <option value="5">Самостални</option>
                    </select>

                </div>


            </div>
            <div class="dodaj-right">

            <div class="textareas">
                <?php
                
                $query2="SELECT * FROM `dani` WHERE id_ponude=".$idPon;
                $result2=mysqli_query($conn ,$query2);
                if($result2->num_rows > 0){
                    $i=0;
                    while($row2 = $result2->fetch_assoc()){
                    $i++;  
                    echo '<div class="fakultative-opis">'; 
                    echo '<textarea style="width: 50%; height: 70px; margin-top: 2%;" class="dodaj-opis" name="opis'.$i.'" id="opis'.$i.'">'.$row2["opis"].'</textarea><br>';
                    echo '<fieldset class="dodaj-karakteristike">';
                    echo '<legend>Изабери факултативне активнопсти:</legend>';
                    echo '<input type="hidden" name="idPrograma'.$i.'" id="idPrograma'.$i.'" value='.$row2["id_programa"].' />';
                    $query3="SELECT fakultativne_aktivnosti.id_aktivnosti from sadrzi_ativnosti JOIN fakultativne_aktivnosti ON sadrzi_ativnosti.id_aktivnosti=fakultativne_aktivnosti.id_aktivnosti WHERE sadrzi_ativnosti.id_programa=".$row2["id_programa"];
                    $result3=mysqli_query($conn ,$query3);
                    $aktivnosti = array("");
                    if($result3->num_rows > 0){
                        while($row3 = $result3->fetch_assoc()){
                            array_push($aktivnosti, $row3["id_aktivnosti"]);
                        }
                    }
                    if(in_array("1", $aktivnosti)){
                        echo '<input type="checkbox" id="banja'.$i.'" name="banja'.$i.'" value="1" checked>
                              <label for="banja">Посета бање</label>';
                    }else{
                        echo '<input type="checkbox" id="banja'.$i.'" name="banja'.$i.'" value="1" >
                              <label for="banja">Посета бање</label>';
                    }
                    if(in_array("2", $aktivnosti)){
                        echo '<input type="checkbox" id="jezero'.$i.'" name="jezero'.$i.'" value="2" checked>
                        <label for="jezero">Посета језера</label>';
                    }else{
                        echo '<input type="checkbox" id="jezero'.$i.'" name="jezero'.$i.'" value="2">
                        <label for="jezero">Посета језера</label>';
                    }
                    if(in_array("3", $aktivnosti)){
                        echo '<input type="checkbox" id="stadion'.$i.'" name="stadion'.$i.'" value="3" checked>
                        <label for="stadion">Посета стадиона</label>';
                    }else{
                        echo '<input type="checkbox" id="stadion'.$i.'" name="stadion'.$i.'" value="3" >
                        <label for="stadion">Посета стадиона</label>';
                    }
                    if(in_array("4", $aktivnosti)){
                        echo '<input type="checkbox" id="muzej'.$i.'" name="muzej'.$i.'"  value="4" checked>
                        <label for="muzej">Посета музеја</label>';
                    }else{
                        echo '<input type="checkbox" id="muzej'.$i.'" name="muzej'.$i.'"  value="4">
                        <label for="muzej">Посета музеја</label>';
                    }
                    if(in_array("5", $aktivnosti)){
                        echo '<input type="checkbox" id="opera'.$i.'" name="opera'.$i.'" value="5" checked>
                        <label for="opera">Посета опере</label>';
                    }else{
                        echo '<input type="checkbox" id="opera'.$i.'" name="opera'.$i.'" value="5">
                        <label for="opera">Посета опере</label>';
                    }
                    if(in_array("6", $aktivnosti)){
                        echo '<input type="checkbox" id="park'.$i.'" name="park'.$i.'" value="6" checked>
                        <label for="park">Шетња парком</label>';
                    }else{
                        echo '<input type="checkbox" id="park'.$i.'" name="park'.$i.'" value="6">
                        <label for="park">Шетња парком</label>';
                    }
                    if(in_array("7", $aktivnosti)){
                        echo '<input type="checkbox" id="klub'.$i.'" name="klub'.$i.'" value="7" checked>
                        <label for="klub">Журка у клубу</label>';
                    }else{
                        echo '<input type="checkbox" id="klub'.$i.'" name="klub'.$i.'" value="7">
                        <label for="klub">Журка у клубу</label>';
                    }
                    if(in_array("8", $aktivnosti)){
                        echo '<input type="checkbox" id="brod'.$i.'" name="brod'.$i.'" value="8" checked>
                        <label for="brod">Журка на броду</label>';
                    }else{
                        echo '<input type="checkbox" id="brod'.$i.'" name="brod'.$i.'" value="8">
                        <label for="brod">Журка на броду</label>';
                    }
                    if(in_array("9", $aktivnosti)){
                        echo '<input type="checkbox" id="krstarenje'.$i.'" name="krstarenje'.$i.'" value="9" checked>
                        <label for="krstarenje">Факултативно крстарење</label>';
                    }else{
                        echo '<input type="checkbox" id="krstarenje'.$i.'" name="krstarenje'.$i.'" value="9">
                        <label for="krstarenje">Факултативно крстарење</label>';
                    }
                    if(in_array("10", $aktivnosti)){
                        echo '<input type="checkbox" id="soping'.$i.'" name="soping'.$i.'" value="10" checked>
                        <label for="soping">Посета шопинг центру</label>';
                    }else{
                        echo '<input type="checkbox" id="soping'.$i.'" name="soping'.$i.'" value="10">
                        <label for="soping">Посета шопинг центру</label>';
                    }
                    echo '</div>';
                }
            }
        
            ?>
                <div class="dugme-potvrdi-ponudu"><button class="button-dodaj" name="azuriraj">Ажурирај аранжман</button></div>

        </div>
    </div>
    </form>
</body>
</html>