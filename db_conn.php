<?php
    $DBDRIVER = "mysql";
    $DBHOST = "localhost";
    $DBUSER = "root";
    $DBPASS = "cado";
    $DBNAME = "shugli";


    try {
        $con = new PDO("$DBDRIVER:host=$DBHOST;dbname=$DBNAME",$DBUSER,$DBPASS);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
?>