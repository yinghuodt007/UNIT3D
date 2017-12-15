@extends('layout.default')
@section('title')
    <title>{{ $user->username }} - {{ trans('common.members') }} - {{ Config::get('other.title') }}
    </title>
@stop
@section('meta')
    <meta name="description"
          content="{{ 'Profil de l\'utilisateur ' . $user->username . ' sur le site ' . Config::get('other.title') . '. Découvrer son profile RLM en intégralité en vous inscrivant.' }}">
@stop
@section('breadcrumb')
    <li>
        <a href="{{ route('profile', ['id' => $user->id]) }}" itemprop="url"
           class="l-breadcrumb-item-link">
    <span itemprop="title" class="l-breadcrumb-item-link-title">{{ $user->username }}
    </span>
        </a>
    </li>
@stop
@section('content')
    <div class="container">
        @if( $user->private_profile == 1 && $owner->id != $user->id && !$owner->group->is_modo )
            <div class="container">
                <div class="jumbotron shadowed">
                    <div class="container">
                        <h1 class="mt-5 text-center">
                            <i class="fa fa-times text-danger">
                            </i> Attention: This Profile Has Been Set To PRIVATE!
                        </h1>
                        <div class="separator">
                        </div>
                        <p class="text-center">You are not authorized to view this page. This member prefers to be
                            hidden like a ninja!
                        </p>
                    </div>
                </div>
            </div>
        @else
            @include('user.partials.profile.recent_achievements')
            @include('user.partials.profile.followers')
            @include('user.partials.profile.header')
            @include('user.partials.profile.public_info')

            @if(Auth::check() && ($owner->id == $user->id || $owner->group->is_modo))
                @include('user.partials.profile.owners_info')
            @endif

        @endif
    </div>

    @include('user.user_modals', ['user' => $user])
@stop
