$(document).ready(function () {
    $("#modal_load").modal("show");
    $("#ul_imagenes").sortable({});
    QFiltro();
    $("#modal_load").modal("hide");
});


//#region GLOBALES
var tipo_B = 1;

var idseccion_UID = 0;
var tipo_gallery_UID = 0; //1 nueva img, 2 editar
var idimagen_UID = 0;
var nombre_img_UID = '';
var obj_gallery = {};
//#endregion GLOBALES

//#region Principal
function QFiltro() {
    tipo_B = 1;
    filtrar_datos();
}

function filtrar_datos() {
    $("#modal_load").modal("show");
    
    var _url = base_url + "AjaxSecciones/getSecciones_ajax/";
    $('#JDTable_div').html('');

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 1,
            idsecciones: 0,
            parametro: ""
        }
    }).done(function (data) {

        if (data.status == "OK") {

            var tbl_ = '<table id="JDTable" class="table table-striped table-bordered nowrap display" cellspacing="0" width="100%">' +
                            '<thead id="JDTable_head" style="text-align:center"></thead>' +
                            '<tfoot id="JDTable_foot" style="text-align:center"></tfoot>' +
                            '<tbody id="JDTable_body" style="text-align:center"></tbody>' +
                        '</table>'

            $('#JDTable_div').append(tbl_);

            $('#JDTable_head').html('');
            $('#JDTable_foot').html('');
            $('#JDTable_body').html('');

            $('#JDTable_head').append(  '<tr>' +
                                        '   <th class="text-center">Sección</th>' +
                                        '   <th class="text-center">Nombre Es</th>' +
                                        '   <th class="text-center">Nombre EN</th>' +
                                        '   <th class="text-center">Url ES</th>' +
                                        '   <th class="text-center">Url EN</th>' +
                                        '   <th class="text-center">Opciones</th>' +
                                        '</tr>');

             $('#JDTable_foot').append(     '<tr>' +
                                            '   <th class="text-center">Sección</th>' +
                                            '   <th class="text-center">Nombre Es</th>' +
                                            '   <th class="text-center">Nombre EN</th>' +
                                            '   <th class="text-center">Url ES</th>' +
                                            '   <th class="text-center">Url EN</th>' +
                                            '   <th class="text-center">Opciones</th>' +
                                            '</tr>');

            $(data.datatable).each(function () {
                var item = '';
                item += '<tr>';
                item += '   <td class="id-value">'+ this.idseccion + '</td>';
                item += '   <td>' + this.nombre_es + '</td>';
                item += '   <td>' + this.nombre_en + '</td>';
                item += '   <td>' + (this.url_es != null ? this.url_es : "-") + '</td>';
                item += '   <td>' + (this.url_en != null ? this.url_en : "-") + '</td>';
                item += '   <td>';
                if (this.editar != 0) {
                item += '       <a title="Editar Sección" onclick="abrir_modal_seccion(\'' + this.tipo_modal + '\',\'' + 2 + '\',\'' + this.idseccion + '\')"><i class="size-13-5 ion-edit"></i></a>&nbsp;';
                }
                else{
                item += '       -';
                }
                item += '   </td>';
                item += "</tr>";

                $('#JDTable_body').append(item);
            });  

            /* FOOT */
            $('#JDTable tfoot th').each(function () {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Filtrar ' + title + '" />');
            });

            var table = $('#JDTable').DataTable();
            table.columns().every(function () {
                var that = this;

                $('input', this.footer()).on('keyup change', function () {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });

            /*=================================================================*/
            /******************DATA TABLE JQUERY CON PAGINADOR******************/
            /*=================================================================*/
            $('#JDTable').DataTable({                          
                "bSort": true,
                "bFilter":true,
                //"scrollX": true,      //para que el foot este en el top deben quitarse estas propiedades.
                //"scrollY": "60vh",
                "scrollCollapse": true,               
                destroy: true
            });
            /*=================================================================*/
            $('input[type="search"]').attr("placeholder", "Búsqueda");
            $(".dataTables_scrollBody").css("max-height", "55vh");
            $("#JDTable_wrapper").css("overflow", "auto");
            $("#JDTable_wrapper").css("max-height", "72vh");
        }
        else if(data.status == "SIN_DATOS"){
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-warn' });
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición al cargar tabla de secciones...");
    });

    $("#modal_load").modal("hide");
}
//#endregion Principal

//#region Secciones all
function abrir_modal_seccion(tipo_modal_, tipo_, idseccion_) {
    $("#modal_load").modal("show");
    limpiar_modal_secciones();
    idseccion_UID = idseccion_;

    
    if (tipo_modal_ == 1) {
        cargar_datos_seccion(tipo_modal_);
        cargar_texto_imagen_seccion1();
        $("#modal_seccion_editar1").modal("show");
    }
    else if (tipo_modal_ == 2) {
        cargar_datos_seccion(tipo_modal_);
        cargar_texto_imagen_seccion2();
        $("#modal_seccion_editar2").modal("show");
    }
    else if (tipo_modal_ == 3) {
        cargar_datos_seccion(tipo_modal_);
        cargar_texto_seccion3();
        $("#modal_seccion_editar3").modal("show");
    }
    else if (tipo_modal_ == 4) {
        obj_gallery = {};
        $("#ul_imagenes").html('');
        cargar_datos_seccion(tipo_modal_);
        cargar_texto_seccion4();
        cargar_imgs_galeria4();
        $("#modal_seccion_editar4").modal("show");
    }
    else if (tipo_modal_ == 5) {
        cargar_datos_seccion(tipo_modal_);
        cargar_texto_seccion5();
        $("#modal_seccion_editar5").modal("show");
    }
    
    $("#modal_load").modal("hide");
}

function limpiar_modal_secciones() {
    idseccion_UID = 0;

    //modal_seccion_editar1
    $("#txt_nombre_sec_es_UID1").val('');
    $("#txt_nombre_sec_en_UID1").val('');
    $("#txt_titulo_es_UID1").val('');
    $("#txt_titulo_en_UID1").val('');
    $("#txt_texto2_es_UID1").val('');
    $("#txt_texto2_en_UID1").val('');

    $("#txt_img_seccion_UID1").val("");
    $("#upload_img_seccion1").val('');
    $("#preview_img_seccion_UID1").removeAttr("src")

    //modal_seccion_editar2
    $("#txt_nombre_sec_es_UID2").val('');
    $("#txt_nombre_sec_en_UID2").val('');
    $("#txt_texto1_es1_UID2").val('');
    $("#txt_texto1_en1_UID2").val('');
    $("#txt_texto1_es2_UID2").val('');
    $("#txt_texto1_en2_UID2").val('');
    $("#txt_texto1_es3_UID2").val('');
    $("#txt_texto1_en3_UID2").val('');
    $("#txt_texto1_es4_UID2").val('');
    $("#txt_texto1_en4_UID2").val('');
    $("#txt_texto1_es5_UID2").val('');
    $("#txt_texto1_en5_UID2").val('');
    $("#txt_texto2_es1_UID2").val('');
    $("#txt_texto2_en1_UID2").val('');
    $("#txt_texto2_es2_UID2").val('');
    $("#txt_texto2_en2_UID2").val('');
    $("#txt_texto2_es3_UID2").val('');
    $("#txt_texto2_en3_UID2").val('');
    $("#txt_texto2_es4_UID2").val('');
    $("#txt_texto2_es5_UID2").val('');
    $("#txt_texto2_en5_UID2").val('');
    $("#txt_texto2_en4_UID2").val('');
    $("#txt_texto3_es1_UID2").val('');
    $("#txt_texto3_en1_UID2").val('');
    $("#txt_texto3_es2_UID2").val('');
    $("#txt_texto3_en2_UID2").val('');
    $("#txt_texto3_es3_UID2").val('');
    $("#txt_texto3_en3_UID2").val('');
    $("#txt_texto3_es4_UID2").val('');
    $("#txt_texto3_en4_UID2").val('');
    $("#txt_texto3_es5_UID2").val('');
    $("#txt_texto3_en5_UID2").val('');

    $("#upload_img1_seccion2").val('');
    $("#upload_img2_seccion2").val('');
    $("#upload_img3_seccion2").val('');
    $("#preview_img_seccion_UID2").removeAttr("src")

    //modal_seccion_editar3
    $("#txt_nombre_sec_es_UID3").val('');
    $("#txt_nombre_sec_en_UID3").val('');
    $("#txt_texto_es1_UID3").val('');
    $("#txt_texto_en1_UID3").val('');
    $("#txt_texto_es2_UID3").val('');
    $("#txt_texto_en2_UID3").val('');

    //modal_seccion_editar4
    $("#txt_nombre_sec_es_UID4").val('');
    $("#txt_nombre_sec_en_UID4").val('');
    $("#txt_texto_es1_UID4").val('');
    $("#txt_texto_en1_UID4").val('');

    //modal_seccion_editar5
    $("#txt_nombre_sec_es_UID5").val('');
    $("#txt_nombre_sec_en_UID5").val('');
    $("#txt_texto_es1_UID5").val('');
    $("#txt_texto_en1_UID5").val('');
    $("#txt_texto_es2_UID5").val('');
    $("#txt_texto_en2_UID5").val('');
}

function cargar_datos_seccion(num){
    var _url = base_url + "AjaxSecciones/getSeccion_ajax/";

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 2,
            idseccion: idseccion_UID
        }
    }).done(function (data) {
        if (data.status == "OK") {
            $("#txt_nombre_sec_es_UID"+ num).val(data.datatable.nombre_es);
            $("#txt_nombre_sec_en_UID"+ num).val(data.datatable.nombre_en);
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición al cargar datos de sección");
    });
}

