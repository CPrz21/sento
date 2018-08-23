$(document).ready(function () {

    $("#modal_load").modal("show");
    inactivar_temporadas();
    format_datepicker("");
    QFiltro();
    $('#txt_busqueda_paq_B').pressEnter(function () { filtrar_paquetes(); })
    $("#modal_load").modal("hide");

});


//#region globales
var tipo_B = 1;
var idtemporada_B = 0;
var nombre_es_B = '';
var nombre_en_B = '';
var activa_B = 'T';
var parametro_B = '';

var idtemporada_UID = 0;
var idpaquete_UID = 0;
var tipo_UID = 1;

var array_paquete = [];  //paquetes agregados
var array_paquete_add = [];  //paquetes a agregar
//#endregion globales

//#region generales
function fab_options() {
    var item = '';
    item += '<div class="fab-mini-box">';
    item += '   <a onclick="abrir_modal_temporada(1,0)">';
    item += '       <div class="fab-container">';
    item += '           <span class="label">Nueva Temporada</span>';
    item += '           <div class="fab-mini">';
    item += '               <i class="zmdi zmdi-plus zmdi-hc-2x"></i>';
    item += '           </div>';
    item += '       </div>';
    item += '   </a>';
    item += '</div>';
    item += '<div class="fab-normal" id="options">';
    item += '    <i class="zmdi zmdi-toys zmdi-hc-2x"></i>';
    item += '</div> ';

    $("#fab_options").append(item);
}

function format_datepicker(dateinivta_) {   
    $("#txt_fecha_ini_UID").remove();
    $("#div_fecha_ini_UID").append('<input id="txt_fecha_ini_UID" class="form-control" type="text" maxlength="10" placeholder="DD-MM-YYYY" required/>');
    
    if (tipo_UID == 1 || tipo_UID == 2) {
        $('#txt_fecha_ini_UID').datepicker({
            todayHighlight: true,
            format: "dd-mm-yyyy",
            language: "es",
            todayBtn: "linked",
            clearBtn: false,
            autoclose: true,
            startDate: "dateToday"
        });
    }
    else {        
        $('#txt_fecha_ini_UID').datepicker({
            todayHighlight: true,
            format: "dd-mm-yyyy",
            language: "es",
            todayBtn: "linked",
            clearBtn: false,
            autoclose: true,
            startDate: dateinivta_
        });
    }
      
    $(document).on('change', '#txt_fecha_ini_UID', function () { 
        var startdate = $(this).val();
        
        var endDate = $('#txt_fecha_fin_UID').datepicker({
            todayHighlight: true,
            format: "dd-mm-yyyy",
            language: "es",
            todayBtn: "linked",
            clearBtn: false,
            autoclose: true,
            startDate: "dateToday"
        });
        endDate.datepicker("setStartDate", startdate);
    });
    
    $(document).on('change', '#txt_fecha_fin_UID', function () {
        var enddate = $(this).val();

        var endDate = $('#txt_fecha_ini_UID').datepicker({
            todayHighlight: true,
            format: "dd-mm-yyyy",
            language: "es",
            todayBtn: "linked",
            clearBtn: false,
            autoclose: true,
            startDate: "dateToday"
        });
        endDate.datepicker("setEndDate", enddate);
    });
}

$.fn.pressEnter = function (fn) {
    return this.each(function () {
        $(this).bind('enterPress', fn);
        $(this).keyup(function (e) {
            if (e.keyCode == 13) {
                $(this).trigger("enterPress");
            }
        })
    });
};
//#endregion generales

//#region principal

function inactivar_temporadas() {
    $("#modal_load").modal("show");

    var _url = base_url + "AjaxAdministracion/setTemporada_ajax/";

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 4,
            parametro : ''
        }
    }).done(function (data) {
        /*
        if (data.status == "OK") {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-info' });
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        } 
        */
    }).fail(function () {
        alert("Error en petición inactivar temporada");
    });
    $("#modal_load").modal("hide");
}

