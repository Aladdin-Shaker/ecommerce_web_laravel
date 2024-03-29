<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e(trans('admin.login')); ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="<?php echo e(url('/')); ?>/design/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet"
        href="<?php echo e(url('/')); ?>/design/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet"
        href="<?php echo e(url('/')); ?>/design/adminlte/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a
                href="<?php echo e(url('/')); ?>/design/adminlte/index.html"><b>Admin</b>LTE</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="input-group mb-3">
                        <input type="email" name="email"
                            class="form-control" placeholder="Email"
                            value="admin@admin.com">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password"
                            class="form-control" placeholder="Password"
                            value="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" name="rememberme"
                                    value="1" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit"
                                class="btn btn-primary btn-block">Sign
                                In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mb-1">
                    <a href="<?php echo e(aurl('forgot/password')); ?>">I forgot my
                        password</a>
                </p>
                <p class="mb-0">
                    <a href="register.html" class="text-center">Register a
                        new membership</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script
        src="<?php echo e(url('/')); ?>/design/adminlte/plugins/jquery/jquery.min.js">
    </script>
    <!-- Bootstrap 4 -->
    <script
        src="<?php echo e(url('/')); ?>/design/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js">
    </script>
    <!-- AdminLTE App -->
    <script src="<?php echo e(url('/')); ?>/design/adminlte/dist/js/adminlte.min.js">
    </script>

</body>

</html>
<?php /**PATH /home/sniper/Desktop/ecommerc project/Ecommerce/Ecommerce/resources/views/admin/login.blade.php ENDPATH**/ ?>