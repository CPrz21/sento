$(document).ready(function () {

	$("#modal_load").modal("show");
    inactivar_promociones();
	format_datepicker("");
	$('#txt_busqueda_producto_B').pressEnter(function () { filtrar_productos(); })
	QFiltro();
	$("#modal_load").modal("hide");

});

//globales B
var tipo_B = 1;
var idpromocion_B = 0;
var nombre_es_B = '';
var nombre_en_B = '';
var activa_B = 'T';
var parametro_B = '';

//globales UID
var tipo_UID = 1;   //1 guardar, 2 edita todo, 3 solo algunos datos
var idpromocion_UID = 0;

var array_producto = [];    //producto agregados

//generales

function fab_options() {
    var item = '';
    item += '<div class="fab-mini-box">';
    item += '   <a onclick="abrir_modal_promocion(1,0)">';
    item += '       <div class="fab-container">';
    item += '           <span class="label">Nueva Promoción</span>';
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

//endgenerales

//principal

function inactivar_promociones() {
    $("#modal_load").modal("show");

    var _url = base_url + "AjaxAdministracion/setPromocion_ajax/";

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo            : 6,
            idpromocion     : 0,
            idproducto      : 0,
            nombre_es       : '',
            nombre_en       : '',
            descripcion_es  : '',
            descripcion_en  : '',
            porc_descuento  : 0,
            fecha_ini       : '',
            fecha_fin       : '',
            activa          : '',
            parametro       : ''
        }
    }).done(function (data) {

        if (data.status == "OK") {
            //$.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-info' });
        }
        else {
            //$.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        //alert("Error en petición al asociar producto a la promoción.");
    });

    $("#modal_load").modal("hide");
}

function QFiltro() {
	
    fab_options();
    $("input[name=opt_estado_B][value=S]").prop('checked', true);

	tipo_B = 1;
	idpromocion_B = 0;
	nombre_es_B = '';
	nombre_en_B = '';
	activa_B = 'T';
	parametro_B = '';

 	filtrar_datos();
}

function filtrar_datos() {
    $("#modal_load").modal("show");

    var _url = base_url + "AjaxAdministracion/getPromociones_ajax/";
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
            idpromocion: idpromocion_B,
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

        	$('#JDTable_head').append(	'<tr>' +
                                       	'	<th class="text-center">Promo</th>' +
                                        '	<th class="text-center">Nombre ES</th>' +
                                        '	<th class="text-center">Nombre EN</th>' +
                                        '	<th class="text-center">% Desc</th>' +
                                        '	<th class="text-center" title="Fecha de inicio">Inicia</th>' +
                                        '	<th class="text-center" title="Fecha de finalización">Fin</th>' +
                                        '   <th class="text-center">Activa</th>' +
                                        '   <th class="text-center">Editar</th>' +
                                    	'</tr>');

             $('#JDTable_foot').append(     '<tr>' +
                                            '	<th class="text-center">Promo</th>' +
		                                    '	<th class="text-center">Nombre ES</th>' +
		                                    '	<th class="text-center">Nombre EN</th>' +
		                                    '	<th class="text-center">% Desc</th>' +
		                                    '	<th class="text-center" title="Fecha de inicio">Inicia</th>' +
		                                    '	<th class="text-center" title="Fecha de finalización">Fin</th>' +
		                                    '   <th class="text-center">Activa</th>' +
		                                    '   <th class="text-center">Editar</th>' +
                                            '</tr>');

        	$(data.datatable).each(function () {
                var item = '';
                item += '<tr>';
                item += '   <td class="id-value">'+ this.idpromocion + '</td>';
                item += '   <td>' + this.nombre_es + '</td>';
                item += '   <td>' + this.nombre_en + '</td>';
                item += '   <td>' + this.porc_descuento + ' %</td>';
                item += '   <td>' + this.fecha_ini + '</td>';
             	item += '   <td>' + this.fecha_fin + '</td>';
                item += '   <td>' + this.activa + '</td>';
                item += '   <td><a title="Editar Promoción" onclick="abrir_modal_promocion(\'' + 2 + '\',\'' + this.idpromocion + '\')"><i class="size-13-5 ion-edit"></i></a></td>';
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
        alert("Error en petición cargar tabla de promociones...");
    });

    $("#modal_load").modal("hide");
}

//endprincipal


