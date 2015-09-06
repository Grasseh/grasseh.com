<?php
	try {
	    # MS SQL Server and Sybase with PDO_DBLIB
	    $pdo = new PDO(CONNEXION_STRING,DATABASE_USER,DATABASE_PASSWORD);
		$request = strtolower($_SERVER["REQUEST_URI"]);
   		$request = explode("/",$request);
   		$id = array_pop($request);
	    $cmd = $pdo->prepare('SELECT * FROM Users WHERE id = :id');
  		$cmd->bindParam(':id', $id, PDO::PARAM_INT);
		$cmd->execute();
		$count = 0;
	    while ($row = $cmd->fetch(PDO::FETCH_ASSOC)) {
	    	$count = $row["count"] + 1;
	    }
	    $cmd = $pdo->prepare('UPDATE  Users SET COUNT = :count WHERE id = :id');
  		$cmd->bindParam(':id', $id, PDO::PARAM_INT);
  		$cmd->bindParam(':count', $count, PDO::PARAM_INT);
		$cmd->execute();

	}
	catch(PDOException $e) {
	    echo $e->getMessage();
	}
	?>