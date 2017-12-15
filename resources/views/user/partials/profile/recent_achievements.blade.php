<div class="well">
    <div class="row">
        <div class="col-md-12 profile-footer">

            {{ $user->username }}'s Recent Achievements:

            @foreach($user->unlockedAchievements() as $a)
                <img src="/img/badges/{{ $a->details->name }}.png" data-toggle="tooltip" title="" height="50px"
                     data-original-title="{{ $a->details->name }}">
            @endforeach

            <div class="col-xs-1 matches-won"><i class="fa fa-trophy text-success"></i>
                <span>{{ $user->unlockedAchievements()->count() }}</span>
            </div>
        </div>
    </div>
</div>