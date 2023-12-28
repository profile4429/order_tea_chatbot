<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="{{asset('backend/css/theme.min.css')}}">   --}}



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"
        integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous">
    </script>
    {{-- <link rel="stylesheet" href="{{asset('backend/js/bootstrap.min.js')}}"> --}}
    <script src="https://kit.fontawesome.com/f5b221db9a.js" crossorigin="anonymous"></script>



    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v16.0"
        nonce="LO06RD8M"></script>



</head>

<body>
    <script>!(function () {
        localStorage.removeItem('chat_session')
        let e = document.createElement("script"),
            t = document.head || document.getElementsByTagName("head")[0];
        (e.src =
            "https://cdn.jsdelivr.net/npm/rasa-webchat@1.x.x/lib/index.js"),
            // Replace 1.x.x with the version that you want
            (e.async = !0),
            (e.onload = () => {
                window.WebChat.default(
                    {
                        initPayload: '/greet',
                        customData: { language: "vi" },
                        socketUrl: "http://localhost:5005",
                        title: 'Riri',
                        subtitle: "Say 'hi' để bắt đầu"
                        // add other props here
                    },
                    null
                );
            }),
            t.insertBefore(e, t.firstChild);
    })();
</script>
    <!-- Header-->
    @include('frontend/layout/header')

    <!-- Page Content-->
    @yield('content')
    <!-- Footer-->
    @include('frontend/layout/footer')
    <script>
        function deleteBrand() {
            let brand = $('div');
            brand[brand.length - 1].remove();
        }
    </script>

</body>

</html>

