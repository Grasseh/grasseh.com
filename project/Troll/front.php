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
</body>
