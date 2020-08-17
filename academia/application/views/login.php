<link href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

    <head>
        <title>NAPNE - Campus Inconfidentes</title>
        <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>">
        <script src="<?= base_url('bootstrap/css/jquery.min.js') ?>"></script>
        <link rel="stylesheet" href="<?= base_url('bootstrap/css/login.css') ?>">
    </head>

<!--Coded with love by Mutiullah Samim-->
<body>
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="<?= base_url('bootstrap/imagens/logo.png') ?>" class="brand_logo" alt="Logo">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form action="<?= site_url('/Login/entrar') ?>" method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input id="user" type="text" name="user" class="form-control input_user" value="" placeholder="email">
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control input_pass" value="" placeholder="senha">
                        </div>
                        <div class="input-group">
                            <input type="submit" value="Entrar >>" class="btn login_btn">
                        </div>
                        <!-- <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                                        <label class="custom-control-label" for="customControlInline">Remember me</label>
                                </div>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
