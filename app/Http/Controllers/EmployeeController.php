<?php

namespace App\Http\Controllers;


use App\Models\Employee;
use App\Models\User;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{

    public function index()
    {

        // // $employees = Employee::position()->with('Employee')->get()->toArray();
        // $employees = Employee::get();
        // $positions = Position::get();
        // // return response()->json($positions);
        // return view('employees.index',['employees'=> $employees, 'positions'=> $positions]);

        $employees = Employee::all();
        $positions = Position::all();
        return view('employees.index')->with('employees', $employees)
            ->with('positions', $positions);
    }

    public function create()
    {
        $positions = Position::get();
        return view('employees.create',['positions'=> $positions]);
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->type= 'E';
        $user->user_name= $request->first_name;
        $user->password= Hash::make( $request->password);
        $user->email= $request->email;
        $user->save();

        $employee = new Employee;
        $employee->first_name= $request->first_name;
        $employee->last_name= $request->last_name;
        $employee->user_id= $user->id;
        $employee->personal_id= $request->personal_id;
        $employee->position_id= $request->position_id;
        $employee->addresse= $request->addresse;
        $employee->mobile_number= $request->mobile_number;
        $employee->save();

        return redirect()->route('employees')
        ->with('success','employee created successfully.');

    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        $where = array('id' => $id);
		$employee = Employee::where($where)->first();

        $user = DB::table('users')
        ->where('id','=',$employee->user_id)->first();

        $positions = Position::all();

        return view('employees.edit',['employee'=> $employee,'user'=> $user, 'positions'=> $positions]);
    }

    public function update(Request $request, $id)
    {

        $employee = Employee::find($id);
        $employee->update($request->all());

        $user = User::find($employee->user_id);
        $user->update($request->all());

        return redirect('/employees')->with('success', 'Employees updated successfully');

    }


    public function destroy(Request $request)
    {
        // dd($request->all());
        $employee = Employee::find($request->id);
        $employee->delete();
        $employee->save();

        $user = User::find($employee->user_id);
        $user->delete();
        $user->save();

         return redirect('/employees')->with('success', 'employee deleted successfully');
    }
}
