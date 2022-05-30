<?php

namespace App\Http\Controllers;

use App\Models\Addresse;
use App\Models\Client;
use Illuminate\Http\Request;

class AddresseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function lov($id)
    {
        // $addresses = Prioritys::all();
        // $selectedPriority = User::first()->role_id;
        $addresses = Addresse::where('client_id', $id);
        return view('addresse.show',['addresses'=> $addresses]);
        // return view('my_view', compact('prioritys', 'selectedPriority');
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Addresse  $addresse
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$addresses = Client::find($id)->addresses;
        //$comment = Comment::find(1);
        //$addresses = Client::find(6)->addresse();
        $client = Addresse::find(6)->client();
        //$addresses = Addresse::whereBelongsTo('client_id',$id)->get();
        //$addresses = Addresse::where('client_id', $id);
        // return view('addresse.show',['addresses'=> $addresses]);
             return response()->json($client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Addresse  $addresse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Addresse $addresse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Addresse  $addresse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Addresse $addresse)
    {
        //
    }
}
