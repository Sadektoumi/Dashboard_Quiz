<nav class="navbar navbar-expand-lg navbar-custom">
    <a class="navbar-brand text-white" href="#">Admin Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-white" href="#">
                    <i class="fas fa-user-circle mr-2"></i> Profile
                </a>
            </li>
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="nav-link text-white btn btn-link">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>
