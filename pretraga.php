<?php
include 'baza_podataka.php';
$str="onchange=\"var x = 'pretraga.php?";
if(isset($_POST["pretraga"]) && $_POST["pretraga"]=""){
    $idK=$_POST["pretraga"];
    $str = $str."pretraga=".$idK."&";
}
if(isset($_POST["drzava"])){
    $idD=$_POST["drzava"];
    $str = $str."drzava=".$idD."&";
}
if(isset($_POST["lokacija"])){
    $idL=$_POST["lokacija"];
    $str = $str."lokacija=".$idL."&";
}
if(isset($_POST["prevoz"])){
    $idP=$_POST["prevoz"];
    $str = $str."prevoz=".$idP."&";
}if(isset($_POST["polazak"])){
    $polazak=$_POST["polazak"];
    $str = $str."polazak=".$polazak."&";
}if(isset($_POST["povratak"])){
    $povratak=$_POST["povratak"];
    $str = $str."povratak=".$povratak."&";
}if(isset($_GET["pretraga"]) && $_GET["pretraga"]=""){
    $idK=$_GET["pretraga"];
    $str = $str."pretraga=".$idK."&";
}
if(isset($_GET["drzava"])){
    $idD=$_GET["drzava"];
    $str = $str."drzava=".$idD."&";
}
if(isset($_GET["lokacija"])){
    $idL=$_GET["lokacija"];
    $str = $str."lokacija=".$idL."&";
}
if(isset($_GET["prevoz"])){
    $idP=$_GET["prevoz"];
    $str = $str."prevoz=".$idP."&";
}if(isset($_GET["polazak"])){
    $polazak=$_GET["polazak"];
    $str = $str."polazak=".$polazak."&";
}if(isset($_GET["povratak"])){
    $povratak=$_GET["povratak"];
    $str = $str."povratak=".$povratak."&";
}


$str = $str."broj=' + document.getElementById('brojOgls').value; window.open(x, '_self');\"";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pretraga.css">
    <title>Приказ аранжмана</title>

    <script>
        function setBroj(broj){
            var select = document.getElementById('brojOgls');
            var option;

            for (var i=0; i<select.options.length; i++) {
                option = select.options[i];

            if (option.value == broj) {
                option.setAttribute('selected', true);
                return; 
                } 
            }
        }</script>
</head>

