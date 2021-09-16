@extends('layouts.app')

@section('content')

  <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron mb-0 vertical-center shadow">
        <div class="container text-light text-center align-self-center">
          <div class="px-3 pt-3 pb-2"> <!-- rounded shadow border border-dark bg-trandark">-->
            <h1 class="display-4 font-weight-bold"><em>THE</em> <span class="accent-color">LEGIT</span> COMMUNITY FOR DIABLO II</h1>
            <p>MetaDiablo is a community made project for Diablo II, and Diablo II: Lord of Destruction that is founded on a legit gaming vision that is to be as close to what we feel was intended by Blizzard North (to have fun, and enjoy playing, including support for game mods/servers such as <a href="http://d2ga.net" target="_blank">D2GA</a>). This means we do not support any sort of battle.net hacking, cheating, or exploiting.
            </p>
            <p>
              <code>Total Posts: {{ $statistics->total_posts }}</code> | <code>Total Members: {{ $statistics->total_users }}</code> | <code>Newest Member: <strong>{{ $statistics->last_username }}</strong></code>
            </p>
            <p>
              <a class="btn btn-accent btn-lg" href="{{ route('about') }}" role="button">Learn more &raquo;</a>
            </p>
          </div>
        </div>
      </div>

  <section class="solid-row pt-5 small" id="feature">
    <div class="container">
        <div class="row justy-content-center">
            <div class="col-lg-3 col-md-6">
                <div class="text-center feature-block">
                    <div class="feature-icon-block mb-4">
                        <i class="fa fa-user-friends fa-3x accent-color icon-outline"></i>
                    </div>
                    <h2 class="mb-3 text-uppercase font-weight-bold">Guilds</h2>
                    <p>Create awesome guilds for Diablo II, organize your resets, insignia, emblems, bot-killing raids, Baal runs, and more!</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="text-center feature-block">
                    <div class="feature-icon-block mb-4">
                        <i class="fa fa-users fa-3x accent-color icon-outline"></i>
                    </div>
                    <h2 class="mb-3 text-uppercase font-weight-bold">Community</h2>
                    <p>Toxic behavior and cheating players are discouraged from participating with MetaDiablo.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="text-center feature-block">
                    <div class="feature-icon-block mb-4">
                        <i class="fas fa-newspaper fa-3x accent-color icon-outline"></i>
                    </div>
                    <h2 class="mb-3 text-uppercase font-weight-bold">News &amp; Blog</h2>
                    <p>For the latest information on Diablo II; all of the latest up-to-date news can be found here!</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="text-center feature-block">
                    <div class="feature-icon-block mb-4">
                        <i class="fas fa-gamepad fa-3x accent-color icon-outline"></i>
                    </div>
                    <h2 class="mb-3 text-uppercase font-weight-bold">Guides</h2>
                    <p>If you're having trouble with a build or game mechanics we have full guides to help you in Sanctuary.</p>
                </div>
            </div>
            
        </div>
    </div>
    <!-- / .container -->
</section>



<section class="plax-guild-learn py-5 shadow-sm" id="learn-guilds">
  <div class="container">
    <div class="row align-items-center ">
        <div class="col-md-9">
            <div class="about-content-2 ">
                <h3 class="display-5">
                  Create, Manage, and Join Guilds!
                </h3>
                <span class="accent-color lead">Want to learn more?</span>
            </div>
        </div>
        <div class="col mb-2">
            <div class="about-img text-right">
              <a class="btn btn btn-accent text-dark">
                <i class="fas fa-user-friends icon-outline" style="color: #f8f9fa;"></i> Learn More
              </a>
            </div>
        </div>
    </div>
</div>
  <!-- / .container -->
</section>



<section class="solid-row-large pt-3 shadow-sm" id="top-threads">
  <div class="text-center mx-auto mt-5 container">
    <h3 class="text-uppercase display-5">Top Threads</h3>
    <hr class="incline-line my-4 accent-color">
    <h4 class="mb-5">These are the {{ $topThreads->count() }} most popular threads on the forum.</h4>
    <div class="row mb-2">
    @foreach ($topThreads as $thread)
      <div class="col-md-6">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative topThreadBorder">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary">{{ $thread->post_category }}</strong>
            <h4 class="mb-0">{{ $thread->title }}</h4>
            <div class="mb-1 text-muted">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($thread->post_created_at))->diffForHumans() }}</div>
            <p class="card-text mb-auto">{!! str_limit(BBCode::parse($thread->post_snippit), $limit = 130, $end = '...') !!}</p>
            <a href="{{ route('forumPosts', ['categorySlug' => $thread->post_category_slug, 'threadSlug' => $thread->slug]) }}" class="stretched-link">Continue thread</a>
          </div>
          <div class="col-auto d-none d-lg-block">
          <img src="{{ asset('img/trade-thumb.jpg') }}" alt="trade-thumbnail"/>
          </div>
        </div>
      </div>
    @endforeach

    </div>
  </div>
</section>
@endsection