@extends('layouts.app')
@section('content')
<div class="content"> 
    <br>
    <div class="card">
        <div class="card-header">
        <h4 class="card-title">Danh sách hoá đơn</h4>
             <h4 class="text-right">Tổng tiền trong tháng {{$id}} : {{ $billss->sum('feeBill') }}</h4>
             <h4 class="text-right">Số hóa đơn : {{ $billss->count('fee') }}</h4>
            <form class="navbar-form navbar-left navbar-search-form" role="search">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" value="{{-- $search --}}" name="search" class="form-control"
                        placeholder="Tìm kiếm theo tên sinh viên    ">
                </div>
            </form>
        </div>
        
        <div class="card-content table-responsive table-full-width">
           
            <table class="table table-striped">
                <thead>
                    <th class="text-center">Mã</th>
                    <th class="text-center">Mã Sinh Viên</th>
                    <th class="text-center">Tên sinh viên</th>
                    <th class="text-center">Hình thức nộp</th>
                    <th class="text-center">Số tiền</th>
                    <th class="text-center">Ngày</th>
                </thead>
                <tbody>
                    @foreach ($bills as $bill)
                        <tr>
                            <th class="text-center">{{ $bill->idBill }}</th>
                            <th class="text-center">{{ $bill->idStudent }}</th>
                            <th class="text-center">{{ $bill->nameStudent }}</th>
                            <th class="text-center">{{ $bill->namePaymentOption }}</th>
                            <th class="text-center">{{ $bill->feeBill }}</th>
                            <th class="text-center">{{ $bill->date }}</th>
                        </tr>
                   @endforeach
                </tbody>
            </table>
            <div class="text-left">
                <a href="{{route('bill.index')}}">Quay lại</a>  
            </div>
            <div class="text-center">
               {{ $bills->appends(['search' => $search])->links() }} 
            </div>
        </div>
    </div>
</div>
@endsection