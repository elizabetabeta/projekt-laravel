<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Lecture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectsController extends Controller
{
    public function index()
    {
        #return Subject::all();
        return Subject::with('professor')->orderBy('created_at', 'DESC')->get();

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

        DB::table('lectures')->where('subject_id', $id)->delete();
        DB::table('subjects')->where("id", $id)->delete();

        return 'Subject deleted!';
    }
}
