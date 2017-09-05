<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAlertFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //on cherche le fichier Json pour le lire
        $json_source = file_get_contents('dataAltcoins.json');
        //on decode
        $data = json_decode($json_source);
        //Creation tableau vide
        $symbol = [];
        foreach ($data as $key) {
            //on met tous les symbol dans un tableau pour faire les vérif apres
            array_push($symbol, $key->symbol);
            array_push($symbol, strtolower($key->symbol));
        }
        return [
            'name' => 'required|in:' . implode(',', $symbol),
            'price' => 'required|numeric|between:0.00000001,1000000',
            'choices' => 'required|in:high,low', 
            'choices_value' => 'required|in:BTC,$', 
        ];
    }
}
