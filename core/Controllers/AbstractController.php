<?php

namespace Controllers;



abstract class AbstractController
{

    protected object $defaultModel;

    protected $defaultModelName;


    public function __construct()
    {
        $this->defaultModel = new $this->defaultModelName();
    }

    public function redirect(?array $url = null)
    {
        return \App\Response::redirect($url);
    }

    public function render(string $template, array $donnees)
    {
        return \App\View::render($template, $donnees);
    }

    public function json($trucARenvoyer, ?string $methodeSpe = null)
    {

        return \App\Response::json($trucARenvoyer, $methodeSpe);
    }

    public function getUser()
    {
        return \Models\User::getUser();
    }

    public function get(string $dataType, array $requestBodyParams)
    {
        return \App\Request::get($dataType, $requestBodyParams);
    }

    public function post(string $dataType, array $requestBodyParams)
    {
        return \App\Request::post($dataType, $requestBodyParams);
    }

    public function delete(string $dataType, array $requestBodyParams)
    {
        return \App\Request::delete($dataType, $requestBodyParams);
    }

    public function put(string $dataType, array $requestBodyParams)
    {
        return \App\Request::put($dataType, $requestBodyParams);
    }
}


// lorsque le model d'une class est créer on peut créer une methode new ici afin de pouvoir créér un nouveau objet de la class
//  on va d'abord effectuer des vérification sur le formulaire qu'on va nous soumettre 
// puis si toute les infos sont vérifier et non-vide on peut déclarer un new objet de cette class en utilisant les setteur pour
// assigner les proprieté dans l'objet de la class

// exemple:

//on veut créer un commentaire

// public funtion newCommentaire(){
// 
// 
// $description = null;
//
// if($_POST['description']){$descritpion = $_POST['description'];}
// if($description){
//    $commentaire = new \Models\Commentaire();
//    $commentaire->setDescription($description);
//    $this->defaultModel->save($commentaire);
//    return $this->redirect();
// }
// return $this->render("commentaire/create",["pageTitle"=> "nouveau commentaire"]);  
// }
