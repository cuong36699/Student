@extends('../layouts/teamplade')
@section('content')
{{-- expr --}}
<div class="container">
	<div class="breadcrumbs">
		<div class="col-sm-6 row">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href="{{ route('course.index') }}">{{ trans('course/create.st_url') }}</a></li>
						<li class="active">[{{ trans('course/create.st_cCreate') }}]</li>
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
	<h3 class="h3info">{{ trans('course/create.st_infoCreate') }}</h3>
	<hr>
	<table class="table table-striped table-bordered center">
		<thead>
			<tr>
				<th>{{ trans('course/create.st_dpName') }}</th>
				<th>{{ trans('course/create.st_degree') }}</th>
				<th>{{ trans('course/create.st_year') }}</th>
				<th>{{ trans('course/create.st_cCreate') }}</th>
			</tr>
		</thead>
		<tbody>
			{{-- đổ dữ liệu vào view --}}
			@foreach ($department_all as $departments)		
			<tr>

				<td>{!! $departments->department_name !!}</td>
				<td>{!! $departments->degree !!}</td>
				<td>{!! $departments->graduation_year !!}</td>
				{{-- xem  --}}
				<td><a href="{{ route('department.show',$departments->id) }}" class="btn btn-info button botron">{{ trans('course/create.bt_create') }}</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
{{-- phân trang --}}
<div class="form-group center">
	{!! $department_all->links() !!}
</div>
@endsection

