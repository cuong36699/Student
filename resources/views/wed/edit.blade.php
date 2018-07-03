@extends('../layouts/wed')
@section('content')
{!! Form::model($student->id, array('route' => array('wed.update', $student->id), 'method' => 'put', 'data-parsley-validate' => '')) !!}
<div class="content col-md-12">
    <img src="{{ asset('hinhanh/'.$student->avatar) }}"  width="42" height="42"> 
    <c class="h1info">{{ trans('wed/edit.st_infovio') }}</c> 
    <hr>
    <div class="form-group col-md-2">
       <img class="img-circle" src="{{ asset('hinhanh/'.$student->avatar) }}"  width="150" height="150"> 
    </div>
    <div class="form-group col-md-5">
        <div class="col-md-12">
            {!! Form::label('', trans('wed/edit.st_fn'), ['class'=>'col-md-4']) !!}
            {!! Form::label('', $student->full_name, ['class'=>'col-md-8 fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', trans('wed/edit.st_gd'), ['class'=>'col-md-4']) !!}
            @if ($student->gender == 1)
                {!! Form::label('', trans('wed/edit.st_male'), ['class'=>'col-md-8 fontchitiet']) !!}
            @else 
                {!! Form::label('', trans('wed/edit.st_female'), ['class'=>'col-md-8 fontchitiet']) !!}
            @endif
        </div>
        <div class="col-md-12">
            {!! Form::label('', trans('wed/edit.st_na'), ['class'=>'col-md-4']) !!}
            {!! Form::label('', $student->nation, ['class'=>'col-md-8 fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', trans('wed/edit.st_ids'), ['class'=>'col-md-4']) !!}
            {!! Form::label('', $student->id, ['class'=>'col-md-8 fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', trans('wed/edit.st_bd'), ['class'=>'col-md-4']) !!}
            {!! Form::label('', $student->birthday, ['class'=>'col-md-8 fontchitiet']) !!}
        </div>
    </div>
    <div class="form-group col-md-5">
        <div class="col-md-12">
            {!! Form::label('', trans('wed/edit.st_dp'), ['class'=>'col-md-4']) !!}
            {!! Form::label('', $course->department->department_name, ['class'=>'col-md-8 fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', trans('wed/edit.st_dg'), ['class'=>'col-md-4']) !!}
            {!! Form::label('', $course->department->degree, ['class'=>'col-md-8 fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', trans('wed/edit.st_gy'), ['class'=>'col-md-4']) !!}
            {!! Form::label('', $course->department->graduation_year, ['class'=>'col-md-8 fontchitiet']) !!}
        </div>
        <div class="col-md-12">
            {!! Form::label('', trans('wed/edit.st_c'), ['class'=>'col-md-4']) !!}
            {!! Form::label('', $course->course_name, ['class'=>'col-md-8 fontchitiet']) !!}
        </div> 
         <div class="col-md-12">
            {!! Form::label('', trans('wed/edit.st_ht'), ['class'=>'col-md-4']) !!}
            {!! Form::label('', $student->home_town, ['class'=>'col-md-8 fontchitiet']) !!}
        </div> 
    </div>
    {{-- nhập --}}
    <div style="margin-left: 4px" class="form-group row col-md-12 khung center">
        <h3 class="h3info">{{ trans('wed/edit.st_eps') }}</h3>
        <br>
        <div class="form-group row">
            {!! Form::label('', trans('wed/edit.st_iden'), ['class'=>'col-md-3']) !!}
            <div class="col-md-8 {{ $errors->has('identity') ? 'has-error' : '' }}">
                {!! Form::text('identity',
                    $student->identity, [
                    'class' => 'form-control',
                    'required' => '',
                    'placeholder' => trans('wed/edit.st_iden'),
                    'pattern' => '\d*',
                    'data-parsley-trigger' => 'change focusout',
                    'data-parsley-minlength' => '1',
                    'maxlength' => '9',
                    'data-parsley-maxlength' => '9',
                ]) !!}
                <span class="text-danger">{{ $errors ->first('identity') }}</span>
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('', trans('wed/edit.st_phone'), ['class'=>'col-md-3']) !!}
            <div class="col-md-8 {{ $errors->has('phone') ? 'has-error' : '' }}">
                {!! Form::text('phone',
                    $student->phone, [
                    'class' => 'form-control',
                    'required' => '',
                    'placeholder' => trans('wed/edit.st_phone'),
                    'pattern' => '\d*',
                    'maxlength' => '11',
                    'data-parsley-trigger' => 'change focusout',
                    'data-parsley-minlength' => '9',
                    'data-parsley-maxlength' => '11',
                ]) !!}
                <span class="text-danger">{{ $errors ->first('phone') }}</span>
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('', trans('wed/edit.st_email'), ['class'=>'col-md-3']) !!}
            <div class="col-md-8 {{ $errors->has('email') ? 'has-error' : '' }}">
                {!! Form::email('email',
                    $student->email, [
                    'class' => 'form-control',
                    'placeholder' => trans('wed/edit.st_email'),
                    'required' => '',
                    'maxlength' => '50',
                    'data-parsley-minlength' => '1',
                    'data-parsley-maxlength' => '50',
                    'data-parsley-trigger' => 'change focusout',
                ]) !!}
                <span class="text-danger">{{ $errors ->first('email') }}</span>
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('', trans('wed/edit.st_re'), ['class'=>'col-md-3']) !!}
            <div class="col-md-8 {{ $errors->has('religion') ? 'has-error' : '' }}">
                {!! Form::text('religion',
                    $student->religion, [
                    'class' => 'form-control',
                    'required' => '',
                    'maxlength' => '30',
                    'placeholder' => trans('wed/edit.st_re'),
                    'data-parsley-trigger' => 'change focusout',
                    'data-parsley-maxlength' => '30',
                    'data-parsley-minlength' => '1',
                ]) !!}
                <span class="text-danger">{{ $errors ->first('religion') }}</span>
            </div>
        </div>
        <hr>
        <h3 class="h3info">{{ trans('wed/edit.st_eio') }}</h3>
        <br>
        <div class="form-group row">
            {!! Form::label('', trans('wed/edit.st_ad'), ['class'=>'col-md-3']) !!}
            <div class="col-md-8 {{ $errors->has('addressopi') ? 'has-error' : '' }}">
                {!! Form::text('addressopi',
                    $oppidan == null ? '' : $oppidan->address, [
                    'class' => 'form-control',
                    'required' => '',
                    'maxlength' => '30',
                    'placeholder' => trans('wed/edit.st_ad'),
                    'data-parsley-trigger' => 'change focusout',
                    'data-parsley-maxlength' => '30',
                    'data-parsley-minlength' => '1',
                ]) !!}
                <span class="text-danger">{{ $errors ->first('addressopi') }}</span>
            </div>
        </div> 
        <div class="form-group row">
            {!! Form::label('', trans('wed/edit.st_str'), ['class'=>'col-md-3']) !!}
            <div class="col-md-8 {{ $errors->has('streetopi') ? 'has-error' : '' }}">
                {!! Form::text('streetopi',
                    $oppidan == null ? '' : $oppidan->street, [
                    'class' => 'form-control',
                    'required' => '',
                    'maxlength' => '30',
                    'placeholder' => trans('wed/edit.st_str'),
                    'data-parsley-trigger' => 'change focusout',
                    'data-parsley-maxlength' => '30',
                    'data-parsley-minlength' => '1',
                ]) !!}
                <span class="text-danger">{{ $errors ->first('streetopi') }}</span>
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('', trans('wed/edit.st_city'), ['class'=>'col-md-3']) !!}
            <div class="col-md-8 {{ $errors->has('cityopi') ? 'has-error' : '' }}">
                {!! Form::text('cityopi',
                    $oppidan == null ? '' : $oppidan->city, [
                    'class' => 'form-control',
                    'required' => '',
                    'maxlength' => '30',
                    'placeholder' => trans('wed/edit.st_city'),
                    'data-parsley-trigger' => 'change focusout',
                    'data-parsley-maxlength' => '30',
                    'data-parsley-minlength' => '1',
                ]) !!}
                <span class="text-danger">{{ $errors ->first('cityopi') }}</span>
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('', trans('wed/edit.st_ward'), ['class'=>'col-md-3']) !!}
            <div class="col-md-8 {{ $errors->has('wardopi') ? 'has-error' : '' }}">
                {!! Form::text('wardopi',
                    $oppidan == null ? '' : $oppidan->ward, [
                    'class' => 'form-control',
                    'required' => '',
                    'maxlength' => '30',
                    'placeholder' => trans('wed/edit.st_ward'),
                    'data-parsley-trigger' => 'change focusout',
                    'data-parsley-maxlength' => '30',
                    'data-parsley-minlength' => '1',
                ]) !!}
                <span class="text-danger">{{ $errors ->first('wardopi') }}</span>
            </div>
        </div> 
        <div class="form-group row">
            {!! Form::label('', trans('wed/edit.st_fnl'), ['class'=>'col-md-3']) !!}
            <div class="col-md-8 {{ $errors->has('full_nameland') ? 'has-error' : '' }}">
                {!! Form::text('full_nameland',
                    $oppidan == null ? '' : $oppidan->landlord->full_name, [
                    'class' => 'form-control',
                    'required' => '',
                    'maxlength' => '50',
                    'placeholder' => trans('wed/edit.st_fnl'),
                    'data-parsley-maxleght' => '50',
                    'data-parsley-trigger' => 'change focusout',
                    'data-parsley-minlength' => '1',
                ]) !!}
                <span class="text-danger">{{ $errors ->first('full_nameland') }}</span>
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('', trans('wed/edit.st_gd'), ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-8">
                {!! Form::label('', trans('wed/edit.st_male'), ['class' =>'control-label']) !!}
                {!! Form::radio('genderland', 1,  $oppidan == null ? '' : $oppidan->landlord->gender == 1 ? true : false, ['required' => '']) !!}
                {{--  --}}
                {!! Form::label('', trans('wed/edit.st_female'), ['class' =>'control-label']) !!}
                {!! Form::radio('genderland', 0,  $oppidan == null ? '' : $oppidan->landlord->gender == 0 ? true : false, ['required' => '']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('', trans('wed/edit.st_pl'), ['class'=>'col-md-3']) !!}
            <div class="col-md-8 {{ $errors->has('phoneland') ? 'has-error' : '' }}">
                {!! Form::text('phoneland',
                    $oppidan == null ? '' : $oppidan->landlord->phone, [
                    'class' => 'form-control',
                    'required' => '',
                    'placeholder' => trans('wed/edit.st_pl'),
                    'pattern' => '\d*',
                    'maxlength' => '11',
                    'data-parsley-trigger' => 'change focusout',
                    'data-parsley-minlength' => '9',
                    'data-parsley-maxlength' => '11',
                ]) !!}
                <span class="text-danger">{{ $errors ->first('phoneland') }}</span>
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('', trans('wed/edit.st_il'), ['class'=>'col-md-3']) !!}
            <div class="col-md-8 {{ $errors->has('identityland') ? 'has-error' : '' }}">
                {!! Form::text('identityland',
                    $oppidan == null ? '' : $oppidan->landlord->identity, [
                    'class' => 'form-control',
                    'required' => '',
                    'placeholder' => trans('wed/edit.st_il'),
                    'pattern' => '\d*',
                    'data-parsley-trigger' => 'change focusout',
                    'data-parsley-minlength' => '1',
                    'maxlength' => '9',
                    'data-parsley-maxlength' => '9',
                ]) !!}
                <span class="text-danger">{{ $errors ->first('identityland') }}</span>
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('', trans('wed/edit.st_bl'), ['class'=>'col-md-3']) !!}
            <div class="col-md-8 {{ $errors->has('birthdayland') ? 'has-error' : '' }}">
                {!! Form::date('birthdayland',
                    $oppidan == null ? '' : $oppidan->landlord->birthday, [
                    'class' => 'form-control',
                    'required' => '',
                    'placeholder' => trans('wed/edit.st_bl'),
                    'min' => '1800-01-01',
                    'data-parsley-trigger' => 'change focusout',
                    'max' => '2018-12-31',
                ]) !!}
                <span class="text-danger">{{ $errors ->first('birthdayland') }}</span>
            </div>
        </div>
        <hr>
        <h3 class="h3info">{{ trans('wed/edit.st_eim') }}</h3>
        <br>
        <div class="form-group row">
            {!! Form::label('', trans('wed/edit.st_union'), ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-8">
                {!! Form::label('', trans('wed/edit.st_is'), ['class' =>'control-label']) !!}
                {!! Form::radio('union_member', 1, $student->member->union_member == 1 ? true : false, []) !!}
                 {{--  --}}
                 {!! Form::label('', trans('wed/edit.st_out'), ['class' =>'control-label']) !!}
                 {!! Form::radio('union_member', 0, $student->member->union_member == 0 ? true : false, []) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('', trans('wed/edit.st_dateUnion'), ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-8">
                {!! Form::date('date_union_member', $student->member->date_union_member, ['class' =>'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('', trans('wed/edit.st_adh'), ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-8">
                {!! Form::label('', trans('wed/edit.st_is'), ['class' =>'control-label']) !!}
                {!! Form::radio('adherer_member', 1, $student->member->adherer_member == 1 ? true : false, []) !!}
                 {{--  --}}
                 {!! Form::label('', trans('wed/edit.st_out'), ['class' =>'control-label']) !!}
                 {!! Form::radio('adherer_member', 0, $student->member->adherer_member == 0 ? true : false, []) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('', trans('wed/edit.st_dateAdh'), ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-8">
                {!! Form::date('date_adherer_member', $student->member->date_adherer_member, ['class' =>'form-control']) !!}
            </div>
        </div>
        <hr>
        <h3 class="h3info">{{ trans('wed/edit.st_eir') }}</h3>
        <br>
        <div class="form-group row">
            {!! Form::label('', trans('wed/edit.st_ad'), ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-8 {{ $errors->has('address') ? 'has-error' : '' }}">
                {!! Form::text('address',
                    $student->risident->address, [
                    'class' => 'form-control',
                    'required' => '',
                    'maxlength' => '30',
                    'placeholder' => trans('wed/edit.st_ad'),
                    'data-parsley-trigger' => 'change focusout',
                    'data-parsley-maxlength' => '30',
                    'data-parsley-minlength' => '1',
                ]) !!}
                <span class="text-danger">{{ $errors ->first('address') }}</span>
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('', trans('wed/edit.st_str'), ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-8 {{ $errors->has('street') ? 'has-error' : '' }}">
                {!! Form::text('street',
                    $student->risident->street, [
                    'class' => 'form-control',
                    'required' => '',
                    'maxlength' => '30',
                    'placeholder' => trans('wed/edit.st_str'),
                    'data-parsley-trigger' => 'change focusout',
                    'data-parsley-maxlength' => '30',
                    'data-parsley-minlength' => '1',
                ]) !!}
                <span class="text-danger">{{ $errors ->first('street') }}</span>
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('', trans('wed/edit.st_city'), ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-8 {{ $errors->has('city') ? 'has-error' : '' }}">
                {!! Form::text('city',
                    $student->risident->city, [
                    'class' => 'form-control',
                    'required' => '',
                    'maxlength' => '30',
                    'placeholder' => trans('wed/edit.st_city'),
                    'data-parsley-trigger' => 'change focusout',
                    'data-parsley-maxlength' => '30',
                    'data-parsley-minlength' => '1',
                ]) !!}
                <span class="text-danger">{{ $errors ->first('city') }}</span>
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('', trans('wed/edit.st_pos'), ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-8 {{ $errors->has('postal_code') ? 'has-error' : '' }}">
                {!! Form::text('postal_code',
                    $student->risident->postal_code, [
                    'class' => 'form-control',
                    'required' => '',
                    'maxlength' => '30',
                    'placeholder' => trans('wed/edit.st_pos'),
                    'data-parsley-trigger' => 'change focusout',
                    'data-parsley-maxlength' => '30',
                    'data-parsley-minlength' => '1',
                ]) !!}
                <span class="text-danger">{{ $errors ->first('postal_code') }}</span>
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('', trans('wed/edit.st_hPhone'), ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-8 {{ $errors->has('home_phone') ? 'has-error' : '' }}">
                {!! Form::text('home_phone',
                    $student->risident->home_phone, [
                    'class' => 'form-control',
                    'required' => '',
                    'placeholder' => trans('wed/edit.st_hPhone'),
                    'pattern' => '\d*',
                    'maxlength' => '11',
                    'data-parsley-trigger' => 'change focusout',
                    'data-parsley-minlength' => '9',
                    'data-parsley-maxlength' => '11',
                ]) !!}
                <span class="text-danger">{{ $errors ->first('home_phone') }}</span>
            </div>
         </div>
    </div>
    <div class="form-group">
        <div  class="col-md-11">
            <button class="btn btn-success benphai">{{ trans('wed/edit.bt_edit') }}</button> 
        </div>
        <div>
            <a class="btn btn-warning benphai" href="{{ route('wed.show',$student->id) }}">
                {{ trans('wed/edit.bt_cancel') }}
            </a>
        </div> 
    </div>
</div>
{!! Form::close() !!}
@endsection