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

<body>
    <div class="d-flex  justify-content-center align-items-center vh-100">
        <div class="d-flex flex-column justify-content-center align-items-center">

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>403 Error Forbidden</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">403 Error Forbidden</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="error-page">
                    <h2 class="headline text-danger">403</h2>
                    <div class="error-content">
                        <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Something went wrong.</h3>
                        <p>
                            We will work on fixing that right away.
                            Meanwhile, you may <a href="../../index.html">return to dashboard</a> or try using the search form.
                        </p>
                        <form class="search-form">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" name="submit" class="btn btn-danger"><i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </section>

        </div>
    </div>


    <script src="<?= SITE_URL_ADMIN ?>/plugins/jquery/jquery.min.js"></script>

    <script src="<?= SITE_URL_ADMIN ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?= SITE_URL_ADMIN ?>/dist/js/adminlte.min.js?v=3.2.0"></script>
</body>

</html>