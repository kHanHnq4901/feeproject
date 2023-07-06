@extends('layouts.app')
@section('content')
<div class="content"> 
  <div class="text-right">
        <a href="{{ route('feee.create')}}" class="btn btn-info btn-fill btn-wd">Thêm </a>
    </div>
    <br>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Danh sách học phí các ngành</h4>
            <form class="navbar-form navbar-left navbar-search-form" role="search">
            </form>
        </div>

        <div class="card-content table-responsive table-full-width">
            <table class="table table-striped">
                <thead>
                    <th class="text-center">Ngành</th>
                    <th class="text-center">Khóa</th>
                    <th class="text-center">Học phí</th>
                </thead>
                <tbody>
                    @foreach ($fees as $fee)
                        <tr>
                            <th class="text-center">{{$fee->nameMajor}}</th>
                            <th class="text-center">{{$fee->nameCourse}}</th>
                            <th class="text-center">{{$fee->fee}}</th>
                        </tr>
                    @endforeach
                
                </tbody>
            </table>
        </div>  
    </div>
</div>
@endsection