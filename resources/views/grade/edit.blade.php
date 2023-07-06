@extends('layouts.app')
@section('content')
    <div class="card">
        {{-- Thêm thì các bạn sử dụng cho chị post --}}
        <form method="post" action="{{ route('grade.update',$grade->idGrade) }}">
            @method("PUT");
            @csrf
            <div class=" card-header">
                <h4 class="card-title">
                    Sửa lớp
                </h4>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <label>Tên lớp</label>
                <input type="text" name="name" class="form-control" value='{{$grade->nameGrade}}'>
                    <label>Chọn ngành</label>
                     <select name="idMajor" id=""class="form-control" >
                        <option value="">-----</option>
                        @foreach($majors as $major)
                            <option value="{{ $major->idMajor  }}" @if($grade->idMajor == $major->idMajor) {{'selected'}} @endif> {{$major->nameMajor}}</option>
                        @endforeach
                    </select>
                    <label>Chọn khóa</label>
                     <select name="idCourse" id=""class="form-control" >
                        <option value="">-----</option>
                        @foreach($courses as $course)
                    <option value="{{ $course->idCourse  }}" @if($grade->idCourse == $course->idCourse) {{'selected'}} @endif>Khóa {{$course->nameCourse}}</option>
                        @endforeach
                    </select>
                    @if (Session::exists('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error.message') }}
                    </div>
                @endif
                </div>
                <button type="submit" class="btn btn-fill btn-info">Sửa</button>
            </div>
        </form>
    </div>
@endsection