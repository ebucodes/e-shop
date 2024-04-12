<header class="cr-header">
    <div class="container-fluid">
        <div class="cr-header-items">
            <div class="left-header">
                <a href="javascript:void(0)" class="cr-toggle-sidebar">
                    <span class="outer-ring">
                        <span class="inner-ring"></span>
                    </span>
                </a>

            </div>
            <div class="right-header">
                <div class="cr-right-tool cr-user-drop">
                    <div class="cr-hover-drop">
                        <div class="cr-hover-tool">
                            <i class="ri-account-circle-fill"></i>
                            <span>{{ ucfirst(auth()->user()->role)}}</span>
                        </div>
                        <div class="cr-hover-drop-panel right">
                            <div class="details">
                                <h6>{{ auth()->user()->firstName .' '. auth()->user()->lastName}}</h6>
                                <p>{{ auth()->user()->email}}</p>
                            </div>
                            <ul class="border-top">
                                {{-- <li><a href="team-profile.html">Profile</a></li> --}}
                                <li><a href="{{ route('myLogs') }}">My Logs</a></li>
                            </ul>
                            <ul class="border-top">
                                <li><a href="{{ route('logOut') }}"><i class="ri-logout-circle-r-line"></i>Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
