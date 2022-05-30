<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\Contract;
use App\Models\Proposal;
use App\Models\Client;
use App\Models\Addresse;
use App\Models\Proposal_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return view('projects.index',['projects'=> $projects]);
    }


    public function create()
    {
        return view('projects.create');
    }


    public function create2($id)
    {

        $contract=DB::table('contracts')->where('id',$id)->first();
        $proposal=DB::table('proposals')->where('id',$contract->proposal_id)->first();
        $client=DB::table('clients')->where('id',$proposal->client_id)->first();
        // $employees=DB::table('employees')->get();
        $managers=DB::table('employees')->where('position_id',1)->get();
        $saless=DB::table('employees')->where('position_id',2)->get();
        $user=DB::table('users')->where('id',$client->user_id)->first();
        $where2 = array('proposal_id' => $proposal->id);
        $proposal_details = Proposal_detail::where($where2)->get();
        $addresse = Addresse::find($proposal->client_adderss_id)->first();
        return view('projects.create2', compact(['contract','proposal', 'proposal_details','client','addresse','user','managers','saless']));

    }

    public function store(Request $request)
    {
        // dd($request->all());

        $project = new Project;
        $project->contract_id= $request->contract_id;
        $project->name= $request->name;
        $project->manager_id= $request->manager_id;
        $project->plane_delivery_date= $request->plane_delivery_date;
        $project->delivery_date= $request->p_delivery_date;
        $project->status= 'Draft';
        $project->start_date= $request->start_date;
        $project->end_date= $request->end_date;
        $project->save();

// dd($request->all());


        for($i=0 ; $i < count($request->detail_id);$i++) {
            $task = new Task();
            $task->project_id = $project->id;
            $task->name= $request->task_name[$i];
            $task->sales_id= $request->task_sales_id[$i];
            $task->manager_id=  $request->task_manager_id[$i];
            $task->delivery_date= $request->task_delivery_date[$i];
            $task->actual_delivery_date= $request->task_actual_delivery_date[$i];
            $task->status= 'Draft';

            if($request->hasFile('image'))
            {
                if(isset($request->image[$i]) && !is_null($request->image[$i]))
                {
                $image =$request->file('image');
                $destination_path ='public/image';
                // $image_name = $request->task_name[$i];
                $image_name = time().'_'.$request->image[$i]->getClientOriginalName();
                $path = $request->file('image')[$i]->storeAs($destination_path,$image_name);
                $task->image= $image_name;
                }
            }

            $task->save();
        }


        return redirect()->route('projects')
        ->with('success','project created successfully.');

        // return 'done';
    }


    public function show($id)
    {
        // DB::enableQueryLog();
        $project=DB::table('projects')->where('id',$id)->first();
        $tasks=DB::table('tasks')->where('project_id',$id)->get();
        $contract=DB::table('contracts')->where('id',$project->contract_id)->first();
        $proposal=DB::table('proposals')->where('id',$contract->proposal_id)->first();
        $client=DB::table('clients')->where('id',$proposal->client_id)->first();
        $user=DB::table('users')->where('id',$client->user_id)->first();
        $where2 = array('proposal_id' => $proposal->id);
        $proposal_details = Proposal_detail::where($where2)->get();
        $addresse = Addresse::find($proposal->client_adderss_id)->first();
        return view('projects.show', compact(['project','contract','proposal', 'proposal_details','client','addresse','user','tasks']));

        // $project = Project::find($id)->first();
        // // $tasks = Task::where('project_id', $id)->get();
        // $where2 = array('project_id' => $id);
        // $tasks = Task::where($where2)->get();
        // // $quries = DB::getQueryLog();
        // return view('projects.show', compact(['project', 'tasks']));
        // // return response()->json($tasks);
        // // dd(storage_path());
        // // dd($quries);
    }


    public function edit($id)
    {
        $project=DB::table('projects')->where('id',$id)->first();
        $tasks=DB::table('tasks')->where('project_id',$id)->get();
        $contract=DB::table('contracts')->where('id',$project->contract_id)->first();
        $proposal=DB::table('proposals')->where('id',$contract->proposal_id)->first();
        $client=DB::table('clients')->where('id',$proposal->client_id)->first();
        $user=DB::table('users')->where('id',$client->user_id)->first();
        $where2 = array('proposal_id' => $proposal->id);
        $proposal_details = Proposal_detail::where($where2)->get();
        $managers=DB::table('employees')->where('position_id',1)->get();
        $saless=DB::table('employees')->where('position_id',2)->get();
        $addresse = Addresse::find($proposal->client_adderss_id)->first();
        return view('projects.edit', compact(['project','contract','proposal', 'proposal_details','client','addresse','user','tasks','managers','saless']));


        // DB::enableQueryLog();
        // $project = Project::find($id)->first();
        // $where2 = array('project_id' => $id);
        // $tasks = Task::where($where2)->get();
        // $where2 = array('project_id' => $id);
        // $tasks = Task::where($where2)->get();
        // $where1 = array('id' => $project->contract_id);
		// $contract = Contract::where($where1)->first();
        // $proposal = Proposal::find($contract->proposal_id)->first();
        // $client = Client::find($proposal->client_id)->first();
        // $addresse = Addresse::find($proposal->client_adderss_id);
        // $quries = DB::getQueryLog();
        // // dd($quries);
        // // $client = Client::find($project->client_id)->first();
        // // $addresse = Addresse::find($project->client_adderss_id);
        // return view('projects.edit', compact(['project', 'tasks','client','addresse','proposal','contract']));


    }

    public function edit2($id)
    {
        $project=DB::table('projects')->where('id',$id)->first();
        $managers=DB::table('employees')->where('position_id',1)->get();
        // $saless=DB::table('employees')->where('position_id',2)->get();
        return view('projects.edit2', compact(['project','managers']));


    }

    public function update(Request $request)
    {
        $project = Project::find($request->id);
        $project->update($request->all());
        return redirect()->route('projects')->with('success', 'Project updated successfully');
    }

    public function destroy(Request $request)
    {
        // dd($request->all());
        $project = Project::find($request->id);
        $project->delete();
        $project->save();
            return redirect('/projects')->with('success', 'project deleted successfully');
    }
}
