$(document).ready(function () {
   $("#modal_load").modal("show");
   QFiltro();
   $("#modal_load").modal("hide");
});


//globales B
var tipo_B = 1;
var idcategoria_B = 0;
var idsubcategoria_B = 0;
var nombre_B = "";
var activa_B = "S";
var parametro_B = "";

//globales UID
var tipo_UID = 0;
var idcategoria_UID = 0;
var idsubcategoria_UID = 0;

//generales
function fab_options() {

    var item = '';
    if ($('#cmb_tipo_B').val() == 2) {
        item += '<div class="fab-mini-box">';
        item += '   <a onclick="abrir_modal_subcategoria(1,0)">';
        item += '       <div class="fab-container">';
        item += '           <span class="label">Nueva Subcategoría</span>';
        item += '           <div class="fab-mini">';
        item += '               <i class="zmdi zmdi-plus zmdi-hc-2x"></i>';
        item += '           </div>';
        item += '       </div>';
        item += '   </a>';
        item += '</div>';
    }

    if (item != '') {
        item += '<div class="fab-normal" id="options">';
        item += '    <i class="zmdi zmdi-toys zmdi-hc-2x"></i>';
        item += '</div> ';

        $("#fab_options").append(item);
    }
}

function cargar_tipos() {
    $('#cmb_tipo_B').html('');

    $('#cmb_tipo_B').append('<option value="1" selected>Categoría</option>');
    $('#cmb_tipo_B').append('<option value="2">Subcategoría</option>');
}