function guardar_seccion(nombre_sec_es_, nombre_sec_en_){

    var _url = base_url + "AjaxSecciones/setSeccion_ajax/";

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 1,
            idseccion: idseccion_UID,
            nombre_es: nombre_sec_es_,
            nombre_en: nombre_sec_en_
        }
    }).done(function (data) {
        if (data.status == "OK") {

        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición actualizar sección");
    });
}

function guardar_SeccionTexto(orden_, texto_es_, texto_en_){

    var _url = base_url + "AjaxSecciones/setSeccionTexto_ajax/";

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 1,
            idseccion: idseccion_UID,
            orden: orden_,
            texto_es: texto_es_,
            texto_en: texto_en_
        }
    }).done(function (data) {
        if (data.status == "OK") {

        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición actualizar texto de sección");
    });
}

//#endregion Secciones all

//#region Secciones1
function cargar_texto_imagen_seccion1(){
    var _url = base_url + "AjaxSecciones/getSeccionTextos_Imagen_ajax/";

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 1,
            idseccion: idseccion_UID
        }
    }).done(function (data) {

        if (data.status == "OK") {

            $(data.datatable_text).each(function () {
                if (this.orden == 1){
                    $("#txt_titulo_es_UID1").val(this.texto_es);
                    $("#txt_titulo_en_UID1").val(this.texto_en);
                }
                else if (this.orden == 2){
                    $("#txt_texto_es_UID1").val(this.texto_es);
                    $("#txt_texto_en_UID1").val(this.texto_en);
                }
            });  

            $(data.datatable_img).each(function () {
                if (this.orden == 1){
                    $('#txt_img_seccion_UID1').val(this.nombre);
                    $("#preview_img_seccion_UID1").attr("src", base_url + this.url +"?"+Date.now());
                }
            });  
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición al cargar textos e imagenes de sección");
    });
}

function Upload_Save_Img1(option)
{                                                       
    $("#modal_load").modal("show");
    var _form = document.getElementById('form_uploader_' + option + '1');
    var form_data = new FormData(_form);

    var _url = base_url + 'AjaxLoadImg/uploadBackGroud_sections/'+ $("#txt_"+ option + "_UID1").val();
    
    $.ajax({
        url: _url,
        type: 'post',
        data: form_data,
        contentType: false,
        cache: false,
        processData:false,
        dataType: 'json',
        beforeSend: function() 
        {
            //$(_img).attr('src',  'assets/Images/general/cargando.gif');
        }
    }).done(function(data)
    { 
        if(data.status == 'OK')
        {   
            //$("#txt_"+ option + "_UID1").val(NameImg_Background[idseccion_UID]);
            $("#upload_img_seccion1").val('');
            $.noticeAdd({ text: data.msg, stay: false, type: 'notice-info' });
        }
        else {
            $.noticeAdd({ text: data.msg, stay: false, type: 'notice-warn' });
        }

    }).fail(function (jqXHR, textStatus, errorThrown ) {
        alert(errorThrown)
        $.noticeAdd({ text: "Error en petición al cargar imagen", stay: false, type: 'notice-error' });
    });

    $("#modal_imagen1").modal("hide");
    $("#modal_load").modal("hide");
}

function cargar_imagen_div1(){  

    var url_imagen = "";
    var name_image = $("#txt_img_seccion_UID1").val();
    $(".class-save-img").hide();
    $("#preview_img_seccion_UID1").removeAttr("src");

    if ( name_image != "" ) {
        if (existeUrl( url_asset_image_secciones, name_image ) == true) {
            
            $("#preview_img_seccion_UID1").attr("src", base_url + url_asset_image_secciones + name_image +"?"+Date.now());
            $("#modal_imagen1").modal("show");
        }
        else{
            $.noticeAdd({ text: "La imagen no existen en la ruta", stay: false, type: 'notice-error' }); 
        }
    }   
    else{
        $.noticeAdd({ text: "Debe seleccionar una imagen...", stay: false, type: 'notice-error' }); 
    }    
}

