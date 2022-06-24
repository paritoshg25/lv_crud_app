<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\StudentFormRequest;
use App\Models\Student;
// use Illuminate\App\Http\Request;
use Illuminate\App\Http\Models;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create()
    {
        return view('student.create', ['student' => new Student()]);
    }

    public function store(Request $request)
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

        

        // $student = new Student;

        // $student->name = $request->name;
        // $student->email = $request->email;
        // $student->phone = $request->phone;
        // $student->address = $request->address;
        // $student->gender = $request->gender;
        // $student->country = $request->country;
        // $student->hobby = implode(",",$request->hobby);

        // $student->save();

        return redirect('/list')->with('message', 'Student Added Succesfully');
    }

    public function index(){
        $students = Student::orderBy('created_at', 'DESC')->get();
        // $students = DB::select('select * from students');
        return view('student.list', ['students' => $students]);
    }

    public function edit($id = null){
        $student = Student::where('id', $id)->first();
        // $student = DB::select('select * from students where id = ?', [$id]);
        return view('student.edit', ['student' => $student ]);
        // return view('student.edit');
    }

    public function update(Request $request, $id){
        
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

        $student->save();

        return redirect('/list')->with('message', 'Student Updated Succesfully');
    }
// ///////////////////////////////////////////////////////////////////////////////////////

    public function delete($id){
        $student = Student::where('id', $id)->first();

        $student->delete();

        return redirect('/list')->with('message', 'Student Deleted Succesfully');
    }

    public function create_student()
    {
        return view('student.form', ['student' => new Student()]);
    }

    public function store_student(Request $request)
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

        return redirect('/list')->with('message', 'Student Added Succesfully');
    }

    public function edit_student($id)
    {
        $student = Student::where('id', $id)->first();
        return view('student.form', ['student' => $student ]);
    }

    public function update_student(Request $request, $id){
        
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

        $student->save();

        return redirect('/list')->with('message', 'Student Updated Succesfully');
    }
}
