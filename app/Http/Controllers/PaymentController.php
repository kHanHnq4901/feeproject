<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\PaymentOption;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = DB::table('paymentoption')->get();
        return view('payment.index', [
            "payments" => $payments,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payment.create');
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
        $name = $request->get('name');
        $discount = $request->get('discount');
        $paymentOption = new PaymentOption();
        $paymentOption->namePaymentOption = $name;
        $paymentOption->discount = $discount;
        $paymentOption->save();
        return Redirect::route('payment.index');
     
        }catch (Exception $e) {
            return Redirect::route("payment.create")->with('error', [
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paymentOption = PaymentOption::find($id);
        return view('payment.edit', [
            "paymentOption" => $paymentOption,
        ]);
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
        //  $paymentOption = PaymentOption::find($id);
        //  $paymentOption->namePaymentOption = $request->get('name');
        // $paymentOption->Fee = $request->get('fee');
        // $paymentOption->save();
        //  $payment = PaymentOption::find($id);
        //  $payment->namePaymentOption = $request->get('name');
        // $payment->discount = $request->get('discount');
        //  $payment->save();
        try{
        $name = $request->get('name');
        $discount = $request->get('discount');
        $payment = DB::table('paymentoption')
            ->where('idPaymentOption', $id)
            ->update([
                'namePaymentOption' => $name,
                'discount' => $discount,
            ]);

        return Redirect::route('payment.index');
    } catch(Exception $e){
        return Redirect::route('payment.edit',$id)->with('error',[
            "message" => 'Bạn chưa nhập'
        ]);
    }
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
