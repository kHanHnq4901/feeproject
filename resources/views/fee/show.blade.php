@extends('layouts.app')
@section('content')
    <div class="card">
        {{-- Thêm thì các bạn sử dụng cho chị post --}}
    <form method="post" action="{{ route('bill.store')}} " >
            @csrf
            <div class=" card-header">
                <h4 class="card-title">
                    Nộp học phí
                </h4>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <label>Mã sinh viên</label>
                    <input type="text" disabled class="form-control" value="{{$student->idStudent}}">
                    <input type="hidden" name="idStudent"  class="form-control" value="{{$student->idStudent}}">
                    <label>Họ tên sinh viên</label>
                    <input type="text" name="nameStudent" class="form-control" value="{{$student->nameStudent}}">
                    <label>Lớp</label>
                    <input type="hidden" name="idGrade" class="form-control" value="{{$student->idGrade}}">
                    <input class="form-control"  @foreach($grades as $grade) @if($grade->idGrade==$student->idGrade) value='{{ $grade->nameGrade}}'@endif @endforeach>
                    <label>Hình thức nộp học phí</label>
                    <input type="hidden" name="idPaymentOption" class="form-control" value="{{$student->idPaymentOption}}">
                    <input class="form-control"  @foreach($paymentoptions as $paymentoption) @if($paymentoption->idPaymentOption==$student->idPaymentOption) value='{{ $paymentoption->namePaymentOption}}'@endif @endforeach>
                    <label>
                        Ghi chú : học phí còn nợ {{$student->debtfees}}
                    </label><br>
                    <label>Nhập số tiền đóng</label>
                    <input type="number" name="fee" class="form-control"> 
                    @if (Session::exists('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error.message') }}
                    </div>
                @endif
                </div>
                <button type="submit" class="btn btn-fill btn-info">In ra hóa đơn</button>
            </div>
        </form>
    </div>
@endsection