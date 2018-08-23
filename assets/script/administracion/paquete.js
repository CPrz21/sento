$(document).ready(function () {

    $("#modal_load").modal("show");
    inactivar_paquetes();
    $('#txt_busqueda_producto_B').pressEnter(function () { filtrar_productos(); })
    QFiltro();
    $("#modal_load").modal("hide");
});


//#region VAR GLOBALES
var tipo_B = 1;
var idpaquete_B = 0;
var idtemporada_B = 0;
var idcategoria_B = 0;
var nombre_es_B = '';
var nombre_en_B = '';
var activo_B = 'T';
var parametro_B = '';

var idpaquete_UID = 0;
var tipo_UID = 1;
var editar_UID = 0; //1 editar, 2 activo solo editar estado, 0 no editar

var array_deta_paquete = [];   //condiciones agregados 
var array_deta_paquete_id = 0; //correlativo detalle paquete

var array_deta_paquete_items = [];      //productos de condicion
var array_deta_paquete_items_id = 0;    //correlativo de condicion

//#endregion VAR GLOBALES

//#region GENERALES

function format_datepicker(dateinivta_) {   
    $("#txt_fechainivta_UID").remove();
    $("#div_fecha_inivta").append('<input id="txt_fechainivta_UID" type="text" class="form-control" placeholder="DD-MM-YYYY" maxlength="10"/>');
    
    if (editar_UID == 1) {
        $('#txt_fechainivta_UID').datepicker({
            todayHighlight: true,
            format: "dd-mm-yyyy",
            language: "es",
            todayBtn: "linked",
            clearBtn: false,
            autoclose: true,
            startDate: "dateToday"
        });

        $(document).on('change', '#txt_fechainivta_UID', function () {
            var startdate = $(this).val();
    
            var startDate_ = $('#txt_fechafinvta_UID').datepicker({
                todayHighlight: true,
                format: "dd-mm-yyyy",
                language: "es",
                todayBtn: "linked",
                clearBtn: true,
                autoclose: true,
                startDate: "dateToday"
            });
            startDate_.datepicker("setStartDate", startdate);
        });
    }
    else {        
        $('#txt_fechainivta_UID').datepicker({
            todayHighlight: true,
            format: "dd-mm-yyyy",
            language: "es",
            todayBtn: "linked",
            clearBtn: false,
            autoclose: true,
            startDate: dateinivta_
        });

        $('#txt_fechafinvta_UID').datepicker({
            todayHighlight: true,
            format: "dd-mm-yyyy",
            language: "es",
            todayBtn: "linked",
            clearBtn: false,
            autoclose: true,
            startDate: "dateToday"
        });
    
        $('#txt_fecha_vence_canje_UID').datepicker({
            todayHighlight: true,
            format: "dd-mm-yyyy",
            language: "es",
            todayBtn: "linked",
            clearBtn: false,
            autoclose: true,
            startDate: "dateToday"
        });
    }
      
    $(document).on('change', '#txt_fechafinvta_UID', function () { 
        var startdate = $(this).val();
        
        var startDate_ = $('#txt_fecha_vence_canje_UID').datepicker({
            todayHighlight: true,
            format: "dd-mm-yyyy",
            language: "es",
            todayBtn: "linked",
            clearBtn: false,
            autoclose: true,
            startDate: "dateToday"
        });
        startDate_.datepicker("setStartDate", startdate);
    });
    
    $(document).on('change', '#txt_fecha_vence_canje_UID', function () {
        var enddate = $(this).val();

        var endDate_ = $('#txt_fechafinvta_UID').datepicker({
            todayHighlight: true,
            format: "dd-mm-yyyy",
            language: "es",
            todayBtn: "linked",
            clearBtn: false,
            autoclose: true,
            startDate: "dateToday"
        });
        endDate_.datepicker("setEndDate", enddate);
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
//#endregion GENERALES

//#region PRINCIPAL

function inactivar_paquetes() {
    $("#modal_load").modal("show");

    var _url = base_url + "AjaxAdministracion/setPaquete_ajax/";

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 2,
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
        alert("Error en petición inactivar paquetes");
    });
    $("#modal_load").modal("hide");
}

function QFiltro() {

    $("input[name=opt_estado_B][value=S]").prop('checked', true);

    tipo_B = 1;
    idcategoria_B = 0;
    nombre_es_B = '';
    nombre_en_B = '';
    activo_B = 'T';
    parametro_B = '';

    format_datepicker("");
    cargar_categoria_cmb_B();
    filtrar_datos();
}

function cargar_categoria_cmb_B() {
    var _url = base_url + "AjaxAdministracion/getCategorias_ajax/";
    $("#cmb_categoria_B").html(''); 

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
                if (this.codigo != 0) {
                    item = '<option value="' + this.codigo + '" > ' + this.nombre + ' </option>';
                }

                $("#cmb_categoria_B").append(item); 
            });     
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición al cargar cmb categoría");
    });
}