function cargar_categorias_cmb_B() {
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
                if (this.codigo == 0) {
                    item = '<option value="' + this.codigo + '" selected> ' + this.nombre + ' </option>';
                }
                else {
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

function cambiar_tipo() {
    tipo_B = $("#cmb_tipo_B").val();
    
    if (tipo_B == 1) {
        $("input[name=opt_estado_B]").hide();
        $(".opt_estado_B").hide();
        $(".cmb_categoria_B").hide();
    }
    else if (tipo_B == 2) {
        $("input[name=opt_estado_B]").show();
        $(".opt_estado_B").show();
        $(".cmb_categoria_B").show();
    }

    fab_options();
    cargar_categorias_cmb_B();
}

function QFiltro() {
	$("input[name=opt_estado_B][value=S]").prop('checked', true);
	cargar_tipos();
    cambiar_tipo();

	tipo_B = $("#cmb_tipo_B").val();
	idcategoria_B = $("#cmb_categoria_B").val();
	idsubcategoria_B = 0;
	nombre_B = "";
	activa_B = $('input:radio[name=opt_estado_B]:checked').val();
	parametro_B = "";

 	filtrar_datos();
}


function filtrar_datos() {
    $("#modal_load").modal("show");

    var _url = base_url + "AjaxAdministracion/getCategorias_ajax/";

    tipo_B = $("#cmb_tipo_B").val();
    activa_B = $('input:radio[name=opt_estado_B]:checked').val();
    idcategoria_B = $("#cmb_categoria_B").val();

    $('#JDTable_div').html('');

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: tipo_B,
			idcategoria: idcategoria_B,
			idsubcategoria: idsubcategoria_B,
			nombre_es: nombre_B,
			nombre_en: nombre_B,
			activa: activa_B,
			parametro: ""
        }
    }).done(function (data) {
        
        if (data.status == "OK") {

            var tbl_ = '<table id="JDTable" class="table table-striped table-bordered nowrap display" cellspacing="0" width="100%">' +
                            '<thead id="JDTable_head" style="text-align:center"></thead>' +
                            '<tbody id="JDTable_body" style="text-align:center"></tbody>' +
                        '</table>'

            $('#JDTable_div').append(tbl_);

            $('#JDTable_head').html('');
            $('#JDTable_body').html('');

            if ($("#cmb_tipo_B").val() == 1) {
            	$('#JDTable_head').append(	'<tr class="text-center">' +
	                                       	'	<th>Categoría</th>' +
	                                        '	<th>Nombre ES</th>' +
	                                        '	<th>Nombre EN</th>' +
	                                        '	<th>Descripción ES</th>' +
	                                        '	<th>Descripción EN</th>' +
                                            '   <th>Detalle</th>' +
	                                    	'</tr>');

            	$(data.datatable).each(function () {
                    var item = '';
                    item += '<tr>';
                    item += '   <td class="id-value">'+ this.idcategoria + '</td>';
                    item += '   <td>' + this.nombre_es + '</td>';
                    item += '   <td>' + this.nombre_en + '</td>';
                    item += '   <td>' + this.descripcion_es + '</td>';
                    item += '   <td>' + this.descripcion_en + '</td>';
                    item += '   <td><a title="Ver Categoría" onclick="abrir_modal_categoria(\'' + 2 + '\',\'' + this.idcategoria + '\')"><i class="size-13-5 ion-information-circled"></i></a></td>';
                    item += "</tr>";

                    $('#JDTable_body').append(item);
                });     
            }
			else if ($("#cmb_tipo_B").val() == 2) {
            	$('#JDTable_head').append(	'<tr class="text-center">' +
                                            '	<th>Subcategoría</th>' +
                                            '	<th>Código POS</th>' +
                                            '	<th>Nombre ES</th>' +
                                            '	<th>Nombre EN</th>' +
	                                        '	<th>Descripción ES</th>' +
	                                        '	<th>Descripción EN</th>' +
	                                        '	<th>Categoria</th>' +
	                                        '	<th>Activa</th>' +
                                            '   <th>Editar</th>' +
	                                    	'</tr>');

            	$(data.datatable).each(function () {
	                var item = '';
	                item += '<tr>';
                    item += '   <td class="id-value">'+ this.idsubcategoria + '</td>';
                    item += '   <td>' + this.codigo_pos + '</td>';
	                item += '   <td>' + this.nombre_es + '</td>';
	                item += '   <td>' + this.nombre_en + '</td>';
	                item += '   <td>' + this.descripcion_es + '</td>';
	                item += '   <td>' + this.descripcion_en + '</td>';
	                item += '   <td>' + this.nombre_categoria_es + '</td>';
	                item += '   <td>' + this.activa + '</td>';
                    item += '   <td><a title="Editar Subcategoría" onclick="abrir_modal_subcategoria(\'' + 2 + '\',\'' + this.idsubcategoria + '\')"><i class="size-13-5 ion-edit"></a></td>';
	                item += "</tr>";

	                $('#JDTable_body').append(item);
	            });     
            }  

            /*=================================================================*/
            /******************DATA TABLE JQUERY CON PAGINADOR******************/
            /*=================================================================*/
            $('#JDTable').DataTable({                          
                "bSort": true,
                //"bFilter":true,
                "scrollX": true,
                "scrollY": "60vh",
                "scrollCollapse": true,               
                destroy: true
            });
            /*=================================================================*/
            $('input[type="search"]').attr("placeholder", "Búsqueda");
            $(".dataTables_scrollBody").css("max-height", "55vh");
            //$(".pagination").css("padding-left", "15px;");
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-warn' });
        }
    }).fail(function () {
        alert("Error en petición al cargar datos");
    });

    $("#modal_load").modal("hide");
}

//endgenerales


//categoria
function limpiar_modal_categoria() {
    idcategoria_UID = 0;
    $("#txt_nombre_c_es_UID").val('');
    $("#txt_nombre_c_en_UID").val('');
    $("#txt_descripcion_c_es_UID").val('');
    $("#txt_descripcion_c_en_UID").val('');
}

