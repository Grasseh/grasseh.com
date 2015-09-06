<body>
	<?php
	try {
	    # MS SQL Server and Sybase with PDO_DBLIB
	    //Seed base user
	    $pdo = new PDO(CONNEXION_STRING,DATABASE_USER,DATABASE_PASSWORD);
	    
	    //Seed base user
	    /*
	    $cmd = $pdo->prepare("INSERT INTO Users ( name,count ) values ( 'Steve',0 )");
	    $cmd->execute();
	    $cmd = $pdo->prepare("INSERT INTO Users ( name,count ) values ( 'Mathieu',0 )");
	    $cmd->execute();
	    $cmd = $pdo->prepare("INSERT INTO Users ( name,count ) values ( 'Frank',0 )");
	    $cmd->execute();
	    $cmd = $pdo->prepare("INSERT INTO Users ( name,count ) values ( 'Sam',0 )");
	    $cmd->execute();
	    $cmd = $pdo->prepare("INSERT INTO Users ( name,count ) values ( 'Seb',0 )");
	    $cmd->execute();
	    */
	    
	    $cmd = $pdo->prepare('SELECT * FROM Users');
		$cmd->execute();
	    while ($row = $cmd->fetch(PDO::FETCH_ASSOC)) {
	      echo($row["name"]. " <button data-id='". $row["id"] . "' data-count='". $row["count"] . "' class='btn-plus'>" . $row["count"] . "</button><br/>");
	    }

	    echo("This page currently works as it should. I'm quite happy about it.MY HOOKS ARE FINALLY WORKING!!!!!!");







	}
	catch(PDOException $e) {
	    echo $e->getMessage();
	}
	?>
	<script type="text/javascript" src="/public/libs/jquery.js"></script>
	<script>
		$(function(){
			$(".btn-plus").click(function(){
				($(this).data("count",$(this).data("count")+1));
				($(this).html($(this).data("count")));
			});
		})
	</script>
</body>