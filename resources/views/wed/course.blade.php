@extends('../layouts/wed')
@section('content')
<div class="content col-md-12">
    <div class="form-group">
    	<img src="{{ asset('hinhanh/'.$student_id->avatar) }}"  width="42" height="42"> 
       	<c class="h1info">{{ trans('wed/course.st_infovio') }}</c> 
       	<hr>
	</div>
	@foreach ($students as $sv)
		<div class="form-group row khung">
			<br>
			<div class="col-md-4">
				<p>
					{!! Form::label('', trans('wed/course.st_fn'), []) !!}
					{!! Form::label('', $sv->full_name, ['class'=>'fontchitiet']) !!}
				</p>
				<p>
					{!! Form::label('', trans('wed/course.st_bd'), []) !!}
					{!! Form::label('', $sv->birthday, ['class'=>'fontchitiet']) !!}
				</p>
				<p>
					{!! Form::label('', trans('wed/course.st_gd'), []) !!}
					@if ($sv['gender'] == 1)
						{!! Form::label('', trans('wed/course.st_male'), ['class'=>'fontchitiet']) !!}
					@else
						{!! Form::label('', trans('wed/course.st_female'), ['class'=>'fontchitiet']) !!}
					@endif  
				</p>
				<p>
					{!! Form::label('', trans('wed/course.st_phone'), []) !!}
					{!! Form::label('', $sv->phone, ['class'=>'fontchitiet']) !!}
				</p>
				<p>
					{!! Form::label('', trans('wed/course.st_ht'), []) !!}
					{!! Form::label('', $sv->home_town, ['class'=>'fontchitiet']) !!}
				</p>
			</div>
			{{--  --}}
			<div class="col-md-6">
				<p>
					{!! Form::label('', trans('wed/course.st_ids'), []) !!}
					{!! Form::label('', $sv->id, ['class'=>'fontchitiet']) !!}
				</p>
				<p>
					{!! Form::label('', trans('wed/course.st_risident'), []) !!}
					{!! Form::label('', $sv->risident->address . ' ' . 
						$sv->risident->street . ' , ' . 
						$sv->risident->city,
						['class'=>'fontchitiet']) 
					!!}
				</p>
				<p>
					{!! Form::label('', trans('wed/course.st_email'), []) !!}
					{!! Form::label('', $sv->email, ['class'=>'fontchitiet']) !!}
				</p>
				<p>
					{!! Form::label('', trans('wed/course.st_union'), []) !!}
					@if ($sv->member->union_member == 1)
						{!! Form::label('', trans('wed/course.st_is'), ['class'=>'fontchitiet']) !!}
					@else
						{!! Form::label('', trans('wed/course.st_out'), ['class'=>'fontchitiet']) !!}
					@endif

				</p>
				<p>
					{!! Form::label('', trans('wed/course.st_adh'), []) !!}
					@if ($sv->member->adherer_member == 1)
						{!! Form::label('', trans('wed/course.st_is'), ['class'=>'fontchitiet']) !!}
					@else
						{!! Form::label('', trans('wed/course.st_out'), ['class'=>'fontchitiet']) !!}
					@endif

				</p>
			</div>
			<div class="col-md-2">
				<a value="{{ $sv->id }}" data-id="{{$sv->id}}" data-toggle="modal" href='#show-{{$sv->id}}'>
					<img class="img-rounded" src="{{ asset('hinhanh/'.$sv->avatar) }}"  width="200" height="200"> 
				</a>
				<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  id="show-{{$sv->id}}" >
					<div class="modal-dialog">
						<div class="modal-content">
							<div  class="modal-header">
								<h4  class="modal-title">[{{$sv->full_name}}]</h4>
							</div>
							<div class="modal-body center">
								<img src="{{ asset('hinhanh/'.$sv->avatar) }}" class="">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-warning button botron" data-dismiss="modal"><i class="fa fa-arrow-left"></i></button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<hr>						
		</div>					
	@endforeach	
</div>
@endsection