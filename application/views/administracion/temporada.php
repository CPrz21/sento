<link rel="stylesheet" href="<?php echo $assets_uri;?>css/plugins/bootstrap-datepicker.css" />
<script src="<?php echo $assets_uri; ?>script/plugins/bootstrap-datepicker.js"></script> 
<script src="<?php echo $assets_uri; ?>script/administracion/temporada.js"></script>  

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

<!-- MODAL TEMPORADA  -->
<div id="modal_temporada_editar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">                
                <h4 class="modal-title" id="lbl_temporada_editar">
                    Crear Temporada
                </h4>
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
                            <textarea id="txt_descripcion_es_UID" class="form-control" maxlength="100" rows="4" style="resize:none;" placeholder="Descripción Español">
                            </textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_descripcion_en_UID">Descripción EN</label>
                            <textarea id="txt_descripcion_en_UID" class="form-control" maxlength="100" rows="4" style="resize:none;" placeholder="Descripción Ingles">
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
                    <div class="col-md-12">
                        <div class="form-group">

                            <label class="control-label" for="txt_imagen_UID">Imagen</label>

                            <div class="row">
                                <div class="col-md-10">
                                    <div class="input-group">
                                        <input type="text" id="txt_img_temporada_UID" class="form-control" placeholder="imagen.png" readonly>
                                        <input type="hidden" id="txt_img_temporada_UID_S" class="form-control" readonly>
                                        <input type="hidden" id="txt_img_temporada_editada_UID" class="form-control" readonly> <!-- evaluar si se ocupa -->

                                        <span class="input-group-btn">
                                            <div class="row" id="div_form_temporada" style="display: none;">
                                                <form class="img-uploader" action="#" method="post" enctype="multipart/form-data" id="form_uploader_img_temporada">
                                                    <input type="file" class="btn-upload" name="myfile" id="upload_img_temporada" onchange="preview_imagen_upload(this)">
                                                    <!-- <input type="file" class="btn-upload" name="myfile" id="upload_img_temporada" onchange="uploadAndPreview('img_temporada')"> -->
                                                </form>
                                            </div>

                                            <button class="btn btn-default" type="button" title="Buscar imagen" onclick="$('#upload_img_temporada').trigger('click')"><i class="zmdi zmdi-search-in-file zmdi-hc-lg"></i></button>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <button type="button" class="rectangular-button" title="Ver imagen cargada" onclick="$('#upload_img_temporada').trigger('onchange')">Ver Imagen</button>
                                    <!-- <button type="button" class="rectangular-button" title="Ver imagen cargada" onclick="cargar_imagen_div()"  >Ver Imagen</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
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
                            <label class="control-label" style="font-weight: bold;">Paquetes</label>
                            <button type="button" class="circle-button add-temporada" onclick="modal_agregar_paquete()" title="Asociar Paquetes"><i class="zmdi zmdi-plus zmdi-hc-2x"></i></button>
                        </center>
                    </div>
                </div>
                <div class="row">
                    <div class="div-height-10"></div>

                    <div class="col-12">
                        <center>
                            <div class="container-fluid">
                                <div class="row">
                                    <div id="JD_PaqueteTempo_div" class="datatable-center">
                                        <table id="JD_PaqueteTempo" style="height:50vh;" class="table table-striped table-bordered nowrap" cellspacing="0">
                                            <thead id="JD_PaqueteTempo_head"></thead>
                                            <tbody id="JD_PaqueteTempo_body" style="text-align:center"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </center>
                    </div> 
                </div>
            </div>
            <div class="modal-footer">
                <div class="btn-group class-save-temporada" role="group" onclick="validar_temporada_UID()">
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

