<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler"> </div>
            </li>
            {{-- DashBoard --}}
            <li class="nav-item start {{ isActive('admin.dashboard', 'active open') }}">
                <a href="{{route('admin.dashboard')}}" class="nav-link ">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>
            {{-- Admins Managemrnt --}}
            @if($admin_info->role == 1)
            <li class="nav-item start {{ isActive('admin.admin-management.index', 'active open') }} {{ isActive('admin.admin-management.create', 'active open') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title">Admins Management</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start {{ isActive('admin.admin-management.index', 'active open') }}">
                        <a href="{{route('admin.admin-management.index')}}" class="nav-link ">
                            <i class="fa fa-list"></i>
                            <span class="title">List</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item start {{ isActive('admin.admin-management.create', 'active open') }}">
                        <a href="{{route('admin.admin-management.create')}}" class="nav-link ">
                            <i class="fa fa-file-text-o"></i>
                            <span class="title">Create</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            {{-- Categories Post Managemrnt --}}
            <li class="nav-item start {{ isActive('admin.categories-post-management.index', 'active open') }} {{ isActive('admin.categories-post-management.create', 'active open') }} {{setActive('*admink/categories-post/update/*', 'active open')}}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title">Danh mục bài viết</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start {{ isActive('admin.categories-post-management.index', 'active open') }}">
                        <a href="{{route('admin.categories-post-management.index')}}" class="nav-link ">
                            <i class="fa fa-list"></i>
                            <span class="title">Danh sách</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item start {{ isActive('admin.categories-post-management.create', 'active open') }}">
                        <a href="{{route('admin.categories-post-management.create')}}" class="nav-link ">
                            <i class="fa fa-list"></i>
                            <span class="title">Thêm mới</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- Posts Managemrnt --}}
            <li class="nav-item start {{ isActive('admin.posts-management.index', 'active open') }} {{ isActive('admin.posts-management.create', 'active open') }} {{setActive('*admink/posts/update/*', 'active open')}}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title">Bài viết</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start {{ isActive('admin.posts-management.index', 'active open') }}">
                        <a href="{{route('admin.posts-management.index')}}" class="nav-link ">
                            <i class="fa fa-list"></i>
                            <span class="title">Danh sách</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item start {{ isActive('admin.posts-management.create', 'active open') }}">
                        <a href="{{route('admin.posts-management.create')}}" class="nav-link ">
                            <i class="fa fa-list"></i>
                            <span class="title">Thêm mới</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- Posts Managemrnt --}}
            <li class="nav-item start {{ isActive('admin.pages-management.index', 'active open') }} {{ isActive('admin.pages-management.create', 'active open') }} {{setActive('*admink/pages/update/*', 'active open')}}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title">Trang tĩnh</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start {{ isActive('admin.pages-management.index', 'active open') }}">
                        <a href="{{route('admin.pages-management.index')}}" class="nav-link ">
                            <i class="fa fa-list"></i>
                            <span class="title">Danh sách</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    @if($admin_info->role == 1)
                    <li class="nav-item start {{ isActive('admin.pages-management.create', 'active open') }}">
                        <a href="{{route('admin.pages-management.create')}}" class="nav-link ">
                            <i class="fa fa-list"></i>
                            <span class="title">Thêm mới</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
            {{-- Contact Management --}}
            <li class="nav-item start {{ isActive('admin.contact-management.index', 'active open') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title">Liên hệ</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start {{ isActive('admin.contact-management.index', 'active open') }}">
                        <a href="{{route('admin.contact-management.index')}}" class="nav-link ">
                            <i class="fa fa-list"></i>
                            <span class="title">Danh sách</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- Images Management --}}
            <li class="nav-item start {{setActive('*admink/images/*', 'active open')}}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title">Hình ảnh</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start {{setActive('*admink/images/slider*', 'active open')}}">
                        <a href="{{route('admin.images.index',['type'=>'slider'])}}" class="nav-link ">
                            <i class="fa fa-list"></i>
                            <span class="title">Slider</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item start {{setActive('*admink/images/partner*', 'active open')}}">
                        <a href="{{route('admin.images.index',['type'=>'partner'])}}" class="nav-link ">
                            <i class="fa fa-list"></i>
                            <span class="title">Đối tác</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- Contact Management --}}
            <li class="nav-item start {{ isActive('admin.configs-text.index', 'active open') }} {{ isActive('admin.configs-text-seo.index', 'active open') }} {{ isActive('admin.configs-text-advanced.index', 'active open') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title">Cấu hình</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start {{ isActive('admin.configs-text.index', 'active open') }}">
                        <a href="{{route('admin.configs-text.index')}}" class="nav-link ">
                            <i class="fa fa-list"></i>
                            <span class="title">Cơ bản</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item start {{ isActive('admin.configs-text-advanced.index', 'active open') }}">
                        <a href="{{route('admin.configs-text-advanced.index')}}" class="nav-link ">
                            <i class="fa fa-list"></i>
                            <span class="title">Nâng cao</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item start {{ isActive('admin.configs-text-seo.index', 'active open') }}">
                        <a href="{{route('admin.configs-text-seo.index')}}" class="nav-link ">
                            <i class="fa fa-list"></i>
                            <span class="title">SEO</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>