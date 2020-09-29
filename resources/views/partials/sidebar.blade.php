<nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <img alt="image" class="rounded-circle" src="img/profile_small.jpg"/>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="block m-t-xs font-bold">{{ Auth::user()->name }}</span>
                                <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                                <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                                <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                                <li class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="login.html">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>
                    @role('Administrator')
                    <li>
                    <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Manage Team</span> </a>
                    </li>
                    @endrole
                    <li>
                        <a href="{{ route('physical-planning.index') }}"><i class="fa fa-align-justify"></i> <span class="nav-label">Physical Planning</span> </a>
                    </li>
                    <li>
                    <a href="{{ route('lands.index') }}"><i class="fa fa-align-justify"></i> <span class="nav-label">Lands Upload</span> </a>
                    </li>                    
                    <li>
                        <a href="{{ route('get-all-physical-planning') }}"><i class="fa fa-upload"></i> <span class="nav-label">View All Uploads</span> </a>
                    </li>                                      
                    <li>
                        <a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>                    
                    </li>                    
                </ul>

            </div>
        </nav>