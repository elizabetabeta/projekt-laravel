<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfessorsController extends Controller
{
    public function index()
    {
        return DB::table('professors')->orderByDesc('id')->get();
    }

    public function store(Request $request)
    {
        $prof = new Professor();
        $prof->name = $request->name;
        $prof->surname = $request->surname;
        $prof->title = $request->title;
        $prof->gender = $request->gender;

        $prof->save();

        return 'New professor added!';
    }

    public function edit1(Request $request)
    {
        $prof = Professor::find($request->id);
        if($prof){
            return response()->json([
                'status' => 200,
                'prof' => $prof
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "Nema tog studenta!"
            ], 404);
        }
    }

    public function edit(Request $request) {
        $prof = Professor::find($request->id);
        $prof->name = $request->name;
        $prof->surname = $request->surname;
        $prof->title = $request->title;
        $prof->gender = $request->gender;

        $prof->save();

        return 'Edited successfully!';
    }

    public function destroy($id) {
        DB::table('subjects')->where('professor_id', $id)->delete();

        Professor::find($id)->delete();

        return 'Professor deleted!';
    }
}
