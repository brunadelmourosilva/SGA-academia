
<!doctype html>
<html lang="en">
    <head>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript">
            jQuery(function ($) {
                //MÁSCARA PARA OS CAMPOS CPF
                $("#field-cnpj").mask("99.999.999/9999-99");
                $("#field-cpf").mask("999.999.999-99");
                $("#field-telefone").mask("(99)99999-9999");
                $("#field-telFixo").mask("(99)9999-9999");
                $("#field-cep").mask("99.999-999");
            });
        </script>           
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Jekyll v3.8.5">
        <title>M-D Academia</title>
        
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/jquery.maskedinput.min.js"></script

        <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/dashboard/">

        <?php foreach ($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach; ?>    

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url('bootstrap/css/bootstrap.min.css" rel="stylesheet"'); ?>">


        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                    .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>
        <!-- Custom styles for this template -->
        <link href="<?php echo base_url('bootstrap/css/dashboard.css'); ?>" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#" align="center"><img src="<?= base_url('imagens/logo.png'); ?>" width="125" heigth="71"/></a>
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="<?php echo base_url('index.php'); ?>"><b>SAIR</b></a>
                </li>
            </ul>
        </nav>
<br><br><br>
                <div class="container-fluid">
            <div class="row">
                <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <br><br><br>
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="<?php echo base_url('index.php/Cliente'); ?>">
                                    <span data-feather="home"></span>
                                    <b>Menu Principal</b> <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('index.php/Objetivo'); ?>">
                                    <span data-feather="shopping-cart"></span>
                                    Objetivos
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('index.php/Planos'); ?>">
                                    <span data-feather="users"></span>
                                    Planos
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('index.php/Categoria'); ?>">
                                    <span data-feather="users"></span>
                                    Categorias
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('index.php/Exercicio'); ?>">
                                    <span data-feather="users"></span>
                                    Exercícios
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('index.php/Cliente'); ?>">
                                    <span data-feather="file"></span>
                                    Clientes
                                </a>
                            </li>
                            
                            
                            
                                                       
                        </ul>
                    </div>
                </nav>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <div class="">
                         <p><?php echo $output; ?><br></p>
                    </div>
                </main>
            </div>
        </div>
     
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="dashboard.js"></script>
        <?php foreach ($js_files as $file): ?>
            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>   
    </body>
</html>
