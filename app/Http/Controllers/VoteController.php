<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vote;
use DB;
use Auth;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){$this->middleware('auth');}
    public function index()
    {
        $view['vote'] = vote::get_vote();
        return view('vote.index',$view);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->type==1){
            return view('vote.create');
        }else{
            return redirect('');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        date_default_timezone_set('Asia/Bangkok');
        $data['vote_title']         = $r->vote_title;
        $data['vote_detail']        = $r->vote_detail;
        $data['vote_date_create']   = date('Y-m-d H:i:s');
        DB::table('vote')->insert($data);
        return redirect('vote');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $view['vote']           = vote::get_vote_id($id);
        $view['vote_agree']     = vote::get_vote_point($id,1);
        $view['vote_disagree']  = vote::get_vote_point($id,2);
        return view('vote.show',$view);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->type==1){
            $view['vote']           = vote::get_vote_id($id);
            $view['vote_agree']     = vote::get_vote_point($id,1);
            $view['vote_disagree']  = vote::get_vote_point($id,2);
            return view('vote.edit',$view);
        }else{
            return redirect('');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        $data['vote_title']         = $r->vote_title;
        $data['vote_detail']        = $r->vote_detail;
        if(isset($r->vote_status)){
            $data['vote_status']    =0;
        }else{
            $data['vote_status']    =1;
        }
        DB::table('vote')->where('vote_id',$id)->update($data);

        return redirect('');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
