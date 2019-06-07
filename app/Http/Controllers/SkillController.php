<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    public function store()
    {
        $data = request()->validate([
            'skill' => ['required']
        ]);
        $user = Auth::user();
        $user->skills()->attach($data['skill']);
        return redirect('/');
    }
}
