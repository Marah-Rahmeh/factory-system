<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Proposal;
use Redirect,Response;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ChartJSController extends Controller
{

    public function index()
    {
        $record = User::select(DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(created_at) as day_name"),
                DB::raw("DAY(created_at) as day"))
                ->where('created_at', '>', Carbon::today()->subDay(100))
                ->groupBy('day_name','day')
                ->orderBy('day')
                ->get();
        $data = [];

     foreach($record as $row) {
        $data['label'][] = $row->day_name;
        $data['data'][] = (int) $row->count;
      }

      $data['chart_data'] = json_encode($data);
      /////////////////////////

        $proposal = Proposal::select(DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(created_at) as day_name2"),
        DB::raw("DAY(created_at) as day2"))
        ->where('created_at', '>', Carbon::today()->subDay(100))
        ->groupBy('day_name2','day2')
        ->orderBy('day2')
        ->get();
        $data2 = [];

        foreach($proposal as $row) {
        $data2['label'][] = $row->day_name2;
        $data2['data'][] = (int) $row->count;
        }

        $data2['chart_data2'] = json_encode($data2);

        return view('dashboard',$data, $data2);
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
