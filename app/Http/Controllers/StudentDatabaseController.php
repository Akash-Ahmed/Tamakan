<?php

namespace App\Http\Controllers;

use App\Models\Student\StudentDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;

class StudentDatabaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = StudentDatabase::all();

        return view('student.student_list',compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.student_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->hasFile('image')) {
            $image       = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(360, 360);
            $image_resize->save(public_path('image/student/profile/'.$name));
            $last_img ='image/student/profile/'.$name;
        }


        $student = new StudentDatabase();
        $student->name = $request->name;
        $student->student_id = $request->student_id;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->department = $request->department;
        if(!empty($last_img)) {
            $student->image = $last_img;
        }

        if($student->save()){
            alert()->success('successfully','Student add successfully');
            return redirect()->back();
        }else{
            alert()->warning('WarningAlert','Something is error');
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student\StudentDatabase  $studentDatabase
     * @return \Illuminate\Http\Response
     */
    public function show(StudentDatabase $studentDatabase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student\StudentDatabase  $studentDatabase
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentDatabase $studentDatabase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student\StudentDatabase  $studentDatabase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentDatabase $studentDatabase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student\StudentDatabase  $studentDatabase
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentDatabase $studentDatabase)
    {
        //
    }
}
