<?php
    //Route content to include
    //Obtenir le chemin de la requête
    $request = strtolower($_SERVER["REQUEST_URI"]);
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
              "site" => "home",  //site/projects
              "projects" => "projects",  //site/projects
          );
      //Vérifier si le tableau existe
      if(array_key_exists($request[1],$routes))
      {
        include($routes[$request[1]] . ".php");
      }
      else
      {
        //Erreur, rediriger vers 404
        Log::Warn(array("message" => "Error 404. Page not found."));
        include($_SERVER['DOCUMENT_ROOT'] . "/404.php");
      }
    }
    else
    {
      Log::Info(array("message" => "User loaded a page!!!"));
      //Aucune requête, rediriger vers index
      include("home.php");
    }
  ?>