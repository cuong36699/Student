@extends('../layouts/wed')
@section('content')
<div class="content col-md-12">
    <img src="{{ asset('hinhanh/'.$student->avatar) }}"  width="42" height="42"> 
    <c class="h1info">{{ trans('wed/show.st_infovio') }}</c> 
    <hr>
    <div class="form-group col-md-4">   
       <div class="khung">
            <div class="form-group center">
                <br>
                <img src="{{ asset('hinhanh/'.$student->avatar) }}" class="img-circle"  width="150" height="150">
            </div>
            <div class="form-group row center">
                <div class="col-md-12">
                    {!! Form::label('', trans('wed/show.st_ids'), ['class'=>'control-labe fontchu']) !!}
                    {!! Form::label('', $student->id, ['class'=>'fontchitiet']) !!}
                </div>
                <div class="col-md-12">
                    {!! Form::label('', trans('wed/show.st_fn'), []) !!}
                    {!! Form::label('', $student->full_name, ['class'=>'fontchitiet']) !!}
                </div>
                <div class="col-md-12">
                    {!! Form::label('', trans('wed/show.st_gd'), []) !!}
                    @if ($student->gender == 1)
                        {!! Form::label('', trans('wed/show.st_male'), ['class'=>'fontchitiet']) !!}
                    @else 
                        {!! Form::label('', trans('wed/show.st_female'), ['class'=>'fontchitiet']) !!}
                    @endif
                </div>
                <div class="col-md-12">
                    {!! Form::label('', trans('wed/show.st_bd'), []) !!}
                    {!! Form::label('', $student->birthday, ['class'=>'fontchitiet']) !!}
                </div>
                <div class="col-md-12">
                    {!! Form::label('', trans('wed/show.st_ht'), []) !!}
                    {!! Form::label('', $student->home_town, ['class'=>'fontchitiet']) !!}
                </div>
                <div class="col-md-12">
                    {!! Form::label('', trans('wed/show.st_na'), []) !!}
                    {!! Form::label('', $student->nation, ['class'=>'fontchitiet']) !!}
                </div>
                <div class="col-md-12">
                    {!! Form::label('', trans('wed/show.st_re'), []) !!}
                    {!! Form::label('', $student->religion, ['class'=>'fontchitiet']) !!}
                </div>
            </div> 
        </div>     
    </div>
    <div class="form-group col-md-6 center">
        <div class="col-md-12">
            <h3 class="h3info">{{ trans('wed/show.nt_infos') }}</h3>
            <hr>
        </div>
        <div class="col-md-12">
            {!! Form::label('', trans('wed/show.st_dg'), []) !!}
            {!! Form::label('', $course->department->degree, ['class'=>'fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', trans('wed/show.st_gy'), []) !!}
            {!! Form::label('', $course->department->graduation_year, ['class'=>'fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', trans('wed/show.st_dp'), []) !!}
            {!! Form::label('', $course->department->department_name, ['class'=>'fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', trans('wed/show.st_c'), []) !!}
            {!! Form::label('', $course->course_name, ['class'=>'fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', trans('wed/show.st_iden'), []) !!}
            {!! Form::label('', $student->identity, ['class'=>'fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', trans('wed/show.st_phone'), []) !!}
            {!! Form::label('', $student->phone, ['class'=>'fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', trans('wed/show.st_email'), []) !!}
            {!! Form::label('', $student->email, ['class'=>'fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', trans('wed/show.st_risident'), []) !!}
            {!! Form::label('', $student->risident->address . ' ' .
                $student->risident->street . ' ' . 
                $student->risident->city,
                ['class'=>'fontchitiet']) 
            !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', trans('wed/show.st_hPhone'), []) !!}
            {!! Form::label('', $student->risident->home_phone, ['class'=>'fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', trans('wed/show.st_oppi'), []) !!}
            {!! Form::label('', $oppidan == null ? trans('wed/show.st_update') : $oppidan->address . ' ' . 
                $oppidan->street . ' ' .
                $oppidan->city . ' ' . 'Phường' . ' ' .
                $oppidan->ward, 
                ['class'=>'fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', trans('wed/show.st_union'), []) !!}
            {!! Form::label('', $student->member->union_member == 0 ? trans('wed/show.st_out') : trans('wed/show.st_is'), ['class'=>'fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', trans('wed/show.st_dateUnion'), []) !!}
            {!! Form::label('', $student->member->date_union_member == null ? trans('wed/show.st_update') : $student->member->date_union_member, ['class'=>'fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', trans('wed/show.st_adh'), []) !!}
            {!! Form::label('', $student->member->adherer_member == 0 ? trans('wed/show.st_out') : trans('wed/show.st_is'), ['class'=>'fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', trans('wed/show.st_dateAdh'), []) !!}
            {!! Form::label('', $student->member->date_adherer_member == null ? trans('wed/show.st_update') : $student->member->date_adherer_member, ['class'=>'fontchitiet']) !!}
        </div>
    </div>
    <div class="col-md-2">
        <a class="btn btn-warning button botron" href="{{ route('wed.edit',$student->id) }}">
           {{ trans('wed/show.bt_edit') }}
        </a>    
    </div>
</div>
@endsection