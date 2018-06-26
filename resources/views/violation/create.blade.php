@extends('../layouts/teamplade')
@section('content')
<div class="form-horizontal">
	{!! Form::open(array('url' => 'violation', 'method' => 'post')) !!}
	<div class="container col-md-12">
		<div class="breadcrumbs">
			<div class="col-sm-6 row">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li><a href="{{ route('student.index') }}">{{ trans('violation/create.st_index') }}</a></li>
							<li><a href="{{ route('student.show',$name_student->id) }}">{{ trans('violation/create.st_url') }}</a></li>
							<li class="active">[{{ trans('violation/create.st_vCreate') }}]</li>
						</ol>
					</div>
				</div>
			</div>
			{!! Form::hidden('idsv',$id_sv) !!}
			<div class="col-sm-6">
				<div class="pull-right">
					<div class="input-group notify">
						<a class="btn btn-warning button botron" href="{{ URL::previous() }}">{{ trans('violation/create.bt_back') }} <i class="fa fa-arrow-left"></i></a>	
					</div>
				</div>
			</div>
		</div>
		<div class="khung">
			<br>
			<h3 class="h3info">{{ trans('violation/create.bt_info') }}
				<p>[{{$name_student['full_name']}}]</p></h3>
				<hr>
				{{-- {{$id_sv}} --}}
				
				<div class="form-group row center">
					{!! Form::label('', trans('violation/create.bt_date'), ['class' => 'col-md-3 control-label fontchu']) !!}
					<div class="col-md-9 {{ $errors->has('date_violation') ? 'has-error' : '' }}">
						{!! Form::date('date_violation', '', ['class' => 'form-control']) !!}
						<span class="text chudo">{{ $errors ->first('date_violation') }}</span>
					</div>
				</div>
				<div class="form-group row center">
					{!! Form::label('', trans('violation/create.bt_vform'), ['class' => 'col-md-3 control-label fontchu']) !!}
					<div class="col-md-9 {{ $errors->has('form_of_violation') ? 'has-error' : '' }}">
						{!! Form::textarea('form_of_violation','', ['class' => 'form-control ckeditor', 'placeholder' => 'Please input Content', 'rows' => '4']) !!}
						<span class="text chudo">{{ $errors ->first('form_of_violation') }}</span>
					</div>
				</div>			
				<div class="form-group row center">
					{!! Form::label('', trans('violation/create.bt_discipline'), ['class' => 'col-md-3 control-label fontchu']) !!}
					<div class="col-md-9 {{ $errors->has('discipline') ? 'has-error' : '' }}">
						{!! Form::select('discipline', [
							''=>trans('violation/create.st_select'),
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
						<a class="btn btn-warning button botron" href="{{ route('student.show',$name_student->id) }}">{{ trans('student/create.bt_back') }} <i class="fa fa-arrow-left"></i></a>	
					</div>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
		@endsection