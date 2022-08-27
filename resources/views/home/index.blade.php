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
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="to_votelabel">ยืนยันการลงคะแนน</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
      </div>
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
            @for ($x=0;$x<=7;$x++)
            <div class="col-lg-4 mt-3">
                <div class="card">
                    <div class="card-body pr-0">
                        <div class="data-list">
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row m-0">
                            @if(@Auth::user()->type==99)
                                <div class="col"><button class="btn btn-sm btn-success w-100" data-id="{{$x}}" data-event="agree" data-bs-toggle="modal" data-bs-target="#to_vote">เห็นด้วย</button> </div>
                                <div class="col"><button class="btn btn-sm btn-danger w-100"  data-id="{{$x}}" data-event="disagree" data-bs-toggle="modal" data-bs-target="#to_vote">ไม่เห็นด้วย</button> </div>
                            @elseif(@Auth::user()->type==1)
                                <div class="col"><a href="{{('vote')}}/{{$x}}" class="btn btn-sm btn-primary w-100">ดูสรุปผลของโหวดนี้</a> </div>
                            @else
                                <div class="col"><button class="btn btn-sm btn-success w-100" data-bs-toggle="modal" data-bs-target="#to_login">เห็นด้วย</button> </div>
                                <div class="col"><button class="btn btn-sm btn-danger w-100"  data-bs-toggle="modal" data-bs-target="#to_login">ไม่เห็นด้วย</button> </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
    <div class="col-xl-2"></div>
</div>
@endsection
@section('script')

@endsection
