<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="PARTYBAND">
    <meta name="author" content="PARTYBAND">

    <title>ADM-LOGIN</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">
    <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</head>

<body style="background-image: url('../imgs/admin.jpg'); ">

    <div class="container mt-5">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background-image: url('../imgs/fundo.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center; ">sdsd</div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bem-vindo Administrador</h1>
                                    </div>
                                <form class="user" method="GET" action="{{route('admin.logado')}}" enctype="multipart/form-data">
                                    @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="username" name="username"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" placeholder="Password" name="password">
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Entrar</button>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="forgot-password.html">Esqueceu a senha?</a>
                                        </div>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</body>
<!-- Bootstrap core JavaScript-->
<script src={{asset('vendor/jquery/jquery.min.js')}}></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>

</body>

</html>
