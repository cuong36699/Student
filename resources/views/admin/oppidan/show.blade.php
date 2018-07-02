@extends('../layouts/teamplade')
@section('content')	
<div class="form-horizontal">
	<div class="containe col-md-12">
		<div class="breadcrumbs">
			<div class="col-sm-6 row">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li><a href="{{ route('student.index') }}">{{ trans('oppidan/show.nt_st') }}</a></li>
							<li><a href="{{ route('student.show', $student_data->id) }}">{{ trans('oppidan/show.nt_sst') }}</a></li>
							<li class="active">[{{ trans('oppidan/show.nt_opi') }}]</li>
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
			<h3 class="h3info">{{ trans('oppidan/show.st_infoOppidan') }} <p>[{{$student_data->full_name}}]</p></h3>
			<hr>
			@foreach ($oppidan as $opi)
			<h3 class="h3info">
				{{ trans('oppidan/show.st_opi') }} 
				<p>[ID:{{ $opi->id }}] {{ $opi->created_at }}</p>		 
			</h3>
			<br>
			<div class="col-md-6">
				<div class="form-group row">
					{!! Form::label('', trans('oppidan/show.st_address'), ['class' => 'col-md-10 control-label fontchu']) !!}
					<div class="col-md-12">
						{!! Form::label('', $opi->address, ['class' => 'form-control'])
					!!}
					</div>	
				</div>
				<div class="form-group row">
					{!! Form::label('', trans('oppidan/show.st_street'), ['class' => 'col-md-10 control-label fontchu']) !!}
					<div class="col-md-12">
						{!! Form::label('', $opi->street, ['class' => 'form-control'])
					!!}
					</div>	
				</div>
				<div class="form-group row">
					{!! Form::label('', trans('oppidan/show.st_city'), ['class' => 'col-md-10 control-label fontchu']) !!}
					<div class="col-md-12">
						{!! Form::label('', $opi->city, ['class' => 'form-control'])
					!!}
					</div>	
				</div>
				<div class="form-group row">
					{!! Form::label('', trans('oppidan/show.st_ward'), ['class' => 'col-md-10 control-label fontchu']) !!}
					<div class="col-md-12">
						{!! Form::label('', $opi->ward, ['class' => 'form-control'])
					!!}
					</div>	
				</div>
				<div class="form-group row">
					{!! Form::label('', trans('oppidan/show.st_confirm'), ['class'=>'col-md-10 control-label fontchu']) !!}
					<div class="col-md-12">
						@if ($opi->status == 1)
							{!! Form::label('', trans('oppidan/show.st_confirmed'), ['class' => 'form-control'])
							!!}
						@else
							{!! Form::label('', trans('oppidan/show.st_confirmnot'), ['class' => 'form-control'])
							!!}
						@endif 
					</div>	
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group row">
					{!! Form::label('', trans('oppidan/show.st_name'), ['class' => 'col-md-10 control-label fontchu']) !!}
					<div class="col-md-12">
						{!! Form::label('', $opi->landlord->full_name, ['class' => 'form-control'])
					!!}
					</div>	
				</div>
				<div class="form-group row">
					{!! Form::label('', trans('oppidan/show.st_phone'), ['class' => 'col-md-10 control-label fontchu']) !!}
					<div class="col-md-12">
						{!! Form::label('', $opi->landlord->phone, ['class' => 'form-control'])
					!!}
					</div>	
				</div>
				<div class="form-group row">
					{!! Form::label('', trans('oppidan/show.st_birthday'), ['class' => 'col-md-10 control-label fontchu']) !!}
					<div class="col-md-12">
						{!! Form::label('', $opi->landlord->birthday, ['class' => 'form-control'])
					!!}
					</div>	
				</div>
				<div class="form-group row">
					{!! Form::label('', trans('oppidan/show.st_gender'), ['class'=>'col-md-10 control-label fontchu']) !!}
					<div class="col-md-12">
						@if ($opi->landlord->gender == 1)
							{!! Form::label('', trans('oppidan/show.st_male'), ['class' => 'form-control'])
							!!}
						@else
							{!! Form::label('', trans('oppidan/show.st_female'), ['class' => 'form-control'])
							!!}
						@endif 
					</div>	
				</div>
				<div class="form-group row">
					{!! Form::label('', trans('oppidan/show.st_identity'), ['class' => 'col-md-10 control-label fontchu']) !!}
					<div class="col-md-12">
						{!! Form::label('', $opi->landlord->identity, ['class' => 'form-control'])
					!!}
					</div>	
				</div>

			</div>
			<br>
			
			<div class="form-group center">
				<a class="btn btn-warning button botron" href="{{route('oppidan.edit',$opi->id) }}">
					{{ trans('oppidan/show.bt_edit') }} <i class="fa fa-edit"></i>
				</a>
				<a value="{{ $opi->id }}" data-id="{{$opi->id}}" class="btn btn-danger button botron" data-toggle="modal" href='#modal-{{$opi->id}}'>{{ trans('oppidan/show.bt_delete') }} <i class="fa fa-trash-o"></i></a> 
				<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  id="modal-{{$opi->id}}" >
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">{{ trans('oppidan/show.st_info') }}</h4>
							</div>
							<div class="modal-body">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="fontchu">{{ trans('oppidan/show.st_infoCenter') }}
									[{{$opi->id}}]
								</h4>
							</div>	
							<div class="modal-footer">
								{!! Form::open(['method'=>'Delete','route'=>['oppidan.destroy',$opi->id]]) !!}
								{!! Form::submit(trans('oppidan/show.btmd_yes'),['class'=>'btn btn-primary button botron']) !!}
								{!! Form::close() !!}
								<button type="button" class="btn btn-warning button botron" data-dismiss="modal">{{ trans('oppidan/show.btmd_can') }}</button>
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