function QFiltro() {
    
    fab_options();
    $("input[name=opt_estado_B][value=S]").prop('checked', true);

    tipo_B = 1;
    idtemporada_B = 0;
    nombre_es_B = '';
    nombre_en_B = '';
    activa_B = 'T';
    parametro_B = '';

    filtrar_datos();
}

function filtrar_datos() {
    $("#modal_load").modal("show");

    var _url = base_url + "AjaxAdministracion/getTemporadas_ajax/";
    activa_B = $('input:radio[name=opt_estado_B]:checked').val();

    $('#JDTable_div').html('');

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 1,
            idtemporada: idtemporada_B,
            nombre_es: nombre_es_B,
            nombre_en: nombre_en_B,
            activa: activa_B,
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
                                        '   <th class="text-center">Temporada</th>' +
                                        '   <th class="text-center">Nombre ES</th>' +
                                        '   <th class="text-center">Nombre EN</th>' +
                                        '   <th class="text-center" title="Fecha de inicio">Inicia</th>' +
                                        '   <th class="text-center" title="Fecha de finalización">Fin</th>' +
                                        '   <th class="text-center">Activa</th>' +
                                        '   <th class="text-center">Editar</th>' +
                                        '</tr>');

             $('#JDTable_foot').append(     '<tr>' +
                                            '   <th class="text-center">Promo</th>' +
                                            '   <th class="text-center">Nombre ES</th>' +
                                            '   <th class="text-center">Nombre EN</th>' +
                                            '   <th class="text-center" title="Fecha de inicio">Inicia</th>' +
                                            '   <th class="text-center" title="Fecha de finalización">Fin</th>' +
                                            '   <th class="text-center">Activa</th>' +
                                            '   <th class="text-center">Editar</th>' +
                                            '</tr>');

            $(data.datatable).each(function () {
                var item = '';
                item += '<tr>';
                item += '   <td class="id-value">'+ this.idtemporada + '</td>';
                item += '   <td>' + this.nombre_es + '</td>';
                item += '   <td>' + this.nombre_en + '</td>';
                item += '   <td>' + this.fecha_ini + '</td>';
                item += '   <td>' + this.fecha_fin + '</td>';
                item += '   <td>' + this.activa + '</td>';
                item += '   <td><a title="Editar Temporada" onclick="abrir_modal_temporada(\'' + 2 + '\',\'' + this.idtemporada + '\')"><i class="size-13-5 ion-edit"></i></a></td>';
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
                destroy: true,
                dom: 'Bfrtip',
                lengthMenu: [
                    [ 10, 15, 25, 50, 100 ],
                    [ '10 registros', '15 registros', '25 registros', '50 registros', '100 registros' ]
                ],
                buttons: [
                     'copy', 'excel', 'pdf', 'print','pageLength'
                ]
            });
            /*=================================================================*/
            $('input[type="search"]').attr("placeholder", "Búsqueda");
            $(".dataTables_scrollBody").css("max-height", "55vh");
            $("#JDTable_wrapper").css("overflow", "auto");
            $("#JDTable_wrapper").css("max-height", "72vh");
        }
        else if(data.status == "SIN_DATOS"){
            if (activa_B == 'S'){
                $.noticeAdd({ text: "No existe temporada activa, debe crearla.", stay: false, type: 'notice-warn' });
            }
            else{
                $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-warn' });
            }
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición cargar tabla de Temporada...");
    });

    $("#modal_load").modal("hide");
}

//#endregion principal

//#region temporada
function abrir_modal_temporada(tipo_, idtemporada_) {
    $("#modal_load").modal("show");
    limpiar_modal_temporada();
    
    if (tipo_ == 1) {   //nueva
        tipo_UID = 1;
        format_datepicker("");
        deshabilitar_input();
        $("#lbl_temporada_editar").text("Creación de temporada");
    }
    else if (tipo_ == 2) {  //modificar todo       
        idtemporada_UID = idtemporada_;
        $("#lbl_temporada_editar").text("Editar temporada #"+ idtemporada_UID);
        cargar_datos_temporada();
    } 
    
    $("#modal_temporada_editar").modal("show");
    $("#modal_load").modal("hide");
}