<?/*php if(isset($_GET['user'])){echo 'id='.$_GET['user'].'&'; } if(isset($_GET['brojStranice'])){echo 'brojStranice='.$_GET['brojStranice'].'&'; }*/?>  
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


    <div class="izbor">
        <select class="stranicenje" id="brojOgls" <?php echo $str;?> >
        <option value="odaberi">Одабери број понуда</option>
        <option id="25" value="25" >25</option>
        <option id="50" value="50">50</option>
        <option id="100" value="100">100</option>
        <option id="200" value="200">200</option>
        <?php
        if(isset($_GET['broj'])){
            echo '<script>setBroj('.$_GET['broj'].');</script>';
        }
        ?>
        
       
    </select>


    </div>
    
    <div class="lista">
    <?php
    $conn = OpenCon();
    
     $query ="SELECT  month(ponuda.termin_polazak) as mesec, year(ponuda.termin_polazak) as godina, smestaj.naziv_objekta as naziv,lokacija.mesto as lokacija, DATEDIFF(ponuda.termin_povratak, ponuda.termin_polazak) as dana, ponuda.termin_polazak as polazak,ponuda.cena_putovanja+ponuda.cena_prevoza as cena,tip_prevoza.naziv as prevoz,smestaj.id_smestaja as idsmest, lokacija.slika, lokacija.id_lokacije as idlok, ponuda.id_ponude as idpon
     FROM (ponuda JOIN tip_prevoza ON ponuda.id_prevoza=tip_prevoza.id) 
     INNER JOIN (SELECT provodi.id_ponude, MAX(br_dana), provodi.id_smestaja, provodi.id_lokacije FROM provodi GROUP BY provodi.id_ponude) provodi ON ponuda.id_ponude = provodi.id_ponude JOIN smestaj ON smestaj.id_smestaja=provodi.id_smestaja JOIN lokacija ON lokacija.id_lokacije=provodi.id_lokacije JOIN drzava ON drzava.id_drzava=lokacija.id_drzava WHERE 1=1";
    if(isset($_POST["pretraga"]) && $_POST["pretraga"]=""){
        $idK=$_POST["pretraga"];
        $query = $query." AND drzava.id_kontinenta=".$idK;
    }elseif(isset($_GET["pretraga"]) && $_GET["pretraga"]=""){
        $idK=$_GET["pretraga"];
        $query = $query." AND drzava.id_kontinenta=".$idK;
    }
    if(isset($_POST["drzava"])){
        $idD=$_POST["drzava"];
        $query = $query." AND drzava.id_drzava=".$idD;
    }elseif(isset($_GET["drzava"])){
        $idD=$_GET["drzava"];
        $query = $query." AND drzava.id_drzava=".$idD;
    }
    if(isset($_POST["lokacija"])){
        $idL=$_POST["lokacija"];
        $query = $query." AND lokacija.id_lokacije=".$idL;
    }elseif(isset($_GET["lokacija"])){
        $idL=$_GET["lokacija"];
        $query = $query." AND lokacija.id_lokacije=".$idL;
    }
    if(isset($_POST["prevoz"])){
        $idP=$_POST["prevoz"];
        $query = $query." AND tip_prevoza.id=".$idP;
    }elseif(isset($_GET["prevoz"])){
        $idP=$_GET["prevoz"];
        $query = $query." AND tip_prevoza.id=".$idP;
    }
    if(isset($_POST["polazak"]) && isset($_POST["povratak"])){
        if($_POST["polazak"] != "" && $_POST["povratak"] != ""){
        $polazak=$_POST["polazak"];
        $povratak=$_POST["povratak"];
        $query = $query." AND ponuda.termin_polazak >= '".$polazak."'";
        $query = $query." AND ponuda.termin_povratak <= '".$povratak."'";
    }
    }elseif(isset($_GET["polazak"]) && isset($_GET["povratak"])){
        if($_GET["polazak"] != "" && $_GET["povratak"] != ""){
        $polazak=$_GET["polazak"];
        $povratak=$_GET["povratak"];
        $query = $query." AND ponuda.termin_polazak >= '".$polazak."'";
        $query = $query." AND ponuda.termin_povratak <= '".$povratak."'";
    }
    }elseif(isset($_POST["polazak"])){
        if($_POST["polazak"] != ""){
        $polazak=$_POST["polazak"];
        $query = $query." AND ponuda.termin_polazak = '".$polazak."'";
        }
    }elseif(isset($_POST["povratak"])){
        if($_POST["povratak"] != ""){
        $povratak=$_POST["povratak"];
        $query = $query." AND ponuda.termin_povratak = '".$povratak."'";
        }
    }elseif(isset($_GET["polazak"])){
        if($_GET["polazak"] != ""){
        $polazak=$_GET["polazak"];
        $query = $query." AND ponuda.termin_polazak = '".$polazak."'";
        }
    }elseif(isset($_GET["povratak"])){
        if($_GET["povratak"] != ""){
        $povratak=$_GET["povratak"];
        $query = $query." AND ponuda.termin_povratak = '".$povratak."'";
        }
    }

     $query = $query." ORDER BY ponuda.termin_polazak desc LIMIT 50";
    
    if(isset($_GET['broj'])){
        if(isset($_GET['brojStranice'])){
            $query = str_replace("LIMIT 50", "LIMIT ".intval($_GET['broj'])*(intval($_GET['brojStranice'])-1).",".intval($_GET['broj']), $query);
        }else{
            $query = str_replace("LIMIT 50", "LIMIT ".$_GET['broj'], $query);
        }
        
    }else{
        if(isset($_GET['brojStranice'])){
            $query = str_replace("LIMIT 50", "LIMIT ".intval(30)*(intval($_GET['brojStranice'])-1).",".intval(30), $query);
        }
    }
     mysqli_query($conn ,"SET NAMES 'utf8'");
    $result=mysqli_query($conn ,$query);
    if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
            

    ?>
    
    <div class="kartice">
            
            <div>
                <h2 class="naziv"><?php echo $row['lokacija']." ";
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
                <h4 class="destinacija"><?php echo $row['naziv']?></h4>
            </div>
            <img class="slika" src=<?php echo $row['slika']?>>
            <div class="mala_lista">
                <div class="male_kartice">
                    <p class="paragraf">Polazak:<?php echo $row['polazak']?> </p>
                </div>
                <div class="male_kartice">
                    <p class="paragraf">Trajanje: <?php echo $row['dana']?> dana</p>
                </div>
                <div class="male_kartice">
                    <p class="paragraf">Prevoz:<?php echo $row['prevoz']?></p>
                </div>

                <div class="male_kartice">
                    <p class="paragraf">Cena:<?php echo intVal($row['cena'])?> € </p>
                </div> 
                
                </div><a href="program.php?lok=<?php echo $row['idlok']?>&pon=<?php echo $row['idpon']?>"><div class="pozicija-dugme"><button class="dugme">Види понуду -></button></div></a>
        </div>
        <?php
            }
        }
        CloseCon($conn);
        ?>
        </div>
