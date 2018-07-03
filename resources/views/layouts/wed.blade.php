<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/cssFontend/cssUser.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/cssFontend/viewcss.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/cssFontend/tuychinh.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/cssFontend/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/cssTeamplade/assets/css/flag-icon.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/cssTeamplade/assets/css/font-awesome.min.css') }}">
        {{-- validate parsley--}}
        <link rel="stylesheet" type="text/css" href="{{ asset('css/cssFontend/parsley.css') }}">
    </head>
    <body>
        {{-- button on top --}}
        <button onclick="topFunction()" id="myBtn" title="Go to top">
            Top
            <i class="fa fa-angle-double-up"></i>
        </button>
        <div class="form-group">
            <nav>
            <div id="MyClockDisplay" class="clock"></div>
            <div class="logo">
                <a class="chutrang" href="{{ url('trangchu') }}" title="">{{ trans('layout/wed.nt_home') }}</a>
                <a  class="menutoggle pull-left">
                    <i><img class="w3-spin" src="{{ asset('hinhanh/onlyhoa.png') }}"  width="42" height="42"></i>             
                </a> 
            </div>
            <div class="menu nenden">
                <ul>
                    <li><a href="{{ url('user/wed/course', Auth::id()) }}">{{ trans('layout/wed.nt_course') }}</a></li>
                    <li><a href="{{ route('wed.show', Auth::id()) }}">{{ trans('layout/wed.nt_infos') }}</a></li>
                    @guest
                        <li>
                            <a href="{{ route('login') }}">
                                {{ trans('layout/wed.nt_infos') }}
                            </a>
                        </li>
                    @else
                        <li>
                            <div class="dropdown float-right">
                                <a href="{{ route('wed.index') }}">
                                    {{ Auth::user()->name }}
                                </a>
                                <a  class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                                    @if (config('app.locale') == 'vi')
                                        <span class="flag-icon flag-icon-vn"></span>
                                    @else
                                        <span class="flag-icon flag-icon-us"></span>
                                    @endif
                                </a>
                                <div style="margin-left: 35%; text-align: center;" class="dropdown-menu" aria-labelledby="language">
                                    @if (config('app.locale') == 'vi')
                                        <a href="{!! route('user.change-language', ['en']) !!}">
                                            <span class="flag-icon flag-icon-us"></span>
                                            <b class="chudo">[ American ]</b>
                                        </a>
                                    @else
                                        <a href="{!! route('user.change-language', ['vi']) !!}">
                                            <span class="flag-icon flag-icon-vn"></span>
                                            <b class="chudo">[ Việt nam ]</b>
                                        </a>
                                       
                                    @endif
                                </div>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    {{ trans('layout/wed.nt_out') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </nav>
            <br>
        </div>
        @yield('content')
        <div class="col-md-12">
            <div class="siff">
                {{-- thông báo thành công --}}
                @if (session('ketqua'))
                    <div class="alert alert-success" role="alert">
                        <span>
                            Thông báo <i class="w3-spin fa fa-bell-o"></i>
                        </span>
                        <P class="text-danger">{!! session('ketqua') !!}</P>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"></span>
                        </button>
                        @foreach ($errors->all() as $err)
                            {!! $err !!}
                        @endforeach
                    </div>
                @endif
            </div>   
        </div> 
        {{-- footer --}}
        <footer class="footer">
            <div class="col-md-6">
                <b> © 2018, {{ trans('layout/wed.nt_left') }} </b>
            </div>
            <div class="col-md-6">
                <b> <a href="#">{{ trans('layout/wed.nt_center') }}</a> | <a  href="">{{ trans('layout/wed.nt_right') }}</a></b>
            </div>
        </footer>
    </body>
    {{-- scrip --}}
    <script type="text/javascript" src="{{ asset('js/fontend/jquery.min.js') }}"></script>
    <script src="{{ asset('js/fontend/parsleys.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/fontend/bootstrap.min.js') }}" ></script>
    @if (config('app.locale') == 'vi')
        <script src="{{ asset('js/backend/vi.js') }}"></script>
    @else
        <script src="{{ asset('js/backend/en.js') }}"></script>
    @endif
    {{-- ontop --}}
    <script src="{{ asset('js/fontend/ontop.js') }}"></script>
    <script src="{{ asset('js/fontend/dycalendar.js') }}"></script>
    <script src="{{ asset('js/fontend/settimeout.js') }}"></script>
</html>
