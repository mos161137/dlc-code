<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vote extends Model
{
    use HasFactory;
    protected $table = 'vote';
    const UPDATED_AT = null;

    public static function get_vote(){
    }
    public static function get_vote_point(){
    }
    public static function get_vote_users(){
    }
}
