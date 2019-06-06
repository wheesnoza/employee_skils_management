<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function new()
    {
        return view('profile.new');
    }

    public function store()
    {
        $data = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'birth_year' => 'required',
            'birth_month' => 'required',
            'birth_day' => 'required',
            'avatar' => ['file', 'image', 'max:4000'],
        ]);

        $file = $data['avatar'];
        $fileHashName = $file->hashName();
        $image = Image::make(file_get_contents($file->getRealPath()));

        /** 画像リサイズ */
        $image->save(public_path().'/images/'.$fileHashName)
            ->crop(500, 500)
            ->save(public_path().'/images/200-'.$fileHashName);

        $user = Auth::user();
        $user->profile()->create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'address' => $data['address'],
            'birth_year' => $data['birth_year'],
            'birth_month' => $data['birth_month'],
            'birth_day' => $data['birth_day'],
            'avatar' => basename($fileHashName),
        ]);

        return redirect()->route('home');
    }
}
