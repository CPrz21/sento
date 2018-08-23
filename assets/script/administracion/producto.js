$(document).ready(function () {
   $("#modal_load").modal("show");
   QFiltro();
   $("#modal_load").modal("hide");
});

//#region GLOBALES
//globales B
var tipo_B = 1;
var idproducto_B = 0;
var idtipoproducto_B = 0;
var idcategoria_B = 0;
var idsubcategoria_B = 0;
var codigopos_B = '';
var nombre_es_B = '';
var nombre_en_B = '';
var activo_B = 'T';
var parametro_B = '';

//globales UID
var tipo_UID = 0;
var idproducto_UID = 0;
var idtipoproducto_UID = 0;
var idcategoria_UID = 0;
var idsubcategoria_UID = 0;
var codigopos_UID = '';
var nombre_es_UID = '';
var nombre_en_UID = '';
var descripcion_es_UID = '';
var descripcion_en_UID = '';
var precio_UID = 0;
var activo_UID = 'S';

//#endregion GLOBALES

//#region Generales

function fab_options() {

    var item = '';
    item += '<div class="fab-mini-box">';
    item += '   <a onclick="abrir_modal_producto(1,0)">';
    item += '       <div class="fab-container">';
    item += '           <span class="label">Nuevo Producto</span>';
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

//#endregion Generales

//#region Principal

function QFiltro() {
	
    fab_options();
	cargar_tipoproducto_cmb_B();
	cargar_categoria_cmb_B();
	cargar_subcategoria_cmb_B();

	tipo_B = 1;
	idproducto_B = 0;
	idtipoproducto_B = 0;
	idcategoria_B = 0;
	idsubcategoria_B = 0;
	codigopos_B = '';
	nombre_es_B = '';
	nombre_en_B = '';
	activo_B = 'T';
	parametro_B = '';

 	filtrar_datos();
}

function cargar_tipoproducto_cmb_B() {
    var _url = base_url + "AjaxAdministracion/getTipoProducto_ajax/";
    $("#cmb_tipoproducto_B").html(''); 

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 2,
            idtipo_producto: 0,
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

                $("#cmb_tipoproducto_B").append(item); 
            });     
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición al cargar cmb tipo producto");
    });
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

function cargar_subcategoria_cmb_B() {
    var _url = base_url + "AjaxAdministracion/getCategorias_ajax/";
    $("#cmb_subcategoria_B").html(''); 

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 7,
            idcategoria: $("#cmb_categoria_B").val(),
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

                $("#cmb_subcategoria_B").append(item); 
            });     
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición al cargar cmb subcategoría");
    });
}

