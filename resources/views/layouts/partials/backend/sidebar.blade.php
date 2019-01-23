<div class="dashboard-sidebar active md-xs-hidden bg-secondary">
<div class="info d-flex px-3 align-items-center">
        <figure class="rounded-circle">
                <img src="{{ cms_thumbnail(auth()->user()->thumbnail) }}" class="img-fluid rounded-circle" alt="">

        </figure>
        <div class="pl-3">

                <h5>
                        Hello
                </h5>

                <h6>
                        {{ auth()->user()->username }}
                </h6>
        </div>
 
</div>

<div class="sep my-2"></div>
    <ul class="nav flex-column">
          <li class="nav-item">
          <a class="nav-link active" href="{{ route('dashboard') }}">

<i class="fa fa-home mr-3" aria-hidden="true"></i>
            Dashboard
            </a>
          
  


        </li>
        {{-- Category --}}
        @if (auth()->user()->hasPermission('create_permissions'))

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarCategory" 
            role="button" data-toggle="dropdown" aria-haspopup="true" 
            aria-expanded="false">
                    <i class="fa fa-tags    "></i>
                    Permissions
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarCategory">
                    <a class="dropdown-item" href="{{ route('permissions.index') }}">All Permissions</a>
                    <a class="dropdown-item" href="{{ route('permissions.create') }}">Add new permission</a>
                </div>
          </li>

          @endif

          @if (auth()->user()->hasPermission('create_roles'))

    
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarCategory" 
            role="button" data-toggle="dropdown" aria-haspopup="true" 
            aria-expanded="false">
            <i class="fa fa-user" aria-hidden="true"></i>
                    Roles
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarCategory">
                    <a class="dropdown-item" href="{{ route('roles.index') }}">All Roles</a>
                    <a class="dropdown-item" href="{{ route('roles.create') }}">Add new role</a>
                </div>
          </li>

@endif


@if (auth()->user()->hasPermission('create_settings'))

    
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbarCategory" 
  role="button" data-toggle="dropdown" aria-haspopup="true" 
  aria-expanded="false">

  <i class="fas fa-tools"></i>
          Settings
  </a>
  <div class="dropdown-menu" aria-labelledby="navbarCategory">
          <a class="dropdown-item" href="{{ route('settings.index') }}">All Settings</a>
          <a class="dropdown-item" href="{{ route('settings.create') }}">Add new setting</a>
      </div>
</li>

@endif


          {{-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarMenu" 
                role="button" data-toggle="dropdown" aria-haspopup="true" 
                aria-expanded="false">
                        <i class="fa fa-tags    "></i>
                        Menus
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarCategory">
                        <a class="dropdown-item" href="{{ route('menus.index') }}">All Menus</a>
                        <a class="dropdown-item" href="{{ route('menus.create') }}">Add new menu</a>
                    </div>
              </li>
    

              <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarMenuItem" 
                    role="button" data-toggle="dropdown" aria-haspopup="true" 
                    aria-expanded="false">
                            <i class="fa fa-tags    "></i>
                            Menu Items
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarCategory">
                            <a class="dropdown-item" href="{{ route('menus.index') }}">All Menu</a>
                            <a class="dropdown-item" href="{{ route('menus.create') }}">Add new menu</a>
                        </div>
                  </li> --}}
        
    

                  
        {{-- Category --}}
    
        @if (auth()->user()->hasPermission('create_categories'))
            
        <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarCategory" 
                role="button" data-toggle="dropdown" aria-haspopup="true" 
                aria-expanded="false">

                        <i class="fa fa-tag" aria-hidden="true"></i>
                        Categories
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarCategory">
                        <a class="dropdown-item" href="{{ route('categories.index') }}">All Categories</a>
                        <a class="dropdown-item" href="{{ route('categories.create') }}">Add new category</a>
                    </div>
              </li>
              @endif

              @if (auth()->user()->hasPermission('create_users'))
            
              <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarCategory" 
                      role="button" data-toggle="dropdown" aria-haspopup="true" 
                      aria-expanded="false">
      
                              <i class="fa fa-users" aria-hidden="true"></i>
                              Users
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarCategory">
                              <a class="dropdown-item" href="{{ route('users.index') }}">All Users</a>
                              <a class="dropdown-item" href="{{ route('users.create') }}">Add new user</a>
                          </div>
                    </li>
                    @endif
      
       

                    
              {{-- Tag --}}
              @if (auth()->user()->hasPermission('create_tags'))
            
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarTag" 
                    role="button" data-toggle="dropdown" aria-haspopup="true" 
                    aria-expanded="false">
                            <i class="fa fa-tags    "></i>
                            Tags
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarTag">
               
                        <a class="dropdown-item" href="{{ route('tags.index') }}">
                            All Tags</a>
                            <a class="dropdown-item" href="{{ route('tags.create') }}">
                                Add new tag</a>
                        </div>
                  </li>

@endif
            {{-- Post --}}
            @if (auth()->user()->hasPermission('create_posts'))
      
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarPost" 
                    role="button" data-toggle="dropdown" aria-haspopup="true" 
                    aria-expanded="false">
                            <i class="fa fa-book    "></i>
                            Posts
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarPost">
               
                        <a class="dropdown-item" href="{{ route('posts.index') }}">
                            All Posts</a>
                            <a class="dropdown-item" href="{{ route('posts.create') }}">
                                Add new post</a>
                        </div>
                  </li>

                  @endif

                

            </ul>

      </div>