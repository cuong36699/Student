@extends('../layouts/teamplade')
@section('content')
<div class="form-horizontal">
	{!! Form::model($oppidan_edit, array('route' => array('oppidan.update', $oppidan_edit->id), 'method' => 'put', 'data-parsley-validate' => '')) !!}
	<div class="container col-md-12">
		<div class="breadcrumbs">
			<div class="col-sm-6 row">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li><a href="{{ route('student.index') }}">{{ trans('oppidan/edit.nt_st') }}</a></li>
							<li><a href="{{ route('department.index') }}">{{ trans('oppidan/edit.nt_dp') }}</a></li>
							<li><a href="{{ route('course.index') }}">{{ trans('oppidan/edit.nt_c') }}</a></li>
							<li class="active">[{{ trans('oppidan/edit.nt_opi') }}]</li>
						</ol>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="pull-right">
					<div class="input-group notify">
						<a class="btn btn-warning button botron" href="{{ URL::previous() }}"><i class="fa fa-arrow-left"></i></a>	
					</div>
				</div>
			</div>
		</div>
	<div class="khung">
			<br>
			<h3 class="h3info">
				{{ trans('oppidan/edit.st_infoOppidan') }}
			</h3>
			<hr>
			<div class="col-md-7">
				<div class="form-group row">
				{!! Form::label('', trans('oppidan/edit.st_address'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-md-9 {{ $errors->has('address') ? 'has-error' : '' }}">
					{!! Form::text('address',
					 	$oppidan_edit->address, [
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
				{!! Form::label('', trans('oppidan/edit.st_street'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-md-9 {{ $errors->has('street') ? 'has-error' : '' }}">
					{!! Form::text('street',
					 	$oppidan_edit->street, [
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
				{!! Form::label('', trans('oppidan/edit.st_city'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-md-9 {{ $errors->has('city') ? 'has-error' : '' }}">
					{!! Form::text('city',
					 	$oppidan_edit->city, [
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
				{!! Form::label('', trans('oppidan/edit.st_ward'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-md-9 {{ $errors->has('ward') ? 'has-error' : '' }}">
					{!! Form::text('ward',
					 	$oppidan_edit->ward, [
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
				{!! Form::label('', trans('oppidan/edit.st_confirm'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-sm-9 {{ $errors->has('status') ? 'has-error' : '' }} chu20">
					{!! Form::label('', trans('oppidan/edit.st_confirmed'), ['class' =>'control-label']) !!}
					{!! Form::radio('status', 1, $oppidan_edit->status == 1 ? true : false, []) !!}
					{{--  --}}
					{!! Form::label('', trans('oppidan/edit.st_confirmnot'), ['class' =>'control-label']) !!}
					{!! Form::radio('status', 0, $oppidan_edit->status == 0 ? true : false, []) !!}
					<span class="text-danger">{{ $errors ->first('status') }}</span>
				</div>
			</div>

		</div>
			<div class="col-md-5">
				<div class="form-group">
   					 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3224.535008216497!2d108.21957545526897!3d16.032246482925647!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314218389cf02c2b%3A0xbdc63233587e2d88!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyDEkMO0bmcgw4E!5e0!3m2!1svi!2s!4v1525291038798" width="100%" height="350" frameborder="0" allowfullscreen></iframe>
  				</div>
			</div>
			
			<div class="form-group">
				<br>
				<h3 class="h3info">
					{{ trans('oppidan/edit.st_infoLandlord') }}
				</h3>
				<hr>
				<div class="form-group row">
				{!! Form::label('', trans('oppidan/edit.st_name'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-md-9 {{ $errors->has('full_name') ? 'has-error' : '' }}">
					{!! Form::text('full_name',
					 	$oppidan_edit->landlord->full_name, [
					 	'class' => 'form-control',
					 	'required' => '',
					 	'maxlength' => '50',
					 	'placeholder' => trans('oppidan/edit.st_name'),
					 	'data-parsley-maxleght' => '50',
					 	'data-parsley-trigger' => 'change focusout',
					 	'data-parsley-minlength' => '1',
					]) !!}
					<span class="text-danger">{{ $errors ->first('full_name') }}</span>
				</div>
				</div>
				<div class="form-group row">
				{!! Form::label('', trans('oppidan/edit.st_gender'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-sm-9 {{ $errors->has('gender') ? 'has-error' : '' }} chu20">
					{!! Form::label('', trans('oppidan/edit.st_male'), ['class' =>'control-label']) !!}
					{!! Form::radio('gender', 1, $oppidan_edit->landlord->gender == 1 ? true : false, []) !!}
					{{--  --}}
					{!! Form::label('', trans('oppidan/edit.st_female'), ['class' =>'control-label']) !!}
					{!! Form::radio('gender', 0, $oppidan_edit->landlord->gender == 0 ? true : false, []) !!}
					<span class="text-danger">{{ $errors ->first('gender') }}</span>
				</div>
			</div>
			<div class="form-group row">
				{!! Form::label('', trans('oppidan/edit.st_phone'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-sm-9 {{ $errors->has('phone') ? 'has-error' : '' }}">
					{!! Form::text('phone',
					 	$oppidan_edit->landlord->phone, [
					 	'class' => 'form-control',
					 	'required' => '',
					 	'placeholder' => trans('oppidan/edit.st_phone'),
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
				{!! Form::label('', trans('oppidan/edit.st_identity'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-sm-9 {{ $errors->has('identity') ? 'has-error' : '' }}">
					{!! Form::text('identity',
					 	$oppidan_edit->landlord->identity, [
					 	'class' => 'form-control',
					 	'required' => '',
					 	'placeholder' => trans('oppidan/edit.st_identity'),
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
				{!! Form::label('', trans('oppidan/edit.st_birthday'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-sm-9 {{ $errors->has('birthday') ? 'has-error' : '' }}">
					{!! Form::date('birthday',
					 	$oppidan_edit->landlord->birthday, [
					 	'class' => 'form-control',
					 	'required' => '',
					 	'placeholder' => trans('oppidan/edit.st_birthday'),
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
				<button class="btn btn-primary button botron" type="submit">
					{{ trans('oppidan/edit.bt_edit') }}
					<i class="fa fa-check"></i>
				</button>
			</div>
		</div>
		<div class="form-group benphai">
			<div class="col-md-3">
				<a class="btn btn-warning button botron" href="{{ route('student.show',$oppidan_edit->id) }}">
					{{ trans('oppidan/edit.bt_back') }}
					<i class="fa fa-arrow-left"></i>
				</a>	
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}
@endsection