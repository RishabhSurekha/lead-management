<nav id="sidebar">
    <div class="custom-menu">
        <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
        </button>
    </div>
    <div class="p-4">
        <h1><a href="index.html" class="logo"><img src="{{ asset('img/danaher.svg')}}" alt="Danaher Logo" style="width: 100%; background: white; padding: 0.25em; border-radius: 5px;"></a></h1>
        <ul class="list-unstyled components mb-5">
            <li class="active">
                <a href="{{ route('home')}}"><span class="fa fa-home mr-3"></span> Home</a>
            </li>
            <li>
                <a href="{{ route('database') }}"><span class="fa fa-database mr-3"></span> Database</a>
            </li>
            <li>
                <a href="{{ route('export') }}"><span class="fa fa-share-square-o mr-3"></span> Export Data</a>
            </li>
            <li>
                <a href="{{ route('leads-submitted') }}"><span class="fa fa-briefcase mr-3"></span> Leads Submitted</a>
            </li>
            <li>
                <a href="{{ route('leads-assigned') }}"><span class="fa fa-suitcase mr-3"></span> Leads Assigned</a>
            </li>
            <li>
                <a href="{{ route('analytics') }}"><span class="fa fa-cogs mr-3"></span> Analytics</a>
            </li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span class="fa fa-user mr-3"></span> Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
            {{-- <li>
            <a href="#"><span class="fa fa-paper-plane mr-3"></span> Contacts</a>
            </li> --}}
        </ul>
    </div>
</nav>
