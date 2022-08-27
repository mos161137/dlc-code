@extends('layouts.all')
@section('style')
<style>
    a:link { text-decoration: none; }
    a:visited { text-decoration: none; }
    a:hover { text-decoration: none; }
    a:active { text-decoration: none; }
</style>
@endsection
@section('modal')
@endsection
@section('content')
<div class="row m-0">
    <div class="col-xl-2"></div>
    <div class="col-xl">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-vote">
                    <div class="card-body">
                        <b><a href="{{ url()->previous() }}" class="text-dark"><- กลับ</a></b>
                        <h4 class="text-dlc-header">จัดการ Vote</h4>
                        <input type="text" name="vote_title" class="form-control text-dlc mt-3" placeholder="หัวข้อ" readonly value="{{@$vote->vote_title}}">
                        <textarea name="vote_detail" rows="3" class="form-control text-dlc mt-3" placeholder="เนื้อหาในการ Vote" readonly>{{@$vote->vote_detail}}</textarea>
                        <div class="row m-0">
                            <div class="col-lg-auto mt-3">
                                @if($vote->vote_status===0) <b class="text-success">ON</b> @else <b class="text-danger">OFF</b> @endif
                            </div>
                            <div class="col-lg"></div>
                            <div class="col-lg-3 mt-3">
                                <table class="table table-bordered">
                                    <tr>
                                        <td class="text-center">เห็นด้วย</td>
                                        <td class="text-center">ไม่เห็นด้วย</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><b class="text-success">{{get_point($vote->vote_id,1)}}</b></td>
                                        <td class="text-center"><b class="text-danger">{{get_point($vote->vote_id,2)}}</b></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2"></div>
</div>
@endsection
@section('script')

@endsection
