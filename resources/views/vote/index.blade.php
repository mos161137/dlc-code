@extends('layouts.all')
@section('style')

<style>
.data-table tr td:nth-child(3){width: 40%;}
</style>
@endsection
@section('modal')
@endsection
@section('content')
<div class="row m-0">
    <div class="col-xl"></div>
    <div class="col-xl-9">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-vote">
                    <div class="card-body">
                        <table class="table table-striped data-table">
                            <tr>
                                <th class="text-center">#</th>
                                <th>หัวข้อโหวด</th>
                                <th>รายละเอียด</th>
                                <th class="text-center">คะแนนเห็นด้วย</th>
                                <th class="text-center">คะแนนไม่เห็นด้วย</th>
                                <th class="text-center">Status</th>
                                @if(Auth::user()->type==1)
                                    <th class="text-center">จัดการ</th>
                                @endif
                            </tr>
                            @foreach ($vote as $v)
                                <tr>
                                    <td class="text-center">{{$v->vote_id}}</td>
                                    <td>{{$v->vote_title}}</td>
                                    <td>{{$v->vote_detail}}</td>
                                    <td class="text-center">{{get_point($v->vote_id,1)}}</td>
                                    <td class="text-center">{{get_point($v->vote_id,2)}}</td>
                                    <td class="text-center">@if($v->vote_status==0) <b class="text-success">ON</b> @else <b class="text-danger">OFF</b> @endif</td>
                                    @if(Auth::user()->type==1)
                                        <td class="text-center"><a href="{{url('vote')}}/{{$v->vote_id}}/edit" class="btn btn-warning">SET</a></td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl"></div>
</div>
@endsection
@section('script')

@endsection
