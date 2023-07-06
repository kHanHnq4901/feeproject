<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Fee;
use App\Models\Course;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Scholarship;
use App\Models\PaymentOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Exports\StudentExport;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;
use Exception;

class AlumnusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $grades = Grade::join('course', 'grade.idCourse', '=', 'course.idCourse')->select('*')->get();
        $grade = $request->get('grade');
        $students = Student::where('idGrade', $grade)
            ->join('paymentoption', 'student.idPaymentOption', '=', 'paymentoption.idPaymentOption')
            ->join('scholarship', 'student.idScholarship', '=', 'scholarship.idScholarship')
            ->orderBy('idStudent', 'desc')
            ->paginate(5);
        return view("student.index", [
            'grades' => $grades,
            'students' => $students,
            'idGrade' => $grade
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = DB::table('grade')
            ->join('major', 'grade.idMajor', '=', 'major.idMajor')
            ->join('course', 'grade.idCourse', '=', 'course.idCourse')
            ->get();
        $paymentoptions = DB::table('paymentoption')->get();
        $scholarships = DB::table('scholarship')->get();
        return view('student.create', [
            'grades' => $grades,
            'paymentoptions' => $paymentoptions,
            'scholarships' => $scholarships,
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
        $student = new Student();
        $student->nameStudent = $request->get('nameStudent');
        $student->gender = $request->get('gender');
        $student->dateBirth = $request->get('dateBirth');
        $student->address = $request->get('address');
        $student->email = $request->get('email');
        $student->password = $request->get('password');
        $student->idGrade = $request->get('idGrade');
        $student->idPaymentOption = $request->get('idPaymentOption');
        $student->idScholarship = $request->get('idScholarship');
        $idGrade = $request->get('idGrade');
        $grade = DB::table('grade')->where('idGrade', '=', $idGrade)->first();
        $idMajor = $grade->idMajor;
        $idCourse = $grade->idCourse;
        $fee = DB::table('fee')->where('idMajor', '=', $idMajor)
            ->where('idCourse', '=', $idCourse)
            ->first();
        if ($request->get('idPaymentOption') == 1) {
            $student->debtfees = $fee->fee / 30;
        } elseif ($request->get('idPaymentOption') == 2) {
            $student->debtfees = $fee->fee / 6;
        } else $student->debtfees = $fee->fee / 3;
        $student->save();
        return Redirect::route('grade.index', [
            'fee' => $fee
        ]);
        }catch (Exception $e) {
            return Redirect::route('alumnus.create')->with('error', [
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
    public function show(Request $request, $id)
    {
        $grades = Grade::join('course', 'grade.idCourse', '=', 'course.idCourse')
            ->join('major', 'grade.idMajor', '=', 'major.idMajor')
            ->select('*')->get();
        if (isset($id)) {
            $grade = $id;
        } else {
            $grade = $request->get('grade');
        }
        $students = Student::where('idGrade', '=', $grade)
            ->join('scholarship', 'student.idScholarship', '=', 'scholarship.idScholarship')
            ->join('paymentoption', 'student.idPaymentOption', '=', 'paymentoption.idPaymentOption')
            ->orderBy('idStudent', 'desc')
            ->paginate(5);
        return view("student.index", [
            'grades' => $grades,
            'students' => $students,
            'idGrade' => $grade,
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
        
        $student = Student::find($id);
        $grades = DB::table('grade')
            ->join('major', 'grade.idMajor', '=', 'major.idMajor')
            ->join('course', 'grade.idCourse', '=', 'course.idCourse')
            ->get();
        $paymentoptions = DB::table('paymentoption')->get();
        $scholarships = DB::table('scholarship')->get();
        return view('student.edit', [
            'student' => $student,
            'grades' => $grades,
            'paymentoptions' => $paymentoptions,
            'scholarships' => $scholarships,
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
        try{
        $student = Student::find($id);
        $student->nameStudent = $request->get('nameStudent');
        $student->gender = $request->get('gender');
        $student->dateBirth = $request->get('dateBirth');
        $student->address = $request->get('address');
        $student->email = $request->get('email');
        $student->idGrade = $request->get('idGrade');
        $student->idScholarship = $request->get('idScholarship');
        $student->save();
        return Redirect::route('alumnus.edit',$id)->with('
        success',[
            "message" => 'Sửa thành công'
        ]);
    } catch(Exception $e){
        return Redirect::route('alumnus.edit',$id)->with('error',[
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
    public function addByExcel()
    {
        return view('student.add-by-excel');
    }

    public function import(Request $request)
    {
        $file = $request->file('excel-file');
        Excel::import(new StudentImport, $file);
        return Redirect::route('grade.index');
    }

    public function export()
    {
        return Excel::download(new StudentExport, 'DanhSachSinhVien.xlsx');
    }
}