function limpiar_modal_temporada() {
    idtemporada_UID = 0;
    $("#txt_nombre_es_UID").val('');
    $("#txt_nombre_en_UID").val('');
    $("#txt_descripcion_es_UID").val('');
    $("#txt_descripcion_en_UID").val('');
    $('#txt_fecha_ini_UID').datepicker('update', "");
    $('#txt_fecha_fin_UID').datepicker('update', "");
    $("#txt_img_temporada_UID").val('');
    $("#txt_img_temporada_UID_S").val('');
    $("#txt_img_temporada_editada_UID").val(0); //0 es no editada y 1 si guardar
    $("#opt_activa_UID").prop('checked', true);
    $('#JD_PaqueteTempo_div').html('');
    $("#upload_img_temporada").val('');
    $("#preview_img_temporada_UID").removeAttr("src");
    
    //detalle
    array_paquete = [];
    array_paquete_add = [];
    $("#table_deta_promo_paquete_").html('');
    $("#txt_busqueda_paquete_B").val('');
}

function cargar_datos_temporada() {
    var _url = base_url + "AjaxAdministracion/getTemporada_master_ajax/";

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 2,
            idtemporada: idtemporada_UID
        }
    }).done(function (data) {

        if (data.status == "OK") {
            tipo_UID = data.datatable.editar;
            $("#txt_nombre_es_UID").val(data.datatable.nombre_es);
            $("#txt_nombre_en_UID").val(data.datatable.nombre_en);
            $("#txt_descripcion_es_UID").val(data.datatable.descripcion_es);
            $("#txt_descripcion_en_UID").val(data.datatable.descripcion_en);
            format_datepicker(data.datatable.fecha_ini);
            $('#txt_fecha_ini_UID').datepicker('update', data.datatable.fecha_ini);
            $('#txt_fecha_fin_UID').datepicker('update', data.datatable.fecha_fin);   
            $('#txt_img_temporada_UID_S').val(data.datatable.nombre_imagen);
            $('#txt_img_temporada_UID').val(data.datatable.nombre_imagen);
            $("#preview_img_temporada_UID").attr("src", base_url + data.datatable.url);
            (data.datatable.activa == "S" ? $("#opt_activa_UID").prop('checked', true) : $("#opt_inactiva_UID").prop('checked', true));
                        
            //cargar_detalle_promo();
            cargar_paquete_temporada();
            deshabilitar_input(); 
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición al cargar datos de temporada...");
    });
}

