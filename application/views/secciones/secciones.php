<script src="<?php echo $assets_uri; ?>script/secciones/secciones.js"></script>  

<div class="title">
    <div class="row">
        <div class="form-inline left">
            <div class="form-group title-row">
                <label class="control-label color-label-search" for="btn_actualizar">
                    <button id="btn_actualizar" onclick="filtrar_datos()" class="btn btn-info button-nav-bar-title" title="Actualizar"><i class="ion-android-refresh size-20"></i></button>
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


<!-- MODAL SECCIONES 1,2,4,6 (TIPO 1) -->
<div id="modal_seccion_editar1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lbl_modal_seccion1">Editar Sección</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_nombre_sec_es_UID1">Nombre sección ES</label>
                            <input id="txt_nombre_sec_es_UID1" class="form-control" placeholder="Nombre sección español" maxlength="40" type="text"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_nombre_sec_en_UID1">Nombre sección EN</label>
                            <input id="txt_nombre_sec_en_UID1" class="form-control" placeholder="Nombre sección ingles" maxlength="40" type="text" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_titulo_es_UID1">Título ES</label>
                            <input id="txt_titulo_es_UID1" class="form-control" placeholder="Título de sección español" maxlength="60" type="text"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_titulo_en_UID1">Título EN</label>
                            <input id="txt_titulo_en_UID1" class="form-control" placeholder="Título de sección ingles" maxlength="60" type="text" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_texto_es_UID1">Texto ES</label>
                            <textarea id="txt_texto_es_UID1" class="form-control" maxlength="1000" rows="5" style="resize:vertical;" placeholder="Texto Español"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_texto_en_UID1">Texto EN</label>
                            <textarea id="txt_texto_en_UID1" class="form-control" maxlength="1000" rows="5" style="resize:vertical;" placeholder="Texto Ingles"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">Fondo de pantalla</label>
                            <div class="row">
                                <div class="col-10 col-sm-10">
                                    <div class="input-group">
                                        <input type="text" id="txt_img_seccion_UID1" class="form-control" placeholder="imagen.jpg" readonly>

                                        <span class="input-group-btn">
                                            <div class="row" id="div_form_seccion1" style="display: none;">
                                                <form class="img-uploader" action="#" method="post" enctype="multipart/form-data" id="form_uploader_img_seccion1">
                                                    <input type="file" class="btn-upload" name="myfile1" id="upload_img_seccion1" onchange="preview_imagen_upload1(this)">
                                                </form>
                                            </div>

                                            <button class="btn btn-default" type="button" title="Buscar imagen" onclick="$('#upload_img_seccion1').trigger('click')"><i class="zmdi zmdi-search-in-file zmdi-hc-lg"></i></button>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-2 col-sm-2">
                                    <button type="button" class="rectangular-button" title="Ver imagen cargada" onclick="$('#upload_img_seccion1').trigger('onchange')">Ver Imagen</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">                
                <div class="btn-group" role="group" onclick="validar_seccion_UID1()">
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

<!-- MODAL VER IMAGEN SECCIONES 1,2,4,6 (TIPO 1) -->
<div id="modal_imagen1" class="modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false" >
    <div class="modal-dialog">
        <div class="modal-content">            
            <div class="modal-body ">
                <center>                    
                    <img alt="imagen_seccion.jpg" id="preview_img_seccion_UID1" title="Preview de imagen" class="preview-img">
                </center>                  
            </div>
            <div class="modal-footer">
                <label class="control-label class-save-img">*Si existe una imagen con el mismo nombre será sustituida. ¿Desea continuar?</label>
               
                <div class="btn-group class-save-img" role="group" onclick="Upload_Save_Img1('img_seccion')">
                    <button type="button" class="btn btn-primary active"><i class="ion-ios-checkmark"></i></button>
                    <button type="button" class="btn btn-primary">Cargar</button>
                </div>
                <div class="btn-group" role="group" data-dismiss="modal"  onclick="limpiar_file1()">
                    <button type="button" class="btn btn-danger active" ><i class="ion-android-cancel"></i></button>
                    <button type="button" class="btn btn-danger">Salir</button>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- MODAL SECCIONES 8 (TIPO 2) -->
