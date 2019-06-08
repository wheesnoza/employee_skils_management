@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th></th>
                <th scope="col">氏名</th>
                <th scope="col">メールアドレス</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @forelse ($users as $user)
                <tr>
                    <td><img src="@if($user->profile->avatar) /images/thumbnail-{{ $user->profile->avatar }} @else {{ asset('storage/images/thumbnail-no_avatar.png') }} @endif" alt="..." class="rounded"></td>
                    <td>{{ $user->profile->first_name }}{{ $user->profile->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><a href="{{ route('users.show', $user) }}" class="btn btn-link"><i class="fas fa-address-card fa-4x"></i></a></td>
                </tr>
            @empty
                <p>No users.</p>
            @endforelse
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
@endsection