function cargar_paquete_temporada(){

    $("#modal_load").modal("show");

    var _url = base_url + "AjaxAdministracion/getPaquetes_ajax/";
    $('#JD_PaqueteTempo_div').html('');

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 6,
            idtemporada: idtemporada_UID
        }
    }).done(function (data) {

        if (data.status == "OK") {

            var tbl_ = '<table id="JD_PaqueteTempo" class="table table-striped table-bordered nowrap display" cellspacing="0" width="100%">' +
                            '<thead id="JD_PaqueteTempo_head" style="text-align:center"></thead>' +
                            '<tbody id="JD_PaqueteTempo_body" style="text-align:center"></tbody>' +
                        '</table>'

            $('#JD_PaqueteTempo_div').append(tbl_);

            $('#JD_PaqueteTempo_head').html('');
            $('#JD_PaqueteTempo_body').html('');

        	$('#JD_PaqueteTempo_head').append(	'<tr>' +
                                                '   <th class="text-center">Paquete</th>' +
                                                '   <th class="text-center">Nombre</th>' +
                                                '   <th class="text-center">F. Inicia</th>' +
                                                '   <th class="text-center">F. Fin</th>' +
                                                '   <th class="text-center">Precio</th>' +
                                                '   <th class="text-center">Remover</th>' +
                                                '</tr>');
        	$(data.datatable).each(function () {
                var item = '';
                item += '<tr>';
                item += '   <td>' + this.idpaquete + '</td>';
                item += '   <td>' + this.nombre_en + '</td>';
                item += '   <td>' + this.fecha_ini_vta + '</td>';
                item += '   <td>' + this.fecha_fin_vta + '</td>';
                item += '   <td>$' + this.precio + '</td>';
                item += '   <td>' ;
                item += '       '+(this.eliminar == 1 ? '<a class="cursor-pointer" title="Remover de temporada" onclick="remover_paquete(\'' + 2 + '\',\'' + this.idpaquete + '\')"><i class="icon ion-trash-b"></i></a>' : '-')
                item += '   </td>';
                item += "</tr>";

                $('#JD_PaqueteTempo_body').append(item);
            });  

            /*=================================================================*/
            /******************DATA TABLE JQUERY CON PAGINADOR******************/
            /*=================================================================*/
            $('#JD_PaqueteTempo').DataTable({                          
                //"pagingType": "full_numbers"                           
                "bSort": true,
                "bFilter": true,
                //"scrollX": true,
                ////"scrollY": "60vh",
                "scrollCollapse": true,
                destroy: true
            });
            /*=================================================================*/
            $('input[type="search"]').attr("placeholder", "Búsqueda");
            $(".dataTables_scrollBody").css("max-height", "50vh");
        }
        else if(data.status == "SIN_DATOS"){
        	$.noticeAdd({ text: "No se encontraron paquetes en la temporada", stay: false, type: 'notice-warn' });
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición cargar paquetes de temporada...");
    });

    $("#modal_load").modal("hide");
}


function deshabilitar_input() {
    if (tipo_UID == 1 || tipo_UID == 2) {
        $(".add-temporada").show();
        $(".class-save-temporada").show();

        $('#txt_nombre_es_UID').attr('readonly', false);
        $('#txt_nombre_en_UID').attr('readonly', false);
        $('#txt_descripcion_es_UID').attr('readonly', false);
        $('#txt_descripcion_en_UID').attr('readonly', false);
        $('#txt_fecha_ini_UID').attr('disabled', false);
        $('#txt_fecha_fin_UID').attr('disabled', false);
        $('#opt_activa_UID').attr('disabled', false);
        
        if (tipo_UID == 1) {
            $('#opt_inactiva_UID').attr('disabled', true);
        }
        else{
            $('#opt_inactiva_UID').attr('disabled', false);
        }
    }
    else if(tipo_UID == 3){
        $(".add-temporada").show();
        $(".class-save-temporada").show();

        $('#txt_nombre_es_UID').attr('readonly', true);
        $('#txt_nombre_en_UID').attr('readonly', true);
        $('#txt_descripcion_es_UID').attr('readonly', true);
        $('#txt_descripcion_en_UID').attr('readonly', true);
        $('#txt_fecha_ini_UID').attr('disabled', true);
        $('#txt_fecha_fin_UID').attr('disabled', false);
        $('#opt_activa_UID').attr('disabled', false);
        $('#opt_inactiva_UID').attr('disabled', false);
    }
    else if(tipo_UID == 0){
        $(".add-temporada").hide();
        $(".class-save-temporada").hide();

        $('#txt_nombre_es_UID').attr('readonly', true);
        $('#txt_nombre_en_UID').attr('readonly', true);
        $('#txt_descripcion_es_UID').attr('readonly', true);
        $('#txt_descripcion_en_UID').attr('readonly', true);
        $('#txt_fecha_ini_UID').attr('disabled', true);
        $('#txt_fecha_fin_UID').attr('disabled', true);
        $('#opt_activa_UID').attr('disabled', true);
        $('#opt_inactiva_UID').attr('disabled', true);
    }
}

