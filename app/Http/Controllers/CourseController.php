<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Major;
use App\Models\Course;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        # all => lấy tất cả bản ghi
        # paginate => phân trang
        $courses = Course::where('nameCourse', 'like', "%$search%")->orderBy('idCourse', 'desc')->paginate(5);
        return view('course.index', [
            "courses" => $courses,
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
        return view('course.create', [
            "majors" => $majors,
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
        $course = new Course();
        $course->nameCourse = $name;
        $course->save();
        return Redirect::route('course.index');
    } catch(Exception $e){
        return Redirect::route('course.create')->with('error',[
            "message" => 'Bạn chưa nhập'
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
        # test git  
        $search = $request->get('search');
        # all => lấy tất cả bản ghi
        # paginate => phân trang
        //  $id = $request->get($id);
        //  $course  = Course::where('idCourse', '=', $id)->all();
        // $course  = DB::table('course')
        //     ->where('idCourse', '=', $id)
        //    ->get();
        $majors = Major::where('nameMajor', 'like', "%$search%")->paginate(3);
        return view('course.show', [
            "majors" => $majors,
            'search' => $search,
            'idCourse' => $id,
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
        
        $course = Course::find($id);
        return view('course.edit', [
            "course" => $course
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
        $course = Course::find($id);
        $course->nameCourse = $request->get('name');
        $course->save();
        return Redirect::route('course.index');
    } catch(Exception $e){
        return Redirect::route('course.edit',$id)->with('error',[
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
