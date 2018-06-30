@extends('../layouts/teamplade')
@section('content')	
<div class="form-horizontal">
	<div class="container col-md-12">
		<div class="breadcrumbs">
			<div class="col-sm-6 row">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li><a href="{{ route('course.index') }}">{{ trans('course/show.st_url') }}</a></li>
							<li class="active">[{{ trans('course/show.st_c') }}]</li>
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
			<h3 class="h3info">{{ trans('course/show.st_infoCourse') }} 
				<p>[{{$course_show->course_name}}]</p> 
			</h3>
			<hr>
			<div class="form-group row">
				<div class="col-md-12">	
					{!! Form::label('', trans('course/show.st_id'), ['class'=>'col-md-5 control-label fontchu']) !!}
					<label class="fontchitiet">
						[{{$course_show->id}}]
					</label>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-12">	
					{!! Form::label('', trans('course/show.st_dpName'), ['class'=>'col-md-5 control-label fontchu']) !!}
					<a class="fontchitiet chuxanh" href="{{ route('department.show',$course_show->department->id) }}">
						[{{$course_show->department->department_name}}]
					</a>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-12">				
					{!! Form::label('', trans('course/show.st_cName'), ['class'=>'col-md-5 control-label fontchu']) !!}
					{!! Form::label('', $course_show->course_name, ['class'=>'control-label fontchitiet']) !!}	
				</div>	
			</div>
			<div class="form-group row">
				<div class="col-md-12">	
					{!! Form::label('', trans('course/show.st_count'), ['class'=>'col-md-5 control-label fontchu']) !!}
					<a class="fontchitiet">{{ trans('course/show.st_scount') }} {{ $count }}</a>
				</div>
			</div>
			<hr>
			<div class="center">
				{!! Form::label('', trans('course/show.st_list'), ['class'=>'col-md-6 control-label fontchu chudo']) !!}
			</div>
			<div class="khung">
				<div class="form-group row">
					@foreach ($students as $sv)
					<div class="col-md-10">
						<br>
						<p class="fontchu">
							<a class="chuxanh" href="{{ route('student.show',$sv->id) }}">{{ trans('course/show.st_name') }} {{$sv->full_name}}
								<c>
									[{{ trans('course/show.st_ids') }}{{$sv->id}}]
								</c>
							</a>
							<p>
								{{ trans('course/show.st_birthday') }} {{$sv->birthday}}
							</p>
							<p>
								{{ trans('course/show.st_gender') }} 
								@if ($sv['gender'] == 1)
								{{ trans('course/show.st_boy') }} 
								@else
								{{ trans('course/show.st_girl') }} 
								@endif  
							</p>
							<p>
								{{ trans('course/show.st_phone') }} {{$sv->phone}}
							</p>
							<p>
								{{ trans('course/show.st_hometown') }} {{$sv->home_town}}
							</p>
						</p>
						<hr>						
					</div>
					<div class="imagecourse">
						<a value="{{ $sv->id }}" data-id="{{$sv->id}}" data-toggle="modal" href='#show-{{$sv->id}}'>	
							<img src="{{ asset('hinhanh/'.$sv->avatar) }}" class="img-rounded" width="140px" height="140px">
						</a>
						<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  id="show-{{$sv->id}}" >
							<div class="modal-dialog">
								<div class="modal-content">
									<div  class="modal-header">
										<h4  class="modal-title">[{{$sv->full_name}}]</h4>
									</div>
									<div class="modal-body">
										<img src="{{ asset('hinhanh/'.$sv->avatar) }}" class="img-rounded">
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-warning button botron" data-dismiss="modal"><i class="fa fa-arrow-left"></i></button>
									</div>
								</div>
							</div>
						</div>
					</div>	
					@endforeach							
				</div>	
			</div>
		</div>	
	</div>
</div>
@endsection