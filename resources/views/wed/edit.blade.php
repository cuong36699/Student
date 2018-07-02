@extends('../layouts/wed')
@section('content')
{!! Form::model($student->id, array('route' => array('wed.update', $student->id), 'method' => 'put', 'data-parsley-validate' => '')) !!}
<div class="content col-md-12">
   <img src="{{ asset('hinhanh/'.$student->avatar) }}"  width="42" height="42"> 
       <c class="h1info">SỬA HỒ SƠ SINH VIÊN:</c> 
       <hr>
    <div class="form-group col-md-2">
       <img class="img-circle" src="{{ asset('hinhanh/'.$student->avatar) }}"  width="150" height="150"> 
     </div>
      <div class="form-group col-md-5">
        <div class="col-md-12">
            {!! Form::label('', 'Họ và tên:', ['class'=>'col-md-4']) !!}
            {!! Form::label('', $student->full_name, ['class'=>'col-md-8 fontchitiet']) !!}
        </div>
        <div class="col-md-12">
                    {!! Form::label('', 'Giới tính:', ['class'=>'col-md-4']) !!}
                        @if ($student->gender == 1)
                            {!! Form::label('', 'Nam', ['class'=>'col-md-8 fontchitiet']) !!}
                        @else 
                            {!! Form::label('', 'Nữ', ['class'=>'col-md-8 fontchitiet']) !!}
                        @endif
                </div>
        <div class="col-md-12">
            {!! Form::label('', 'Dân tộc:', ['class'=>'col-md-4']) !!}
            {!! Form::label('', $student->nation, ['class'=>'col-md-8 fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', 'Mã SV:', ['class'=>'col-md-4']) !!}
            {!! Form::label('', $student->id, ['class'=>'col-md-8 fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', 'Ngày Sinh:', ['class'=>'col-md-4']) !!}
            {!! Form::label('', $student->birthday, ['class'=>'col-md-8 fontchitiet']) !!}
        </div>
     </div>
       <div class="form-group col-md-5">
         <div class="col-md-12">
            {!! Form::label('', 'Ngành:', ['class'=>'col-md-4']) !!}
            {!! Form::label('', $course->department->department_name, ['class'=>'col-md-8 fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', 'Bậc:', ['class'=>'col-md-4']) !!}
            {!! Form::label('', $course->department->degree, ['class'=>'col-md-8 fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', 'Niên khóa:', ['class'=>'col-md-4']) !!}
            {!! Form::label('', $course->department->graduation_year, ['class'=>'col-md-8 fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', 'Lớp:', ['class'=>'col-md-4']) !!}
            {!! Form::label('', $course->course_name, ['class'=>'col-md-8 fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', 'Dân tộc:', ['class'=>'col-md-4']) !!}
            {!! Form::label('', $student->nation, ['class'=>'col-md-8 fontchitiet']) !!}
        </div>  
     </div>
     <div style="margin-left: 4px" class="form-group row col-md-12 khung center">
         <h3 class="h3info">Sửa thông tin riêng</h3>
         <br>
         <div class="form-group row">
            {!! Form::label('', 'Số CMND:', ['class'=>'col-md-3']) !!}
            <div class="col-md-8">
                {!! Form::text('identity', $student->identity, ['class'=>'form-control']) !!}
            </div>
         </div>
           <div class="form-group row">
            {!! Form::label('', 'Số điện thoại:', ['class'=>'col-md-3']) !!}
            <div class="col-md-8">
                {!! Form::text('phone', $student->phone, ['class'=>'form-control']) !!}
            </div>
         </div>
          <div class="form-group row">
            {!! Form::label('', 'Email:', ['class'=>'col-md-3']) !!}
            <div class="col-md-8">
                {!! Form::text('email', $student->email, ['class'=>'form-control']) !!}
            </div>
         </div>
         <div class="form-group row">
            {!! Form::label('', 'Tôn giáo:', ['class'=>'col-md-3']) !!}
            <div class="col-md-8">
                {!! Form::text('religion', $student->religion, ['class'=>'form-control']) !!}
            </div>
         </div>
         <hr>
         <h3 class="h3info">Thông tin ngoại trú</h3>
         <br>
         <div class="form-group row">
            {!! Form::label('', 'Địa chỉ', ['class'=>'col-md-3']) !!}
            <div class="col-md-8">
                {!! Form::text('addressopi', $oppidan == null ? '' : $oppidan->address, ['class'=>'form-control']) !!}
            </div>
         </div> 
         <div class="form-group row">
            {!! Form::label('', 'Đường', ['class'=>'col-md-3']) !!}
            <div class="col-md-8">
                {!! Form::text('streetopi', $oppidan == null ? '' : $oppidan->street, ['class'=>'form-control']) !!}
            </div>
         </div>
         <div class="form-group row">
            {!! Form::label('', 'thành phố', ['class'=>'col-md-3']) !!}
            <div class="col-md-8">
                {!! Form::text('cityopi', $oppidan == null ? '' : $oppidan->city, ['class'=>'form-control']) !!}
            </div>
         </div>
         <div class="form-group row">
            {!! Form::label('', 'Phường', ['class'=>'col-md-3']) !!}
            <div class="col-md-8">
                {!! Form::text('wardopi', $oppidan == null ? '' : $oppidan->ward, ['class'=>'form-control']) !!}
            </div>
         </div> 
         <div class="form-group row">
            {!! Form::label('', 'Họ tên chủ trọ', ['class'=>'col-md-3']) !!}
            <div class="col-md-8">
                {!! Form::text('full_nameland', $oppidan == null ? '' : $oppidan->landlord->full_name, ['class'=>'form-control']) !!}
            </div>
         </div>
         <div class="form-group row">
            {!! Form::label('', 'Giới tính:', ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-8">
                {!! Form::label('', 'Nam', ['class' =>'control-label']) !!}
                {!! Form::radio('genderland', 1,  $oppidan == null ? '' : $oppidan->landlord->gender == 1 ? true : false, []) !!}
                {{--  --}}
                {!! Form::label('', 'Nữ', ['class' =>'control-label']) !!}
                {!! Form::radio('genderland', 0,  $oppidan == null ? '' : $oppidan->landlord->gender == 0 ? true : false, []) !!}
            </div>
         </div>
         <div class="form-group row">
            {!! Form::label('', 'Số điện thoại chủ trọ', ['class'=>'col-md-3']) !!}
            <div class="col-md-8">
                {!! Form::text('phoneland', $oppidan == null ? '' : $oppidan->landlord->phone, ['class'=>'form-control']) !!}
            </div>
         </div>
         <div class="form-group row">
            {!! Form::label('', 'Số chứng minh chủ trọ', ['class'=>'col-md-3']) !!}
            <div class="col-md-8">
                {!! Form::text('identityland', $oppidan == null ? '' : $oppidan->landlord->identity, ['class'=>'form-control']) !!}
            </div>
         </div>
         <div class="form-group row">
            {!! Form::label('', 'Ngày sinh', ['class'=>'col-md-3']) !!}
            <div class="col-md-8">
                {!! Form::date('birthdayland', $oppidan == null ? '' : $oppidan->landlord->birthday, ['class'=>'form-control']) !!}
            </div>
         </div>
         <hr>
         <h3 class="h3info">thông tin hội viên</h3>
         <br>
         <div class="form-group row">
            {!! Form::label('', 'Đoàn viên:', ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-8">
                {!! Form::label('', 'Đã tham gia', ['class' =>'control-label']) !!}
                {!! Form::radio('union_member', 1, $student->member->union_member == 1 ? true : false, []) !!}
                 {{--  --}}
                 {!! Form::label('', 'Chưa tham gia', ['class' =>'control-label']) !!}
                 {!! Form::radio('union_member', 0, $student->member->union_member == 0 ? true : false, []) !!}
            </div>
         </div>
         <div class="form-group row">
            {!! Form::label('', 'Ngày vào đoàn:', ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-8">
                {!! Form::date('date_union_member', $student->member->date_union_member, ['class' =>'form-control']) !!}
            </div>
         </div>
         <div class="form-group row">
            {!! Form::label('', 'Đảng viên:', ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-8">
                {!! Form::label('', 'Đã tham gia', ['class' =>'control-label']) !!}
                {!! Form::radio('adherer_member', 1, $student->member->adherer_member == 1 ? true : false, []) !!}
                 {{--  --}}
                 {!! Form::label('', 'Chưa tham gia', ['class' =>'control-label']) !!}
                 {!! Form::radio('adherer_member', 0, $student->member->adherer_member == 0 ? true : false, []) !!}
            </div>
         </div>
         <div class="form-group row">
            {!! Form::label('', 'Ngày vào đảng:', ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-8">
                {!! Form::date('date_adherer_member', $student->member->date_adherer_member, ['class' =>'form-control']) !!}
            </div>
         </div>
          <hr>
         <h3 class="h3info">thông tin Thường trú</h3>
         <br>
         <div class="form-group row">
            {!! Form::label('', 'Địa chỉ:', ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-8">
                {!! Form::text('address', $student->risident->address, ['class' =>'form-control']) !!}
            </div>
         </div>
         <div class="form-group row">
            {!! Form::label('', 'Đường:', ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-8">
                {!! Form::text('street_ri', $student->risident->street, ['class' =>'form-control']) !!}
            </div>
         </div>
         <div class="form-group row">
            {!! Form::label('', 'Thành phố:', ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-8">
                {!! Form::text('city_ri', $student->risident->city, ['class' =>'form-control']) !!}
            </div>
         </div>
         <div class="form-group row">
            {!! Form::label('', 'Mã vùng:', ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-8">
                {!! Form::text('postal_code', $student->risident->postal_code, ['class' =>'form-control']) !!}
            </div>
         </div>
         <div class="form-group row">
            {!! Form::label('', 'Điện thoại nhà:', ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-8">
                {!! Form::text('home_phone', $student->risident->home_phone, ['class' =>'form-control']) !!}
            </div>
         </div>
     </div>
     <button class="btn btn-success benphai">Lưu</button>
</div>
{!! Form::close() !!}
@endsection