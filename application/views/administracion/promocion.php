<link rel="stylesheet" href="<?php echo $assets_uri;?>css/plugins/bootstrap-datepicker.css" />
<script src="<?php echo $assets_uri; ?>script/plugins/bootstrap-datepicker.js"></script> 
<!-- BUTTON EXPORT -->
<!--<link rel="stylesheet" href="<?php echo $assets_uri;?>css/plugins/buttons.dataTables.min.css">-->
<script src="<?php echo $assets_uri; ?>script/plugins/dataTables.buttons.min.js"></script>  
<script src="<?php echo $assets_uri; ?>script/plugins/buttons.flash.min.js"></script>  
<script src="<?php echo $assets_uri; ?>script/plugins/jszip.min.js"></script>  
<script src="<?php echo $assets_uri; ?>script/plugins/pdfmake.min.js"></script>  
<script src="<?php echo $assets_uri; ?>script/plugins/vfs_fonts.js"></script>  
<script src="<?php echo $assets_uri; ?>script/plugins/buttons.html5.min.js"></script>  
<script src="<?php echo $assets_uri; ?>script/plugins/buttons.print.min.js"></script>  
<!-- END BUTTON EXPORT -->
<script src="<?php echo $assets_uri; ?>script/administracion/promocion.js"></script>  

<div class="title">
    <div class="row">
        <div class="form-inline left">
            <div class="form-group title-row">
                <label class="control-label color-label-search" for="btn_actualizar">
                    <button id="btn_actualizar" onclick="filtrar_datos()" class="btn btn-info button-nav-bar-title" title="Actualizar"><i class="ion-android-refresh size-20"></i></button>
                </label>&nbsp;&nbsp;&nbsp;&nbsp;

                <label class="radio-inline opt_estado_B"><input type="radio" name="opt_estado_B" id="opt_estado_todos_B" value="T" onchange="filtrar_datos()" checked>Todas</label>
                <label class="radio-inline opt_estado_B"><input type="radio" name="opt_estado_B" id="opt_estado_activa_B" value="S" onchange="filtrar_datos()">Activas</label>
                <label class="radio-inline opt_estado_B"><input type="radio" name="opt_estado_B" id="opt_estado_inactiva_B" value="N" onchange="filtrar_datos()">Inactivas</label>
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

<!-- MODAL PROMOCION -->
<div id="modal_promocion_editar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">                
                <h5 class="modal-title" id="lbl_promocion_editar">
                    Crear Promoción
                </h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body ">
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_nombre_es_UID">Nombre ES</label>
                            <input id="txt_nombre_es_UID" class="form-control" type="text" maxlength="50" placeholder="Nombre Español"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_nombre_en_UID">Nombre EN</label>
                            <input id="txt_nombre_en_UID" class="form-control" type="text" maxlength="50" placeholder="Nombre Ingles"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_descripcion_es_UID">Descripción ES</label>
                            <textarea id="txt_descripcion_es_UID" class="form-control" maxlength="150" rows="4" style="resize:none;" placeholder="Descripción Español">
                            </textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_descripcion_en_UID">Descripción EN</label>
                            <textarea id="txt_descripcion_en_UID" class="form-control" maxlength="150" rows="4" style="resize:none;" placeholder="Descripción Ingles">
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group" id="div_fecha_ini_UID">
                            <label class="control-label" for="txt_fecha_ini_UID">Fecha Inicio</label>
                            <input id="txt_fecha_ini_UID" class="form-control" type="text" maxlength="10" placeholder="DD-MM-YYYY"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_fecha_fin_UID">Fecha Fin</label>
                            <input id="txt_fecha_fin_UID" class="form-control" type="text" maxlength="10" placeholder="DD-MM-YYYY"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_porc_descuento_UID">% Descuento</label>
                            <input id="txt_porc_descuento_UID" class="form-control" type="text" maxlength="6" placeholder="X.XX"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="height: 10px;"></div>
                        <div class="form-group">
                            <label class="control-label">Activa</label>&nbsp;&nbsp;&nbsp;
                            <label class="radio-inline"><input type="radio" name="opt_activa_UID" id="opt_activa_UID" value="S" checked>Si</label>&nbsp;
                            <label class="radio-inline"><input type="radio" name="opt_activa_UID" id="opt_inactiva_UID" value="N">No</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <label class="control-label" style="font-weight: bold;">Productos</label>
                            <button type="button" class="circle-button add-product" onclick="modal_agregar_producto()" title="Asociar Productos"><i class="zmdi zmdi-plus zmdi-hc-2x"></i></button>
                        </center>
                    </div>
                </div>
                <div class="row">
                    <div class="div-height-10"></div>
                    <div class="col-md-12">
                        <center>
                            <div class="table-responsive font-size-11-table">
                                <table class="table table-condensed table-hover table-bordered" id="table_deta_promo">
                                    <thead>
                                        <tr class="font-size-11-table-bold">
                                            <th class="th-table">Producto</th>
                                            <th class="th-table">Nombre</th>
                                            <th class="th-table">Precio $</th>
                                            <th class="th-table class-del">Remover</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table_deta_promo_"></tbody>
                                </table>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="btn-group class-save-promo" role="group" onclick="validar_promocion_UID()">
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

<!-- MODAL AGREGAR PRODUCTOS A LA PROMO -->
<div id="modal_promo_producto_B" class="modal fade">
    <div class="modal-dialog modal-lg" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Produtos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <input id="txt_busqueda_producto_B" class="form-control" type="text" placeholder="Código o Nombre" maxlength="50"/>

                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button" onclick="filtrar_productos()"><i class="zmdi zmdi-search zmdi-hc-lg"></i></button>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row div-height-10"></div>

                <!-- MODAL AGREGAR PRODUCTOS A LA PROMO -->
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <center>
                            <div class="table-responsive font-size-11-table">
                                <table class="table table-condensed table-hover table-bordered" id="table_deta_promo_producto">
                                    <thead>
                                        <tr class="font-size-12-table-bold">
                                            <th class="th-table"><center><input type="checkbox" id="ckb_productos_all" name="ckb_productos_all" onclick="checked_productos_all(1, this)"></center></th>
                                            <th class="th-table">Producto</th>
                                            <th class="th-table">Nombre</th>
                                            <th class="th-table" title="Precio con IVA">Precio $</th>                                   
                                        </tr>
                                    </thead>
                                    <tbody id="table_deta_promo_producto_"></tbody>
                                </table>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="btn-group" role="group" onclick="agregar_producto()">
                    <button type="button" class="btn btn-success active"><i class="ion-plus-circled"></i></button>
                    <button type="button" class="btn btn-success">Agregar</button>
                </div>
                <div class="btn-group" role="group" data-dismiss="modal">
                    <button type="button" class="btn btn-danger active" ><i class="ion-android-cancel"></i></button>
                    <button type="button" class="btn btn-danger">Salir</button>
                </div>
            </div>
        </div>
    </div>
</div>