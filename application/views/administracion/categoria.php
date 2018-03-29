<script src="<?php echo $assets_uri; ?>script/administracion/categoria.js"></script>  

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

<!-- BARRA INFERIOR -->
<div class="navbar navbar-default navbar-fixed-bottom" style="z-index:200; min-height:30px !important; max-height:40px !important;">
    <div class="div-navbar-bottom" align="right">
        <p class="navbar-text pull-right" style="color: #000; margin-top: 5px !important;">
            <label class="radio-inline opt_estado_B"><input type="radio" name="opt_estado_B" id="opt_estado_todos_B" value="T" onchange="filtrar_datos()" checked>Todas</label>
            <label class="radio-inline opt_estado_B"><input type="radio" name="opt_estado_B" id="opt_estado_activa_B" value="S" onchange="filtrar_datos()">Activas</label>
            <label class="radio-inline opt_estado_B"><input type="radio" name="opt_estado_B" id="opt_estado_inactiva_B" value="N" onchange="filtrar_datos()">Inactivas</label>
        </p>

        <p class="navbar-text pull-right" style="color: #000; margin-top: 0px !important;">
            <select id="cmb_categoria_B" onchange="filtrar_datos()" class="input-sm"><!--jquery--></select>
        </p>

        <p class="navbar-text pull-right" style="color: #000; margin-top: 0px !important;">
            <select id="cmb_tipo_B" onchange="cambiar_tipo(); filtrar_datos();" class="input-sm"><!--jquery--></select>
        </p>

        <p class="navbar-text pull-right" style="color: #000; margin-top: 2px !important;">
            <button id="btn_actualizar" onclick="filtrar_datos()" class="btn btn-info button-nav-bar-botton" title="Actualizar">Recargar</button>
        </p>
    </div>
</div>
<div class="navbar navbar-default navbar-fixed-bottom" style="z-index:200; min-height:30px !important; max-height:40px !important; max-width: 30%;">
    <div class="div-navbar-bottom" align="left">
        <p class="navbar-text pull-right" style="color: #000; margin-top: 2px !important;">
            <button id="btn_crear_categoria" onclick="abrir_modal_subcategoria(1, 0)" class="btn btn-info button-nav-bar-botton" title="Crear nueva subcategoría">
                <i class="zmdi zmdi-plus"></i> Nuevo
            </button>
        </p>
    </div>
</div>


<!-- MODAL CATEGORIA -->
<div id="modal_categoria_editar" class="modal fade" role="dialog">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    <label id="lbl_categoria_editar">Editar Categoría</label>
                </h4>
            </div>
            <div class="modal-body ">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_nombre_c_es_UID">Nombre ES</label>
                            <input id="txt_nombre_c_es_UID" class="form-control" type="text" maxlength="45" required="true" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_nombre_c_en_UID">Nombre EN</label>
                            <input id="txt_nombre_c_en_UID" class="form-control" type="text" maxlength="45" required="true"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_descripcion_c_es_UID">Descripción ES</label>
                            <textarea id="txt_descripcion_c_es_UID" class="form-control" maxlength="100" rows="4" style="resize:none;" required="true">
                            </textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_descripcion_c_en_UID">Descripción EN</label>
                            <textarea id="txt_descripcion_c_en_UID" class="form-control" maxlength="100" rows="4" style="resize:none;" required="true">
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="validar_categoria_UID()">Aceptar</button>&nbsp;
                <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>&nbsp;
            </div>
        </div>
    </div>
</div>


<!-- MODAL SUBCATEGORIA -->
<div id="modal_subcategoria_editar" class="modal fade" role="dialog">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    <label id="lbl_subcategoria_editar">Crear Subcategoría</label>
                </h4>
            </div>
            <div class="modal-body ">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_nombre_s_es_UID">Nombre ES</label>
                            <input id="txt_nombre_s_es_UID" class="form-control" type="text" maxlength="45" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_nombre_s_en_UID">Nombre EN</label>
                            <input id="txt_nombre_s_en_UID" class="form-control" type="text" maxlength="45" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_descripcion_s_es_UID">Descripción ES</label>
                            <textarea id="txt_descripcion_s_es_UID" class="form-control" maxlength="100" rows="4" style="resize:none;">
                            </textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_descripcion_s_en_UID">Descripción EN</label>
                            <textarea id="txt_descripcion_s_en_UID" class="form-control" maxlength="100" rows="4" style="resize:none;">
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="cmb_categoria_s_UID">Categoría</label>
                            <select id="cmb_categoria_s_UID" class="form-control"><!--jquery--></select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Activa</label>&nbsp;&nbsp;&nbsp;
                            <label class="radio-inline"><input type="radio" name="opt_activa_s_UID" id="opt_activa_s_UID" value="S" checked>Si</label>&nbsp;
                            <label class="radio-inline"><input type="radio" name="opt_activa_s_UID" id="opt_inactiva_s_UID" value="N">No</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="validar_subcategoria_UID()">Aceptar</button>&nbsp;
                <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>&nbsp;
            </div>
        </div>
    </div>
</div>