<aside class="left-sidebar" style="background: #0b0a0a;">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">Dashboard</li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="/home">Home</a></li>
                        <li><a href="/home/portal">Open/Close Registraion</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Add</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="/adminSuper/camper">Add Camper</a></li>
                        <li><a href="/adminSuper/createArea">Add Area</a></li>
                        <li><a href="/adminSuper/area/admin">Add Area Admin</a></li>
                        <li><a href="/adminSuper/area/parish">Add Parish</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-email"></i><span class="hide-menu">View</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="/adminSuper/camper/all">All Campers</a></li>
                        <li><a href="/adminSuper/area/all">All Areas</a></li>
                        <li><a href="/adminSuper/parish/all">All Parishes</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-email"></i><span class="hide-menu">Account</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="/admin/password">Change Password</a></li>
                        <!-- logout form -->
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </li>
                
                
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->

</aside>
        