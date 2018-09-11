<?php

namespace App\Http\Controllers;

use App\Songs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use DB;
use Response;
class SongsController extends Controller
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
        return view('songs');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addSongs(Request $request)
    {
        $data = new Songs;
        $data->title = $request->title;
        $data->artist = $request->artist;
        $data->lyrics = $request->lyrics;
        $data->save ();
        return Response::json($respo = array('success' => 'success', 'dataId'=> $data->id));
    }

    public function updateSongs(Request $request)
    {
        $data = Songs::find($request->id); 
        $data->title = $request->title;
        $data->artist = $request->artist;
        $data->lyrics = $request->lyrics;
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
        $songs = DB::table('songs')
            ->select('songs.*')
            ->get();

        return json_encode($songs);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteSong(Request $request)
    {
         DB::table('songs')->where('id', '=', $request->id)->delete();
    }
}
