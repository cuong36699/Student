@extends('../layouts/teamplade')
@section('content')
{!! Form::open(array('url' => 'student', 'method' => 'post', 'files' => true, 'enctype' => 'multipart/form-data')) !!}
<div class="form-horizontal">
	<div class=" container">
		<div class="breadcrumbs">
			<div class="col-sm-6 row">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li>
								<a href="{{ route('student.index') }}">{{ trans('student/create.student') }}</a>
							</li>
							<li class="active">
								[{{ trans('student/create.s_create') }}]
							</li>
						</ol>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="pull-right">
					<div class="input-group notify">
						<a class="btn btn-warning button botron" href="{{ route('student.index') }}">
							{{ trans('student/create.bt_back') }} 
							<i class="fa fa-arrow-left"></i>
						</a>	
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 khung">	
			<br>
			<h3 class="h3info">{{ trans('student/create.st_infostudent') }}</h3>
			<hr>
			{{-- thông tin sv --}}
			<div class="form-group row">
				{!! Form::label('', trans('student/create.st_avatar'), ['class' => 'col-md-4 control-label fontchu']) !!}
				<div class="col-md-12 {{ $errors->has('avatar') ? 'has-error' : '' }}">
					<div class="col-md-7 row">
						{!! Form::file('avatar', array('class' => 'form-control file_name','onchange'=>'ShowPreview(this)')) !!}
						<span class="text chudo">{{ $errors ->first('avatar') }}</span>
					</div>
					{{-- image load form --}}
					<div class="col-md-4 khungimage">
						<img id="impPrev" alt={{ trans('student/create.st_avatarborder') }} class="img-rounded" width="150" height="148" src="{{ asset('hinhanh/default-user-image.png') }}"> 
					</div>
				</div>
			</div>
			<div class="form-group row">
				{!! Form::label('', trans('student/create.st_fName'), ['class' => 'col-md-5 control-label fontchu']) !!}
				<div class="col-md-12 {{ $errors->has('full_name') ? 'has-error' : '' }}">
					{!! Form::text('full_name', '', ['class' => 'form-control']) !!}
					<span class="text chudo">{{ $errors ->first('full_name') }}</span>
				</div>
			</div>
			<div class="form-group row">
				{!! Form::label('', trans('student/create.st_gender'), ['class' => 'col-md-5 control-label fontchu']) !!}
				<div class="col-sm-12 {{ $errors->has('gender') ? 'has-error' : '' }} fontchitiet">
					{!! Form::label('', trans('student/create.st_male'), ['class' =>'control-label']) !!}
					{!! Form::radio('gender', 1, ['class'=>'form-control','checked'=>'true']) !!}
					{{--  --}}
					{!! Form::label('', trans('student/create.st_female'), ['class' =>'control-label']) !!}
					{!! Form::radio('gender', 0,  ['class'=>'form-control']) !!}
					<span class="text chudo">{{ $errors ->first('gender') }}</span>
				</div>
			</div>
			<div class="form-group row">
				{!! Form::label('', trans('student/create.st_birthday'), ['class' => 'col-md-5 control-label fontchu']) !!}
				<div class="col-sm-12 {{ $errors->has('birthday') ? 'has-error' : '' }}">
					{!! Form::date('birthday', '', ['class' => 'form-control']) !!}
					<span class="text chudo">{{ $errors ->first('birthday') }}</span>
				</div>
			</div>
			<div class="form-group row">
				{!! Form::label('', trans('student/create.st_identity'), ['class' => 'col-md-5 control-label fontchu']) !!}
				<div class="col-sm-12 {{ $errors->has('identity') ? 'has-error' : '' }}">
					{!! Form::text('identity', '', ['class' => 'form-control']) !!}
					<span class="text chudo">{{ $errors ->first('identity') }}</span>
				</div>
			</div>
			<div class="form-group row">
				{!! Form::label('', trans('student/create.st_phone'), ['class' => 'col-md-5 control-label fontchu']) !!}
				<div class="col-sm-12 {{ $errors->has('phone') ? 'has-error' : '' }}">
					{!! Form::text('phone', '', ['class' => 'form-control'])
					!!}
					<span class="text chudo">{{ $errors ->first('phone') }}</span>
				</div>
			</div>

			<div class="form-group row">
				{!! Form::label('', trans('student/create.st_email'), ['class' => 'col-md-5 control-label fontchu']) !!}
				<div class="col-sm-12 {{ $errors->has('email') ? 'has-error' : '' }}">
					<div class="input-group">
						{!! Form::text('email', '', ['class' => 'form-control','aria-describedby'=>'basic-addon2'])
						!!}
						<span class="input-group-addon" id="basic-addon2">@gmail.com</span>
					</div>
					<span class="text chudo">{{ $errors ->first('email') }}</span>
				</div>
			</div>
			<div class="form-group row">
				{!! Form::label('', trans('student/create.st_homeTown'), ['class' => 'col-md-5 control-label fontchu']) !!}
				<div class="col-sm-12 {{ $errors->has('home_town') ? 'has-error' : '' }}">
					{!! Form::text('home_town', '', ['class' => 'form-control'])
					!!}
					<span class="text chudo">{{ $errors ->first('home_town') }}</span>
				</div>
			</div>
			<div class="form-group row">
				{!! Form::label('', trans('student/create.st_nation'), ['class' => 'col-md-5 control-label fontchu']) !!}
				<div class="col-sm-12 {{ $errors->has('nation') ? 'has-error' : '' }}">
					{!! Form::text('nation', '', ['class' => 'form-control'])
					!!}
					<span class="text chudo">{{ $errors ->first('nation') }}</span>
				</div>
			</div>
			<div class="form-group row">
				{!! Form::label('', trans('student/create.st_religion'), ['class' => 'col-md-5 control-label fontchu']) !!}
				<div class="col-sm-12 {{ $errors->has('religion') ? 'has-error' : '' }}">
					{!! Form::text('religion', '', ['class' => 'form-control'])
					!!}
					<span class="text chudo">{{ $errors ->first('religion') }}</span>
				</div>
			</div>
			{{-- khoa --}}
			<div class="form-group row">
				{!! Form::label('', trans('student/create.st_department'), ['class' => 'col-md-5 control-label fontchu']) !!}
				<div class="col-sm-12 {{ $errors->has('deparment') ? 'has-error' : '' }}">
					{!! Form::select('deparment', [ '' => trans('student/create.st_select') ] + $deparments, null, 
						['class' => 'form-control', 'id' => 'department']) 
						!!}
						<span class="text chudo">{{ $errors ->first('deparment') }}</span>
					</div>
				</div>
				{{-- lớp --}}
				<div class="form-group row">
					{!! Form::label('', trans('student/create.st_course'), ['class' => 'col-md-5 control-label fontchu']) !!}
					<div class="col-sm-12 {{ $errors->has('deparment') ? 'has-error' : '' }}">
						<select class="form-control" name="course_name">
							<option value="">{{ trans('student/create.st_select') }}</option>
						</select>
						<span class="text chudo">{{ $errors ->first('course_name') }}</span>
					</div>
				</div>
			</div>
			{{-- ngoại trú --}}
			<div class="col-md-6 khung">
				@include('student.member.create')
			</div>
			{{-- thường trú --}}
			<div class="col-md-6 khung">
				@include('student.risident.create')
			</div> 
		</div>
		{{-- button --}}
		<div class="form-group benphai">
			<div class="col-md-2">
				<button class="btn btn-primary button botron" type="submit">{{ trans('student/create.bt_create') }} <i class="fa fa-check"></i></button>
			</div>
		</div>
		<div class="form-group benphai">
			<div class="col-md-2">
				<a class="btn btn-warning button botron" href="{{ route('student.index') }}">{{ trans('student/create.bt_back') }} <i class="fa fa-arrow-left"></i></a>	
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}
@endsection

