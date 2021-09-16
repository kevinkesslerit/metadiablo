@extends('layouts.app', ['title' => 'Forum Threads', 'description' => 'A list of MetaDiablo forum threads.'])

@section('content')
    <div class="container">
      <div class="row text-dark font-weight-bold bg-accent">
        <div class="col py-2">

          <div class="row">
            <div class="col">
            {{ $categoryTitle }}
            </div>
            @auth
            <div class="col text-right">
              <a href="{{ route('forumThreadsCreate', ['categorySlug' => $categorySlug]) }}" class="btn btn-dark btn-sm" role="button">{{ __('buttons.threadCreate') }}</a>
            </div>
            @endauth
          </div>

        </div>
      </div>
      
        <div class="row bg-metadark font-weight-bold py-1">
          <div class="col-7">
            Title
          </div>
          <div class="col-2 text-center">
            Statistics
          </div>
          <div class="col-3">
            Last Post
          </div>
        </div>
        @if($threads->count())
          @foreach($threads as $thread)
          <div class="row mb-1" style="background-color: #1C1C21;">
            <div class="col-7 py-1 pt-2">
                <i class="far fa-comment-alt icon-outline accent-color"></i>
                <a class="font-weight-bold" href="{{ route('forumPosts', ['categorySlug' => $categorySlug, 'threadSlug' => $thread->thread_slug]) }}">{{ $thread->thread_title }}</a> <small class="text-muted">by <a href="{{ route('profileView',['id' => $thread->user_id, 'name' => $thread->user_name]) }}">{{ $thread->user_name }}</a> {{ \Carbon\Carbon::createFromTimeStamp(strtotime($thread->thread_created_at))->diffForHumans() }}</small>
            </div>
            <div class="col-2 text-center py-1" style="background-color: #27272d;">
            @if ($thread->thread_posts === 1)
            {{ $thread->thread_posts }} post
            @else
            {{ $thread->thread_posts }} posts
            @endif

            </div>
            <div class="col-3 py-1">
            @if ($thread->lastPostAuthorId === null)
            None
            @else
            {{ \Carbon\Carbon::createFromTimeStamp(strtotime($thread->lastPostCreatedAt))->diffForHumans() }} by <a href="{{ route('profileView', ['id' => $thread->lastPostAuthorId, 'name' => $thread->lastPostAuthor]) }}">{{ $thread->lastPostAuthor }}</a>
            @endif
          </div>
          </div>
          @endforeach
        @else
        <a href="{{ route('forumThreadsCreate', ['categorySlug' => $categorySlug]) }}">Make the first thread!</a>
        @endif
          @auth
          <div class="text-right">
            <a href="{{ route('forumThreadsCreate', ['categorySlug' => $categorySlug]) }}" class="btn btn-accent btn-sm" role="button">{{ __('buttons.threadCreate') }}</a>
          </div>
          @endauth
      </div>
@endsection