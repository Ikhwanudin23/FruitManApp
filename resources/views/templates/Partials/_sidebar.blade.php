<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile" style="background: url({{ asset('assets/images/background/user-info.jpg') }}) no-repeat;">
            <!-- User profile image -->
            <div class="profile-img"> <img src="{{ asset('assets/images/users/profile.png') }}" alt="user" /> </div>
            <!-- User profile text-->
            <div class="profile-text"> <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">FruitMan Admin</a>
                <div class="dropdown-menu animated flipInY">
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout.admin') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout.admin') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">FRUITMAN MANAJEMENT</li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-checkbox-multiple-blank"></i><span class="hide-menu">Dashboard </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a class="has-arrow waves-effect waves-dark" href="{{route('dashboard.index')}}" aria-expanded="false"><i class="mdi mdi-clipboard-check"></i>&nbsp;&nbsp;&nbsp;Dashboard</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-circle"></i><span class="hide-menu">Pengepul </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a class="has-arrow waves-effect waves-dark" href="{{route('fruitCollectors.index')}}" aria-expanded="false"><i class="mdi mdi-account-card-details"></i>&nbsp;&nbsp;&nbsp;Dafar Pengepul</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-circle"></i><span class="hide-menu">Penjual</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a class="has-arrow waves-effect waves-dark" href="{{route('seller.index')}}" aria-expanded="false"><i class="mdi mdi-account-card-details"></i>&nbsp;&nbsp;&nbsp;Dafar Penjual</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    <div class="sidebar-footer">
        <!-- item--><a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
        <!-- item--><a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>

    </div>
    <!-- End Bottom points-->
</aside>