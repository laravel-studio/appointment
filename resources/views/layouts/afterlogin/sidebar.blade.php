<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
         @if(Auth::user())
        <div class="pull-left image">
          <img src="{{ asset('images/'.Auth::user()->profileimage) }}" class="img-circle" alt="User Image">
        </div>
         @endif
        <div class="pull-left info">
          @if(Auth::user())
          <p>{{ Auth::user()->name }}</p>
          @else
          <p>{{__('Guest')}}</p>
          @endif
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->


      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/')}}/roles"><i class="fa fa-circle-o"></i> Roles</a></li>
            <li><a href="{{url('/')}}/employees"><i class="fa fa-circle-o"></i> Employees</a></li>
            <li><a href="{{url('/')}}/users"><i class="fa fa-circle-o"></i> Customers</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="roles">
            <i class="fa fa-user-circle"></i> <span>Roles</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/')}}/roles"><i class="fa fa-circle-o"></i> All Roles</a></li>
            <li><a href="{{url('/')}}/roles/create"><i class="fa fa-circle-o"></i> Add New</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Employees</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="{{url('/')}}/employees"><i class="fa fa-circle-o"></i> All Employees</a></li>
            <li><a href="{{url('/')}}/employees/create"><i class="fa fa-circle-o"></i> Add New</a></li>
            <li><a href="{{url('/')}}/employees/services"><i class="fa fa-circle-o"></i> Services</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Customers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="{{url('/')}}/users"><i class="fa fa-circle-o"></i> All Customers</a></li>
            <li><a href="{{url('/')}}/users/create"><i class="fa fa-circle-o"></i> Add New</a></li>
          </ul>
        </li>

         <li class="">
          <a href="{{url('/')}}/booking/calendar">
            <i class="fa fa-table"></i> <span>Booking Calender</span>
          </a>

        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-clock-o"></i> <span>Booking Slots</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="{{url('/')}}/slots"><i class="fa fa-circle-o"></i> All slots</a></li>
            <li><a href="{{url('/')}}/slots/create"><i class="fa fa-circle-o"></i> Add New</a></li>
          </ul>
        </li>

        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Services</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="{{url('/')}}/services"><i class="fa fa-circle-o"></i> All Services</a></li>
            <li><a href="{{url('/')}}/services/create"><i class="fa fa-circle-o"></i> Add New</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>{{__('Settings') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="{{url('/')}}/settings/"><i class="fa fa-circle-o"></i>{{ __('General Settings') }} </a></li>
          </ul>
        </li>

        <li class="treeview">
            <a href="#">
            <i class="fa fa-black-tie"></i> <span>Appointments</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
            <li><a href="{{url('/')}}/appointments"><i class="fa fa-list"></i> All Appointments</a></li>
            <li><a href="{{url('/')}}/appointments/book"><i class="fa fa-plus-square"></i> Add New</a></li>
            </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