function filtrar_datos() {
    $("#modal_load").modal("show");

    var _url = base_url + "AjaxAdministracion/getPaquetes_ajax/";
    activo_B = $('input:radio[name=opt_estado_B]:checked').val();
    idcategoria_B = $("#cmb_categoria_B").val();

    $('#JDTable_div').html('');

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 1,
            idcategoria: idcategoria_B,
            nombre_es: nombre_es_B,
            nombre_en: nombre_en_B,
            activo: activo_B,
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
                                        '   <th class="text-center">Paquete</th>' +
                                        '   <th class="text-center">Código POS</th>' +
                                        '   <th class="text-center">Categoría</th>' +
                                        '   <th class="text-center">Nombre EN</th>' +
                                        '   <th class="text-center">Precio</th>' +
                                        '   <th class="text-center" title="Cantidad maxima de venta">Cant. Max</th>' +
                                        '   <th class="text-center">Activo</th>' +
                                        '   <th class="text-center">Editar</th>' +
                                        '</tr>');

             $('#JDTable_foot').append(     '<tr>' +
                                            '   <th class="text-center">Paquete</th>' +
                                            '   <th class="text-center">Código POS</th>' +
                                            '   <th class="text-center">Categoría</th>' +
                                            '   <th class="text-center">Nombre EN</th>' +
                                            '   <th class="text-center">Precio</th>' +
                                            '   <th class="text-center" title="Cantidad maxima de venta">Cant. Max</th>' +
                                            '   <th class="text-center">Activo</th>' +
                                            '   <th class="text-center">Editar</th>' +
                                            '</tr>');

            $(data.datatable).each(function () {
                var item = '';
                item += '<tr>';
                item += '   <td class="id-value">'+ this.idpaquete + '</td>';
                item += '   <td>'+ this.codigo_pos + '</td>';
                item += '   <td>'+ this.categoria + '</td>';
                item += '   <td>' + this.nombre_en + '</td>';
                item += '   <td>$ ' + this.precio + '</td>';
                item += '   <td>' + this.cantidad_max + '</td>';
                item += '   <td>' + this.activo + '</td>';
                item += '   <td><a title="Editar Paquete" onclick="abrir_modal_paquete(\'' + 2 + '\',\'' + this.idpaquete + '\')"><i class="size-13-5 ion-edit"></i></a></td>';
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
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-warn' });
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición al cargar tabla de Paquetes...");
    });

    $("#modal_load").modal("hide");
}

//#endregion PRINCIPAL

//#region paquete 
function abrir_modal_paquete(tipo_, idpaquete_) {
    $("#modal_load").modal("show");
    limpiar_modal_paquete();
    
    if (tipo_ == 2) {  //modificar paquete       
        idpaquete_UID = idpaquete_;
        $("#lbl_paquete_editar").text("Editar paquete #"+ idpaquete_UID);
        cargar_datos_paquete(tipo_, idpaquete_);
        cargar_paquete_detalle(idpaquete_);
    } 
    
    $("#modal_paquete_editar").modal("show");
    $("#modal_load").modal("hide");
}

