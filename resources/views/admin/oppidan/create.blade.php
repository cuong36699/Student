@extends('../layouts/teamplade')
@section('content')
<div class="form-horizontal">
	{!! Form::open(array('url' => 'admin/oppidan', 'method' => 'post', 'data-parsley-validate' => '')) !!}
	{!! Form::hidden('idsv', $id_sv, []) !!}
	<div class="container col-md-12">
		<div class="breadcrumbs">
			<div class="col-sm-6 row">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li><a href="{{ route('student.index') }}">{{ trans('oppidan/create.nt_st') }}</a></li>
							<li><a href="{{ route('student.show',$name_student->id) }}">{{ trans('oppidan/create.nt_sst') }}</a></li>
							<li class="active">[{{ trans('oppidan/create.nt_opi') }}]</li>
						</ol>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="pull-right">
					<div class="input-group notify">
						<a class="btn btn-warning button botron" href="{{ route('student.show',$name_student->id) }}"><i class="fa fa-arrow-left"></i></a>	
					</div>
				</div>
			</div>
		</div>
	<div class="khung">
			<br>
			<h3 class="h3info">{{ trans('oppidan/create.st_infoOppidan') }}
				<p>[{{$name_student['full_name']}}]</p>
			</h3>
			<hr>
			<div class="col-md-7">
				<div class="form-group row">
				{!! Form::label('', trans('oppidan/create.st_address'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-md-9 {{ $errors->has('address') ? 'has-error' : '' }}">
					{!! Form::text('address',
					 	null, [
					 	'class' => 'form-control',
					 	'required' => '',
					 	'maxlength' => '30',
					 	'placeholder' => 'address',
					 	'data-parsley-maxleght' => '30',
					 	'data-parsley-trigger' => 'change focusout',
					 	'data-parsley-minlength' => '1',
					]) !!}
					<span class="text-danger">{{ $errors ->first('address') }}</span>
				</div>
				</div>

				<div class="form-group row">
				{!! Form::label('', trans('oppidan/create.st_street'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-md-9 {{ $errors->has('street') ? 'has-error' : '' }}">
					{!! Form::text('street',
					 	null, [
					 	'class' => 'form-control',
					 	'required' => '',
					 	'maxlength' => '30',
					 	'placeholder' => 'street',
					 	'data-parsley-maxleght' => '30',
					 	'data-parsley-trigger' => 'change focusout',
					 	'data-parsley-minlength' => '1',
					]) !!}
					<span class="text-danger">{{ $errors ->first('street') }}</span>
				</div>
				</div>

				<div class="form-group row">
				{!! Form::label('', trans('oppidan/create.st_city'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-md-9 {{ $errors->has('city') ? 'has-error' : '' }}">
					{!! Form::text('city',
					 	null, [
					 	'class' => 'form-control',
					 	'required' => '',
					 	'maxlength' => '30',
					 	'placeholder' => 'city',
					 	'data-parsley-maxleght' => '30',
					 	'data-parsley-trigger' => 'change focusout',
					 	'data-parsley-minlength' => '1',
					]) !!}
					<span class="text-danger">{{ $errors ->first('city') }}</span>
				</div>
			</div>
			
			<div class="form-group row">
				{!! Form::label('', trans('oppidan/create.st_ward'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-md-9 {{ $errors->has('ward') ? 'has-error' : '' }}">
					{!! Form::text('ward',
					 	null, [
					 	'class' => 'form-control',
					 	'required' => '',
					 	'maxlength' => '30',
					 	'placeholder' => 'Ward',
					 	'data-parsley-maxleght' => '30',
					 	'data-parsley-trigger' => 'change focusout',
					 	'data-parsley-minlength' => '1',
					]) !!}
					<span class="text-danger">{{ $errors ->first('ward') }}</span>
				</div>
			</div>
			<div class="form-group row">
				{!! Form::label('', trans('oppidan/create.st_confirm'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-sm-9 {{ $errors->has('status') ? 'has-error' : '' }} chu20">
					{!! Form::label('', trans('oppidan/create.st_confirmed'), ['class' =>'control-label']) !!}
					{!! Form::radio('status', 1, ['class'=>'form-control','checked'=>'true', 'required' => '']) !!}
					{{--  --}}
					{!! Form::label('',  trans('oppidan/create.st_confirmnot'), ['class' =>'control-label']) !!}
					{!! Form::radio('status', 0,  ['class'=>'form-control', 'required' => '']) !!}
					<span class="text-danger">{{ $errors ->first('status') }}</span>
				</div>
			</div>

		</div>
			<div class="col-md-5">
				<div class="form-group">
   					 <iframe src="https://	www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3224.535008216497!2d108.21957545526897!3d16.032246482925647!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314218389cf02c2b%3A0xbdc63233587e2d88!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyDEkMO0bmcgw4E!5e0!3m2!1svi!2s!4v1525291038798" width="100%" height="350" frameborder="0" style="border:0" 	allowfullscreen></iframe>
  				</div>
			</div>
			
			<div class="form-group">
				<br>
				<h3 class="h3info">
					{{ trans('oppidan/create.st_infoLandlord') }}
				</h3>
				<hr>
				<div class="form-group row">
				{!! Form::label('', trans('oppidan/create.st_name'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-md-9 {{ $errors->has('full_name') ? 'has-error' : '' }}">
					{!! Form::text('full_name',
					 	null, [
					 	'class' => 'form-control',
					 	'required' => '',
					 	'maxlength' => '50',
					 	'placeholder' => trans('student/create.st_fName'),
					 	'data-parsley-maxleght' => '50',
					 	'data-parsley-trigger' => 'change focusout',
					 	'data-parsley-minlength' => '1',
					]) !!}
					<span class="text-danger">{{ $errors ->first('full_name') }}</span>
				</div>
				</div>
				<div class="form-group row">
				{!! Form::label('', trans('oppidan/create.st_gender'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-sm-9 {{ $errors->has('gender') ? 'has-error' : '' }} chu20">
					{!! Form::label('', trans('oppidan/create.st_male'), ['class' =>'control-label']) !!}
					{!! Form::radio('gender', 1, ['class'=>'form-control','checked'=>'true', 'required' => '']) !!}
					{{--  --}}
					{!! Form::label('', trans('oppidan/create.st_female'), ['class' =>'control-label']) !!}
					{!! Form::radio('gender', 0,  ['class'=>'form-control', 'required' => '']) !!}
					<span class="text-danger">{{ $errors ->first('gender') }}</span>
				</div>
			</div>
			<div class="form-group row">
				{!! Form::label('', trans('oppidan/create.st_phone'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-sm-9 {{ $errors->has('phone') ? 'has-error' : '' }}">
					{!! Form::text('phone',
					 	null, [
					 	'class' => 'form-control',
					 	'required' => '',
					 	'placeholder' => trans('student/create.st_phone'),
					 	'pattern' => '\d*',
					 	'maxlength' => '11',
					 	'data-parsley-trigger' => 'change focusout',
					 	'data-parsley-minlength' => '9',
					 	'data-parsley-maxlength' => '11',
					 ]) !!}
					<span class="text-danger">{{ $errors ->first('phone') }}</span>
				</div>
			</div>
			<div class="form-group row">
				{!! Form::label('', trans('oppidan/create.st_identity'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-sm-9 {{ $errors->has('identity') ? 'has-error' : '' }}">
					{!! Form::text('identity',
					 	null, [
					 	'class' => 'form-control',
					 	'required' => '',
					 	'placeholder' => 'identity',
					 	'pattern' => '\d*',
					 	'maxlength' => '9',
					 	'data-parsley-trigger' => 'change focusout',
					 	'data-parsley-minlength' => '2',
					 	'data-parsley-maxlength' => '9',
					 ]) !!}
					<span class="text-danger">{{ $errors ->first('identity') }}</span>
				</div>
			</div>
			<div class="form-group row">
				{!! Form::label('', trans('oppidan/create.st_birthday'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-sm-9 {{ $errors->has('birthday') ? 'has-error' : '' }}">
					{!! Form::date('birthday',
					 	null, [
					 	'class' => 'form-control',
					 	'required' => '',
					 	'placeholder' => trans('student/create.st_birthday'),
					 	'min' => '1800-01-01',
					 	'data-parsley-trigger' => 'change focusout',
					 	'max' => '2018-12-31',
					 ]) !!}
					<span class="text-danger">{{ $errors ->first('birthday') }}</span>
				</div>
			</div>
			</div>
	</div>
				
		<br>
		{{-- button --}}
		<div class="form-group benphai">
			<div class="col-md-3">
				<button class="btn btn-primary button botron" type="submit">{{ trans('oppidan/create.bt_create') }} 
					<i class="fa fa-check"></i>
				</button>
			</div>
		</div>
		<div class="form-group benphai">
			<div class="col-md-3">
				<a class="btn btn-warning button botron" href="{{ route('student.show',$name_student->id) }}">
					{{ trans('oppidan/create.bt_back') }} 
					<i class="fa fa-arrow-left"></i>
				</a>	
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}
@endsection