<div id="modal_seccion_editar2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lbl_modal_seccion2">Editar Sección</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6 col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_nombre_sec_es_UID2">Nombre sección ES</label>
                            <input id="txt_nombre_sec_es_UID2" class="form-control" placeholder="Nombre sección español" maxlength="40" type="text"/>
                        </div>
                    </div>
                    <div class="col-6 col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_nombre_sec_en_UID2">Nombre sección EN</label>
                            <input id="txt_nombre_sec_en_UID2" class="form-control" placeholder="Nombre sección ingles" maxlength="40" type="text" />
                        </div>
                    </div>
                </div>
                <!-- GIFT CARD --> <!-- txt_texto"X"_es"Y"_UID2   X=numero de texto Y=seccion -->  
                <div style="border:none; margin-top:5px;">
                    <div class="header-show-hide header-div-show-hide cursor-pointer" onclick="show_hide_div_2(0)"><center>Opción 1</center></div>
                    <div style="padding:5px;" id="div0_UID2">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="txt_texto1_es1_UID2">Título ES</label>
                                    <input id="txt_texto1_es1_UID2" class="form-control" placeholder="Título de GiftCard español" maxlength="60" type="text"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="txt_texto1_en1_UID2">Título EN</label>
                                    <input id="txt_texto1_en1_UID2" class="form-control" placeholder="Título de GiftCard ingles" maxlength="60" type="text" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="txt_texto1_es2_UID2">Texto2 ES</label>
                                    <textarea id="txt_texto1_es2_UID2" class="form-control" maxlength="500" rows="4" style="resize:vertical;" placeholder="Texto Español"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="txt_texto1_en2_UID2">Texto2 EN</label>
                                    <textarea id="txt_texto1_en2_UID2" class="form-control" maxlength="500" rows="4" style="resize:vertical;" placeholder="Texto Ingles"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="txt_texto1_es3_UID2">Título detalle ES</label>
                                    <input id="txt_texto1_es3_UID2" class="form-control" placeholder="Texto Español" maxlength="60" type="text"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="txt_texto1_en3_UID2">Título detalle EN</label>
                                    <input id="txt_texto1_en3_UID2" class="form-control" placeholder="Texto Español" maxlength="60" type="text"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" title="Términos y condiciones abreviados">
                                    <label class="control-label" for="txt_texto1_es4_UID2">Términos y condiciones corto ES</label>
                                    <textarea id="txt_texto1_es4_UID2" class="form-control" maxlength="1000" rows="5" style="resize:vertical;" placeholder="Texto Español"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" title="Términos y condiciones abreviados">
                                    <label class="control-label" for="txt_texto1_en4_UID2">Términos y condiciones corto EN</label>
                                    <textarea id="txt_texto1_en4_UID2" class="form-control" maxlength="1000" rows="5" style="resize:vertical;" placeholder="Texto Ingles"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="txt_texto1_es5_UID2">Términos y condiciones ES</label>
                                    <textarea id="txt_texto1_es5_UID2" class="form-control" maxlength="1000" rows="5" style="resize:vertical;" placeholder="Texto Español"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="txt_texto1_en5_UID2">Términos y condiciones EN</label>
                                    <textarea id="txt_texto1_en5_UID2" class="form-control" maxlength="1000" rows="5" style="resize:vertical;" placeholder="Texto Ingles"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Fondo de pantalla</label>
                                    <div class="row">
                                        <div class="col-10 col-md-10">
                                            <div class="input-group">
                                                <input type="text" id="txt_img_seccion1_UID2" class="form-control" placeholder="imagen.png" readonly>

                                                <span class="input-group-btn">
                                                    <div class="row" id="div_form1_seccion2" style="display: none;">
                                                        <form class="img-uploader" action="#" method="post" enctype="multipart/form-data" id="form_uploader_img1_seccion2">
                                                            <input type="file" class="btn-upload" name="myfile1" id="upload_img1_seccion2" onchange="preview_imagen_upload2(1, this)">
                                                        </form>
                                                    </div>

                                                    <button class="btn btn-default" type="button" title="Buscar imagen" onclick="$('#upload_img1_seccion2').trigger('click')"><i class="zmdi zmdi-search-in-file zmdi-hc-lg"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-2 col-md-2">
                                            <button type="button" class="rectangular-button" title="Ver imagen cargada" onclick="$('#upload_img1_seccion2').trigger('onchange')">Ver Imagen</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CERTIFICADOS -->
                <div style="border:none; margin-top:5px;">
                    <div class="header-show-hide header-div-show-hide cursor-pointer" onclick="show_hide_div_2(1)"><center>Opción 2</center></div>
                    <div style="padding:5px;" id="div1_UID2">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="txt_texto2_es1_UID2">Título ES</label>
                                    <input id="txt_texto2_es1_UID2" class="form-control" placeholder="Título de GiftCard español" maxlength="60" type="text"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="txt_texto2_en1_UID2">Título EN</label>
                                    <input id="txt_texto2_en1_UID2" class="form-control" placeholder="Título de GiftCard ingles" maxlength="60" type="text" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="txt_texto2_es2_UID2">Texto2 ES</label>
                                    <textarea id="txt_texto2_es2_UID2" class="form-control" maxlength="500" rows="4" style="resize:vertical;" placeholder="Texto Español"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="txt_texto2_en2_UID2">Texto2 EN</label>
                                    <textarea id="txt_texto2_en2_UID2" class="form-control" maxlength="500" rows="4" style="resize:vertical;" placeholder="Texto Ingles"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="txt_texto2_es3_UID2">Título detalle ES</label>
                                    <input id="txt_texto2_es3_UID2" class="form-control" placeholder="Texto Español" maxlength="60" type="text"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="txt_texto2_en3_UID2">Título detalle EN</label>
                                    <input id="txt_texto2_en3_UID2" class="form-control" placeholder="Texto Español" maxlength="60" type="text"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" title="Términos y condiciones abreviados">
                                    <label class="control-label" for="txt_texto2_es4_UID2">Términos y condiciones corto ES</label>
                                    <textarea id="txt_texto2_es4_UID2" class="form-control" maxlength="1000" rows="5" style="resize:vertical;" placeholder="Texto Español"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" title="Términos y condiciones abreviados">
                                    <label class="control-label" for="txt_texto2_en4_UID2">Términos y condiciones corto EN</label>
                                    <textarea id="txt_texto2_en4_UID2" class="form-control" maxlength="1000" rows="5" style="resize:vertical;" placeholder="Texto Ingles"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="txt_texto2_es5_UID2">Términos y condiciones ES</label>
                                    <textarea id="txt_texto2_es5_UID2" class="form-control" maxlength="1000" rows="5" style="resize:vertical;" placeholder="Texto Español"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="txt_texto2_en5_UID2">Términos y condiciones EN</label>
                                    <textarea id="txt_texto2_en5_UID2" class="form-control" maxlength="1000" rows="5" style="resize:vertical;" placeholder="Texto Ingles"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="txt_fondo_seccion2_UID2">Fondo de pantalla</label>
                                    <div class="row">
                                        <div class="col-10 col-md-10">
                                            <div class="input-group">
                                                <input type="text" id="txt_img_seccion2_UID2" class="form-control" placeholder="imagen.png" readonly>

                                                <span class="input-group-btn">
                                                    <div class="row" id="div_form_seccion2" style="display: none;">
                                                        <form class="img-uploader" action="#" method="post" enctype="multipart/form-data" id="form_uploader_img2_seccion2">
                                                            <input type="file" class="btn-upload" name="myfile1" id="upload_img2_seccion2" onchange="preview_imagen_upload2(2, this)">
                                                        </form>
                                                    </div>

                                                    <button class="btn btn-default" type="button" title="Buscar imagen" onclick="$('#upload_img2_seccion2').trigger('click')"><i class="zmdi zmdi-search-in-file zmdi-hc-lg"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-2 col-md-2">
                                            <button type="button" class="rectangular-button" title="Ver imagen cargada" onclick="$('#upload_img2_seccion2').trigger('onchange')">Ver Imagen</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- BLACKPASS -->
                <div style="border:none; margin-top:5px;">
                    <div class="header-show-hide header-div-show-hide cursor-pointer" onclick="show_hide_div_2(2)"><center>Opción 3</center></div>
                    <div style="padding:5px;" id="div2_UID2">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="txt_texto3_es1_UID2">Título ES</label>
                                    <input id="txt_texto3_es1_UID2" class="form-control" placeholder="Título de GiftCard español" maxlength="60" type="text"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="txt_texto3_en1_UID2">Título EN</label>
                                    <input id="txt_texto3_en1_UID2" class="form-control" placeholder="Título de GiftCard ingles" maxlength="60" type="text" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="txt_texto3_es2_UID2">Texto2 ES</label>
                                    <textarea id="txt_texto3_es2_UID2" class="form-control" maxlength="500" rows="4" style="resize:vertical;" placeholder="Texto Español"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="txt_texto3_en2_UID2">Texto2 EN</label>
                                    <textarea id="txt_texto3_en2_UID2" class="form-control" maxlength="500" rows="4" style="resize:vertical;" placeholder="Texto Ingles"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="txt_texto3_es3_UID2">Título detalle ES</label>
                                    <input id="txt_texto3_es3_UID2" class="form-control" placeholder="Texto Español" maxlength="60" type="text"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="txt_texto3_en3_UID2">Título detalle EN</label>
                                    <input id="txt_texto3_en3_UID2" class="form-control" placeholder="Texto Español" maxlength="60" type="text"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" title="Términos y condiciones abreviados"> 
                                    <label class="control-label" for="txt_texto3_es4_UID2">Términos y condiciones corto ES</label>
                                    <textarea id="txt_texto3_es4_UID2" class="form-control" maxlength="1000" rows="5" style="resize:vertical;" placeholder="Texto Español"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" title="Términos y condiciones abreviados">
                                    <label class="control-label" for="txt_texto3_en4_UID2">Términos y condiciones corto EN</label>
                                    <textarea id="txt_texto3_en4_UID2" class="form-control" maxlength="1000" rows="5" style="resize:vertical;" placeholder="Texto Ingles"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="txt_texto3_es5_UID2">Términos y condiciones ES</label>
                                    <textarea id="txt_texto3_es5_UID2" class="form-control" maxlength="1000" rows="5" style="resize:vertical;" placeholder="Texto Español"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="txt_texto3_en5_UID2">Términos y condiciones EN</label>
                                    <textarea id="txt_texto3_en5_UID2" class="form-control" maxlength="1000" rows="5" style="resize:vertical;" placeholder="Texto Ingles"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="txt_fondo_seccion3_UID2">Fondo de pantalla</label>
                                    <div class="row">
                                        <div class="col-10 col-md-10">
                                            <div class="input-group">
                                                <input type="text" id="txt_img_seccion3_UID2" class="form-control" placeholder="imagen.png" readonly>

                                                <span class="input-group-btn">
                                                    <div class="row" id="div_form3_seccion2" style="display: none;">
                                                        <form class="img-uploader" action="#" method="post" enctype="multipart/form-data" id="form_uploader_img3_seccion2">
                                                            <input type="file" class="btn-upload" name="myfile1" id="upload_img3_seccion2" onchange="preview_imagen_upload2(3, this)">
                                                        </form>
                                                    </div>

                                                    <button class="btn btn-default" type="button" title="Buscar imagen" onclick="$('#upload_img3_seccion2').trigger('click')"><i class="zmdi zmdi-search-in-file zmdi-hc-lg"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-2 col-md-2">
                                            <button type="button" class="rectangular-button" title="Ver imagen cargada" onclick="$('#upload_img3_seccion2').trigger('onchange')">Ver Imagen</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">                
                <div class="btn-group" role="group" onclick="validar_seccion_UID2()">
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

