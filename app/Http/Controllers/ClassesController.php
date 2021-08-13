<?php

namespace App\Http\Controllers;
use App\Models\Classes;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fetchAllClasses = Classes::all();
        
        $countClasses=Classes::count();
        return view('classes.index', compact('fetchAllClasses','countClasses'));
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
            
            'class_Name'=>['required'],
            
                        
        ]);
        //grabbing loggedin user
       // $request['created_by']=Auth::user()->id;
        Classes::create($request->all());
        //return back();
        return back()->with('message','Class Registered Successfully');
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
        $clickedClass=Classes::findOrFail($id);
        // $fetchAllCourses=Courses::latest()->get();
        return view('classes.edit',compact('clickedClass'));
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
        $findClassById= Classes::find($id);
        //update all the request from the form
        $findClassById->update ($request->all());
        //dd($findCoursesById);
        return back()->with('message','Class updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findClasses=Classes::find($id);
        $findClasses->delete();
        return back()->with('message','class Deleted Successfully');
    }
}
