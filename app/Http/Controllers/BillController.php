<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Exception;


class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $year = $request->get('year');
        $bills = DB::table('bill')->whereYear('date', $year)->get();
        return view('bill.index', [
            'bills' => $bills,
            'year' => $year,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
        $date = Carbon::now();
        $idPaymentOption = $request->get('idPaymentOption');
        $fee = $request->get('fee');
        $idStudent = $request->get('idStudent');
        $bill = new Bill();
        $bill->idStudent = $idStudent;
        $bill->idPaymentOption = $idPaymentOption;
        $bill->feeBill = $fee;
        $bill->date = $date;
        $bill->save();
        $student = Student::where('idStudent', '=',$idStudent )->first();
        $student->debtfees = $student->debtfees - $fee;
        $student->save();
        return Redirect::route('fee.index');
        }catch (Exception $e) {
            return Redirect::route('fee.show', $request->get('idStudent'))->with('error', [
                "message" => 'Bạn chưa nhập',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(request $request, $id)
    {
        $search = $request->get('search');
        $bills = DB::table('bill')
            ->join('student', 'bill.idStudent', '=', 'student.idStudent')
            ->join('paymentoption', 'paymentoption.idPaymentOption', '=', 'bill.idPaymentOption')
            ->whereMonth('date', '=', $id)
            ->where('nameStudent', 'like', "%$search%")
            ->orderBy('idBill', 'desc')->paginate(5);
            $billss = DB::table('bill')
            ->join('student', 'bill.idStudent', '=', 'student.idStudent')
            ->join('paymentoption', 'paymentoption.idPaymentOption', '=', 'bill.idPaymentOption')
            ->get();
        return view('bill.show', [
            'search' => $search,
            'bills' => $bills,
            'id' => $id,
            'billss' =>$billss
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
