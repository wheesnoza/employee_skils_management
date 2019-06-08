<?php

namespace App\Http\Controllers;

use App\Skill;
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

    public function destroy(Skill $skill)
    {
        $user = Auth::user();
        $user->skills()->detach($skill);

        return redirect(route('home'));
    }
}