//promocion
function abrir_modal_promocion(tipo_, idpromocion_) {
    $("#modal_load").modal("show");
    limpiar_modal_promocion();
    
    if (tipo_ == 1) {	//nueva
        tipo_UID = 1; 
        format_datepicker("");
        deshabilitar_input();        
        $("#lbl_promocion_editar").text("Creación de promoción");
    }
    else if (tipo_ == 2) { 	//modificar todo       
        idpromocion_UID = idpromocion_;
        $("#lbl_promocion_editar").text("Editar Promoción #"+ idpromocion_UID);
        cargar_datos_promocion();
    } 
    
    $("#modal_promocion_editar").modal("show");
    $("#modal_load").modal("hide");
}

function limpiar_modal_promocion() {
	idpromocion_UID = 0;
    $("#txt_nombre_es_UID").val('');
    $("#txt_nombre_en_UID").val('');
    $("#txt_descripcion_es_UID").val('');
    $("#txt_descripcion_en_UID").val('');
	$('#txt_fecha_ini_UID').datepicker('update', "");
	$('#txt_fecha_fin_UID').datepicker('update', "");
    $("#txt_porc_descuento_UID").val('');
    $("#opt_activa_UID").prop('checked', true);
    $('#table_deta_promo_').html('');
    
    //detalle
    array_producto = [];
    $("#table_deta_promo_producto_").html('');
    $("#txt_busqueda_producto_B").val('');
}

function cargar_datos_promocion() {
    var _url = base_url + "AjaxAdministracion/getPromocion_master_ajax/";

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 2,
            idpromocion: idpromocion_UID
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
            $("#txt_porc_descuento_UID").val(data.datatable.porc_descuento);            
            (data.datatable.activa == "S" ? $("#opt_activa_UID").prop('checked', true) : $("#opt_inactiva_UID").prop('checked', true));
                        
            cargar_detalle_promo();
        	deshabilitar_input();
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición al cargar datos de promoción");
    });
}

function deshabilitar_input() {
	if (tipo_UID == 1 || tipo_UID == 2) {
		$(".add-product").show();
		$(".class-save-promo").show();

		$('#txt_nombre_es_UID').attr('readonly', false);
		$('#txt_nombre_en_UID').attr('readonly', false);
		$('#txt_descripcion_es_UID').attr('readonly', false);
		$('#txt_descripcion_en_UID').attr('readonly', false);
		$('#txt_fecha_ini_UID').attr('disabled', false);
		$('#txt_fecha_fin_UID').attr('disabled', false);
		$('#txt_porc_descuento_UID').attr('readonly', false);
		$('#opt_activa_UID').attr('disabled', false);
		$('#opt_inactiva_UID').attr('disabled', false);

        if (tipo_UID == 1) {
            $('#opt_inactiva_UID').attr('disabled', true);
        }
        else{
            $('#opt_inactiva_UID').attr('disabled', false);
        }
	}
	else if(tipo_UID == 3){
		$(".add-product").show();
		$(".class-save-promo").show();

		$('#txt_nombre_es_UID').attr('readonly', true);
		$('#txt_nombre_en_UID').attr('readonly', true);
		$('#txt_descripcion_es_UID').attr('readonly', true);
		$('#txt_descripcion_en_UID').attr('readonly', true);
		$('#txt_fecha_ini_UID').attr('disabled', true);
		$('#txt_fecha_fin_UID').attr('disabled', false);
		$('#txt_porc_descuento_UID').attr('readonly', true);
		$('#opt_activa_UID').attr('disabled', false);
		$('#opt_inactiva_UID').attr('disabled', false);
	}
	else if(tipo_UID == 0){
		$(".add-product").hide();
		$(".class-save-promo").hide();

		$('#txt_nombre_es_UID').attr('readonly', true);
		$('#txt_nombre_en_UID').attr('readonly', true);
		$('#txt_descripcion_es_UID').attr('readonly', true);
		$('#txt_descripcion_en_UID').attr('readonly', true);
		$('#txt_fecha_ini_UID').attr('disabled', true);
		$('#txt_fecha_fin_UID').attr('disabled', true);
		$('#txt_porc_descuento_UID').attr('readonly', true);
		$('#opt_activa_UID').attr('disabled', true);
		$('#opt_inactiva_UID').attr('disabled', true);
	}
}