function preview_imagen_upload1(input){  
    if ($("#upload_img_seccion1").val() == ''){  
        cargar_imagen_div1();
    }
    else if ($("#upload_img_seccion1").val() != ''){  
        $(".class-save-img").show();
        preview_load_img1(input);
    }
}

function preview_load_img1(input){ 
    if (validFileType(2, input.files[0])) {
        if (input.files && input.files[0]) {
            var reader =  new FileReader();

            reader.onload = function(e){
                $("#preview_img_seccion_UID1").attr("src", e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
            $("#modal_imagen1").modal("show");
        }
    }
    else{
        $("#upload_img_seccion1").val('')
        $.noticeAdd({ text: "La extensión del archivo no es permitida...", stay: false, type: 'notice-error' }); 
    }
}

function limpiar_file1(){
    $("#upload_img_seccion1").val('');
}

function validar_seccion_UID1(){
    var nombre_sec_es = $("#txt_nombre_sec_es_UID1").val().trim();
    var nombre_sec_en = $("#txt_nombre_sec_en_UID1").val().trim();
    var titulo_es = $("#txt_titulo_es_UID1").val().trim();
    var titulo_en = $("#txt_titulo_en_UID1").val().trim();
    var texto_es = $("#txt_texto_es_UID1").val().trim();
    var texto_en = $("#txt_texto_en_UID1").val().trim();

    if (nombre_sec_es == '') {
        $.noticeAdd({ text: "Debe ingresar el nombre de sección en español", stay: false, type: 'notice-warn' });
        $("#txt_nombre_sec_es_UID1").focus();
        return;
    }
    if (nombre_sec_en == '') {
        $.noticeAdd({ text: "Debe ingresar el nombre de sección en ingles", stay: false, type: 'notice-warn' });
        $("#txt_nombre_sec_en_UID1").focus();
        return;
    }
    if (titulo_es == '') {
        $.noticeAdd({ text: "Debe ingresar el título de sección en español", stay: false, type: 'notice-warn' });
        $("#txt_titulo_es_UID1").focus();
        return;
    }
    if (titulo_en == '') {
        $.noticeAdd({ text: "Debe ingresar el título de sección en ingles", stay: false, type: 'notice-warn' });
        $("#txt_titulo_en_UID1").focus();
        return;
    }
    if (texto_es == '') {
        $.noticeAdd({ text: "Debe ingresar el texto de sección en español", stay: false, type: 'notice-warn' });
        $("#txt_texto_es_UID1").focus();
        return;
    }
    if (texto_en == '') {
        $.noticeAdd({ text: "Debe ingresar el texto de sección en ingles", stay: false, type: 'notice-warn' });
        $("#txt_texto_en_UID1").focus();
        return;
    }

    $("#modal_load").modal("show");
    //seccion
    guardar_seccion(nombre_sec_es, nombre_sec_en);
    //texto de seccion
    guardar_SeccionTexto(1, titulo_es, titulo_en);
    guardar_SeccionTexto(2, texto_es, texto_en);
    $("#modal_load").modal("hide");

    filtrar_datos();
    $("#modal_seccion_editar1").modal("hide");
    $.noticeAdd({ text: "Modificación de sección finalizada.", stay: false, type: 'notice-info' });
}

//#endregion Secciones1

//#region Secciones2
var array_show_hide_2 = [0,0,0];

function show_hide_div_2(index){
    
    if (array_show_hide_2[index] == "1"){
        $("#div"+ index +"_UID2").show("slow");
        array_show_hide_2[index] = 0;
    }
    else{
        $("#div"+ index +"_UID2").hide("slow");
        array_show_hide_2[index] = 1;
    }
}

function cargar_texto_imagen_seccion2(){
    var _url = base_url + "AjaxSecciones/getSeccionTextos_Imagen_ajax/";

    array_show_hide_2 = [0,0,0];
    show_hide_div_2(0);
    show_hide_div_2(1);
    show_hide_div_2(2);

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 1,
            idseccion: idseccion_UID
        }
    }).done(function (data) {

        if (data.status == "OK") {

            $(data.datatable_text).each(function () {
                //OPTION 1
                if (this.orden == 1){
                    $("#txt_texto1_es1_UID2").val(this.texto_es);
                    $("#txt_texto1_en1_UID2").val(this.texto_en);
                }
                else if (this.orden == 2){
                    $("#txt_texto1_es2_UID2").val(this.texto_es);
                    $("#txt_texto1_en2_UID2").val(this.texto_en);
                }
                else if (this.orden == 3){
                    $("#txt_texto1_es3_UID2").val(this.texto_es);
                    $("#txt_texto1_en3_UID2").val(this.texto_en);
                }
                else if (this.orden == 4){
                    $("#txt_texto1_es4_UID2").val(this.texto_es);
                    $("#txt_texto1_en4_UID2").val(this.texto_en);
                }
                else if (this.orden == 5){
                    $("#txt_texto1_es5_UID2").val(this.texto_es);
                    $("#txt_texto1_en5_UID2").val(this.texto_en);
                }
                //OPTION 2
                else if (this.orden == 6){
                    $("#txt_texto2_es1_UID2").val(this.texto_es);
                    $("#txt_texto2_en1_UID2").val(this.texto_en);
                }
                else if (this.orden == 7){
                    $("#txt_texto2_es2_UID2").val(this.texto_es);
                    $("#txt_texto2_en2_UID2").val(this.texto_en);
                }
                else if (this.orden == 8){
                    $("#txt_texto2_es3_UID2").val(this.texto_es);
                    $("#txt_texto2_en3_UID2").val(this.texto_en);
                }
                else if (this.orden == 9){
                    $("#txt_texto2_es4_UID2").val(this.texto_es);
                    $("#txt_texto2_en4_UID2").val(this.texto_en);
                }
                else if (this.orden == 10){
                    $("#txt_texto2_es5_UID2").val(this.texto_es);
                    $("#txt_texto2_en5_UID2").val(this.texto_en);
                }
                //OPTION 3
                else if (this.orden == 11){
                    $("#txt_texto3_es1_UID2").val(this.texto_es);
                    $("#txt_texto3_en1_UID2").val(this.texto_en);
                }
                else if (this.orden == 12){
                    $("#txt_texto3_es2_UID2").val(this.texto_es);
                    $("#txt_texto3_en2_UID2").val(this.texto_en);
                }
                else if (this.orden == 13){
                    $("#txt_texto3_es3_UID2").val(this.texto_es);
                    $("#txt_texto3_en3_UID2").val(this.texto_en);
                }
                else if (this.orden == 14){
                    $("#txt_texto3_es4_UID2").val(this.texto_es);
                    $("#txt_texto3_en4_UID2").val(this.texto_en);
                }
                else if (this.orden == 15){
                    $("#txt_texto3_es5_UID2").val(this.texto_es);
                    $("#txt_texto3_en5_UID2").val(this.texto_en);
                }
            });  

            $(data.datatable_img).each(function () {
                if (this.orden == 1){
                    $('#txt_img_seccion1_UID2').val(this.nombre);
                    $("#preview_img_seccion_UID2").attr("src", base_url + this.url);
                }
                if (this.orden == 2){
                    $('#txt_img_seccion2_UID2').val(this.nombre);
                    $("#preview_img_seccion_UID2").attr("src", base_url + this.url);
                }
                if (this.orden == 3){
                    $('#txt_img_seccion3_UID2').val(this.nombre);
                    $("#preview_img_seccion_UID2").attr("src", base_url + this.url);
                }
            });  
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición al cargar textos e imagenes de sección");
    });
}

