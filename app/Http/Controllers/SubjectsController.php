<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    public function index()
    {
        return Subject::all();
    }

    public function store(Request $request)
    {
        $subject = new Subject();
        $subject->name = $request->name;
        $subject->description = $request->description;
        $subject->professor_id = $request->professor_id;

        $subject->save();

        return 'New subject added!';
    }

    public function edit(Request $request) {
        $subject = Subject::find($request->id);
        $subject->name = $request->name;
        $subject->description = $request->description;
        $subject->professor_id = $request->professor_id;

        $subject->save();

        return 'Edited successfully!';
    }

    public function destroy($id) {
        Subject::find($id)->delete();

        return 'Subject deleted!';
    }
}
