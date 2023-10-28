<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <img src="{{ asset('backend/assets/dist/img/AdminLTELogo.png') }}" alt="NEWS Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">NEWSPORTAL</span>
    </a>

    <div class="sidebar">

        @php
            $id = Auth::user()->id;
            $admin_data = App\Models\User::find($id);
        @endphp

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ (!empty($admin_data->photo)) ? url('upload/admin_images/'.$admin_data->photo) : url('upload/no_image.png') }}" class="img-circle elevation-2" alt="{{ $admin_data->name }}">
            </div>
            <div class="info">
                <a href="{{ route('admin.profile') }}" class="d-block">{{ $admin_data->name }}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">Navigation</li>
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">Menu</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-stream"></i>
                        <p>
                            Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('all.category') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('add.category') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Category</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-stream"></i>
                        <p>
                            Subcategory
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('all.subcategory') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Subcategory</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('add.subcategory') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Subcategory</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Admins
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('all.admin') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Admin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('add.admin') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Admin</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Custom</li>
                <li class="nav-item">
                    <a href="{{ route('admin.profile') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            My Account
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.change.password') }}" class="nav-link">
                        <i class="nav-icon far fa-edit"></i>
                        <p>
                            Change Password
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Settings
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
