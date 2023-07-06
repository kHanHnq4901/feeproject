@extends('layouts.app')
@section('content')
    <div class="card">
        {{-- Thêm thì các bạn sử dụng cho chị post --}}
        <form method="post" action="{{ route('scholarship.update', $scholarship->idScholarship) }}">
            @method("PUT")
            @csrf
            <div class=" card-header">
                <h4 class="card-title">
                    Sửa Học Bổng
                </h4>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <label>Số tiền</label>
                    <input type="number" name="fee" class="form-control" value="{{$scholarship->fee}}">
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