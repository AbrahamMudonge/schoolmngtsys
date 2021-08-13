<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Departments;
use App\Models\Teachers;
use Illuminate\Support\Facades\Auth;


class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fetchAllTeachers = Teachers::all();
        $fetchAllCourses = Courses::all();
        $fetchAllDepartments = Departments::all();
        $countTeachers=Teachers::count();
        return view('teacher.index', compact('fetchAllTeachers','fetchAllCourses','fetchAllDepartments','countTeachers'));
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
            $this->validate($request,
        [
            
            'teacherName'=>['required'],
            'phoneNumber'=>['required'],
            'course_id'=>['required'],
            'department_id'=>['required'],
                        
        ]);
        //grabbing loggedin user
       // $request['created_by']=Auth::user()->id;
        Teachers::create($request->all());
        //return back();
        return back()->with('message','Teacher Registered Successfully');
        // dd($request->all());

        }catch (\throwable $th){
            throw $th;

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
        //select units where course_id = this_id napeana
        //$unit = Unit::where('course_id', '=', $id);
        //return view(view, copmact(unit));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clickedTeacher=Teachers::findOrFail($id);
        // $fetchAllCourses=Courses::latest()->get();
        return view('teachers.edit',compact('clickedTeacher'));
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
        $findTeacherById= Teachers::find($id);
        //update all the request from the form
        $findTeacherById->update ($request->all());
        //dd($findCoursesById);
        return back()->with('message','Teacher updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findTeacher=Teachers::find($id);
        $findTeacher->delete();
        return back()->with('message','Teacher Deleted Successfully');
    }
}
