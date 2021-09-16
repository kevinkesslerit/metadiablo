@extends('layouts.app', ['title' => $threadTitle, 'description' => 'A list of MetaDiablo forum posts under the '.$threadTitle.' thread.'])

@section('content')
<div class="container">
    <div class="row text-dark font-weight-bold bg-accent">
      <div class="col">
        <div class="col py-2 px-0">
        {{ $thread->title }}<br>
        <small class="text-muted">{{ $categoryTitle }}</small>
        </div>
      </div>
    </div>
    
  <!-- Discern if it's a thread post or an actual post -->
  @foreach($posts as $post)
  <div class="row py-1" style="background-color: #27272d; border-bottom: 1px solid #f1e24c">
    <div class="col-9 small text-muted">
      Posted {{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() }}
    </div>
    <div class="col-3 text-right">
      <a href="#">#{{ $post->post_order }}</a>
    </div>
  </div>

  <div class="row py-1 mb-1" style="background-color: #37373d;">
    <div class="col-3 small">
    <dl>
    <dt><a href="{{ route('profileView',['id' => $post->user_id, 'name' => $post->user_name]) }}">{{ $post->user_name }}</a></dt>
      <dd>{{ $post->user_title }}</dd>
      <dd>Registered: {{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->user_join_date))->diffForHumans() }}</dd>
    </dl>
    </div>
    <div class="col-9" style="border-left: 1px solid #f1e24c">
    <p class="post-body">{!! BBCode::parse($post->post_body) !!}</p>
    </div>
  </div>
  @endforeach


  @auth
  <div class="text-right">
    <a href="{{ route('forumPostsCreate', ['categorySlug' => $categorySlug, 'threadSlug' => $threadSlug]) }}" class="btn btn-outline-warning btn-sm" role="button">{{ __('buttons.postReply') }}</a>
  </div>
  @endauth
</div>
@endsection