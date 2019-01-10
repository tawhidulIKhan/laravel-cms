<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
{{-- <link href="{{ asset('backend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    
    <link href="{{ asset('backend/css/backend-app.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('backend/vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">


    <!-- Morris Charts CSS -->
    <link href="{{ asset('backend/vendor/morrisjs/morris.css') }}" rel="stylesheet">
     <!-- Custom Fonts -->
    <link href="{{ asset('backend/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/css/tail.select-default.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
    <script src="{{ asset('backend/js/tail.select.min.js') }}"></script>

    
</head>

<body>

    <div id="wrapper" class="backend">


                <nav class="navbar navbar-dark bg-dark flex-md-nowrap p-0">
                    <div class="container">
                        <ul class="nav navbar-top-links ml-auto">

                             

                                      
                            <li class="nav-item dropdown">

                                            <a class="nav-link dropdown-toggle" 
                                            href="#" id="navbarProfile" 
                                                role="button" data-toggle="dropdown" 
                                                aria-haspopup="true" 
                                                aria-expanded="false">
                                                        <i class="fa fa-user    "></i>
                                                        Profile
                                                </a>
                                                <div class="dropdown-menu" 
                                                aria-labelledby="navbarProfile">
                                                        <a href="{{ route('user.profile') }}"><i class="fa fa-user fa-fw"></i> 
                                                            Your Profile
                                                        </a>

                                                        <form action="{{ route('logout') }}" method="post">
                                                                @csrf
                                                                <button class="btn btn-link" type="submit"><i class="fa fa-sign-out fa-fw"></i> Logout</button>
                        
                                                            </form>
                                                                    </div>
                                              </li>

                                              
                                    </ul>
                                    
                                    <!-- /.dropdown-user -->
                                </li>
                                <!-- /.dropdown -->
                            </ul>
                
                        </div>  
                        <!-- /.navbar-top-links -->
                              </nav>

                @include('layouts.partials.backend.sidebar')

                    <div class="col-9 ml-auto">
                            @yield('content')

                    </div>

            </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>
    <script src="{{ asset('backend/js/dashboard-script.js') }}"></script>

    <script src="{{ asset('backend/js/dashboard-init.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    
    <!-- Metis Menu Plugin JavaScript -->

    <!-- Morris Charts JavaScript -->

    <!-- Custom Theme JavaScript -->

        
</body>

</html>