function uploadAndPreview(option)
{
    $("#modal_load").modal("show");
    var _form = document.getElementById('form_uploader_' + option);
    //var _img  = document.getElementById('preview_' + option);
    var form_data = new FormData(_form);

    var _url = base_url + 'AjaxLoadImg/uploadBackGroud_temporada/' ;

    $.ajax({
        url: _url,
        type: 'post',
        data: form_data,
        contentType: false,
        cache: false,
        processData:false,
        dataType: 'json',
        beforeSend: function() // function(xhr)
        {
            //$(_img).attr('src',  'assets/Images/general/cargando.gif');
        }
    }).done(function(data)
    { 
        if(data.status == 'OK')
        { 
            //$(_img).removeAttr('src');
            //$(_img).attr('src',  url_asset_image_temporada + data.filename);
            
            $("#txt_"+ option + "_UID").val(data.filename);
            $("#upload_img_temporada").val('');
            $.noticeAdd({ text: data.msg, stay: false, type: 'notice-info' });
        }
        else {
            $.noticeAdd({ text: data.msg, stay: false, type: 'notice-warn' });
            $("#txt_"+ option).val('');
        }

    }).fail(function (jqXHR, textStatus, errorThrown ) {
        alert(errorThrown)
        $.noticeAdd({ text: "Error en petición al cargar imagen", stay: false, type: 'notice-error' });
        $("#txt_"+ option).val('');
    });

    $("#modal_imagen").modal("hide");
    $("#modal_load").modal("hide");
}


function cargar_imagen_div(){  

    var url_imagen = "";
    var name_image = $("#txt_img_temporada_UID").val();
    $(".class-save-img").hide();

    if ( name_image != "" ) {
        if (existeUrl( url_asset_image_temporada, name_image ) == true) {
            $("#preview_img_temporada_UID").removeAttr("src");
            $("#preview_img_temporada_UID").attr("src", base_url + url_asset_image_temporada + name_image);
            $("#modal_imagen").modal("show");
        }
        else{
            $("#preview_img_temporada_UID").removeAttr("src");
            $.noticeAdd({ text: "La imagen no existen en la ruta", stay: false, type: 'notice-error' }); 
        }
    }   
    else{
        $("#preview_img_temporada_UID").removeAttr("src");
        
        $.noticeAdd({ text: "Debe seleccionar una imagen...", stay: false, type: 'notice-error' }); 
    }    
}

function preview_imagen_upload(input){ 
    if (tipo_UID == 0){
        cargar_imagen_div();
    }
    else if (tipo_UID == 1 && $("#upload_img_temporada").val() == '') { 
        cargar_imagen_div();
    }
    else if (tipo_UID == 1 && $("#upload_img_temporada").val() != '') { 
        $(".class-save-img").show();
        preview_load_img(input);
    }
    else if (tipo_UID == 2 && $("#upload_img_temporada").val() == ''){   
        cargar_imagen_div();
    }
    else if (tipo_UID == 2 && $("#upload_img_temporada").val() != ''){  
        $(".class-save-img").show();
        preview_load_img(input);
    }
    else if (tipo_UID == 3 && $("#upload_img_temporada").val() == '' ){ 
        cargar_imagen_div();
    }
    else if (tipo_UID == 3 && $("#upload_img_temporada").val() != '' ){ 
        $(".class-save-img").show();
        preview_load_img(input);
    }
}


function preview_load_img(input){ 
    if (validFileType(2, input.files[0])) {
        if (input.files && input.files[0]) {
            var reader =  new FileReader();

            reader.onload = function(e){
                $("#preview_img_temporada_UID").attr("src", e.target.result);
                $("#txt_img_temporada_editada_UID").val(1);
            }

            reader.readAsDataURL(input.files[0]);
            $("#modal_imagen").modal("show");
        }
    }
    else{
        $("#upload_img_temporada").val('')
        $.noticeAdd({ text: "La extensión del archivo no es permitida...", stay: false, type: 'notice-error' }); 
    }
}

function limpiar_file(){
    $("#upload_img_temporada").val('');
}

