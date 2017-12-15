<div class="well">
    <div class="row">
        <div class="col-md-12 profile-footer">
            {{ $user->username }}'s Follower's:
            @foreach($user->follows as $f)
                @if($f->user->image != null)
                    <a href="{{ route('profile', ['id' => $f->user_id]) }}">
                        <img src="{{ url('files/img/' . $f->user->image) }}" data-toggle="tooltip"
                             title="{{ $f->user->username }}" height="50px"
                             data-original-title="{{ $f->user->username }}">
                    </a>
                @else
                    <a href="{{ route('profile', ['id' => $f->user_id]) }}">
                        <img src="{{ url('img/profile.png') }}" data-toggle="tooltip" title="{{ $f->user->username }}"
                             height="50px" data-original-title="{{ $f->user->username }}">
                    </a>
                @endif
            @endforeach
            <div class="col-xs-1 matches-won"><i
                        class="fa fa-group text-success"></i><span>{{count($user->follows)}}</span>
            </div>
        </div>
    </div>
</div>