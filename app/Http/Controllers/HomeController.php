<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Applicants;
use App\Jobs;
class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $application = Applicants::select('job_id', 'created_at')
                ->get()
                ->groupBy(function($date) {
                    //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                    return \Carbon\Carbon::parse($date->created_at)->format('m'); // grouping by months
                });


        $app_amount = [];
        $application_arr = [];

        foreach ($application as $key => $value) {
            $app_amount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($app_amount[$i])){
                $application_arr[$i] = $app_amount[$i];    
            }else{
                $application_arr[$i] = 0;    
            }
        }

        $data['application_arr'] = implode(',', $application_arr);
        $data['jobs'] = Jobs::orderBy('created_at', 'desc')->get();
        $data['applicants'] = Applicants::all()->pluck('title')->count();
        return view('home',$data);
    }
}
