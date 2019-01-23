<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tetra Dashboard</title>

     <!-- Custom Fonts -->
    <link href="{{ asset('backend/css/tail.select-default.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
    <script src="{{ asset('backend/js/tail.select.min.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    
</head>

<body>

    <div id="wrapper" class="dashboard">



<div class="d-flex content-wrapper">
        @include('layouts.partials.backend.sidebar')

        <div class="container-fluid p-0">
            
            @include('layouts.partials.backend.navbar')            
            <div class="px-5">
                    @yield('content')

            </div>
        </div>
        
</div>
    

            </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>
    <script src="{{ asset('backend/js/dashboard-script.js') }}"></script>
    <script src="{{ asset('backend/js/dashboard-init.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    
    <!-- Metis Menu Plugin JavaScript -->

    <!-- Morris Charts JavaScript -->

    <!-- Custom Theme JavaScript -->

        
</body>

</html>
