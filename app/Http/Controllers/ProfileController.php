<?php

namespace App\Http\Controllers;

use App\Career;
use Illuminate\Support\Facades\Auth;
use Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update()
    {
        $user = Auth::user();
        $data = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'birth_year' => 'required',
            'birth_month' => 'required',
            'birth_day' => 'required',
            'avatar' => ['file', 'image', 'max:4000'],
        ]);

        $fileHashName = $user->profile->avatar;

        if (isset($data['avatar'])) {
            $file = $data['avatar'];
            $fileHashName = $file->hashName();
            $image = Image::make(file_get_contents($file->getRealPath()));

            /** 画像リサイズ */
            $image->save(public_path().'/images/'.$fileHashName)
                ->crop(500, 500)
                ->save(public_path().'/images/'.$fileHashName)
                ->resize(75, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path().'/images/thumbnail-'.$fileHashName);
        }

        $user->profile()->update([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'address' => $data['address'],
            'birth_year' => $data['birth_year'],
            'birth_month' => $data['birth_month'],
            'birth_day' => $data['birth_day'],
            'avatar' => $fileHashName,
        ]);

        return redirect()->route('home');
    }
}
