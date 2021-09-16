@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col my-5">
                <div class="card first-layer">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <!--<div class="row">
                                    <div class="col">
                                        <h3 class="card-header pl-0 h4">Activity</h3>
                                        <p>Nothing notable, yet!</p>
                                    </div>
                                </div>-->
                                <div class="row">
                                    <div class="col">
                                        <h3 class="pl-0 h4">Notes</h3>
                                        @if (!is_null($userInfo->userNotes))
                                        {!! BBCode::parse($userInfo->userNotes, true) !!}
                                        @else
                                            <p>This member has not filled out their profile.</p>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <aside class="col-lg-3">
                                <div class="row">
                                    <div class="col m-1 text-center">

                                        <img src="{{ asset($userInfo->userAvatar) }}" class="img-responsive rounded" width="125" height="125" alt="Avatar" />
                                    </div>
                                </div>
                                <h3 class="h4 text-center">{{ $userInfo->userName }}</h3>
                                <div class="row">
                                    <div class="col text-center">
                                        @if($userInfo->userVerified === null)
                                            <strong style="color: red;"><i>UNVERIFIED</i></strong><br>
                                        @endif
                                            {{ $userInfo->userTitle }}<br>
                                            @if($userInfo->userGuildId != null)
                                                Guild ID: {{ $userInfo->userGuildId }}<br>
                                                Guild Rank: {{ $userInfo->userGuildRank }}<br>
                                            @endif
                                            Joined {{ \Carbon\Carbon::createFromTimeStamp(strtotime($userInfo->userCreatedDate))->diffForHumans() }}<br>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
                @auth
                    <a href="{{ route('profileUpdate') }}">Click here to update your own profile</a>
                @endauth
            </div>
        </div>
    </div>

@endsection
