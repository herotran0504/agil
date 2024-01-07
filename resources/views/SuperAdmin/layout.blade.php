<!DOCTYPE html>
@if (Session::get('locale', Config::get('app.locale')) == 'ar')
    <html dir="rtl" lang="ar">
@else
    <html lang="en">
@endif

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('Backend/img/icon.png') }}" sizes="32x32">

    <title>Admin Panel</title>

    <link href="{{ asset('Backend/css/fontawesome.css') }}" rel="stylesheet" type="text/css">
    <script src="https://use.fontawesome.com/8a9fc086f0.js"></script>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="{{ asset('Backend/css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('Backend/css/style.css') }}" rel="stylesheet">
    @if (Session::get('locale', Config::get('app.locale')) == 'ar')
    <link href="{{ asset('Backend/css/sb-admin-rtl.css') }}" rel="stylesheet">
    @endif

</head>


@include('SuperAdmin.sidebar')


<div id="content-wrapper" class="d-flex flex-column">


    <div id="content">

        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            @php
                if(Session::has('locale')){
                    $locale = Session::get('locale', Config::get('app.locale'));
                }
                else{
                    $locale = env('DEFAULT_LANGUAGE');
                }
            @endphp
            <div class="ml-auto">
                <div class="align-items-stretch d-flex dropdown " id="lang-change">
                    <a class="dropdown-toggle no-arrow" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="btn btn-icon">
                            <img src="{{ asset('Backend/img/flags/'.$locale.'.png') }}" height="11">
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-xs">
                            <li>
                                <a href="javascript:void(0)" data-flag="en" class="dropdown-item @if($locale == 'en') active @endif">
                                    <img src="{{ asset('Backend/img/flags/en.png') }}" class="mr-2">
                                    <span class="language">{{ __('sal.english') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" data-flag="ar" class="dropdown-item @if($locale == 'ar') active @endif">
                                    <img src="{{ asset('Backend/img/flags/ar.png') }}" class="mr-2">
                                    <span class="language">{{ __('sal.arabic') }}</span>
                                </a>
                            </li>
                    </ul>
                </div>
            </div>

            <ul class="navbar-nav">
                <li class="nav-item no-arrow">
                    <a class="nav-link" href="" data-toggle="modal" data-target="#logoutModal">
                        <span class="navbar-linked mr-1 d-none d-lg-inline text-dark small">
                            <i class="fas fa-sign-out-alt"></i>{{ __('sal.logout') }}</span>
                        <img class="img-profile rounded-circle" src="{{ asset('Backend/img/admin.png') }}">
                    </a>
                </li>

            </ul>

        </nav>

        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 style=" font-weight: bold; color: #0f0b42; " class="h4 mb-0">@yield('title')</h1>
            </div>
        </div>

        @yield('content')

    </div>


    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>{!! trans('sal.copyright') !!}</span>
            </div>
        </div>
    </footer>
</div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Are You Sure To Logout ?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Back</button>
                <a class="btn btn-info" href="{{ route('ad_dashboard') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout
                </a>
                <form id="logout-form" action="{{ route('ad_logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('Backend/js/jquery.min.js') }}"></script>
<script src="{{ asset('Backend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('Backend/js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('Backend/js/sb-admin-2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('Backend/js/bootstrap-filestyle.js') }}"></script>
<script src="{{ asset('Backend/js/custom.js') }}"></script>
<script>
    if ($('#lang-change').length > 0) {
        $('#lang-change .dropdown-menu a').each(function() {
            $(this).on('click', function(e) {
                e.preventDefault();
                var $this = $(this);
                var locale = $this.data('flag');
                $.post('{{ route('ad_language_change') }}', {
                    _token: '{{ csrf_token() }}',
                    locale: locale
                }, function(data) {
                    location.reload();
                });

            });
        });
    }
</script>
</body>

</html>
