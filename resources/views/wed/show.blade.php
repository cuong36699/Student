@extends('../layouts/wed')
@section('content')
<div class="content col-md-12">
  <img src="{{ asset('hinhanh/'.$student->avatar) }}"  width="42" height="42"> 
       <c class="h1info">HỒ SƠ SINH VIÊN:</c> 
       <hr>
    <div class="form-group col-md-4">
       
       <div class="khung">
           <div style="text-align: center;" class="form-group">
            <br>
            <img src="{{ asset('hinhanh/'.$student->avatar) }}" class="img-circle"  width="150" height="150">
            </div>
            <div style="text-align: center;" class="form-group row">
                <div class="col-md-12">
                    {!! Form::label('', 'IDSV:', ['class'=>'control-labe fontchu']) !!}
                    {!! Form::label('', $student->id, ['class'=>'fontchitiet']) !!}
                </div>
                <div class="col-md-12">
                    {!! Form::label('', 'Họ và Tên:', []) !!}
                    {!! Form::label('', $student->full_name, ['class'=>'fontchitiet']) !!}
                </div>
                <div class="col-md-12">
                    {!! Form::label('', 'Giới tính:', []) !!}
                        @if ($student->gender == 1)
                            {!! Form::label('', 'Nam', ['class'=>'fontchitiet']) !!}
                        @else 
                            {!! Form::label('', 'Nữ', ['class'=>'fontchitiet']) !!}
                        @endif
                </div>
                <div class="col-md-12">
                    {!! Form::label('', 'Ngày sinh:', []) !!}
                    {!! Form::label('', $student->birthday, ['class'=>'fontchitiet']) !!}
                </div>
                <div class="col-md-12">
                    {!! Form::label('', 'Nơi sinh:', []) !!}
                    {!! Form::label('', $student->home_town, ['class'=>'fontchitiet']) !!}
                </div>
                <div class="col-md-12">
                    {!! Form::label('', 'Dân tộc:', []) !!}
                    {!! Form::label('', $student->nation, ['class'=>'fontchitiet']) !!}
                </div>
                <div class="col-md-12">
                    {!! Form::label('', 'Tôn giáo:', []) !!}
                    {!! Form::label('', $student->religion, ['class'=>'fontchitiet']) !!}
                </div>
            </div> 
       </div>     
    </div>
    <div style="text-align: center;" class="form-group col-md-6">
        <div class="col-md-12">
            <h3 class="h3info">Thông tin riêng:</h3>
            <hr>
        </div>
        <div class="col-md-12">
            {!! Form::label('', 'Bậc:', []) !!}
            {!! Form::label('', $course->department->degree, ['class'=>'fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', 'Năm học:', []) !!}
            {!! Form::label('', $course->department->graduation_year, ['class'=>'fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', 'Ngành học:', []) !!}
            {!! Form::label('', $course->department->department_name, ['class'=>'fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', 'Tên lớp:', []) !!}
            {!! Form::label('', $course->course_name, ['class'=>'fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', 'Số Chứng minh:', []) !!}
            {!! Form::label('', $student->identity, ['class'=>'fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', 'Điện thoại:', []) !!}
            {!! Form::label('', $student->phone, ['class'=>'fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', 'Email:', []) !!}
            {!! Form::label('', $student->email, ['class'=>'fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', 'Địa chỉ thường trú:', []) !!}
            {!! Form::label('', $student->risident->address . ' ' . $student->risident->street . ' ' . $student->risident->city,
                ['class'=>'fontchitiet']) 
            !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', 'Điện thoại nhà:', []) !!}
            {!! Form::label('', $student->risident->home_phone, ['class'=>'fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', 'Địa chỉ ngoại trú:', []) !!}
            {!! Form::label('', $oppidan == null ? '[Chưa cập nhật]': $oppidan->address . ' ' . 
                $oppidan->street . ' ' .
                $oppidan->city . ' ' . 'Phường' . ' ' .
                $oppidan->ward, 
                ['class'=>'fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', 'Đoàn viên:', []) !!}
            {!! Form::label('', $student->member->union_member == 0 ? '[Chưa tham gia]': 'Đã tham gia', ['class'=>'fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', 'Ngày vào đoàn:', []) !!}
            {!! Form::label('', $student->member->date_union_member == null ? '[Chưa cập nhật]': $student->member->date_union_member, ['class'=>'fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', 'Đảng viên:', []) !!}
            {!! Form::label('', $student->member->adherer_member == 0 ? '[Chưa tham gia]': 'Đã tham gia', ['class'=>'fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', 'Ngày vào đảng:', []) !!}
            {!! Form::label('', $student->member->date_adherer_member == null ? '[Chưa cập nhật]': $student->member->date_adherer_member, ['class'=>'fontchitiet']) !!}
        </div>
    </div>
    <div class="col-md-2">
        <a class="btn btn-warning button botron" href="{{ route('wed.edit',$student->id) }}">
            Sửa hồ sơ
        </a>    
    </div>
</div>
@endsection