function limpiar_modal_paquete() {
    idpaquete_UID = 0;
    $(".class-save-paquete").show();
    $("#txt_nombre_es_UID").val('');
    $("#txt_nombre_en_UID").val('');
    $("#txt_descripcion_es_UID").val('');
    $("#txt_descripcion_en_UID").val('');
    $('#txt_fecha_vence_canje_UID').datepicker('update', "");
    $("#txt_precio_UID").val('');
    $("#cmb_categoria_UID").html(''); 
  	$("#txt_cant_max_UID").val('');
    $("#opt_activa_UID").prop('checked', true);

    /*
    $('#table_deta_paquete_').html('');
    
    //detalle
    array_detalle = [];
    $("#table_deta_promo_paquete_").html('');
    $("#txt_busqueda_paquete_B").val('');
    */

    cargar_categoria_cmb_UID();
}

function cargar_datos_paquete(type_, idpaquete_){

    var _url = base_url + "AjaxAdministracion/getPaquete_ajax/";

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 2,
            idpaquete: idpaquete_
        }
    }).done(function (data) {

        if (data.status == "OK") {

            editar_UID = data.datatable.editar;

            $("#txt_nombre_es_UID").val(data.datatable.nombre_es);
            $("#txt_nombre_en_UID").val(data.datatable.nombre_en);
            $("#txt_descripcion_es_UID").val(data.datatable.descripcion_es);
            $("#txt_descripcion_en_UID").val(data.datatable.descripcion_en);

            $("#txt_tipo_vence_canje_UID").val((data.datatable.tipo_vence_canje == "D" ? "Días" : "Fecha"));
            if (data.datatable.tipo_vence_canje == "F"){ //fecha
                $('#txt_fecha_vence_canje_UID').datepicker('update', data.datatable.fecha_vence_canje);
                $("#div_tipovence_dias").hide();
                $("#div_tipovence_fijo").show();
            }
            else{
                $('#txt_dias_vigencia_canje_UID').val(data.datatable.dias_vence_canje);  
                $("#div_tipovence_dias").show();
                $("#div_tipovence_fijo").hide();
            }
            
            $("#txt_precio_UID").val(data.datatable.precio);
            $("#cmb_categoria_UID").val(data.datatable.idcategoria); 
            $("#txt_cant_max_UID").val(data.datatable.cantidad_max); 

            format_datepicker(data.datatable.fecha_ini_vta);
            $('#txt_fechainivta_UID').datepicker('update', data.datatable.fecha_ini_vta);
            $('#txt_fechafinvta_UID').datepicker('update', data.datatable.fecha_fin_vta);
            
            if (editar_UID == 1){
                $("#txt_fechainivta_UID").prop('disabled', false);
            }
            else if (editar_UID == 2){
                $("#txt_fechainivta_UID").prop('disabled', 'disabled');
            }
            else{ //0
                $(".class-save-paquete").hide();
                $("#txt_fechainivta_UID").prop('disabled', 'disabled');
            }

            if (data.datatable.activo == "S"){
                $("#opt_activo_UID").prop('checked', true);
            }
            else{
                $("#opt_inactivo_UID").prop('checked', true);
            }
            
        }
        else if(data.status == "SIN_DATOS"){
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-warn' });
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición al cargar detalle de Paquete...");
    });

    $("#modal_load").modal("hide");
}

function cargar_categoria_cmb_UID() {
    var _url = base_url + "AjaxAdministracion/getCategorias_ajax/";
    $("#cmb_categoria_UID").html(''); 

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

                $("#cmb_categoria_UID").append(item); 
            });     
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición al cargar cmb categoría");
    });
}

function cargar_temporada_cmb_UID() { /* borrar */
    var _url = base_url + "AjaxAdministracion/getTemporadas_ajax/";
    $("#cmb_temporada_UID").html(''); 

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 4,            
            parametro: ""
        }
    }).done(function (data) {

        if (data.status == "OK") {

            $(data.datatable).each(function () {
                
                var item = "";
                if (this.codigo != 0) {
                    item = '<option value="' + this.codigo + '" > ' + this.nombre + ' </option>';
                }

                $("#cmb_temporada_UID").append(item); 
            });     
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición al cargar cmb temporada");
    });
}

//#endregion paquete

//#region detalle

