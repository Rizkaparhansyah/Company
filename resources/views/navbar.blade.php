<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{{url('/dashboard')}}"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="{{url('/dashboard')}}"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>
        
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="nav-profile-img">
                        <img src="{{asset('/')}}assets/images/faces-clipart/pic-2.png" alt="image">
                        <span class="availability-status online"></span>
                    </div>
                    <div class="nav-profile-text">
                        <p class="mb-1 text-black">{{ Auth::user()->name }}</p>
                    </div>
                </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                    <div class="card card-img-holder text-white">
                        <div class="card-body">
                            <div class="nav-profile-img d-flex justify-content-center">
                                <img src="{{asset('/')}}assets/images/faces-clipart/pic-2.png" width="100"  height="100" class="rounded-circle" alt="image">
                            </div>
                            <p class="mt-3 text-black">{{ Auth::user()->name }}</p>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{url('profile')}}">
                                    <button type="button" class="btn btn-gradient-primary btn-rounded btn-icon profile-user">
                                        <i class="mdi mdi-account-box menu-icon"></i>
                                    </button>
                                </a>
                                
                                <a href="{{route('logout')}}">
                                    <button type="button" class="btn btn-gradient-danger btn-rounded btn-icon">
                                        <i class="mdi mdi-logout"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
            </li>
            
            
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>