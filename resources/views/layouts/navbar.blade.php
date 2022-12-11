<nav class="navbar navbar-dark bg-dark justify-content-between">
    <a class="navbar-brand text-white font-weight-bold">e-Complaint</a>
    <div>
        @auth
            <a class="mr-5" href="/home">Home</a>
            <a href="/complain">File Complaint</a>
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
