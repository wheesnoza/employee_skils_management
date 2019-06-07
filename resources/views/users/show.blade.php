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
                <a href="{{ route('profile.edit') }}" class="btn btn-info btn-lg text-white ml-2 mb-3 shadow">スキルを追加する</a>
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
                <a href="{{ route('profile.edit') }}" class="btn btn-info btn-lg text-white ml-2 mb-3 shadow">経歴を追加する</a>
                <ul class="timeline">
                    <li>
                        <div class="timeline-badge info"></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title">プロジェクト名</h4>
                                <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 2018-2019</small></p>
                            </div>
                            <div class="timeline-body mb-3">
                                <p>
                                    コンテンツの内容ではなく、純粋にデザインを評価する場合にこれらの文章は役にたちます。
                                    人間は文章を読んでその意味を理解してしまうと、その他の部分への評価に影響を与えてしまうと言われていることがその理由です。
                                    では、日本語の場合はどうでしょう。 前述のラテン文字とは違い、日本語の表記体系は非常に複雑です。
                                    ひらがな・カタカナ・漢字・数字・アルファベットを織り交ぜて記述されるため、Lorem ipsumでは全く代用できません。
                                </p>
                            </div>
                            <div class="btn-group">
                                <a href="#" class="btn btn-danger">削除</a>
                            </div>
                            <div class="btn-group">
                                <a href="#" class="btn btn-primary">編集</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
