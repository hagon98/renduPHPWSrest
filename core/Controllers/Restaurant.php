<?php

namespace Controllers;

class Restaurant extends AbstractController

{

    protected $defaultModelName = \Models\Restaurant::class;

    /**
     * affiche l'accueil des restaurants
     */
    public function index()
    {
        $restaurants = $this->defaultModel->findAll();
        return $this->json($restaurants);
    }

    public function new()
    {

        $request = $this->post('json', [
            'nom' => 'text',
            'adresse' => 'text',
            'ville' => 'text'
        ]);

        if (!$request) {
            return $this->json('requete mal soumise');
        }

        $restaurant = new \Models\Restaurant();

        $restaurant->setNom($request['nom']);
        $restaurant->setAdresse($request['adresse']);
        $restaurant->setVille($request['ville']);

        $this->defaultModel->save($restaurant);

        return $this->json('nouveau restaurant bien enregistré !');
    }


    public function suppr()
    {

        $request = $this->delete('json', ["id" => "number"]);

        if (!$request) {

            return $this->json("requete mal soumise", "delete");
        }

        //verifier si le restaurant existe
        //s'il n'existe, renvoyer une réponse qui le signale

        $restaurant = $this->defaultModel->findById($request['id']);
        if (!$restaurant) {

            return $this->json("désolé ce restaurant n'existe pas", "delete");
        }

        //supprimer le restau$restaurant

        $this->defaultModel->remove($restaurant);
        //envoyer une réponse qui confirme la bonne suppression

        return $this->json("restaurant bien supprimé", "delete");
    }
}
