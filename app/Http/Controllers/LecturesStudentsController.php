<?php

namespace App\Http\Controllers;

use App\Models\LectureStudent;
use Illuminate\Http\Request;

class LecturesStudentsController extends Controller
{
    public function index()
    {
        return LectureStudent::all();
    }

    public function store(Request $request)
    {
        $ls = new LectureStudent();
        $ls->student_id = $request->student_id;
        $ls->lecture_id = $request->lecture_id;

        $ls->save();

        return 'Successfully added!';
    }

    public function edit(Request $request) {
        $ls = LectureStudent::find($request->id);
        $ls->student_id = $request->student_id;
        $ls->lecture_id = $request->lecture_id;

        $ls->save();

        return 'Edited successfully!';
    }

    public function destroy($id) {
        LectureStudent::find($id)->delete();

        return 'Deleted successfully!';
    }
}
