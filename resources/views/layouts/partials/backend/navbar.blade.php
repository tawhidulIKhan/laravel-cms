<nav class="navbar shadow-sm py-2 bg-white flex-md-nowrap p-0">
        <div class="container">

            <button class="btn" id="sidebarToggle">
                <i class="fa fa-align-justify" aria-hidden="true"></i>
            </button>
            <div class="dropdown ml-auto">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Profile
                    </button>
                    <div class="dropdown-menu my-profile" aria-labelledby="dropdownMenuButton">

                            <a class="dropdown-item" href="{{ route('user.profile') }}">
                                <i class="fa fa-user fa-fw"></i> 
                                Your Profile
                            </a>

                            <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="btn btn-link" type="submit"><i class="fa fa-sign-out fa-fw"></i> Logout</button>

                                </form>

                    </div>
                  </div>

    
            </div>  
            <!-- /.navbar-top-links -->
                  </nav>
