@extends('layouts.app')
@section('content')
    <div class="card">
        {{-- Thêm thì các bạn sử dụng cho chị post --}}
        <form method="post" action="{{ route('course.store') }}">
            @csrf
            <div class=" card-header">
                <h4 class="card-title">
                    Thêm khóa học
                </h4>
            </div>
            <div class="card-content">
                <div class="form-group">
                        <label>Thêm khóa</label>
                            <input type="number" name="name" class="form-control"><br>
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