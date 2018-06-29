<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Title --}}
    <title>@yield('title', trans('layout/text.st_student') )</title>
    {{-- js cs template --}}
    <link rel="stylesheet" href="{{ asset('css/cssTeamplade/assets/css/lib/vector-map/jqvmap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cssTeamplade/assets/css/normalize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cssTeamplade/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cssTeamplade/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cssTeamplade/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cssTeamplade/assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cssTeamplade/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cssTeamplade/assets/scss/style.css') }}">
    {{-- css view admin --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cssBackend/cssviewadmin.css') }}">
    {{-- css loading --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cssBackend/loading.css') }}">
    {{-- validate parsley--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cssBackend/parsley.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
    {{-- button on top --}}
    <button onclick="topFunction()" id="myBtn" title="Go to top">
        Top
        <i class="fa fa-angle-double-up"></i>
    </button>
    {{-- Left Panel --}}
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                {{-- lo go 1 --}}
                <a class="navbar-brand" href="{{ url('student') }}">
                    {{ trans('layout/text.st_op') }}
                </a>
                {{-- lo go 2  --}}
                <a class="navbar-brand hidden" href="./">
                    <img src="{{ asset('images/logo2.png') }}" alt="Logo">
                </a>
            </div>
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <h3 class="menu-title">
                        {{ trans('layout/text.st_ts') }}
                    </h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="">{{ trans('layout/text.st_info') }}</i>
                        </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li>
                                <i class="fa fa-bars"></i>
                                <a href="{{ route('student.index') }}">{{ trans('layout/text.st_student') }}</a>
                            </li>
                            <li>
                                <i class="fa fa-bars"></i>
                                <a href="{{ route('department.index') }}">{{ trans('layout/text.st_department') }}</a>
                            </li>
                            <li>
                                <i class="fa fa-bars"></i>
                                <a href="{{ route('course.index') }}">{{ trans('layout/text.st_course') }}</a>
                            </li>
                        </ul>
                    </li>
                    <h3 class="menu-title">
                        {{ trans('layout/text.st_wStudent') }}
                    </h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="">{{ trans('layout/text.st_work') }}</i>
                        </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li>
                                <i class="fa fa-id-badge"></i>
                                <a href="{{ url('student/create') }}">{{ trans('layout/text.st_workS') }}</a>
                            </li>
                            <li>
                                <i class="fa fa-id-badge"></i>
                                <a href="{{ asset('department/create') }}">{{ trans('layout/text.st_workDp') }}</a>
                            </li>
                            <li>
                                <i class="fa fa-id-badge"></i>
                                <a href="{{ asset('course/create') }}">{{ trans('layout/text.st_workC') }}</a>
                            </li> 
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>
    <div id="right-panel" class="right-panel">
        {{-- Header --}}
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left">
                        <i>
                            <img class="w3-spin" src="{{ asset('hinhanh/onlyhoa.png') }}"  width="42" height="42">    
                        </i>
                    </a>
                    <div class="header-left">
                        {{--  --}}
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        {{-- admin --}}
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{ asset('images/admin.jpg') }}" alt="User Avatar">
                            <i class="fa fa-angle-double-down"></i>
                        </a>
                        {{-- drow admin --}}
                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>
                            <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications<span class="count">13</span></a>
                            <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>
                            <a class="nav-link" href="#"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>
                    {{-- Language --}}
                    <div class="language-select dropdown" id="language-select">
                        <a  class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <p>
                                @if (config('app.locale') == 'vi')
                                Ngôn ngữ
                                <span class="flag-icon flag-icon-vn"></span>
                                @else
                                Language
                                <span class="flag-icon flag-icon-us"></span>
                                @endif
                            </p>
                        </a>
                        <div class="dropdown-menu col-md-12" aria-labelledby="language">
                            @if (config('app.locale') == 'vi')
                            <a href="{!! route('user.change-language', ['vi']) !!}">
                                <p>
                                    <span class="flag-icon flag-icon-vn"></span>
                                    Việt
                                </p>
                            </a>
                            <a href="{!! route('user.change-language', ['en']) !!}">
                                <p>
                                    <span class="flag-icon flag-icon-us"></span>
                                    Mỹ
                                </p>
                            </a>   
                            @else
                            <a href="{!! route('user.change-language', ['vi']) !!}">
                                <p>
                                    <span class="flag-icon flag-icon-vn"></span>
                                    Vietnam
                                </p>
                            </a>
                            <a href="{!! route('user.change-language', ['en']) !!}">
                                <p>
                                    <span class="flag-icon flag-icon-us"></span>
                                    US-UK
                                </p>
                            </a>   
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </header>
        {{-- content --}}
        <div class="content mt-3">
            <div class="col-sm-12">
                {{-- thông báo thành công --}}
                @if (session('ketqua'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">
                        Thông báo
                    </span>
                    {!! session('ketqua') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">
                            &times;
                        </span>
                    </button>
                    @foreach ($errors->all() as $err)
                    {!! $err !!}
                    @endforeach
                </div>
                @endif
                {{-- Nội dung --}}
                @yield('css')
                {!!csrf_field()!!}
                @yield('content')
                {{-- thu vien ajax paging --}}
                <script src="{{ asset('js/backend/jqueryAjax.min.js') }}"></script>
                @yield('js')
            </div>
        </div>
    </div>
    {{-- js paging --}}
    <script src="{{ asset('js/backend/ajaxcrud.js') }}"></script>
    {{-- thu vien ajax select --}}
    <script src="{{ asset('js/backend/jquerySelectAjax.min.js') }}"></script>
    {{-- select ajax --}}
    <script src="{{ asset('js/backend/selectajaxs.js') }}" type="text/javascript"></script>
    {{-- js them --}}
    <script src="{{ asset('js/backend/memberappends.js') }}"></script>
    <script src="{{ asset('js/backend/jquery.js') }}"></script>
    <script src="{{ asset('js/backend/parsleys.js') }}"></script>
    @if (config('app.locale') == 'vi')
        <script src="{{ asset('js/backend/vi.js') }}"></script>
    @else
        <script src="{{ asset('js/backend/en.js') }}"></script>
    @endif
    <script src="{{ asset('js/backend/bootstrap.js') }}"></script>
    {{-- loadimage --}}
    <script src="{{ asset('js/backend/loadimage.js') }}"></script> 
    {{-- ontop --}}
    <script src="{{ asset('js/backend/ontop.js') }}"></script>
    {{-- flash time out --}}
    <script src="{{ asset('js/backend/settimeout.js') }}"></script>
    {{-- ckeditor --}}
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    {{-- jv - jq template--}}
    <script src="{{ asset('js/teamplade/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('js/teamplade/popper.min.js') }}"></script>
    <script src="{{ asset('js/teamplade/plugins.js') }}"></script>
    <script src="{{ asset('js/teamplade/main.js') }}"></script>
</body>
</html>
