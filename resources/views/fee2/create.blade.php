@extends('layouts.app')
@section('content')
    <div class="card">
        {{-- Thêm thì các bạn sử dụng cho chị post --}}
        <form method="post" action="{{ route('feee.store') }}">
            @csrf
            <div class=" card-header">
                <h4 class="card-title">
                    Thêm lớp
                </h4>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <label>Chọn ngành</label>
                     <select name="idMajor" id=""class="form-control" >
                        <option value="">-----</option>
                        @foreach($majors as $major)
                    <option value="{{ $major->idMajor  }}"> {{$major->nameMajor}}</option>
                        @endforeach
                    </select>
                    <label>Chọn khóa</label>
                     <select name="idCourse" id=""class="form-control" >
                        <option value="">-----</option>
                        @foreach($courses as $course)
                    <option value="{{ $course->idCourse  }}">Khóa{{$course->nameCourse}}</option>
                        @endforeach
                    </select>
                     <label>Học phí</label>
                    <input type="number" name="fee" class="form-control">
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