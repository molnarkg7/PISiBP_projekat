<?php
    function OpenCon()
     {
     $dbhost = "localhost";
     $dbuser = "root";
     $dbpass = "";
     $db = "turisticka_agencija";
     $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Konekcija neuspesna: %s\n". $conn -> error);
     
     return $conn;
     }
     
    function CloseCon($conn)
     {
     $conn -> close();
     }

     function set_url( $url )
    {
        echo("<script>history.replaceState({},'','$url');</script>");
    }  

    ?>
