@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('students.promotions')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('students.promotions')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <h6 style="color: red;font-family: Cairo">{{trans('students.old_grade')}}</h6><br>

                    <form method="post" action="{{ route('promotions.update', $promotion->id) }}">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState">{{trans('students.grade')}}</label>
                                <select class="custom-select mr-sm-2" name="grade_id" required>
                                    <option selected disabled>{{trans('main.choose')}}...</option>
                                    @foreach($grades as $grade)
                                        <option
                                            @if($promotion->from_grade_id === $grade->id) selected @endif
                                            value="{{$grade->id}}">{{$grade->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="Classroom_id">{{trans('students.classroom')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="classroom_id" required>
                                    <option value="{{$promotion->from_classroom_id}}" selected>{{$promotion->classroom->name}}</option>
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="section_id">{{trans('students.section')}} : </label>
                                <select class="custom-select mr-sm-2" name="section_id" required>
                                    <option value="{{$promotion->from_section_id}}" selected>{{$promotion->section->name}}</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="academic_year">{{trans('students.academic_year')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="academic_year">
                                        <option selected disabled>{{trans('main.choose')}}...</option>
                                        @php
                                            $current_year = date("Y");
                                        @endphp
                                        @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                            <option
                                                @if($year == $promotion->old_academic) selected @endif
                                            value="{{ $year}}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>



                        </div>
                        <br><h6 style="color: red;font-family: Cairo">{{trans('students.new_grade')}}</h6><br>

                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState">{{trans('students.grade')}}</label>
                                <select class="custom-select mr-sm-2" name="grade_id_new" >
                                    <option selected disabled>{{trans('main.choose')}}...</option>
                                    @foreach($grades as $grade)
                                        <option
                                            @if($promotion->to_grade_id === $grade->id) selected @endif
                                        value="{{$grade->id}}">{{$grade->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="Classroom_id">{{trans('students.classroom')}}: <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="classroom_id_new" >
                                    <option value="{{$promotion->to_classroom_id}}" selected>{{$promotion->classroom_to->name}}</option>
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="section_id">{{trans('students.section')}} </label>
                                <select class="custom-select mr-sm-2" name="section_id_new" >
                                    <option value="{{$promotion->to_section_id}}" selected>{{$promotion->section_to->name}}</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="academic_year">{{trans('students.academic_year')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="new_academic_year">
                                        <option selected disabled>{{trans('main.choose')}}...</option>
                                        @php
                                            $current_year = date("Y");
                                        @endphp
                                        @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                            <option
                                                @if($year == $promotion->new_academic) selected @endif
                                                value="{{ $year}}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>


                        </div>
                        <button type="submit" class="btn btn-primary">{{trans('main.save')}}</button>
                    </form>

                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
@endsection
@section('js')

    @toastr_js
    @toastr_render
@endsection
