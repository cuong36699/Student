<br>
<h3 class="h3info">{{ trans('student/edit.info_risident') }}</h3>
<hr>
<div class="form-group row">
	{!! Form::label('', trans('student/edit.st_address'), ['class' => 'col-md-5 control-label fontchu']) !!}
	<div class="col-md-12 {{ $errors->has('address') ? 'has-error' : '' }}">
		{!! Form::text('address',
			$student_edit->risident->address, [
			'class' => 'form-control',
			'required' => '',
			'maxlength' => '30',
			'placeholder' => trans('student/edit.st_address'),
			'data-parsley-trigger' => 'change focusout',
			'data-parsley-maxlength' => '30',
			'data-parsley-minlength' => '1',
		]) !!}
		<span class="text-danger">{{ $errors ->first('address') }}</span>
	</div>	
</div>
<div class="form-group row">
	{!! Form::label('', trans('student/edit.st_street'), ['class' => 'col-md-5 control-label fontchu']) !!}
	<div class="col-md-12 {{ $errors->has('street') ? 'has-error' : '' }}">
		{!! Form::text('street',
			$student_edit->risident->street, [
			'class' => 'form-control',
			'required' => '',
			'maxlength' => '30',
			'placeholder' => trans('student/edit.st_street'),
			'data-parsley-trigger' => 'change focusout',
			'data-parsley-maxlength' => '30',
			'data-parsley-minlength' => '1',
		]) !!}
		<span class="text-danger">{{ $errors ->first('street') }}</span>
	</div>	
</div>
<div class="form-group row">
	{!! Form::label('', trans('student/edit.st_city'), ['class' => 'col-md-5 control-label fontchu']) !!}
	<div class="col-md-12 {{ $errors->has('city') ? 'has-error' : '' }}">
		{!! Form::text('city',
			$student_edit->risident->city, [
			'class' => 'form-control',
			'required' => '',
			'maxlength' => '30',
			'placeholder' => trans('student/edit.st_city'),
			'data-parsley-trigger' => 'change focusout',
			'data-parsley-maxlength' => '30',
			'data-parsley-minlength' => '1',
		]) !!}
		<span class="text-danger">{{ $errors ->first('city') }}</span>
	</div>	
</div>
<div class="form-group row">
	{!! Form::label('', trans('student/edit.st_pcode'), ['class' => 'col-md-5 control-label fontchu']) !!}
	<div class="col-md-12 {{ $errors->has('postal_code') ? 'has-error' : '' }}">
		{!! Form::text('postal_code',
			$student_edit->risident->postal_code, [
			'class' => 'form-control',
			'required' => '',
			'placeholder' => trans('student/edit.st_pcode'),
			'pattern' => '\d*',
			'data-parsley-trigger' => 'change focusout',
			'data-parsley-minlength' => '1',
			'maxlength' => '2',
			'data-parsley-maxlength' => '2',
		]) !!}
		<span class="text-danger">{{ $errors ->first('postal_code') }}</span>
	</div>	
</div>
<div class="form-group row">
	{!! Form::label('', trans('student/edit.st_hphone'), ['class' => 'col-md-5 control-label fontchu']) !!}
	<div class="col-md-12 {{ $errors->has('home_phone') ? 'has-error' : '' }}">
		{!! Form::text('home_phone',
			$student_edit->risident->home_phone, [
			'class' => 'form-control',
			'required' => '',
			'placeholder' => trans('student/edit.st_hphone'),
			'pattern' => '\d*',
			'maxlength' => '11',
			'data-parsley-trigger' => 'change focusout',
			'data-parsley-minlength' => '9',
			'data-parsley-maxlength' => '11',
		]) !!}
		<span class="text-danger">{{ $errors ->first('home_phone') }}</span>
	</div>	
</div>