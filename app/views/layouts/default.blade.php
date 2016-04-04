<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="r-icon3.gif" type="image/x-icon"/>
    <title>Roominga</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link href="http://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Exo:900' rel='stylesheet' type='text/css'>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/main.css">
    <script type='text/javascript' src='/css/tipsy/jquery.tipsy.js'></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/tipsy/tipsy.css" type="text/css"/>
    <script>
        $(document).ready(function () {
            $('.carousel-inner').each(function () {
                $(this).children(".item").first().addClass("active");
            });
        });
    </script>
</head>

<body>

@include('layouts.partials.nav')

<div class="container">
    @yield('content')
</div>

<script>
    $(document).ready(function () {
        $('.ccc').each(function () {
            size_li = $(this).children(".comments__comment").size();
            x = 3;
            $(this).children('.comments__comment:lt(' + x + ')').show();
            if (size_li > x) {
                $(this).siblings(".show-more-comment").css('display', 'block');
            }

            $(this).siblings(".show-more-comment").children(".show-more").click(function (evt) {
                evt.preventDefault();
                $(this).parents(".show-more-comment").siblings(".ccc").children('.comments__comment').show();
                $(this).parents(".show-more-comment").css('display', 'none');
            });
        });

    });
</script>

<script>
    $('.comment-create-form').on('keydown', function (e) {
        if (e.keyCode == '13') {
            e.preventDefault();
            $(this).submit();
        }
    });
</script>

<script>
    (function () {
        // Create mobile element
        var mobile = document.createElement('div');
        mobile.className = 'nav-mobile';
        document.querySelector('.nav').appendChild(mobile);
        // hasClass
        function hasClass(elem, className) {
            return new RegExp(' ' + className + ' ').test(' ' + elem.className + ' ');
        }

        // toggleClass
        function toggleClass(elem, className) {
            var newClass = ' ' + elem.className.replace(/[\t\r\n]/g, ' ') + ' ';
            if (hasClass(elem, className)) {
                while (newClass.indexOf(' ' + className + ' ') >= 0) {
                    newClass = newClass.replace(' ' + className + ' ', ' ');
                }
                elem.className = newClass.replace(/^\s+|\s+$/g, '');
            } else {
                elem.className += ' ' + className;
            }
        }

        // Mobile nav function
        var mobileNav = document.querySelector('.nav-mobile');
        var toggle = document.querySelector('.nav-list');
        var navv = document.querySelector('.nav');
        mobileNav.onclick = function () {
            toggleClass(navv, 'nav-mobile-open');
            toggleClass(toggle, 'nav-active');
        };
    })();
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.dropdownn').bind('mouseover', openSubMenu);
        $('.dropdownn').bind('mouseout', closeSubMenu);

        function openSubMenu() {
            $(this).find('ul').css('visibility', 'visible');
        };

        function closeSubMenu() {
            $(this).find('ul').css('visibility', 'hidden');
        };

    });
</script>
<script type='text/javascript'>
    $(function () {
        $('a[rel=tipsy]').tipsy({fade: true, gravity: 'n'});
    });
</script>
<script>
    $('#upload-button').tipsy({fallback: "Upload room photos!"});
    $('#popular').tipsy({fallback: "Will be available soon!"});
    $('.share-button').tipsy({fallback: "Will be available soon!"});
</script>

</body>
</html>