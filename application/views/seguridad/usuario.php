<script src="<?php echo $assets_uri; ?>script/seguridad/usuario.js"></script>  

<div class="title">
    <div class="row">
        <div class="form-inline left">
            <div class="form-group title-row">
                <label class="control-label color-label-search" for="btn_actualizar">
                    <button id="btn_actualizar" onclick="filtrar_datos()" class="btn btn-info button-nav-bar-title" title="Actualizar"><i class="ion-android-refresh size-20"></i></button>
                </label>
                    
                <label class="radio-inline opt_estado_B"><input type="radio" name="opt_estado_B" id="opt_estado_todos_B" value="T" onchange="filtrar_datos()" checked>Todos</label>
                <label class="radio-inline opt_estado_B"><input type="radio" name="opt_estado_B" id="opt_estado_activo_B" value="S" onchange="filtrar_datos()">Activos</label>
                <label class="radio-inline opt_estado_B"><input type="radio" name="opt_estado_B" id="opt_estado_inactivo_B" value="N" onchange="filtrar_datos()">Inactivos</label>
            </div>
        </div>
    </div>
</div>

<!-- TABLE -->
<div class="row" style="height:10px;"> </div>
<div class="container-fluid">
    <div class="row">
        <div id="JDTable_div" class="datatable-center">
            <table id="JDTable" style="height:75vh;" class="table table-striped table-bordered nowrap" cellspacing="0">
                <thead id="JDTable_head"></thead>
                <tbody id="JDTable_body" style="text-align:center"></tbody>
            </table>
        </div>        
    </div>
</div>

<!--FAB AREA-->
<div class="fab-area" id="fab_options">
    <!-- JAVASCRIPT -->
</div>

<!-- MODAL USUARIO -->
<div id="modal_usuario_editar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lbl_modal_user">Editar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6 col-sm-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_usuario_UID">Usuario</label>
                            <input id="txt_usuario_UID" class="form-control" type="text" placeholder="Usuario" maxlength="20"/>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_nombre_UID">Nombre</label>
                            <input id="txt_nombre_UID" class="form-control" placeholder="Nombre del usuario" maxlength="40" type="text" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-sm-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_email_UID">Email</label>
                            <input id="txt_email_UID" class="form-control" placeholder="email@sento.com" maxlength="50" type="email"  />
                        </div>
                    </div>
                    <div class="col-6 col-sm-6">
                        <div class="form-group">
                            <label class="control-label" for="cmb_usuario_tipo_UID">Tipo</label>
                            <select id="cmb_usuario_tipo_UID" class="form-control"><!-- JQUERY --></select>
                        </div>
                    </div>
                </div>
                <div class="row">     
                    <div class="col-6 col-sm-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_password_UID">Password</label>
                            <input id="txt_password_UID" class="form-control" placeholder="password del usuario" maxlength="20" type="password" />
                        </div>
                    </div>
                    <div class="col-6 col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Estado</label> <br />
                            <label class="radio-inline"><input type="radio" name="opt_activo_UID" id="opt_activo_UID" value="S" checked>Activo</label>&nbsp;
                            <label class="radio-inline"><input type="radio" name="opt_activo_UID" id="opt_inactivo_UID" value="N">Inactivo</label>
                        </div>
                    </div>  
                </div>
            </div>
            <div class="modal-footer">    
                <div class="btn-group" role="group" onclick="validar_usuario_UID()">
                    <button type="button" class="btn btn-primary active"><i class="ion-ios-checkmark"></i></button>
                    <button type="button" class="btn btn-primary">Aceptar</button>
                </div>
                <div class="btn-group" role="group" data-dismiss="modal">
                    <button type="button" class="btn btn-danger active" ><i class="ion-android-cancel"></i></button>
                    <button type="button" class="btn btn-danger">Salir</button>
                </div>               
            </div>
        </div>
    </div>
</div>

