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
                        No skills
                    @endforelse
                </div>
            </div>
            <div class="col-md-8 text-right">
                <ul class="timeline">
                    @forelse($user->careers as $career)
                        @include('partials.time-line', ['career' => $career])
                    @empty
                        No careers
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection
