<nav class="navigation -white -floating">
  <a class="navigation__logo" href="/"><span>DoSomething.org</span></a>
  <div class="navigation__menu">
  <ul class="navigation__primary">
    @if (Auth::user())
      <li>
        <a href="{{ route('keys.index', 'Keys') }}">
          <strong class="navigation__title">API Keys</strong>
          <span class="navigation__subtitle">Northstar API Keys</span>
        </a>
      </li>
      <li>
        <a href="{{ route('users.index', 'Users') }}">
          <strong class="navigation__title">Users</strong>
          <span class="navigation__subtitle">View all users</span>
        </a>
      </li>
    @endif
  </ul>
  <ul class="navigation__secondary">
    <li>
    @if (Auth::user())
      <li> {{ link_to_route('logout', 'Logout') }} </li>
    @else
      <li>
        <a href="#" data-modal-href="#signin-modal" class="signinModal">Login</a>
     </li>
    @endif
  </li>
  </ul>
  </div>
</nav>

<header class="header" role="banner">
  <div class="wrapper">
    <h1 class="header__title">
      Aurora
    </h1>
    <p class="header__subtitle">
      User admin tool to view Northstar users
    </p>
  </div>
</header>

@include('sessions.create')