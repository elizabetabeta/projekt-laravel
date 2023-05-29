<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StudentsController extends Controller
{
    public function index()
    {
        return DB::table('students')->orderByDesc('id')->get();
    }

    public function store(Request $request)
    {
        $student = new Student();
        $student->name = $request->name;
        $student->student_number = $request->student_number;

        $student->save();

        return 'New student added!';
    }

    public function edit1(Request $request)
    {
        $student = Student::find($request->id);
        if($student){
            return response()->json([
                'status' => 200,
                'student' => $student
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "Nema tog studenta!"
            ], 404);
        }
    }

    public function edit(Request $request) {
        $student = Student::find($request->id);
        $student->name = $request->name;
        $student->student_number = $request->student_number;

        $student->save();

        return 'Edited successfully!';
    }

    public function destroy($id) {
        DB::table('lectures_students')->where('student_id', $id)->delete();

        Student::find($id)->delete();

        return 'Student deleted!';
    }
}
