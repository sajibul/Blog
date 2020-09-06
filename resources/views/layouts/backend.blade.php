<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Blog-@yield('title')</title>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="icon" href="favicon.ico" type="{{asset('backend')}}/image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <link href="{{asset('backend')}}/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="{{asset('backend')}}/plugins/node-waves/waves.css" rel="stylesheet" />
        <link href="{{asset('backend')}}/plugins/animate-css/animate.css" rel="stylesheet" />
        <link href="{{asset('backend')}}/plugins/morrisjs/morris.css" rel="stylesheet" />
        <link href="{{asset('backend')}}/css/themes/all-themes.css" rel="stylesheet" />
        <link type="text/css" rel="stylesheet" href="{{asset('backend')}}/css/font-awesome.min.css"/>
        <link href="{{asset('backend')}}/css/toastr.min.css" rel="stylesheet" />
        <script src="{{asset('backend')}}/js/sweetalert2.all.min.js"></script>
        @stack('css')
        <link href="{{asset('dashboard')}}/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="{{asset('backend')}}/css/style.css" rel="stylesheet">
</head>
  <body class="theme-cyan">
      <div class="page-loader-wrapper">
          <div class="loader">
              <div class="preloader">
                  <div class="spinner-layer pl-red">
                      <div class="circle-clipper left">
                          <div class="circle"></div>
                      </div>
                      <div class="circle-clipper right">
                          <div class="circle"></div>
                      </div>
                  </div>
              </div>
              <p>Please wait...</p>
          </div>
      </div>
      <div class="overlay"></div>
      <nav class="navbar">
          <div class="container-fluid">
              <div class="navbar-header">
                  <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                  <a href="javascript:void(0);" class="bars"></a>
                  <a class="navbar-brand" href="{{url('/')}}">Blog</a>
              </div>
              <div class="collapse navbar-collapse" id="navbar-collapse">
                  <ul class="nav navbar-nav navbar-right">
              </div>
          </div>
      </nav>
      <section><!-- #Top Bar -->
          <aside id="leftsidebar" class="sidebar"><!-- Left Sidebar -->
              <div class="user-info"><!-- User Info -->
                  <div class="image">
                      <img src="{{asset('storage/profile/'.Auth::user()->user_picture)}}" width="48" height="48" alt="User" />
                  </div>
                  <div class="info-container">
                      <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</div>
                      <div class="email">{{Auth::user()->email}}</div>
                      <div class="btn-group user-helper-dropdown">
                          <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                          <ul class="dropdown-menu pull-right">
                            @if(Auth::user()->role_id==1)
                              <li><a href="{{route('admin.setting')}}"><i class="material-icons">person</i>Profile</a></li>
                            @else
                              <li><a href="{{route('author.setting')}}"><i class="material-icons">person</i>Profile</a></li>
                            @endif
                              <li role="separator" class="divider"></li>
                              <li><a href="href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();""><i class="material-icons">input</i>
                                  <span>Sign Out</span>
                              </a></li>
                          </ul>
                      </div>
                  </div>
              </div><!-- #User Info -->
              @include('layouts.partial.sidebar');
              <div class="legal"><!-- Footer -->
                  <div class="copyright">
                      &copy; Blog <a href="#">sajibul</a>.
                  </div>
              </div>  <!-- #Footer -->
          </aside><!-- #END# Left Sidebar -->
      </section>
      <section class="content">
          <div class="container-fluid">
            @yield('content')
          </div>
      </section>
        <!-- Jquery Core Js -->
        <script src="{{asset('backend')}}/plugins/jquery/jquery.min.js"></script>
        <script src="{{asset('backend')}}/plugins/bootstrap/js/bootstrap.js"></script>
        <script src="{{asset('backend')}}/plugins/bootstrap-select/js/bootstrap-select.js"></script>
        <script src="{{asset('backend')}}/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="{{asset('backend')}}/plugins/node-waves/waves.js"></script>
        <script src="{{asset('backend')}}/plugins/jquery-countto/jquery.countTo.js"></script>
        <script src="{{asset('backend')}}/plugins/chartjs/Chart.bundle.js"></script>
        <script src="{{asset('backend')}}/js/admin.js"></script>
        <script src="{{asset('backend')}}/plugins/jquery-datatable/jquery.dataTables.js"></script>
        <script src="{{asset('backend')}}/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
        <script src="{{asset('backend')}}/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
        <script src="{{asset('backend')}}/js/pages/tables/jquery-datatable.js"></script>
        <script src="{{asset('backend')}}/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
        <script>
      			@if($errors->any())
      				@foreach($errors->all() as $error)
      					toastr.error('{{ $error }}','Error',{
      						closeButton:true,
      						progressBar:true,
      					});
      				@endforeach
      			@endif
      	</script>
        @stack('js')
        <script src="{{asset('backend')}}/js/demo.js"></script>
</body>
</html>
