<div>
    <header>
        <div class="logo-area">
            <a href="/"><img class="logo" src="/images/logo-black.svg" alt=""></a>
        </div>
    
        <div class="search-area">
            <div class="search-area-input">
                <img class="icon" src="/images/menu.svg"
                    alt="Location dropdown" />
                <input id="s-jobtitle" class="input-jobtitle" type="text" name="search-jobtitle" placeholder="Search jobs..." />
            </div>
            
    
            <div class="search-area-input-mod">
                <input id="locationInput" class="search-area-input location" type="text" name="search-location"
                    placeholder="Location?" />
                <img onclick="dropDownToggle()" class="icon" id="search-location-dropdown"
                    src="/images/keyboard_arrow_down-24px.svg" alt="Location dropdown" />
            </div>
    
            <div class="search-submit">
                <!--The img element velow was supposed to be class=icon but it seems its not working-->
                <img 
                    class="icon" 
                    id="search-action" 
                    src="/images/search.svg" 
                    alt="Search" onclick="
                                    // event.preventDefault();
                                    // myjobs.doSomethingFromOutside(document.getElementById('s-jobtitle').value);
                                    // document.getElementById('search-form').submit();
                                    "/>
            </div>
        </div>
    
        <div class="reg-auth-area">
            <div class="f-link">
                <a href="#">Help?</a>
            </div>
    
            <!--Authentication links-->
            @guest
                <div class="btn-grp">
                    @if (Route::has('login'))
                        <button id="lg-in"><a href="{{ route('login') }}">{{ __('Login') }}</a></button>                 
                    @endif

                    @if (Route::has('register'))
                        <button id="sgn-up"><a href="{{ route('register') }}">{{ __('Register') }}</a></button>
                    @endif
                </div>
            @else
                <div class="btn-grp">
                    <img id="pr" src="/images/profile.svg" alt="">
                    <button id="lg-in"> 
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </button> 
                </div> 
            @endguest
        </div>
    </header>

    <div class="header-mask"></div>
</div>