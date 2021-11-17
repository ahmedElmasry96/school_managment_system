@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{trans('students.InvoicesFees')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
{{trans('students.InvoicesFees')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{trans('main.name')}}</th>
                                            <th>{{trans('students.feeType')}}</th>
                                            <th>{{trans('fees.amount')}}</th>
                                            <th>{{trans('students.grade')}}</th>
                                            <th>{{trans('students.classroom')}}</th>
                                            <th>{{trans('main.note')}}</th>
                                            <th>{{trans('main.controls')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($feeInvoices as $feeInvoice)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$feeInvoice->student->name}}</td>
                                            <td>{{$feeInvoice->fee->title}}</td>
                                            <td>{{ number_format($feeInvoice->amount, 2) }}</td>
                                            <td>{{$feeInvoice->grade->name}}</td>
                                            <td>{{$feeInvoice->classroom->name}}</td>
                                            <td>{{$feeInvoice->description}}</td>
                                                <td> 
                                                    <a href="{{route('feeInvoices.edit',$feeInvoice->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <form method="Post" action="{{route('feeInvoices.destroy', $feeInvoice->id)}}" style="display: inline;">
                                                        @csrf
                                                           {{method_field('DELETE')}}
                                                           <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('{{trans("messages.confirm")}}')"><i class="ti-trash"></i></button>
                   
                                                       </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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