<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fee;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Grade;
use App\Models\Major;
use App\Models\Course;
use App\Models\PaymentOption;
use App\Models\Scholarship;
use App\Models\Bill;
use Carbon\Carbon;
use Exception;

class Fee2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fees = DB::table('fee')
            ->join('major', 'fee.idMajor', '=', 'major.idMajor')
            ->join('course', 'fee.idCourse', '=', 'course.idCourse')
            ->get();
        return view('fee2.index', [
            'fees' => $fees,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $majors = DB::table('major')->get();
        $courses = DB::table('course')->get();
        return view('fee2.create', [
            'majors' => $majors,
            'courses' => $courses
        ]);
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
        $fee2 = $request->get('fee');
        $idMajor = $request->get('idMajor');
        $idCourse = $request->get('idCourse');
        $fee = new Fee();
        $fee->idMajor = $idMajor;
        $fee->idCourse = $idCourse;
        $fee->fee = $fee2;
        $fee->save();
        return Redirect::route('feee.index');
        }catch (Exception $e) {
            return Redirect::route("feee.create")->with('error', [
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
    public function edit($idMajor, $idCourse)
    {
        $majors = DB::table('major')->get();
        $courses = DB::table('course')->get();
        $fee = DB::table('fee')
            ->where('idMajor', '=', $idMajor)
            ->where('idCourse', '=', $idCourse)
            ->get();
        return view('fee2.create', [
            'majors' => $majors,
            'courses' => $courses,
            'fee' => $fee,
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
