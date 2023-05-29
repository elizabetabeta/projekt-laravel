<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LecturesController extends Controller
{
    public function index()
    {
        #return Lecture::all();
        return Lecture::with('subject')->orderBy('date', 'DESC')->get();

    }

    public function store(Request $request)
    {
        $lecture = new Lecture();
        $lecture->time = $request->time;
        $lecture->date = $request->date;
        $lecture->classroom = $request->classroom;
        $lecture->description = $request->description;
        $lecture->subject_id = $request->subject_id;

        $lecture->save();

        return 'New lecture added!';
    }

    public function edit(Request $request) {
        $lecture = Lecture::find($request->id);
        $lecture->time = $request->time;
        $lecture->date = $request->date;
        $lecture->classroom = $request->classroom;
        $lecture->description = $request->description;
        $lecture->subject_id = $request->subject_id;

        $lecture->save();

        return 'Edited successfully!';
    }

    public function destroy($id) {

        DB::table('lectures_students')->where('lecture_id', $id)->delete();
        Lecture::find($id)->delete();

        return 'Lecture deleted!';
    }
}
