<?php

namespace App\Http\Controllers;

use App\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use DB;
use Response;
class JobsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jobs');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addJobs(Request $request)
    {
        $data = new Jobs;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->save ();
        return Response::json($respo = array('success' => 'success', 'dataId'=> $data->id));
    }

    public function updateJobs(Request $request)
    {
        $data = Jobs::find($request->id); 
        $data->title = $request->title;
        $data->description = $request->description;
        $data->save ();
        return Response::json($respo = array('success' => 'success', 'dataId'=> $data->id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function rawdata(Request $request)
    {
        $jobs = DB::table('jobs')
            ->select('jobs.*')
            ->get();

        return json_encode($jobs);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteJob(Request $request)
    {
         DB::table('jobs')->where('id', '=', $request->id)->delete();
    }
}
