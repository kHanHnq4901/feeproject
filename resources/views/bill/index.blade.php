@extends('layouts.app')
@section('content')
   <div class="content" class="text-center">
               <div class="card">
                    <div class="text-right">
    </div>
        <div class="card-header" class="text-center">
            <h2 class="card-title"><center>Thống kê</center></h2> 
         <form method="get" action="" class="text-center">
                 <select name="year" >
                    <option value="-1">Chọn năm</option>
                    <option value="2023" @if ($year == 2023) {{'selected'}}@endif>2023</option>
                    </select>
                <button>Ok</button>
            </form>
            <br>
            <center>Số hóa đơn trong năm {{$bills->count()}} </center>
        </div>
        @if(isset($bills))
        @if($year == 2023)
        <div class="card-content table-responsive table-full-width">
            <div class="text-center">
            <form action="{{ route('bill.show',1) }}">
                <input type="hidden" name="month" value="1">
                <button class="btn btn-primary btn-fill btn-wd">Tháng 1</button>
            </form>
            <form action="{{ route('bill.show',2) }}" >
                <input type="hidden" name="month" value="">
                <button class="btn btn-primary btn-fill btn-wd">Tháng 2</button>
            </form>
            <form action="{{ route('bill.show',3) }}">
                <input type="hidden" name="month" value="">
                <button class="btn btn-primary btn-fill btn-wd">Tháng 3</button>
            </form>
            <form action="{{ route('bill.show',4) }}" >
                <input type="hidden" name="month" value="">
                <button class="btn btn-primary btn-fill btn-wd">Tháng 4</button>
            </form>
           <form action="{{ route('bill.show',5) }}">
               <input type="hidden" name="month" value="">
                <button class="btn btn-primary btn-fill btn-wd">Tháng 5</button>
            </form>
            <form action="{{ route('bill.show',6) }}" >
                <input type="hidden" name="month" value="">
                <button class="btn btn-primary btn-fill btn-wd">Tháng 6</button>
            </form>
            </div>
            <div class="text-center">
            <form action="{{ route('bill.show',7) }}">
                <input type="hidden" name="month" value="">
                <button class="btn btn-primary btn-fill btn-wd">Tháng 7</button>
            </form>
             <form action="{{ route('bill.show',8) }}" >
                 <input type="hidden" name="month" value="">
                <button class="btn btn-primary btn-fill btn-wd">Tháng 8</button>
            </form>
            <form action="{{ route('bill.show',9) }}">
                <input type="hidden" name="month" value="">
                <button class="btn btn-primary btn-fill btn-wd">Tháng 9</button>
            </form>
           <form action="{{ route('bill.show',10) }}" >
               <input type="hidden" name="month" value="">
                <button class="btn btn-primary btn-fill btn-wd">Tháng 10</button>
            </form>
            <form action="{{ route('bill.show',11) }}" >
                <input type="hidden" name="month" value="">
                <button class="btn btn-primary btn-fill btn-wd">Tháng 11</button>
            </form>
            <form action="{{ route('bill.show',12) }}" >
                <input type="hidden" name="month" value="">
                <button class="btn btn-primary btn-fill btn-wd">Tháng 12</button>
            </form>                                                                             
            </div>
        @endif                                                                   
            <div class="text-center">
              {{--  {{ $grades->appends(['search' => $search])->links() }} --}}
                Tổng số tiền: {{$bills->sum('feeBill')}}
            </div> 
            @endif
        </div>
    </div>

        
@endsection