<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class vote extends Model
{
    use HasFactory;
    protected $table = 'vote';
    const UPDATED_AT = null;

    public static function get_vote(){
        $data = DB::table('vote')->get();
        return $data;
    }
    public static function get_vote_on(){
        $data = DB::table('vote')->where('vote_status',0)->get();
        return $data;
    }
    public static function get_vote_id($id){
        $data = DB::table('vote')->where('vote_id',$id)->first();
        return $data;
    }
    public static function get_vote_point($id,$choose){
        $w[0] = array('uvote_vote_id',$id);
        $w[1] = array('uvote_choose',$choose);
        $data = DB::table('users_vote')->where($w)->count();
        return $data;
    }
    public static function get_vote_users($id){
        $data = DB::table('vote')->where('vote_id',$id)->first();
        return $data;
    }
}
