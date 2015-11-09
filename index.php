<?php
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
  include("config.php");
  include("app/Start.php");

	//Obtenir le chemin de la requête
	$request = strtolower($_SERVER["REQUEST_URI"]);
  Log::Info(array("message" => "User loaded a page!!!"));
	//Retirer la barre oblique à la fin, si nécéssaire
	if($request[strlen($request)-1] == "/")
	{
		$request = substr($request, 0,strlen($request)-1);
	}
	//Vérifier s'il y a une requête
	if(strlen($request) > 0)
	{
		//Retirer la première barre oblique, si nécéssaire
		if($request[0] == "/")
		{
			$request = substr($request, 1);
		}
		$request = explode("/",$request);

		//Table de routage, selon les projets. Classifiés dans html/projects/...
		$routes = array(
            "site" => "Site",  //projects/Site
            "troll" => "Troll",  //projects/Troll
            "logparser" => "LogParser",  //projects/Troll
        );
		//Vérifier si le tableau existe
		if(array_key_exists($request[0],$routes))
		{
			include("project/" . $routes[$request[0]] . "/index.php");
		}
		else
		{
			//Erreur, rediriger vers 404
			include("404.php");
		}
	}
	else
	{
		//Aucune requête, rediriger vers index
		include("project/Site/index.php");
	}
?>