function abrir_modal_categoria(tipo_, idcategoria_) {

    limpiar_modal_categoria();
    idcategoria_UID = idcategoria_;

    var _url = base_url + "AjaxAdministracion/getCategorias_ajax/";

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 4,
            idcategoria: idcategoria_UID,
            idsubcategoria: 0,
            nombre_es: '',
            nombre_es: '',
            activa: '',
            parametro: ""
        }
    }).done(function (data) {

        if (data.status == "OK") {

            $(data.datatable).each(function () {
                $("#txt_nombre_c_es_UID").val(this.nombre_es);
                $("#txt_nombre_c_en_UID").val(this.nombre_en);
                $("#txt_descripcion_c_es_UID").val(this.descripcion_es);
                $("#txt_descripcion_c_en_UID").val(this.descripcion_en);
            });     
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición cargar detalle de categoría");
    });

    $("#modal_categoria_editar").modal("show");
}

function validar_categoria_UID() {
    var nombre_es = $("#txt_nombre_c_es_UID").val().trim();
    var nombre_en = $("#txt_nombre_c_en_UID").val().trim();
    var descripcion_es = $("#txt_descripcion_c_es_UID").val().trim();
    var descripcion_en = $("#txt_descripcion_c_en_UID").val().trim();

    if (nombre_es == '') {
        $.noticeAdd({ text: "Debe ingresar el nombre en español.", stay: false, type: 'notice-warn' });
        $("#txt_nombre_c_es_UID").focus();
        return;
    }
    if (nombre_en == '') {
        $.noticeAdd({ text: "Debe ingresar el nombre en ingles.", stay: false, type: 'notice-warn' });
        $("#txt_nombre_c_en_UID").focus();
        return;
    }
    if (descripcion_es == '') {
        $.noticeAdd({ text: "Debe ingresar una descripción en español.", stay: false, type: 'notice-warn' });
        $("#txt_descripcion_c_es_UID").focus();
        return;
    }
    if (descripcion_en == '') {
        $.noticeAdd({ text: "Debe ingresar una descripción en ingles.", stay: false, type: 'notice-warn' });
        $("#txt_descripcion_c_en_UID").focus();
        return;
    }

    guardar_categoria();
}

function guardar_categoria() {
    $("#modal_load").modal("show");

    var _url = base_url + "AjaxAdministracion/setCategorias_ajax/";
    var nombre_es = $("#txt_nombre_c_es_UID").val().trim();
    var nombre_en = $("#txt_nombre_c_en_UID").val().trim();
    var descripcion_es = $("#txt_descripcion_c_es_UID").val().trim();
    var descripcion_en = $("#txt_descripcion_c_en_UID").val().trim();

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 1,
            idcategoria: idcategoria_UID,
            idsubcategoria: 0,
            nombre_es: nombre_es,
            nombre_en: nombre_en,
            descripcion_es: descripcion_es,
            descripcion_en: descripcion_en,
            activa: "",
            parametro: ""
        }
    }).done(function (data) {

        if (data.status == "OK") {
            filtrar_datos();
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-info' });
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición guardar categoría");
    });

    $("#modal_categoria_editar").modal("hide");
    $("#modal_load").modal("hide");
}
//endcategoria


//subcategoria 
function limpiar_modal_subcategoria(){
    idcategoria_UID = 0;
    idsubcategoria_UID = 0;
    $("#txt_codigo_pos_s_UID").val('');
    $("#txt_nombre_s_es_UID").val('');
    $("#txt_nombre_s_en_UID").val('');
    $("#txt_descripcion_s_es_UID").val('');
    $("#txt_descripcion_s_en_UID").val('');
    $("#cmb_categoria_s_UID").html('');
    $("#opt_activa_s_UID").prop('checked', true)
    cargar_categorias_cmb_UID();
}

function cargar_categorias_cmb_UID() {
    var _url = base_url + "AjaxAdministracion/getCategorias_ajax/";
    $("#cmb_categoria_s_UID").html(''); 

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

                $("#cmb_categoria_s_UID").append(item); 
            });     
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición al cargar cmb categoría");
    });
}

function abrir_modal_subcategoria(tipo_, idsubcategoria_) {

    limpiar_modal_subcategoria();
    
    if (tipo_ == 1) {
        tipo_UID = 2;
        $("#lbl_subcategoria_editar").text("Crear Subcategoría");
    }
    else if (tipo_ == 2) {
        tipo_UID = 3;
        idsubcategoria_UID = idsubcategoria_;
        $("#lbl_subcategoria_editar").text("Editar Subcategoría");
        cargar_datos_subcategoria();
    }
    
    $("#modal_subcategoria_editar").modal("show");
}