function Upload_Save_Img2(option)
{                                               
    $("#modal_load").modal("show");
    var _form = document.getElementById('form_uploader_img'+ option +'_seccion2');
    var form_data = new FormData(_form);

    var _url = base_url + 'AjaxLoadImg/uploadBackGroud_Gift_sections/'+ $("#txt_img_seccion"+ option +"_UID2").val() ;
    
    $.ajax({
        url: _url,
        type: 'post',
        data: form_data,
        contentType: false,
        cache: false,
        processData:false,
        dataType: 'json',
        beforeSend: function() 
        {
            //$(_img).attr('src',  'assets/Images/general/cargando.gif');
        }
    }).done(function(data)
    { 
        if(data.status == 'OK')
        {   
            $("#upload_img1_seccion2").val('');
            $("#upload_img2_seccion2").val('');
            $("#upload_img3_seccion2").val('');
            $.noticeAdd({ text: data.msg, stay: false, type: 'notice-info' });
        }
        else {
            $.noticeAdd({ text: data.msg, stay: false, type: 'notice-warn' });
        }

    }).fail(function (jqXHR, textStatus, errorThrown ) {
        alert(errorThrown)
        $.noticeAdd({ text: "Error en petición al cargar imagen", stay: false, type: 'notice-error' });
    });

    $("#modal_imagen2").modal("hide");
    $("#modal_load").modal("hide");
}

function cargar_imagen_div2(opt){  

    var url_imagen = "";
    var name_image = $("#txt_img_seccion"+ opt +"_UID2").val();
    $(".class-save-img").hide();
    $("#preview_img_seccion_UID2").removeAttr("src");

    if ( name_image != "" ) {
        if (existeUrl( url_asset_image_secciones, name_image ) == true) {
            $("#preview_img_seccion_UID2").attr("src", base_url + url_asset_image_secciones + name_image +"?"+Date.now());
            $("#modal_imagen2").modal("show");
        }
        else{
            $.noticeAdd({ text: "La imagen no existen en la ruta", stay: false, type: 'notice-error' }); 
        }
    }   
    else{
        $.noticeAdd({ text: "Debe seleccionar una imagen...", stay: false, type: 'notice-error' }); 
    }    
}

function preview_imagen_upload2(opt, input){  
    if ($("#upload_img"+ opt +"_seccion2").val() == ''){  
        cargar_imagen_div2(opt);
    }
    else if ($("#upload_img"+ opt +"_seccion2").val() != ''){  
        $(".class-save-img").show();
        preview_load_img2(opt, input);
    }    
}

function preview_load_img2(opt, input){ 
    if (validFileType(1, input.files[0])) {
        if (input.files && input.files[0]) {
            var reader =  new FileReader();

            reader.onload = function(e){
                $("#preview_img_seccion_UID2").attr("src", e.target.result);
            }
            
            $('#btn_uploadimg_2').attr('onClick','Upload_Save_Img2("'+ opt +'")');
            reader.readAsDataURL(input.files[0]);
            $("#modal_imagen2").modal("show");
        }
    }
    else{
        $("#upload_img1_seccion2").val('');
        $("#upload_img2_seccion2").val('');
        $("#upload_img3_seccion2").val('');
        $.noticeAdd({ text: "La extensión del archivo no es permitida...", stay: false, type: 'notice-error' }); 
    }
}

function limpiar_file2(){
    $("#upload_img1_seccion2").val('');
    $("#upload_img2_seccion2").val('');
    $("#upload_img3_seccion2").val('');
}

