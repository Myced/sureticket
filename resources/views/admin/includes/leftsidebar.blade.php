<!-- Left Sidebar Menu -->
<div class="fixed-sidebar-left">
    <ul class="nav navbar-nav side-nav nicescroll-bar">
        <li class="navigation-header">
            <span>Dashboard</span>
            <i class="zmdi zmdi-more"></i>
        </li>
        <li>
            <a class="" href="{{ route('admin-dashboard') }}" >
                <div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Dashboard</span>
                </div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div>
            </a>

        </li>

        <li>
            <a href="widgets.html"><div class="pull-left"><i class="zmdi zmdi-flag mr-20"></i><span class="right-nav-text">widgets</span></div><div class="pull-right"><span class="label label-warning">8</span></div><div class="clearfix"></div></a>
        </li>
        <li><hr class="light-grey-hr mb-10"/></li>
        <li class="navigation-header">
            <span>Manage Agencies</span>
            <i class="zmdi zmdi-more"></i>
        </li>
        <li>
            <a href="{{ route('agency.add') }}" data-toggle="collapse" data-target="#ui_dr">
                <div class="pull-left"><i class="icon-plus mr-20"></i>
                    <span class="right-nav-text">Add New Agency</span>
                </div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div>
            </a>

        </li>
        <li>
            <a href=" {{ route('agencies.manage') }} " >
                <div class="pull-left"><i class="zmdi zmdi-edit mr-20"></i>
                    <span class="right-nav-text">Manage Agencies</span>
                </div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="{{  route('agencies') }}" ><div class="pull-left"><i class="zmdi zmdi-chart-donut mr-20"></i>
                <span class="right-nav-text"> All Agencies </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                <div class="clearfix"></div>
            </a>
        </li>

        <li><hr class="light-grey-hr mb-10"/></li>
        <li class="navigation-header">
            <span>User Account</span>
            <i class="zmdi zmdi-more"></i>
        </li>
        <li>
            <a href="javascript:void(0);" ><div class="pull-left"><i class="zmdi zmdi-google-pages mr-20"></i>
                <span class="right-nav-text">New Agency Account</span></div><div class="pull-right">
                    <i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div>
            </a>

        </li>
        <li>
            <a href="#"><div class="pull-left"><i class="zmdi zmdi-book mr-20"></i>
                <span class="right-nav-text">Manage Accounts
                </span></div><div class="clearfix"></div>
            </a>
        </li>

    </ul>
</div>
<!-- /Left Sidebar Menu -->
