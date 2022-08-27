@extends('layouts.all')
@section('style')
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
                    <form method="POST" action="{{ url('vote') }}/{{$vote->vote_id}}" class="card-body">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="event" value="edit">
                        <h4 class="text-dlc-header">จัดการ Vote</h4>
                        <input type="text" name="vote_title" class="form-control text-dlc mt-3" placeholder="หัวข้อ" required value="{{@$vote->vote_title}}">
                        <textarea name="vote_detail" rows="3" class="form-control text-dlc mt-3" placeholder="เนื้อหาในการ Vote" required>{{@$vote->vote_detail}}</textarea>
                        <div class="row m-0">
                            <div class="col-lg-auto mt-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="vote_status" type="checkbox" id="vote_status" @if($vote->vote_status===0) checked @endif>
                                    <label class="form-check-label" for="vote_status">การเปิดปิดโหวด</label>
                                </div>
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
                        <button type="submit" class="btn btn-dlc mt-3 float-right">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2"></div>
</div>
@endsection
@section('script')

@endsection
