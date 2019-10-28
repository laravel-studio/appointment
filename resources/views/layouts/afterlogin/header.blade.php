 <header class="main-header">
    <!-- Logo -->
    <a href="{{url('/')}}/dashboard" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">{{__('messages.appointment')}}</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">{{__('messages.appointment')}}</span>
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
        @if(Auth::user()->type==config('global.user_type.superadmin'))
        <li class="messages-menu" style="padding-top:3px;" >
          <a href="{{url('/')}}/swagger/dist" target="_blank" class="dropdown-toggle" data-toggle="dropdown" onclick="location.href='/swagger/dist'">
            <i class="fa fa-code" style="font-weight: 900;"><span style="padding-left:5px;">{{__('Swagger')}}</span></i>
          </a>
        </li>

        <li class="messages-menu" style="padding-top:3px;" >
            <a href="{{url('/')}}/docs" target="_blank" class="dropdown-toggle" data-toggle="dropdown" onclick="location.href='/docs'">
                <i class="fa fa-book"><span style="padding-left:5px;">{{__('User Manual')}}</span></i>
            </a>
        </li>
        @endif
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              @if(Auth::user())
                @if((Auth::user()->profileimage)!=''? $img_src=asset('images/'.Auth::user()->profileimage) : $img_src=asset('images/user-common.png'))
              <img src="{{ $img_src }}" class="user-image" alt="User Image">
                @endif
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
            @if((Auth::user()->profileimage)!=''? $img_src=asset('images/'.Auth::user()->profileimage) : $img_src=asset('images/user-common.png'))
                <img src="{{ $img_src }}" class="img-circle" alt="User Image">
            @endif
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
