<!-- ========== Main Header Starts ========== -->
<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="#" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="/assets/images/img/u-logo-sm.png" alt=""  height="30">
                    </span>
                    <span class="logo-lg">
                        <img src="/frontAssets/images/university-logo__1__1-removebg-preview.png" width = "100" height="70" alt="">
                    </span>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>



            <div class="dropdown d-inline-block">
                <!-- <button type="button" class="btn header-item noti-icon waves-effect"
                    id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="bx bx-bell bx-tada"></i>
                </button> -->
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0" key="t-notifications"> Notifications </h6>
                            </div>
                            <div class="col-auto">
                                <a href="#!" class="small" key="t-view-all"> View All</a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="d-flex">
                                <img src="/assets/images/users/avatar-3.jpg" class="me-3 rounded-circle avatar-xs"
                                    alt="user-pic">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">James Lemire</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1" key="t-simplified">It will seem like simplified English.</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-hours-ago">1
                                                hours ago</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="p-2 border-top d-grid">
                        <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                            <i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-view-more">View More..</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="d-none d-xl-inline-block ms-1" key="t-henry">Hello {{ Auth::user()->name }}</span>
                        <!-- <img class="rounded-circle header-profile-user" src="{{ Auth::user()->profile_photo }}"
                        alt="Header Avatar" /> -->
                        <!-- <div class="avatar-xs">
                            <span class="avatar-title rounded-circle bg-primary text-white font-size-16">
                                {{ucfirst(Auth::user()->name[0])}}
                            </span>
                        </div> -->
                        <span class="rounded-circle bg-primary text-white font-size-16" style="padding: 4px 5px 4px 10px;">
                            {{ucfirst(Auth::user()->name[0])}}
                        </span>
                    <i class="bx bx-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                  
                        <!-- <a class="dropdown-item" href="{{url('editor/editProfile')}}">
                        <i class="bx bx-user font-size-16 align-middle me-1"></i> <span
                            key="t-profile">Edit Profile</span>
                    </a> -->
                    <a class="dropdown-item" href="{{url('admin/changePassword')}}">
                      
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- ========== Main Header Ends ========== -->