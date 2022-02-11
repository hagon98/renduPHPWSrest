<?php

namespace App;

class Response
{

    /**
     * redirige la page vers le lien fournis
     * 
     * @param string $url
     * 
     * @return void
     * 
     */

    public static function redirect(?array $parametres = null): void
    {
        $url = "";

        if ($parametres) {
            $url = "?";
            foreach ($parametres as $cle => $valeur) {

                $nouveauParam = $cle . "=" . $valeur . "&";
                $url .= $nouveauParam;
            }
        }


        header("Location: .$url");
        exit();
    }

    public static function json($trucARenvoyer, ?string $methodeSpe = null)
    {

        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');
        if ($methodeSpe == "delete") {
            header('Access-Control-Allow-Methods: DELETE');
        }
        if ($methodeSpe == "put") {
            header('Access-Control-Allow-Methods: PUT');
        }

        echo json_encode($trucARenvoyer);
    }
}
