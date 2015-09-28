<body>
	<?php
	try {
	    # MS SQL Server and Sybase with PDO_DBLIB
	    //Seed base user
	    $pdo = new PDO(ANEKDOTES_STRING,DATABASE_USER,DATABASE_PASSWORD);

	    $cmd = $pdo->prepare('SELECT Users.id as id, Users.name as name, COUNT(Trolls.id) as count FROM Users LEFT JOIN Trolls ON Users.id = Trolls.user_id GROUP BY Users.id,Users.name');
			$cmd->execute();
	    while ($row = $cmd->fetch(PDO::FETCH_ASSOC)) {
	      echo($row["name"]. " <button data-id='". $row["id"] . "' data-count='". $row["count"] . "' class='btn-plus'>" . $row["count"] . "</button><br/>");
	    }
	    echo(time());

	}
	catch(PDOException $e) {
	    echo $e->getMessage();
	}
	?>
	<script type="text/javascript" src="/public/libs/jquery.js"></script>
	<script>
		$(function(){
			$(".btn-plus").click(function(){
				var $that = $(this);
				$.ajax({
					url : "http://<?php echo ABSOLUTE_SERVER_PATH; ?>/troll/plus/" + $that.data("id"),
					datatype : 'JSON'
				})
				.done(function(result){
					($that.data("count",$that.data("count")+1));
					($that.html($that.data("count")));
				})
				.fail(function(result){
					alert("An error has occured");
				});

			});
		})
	</script>
</body>
