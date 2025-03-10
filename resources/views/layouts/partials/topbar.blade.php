<div id="top-header">
    <div class="container">
        <ul class="header-links pull-right">
            @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile') }}">
                        <i class="fa fa-user-o"></i> {{ Auth::user()->name }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i> Logout
                    </a>
                </li>
                @if (Auth::user()->role === 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-cog"></i> Control Panel
                        </a>
                    </li>
                @endif
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <li><a href="#" data-toggle="modal" data-target="#loginModal"><i class="fa fa-user-o"></i> Login</a>
                </li>
                <li><a href="#" data-toggle="modal" data-target="#registerModal"><i class="fa fa-user-plus"></i>
                        Register</a></li>
            @endauth
        </ul>
    </div>
</div>
<!-- Login Modal -->
<div id="loginModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
                <hr>
                <a href="{{ route('google.login') }}" class="btn btn-danger btn-block">
                    <i class="fa fa-google"></i> Login with Google
                </a>
            </div>
        </div>
    </div>
</div>
<!-- /Login Modal -->
<!-- Register Modal -->
<div id="registerModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Register</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="password_confirmation"
                            name="password_confirmation" required>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Register</button>
                    <hr>
                    <a href="{{ route('google.login') }}" class="btn btn-danger btn-block">
                        <i class="fa fa-google"></i> Register with Google
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Register Modal -->