function validar_seccion_UID2(){
    var nombre_sec_es = $("#txt_nombre_sec_es_UID2").val().trim();
    var nombre_sec_en = $("#txt_nombre_sec_en_UID2").val().trim();
    
    var texto1_es_opt1 = $("#txt_texto1_es1_UID2").val().trim();
    var texto1_en_opt1 = $("#txt_texto1_en1_UID2").val().trim();
    var texto2_es_opt1 = $("#txt_texto1_es2_UID2").val().trim();
    var texto2_en_opt1 = $("#txt_texto1_en2_UID2").val().trim();
    var texto3_es_opt1 = $("#txt_texto1_es3_UID2").val().trim();
    var texto3_en_opt1 = $("#txt_texto1_en3_UID2").val().trim();
    var texto4_es_opt1 = $("#txt_texto1_es4_UID2").val().trim();
    var texto4_en_opt1 = $("#txt_texto1_en4_UID2").val().trim();
    var texto5_es_opt1 = $("#txt_texto1_es5_UID2").val().trim();
    var texto5_en_opt1 = $("#txt_texto1_en5_UID2").val().trim();

    var texto1_es_opt2 = $("#txt_texto2_es1_UID2").val().trim();
    var texto1_en_opt2 = $("#txt_texto2_en1_UID2").val().trim();
    var texto2_es_opt2 = $("#txt_texto2_es2_UID2").val().trim();
    var texto2_en_opt2 = $("#txt_texto2_en2_UID2").val().trim();
    var texto3_es_opt2 = $("#txt_texto2_es3_UID2").val().trim();
    var texto3_en_opt2 = $("#txt_texto2_en3_UID2").val().trim();
    var texto4_es_opt2 = $("#txt_texto2_es4_UID2").val().trim();
    var texto4_en_opt2 = $("#txt_texto2_en4_UID2").val().trim();
    var texto5_es_opt2 = $("#txt_texto2_es5_UID2").val().trim();
    var texto5_en_opt2 = $("#txt_texto2_en5_UID2").val().trim();
    
    var texto1_es_opt3 = $("#txt_texto3_es1_UID2").val().trim();
    var texto1_en_opt3 = $("#txt_texto3_en1_UID2").val().trim();
    var texto2_es_opt3 = $("#txt_texto3_es2_UID2").val().trim();
    var texto2_en_opt3 = $("#txt_texto3_en2_UID2").val().trim();
    var texto3_es_opt3 = $("#txt_texto3_es3_UID2").val().trim();
    var texto3_en_opt3 = $("#txt_texto3_en3_UID2").val().trim();
    var texto4_es_opt3 = $("#txt_texto3_es4_UID2").val().trim();
    var texto4_en_opt3 = $("#txt_texto3_en4_UID2").val().trim();
    var texto5_es_opt3 = $("#txt_texto3_es5_UID2").val().trim();
    var texto5_en_opt3 = $("#txt_texto3_en5_UID2").val().trim();

    if (nombre_sec_es == '') {
        $.noticeAdd({ text: "Debe ingresar el nombre de sección en español", stay: false, type: 'notice-warn' });
        $("#txt_nombre_sec_es_UID2").focus();
        return;
    }
    if (nombre_sec_en == '') {
        $.noticeAdd({ text: "Debe ingresar el nombre de sección en ingles", stay: false, type: 'notice-warn' });
        $("#txt_nombre_sec_en_UID2").focus();
        return;
    }
    if (texto1_es_opt1 == '' || texto1_en_opt1 == '' || texto2_es_opt1 == '' || texto2_en_opt1 == '' || texto3_es_opt1 == '' || texto3_en_opt1 == '' || 
        texto4_es_opt1 == '' || texto4_en_opt1 == '' || texto5_es_opt1 == '' || texto5_en_opt1 == '') 
    {
        $.noticeAdd({ text: "Debe llenar todos los campos de la opción 1", stay: false, type: 'notice-warn' });
        return;
    }
    if (texto1_es_opt2 == '' || texto1_en_opt2 == '' || texto2_es_opt2 == '' || texto2_en_opt2 == '' || texto3_es_opt2 == '' || texto3_en_opt2 == '' || 
        texto4_es_opt2 == '' || texto4_en_opt2 == '' || texto5_es_opt2 == '' || texto5_en_opt2 == '') 
    {
        $.noticeAdd({ text: "Debe llenar todos los campos de la opción 2", stay: false, type: 'notice-warn' });
        return;
    }
    if (texto1_es_opt3 == '' || texto1_en_opt3 == '' || texto2_es_opt3 == '' || texto2_en_opt3 == '' || texto3_es_opt3 == '' || texto3_en_opt3 == '' || 
        texto4_es_opt3 == '' || texto4_en_opt3 == '' || texto5_es_opt3 == '' || texto5_en_opt3 == '') 
    {
        $.noticeAdd({ text: "Debe llenar todos los campos de la opción 3", stay: false, type: 'notice-warn' });
        return;
    }

    $("#modal_load").modal("show");
    //seccion
    guardar_seccion(nombre_sec_es, nombre_sec_en);
    //texto de seccion
    //option1
    guardar_SeccionTexto(1, texto1_es_opt1, texto1_en_opt1);
    guardar_SeccionTexto(2, texto2_es_opt1, texto2_en_opt1);
    guardar_SeccionTexto(3, texto3_es_opt1, texto3_en_opt1);
    guardar_SeccionTexto(4, texto4_es_opt1, texto4_en_opt1);
    guardar_SeccionTexto(5, texto5_es_opt1, texto5_en_opt1);
    //option2
    guardar_SeccionTexto(6, texto1_es_opt2, texto1_en_opt2);
    guardar_SeccionTexto(7, texto2_es_opt2, texto2_en_opt2);
    guardar_SeccionTexto(8, texto3_es_opt2, texto3_en_opt2);
    guardar_SeccionTexto(9, texto4_es_opt2, texto4_en_opt2);
    guardar_SeccionTexto(10, texto5_es_opt2, texto5_en_opt2);
    //option3
    guardar_SeccionTexto(11, texto1_es_opt3, texto1_en_opt3);
    guardar_SeccionTexto(12, texto2_es_opt3, texto2_en_opt3);
    guardar_SeccionTexto(13, texto3_es_opt3, texto3_en_opt3);
    guardar_SeccionTexto(14, texto4_es_opt3, texto4_en_opt3);
    guardar_SeccionTexto(15, texto5_es_opt3, texto5_en_opt3);

    $("#modal_load").modal("hide");

    filtrar_datos();
    $("#modal_seccion_editar2").modal("hide");
    $.noticeAdd({ text: "Modificación de sección finalizada.", stay: false, type: 'notice-info' });
}

//#endregion Secciones2

//region Secciones3

function cargar_texto_seccion3(){
    var _url = base_url + "AjaxSecciones/getSeccionTextos_ajax/";

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 1,
            idseccion: idseccion_UID
        }
    }).done(function (data) {

        if (data.status == "OK") {

            $(data.datatable_text).each(function () {
                if (this.orden == 1){
                    $("#txt_texto_es1_UID3").val(this.texto_es);
                    $("#txt_texto_en1_UID3").val(this.texto_en);
                }
                else if (this.orden == 2){
                    $("#txt_texto_es2_UID3").val(this.texto_es);
                    $("#txt_texto_en2_UID3").val(this.texto_en);
                }
            });  
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición al cargar textos de sección");
    });
}

function validar_seccion_UID3(){
    var nombre_sec_es = $("#txt_nombre_sec_es_UID3").val().trim();
    var nombre_sec_en = $("#txt_nombre_sec_en_UID3").val().trim();
    var texto_es1 = $("#txt_texto_es1_UID3").val().trim();
    var texto_en1 = $("#txt_texto_en1_UID3").val().trim();
    var texto_es2 = $("#txt_texto_es2_UID3").val().trim();
    var texto_en2 = $("#txt_texto_en2_UID3").val().trim();

    if (nombre_sec_es == '') {
        $.noticeAdd({ text: "Debe ingresar el nombre de sección en español", stay: false, type: 'notice-warn' });
        $("#txt_nombre_sec_es_UID3").focus();
        return;
    }
    if (nombre_sec_en == '') {
        $.noticeAdd({ text: "Debe ingresar el nombre de sección en ingles", stay: false, type: 'notice-warn' });
        $("#txt_nombre_sec_en_UID3").focus();
        return;
    }
    if (texto_es1 == '') {
        $.noticeAdd({ text: "Debe ingresar el texto shopping bag en español", stay: false, type: 'notice-warn' });
        $("#txt_texto_es1_UID3").focus();
        return;
    }
    if (texto_en1 == '') {
        $.noticeAdd({ text: "Debe ingresar el texto shopping bag en ingles", stay: false, type: 'notice-warn' });
        $("#txt_texto_en1_UID3").focus();
        return;
    }
    if (texto_es2 == '') {
        $.noticeAdd({ text: "Debe ingresar el texto de slide en español", stay: false, type: 'notice-warn' });
        $("#txt_texto_es2_UID3").focus();
        return;
    }
    if (texto_en2 == '') {
        $.noticeAdd({ text: "Debe ingresar el texto de slide en ingles", stay: false, type: 'notice-warn' });
        $("#txt_texto_en2_UID3").focus();
        return;
    }

    $("#modal_load").modal("show");
    //seccion
    guardar_seccion(nombre_sec_es, nombre_sec_en);
    //texto de seccion
    guardar_SeccionTexto(1, texto_es1, texto_en1);
    guardar_SeccionTexto(2, texto_es2, texto_en2);
    $("#modal_load").modal("hide");

    filtrar_datos();
    $("#modal_seccion_editar3").modal("hide");
    $.noticeAdd({ text: "Modificación de sección finalizada.", stay: false, type: 'notice-info' });
}

