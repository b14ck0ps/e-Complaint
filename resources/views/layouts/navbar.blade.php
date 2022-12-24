<nav class="navbar navbar-dark bg-dark justify-content-between">
    <a class="navbar-brand text-white font-weight-bold">e-Complaint</a>
    <div>
        @auth
            @if (Auth::user()->type == 'HQ')
                <a class="mr-5" href="/hq/home">Home</a>
                <a class="mr-5" href="/register/newuser">Add New User</a>
                <a class="mr-5" href="/allcomplains">Anonymous Complains</a>
            @endif
            @if (Auth::user()->type == 'CYBER_POLICE')
                <a class="mr-5" href="/cyberpolice/home">Home</a>
            @endif
            @if (Auth::user()->type == 'POLICE')
                <a class="mr-5" href="/police/home">Home</a>
            @endif
            @if (Auth::user()->type == 'SPECIAL_AGENT')
                <a class="mr-5" href="/agent">Home</a>
            @endif
            @if (Auth::user()->type == 'QR_AGENT')
                <a class="mr-5" href="/qr-agent">Home</a>
            @endif
            @if (Auth::user()->type == 'VICTIM')
                <a class="mr-5" href="/home">Home</a>
                <a href="/complain">File Complaint</a>
            @endif
        @endauth
    </div>
    <div>
        @auth
            <a class="mr-5" href="/logout">Logout</a>
        @endauth
        @guest
            <a class="mr-5" href="/login">Login</a>
            <a href="/register">Register</a>
        @endguest
    </div>
</nav>
