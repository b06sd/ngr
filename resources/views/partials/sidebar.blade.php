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
                        <a href="#" aria-expanded="false"><i class="fa fa-align-justify"></i> <span class="nav-label">Manage Physical Planning</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse" aria-expanded="false">
                            <li><a href="{{ route('physical-planning.index') }}">Physical Planning Upload</a></li>
                            <li><a href="{{ route('physical-planning.getAllPhysicalPlanning')}}">All Physical Planning</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#" aria-expanded="false"><i class="fa fa-align-justify"></i> <span class="nav-label">Manage Lands</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse" aria-expanded="false">
                            <li><a href="{{ route('lands.index') }}">Lands Upload</a></li>
                            <li><a href="{{ route('lands.getAllLands') }}">All Lands Data</a></li>
                        </ul>
                    </li>                                       
                    <li>
                        <a href="{{ route('livesearchs.index') }}"><i class="fa fa-upload"></i> <span class="nav-label">Live Search</span> </a>
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