function validar_temporada_UID() {
    var nombre_es = $("#txt_nombre_es_UID").val().trim();
    var nombre_en = $("#txt_nombre_en_UID").val().trim();
    var descripcion_es = $("#txt_descripcion_es_UID").val().trim();
    var descripcion_en = $("#txt_descripcion_en_UID").val().trim();
    var fecha_ini = $("#txt_fecha_ini_UID").val().trim();
    var fecha_fin = $("#txt_fecha_fin_UID").val().trim();
    var nombre_imagen_S = $("#txt_img_temporada_UID_S").val();
    var nombre_imagen = $("#txt_img_temporada_UID").val();

    if (nombre_es == '') {
        $.noticeAdd({ text: "Debe ingresar el nombre en español.", stay: false, type: 'notice-warn' });
        $("#txt_nombre_es_UID").focus();
        return;
    }
    if (nombre_en == '') {
        $.noticeAdd({ text: "Debe ingresar el nombre en ingles.", stay: false, type: 'notice-warn' });
        $("#txt_nombre_en_UID").focus();
        return;
    }
    /*
    if (descripcion_es == '') {
        $.noticeAdd({ text: "Debe ingresar una descripción en español.", stay: false, type: 'notice-warn' });
        return;
    }
    if (descripcion_en == '') {
        $.noticeAdd({ text: "Debe ingresar una descripción en ingles.", stay: false, type: 'notice-warn' });
        return;
    }
    */
    if (fecha_ini == '') {
        $.noticeAdd({ text: "Debe ingresar una fecha inicio", stay: false, type: 'notice-warn' });
        $("#txt_fecha_ini_UID").focus();
        return;
    }
    if (fecha_fin == '') {
        $.noticeAdd({ text: "Debe ingresar una fecha fin", stay: false, type: 'notice-warn' });
        $("#txt_fecha_fin_UID").focus();
        return;
    }
    if (nombre_imagen == '') {
        $.noticeAdd({ text: "Debe seleccionar una imagen", stay: false, type: 'notice-warn' });
        return;
    }

    if (array_paquete.length == 0) {
        $.noticeAdd({ text: "No ha asociado ningun paquete a la temporada...", stay: false, type: 'notice-warn' });
    }

    guardar_temporada();
}

function guardar_temporada() {
    $("#modal_load").modal("show");

    var nombre_es = $("#txt_nombre_es_UID").val().trim();
    var nombre_en = $("#txt_nombre_en_UID").val().trim();
    var descripcion_es = $("#txt_descripcion_es_UID").val().trim();
    var descripcion_en = $("#txt_descripcion_en_UID").val().trim();
    var fecha_ini = $("#txt_fecha_ini_UID").val().trim();
    var fecha_fin = $("#txt_fecha_fin_UID").val().trim();
    var activa = $('input:radio[name=opt_activa_UID]:checked').val(); //S - N  
    var nombre_imagen_S = $("#txt_img_temporada_UID_S").val();
    var nombre_imagen = $("#txt_img_temporada_UID").val();
    var idimagen = 0;

    var _url = base_url + "AjaxAdministracion/setTemporada_ajax/";

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: tipo_UID,
            idtemporada     : idtemporada_UID,
            idpaquete       : 0,
            nombre_es       : nombre_es,
            nombre_en       : nombre_en,
            descripcion_es  : descripcion_es,
            descripcion_en  : descripcion_en,
            fecha_ini       : fecha_ini,
            fecha_fin       : fecha_fin,
            activa          : activa,
            idimagen        : idimagen,
            nombre_imagen   : nombre_imagen,
            url_imagen      : url_asset_image_temporada + nombre_imagen,
            parametro       : ''
        }
    }).done(function (data) {

        if (data.status == "OK") {
            //guardar_temporada_deta(data.idtemporada);
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-info' });
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición al guardar temporada");
    });

    filtrar_datos();
    $("#modal_temporada_editar").modal("hide");
    $("#modal_load").modal("hide");
}
//#endregion temporada

//#region paquetes

