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
				<div class="input-group notify">
					<a class="btn btn-warning button botron" href="{{ URL::previous() }}"><i class="fa fa-arrow-left"></i></a>	
				</div>
			</div>
		</div>
	</div>
	{!! Form::model($vipham_edit, array('route' => array('violation.update', $vipham_edit->id), 'method' => 'put')) !!}
	<div class="container col-md-12">
		<div class="khung">
			<br>
			<h3 class="h3info">{{ trans('violation/edit.st_vEdit') }}</h3>
			<hr>
			<div class="form-group row center">
				{!! Form::label('', trans('violation/edit.bt_date'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-md-9 {{ $errors->has('date_violation') ? 'has-error' : '' }}">
					{!! Form::date('date_violation',$vipham_edit->date_violation , ['class' => 'form-control demkytu','maxlength'=>'150']) !!}
					<span class="text chudo">{{ $errors ->first('date_violation') }}</span>
				</div>
			</div>
			<div class="form-group row center">
				{!! Form::label('', trans('violation/edit.bt_vform'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-md-9 {{ $errors->has('form_of_violation') ? 'has-error' : '' }}">
					{!! Form::textarea('form_of_violation', $vipham_edit->form_of_violation, ['class' => 'form-control ckeditor', 'placeholder' => 'Please input Content', 'rows' => '4']) !!}
					<span class="text chudo">{{ $errors ->first('form_of_violation') }}</span>
				</div>
			</div>			
			<div class="form-group row center">
				{!! Form::label('', trans('violation/edit.bt_discipline'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-md-9 {{ $errors->has('discipline') ? 'has-error' : '' }}">
					{!! Form::select('discipline', [
						$vipham_edit->discipline=>$vipham_edit->discipline,
						'Khiển trách'=>'Khiển trách',
						'Kỷ luật'=>'Kỷ luật',
						'Đuổi học'=>'Đuổi học',
						'Phạt hành chính'=>'Phạt hành chính',
						],'',['class' => 'form-control']) !!}
						<span class="text chudo">{{ $errors ->first('discipline') }}</span>
					</div>			
				</div>
			</div>	
			<br>
			{{-- button --}}
			<div class="form-group benphai">
				<div class="col-md-2">
					<button class="btn btn-primary button botron" type="submit">{{ trans('student/create.bt_create') }} <i class="fa fa-check"></i></button>
				</div>
			</div>
			<div class="form-group benphai">
				<div class="col-md-2">
					<a class="btn btn-warning button botron" href="{{ URL::previous() }}">{{ trans('student/create.bt_back') }} <i class="fa fa-arrow-left"></i></a>	
				</div>
			</div>	
		</div>
	</div>
</div>
{!! Form::close() !!}
@endsection