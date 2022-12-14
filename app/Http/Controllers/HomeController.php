<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vote;
use DB;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct(){$this->middleware('auth');}
    public function index()
    {
        $view['vote'] = vote::get_vote_on();
        return view('home.index',$view);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        // dd($r);

        if(isset($r->uvote_user_id)){
            date_default_timezone_set('Asia/Bangkok');
            $w[0]   = array('uvote_vote_id',$id);
            $w[1]   = array('uvote_user_id',$r->uvote_user_id);
            $check = DB::table('users_vote')->where($w)->count();
            $data['uvote_choose']   = $r->uvote_choose;
            if($check==0){
                $data['uvote_datetime'] = date('Y-m-d H:i:s');
                $data['uvote_user_id']  = $r->uvote_user_id;
                $data['uvote_vote_id'] = $id;
                DB::table('users_vote')->insert($data);
            }else{
                DB::table('users_vote')->where($w)->update($data);
            }
        }
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
