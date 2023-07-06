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


class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $students = DB::table('grade')
            ->join('student', 'grade.idGrade', '=', 'student.idGrade')
            ->join('fee', function ($join) {
                $join->on('grade.idMajor', '=', 'fee.idMajor')
                    ->on('grade.idCourse', '=', 'fee.idCourse');
            })
            ->join('major', 'grade.idMajor', '=', 'major.idMajor')
            ->join('course', 'grade.idCourse', '=', 'course.idCourse')
            ->where('nameStudent', 'like', "%$search%")->orderBy('idStudent', 'desc')
            ->select('student.*', 'fee.*', 'grade.*', 'major.*', 'course.*')
            ->paginate(5);
        $bills = DB::table('bill')->get();
        $scholarships = DB::table('scholarship')->get();
        $paymentoptions = DB::table('paymentoption')->get();
        return view('fee.index', [
            'students' => $students,
            'search' => $search,
            'scholarships' => $scholarships,
            'paymentoptions' => $paymentoptions,
            'bills' => $bills,
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        $grades = DB::table('grade')
            ->join('major', 'grade.idMajor', '=', 'major.idMajor')
            ->join('course', 'grade.idCourse', '=', 'course.idCourse')
            ->join('fee', function ($join) {
                $join->on('grade.idMajor', '=', 'fee.idMajor')
                    ->on('grade.idCourse', '=', 'fee.idCourse');
            })
            ->get();
        $paymentoptions = DB::table('paymentoption')->get();
        return view('fee.show', [
            "student" => $student,
            "grades" => $grades,
            "paymentoptions" => $paymentoptions,
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
