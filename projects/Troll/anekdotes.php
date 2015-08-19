<?php
try {
    # MS SQL Server and Sybase with PDO_DBLIB
    //Seed base user
    $pdo = new PDO("mysql:host=www.grasseh.com;port=3306;dbname=TrollAnekdotes","troll","Q6vYLAr6UYafhmZG");
    /*
    $cmd = $pdo->prepare("INSERT INTO Users ( name,count ) values ( 'Steve',0 )");
    $cmd->execute();
    */
    echo("This page currently works as it should. I'm quite happy about it.");







}
catch(PDOException $e) {
    echo $e->getMessage();
}
?>