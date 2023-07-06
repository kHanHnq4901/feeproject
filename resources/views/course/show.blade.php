@extends('layouts.app')
@section('content')
<div class="content"> 
    <div class="text-right">
        <a href="{{ route('major.create') }}" class="btn btn-info btn-fill btn-wd">Thêm ngành</a>
    </div>
    <br>
    <div class="card">
        <div class="card-header">
        <h4 class="card-title">Danh sách các ngành</h4>
            <form class="navbar-form navbar-left navbar-search-form" role="search">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" value="{{ $search }}" name="search" class="form-control"
                        placeholder="Tìm kiếm theo tên ngành">
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
                    @foreach ($majors as $major)
                        <tr>
                            <th class="text-center">{{ $major->idMajor }}</th>
                            <th class="text-center">{{ $major->nameMajor }}</th>
                            <th class="text-center">
                                <form action = '{{ route('grade.index')}}' method="get">
                                     @csrf
                                    <input type='hidden' name='idCourse' value='{{ $idCourse }} '>
                                    <input type='hidden' name='idMajor' value='{{ $major->idMajor}} '>
                                    <button class="btn btn-primary btn-sm">Xem</button>
                                </form>
                            </th>
                            <th class="text-center"><a class="btn btn-warning btn-sm"
                                    href="{{ route('major.edit',$major->idMajor) }}">Sửa</a></th>
                        </tr>
                   @endforeach

                </tbody>
            </table>
            <div class="text-center">
                
               {{ $majors->appends(['search' => $search])->links() }} 
            </div>
        </div>
    </div>
</div>
@endsection