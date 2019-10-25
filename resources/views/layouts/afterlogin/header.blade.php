 <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">Appointment Management</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Appointment Management</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">             
  
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              @if(Auth::user())
              <img src="{{ asset('images/'.Auth::user()->profileimage) }}" class="user-image" alt="User Image">
              @endif
               @if(Auth::user())

              <span class="hidden-xs">{{ Auth::user()->name }}</span>
              @else
              <span class="hidden-xs">{{ __('Guest') }}</span>
              @endif
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                 @if(Auth::user())
                <p>
                  {{ Auth::user()->name }}
                  
                </p>
                 @endif
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                @if(Auth::user())
                <div class="pull-left">
                  <a href="{{url('/')}}/users/profile/edit/{{Auth::id()}}" class="btn btn-default btn-flat">Profile</a>
                </div>
                @endif
                <div class="pull-right">
                  <a href="logout" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>