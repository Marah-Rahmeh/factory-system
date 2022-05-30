<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use App\Models\Addresse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Redirect,Response;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::latest()->paginate(10);
        return view('clients.index',['clients'=> $clients]);
        // $clients = Client::all();
        // return view('clients.index', compact('clients','clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'personal_id' => ['required'],
        //     'mobile_number' => ['required', 'number']
        // ]);

            $user = new User;
            $user->type= 'C';
            $user->user_name= $request->first_name;
            $user->password= Hash::make('1234marah');
            $user->email= $request->email;
            $user->save();

            $client = new Client;
            $client->first_name= $request->first_name;
            $client->last_name= $request->last_name;
            $client->user_id= $user->id;
            $client->personal_id= $request->personal_id;
            $client->home_number= $request->home_number;
            $client->office_number= $request->office_number;
            $client->mobile_number= $request->mobile_number;
            $client->gender= 'F';
            $client->save();

            $addresse = new Addresse;
            $addresse->client_id= $client->id;
            $addresse->name= 'Addresse one';
            $addresse->province= $request->province;
            $addresse->neighborhood= $request->neighborhood;
            $addresse->pobox= $request->pobox;
            $addresse->contact_name= $request->contact_name;
            $addresse->contact_personal_id= $request->contact_personal_id;
            $addresse->contact_mobile= $request->contact_mobile;
            $addresse->save();

            return redirect()->route('clients')
            ->with('success','client created successfully.');

    }


    public function edit($id)
    {

        // $where = array('id' => $id);
		// $client = Client::where($where)->first();
        // return view('clients.edit',['client'=> $client]);

        $where = array('id' => $id);
		$client = Client::where($where)->first();
        // $user =  Client::find($id)->user()->get();

        $user = DB::table('users')
        ->where('id','=',$client->user_id)->first();

        $addresses = DB::table('addresses')
        ->where('client_id','=',$id)->get();
        // $addresses = Client::find($id)->addresse()->get();
        return view('clients.edit',['client'=> $client, 'addresses'=> $addresses,'user'=> $user]);
    }

    public function show($id)
    {
        $where = array('id' => $id);
		$client = Client::where($where)->first();
        $addresses = Client::find($id)->addresse()->get();
        return view('clients.show',['client'=> $client, 'addresses'=> $addresses]);
        // return response()->json($addresses);



    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'description' => 'required',
        //     'price' => 'required'
        // ]);

        $client = Client::find($id);
        $client->update($request->all());
        return redirect('/clients')->with('success', 'Client updated successfully');

    }

    public function destroy(Request $request)
    {
        // dd($request->all());
        $client = Client::find($request->id);
        $client->delete();
        $client->save();
         return redirect('/clients')->with('success', 'Client deleted successfully');
    }
}