<!-- MODAL MENU USUARIO -->
<div id="modal_menu_usuario_UID" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lbl_modal_menu_usuario">Privilegios de CMS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4 col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="txt_usuario_D">Usuario</label>
                            <input id="txt_usuario_D" class="form-control" type="text" readonly/>
                        </div>
                    </div>
                    <div class="col-8 col-sm-8">
                        <div class="form-group">
                            <label class="control-label" for="txt_nombre_D">Nombre</label>
                            <input id="txt_nombre_D" class="form-control" type="text" readonly />
                        </div>
                    </div>
                </div>

                <div class="row div-height-10"></div>

                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <div class="table-responsive">
                                <table id="table_menu_usuario" class="div-content-table table table-condensed table-hover table-bordered table-table">
                                    <thead>
                                        <tr class="tr-tr">
                                            <th class="th-table" colspan="5">Módulos de Sistema</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table_menu_usuario_" class="tbody-tbody">
                                        <!-- JAVASCRIPT -->
                                    </tbody>
                                </table>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="btn-group" role="group" onclick="open_copy()" title="Copiar privilegios de otro usuario">
                    <button type="button" class="btn btn-link"><i class="ion-ios-copy-outline"></i>&nbsp;&nbsp;Copiar privilegios</button>
                </div> 
                <div class="btn-group" role="group" onclick="guardar_menus_asignados()" title="Los cambios deben ser guardados">
                    <button type="button" class="btn btn-primary active"><i class="ion-ios-checkmark"></i></button>
                    <button type="button" class="btn btn-primary">Aceptar</button>
                </div>
                <div class="btn-group" role="group" data-dismiss="modal">
                    <button type="button" class="btn btn-danger active" ><i class="ion-android-cancel"></i></button>
                    <button type="button" class="btn btn-danger">Salir</button>
                </div>             
            </div>
        </div>
    </div>
</div>

<!-- MODAL COPY PRIVILEGIOS -->
<div id="modal_copy_privilegios_UID" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lbl_copy_title">Copiar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                <div class="col-12">
                    <div class="form-group">
                        <center>
                            <label class="control-label">Seleccione el usuario del cual desea copiar privilegios.</label>  
                        </center>                  
                    </div>
                </div>

                <div class="col-12">
                    <center>
                        <div class="container-fluid">
                            <div class="row">
                                <div id="JD_UserCopyPrivilege_div" class="datatable-center">
                                    <table id="JD_UserCopyPrivilege" style="height:50vh;" class="table table-striped table-bordered nowrap" cellspacing="0">
                                        <thead id="JD_UserCopyPrivilege_head"></thead>
                                        <tbody id="JD_UserCopyPrivilege_body" style="text-align:center"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </center>
                </div>

                <div class="row div-height-10"></div>
            </div>
            <div class="modal-footer">
                <div class="btn-group" role="group" onclick="guardar_menus_asignados()" title="Los cambios deben ser guardados">
                    <button type="button" class="btn btn-primary active"><i class="ion-ios-checkmark"></i></button>
                    <button type="button" class="btn btn-primary">Aceptar</button>
                </div>
                <div class="btn-group" role="group" data-dismiss="modal">
                    <button type="button" class="btn btn-danger active" ><i class="ion-android-cancel"></i></button>
                    <button type="button" class="btn btn-danger">Salir</button>
                </div>             
            </div>
        </div>
    </div>
</div>

<!-- MODAL CONFIRMACION COPY -->
<div id="modal_confirmacion_copy" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">            
            <div class="modal-body ">
                <center>       
                    <label class="control-label" id="lbl_confirmar_msj">Copiar los privilegios del usuario "Actual" al usuario "Nuevo". ¿Desea continuar?</label>      
                </center>                  
            </div>
            <div class="modal-footer">
                <div class="btn-group" role="group" onclick="copy_privilegios_to_user()">
                    <button type="button" class="btn btn-primary active"><i class="ion-ios-checkmark"></i></button>
                    <button type="button" class="btn btn-primary">Copiar</button>
                </div>
                <div class="btn-group" role="group" data-dismiss="modal">
                    <button type="button" class="btn btn-danger active" ><i class="ion-android-cancel"></i></button>
                    <button type="button" class="btn btn-danger">Salir</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL LOG DE ACCESOS POR USUARIO -->
<div id="modal_log_accesos" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">  
            <div class="modal-header">
                <h5 class="modal-title">Log de accesos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>          
            <div class="modal-body ">

                <div class="col-12">
                    <center>       
                        <label class="control-label">Ultimos accesos al sistema</label>      
                    </center>  
                </div> 

                <div class="col-12">
                    <center>
                        <div class="container-fluid">
                            <div class="row">
                                <div id="JD_LogAccesos_div" class="datatable-center">
                                    <table id="JD_LogAccesos" style="height:50vh;" class="table table-striped table-bordered nowrap" cellspacing="0">
                                        <thead id="JD_LogAccesos_head"></thead>
                                        <tbody id="JD_LogAccesos_body" style="text-align:center"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </center>
                </div>            
            </div>
            <div class="modal-footer">
                <div class="btn-group" role="group" data-dismiss="modal">
                    <button type="button" class="btn btn-danger active" ><i class="ion-android-cancel"></i></button>
                    <button type="button" class="btn btn-danger">Salir</button>
                </div>
            </div>
        </div>
    </div>
</div>