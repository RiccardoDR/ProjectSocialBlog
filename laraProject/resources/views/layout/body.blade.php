<!DOCTYPE html>
<!-- Definisce il layout di base del sito -->
<html>
    <head>
        <title>e-Friend | @yield('title')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <script src="https://kit.fontawesome.com/50b131b9db.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh" crossorigin="anonymous"></script>    
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <!-- header -->
        @include('layout.header')
        @include('auth.register')
        @include('auth.login')
        <!-- body -->
        @if (isset($errore))
            <script>
                $('.popup').addClass('active');
                $('.container').addClass('blur');
                $('.errorLogin2').show();
            </script>
        @endif
        @yield('content')
        <!-- footer -->
        @include('layout.footer')
        <script>
            $('.sign-in').click(function() {
                $('.popup').addClass('active');
                $('.container').addClass('blur');
            })

            $('.sign-up').click(function() {
                $('.popup2').addClass('active');
                $('.container').addClass('blur');
            })

            $('.close-btn').click(function() { 
                $('.popup').removeClass('active');
                $('.container').removeClass('blur');
            });
            
            $('.close-btn2').click(function() { 
                $('.popup2').removeClass('active');
                $('.popup3').removeClass('active');
                $('.popup4').removeClass('active');
                $('#registerForm')[0].reset();
                $('.container').removeClass('blur');
            });

            $('.user-option').click(function() {
                if ($('.option').hasClass('active')) {
                    $('.option').removeClass('active');
                }
                else {
                    $('.option').addClass('active');
                }
            })
        </script>
    </body>
</html>

