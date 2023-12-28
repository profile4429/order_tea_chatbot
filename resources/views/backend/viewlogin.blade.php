<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
</head>

<body>
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-12 col-sm-7 col-md-6 m-auto">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <svg class="mx-auto my-3" xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                            fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                        <form action="{{ route('Login') }}" method="post">
                            @csrf
                            <input type="text" name="username" id="username" class="form-control my-4 py-2"
                                placeholder="Username" />
                            <input type="password" name="password" id="password" class="form-control my-4 py-2"
                                placeholder="Password" />
                            <div class="text-center mt-3">
                                <button class="btn btn-primary btn_login">Login</button>
                                @if (session('false'))
                                        <p>{{ session('false') }}</p>
                                @endif
                                @if (session('ss_username'))
                                <p>{{ session('ss_username') }}</p>
                        @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
