<?php
  $pdo = new PDO(ANEKDOTES_STRING,DATABASE_USER,DATABASE_PASSWORD);
  //Create tables
  $pdo->exec("CREATE TABLE Trolls (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, user_id INT, created_at TIMESTAMP)");
    echo("TEST");
  $pdo->exec("CREATE TABLE Users (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, name VARCHAR(100))");
  //Seed base user
  $cmd = $pdo->prepare("INSERT INTO Users ( name ) values ( 'Steve' )");
  $cmd->execute();
  $cmd = $pdo->prepare("INSERT INTO Users ( name ) values ( 'Mathieu' )");
  $cmd->execute();
  $cmd = $pdo->prepare("INSERT INTO Users ( name ) values ( 'Frank' )");
  $cmd->execute();
  $cmd = $pdo->prepare("INSERT INTO Users ( name ) values ( 'Sam' )");
  $cmd->execute();
  $cmd = $pdo->prepare("INSERT INTO Users ( name ) values ( 'Seb' )");
  $cmd->execute();

?>
