<!DOCTYPE html>
<html lang="ar">

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

</head>


@include('MerchantAdmin.sidebar')


<div id="content-wrapper" class="d-flex flex-column">


    <div id="content">

        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>

            <ul class="navbar-nav ml-auto">
              <li class="nav-item no-arrow">
                <a class="nav-link" href="" data-toggle="modal" data-target="#logoutModal">
                  <span class="navbar-linked mr-1 d-none d-lg-inline text-dark small">
                    <i class="fas fa-sign-out-alt"></i>Logout</span>
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
                <span>All Rights Reserved <b>AGIL</b> &copy;2023</span>
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
                <a class="btn btn-info" href="{{ route('mad_dashboard') }}"
                    onclick="event.preventDefault();
          document.getElementById('logout-form').submit();"> Logout
                </a>
                <form id="logout-form" action="{{ route('mad_logout') }}" method="POST" style="display: none;">
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
</body>

</html>
