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
                    </div>
                </div>
                <div class="row">
                    @forelse($user->skills as $skill)
                        <div class="col-md-6">
                            <div class="card shadow mb-3">
                                <img src="{{ asset("storage/images/$skill->image")  }}" class="card-img-top" alt="...">
                                <div class="card-footer text-center">
                                    <h3>{{ $skill->name }}</h3>
                                </div>
                            </div>
                        </div>
                    @empty
                        No skills
                    @endforelse
                </div>
            </div>
            <div class="col-md-8 text-right">
                <ul class="timeline">
                    @forelse($careers as $career)
                        <li>
                            <div class="timeline-badge info"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">{{ $career->experience }}</h4>
                                    <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>{{ "{$career->start_year}年{$career->start_month}月-{$career->end_year}年{$career->end_month}月" }}</small></p>
                                </div>
                                <div class="timeline-body mb-3">
                                    <p>
                                        {{ $career->details }}
                                    </p>
                                </div>
                            </div>
                        </li>
                    @empty
                        No careers
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection
