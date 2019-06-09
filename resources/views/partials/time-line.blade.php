<li>
    <div class="timeline-badge info"></div>
    <div class="timeline-panel">
        <div class="timeline-heading">
            <h4 class="timeline-title">{{ $career->experience }}</h4>
            <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>{{ "{$career->start_year}年-{$career->end_year}年" }}</small></p>
        </div>
        <div class="timeline-body mb-3">
            <p>
                {{ $career->details }}
            </p>
        </div>
        @if(Auth::user()->id == $career->user->id)
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
        @endif
    </div>
</li>
