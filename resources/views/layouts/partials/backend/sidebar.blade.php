<div class="sidebar-sticky bg-dark">

    <div class="info text-center">
        <figure class="rounded-circle">
                <img width="100" height="100" src="{{ cms_thumbnail(auth()->user()->thumbnail) }}" class="img-fluid rounded-circle" alt="">

        </figure>
    <h5 class="my-4">{{ auth()->user()->username }}</h5>
</div>

    <ul class="nav flex-column">
          <li class="nav-item">
          <a class="nav-link active" href="{{ route('dashboard') }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
              Dashboard
            </a>
          
  


        </li>
    
        {{-- Category --}}
    
        <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarCategory" 
                role="button" data-toggle="dropdown" aria-haspopup="true" 
                aria-expanded="false">
                        <i class="fa fa-tags    "></i>
                        Categories
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarCategory">
                        <a class="dropdown-item" href="{{ route('categories.index') }}">All Categories</a>
                        <a class="dropdown-item" href="{{ route('categories.create') }}">Add new category</a>
                    </div>
              </li>

 
              {{-- Tag --}}
            
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


            {{-- Post --}}
            
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


                

            </ul>

      </div>