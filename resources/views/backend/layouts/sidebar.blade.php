<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="{{ route('dashboard.admin') }}" class="logo">
                <img src="{{ asset($configuration->logo ?? '') }}" alt="navbar brand" class="navbar-brand"
                    height="20" /><span class="ms-2"
                    style="font-size:12px;color:white;">{{ $configuration->company_name ?? '' }}</span>
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item {{ Route::currentRouteName() == 'dashboard.admin' ? 'active' : '' }}">
                    <a href="{{ route('dashboard.admin') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role === 'SuperAdmin')
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Components</h4>
                    </li>
                    <li
                        class="nav-item  {{ Route::currentRouteName() == 'configuration.index' ? 'active' : '' }}">
                        <a href="{{ route('configuration.index') }}">
                            <i class="fas fa-cog"></i>
                            <p>Configuration</p>
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteName() == 'slider.index' ? 'active' : '' }}">
                        <a href="{{ route('slider.index') }}">
                            <i class="fas fa-sliders-h"></i>
                            <p>Slider</p>
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteName() == 'about.index' ? 'active' : '' }}">
                        <a href="{{ route('about.index') }}">
                            <i class="fas fa-info-circle"></i>
                            <p>About</p>
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteName() == 'gallery.index' ? 'active' : '' }}">
                        <a href="{{ route('gallery.index') }}">
                            <i class="fas fa-image"></i>
                            <p>Gallery</p>
                        </a>
                    </li>
                    <li
                        class="nav-item {{ request()->routeIs('category_blog.*') || request()->routeIs('blog.*') ? 'active' : '' }}">
                        <a data-bs-toggle="collapse" href="#blog"
                            aria-expanded="{{ request()->routeIs('category_blog.*') || request()->routeIs('blog.*') ? 'true' : 'false' }}">
                            <i class="fas fa-pen-nib"></i>
                            <p>Blog</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse {{ request()->routeIs('category_blog.*') || request()->routeIs('blog.*') ? 'show' : '' }}"
                            id="blog">
                            <ul class="nav nav-collapse">
                                <li class="{{ request()->routeIs('category_blog.*') ? 'active' : '' }}">
                                    <a href="{{ route('category_blog.index') }}">
                                        <span class="sub-item">Category Blog</span>
                                    </a>
                                </li>
                                <li class="{{ request()->routeIs('blog.*') ? 'active' : '' }}">
                                    <a href="{{ route('blog.index') }}">
                                        <span class="sub-item">Blog</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Key Features</h4>
                    </li>
                    <li
                    class="nav-item {{ request()->routeIs('category_services.*') || request()->routeIs('image_category_services.*') ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#category_service"
                        aria-expanded="{{ request()->routeIs('category_services.*') || request()->routeIs('image_category_services.*') ? 'true' : 'false' }}">
                        <i class="fas fa-pen-nib"></i>
                        <p>Service</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->routeIs('category_services.*') || request()->routeIs('image_category_services.*') ? 'show' : '' }}"
                        id="category_service">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->routeIs('category_services.*') ? 'active' : '' }}">
                                <a href="{{ route('category_services.index') }}">
                                    <span class="sub-item">Service</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('image_category_services.*') ? 'active' : '' }}">
                                <a href="{{ route('image_category_services.index') }}">
                                    <span class="sub-item">Image</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                    <li
                        class="nav-item {{ Route::currentRouteName() == 'receptionist.index' ? 'active' : '' }}">
                        <a href="{{ route('receptionist.index') }}">
                            <i class="fas fa-id-badge"></i>
                            <p>Receptionist</p>
                        </a>
                    </li>
                @endif
                <li class="nav-item {{ Route::currentRouteName() == 'visitor.index' ? 'active' : '' }}">
                    <a href="{{ route('visitor.index') }}">
                        <i class="fas fa-id-card"></i>
                        <p>Visitor</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>