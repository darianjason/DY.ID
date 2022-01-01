<header>
    <h1>DY.ID</h1>

    <nav>
        <ul class="menu-left">
            <li>
                <a href="/">Home</a>
            </li>
        </ul>

        <form action="/search" method="GET">
            <input type="search" name="search" placeholder="Search for products" aria-label="Search">
            <button type="submit">Search</button>
        </form>

        <ul class="menu-right">
            @guest
                <li>
                    <a href="/login">Log In</a>
                </li>
                
                <li>
                    <a href="/register">Register</a>
                </li>
            @endguest
            
            @auth
                <li>
                    <a href="/logout">Log Out</a>
                </li>
            @endauth
        </ul>
    </nav>
    
</header>
