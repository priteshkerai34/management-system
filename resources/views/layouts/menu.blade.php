<li class="nav-item">
    <a href="{{ route('categories.index') }}"
       class="nav-link {{ Request::is('categories*') ? 'active' : '' }}">
        <p>Categories</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('taxCategories.index') }}"
       class="nav-link {{ Request::is('taxCategories*') ? 'active' : '' }}">
        <p>Tax Categories</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('items.index') }}"
       class="nav-link {{ Request::is('items*') ? 'active' : '' }}">
        <p>Items</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('profiles.index') }}"
       class="nav-link {{ Request::is('profiles*') ? 'active' : '' }}">
        <p>Profile</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('history.index') }}"
       class="nav-link {{ Request::is('history*') ? 'active' : '' }}">
        <p>History</p>
    </a>
</li>


