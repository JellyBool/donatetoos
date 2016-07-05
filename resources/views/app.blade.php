<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="开源,开源项目,捐赠">
    <meta name="description" content="在软件开发领域，希望你总是想着给予大于索求；每天为优秀开源项目捐赠一点心意，也是一件不错的事。">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta id="token" name="token" value="{{ csrf_token() }}">
    <title>Donate to open source project today</title>
    <link rel="shortcut icon" href="https://laravist.com/images/favicon.ico">
    <link href="{{ elixir('css/all.css') }}" rel="stylesheet">
    <script src="{{ elixir('js/all.js') }}"></script>
</head>
<style>
    #view-source {
        position: fixed;
        display: block;
        right: 0;
        bottom: 0;
        margin-right: 40px;
        margin-bottom: 40px;
        z-index: 900;
    }
</style>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

    <div class="android-header mdl-layout__header mdl-layout__header--waterfall">
        <div class="mdl-layout__header-row">
            <a href="/" class="mdl-navigation__link mdl-typography--text-uppercase">

          <span class="android-title mdl-layout-title">
                                <span class="devicons devicons-opensource"></span>

          </span>
            </a>

            <div class="android-header-spacer mdl-layout-spacer"></div>

            <div class="android-navigation-container">
                <nav class="android-navigation mdl-navigation">
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="/repo">浏览项目</a>
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="/members">社区成员</a>
                    @if(Auth::check())
                        <a class="mdl-navigation__link" href="#">
                            <img src="{{ Auth::user()->avatar }}" alt="" width="32" class="img-circle">
                            {{ Auth::user()->name }} 
                        </a>
                    @endif
                </nav>
            </div>
            @if(Auth::check())
          <span class="android-mobile-title mdl-layout-title">

              <span class="devicons devicons-opensource"></span>
          </span>
            <button class="android-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="more-button">
                <i class="material-icons">more_vert</i>
            </button>
            <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
             {{--   <li class="mdl-menu__item"><a class="mdl-navigation__link" href="">参与维护</a></li>
                <li class="mdl-menu__item"><a class="mdl-navigation__link" href="">捐赠说明</a></li>
                <li class="mdl-menu__item"><a class="mdl-navigation__link" href="">服务条款</a></li>--}}
                <li class="mdl-menu__item">
                    <a class="mdl-navigation__link" href="/logout">退出登录</a>
                </li>
            </ul>
                @endif
        </div>
    </div>

    <div class="android-drawer mdl-layout__drawer">
        <span class="mdl-layout-title">
            <span class="devicons devicons-opensource"></span>
        </span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="/repo">浏览项目</a>
            <a class="mdl-navigation__link" href="/members">社区成员</a>
            <a class="mdl-navigation__link" href="/donations">捐赠公开</a>
            <a class="mdl-navigation__link" href="/privacy">捐赠说明</a>
            <a class="mdl-navigation__link" href="/involve">参与维护</a>
        </nav>
    </div>

    <div class="android-content mdl-layout__content">
        <a name="top"></a>

        @yield('content')


        <footer class="android-footer mdl-mega-footer">
            <div class="mdl-mega-footer--top-section">
                <div class="mdl-mega-footer--right-section">
                    <a class="mdl-typography--font-light" href="#top">
                        回到顶部
                        <i class="material-icons">expand_less</i>
                    </a>
                </div>
            </div>

            <div class="mdl-mega-footer--middle-section">
                <p class="mdl-typography--font-light">© Donatoos Foundation</p>
                <p class="mdl-typography--font-light">May you donate gratefully, never taking more than you give.</p>
            </div>


        </footer>
    </div>
</div>
@if(Auth::guest())
<a href="/oauth/github" id="view-source" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
    <svg viewBox="0 0 128 128" style="height: 24px;">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M64 5.103c-33.347 0-60.388 27.035-60.388 60.388 0 26.682 17.303 49.317 41.297 57.303 3.017.56 4.125-1.31 4.125-2.905 0-1.44-.056-6.197-.082-11.243-16.8 3.653-20.345-7.125-20.345-7.125-2.747-6.98-6.705-8.836-6.705-8.836-5.48-3.748.413-3.67.413-3.67 6.063.425 9.257 6.223 9.257 6.223 5.386 9.23 14.127 6.562 17.573 5.02.542-3.903 2.107-6.568 3.834-8.076-13.413-1.525-27.514-6.704-27.514-29.843 0-6.593 2.36-11.98 6.223-16.21-.628-1.52-2.695-7.662.584-15.98 0 0 5.07-1.623 16.61 6.19C53.7 35 58.867 34.327 64 34.304c5.13.023 10.3.694 15.127 2.033 11.526-7.813 16.59-6.19 16.59-6.19 3.287 8.317 1.22 14.46.593 15.98 3.872 4.23 6.215 9.617 6.215 16.21 0 23.194-14.127 28.3-27.574 29.796 2.167 1.874 4.097 5.55 4.097 11.183 0 8.08-.07 14.583-.07 16.572 0 1.607 1.088 3.49 4.148 2.897 23.98-7.994 41.263-30.622 41.263-57.294C124.388 32.14 97.35 5.104 64 5.104z"></path><path d="M26.484 91.806c-.133.3-.605.39-1.035.185-.44-.196-.685-.605-.543-.906.13-.31.603-.395 1.04-.188.44.197.69.61.537.91zm-.743-.55M28.93 94.535c-.287.267-.85.143-1.232-.28-.396-.42-.47-.983-.177-1.254.298-.266.844-.14 1.24.28.394.426.472.984.17 1.255zm-.575-.618M31.312 98.012c-.37.258-.976.017-1.35-.52-.37-.538-.37-1.183.01-1.44.373-.258.97-.025 1.35.507.368.545.368 1.19-.01 1.452zm0 0M34.573 101.373c-.33.365-1.036.267-1.552-.23-.527-.487-.674-1.18-.343-1.544.336-.366 1.045-.264 1.564.23.527.486.686 1.18.333 1.543zm0 0M39.073 103.324c-.147.473-.825.688-1.51.486-.683-.207-1.13-.76-.99-1.238.14-.477.823-.7 1.512-.485.683.206 1.13.756.988 1.237zm0 0M44.016 103.685c.017.498-.563.91-1.28.92-.723.017-1.308-.387-1.315-.877 0-.503.568-.91 1.29-.924.717-.013 1.306.387 1.306.88zm0 0M48.614 102.903c.086.485-.413.984-1.126 1.117-.7.13-1.35-.172-1.44-.653-.086-.498.422-.997 1.122-1.126.714-.123 1.354.17 1.444.663zm0 0"></path>
    </svg>
    <span class="login">登录</span>
</a>
 @endif
<!-- Place this tag in your head or just before your close body tag. -->
@if(Session::has('donate_success'))
    <script>
        (function(){
            swal({
                title: "{{ Session::get('donate_success') }}",
                text:"Every Cents Counts",
                type:"success",
                timer:4000
            });
        })();
    </script>
@endif

@if(Session::has('donate_failed'))
    <script>
        (function(){
            swal({
                title: "{{ Session::get('donate_failed') }}",
                text:"哪里出错了，请联系Jelly 497853157",
                type:"error"
            });
        })();
    </script>
@endif

</body>
</body>
</html>
