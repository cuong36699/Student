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
        <link rel="stylesheet" type="text/css" href="{{ asset('css/cssFontend/styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/cssFontend/viewcss.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/cssFontend/csschinh.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/cssFontend/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/cssTeamplade/assets/css/flag-icon.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/cssTeamplade/assets/css/font-awesome.min.css') }}">
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
                <a style="color: #fff" href="{{ url('trangchu') }}" title="">Trang chủ</a>
                <a  class="menutoggle pull-left">
                    <i><img class="w3-spin" src="{{ asset('hinhanh/onlyhoa.png') }}"  width="42" height="42"></i>             
                </a> 
            </div>
            <div style="background-color: black" class="menu">
                <ul>
                    <li><a href="{{ url('wed/course', Auth::id()) }}">Thông tin lớp</a></li>
                    <li><a href="{{ route('wed.show', Auth::id()) }}">Thông tin riêng</a></li>
                    @guest
                        <li>
                            <a href="{{ route('login') }}">
                                Đăng nhập
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
                                <div style="margin-left: 50px; text-align: center;" class="dropdown-menu" aria-labelledby="language">
                                    @if (config('app.locale') == 'vi')
                                        <a href="{!! route('user.change-language', ['en']) !!}">
                                            <span class="flag-icon flag-icon-us"></span>
                                            <b style="color: red">[ American ]</b>
                                        </a>
                                    @else
                                        <a href="{!! route('user.change-language', ['vi']) !!}">
                                            <span class="flag-icon flag-icon-vn"></span>
                                            <b style="color: red">[ Việt nam ]</b>
                                        </a>
                                       
                                    @endif
                                </div>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    Đăng xuất
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
                <b> © 2018, Sinh viên, Quản lý ngoại trú </b>
            </div>
            <div class="col-md-6">
                <b> <a href="#">Sinh viên ngoại trú</a> | <a  href="">Web Design & Development by Cường</a></b>
            </div>
        </footer>
    </body>
    {{-- scrip --}}
    <script type="text/javascript" src="{{ asset('js/fontend/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/fontend/bootstrap.min.js') }}" ></script>
    {{-- flash time out --}}
    {{-- ontop --}}
    <script src="{{ asset('js/fontend/ontop.js') }}"></script>
    <script src="{{ asset('js/fontend/dycalendar.js') }}"></script>
    <script src="{{ asset('js/fontend/settimeout.js') }}"></script>
</html>
