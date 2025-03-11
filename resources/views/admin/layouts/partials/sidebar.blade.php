<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-center">
                @php
                    // Mendapatkan data user yang sedang login
                    $user = auth()->user();

                    // Fungsi untuk mendapatkan inisial dari nama (contoh: "John Doe" menjadi "JD")
                    $initials = collect(explode(' ', $user->name))
                        ->map(function ($word) {
                            return strtoupper(substr($word, 0, 1));
                        })
                        ->join('');
                @endphp

                <div class="profile" style="text-align: center;">
                    <!-- Elemen lingkaran untuk menampilkan inisial -->
                    <div class="profile-img"
                        style="width: 100px; height: 100px; border-radius: 50%; background: #847513; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                        <span style="font-size: 36px; color: #fff;">{{ $initials }}</span>
                    </div>

                    <!-- Tampilkan nama dan email user -->
                    <div class="profile-info" style="margin-top: 10px;">
                        <p style="margin: 0; font-size: 16px;">{{ $user->name }}</p>
                        <p style="margin: 0; font-size: 14px;">{{ $user->email }}</p>
                    </div>
                </div>

                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item {{ request()->routeIs('admin.dasboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-title">Management</li>
                <li class="sidebar-item {{ request()->routeIs('admin.user.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.users.index') }}" class="sidebar-link">
                        <i class="bi bi-person"></i>
                        <span>User</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->routeIs('admin.categories.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.categories.index') }}" class="sidebar-link">
                        <i class="bi bi-tags"></i>
                        <span>Kategori</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->routeIs('admin.products.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.products.index') }}" class="sidebar-link">
                        <i class="bi bi-box-seam"></i>
                        <span>Produk</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
