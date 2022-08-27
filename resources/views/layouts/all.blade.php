<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home - DLC Code | ลงคะแนนโหวด</title>
    <link rel="icon" href="{{url('')}}/public/images/dlc.png" type="image/gif" sizes="16x16">
    <link href="{{url('')}}/public/bootstrap-5/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
    <link href="{{url('')}}/public/css/layouts.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @yield('style')
</head>
<body>
    <nav class="navbar-light bg-light justify-content-between">
        <div class="row m-0 border-bottom cn menu-call">
            <div class="col-xl-2"></div>
            <div class="col-xl-2"><i class="fa fa-phone" aria-hidden="true"></i> Call Center : 089-759-4424</div>
            <div class="col-xl-2"></div>
            <div class="col-xl-4 menu-pr-2"><i class="fa fa-envelope-o" aria-hidden="true"></i> moss-3055@hotmail.com</div>
            <div class="col-xl-2"></div>
        </div>
        <div class="row m-0 cn menu-sub-top">
            <div class="col-xl-2"></div>
            <div class="col-xl-2"><a class="navbar-brand"><img src="{{url('')}}/public/images/logo.png" class="logo"></a></div>
            <div class="col-xl-2"></div>
            <div class="col-xl-4 item-right">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link pb-0 pt-0 @if(Request::segment(1) == "" || Request::segment(1) == "home") active @endif" href="{{url('')}}">หน้าหลัก</a>
                    </li>
                    @if(isset(Auth::user()->type))
                    @if(Auth::user()->type==99)
                        <li class="nav-item">
                            <a class="nav-link pb-0 pt-0 @if(Request::segment(1) == "vote") active @endif" href="{{url('vote')}}">การลงคะแนน</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pb-0 pt-0 @if(Request::segment(1) == "users" && Request::segment(2)!=null) active @endif" href="{{url('users')}}/{{Auth::user()->id}}">ข้อมูลผู้ใช้งาน</a>
                        </li>
                        @elseif(Auth::user()->type==1)
                        <li class="nav-item">
                            <a class="nav-link pb-0 pt-0 @if(Request::segment(1) == "vote" && Request::segment(2) != "create") active @endif" href="{{url('vote')}}">สรุปการลงคะแนน</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pb-0 pt-0 @if(Request::segment(1) == "vote" && Request::segment(2) == "create") active @endif" href="{{url('vote/create')}}">สร้างโหวด</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pb-0 pt-0 @if(Request::segment(1) == "users") active @endif" href="{{url('users')}}">ผู้ใช้งาน</a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link pb-0 pt-0" href="{{ route('logout') }}" onclick="   event.preventDefault(); document.getElementById('logout-form').submit();">ออกจากระบบ</a>
                            <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link pb-0 pt-0" href="{{url('login')}}">ลงชื่อเข้าใช้</a>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="col-xl-2"></div>
        </div>
    </nav>
    <div class="contents">
        @yield('modal')
        @yield('content')
    </div>

    <script src="{{url('')}}/public/bootstrap-5/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="{{url('')}}/public/bootstrap-5/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <script>
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    </script>
    @yield('script')

</body>
</html>
