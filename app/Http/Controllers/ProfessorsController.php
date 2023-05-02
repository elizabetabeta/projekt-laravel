<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorsController extends Controller
{
    public function index()
    {
        return Professor::all();
    }

    public function store(Request $request)
    {
        $prof = new Professor();
        $prof->name = $request->name;
        $prof->username = $request->username;
        $prof->password = $request->password;
        $prof->user_type = $request->user_type;

        $prof->save();

        return 'New professor added!';
    }

    public function edit(Request $request) {
        $prof = Professor::find($request->id);
        $prof->name = $request->name;
        $prof->username = $request->username;
        $prof->password = $request->password;
        $prof->user_type = $request->user_type;

        $prof->save();

        return 'Edited successfully!';
    }

    public function destroy($id) {
        Professor::find($id)->delete();

        return 'Professor deleted!';
    }
}
