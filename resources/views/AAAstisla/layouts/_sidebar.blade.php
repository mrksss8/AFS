     <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <div>
            <img class = "sidebar-logo"src="{{ asset('../assets/img/PUP/logo.png') }}" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
          </div>
            <a href="{{route ('dashboard.index')}}"><strong>AFS-PUPCC</strong></a>
          </div>

          <ul class="sidebar-menu mt-5">
              
              <li> <a href="{{route ('dashboard.index')}}"><i class="fas fa-tachometer-alt"></i></i><span><strong>Dashboard</strong></span></a></li>
              
              <li class="menu-header">Folders</li>
              @role(Auth::user()->role)
            @if (Auth::user()->role === 'Admin')
                    @foreach($folders as $folder)
                            <li class="nav-item dropdown">
                              <a href="#" class="nav-link has-dropdown"><i class="fas  fa-folder"></i><strong>{{ $folder->folder_name }}</strong></span></a>
                              <ul class="dropdown-menu">
                                @forelse($folder->subfolders as $subfolder)
                                <li><a class="nav-link text-dark" href="{{ route('files.index', [$folder, $subfolder]) }}">{{ $subfolder->subfolder_name }}</a></li>
                                  @empty      
                                  <li><a class="nav-link text-dark">No Folders</a></li>
                                  @endforelse   
                              </ul>
                            </li>
                    @endforeach
            @else
                  @foreach($folders as $folder)
                      @if ($folder->role === Auth::user()->role)
                            <li class="nav-item dropdown">
                              <a href="#" class="nav-link has-dropdown"><i class="fas  fa-folder"></i><strong>{{ $folder->folder_name }}</strong></span></a>
                              <ul class="dropdown-menu">
                                @forelse($folder->subfolders as $subfolder)
                                <li><a class="nav-link text-dark" href="{{ route('files.index', [$folder, $subfolder]) }}">{{ $subfolder->subfolder_name }}</a></li>
                                  @empty      
                                  <li><a class="nav-link text-dark">No Folders</a></li>
                                  @endforelse   
                              </ul>
                            </li>
                      @endif
                  @endforeach
            @endif
              @endrole 
              <hr>
              
            </ul>
        </aside>
      </div>

  