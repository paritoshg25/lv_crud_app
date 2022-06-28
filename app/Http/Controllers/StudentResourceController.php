<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Exception;
use Illuminate\Http\Request;

class StudentResourceController extends Controller
{
    /**
     * Api to get data from database.
     *
     * @return \Illuminate\Http\Response
     */
    public function getApi(){
        try{
            $students = Student::all();

            if($students){
                return response()->json([
                    'status' => '1',
                    'message' => 'Data sent Successfully.',
                    'students' => $students], 200);
                }else{
                    return response()->json([
                        'status' => '0',
                        'message' => 'Error Occured.',
                        'students' => $students], 200);
                }
        }catch(Exception $e){
            return $e->getMessage();
        }
       
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function index()
    {
        $students = Student::orderBy('created_at', 'DESC')->get();
        return view('student.listing', ['students' => $students]);
    }

    /**
     * Show the student-form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.student-form', ['student' => new Student()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     * @author Paritosh Gupta
     * created at : 28-06-2022
     * modified at : --
     * 
     * Values details:
     *      'name'     : string | required
     *      'email'    : string | required
     *      'phone'    : numbers | required | min:10
     *      'address'  : string | required
     *      'gender'   : enum('0' OR '1') | required
     *      'name'     : string | required
     *      'country'  : numbers[1-5] | required
     *      'hobby'    : numbers[1-5] | required
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'required',
            'gender' => 'required',
            'country' => 'required',
            'hobby' => 'required'
        ]);

        $data = $request;
        // $student = Student::create($request->all());
        $student = Student::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'gender' => $data['gender'],
            'country' => $data['country'],
            'hobby' => implode(",",$data['hobby']),
        ]);

        if($student){

            $notification = array(
                'message' => 'Student Added Succesfully',
                'alert-type' => 'success'
            );
            return redirect()->route('students.index')->with($notification);
        }else{
            $notification = array(
                'message' => 'Error while adding the data.',
                'alert-type' => 'error'
            );
            return redirect()->route('students.index')->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::where('id', $id)->first();
        return view('student.student-form', ['student' => $student ]);
    }

    /**
     * Show the student-form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::where('id', $id)->first();
        return view('student.student-form', ['student' => $student ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'country' => 'required',
            'address' => 'required',
            'country' => 'required',
            'hobby' => 'required'
        ]);


        $student = Student::where('id', $id)->first();

        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->address = $request->address;
        $student->gender = $request->gender;
        $student->country = $request->country;
        $student->hobby = implode("," ,$request->hobby);

        if($student->save()){
            $notification = array(
                'message' => 'Student Updated Succesfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('students.index')->with($notification);
        }else{
            $notification = array(
                'message' => 'Error while updating data.',
                'alert-type' => 'error'
            );
    
            return redirect()->route('students.index')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        if($student->delete()){
             $notification = array(
            'message' => 'Student Deleted Succesfully',
            'alert-type' => 'success'
        );
        return redirect()->route('students.index')->with($notification);

        }else{
                $notification = array(
               'message' => 'Error while deleting the data.',
               'alert-type' => 'error'
                );
   
        //    return redirect('/student-list')->with($notification);
           return redirect()->route('students.index')->with($notification);
        }
    }
}