function filtrar_datos() {
    $("#modal_load").modal("show");

    var _url = base_url + "AjaxAdministracion/getProductos_ajax/";

    idtipoproducto_B = $("#cmb_tipoproducto_B").val(); 
    activo_B = "T"; //$('input:radio[name=opt_estado_B]:checked').val();
    idcategoria_B = $("#cmb_categoria_B").val();
    idsubcategoria_B = $("#cmb_subcategoria_B").val();

    $('#JDTable_div').html('');

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 1,
            idproducto: 0,
            idtipo_producto: idtipoproducto_B,            
			idcategoria: idcategoria_B,
			idsubcategoria: idsubcategoria_B,
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

        	$('#JDTable_head').append(	'<tr>' +
                                       	'	<th class="text-center">Producto</th>' +
                                        '	<th class="text-center">Cód. POS</th>' +
                                        '	<th class="text-center">Nombre EN</th>' +
                                        '	<th class="text-center">Tipo</th>' +
                                        '	<th class="text-center">Categoría</th>' +
                                        '	<th class="text-center">SubCategoría</th>' +
                                        '   <th class="text-center">Precio</th>' +
                                        '   <th class="text-center">Activo</th>' +
                                        '   <th class="text-center">Editar</th>' +
                                    	'</tr>');

             $('#JDTable_foot').append(     '<tr>' +
                                            '   <th class="text-center">Producto</th>' +
                                            '   <th class="text-center">Cód. POS</th>' +
                                            '   <th class="text-center">Nombre EN</th>' +
                                            '   <th class="text-center">Tipo</th>' +
                                            '   <th class="text-center">Categoría</th>' +
                                            '   <th class="text-center">SubCategoría</th>' +
                                            '   <th class="text-center">Precio</th>' +
                                            '   <th class="text-center">Activo</th>' +
                                            '   <th class="text-center">Editar</th>' +
                                            '</tr>');

        	$(data.datatable).each(function () {
                var item = '';
                item += '<tr>';
                item += '   <td class="id-value">'+ this.idproducto + '</td>';
                item += '   <td>' + (this.codigo_pos == null ? '' : this.codigo_pos) + '</td>';
                item += '   <td>' + this.nombre_en + '</td>';
                item += '   <td>' + this.tipo_producto + '</td>';
                item += '   <td>' + this.categoria + '</td>';
             	item += '   <td>' + this.subcategoria + '</td>';
                item += '   <td>$ ' + this.precio + '</td>';
                item += '   <td>' + this.activo + '</td>';
                item += '   <td> ';
                item += (this.idtipo_producto == 1 ? '<a title="Editar Producto" onclick="abrir_modal_producto(\'' + 2 + '\',\'' + this.idproducto + '\')"><i class="size-13-5 ion-edit"></i></a>' : '-');
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

            /*
            $("#JDTable_wrapper").prepend(  '<div class="dataTables_length" id="JDTable_length">'+
                                            '   <label>Mostrar <select name="JDTable_length" aria-controls="JDTable" class="">'+
                                            '       <option value="2">2</option>'+
                                            '       <option value="10">10</option><option value="15">15</option><option value="25">25</option>'+
                                            '       <option value="50">50</option><option value="100">100</option></select>'+
                                            '   registros</label>'+
                                            '</div>&nbsp;&nbsp;&nbsp;&nbsp;');
            */
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

    $("#modal_load").modal("hide");
}
//#endregion Principal

//#region Producto
function abrir_modal_producto(tipo_, idproducto_) {
    $("#modal_load").modal("show");
    tipo_UID = tipo_;
    limpiar_modal_producto();
    
    if (tipo_ == 1) {
        $("#lbl_producto_editar").text("Crear Producto");
        $('#opt_inactivo_UID').attr('disabled', true);
    }
    else if (tipo_ == 2) {        
        idproducto_UID = idproducto_;
        $("#lbl_producto_editar").text("Editar Producto #"+ idproducto_UID);
        $('#cmb_tipoproducto_UID').prop('disabled', 'disabled');
        cargar_datos_producto();
    }
    
    $("#modal_producto_editar").modal("show");
    $("#modal_load").modal("hide");
}

function limpiar_modal_producto(){
    idproducto_UID = 0;
    
    $("#txt_codigo_pos_UID").val('');
    $('#txt_codigo_pos_UID').attr('readonly', false);
    $("#txt_nombre_es_UID").val('');
    $("#txt_nombre_en_UID").val('');
    $("#txt_descripcion_es_UID").val('');
    $("#txt_descripcion_en_UID").val('');
    $("#txt_precio_UID").val('');
    $("#txt_precio_esp_UID").val('');
    $("#opt_activo_UID").prop('checked', true);
    $('#cmb_tipoproducto_UID').prop('disabled', false);
    $('#opt_inactivo_UID').attr('disabled', false);

    cargar_tipoproducto_cmb_UID();
	cargar_categoria_cmb_UID();
	cargar_subcategoria_cmb_UID();
}

function cargar_tipoproducto_cmb_UID() {
    var _url = base_url + "AjaxAdministracion/getTipoProducto_ajax/";
    $("#cmb_tipoproducto_UID").html(''); 

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 3,
            idtipo_producto: 0,
            parametro: tipo_UID
        }
    }).done(function (data) {

        if (data.status == "OK") {

            $(data.datatable).each(function () {
                
                var item = "";
                if (this.codigo != 0) {
                    item = '<option value="' + this.codigo + '" > ' + this.nombre + ' </option>';
                }

                $("#cmb_tipoproducto_UID").append(item); 
            });     
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición al cargar cmb tipo producto");
    });
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
                if (this.codigo != 0) {
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

function cargar_subcategoria_cmb_UID() {
    var _url = base_url + "AjaxAdministracion/getCategorias_ajax/";
    $("#cmb_subcategoria_UID").html(''); 

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 8,
            idcategoria: $("#cmb_categoria_UID").val(),
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

                $("#cmb_subcategoria_UID").append(item); 
            });     
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición al cargar cmb subcategoría");
    });
}

function cargar_datos_producto() {
    var _url = base_url + "AjaxAdministracion/getProducto_deta_ajax/";

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 2,
            idproducto: idproducto_UID
        }
    }).done(function (data) {

        if (data.status == "OK") {

            $("#cmb_tipoproducto_UID").val(data.datatable.idtipo_producto);
            $('#txt_codigo_pos_UID').attr('readonly', true);
            $("#txt_codigo_pos_UID").val(data.datatable.codigo_pos);
            $("#txt_nombre_es_UID").val(data.datatable.nombre_es);
            $("#txt_nombre_en_UID").val(data.datatable.nombre_en);
            $("#txt_descripcion_es_UID").val(data.datatable.descripcion_es);
            $("#txt_descripcion_en_UID").val(data.datatable.descripcion_en);
            $("#cmb_categoria_UID").val(data.datatable.idcategoria);

            cargar_subcategoria_cmb_UID();

            $("#cmb_subcategoria_UID").val(data.datatable.idsubcategoria);
            $("#txt_precio_UID").val(data.datatable.precio);
            $("#txt_precio_esp_UID").val(data.datatable.precio_esp);
            (data.datatable.activo == "S" ? $("#opt_activo_UID").prop('checked', true) : $("#opt_inactivo_UID").prop('checked', true));
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición al cargar datos de producto");
    });
}


