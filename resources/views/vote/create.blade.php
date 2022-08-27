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
                    <form method="POST" action="{{ url('vote') }}" class="card-body">
                        @csrf
                        <h4 class="text-dlc-header">สร้าง Vote</h4>
                        <input type="text" class="form-control text-dlc mt-3" placeholder="หัวข้อ" required>
                        <textarea name="" rows="3" class="form-control text-dlc mt-3" placeholder="เนื้อหาในการ Vote" required></textarea>
                        <button class="btn btn-dlc mt-3 float-right">Create</button>
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
