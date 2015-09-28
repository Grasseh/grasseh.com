<?php
	  try {
	      # MS SQL Server and Sybase with PDO_DBLIB
	      $pdo = new PDO(CONNEXION_STRING,DATABASE_USER,DATABASE_PASSWORD);
		    $request = strtolower($_SERVER["REQUEST_URI"]);
   		  $request = explode("/",$request);
   		  $id = array_pop($request);
	      $cmd = $pdo->prepare('INSERT INTO Trolls(user_id,created_at) VALUES (:id,:time)');
  		  $cmd->bindParam(':id', $id, PDO::PARAM_INT);
        $cmd->bindParam(':time', date('Y-m-d H:i:s'), PDO::PARAM_STR);
		    $cmd->execute();
	  }
	  catch(PDOException $e) {
	      echo $e->getMessage();
	  }
?>
