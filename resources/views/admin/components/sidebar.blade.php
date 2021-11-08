<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <span class="ml-3 brand-text font-weight-light"> <b>E</b> - Commerce</span>
    </a>
    <div class="sidebar">
        {{-- Sidebar User Panel --}}
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="https://adminlte.io/themes/v3/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="javascript:void(0)" class="d-block">
                    {{ auth()->user()->name }}
                </a>
            </div>
        </div>

        {{-- Sidebar Menus --}}
        <div class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> {{ __('Dashboard') }}</p>
                    </a>
                </li>
                <li class="nav-header text-uppercase">{{ __('Management Product') }}</li>
                <li class="nav-item">
                    <a href="{{ route('categories.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p> {{ __('Category') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('products.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-box"></i>
                        <p> {{ __('Product') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('products.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        <p> {{ __('Order') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('products.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p> {{ __('Reports') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('products.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p> {{ __('Settings') }}</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
