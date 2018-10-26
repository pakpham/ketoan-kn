<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ela Admin - HTML5 Admin Template</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="admin_asset/images/favicon.png">
    <link rel="shortcut icon" href="admin_asset/images/favicon.png"> 

    <link rel="stylesheet" href="admin_asset/assets/css/normalize.css">
    <link rel="stylesheet" href="admin_asset/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin_asset/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin_asset/assets/css/themify-icons.css">
<link rel="stylesheet" href="admin_asset/assets/css/pe-icon-7-filled.css">
    <link rel="stylesheet" href="admin_asset/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin_asset/assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="admin_asset/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="admin_asset/images/logo1.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form method="POST" action="{{route('login')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" class="form-control" placeholder="User Name" name="name">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                            <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label>

                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                        <div class="register-link m-t-15 text-center">
                            <p>Don't have account ? <a href="#"> Sign Up Here</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="admin_asset/assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="admin_asset/assets/js/popper.min.js"></script>
    <script src="admin_asset/assets/js/plugins.js"></script>
    <script src="admin_asset/assets/js/main.js"></script>


</body>
</html>
