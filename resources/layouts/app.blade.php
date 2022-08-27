<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home - BETTER | มิติใหม่ของการเลือกซื้อประกัน</title>
    <link rel="icon" href="{{url('')}}/public/images/2222.png" type="image/gif" sizes="16x16">
    <link href="{{url('')}}/public/bootstrap-5/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    {{-- <link href="{{url('')}}/public/css/admin/layout.css" rel="stylesheet" type="text/css" /> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
    *{
        font-family: 'Kanit', sans-serif;
    }

    body,.bg-sc{
        background: rgb(248, 248, 248);
    }

    nav ul{
        list-style:none;
        display:flex;
        justify-content:space-between;
        align-items:center;
    }

    nav ul li a{
        color:white;
        text-decoration: none;
        position: relative;
        padding: 10px 0;
        transition: 0.2s;
        display:flex;
        font-weight: 500;

    }

    ul li a:hover{
        color: #20bda0 !important;
    }
    ul li a::before{
        content: "";
        position: absolute;
        height: 2px;
        top: 100%;
        width: 100%;
        background:#3bd8bb;
        transform-origin: bottom;
        transform: scaleX(0);
        transition: transform 0.2s;
        border-radius:2px;
    }
    ul li a:hover::before{
        transform: scaleX(1);
    }
  .navbar-nav {
        display: inline-flex;
        flex-direction: inherit;
    }
    ul li{
        padding: 0.2em 1em;
    }
    .navbar-light{
        background: #fff !important;
        padding: 0.5em 0em;
        position: fixed;
        width: 100%;
        box-shadow: 0px 1px 4px #e3dede;
        z-index: 100;
    }
    .cn{
        align-items: center;
    }
    .item-right{
        text-align-last: right;
    }
    .logo{
        width: 180px;
        height: 70px;
    }

    .text-right{
        text-align: right;
    }
    .menu-call .col-2,.menu-call .col-4{
        color: gray;
        font-weight: 200;
        font-size: small;
    }
    .menu-pr-2{padding-right: 2em;text-align: right;}
    .navbar-light .navbar-nav .nav-link.active, .navbar-light .navbar-nav .show>.nav-link {
        color: #3bd8bb;
    }
    .contents{
        padding: 1em;
        width: 100%;
        position: absolute;
        margin-top: 9em !important;
    }
    .menu-call{
        padding-bottom: 0.5em;
    }
    .vtcb{
        vertical-align: bottom !important;
    }
    @media (max-width: 1199px) {
        .menu-call{
            padding: 1em 0em;
        }
        .menu-call .col-xl-2,.menu-call .col-xl-4{
            text-align: center;
        }
        .menu-pr-2{
            text-align: center;
        }
        .menu-sub-top .col-xl-2,.menu-sub-top .col-xl-4{
            text-align: center;
        }
        .item-right{
            text-align-last: center;
        }
        .contents{
            margin-top: 15em !important;
        }
    }
    .table-responsive-xl th,.table-responsive-xl td{
        white-space: nowrap;
    }
    </style>
    @yield('style')
</head>
<body>
    <nav class="navbar-light bg-light justify-content-between">
        <div class="row m-0 border-bottom cn menu-call">
            <div class="col-xl-2"></div>
            <div class="col-xl-2"><i class="fa fa-phone" aria-hidden="true"></i> Call Center : 062-671-4554</div>
            <div class="col-xl-2"></div>
            <div class="col-xl-4 menu-pr-2"><i class="fa fa-envelope-o" aria-hidden="true"></i> info@bettersure.co</div>
            <div class="col-xl-2"></div>
        </div>
        <div class="row m-0 cn menu-sub-top">
            <div class="col-xl-2"></div>
            <div class="col-xl-2"><a class="navbar-brand"><img src="{{url('')}}/public/images/LOGO-3.jpg" class="logo"></a></div>
            <div class="col-xl-2"></div>
            <div class="col-xl-4 item-right">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link pb-0 pt-0 @if(Request::segment(1) == "insurance" && Request::segment(2) == "create") active @endif" href="{{url('insurance/create')}}">สร้างใบเสนอขาย</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pb-0 pt-0 @if(Request::segment(1) == "home") active @endif" href="{{url('home')}}">ใบเสนอขาย</a>
                    </li>
                    @if(Auth::user()->type==99)
                    <li class="nav-item">
                        <a class="nav-link pb-0 pt-0 @if(Request::segment(1) == "users") active @endif" href="{{url('users')}}">ผู้ใช้งาน</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pb-0 pt-0 @if(Request::segment(1) == "insurance"&& Request::segment(2) != "create") active @endif" href="{{url('insurance')}}">แบบประกัน</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pb-0 pt-0 @if(Request::segment(1) == "customers") active @endif" href="{{url('customers')}}">ข้อมูลลูกค้า</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link pb-0 pt-0" href="{{ route('logout') }}" onclick="   event.preventDefault(); document.getElementById('logout-form').submit();">ออกจากระบบ</a>
                        <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            <div class="col-xl-2"></div>
        </div>
    </nav>
    <div class="contents">
        @yield('modal')
        @yield('content')
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="{{url('')}}/public/bootstrap-5/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <script src="{{url('')}}/public/bootstrap-5/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script>
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    </script>
    @yield('script')

</body>
</html>
