<link rel="stylesheet" href="<?php echo $assets_uri;?>css/plugins/bootstrap-datepicker.css" />
<script src="<?php echo $assets_uri; ?>script/plugins/bootstrap-datepicker.js"></script> 
<script src="<?php echo $assets_uri; ?>script/administracion/paquete.js"></script>  

<div class="title">
    <div class="row">
        <div class="form-inline left">
            <div class="form-group title-row">
                <label class="control-label color-label-search" for="btn_actualizar">
                    <button id="btn_actualizar" onclick="filtrar_datos()" class="btn btn-info button-nav-bar-title" title="Actualizar"><i class="ion-android-refresh size-20"></i></button>
                </label>&nbsp;&nbsp;&nbsp;&nbsp;

                <label class="radio-inline opt_estado_B"><input type="radio" name="opt_estado_B" id="opt_estado_todos_B" value="T" onchange="filtrar_datos()" checked>Todas</label>
                <label class="radio-inline opt_estado_B"><input type="radio" name="opt_estado_B" id="opt_estado_activo_B" value="S" onchange="filtrar_datos()">Activos</label>
                <label class="radio-inline opt_estado_B"><input type="radio" name="opt_estado_B" id="opt_estado_inactivo_B" value="N" onchange="filtrar_datos()">Inactivos</label>

                <label class="control-label" for="cmb_categoria_B">&nbsp;&nbsp;Categoría
                    <select id="cmb_categoria_B" onchange="filtrar_datos()" class="input-sm"><!--jquery--></select>
                </label>&nbsp;&nbsp;
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

<!-- MODAL PAQUETE -->
<div id="modal_paquete_editar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog  modal-lg modal-xl-80">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="lbl_paquete_editar">
                    Crear Paquete
                </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>                
            </div>
            <div class="modal-body ">
            	<div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_nombre_es_UID">Nombre ES</label>
                            <input id="txt_nombre_es_UID" class="form-control" type="text" maxlength="50" placeholder="Nombre Español" readonly/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_nombre_en_UID">Nombre EN</label>
                            <input id="txt_nombre_en_UID" class="form-control" type="text" maxlength="50" placeholder="Nombre Ingles" readonly/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_descripcion_es_UID">Descripción ES</label>
                            <textarea id="txt_descripcion_es_UID" class="form-control" maxlength="100" rows="3" style="resize:vertical;" placeholder="Descripción Español">
                            </textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_descripcion_en_UID">Descripción EN</label>
                            <textarea id="txt_descripcion_en_UID" class="form-control" maxlength="100" rows="3" style="resize:vertical;" placeholder="Descripción Ingles">
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group" id="div_fecha_inivta">
                            <label class="control-label" for="txt_fechainivta_UID">Inicio de venta</label>
                            <input id="txt_fechainivta_UID" class="form-control" type="text" maxlength="10" placeholder="DD-MM-YYYY"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_fechafinvta_UID">Fin de venta</label>
                            <input id="txt_fechafinvta_UID" class="form-control" type="text" maxlength="10" placeholder="DD-MM-YYYY"/>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_tipo_vence_canje_UID">Tipo vence canje</label>
                            <input id="txt_tipo_vence_canje_UID" class="form-control" type="text" maxlength="20" placeholder="Días o Fijo" readonly/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_tipovence_dias">
                            <label class="control-label" for="txt_dias_vigencia_canje_UID">Dias de canje</label>
                            <input id="txt_dias_vigencia_canje_UID" type="number" class="form-control" placeholder="###" maxlength="3" max="365"  min="1" readonly/>
                        </div>
                        <div class="form-group" id="div_tipovence_fijo">
                            <label class="control-label" for="txt_fecha_vence_canje_UID">Fecha Fin canje</label>
                            <input id="txt_fecha_vence_canje_UID" class="form-control" type="text" maxlength="10" placeholder="DD-MM-YYYY"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="cmb_categoria_UID">Categoría</label>
                            <select id="cmb_categoria_UID" class="form-control"><!--jquery--></select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_precio_UID">Precio $</label>
                            <input id="txt_precio_UID" class="form-control" type="text" maxlength="7" placeholder="X.XX" readonly/>
                        </div>
                    </div>
                </div>                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_cant_max_UID">Maximo de venta</label>
                            <input id="txt_cant_max_UID" class="form-control" type="number" maxlength="3" min="1" max="999" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="height: 10px;"></div>
                        <div class="form-group">
                            <label class="control-label">Activo</label>&nbsp;&nbsp;&nbsp;
                            <label class="radio-inline"><input type="radio" name="opt_activo_UID" id="opt_activo_UID" value="S" checked>Si</label>&nbsp;
                            <label class="radio-inline"><input type="radio" name="opt_activo_UID" id="opt_inactivo_UID" value="N">No</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <label class="control-label" style="font-weight: bold;">Detalle de paquete</label>
                        </center>
                    </div>
                </div>
                <div class="row">
                    <div class="div-height-10"></div>
                    <div class="col-md-12">
                        <center>
                            <div class="table-responsive font-size-11-table">
                                <table class="table table-condensed table-hover table-bordered" id="table_deta_paquete">
                                    <thead>
                                        <tr class="font-size-11-table-bold">
                                            <th class="th-table">#</th>
                                            <th class="th-table">Descripción</th>
                                            <th class="th-table">Tipo</th>
                                            <th class="th-table">Precio esp.</th>
                                            <th class="th-table class-del">Ver</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table_deta_paquete_"></tbody>
                                </table>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="btn-group class-save-paquete" role="group" onclick="validar_paquete_UID()">
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







<!-- MODAL PAQUETE DETA -->
<div id="modal_paquete_deta_UID" class="modal fade">
    <div class="modal-dialog modal-lg" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lbl_modal_deta_UID">Detalle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_descripcion_es_deta_UID">Descripción ES</label>
                            <input id="txt_descripcion_es_deta_UID" type="text" class="form-control" placeholder="descripción Español" maxlength="50" readonly/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_descripcion_en_deta_UID">Descripción EN</label>
                            <input id="txt_descripcion_en_deta_UID" type="text" class="form-control" placeholder="descripción Ingles" maxlength="50" readonly/>
                        </div>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-6 col-sm-6">
                        <div class="form-group">
                        <label class="control-label" for="txt_tipo_deta_UID">Tipo</label>
                            <input id="txt_tipo_deta_UID" type="text" class="form-control" placeholder="Opcional o Fijo" maxlength="20" readonly/>
                        </div>
                    </div>
                                       
                    <div class="col-6 col-sm-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_precio_deta_UID">Precio Especial</label>
                            <input id="txt_precio_deta_UID" type="text" class="form-control" placeholder="0.00" maxlength="7" readonly/>
                        </div>
                    </div>                    
                </div>
                
                <div class="row div-height-10"></div>

                <div class="row">
                    <div class="col-12 col-sm-12">
                        <center>
                            <div class="table-responsive font-size-12-table">
                                <table class="table table-condensed table-hover table-bordered" id="table_deta_paquete_producto">
                                    <thead>
                                        <tr class="font-size-12-table-bold">
                                            <th class="th-table">#</th>
                                            <th class="th-table">Producto</th>
                                            <th class="th-table">Descripción</th>
                                            <th class="th-table" title="Precio estandar de condición">Precio regular</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table_deta_paquete_producto_"></tbody>
                                </table>
                            </div>
                        </center>
                    </div>
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

