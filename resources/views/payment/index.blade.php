@extends('layouts.app')
@section('content')
<div class="content"> 
    <div class="text-right">
        <a href="{{ route('payment.create') }}" class="btn btn-info btn-fill btn-wd">Thêm </a>
    </div>
    <br>
    <div class="card">
        <div class="card-header">
        <h4 class="card-title">Danh sách các hình thức nộp </h4>
        </div>

        <div class="card-content table-responsive table-full-width">
            <table class="table table-striped">
                <thead>
                    <th class="text-center">Mã</th>
                    <th class="text-center">Tên</th>
                    <th class="text-center">Giảm học phí</th>
                    <th class="text-center">Sửa</th>
                    
                </thead>
                <tbody>
                   @foreach ($payments as $payment) 
                        <tr>
                            <th class="text-center">{{ $payment->idPaymentOption  }}</th>
                            <th class="text-center">{{ $payment->namePaymentOption }}</th>
                            <th class="text-center">{{ $payment->discount ."%" }} </th>  
                            <th class="text-center"><a class="btn btn-warning btn-sm"
                                    href="{{ route('payment.edit', $payment->idPaymentOption) }}">Sửa</a></th>
                           
                        </tr>
                   @endforeach 

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection