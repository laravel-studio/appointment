<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
         @if(Auth::user())
            @if((Auth::user()->profileimage)!=''? $img_src=asset('images/'.Auth::user()->profileimage) : $img_src=asset('images/user-common.png'))
        <div class="pull-left image">
          <img src="{{ $img_src }}" class="img-circle" alt="User Image">
        </div>
            @endif
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
        <li class="header">{{__('messages.main_navigation')}}</li>
        <li class="">
          <a href="{{url('/')}}/dashboard">
            <i class="fa fa-dashboard"></i> <span>{{__('messages.dashboard')}}</span>
          </a>
        </li>
        @if(Auth::user()->type==1)
        <li class="treeview">
          <a href="roles">
            <i class="fa fa-user-circle"></i> <span>{{__('messages.roles')}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/')}}/roles"><i class="fa fa-list"></i> {{__('messages.all_roles')}}</a></li>
            <li><a href="{{url('/')}}/roles/create"><i class="fa fa-plus-square"></i> {{__('messages.add_new')}}</a></li>
          </ul>
        </li>
        @endif

        @if(Auth::user()->type==1)
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>{{__('messages.employee')}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="{{url('/')}}/employees"><i class="fa fa-list"></i> {{__('messages.all_employees')}}</a></li>
            <li><a href="{{url('/')}}/employees/create"><i class="fa fa-plus-square"></i> {{__('messages.add_new')}}</a></li>
            <li><a href="{{url('/')}}/employees/services"><i class="fa fa-suitcase"></i> {{__('messages.services')}}</a></li>
          </ul>
        </li>
        @endif

        @if(Auth::user()->type==1)
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>{{__('messages.customer')}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="{{url('/')}}/users"><i class="fa fa-list"></i> {{__('messages.all_customers')}}</a></li>
            <li><a href="{{url('/')}}/users/create"><i class="fa fa-plus-square"></i> {{__('messages.add_new')}}</a></li>
          </ul>
        </li>
        @endif

         <li class="">
          <a href="{{url('/')}}/booking/calendar">
            <i class="fa fa-table"></i> <span>{{__('messages.booking_calender')}}</span>
          </a>
        </li>

        @if(Auth::user()->type==config('global.user_type.superadmin') || Auth::user()->type==config('global.user_type.employee'))
        <li class="treeview">
          <a href="#">
            <i class="fa fa-clock-o"></i> <span>{{__('messages.booking_slots')}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="{{url('/')}}/slots"><i class="fa fa-list"></i> {{__('messages.all_slots')}}</a></li>
            @if(Auth::user()->type==config('global.user_type.superadmin'))
            <li><a href="{{url('/')}}/slots/create"><i class="fa fa-plus-square"></i> {{__('messages.add_new')}}</a></li>
            @endif
          </ul>
        </li>
        @endif

        <li class="treeview">
          <a href="#">
            <i class="fa fa-suitcase"></i> <span>{{__('messages.services')}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="{{url('/')}}/services"><i class="fa fa-list"></i> {{__('messages.all_services')}}</a></li>
            @if(Auth::user()->type==1)
            <li><a href="{{url('/')}}/services/create"><i class="fa fa-plus-square"></i> {{__('messages.add_new')}}</a></li>
            @endif
          </ul>
        </li>

        @if(Auth::user()->type==config('global.user_type.superadmin'))
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i> <span>{{__('messages.settings') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="{{url('/')}}/settings/"><i class="fa fa-cogs"></i>{{ __('messages.general_settings') }} </a></li>
          </ul>
        </li>
        @endif

        <li class="treeview">
            <a href="#">
            <i class="fa fa-black-tie"></i> <span>{{__('messages.appointments')}}</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
            @if( Auth::user()->type==1 || Auth::user()->type==2 )
              <li><a href="{{url('/')}}/appointments"><i class="fa fa-list"></i> {{__('messages.all_appointments')}}</a></li>
            @endif
                <li><a href="{{url('/')}}/appointments/book"><i class="fa fa-plus-square"></i> {{__('messages.book_new_appointment')}}</a></li>
            </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
