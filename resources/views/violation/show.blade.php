@extends('../layouts/teamplade')
@section('content')	
<div class="form-horizontal">
	<div class="containe col-md-12">
		<div class="breadcrumbs">
			<div class="col-sm-6 row">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li><a href="{{ route('department.index') }}">{{ trans('violation/show.n_dp') }}</a></li>
							<li><a href="{{ route('course.index') }}">{{ trans('violation/show.n_c') }}</a></li>
							<li><a href="{{ route('student.index') }}">{{ trans('violation/show.n_s') }}</a></li>
							<li class="active">[{{ trans('violation/show.ns_vio') }}]</li>
						</ol>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="pull-right">
					<div class="input-group notify">
						<a class="btn btn-warning button botron" href="{{ route('student.show',$student_data->id)}}">
							<i class="fa fa-arrow-left"></i>
						</a>	
					</div>
				</div>
			</div>
		</div>
		<div class="khung">
			<br>
			<h3 class="h3info">{{ trans('violation/show.st_infovio') }} <p>[{{$student_data->full_name}}]</p></h3>
			<hr>
			@foreach ($violation as $vp)
			<h3 class="h3info">
				{{ trans('violation/show.st_vio') }} [{{ $vp->id }}]
			</h3>
			<br>
			<div class="form-group row">
				{!! Form::label('', trans('violation/show.st_fov'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-sm-9">
					<div class="khung">
						{!! $vp->form_of_violation !!}					
					</div>
				</div>	
			</div>
			<div class="form-group row">
				{!! Form::label('', trans('violation/show.st_dv'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-sm-9">
					{!! Form::label('', $vp->date_violation, ['class' => 'form-control'])
					!!}
				</div>	
			</div>
			<div class="form-group row">
				{!! Form::label('', trans('violation/show.st_dis'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-sm-9">
					{!! Form::label('', $vp->discipline, ['class' => 'form-control'])
					!!}
				</div>	
			</div>
			<div class="form-group center">
				<a class="btn btn-warning button botron" href="{{route('violation.edit',$vp->id) }}">
					{{ trans('violation/show.bt_edit') }} <i class="fa fa-edit"></i>
				</a>
				<a value="{{ $vp->id }}" data-id="{{$vp->id}}" class="btn btn-danger button botron" data-toggle="modal" href='#modal-{{$vp->id}}'>{{ trans('violation/show.bt_delete') }} <i class="fa fa-trash-o"></i></a> 
				<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  id="modal-{{$vp->id}}" >
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">{{ trans('violation/show.st_modal') }}</h4>
							</div>
							<div class="modal-body">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="fontchu">{{ trans('violation/show.st_modalinfo') }}
									[{{$vp->id}}]
								</h4>
							</div>	
							<div class="modal-footer">
								{!! Form::open(['method'=>'Delete','route'=>['violation.destroy',$vp->id]]) !!}
								{!! Form::submit(trans('violation/show.bt_yes'),['class'=>'btn btn-primary button botron']) !!}
								{!! Form::close() !!}
								<button type="button" class="btn btn-warning button botron" data-dismiss="modal">{{ trans('violation/show.bt_can') }}</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<hr>
			@endforeach		
		</div>
		<br>
		<div class="form-group benphai">
			<div class="col-md-2">
				<a class="btn btn-warning button botron" href="{{ route('student.show', $student_data->id) }}">{{ trans('student/create.bt_back') }} <i class="fa fa-arrow-left"></i></a>	
			</div>
		</div>
	</div>
</div>
@endsection