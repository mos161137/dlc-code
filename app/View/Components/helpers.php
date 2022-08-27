<?php
        function get_point($id,$choose){
            $w[0]   = array('uvote_vote_id',$id);
            $w[1]   = array('uvote_choose',$choose);
            $data = DB::table('users_vote')->where($w)->count();
            echo $data;
        }
        function check_select($id,$user,$choose){
            if(isset($user)){
                $w[0]   = array('uvote_vote_id',$id);
                $w[1]   = array('uvote_user_id',$user);
                $w[2]   = array('uvote_choose',$choose);
                $data = DB::table('users_vote')->where($w)->count();
                if($data>0){
                    echo "✓";
                }
            }
        }
?>
