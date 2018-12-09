<!-- Left Sidebar Menu -->
<div class="fixed-sidebar-left">
    <ul class="nav navbar-nav side-nav nicescroll-bar">
        <li class="navigation-header">
            <span>Main</span>
            <i class="zmdi zmdi-more"></i>
        </li>
        <li>
            <a class="active" href="{{ route('agency.dashboard') }}" >
                <div class="pull-left">
                    <i class="zmdi zmdi-landscape mr-20"></i>
                    <span class="right-nav-text">Dashboard</span>
                </div>
                <div class="pull-right">
                    <i class=""></i>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>

        <li><hr class="light-grey-hr mb-10"/></li>

        <li class="navigation-header">
            <span>Bookings</span>
            <i class="zmdi zmdi-more"></i>
        </li>
        <li>
            <a href="javascript:void(0);"  >
                <div class="pull-left">
                    <i class="zmdi zmdi-smartphone-setup mr-20"></i>
                    <span class="right-nav-text">Today Bookings</span>
                </div>
                <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                <div class="clearfix"></div>
            </a>

        </li>

        <li>
            <a href="javascript:void(0);" >
                <div class="pull-left">
                    <i class="zmdi zmdi-chart-donut mr-20"></i>
                    <span class="right-nav-text">This Week </span>
                </div>
                <div class="clearfix"></div>
            </a>

        </li>
        <li>
            <a href="javascript:void(0);" >
                <div class="pull-left">
                    <i class="zmdi zmdi-format-size mr-20"></i>
                    <span class="right-nav-text">This Month</span>
                </div>
                <div class="clearfix"></div>
            </a>

        </li>
        <li>
            <a href="javascript:void(0);" >
                <div class="pull-left">
                    <i class="zmdi zmdi-iridescent mr-20"></i>
                    <span class="right-nav-text">Filter Period</span>
                </div>
                <div class="clearfix"></div>
            </a>

        </li>

        <li><hr class="light-grey-hr mb-10"/></li>

        <li class="navigation-header">
            <span>Assigned Buses</span>
            <i class="zmdi zmdi-more"></i>
        </li>

        <li>
            <a href="{{ route('assigned-routes') }}" >
                <div class="pull-left">
                    <i class="zmdi zmdi-google-pages mr-20"></i>
                    <span class="right-nav-text">Assigned Routes</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>

        <li>
            <a href="{{ route('assigned-routes.today') }}">
                <div class="pull-left">
                    <i class="zmdi zmdi-book mr-20"></i>
                    <span class="right-nav-text">Assigned Today</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>

        <li>
            <a href="{{ route('assigned-routes.tomorrow') }}">
                <div class="pull-left">
                    <i class="zmdi zmdi-book mr-20"></i>
                    <span class="right-nav-text">Assigned Tomorrow</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>

        <li>
            <a href="{{ route('assigned-routes.yesterday') }}">
                <div class="pull-left">
                    <i class="zmdi zmdi-book mr-20"></i>
                    <span class="right-nav-text">Assigned Yesterday</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>

        <li><hr class="light-grey-hr mb-10"/></li>

        <li class="navigation-header">
            <span>Busses</span>
            <i class="zmdi zmdi-more"></i>
        </li>

        <li>
            <a href="{{ route('bus.add') }}" >
                <div class="pull-left">
                    <i class="zmdi zmdi-google-pages mr-20"></i>
                    <span class="right-nav-text">Add Bus</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>

        <li>
            <a href="{{ route('buses') }}">
                <div class="pull-left">
                    <i class="zmdi zmdi-book mr-20"></i>
                    <span class="right-nav-text">Mange Buses</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>

        <li><hr class="light-grey-hr mb-10"/></li>

        <li class="navigation-header">
            <span>Routes</span>
            <i class="zmdi zmdi-more"></i>
        </li>

        <li>
            <a href="{{ route('route.add')}}">
                <div class="pull-left">
                    <i class="zmdi zmdi-book mr-20"></i>
                    <span class="right-nav-text">Add Route</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>

        <li>
            <a href="{{ route('route.manage') }}">
                <div class="pull-left">
                    <i class="zmdi zmdi-book mr-20"></i>
                    <span class="right-nav-text">Manage Route</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>

        <li><hr class="light-grey-hr mb-10"/></li>

        <li class="navigation-header">
            <span>Locations</span>
            <i class="zmdi zmdi-more"></i>
        </li>

        <li>
            <a href="{{ route('locations.add') }}">
                <div class="pull-left">
                    <i class="zmdi zmdi-book mr-20"></i>
                    <span class="right-nav-text">Add Location</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>

        <li>
            <a href="{{ route('locations') }}">
                <div class="pull-left">
                    <i class="zmdi zmdi-book mr-20"></i>
                    <span class="right-nav-text">View Locations</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>

    </ul>
</div>
<!-- /Left Sidebar Menu -->
