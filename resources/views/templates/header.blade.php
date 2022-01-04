<header>
    <h1>
        <a href="/">DY.ID</a>
    </h1>

    <nav>
        <ul class="menu-left">
            <li>
                <a href="/">Home</a>
            </li>
            @auth
                @if (Auth::user()->role == 'member')
                    <li>
                        <a href="/cart">My Cart</a>
                    </li>

                    <li>
                        <a href="/transactions">Transaction History</a>
                    </li>
                @elseif (Auth::user()->role == 'admin')
                    <li class="dropdown">
                        Manage Products
                        <ul class="dropdown-list">
                            <li>
                                <a href="/products">View Products</a>
                            </li>
    
                            <li>
                                <a href="/products/add">Add Product</a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        Manage Categories
                        <ul class="dropdown-list">
                            <li>
                                <a href="/categories">View Categories</a>
                            </li>
    
                            <li>
                                <a href="/categories/add">Add Category</a>
                            </li>
                        </ul>
                    </li>
                @endif
            @endauth
        </ul>

        <form action="/search" method="GET" id="search-bar">
            <input type="search" name="search" placeholder="Search for products" aria-label="Search">
            <button type="submit">
                <span class="material-icons-round">
                    search
                </span>
            </button>
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
