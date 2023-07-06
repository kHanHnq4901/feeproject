@extends ('layouts.app')
@section('content')
   <div class="content">
               <div class="card">
                    <div class="text-right">
    </div>
           <div class="card">
        <div class="card-header">
            <h4 class="card-title">Danh sách sinh viên</h4>
            <form class="navbar-form navbar-left navbar-search-form" role="search">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" value="{{ $search }}" name="search" class="form-control"
                        placeholder="Tìm kiếm tên sinh viên">
                </div>
            </form>
        </div>

        <div class="card-content table-responsive table-full-width">
            <table class="table table-striped">
                <thead>
                    <th class="text-center">Mã Sinh Viên</th>
                    <th class="text-center">Tên</th>
                    <th class="text-center">Ngày sinh</th>
                    <th class="text-center">Lớp</th>
                    <th class="text-center">Học bổng</th>
                     <th class="text-center">Hình thức nôp</th>
                    <th class="text-center">Học phí 1 lần đóng</th>
                     <th class="text-center">Học phí còn nợ</th>
                    <th class="text-center">Nộp học phí</th>
                </thead>
                <tbody>
                @foreach ($students as $student)
                        <tr>
                            <th class="text-center">{{ $student->idStudent}}</th>
                            <th class="text-center">{{ $student->nameStudent }} </th>
                            <th class="text-center">{{ $student->dateBirth}}</th>
                            
                        <th class="text-center">
                            @if($student->idMajor==1)BKD 
                            @elseif ($student->idMajor==2)BKN
                            @else BKF
                            @endif
                            {{$student->nameGrade}}K{{$student->nameCourse}}
                        </th>
                        
                        <th class="text-center">@foreach($scholarships as $scholarship)@if( $student->idScholarship==$scholarship->idScholarship){{$scholarship->fee}}@endif @endforeach</th>
                        <th class="text-center">@foreach($paymentoptions as $paymentoption)@if( $student->idPaymentOption==$paymentoption->idPaymentOption){{$paymentoption->namePaymentOption}}@endif @endforeach</th>
                        
                        <th class="text-center" name ='fee'>
                            @if( $student->idPaymentOption  == 3) {{$student->fee/3}}
                            @elseif( $student->idPaymentOption  == 2) {{$student->fee/6}}
                            @elseif( $student->idPaymentOption  == 1) {{$student->fee/30}}
                            @endif
                        </th>   
                        <th class="text-center"> 
                                {{$student->debtfees}}
                        </th>
                            <td class="text-center"><a class="btn btn-warning btn-sm"
                                    href="{{ route('fee.show', $student->idStudent) }}">Nộp</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
             <div class="text-center">
                {{ $students->appends(['search' => $search])->links() }} 
            </div> 
        </div>
    </div>

        
@endsection