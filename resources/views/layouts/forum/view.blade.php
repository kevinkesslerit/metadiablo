@extends('layouts.app', ['title' => 'Forum Categories', 'description' => 'A list of MetaDiablo forum categories.'])

@section('content')
    <div class="container">
    <div class="row text-dark font-weight-bold bg-accent">
    <div class="col py-2">
Diablo II
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


  @foreach($categories as $category)
  <div class="row mb-1" style="background-color: #1C1C21;">
    <div class="col-7 py-1 pt-2">
        <i class="far fa-comment-alt fa-2x icon-outline accent-color"></i>
        <a href="{{ route('forumThreads', ['categorySlug' => $category['slug']]) }}">{{ $category->title }}</a>
      <br>
      <small class="text-muted">{{ $category->description }}</small>
    </div>
    <div class="col-2 text-center py-1" style="background-color: #27272D;">
    @if ($category->total_threads === 1)
    {{ $category->total_threads }} thread
    @else
    {{ $category->total_threads }} threads
    @endif
    <br>
    @if ($category->total_posts === 1)
    {{ $category->total_posts }} post
    @else
    {{ $category->total_posts }} posts
    @endif
    </div>
    <div class="col-3 py-1 small">
      <!-- use ID here instead-->
      @if ($category->last_post_time === null)
       <a href="{{ route('forumThreadsCreate', ['categorySlug' => $category->slug]) }}">Make a Thread in {{ $category->title }}!</a>
      @else
       {{ \Carbon\Carbon::createFromTimeStamp(strtotime($category->last_post_time))->diffForHumans() }} in <strong><a href="{{ route('forumPosts',['categorySlug' => $category->slug, 'threadSlug' => $category->thread_slug]) }}">{{ $category->last_thread_title }}</a></strong> by <a href="{{ route('profileView', ['id' => $category->user_id, 'name' => $category->user_name]) }}">{{ $category->last_post_author }}</a>
      @endif
    </div>
  </div>
  @endforeach

@endsection