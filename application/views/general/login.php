<!DOCTYPE html>
<html lang="en">
<head>
    <title>CMS - Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link href="<?php echo $assets_uri; ?>css/plugins/bootstrap.css" rel="stylesheet" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo $assets_uri; ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo $assets_uri; ?>css/Login/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo $assets_uri; ?>css/Login/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $assets_uri; ?>css/Login/main.css">
    <!--===============================================================================================-->

</head>
<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="<?php echo $assets_uri; ?>Images/general/login_img.png" alt="IMG LOGIN">
                </div>

                <form class="login100-form validate-form" action="<?php echo base_url(); ?>UserController/sigin" method="post" autocomplete="off">
                    <span class="login100-form-title">
                        Login CMS
                    </span>

                    <div class="wrap-input100 validate-input" data-validate = "Ingrese usuario">
                        <input class="input100" type="text" name="user" id="user" placeholder="Usuario">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Ingrese una contraseña">
                        <input class="input100" type="password" name="pwrd" id="pwrd" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" title="Iniciar Sesión">
                            Ingresar
                        </button>
                    </div>

                    <div class="text-center p-t-12"></div>

                    <div class="text-center p-t-136"></div>
                </form>
            </div>
        </div>
    </div>    
    
    <footer>
        SENTO &copy; <?php echo gmdate("Y"); ?>
    </footer> 

    <!--===============================================================================================-->  
    <script src="<?php echo $assets_uri; ?>script/plugins/jquery-3.3.1.min.js"></script>
    <!--===============================================================================================-->        
     <script src="<?php echo $assets_uri; ?>script/plugins/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo $assets_uri; ?>script/Login/tilt.jquery.min.js"></script>
    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="<?php echo $assets_uri; ?>script/Login/main.js"></script>   

</body>
</html>
