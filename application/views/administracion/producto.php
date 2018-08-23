<!-- BUTTON EXPORT -->
<script src="<?php echo $assets_uri; ?>script/plugins/dataTables.buttons.min.js"></script>  
<script src="<?php echo $assets_uri; ?>script/plugins/buttons.flash.min.js"></script>  
<script src="<?php echo $assets_uri; ?>script/plugins/jszip.min.js"></script>  
<script src="<?php echo $assets_uri; ?>script/plugins/pdfmake.min.js"></script>  
<script src="<?php echo $assets_uri; ?>script/plugins/vfs_fonts.js"></script>  
<script src="<?php echo $assets_uri; ?>script/plugins/buttons.html5.min.js"></script>  
<script src="<?php echo $assets_uri; ?>script/plugins/buttons.print.min.js"></script>  
<!-- END BUTTON EXPORT -->
<script src="<?php echo $assets_uri; ?>script/administracion/producto.js"></script>  

<div class="title">
    <div class="row">
        <div class="form-inline left">
            <div class="form-group title-row">
                <label class="control-label color-label-search" for="btn_actualizar">
                    <button id="btn_actualizar" onclick="filtrar_datos()" class="btn btn-info button-nav-bar-title" title="Actualizar"><i class="ion-android-refresh size-20"></i></button>
                </label>

                <label class="control-label" for="cmb_tipoproducto_B">&nbsp;&nbsp;Tipo
                    <select id="cmb_tipoproducto_B" onchange="filtrar_datos()" class="input-sm"><!--jquery--></select>
                </label>

                <label class="control-label" for="cmb_categoria_B">&nbsp;&nbsp;Categoría
                    <select id="cmb_categoria_B" onchange="cargar_subcategoria_cmb_B(); filtrar_datos();" class="input-sm"><!--jquery--></select>
                </label>
                    
                <label class="control-label" for="cmb_subcategoria_B">&nbsp;&nbsp;Subcategoría
                    <select id="cmb_subcategoria_B" onchange="filtrar_datos()" class="input-sm"><!--jquery--></select>
                </label>
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

<!-- MODAL PRODUCTO -->
<div id="modal_producto_editar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">                
                <h5 class="modal-title" id="lbl_producto_editar">
                    Crear Producto
                </h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body ">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="cmb_tipoproducto_UID">Tipo producto</label>
                            <select id="cmb_tipoproducto_UID" class="form-control"><!--jquery--></select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_codigo_pos_UID">Código POS</label>
                            <input id="txt_codigo_pos_UID" class="form-control" type="text" maxlength="20" placeholder="Código de tienda"/>
                        </div>
                    </div>
                </div>
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
                        <div class="form-group">
                            <label class="control-label" for="cmb_categoria_UID">Categoría</label>
                            <select id="cmb_categoria_UID" class="form-control" onchange="cargar_subcategoria_cmb_UID()"><!--jquery--></select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="cmb_subcategoria_UID">Subcategoría</label>
                            <select id="cmb_subcategoria_UID" class="form-control"><!--jquery--></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_precio_UID">Precio $</label>
                            <input id="txt_precio_UID" class="form-control" type="text" maxlength="10" placeholder="0.00"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_precio_esp_UID">Precio especial $</label>
                            <input id="txt_precio_esp_UID" class="form-control" type="text" maxlength="10" placeholder="0.00"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div style="height: 10px;"></div>
                        <div class="form-group">
                            <label class="control-label">Activo</label>&nbsp;&nbsp;&nbsp;
                            <label class="radio-inline"><input type="radio" name="opt_activo_UID" id="opt_activo_UID" value="S" checked>Si</label>&nbsp;
                            <label class="radio-inline"><input type="radio" name="opt_activo_UID" id="opt_inactivo_UID" value="N">No</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="btn-group" role="group" onclick="validar_producto_UID()">
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