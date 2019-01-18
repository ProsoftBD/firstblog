<ul class="list-group">
    <li class="list-group-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('profiles') }}">Profile</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('posts') }}">All Posts</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('posts.create') }}">Create New Post</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('categories') }}">All Categories</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('categories.create') }}">Create new Category</a>
    </li>

    <li class="list-group-item">
        <a href="{{ route('tags') }}">Tags</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('tags.create') }}">Create new Tag</a>
    </li>
    @if(Auth::user()->admin)
        <li class="list-group-item">
            <a href="{{ route('users') }}">Users</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('users.create') }}">Add User</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('settings') }}">Settings</a>
        </li>
    @endif
    <li class="list-group-item">
        <a href="{{ route('posts.trashed') }}">Trash</a>
    </li>
</ul>
