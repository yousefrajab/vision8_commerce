<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('site.index') }}">
        <div class="sidebar-brand-icon ">
            {{-- <div class="sidebar-brand-icon rotate-n-15 "> --}}
            <i class="fas fa-store"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('admin.index') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('admin.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('site.dashboard') }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Heading -->
    {{-- <div class="sidebar-heading">
        Interface
    </div> --}}

    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsCategory"
            aria-expanded="true" aria-controls="collapsCategory">
            <i class="fas fa-fw fa-tags"></i>
            <span>{{ __('site.Categories') }}</span>
        </a>
        <div id="collapsCategory" class="collapse {{ str_contains(request()->url(),'categories') ? 'show' :'' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                <a class="collapse-item {{ request()->routeIs('admin.categories.index')? 'active': '' }}" href="{{ route('admin.categories.index') }}">{{ __('site.All Categories') }}</a>
                <a class="collapse-item {{ request()->routeIs('admin.categories.create')? 'active': '' }}" href="{{ route('admin.categories.create') }}">{{ __('site.Add New Category') }}</a>
                <a class="collapse-item" href="{{ route('admin.categories.trash') }}">{{ trans('site.Trashed Categories') }}</a>
            </div>
        </div>
    </li>

    {{-- {{ __('site.Trash') }} = {{ trans('site.Trash') }} =
    @lang__('site.Trash')    --}}





    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct"
            aria-expanded="true" aria-controls="collapseProduct">
            <i class="fas fa-fw fa-heart"></i>
            <span>{{ __('site.Products') }}</span>
        </a>
        <div id="collapseProduct" class="collapse {{ str_contains(request()->url(),'products') ? 'show' :'' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                <a class="collapse-item {{ request()->routeIs('admin.products.index')? 'active': '' }}" href="{{ route('admin.products.index') }}">{{ __('site.All Products') }}</a>
                <a class="collapse-item {{ request()->routeIs('admin.products.create')? 'active': '' }}" href="{{ route('admin.products.create') }}">{{ __('site.Add New Product') }}</a>
                <a class="collapse-item" href="{{ route('admin.products.trash') }}">@lang('site.Trashed Products')</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-cart-plus"></i>
            <span>{{ __('site.orders') }}</span></a>
    </li>

    {{-- <hr class="sidebar-divider my-0"> --}}

    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-money-bill"></i>
            <span>{{ __('site.payments') }}</span></a>
    </li>

    <hr class="sidebar-divider my-0">

    {{-- <li class="nav-item {{ request()->routeIs('admin.users.index') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('admin.users.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>{{ __('site.users') }}</span></a> --}}

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsUser"
                    aria-expanded="true" aria-controls="collapsUser">
                    <i class="fas fa-fw fa-users"></i>
                    <span>{{ __('site.users') }}</span>
                </a>
                <div id="collapsUser" class="collapse {{ str_contains(request()->url(),'users') ? 'show' :'' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                        <a class="collapse-item {{ request()->routeIs('admin.users.index')? 'active': '' }}" href="{{ route('admin.users.index') }}">{{ __('site.All Users') }}</a>
                        <a class="collapse-item {{ request()->routeIs('admin.users.create')? 'active': '' }}" href="{{ route('admin.users.create') }}">{{ __('site.Add New User') }}</a>
                        <a class="collapse-item" href="{{ route('admin.users.trash') }}">{{ __('site.Trashed Users') }}</a>

                    </div>
                </div>
            </li>

    {{-- </li> --}}

    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsRole"
            aria-expanded="true" aria-controls="collapsRole">
            <i class="fas fa-fw fa-lock"></i>
            <span>{{ __('site.Roles') }}</span>
        </a>
        <div id="collapsRole" class="collapse {{ str_contains(request()->url(),'roles') ? 'show' :'' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                <a class="collapse-item {{ request()->routeIs('admin.roles.index')? 'active': '' }}" href="{{ route('admin.roles.index') }}">{{ __('site.All Roles') }}</a>
                <a class="collapse-item {{ request()->routeIs('admin.roles.create')? 'active': '' }}" href="{{ route('admin.roles.create') }}">{{ __('site.Add New Role') }}</a>
                <a class="collapse-item" href="{{ route('admin.roles.trash') }}">{{ __('site.Trashed Role') }}</a>

            </div>
        </div>
    </li>
    {{-- <li class="nav-item {{ request()->routeIs('admin.roles.index') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('admin.roles.index') }}">
            <i class="fas fa-fw fa-lock"></i>
            <span>{{ __('site.roles') }}</span></a>
    </li> --}}

    <!-- Nav Item - Utilities Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li> --}}

    {{-- <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse show" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item active" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