function cargar_paquete_detalle(idpaquete) {
    $("#modal_load").modal("show");

    /*======================= DETALLE =====================*/
    var _url = base_url + "AjaxAdministracion/getPaquetes_ajax/";
    $('#table_deta_paquete_').html('');
    array_deta_paquete_id = 0;
    array_deta_paquete = []; 

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 3,
            idpaquete: idpaquete,
            parametro: ""
        }
    }).done(function (data) {

        if (data.status == "OK") {

            var i = 0;
            $(data.datatable).each(function () {
                array_deta_paquete_id = this.correlativo;

                var add = "<tr id='tr_item_" + array_deta_paquete_id + "'>";
                add += '   <td align="center">' + array_deta_paquete_id + '</td>';
                add += '   <td align="center">' + this.descripcion_en + '</td>';
                add += '   <td align="center">' + (this.tipolinea == "N" ? "Fijo" : "Opcional") + '</td>';
                add += '   <td align="center">$ ' + this.preciograv + '</td>';
                add += '   <td align="center"><a title="Ver detalle" onclick="abrir_condicion_deta_paquete(\'' + array_deta_paquete_id + '\')"><i class="size-13-5 ion-information-circled"></i></a>';
                add += "</tr>"; 
                $('#table_deta_paquete_').append(add);

                array_deta_paquete[i] = new Array(5); 
                array_deta_paquete[i][0] = array_deta_paquete_id; //correlativo
                array_deta_paquete[i][1] = this.descripcion_es;
                array_deta_paquete[i][2] = this.descripcion_en;
                array_deta_paquete[i][3] = this.tipolinea; //N - O
                array_deta_paquete[i][4] = this.preciograv; 
                i++;
            });
        }
        else {
            $.noticeAdd({ text: "Error al cargar detalle de paquete...", stay: false, type: 'notice-error' });
        }

    }).fail(function () {
        alert("Error en petición al cargar detalle de Paquete...");
    });


    /*======================= PRODUCTO =====================*/
    _url = base_url + "AjaxAdministracion/getPaquetes_ajax/";
    array_deta_paquete_items_id = 0;
    array_deta_paquete_items = []; 

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 4,
            idpaquete: idpaquete,
            parametro: ""
        }
    }).done(function (data) {

        if (data.status == "OK") {

            array_deta_paquete_items_id = 1;
            i = 0;
            $(data.datatable).each(function () {
                array_deta_paquete_items[i] = new Array(4); //deta promo
                array_deta_paquete_items[i][0] = this.correlativo;        //correlativo del padre
                array_deta_paquete_items[i][1] = this.idproducto;         //producto
                array_deta_paquete_items[i][2] = this.nombre_en;          //DESCRIPCION
                array_deta_paquete_items[i][3] = this.precio_estandar;    //PRECIO
                i++;
                array_deta_paquete_items_id++;
            });
        }
        else {
            $.noticeAdd({ text: "Error al cargar detalle de productos del paquete...", stay: false, type: 'notice-error' });
        }

    }).fail(function () {
        alert("Error en petición al cargar detalle de productos del Paquete...");
    });

    $("#modal_load").modal("hide");
}








//#endregion detalle

//#region producto
function abrir_condicion_deta_paquete(array_deta_paquete_id_) { 

    $("#table_deta_paquete_producto_").html('');
    var correlativo = 0;

    array_deta_paquete.forEach(function (elemento, indice, array) {
        if (elemento[0] == array_deta_paquete_id_) {      
            
            $("#txt_descripcion_es_deta_UID").val(elemento[1]);
            $("#txt_descripcion_en_deta_UID").val(elemento[2]);
            $("#txt_tipo_deta_UID").val( (elemento[3] == "N" ? "Normal" : "Opcional")) ;
            $("#txt_precio_deta_UID").val(elemento[4]);
        }
    });

    correlativo = 0;

    array_deta_paquete_items.forEach(function (elemento, indice, array) {
        if (elemento[0] == array_deta_paquete_id_) { 
            
            correlativo++;

            var idproduct = elemento[1];
            var descrip_ = elemento[2].trim();
            var precio_ = elemento[3].trim();

            $("#tr_i_" + idproduct + "_b").remove();

            var add = "<tr id='tr_item_" + idproduct + "'>";
            add += '   <td align="center">' + correlativo + '</td>';
            add += '   <td align="center">' + idproduct + '</td>';
            add += '   <td>' + descrip_ + '</td>';
            add += '   <td align="center">$ ' + precio_ + '</td>';
            add += "</tr>";
            $('#table_deta_paquete_producto_').append(add);
        }
    });
    
    $("#modal_paquete_deta_UID").modal("show");
}

