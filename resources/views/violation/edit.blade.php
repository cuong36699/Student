@extends('../layouts/teamplade')
@section('content')
<div class="form-horizontal">
	<div class="breadcrumbs">
		<div class="col-sm-6 row">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href="{{ route('student.index') }}">{{ trans('violation/edit.st_index') }}</a></li>
						<li><a href="{{ route('student.index') }}">{{ trans('violation/edit.st_url') }}</a></li>
						<li class="active">[{{ trans('violation/edit.st_vEdit') }}]</li>
					</ol>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="pull-right">
				<div style="margin-top: 6px" class="input-group">
					<a style="color:black;border-radius:8px" class="btn btn-warning" href="{{ URL::previous() }}">{{ trans('violation/edit.bt_back') }} <i class="fa fa-arrow-left"></i></a>	
				</div>
			</div>
		</div>
	</div>
	{!! Form::model($vipham_edit, array('route' => array('violation.update', $vipham_edit->id), 'method' => 'put')) !!}
	<div class="container col-md-12">
		<div style="border-color :gray;border-style: solid;border-width:1px;padding-left: 10px;padding-right: 10px" >
			<br>
			<h3 style="text-align: center;font-family:sans-serif;color: red">{{ trans('violation/edit.st_vEdit') }}</h3>
			<hr>
			<div style="text-align: center;" class="form-group row">
				{!! Form::label('', trans('violation/edit.bt_date'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-md-9 {{ $errors->has('date_violation') ? 'has-error' : '' }}">
					{!! Form::date('date_violation',$vipham_edit->date_violation , ['class' => 'form-control demkytu','maxlength'=>'150']) !!}
					<span style="color:red" class="text">{{ $errors ->first('date_violation') }}</span>
				</div>
			</div>
			<div style="text-align: center;" class="form-group row">
				{!! Form::label('', trans('violation/edit.bt_vform'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-md-9 {{ $errors->has('form_of_violation') ? 'has-error' : '' }}">
					{!! Form::textarea('form_of_violation', $vipham_edit->form_of_violation, ['class' => 'form-control ckeditor', 'placeholder' => 'Please input Content', 'rows' => '4']) !!}
					<span style="color:red" class="text">{{ $errors ->first('form_of_violation') }}</span>
				</div>
			</div>			
			<div style="text-align: center;" class="form-group row">
				{!! Form::label('', trans('violation/edit.bt_discipline'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-md-9 {{ $errors->has('discipline') ? 'has-error' : '' }}">
					{!! Form::select('discipline', [
						$vipham_edit->discipline=>$vipham_edit->discipline,
						'Khiển trách'=>'Khiển trách',
						'Kỷ luật'=>'Kỷ luật',
						'Đuổi học'=>'Đuổi học',
						'Phạt hành chính'=>'Phạt hành chính',
						],'',['class' => 'form-control']) !!}
						<span style="color:red" class="text">{{ $errors ->first('discipline') }}</span>
					</div>			
				</div>
			</div>	
			<br>
			<div style="float: right;">
				<div class="col-md-3 col-md-offset-10">
					<button class="btn btn-primary" style="border-radius: 8px" type="submit">{{ trans('violation/edit.bt_Edit') }} <i class="fa fa-check"></i></button>
				</div>
			</div>
			<div style="float: right;">
				<div class="col-md-3 col-md-offset-10">
					<a style="border-radius: 8px;" class="btn btn-warning" href="{{ URL::previous() }}">{{ trans('violation/edit.bt_back') }} <i class="fa fa-arrow-left"></i></a>
				</div>
			</div>		
		</div>
	</div>
</div>
{!! Form::close() !!}
@endsection