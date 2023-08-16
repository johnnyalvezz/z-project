<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/images/favicon.ico">
    <title>𝙏𝙍𝙊𝙋𝘼 𝘿𝘼𝙎 𝙂𝙂 - LOGIN</title>
    <link rel="stylesheet" href="assets/css/vendors_css.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/skin_color.css">
    <style type="text/css">

    /* ===== Scrollbar CSS ===== */
  /* Firefox */
  * {
    scrollbar-width: auto;
    scrollbar-color: #0055ff #000000;
  }

  /* Chrome, Edge, and Safari */
  *::-webkit-scrollbar {
    width: 10px;
  }

  *::-webkit-scrollbar-track {
    background: #000000;
  }

  *::-webkit-scrollbar-thumb {
    background-color: #0055ff;
    border-radius: 10px;
    border: 3px outset #000000;
  }

</style>
</head>
<body class="hold-transition theme-primary dark-skin">
    <div class="h-p100">
        <div class="row align-items-center justify-content-md-center h-p100">
            <div class="col-12">
                <div class="row justify-content-center no-gutters">
                    <div class="col-md-5">
                        <div class="content-top-agile">
                            <h2 class="text-white">𝙏𝙍𝙊𝙋𝘼 𝘿𝘼𝙎 𝙂𝙂</h2>
                        </div>
                        <div class="p-30">
                          <?php
                    if(isset($_SESSION['nao_autenticado'])):
                    ?> <br>
                    <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close align-middle font-16"></i></span></button><strong>Usu��rio ou Senha inv��lidos.</strong></div>

                    <?php
                    endif;
                    unset($_SESSION['nao_autenticado']);
                    ?>

                    <?php
                    if(isset($_SESSION['loginErro'])):
                    ?> <br>
                    <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close align-middle font-16"></i></span></button><strong>Usu��rio Expirado.</strong></div>

                    <?php
                    endif;
                    unset($_SESSION['loginErro']);
                    ?>
                    	
                                        <?php
                    if(isset($_SESSION['ooo'])):
                    ?> <br>
                    <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close align-middle font-16"></i></span></button><strong>Login Pendente.</strong></div>

                    <?php
                    endif;
                    unset($_SESSION['ooo']);
                    ?>
                    	
                                                            <?php
                    if(isset($_SESSION['kkpp'])):
                    ?> <br>
                    <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close align-middle font-16"></i></span></button><strong>Seu pagamento foi aprovado, agora pode logar na central..</strong></div>

                    <?php
                    endif;
                    unset($_SESSION['kkpp']);
                    ?>
                    	
                    
                                                             <?php
                    if(isset($_SESSION['existente'])):
                    ?> <br>
                    <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close align-middle font-16"></i></span></button><strong>Usu��rio ja existe.</strong></div>

                    <?php
                    endif;
                    unset($_SESSION['existente']);
                    ?>
                            <form action="login.php" method="post">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" name="usuario" class="form-control bg-transparent text-white p-3" placeholder="USUÁRIO" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="password" name="senha" class="form-control bg-transparent text-white p-3" placeholder="SENHA" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-info btn-block p-3" style="border-radius: 0.7rem; font-weight: bold;">LOGIN</button>
                                    </div>
                                </div>
                            </form>
                            <div class="text-center">
                                <p class="mt-15 mb-0 text-white">
                                    Nao é cadastrado? <a href="https://t.me/tiopatinhas_171" class="text-info">Contate-nos</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/vendors.min.js"></script>
    <script src="assets/vendors/icons/feather-icons/feather.min.js"></script>
    <script src="assets/vendors/vendor_components/toastr/src/jquery.toast.js"></script>
</body>
</html>