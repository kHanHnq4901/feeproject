<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Major;
use Illuminate\Support\Facades\Redirect;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Exception;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        # test git
        $search = $request->get('search');
        # all => lấy tất cả bản ghi
        # paginate => phân trang
        $majors = Major::where('nameMajor', 'like', "%$search%")->paginate(3);
        return view('major.index', [
            "majors" => $majors,
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
        return view('major.create');
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
        $major = new Major();
        $major->nameMajor = $name;
        $major->save();
        return Redirect::route('major.index');
        }catch (Exception $e) {
            return Redirect::route("major.create")->with('error', [
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
        # test git  
        $search = $request->get('search');
        # all => lấy tất cả bản ghi
        # paginate => phân trang
        //  $id = $request->get($id);
        //  $course  = Course::where('idCourse', '=', $id)->all();
        // $course  = DB::table('course')
        //     ->where('idCourse', '=', $id)
        //    ->get();
        $courses = Course::where('nameCourse', 'like', "%$search%")->paginate(8);
        return view('major.show', [
            "courses" => $courses,
            'search' => $search,
            'idMajor' => $id,
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
        $major = Major::find($id);
        return view('major.edit', [
            "major" => $major
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
        // Tìm
        try{
        $major = Major::find($id);
        $major->nameMajor = $request->get('name');
        $major->save();

        return Redirect::route('major.index');
    } catch(Exception $e){
        return Redirect::route('major.edit',$id)->with('error',[
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
        Major::find($id)->delete();
        return Redirect::route('major.index');
    }
}