<!-- MODAL VER IMAGEN SECCIONES 8 (TIPO 2) -->
<div id="modal_imagen2" class="modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false" >
    <div class="modal-dialog">
        <div class="modal-content">            
            <div class="modal-body ">
                <center>                    
                    <img alt="imagen_seccion.png" id="preview_img_seccion_UID2" title="Preview de imagen" class="preview-img">
                </center>                  
            </div>
            <div class="modal-footer">
                <label class="control class-save-img">*Si existe una imagen con el mismo nombre será sustituida. ¿Desea continuar?</label>
               
                <div class="btn-group class-save-img" role="group" onclick="Upload_Save_Img2('N_opt')" id="btn_uploadimg_2">
                    <button type="button" class="btn btn-primary active"><i class="ion-ios-checkmark"></i></button>
                    <button type="button" class="btn btn-primary">Cargar</button>
                </div>
                <div class="btn-group" role="group" data-dismiss="modal"  onclick="limpiar_file2()">
                    <button type="button" class="btn btn-danger active" ><i class="ion-android-cancel"></i></button>
                    <button type="button" class="btn btn-danger">Salir</button>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- MODAL SECCIONES 9 (TIPO 3) -->
<div id="modal_seccion_editar3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lbl_modal_seccion3">Editar Sección</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_nombre_sec_es_UID3">Nombre sección ES</label>
                            <input id="txt_nombre_sec_es_UID3" class="form-control" placeholder="Nombre sección español" maxlength="40" type="text"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_nombre_sec_en_UID3">Nombre sección EN</label>
                            <input id="txt_nombre_sec_en_UID3" class="form-control" placeholder="Nombre sección ingles" maxlength="40" type="text" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_texto_es1_UID3">Shopping bag ES</label>
                            <textarea id="txt_texto_es1_UID3" class="form-control" maxlength="500" rows="3" style="resize:vertical;" placeholder="Texto Español"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_texto_en1_UID3">Shopping bag EN</label>
                            <textarea id="txt_texto_en1_UID3" class="form-control" maxlength="500" rows="3" style="resize:vertical;" placeholder="Texto Ingles"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_texto_es2_UID3">Slide ES</label>
                            <input id="txt_texto_es2_UID3" class="form-control" placeholder="Texto Español" maxlength="40" type="text"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_texto_en2_UID3">Slide EN</label>
                            <input id="txt_texto_en2_UID3" class="form-control" placeholder="Texto Ingles" maxlength="40" type="text"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">                
                <div class="btn-group" role="group" onclick="validar_seccion_UID3()">
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




