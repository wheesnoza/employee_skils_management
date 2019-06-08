@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('profile.edit') }}" class="btn btn-info btn-lg text-white ml-2 mb-3 shadow">プロフィール編集</a>
            <div class="card shadow mb-3">
                <div class="card-body">
                    <img src="@if($user->profile->avatar) /images/{{ $user->profile->avatar }} @else {{ asset('storage/images/no_avatar.png') }} @endif" alt="..." class="img-thumbnail mb-3">
                    <h3 style="color: #636b6f;">{{ $user->profile->first_name }}　{{ $user->profile->last_name }}</h3>
                    <p>{{ $user->profile->address }}</p>
                    <p>{{ $user->profile->birth_year }}/{{ $user->profile->birth_month }}/{{ $user->profile->birth_day }}</p>
                    <p>{{ $user->email }}</p>
                </div>
            </div>
            <button type="button" class="btn btn-info btn-lg text-white mb-3 shadow" data-toggle="modal" data-target="#exampleModalCenter">
                スキルを追加する
            </button>
            <div class="row">
                @forelse($user->skills as $skill)
                    <div class="col-md-6">
                        <div class="card shadow mb-3">
                            <img src="{{ asset("storage/images/$skill->image")  }}" class="card-img-top" alt="...">
                            <div class="card-footer text-center">
                                <h3>{{ $skill->name }}</h3>
                                <form action="{{ route('skill.destroy', $skill) }}" method="POST">
                                    {{ method_field('DELETE')  }}
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-danger btn-sm" value="削除">
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    No skills
                @endforelse
            </div>
        </div>
        <div class="col-md-8 text-right">
            <a href="{{ route('career.new') }}" class="btn btn-info btn-lg text-white ml-2 mb-3 shadow">経歴を追加する</a>
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
                                <div class="btn-group">
                                    <form action="{{ route('career.destroy', $career) }}" method="POST">
                                        {{ method_field('DELETE')  }}
                                        {{ csrf_field() }}
                                        <input type="submit" class="btn btn-danger btn-sm" value="削除">
                                    </form>
                                </div>
                                <div class="btn-group">
                                    <a href="{{ route('career.edit', $career) }}" class="btn btn-primary btn-sm">編集</a>
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
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">スキル追加</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('skill.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="skill">スキルを選ぶ</label>
                        <select class="form-control" id="skill" name="skill">
                            @foreach($skills as $skill)
                                <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                    <button type="submit" class="btn btn-primary">追加</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
