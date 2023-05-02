<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
        return Student::all();
    }

    public function store(Request $request)
    {
        $student = new Student();
        $student->name = $request->name;
        $student->student_number = $request->student_number;

        $student->save();

        return 'New student added!';
    }

    public function edit(Request $request) {
        $student = Student::find($request->id);
        $student->name = $request->name;
        $student->student_number = $request->student_number;

        $student->save();

        return 'Edited successfully!';
    }

    public function destroy($id) {
        Student::find($id)->delete();

        return 'Student deleted!';
    }
}