<div class="stranicenje-container">
    <?php 
     if(isset($_GET['brojStranice'])){
        echo '
        <a class="stranica" href="pretraga.php?';
        if(isset($_GET['user'])){echo "id=".$_GET['user']."&"; }
        if(isset($_GET['broj'])){echo "broj=".$_GET['broj']."&"; }
        echo 'brojStranice='.(intval($_GET['brojStranice'])-1).'">'.(intval($_GET['brojStranice'])-1).'</a>';
        echo '<div class="stranice-pojedinacno">
        <a class="stranica" href="pretraga.php?';
        if(isset($_GET['user'])){echo "user=".$_GET['user']."&"; }
        if(isset($_GET['broj'])){echo "broj=".$_GET['broj']."&"; }
        echo 'brojStranice='.(intval($_GET['brojStranice'])).'">'.(intval($_GET['brojStranice'])).'</a>';
        echo '<div class="stranice-pojedinacno">
        <a class="stranica" href="pretraga.php?';
        if(isset($_GET['user'])){echo "user=".$_GET['user']."&"; }
        if(isset($_GET['broj'])){echo "broj=".$_GET['broj']."&"; }
        echo 'brojStranice='.(intval($_GET['brojStranice'])+1).'">'.(intval($_GET['brojStranice'])+1).'</a>';
    }
    else{
        echo '
        <a class="stranica" href="pretraga.php?';
        if(isset($_GET['user'])){echo "id=".$_GET['user']."&"; }
        if(isset($_GET['broj'])){echo "broj=".$_GET['broj']."&"; }
        echo 'brojStranice=1">1</a>';
        echo '<div class="stranice-pojedinacno">
        <a class="stranica" href="pretraga.php?';
        if(isset($_GET['user'])){echo "user=".$_GET['user']."&"; }
        if(isset($_GET['broj'])){echo "broj=".$_GET['broj']."&"; }
        echo 'brojStranice=2">2</a>';
        echo '<div class="stranice-pojedinacno">
        <a class="stranica" href="pretraga.php?';
        if(isset($_GET['user'])){echo "user=".$_GET['user']."&"; }
        if(isset($_GET['broj'])){echo "broj=".$_GET['broj']."&"; }
        echo 'brojStranice=3">3</a>';
    }
    ?>

</div>

</body>
</html>
