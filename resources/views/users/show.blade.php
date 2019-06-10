@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                @include('partials.profile', ['user' => $user])
                <div class="row">
                    @forelse($user->skills as $skill)
                        <div class="col-md-5">
                            @include('partials.skills', ['skill' => $skill])
                        </div>
                    @empty
                        <div class="ml-3 alert alert-light" role="alert">
                            まだ登録されたスキルがありません。
                        </div>
                    @endforelse
                </div>
            </div>
            <div class="col-md-8 text-right">
                <ul class="timeline">
                    @forelse($user->careers as $career)
                        @include('partials.time-line', ['career' => $career])
                    @empty
                        <div class="mr-5 float-right alert alert-light" style="width: 18rem" role="alert">
                            まだ登録された経歴がありません。
                        </div>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection
