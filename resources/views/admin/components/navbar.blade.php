<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="javascript:void(0)" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-user"></i></a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">{{ auth()->user()->name }}</span>
        <div class="dropdown-divider"></div>
        <form action="{{ route('logout') }}" class="dropdown-item dropdown-footer" method="POST">
          @csrf
          <button type="submit" class="btn btn-sm btn-block btn-danger">{{ __('Logout') }}</button>
        </form>
      </div>
    </li>
  </ul>
</nav>