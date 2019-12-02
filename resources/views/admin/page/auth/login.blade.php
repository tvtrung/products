<!DOCTYPE html>
<html lang="vi">
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Admin</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="/style/admin/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="/style/admin/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/style/admin/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="/style/admin/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="/style/admin/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <link href="/style/admin/assets/pages/css/login-4.min.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="favicon.ico" />
    </head>
    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            {{-- <a href="index.html">
                <img src="/style/admin/assets/pages/img/logo-big.png" alt="" /> 
            </a> --}}
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            @if (Session::has('message'))
                <div class="alert alert-danger text-center">
                    {{ Session::get('message') }}
                </div>
            @endif
             @if ($errors->has('email'))
                <div class="alert alert-danger text-center">
                    <strong style="color: red;">{{ $errors->first('email') }}</strong>
                </div>
            @endif
             @if ($errors->has('password'))
               <div class="alert alert-danger text-center">
                    <strong style="color: red;">{{ $errors->first('password') }}</strong>
                </div>
            @endif
           <form method="POST" action="{{ route('admin.postLogin') }}">
                {{ csrf_field() }}
                <h3 class="form-title text-center">Admin</h3>
                <div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control" type="email" placeholder="Email" name="email""/> 
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control" type="password" placeholder="Password" name="password" /> 
                    </div>
                </div>
                <div class="form-actions text-center">
                    <button type="submit" class="btn green"> Đăng nhập </button>
                </div>
            </form>
            <!-- END LOGIN FORM -->
        </div>
        <div class="copyright">2020</div>
        <script src="/style/admin/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="/style/admin/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/style/admin/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="/style/admin/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="/style/admin/assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <script src="/style/admin/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <script src="/style/admin/assets/pages/scripts/login-4.min.js" type="text/javascript"></script>
    </body>

</html>
