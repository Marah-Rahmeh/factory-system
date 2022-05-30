<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Proposal_detail;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
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

    public function create($id)
    {

        $project=DB::table('projects')->where('id',$id)->first();
        $managers=DB::table('employees')->where('position_id',1)->get();
        $saless=DB::table('employees')->where('position_id',2)->get();
        return view('tasks.create', compact(['project','managers','saless']));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $task = new Task();
        $task->project_id = $request->project_id;
        $task->name= $request->name;
        $task->sales_id= $request->sales_id;
        $task->manager_id=  $request->manager_id;
        $task->delivery_date= $request->delivery_date;
        $task->actual_delivery_date= $request->actual_delivery_date;
        $task->status= 'Draft';


        if($request->hasFile('image'))
        {
            $image =$request->file('image');
            $destination_path ='public/image';
            $image_name = time().'_'.$request->image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination_path,$image_name);
            $task->image= $image_name;

        }
        $task->save();

        return redirect()->route('<project><id>edit',$request->project_id)
        ->with('success','task created successfully.');
    }


    public function show(Task $task)
    {
        //
    }


    public function edit($id)
    {
        $task=DB::table('tasks')->where('id',$id)->first();
        $managers=DB::table('employees')->where('position_id',1)->get();
        $saless=DB::table('employees')->where('position_id',2)->get();

        $project=DB::table('projects')->where('id',$task->project_id)->first();
        $contract=DB::table('contracts')->where('id',$project->contract_id)->first();
        $proposal=DB::table('proposals')->where('id',$contract->proposal_id)->first();
        $where2 = array('proposal_id' => $proposal->id);
        $proposal_details = Proposal_detail::where($where2)->get();

        return view('tasks.edit', compact(['task','managers','saless','proposal_details']));


    }


    public function update(Request $request)
    {
        $task = Task::find($request->id);
        $task->update($request->all());
        return redirect()->route('projects')->with('success', 'Task updated successfully');
    }


    public function destroy(Task $task)
    {
        //
    }
}
