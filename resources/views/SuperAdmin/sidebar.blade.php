@php
$arList1 = ['ad_merchant_index', 'ad_merchant_edit','ad_branch_index', 'ad_branch_edit','ad_pos_index', 'ad_pos_edit', 'ad_pos_invoices'];
    function areActiveRoutes(array $routes, $output = "active")
    {
        foreach ($routes as $route) {
            if (Route::currentRouteName() == $route) return $output;
        }
    }
    function is_should_show_list(array $names, $no = 2)
    {
    if ($no == 1) {
        foreach ($names as $one) {
            if (Route::currentRouteName() == $one) {
                return 'show';
            }
        }
        return '';
    } else {
        foreach ($names as $one) {
            if (Route::currentRouteName() == $one) {
                return 'true';
            }
        }
        return 'false';
    }
    }
@endphp
<body id="page-top">

    <div id="wrapper">

      <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('ad_dashboard') }}">
            <img style=" width: 70px; height: auto; " src="{{ asset('Backend/img/white-logo.png') }}">
        </a>

        <hr class="sidebar-divider my-0">

        <li class="nav-item @if (\Request::is('cp/dashboard')) active @endif">
          <a class="nav-link" href="{{ route('ad_dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span class="sidebar-title">{{ __('sal.dashboard') }}</span></a>
        </li>

        <hr class="sidebar-divider d-none d-md-block">

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#liste1" aria-expanded="{{ is_should_show_list($arList1) }}">
              <i class="fa fa-archive"></i>
              <span class="sidebar-title">{{ __('sal.merchants') }}</span></a>
              <div class="collapse {{ is_should_show_list($arList1,1) }}" id="liste1">
                <ul class="nav">
                    <li class="nav-item {{ areActiveRoutes(['ad_merchant_index','ad_merchant_edit']) }}">
                        <a class="nav-link" href="{{ route('ad_merchant_index') }}">
                            <span class="sidebar-normal">{{ __('sal.all_merchants') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ areActiveRoutes(['ad_branch_index','ad_branch_edit']) }}">
                        <a class="nav-link" href="{{ route('ad_branch_index') }}">
                            <span class="sidebar-normal">{{ __('sal.branches') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ areActiveRoutes(['ad_pos_index','ad_pos_edit','ad_pos_invoices']) }}">
                        <a class="nav-link" href="{{ route('ad_pos_index') }}">
                            <span class="sidebar-normal">{{ __('sal.devices') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item @if (\Request::is('cp/merchants-admins')) active @endif">
            <a class="nav-link" href="{{ route('ad_merchant_admins_index') }}">
              <i class="fa fa-users"></i>
              <span class="sidebar-title">{{ __('sal.merchants_admins') }}</span></a>
        </li>

        <li class="nav-item @if (\Request::is('cp/reports')) active @endif">
          <a class="nav-link" href="{{ route('ad_reports_index') }}">
            <i class="fa fa-file-text-o"></i>
            <span class="sidebar-title">{{ __('sal.reports') }}</span></a>
        </li>

        <li class="nav-item @if (\Request::is('cp/users')) active @endif">
            <a class="nav-link" href="{{ route('ad_list_users') }}">
              <i class="fa fa-user-o"></i>
              <span class="sidebar-title">{{ __('sal.users') }}</span></a>
          </li>

        <li class="nav-item @if (\Request::is('cp/admins')) active @endif">
          <a class="nav-link" href="{{ route('ad_list_admins') }}">
            <i class="fas fa-user"></i>
            <span class="sidebar-title">{{ __('sal.super_admins') }}</span></a>
        </li>

        <div class="text-center d-none d-md-inline mt-4">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>


      </ul>
