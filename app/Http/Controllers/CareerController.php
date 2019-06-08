<?php

namespace App\Http\Controllers;

use App\Career;
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
            'end_year' => ['required', 'integer'],
            'details' => []
        ]);
        $user = Auth::user();
        $user->careers()->create([
            'experience' => $data['experience'],
            'start_year' => $data['start_year'],
            'end_year' => $data['end_year'],
            'details' => (array_key_exists('details', $data)) ? $data['details'] : null,
        ]);

        return redirect(route('home'));
    }

    public function edit(Career $career)
    {
        return view('careers.edit', compact('career'));
    }

    public function update(Career $career)
    {
        $data = request()->validate([
            'experience' => ['required'],
            'start_year' => ['required', 'integer'],
            'end_year' => ['required', 'integer'],
            'details' => []
        ]);

        $career->update($data);

        return redirect(route('home'));
    }

    public function destroy(Career $career)
    {
        $career->delete();
        return redirect(route('home'));
    }
}
