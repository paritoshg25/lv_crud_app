<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Exception;
use Illuminate\App\Http\Models;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Function to show student list using API
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

    // Function to show student list
    public function index(){
        $students = Student::orderBy('created_at', 'DESC')->get();
        return view('student.list', ['students' => $students]);
    }

    
    // Function to create new student
    public function createStudent()
    {
        return view('student.form', ['student' => new Student()]);
    }
    

    // Function to store new student
    public function storeStudent(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'country' => 'required',
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
            return redirect('/student-list')->with($notification);
        }else{
            $notification = array(
                'message' => 'Error while adding the data.',
                'alert-type' => 'error'
            );
            return redirect('/student-list')->with($notification);
        }

    }


    // Function to edit student details
    public function editStudent($id)
    {
        $student = Student::where('id', $id)->first();
        return view('student.form', ['student' => $student ]);
    }


    // Function to update student details
    public function updateStudent(Request $request, $id){
        
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
    
            return redirect('/student-list')->with($notification);
        }else{
            $notification = array(
                'message' => 'Error while updating data.',
                'alert-type' => 'error'
            );
    
            return redirect('/student-list')->with($notification);
        }

       
    }

    // Function to delete student
    public function deleteStudent($id){
        $student = Student::where('id', $id)->first();

        $student->delete();

        $notification = array(
            'message' => 'Student Deleted Succesfully',
            'alert-type' => 'success'
        );

        return redirect('/student-list')->with($notification);
    }
}
