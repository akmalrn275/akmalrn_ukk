<nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
    <div class="container-fluid">

        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
            <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#"
                    role="button" aria-expanded="false" aria-haspopup="true">
                    <i class="fa fa-search"></i>
                </a>
                <ul class="dropdown-menu dropdown-search animated fadeIn">
                    <li>
                        <form class="navbar-left navbar-form nav-search">
                            <div class="input-group">
                                <input type="text" placeholder="Search ..."
                                    class="form-control" />
                            </div>
                        </form>
                    </li>
                </ul>
            </li>

            <li class="nav-item topbar-user dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#"
                    aria-expanded="false">
                    <div class="avatar-sm">
                        <i class="fas fa-user-shield fa-3x"></i>
                    </div>
                    <span class="profile-username">
                        <span class="op-7">Hi,</span>
                        <span class="fw-bold">{{ auth('admin')->user()->name }}</span>
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <li>
                        <a href="#" class="dropdown-item" id="logout-btn">Logout</a>
                    </li>
                </ul>

                <form id="logout-form" action="{{ route('logout_admin') }}" method="POST"
                    style="display: none;">
                    @csrf
                </form>

            </li>
        </ul>

        </ul>
    </div>
</nav>