//endregion Secciones3






//region Secciones4

function cargar_texto_seccion4(){
    var _url = base_url + "AjaxSecciones/getSeccionTextos_ajax/";

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 1,
            idseccion: idseccion_UID
        }
    }).done(function (data) {

        if (data.status == "OK") {

            $(data.datatable_text).each(function () {
                if (this.orden == 1){
                    $("#txt_texto_es1_UID4").val(this.texto_es);
                    $("#txt_texto_en1_UID4").val(this.texto_en);
                }
            });  
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición al cargar textos de sección");
    });
}

function cargar_imgs_galeria4(){
    $("#modal_load").modal("show");
    var _url = base_url + "AjaxSecciones/getSeccionImagen_ajax/";

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 1,
            idseccion: idseccion_UID,
            idimagen: 0
        }
    }).done(function (data) {

        if (data.status == "OK") {

            var descripcion_es1 = '';
            var descripcion_en1 = '';
            var lugar_es2 = '';
            var lugar_en2 = '';
            var orden = 0;

            $(data.datatable).each(function () {

                idimagen_UID = this.idimagen;
                orden = this.orden_img;
                
                if (this.orden_texto == 1){
                    descripcion_es1 = this.texto_es;
                    descripcion_en1 = this.texto_en;
                }
                else if (this.orden_texto == 2){
                    lugar_es2 = this.texto_es;
                    lugar_en2 = this.texto_en;

                    object_img_gallery(1, idimagen_UID, this.nombre, orden, descripcion_es1, descripcion_en1, lugar_es2, lugar_en2);
                    add_li_sortable(1, this.nombre, lugar_es2);
                }
            });  
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición al cargar textos de sección");
    });
    $("#modal_load").modal("hide");
}

function validar_seccion_UID4(){

    var nombre_sec_es = $("#txt_nombre_sec_es_UID4").val().trim();
    var nombre_sec_en = $("#txt_nombre_sec_en_UID4").val().trim();
    var texto_es1 = $("#txt_texto_es1_UID4").val().trim();
    var texto_en1 = $("#txt_texto_en1_UID4").val().trim();

    if (nombre_sec_es == '') {
        $.noticeAdd({ text: "Debe ingresar el nombre de sección en español", stay: false, type: 'notice-warn' });
        $("#txt_nombre_sec_es_UID4").focus();
        return;
    }
    if (nombre_sec_en == '') {
        $.noticeAdd({ text: "Debe ingresar el nombre de sección en ingles", stay: false, type: 'notice-warn' });
        $("#txt_nombre_sec_en_UID4").focus();
        return;
    }
    if (texto_es1 == '') {
        $.noticeAdd({ text: "Debe ingresar la descripción en español", stay: false, type: 'notice-warn' });
        $("#txt_texto_es1_UID4").focus();
        return;
    }
    if (texto_en1 == '') {
        $.noticeAdd({ text: "Debe ingresar la descripción en ingles", stay: false, type: 'notice-warn' });
        $("#txt_texto_en1_UID4").focus();
        return;
    }

    $("#modal_load").modal("show");
    //seccion
    guardar_seccion(nombre_sec_es, nombre_sec_en);
    //texto de seccion
    guardar_SeccionTexto(1, texto_es1, texto_en1);
    $("#modal_load").modal("hide");

    actualizar_orden_img4(); //reordena las imagen

    filtrar_datos();
    $("#modal_seccion_editar4").modal("hide");
    $.noticeAdd({ text: "Modificación de sección finalizada.", stay: false, type: 'notice-info' });
}

function actualizar_orden_img4(){

    var new_orden = 0;

    $("#ul_imagenes li").each(function(){

        new_orden++;
        var idimagen = $(this).val();

        if (new_orden != obj_gallery['obj_img_orden'+ idimagen]){
            
            $("#modal_load").modal("show");
            var _url = base_url + "AjaxSecciones/setSeccionImagen_ajax/";
        
            $.ajax({
                async: false,
                cache: false,
                url: _url,
                type: 'post',
                dataType: 'json',
                data: {
                    tipo: 4,
                    idseccion: idseccion_UID,
                    idimagen: idimagen,
                    nombre: '', 
                    url: '',
                    orden: new_orden
                }
            }).done(function (data) {
        
                if (data.status == "OK") { 
                   
                }
                else {
                    $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
                }
            }).fail(function () {
                alert("Error en petición al intentar guardar imagen");
            });

            $("#modal_load").modal("hide");
        }
    });
}











//EDITAR IMAGENES
function abrir_img_galeria(type_, idimagen_){

    limpiar_galeria_img(1);
    tipo_gallery_UID = type_;
    idimagen_UID = idimagen_;

    if (type_ == 1){
        $("#preview_img_seccion_UID4").hide();
        $("#lbl_modal_seccion_imagen4").text("Agregar imagen");
    }
    else if (type_ == 2){
        $("#preview_img_seccion_UID4").show();
        $("#lbl_modal_seccion_imagen4").text("Editar imagen #"+ idimagen_);
        object_img_gallery(4, idimagen_, "", 0, "", "", "", "");
    }

    $("#modal_seccion_galeria4").modal("show");
}

function limpiar_galeria_img(tipo_){

    if (tipo_ == 1){ //modal de imagen
        $("#txt_texto_img_es1_UID4").val('');
        $("#txt_texto_img_en1_UID4").val('');
        $("#txt_texto_img_es2_UID4").val('');
        $("#txt_texto_img_en2_UID4").val('');
    
        $("#txt_img_galeria_UID4").val('');
        $("#upload_img_seccion4").val('');
        $("#preview_img_seccion_UID4").hide();
    }
}

function preview_imagen_upload4(input){  

    if ($("#upload_img_seccion4").val() != ''){  
        $(".class-save-img").show();
        preview_load_img4(input);
    }
    else{//aqui no hay vista previa se muestra en div 
    }
}

