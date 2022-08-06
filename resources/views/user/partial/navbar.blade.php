<nav class="navbar">
    <div class="logo">
        <a href="/">
            <img id="img" src="{{ url('images/logo.png') }}" alt="logo">
        </a>
    </div>

    <div class="nav-content">
        <ul class="nav-list">
            <li><a href="/">Layanan</a></li>
            <li><a href="/tes-psikologi">Tes Psikologi</a></li>
            <li><a href="/kerjasama">Kerjasama</a></li>
            <li><a href="/tentang-kami">Tentang Kami</a></li>
        </ul>

        <div class="nav-access">
            @if(Route::has('login'))
                @auth
                <div class="after-login">
                    <span>|</span>
                    <div class="user-info">
                        <svg
                                data-dropdown-link
                                xmlns="http://www.w3.org/2000/svg"
                                width="22.42"
                                height="24"
                                viewBox="0 0 22.42 24">
                                <g id="user" transform="translate(-6.75 -2.25)">
                                    <path
                                        id="Path_6"
                                        data-name="Path 6"
                                        d="M16.125,3.964A4.286,4.286,0,1,1,11.839,8.25a4.286,4.286,0,0,1,4.286-4.286m0-1.714a6,6,0,1,0,6,6A6,6,0,0,0,16.125,2.25Z"
                                        transform="translate(1.801 0)"
                                        fill="#000"
                                    />
                                    <path
                                        id="Path_7"
                                        data-name="Path 7"
                                        d="M29.17,30.536H26.928V26.25c0-2.367-2.509-4.286-5.6-4.286H14.6c-3.1,0-5.6,1.919-5.6,4.286v4.286H6.75V26.25c0-3.314,3.513-6,7.847-6h6.726c4.334,0,7.847,2.686,7.847,6Z"
                                        transform="translate(0 -4.286)"
                                        fill="#000"
                                    />
                                </g>
                            </svg>   
                        <p>{{ Auth::user()->name }}</p>
                    </div>
                    <a href="/logout">Logout</a>
                </div>
                @else
                <div>
                    <a href="/login">    
                        <p>Login</p>
                    </a>
                </div>
                @endif
            @endif
        </div>
    </div>
    

    <div class="hamburger">
        <span></span><span></span><span></span>
    </div>
</nav>