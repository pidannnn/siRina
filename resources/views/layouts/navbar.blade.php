<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <ul class="navbar-nav ml-auto">
    @auth
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-user"></i> {{ Auth::user()->name }}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-danger" href="{{ route('logout') }}" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
    @endauth

    @guest
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-user"></i> Guest</a>
      </li>
    @endguest
  </ul>
</nav>
