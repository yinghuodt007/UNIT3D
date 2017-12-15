<div class="block">
    <h3>
        <i class="fa fa-lock"></i> Private Info
    </h3>
    <table class="table table-condensed table-bordered table-striped">
        <tbody>
        <tr>
            <td class="col-sm-3"> PID</td>
            <td>
                <div class="row">
                    <div class="col-sm-2">
                        <button type="button"
                                class="btn btn-xxs btn-info collapsed"
                                data-toggle="collapse"
                                data-target="#pid_block"
                                aria-expanded="false">
                            Show PID
                        </button>
                    </div>
                    <div class="col-sm-10">
                        <div id="pid_block" class="collapse" aria-expanded="false" style="height: 0px;">
                            <span class="text-monospace">{{ $user->passkey }}</span>
                            <br>
                        </div>
                        <span class="small text-red">
                                PID is like your password, you must keep it safe!
                            </span>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td> User ID</td>
            <td>{{ $user->id }}</td>
        </tr>
        <tr>
            <td> Email</td>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <td> Last Access</td>
            <td>{{ date('M d Y H:m', $user->updated_at->getTimestamp()) }}</td>
        </tr>
        <tr>
            <td> Can Upload</td>
            @if($user->can_upload == 1)
                <td>
                    <span class="text-success text-bold"> YES</span>
                </td>
            @else
                <td>
                    <span class="text-danger text-bold"> NO</span>
                </td>
            @endif
        </tr>
        <tr>
            <td> Can Download</td>
            @if($user->can_download == 1)
                <td>
                    <span class="text-success text-bold"> YES</span>
                </td>
            @else
                <td>
                    <span class="text-danger text-bold"> NO</span>
                </td>
            @endif
        </tr>
        <tr>
            <td> Can Comment</td>
            @if($user->can_comment == 1)
                <td>
                    <span class="text-success text-bold"> YES</span>
                </td>
            @else
                <td>
                    <span class="text-danger text-bold"> NO</span>
                </td>
            @endif
        </tr>
        <tr>
            <td> Can Request</td>
            @if($user->can_request == 1)
                <td>
                    <span class="text-success text-bold"> YES</span>
                </td>
            @else
                <td>
                    <span class="text-danger text-bold"> NO</span>
                </td>
            @endif
        </tr>
        <tr>
            <td> Can Chat</td>
            @if($user->can_chat == 1)
                <td>
                    <span class="text-success text-bold"> YES</span>
                </td>
            @else
                <td>
                    <span class="text-danger text-bold"> NO</span>
                </td>
            @endif
        </tr>
        <tr>
            <td> Can Invite</td>
            @if($user->can_invite == 1)
                <td>
                    <span class="text-success text-bold"> YES</span>
                </td>
            @else
                <td>
                    <span class="text-danger text-bold"> NO</span>
                </td>
            @endif
        </tr>
        <tr>
            <td> Invites</td>
            @if($user->invites > 0)
                <td>
                    <span class="text-success text-bold"> {{ $user->invites }}</span>
                    <a href="{{ route('inviteTree', ['username' => $user->username, 'id' => $user->id]) }}">
                            <span class="badge-extra text-bold">
                                <strong>Invite Tree</strong>
                            </span>
                    </a>
                </td>
            @else
                <td>
                    <span class="text-danger text-bold"> {{ $user->invites }}</span>
                    <a href="{{ route('inviteTree', ['username' => $user->username, 'id' => $user->id]) }}">
                            <span class="badge-extra text-bold">
                                <strong>Invite Tree</strong>
                            </span>
                    </a>
                </td>
            @endif
        </tr>
        </tbody>
    </table>
    <br>
</div>

<div class="block text-center">
    <a href="{{ route('user_settings', ['username' => $user->username, 'id' => $user->id]) }}">
        <button class="btn btn-primary">
            <i class="fa fa-cog"></i> Account Settings
        </button>
    </a>
    <a href="{{ route('user_edit_profile', ['username' => $user->username, 'id' => $user->id]) }}">
        <button class="btn btn-primary">
            <i class="fa fa-user"></i> Edit Profile
        </button>
    </a>
    <a href="{{ route('invite') }}">
        <button class="btn btn-primary">
            <i class="fa fa-plus"></i> Invites
        </button>
    </a>
    <a href="{{ route('user_clients', ['username' => $user->username, 'id' => $user->id]) }}">
        <button class="btn btn-primary">
            <i class="fa fa-server"></i> My Seedboxes
        </button>
    </a>
</div>

<div class="block text-center">
    <a href="{{ route('myuploads', ['username' => $user->username, 'id' => $user->id]) }}">
        <button class="btn btn-success">
            <i class="fa fa-upload"></i> Uploads Table
        </button>
    </a>
    <a href="{{ route('myactive', ['username' => $user->username, 'id' => $user->id]) }}">
        <button class="btn btn-success">
            <i class="fa fa-clock-o"></i> Active Table
        </button>
    </a>
    <a href="{{ route('myhistory', ['username' => $user->username, 'id' => $user->id]) }}">
        <button class="btn btn-success">
            <i class="fa fa-history"></i> History Table
        </button>
    </a>
</div>