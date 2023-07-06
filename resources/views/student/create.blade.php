@extends('layouts.app')
@section('content')
    <div class="card">
        {{-- Thêm thì các bạn sử dụng cho chị post --}}
        <form method="post" action="{{ route('alumnus.store') }}">  
            @csrf
            <div class=" card-header">
               <h4>Thêm sinh viên</h4>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <label>Họ và tên</label>
                    <input type="text" name="nameStudent" class="form-control">
                    <label>Giới tính</label><br>
                    <input type="radio" name="gender" value="1" class=""> Nam
                    <input type="radio" name="gender" value="0" class=""> Nữ<br>
                    <label>Ngày sinh</label>
                    <input type="date" name="dateBirth" class="form-control">
                    <label>Địa chỉ</label>
                    <input type="text" name="address" class="form-control">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                    <label>Lớp</label>
                    <select name="idGrade" id=""class="form-control" >
                        <option value="">-----</option>
                        @foreach($grades as $grade)
                    <option value="{{ $grade->idGrade  }}">@if($grade->idMajor==1)BKD @else BKN @endif {{ $grade->nameGrade  }}K{{$grade->nameCourse}}</option>
                        @endforeach
                    </select>
                    <label>Hình thức nộp học phí</label>
                    <select name="idPaymentOption" id="" class="form-control">
                        <option value="">-----</option>
                        @foreach($paymentoptions as $paymentOption)
                        <option value="{{ $paymentOption->idPaymentOption  }}">{{ $paymentOption->namePaymentOption }}</option>
                        @endforeach
                    </select>
                    <label>Học bổng</label>
                    <select name="idScholarship" id="" class="form-control">
                    <option value="">-----</option>
                        @foreach($scholarships as $scholarship)
                        <option value="{{ $scholarship->idScholarship }}">{{ $scholarship->fee }} vnd</option>
                        @endforeach
                    </select>
                    <input type='hidden' name='idCourse' value='{{ $grade->idCourse }} '>
                    <input type='hidden'name='idMajor' value='{{ $grade->idMajor}} '>
                    @if (Session::exists('error'))
												<div class="alert alert-danger">
													{{ Session::get('error.message') }}
												</div>
											@endif
                </div>
                <button type="submit" class="btn btn-fill btn-info">Thêm</button>
            </div>
        </form>
    </div>
@endsection