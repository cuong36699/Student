<br>
<h3 class="h3info">{{ trans('student/create.info_risident') }}</h3>
<hr>
<div class="form-group row">
	{!! Form::label('address', trans('student/create.st_address'), ['class' => 'col-md-5 control-label fontchu']) !!}
	<div class="col-md-12 {{ $errors->has('address') ? 'has-error' : '' }}">
		{!! Form::text('address', '', ['class' => 'form-control'])
		!!}
		<span class="text chudo">{{ $errors ->first('address') }}</span>
	</div>	
</div>
<div class="form-group row">
	{!! Form::label('', trans('student/create.st_street'), ['class' => 'col-md-5 control-label fontchu']) !!}
	<div class="col-md-12 {{ $errors->has('street') ? 'has-error' : '' }}">
		{!! Form::text('street', '', ['class' => 'form-control'])
		!!}
		<span class="text chudo">{{ $errors ->first('street') }}</span>
	</div>	
</div>
<div class="form-group row">
	{!! Form::label('', trans('student/create.st_city'), ['class' => 'col-md-5 control-label fontchu']) !!}
	<div class="col-md-12 {{ $errors->has('city') ? 'has-error' : '' }}">
		{!! Form::text('city', '', ['class' => 'form-control'])
		!!}
		<span class="text chudo">{{ $errors ->first('city') }}</span>
	</div>	
</div>
<div class="form-group row">
	{!! Form::label('', trans('student/create.st_pcode'), ['class' => 'col-md-5 control-label fontchu']) !!}
	<div class="col-md-12 {{ $errors->has('postal_code') ? 'has-error' : '' }}">
		{!! Form::text('postal_code', '', ['class' => 'form-control'])
		!!}
		<span class="text chudo">{{ $errors ->first('postal_code') }}</span>
	</div>	
</div>
<div class="form-group row">
	{!! Form::label('', trans('student/create.st_hphone'), ['class' => 'col-md-5 control-label fontchu']) !!}
	<div class="col-md-12 {{ $errors->has('home_phone') ? 'has-error' : '' }}">
		{!! Form::text('home_phone', '', ['class' => 'form-control'])
		!!}
		<span class="text chudo">{{ $errors ->first('home_phone') }}</span>
	</div>	
</div>
</div>