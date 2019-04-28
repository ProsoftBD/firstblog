<aside class="sidebar">
    <div class="sidebar-container">
        <div class="sidebar-header">
            <div class="brand">
                <div class="logo">
                    <span class="l l1"></span>
                    <span class="l l2"></span>
                    <span class="l l3"></span>
                    <span class="l l4"></span>
                    <span class="l l5"></span>
                </div>
                {{ $settings->site_name }}
            </div>
        </div>
        <nav class="menu">
            <ul class="sidebar-menu metismenu" id="sidebar-menu">
                <li class="active">
                    <a href="{{ route('dashboard') }}">
                        <i class="fa fa-home"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-th-large"></i>Manage Posts
                        <i class="fa arrow"></i>
                    </a>
                    <ul class="sidebar-nav">
                        <li>
                            <a href="{{ route('posts.create') }}">Create New Post</a>
                        </li>
                        <li>
                            <a href="{{ route('posts') }}">All Posts</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="">
                        <i class="fa fa-sitemap"></i>Manage Category
                        <i class="fa arrow"></i>
                    </a>
                    <ul class="sidebar-nav">
                        <li>
                            <a href="{{ route('categories.create') }}">Create new Category</a>
                        </li>
                        <li>
                            <a href="{{ route('categories') }}">All Categories</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="">
                        <i class="fa fa-tags"></i>Manage Tag
                        <i class="fa arrow"></i>
                    </a>
                    <ul class="sidebar-nav">
                        <li>
                            <a href="{{ route('tags.create') }}">Create new Tag</a>
                        </li>
                        <li>
                            <a href="{{ route('tags') }}">All Tags</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('posts.trashed') }}">
                        <i class="fa fa-trash-o"></i> Trashed Posts
                    </a>
                </li>
                @if(Auth::user()->admin)
                    <li>
                        <a href="">
                            <i class="fa fa-users"></i> User Manage
                            <i class="fa arrow"></i>
                        </a>
                        <ul class="sidebar-nav">
                            <li>
                                <a href="{{ route('users.create') }}">Create new User</a>
                            </li>
                            <li>
                                <a href="{{ route('users') }}">Users</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('settings') }}">
                            <i class="fa fa-gears"></i> Settings
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>