function modal_agregar_paquete(){

    if(idtemporada_UID != "0"){
        array_paquete_add = [];
        cargar_categoria_cmb_paq_UID();
        filtrar_paquetes();
        $("#modal_add_paquete").modal("show");
    }
    else{
        $.noticeAdd({ text: "Debe guardar la temporada...", stay: false, type: 'notice-warn' });
    }
}

function cargar_categoria_cmb_paq_UID() {
    var _url = base_url + "AjaxAdministracion/getCategorias_ajax/";
    $("#cmb_categoria_paq_B").html(''); 

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 3,
            idcategoria: 0,
            idsubcategoria: 0,
            nombre_es: "",
            nombre_es: "",
            activa: "",
            parametro: ""
        }
    }).done(function (data) {

        if (data.status == "OK") {

            $(data.datatable).each(function () {
                
                var item = "";
                if (this.codigo != 0 && this.codigo != 3) {
                    item = '<option value="' + this.codigo + '" > ' + this.nombre + ' </option>';
                }

                $("#cmb_categoria_paq_B").append(item); 
            });     
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición al cargar cmb categoría");
    });
}

function filtrar_paquetes(){

    $("#modal_load").modal("show");

    var _url = base_url + "AjaxAdministracion/getPaquetes_ajax/";
    $('#JD_PaqueteAdd_div').html('');

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 5,
            idtemporada: idtemporada_UID,
            idcategoria: $("#cmb_categoria_paq_B").val(),
            parametro: $("#txt_busqueda_paq_B").val()
        }
    }).done(function (data) {

        if (data.status == "OK") {

            var tbl_ = '<table id="JD_PaqueteAdd" class="table table-striped table-bordered nowrap display" cellspacing="0" width="100%">' +
                            '<thead id="JD_PaqueteAdd_head" style="text-align:center"></thead>' +
                            '<tbody id="JD_PaqueteAdd_body" style="text-align:center"></tbody>' +
                        '</table>'

            $('#JD_PaqueteAdd_div').append(tbl_);

            $('#JD_PaqueteAdd_head').html('');
            $('#JD_PaqueteAdd_body').html('');

        	$('#JD_PaqueteAdd_head').append(	'<tr>' +
                                                '	<th class="text-center"><center><input type="checkbox" id="ckb_paquetes" name="ckb_paquetes" onclick="checked_paquetes_all(1, this)"></center></th>' +
                                                '   <th class="text-center">Paquete</th>' +
                                                '   <th class="text-center">Nombre</th>' +
                                                '   <th class="text-center">F. Inicia</th>' +
                                                '   <th class="text-center">F. Fin</th>' +
                                                '   <th class="text-center">Precio</th>' +
                                                '</tr>');
        	$(data.datatable).each(function () {
                var item = '';
                item += '<tr>';
                item += '   <td><input type="checkbox" class="ckb_paquetes" id="ckb_paquetes_' + this.idpaquete + '" value="' + this.idpaquete + '"></td>';
                item += '   <td>' + this.idpaquete + '</td>';
                item += '   <td>' + this.nombre_en + '</td>';
                item += '   <td>' + this.fecha_ini_vta + '</td>';
                item += '   <td>' + this.fecha_fin_vta + '</td>';
                item += '   <td>$' + this.precio + '</td>';
                item += "</tr>";

                $('#JD_PaqueteAdd_body').append(item);
            });  

            /*=================================================================*/
            /******************DATA TABLE JQUERY CON PAGINADOR******************/
            /*=================================================================*/
            $('#JD_PaqueteAdd').DataTable({                          
                //"pagingType": "full_numbers"                           
                "bSort": true,
                "bFilter": false,
                //"scrollX": true,
                ////"scrollY": "60vh",
                "scrollCollapse": true,
                destroy: true
            });
            /*=================================================================*/
            $('input[type="search"]').attr("placeholder", "Búsqueda");
            $(".dataTables_scrollBody").css("max-height", "50vh");
        }
        else if(data.status == "SIN_DATOS"){
        	$.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-warn' });
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición cargar paquetes...");
    });

    $("#modal_load").modal("hide");
}

