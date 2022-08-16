<?php
    $host = "127.0.0.1";
    $user = "root";    
                    //  yesma dbname ra pass change gareko xu so change gar
    $pass = "prajapati";                                  
    $db = "movie";
    $port = 3306;
     $con = mysqli_connect($host, $user, $pass, $db, $port)or die("failed ".$conn->error);
?>