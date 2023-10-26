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
                        <a href="{{ route('categories.index') }}" class="menu-link"><span
                                class="menu-icon bx bx-category"></span> <span class="menu-text">Danh mục</span></a>
                    </li>
                    @endif
                    @if(Auth::user()->hasPermission('User_viewAny'))
                    <li class="menu-item has-active">
                        <a href="{{ route('students.index') }}" class="menu-link"><span
                                class="menu-icon bx bx-user"></span> <span class="menu-text">Học viên</span></a>
                    </li>
                    @endif
                    @if(Auth::user()->hasPermission('User_viewAny'))
                    <li class="menu-item has-active">
                        <a href="{{ route('staffs.index') }}" class="menu-link"><span
                                class="menu-icon bx bx-group"></span> <span class="menu-text">Nhân viên</span></a>
                    </li>
                    @endif
                    <li class="menu-item has-child">
                        <a href="#" class="menu-link"><span class="menu-icon oi oi-person"></span> <span
                                class="menu-text">User</span></a> <!-- child menu -->
                        <ul class="menu">
                            <li class="menu-item">
                                <a href="user-profile.html" class="menu-link">Profile</a>
                            </li>
                            <li class="menu-item">
                                <a href="user-activities.html" class="menu-link">Activities</a>
                            </li>
                            <li class="menu-item">
                                <a href="user-teams.html" class="menu-link">Teams</a>
                            </li>
                            <li class="menu-item">
                                <a href="user-projects.html" class="menu-link">Projects</a>
                            </li>
                            <li class="menu-item">
                                <a href="user-tasks.html" class="menu-link">Tasks</a>
                            </li>
                            <li class="menu-item">
                                <a href="user-profile-settings.html" class="menu-link">Profile Settings</a>
                            </li>
                            <li class="menu-item">
                                <a href="user-account-settings.html" class="menu-link">Account Settings</a>
                            </li>
                            <li class="menu-item">
                                <a href="user-billing-settings.html" class="menu-link">Billing Settings</a>
                            </li>
                            <li class="menu-item">
                                <a href="user-notification-settings.html" class="menu-link">Notification Settings</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item has-child">
                        <a href="#" class="menu-link"><span class="menu-icon oi oi-browser"></span> <span
                                class="menu-text">Layouts</span> <span
                                class="badge badge-subtle badge-success">+4</span></a> <!-- child menu -->
                        <ul class="menu">
                            <li class="menu-item">
                                <a href="layout-blank.html" class="menu-link">Blank Page</a>
                            </li>
                            <li class="menu-item">
                                <a href="layout-nosearch.html" class="menu-link">Header no Search</a>
                            </li>
                            <li class="menu-item">
                                <a href="layout-horizontal-menu.html" class="menu-link">Horizontal Menu</a>
                            </li>
                            <li class="menu-item">
                                <a href="layout-fullwidth.html" class="menu-link">Full Width</a>
                            </li>
                            <li class="menu-item">
                                <a href="layout-pagenavs.html" class="menu-link">Page Navs</a>
                            </li>
                            <li class="menu-item">
                                <a href="layout-pagecover.html" class="menu-link">Page Cover</a>
                            </li>
                            <li class="menu-item">
                                <a href="layout-pagecover-img.html" class="menu-link">Cover Image</a>
                            </li>
                            <li class="menu-item">
                                <a href="layout-pagesidebar.html" class="menu-link">Page Sidebar</a>
                            </li>
                            <li class="menu-item">
                                <a href="layout-pagesidebar-fluid.html" class="menu-link">Sidebar Fluid</a>
                            </li>
                            <li class="menu-item">
                                <a href="layout-pagesidebar-hidden.html" class="menu-link">Sidebar Hidden</a>
                            </li>
                            <li class="menu-item">
                                <a href="layout-custom.html" class="menu-link">Custom</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item has-child">
                        <a href="{{ route('levels.index') }}" class="menu-link"> <i class='bx bx-line-chart'></i></span>
                            <span class="menu-text">Trình Độ</span></a> <!-- child menu -->


                    </li>
                </ul>
            </nav>
        </div>
        <footer class="aside-footer border-top p-2">
            <button class="btn btn-light btn-block text-primary" data-toggle="skin"><span
                    class="d-compact-menu-none">Dark Mode</span> <i class="bx bx-moon icon moon"></i></button>
        </footer>
    </div>
</aside>