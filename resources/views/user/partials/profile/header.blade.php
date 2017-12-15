<div class="block">
    <div class="header gradient blue">
        <div class="inner_content">
            <div class="content">
                <div class="col-md-2">
                    @if($user->image != null)
                        <img src="{{ url('files/img/' . $user->image) }}" alt="{{{ $user->username }}}"
                             class="img-circle">
                    @else
                        <img src="{{ url('img/profile.png') }}" alt="{{{ $user->username }}}" class="img-circle">
                    @endif
                </div>
                <div class="col-md-10">
                    <h2>{{ $user->username }}
                        @if($user->isOnline())
                            <i class="fa fa-circle text-green" data-toggle="tooltip" title=""
                               data-original-title="User Is Online!"></i>
                        @else
                            <i class="fa fa-circle text-red" data-toggle="tooltip" title=""
                               data-original-title="User Is Offline!"></i>
                        @endif
                        @if($user->getWarning() > 0)<i class="fa fa-exclamation-circle text-orange" aria-hidden="true"
                                                       data-toggle="tooltip" title=""
                                                       data-original-title="Active Warning"></i>@endif
                        @if($user->notes->count() > 0 && $owner->group->is_modo)<i class="fa fa-comment fa-beat"
                                                                                   aria-hidden="true"
                                                                                   data-toggle="tooltip" title=""
                                                                                   data-original-title="Staff Noted Account"></i>@endif
                    </h2>
                    <h4>Rank: <span class="badge-user text-bold" style="color:{{ $user->group->color }}"><i
                                    class="{{ $user->group->icon }}" data-toggle="tooltip" title=""
                                    data-original-title="{{ $user->group->name }}"></i> {{ $user->group->name }}</span>
                    </h4>
                    <h4>Member Since {{ date('M d Y', $user->created_at->getTimestamp()) }}</h4>
                    <span style="float:left;">
          @if($owner->id != $user->id)
                            @if($owner->isFollowing($user->id))
                                <a href="{{ route('unfollow', ['user' => $user->id]) }}"
                                   id="delete-follow-{{ $user->target_id }}" class="btn btn-xs btn-info"
                                   title="Unfollow"><i class="fa fa-user"></i> Unfollow {{ $user->username }}</a>
                            @else
                                <a href="{{ route('follow', ['user' => $user->id]) }}" id="follow-user-{{ $user->id }}"
                                   class="btn btn-xs btn-success" title="Follow"><i
                                            class="fa fa-user"></i> Follow {{ $user->username }}</a>
                            @endif
                            <button class="btn btn-xs btn-danger" data-toggle="modal"
                                    data-target="#modal_user_report"><i class="fa fa-eye"></i> Report User</button>
                        @endif
          </span>
                    <span style="float:right;">
          @if(Auth::check() && $owner->group->is_modo)
                            @if($user->group->id == 5)
                                <button class="btn btn-xs btn-warning" data-toggle="modal"
                                        data-target="#modal_user_unban"><span
                                            class="fa fa-undo"></span> Unban User </button>
                            @else
                                <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal_user_ban"><span
                                            class="fa fa-ban"></span> Ban User</button>
                            @endif
                            <a href="{{ route('user_setting', ['username' => $user->username, 'id' => $user->id]) }}"
                               class="btn btn-xs btn-warning"><span class="fa fa-pencil"></span> Edit User </a>
                            <button class="btn btn-xs btn-danger" data-toggle="modal"
                                    data-target="#modal_user_delete"><span
                                        class="fa fa-trash"></span> Delete User </button>
                        @endif
          </span>
                </div>
            </div>
        </div>
    </div>
</div>