function preview_load_img4(input){ 
    if (validFileType(2, input.files[0])) {
        if (input.files && input.files[0]) {
            var reader =  new FileReader();

            reader.onload = function(e){
                $("#preview_img_seccion_UID4").attr("src", e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
            $("#preview_img_seccion_UID4").show();
        }
    }
    else{
        $("#upload_img_seccion4").val('')
        $.noticeAdd({ text: "La extensión del archivo no es permitida...", stay: false, type: 'notice-error' }); 
    }
}







function validar_img_galeria4(){ 
    var descripcion_es1 = $("#txt_texto_img_es1_UID4").val().trim();
    var descripcion_en1 = $("#txt_texto_img_en1_UID4").val().trim();
    var lugar_es2 = $("#txt_texto_img_es2_UID4").val().trim();
    var lugar_en2 = $("#txt_texto_img_en2_UID4").val().trim();

    if (descripcion_es1 == '' || descripcion_en1 == '') {
        $.noticeAdd({ text: "Debe ingresar la descripción en español e ingles", stay: false, type: 'notice-warn' });
        return;
    }
    if (lugar_es2 == '' || lugar_en2 == '') {
        $.noticeAdd({ text: "Debe ingresar el lugar en español e ingles", stay: false, type: 'notice-warn' });
        return;
    }

    if (tipo_gallery_UID == 1){
        if ($("#upload_img_seccion4").val() == ""){
            $.noticeAdd({ text: "Debe seleccionar una imagen", stay: false, type: 'notice-warn' });
            return;
        }
    }
    else if (tipo_gallery_UID == 2){
        if ($("#txt_img_galeria_UID4").val() == ""){
            $.noticeAdd({ text: "Debe seleccionar una imagen", stay: false, type: 'notice-warn' });
            return;
        }
    }

    guardar_img_galeria();
}


function guardar_img_galeria(){

    $("#modal_load").modal("show");
    var descripcion_es1 = $("#txt_texto_img_es1_UID4").val().trim();
    var descripcion_en1 = $("#txt_texto_img_en1_UID4").val().trim();
    var lugar_es2 = $("#txt_texto_img_es2_UID4").val().trim();
    var lugar_en2 = $("#txt_texto_img_en2_UID4").val().trim();
    
    var orden = 0;
    var nombre_img = (tipo_gallery_UID == 1 ? "" : $("#txt_img_galeria_UID4").val());
    var _url = base_url + "AjaxSecciones/setSeccionImagen_ajax/";

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: tipo_gallery_UID,
            idseccion: idseccion_UID,
            idimagen: idimagen_UID,
            nombre: nombre_img, //si es guardar el nombre esta en el SP
            url: url_asset_image_galeria,
            orden: 0,
            parametro: ''
        }
    }).done(function (data) {

        if (data.status == "OK") {
            
            if( $("#upload_img_seccion4").val() != ""){
                Upload_Save_Img4(data.datatable.nombre);
            }

            if (tipo_gallery_UID == 1){
                idimagen_UID = data.datatable.idimagen;
                orden = data.datatable.orden;
                nombre_img = data.datatable.nombre;
            }
            
            guardar_ImagenTexto4(1, descripcion_es1, descripcion_en1, "Descripción");
            guardar_ImagenTexto4(2, lugar_es2, lugar_en2, "Lugar");
            add_li_sortable(tipo_gallery_UID, nombre_img, lugar_es2);
            object_img_gallery(tipo_gallery_UID, idimagen_UID, nombre_img, orden, descripcion_es1, descripcion_en1, lugar_es2, lugar_en2);
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición al intentar guardar imagen");
    });

    $("#upload_img_seccion4").val('');
    $("#modal_seccion_galeria4").modal("hide");
    $("#preview_img_seccion_UID4").modal("hide");
    $("#modal_load").modal("hide");
}

function Upload_Save_Img4(name_img)
{                                                       
    $("#modal_load").modal("show");
    var _form = document.getElementById('form_uploader_img_seccion4');
    var form_data = new FormData(_form);

    var _url = base_url + 'AjaxLoadImg/uploadBackGroud_gallery/'+ name_img;
    
    $.ajax({
        url: _url,
        type: 'post',
        data: form_data,
        contentType: false,
        cache: false,
        processData:false,
        dataType: 'json',
        beforeSend: function() 
        {
            //$(_img).attr('src',  'assets/Images/general/cargando.gif');
        }
    }).done(function(data)
    { 
        if(data.status == 'OK')
        {   
            $.noticeAdd({ text: data.msg, stay: false, type: 'notice-info' });
        }
        else {
            $.noticeAdd({ text: data.msg, stay: false, type: 'notice-warn' });
        }

    }).fail(function (jqXHR, textStatus, errorThrown ) {
        alert(errorThrown)
        $.noticeAdd({ text: "Error en petición al cargar imagen", stay: false, type: 'notice-error' });
    });
}

function guardar_ImagenTexto4(orden_, texto_es_, texto_en_, nota_){

    var _url = base_url + "AjaxSecciones/setSeccionImagenTexto_ajax/";

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: tipo_gallery_UID,
            idimagen_texto: 0,
            idimagen: idimagen_UID,
            texto_es: texto_es_,
            texto_en: texto_en_,
            orden: orden_,
            nota: nota_,
            parametro: ''
        }
    }).done(function (data) {
        if (data.status == "OK") {

        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición actualizar texto de imagen");
    });
}




function object_img_gallery(tipo, idimg, nombre, orden, descripcion_es1, descripcion_en1, lugar_es2, lugar_en2){
    
    if (tipo == 1){ //crea nuevo
        obj_gallery['obj_img_id'+ idimg] = idimg;
        obj_gallery['obj_img_name'+ idimg] = nombre;
        obj_gallery['obj_img_orden'+ idimg] = orden;
        obj_gallery['obj_img_text_es1'+ idimg] = descripcion_es1;
        obj_gallery['obj_img_text_en1'+ idimg] = descripcion_en1;
        obj_gallery['obj_img_text_es2'+ idimg] = lugar_es2;
        obj_gallery['obj_img_text_en2'+ idimg] = lugar_en2;
        //console.log(obj_gallery);
        //console.log(Object.values(obj_gallery));
    }
    else if (tipo == 1){ //crea nuevo
        obj_gallery['obj_img_text_es1'+ idimg] = descripcion_es1;
        obj_gallery['obj_img_text_en1'+ idimg] = descripcion_en1;
        obj_gallery['obj_img_text_es2'+ idimg] = lugar_es2;
        obj_gallery['obj_img_text_en2'+ idimg] = lugar_en2;
    }
    else if (tipo == 3){   //elimina
        delete obj_gallery['obj_img_id'+ idimg];
        delete obj_gallery['obj_img_name'+ idimg];
        delete obj_gallery['obj_img_orden'+ idimg];
        delete obj_gallery['obj_img_text_es1'+ idimg];
        delete obj_gallery['obj_img_text_en1'+ idimg];
        delete obj_gallery['obj_img_text_es2'+ idimg];
        delete obj_gallery['obj_img_text_en2'+ idimg];

        $("#li_gallery_"+ idimg).remove();
    }
    else if (tipo == 4){ //cargo los datos en el modals modal_seccion_galeria4

        $("#txt_texto_img_es1_UID4").val(obj_gallery['obj_img_text_es1'+ idimg]);
        $("#txt_texto_img_en1_UID4").val(obj_gallery['obj_img_text_en1'+ idimg]);
        $("#txt_texto_img_es2_UID4").val(obj_gallery['obj_img_text_es2'+ idimg]);
        $("#txt_texto_img_en2_UID4").val(obj_gallery['obj_img_text_en2'+ idimg]);
        $("#txt_img_galeria_UID4").val(obj_gallery['obj_img_name'+ idimg]);
        $("#upload_img_seccion4").val(''); 
        $("#preview_img_seccion_UID4").attr("src", base_url + url_asset_image_galeria + obj_gallery['obj_img_name'+ idimg] +"?"+Date.now());

        $("#preview_img_seccion_UID4").show();
    }
}

