<body id="page-top">

    <div id="wrapper">

      <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('mad_dashboard') }}">
            <img style=" width: 70px; height: auto; " src="{{ asset('Backend/img/white-logo.png') }}">
        </a>

        <hr class="sidebar-divider my-0">

        <li class="nav-item @if (\Request::is('mcp/dashboard')) active @endif">
          <a class="nav-link" href="{{ route('mad_dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span class="sidebar-title">Dashboard</span></a>
        </li>

        <hr class="sidebar-divider d-none d-md-block">


        <div class="text-center d-none d-md-inline mt-4">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>


      </ul>
