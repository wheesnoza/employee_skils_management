<div class="card shadow mb-3">
    <img src="{{ asset("storage/images/$skill->image")  }}" class="card-img-top" alt="...">
    <div class="card-footer text-center">
        <h3>{{ $skill->name }}</h3>
        @if(Auth::user()->id == $skill->pivot->user_id)
            <form action="{{ route('skill.destroy', $skill) }}" method="POST">
                {{ method_field('DELETE')  }}
                {{ csrf_field() }}
                <input type="submit" class="btn btn-danger btn-sm" value="削除">
            </form>
        @endif
    </div>
</div>
