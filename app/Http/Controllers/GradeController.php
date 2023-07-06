<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Major;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\PaymentOption;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $grades = DB::table('grade')
            ->join('major', 'grade.idMajor', '=', 'major.idMajor')
            ->join('course', 'grade.idCourse', '=', 'course.idCourse')
            ->where('nameGrade', 'like', "%$search%")
            ->orderBy('idGrade', 'DESC')
            ->select('*')->paginate(5);
        return view("grade.index", [
            'grades' => $grades,
            'search' => $search,
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
        return view('grade.create', [
            'majors' => $majors,
            'courses' => $courses,
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
        $name = $request->get('name');
        $idMajor = $request->get('idMajor');
        $idCourse = $request->get('idCourse');
        $grade = new Grade();
        $grade->nameGrade = $name;
        $grade->idMajor = $idMajor;
        $grade->idCourse = $idCourse;
        $grade->save();
        return Redirect::route('grade.index');
    }catch (Exception $e) {
        return Redirect::route("grade.create")->with('error', [
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
        $majors = DB::table('major')->get();
        $courses = DB::table('course')->get();
        $grade = Grade::find($id);
        return view('grade.edit', [
            "grade" => $grade,
            "majors" => $majors,
            "courses" => $courses,
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
        $grade = Grade::find($id);
        $grade->nameGrade = $request->get('name');
        $grade->idMajor = $request->get('idMajor');
        $grade->idCourse = $request->get('idCourse');
        $grade->save();
        return Redirect::route('grade.index');
    } catch(Exception $e){
        return Redirect::route('grade.edit',$id)->with('error',[
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
        Grade::find($id)->delete();
    }
}
