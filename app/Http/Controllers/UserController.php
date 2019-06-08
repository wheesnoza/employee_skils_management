<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all()->whereNotIn('id', Auth::user()->id);

        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        /** 経歴を取得 */
        $careers = $user->careers->all();
        return view('users.show', compact('user', 'careers'));
    }
}
