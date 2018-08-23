<script src="<?php echo $assets_uri; ?>script/administracion/categoria.js"></script>  

<div class="title">
    <div class="row">
        <div class="form-inline left">
            <div class="form-group title-row">
                <label class="control-label color-label-search" for="btn_actualizar">
                    <button id="btn_actualizar" onclick="filtrar_datos()" class="btn btn-info button-nav-bar-title" title="Actualizar"><i class="ion-android-refresh size-20"></i></button>
                </label>

                <label class="control-label" for="cmb_tipo_B">&nbsp;&nbsp;Tipo
                    <select id="cmb_tipo_B" onchange="cambiar_tipo(); filtrar_datos();" class="input-sm"><!--jquery--></select>
                </label>

                <label class="control-label cmb_categoria_B" for="cmb_categoria_B">&nbsp;&nbsp;Categoría
                    <select id="cmb_categoria_B" onchange="filtrar_datos()" class="input-sm cmb_categoria_B"><!--jquery--></select>
                </label>&nbsp;&nbsp;
                    
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
    <!--
    <div class="fab-mini-box">
        <a onclick="abrir_modal_subcategoria(1,0)">
            <div class="fab-container">
                <span class="label">Nueva Subcategoría</span>
                <div class="fab-mini">
                    <i class="zmdi zmdi-plus zmdi-hc-2x"></i>
                </div>
            </div>
        </a>  
    </div>
    <div class="fab-normal" id="options">
        <i class="zmdi zmdi-toys zmdi-hc-2x"></i>
    </div> 
    -->
</div>

<!-- MODAL CATEGORIA -->
<div id="modal_categoria_editar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">                
                <h5 class="modal-title" id="lbl_categoria_editar">
                    Detalle Categoría
                </h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body ">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_nombre_c_es_UID">Nombre ES</label>
                            <input id="txt_nombre_c_es_UID" class="form-control" type="text" maxlength="45" required="true" placeholder="Nombre Español" readonly/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_nombre_c_en_UID">Nombre EN</label>
                            <input id="txt_nombre_c_en_UID" class="form-control" type="text" maxlength="45" required="true" placeholder="Nombre Ingles" readonly/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_descripcion_c_es_UID">Descripción ES</label>
                            <textarea id="txt_descripcion_c_es_UID" class="form-control" maxlength="100" rows="4" style="resize:none;" required="true" placeholder="Descripción Español" readonly>
                            </textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_descripcion_c_en_UID">Descripción EN</label>
                            <textarea id="txt_descripcion_c_en_UID" class="form-control" maxlength="100" rows="4" style="resize:none;" required="true" placeholder="Descripción Ingles" readonly>
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!--
                <div class="btn-group" role="group" onclick="validar_categoria_UID()">
                    <button type="button" class="btn btn-primary active"><i class="ion-ios-checkmark"></i></button>
                    <button type="button" class="btn btn-primary">Aceptar</button>
                </div> 
                -->
                <div class="btn-group" role="group" data-dismiss="modal">
                    <button type="button" class="btn btn-danger active" ><i class="ion-android-cancel"></i></button>
                    <button type="button" class="btn btn-danger">Salir</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- MODAL SUBCATEGORIA -->
<div id="modal_subcategoria_editar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lbl_subcategoria_editar">
                    Crear Subcategoría
                </h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>                
            </div>
            <div class="modal-body ">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_codigo_pos_s_UID">Código POS</label>
                            <input id="txt_codigo_pos_s_UID" class="form-control" type="text" maxlength="20" placeholder="Cód. POS" readonly/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="cmb_categoria_s_UID">Categoría</label>
                            <select id="cmb_categoria_s_UID" class="form-control"><!--jquery--></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_nombre_s_es_UID">Nombre ES</label>
                            <input id="txt_nombre_s_es_UID" class="form-control" type="text" maxlength="45" placeholder="Nombre Español"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_nombre_s_en_UID">Nombre EN</label>
                            <input id="txt_nombre_s_en_UID" class="form-control" type="text" maxlength="45" placeholder="Nombre Ingles"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_descripcion_s_es_UID">Descripción ES</label>
                            <textarea id="txt_descripcion_s_es_UID" class="form-control" maxlength="100" rows="4" style="resize:none;" placeholder="Descripción Español">
                            </textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_descripcion_s_en_UID">Descripción EN</label>
                            <textarea id="txt_descripcion_s_en_UID" class="form-control" maxlength="100" rows="4" style="resize:none;" placeholder="Descripción Ingles">
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
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
                <div class="btn-group" role="group" onclick="validar_subcategoria_UID()">
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