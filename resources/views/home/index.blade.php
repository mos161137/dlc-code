@extends('layouts.all')
@section('style')
<style>
    #menu_vote .col-lg-4 > .card > .card-body > .data-list{
        overflow-y: auto;
        height: 10em;
    }
    #menu_vote .col-lg-4 > .card > .card-footer{
        border-top: 1px solid #f8f8f8;
        background: #fff;
    }
    #menu_vote .col-lg-4 > .card{
        box-shadow: 0 0 1px rgb(197, 197, 197);
        border: none;
        transition: 0.1s;
    }
    #menu_vote .col-lg-4 > .card:hover{
        border-radius: 15px;
    }
</style>

@endsection
@section('modal')
<div class="modal fade" id="to_vote" tabindex="-1" aria-labelledby="to_votelabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ url('home') }}" class="modal-content" id="form_check">
            @method('PUT')
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="to_votelabel">ยืนยันการลงคะแนน <span id="choose"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-body-vote">
            ...
            </div>
            <div class="modal-footer">
                <input type="hidden" name="uvote_user_id" value="{{@Auth::user()->id}}">
                <input type="hidden" name="uvote_choose" id="uvote_choose">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                <button type="submit" class="btn btn-success">ยืนยัน</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="to_login" tabindex="-1" aria-labelledby="to_loginlabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="to_loginlabel">แจ้งเตือน</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <label for="" class="text-danger">การลงคะแนนโหวด จำเป็นต้องเป็นผู้ใช้งานในระบบ</label>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
          <a href="{{('login')}}" class="btn btn-primary">ไปยัง Login</a>
        </div>
      </div>
    </div>
</div>
@endsection
@section('content')
<div class="row m-0">
    <div class="col-xl-2"></div>
    <div class="col-xl">
        <div class="row" id="menu_vote">
            @foreach ($vote as $v)
                <div class="col-lg-4 mt-3">
                    <div class="card">
                        <div class="card-body pr-0">
                            <h5>{{$v->vote_title}}</h5>
                            <div class="data-list" id="data{{$v->vote_id}}">
                                &emsp;{{$v->vote_detail}}
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row m-0">
                                <div class="col text-center"><b class="text-success">{{get_point($v->vote_id,1)}}</b></div>
                                <div class="col text-center"><b class="text-danger">{{get_point($v->vote_id,2)}}</b></div>
                            </div>
                            <div class="row m-0">
                                @if(@Auth::user()->type==99)
                                    <div class="col"><button class="btn btn-sm call-vote btn-success w-100" data-id="{{$v->vote_id}}" data-event="agree" data-bs-toggle="modal" data-bs-target="#to_vote">เห็นด้วย {{check_select($v->vote_id,@Auth::user()->id,1)}}</button> </div>
                                    <div class="col"><button class="btn btn-sm call-vote btn-danger w-100"  data-id="{{$v->vote_id}}" data-event="disagree" data-bs-toggle="modal" data-bs-target="#to_vote">ไม่เห็นด้วย  {{check_select($v->vote_id,@Auth::user()->id,2)}}</button> </div>
                                @elseif(@Auth::user()->type==1)
                                    <div class="col"><a href="{{('vote')}}/{{$v->vote_id}}" class="btn btn-sm btn-primary w-100">ดูสรุปผลของโหวดนี้</a> </div>
                                @else
                                    <div class="col"><button class="btn btn-sm btn-success w-100" data-bs-toggle="modal" data-bs-target="#to_login">เห็นด้วย</button> </div>
                                    <div class="col"><button class="btn btn-sm btn-danger w-100"  data-bs-toggle="modal" data-bs-target="#to_login">ไม่เห็นด้วย</button> </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-xl-2"></div>
</div>
@endsection
@section('script')
<script>
    $(".call-vote").on('click',function(){
        var vote = $(this).attr('data-event')
        var id   = $(this).attr('data-id')
        var wording = $("#data"+id).html();
        var url = "{{url('home')}}/"+id
        if(vote=='agree'){
            $("#uvote_choose").val(1)
            $("#choose").html("<b class='text-success'>( เห็นด้วย )</b>")
        }else if(vote=='disagree'){
            $("#uvote_choose").val(2)
            $("#choose").html("<b class='text-danger'>( ไม่เห็นด้วย )</b>")
        }
        $("#form_check").attr('action',url)
        $(".modal-body-vote").html(wording+"<br><small class='text-danger'>!! หากเคยลงคะแนนไปแล้วจะเป็นการเปลี่ยนแปลงการโหวด !!</small>");
    })
</script>
@endsection
