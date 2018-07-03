@extends('../layouts/teamplade')
@section('content')
{!! Form::open(array('url' => 'admin/student/send/' . $data_student->id, 'method' => 'post', 'data-parsley-validate' => '')) !!}
<div class="form-horizontal">
	<div class=" container">
		<div class="breadcrumbs">
			<div class="col-sm-6 row">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li>
								<a href="{{ route('student.index') }}">{{ trans('contact/create.nt_st') }}</a>
							</li>
							<li>
								<a href="{{ route('student.show', $data_student->id) }}">{{ trans('contact/create.nt_sst') }}</a>
							</li>
							<li class="active">
								[{{ trans('contact/create.nt_ct') }}]
							</li>
						</ol>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="pull-right">
					<div class="input-group notify">
						<a class="btn btn-warning button botron" href="{{ route('student.index') }}">
							<i class="fa fa-arrow-left"></i>
						</a>	
					</div>
				</div>
			</div>
		</div>
		<div class="khung">
			<br>
			<h3 class="h3info">
				{{ trans('contact/create.st_infoContact') }}
				<p>[{{ $data_student->full_name }}]</p>
			</h3>
			<hr>
			<div class="form-group row">
				{!! Form::label('', trans('contact/create.st_email'), ['class' => 'col-md-2 control-label fontchu']) !!}
				<div class="col-sm-10 {{ $errors->has('email') ? 'has-error' : '' }}">
					{!! Form::email('email', 
						$data_student->email, [
           				'class' => 'form-control',
           				'aria-describedby' => 'basic-addon2',
            			'placeholder' => trans('contact/create.st_infoContact'),
            			'required' => '',
            			'maxlength' => '50',
            			'data-parsley-minlength' => '1',
					 	'data-parsley-maxlength' => '50',
            			'data-parsley-trigger' => 'change focusout',
        			]) !!}
					<span class="input-group-addon benphai" id="basic-addon2">@gmail.com</span>
					<span class="text-danger">{{ $errors ->first('email') }}</span>
				</div>
			</div>
			<div class="form-group row">
				{!! Form::label('', trans('contact/create.st_content'), ['class' => 'col-md-2 control-label fontchu']) !!}
				<div class="col-sm-10 {{ $errors->has('content') ? 'has-error' : '' }}">
					{!! Form::textarea('content',
					 	null, [
					 	'class' => 'form-control',
					 	'required' => '',
					 	'maxlength' => '100',
					 	'placeholder' => trans('contact/create.st_content'),
					 	'data-parsley-maxleght' => '100',
					 	'data-parsley-trigger' => 'change focusout',
					 	'row' => '3',
					 	'data-parsley-minlength' => '1',
					]) !!}
					<span class="text-danger">{{ $errors ->first('content') }}</span>
				</div>	
			</div>
		</div>
		{{-- button --}}
		<div class="form-group benphai">
			<div class="col-md-2">
				<button class="btn btn-primary button botron" type="submit">{{ trans('contact/create.bt_create') }} <i class="fa fa-check"></i></button>
			</div>
		</div>
		<div class="form-group benphai">
			<div class="col-md-2">
				<a class="btn btn-warning button botron" href="{{ route('student.index') }}">{{ trans('contact/create.bt_back') }} <i class="fa fa-arrow-left"></i></a>	
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}
@endsection

