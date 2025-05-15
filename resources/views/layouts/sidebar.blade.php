<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->

            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                <li>
                    <a href="{{ url('/home') }}" class="waves-effect">
                        <i class="bx bx-home"></i>
                        <span key="t-chat">Dashboard</span>
                    </a>
                </li>
                <li
                    class="{{ (request()->is('/admin/university') || request()->is('admin/university/addUniversity') || request()->is('admin/university/editUniversity/*')|| request()->is('admin/university/viewUniversity/*')) ? 'active mm-active' : '' }}">
                    <a href="{{ url('/admin/university')}}"
                        class="waves-effect {{ (request()->is('/admin/university') || request()->is('admin/university/addUniversity') || request()->is('admin/university/editUniversity/*') || request()->is('admin/university/viewUniversity/*')) ? 'active mm-active' : '' }}"
                        key="t-light-sidebar">
                        <i class="bx bx-buildings"></i>
                        <span key="t-chat">Universities</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/student')}}" key="t-light-sidebar">
                        <i class="bx bx-group"></i>
                        <span key="t-chat">Student Inquiries</span>
                    </a>
                </li>

                <li class="menu-title" key="t-menu">Master Menu</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-map"></i>
                        <span key="t-chat">Locations</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="{{ url('/admin/country')}}" key="t-light-sidebar">
                                <i class="bx bx-circle"></i>
                                <span key="t-chat">Countries</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/state')}}" key="t-light-sidebar">
                                <i class="bx bx-circle"></i>
                                <span key="t-chat">States</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('/admin/programs')}}" key="t-light-sidebar">
                        <i class="mdi mdi-book-education"></i>
                        <span key="t-chat">Programs</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/department')}}" key="t-light-sidebar">
                        <i class="bx bx-git-branch"></i>
                        <span key="t-chat">Departments</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/subject')}}" key="t-light-sidebar">
                        <i class="mdi mdi-book-open-page-variant-outline"></i>
                        <span key="t-chat">Subjects</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/media')}}" key="t-light-sidebar">
                        <i class="mdi mdi-folder-image"></i>
                        <span key="t-chat">Media</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>