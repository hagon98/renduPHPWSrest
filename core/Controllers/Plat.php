<?php

namespace Controllers;

class Plat extends AbstractController

{

    protected $defaultModelName = \Models\Plat::class;

    /**
     * attend une requete de type DELETE
     * @return void
     */
    public function suppr()
    {

        //recuperer la demande (la requete)

        $request = $this->delete('json', ['id' => 'number']);
        if (!$request) {

            return $this->json("requete mal soumise", "delete");
        }

        //verifier si le plat existe
        //s'il n'existe, renvoyer une réponse qui le signale

        $plat = $this->defaultModel->findById($request['id']);
        if (!$plat) {

            return $this->json("désolé ce plat n'existe pas", "delete");
        }

        //supprimer le plat

        $this->defaultModel->remove($plat);
        //envoyer une réponse qui confirme la bonne suppression

        return $this->json("plat bien supprimé", "delete");
    }
}
