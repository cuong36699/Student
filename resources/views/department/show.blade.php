@extends('../layouts/teamplade')

@section('content')	
{{-- expr --}}
<div class="form-horizontal">
	<div class="container">
		<div class="breadcrumbs">
			<div class="col-sm-6 row">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li><a href="{{ route('department.index') }}">{{ trans('department/show.st_department') }}</a></li>
							<li class="active">[{{ trans('department/show.st_dp') }}]</li>
						</ol>
					</div>	
				</div>
			</div>
			<div class="col-sm-6">
				<div class="pull-right notify">
					<div class="input-group">
						<a class="btn btn-warning button botron" href="{{ URL::previous() }}">
							<i class="fa fa-arrow-left"></i>
						</a>	
					</div>
				</div>
			</div>
		</div>
		<br>
		<br>
		<div class="khung">
			<br>
			<h3 class="h3info">{{ trans('department/show.st_infoDepartment') }}</h3>
			<hr>
			<div class="form-group row">
				<div class="col-md-12">				
					{!! Form::label('', trans('department/show.st_id'), ['class'=>'col-md-6 control-label fontchu']) !!}
					{!! Form::label('', $department_show->id, ['class'=>'control-label fontchitiet']) !!}	
				</div>	
			</div>
			<hr>
			<div class="form-group row ">
				<div  class="col-md-12">
					{!! Form::label('', trans('department/show.st_dpName'), ['class'=>'col-md-6 control-label fontchu']) !!}
					{!! Form::label('', $department_show->department_name, ['class'=>'control-label fontchitiet']) !!}
				</div>	
			</div>
			<hr>
			<div class="form-group row ">
				<div class="col-md-12">
					{!! Form::label('', trans('department/show.st_degree'), ['class'=>'col-md-6 control-label fontchu']) !!}
					{!! Form::label('', $department_show->degree, ['class'=>'control-label fontchitiet']) !!}
				</div>	
			</div>
			<hr>
			<div class="form-group row ">
				<div  class="col-md-12">
					{!! Form::label('', trans('department/show.st_year'), ['class'=>'col-md-6 control-label fontchu']) !!}
					{!! Form::label('', $department_show->graduation_year, ['class'=>'control-label fontchitiet']) !!}
				</div>	
			</div>
			<div class="khung">	
				<div class="form-group row center">
					<div  class="col-md-12">
						<br>
						<div>
							<h3 class="h3info">
								{!! Form::label('', trans('department/show.st_all'). ' '. $department_show->department_name. ' '. trans('department/show.st_year'). ' '. '('.$department_show->graduation_year.')', ['class'=>'control-label fontchu']) 
								!!}
							</h3>
						</div>
						<hr>
						<div class="col-md-12">
							@foreach ($cdp as $courses)
							<div class="col-md-12">
								<strong>
									{{-- lay thoi gian tao tru cho thoi` gian hien tai --}}
									{{ trans('department/show.st_createon') }} {!!$courses->created_at->diffForHumans()!!}:
								</strong> 
								<a class="fontchitiet chuxanh" href="{{ route('course.show',$courses->id) }}">[{!! $courses->course_name !!}]</a>
							</div>
							@endforeach
							{!! $cdp->links() !!}
						</div>

					</div>	
				</div>
			</div>
			<br>
			<h3 class="h3info">{{ trans('department/show.st_infoCourse') }}</h3>
			<hr>
			{!! Form::open(['route'=>'course.store',$department_show->id]) !!}
			{!!csrf_field()!!}
			{!! Form::hidden( 'department_id', $department_show->id, []) !!}
			<div class="form-group row">
				{!! Form::label('', trans('department/show.st_course'), ['class'=>'col-md-2 control-label fontchu']) !!}
				<div class="col-sm-10 {{$errors->has('course_name') ? 'has-error' : '' }}" role="alert">
					{!! Form::text('course_name','', ['class'=>'form-control']) !!}
					<br>
					<span class="" class="text-danger">{{  $errors->first('course_name') }}</span>
					{{-- button --}}
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
	</div>
	<br>
</div>
@endsection
{!! Form::close() !!}