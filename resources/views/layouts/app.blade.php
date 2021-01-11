<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }} " style="height: 100%; margin: 0; padding: 0;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Atichioz') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <!--Header style-->
    <style>
        header {
        height: 67px;
        background-color: #FCFCFC;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
            -ms-flex-pack: justify;
                justify-content: space-between;
        -webkit-box-align: center;
            -ms-flex-align: center;
                align-items: center;
        position: fixed;
        width: 100%;
        z-index: 1;
        -webkit-box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.1);
                box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.1);
        }

        header .logo-area .logo {
        height: 28px;
        margin-left: 20px;
        }

        header .search-area {
        background-color: #ffffff;
        border: 1px solid rgba(95, 28, 255, 0.5);
        border-radius: 8px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
            -ms-flex-align: center;
                align-items: center;
        }

        header .search-area input {
        border: none;
        outline: none;
        font-size: 0.8rem;
        color: #5F1CFF;
        font-family: 'Segoe UI';
        margin-left: 15px;
        }

        header .search-area .search-area-input {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
            -ms-flex-align: center;
                align-items: center;
        }

        header .search-area .search-area-input img {
        display: none;
        margin-left: 10px;
        }

        header .search-area .search-area-input input {
        width: 237px;
        }

        header .search-area .search-area-input-mod {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
            -ms-flex-align: center;
                align-items: center;
        border-left: 1px solid rgba(95, 28, 255, 0.5);
        margin: 0;
        padding: 0;
        }

        header .search-area .search-area-input-mod .dropdown {
        position: absolute;
        top: 45px;
        padding-left: 16px;
        background-color: #fff;
        width: 152px;
        display: none;
        }

        header .search-area .search-area-input-mod .dropdown .dropdown-content {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
            -ms-flex-direction: column;
                flex-direction: column;
        max-height: 300px;
        overflow-y: scroll;
        }

        header .search-area .search-area-input-mod .dropdown .dropdown-content a {
        margin: 5px 0;
        text-decoration: none;
        color: #333;
        padding: 12px 16px;
        display: block;
        }

        header .search-area .search-area-input-mod input {
        width: 105px;
        }

        header .search-area .search-area-input-mod .icon {
        margin-right: 10px;
        }

        header .search-area .search-submit {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
            -ms-flex-align: center;
                align-items: center;
        background-color: #5F1CFF;
        border-radius: 0 7px 7px 0;
        border-left: 1px solid #5F1CFF;
        }

        header .search-area .search-submit .icon {
        margin-top: 10px;
        margin-bottom: 10px;
        margin-left: 15px;
        margin-right: 15px;
        width: 18px;
        height: 18px;
        }

        header .reg-auth-area {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
            -ms-flex-align: center;
                align-items: center;
        margin-right: 34px;
        }

        header .reg-auth-area .f-link {
        padding: 5px;
        margin-right: 20px;
        }

        header .reg-auth-area .f-link a {
        text-decoration: none;
        font-size: 0.75em;
        color: #000;
        }

        header .reg-auth-area .btn-grp {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
            -ms-flex-align: center;
                align-items: center;
        background-color: transparent;
        border-radius: 10px;
        border: 1px solid #ECECEC;
        }

        header .reg-auth-area .btn-grp button {
        padding: 10px 18px;
        font-size: small;
        font-weight: 300;
        color: #777777;
        outline: none;
        }

        header .reg-auth-area .btn-grp #lg-in {
        border: none;
        background-color: transparent;
        color: #777777;
        }

        header .reg-auth-area .btn-grp #sgn-up {
        border-radius: 8px;
        border: 1px solid #ECECEC;
        border-top: none;
        border-bottom: none;
        border-right: none;
        background-color: #fff;
        }

        header .reg-auth-area .btn-grp #pr {
        width: 48px;
        height: 48px;
        margin-left: 10px;
        margin-right:-20px;
        }

        .header-mask {
        height: 67px;
        width: 100%;
        }

        @media (max-width: 900px) {
        header .logo-area {
            display: none;
        }
        header .search-area {
            margin-left: 20px;
        }
        }

        @media (max-width: 770px) {
        header {
            height: 53px;
            -ms-flex-pack: distribute;
                justify-content: space-around;
        }
        header .reg-auth-area {
            display: none;
            margin-left: 0;
            margin-right: 0;
        }
        header .search-area {
            margin-left: 2px;
            margin-right: 2px;
        }
        header .search-area .search-area-input img {
            display: inline;
        }
        .header-mask {
            height: 53px;
        }
        }

        @media (max-width: 500px) {
        header .search-area .search-area-input input {
            width: 100%;
        }
        header .search-area .search-area-input-mod {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }
        header .search-area .search-area-input-mod img {
            -ms-flex-item-align: end;
                align-self: flex-end;
        }
        header .search-area .search-area-input-mod input {
            width: 100%;
        }
        }

        @media (max-width: 400px) {
        header .search-area {
            width: 100%;
        }
        header .search-area .search-area-input {
            width: 100%;
        }
        header .search-area .search-area-input-mod {
            display: none;
        }
        }
    </style>

    <!--Footer style-->
    <style>
        footer {
        position: relative;
        height: 132px;
        margin-top: -132px;
        clear: both;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
            -ms-flex-direction: column;
                flex-direction: column;
        -webkit-box-align: center;
            -ms-flex-align: center;
                align-items: center;
        font-weight: lighter;
        font-size: small;
        background-color: #fff;
        -webkit-box-shadow: 0 -1px 5px rgba(0, 0, 0, 0.1);
                box-shadow: 0 -1px 5px rgba(0, 0, 0, 0.1);
        }

        footer .rating {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
            -ms-flex-align: center;
                align-items: center;
        margin: 5px 0;
        }

        footer .rating label {
        text-align: right;
        padding: 0;
        margin: 0;
        }

        footer .rating ul {
        padding: 0;
        margin: 0;
        margin-left: 10px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        }

        footer .rating ul li {
        list-style: none;
        padding: 4px;
        margin: 0;
        }

        footer .say-something {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
            -ms-flex-align: center;
                align-items: center;
        margin: 0;
        }

        footer .say-something label {
        text-align: right;
        margin: 0;
        padding: 0;
        }

        footer .say-something input {
        margin-left: 10px;
        padding: 4px;
        }

        footer .submit {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
            -ms-flex-align: center;
                align-items: center;
        margin: 5px 0;
        }

        footer .submit button {
        color: #fff;
        padding: 5px 40px;
        font-size: small;
        font-weight: 300;
        outline: none;
        border: 1px solid;
        border-radius: 15px;
        height: 30px;
        background-color: #5F1CFF;
        }

        footer .submit .by {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
            -ms-flex-align: center;
                align-items: center;
        margin: 5px 0;
        }
    </style>

    
</head>
<body style="height: 100%; margin: 0; padding: 0;">
    <div id="app" style="height: 100%">
        <div class="mycontainer" style="min-height: 100%; padding-bottom: 132px;">
            <div class="container-content" style="overflow: auto;">
                <!--header-->
                @include('layouts.atichiozheader')

                <main class="main-content py8">
                    @yield('content')
                </main>
                
                <!--submenu: include('layouts.atichioznavigator')-->
                <!--staggeredcategories: include('layouts.atichiozcategories')-->

                <!--jobs-->
            </div>
        </div>

        <!--footer-->
        @include('layouts.atichiozfooter')
    </div>
</body>
</html>
