<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    NGR
                </div>
            </li>
            @role('administrator')
            <li>
            <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Manage Team</span> </a>
            </li>
            @endrole
            @role(['physicalplanning','administrator'])
            <li>
                <a href="#" aria-expanded="false"><i class="fa fa-upload"></i> <span class="nav-label">Physical Planning</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse" aria-expanded="false">
                    <li><a href="{{ route('physical-planning.index') }}">Physical Planning Upload</a></li>
                    <li><a href="{{ route('physical-planning.getAllPhysicalPlanning')}}">All Physical Planning</a></li>
                </ul>
            </li>
            @endrole
            @role(['lands', 'administrator'])
            <li>
                <a href="#" aria-expanded="false"><i class="fa fa-upload"></i> <span class="nav-label">Manage Lands</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse" aria-expanded="false">
                    <li><a href="{{ route('lands.index') }}">Lands Upload</a></li>
                    <li><a href="{{ route('lands.getAllLands') }}">All Lands</a></li>
                </ul>
            </li>
            @endrole
            @role(['horc', 'administrator'])
            <li>
                <a href="#" aria-expanded="false"><i class="fa fa-upload"></i> <span class="nav-label">Manage HORC</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse" aria-expanded="false">
                    <li><a href="{{ route('horcs.index') }}">HORC Upload</a></li>
                    <li><a href="{{ route('horcs.getAllHorcs') }}">All HORC</a></li>
                </ul>
            </li>
            @endrole
            @role('administrator')
            <li>
                <a href="#" aria-expanded="false"><i class="fa fa-dashboard"></i> <span class="nav-label">Reporting</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse" aria-expanded="false">
                    <li><a href="#">Physical Planning</a></li>
                    <li><a href="#">Lands Bureau</a></li>
                    <li><a href="#">HORC</a></li>
                    <li><a href="#">Legal</a></li>
                </ul>
            </li> 
            @endrole
            @role(['newgrowth', 'administrator'])                                    
            <li>
                <a href="{{ route('livesearchs.index') }}"><i class="fa fa-search"></i> <span class="nav-label">Search Database</span> </a>
            </li> 
            @endrole                                      
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