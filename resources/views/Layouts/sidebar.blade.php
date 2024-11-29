
<div class="sidebar">
    <div class="d-flex flex-column align-items p-3">
        <h4 class="text-white mb-4">Admin Dashboard</h4>
        <nav class="nav flex-column text-right">
           @if(Auth::guard('admin')->user()->role === 'superadmin')
            <a class="nav-link d-flex align-items-center {{ request()->is('superadmin/dashboard') ? 'active' : '' }}" href="{{ route('superadmin.dashboard') }}">
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
            </a>
            @endif
            @if(Auth::guard('admin')->user()->role === 'admin')
            <a class="nav-link d-flex align-items-center {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
            </a>
            @endif
            @if(Auth::guard('admin')->user()->role === 'superadmin')
                <a class="nav-link d-flex align-items-center {{ request()->is('admin/manage-admins') ? 'active' : '' }}" href="{{ route('admin.manage.admins') }}">
                    <i class="fas fa-user-shield"></i>
                  Admins
                </a>
            @endif
                <a class="nav-link d-flex align-items-center {{ request()->is('admin/manage-users') ? 'active' : '' }}" href="{{route('admin.manage.users')}}">
                <i class="fas fa-users"></i>
                Users
            </a>
            <a class="nav-link d-flex align-items-center {{ request()->is('admin/manage-categories') ? 'active' : '' }}" href="{{route('admin.manage.categories')}}">
                <i class="fas fa-tags"></i>
                Categories
            </a>
            <a class="nav-link d-flex align-items-center {{ request()->is('quizzes') ? 'active' : '' }}" href="{{route('quiz.index')}}">
                <i class="fas fa-star"></i>
                Quizzes
            </a>
            <a class="nav-link d-flex align-items-center {{ request()->is('questions') ? 'active' : '' }}" href="{{route('question.index')}}">
                <i class="fas fa-question-circle"></i>
                Questions
            </a>

            <a class="nav-link d-flex align-items-center {{ request()->is('answers') ? 'active' : '' }}" href="{{route('answer.index')}}">
                <i class="fas fa-check-circle"></i>
                Answers
            </a>



            <a class="nav-link d-flex align-items-center {{ request()->is('admin/notifications') ? 'active' : '' }}" href="">
                <i class="fas fa-bell"></i>
                Notifications
            </a>
            <a class="nav-link d-flex align-items-center {{ request()->is('admin/logs') ? 'active' : '' }}" href="">
                <i class="fas fa-file-alt"></i>
                Logs
            </a>
            <a class="nav-link d-flex align-items-center {{ request()->is('admin/settings') ? 'active' : '' }}" href="">
                <i class="fas fa-cogs"></i>
                Settings
            </a>

        </nav>
    </div>
</div>
