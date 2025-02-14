@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp
<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @if (Auth::user()->role == 'customer')
            <li class="nav-item has-treeview {{ $prefix == '/members' ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Manage Profile
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('customer.edit.profile') }}"
                            class="nav-link {{ $route == 'customer.edit.profile' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Edit Your Profile</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('customer.passowrd.change') }}"
                            class="nav-link {{ $route == 'customer.passowrd.change' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Change Password</p>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
    </ul>
</nav>
<!-- /.sidebar-menu -->
