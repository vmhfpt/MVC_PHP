<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="<?= SITE_URL_ADMIN ?>/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="<?= SITE_URL_ADMIN ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="<?= SITE_URL_ADMIN ?>/dist/css/adminlte.min.css?v=3.2.0">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Đăng nhập</b>Admin</a>
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="" method="POST">
                    <div class="input-group mb-3">
                        <input value="<?= isset($old_field['email']) ? $old_field['email'] : '' ?>" name="email" type="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <?= isset($errors['email']) ? '<span id="error-name" class="text-danger">' . $errors['email'] . '</span>' : '' ?>
                    <div class="input-group mb-3">
                        <input value="<?= isset($old_field['password']) ? $old_field['password'] : '' ?>" name="password" type="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                    </div>
                    <?= isset($errors['password']) ? '<span id="error-name" class="text-danger">' . $errors['password'] . '</span>' : '' ?>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>

                    </div>
                </form>
                <?=isset($status) ? ' <div class="social-auth-links text-center mb-3">
                    <a href="#" class="btn btn-block btn-danger">
                        '.$status.'
                    </a>
                </div>': '' ?>



            </div>

        </div>
    </div>


    <script src="<?= SITE_URL_ADMIN ?>/plugins/jquery/jquery.min.js"></script>

    <script src="<?= SITE_URL_ADMIN ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?= SITE_URL_ADMIN ?>/dist/js/adminlte.min.js?v=3.2.0"></script>
</body>

</html>