function validar_producto_UID() {
    var tipo_producto = $("#cmb_tipoproducto_UID").val();
    var codigo_pos = $("#txt_codigo_pos_UID").val().trim();
    var nombre_es = $("#txt_nombre_es_UID").val().trim();
    var nombre_en = $("#txt_nombre_en_UID").val().trim();
    var descripcion_es = $("#txt_descripcion_es_UID").val().trim();
    var descripcion_en = $("#txt_descripcion_en_UID").val().trim();
    var categoria = $("#cmb_categoria_UID").val().trim();
    var subcategoria = $("#cmb_subcategoria_UID").val().trim();
    var precio = $("#txt_precio_UID").val().trim(); 
    var precio_esp = $("#txt_precio_esp_UID").val().trim();   

    if (tipo_producto == null) {
        $.noticeAdd({ text: "Debe seleccionar un tipo de producto", stay: false, type: 'notice-warn' });
        return;
    }
    if (codigo_pos == '') {
        $.noticeAdd({ text: "Debe ingresar un código POS", stay: false, type: 'notice-warn' });
        return;
    }
    if (nombre_es == '') {
        $.noticeAdd({ text: "Debe ingresar el nombre en español.", stay: false, type: 'notice-warn' });
        return;
    }
    if (nombre_en == '') {
        $.noticeAdd({ text: "Debe ingresar el nombre en ingles.", stay: false, type: 'notice-warn' });
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
    if (categoria == null) {
        $.noticeAdd({ text: "Debe seleccionar una categoría", stay: false, type: 'notice-warn' });
        return;
    }
    if (subcategoria == null) {
        $.noticeAdd({ text: "Debe seleccionar una subcategoría", stay: false, type: 'notice-warn' });
        return;
    }

    if (precio == "") {
        $.noticeAdd({ text: "Debe ingresar el precio.", stay: false, type: 'notice-warn' });
        return;
    }
    else {
        if (!regex_decimal.test(precio)) {
            $.noticeAdd({ text: "El precio debe ser ingresado con el formato X.XX", stay: false, type: 'notice-warn' });
            return;
        }
        if (precio <= 0) {
            $.noticeAdd({ text: "El precio debe ser mayor a $0.00", stay: false, type: 'notice-warn' });
            return;
        }
    }

    if (precio_esp == "") {
        $("#txt_precio_esp_UID").val(0.00);
    }
    else {
        if (!regex_decimal.test(precio_esp)) {
            $.noticeAdd({ text: "El precio especial debe ser ingresado con el formato X.XX", stay: false, type: 'notice-warn' });
            return;
        }
        if (precio_esp < 0 || precio_esp >= precio) {
            $.noticeAdd({ text: "El precio especial debe ser mayor o igual a $0.00 y menor al precio regular.", stay: false, type: 'notice-warn' });
            return;
        }
    }
    
    guardar_producto();
}

function guardar_producto() {
    $("#modal_load").modal("show");

    var tipo_producto = $("#cmb_tipoproducto_UID").val().trim();
    var codigo_pos = $("#txt_codigo_pos_UID").val().trim();
    var nombre_es = $("#txt_nombre_es_UID").val().trim();
    var nombre_en = $("#txt_nombre_en_UID").val().trim();
    var descripcion_es = $("#txt_descripcion_es_UID").val().trim();
    var descripcion_en = $("#txt_descripcion_en_UID").val().trim();
    var categoria = $("#cmb_categoria_UID").val().trim();
    var subcategoria = $("#cmb_subcategoria_UID").val().trim();
    var precio = $("#txt_precio_UID").val().trim();
    var precio_esp = $("#txt_precio_esp_UID").val().trim();
    var activo = $('input:radio[name=opt_activo_UID]:checked').val(); //S - N

    var _url = base_url + "AjaxAdministracion/setProducto_ajax/";

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: tipo_UID,
            idproducto      : idproducto_UID,
            idtipo_producto : tipo_producto,
            idcategoria     : categoria,
            idsubcategoria  : subcategoria,
            codigo_pos      : codigo_pos,
            nombre_es       : nombre_es,
            nombre_en       : nombre_en,
            descripcion_es  : descripcion_es,
            descripcion_en  : descripcion_en,
            activo          : activo,
            precio          : precio,
            precio_esp      : precio_esp,
            parametro       : ''
        }
    }).done(function (data) {

        if (data.status == "OK") {
            filtrar_datos();
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-info' });
            $("#modal_producto_editar").modal("hide");
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición al guardar producto");
    });
    
    $("#modal_load").modal("hide");
}

//#endregion Producto