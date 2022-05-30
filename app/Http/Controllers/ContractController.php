<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Proposal;
use App\Models\Client;
use App\Models\Addresse;
use App\Models\Proposal_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContractController extends Controller
{

    public function index()
    {
        $contracts = Contract::latest()->paginate(10);
        $project = DB::table('projects')->select('contract_id AS p_contract_id')->get();
        return view('contracts.index', compact('contracts', 'project'));
        // return view('contracts.index',['contracts'=> $contracts]);
    }

    public function create()
    {
        return view('contracts.create');
    }

    public function create2($id)
    {

        // DB::enableQueryLog();
        $proposal=DB::table('proposals')->where('id',$id)->first();
        // dd($proposal);
        $client=DB::table('clients')->where('id',$proposal->client_id)->first();
        $user=DB::table('users')->where('id',$client->user_id)->first();
        $where2 = array('proposal_id' => $proposal->id);
        $proposal_details = Proposal_detail::where($where2)->get();
        $addresse = Addresse::find($proposal->client_adderss_id)->first();
        return view('contracts.create2', compact(['proposal', 'proposal_details','client','addresse','user']));


    }

    // $table->id();
    // proposal_id')->unsigned();
    //'status');
    // 'start_date')->nullable();
    // 'delivery_date')->nullable();
    // $table->integer('cr_id')->nullable();
    // $table->timestamp('created_at')->useCurrent();
    // $table->integer('up_id')->nullable();
    // $table->timestamp('updated_at')->nullable();

    public function store(Request $request)
    {
        $contract = new Contract;
        $contract->proposal_id = $request->proposal_id;
        $contract->price_amount = $request->proposal_amount;
        $contract->status= 'Draft';
        $contract->start_date= $request->start_date;
        $contract->delivery_date= $request->delivery_date;
        $contract->save();

        return redirect()->route('contracts')
        ->with('success','Contract created successfully.');
    }


    public function show($id)
    {
        $contract=DB::table('contracts')->where('id',$id)->first();
        $proposal=DB::table('proposals')->where('id',$contract->proposal_id)->first();
        // dd($proposal);
        $client=DB::table('clients')->where('id',$proposal->client_id)->first();
        $user=DB::table('users')->where('id',$client->user_id)->first();
        $where2 = array('proposal_id' => $proposal->id);
        $proposal_details = Proposal_detail::where($where2)->get();
        $addresse = Addresse::find($proposal->client_adderss_id)->first();


        // $where1 = array('id' => $id);
		// $contract = Contract::where($where1)->first();
        // $where = array('id' => $id);
        // $proposal = Proposal::find($contract->proposal_id)->latest();
        // $client = Client::find($proposal->client_id)->get();
        // $where2 = array('proposal_id' => $proposal->id);
        // $proposal_details = Proposal_detail::where($where2)->get();
        // $addresse = Addresse::find($proposal->client_adderss_id);
        return view('contracts.show', compact(['contract','proposal', 'proposal_details','client','addresse','user']));
    }


    public function print($id)
    {
        $contract=DB::table('contracts')->where('id',$id)->first();
        $proposal=DB::table('proposals')->where('id',$contract->proposal_id)->first();
        $client=DB::table('clients')->where('id',$proposal->client_id)->first();
        $user=DB::table('users')->where('id',$client->user_id)->first();
        $where2 = array('proposal_id' => $proposal->id);
        $proposal_details = Proposal_detail::where($where2)->get();
        $addresse = Addresse::find($proposal->client_adderss_id)->first();
        return view('contracts.print', compact(['contract','proposal', 'proposal_details','client','addresse','user']));
    }


    public function edit($id)
    {
        // $where1 = array('id' => $id);
		// $contract = Contract::where($where1)->first();
        // $where = array('id' => $id);
        // $proposal = Proposal::find($contract->proposal_id)->first();
        // $client = Client::find($proposal->client_id)->first();
        // $where2 = array('proposal_id' => $proposal->id);
        // $proposal_details = Proposal_detail::where($where2)->get();
        // $addresse = Addresse::find($proposal->client_adderss_id);

        $contract=DB::table('contracts')->where('id',$id)->first();
        $proposal=DB::table('proposals')->where('id',$contract->proposal_id)->first();
        // dd($proposal);
        $client=DB::table('clients')->where('id',$proposal->client_id)->first();
        $user=DB::table('users')->where('id',$client->user_id)->first();
        $where2 = array('proposal_id' => $proposal->id);
        $proposal_details = Proposal_detail::where($where2)->get();
        $addresse = Addresse::find($proposal->client_adderss_id)->first();

        return view('contracts.edit', compact(['contract','proposal', 'proposal_details','client','addresse','user']));

    }

    public function update(Request $request)
    {
        // dd( $request->all());

        // $contract = Contract::find($id);
        // $contract->update($request->all());
        // return redirect()->back()->with('success', 'Contract updated successfully');

        $contract = Contract::find($request->id);
        //     $contract->proposal_id = $request->proposal_id;
        //     $contract->delivery_date= $request->start_date;
        //     $contract->delivery_date= $request->delivery_date;
        $contract->update($request->all());
        //   $contract->save();
        // //   return redirect()->back()->with()
        return redirect()->route('contracts')->with('success', 'Contract updated successfully');

    }

    public function destroy(Request $request)
    {
        // dd($request->all());
        $contract = Contract::find($request->id);
        $contract->delete();
        $contract->save();
         return redirect('/contracts')->with('success', 'contract deleted successfully');
    }
}
