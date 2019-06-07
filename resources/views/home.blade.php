@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow mb-3">
                <div class="card-body">
                    <img src="@if($user->profile->avatar) /images/{{ $user->profile->avatar }} @else {{ asset('storage/images/no_avatar.png') }} @endif" alt="..." class="img-thumbnail mb-3">
                    <h3 style="color: #636b6f;">{{ $user->profile->first_name }}　{{ $user->profile->last_name }}</h3>
                    <p>{{ $user->profile->address }}</p>
                    <p>{{ $user->profile->birth_year }}/{{ $user->profile->birth_month }}/{{ $user->profile->birth_day }}</p>
                    <p>{{ $user->email }}</p>
                    <a href="{{ route('profile.edit') }}" class="btn btn-info btn-lg text-white">プロフィール編集</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow mb-3">
                        <br><br><br><br><br>
                        <div class="card-footer text-center">
                            <h3>Java</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow mb-3">
                        <br><br><br><br><br>
                        <div class="card-footer text-center">
                            <h3>Ruby</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow mb-3">
                        <br><br><br><br><br>
                        <div class="card-footer text-center">
                            <h3>Rails</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow mb-3">
                        <br><br><br><br><br>
                        <div class="card-footer text-center">
                            <h3>PHP</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 text-right">
            <div class="card shadow">
                <br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br><br>
            </div>
        </div>
    </div>
</div>
@endsection