//#endregion producto


//#region Paquete Guardar 

function validar_paquete_UID(){
    var fecha_inivta = $("#txt_fechainivta_UID").val().trim();
    var fecha_finvta = $("#txt_fechafinvta_UID").val().trim();
    var tipo_vence_canje =  $("#txt_tipo_vence_canje_UID").val().trim();
    var dias_vengencia = $("#txt_dias_vigencia_canje_UID").val().trim();
    var fecha_fin_canje = $("#txt_fecha_vence_canje_UID").val().trim();
    var cantidad_max_vta = $("#txt_cant_max_UID").val().trim();

    if (fecha_inivta == '') {
        $.noticeAdd({ text: "Debe ingresar una fecha inicio de venta", stay: false, type: 'notice-warn' });
        $("#txt_fechafinvta_UID").focus();
        return;
    }
    if (fecha_finvta == '') {
        $.noticeAdd({ text: "Debe ingresar una fecha fin de venta", stay: false, type: 'notice-warn' });
        $("#txt_fechafinvta_UID").focus();
        return;
    }
    if (tipo_vence_canje == 'Días') {
        if (dias_vengencia == '') {
            $.noticeAdd({ text: "Debe ingresar una cantidad de días de vigencia", stay: false, type: 'notice-warn' });
            $("#txt_dias_vigencia_canje_UID").focus();
            $("#txt_dias_vigencia_canje_UID").val(0);
            return;
        }
        if (dias_vengencia == 0) {
            $.noticeAdd({ text: "Debe ingresar una cantidad de días de vigencia mayor a cero.", stay: false, type: 'notice-warn' });
            $("#txt_dias_vigencia_canje_UID").focus();
            return;
        }
    }
    else if (tipo_vence_canje == 'Fecha') {
        if (fecha_fin_canje == '') {
            $.noticeAdd({ text: "Debe ingresar una fecha fin de canje", stay: false, type: 'notice-warn' });
            $("#txt_tipo_vence_canje_UID").focus();
            return;
        }
    }

    if (cantidad_max_vta == '') {
        $.noticeAdd({ text: "Debe ingresar una cantidad maxima de venta", stay: false, type: 'notice-warn' });
        $("#txt_cant_max_UID").focus();
        $("#txt_cant_max_UID").val(0);
        return;
    }
    if (cantidad_max_vta == 0) {
        $.noticeAdd({ text: "La cantidad maxima de venta debe ser mayor a cero.", stay: false, type: 'notice-warn' });
        $("#txt_cant_max_UID").focus();
        return;
    }

    guardar_paquete();
}

function guardar_paquete() {
    $("#modal_load").modal("show");

    var categoria = $("#cmb_categoria_UID").val().trim();
    var fecha_inivta = $("#txt_fechainivta_UID").val().trim();
    var fecha_finvta = $("#txt_fechafinvta_UID").val().trim();
    var tipo_vence_canje =  $("#txt_tipo_vence_canje_UID").val().trim();
    var dias_vengencia = $("#txt_dias_vigencia_canje_UID").val().trim();
    var fecha_fin_canje = $("#txt_fecha_vence_canje_UID").val().trim();
    var cantidad_max_vta = $("#txt_cant_max_UID").val().trim();
    var activo = $('input:radio[name=opt_activo_UID]:checked').val(); //S - N  

    var _url = base_url + "AjaxAdministracion/setPaquete_ajax/";

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 1,
            idpaquete       : idpaquete_UID,
            idcategoria     : categoria,
            fecha_ini_vta    : fecha_inivta,
            fecha_fin_vta   : fecha_finvta,
            dias_vence_canje : dias_vengencia,
            fecha_vence_canje : fecha_fin_canje,
            activo          : activo,
            cantidad_max    : cantidad_max_vta,
            parametro       : ''
        }
    }).done(function (data) {

        if (data.status == "OK") {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-info' });
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición al guardar paquete");
    });

    filtrar_datos();
    $("#modal_paquete_editar").modal("hide");
    $("#modal_load").modal("hide");
}

//#endregion Paquete Guardar