@extends('../layouts/teamplade')
@section('content')
{!! Form::model($lop_edit, array('route' => array('course.update', $lop_edit->id), 'method' => 'put')) !!}
<div class="form-horizontal">
	<div class="container col-md-12">
		<div class="breadcrumbs">
			<div class="col-sm-6 row">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li><a href="{{ route('course.index') }}">{{ trans('course/edit.st_url') }}</a></li>
							<li class="active">[{{ trans('course/edit.st_edit') }}] [{{$lop_edit->course_name}}]</li>
						</ol>
					</div>	
				</div>
			</div>
			<div class="col-sm-6">
				<div class="pull-right notify">
					<div class="input-group">
						<a class="btn btn-warning button botron" href="{{ URL::previous() }}"><i class="fa fa-arrow-left"></i></a>	
					</div>
				</div>
			</div>
		</div>
		<div class="khung">
			<br>
			<h3 class="h3info">{{ trans('course/edit.st_infoEdit') }}</h3>
			<hr>
			<div class="form-group row">
				{!! Form::label('', trans('course/edit.st_course'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-sm-9 {{$errors->has('course_name') ? 'has-error' : '' }}" role="alert">
					{!! Form::text('course_name', $lop_edit->course_name, ['class' => 'form-control'])
					!!}
					<br>
					<span class="text-danger">{{  $errors->first('course_name') }}</span>
				</div>	
			</div>		
		</div>
		{{-- button --}}
		<br>
	{{-- button --}}
		<div class="form-group benphai">
			<div class="col-md-2">
				<button class="btn btn-primary button botron" type="submit">{{ trans('course/edit.bt_create') }} <i class="fa fa-check"></i></button>
			</div>
		</div>
		<div class="form-group benphai">
			<div class="col-md-2">
				<a class="btn btn-warning button botron" href="{{ URL::previous() }}">{{ trans('course/edit.bt_back') }} <i class="fa fa-arrow-left"></i></a>	
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}
@endsection