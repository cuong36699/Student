@extends('../layouts/teamplade')
@section('content')
{!! Form::open(array('url' => 'department', 'method' => 'post', 'data-parsley-validate' => '')) !!}
<div class="form-horizontal">
	<div class="container col-md-12">
		<div class="breadcrumbs">
			<div class="col-sm-6 row">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li><a href="{{ route('department.index') }}">{{ trans('department/create.st_department') }}</a></li>
							<li class="active">[{{ trans('department/create.dp_create') }}]</li>
						</ol>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="pull-right notify">
					<div class="input-group">
						<a class="btn btn-warning button botron" href="{{ route('department.index') }}">
							<i class="fa fa-arrow-left"></i>
						</a>	
					</div>
				</div>
			</div>
		</div>
		<div class="khung">
			<br>
			<h3 class="h3info">{{ trans('department/create.st_infoDepartment') }}</h3>
			<hr>
			<div class="form-group row" >
				{!! Form::label('', trans('department/create.st_dpName'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-sm-9 {{$errors->has('department_name') ? 'has-error' : '' }}" role="alert">
					{!! Form::select('department_name', [
						''=>trans('department/create.st_select'),
						'Công nghệ thông tin'=>'Công nghệ thông tin',
						'Thực phẩm'=>'Thực phẩm',
						'Điều dưỡng'=>'Điều dưỡng',
						'Ngôn ngữ anh'=>'Ngôn ngữ anh',
						'Điện'=>'Điện',
						'Quản trị kinh doanh'=>'Quản trị kinh doanh',
						'Kế toán'=>'Kế toán',
						'Kiến trúc'=>'Kiến trúc',
						'Tài chính – Ngân hàng'=>'Tài chính – Ngân hàng'],
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
				{!! Form::label('', trans('department/create.st_degree'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-sm-9 {{$errors->has('degree') ? 'has-error' : '' }}" role="alert">
					{!! Form::select('degree', [
						''=>trans('department/create.st_select'),
						'Đại học'=>'Đại học',
						'Cao đẳng'=>'Cao đẳng',
						'Trung cấp'=>'Trung cấp',
						'Thời vụ'=>'Thời vụ'],
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
			<h3 class="h3info">{{ trans('department/create.st_infoYear')}}</h3>
			<br>
			<div class="form-group row">
				{!! Form::label('', trans('department/create.st_year'), ['class' => 'col-md-2 control-label fontchu']) !!}
				<div class="col-sm-10 {{$errors->has('graduation_year') ? 'has-error' : '' }}">
					{!! Form::selectYear('graduation_year', 
						$year, 
						$year-6,
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
				<button class="btn btn-primary button botron" type="submit">{{ trans('student/create.bt_create') }} 
					<i class="fa fa-check"></i>
				</button>
			</div>
		</div>
		<div class="form-group benphai">
			<div class="col-md-2">
				<a class="btn btn-warning button botron" href="{{ route('student.index') }}">
					{{ trans('student/create.bt_back') }} 
					<i class="fa fa-arrow-left"></i>
				</a>	
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}
@endsection