<?php
try {
    # MS SQL Server and Sybase with PDO_DBLIB
    $pdo = new PDO("mysql:host=www.grasseh.com;dbname=trollanekdotes,root,Druk1922");
    $cmd = $pdo->prepare("INSERT INTO Users ( name,count ) values ( 'Steve',0 )");
    $pdo->execute();







}
catch(PDOException $e) {
    echo $e->getMessage();
}
?>