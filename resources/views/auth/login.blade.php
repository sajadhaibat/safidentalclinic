<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - SDC</title>

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="{{asset('favicon.png')}}" type="image/x-icon">
    <link href="{{asset('assets/login.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/login.scss')}}" rel="stylesheet" type="text/css"/>
</head>
<body>

<div class="cont">
    <div class="demo">
        <div class="login">
            <div class="login__check">

            </div>
            <div class="login__form">
                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                <div class="login__row">
                    <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                        <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                    </svg>
                    <input type="text" class="login__input name {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Username" id="email" name="email" value="{{ old('email') }}" required/>

                </div>
                <div class="login__row">
                    <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
                        <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
                    </svg>
                    <input type="password" class="login__input {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required/>

                </div>
                    <br>
                    <div>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong style="font-size: 15px">{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong style="font-size: 15px">{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                <button type="submit" class="login__submit">Sign in</button>
                </form>
            </div>
        </div>

    </div>
</div>

</body>
<script>
    $(document).ready(function() {

        var animating = false,
            submitPhase1 = 1100,
            submitPhase2 = 400,
            logoutPhase1 = 800,
            $login = $(".login"),
            $app = $(".app");

        function ripple(elem, e) {
            $(".ripple").remove();
            var elTop = elem.offset().top,
                elLeft = elem.offset().left,
                x = e.pageX - elLeft,
                y = e.pageY - elTop;
            var $ripple = $("<div class='ripple'></div>");
            $ripple.css({top: y, left: x});
            elem.append($ripple);
        };

        $(document).on("click", ".login__submit", function(e) {
            if (animating) return;
            animating = true;
            var that = this;
            ripple($(that), e);
            $(that).addClass("processing");
            setTimeout(function() {
                $(that).addClass("success");
                setTimeout(function() {
                    $app.show();
                    $app.css("top");
                    $app.addClass("active");
                }, submitPhase2 - 70);
                setTimeout(function() {
                    $login.hide();
                    $login.addClass("inactive");
                    animating = false;
                    $(that).removeClass("success processing");
                }, submitPhase2);
            }, submitPhase1);
        });

        $(document).on("click", ".app__logout", function(e) {
            if (animating) return;
            $(".ripple").remove();
            animating = true;
            var that = this;
            $(that).addClass("clicked");
            setTimeout(function() {
                $app.removeClass("active");
                $login.show();
                $login.css("top");
                $login.removeClass("inactive");
            }, logoutPhase1 - 120);
            setTimeout(function() {
                $app.hide();
                animating = false;
                $(that).removeClass("clicked");
            }, logoutPhase1);
        });

    });
</script>
</html>
