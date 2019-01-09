
          <!-- Search Widget -->
          <div class="card my-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                      {{ cms_notification($errors) }}
                  <form action="{{ route('search') }}" method="post">
                     @csrf
                     <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search for...">
                     <span class="input-group-btn">
                            <button class="btn btn-primary text-white" type="submit">Go!</button>
                          </span>
                        </div>
                    </form>
                </div>
              </div>
    
              @if (count($categories) > 0)
    
              <!-- Categories Widget -->
              <div class="card my-4">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-6">
                      <ul class="list-unstyled mb-0">
                        
            
                          @foreach ($categories as $category)
      
                            <li>
                            <a href="{{ route('posts.category',$category->slug) }}">{{ $category->name }}</a>
                            </li>
                                                            
                          @endforeach
                            
                
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              @endif
