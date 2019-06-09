@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('profile.edit') }}" class="btn btn-info btn-lg text-white ml-2 mb-3 shadow">プロフィール編集</a>
            @include('partials.profile', ['user' => $user])
            <button type="button" class="btn btn-info btn-lg text-white mb-3 shadow" data-toggle="modal" data-target="#exampleModalCenter">
                スキルを追加する
            </button>
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
            <a href="{{ route('career.new') }}" class="btn btn-info btn-lg text-white ml-2 mb-3 shadow">経歴を追加する</a>
            <div class="overflow-auto" style="max-height: 800px;">
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
