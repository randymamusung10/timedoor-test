<nav id="sidebarMenu" class="col-md-12 col-lg-2 d-md-block bg-light sidebar">
    <div class="position-sticky pt-3">
        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('author') ? 'active' : '' }}" href="{{ route('author.index') }}">
                    Author
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('books') ? 'active' : '' }}" href="{{ route('books.index') }}">
                    Books
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('rating*') ? 'active' : '' }}" href="{{ route('rating.create') }}">
                    Insert Rating
                </a>
            </li>
        </ul>

        
    </div>
</nav>