@extends('layouts.app')
@section('content')
<div class="content"> 
    <div class="text-right">
        <a href="{{route('scholarship.create') }}" class="btn btn-info btn-fill btn-wd">Thêm học bổng </a>
    </div>
    <br>
    <div class="card">
        <div class="card-header">
        <h4 class="card-title">Danh sách học bổng </h4>
        </div>

        <div class="card-content table-responsive table-full-width">
            <table class="table table-striped">
                <thead>
                    <th class="text-center">Mã</th>
                    <th class="text-center">Học bổng</th>
                    <th class="text-center">Sửa</th>
                    
                </thead>
                <tbody>
                  @foreach ($scholarships as $scholarship) 
                        <tr>
                            <th class="text-center">{{ $scholarship->idScholarship }}</th>
                            <th class="text-center">{{ $scholarship->fee }}</th> 
                            <th class="text-center"><a class="btn btn-warning btn-sm"
                                    href="{{ route('scholarship.edit', $scholarship->idScholarship) }}">Sửa</a></th>
                        </tr>
                   @endforeach 
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection