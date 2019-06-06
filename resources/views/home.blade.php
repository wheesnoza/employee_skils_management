@extends('layouts.app')

@section('content')
<div class="container">
    @if($user->profile)
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow mb-3">
                    <div class="card-body">
                        <img src="@if($user->profile->avatar) /images/200-{{ $user->profile->avatar }} @else {{ asset('storage/images/no_avatar.png') }} @endif" alt="..." class="img-thumbnail mb-3">
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
    @else
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">プロフィール作成しましょう！</h1>
                <p class="lead">自分のプロフィールを作成すると、自分の学歴、経歴、技術などを追加することができます！</p>
                <a class="btn btn-primary btn-lg" href="{{ route('profile.new') }}" role="button">作成</a>
            </div>
        </div>
    @endif
</div>
@endsection
