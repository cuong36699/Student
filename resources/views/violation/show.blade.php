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
					<div style="margin-top: 6px" class="input-group">
						<a style="color:black;border-radius:8px" class="btn btn-warning" href="{{ route('student.show',$sinhvien->id)}}"">{{ trans('violation/show.bt_back') }}<i class="fa fa-arrow-left"></i></a>	
					</div>
				</div>
			</div>
		</div>
		<div style="border-radius: 8px;border-color :gray;border-style: solid;border-width:1px;padding-left:10px;padding-right: 10px" >
			<br>
			<h3 style="text-align: center;font-family:sans-serif;color: red">{{ trans('violation/show.st_infovio') }} <p>[{{$sinhvien->full_name}}]</p></h3>
			<hr>
			@foreach ($vipham as $vp)
			<h3 style="text-align: center;font-family:sans-serif;color: red">
				{{ trans('violation/show.st_vio') }}
				<a style="border-radius: 8px;" class="btn btn-warning" href="{{route('violation.edit',$vp->id) }}">
					{{ trans('violation/show.bt_edit') }} <i class="fa fa-edit"></i>
				</a>
				<a style="border-radius: 8px" value="{{ $vp->id }}" data-id="{{$vp->id}}" class="btn btn-danger" data-toggle="modal" href='#modal-{{$vp->id}}'>{{ trans('violation/show.bt_delete') }} <i class="fa fa-trash-o"></i></a> 
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
								{!! Form::submit(trans('violation/show.bt_yes'),['class'=>'btn btn-primary','style'=>'border-radius: 8px']) !!}
								{!! Form::close() !!}
								<button style="border-radius: 8px" type="button" class="btn btn-warning" data-dismiss="modal">{{ trans('violation/show.bt_can') }}</button>
							</div>
						</div>
					</div>
				</div>
			</h3>
			<br>
			<div class="form-group row">
				{!! Form::label('', trans('violation/show.st_fov'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-sm-9">
					<div style="border-radius: 8px;border-color :gray;border-style: solid;border-width:1px;padding-left:10px;padding-right: 10px" >
						
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
			<hr>
			@endforeach		
		</div>
		<br>
		<div style="float: right;">
			<div class="col-md-3 col-md-offset-10">
				<a style="border-radius: 8px;" class="btn btn-warning" href="{{ route('student.show',$sinhvien->id) }}">{{ trans('violation/show.bt_back') }}<i class="fa fa-arrow-left"></i></a>
			</div>
		</div>
	</div>
</div>
@endsection