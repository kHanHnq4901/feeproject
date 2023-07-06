@extends('layouts.app')
@section('content')
    <div class="card">
        {{-- Thêm thì các bạn sử dụng cho chị post --}}
        <form method="post" action="{{ route('alumnus.update',$student->idStudent) }}">
            @method("PUT")
            @csrf
            <div class="card-content">
                <div class="form-group">
                    <label>Mã sinh viên</label>
                    <input type="text"  disabled class="form-control" value="{{ $student->idStudent}}">
                    <label>Họ và tên</label>
                    <input type="text" name="nameStudent" class="form-control" value="{{ $student->nameStudent}}">
                    <label>Giới tính</label><br>
                    <input type="radio" name="gender" value="1" @if ($student->gender ===1) {{"checked"}} @endif> Nam
                    <input type="radio" name="gender" value="0" @if ($student->gender ===0) {{"checked"}} @endif> Nữ<br>
                    <label>Ngày sinh</label>
                    <input type="date" name="dateBirth" class="form-control" value="{{ $student->dateBirth}}">
                    <label>Địa chỉ</label>
                    <input type="text" name="address" class="form-control"  value="{{ $student->address}}">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control"  value="{{ $student->email}}">
                    <label>Lớp</label>
                    <select name="idGrade" id=""class="form-control" >
                         @foreach($grades as $grade)
                            <option value="{{ $grade->idGrade}}"@if($student->idGrade == $grade->idGrade ) {{"selected"}} @endif>@if($grade->idMajor==1)BKD @else BKN @endif {{ $grade->nameGrade  }}K{{$grade->nameCourse}}</option>
                        @endforeach
                    </select>
                    <label>Học bổng</label>
                    <select name="idScholarship" id="" class="form-control">
                        <option value="">-----</option>
                        @foreach($scholarships as $scholarship)
                            <option value="{{ $scholarship->idScholarship }}"@if($student->idScholarship == $scholarship->idScholarship ) {{"selected"}} @endif>{{ $scholarship->fee }} vnd</option>
                        @endforeach
                    </select>
                    @if (Session::exists('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error.message') }}
                    </div>
                @endif
                @if (Session::exists('success'))
                    <div class="alert alert-danger">
                        {{ Session::get('success.message') }}
                    </div>
                @endif
                </div>
                <button type="submit" class="btn btn-fill btn-info">Sửa</button>
            </div>
        </form>
    </div>
@endsection