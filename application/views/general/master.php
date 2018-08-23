<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>CMS - <?php echo $title_page; ?></title>
    
    <link rel="stylesheet" href="<?php echo $assets_uri;?>css/plugins/bootstrap.css" />

    <link rel="stylesheet" href="<?php echo $assets_uri;?>css/ionicons/css/ionicons.css" />

    <link rel="stylesheet" href="<?php echo $assets_uri;?>css/general/Site.css" />
    <link rel="stylesheet" href="<?php echo $assets_uri;?>css/plugins/material-design-iconic-font.min.css" />
    <link rel="stylesheet" href="<?php echo $assets_uri;?>css/plugins/jquery.notice.css" />
    <link rel="stylesheet" href="<?php echo $assets_uri;?>css/plugins/datatables.css" />
    <link rel="stylesheet" href="<?php echo $assets_uri;?>css/plugins/datatables_custom.css" />
    <link rel="stylesheet" href="<?php echo $assets_uri;?>css/general/sidebar-navbar.css">

    <script src="<?php echo $assets_uri; ?>script/plugins/jquery-3.3.1.min.js"></script>  
    <script src="<?php echo $assets_uri; ?>script/plugins/jquery.notice.js"></script>  
    <script src="<?php echo $assets_uri; ?>script/plugins/datatables.js"></script>  
    <script src="<?php echo $assets_uri; ?>script/plugins/jquery-ui.min.js"></script> 
    <script src="<?php echo $assets_uri; ?>script/general/site.js"></script>  
    
    <script> var base_url = '<?php echo base_url(); ?>'; </script>
</head>

<body class="body-class-overflow">
    <div id="wrapper" class="wrapper-sidebar">

        <!-- Sidebar Holder -->
        <nav id="sidebar" class="active">
            <div class="sidebar-header">
                <h3 id="sidebarCollapse">Sento CMS</h3>
                <strong id="sidebarExpanded">CMS</strong>
            </div>

            <!--
            <ul id="ul_sidebar_level1" class="list-unstyled class-level-1 components">
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="glyphicon glyphicon-home"></i>
                        Home
                    </a>
                    <ul class="collapse list-unstyled class-level-2" id="homeSubmenu">
                        <li>
                            <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false">Home 1...</a>
                            <ul class="collapse list-unstyled" id="homeSubmenu1">
                                <li class="class-level-3" ><a href="#">Home 1.1.1</a></li>
                                <li><a href="#">&thinsp;&thinsp;Home 1.1.2</a></li>
                                <li><a href="#">Home 1.1.3</a></li>
                                <li><a href="#">Home 1.1.4</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Home 2</a></li>
                        <li><a href="#">Home 3</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="glyphicon glyphicon-briefcase"></i>
                        About
                    </a>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="glyphicon glyphicon-duplicate"></i>
                        Pages
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li><a href="#">Page 1</a></li>
                        <li><a href="#">Page 2</a></li>
                        <li><a href="#">Page 3</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="glyphicon glyphicon-link"></i>
                        Portfolio
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="glyphicon glyphicon-paperclip"></i>
                        FAQ
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="glyphicon glyphicon-send"></i>
                        Contact
                    </a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li><a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a></li>
                <li><a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a></li>
            </ul>
            -->
        </nav>
        
        <!-- Page Content Holder -->
        <div id="content">
            <div>
                <nav id="nav_header" class="navbar navbar-default">
                    <div class="container-fluid color" >
                        <!--
                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                            </button>
                        </div>
                        -->   
                        <a class="navbar-brand" id="title_option"><?php echo $title_page; ?></a>       

                        <div class="navbar-collapse" id="user_option">
                            <ul class="nav navbar-nav navbar-right nav-title" id="ul_user_option">
                                <li id="li-user">
                                    <a onclick="modal_user()">
                                        <?php echo $this->session->userdata('user'); ?>  
                                        <i class="ion-android-arrow-dropdown"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>           

            <!-- view -->
            <div id="content_body"> 
                <?php $this->load->view($option); ?>  

                <!--
                <div id="div_content_hide">
                    <h2>Collapsible Sidebar Using Bootstrap 3</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <div>
                -->
            </div>
        </div>
    </div>

    <!-- MODAL LOAD o ESPERA -->
    <div id="modal_load" class="modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog h-100 d-flex flex-column justify-content-center my-0" role="document">
            <div  style="background-color: transparent;border: 0;">
                <div class="modal-body" style="text-align:center;">
                    <img src="<?php echo $assets_uri; ?>Images/general/cargando.gif"/>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL CERRAR SESSION  -->
    <div id="modal_logout" class="modal fade " role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">                    
                    <h4 class="modal-title" id="label_user_name_session">
                        <?php echo $this->session->userdata('user_name'); ?>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div style="margin:auto;">
                            <a href="<?php echo base_url(); ?>UserController/Logout" class="btn btn-danger btn-sm pull-right">Cerrar Sesión</a>
                        </div>
                    </div>
                </div>
                <div style="height:10px; clear:both"></div>
            </div>
        </div>
    </div>
   
     <!-- Bootstrap Js CDN -->
     <script src="<?php echo $assets_uri; ?>script/plugins/bootstrap.min.js"></script>       

    <script type="text/javascript">
        $(document).ready(function () {
            //$('#sidebar').toggleClass('active');

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                //$('#JDTable').DataTable().draw();
            });
            $('#sidebarExpanded').on('click', function () {
                $('#sidebar').toggleClass('active');
                //$('#JDTable').DataTable().draw();
            });
            $('#title_option').on('click', function () {
                $('#sidebar').toggleClass('active');
                //$('#JDTable').DataTable().draw();
            });
        });
    </script>

</body>
</html>