@extends('layouts.app')
@section('content')
   <div class="content">
               <div class="card">
                    <div class="text-right">
        <a href="{{ route('alumnus.create') }}" class="btn btn-info btn-fill btn-wd">Thêm sinh viên</a>
        <a href="{{ route('alumnus.add-by-excel') }}" class="btn btn-info btn-fill btn-wd">Thêm bằng excel</a>
        <a href="{{ route('alumnus.download-excel') }}" class="btn btn-info btn-fill btn-wd">Xuất file excel</a>
    </div>
        <div class="card-header">
           <h4 class="card-title">Danh sách sinh viên</h4>
                <form method="get" action="{{ route('alumnus.index') }}">
                <label>Chọn lớp</label>
                <select name="grade">
                    @foreach ($grades as $grade)
                        <option value="{{ $grade->idGrade }}" @if ($grade->idGrade == $idGrade) {{ 'selected' }} @endif>
                            @if($grade->idMajor==1) BKD @elseif($grade->idMajor==2) BKN @else @endif{{ $grade->nameGrade . 'K' . $grade->nameCourse }}
                        </option> 
                    @endforeach
                </select>
                <button class="btn btn-xs btn-fill">Oke</button>
            </form>
            <br>
        </div>

        <div class="card-content table-responsive table-full-width">
            <table class="table table-striped">
                <thead>
                    <th>Mã</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Ngày sinh</th>
                    <th>Địa chỉ</th>
                    <th>Giới tính</th>
                    <th>Hình thức nộp</th>
                    <th>Học bổng</th>
                    <th>Tình trạng</th>
                    <th>Xem lịch sử</th>
                    <th>Sửa</th>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->idStudent }}</td>
                            <td>{{ $student->nameStudent}}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->dateBirth }}</td>
                            <td>{{ $student->address }}</td>
                            <td>{{ $student->GenderName }}</td>
                            <td>{{ $student->namePaymentOption }}</td>
                            <td>{{ $student->fee }}</td>
                        @if( $student->debtfees ==0)<td><font color="green">{{'Đã Hoàn Thành'}}</font></td>
                            @else <td><font color="red">{{'Chậm học phí'}}</font></td>
                            @endif
                        </td>
                        <th class="text-center"><a class="btn btn-warning btn-sm"
                            href="">Xem lịch sử</a></th>
                            <th class="text-center"><a class="btn btn-warning btn-sm"
                                    href="{{ route('alumnus.edit', $student->idStudent) }}">Sửa</a></th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{ $students->appends(['idGrade' => $grade])->links() }}
            </div> 
        </div>
    </div>

        
@endsection