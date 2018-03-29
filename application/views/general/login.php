<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <title>.:: SentoCMS - Login ::.</title>

    <link href="<?php echo $assets_uri; ?>css/plugins/reset.css" rel="stylesheet" />
    <link href="<?php echo $assets_uri; ?>css/general/login.css" rel="stylesheet" />
    <script src="<?php echo $assets_uri; ?>script/plugins/jquery-3.3.1.min.js""></script>
</head>
<body contextmenu="false">
    <div class="header">   
    </div>
    <div class="wrapper-login">

        <div id="login-box">
            <div class="avatar"><img src="<?php echo $assets_uri;?>Images/general/Sento.bmp" alt="Sento"/></div>
            <!--<span class="login-error"><?php echo $this->session->userdata('error_login'); ?></span>-->
            <form action="<?php echo base_url(); ?>UserController/sigin" method="post" autocomplete="off">
                <input class="input-first" type="text" name="user" id="user" placeholder="USUARIO" required>
                <input class="input-last" type="password" name="pwrd" id="pwrd" placeholder="CONTRASEÑA" required>
                <input class="button-primary" type="submit" value="INICIAR SESIÓN">
            </form>
        </div>
    </div>
    <footer>
        SENTO &copy;  <?php echo gmdate("Y"); ?>
    </footer>
</body>
</html>
