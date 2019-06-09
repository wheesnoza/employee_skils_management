<div class="card shadow mb-3" style="width: 18rem">
    <div class="card-body">
        <div class="text-center">
            <img src="@if($user->profile->avatar) /images/{{ $user->profile->avatar }} @else {{ asset('storage/images/no_avatar.png') }} @endif" alt="..." style="width: 200px;" class="img-thumbnail mb-3">
            <h3 style="color: #636b6f;">{{ $user->profile->first_name }}{{ $user->profile->last_name }}</h3>
        </div>
        <hr>
        <p>
            <i class="fas fa-map-marker-alt fa-lg text-secondary"></i>
            {{ $user->profile->address }}
        </p>
        <hr>
        <p>
            <i class="fas fa-calendar-alt fa-lg text-secondary"></i>
            {{ $user->profile->birth_year }}年{{ $user->profile->birth_month }}月{{ $user->profile->birth_day }}日
        </p>
        <hr>
        <p>
            <i class="fas fa-envelope fa-lg text-secondary"></i>
            {{ $user->email }}
        </p>
    </div>
</div>
