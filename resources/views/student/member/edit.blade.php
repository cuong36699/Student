<br>
<h3 class="h3info">{{ trans('student/edit.st_member') }}</h3>
<hr>
<div class="form-group row chu20">
	{!! Form::label('', trans('student/edit.st_union'), ['class' => 'col-md-5 control-label fontchu']) !!}
	<div class="col-sm-12">
		{!! Form::label('', trans('student/edit.st_out'), ['class' =>'control-label']) !!}
		{!! Form::radio('union_member', 0, $student_edit->member->union_member == 0 ? true : false, []) !!}
		{{--  --}}
		{!! Form::label('', trans('student/edit.st_in'), ['class' =>'control-label']) !!}
		{!! Form::radio('union_member', 1, $student_edit->member->union_member == 1 ? true : false, []) !!}
	</div>
</div>
<div id="bldoan-1" class="toHidedoan form-group row ">
	{!! Form::label('', trans('student/edit.st_date_union'), ['class' => 'col-md-5 control-label fontchu']) !!}
	<div class="col-sm-12 {{ $errors->has('date_union_member') ? 'has-error' : '' }}">
		{!! Form::date('date_union_member', $student_edit->member->date_union_member, ['class' => 'form-control']) !!}
		<span class="text chudo">{{ $errors ->first('date_union_member') }}</span>
	</div>
</div>
{{--  --}}
<div class="form-group row chu20">
	{!! Form::label('', trans('student/edit.st_adherer'), ['class' => 'col-md-5 control-label fontchu']) !!}
	<div class="col-sm-12">
		{!! Form::label('', trans('student/edit.st_out'), ['class' =>'control-label']) !!}
		{!! Form::radio('adherer_member', 0, $student_edit->member->adherer_member == 0 ? true : false, []) !!}
		{{--  --}}
		{!! Form::label('', trans('student/edit.st_in'), ['class' =>'control-label']) !!}
		{!! Form::radio('adherer_member', 1, $student_edit->member->adherer_member == 1 ? true : false, []) !!}
	</div>
</div>
<div id="bldang-1" class="toHidedang form-group row ">
	{!! Form::label('', trans('student/edit.st_date_adherer'), ['class' => 'col-md-5 control-label fontchu']) !!}
	<div class="col-sm-12 {{ $errors->has('date_adherer_member') ? 'has-error' : '' }}">
		{!! Form::date('date_adherer_member', $student_edit->member->date_adherer_member, ['class' => 'form-control']) !!}
		<span class="text chudo">{{ $errors ->first('date_adherer_member') }}</span>
	</div>
</div>
