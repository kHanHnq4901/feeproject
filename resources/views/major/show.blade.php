@extends('layouts.app')
@section('content')
<div class="content"> 
    <div class="text-right">
        <a href="{{ route('course.create') }}" class="btn btn-info btn-fill btn-wd">Thêm khóa</a>
    </div>
    <br>
    <div class="card">
        <div class="card-header">
        <h4 class="card-title">Danh sách các khoá</h4>
            <form class="navbar-form navbar-left navbar-search-form" role="search">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" value="{{ $search }}" name="search" class="form-control"
                        placeholder="Tìm kiếm theo tên khóa">
                </div>
            </form>
        </div>

        <div class="card-content table-responsive table-full-width">
            <table class="table table-striped">
                <thead>
                    <th class="text-center">Mã</th>
                    <th class="text-center">Tên</th>
                    <th class="text-center">Xem</th>
                    <th class="text-center">Sửa</th>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <th class="text-center">{{ $course->idCourse }}</th>
                            <th class="text-center">Khóa {{ $course->nameCourse }}</th>
                            <th class="text-center">
                                <form action = '{{ route('grade.index')}}' method="get">
                                     @csrf
                                    <input type='hidden' name='idCourse' value='{{$course->idCourse }} '>
                                    <input type='hidden'name='idMajor' value='{{ $idMajor}} '>
                                    <button class="btn btn-primary btn-sm">Xem</button>
                                </form>
                            </th>
                            <th class="text-center"><a class="btn btn-warning btn-sm"
                                    href="{{ route('course.edit', $course->idCourse) }}">Sửa</a></th>
                        </tr>
                   @endforeach

                </tbody>
            </table>
            <div class="text-center">
                
               {{ $courses->appends(['search' => $search])->links() }} 
            </div>
        </div>
    </div>
</div>
@endsection