function checked_paquetes_all(tipo_, ckb_paquete_) {

    var chequear = 'N';
    
    if (tipo_ == 1) { // desde table column
        if ($(ckb_paquete_).is(':checked')) {
            chequear = 'S';
        }

        if (chequear == "S") {
            $(".ckb_paquetes").prop('checked', true);
        }
        else {
            $(".ckb_paquetes").prop('checked', false);
        }
    }
    else if (tipo_ == 2) { // se ejecutar al filtrar en table
        $(".ckb_paquetes").prop('checked', false);
    }
}

function confirmar_agregar_paquetes() {

    $('#modal_load').modal('show');

    var count_sel = 0;
    array_paquete_add = [];
    $('.ckb_paquetes').each(function (index, value) {

        if ($(this).is(':checked')) {
            count_sel++;            
        }
    });

    if (count_sel > 0) {
        $('#lbl_title_confir').text('Agregar paquetes');
        $("#idtexto_confir").text("Agregara los paquetes a la temporada, este proceso no se puede revertir ¿Desea continuar?");
        $("#btn_paquete_add_remove").attr("onclick","agregar_paquetes()");
        $('#modal_confirma_paquete').modal('show');
    }
    else {
        $.noticeAdd({ text: "Debe marcar los paquetes que desea asociar", stay: false, type: 'notice-warn' });
    }

    $('#modal_load').modal('hide');
}

function agregar_paquetes() {

    $('#modal_load').modal('show');
    var count_sel = 0;

    $('.ckb_paquetes').each(function (index, value) {

        if ($(this).is(':checked')) {
            array_paquete_add.push($(this).val().trim());
            count_sel++;
        }
    });

    if (asociar_paquete_temporada(5) == true) {
        cargar_paquete_temporada();
        $.noticeAdd({ text: "Paquetes asociados con exito, " + count_sel, stay: false, type: 'notice-info' });
        $('#modal_confirma_paquete').modal('hide');
        $("#modal_add_paquete").modal("hide");
    }
    else {
        $.noticeAdd({ text: "Error al asociar paquetes", stay: false, type: 'notice-error' });
    }

    $('#modal_load').modal('hide');
}

function asociar_paquete_temporada(tipo_) {
    $("#modal_load").modal("show");
    var _url = base_url + "AjaxAdministracion/setTemporada_ajax/";
    var boo = false;

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: tipo_,
            idtemporada     : idtemporada_UID,
            parametro       : array_paquete_add.join(',')
        }
    }).done(function (data) {

        if (data.status == "OK") {
            //$.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-info' });
            boo = true;
        }
    //}).fail(function () {
    //    alert("Error en petición al asociar paquetes");
    });
    
    $("#modal_load").modal("hide");
    return boo;
}
//#endregion paquetes

//#region Quitar Paquete

function remover_paquete(type_, idpaquete_){
    $('#modal_load').modal('show');

    idpaquete_UID = idpaquete_;
    $('#lbl_title_confir').text('Remover paquete');
    $("#idtexto_confir").text("Desasociara el paquete de la temporada, este proceso no se puede revertir ¿Desea continuar?");
    $("#btn_paquete_add_remove").attr("onclick","desasociar_paquete_temporada()");
    $('#modal_confirma_paquete').modal('show');
   
    $('#modal_load').modal('hide');
}

function desasociar_paquete_temporada() {
    $("#modal_load").modal("show");
    var _url = base_url + "AjaxAdministracion/setTemporada_ajax/";

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 6,
            idtemporada     : idtemporada_UID,
            idpaquete       : idpaquete_UID
        }
    }).done(function (data) {

        if (data.status == "OK") {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-info' });
            boo = true;
        }
    }).fail(function () {
        alert("Error en petición al desasociar paquete");
    });
    
    $('#modal_confirma_paquete').modal('hide');
    cargar_paquete_temporada();
    $("#modal_load").modal("hide");
}

//#endregion Quitar Paquete