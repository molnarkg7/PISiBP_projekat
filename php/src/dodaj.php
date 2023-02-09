<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include '/var/www/html/baza_podataka.php';
session_start();

if($_SESSION["potvrdjenpristup"] != true ){
    echo '<script>window.open("index.php", "_self")</script>';
  }

if(isset($_POST["dodaj"])){
    $polazak = $_POST["pickDate"];
    $cena = $_POST["Cena"];
    $cenaPrevoza = $_POST["CenaPrevoza"];
    $polazna = $_POST["polazna"];
    $dana1=$_POST["dana1"];
    $ukupnoDana=$dana1;
    $lokacija1=$_POST["lokacija1"];
    $smestaj1=$_POST["smestaj1"];
    $prevoz=$_POST["prevoz"];

    if(isset($_POST["dana2"]) && $_POST["dana2"] != "choose"){
        $dana2 = $_POST["dana2"];
        $ukupnoDana = $ukupnoDana + $dana2; 
    }if(isset($_POST["dana3"]) && $_POST["dana3"] != "choose"){
        $dana3 = $_POST["dana3"];
        $ukupnoDana = $ukupnoDana + $dana3; 
    }if(isset($_POST["dana4"]) && $_POST["dana4"] != "choose"){
        $dana4 = $_POST["dana4"];
        $ukupnoDana = $ukupnoDana + $dana4; 
    }if(isset($_POST["dana5"]) && $_POST["dana5"] != "choose"){
        $dana5 = $_POST["dana5"];
        $ukupnoDana = $ukupnoDana + $dana5; 
    }


    $conn = OpenCon();
    $conn->query("SET NAMES 'utf8'");
    $sql = "INSERT INTO `ponuda` (`termin_polazak`, `termin_povratak`, `cena_putovanja`, `cena_prevoza`, `id_prevoza`, `id_lokacije_polaska`) VALUES ('".$polazak."', '".$polazak."' + INTERVAL ($ukupnoDana) DAY, ".$cena.", ".$cenaPrevoza.", ".$prevoz.", ".$polazna.");";
    if($conn->query($sql)){
        $sql="INSERT INTO `provodi` (`br_dana`, `id_lokacije`, `id_smestaja`, `id_ponude`) 
        SELECT '".$dana1."', '".$lokacija1."', '".$smestaj1."', id_ponude FROM ponuda WHERE termin_polazak='".$polazak."' ORDER BY id_ponude DESC LIMIT 1;";
     if($conn->query($sql)){
        if( $_POST["dana2"] != "choose" && $_POST["smestaj2"] != "choose" && $_POST["lokacija2"] != "choose"){
            $sql="INSERT INTO `provodi` (`br_dana`, `id_lokacije`, `id_smestaja`, `id_ponude`) 
            SELECT '".$_POST["dana2"]."', '".$_POST["lokacija2"]."', '".$_POST["smestaj2"]."', id_ponude FROM ponuda WHERE termin_polazak='".$polazak."' ORDER BY id_ponude DESC LIMIT 1;";
            $conn->query($sql);
        }
        if( $_POST["dana3"] != "choose" && $_POST["smestaj3"] != "choose" && $_POST["lokacija3"] != "choose"){
            $sql="INSERT INTO `provodi` (`br_dana`, `id_lokacije`, `id_smestaja`, `id_ponude`) 
            SELECT '".$_POST["dana3"]."', '".$_POST["lokacija3"]."', '".$_POST["smestaj3"]."', id_ponude FROM ponuda WHERE termin_polazak='".$polazak."' ORDER BY id_ponude DESC LIMIT 1;";
            $conn->query($sql);
        }
        if( $_POST["dana4"] != "choose" && $_POST["smestaj4"] != "choose" && $_POST["lokacija4"] != "choose"){
            $sql="INSERT INTO `provodi` (`br_dana`, `id_lokacije`, `id_smestaja`, `id_ponude`) 
            SELECT '".$_POST["dana4"]."', '".$_POST["lokacija4"]."', '".$_POST["smestaj4"]."', id_ponude FROM ponuda WHERE termin_polazak='".$polazak."' ORDER BY id_ponude DESC LIMIT 1;";
            $conn->query($sql);
        }
        if( $_POST["dana5"] != "choose" && $_POST["smestaj5"] != "choose" && $_POST["lokacija5"] != "choose"){
            $sql="INSERT INTO `provodi` (`br_dana`, `id_lokacije`, `id_smestaja`, `id_ponude`) 
            SELECT '".$_POST["dana5"]."', '".$_POST["lokacija5"]."', '".$_POST["smestaj5"]."', id_ponude FROM ponuda WHERE termin_polazak='".$polazak."' ORDER BY id_ponude DESC LIMIT 1;";
            $conn->query($sql);
        }
        if(isset($_POST["banja1"]) || isset($_POST["jezero1"]) || isset($_POST["stadion1"]) || isset($_POST["muzej1"]) || isset($_POST["opera1"]) || isset($_POST["park1"]) || isset($_POST["klub1"]) || isset($_POST["krstarenje1"]) || isset($_POST["soping1"]) || isset($_POST["brod1"])){
            $conn->query("INSERT INTO program_putovanja (id_programa) VALUES(NULL)");
            if(isset($_POST["banja1"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["banja1"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["jezero1"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["jezero1"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["stadion1"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["stadion1"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["muzej1"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["muzej1"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["opera1"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["opera1"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["park1"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["park1"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            } if(isset($_POST["klub1"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["klub1"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["krstarenje1"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["krstarenje1"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["soping1"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["soping1"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["brod1"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["brod1"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }

            $upit="SELECT id_programa FROM program_putovanja ORDER BY id_programa DESC LIMIT 1;";
            if ($result1 = mysqli_query($conn,  $upit)) {
                $row1 = mysqli_fetch_array($result1);
                $id_programa = $row1["id_programa"];
                $sql="INSERT INTO `dani` (`redni_br_dana`, `id_ponude`, `id_programa`, opis) 
                SELECT 1, id_ponude , ".$id_programa.", '".$_POST["opis1"]."' FROM ponuda WHERE termin_polazak='".$polazak."' ORDER BY id_ponude DESC LIMIT 1;";
                $conn->query($sql);
            }
            
        }
        if(isset($_POST["banja2"]) || isset($_POST["jezero2"]) || isset($_POST["stadion2"]) || isset($_POST["muzej2"]) || isset($_POST["opera2"]) || isset($_POST["park2"]) || isset($_POST["klub2"]) || isset($_POST["krstarenje2"]) || isset($_POST["soping2"]) || isset($_POST["brod2"])){
            $conn->query("INSERT INTO program_putovanja (id_programa) VALUES(NULL)");
            if(isset($_POST["banja2"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["banja2"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["jezero2"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["jezero2"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["stadion2"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["stadion2"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["muzej2"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["muzej2"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["opera2"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["opera2"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["park2"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["park2"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            } if(isset($_POST["klub2"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["klub2"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["krstarenje2"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["krstarenje2"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["soping2"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["soping2"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["brod2"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["brod2"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }

            if ($result = mysqli_query($con, "SELECT id_programa FROM program_putovanja ORDER BY id_programa DESC LIMIT 1;")) {
                $row = mysqli_fetch_array($result);
                $id_programa = $row["id_programa"];
                $sql="INSERT INTO `dani` (`redni_br_dana`, `id_ponude`, `id_programa`, opis) 
                SELECT 2, id_ponude , ".$id_programa.", '".$_POST["opis2"]."' FROM ponuda WHERE termin_polazak='".$polazak."' ORDER BY id_ponude DESC LIMIT 1;";
                $conn->query($sql);
            }
            
        }
        if(isset($_POST["banja3"]) || isset($_POST["jezero3"]) || isset($_POST["stadion3"]) || isset($_POST["muzej3"]) || isset($_POST["opera3"]) || isset($_POST["park3"]) || isset($_POST["klub3"]) || isset($_POST["krstarenje3"]) || isset($_POST["soping3"]) || isset($_POST["brod3"])){
            $conn->query("INSERT INTO program_putovanja (id_programa) VALUES(NULL)");
            if(isset($_POST["banja3"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["banja3"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["jezero3"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["jezero3"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["stadion3"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["stadion3"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["muzej3"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["muzej3"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["opera3"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["opera3"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["park3"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["park3"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            } if(isset($_POST["klub3"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["klub3"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["krstarenje3"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["krstarenje3"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["soping3"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["soping3"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["brod3"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["brod3"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }

            if ($result = mysqli_query($con, "SELECT id_programa FROM program_putovanja ORDER BY id_programa DESC LIMIT 1;")) {
                $row = mysqli_fetch_array($result);
                $id_programa = $row["id_programa"];
                $sql="INSERT INTO `dani` (`redni_br_dana`, `id_ponude`, `id_programa`, opis) 
                SELECT 3, id_ponude , ".$id_programa.", '".$_POST["opis3"]."' FROM ponuda WHERE termin_polazak='".$polazak."' ORDER BY id_ponude DESC LIMIT 1;";
                $conn->query($sql);
            }
            
        }
        if(isset($_POST["banja4"]) || isset($_POST["jezero4"]) || isset($_POST["stadion4"]) || isset($_POST["muzej4"]) || isset($_POST["opera4"]) || isset($_POST["park4"]) || isset($_POST["klub4"]) || isset($_POST["krstarenje4"]) || isset($_POST["soping4"]) || isset($_POST["brod4"])){
            $conn->query("INSERT INTO program_putovanja (id_programa) VALUES(NULL)");
            if(isset($_POST["banja4"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["banja4"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["jezero4"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["jezero4"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["stadion4"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["stadion4"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["muzej4"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["muzej4"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["opera4"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["opera4"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["park4"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["park4"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            } if(isset($_POST["klub4"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["klub4"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["krstarenje4"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["krstarenje4"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["soping4"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["soping4"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["brod4"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["brod4"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }

            if ($result = mysqli_query($con, "SELECT id_programa FROM program_putovanja ORDER BY id_programa DESC LIMIT 1;")) {
                $row = mysqli_fetch_array($result);
                $id_programa = $row["id_programa"];
                $sql="INSERT INTO `dani` (`redni_br_dana`, `id_ponude`, `id_programa`, opis) 
                SELECT 4, id_ponude , ".$id_programa.", '".$_POST["opis4"]."' FROM ponuda WHERE termin_polazak='".$polazak."' ORDER BY id_ponude DESC LIMIT 1;";
                $conn->query($sql);
            }
            
        }
        if(isset($_POST["banja5"]) || isset($_POST["jezero5"]) || isset($_POST["stadion5"]) || isset($_POST["muzej5"]) || isset($_POST["opera5"]) || isset($_POST["park5"]) || isset($_POST["klub5"]) || isset($_POST["krstarenje5"]) || isset($_POST["soping5"]) || isset($_POST["brod5"])){
            $conn->query("INSERT INTO program_putovanja (id_programa) VALUES(NULL)");
            if(isset($_POST["banja5"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["banja5"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["jezero5"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["jezero5"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["stadion5"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["stadion5"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["muzej5"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["muzej5"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["opera5"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["opera5"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["park5"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["park5"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            } if(isset($_POST["klub5"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["klub5"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["krstarenje5"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["krstarenje5"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["soping5"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["soping5"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["brod5"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["brod5"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }

            if ($result = mysqli_query($con, "SELECT id_programa FROM program_putovanja ORDER BY id_programa DESC LIMIT 1;")) {
                $row = mysqli_fetch_array($result);
                $id_programa = $row["id_programa"];
                $sql="INSERT INTO `dani` (`redni_br_dana`, `id_ponude`, `id_programa`, opis) 
                SELECT 5, id_ponude , ".$id_programa.", '".$_POST["opis5"]."' FROM ponuda WHERE termin_polazak='".$polazak."' ORDER BY id_ponude DESC LIMIT 1;";
                $conn->query($sql);
            }
            
        }
        if(isset($_POST["banja6"]) || isset($_POST["jezero6"]) || isset($_POST["stadion6"]) || isset($_POST["muzej6"]) || isset($_POST["opera6"]) || isset($_POST["park6"]) || isset($_POST["klub6"]) || isset($_POST["krstarenje6"]) || isset($_POST["soping6"]) || isset($_POST["brod6"])){
            $conn->query("INSERT INTO program_putovanja (id_programa) VALUES(NULL)");
            if(isset($_POST["banja6"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["banja6"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["jezero6"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["jezero6"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["stadion6"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["stadion6"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["muzej6"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["muzej6"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["opera6"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["opera6"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["park6"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["park6"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            } if(isset($_POST["klub6"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["klub6"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["krstarenje6"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["krstarenje6"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["soping6"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["soping6"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["brod6"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["brod6"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }

            if ($result = mysqli_query($con, "SELECT id_programa FROM program_putovanja ORDER BY id_programa DESC LIMIT 1;")) {
                $row = mysqli_fetch_array($result);
                $id_programa = $row["id_programa"];
                $sql="INSERT INTO `dani` (`redni_br_dana`, `id_ponude`, `id_programa`, opis) 
                SELECT 6, id_ponude , ".$id_programa.", '".$_POST["opis6"]."' FROM ponuda WHERE termin_polazak='".$polazak."' ORDER BY id_ponude DESC LIMIT 1;";
                $conn->query($sql);
            }
            
        }
        if(isset($_POST["banja7"]) || isset($_POST["jezero7"]) || isset($_POST["stadion7"]) || isset($_POST["muzej7"]) || isset($_POST["opera7"]) || isset($_POST["park7"]) || isset($_POST["klub7"]) || isset($_POST["krstarenje7"]) || isset($_POST["soping7"]) || isset($_POST["brod7"])){
            $conn->query("INSERT INTO program_putovanja (id_programa) VALUES(NULL)");
            if(isset($_POST["banja7"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["banja7"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["jezero7"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["jezero7"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["stadion7"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["stadion7"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["muzej7"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["muzej7"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["opera7"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["opera7"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["park7"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["park7"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            } if(isset($_POST["klub7"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["klub7"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["krstarenje7"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["krstarenje7"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["soping7"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["soping7"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["brod7"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["brod7"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }

            if ($result = mysqli_query($con, "SELECT id_programa FROM program_putovanja ORDER BY id_programa DESC LIMIT 1;")) {
                $row = mysqli_fetch_array($result);
                $id_programa = $row["id_programa"];
                $sql="INSERT INTO `dani` (`redni_br_dana`, `id_ponude`, `id_programa`, opis) 
                SELECT 7, id_ponude , ".$id_programa.", '".$_POST["opis7"]."' FROM ponuda WHERE termin_polazak='".$polazak."' ORDER BY id_ponude DESC LIMIT 1;";
                $conn->query($sql);
            }
            
        }
        if(isset($_POST["banja8"]) || isset($_POST["jezero8"]) || isset($_POST["stadion8"]) || isset($_POST["muzej8"]) || isset($_POST["opera8"]) || isset($_POST["park8"]) || isset($_POST["klub8"]) || isset($_POST["krstarenje8"]) || isset($_POST["soping8"]) || isset($_POST["brod8"])){
            $conn->query("INSERT INTO program_putovanja (id_programa) VALUES(NULL)");
            if(isset($_POST["banja8"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["banja8"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["jezero8"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["jezero8"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["stadion8"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["stadion8"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["muzej8"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["muzej8"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["opera8"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["opera8"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["park8"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["park8"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            } if(isset($_POST["klub8"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["klub8"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["krstarenje8"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["krstarenje8"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["soping8"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["soping8"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["brod8"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["brod8"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }

            if ($result = mysqli_query($con, "SELECT id_programa FROM program_putovanja ORDER BY id_programa DESC LIMIT 1;")) {
                $row = mysqli_fetch_array($result);
                $id_programa = $row["id_programa"];
                $sql="INSERT INTO `dani` (`redni_br_dana`, `id_ponude`, `id_programa`, opis) 
                SELECT 8, id_ponude , ".$id_programa.", '".$_POST["opis8"]."' FROM ponuda WHERE termin_polazak='".$polazak."' ORDER BY id_ponude DESC LIMIT 1;";
                $conn->query($sql);
            }
            
        }
        if(isset($_POST["banja9"]) || isset($_POST["jezero9"]) || isset($_POST["stadion9"]) || isset($_POST["muzej9"]) || isset($_POST["opera9"]) || isset($_POST["park9"]) || isset($_POST["klub9"]) || isset($_POST["krstarenje9"]) || isset($_POST["soping9"]) || isset($_POST["brod9"])){
            $conn->query("INSERT INTO program_putovanja (id_programa) VALUES(NULL)");
            if(isset($_POST["banja9"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["banja9"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["jezero9"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["jezero9"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["stadion9"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["stadion9"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["muzej9"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["muzej9"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["opera9"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["opera9"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["park9"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["park9"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            } if(isset($_POST["klub9"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["klub9"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["krstarenje9"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["krstarenje9"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["soping9"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["soping9"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["brod9"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["brod9"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }

            if ($result = mysqli_query($con, "SELECT id_programa FROM program_putovanja ORDER BY id_programa DESC LIMIT 1;")) {
                $row = mysqli_fetch_array($result);
                $id_programa = $row["id_programa"];
                $sql="INSERT INTO `dani` (`redni_br_dana`, `id_ponude`, `id_programa`, opis) 
                SELECT 9, id_ponude , ".$id_programa.", '".$_POST["opis9"]."' FROM ponuda WHERE termin_polazak='".$polazak."' ORDER BY id_ponude DESC LIMIT 1;";
                $conn->query($sql);
            }
            
        }
        if(isset($_POST["banja10"]) || isset($_POST["jezero10"]) || isset($_POST["stadion10"]) || isset($_POST["muzej10"]) || isset($_POST["opera10"]) || isset($_POST["park10"]) || isset($_POST["klub10"]) || isset($_POST["krstarenje10"]) || isset($_POST["soping10"]) || isset($_POST["brod10"])){
            $conn->query("INSERT INTO program_putovanja (id_programa) VALUES(NULL)");
            if(isset($_POST["banja10"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["banja10"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["jezero10"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["jezero10"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["stadion10"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["stadion10"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["muzej10"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["muzej10"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["opera10"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["opera10"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["park10"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["park10"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            } if(isset($_POST["klub10"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["klub10"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["krstarenje10"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["krstarenje10"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["soping10"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["soping10"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }
            if(isset($_POST["brod10"])){
                $sql="INSERT INTO `sadrzi_ativnosti` (`id_programa`, `id_aktivnosti`) 
                SELECT id_programa, '".$_POST["brod10"]." FROM program_putovanja ORDER BY id_ponude DESC LIMIT 1;";
                 $conn->query($sql);
            }

            if ($result = mysqli_query($con, "SELECT id_programa FROM program_putovanja ORDER BY id_programa DESC LIMIT 1;")) {
                $row = mysqli_fetch_array($result);
                $id_programa = $row["id_programa"];
                $sql="INSERT INTO `dani` (`redni_br_dana`, `id_ponude`, `id_programa`, opis) 
                SELECT 10, id_ponude , ".$id_programa.", '".$_POST["opis10"]."' FROM ponuda WHERE termin_polazak='".$polazak."' ORDER BY id_ponude DESC LIMIT 1;";
                $conn->query($sql);
            }
            
        }
        echo '<script>alert("Успешно унето.")</script>';
     }

     else{
        echo '<script>alert("'.$conn->error.'")</script>';
       
    }
    }else{
        echo '<script>alert("Грешка при уносу понуде.")</script>';
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
    <form method="post" action="/dodaj.php">
    <div class="dodaj-ponudu-container">
        <div class="dodaj-left">

                <div class="naslov-container">
                    <h1 class="naslov-dodaj">Додај понуду/аранжман</h1>
                </div>

                <div class="dodaj-date-picker">
                    <label>Изабери датум поласка:</label>
                    <input type="date" id="pickDate" name="pickDate" required>
                    <!--<input type="date" id="pickDate">-->
                </div>

                <div class="dodaj-inputs">
                    <input type="text" id="Cena" name="Cena" placeholder="Цена" required>
                    <input type="text" id="CenaPrevoza" name="CenaPrevoza" placeholder="Цена преовза" required>
                </div>
                <div class="dodaj-select-menu">

                    <select class="polazna-lokacija" id="polazna" name="polazna" required>
                        <option value="choose" selected >Изабери полазну локацију:</option>
                        <?php
                        $conn = OpenCon();
                        $query2="SELECT * FROM lokacija";
                        $result2=mysqli_query($conn ,$query2);
                        if($result2->num_rows > 0){
                        while($row2 = $result2->fetch_assoc()){
                            echo ' <option value="'.$row2["id_lokacije"].'">'.$row2["mesto"].'</option>';
                            }
                        }
                        CloseCon($conn);
                        ?>
                    </select><br/>

                    <select class="lokacija-putovanja" id="lokacija1" name="lokacija1" required>
                        <option value="choose" selected >Локација:</option> 
                        <?php
                        $conn = OpenCon();
                        $query2="SELECT * FROM lokacija";
                        $result2=mysqli_query($conn ,$query2);
                        if($result2->num_rows > 0){
                        while($row2 = $result2->fetch_assoc()){
                            echo ' <option value="'.$row2["id_lokacije"].'">'.$row2["mesto"].'</option>';
                            }
                        }
                        CloseCon($conn);
                        ?>
                    </select>
                    <select class="lokacija-putovanja" id="smestaj1" name="smestaj1" required>
                    <option value="choose" selected >Смештај:</option>  
                        <?php
                        $conn = OpenCon();
                        $query2="SELECT id_smestaja, naziv_objekta FROM smestaj";
                        $result2=mysqli_query($conn ,$query2);
                        if($result2->num_rows > 0){
                        while($row2 = $result2->fetch_assoc()){
                            echo ' <option value="'.$row2["id_smestaja"].'">'.$row2["naziv_objekta"].'</option>';
                            }
                        }
                        CloseCon($conn);
                        ?>
                    </select>
                    <select class="lokacija-putovanja" id="dana1" name="dana1" required>
                        <option value="choose">Број дана:</option> 
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select><br/>
                    <select class="lokacija-putovanja" id="lokacija2" name="lokacija2">
                    <option value="choose" selected >Локација:</option> 
                        <?php
                        $conn = OpenCon();
                        $query2="SELECT * FROM lokacija";
                        $result2=mysqli_query($conn ,$query2);
                        if($result2->num_rows > 0){
                        while($row2 = $result2->fetch_assoc()){
                            echo ' <option value="'.$row2["id_lokacije"].'">'.$row2["mesto"].'</option>';
                            }
                        }
                        CloseCon($conn);
                        ?>
                    </select>
                    <select class="lokacija-putovanja" id="smestaj2" name="smestaj2">
                    <option value="choose" selected >Смештај:</option>  
                        <?php
                        $conn = OpenCon();
                        $query2="SELECT id_smestaja, naziv_objekta FROM smestaj";
                        $result2=mysqli_query($conn ,$query2);
                        if($result2->num_rows > 0){
                        while($row2 = $result2->fetch_assoc()){
                            echo ' <option value="'.$row2["id_smestaja"].'">'.$row2["naziv_objekta"].'</option>';
                            }
                        }
                        CloseCon($conn);
                        ?>
                    </select>
                    <select class="lokacija-putovanja" id="dana2" name="dana2">
                        <option value="choose">Број дана:</option> <!--повлаче се градови из базе-->
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select><br/>
                    <select class="lokacija-putovanja" id="lokacija3" name="lokacija3">
                    <option value="choose" selected >Локација:</option> 
                        <?php
                        $conn = OpenCon();
                        $query2="SELECT * FROM lokacija";
                        $result2=mysqli_query($conn ,$query2);
                        if($result2->num_rows > 0){
                        while($row2 = $result2->fetch_assoc()){
                            echo ' <option value="'.$row2["id_lokacije"].'">'.$row2["mesto"].'</option>';
                            }
                        }
                        CloseCon($conn);
                        ?>
                    </select>
                    <select class="lokacija-putovanja" id="smestaj3" name="smestaj3">
                    <option value="choose" selected >Смештај:</option>  
                        <?php
                        $conn = OpenCon();
                        $query2="SELECT id_smestaja, naziv_objekta FROM smestaj";
                        $result2=mysqli_query($conn ,$query2);
                        if($result2->num_rows > 0){
                        while($row2 = $result2->fetch_assoc()){
                            echo ' <option value="'.$row2["id_smestaja"].'">'.$row2["naziv_objekta"].'</option>';
                            }
                        }
                        CloseCon($conn);
                        ?>
                    </select>
                    <select class="lokacija-putovanja" id="dana3" name="dana3">
                        <option value="choose">Број дана:</option> <!--повлаче се градови из базе-->
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select><br/>
                    <select class="lokacija-putovanja" id="lokacija4" name="lokacija4">
                    <option value="choose" selected >Локација:</option> 
                        <?php
                        $conn = OpenCon();
                        $query2="SELECT * FROM lokacija";
                        $result2=mysqli_query($conn ,$query2);
                        if($result2->num_rows > 0){
                        while($row2 = $result2->fetch_assoc()){
                            echo ' <option value="'.$row2["id_lokacije"].'">'.$row2["mesto"].'</option>';
                            }
                        }
                        CloseCon($conn);
                        ?>
                    </select>
                    <select class="lokacija-putovanja" id="smestaj4" name="smestaj4">
                    <option value="choose" selected >Смештај:</option>  
                        <?php
                        $conn = OpenCon();
                        $query2="SELECT id_smestaja, naziv_objekta FROM smestaj";
                        $result2=mysqli_query($conn ,$query2);
                        if($result2->num_rows > 0){
                        while($row2 = $result2->fetch_assoc()){
                            echo ' <option value="'.$row2["id_smestaja"].'">'.$row2["naziv_objekta"].'</option>';
                            }
                        }
                        CloseCon($conn);
                        ?>
                    </select>
                    <select class="lokacija-putovanja" id="dana4" name="dana4">
                        <option value="choose">Број дана:</option> <!--повлаче се градови из базе-->
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select><br/>
                    <select class="lokacija-putovanja" id="lokacija5" name="lokacija5">
                    <option value="choose" selected >Локација:</option> 
                        <?php
                        $conn = OpenCon();
                        $query2="SELECT * FROM lokacija";
                        $result2=mysqli_query($conn ,$query2);
                        if($result2->num_rows > 0){
                        while($row2 = $result2->fetch_assoc()){
                            echo ' <option value="'.$row2["id_lokacije"].'">'.$row2["mesto"].'</option>';
                            }
                        }
                        CloseCon($conn);
                        ?>
                    </select>
                    <select class="lokacija-putovanja" id="smestaj5" name="smestaj5">
                        <option value="choose" selected >Смештај:</option>  
                        <?php
                        $conn = OpenCon();
                        $query2="SELECT id_smestaja, naziv_objekta FROM smestaj";
                        $result2=mysqli_query($conn ,$query2);
                        if($result2->num_rows > 0){
                        while($row2 = $result2->fetch_assoc()){
                            echo ' <option value="'.$row2["id_smestaja"].'">'.$row2["naziv_objekta"].'</option>';
                            }
                        }
                        CloseCon($conn);
                        ?>
                    </select>
                    <select class="lokacija-putovanja" id="dana5" name="dana5">
                        <option value="choose">Број дана:</option> <!--повлаче се градови из базе-->
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select><br/>

                    <select class="nacin-prevoza" id="prevoz" name="prevoz">
                        <option value="choose">Изабери начин превоз:</option>
                        <option value="1">Аутобус</option>
                        <option value="4">Воз</option>
                        <option value="2">Авион</option>
                        <option value="3">Крстарење</option>
                        <option value="5">Самостални</option>
                    </select>

                </div>


            </div>
            <div class="dodaj-right">

            <!--    <fieldset class="dodaj-tip-smestaja">
                    <legend>Тип смештаја:</legend>
                <div>
                    <input type="radio" id="hotel" name="tip_smestaja">
                    <label for="kes">Хотел</label>
                </div>
            
                <div>
                    <input type="radio" id="bungalov" name="tip_smestaja">
                    <label for="kartica">Бунгалов</label>
                </div>
                </fieldset>
                <div class="dodaj-select-menu">
                    <select>
                        <option value="choose">Категорија смештаја:</option>
                        <option value="choose">1</option>
                        <option value="choose">2</option>
                        <option value="choose">3</option>
                        <option value="choose">4</option>
                        <option value="choose">5</option>
                    </select>
                </div>
            <fieldset class="dodaj-karakteristike">
                <legend>Карактеристике смештаја:</legend>
            <div>
                <input type="checkbox" id="ac" name="ac">
                <label for="ac">Клима</label>
            </div>
            <div>
                <input type="checkbox" id="tv" name="tv">
                <label for="tv">ТВ</label>
            </div>
            <div>
                <input type="checkbox" id="wifi" name="wifi">
                <label for="wifi">Интернет</label>
            </div>
            <div>
                <input type="checkbox" id="frizider" name="frizider">
                <label for="frizider">Фрижидер</label>
            </div>
            <div>
                <input type="checkbox" id="sef" name="sef">
                <label for="sef">Сеф</label>
            </div>
            </fieldset> -->
            <div class="textareas">
                <div class="fakultative-opis">   
                    <textarea style="width: 50%; height: 70px; margin-top: 2%;" class="dodaj-opis" placeholder="Дан 1" name="opis1" id="opis1"></textarea><br>
                    <fieldset class="dodaj-karakteristike">
                    <legend>Изабери факултативне активнопсти:</legend>
                    <input type="checkbox" id="banja1" name="banja1" value="1">
                    <label for="banja">Посета бање</label>
                    <input type="checkbox" id="jezero1" name="jezero1" value="2">
                    <label for="jezero">Посета језера</label>
                    <input type="checkbox" id="stadion1" name="stadion1" value="3">
                    <label for="stadion">Посета стадиона</label>
                    <input type="checkbox" id="muzej1" name="muzej1"  value="4">
                    <label for="muzej">Посета музеја</label>
                    <input type="checkbox" id="opera1" name="opera1" value="5">
                    <label for="opera">Посета опере</label>
                    <input type="checkbox" id="park1" name="park1" value="6">
                    <label for="park">Шетња парком</label>
                    <input type="checkbox" id="klub1" name="klub1" value="7">
                    <label for="klub">Журка у клубу</label>
                    <input type="checkbox" id="brod1" name="brod1" value="8">
                    <label for="brod">Журка на броду</label>
                    <input type="checkbox" id="krstarenje1" name="krstarenje1" value="9">
                    <label for="krstarenje">Факултативно крстарење</label>
                    <input type="checkbox" id="soping1" name="soping1" value="10">
                    <label for="soping">Посета шопинг центру</label>
                </div>  
                <div class="fakultative-opis">
                    <textarea style="width: 50%; height: 70px; margin-top: 2%" class="dodaj-opis" placeholder="Дан 2" name="opis2" id="opis2"></textarea><br>
                    <fieldset class="dodaj-karakteristike">
                    <legend>Изабери факултативне активнопсти:</legend>
                  <input type="checkbox" id="banja2" name="banja2" value="1">
                    <label for="banja">Посета бање</label>
                    <input type="checkbox" id="jezero2" name="jezero2" value="2">
                    <label for="jezero">Посета језера</label>
                    <input type="checkbox" id="stadion2" name="stadion2" value="3">
                    <label for="stadion">Посета стадиона</label>
                    <input type="checkbox" id="muzej2" name="muzej2"  value="4">
                    <label for="muzej">Посета музеја</label>
                    <input type="checkbox" id="opera2" name="opera2" value="5">
                    <label for="opera">Посета опере</label>
                    <input type="checkbox" id="park2" name="park2" value="6">
                    <label for="park">Шетња парком</label>
                    <input type="checkbox" id="klub2" name="klub2" value="7">
                    <label for="klub">Журка у клубу</label>
                    <input type="checkbox" id="brod2" name="brod2" value="8">
                    <label for="brod">Журка на броду</label>
                    <input type="checkbox" id="krstarenje2" name="krstarenje2" value="9">
                    <label for="krstarenje">Факултативно крстарење</label>
                    <input type="checkbox" id="soping2" name="soping2" value="10">
                    <label for="soping">Посета шопинг центру</label>
                </div>
                <div class="fakultative-opis">
                    <textarea style="width: 50%; height: 70px; margin-top: 2%" class="dodaj-opis" placeholder="Дан 3" name="opis3" id="opis3"></textarea><br>
                    <fieldset class="dodaj-karakteristike">
                    <legend>Изабери факултативне активнопсти:</legend>
                  <input type="checkbox" id="banja3" name="banja3" value="1">
                    <label for="banja">Посета бање</label>
                    <input type="checkbox" id="jezero3" name="jezero3" value="2">
                    <label for="jezero">Посета језера</label>
                    <input type="checkbox" id="stadion3" name="stadion3" value="3">
                    <label for="stadion">Посета стадиона</label>
                    <input type="checkbox" id="muzej3" name="muzej3"  value="4">
                    <label for="muzej">Посета музеја</label>
                    <input type="checkbox" id="opera3" name="opera3" value="5">
                    <label for="opera">Посета опере</label>
                    <input type="checkbox" id="park3" name="park3" value="6">
                    <label for="park">Шетња парком</label>
                    <input type="checkbox" id="klub3" name="klub3" value="7">
                    <label for="klub">Журка у клубу</label>
                    <input type="checkbox" id="brod3" name="brod3" value="8">
                    <label for="brod">Журка на броду</label>
                    <input type="checkbox" id="krstarenje3" name="krstarenje3" value="9">
                    <label for="krstarenje">Факултативно крстарење</label>
                    <input type="checkbox" id="soping3" name="soping3" value="10">
                    <label for="soping">Посета шопинг центру</label>
                </div>
                <div class="fakultative-opis">
                    <textarea style="width: 50%; height: 70px; margin-top: 2%" class="dodaj-opis" placeholder="Дан 4" name="opis4" id="opis4"></textarea><br>
                    <fieldset class="dodaj-karakteristike">
                    <legend>Изабери факултативне активнопсти:</legend>
                  <input type="checkbox" id="banja4" name="banja4" value="1">
                    <label for="banja">Посета бање</label>
                    <input type="checkbox" id="jezero4" name="jezero4" value="2">
                    <label for="jezero">Посета језера</label>
                    <input type="checkbox" id="stadion4" name="stadion4" value="3">
                    <label for="stadion">Посета стадиона</label>
                    <input type="checkbox" id="muzej4" name="muzej4"  value="4">
                    <label for="muzej">Посета музеја</label>
                    <input type="checkbox" id="opera4" name="opera4" value="5">
                    <label for="opera">Посета опере</label>
                    <input type="checkbox" id="park4" name="park4" value="6">
                    <label for="park">Шетња парком</label>
                    <input type="checkbox" id="klub4" name="klub4" value="7">
                    <label for="klub">Журка у клубу</label>
                    <input type="checkbox" id="brod4" name="brod4" value="8">
                    <label for="brod">Журка на броду</label>
                    <input type="checkbox" id="krstarenje4" name="krstarenje4" value="9">
                    <label for="krstarenje">Факултативно крстарење</label>
                    <input type="checkbox" id="soping4" name="soping4" value="10">
                    <label for="soping">Посета шопинг центру</label>
                </div>
                <div class="fakultative-opis">
                    <textarea style="width: 50%; height: 70px; margin-top: 2%" class="dodaj-opis" placeholder="Дан 5" name="opis5" id="opis5"></textarea><br>
                    <fieldset class="dodaj-karakteristike">
                    <legend>Изабери факултативне активнопсти:</legend>
                  <input type="checkbox" id="banja5" name="banja5" value="1">
                    <label for="banja">Посета бање</label>
                    <input type="checkbox" id="jezero5" name="jezero5" value="2">
                    <label for="jezero">Посета језера</label>
                    <input type="checkbox" id="stadion5" name="stadion5" value="3">
                    <label for="stadion">Посета стадиона</label>
                    <input type="checkbox" id="muzej5" name="muzej5"  value="4">
                    <label for="muzej">Посета музеја</label>
                    <input type="checkbox" id="opera5" name="opera5" value="5">
                    <label for="opera">Посета опере</label>
                    <input type="checkbox" id="park5" name="park5" value="6">
                    <label for="park">Шетња парком</label>
                    <input type="checkbox" id="klub5" name="klub5" value="7">
                    <label for="klub">Журка у клубу</label>
                    <input type="checkbox" id="brod5" name="brod5" value="8">
                    <label for="brod">Журка на броду</label>
                    <input type="checkbox" id="krstarenje5" name="krstarenje5" value="9">
                    <label for="krstarenje">Факултативно крстарење</label>
                    <input type="checkbox" id="soping5" name="soping5" value="10">
                    <label for="soping">Посета шопинг центру</label>
                </div>
                <div class="fakultative-opis">
                    <textarea style="width: 50%; height: 70px; margin-top: 2%" class="dodaj-opis" placeholder="Дан 6" name="opis6" id="opis6"></textarea><br>
                    <fieldset class="dodaj-karakteristike">
                    <legend>Изабери факултативне активнопсти:</legend>
                  <input type="checkbox" id="banja6" name="banja6" value="1">
                    <label for="banja">Посета бање</label>
                    <input type="checkbox" id="jezero6" name="jezero6" value="2">
                    <label for="jezero">Посета језера</label>
                    <input type="checkbox" id="stadion6" name="stadion6" value="3">
                    <label for="stadion">Посета стадиона</label>
                    <input type="checkbox" id="muzej6" name="muzej6"  value="4">
                    <label for="muzej">Посета музеја</label>
                    <input type="checkbox" id="opera6" name="opera6" value="5">
                    <label for="opera">Посета опере</label>
                    <input type="checkbox" id="park6" name="park6" value="6">
                    <label for="park">Шетња парком</label>
                    <input type="checkbox" id="klub6" name="klub6" value="7">
                    <label for="klub">Журка у клубу</label>
                    <input type="checkbox" id="brod6" name="brod6" value="8">
                    <label for="brod">Журка на броду</label>
                    <input type="checkbox" id="krstarenje6" name="krstarenje6" value="9">
                    <label for="krstarenje">Факултативно крстарење</label>
                    <input type="checkbox" id="soping6" name="soping6" value="10">
                    <label for="soping">Посета шопинг центру</label>
                </div>
                <div class="fakultative-opis">
                    <textarea style="width: 50%; height: 70px; margin-top: 2%" class="dodaj-opis" placeholder="Дан 7" name="opis7" id="opis7"></textarea><br>
                    <fieldset class="dodaj-karakteristike">
                    <legend>Изабери факултативне активнопсти:</legend>
                  <input type="checkbox" id="banja7" name="banja7" value="1">
                    <label for="banja">Посета бање</label>
                    <input type="checkbox" id="jezero7" name="jezero7" value="2">
                    <label for="jezero">Посета језера</label>
                    <input type="checkbox" id="stadion7" name="stadion7" value="3">
                    <label for="stadion">Посета стадиона</label>
                    <input type="checkbox" id="muzej7" name="muzej7"  value="4">
                    <label for="muzej">Посета музеја</label>
                    <input type="checkbox" id="opera7" name="opera7" value="5">
                    <label for="opera">Посета опере</label>
                    <input type="checkbox" id="park7" name="park7" value="6">
                    <label for="park">Шетња парком</label>
                    <input type="checkbox" id="klub7" name="klub7" value="7">
                    <label for="klub">Журка у клубу</label>
                    <input type="checkbox" id="brod7" name="brod7" value="8">
                    <label for="brod">Журка на броду</label>
                    <input type="checkbox" id="krstarenje7" name="krstarenje7" value="9">
                    <label for="krstarenje">Факултативно крстарење</label>
                    <input type="checkbox" id="soping7" name="soping7" value="10">
                    <label for="soping">Посета шопинг центру</label>
                </div>
                <div class="fakultative-opis">
                    <textarea style="width: 50%; height: 70px; margin-top: 2%" class="dodaj-opis" placeholder="Дан 8" name="opis8" id="opis8"></textarea><br>
                    <fieldset class="dodaj-karakteristike">
                    <legend>Изабери факултативне активнопсти:</legend>
                  <input type="checkbox" id="banja8" name="banja8" value="1">
                    <label for="banja">Посета бање</label>
                    <input type="checkbox" id="jezero8" name="jezero8" value="2">
                    <label for="jezero">Посета језера</label>
                    <input type="checkbox" id="stadion8" name="stadion8" value="3">
                    <label for="stadion">Посета стадиона</label>
                    <input type="checkbox" id="muzej8" name="muzej8"  value="4">
                    <label for="muzej">Посета музеја</label>
                    <input type="checkbox" id="opera8" name="opera8" value="5">
                    <label for="opera">Посета опере</label>
                    <input type="checkbox" id="park8" name="park8" value="6">
                    <label for="park">Шетња парком</label>
                    <input type="checkbox" id="klub8" name="klub8" value="7">
                    <label for="klub">Журка у клубу</label>
                    <input type="checkbox" id="brod8" name="brod8" value="8">
                    <label for="brod">Журка на броду</label>
                    <input type="checkbox" id="krstarenje8" name="krstarenje8" value="9">
                    <label for="krstarenje">Факултативно крстарење</label>
                    <input type="checkbox" id="soping8" name="soping8" value="10">
                    <label for="soping">Посета шопинг центру</label>
                </div>
                <div class="fakultative-opis">
                    <textarea style="width: 50%; height: 70px; margin-top: 2%" class="dodaj-opis" placeholder="Дан 9" name="opis9" id="opis9"></textarea><br>
                    <fieldset class="dodaj-karakteristike">
                    <legend>Изабери факултативне активнопсти:</legend>
                  <input type="checkbox" id="banja9" name="banja9" value="1">
                    <label for="banja">Посета бање</label>
                    <input type="checkbox" id="jezero9" name="jezero9" value="2">
                    <label for="jezero">Посета језера</label>
                    <input type="checkbox" id="stadion9" name="stadion9" value="3">
                    <label for="stadion">Посета стадиона</label>
                    <input type="checkbox" id="muzej9" name="muzej9"  value="4">
                    <label for="muzej">Посета музеја</label>
                    <input type="checkbox" id="opera9" name="opera9" value="5">
                    <label for="opera">Посета опере</label>
                    <input type="checkbox" id="park9" name="park9" value="6">
                    <label for="park">Шетња парком</label>
                    <input type="checkbox" id="klub9" name="klub9" value="7">
                    <label for="klub">Журка у клубу</label>
                    <input type="checkbox" id="brod9" name="brod9" value="8">
                    <label for="brod">Журка на броду</label>
                    <input type="checkbox" id="krstarenje9" name="krstarenje9" value="9">
                    <label for="krstarenje">Факултативно крстарење</label>
                    <input type="checkbox" id="soping9" name="soping9" value="10">
                    <label for="soping">Посета шопинг центру</label>
                </div>
                <div class="fakultative-opis">
                    <textarea style="width: 50%; height: 70px; margin-top: 2%" class="dodaj-opis" placeholder="Дан 10" name="opis10" id="opis10"></textarea><br>
                    <fieldset class="dodaj-karakteristike">
                    <legend>Изабери факултативне активнопсти:</legend>
                  <input type="checkbox" id="banja10" name="banja10" value="1">
                    <label for="banja">Посета бање</label>
                    <input type="checkbox" id="jezero10" name="jezero10" value="2">
                    <label for="jezero">Посета језера</label>
                    <input type="checkbox" id="stadion10" name="stadion10" value="3">
                    <label for="stadion">Посета стадиона</label>
                    <input type="checkbox" id="muzej10" name="muzej10"  value="4">
                    <label for="muzej">Посета музеја</label>
                    <input type="checkbox" id="opera10" name="opera10" value="5">
                    <label for="opera">Посета опере</label>
                    <input type="checkbox" id="park10" name="park10" value="6">
                    <label for="park">Шетња парком</label>
                    <input type="checkbox" id="klub10" name="klub10" value="7">
                    <label for="klub">Журка у клубу</label>
                    <input type="checkbox" id="brod10" name="brod10" value="8">
                    <label for="brod">Журка на броду</label>
                    <input type="checkbox" id="krstarenje10" name="krstarenje10" value="9">
                    <label for="krstarenje">Факултативно крстарење</label>
                    <input type="checkbox" id="soping10" name="soping10" value="10">
                    <label for="soping">Посета шопинг центру</label>
                </div>        
            </div>

                <div class="dugme-potvrdi-ponudu"><button class="button-dodaj" name="dodaj">Додај понуду/аранжман</button></div>

        </div>
    </div>
    </form>
</body>
</html>