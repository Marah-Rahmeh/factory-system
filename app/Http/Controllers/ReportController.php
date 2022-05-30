<?php

namespace App\Http\Controllers;
use PdfReport;
use App\Models\User;
use App\Models\Proposal;
use App\Models\Client;
use Redirect,Response;
use Datatables;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function index(Request $request)
    {
        $fromDate = $request->input('from');
        // dd($fromDate);
        $toDate = $request->input('to');

        if(request()->ajax()) {

            $select ='select
            c.id,
            c.first_name,
            c.personal_id,
            c.home_number,
            c.mobile_number,
            DATE_FORMAT(c.created_at, "%Y-%m-%d") as created_at,
            (select count(*) from proposals p where p.client_id = c.id) as proposals_no,
            (select count(*) from proposals p left join contracts co on p.id = co.proposal_id where p.client_id = c.id and co.id is not null) as contracts_no,
            (select count(*) from proposals p left join contracts co on p.id = co.proposal_id left join projects pr on co.id = pr.contract_id where p.client_id = c.id and pr.id is not null) as projects_no
            from clients c';

            if ($fromDate != "") {
                // dd($fromDate);
            $select = $select . ' where DATE_FORMAT(c.created_at, "%Y-%m-%d") >'.'DATE_FORMAT(\''.$fromDate.'\', "%Y-%m-%d")' ;
            }

            // dd($select);
            $result=DB::connection('mysql')->select(DB::raw($select));
            // dd($result);
            return datatables()->of($result)->make(true);

        }
        return view('reports.test_report');

    }


    public function proposal(Request $request)
    {

            $select ='select
                            p.id,
                            (select CONCAT(cl.first_name , \' \', cl.last_name)  from clients cl where  p.client_id = p.id) as client_name ,
                            p.status,
                            p.proposal_amount,
                            DATE_FORMAT(p.proposal_date, "%Y-%m-%d") proposal_date,
                            DATE_FORMAT(p.created_at, "%Y-%m-%d") as created_at2,
                            case when (select count(*) from contracts c where c.proposal_id = p.id) > 0 then \'yes\' else \'No\' end has_contract
                        FROM
                        proposals p';

            $result=DB::connection('mysql')->select(DB::raw($select));
            // dd($result);
            return view('reports.proposals',['proposals'=> $result]);


    }


    public function contracts(Request $request)
    {
        // $fromDate = $request->input('from_date');
        // $toDate = $request->input('to_date');
        // $sortBy = $request->input('sort_by');

        // if(request()->ajax()) {

            $select ='  select
                            c.id,
                            c.proposal_id,
                            (select CONCAT(cl.first_name , \' \', cl.last_name)  from proposals p left join clients cl on p.client_id = cl.id where  c.proposal_id = p.id) as client_name,
                            c.price_amount,
                            DATE_FORMAT(c.start_date, "%Y-%m-%d") start_date,
                            DATE_FORMAT(c.delivery_date, "%Y-%m-%d") delivery_date,
                            DATE_FORMAT(c.created_at, "%Y-%m-%d")  created_at,
                            case when (select count(*) from projects pr where pr.contract_id = c.id) > 0 then \'yes\'
                            else \'No\'
                            end has_project
                        FROM
                        contracts c';

            // dd($select);
            $result=DB::connection('mysql')->select(DB::raw($select));
            return view('reports.contracts',['contracts'=> $result]);
        // }


    }

    public function projects(Request $request)
    {
        // $fromDate = $request->input('from_date');
        // $toDate = $request->input('to_date');
        // $sortBy = $request->input('sort_by');

        // if(request()->ajax()) {

            $select ='  select
                            p.id,
                            CONCAT(cl.first_name , \' \' , cl.last_name) as client_name,
                            p.contract_id,
                            (select CONCAT(cl.first_name , \' \' , cl.last_name) from employees e where e.id = p.manager_id ) manager_name,
                            p.plane_delivery_date,
                            p.delivery_date,
                            p.status,
                            DATE_FORMAT(p.created_at, "%Y-%m-%d")  created_at
                            from
                            projects p left join contracts c on p.contract_id = c.id left join proposals pro on c.proposal_id = pro.id left join clients cl on cl.id = pro.client_id';

            // dd($select);
            $result=DB::connection('mysql')->select(DB::raw($select));
            return view('reports.projects',['projects'=> $result]);
        // }


    }


    public function store(Request $request)
    {
        DB::table('website_tags')
        ->join('assigned_tags', 'website_tags.id', '=', 'assigned_tags.tag_id')
        ->select('website_tags.id as id', 'website_tags.title as title', DB::raw("count(assigned_tags.tag_id) as count"))
        ->groupBy('website_tags.id')
        ->get();

        DB::table('categories')->leftJoin('product', 'categories.id', '=','categpry_id')
        ->selectRaw('categories.*, count(product.id) as Count')
        ->where('product.status',1)
        ->groupBy('categories.id')
        ->get();

    }


    public function show(Request $request)
    {
        $select ='select
                                    c.id,
                                    c.first_name,
                                    c.personal_id,
                                    c.home_number,
                                    c.mobile_number,
                                    DATE_FORMAT(c.created_at, "%Y-%m-%d") as created_at,
                                    (select count(*) from proposals p where p.client_id = c.id) as proposals_no,
                                    (select count(*) from proposals p left join contracts co on p.id = co.proposal_id where p.client_id = c.id and co.id is not null) as contracts_no,
                                    (select count(*) from proposals p left join contracts co on p.id = co.proposal_id left join projects pr on co.id = pr.contract_id where p.client_id = c.id and pr.id is not null) as projects_no
                                from clients c';

        $result=DB::connection('mysql')->select(DB::raw($select));
       return view('reports.test',['clients'=> $result]);
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




