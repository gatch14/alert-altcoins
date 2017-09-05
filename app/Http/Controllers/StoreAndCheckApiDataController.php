<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreAndCheckApiDataController extends Controller
{

	// recuperation des données et stockage dans un fichier Json
    public function storeInJson()
    {
    	//creation du fichier Json
    	$url = "https://api.coinmarketcap.com/v1/ticker/?convert=EUR";
		$data = file_get_contents($url);

		// $dataInJson = json_encode($data, true);

		// Nom du fichier à créer
		$dataAltcoins = 'dataAltcoins.json';

		// Ouverture du fichier
		$fichier = fopen($dataAltcoins, 'w+');

		// Ecriture dans le fichier
		fwrite($fichier, $data);

		// Fermeture du fichier
		fclose($fichier);
  	
    }

    // pour lire le fichier Json pour vérification
    public function readJson()
    {
    	//on cherche le fichier Json pour le lire
    	$json_source = file_get_contents('dataAltcoins.json');
    	//on decode
		$data = json_decode($json_source);
		foreach ($data as $key) {
			echo $key->symbol.'<br>';
	    }
	}


	// vérification si un symbol est present dans le fichier Json
	public function checkSymbol($symbol)
	{
    	//on cherche le fichier Json pour le lire
    	$json_source = file_get_contents('dataAltcoins.json');
    	//on decode
		$data = json_decode($json_source);
		foreach ($data as $key) {
			if ( $key->symbol == $symbol ) {
				return true;
			} else {
				dd('erreur');
			}
		}
	}
}
