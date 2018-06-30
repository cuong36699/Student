@extends('../layouts/teamplade')
@section('content')
{!! Form::model($department_edit, array('route' => array('department.update', $department_edit->id), 'method' => 'put', 'data-parsley-validate' => '')) !!}
<div class="form-horizontal">
	<div class="container col-md-12">
		<div class="breadcrumbs">
			<div class="col-sm-6 row">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li><a href="{{ route('department.index') }}">{{ trans('department/edit.st_department') }}</a></li>
							<li class="active">[{{ trans('department/edit.dp_edit') }}] [{{$department_edit->department_name}}]</li>
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
		<div class="khung">
			<br>
			<h3 class="h3info">{{ trans('department/edit.st_infoDepartment') }}</h3>
			<hr>
			<div class="form-group row">
				{!! Form::label('', trans('department/edit.st_dpName'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-sm-9 {{$errors->has('department_name') ? 'has-error' : '' }}" role="alert">
					{!! Form::select('department_name', [
						$department_edit->department_name=>$department_edit->department_name,
						'Công nghệ thông tin'=>'Công nghệ thông tin',
						'Thực phẩm'=>'Thực phẩm',
						'Điều dưỡng'=>'Điều dưỡng',
						'Ngôn ngữ anh'=>'Ngôn ngữ anh',
						'Điện'=>'Điện',
						'Quản trị kinh doanh'=>'Quản trị kinh doanh',
						'Kế toán'=>'Kế toán',
						'Kiến trúc'=>'Kiến trúc',
						'Tài chính – Ngân hàng'=>'Tài chính – Ngân hàng'
						],
						null,[
						'class' => 'form-control',
						'required' => '',
						'data-parsley-trigger' => 'change focusout',		
					]) !!}
					<span class="text-danger">{{  $errors->first('department_name') }}</span>
				</div>
			</div>
			{{--  --}}
			<div class="form-group row">
				{!! Form::label('', trans('department/edit.st_degree'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-sm-9 {{$errors->has('degree') ? 'has-error' : '' }}" role="alert">
					{!! Form::select('degree', [
						$department_edit->degree=>$department_edit->degree,
						'Đại học'=>'Đại học',
						'Cao đẳng'=>'Cao đẳng',
						'Trung cấp'=>'Trung cấp',
						'Thời vụ'=>'Thời vụ',
						],
						null,[
						'class' => 'form-control',
						'required' => '',
						'data-parsley-trigger' => 'change focusout',		
					]) !!}
					<span class="text-danger">{{  $errors->first('degree') }}</span>
				</div>
			</div>
			{{--  --}}
			<hr>
			<h3 class="h3info">{{ trans('department/edit.st_infoYear') }}</h3>
			<br>
			<div class="form-group row">
				{!! Form::label('', trans('department/edit.st_year'), ['class' => 'col-md-2 control-label fontchu']) !!}
				<div class="col-sm-10 {{$errors->has('graduation_year') ? 'has-error' : '' }}">
					{!! Form::selectYear('graduation_year',
						$department_edit->graduation_year,
						$year , 
						null,[
						'class' => 'form-control',
						'required' => '',
						'data-parsley-trigger' => 'change focusout',		
					]) !!}
					<span class="text-danger">{{  $errors->first('graduation_year') }}</span>
				</div>
			</div>
		</div>
		<br>
		{{-- button --}}
		<div class="form-group benphai">
			<div class="col-md-2">
				<button class="btn btn-primary button botron" type="submit">
					{{ trans('student/edit.bt_create') }} 
					<i class="fa fa-check"></i>
				</button>
			</div>
		</div>
		<div class="form-group benphai">
			<div class="col-md-2">
				<a class="btn btn-warning button botron" href="{{ URL::previous() }}">
					{{ trans('student/create.bt_back') }} 
					<i class="fa fa-arrow-left"></i>
				</a>	
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}
@endsection