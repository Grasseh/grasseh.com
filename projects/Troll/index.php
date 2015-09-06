<?php

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
    if($request[strlen($request)-1] == "/")
    {
        $request = substr($request, strlen($ToRemove));
    }
    $request = explode("/",$request);
    //Table de routage, selon les projets. Classifiés dans html/projects/...
    $routes = array(
        "anekdotes" => "anekdotes",  //anekdotes
        "plus" => "plus",  //anekdotes
    );
    //Vérifier si le tableau est assez long
    if(count($request) > 1){
        //Vérifier si le tableau existe
        if(array_key_exists($request[1],$routes))
        {
            include("projects/Troll/" . $routes[$request[1]] . ".php");
        }
        else
        {
            //Erreur, rediriger vers 404
            include("404.php");
        }
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
    include("projects/Site/index.php");
}