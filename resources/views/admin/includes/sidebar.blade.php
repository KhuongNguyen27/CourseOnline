<aside class="app-aside app-aside-expand-md app-aside-light">
    <div class="aside-content">
        <header class="aside-header d-block d-md-none">
            <button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside"><span
                    class="user-avatar user-avatar-lg"><img src="assets/images/avatars/profile.jpg" alt=""></span> <span
                    class="account-icon"><span class="fa fa-caret-down fa-lg"></span></span> <span
                    class="account-summary"><span class="account-name">Beni Arisandi</span> <span
                        class="account-description">Marketing Manager</span></span></button>
            <div id="dropdown-aside" class="dropdown-aside collapse">
                <div class="pb-3">
                    <a class="dropdown-item" href="user-profile.html"><span class="dropdown-icon oi oi-person"></span>
                        Profile</a> <a class="dropdown-item" href="auth-signin-v1.html"><span
                            class="dropdown-icon oi oi-account-logout"></span> Logout</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Help Center</a> <a
                        class="dropdown-item" href="#">Ask Forum</a> <a class="dropdown-item" href="#">Keyboard
                        Shortcuts</a>
                </div>
            </div>
        </header>
        <div class="aside-menu overflow-hidden">
            <nav id="stacked-menu" class="stacked-menu">
                <ul class="menu">

                    @if(Auth::user()->hasPermission('Category_viewAny'))
                    <li class="menu-item has-active">
                        <a href="{{ route('categories.index') }}" class="menu-link">
                            <span class="menu-icon bx bx-category"></span>
                            <span class="menu-text">Danh mục</span>
                        </a>
                    </li>
                    @endif

                    @if(Auth::user()->hasPermission('Course_viewAny'))
                    <li class="menu-item has-active">
                        <a href="{{ route('courses.index') }}" class="menu-link">
                            <span class="menu-icon bx bxs-book"></span>
                            <span class="menu-text">Khoá học</span>
                        </a>
                    </li>
                    @endif

                    @if(Auth::user()->hasPermission('Level_viewAny'))
                    <li class="menu-item has-active">
                        <a href="{{ route('levels.index') }}" class="menu-link">
                            <span class="menu-icon bx bx-line-chart-down"></span>
                            <span class="menu-text">Trìnhđộ</span>
                        </a>
                    </li>
                    @endif

                    @if(Auth::user()->hasPermission('User_viewAny'))
                    <li class="menu-item has-active">
                        <a href="{{ route('students.index') }}" class="menu-link">
                            <span class="menu-icon bx bx-user"></span>
                            <span class="menu-text">Học viên</span>
                        </a>
                    </li>
                    @endif

                    @if(Auth::user()->hasPermission('User_viewAny'))
                    <li class="menu-item has-active">
                        <a href="{{ route('staffs.index') }}" class="menu-link">
                            <span class="menu-icon bx bx-group"></span>
                            <span class="menu-text">Nhân viên</span>
                        </a>
                    </li>
                    @endif

                    @if(Auth::user()->hasPermission('Order_viewAny'))
                    <li class="menu-item has-active">
                        <a href="{{ route('orders.index') }}" class="menu-link">
                            <span class="menu-icon bx bxs-shopping-bag"></span>
                            <span class="menu-text">Giao dịch</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </nav>
        </div>
        <footer class="aside-footer border-top p-2">
            <button class="btn btn-light btn-block text-primary" data-toggle="skin"><span
                    class="d-compact-menu-none">Dark Mode</span> <i class="bx bx-moon icon moon"></i></button>
        </footer>
    </div>
</aside>