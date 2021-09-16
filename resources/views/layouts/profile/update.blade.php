@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col my-5">
                <div class="card first-layer">
                    <h3 class="card-header">Update Your Profile</h3>
                    <div class="card-body">
                        <form role="form" method="POST" action="{{ route('profilePostUpdate') }}">
                            {!! csrf_field() !!}
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="trackPosts" disabled checked>
                                                <label class="form-check-label" for="trackPosts">
                                                    Track Posts
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="trackTopics" disabled checked>
                                                <label class="form-check-label" for="trackTopics">
                                                    Track Topics
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-md-4">
                                            <h3 class="pl-0 h4">Username</h3>
                                                <input class="form-control" type="text" name="nameChange" placeholder="Blank for no change">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="pl-0 h4">Notes</h3>
                                            <textarea class="form-control" name="notesChange" rows="12">{{ $userInfo->notes }}</textarea>
                                            <small>(traditional <a href="https://www.bbcode.org/reference.php" target="_blank">BBCode</a> and HTML (with restrictions) is accepted)</small>
                                        </div>
                                    </div>
                                </div>
                                <aside class="col-lg-3">
                                    <div class="row">
                                        <div class="col m-1 text-center">
                                            <img src="{{ asset($userInfo->avatar) }}" alt="avatar" class="rounded" width="125" height="125">
                                            <button type="button" class="btn btn-info btn-sm mt-1 text-center" data-toggle="modal" data-target="#modalAvatar">
                                                View All Avatars
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-center">
                                            <h3 class="h4 text-center m-0">{{ $userInfo->name }}</h3>
                                            @if($userInfo->email_verified_at === null)
                                                <strong style="color: red;"><i>UNVERIFIED</i></strong><br>
                                            @endif
                                            {{ $userInfo->title }}<br>
                                            @if($userInfo->clan_id != null)
                                                Clan ID: {{ $userInfo->clan_id }}<br>
                                                Clan Rank: {{ $userInfo->clan_rank }}<br>
                                            @endif
                                            Joined {{ \Carbon\Carbon::createFromTimeStamp(strtotime($userInfo->created_at))->diffForHumans() }}<br>
                                        </div>
                                    </div>
                                </aside>
                            </div>
                                    <!--
                                @if ($errors->has('avatar'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </div>
                                @endif
                                    -->
                            <button type="submit" class="btn btn-primary mt-1">
                                Save Changes
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade text-dark" id="modalAvatar" tabindex="-1" role="dialog" aria-labelledby="modalAvatarTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAvatarTitle">All Avatars</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @foreach ($avatars as $avatar)
                        <p>
                            <img src="{{ asset($avatar) }}" alt="avatar" class="rounded" width="125" height="125">
                            {{ $avatar }}
                        </p>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
