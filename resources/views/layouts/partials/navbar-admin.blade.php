<li class="nav-item">
    <a class="nav-link" href="{{ route('users.web.dashboard') }}">
        <i class="fe fe-users"></i> Users
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('monitor.admin.dashboard') }}" class="nav-link">
        <i class="fe fe-activity"></i> Monitor
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('articles.dashboard') }}" class="nav-link">
        <i class="fe fe-file-text"></i> Articles
    </a>
</li>

<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fe fe-edit-3"></i> Petition
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="#">
            <i class="fe fe-file-text text-secondary mr-1"></i> Petition text
        </a>
        <a class="dropdown-item" href="#">
            <i class="fe fe-edit-3 text-secondary mr-1"></i> Signatures
        </a>
    </div>
</li>