<!-- MODAL SECCIONES 10 (TIPO 4) -->
<div id="modal_seccion_editar4" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lbl_modal_seccion4">Editar Sección</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_nombre_sec_es_UID4">Nombre sección ES</label>
                            <input id="txt_nombre_sec_es_UID4" class="form-control" placeholder="Nombre sección español" maxlength="40" type="text"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_nombre_sec_en_UID4">Nombre sección EN</label>
                            <input id="txt_nombre_sec_en_UID4" class="form-control" placeholder="Nombre sección ingles" maxlength="40" type="text" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_texto_es1_UID4">Descripción ES</label>
                            <textarea id="txt_texto_es1_UID4" class="form-control" maxlength="500" rows="3" style="resize:vertical;" placeholder="Texto Español"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_texto_en1_UID4">Descripción EN</label>
                            <textarea id="txt_texto_en1_UID4" class="form-control" maxlength="500" rows="3" style="resize:vertical;" placeholder="Texto Ingles"></textarea>
                        </div>
                    </div>
                </div>
                
                <!-- IMAGENES DE GALERIA -->
                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <label class="control-label" style="font-weight: bold;">Agregar Imagen</label>
                            <button type="button" class="circle-button add-galeria" onclick="abrir_img_galeria(1,0)" title="Agregar a galería"><i class="zmdi zmdi-plus zmdi-hc-2x"></i></button>
                        </center>
                    </div>
                </div>

                <div class="row" style="margin:2px;">
                    <div class="list-box" style="width:100%;">
                        <div class="list" id="list">
                            <ul id="ul_imagenes" class="list-group ui-sortable">
                                <!-- LI ORDENABLE -->
                                <!--
                                <li id="li_gallery_1" class="list-group-item ui-sortable-handle li-sortable" value="1" style="position: relative; left: 0px; top: 0px;">
                                    <div class="d-flex">
                                        <div class="p-2">
                                            <img data-toggle="tooltip" title="preview" class="preview-img-mini" id="img_gallery_1" src="http://localhost:8080/Sento/assets/Images/sections/gallery/img_gallery_45.jpg" onclick="editar_slide(1)">
                                        </div>
                                        <div class="d-flex mr-auto p-2  align-content-center flex-wrap">
                                            <div class="align-self-center">
                                                <label id="lbl_gallery_1" class="control-label">Lugar en español. salon de masaje</label>
                                            </div>
                                        </div>
                                        <div class="p-2 align-content-center li-button-center" style="font-size:25px;">
                                            <div class="align-self-center">
                                                <span class="cursor-pointer" title="Editar"><i class="icon ion-edit"></i></span>
                                            </div>
                                            <div class="align-self-center" style="height:5px;"> </div>
                                            <div class="align-self-center">
                                                <span class="cursor-pointer" title="Remover" onclick="confirmar_delete_gallery('idimagen')"><i class="icon ion-trash-b"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">                
                <div class="btn-group" role="group" onclick="validar_seccion_UID4()">
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

