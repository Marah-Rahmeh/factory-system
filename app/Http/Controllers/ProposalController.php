<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\Client;
use App\Models\Addresse;
use App\Models\Proposal_detail;
use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProposalController extends Controller
{

    public function index()
    {
        $proposals = Proposal::all();
        $client = Client::all();
        $addresse = Addresse::all();
        $contract = DB::table('contracts')->select('proposal_id AS c_proposal_id')->get();
        return view('proposals.index', compact('proposals', 'client','addresse','contract'));

        // $proposals = Proposal::latest()->paginate(10)-> client();
        // // $client = Client::find($proposals->client_id)->first();
        // // $addresse = Addresse::find($proposals->client_adderss_id);
        // // return view('proposals.index', compact(['proposal', 'proposal_details','client','addresse']));
        // return view('proposals.index',['proposals'=> $proposals]);
    }

    public function create()
    {
        return view('proposals.create');
    }

    public function create2($id)
    {
        // $where = array('id' => $id);
		// $client = Client::where($where)->first();
        $client = Client::find($id);
        // $where2 = array('client_id' => $id);
        // $addresses = Addresse::
        $addresse = DB::table('addresses')
                    ->where('client_id','=',$id)->first();

        $user = DB::table('users')
                    ->where('id','=',$client->user_id)->first();
        // dd($addresses);
        return view('proposals.create2',['client'=> $client, 'addresse'=> $addresse, 'user'=> $user]);

    }

    public function test($id)
    {
        // $where = array('id' => $id);
		// $client = Client::where($where)->first();
        $client = Client::find($id);
        // $where2 = array('client_id' => $id);
        // $addresses = Addresse::
        $addresse = DB::table('addresses')
                    ->where('client_id','=',$id)->first();

        $user = DB::table('users')
                    ->where('id','=',$client->user_id)->first();
        // dd($addresses);
        return view('proposals.test',['client'=> $client, 'addresse'=> $addresse, 'user'=> $user]);

    }


    public function store(Request $request)
    {
        // dd($request->all());
        $proposal = new Proposal;
        $proposal->parent_id = $request->parent_id;
        $proposal->client_id= $request->client_id;
        $proposal->client_adderss_id= $request->client_adderss_id;
        $proposal->status= 'Draft';
        $proposal->proposal_date= $request->proposal_date;
        $proposal->proposal_amount= $request->proposal_amount;
        $proposal->save();

        for($i=0 ; $i < count($request->detail_id) ;$i++) {

            $proposal_detail = new Proposal_detail();

            $proposal_detail->proposal_id = $proposal->id;
            $proposal_detail->item_type= $request->type[$i];
            $proposal_detail->item_no= $request->item_no[$i];
            $proposal_detail->item_details=  $request->item_details[$i];
            $proposal_detail->es_width= $request->es_width[$i];
            $proposal_detail->es_height= $request->es_height[$i];
            $proposal_detail->fn_width= $request->fn_width[$i];
            $proposal_detail->fn_height= $request->fn_height[$i];

            if($request->hasFile('image'))
            {
                if(isset($request->image[$i]) && !is_null($request->image[$i]))
                {
                $image =$request->file('image');
                $destination_path ='public/image';
                $image_name = time().'_'.$request->image[$i]->getClientOriginalName();
                $path = $request->file('image')[$i]->storeAs($destination_path,$image_name);
                $proposal_detail->image= $image_name;
                }
            }

            $proposal_detail->save();
        }
           return redirect()->route('proposals')
        ->with('success','proposal created successfully.');

    }


    public function show($id)
    {
        $proposal=DB::table('proposals')->where('id',$id)->first();
        // dd($proposal);
        $client=DB::table('clients')->where('id',$proposal->client_id)->first();
        $user=DB::table('users')->where('id',$client->user_id)->first();
        $where2 = array('proposal_id' => $proposal->id);
        $proposal_details = Proposal_detail::where($where2)->get();
        $addresse = Addresse::find($proposal->client_adderss_id)->first();
        return view('proposals.show', compact(['proposal', 'proposal_details','client','addresse','user']));
    }

    public function print($id)
    {
        $proposal=DB::table('proposals')->where('id',$id)->first();
        // dd($proposal);
        $client=DB::table('clients')->where('id',$proposal->client_id)->first();
        $user=DB::table('users')->where('id',$client->user_id)->first();
        $where2 = array('proposal_id' => $proposal->id);
        $proposal_details = Proposal_detail::where($where2)->get();
        $addresse = Addresse::find($proposal->client_adderss_id)->first();
        return view('proposals.print2', compact(['proposal', 'proposal_details','client','addresse','user']));
    }

    public function edit($id)
    {
        $proposal=DB::table('proposals')->where('id',$id)->first();
        $client=DB::table('clients')->where('id',$proposal->client_id)->first();
        $user=DB::table('users')->where('id',$client->user_id)->first();
        $where2 = array('proposal_id' => $proposal->id);
        $proposal_details = Proposal_detail::where($where2)->get();
        $addresse = Addresse::find($proposal->client_adderss_id)->first();

        // $where = array('id' => $id);
		// $proposal = Proposal::where($where)->first();
        // $client = Client::find($proposal->client_id)->first();
        // $where2 = array('proposal_id' => $id);
        // $proposal_details = Proposal_detail::where($where2)->get();
        // $addresse = Addresse::find($proposal->client_adderss_id);
        return view('proposals.edit', compact(['proposal', 'proposal_details','client','addresse','user']));

    }

    public function update(Request $request)
    {
        $proposal = new Proposal;
        $proposal->parent_id = $request->parent_id;
        $proposal->client_id= $request->client_id;
        $proposal->client_adderss_id= 1;
        $proposal->status= 'Draft';
        $proposal->proposal_date= $request->proposal_date;
        $proposal->save();

        for($i=0 ; $i < count($request->detail_id) ;$i++) {

            $proposal_detail = new Proposal_detail();

            $proposal_detail->proposal_id = $proposal->id;
            $proposal_detail->item_type= $request->type[$i];
            $proposal_detail->item_no= $request->item_no[$i];
            $proposal_detail->item_details=  $request->item_details[$i];
            $proposal_detail->es_width= $request->es_width[$i];
            $proposal_detail->es_height= $request->es_height[$i];
            $proposal_detail->fn_width= $request->fn_width[$i];
            $proposal_detail->fn_height= $request->fn_height[$i];

            if($request->hasFile('image'))
            {
                if(isset($request->image[$i]) && !is_null($request->image[$i]))
                {
                $image =$request->file('image');
                $destination_path ='public/image';
                $image_name = time().'_'.$request->image[$i]->getClientOriginalName();
                $path = $request->file('image')[$i]->storeAs($destination_path,$image_name);
                $proposal_detail->image= $image_name;
                }
            }
            $proposal_detail->save();
        }
           return redirect()->route('proposals')
        ->with('success','proposal created successfully.');

    }

    public function approve(Request $request)
    {

        $proposal = Proposal::find($request->id);
        // $proposal->update($proposal->status= 'Approve');

        $proposal->update(array('status' => 'Approve'));
           return redirect()->route('proposals')
        ->with('success','proposal approved successfully.');

    }

    public function destroy(Request $request)
    {
        // dd($request->all());
        $proposal = Proposal::find($request->id);
        $proposal->delete();
        $proposal->save();
         return redirect('/proposals')->with('success', 'proposal deleted successfully');
    }

}
