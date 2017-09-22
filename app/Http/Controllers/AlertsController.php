<?php

namespace App\Http\Controllers;

use App\Altcoin;
use App\Mail\SendAlert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        	// Tableau symbole crypto => prix en dollar
            $dataAltcoinsDollar[$data[$key]->symbol] = $data[$key]->price_usd;
        	// Tableau symbole crypto => prix en BTC
            $dataAltcoinsBTC[$data[$key]->symbol] = $data[$key]->price_btc;
        }
        // recup des crypto dans bdd sans alerte ( alerted = 0 ) en dollar
        $altcoinsDollar = Altcoin::where('alerted', 0)
        					->where('choices_value', '=', '$')
        					->get();
        foreach ($altcoinsDollar as $key) {
        	//echo $key->name .'=>'. $dataAltcoinsDollar[$key->name].'<br>';
        	// on traite les low => prix du cours sous le prix bdd
        	if (( $dataAltcoinsDollar[$key->name] < $key->price ) && ($key->choices == 'low')) {
                //echo $key->id.'<br>';
        		// $datalow[$key->id] = [$key->id, $key->user_id];
        		// et on alerte + modif alerted en 1
        	} elseif (( $dataAltcoinsDollar[$key->name] > $key->price ) && ($key->choices == 'high')) {
        		// on traite les high => prix du cours superieur au prix bdd
        		$datahigh = $key->id;
        		// et on alerte + modif alerted en 1
        	} else {
        		// on fait rien
        	}
        }

        dd($filtre);
	}

    function test()
    {
        //on cherche le fichier Json pour le lire
        $json_source = file_get_contents('dataAltcoins.json');
        //on decode
        $data = json_decode($json_source);
        $dataAltcoinsDollar = array();
        $dataAltcoinsBTC = array();
        $crypto = array();
        foreach ($data as $key => $value) {
            // Tableau symbole crypto => prix en dollar
            $dataAltcoinsDollar[$data[$key]->symbol] = $data[$key]->price_usd;
            array_push($crypto, $data[$key]->symbol);
            // Tableau symbole crypto => prix en BTC
            $dataAltcoinsBTC[$data[$key]->symbol] = $data[$key]->price_btc;
        }
        // recup des crypto dans bdd sans alerte ( alerted = 0 ) en dollar
        $altcoinsDollar = Altcoin::where('alerted', 0)
                            ->whereIn('name', $crypto)
                            ->where(function($query)  {
                                $query->where('choices_value', '=', '$')
                                      ->where('choices', '=', 'low')
                                      ;
                            })
                            ->get();
        dd($dataAltcoinsDollar);
                            echo 'ok';


    }

    // on envoi l alerte + traitement si plusieurs alerte pour un user_id
    public function store()
    {
        $mailable = new SendAlert('Chris', 'gatch14@gmail.com', 'test message');
        Mail::to('ssobgib@hotmail.fr')->send($mailable);
    }
    
}
