@extends('../layouts/teamplade')

@section('css')
@endsection

@section('content')
<div id="content">
  @include('admin.course.ajax')
</div>
<div class="loading">
  <br>
  <span>Loading</span>
</div>
@endsection

@section('js')
@endsection

