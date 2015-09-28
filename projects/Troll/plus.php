<?php
	  try {
	      # MS SQL Server and Sybase with PDO_DBLIB
        if(is_null($INPUT["from"]) || is_null($INPUT["reason"])){

        }
        else{
          $pdo = new PDO(ANEKDOTES_STRING,DATABASE_USER,DATABASE_PASSWORD);
          $request = strtolower($_SERVER["REQUEST_URI"]);
          $request = explode("/",$request);
          $id = array_pop($request);
          $time = date('Y-m-d H:i:s');
          $cmd = $pdo->prepare('INSERT INTO Trolls(user_id,created_at,from_user,reason) VALUES (:id,:time,:from_user,:reason)');
          $cmd->bindParam(':id', $id, PDO::PARAM_INT);
          $cmd->bindParam(':time', $time, PDO::PARAM_STR);
          $cmd->bindParam(':from_user', $_INPUT["from"], PDO::PARAM_STR);
          $cmd->bindParam(':reason', $_INPUT["reason"], PDO::PARAM_STR);
          $cmd->execute();

        }
	  }
	  catch(PDOException $e) {
	      echo $e->getMessage();
	  }
?>
