@include('admin.includes.head');
<body>
<!-- Main Wrapper -->
<div class="main-wrapper">

    //header
    @include('admin.includes.header');

    <!-- Sidebar -->
    @include('admin.includes.sidebar');
    <!-- /Sidebar -->
   @yield('content')

@include('admin.includes.script');

@yield('js')
