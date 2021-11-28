@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('students.payment')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('students.payment')}} {{$student->name}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="post"  action="{{ route('payment.update', $payment->id) }}" autocomplete="off">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{trans('fees.amount')}} : <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="debit" type="number" value="{{$payment->amount}}">
                                    <input  type="hidden" name="student_id"  value="{{$student->id}}" class="form-control">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{trans('main.note')}} : <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$payment->description}}</textarea>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('main.save')}}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @toastr_js
    @toastr_render

@endsection