<div class="navbar navbar-expand navbar-dark bg-metadark borderx-darker">
    <div class="collapse navbar-collapse">
        <!-- SOCIAL ICONS !-->
        <ul class="navbar-nav col-md-4">
            <li class="nav-item">
                <a class="nav-link" target="_blank" href="https://discord.gg/aM5rt2S"><i class="fab fa-discord fa-2x icon-outline" style="color: #7289DA;"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" target="_blank" href="https://www.facebook.com/MetaDiablo"><i class="fab fa-facebook-square fa-2x icon-outline" style="color: #3b5998;"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" target="_blank" href="https://www.youtube.com/channel/UCavDwFiHA2dCANS6iabQhUw/"><i class="fab fa-youtube fa-2x icon-outline" style="color: #c4302b;"></i></a>
            </li>
            
        </ul><!-- END SOCIAL ICONS !-->

        <!-- LOGO !-->
        <ul class="navbar-nav mx-auto text-center d-none d-md-block pr-0 col-4">
            <li class="nav-item">
                <a class="navbar-brand mx-auto" href="{{ url('/') }}"><img src="{{ asset('img/logo240x60.png') }}" alt="logo"></a>
            </li>
        </ul><!-- END LOGO !-->

        <!-- REG/LOGIN BUTTONS !-->
        <ul class="navbar-nav col col-8 col-md-4 ml-auto">
            <li class="ml-auto">
            @guest
                @if (Route::has('register'))
                    <li class="nav-item d-inline ml-2">
                        <a href="{{ route('register') }}" class="btn-sm btn-light btn font-weight-bold shadow-sm" role="button"><i class="fas fa-edit icon-outline accent-color"></i> {{ __('Register') }}</a>
                    </li>
                    <li class="nav-item d-inline">
                        <span class="d-inline align-middle mx-2 text-light font-weight-bold small" style="margin-top:4.5%;">OR</span>
                    </li>
                @endif
                    <li class="nav-item d-inline">
                        <a href="{{ route('login') }}" class="btn-sm btn-accent btn font-weight-bold shadow-sm" role="button"><i class="fas fa-lock icon-outline accent-color-invert"></i> {{ __('Login') }}</a>
                    </li>
            @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="far fa-user icon-outline accent-color"></i> {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('profileUpdate') }}">
                              {{ __('nav.profileUpdate') }}
                            </a>
                            @can('isAdmin')
                              <a class="dropdown-item" href="{{ route('backstage') }}">
                                {{ __('Backstage') }}
                              </a>
                            @endcan
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
            @endguest
        </ul><!-- END REG/LOGIN BUTTONS !-->
    </div>
</div>

<nav class="navbar navbar-expand-md navbar-dark one-edge-shadow bg-metadark borderx-lighter main-navigation p-0">
  <button class="ml-2 mt-2 navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-main" aria-controls="navbar-main" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-center" id="navbar-main">
    <ul class="navbar-nav small text-uppercase font-weight-bold ml-2 ml-md-0">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-home accent-color icon-outline"></i> {{ __('Home') }}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('forumCategories') }}"><i class="fas fa-comment-alt accent-color icon-outline"></i> {{ __('Forum') }}</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown-tools" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-tools accent-color icon-outline"></i> {{ __('Tools') }}</a>
        <div class="dropdown-menu" aria-labelledby="dropdown-tools">
        <a class="dropdown-item" href="{{ route('areaLevels') }}">Area Level Tool</a>
          <a class="dropdown-item" href="{{ route('rwtool') }}">Rune Word Tool</a>
          <a class="dropdown-item" href="http://bns.laserblue.org/" target="_blank">(B)attle.(n)et Services</a>
          <a class="dropdown-item" href="{{ asset('downloads/Hero_Editor_V104.zip') }}" target="_blank"><i class="fas fa-download icon-outline"></i> Diablo 2 Hero Editor v1.04</a>
          <a class="dropdown-item" href="http://www.svenswrapper.de/english/" target="_blank"> Sven's GLIDE-wrapper</a>
          <a class="dropdown-item" href="http://laserblue.org/d2ex" target="_blank"> D2EX</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown-servers" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-server accent-color icon-outline"></i> {{ __('Servers') }}</a>
        <div class="dropdown-menu" aria-labelledby="dropdown-servers">
          <a class="dropdown-item" href="http://d2ga.net/" target="_blank">Diablo II Game Arena</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown-mods" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-code-branch accent-color icon-outline"></i> {{ __('Mods') }}</a>
        <div class="dropdown-menu" aria-labelledby="dropdown-mods">
          <a class="dropdown-item" href="http://plugy.free.fr/en/index.html" target="_blank"> PlugY, The Survival Kit</a>
        </div>
      </li>
    </ul>
  </div>
  <a class="navbar-brand d-block d-sm-none d-none d-sm-block d-md-none d-lg-none d-xl-none mx-auto" href="#"><img src="{{ asset('img/logo240x60.png') }}" alt="logo"></a>
</nav>