function cargar_datos_subcategoria() {
    var _url = base_url + "AjaxAdministracion/getCategorias_ajax/";

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 5,
            idcategoria: 0,
            idsubcategoria: idsubcategoria_UID,
            nombre_es: '',
            nombre_es: '',
            activa: '',
            parametro: ""
        }
    }).done(function (data) {

        if (data.status == "OK") {

            $(data.datatable).each(function () {
                $("#txt_codigo_pos_s_UID").val(this.codigo_pos);
                $("#txt_nombre_s_es_UID").val(this.nombre_es);
                $("#txt_nombre_s_en_UID").val(this.nombre_en);
                $("#txt_descripcion_s_es_UID").val(this.descripcion_es);
                $("#txt_descripcion_s_en_UID").val(this.descripcion_en);
                $("#cmb_categoria_s_UID").val(this.idcategoria);
                (this.activa == "S" ? $("#opt_activa_s_UID").prop('checked', true) : $("#opt_inactiva_s_UID").prop('checked', true));
            });     
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición al cargar detalle de subcategoría");
    });
}

function validar_subcategoria_UID() {
    var nombre_es = $("#txt_nombre_s_es_UID").val().trim();
    var nombre_en = $("#txt_nombre_s_en_UID").val().trim();
    var descripcion_es = $("#txt_descripcion_s_es_UID").val().trim();
    var descripcion_en = $("#txt_descripcion_s_en_UID").val().trim();
    var activa = $('input:radio[name=opt_activa_s_UID]:checked').val(); //S - N

    if (nombre_es == '') {
        $.noticeAdd({ text: "Debe ingresar el nombre en español.", stay: false, type: 'notice-warn' });
        $("#txt_nombre_s_es_UID").focus();
        return;
    }
    if (nombre_en == '') {
        $.noticeAdd({ text: "Debe ingresar el nombre en ingles.", stay: false, type: 'notice-warn' });
        $("#txt_nombre_s_en_UID").focus();
        return;
    }
    if (descripcion_es == '') {
        $.noticeAdd({ text: "Debe ingresar una descripción en español.", stay: false, type: 'notice-warn' });
        $("#txt_descripcion_s_es_UID").focus();
        return;
    }
    if (descripcion_en == '') {
        $.noticeAdd({ text: "Debe ingresar una descripción en ingles.", stay: false, type: 'notice-warn' });
        $("#txt_descripcion_s_en_UID").focus();
        return;
    }

    if (activa == "S"){
        guardar_subcategoria();
    }
    else{
        //aqui agregar modificacion
    }
    
}

function guardar_subcategoria() {
    $("#modal_load").modal("show");

    var _url = base_url + "AjaxAdministracion/setCategorias_ajax/";
    var nombre_es = $("#txt_nombre_s_es_UID").val().trim();
    var nombre_en = $("#txt_nombre_s_en_UID").val().trim();
    var descripcion_es = $("#txt_descripcion_s_es_UID").val().trim();
    var descripcion_en = $("#txt_descripcion_s_en_UID").val().trim();
    var idcategoria = $("#cmb_categoria_s_UID").val().trim();
    var activa = $('input:radio[name=opt_activa_s_UID]:checked').val(); //S - N

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: tipo_UID,
            idcategoria: idcategoria,
            idsubcategoria: idsubcategoria_UID,
            nombre_es: nombre_es,
            nombre_en: nombre_en,
            descripcion_es: descripcion_es,
            descripcion_en: descripcion_en,
            activa: activa,
            parametro: ""
        }
    }).done(function (data) {

        if (data.status == "OK") {
            filtrar_datos();
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-info' });
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición al guardar subcategoría");
    });
    
    $("#modal_subcategoria_editar").modal("hide");
    $("#modal_load").modal("hide");
}

//endcategoria