<!-- MODAL IMAGEN GALERIA 10 (TIPO 4) -->
<div id="modal_seccion_galeria4" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lbl_modal_seccion_imagen4">Imagen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_texto_img_es1_UID4">Descripción ES</label>
                            <input id="txt_texto_img_es1_UID4" class="form-control" placeholder="Descripción español" maxlength="50" type="text" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_texto_img_en1_UID4">Descripción EN</label>
                            <input id="txt_texto_img_en1_UID4" class="form-control" placeholder="Descripción ingles" maxlength="50" type="text" />
                        </div>
                    </div>
                </div>                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_texto_img_es2_UID4">Lugar ES</label>
                            <input id="txt_texto_img_es2_UID4" class="form-control" placeholder="Lugar español" maxlength="50" type="text" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_texto_img_en2_UID4">Lugar EN</label>
                            <input id="txt_texto_img_en2_UID4" class="form-control" placeholder="Lugar ingles" maxlength="50" type="text" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <label class="control-label">Fondo de pantalla</label>
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="input-group">
                                        <input type="text" id="txt_img_galeria_UID4" class="form-control" placeholder="imagen.jpg" readonly>

                                        <span class="input-group-btn">
                                            <div class="row" id="div_form1_seccion4" style="display: none;">
                                                <form class="img-uploader" action="#" method="post" enctype="multipart/form-data" id="form_uploader_img_seccion4">
                                                    <input type="file" class="btn-upload" name="myfile1" id="upload_img_seccion4" onchange="preview_imagen_upload4(this)">
                                                </form>
                                            </div>

                                            <button class="btn btn-default" type="button" title="Buscar imagen" onclick="$('#upload_img_seccion4').trigger('click')"><i class="zmdi zmdi-search-in-file zmdi-hc-lg"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row"> 
                    <div class="col-12 col-md-12">
                        <center>
                            <img alt="img_galeria.jpg" id="preview_img_seccion_UID4" title="Preview de imagen" class="preview-img">
                        </center>
                    </div>
                </div>
            </div>
            <div class="modal-footer">                
                <div class="btn-group" role="group" onclick="validar_img_galeria4()">
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


