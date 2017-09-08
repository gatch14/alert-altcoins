<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Altcoin;

class AlertsController extends Controller
{
    //Chercher dans la bdd si une alerte doit etre déclenchée

    // recuperer le json des cryptos

    // recuperer les cryptos dans la bdd

    // verifier si il y a des alertes possible

    // alerter !

	public function index()
	{
        //on cherche le fichier Json pour le lire
        $json_source = file_get_contents('dataAltcoins.json');
        //on decode
        $data = json_decode($json_source);
        $dataAltcoinsDollar = [];
        $dataAltcoinsBTC = [];
		$datahigh = [];
		$datalow = [];
		$datarien = [];
        foreach ($data as $key => $value) {
        	// Tableau symbo crypto => prix en dollar
            $dataAltcoinsDollar[$data[$key]->symbol] = $data[$key]->price_usd;
        	// Tableau symbo crypto => prix en BTC
            $dataAltcoinsBTC[$data[$key]->symbol] = $data[$key]->price_btc;
        }
        // recup des crypto dans bdd sans alerte ( alerted = 0 ) en dollar
        $altcoinsDollar = Altcoin::where('alerted', 0)
        					->where('choices_value', '=', '$')
        					->get();
        foreach ($altcoinsDollar as $key) {
        	echo $key->name .'=>'. $dataAltcoinsDollar[$key->name].'<br>';
        	// on traite les low => prix du cours sous le prix bdd
        	if (( $dataAltcoinsDollar[$key->name] < $key->price ) AND ($key->choices == 'low')) {
        		echo $key->id.'<br>';
        		$datalow[$key->id] = $key->id;
        		// et on alerte + modif alerted en 1
        	} elseif (( $dataAltcoinsDollar[$key->name] > $key->price ) AND ($key->choices == 'high')) {
        		// on traite les high => prix du cours superieur au prix bdd
        		$datahigh = $key->id;
        		// et on alerte + modif alerted en 1
        	} else {
        		
        	}
        }
        
        dd($datalow);
	}
    
}