<!-- MODAL VER IMAGEN -->
<div id="modal_imagen" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false" >
    <div class="modal-dialog">
        <div class="modal-content">            
            <div class="modal-body ">
                <center>                    
                    <img alt="imagen_temporada.jpg" id="preview_img_temporada_UID" title="Imagen de temporada" class="preview-img">
                </center>                  
            </div>
            <div class="modal-footer">
                <label class="control class-save-img">*Si existe una imagen con el mismo nombre será sustituida. ¿Desea continuar?</label>
               
                <div class="btn-group class-save-img" role="group" onclick="uploadAndPreview('img_temporada')">
                    <button type="button" class="btn btn-primary active"><i class="ion-ios-checkmark"></i></button>
                    <button type="button" class="btn btn-primary">Cargar</button>
                </div>
                <div class="btn-group" role="group" data-dismiss="modal"  onclick="limpiar_file()">
                    <button type="button" class="btn btn-danger active" ><i class="ion-android-cancel"></i></button>
                    <button type="button" class="btn btn-danger">Salir</button>
                </div>
            </div>
        </div>
    </div>
</div>







<!-- MODAL AGREGAR PAQUETES A LA TEMPORADA -->
<div id="modal_add_paquete" class="modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Paquete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cargar_paquete_temporada()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        <div class="input-group">
                            <label class="control-label" for="cmb_categoria_paq_B">&nbsp;&nbsp;Categoría
                                <select id="cmb_categoria_paq_B" onchange="filtrar_paquetes()" class="input-sm"><!--jquery--></select>
                            </label>&nbsp;&nbsp;
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="input-group">
                            <input id="txt_busqueda_paq_B" class="form-control" type="text" placeholder="Código o Nombre" maxlength="50"/>
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button" onclick="filtrar_paquetes()"><i class="zmdi zmdi-search zmdi-hc-lg"></i></button>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row div-height-10"></div>
               
                <div class="row">
                    <div class="col-12">
                        <center>
                            <div class="container-fluid">
                                <div class="row">
                                    <div id="JD_PaqueteAdd_div" class="datatable-center">
                                        <table id="JD_PaqueteAdd" style="height:50vh;" class="table table-striped table-bordered nowrap" cellspacing="0">
                                            <thead id="JD_PaqueteAdd_head"></thead>
                                            <tbody id="JD_PaqueteAdd_body" style="text-align:center"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </center>
                    </div>     
                </div>
            </div>
            <div class="modal-footer">
                <div class="btn-group" role="group" onclick="confirmar_agregar_paquetes()">
                    <button type="button" class="btn btn-success active"><i class="ion-plus-circled"></i></button>
                    <button type="button" class="btn btn-success">Agregar</button>
                </div>
                <div class="btn-group" role="group" data-dismiss="modal" onclick="cargar_paquete_temporada()">
                    <button type="button" class="btn btn-danger active" ><i class="ion-android-cancel"></i></button>
                    <button type="button" class="btn btn-danger">Salir</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL DE CONFIRMACION PARA AGREGAR O ELIMINAR PAQUETES -->
<div id="modal_confirma_paquete" class="modal fade">
    <div class="modal-dialog  modal-sm" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lbl_title_confir">Agregar paquetes</h5>
                <button type="button" class="close" data-dismiss="modal"  aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="overflow:auto;">
                <div class="row">
                    <center>
                        <label class="control-label" id="idtexto_confir">Agregara los paquetes a la temporada, este proceso no se puede revertir ¿Desea continuar?</label>
                    </center>                    
                </div>
            </div>
            <div class="modal-footer">
                <div class="btn-group" role="group" onclick="agregar_paquetes()" id="btn_paquete_add_remove">
                    <button type="button" class="btn btn-success active"><i class="ion-plus-circled"></i></button>
                    <button type="button" class="btn btn-success">Si</button>
                </div>
                <div class="btn-group" role="group" data-dismiss="modal">
                    <button type="button" class="btn btn-danger active" ><i class="ion-android-cancel"></i></button>
                    <button type="button" class="btn btn-danger">No</button>
                </div>
            </div>
        </div>
    </div>
</div>