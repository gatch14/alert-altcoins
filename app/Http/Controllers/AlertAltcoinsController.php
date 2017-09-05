<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Altcoin;
use App\Controllers\StoreAndCheckApiDataController;
use App\Http\Requests\CreateAlertFormRequest;
use App\Http\Requests\UpdateAlertFormRequest;

class AlertAltcoinsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $altcoins = Altcoin::where('user_id', Auth::user()->id )->get();
        return view('alert-altcoins', compact('altcoins'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $name = Auth::user()->name;
        return view('alert-altcoins-form', compact('name')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAlertFormRequest $request)
    {
        Altcoin::create([
            'name' => strtoupper(request('name')),
            'price' => request('price'),
            'choices' => request('choices'),
            'choices_value' => request('choices_value'),
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('alert-altcoins.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       dd('erreur');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $altcoin = Altcoin::find($id);
        if ($altcoin) {        
            if ( $altcoin->user_id == Auth::user()->id) {
                return view('alert-altcoins-edit', compact('altcoin'));
            } else {
                dd('erreur');
            }    
        } else {
            dd('pas en bdd');
        }    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlertFormRequest $request, $id)
    {

        $altcoin = Altcoin::findOrFail($id);
        $altcoin->update([
            'name' => $altcoin->name,
            'price' => request('price'),
            'choices' => request('choices'),
            'choices_value' => request('choices_value'),
        ]);
        return redirect()->route('alert-altcoins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Altcoin::destroy($id);

        return redirect()->route('alert-altcoins.index');
    }
}