function cargar_detalle_promo() {
    $("#modal_load").modal("show");

	var _url = base_url + "AjaxAdministracion/getPromociones_ajax/";
	$('#table_deta_promo_').html('');
	array_producto = [];

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 3,
            idpromocion: idpromocion_UID
        }
    }).done(function (data) {

        if (data.status == "OK") {
            
        	$(data.datatable).each(function () {
				$("#tr_i_" + this.idproducto +"_b").remove();

				var add = '';
				add =  "<tr id='tr_producto_" + this.idproducto + "'>";
				add += '   <td align="center">' + this.idproducto + '</td>';
				add += '   <td>' + this.nombre_en.trim() + '</td>';
				add += '   <td align="center">$ ' + this.precio + '</td>';
				add += '   <td align="center" class="class-del">';
				add += '		'+ (tipo_UID == 2 ? '<a title="Eliminar" onclick="eliminar_producto(\'' + this.idproducto + '\')"><i class="zmdi zmdi-delete zmdi-hc-lg"></i></a>' : '-');
				add += '   </td>';
				add += "</tr>";
				$('#table_deta_promo_').append(add);

				array_producto.push(this.idproducto);
            }); 

        }
        else if(data.status == "SIN_DATOS"){
        	$.noticeAdd({ text: "No se encontraron productos en la promoción...", stay: false, type: 'notice-warn' });
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición al cargar artícuos de promoción...");
    });

    $("#modal_load").modal("hide");
}


function validar_promocion_UID() {
    var nombre_es = $("#txt_nombre_es_UID").val().trim();
    var nombre_en = $("#txt_nombre_en_UID").val().trim();
    var descripcion_es = $("#txt_descripcion_es_UID").val().trim();
    var descripcion_en = $("#txt_descripcion_en_UID").val().trim();
    var fecha_ini = $("#txt_fecha_ini_UID").val().trim();
    var fecha_fin = $("#txt_fecha_fin_UID").val().trim();
    var porc_descuento = $("#txt_porc_descuento_UID").val().trim();   

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

    if (porc_descuento == "") {
        $.noticeAdd({ text: "Debe ingresar el porcentaje de descuento.", stay: false, type: 'notice-warn' });
        $("#txt_porc_descuento_UID").focus();
        return;
    }
    else {
        if (!regex_decimal.test(porc_descuento)) {
            $.noticeAdd({ text: "El porcentaje debe ser ingresado con el formato XXX.XX", stay: false, type: 'notice-warn' });
            $("#txt_porc_descuento_UID").focus();
            return;
        }

        if (porc_descuento <= 0) {
            $.noticeAdd({ text: "El porc. de descuento debe ser mayor a 0.00", stay: false, type: 'notice-warn' });
            $("#txt_porc_descuento_UID").focus();
            return;
        }
        else if (porc_descuento > 100.00) {
            $.noticeAdd({ text: "El porc. de descuento no debe ser mayor a 100.00", stay: false, type: 'notice-warn' });
            $("#txt_porc_descuento_UID").focus();
            return;
        }
    }

    if (array_producto.length == 0) {
    	$.noticeAdd({ text: "Debe agregar productos a la promoción...", stay: false, type: 'notice-warn' });
        return;
    }

    guardar_promocion();
}


function guardar_promocion() {
    $("#modal_load").modal("show");

    var nombre_es = $("#txt_nombre_es_UID").val().trim();
    var nombre_en = $("#txt_nombre_en_UID").val().trim();
    var descripcion_es = $("#txt_descripcion_es_UID").val().trim();
    var descripcion_en = $("#txt_descripcion_en_UID").val().trim();
    var fecha_ini = $("#txt_fecha_ini_UID").val().trim();
    var fecha_fin = $("#txt_fecha_fin_UID").val().trim();
    var porc_descuento = $("#txt_porc_descuento_UID").val().trim();
    var activa = $('input:radio[name=opt_activa_UID]:checked').val(); //S - N   

    var _url = base_url + "AjaxAdministracion/setPromocion_ajax/";

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: tipo_UID,
            idpromocion	    : idpromocion_UID,
            idproducto      : 0,
            nombre_es       : nombre_es,
            nombre_en       : nombre_en,
            descripcion_es  : descripcion_es,
            descripcion_en  : descripcion_en,
            porc_descuento  : porc_descuento,
	        fecha_ini  		: fecha_ini,
	        fecha_fin  		: fecha_fin,
            activa          : activa,
            parametro       : ''
        }
    }).done(function (data) {

        if (data.status == "OK") {
            guardar_promocion_deta(data.idpromocion);
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-info' });
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición al guardar promoción");
    });

    filtrar_datos();
    $("#modal_promocion_editar").modal("hide");
    $("#modal_load").modal("hide");
}

