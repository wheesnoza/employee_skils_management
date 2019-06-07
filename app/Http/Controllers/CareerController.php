<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CareerController extends Controller
{
    public function new()
    {
        return view('careers.new');
    }

    public function store()
    {
        $data = request()->validate([
            'experience' => ['required'],
            'start_year' => ['required', 'integer'],
            'start_month' => ['required', 'integer'],
            'end_year' => ['required', 'integer'],
            'end_month' => ['required', 'integer'],
            'details' => []
        ]);
        $user = Auth::user();
        $user->careers()->create([
            'experience' => $data['experience'],
            'start_year' => $data['start_year'],
            'start_month' => $data['start_month'],
            'end_year' => $data['end_year'],
            'end_month' => $data['end_month'],
            'details' => (array_key_exists('details', $data)) ? $data['details'] : null,
        ]);

        return redirect(route('home'));
    }
}
