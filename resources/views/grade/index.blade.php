@extends('layouts.app')
@section('content')
<div class="content"> 
  <div class="text-right">
        <a href="{{ route('grade.create')}}" class="btn btn-info btn-fill btn-wd">Thêm lớp</a>
    </div>
    <br>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Danh sách các lớp</h4>
            <form class="navbar-form navbar-left navbar-search-form" role="search">
            </form>
        </div>

        <div class="card-content table-responsive table-full-width">
            <table class="table table-striped">
                <thead>
                    <th class="text-center">Mã</th>
                    <th class="text-center">Tên</th>
                    <th class="text-center">Ngành</th>
                    <th class="text-center">Khóa</th>
                    <th class="text-center">Xem</th>
                    <th class="text-center">Sửa</th>
                </thead>
                <tbody>
                    @foreach ($grades as $grade)
                        <tr>
                            <th class="text-center">{{$grade->idGrade}}</th>
                            <th class="text-center">{{$grade->nameGrade}}</th>
                            <th class="text-center">{{$grade->nameMajor}}</th>
                            <th class="text-center">{{$grade->nameCourse}}</th>
                             <th class="text-center"><a class="btn btn-warning btn-sm"
                                    href="{{ route('alumnus.show', $grade->idGrade) }}">Xem</a></th>
                            <th class="text-center"><a class="btn btn-warning btn-sm"
                                    href="{{ route('grade.edit', $grade->idGrade) }}">Sửa</a></th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
             <div class="text-center">
                
               {{ $grades->appends(['search' => $search])->links() }} 
            </div>
        </div>  
    </div>
</div>
@endsection