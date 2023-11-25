<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <img src="{{ asset('backend/assets/dist/img/logo.png') }}" alt="#" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">Technology</span>
    </a>

    <div class="sidebar">

        @php
            $auth_user = Auth::user()->id;
            $user_data = App\Models\User::find($auth_user);
            $user_status = $user_data->status;
        @endphp

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ (!empty($user_data->photo)) ? url('upload/admin_images/'.$user_data->photo) : url('upload/no_image.png') }}" class="img-square bg-white elevation-2" style="width: 50px" alt="{{ $user_data->name }}">
            </div>
            <div class="info">
                <a href="{{ route('admin.profile') }}" class="d-block">{{ $user_data->name }}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-compact nav-flat text-sm" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                @if($user_status == 'active')
                    <li class="nav-header">Content Management</li>

                    @if(Auth::user()->can('category.menu'))
                        <li class="nav-item {{ Route::is('all.category', 'add.category', 'edit.category') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-stream"></i>
                                <p>
                                    Categories
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if(Auth::user()->can('category.list'))
                                    <li class="nav-item">
                                        <a href="{{ route('all.category') }}" class="nav-link {{ Route::is('all.category') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>All Categories</p>
                                        </a>
                                    </li>
                                @endif
                                @if(Auth::user()->can('category.add'))
                                    <li class="nav-item">
                                        <a href="{{ route('add.category') }}" class="nav-link {{ Route::is('add.category') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add Category</p>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if(Auth::user()->can('subcategory.menu'))
                        <li class="nav-item {{ Route::is('all.subcategory', 'add.subcategory', 'edit.subcategory') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-stream"></i>
                                <p>
                                    Subcategories
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if(Auth::user()->can('subcategory.list'))
                                    <li class="nav-item">
                                        <a href="{{ route('all.subcategory') }}" class="nav-link {{ Route::is('all.subcategory') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>All Subcategories</p>
                                        </a>
                                    </li>
                                @endif
                                @if(Auth::user()->can('subcategory.add'))
                                    <li class="nav-item">
                                        <a href="{{ route('add.subcategory') }}" class="nav-link {{ Route::is('add.subcategory') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add Subcategory</p>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if(Auth::user()->can('news.menu'))
                        <li class="nav-item {{ Route::is('all.news.post', 'add.news.post', 'edit.news.post') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-file-alt"></i>
                                <p>
                                    Blog Posts
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if(Auth::user()->can('news.list'))
                                    <li class="nav-item">
                                        <a href="{{ route('all.news.post') }}" class="nav-link {{ Route::is('all.news.post') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>All Posts</p>
                                        </a>
                                    </li>
                                @endif
                                @if(Auth::user()->can('news.add'))
                                    <li class="nav-item">
                                        <a href="{{ route('add.news.post') }}" class="nav-link {{ Route::is('add.news.post') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add Post</p>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if(Auth::user()->can('review.menu'))
                        <li class="nav-item {{ Route::is('pending.review', 'approve.review') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-comment-dots"></i>
                                <p>
                                    Reviews
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('pending.review') }}" class="nav-link {{ Route::is('pending.review') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pending Reviews</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('approve.review') }}" class="nav-link {{ Route::is('approve.review') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Approved Reviews</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif

                    <li class="nav-header">Features</li>

                    @if(Auth::user()->can('photo.menu'))
                        <li class="nav-item {{ Route::is('all.photo.gallery','add.photo.gallery', 'edit.photo.gallery') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-images"></i>
                                <p>
                                    Photo Gallery
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if(Auth::user()->can('photo.list'))
                                    <li class="nav-item">
                                        <a href="{{ route('all.photo.gallery') }}" class="nav-link {{ Route::is('all.photo.gallery') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>All Photos</p>
                                        </a>
                                    </li>
                                @endif
                                @if(Auth::user()->can('photo.add'))
                                    <li class="nav-item">
                                        <a href="{{ route('add.photo.gallery') }}" class="nav-link {{ Route::is('add.photo.gallery') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add Photo</p>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if(Auth::user()->can('video.menu'))
                        <li class="nav-item {{ Route::is('all.video.gallery','add.video.gallery','edit.video.gallery') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fab fa-youtube"></i>
                                <p>
                                    Video Gallery
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if(Auth::user()->can('video.list'))
                                    <li class="nav-item">
                                        <a href="{{ route('all.video.gallery') }}" class="nav-link {{ Route::is('all.video.gallery') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>All Videos</p>
                                        </a>
                                    </li>
                                @endif
                                @if(Auth::user()->can('video.add'))
                                    <li class="nav-item">
                                        <a href="{{ route('add.video.gallery') }}" class="nav-link {{ Route::is('add.video.gallery') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add Video</p>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if(Auth::user()->can('banner.menu'))
                        <li class="nav-item {{ Route::is('all.banner') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-ad"></i>
                                <p>
                                    Banners
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('all.banner') }}" class="nav-link {{ Route::is('all.banner') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Edit Banners</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif

                    @if(Auth::user()->can('live.menu'))
                        <li class="nav-item {{ Route::is('edit.live.tv') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tv"></i>
                                <p>
                                    Live TV
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('edit.live.tv') }}" class="nav-link {{ Route::is('edit.live.tv') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Edit Live TV</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif

                    @if(Auth::user()->can('seo.menu'))
                        <li class="nav-item {{ Route::is('edit.seo') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-search"></i>
                                <p>
                                    SEO
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('edit.seo') }}" class="nav-link {{ Route::is('edit.seo') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Edit SEO</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif

                    <li class="nav-header">User Settings</li>
                    @if(Auth::user()->can('setting.menu'))
                        <li class="nav-item {{ Route::is('all.admin', 'add.admin', 'edit.admin') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users-cog"></i>
                                <p>
                                    Users
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('all.admin') }}" class="nav-link {{ Route::is('all.admin') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Users</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('add.admin') }}" class="nav-link {{ Route::is('add.admin') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add User</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    @if(Auth::user()->can('setting.menu'))
                        <li class="nav-item {{ Route::is('all.role', 'add.role', 'edit.role') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user-cog"></i>
                                <p>
                                    Roles
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('all.role') }}" class="nav-link {{ Route::is('all.role') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Roles</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('add.role') }}" class="nav-link {{ Route::is('add.role') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Role</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif

                    @if(Auth::user()->can('setting.menu'))
                        <li class="nav-item {{ Route::is('all.permission', 'add.permission', 'edit.permission') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user-shield"></i>
                                <p>
                                    Permissions
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('all.permission') }}" class="nav-link {{ Route::is('all.permission') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Permissions</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('add.permission') }}" class="nav-link {{ Route::is('add.permission') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Permission</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif

                    @if(Auth::user()->can('role.menu'))
                        <li class="nav-item {{ Route::is('all.roles.permission', 'add.roles.permission', 'admin.edit.roles') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-check-square"></i>
                                <p>
                                    Permission Roles
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('all.roles.permission') }}" class="nav-link {{ Route::is('all.roles.permission') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Permission Roles</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('add.roles.permission') }}" class="nav-link {{ Route::is('add.roles.permission') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Permission Roles</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif

                @endif

                <li class="nav-header">Website Settings</li>
                <li class="nav-item">
                    <a href="{{ route('admin.profile') }}" class="nav-link {{ Route::is('admin.profile') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            My Account
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.change.password') }}" class="nav-link {{ Route::is('admin.change.password') ? 'active' : '' }}">
                        <i class="nav-icon far fa-edit"></i>
                        <p>
                            Change Password
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.logout') }}" class="nav-link {{ Route::is('admin.logout') ? 'active' : '' }}">
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
