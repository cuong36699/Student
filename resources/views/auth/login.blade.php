
@extends('layouts.app')
@section('content')
{{-- thông báo thành công --}}
@if (session('ketqua'))
<div class="alert alert-success" role="alert">
    <span >
        Thông báo
    </span>
    <P class="text-danger">{!! session('ketqua') !!}</P>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">
        </span>
    </button>
    @foreach ($errors->all() as $err)
    {!! $err !!}
    @endforeach
</div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Đăng nhập Sinh viên</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            
                            <label for="email" class="col-md-4 control-label">Địa Chỉ E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Mật Khẩu</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Lưu Nhớ
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Xác nhận
                                </button>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Quên mật khẩu ?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
