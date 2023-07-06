@extends('layouts.app')
@section('content')
    <div class="card">
        {{-- Thêm thì các bạn sử dụng cho chị post --}}
        <form method="post" action="{{ route('major.update', $major->idMajor) }}">
            @method("PUT")
            @csrf
            <div class=" card-header">
                <h4 class="card-title">
                    Sửa ngành học
                </h4>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <label>Sửa ngành</label>
                    <input type="text" name="name" class="form-control" value="{{ $major->nameMajor }}">
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