function add_li_sortable(tipo_, name_img_, lugar_es_){ //tipo 1 agrega, 2 modifica
    var item;

    if (tipo_ == 1){
        item = '<li id="li_gallery_'+ idimagen_UID +'" class="list-group-item ui-sortable-handle li-sortable" value="'+ idimagen_UID +'" style="position: relative; left: 0px; top: 0px;">';
        item += '    <div class="d-flex">';
        item += '        <div class="p-2">';
        item += '            <img data-toggle="tooltip" title="preview" class="preview-img-mini" id="img_gallery_'+ idimagen_UID +'" src="'+ base_url + url_asset_image_galeria + name_img_ +'">';
        item += '        </div>';
        item += '        <div class="d-flex mr-auto p-2  align-content-center flex-wrap">';
        item += '            <div class="align-self-center">';
        item += '                <label id="lbl_gallery_'+ idimagen_UID +'" class="control-label">'+ lugar_es_ +'</label>';
        item += '            </div>';
        item += '        </div>';
        item += '        <div class="p-2 align-content-center li-button-center" style="font-size:25px;">';
        item += '            <div class="align-self-center">';
        item += '                <span class="cursor-pointer" title="Editar" onclick="abrir_img_galeria(2,\'' + idimagen_UID + '\')"><i class="icon ion-edit"></i></span>';
        item += '            </div>';
        item += '            <div class="align-self-center" style="height:5px;"> </div>';
        item += '            <div class="align-self-center">';
        item += '                <span class="cursor-pointer" title="Remover" onclick="confirmar_delete_gallery('+ idimagen_UID +',\'' + name_img_ + '\')"><i class="icon ion-trash-b"></i></span>';
        item += '            </div>';
        item += '         </div>';
        item += '     </div>';
        item += '</li>';
        $("#ul_imagenes").append(item);
    }
    else if(tipo_ == 2){
        $("#lbl_gallery_"+ idimagen_UID).text(lugar_es_);
        $("#img_gallery_"+ idimagen_UID).removeAttr("src");
        $("#img_gallery_"+ idimagen_UID).attr("src", base_url + url_asset_image_galeria + name_img_ +"?"+Date.now());
    }
}

function confirmar_delete_gallery(idimagen_, name_img_){
    
    idimagen_UID = idimagen_;
    nombre_img_UID = name_img_;
    $("#modal_delete_img_confirma").modal("show");
}

function delete_img_gallery(){
    var _url = base_url + "AjaxSecciones/setSeccionImagen_ajax/";

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 3,
            idseccion: idseccion_UID,
            idimagen: idimagen_UID,
            nombre: '', //si es guardar el nombre esta en el SP
            url: url_asset_image_galeria,
            orden: 0,
            parametro: ''
        }
    }).done(function (data) {
        if (data.status == "OK") {
            delete_img_gallery_file(nombre_img_UID);
            object_img_gallery(3, idimagen_UID, "", 0, "", "", "", "");
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición al intentar eliminar imagen");
    });

    $("#modal_delete_img_confirma").modal("hide");
}

function delete_img_gallery_file(nombre_){

    var _url = base_url + "AjaxLoadImg/deleteBackGroud_gallery/";

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            nombre: nombre_
        }
    }).done(function (data) {
        if (data.status == "OK") {
            $.noticeAdd({ text: data.msg, stay: false, type: 'notice-info' });
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición intentar eliminar la imagen "+ nombre_);
    });
}

/*
function add_object_img_gallery(){
    var obj = {};

    for (i = 0; i < 8; i++){
        var num = i+1;

        obj['imagen'+ num] = "hola"+num;
    }

    alert(obj['imagen'+ 1])
}
*/






//endregion Secciones4






//region Secciones5

function cargar_texto_seccion5(){
    var _url = base_url + "AjaxSecciones/getSeccionTextos_ajax/";

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 1,
            idseccion: idseccion_UID
        }
    }).done(function (data) {

        if (data.status == "OK") {

            $(data.datatable_text).each(function () {
                if (this.orden == 1){
                    $("#txt_texto_es1_UID5").val(this.texto_es);
                    $("#txt_texto_en1_UID5").val(this.texto_en);
                }
                else if (this.orden == 2){
                    $("#txt_texto_es2_UID5").val(this.texto_es);
                    $("#txt_texto_en2_UID5").val(this.texto_en);
                }
            });  
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición al cargar textos de sección");
    });
}

function validar_seccion_UID5(){
    var nombre_sec_es = $("#txt_nombre_sec_es_UID5").val().trim();
    var nombre_sec_en = $("#txt_nombre_sec_en_UID5").val().trim();
    var texto_es1 = $("#txt_texto_es1_UID5").val().trim();
    var texto_en1 = $("#txt_texto_en1_UID5").val().trim();
    var texto_es2 = $("#txt_texto_es2_UID5").val().trim();
    var texto_en2 = $("#txt_texto_en2_UID5").val().trim();

    if (nombre_sec_es == '') {
        $.noticeAdd({ text: "Debe ingresar el nombre de sección en español", stay: false, type: 'notice-warn' });
        $("#txt_nombre_sec_es_UID5").focus();
        return;
    }
    if (nombre_sec_en == '') {
        $.noticeAdd({ text: "Debe ingresar el nombre de sección en ingles", stay: false, type: 'notice-warn' });
        $("#txt_nombre_sec_en_UID5").focus();
        return;
    }
    if (texto_es1 == '') {
        $.noticeAdd({ text: "Debe ingresar la dirección en español", stay: false, type: 'notice-warn' });
        $("#txt_texto_es1_UID5").focus();
        return;
    }
    if (texto_en1 == '') {
        $.noticeAdd({ text: "Debe ingresar la dirección en ingles", stay: false, type: 'notice-warn' });
        $("#txt_texto_en1_UID5").focus();
        return;
    }
    if (texto_es2 == '') {
        $.noticeAdd({ text: "Debe ingresar los teléfonos en español", stay: false, type: 'notice-warn' });
        $("#txt_texto_es2_UID5").focus();
        return;
    }
    if (texto_en2 == '') {
        $.noticeAdd({ text: "Debe ingresar los teléfonos en ingles", stay: false, type: 'notice-warn' });
        $("#txt_texto_en2_UID5").focus();
        return;
    }

    $("#modal_load").modal("show");
    //seccion
    guardar_seccion(nombre_sec_es, nombre_sec_en);
    //texto de seccion
    guardar_SeccionTexto(1, texto_es1, texto_en1);
    guardar_SeccionTexto(2, texto_es2, texto_en2);
    $("#modal_load").modal("hide");

    filtrar_datos();
    $("#modal_seccion_editar5").modal("hide");
    $.noticeAdd({ text: "Modificación de sección finalizada.", stay: false, type: 'notice-info' });
}

//endregion Secciones5