function guardar_promocion_deta(idpromocion_) {
    $("#modal_load").modal("show");

    idpromocion_UID = idpromocion_;
    var _url = base_url + "AjaxAdministracion/setPromocion_ajax/";

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo 			: (tipo_UID == 3 ? 5 : 4),
            idpromocion     : idpromocion_UID,
            idproducto      : 0,
            nombre_es       : '',
            nombre_en       : '',
            descripcion_es  : '',
            descripcion_en  : '',
            porc_descuento  : 0,
	        fecha_ini  		: '',
	        fecha_fin  		: '',
            activa          : '',
            parametro       : array_producto.join(',')
        }
    }).done(function (data) {

        if (data.status == "OK") {
            //$.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-info' });
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición al asociar producto a la promoción.");
    });

    $("#modal_load").modal("hide");
}


/* PRODUCTOS */

function modal_agregar_producto() {
	$("#modal_promo_producto_B").modal("show");
}

function filtrar_productos() {
    $("#modal_load").modal("show");

    var _url = base_url + "AjaxAdministracion/getProductos_ajax/";
    $('#table_deta_promo_producto_').html('');

    if ($("#txt_busqueda_producto_B").val().trim() != "") 
    {
    	$.ajax({
	        async: false,
	        cache: false,
	        url: _url,
	        type: 'post',
	        dataType: 'json',
	        data: {
	            tipo: 3,
	            idproducto: 0,
	            idtipo_producto: 1,            
				idcategoria: 0,
				idsubcategoria: 0,
				nombre_es: '',
				nombre_en:'',
				activo: 'S',
				parametro: $("#txt_busqueda_producto_B").val().trim(),
				parametro2: array_producto.join(',')
	        }
	    }).done(function (data) {

	        if (data.status == "OK") {

	        	$(data.datatable).each(function () {
					var item = '';
					item = '<tr id="tr_i_' + this.idproducto + '_b">';
					item += '   <td class="text-vertical-center" align="center"><input class="ckb_producto_all" type="checkbox" id="ckb_producto_all_' + this.idproducto + '" value="' + this.idproducto + '"></td>';
					item += '   <td class="text-vertical-center" align="center">' + this.idproducto + '</td>';
					item += '   <td class="text-vertical-center">' + this.nombre_en + '</td>';
					item += '   <td class="text-vertical-center" align="center">$ ' + this.precio + '</td>';
					item += "</tr>";
					$('#table_deta_promo_producto_').append(item);
	            });  

	        }
	        else if(data.status == "SIN_DATOS"){
	        	$.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-warn' });
	        }
	        else {
	            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
	        }
	    }).fail(function () {
	        alert("Error en petición cargar tabla de productos...");
	    });
    }
    else
    {
    	$.noticeAdd({ text: "El campo de búsqueda no puede ser vacío...", stay: false, type: 'notice-warn' });
    }

    $("#modal_load").modal("hide");
}

function checked_productos_all(tipo_, ckb_producto_) {

    var chequear = 'N';

    if (tipo_ == 1) { // desde table column
        if ($(ckb_producto_).is(':checked')) {
            chequear = 'S';
        }

        if (chequear == "S") {
            $(".ckb_producto_all").prop('checked', true);
        }
        else {
            $(".ckb_producto_all").prop('checked', false);
        }
    }
}

function agregar_producto() {
               
    $('.ckb_producto_all').each(function (index, value) {

        var producto_ = $(this).val().trim();
        if ($("#ckb_producto_all_" + producto_).is(':checked')) {

            var producto_ = $("#tr_i_" + producto_ +"_b").find("td").eq(1).html();
            var nombre_ = $("#tr_i_" + producto_ +"_b").find("td").eq(2).html();
            var precio_ = $("#tr_i_" + producto_ +"_b").find("td").eq(3).html();

            $("#tr_i_" + producto_ +"_b").remove();

            var add = "<tr id='tr_producto_" + producto_ + "'>";
            add += '   <td align="center">' + producto_ + '</td>';
            add += '   <td>' + nombre_.trim() + '</td>';
            add += '   <td align="center">' + precio_ + '</td>';
            add += '   <td align="center" class="class-del"><a title="Eliminar" onclick="eliminar_producto(\'' + producto_ + '\')"><i class="zmdi zmdi-delete zmdi-hc-lg"></i></a></td>';
            add += "</tr>";
            $('#table_deta_promo_').append(add);

            array_producto.push(producto_);
        }
    });    
}

function eliminar_producto(_idproducto) {
    $("#tr_producto_" + _idproducto).remove();
      
    //elimina de array
    i = array_producto.indexOf(_idproducto);
    if (i != -1) {
        array_producto.splice(i, 1);
    }
}

//endpromocion