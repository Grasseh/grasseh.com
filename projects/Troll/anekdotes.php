<body>
	<?php
	try {
	    # MS SQL Server and Sybase with PDO_DBLIB
	    //Seed base user
	    $pdo = new PDO(ANEKDOTES_STRING,DATABASE_USER,DATABASE_PASSWORD);

	    $cmd = $pdo->prepare('SELECT Users.id as id, Users.name as name, COUNT(Trolls.id) as count FROM Users LEFT JOIN Trolls ON Users.id = Trolls.user_id GROUP BY Users.id,Users.name');
			$cmd->execute();
			$users = "";
	    while ($row = $cmd->fetch(PDO::FETCH_ASSOC)) {
	      echo($row["name"]. " <button id='". $row["id"] . "' data-count='". $row["count"] . "' >" . $row["count"] . "</button><br/>");
	      $users .= "<option value=" . $row["id"] . ">".$row['name']."</option>";
	    }
	    echo(time());

	}
	catch(PDOException $e) {
	    echo $e->getMessage();
	}
	?>
	<hr>
	<h1>Ajouter un troll!</h1>
	<label for="From">Reporter:</label>
	<input type="Text" name="From" id="From"/>
	<label for="For">Master Troll:</label>
	<select name="For" id="For">
		<?php echo($users); ?>
	</select>
	<label for="Reason">Reason:</label>
	<input type="Text" name="Reason" id="Reason"/>
	<button class="btn-plus">ADD</button>
	<script type="text/javascript" src="/public/libs/jquery.js"></script>
	<script>
		$(function(){
			$(".btn-plus").click(function(){
				var $that = $(this);
				$.ajax({
					url : "http://<?php echo ABSOLUTE_SERVER_PATH; ?>/troll/plus/" + $("#For").val(),
					data : {
						from : $("#From").val(),
						reason : $("#Reason").val(),
					},
					dataType : 'json'
				})
				.done(function(result){
					if (result.success){
						($("#" + $("#For").val()).data("count",$("#" + $("#For").val()).data("count")+1));
						($("#" + $("#For").val()).html($("#" + $("#For").val()).data("count")));
					}
				})
				.fail(function(result){
					alert("An error has occured");
				});

			});
		})
	</script>
</body>
