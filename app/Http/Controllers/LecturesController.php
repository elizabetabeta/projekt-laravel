<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use Illuminate\Http\Request;

class LecturesController extends Controller
{
    public function index()
    {
        return Lecture::all();
    }

    public function store(Request $request)
    {
        $lecture = new Lecture();
        $lecture->time = $request->time;
        $lecture->date = $request->date;
        $lecture->classroom = $request->classroom;
        $lecture->subject_id = $request->subject_id;

        $lecture->save();

        return 'New lecture added!';
    }

    public function edit(Request $request) {
        $lecture = Lecture::find($request->id);
        $lecture->time = $request->time;
        $lecture->date = $request->date;
        $lecture->classroom = $request->classroom;
        $lecture->subject_id = $request->subject_id;

        $lecture->save();

        return 'Edited successfully!';
    }

    public function destroy($id) {
        Lecture::find($id)->delete();

        return 'Lecture deleted!';
    }
}
