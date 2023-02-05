<?php
include 'baza_podataka.php';

function baza(){
echo '<script>var x = document.getElementById("myDIV");x.style.display = "none";</script>';
$conn = OpenCon();
mysqli_query($conn ,"SET NAMES 'utf8'");
$query="SELECT COUNT(*) as broj FROM `ponuda`";
if ($result = mysqli_query($conn, $query)) {
    $red = mysqli_fetch_array($result);
    $broj= $red["broj"];    
    if($broj == 0){
        
        smestaj();
    }else{
        echo '<script>var x = document.getElementById("myDIV");x.style.display = "block";</script>';
        echo '<script>var x = document.getElementById("myDIV2");x.style.display = "none"; var y = document.getElementById("aduio");  y.pause();</script>';
    }
} else{

    $sql = file('turisticka_agencija.sql');
    foreach($sql as $linija){
        mysqli_query($conn, $linija);
    }
    
    smestaj();

}
}

function smestaj() {
    $conn = OpenCon();
    $conn->query("SET NAMES 'utf8'");
    $words = file('popular.txt');
    $slike = file('smestaj.txt');
    for($i=1; $i<91; $i++){
        $key = array_rand($words);
    
        $key2 = array_rand($words);
        
        $slika1 = array_rand($slike);
        $slika2 = array_rand($slike);
        $slika3 = array_rand($slike);
        $slika4 = array_rand($slike);
        $slika5 = array_rand($slike);
        $slika6 = array_rand($slike);
         
        $conn->query("INSERT INTO `smestaj` (`id_smestaja`, `tip_smestaja`, `naziv_objekta`, `br_kreveta`, `kategorija_smestaja`, `internet_konekcija`, `tv`, `klima`, `frizider`, `sef`, `slika1`, `slika2`, `slika3`, `slika4`, `slika5`, `slika`) VALUES (".$i.", FLOOR(1 + RAND()*(2 - 1 + 1)), '".$words[$key].$words[$key2]."', FLOOR(1 + RAND()*(6 - 1 + 1)), FLOOR(1 + RAND()*(5 - 1 + 1)), FLOOR(1 + RAND()*(2 - 1 + 1)), FLOOR(1 + RAND()*(2 - 1 + 1)), FLOOR(1 + RAND()*(2 - 1 + 1)), FLOOR(1 + RAND()*(2 - 1 + 1)), FLOOR(1 + RAND()*(2 - 1 + 1)), '".$slike[$slika1]."', '".$slike[$slika2]."', '".$slike[$slika3]."', '".$slike[$slika4]."', '".$slike[$slika5]."', '".$slike[$slika6]."');");  
  } 
  echo "Smestaj ".$conn->error;
  CloseCon($conn);
  lokacija();
}

  function lokacija() {
    $conn = OpenCon();
    $conn->query("SET NAMES 'utf8'");
    $slike = file('gradovi.txt');
    for($i=1; $i<91; $i++){
        $conn->query("UPDATE lokacija
        SET slika = '".$slike[rand(0, 29)]."'
        WHERE id_lokacije = ".$i.";");
        echo $conn->error;
    }
    echo "Lokacija ".$conn->error;
    CloseCon($conn);
    ponuda();
  } 

function ponuda(){
    $conn = OpenCon();
    $conn->query("SET NAMES 'utf8'");
    ini_set('max_execution_time', '500');
    set_time_limit(500);
    for($i=1; $i<60001; $i++){
        $query="SELECT CURRENT_DATE + INTERVAL FLOOR(RAND() * 20) DAY AS pocetni";
        if ($result = mysqli_query($conn, $query)) {
            $row = mysqli_fetch_array($result);
            $pocetak=$row["pocetni"];
        }
        $conn->query("INSERT INTO ponuda (id_ponude, termin_polazak, termin_povratak, cena_putovanja, cena_prevoza, id_lokacije_polaska, id_prevoza) VALUES (".$i.", '".$pocetak."', '".$pocetak."' + INTERVAL FLOOR(1 + RAND()*(10 - 1 + 1)) DAY, ROUND(100 + RAND()*(3000 - 100 + 1), 2), FLOOR(100 + RAND()*(3000 - 100 + 1)), FLOOR(46 + RAND()*(48 - 46 + 1)), FLOOR(1 + RAND()*(5 - 1 + 1)));");

    }
    echo "Ponuda ".$conn->error;
    $conn->query("UPDATE ponuda SET ponuda.termin_polazak = ponuda.termin_polazak - INTERVAL (100) DAY, ponuda.termin_povratak= ponuda.termin_povratak - INTERVAL (100)  WHERE ponuda.id_ponude>24378 AND ponuda.id_ponude<34378;");
    CloseCon($conn);
    provodi();
}

  function brDanaNaLokaciji($m, $n) {
  $parts = array();
  $remaining = $m;
  for ($i = 0; $i < $n - 1; $i++) {
      $part = rand(1, $remaining - ($n - $i - 1));
      $parts[] = $part;
      $remaining -= $part;
  }
  $parts[] = $remaining;
  shuffle($parts);
  return $parts;
}

function provodi(){
    $conn = OpenCon();
    $conn->query("SET NAMES 'utf8'");
    for($i=1; $i<60001; $i++){
        $query="SELECT DATEDIFF(ponuda.termin_povratak, ponuda.termin_polazak) as br_dana from ponuda where id_ponude=".$i."";
        if ($result = mysqli_query($conn, $query)) {
            $row = mysqli_fetch_array($result);
            $razlika=$row["br_dana"];
        }
        if($razlika>3){
            $komadi=3;
        }else{
            $komadi=rand(1, $razlika);
        }       
        $parts = brDanaNaLokaciji($razlika, $komadi);
        ini_set('max_execution_time', '300');
        set_time_limit(300);
        for($j=0; $j<$komadi; $j++){
            $conn->query("INSERT INTO provodi (br_dana, id_lokacije, id_smestaja, id_ponude) VALUES(".$parts[$j].", FLOOR(1 + RAND()*(90- 1 + 1)), FLOOR(1 + RAND()*(90- 1 + 1)), ".$i.")");
        }
    }
    echo "Provodi ".$conn->error;
    CloseCon($conn);
    dani();
}

function dani(){
    $conn = OpenCon();
    $conn->query("SET NAMES 'utf8'");

    for($i=1; $i<60001; $i++){
        $query="SELECT DATEDIFF(ponuda.termin_povratak, ponuda.termin_polazak) as br_dana, id_lokacije_polaska from ponuda where id_ponude=".$i."";
        if ($result = mysqli_query($conn, $query)) {
            $row = mysqli_fetch_array($result);
            $razlika=$row["br_dana"];
            $polazak=$row["id_lokacije_polaska"];
        }
        ini_set('max_execution_time', '500');
        set_time_limit(500);
        for($j=1; $j<$razlika+1; $j++){
            if($j==1){
                $opis="Полазак са перона у ".rand(0,23).":".rand(0,59)." lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo";
            }elseif($j==$razlika && $j==1){
                $query="SELECT mesto from lokacija WHERE id_lokacije=".$polazak."";
                if ($result = mysqli_query($conn, $query)) {
                    $row = mysqli_fetch_array($result);
                    $mesto = $row["mesto"];
                    $vreme = array("јутарњим", "преподневним", "поподневним", "вечерњим");
                }
                $opis="Полазак са перона у ".rand(0,23).":".rand(0,59).". Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo. Долазак у ".$mesto." у ".$vreme[rand(0,3)]." часовима";
            }elseif($j==$razlika){
                $query="SELECT mesto from lokacija WHERE id_lokacije=".$polazak."";
                if ($result = mysqli_query($conn, $query)) {
                    $row = mysqli_fetch_array($result);
                    $mesto = $row["mesto"];
                    $vreme = array("јутарњим", "преподневним", "поподневним", "вечерњим");
                }
                $opis="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo. Долазак у ".$mesto." у ".$vreme[rand(0,3)]." часовима";
            }else{
                $opis="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo.";
            }
            
            $conn->query("INSERT INTO dani (redni_br_dana, id_ponude, id_programa, opis) VALUES (".$j.", ".$i.", FLOOR(1 + RAND()*(10- 1 + 1)), '".$opis."')");
        }

    }
    echo "Dani ".$conn->error;
    echo '<script>window.open("index.php", "_self"); </script>';
    CloseCon($conn);
}























 /* function aktivnost() {
    $conn = OpenCon();
    $conn->query("SET NAMES 'utf8'");
    for($i=1; $i<51; $i++){
        for($j=1; $j<rand(1, 10); $j++){
            $conn->query("INSERT INTO sadrzi_ativnosti (id_programa, id_aktivnosti) VALUES(".$j.", ".rand(1, 10).")");
        }
    }
    echo $conn->error;
  } 
 
  function smesId() {
    $conn = OpenCon();
    $conn->query("SET NAMES 'utf8'");
    for($i=1; $i<91; $i++){
            $conn->query("UPDATE smestaj SET id_smestaja = ".$i." WHERE id_smestaja = 92+".$i."");
        
    }
    echo $conn->error;
  }*/
?>

