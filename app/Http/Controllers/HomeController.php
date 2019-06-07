<?php

namespace App\Http\Controllers;

use App\Skill;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        /** ユーザがすでに持っているスキルを配列で返す */
        $userSkills = $user->skills()->pluck('id')->toArray();
        /** ユーザが持っていないスキルだけを格納 */
        $skills = Skill::all()->whereNotIn('id', $userSkills);
        /** 経歴を取得 */
        $careers = $user->careers->all();
        return view('home', compact('user', 'skills', 'careers'));
    }
}