<!-- MODAL VER IMAGEN SECCIONES 10 (TIPO 4) -->
<div id="modal_delete_img_confirma" class="modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Confirmación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>            
            <div class="modal-body">
                <div class="btn-group" role="group" onclick="validar_img_galeria4()">
                    <center>                    
                        <label class="control-label">Confirma que eliminara la imagen seleccionada. ¿Desea continuar?</label>
                    </center>  
                </div>      
            </div>
            <div class="modal-footer">
                <div class="btn-group class-save-img" role="group" onclick="delete_img_gallery()" id="btn_uploadimg_2">
                    <button type="button" class="btn btn-primary active"><i class="ion-ios-checkmark"></i></button>
                    <button type="button" class="btn btn-primary">Si</button>
                </div>
                <div class="btn-group" role="group" data-dismiss="modal">
                    <button type="button" class="btn btn-danger active" ><i class="ion-android-cancel"></i></button>
                    <button type="button" class="btn btn-danger">No</button>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- MODAL SECCIONES 11 (TIPO 5) -->
<div id="modal_seccion_editar5" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lbl_modal_seccion5">Editar Sección</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_nombre_sec_es_UID5">Nombre sección ES</label>
                            <input id="txt_nombre_sec_es_UID5" class="form-control" placeholder="Nombre sección español" maxlength="40" type="text"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_nombre_sec_en_UID5">Nombre sección EN</label>
                            <input id="txt_nombre_sec_en_UID5" class="form-control" placeholder="Nombre sección ingles" maxlength="40" type="text" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_texto_es1_UID5">Dirección ES</label>
                            <textarea id="txt_texto_es1_UID5" class="form-control" maxlength="500" rows="3" style="resize:vertical;" placeholder="Texto Español"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_texto_en1_UID5">Dirección EN</label>
                            <textarea id="txt_texto_en1_UID5" class="form-control" maxlength="500" rows="3" style="resize:vertical;" placeholder="Texto Ingles"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_texto_es2_UID5">Teléfonos ES</label>
                            <textarea id="txt_texto_es2_UID5" class="form-control" maxlength="500" rows="3" style="resize:vertical;" placeholder="Texto Español"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txt_texto_en2_UID5">Teléfonos EN</label>
                            <textarea id="txt_texto_en2_UID5" class="form-control" maxlength="500" rows="3" style="resize:vertical;" placeholder="Texto Ingles"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">                
                <div class="btn-group" role="group" onclick="validar_seccion_UID5()">
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