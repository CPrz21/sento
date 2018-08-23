$(document).ready(function () {
   $("#modal_load").modal("show");
   QFiltro();
   $("#modal_load").modal("hide");
});


//region globales
var tipo_B = 1;
var activo_B = "S";
var parametro_B = "";

var tipo_UID = 0;
var idusuario_UID = 0;
var idusuario_copy_UID = 0; //usuario del que se copia

//endregion globales


//region generales

function fab_options() {

    var item = '';
    item += '<div class="fab-mini-box">';
    item += '   <a onclick="abrir_modal_usuario(1,0)">';
    item += '       <div class="fab-container">';
    item += '           <span class="label">Nuevo Usuario</span>';
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

//endregion generales


//region principal

function QFiltro() {
	
    fab_options();
	tipo_B = 1;
	$("input[name=opt_estado_B][value=S]").prop('checked', true);
	activo_B = "S";
	parametro_B = "";

 	filtrar_datos();
}

function filtrar_datos() {
    $("#modal_load").modal("show");
    
    activo_B = $('input:radio[name=opt_estado_B]:checked').val();

    var _url = base_url + "AjaxSeguridad/getUsuarios_ajax/";
    $('#JDTable_div').html('');

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 1,
            idusuario: 0,
            usuario: "",            
			nombre: "",
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
                                       	'	<th class="text-center">Código</th>' +
                                        '	<th class="text-center">Usuario</th>' +
                                        '	<th class="text-center">Nombre</th>' +
                                        '	<th class="text-center">Email</th>' +
                                        '	<th class="text-center">Activo</th>' +
                                        '	<th class="text-center">Tipo Usuario</th>' +
                                        '	<th class="text-center">Ultimo Login</th>' +
                                        '   <th class="text-center">Opciones</th>' +
                                    	'</tr>');

             $('#JDTable_foot').append(     '<tr>' +
											'	<th class="text-center">Código</th>' +
											'	<th class="text-center">Usuario</th>' +
											'	<th class="text-center">Nombre</th>' +
											'	<th class="text-center">Email</th>' +
											'	<th class="text-center">Activo</th>' +
                                            '	<th class="text-center">Tipo Usuario</th>' +
                                            '	<th class="text-center">Ultimo Login</th>' +
											'   <th class="text-center">Opciones</th>' +
                                            '</tr>');

        	$(data.datatable).each(function () {
                var item = '';
                item += '<tr>';
                item += '   <td class="id-value">'+ this.idusuario + '</td>';
                item += '   <td>' + this.usuario + '</td>';
                item += '   <td>' + this.nombre + '</td>';
                item += '   <td>' + (this.email != null ? this.email : "-") + '</td>';
                item += '   <td>' + this.activo + '</td>';
                item += '   <td>' + this.usuario_tipo + '</td>';
                item += '   <td>' + (this.ultimo_ingreso != null ? this.ultimo_ingreso : "-") + '</td>';
                item += '   <td>';
                item += '       <a title="Editar Usuario" onclick="abrir_modal_usuario(\'' + 2 + '\',\'' + this.idusuario + '\')"><i class="size-13-5 ion-edit"></i></a>&nbsp;&nbsp;';
                item += '       <a title="Privilegios" onclick="abril_modal_menus(\'' + this.idusuario + '\',\'' + this.usuario + '\',\'' + this.nombre + '\')"><i class="zmdi zmdi-shield-security zmdi-hc-lg"></i></a>&nbsp;&nbsp;';
                item += '       <a title="Log de accesos" onclick="abrir_modal_ingreso(\'' + this.idusuario + '\')"><i class="size-13-5 ion-clock"></i></a>&nbsp;';
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
        alert("Error en petición cargar tabla de usuarios...");
    });

    $("#modal_load").modal("hide");
}
//endregion principal

//region usuarios 
function abrir_modal_usuario(tipo_, idusuario_) {
    $("#modal_load").modal("show");
    limpiar_modal_usuario();
    tipo_UID = tipo_;
    
    if (tipo_ == 1) {
        $("#lbl_usuario_editar").text("Crear Usuario");
        $('#opt_inactivo_UID').attr('disabled', true);
    }
    else if (tipo_ == 2) {        
        idusuario_UID = idusuario_;
        $("#lbl_usuario_editar").text("Editar Usuario #"+ idusuario_UID);
        cargar_datos_usuario();
    }
    
    $("#modal_usuario_editar").modal("show");
    $("#modal_load").modal("hide");
}

function limpiar_modal_usuario(){
	idusuario_UID = 0;
    $("#txt_usuario_UID").val('');
    $("#txt_usuario_UID").removeAttr('readonly');
    $("#txt_nombre_UID").val('');
    $("#txt_email_UID").val('');
    $("#cmb_usuario_tipo_UID").html('');
    $("#txt_password_UID").val('');
    $("#opt_activo_UID").prop('checked', true);
    $('#opt_inactivo_UID').attr('disabled', false);

    cargar_usuario_tipo_cmb_UID();
}

function cargar_usuario_tipo_cmb_UID() {
    var _url = base_url + "AjaxSeguridad/getUsuarios_ajax/";
    $("#cmb_usuario_tipo_UID").html(''); 

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 3,
            parametro: ""
        }
    }).done(function (data) {

        if (data.status == "OK") {

            $(data.datatable).each(function () {
                
                var item = "";
                if (this.codigo != 0) {
                    item = '<option value="' + this.codigo + '" > ' + this.nombre + ' </option>';
                }

                $("#cmb_usuario_tipo_UID").append(item); 
            });     
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición al cargar cmb tipo usuario");
    });
}

function cargar_datos_usuario() {
    var _url = base_url + "AjaxSeguridad/getUsuario_ajax/";

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 2,
            idusuario: idusuario_UID
        }
    }).done(function (data) {

        if (data.status == "OK") {
            $("#txt_usuario_UID").attr('readonly', true);
            $("#txt_usuario_UID").val(data.datatable.usuario);
            $("#txt_nombre_UID").val(data.datatable.nombre);
            $("#txt_email_UID").val(data.datatable.email);
            $("#cmb_usuario_tipo_UID").val(data.datatable.idusuario_tipo);
            $("#txt_password_UID").val(data.datatable.password);
            (data.datatable.activo == "S" ? $("#opt_activo_UID").prop('checked', true) : $("#opt_inactivo_UID").prop('checked', true));

            if(data.datatable.idusuario == "1"){ $('#opt_inactivo_UID').attr('disabled', true); }
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición al cargar datos de usuario");
    });
}

function validar_usuario_UID() {
    var usuario = $("#txt_usuario_UID").val();
    var nombre = $("#txt_nombre_UID").val().trim();
    var email = $("#txt_email_UID").val().trim();
    var usuario_tipo = $("#cmb_usuario_tipo_UID").val().trim();
    var password = $("#txt_password_UID").val().trim();
  
    if (usuario == '') {
        $.noticeAdd({ text: "Debe ingresar el usuario.", stay: false, type: 'notice-warn' });
        $("#txt_usuario_UID").focus();
        return;
    }
    if (nombre == '') {
        $.noticeAdd({ text: "Debe ingresar un nombre de usuario", stay: false, type: 'notice-warn' });
        $("#txt_nombre_UID").focus();
        return;
    }

    if (email == '') {
        $.noticeAdd({ text: "Debe ingresar un email", stay: false, type: 'notice-warn' });
        $("#txt_email_UID").focus();
        return;
    }
    if (email != "") {
        if (!regex_email.test(email)) {
            $.noticeAdd({ text: "El formato del email es incorrecto.", stay: false, type: 'notice-warn' });
            return;
        }
    }
    if (usuario_tipo == null) {
        $.noticeAdd({ text: "Debe seleccionar un tipo de usuario", stay: false, type: 'notice-warn' });
        return;
    }
    if (password == '') {
        $.noticeAdd({ text: "Debe ingresar una clave", stay: false, type: 'notice-warn' });
        $("#txt_password_UID").focus();
        return;
    }

    guardar_usuario();
}


function guardar_usuario() {
    $("#modal_load").modal("show");

	var usuario = $("#txt_usuario_UID").val();
    var nombre = $("#txt_nombre_UID").val().trim();
    var email = $("#txt_email_UID").val().trim();
    var usuario_tipo = $("#cmb_usuario_tipo_UID").val().trim();
    var password = $("#txt_password_UID").val().trim();
	var activo = $('input:radio[name=opt_activo_UID]:checked').val(); //S - N

    var _url = base_url + "AjaxSeguridad/setUsuario_ajax/";

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo 			: tipo_UID,
            idusuario      	: idusuario_UID,
            usuario 		: usuario,
            nombre     		: nombre,
            email  			: email,
            password      	: password,
            activo       	: activo,
            idusuario_tipo  : usuario_tipo,
            parametro       : ''
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
        alert("Error en petición al guardar usuario");
    });

    $("#modal_usuario_editar").modal("hide");
    $("#modal_load").modal("hide");
}


//endregion usuarios

//region Menu usuario
function abril_modal_menus(idusuario_, usuario_, nombre_) {
    idusuario_UID = idusuario_;

    $("#txt_usuario_D").val(usuario_);
    $("#txt_nombre_D").val(nombre_);

    cargar_menus_usuario(); 

    $("#modal_menu_usuario_UID").modal("show");
}

function cargar_menus_usuario() {
    $("#modal_load").modal("show");
    var _url = base_url + "AjaxSeguridad/getMenuUsuario_ajax/";

    $('#table_menu_usuario_').html('');
    var idmodulo = -1;

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 2,
            idusuario: idusuario_UID,
            idmenu: 2,
            idmenu_deta: 0,
            parametro: ''
        }
    }).done(function (data) {

    	if (data.status == "OK") {

            $(data.datatable).each(function () {
	            var item = '';

	            if (this.nivel == 1) {
	                if (idmodulo != -1) { ocultar_mostrar_modulo(idmodulo); }

	                idmodulo = this.nivelnumero;
	                item += '<tr class="tr-tr font-size-12-table-bold cursor-pointer header-show-hide">';
	                item += '   <td style="border:none;">';
	                item += '		<center>'
	                item += '       	<a title="Asignar modulo" onclick="asignar_menu_modulo(\'' + idmodulo + '\')" href="#"><input class="ckb_menu" type="checkbox" id="ckb_modulo_' + idmodulo + '" value="' + this.idmenu_deta + '" ' + (this.asignado_modulo == 1 ? 'checked' : '') + '></a>';
	                item += '		</center>'
	                item += '   </td>';
	                item += '   <td style="border:none;" class="cursor-pointer" colspan="2" align="left" onclick="ocultar_mostrar_modulo(\'' + idmodulo + '\')">' + this.nivelnumero + '. ' + this.nombre + ' <input type="hidden" id="txt_mostrar_modulo_' + idmodulo + '" value="1"/></td>';
	                item += '	<td style="border:none; text-align:center;" class="cursor-pointer" onclick="ocultar_mostrar_modulo(\'' + idmodulo + '\')"><i class="ion-ios-arrow-down tr-modulo-' + idmodulo + '_down"></i><i class="ion-ios-arrow-up tr-modulo-' + idmodulo + '_up"></i></td>';
	                item += "</tr>";

	                item += '<tr class="tr-tr font-size-11-table tr-modulo-' + idmodulo + '">';
	                item += '   <td class="th-table" title="para asignar debe chequear">Asignado</td>';
	                item += '   <td class="th-table">Menu</td>';
	                item += '   <td class="th-table">Nombre</td>';
	                item += '   <td class="th-table">Tipo</td>';
	                item += '</tr>';
	            }

	            item += '   <tr class="tr-tr table-button table-input table-span tr-modulo-' + idmodulo + ' font-size-11-table" >';
	            item += '       <td>';
	            item += '           <center><input type="checkbox" id="ckb_menu_' + this.idmenu_deta + '" class="ckb_menu_' + idmodulo + '"  value="' + this.idmenu_deta + '"  title="Asignar menu" ' + (this.asignado == 1 ? 'checked' : '') + '></center>';
	            item += '       </td>';
	            item += '       <td align="center">' + this.nivelnumero + '</td>';
	            item += '       <td align="center">' + this.nombre + '</td>';
	            item += '       <td align="center">' + this.tipo + '</td>';
	            item += "   </tr>";

	            $('#table_menu_usuario_').append(item);
	        });

        if (idmodulo != -1) { ocultar_mostrar_modulo(idmodulo); }     
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }

    }).fail(function () {
        alert("Error en petición al cargar menus de CMS");
    });

    $("#modal_load").modal("hide");
}

function ocultar_mostrar_modulo(idmodulo_) {
    if ($("#txt_mostrar_modulo_" + idmodulo_).val() == 0) {
		$(".tr-modulo-" + idmodulo_).show("slow");
		$(".tr-modulo-" + idmodulo_ + "_down").hide("slow");
		$(".tr-modulo-" + idmodulo_ + "_up").show("slow");
        $("#txt_mostrar_modulo_" + idmodulo_).val("1");
    }
    else if ($("#txt_mostrar_modulo_" + idmodulo_).val() == 1) {
        $(".tr-modulo-" + idmodulo_).hide("slow");
		$(".tr-modulo-" + idmodulo_ + "_up").hide("slow");
		$(".tr-modulo-" + idmodulo_ + "_down").show("slow");
        $("#txt_mostrar_modulo_" + idmodulo_).val("0");
    }
}

function asignar_menu_modulo(idmodulo_) {

    if ($("#ckb_modulo_" + idmodulo_).is(':checked')) {
        $('.ckb_menu_' + idmodulo_).prop("checked", true);
    }
    else {
        $('.ckb_menu_' + idmodulo_).prop('checked', false);
    }
}

function guardar_menus_asignados() {
	$("#modal_load").modal("show");
    var _url = base_url + "AjaxSeguridad/getMenuUsuario_ajax/";

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 2,
            idusuario: idusuario_UID,
            idmenu: 2,
            idmenu_deta: 0,
            parametro: ''
        }
    }).done(function (data) {

        if (data.status == 'OK') {

            var bool = false;
            $(data.datatable).each(function () {

                $('.ckb_menu_' + this.nivelnumero).each(function (index, value) {

                    if ($(this).is(':checked')) {
                        if (asignar_menus(1, $(this).val().trim()) == true) {
                            bool = true;
                        }
                        else {
                            bool = false;
                            return;
                        }
                    }
                    else {
                        if (asignar_menus(2, $(this).val().trim()) == true) {
                            bool = true;
                        }
                        else {
                            bool = false;
                            return;
                        }
                    }
                });
            });

            if (bool == true) {
                $.noticeAdd({ text: "Las actualizaciones han sido almacenadas.", stay: false, type: 'notice-info' });
                
                cargar_menus_usuario();
            }
            else {
                $.noticeAdd({ text: "Error al guardar los cambios.", stay: false, type: 'notice-error' });
            }
        }
        else {
            alert("Error al asociar menus al usuario.")
        }

    }).fail(function () {
        alert("Error en petición al asociar menus al usuario.");
    });

    $("#modal_load").modal("hide");
}

function asignar_menus(tipo_, idmenu_deta_) {

    var bool = false;
    var _url = base_url + "AjaxSeguridad/setMenuUsuario_ajax/";

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: tipo_,
            idusuario: idusuario_UID,
            idmenu: 2,
            idmenu_deta: idmenu_deta_
        }
    }).done(function (data) {

        if (data.status == "OK") {
            bool = true;
        }

    }).fail(function () {
        alert("Error en petición al modificar menu - usuario");
    });
        
    return bool;
}


//endregion Menu usuario

//region Copy
function open_copy(){
    $("#modal_load").modal("show");
    $("#lbl_copy_title").text("Copiar a "+ $("#txt_usuario_D").val());
    
    var _url = base_url + "AjaxSeguridad/getUsuarios_ajax/";
    $('#JD_UserCopyPrivilege_div').html('');

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 4,
            idusuario: idusuario_UID,
			parametro: ""
        }
    }).done(function (data) {

        if (data.status == "OK") {

            var tbl_ = '<table id="JD_UserCopyPrivilege" class="table table-striped table-bordered nowrap display" cellspacing="0" width="100%">' +
                            '<thead id="JD_UserCopyPrivilege_head" style="text-align:center"></thead>' +
                            '<tbody id="JD_UserCopyPrivilege_body" style="text-align:center"></tbody>' +
                        '</table>'

            $('#JD_UserCopyPrivilege_div').append(tbl_);

            $('#JD_UserCopyPrivilege_head').html('');
            $('#JD_UserCopyPrivilege_body').html('');

        	$('#JD_UserCopyPrivilege_head').append(	'<tr>' +
                                                    '	<th class="text-center">Código</th>' +
                                                    '	<th class="text-center">Usuario</th>' +
                                                    '	<th class="text-center">Nombre</th>' +
                                                    '   <th class="text-center">Copiar</th>' +
                                                    '</tr>');

        	$(data.datatable).each(function () {
                var item = '';
                item += '<tr>';
                item += '   <td class="id-value">'+ this.idusuario + '</td>';
                item += '   <td>' + this.usuario + '</td>';
                item += '   <td>' + this.nombre + '</td>';
                item += '   <td>';
                item += '       <a title="Copiar privilegios de usuario" onclick="open_confirmar_copy(\'' + this.idusuario + '\',\'' + this.usuario + ' - ' + this.nombre + '\')"><i class="size-13-5 ion-ios-copy"></i></a>&nbsp;';
                item += '   </td>';
                item += "</tr>";

                $('#JD_UserCopyPrivilege_body').append(item);
            });  

            var table = $('#JD_UserCopyPrivilege').DataTable();
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
            $('#JD_UserCopyPrivilege').DataTable({                          
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
            $(".dataTables_scrollBody").css("max-height", "55vh");
        }
        else if(data.status == "SIN_DATOS"){
        	$.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-warn' });
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición cargar tabla de usuarios...");
    });

    $("#modal_copy_privilegios_UID").modal("show");
    $("#modal_load").modal("hide");
}

function open_confirmar_copy(idusuario_copy_, usuario_copy_){

    idusuario_copy_UID = idusuario_copy_;
    $("#lbl_confirmar_msj").text('Copiar los privilegios del usuario "'+ usuario_copy_ +'" al usuario "'+ $("#txt_usuario_D").val() +' - '+ $("#txt_nombre_D").val() +'". ¿Desea continuar?');
    $("#modal_confirmacion_copy").modal("show");
}

function copy_privilegios_to_user(){
    $("#modal_load").modal("show");
    var bool = false;
    var _url = base_url + "AjaxSeguridad/setMenuUsuario_ajax/";

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 3,
            idusuario: idusuario_UID,
            idmenu: 2,
            idmenu_deta: 0,
            parametro: idusuario_copy_UID
        }
    }).done(function (data) {

        if (data.status == "OK") {
            
            cargar_menus_usuario();
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-info' });
            $("#modal_copy_privilegios_UID").modal("hide");
            $("#modal_confirmacion_copy").modal("hide");
        }

    }).fail(function () {
        alert("Error en petición copiar privilegios.");
    });
        
    $("#modal_load").modal("hide");
}
//endregion Copy 

//region Log accesos

function abrir_modal_ingreso(idusuario_){

    $("#modal_load").modal("show");

    var _url = base_url + "AjaxSeguridad/getUsuarioAccesoLog_ajax/";
    $('#JD_LogAccesos_div').html('');

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {
            tipo: 1,
            idusuario: idusuario_,
			parametro: ""
        }
    }).done(function (data) {

        if (data.status == "OK") {

            var tbl_ = '<table id="JD_LogAccesos" class="table table-striped table-bordered nowrap display" cellspacing="0" width="100%">' +
                            '<thead id="JD_LogAccesos_head" style="text-align:center"></thead>' +
                            '<tbody id="JD_LogAccesos_body" style="text-align:center"></tbody>' +
                        '</table>'

            $('#JD_LogAccesos_div').append(tbl_);

            $('#JD_LogAccesos_head').html('');
            $('#JD_LogAccesos_body').html('');

        	$('#JD_LogAccesos_head').append(	'<tr>' +
                                                    '	<th class="text-center">Menu</th>' +
                                                    '   <th class="text-center">Fecha y hora</th>' +
                                                    '</tr>');

        	$(data.datatable).each(function () {
                var item = '';
                item += '<tr>';
                item += '   <td>' + this.menu_nombre + '</td>';
                item += '   <td>' + this.fecha_hora + '</td>';
                item += "</tr>";

                $('#JD_LogAccesos_body').append(item);
            });  

            /*=================================================================*/
            /******************DATA TABLE JQUERY CON PAGINADOR******************/
            /*=================================================================*/
            $('#JD_LogAccesos').DataTable({                          
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
            $(".dataTables_scrollBody").css("max-height", "55vh");
        }
        else if(data.status == "SIN_DATOS"){
        	$.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-warn' });
        }
        else {
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-error' });
        }
    }).fail(function () {
        alert("Error en petición cargar tabla de log...");
    });

    $("#modal_log_accesos").modal("show");
    $("#modal_load").modal("hide");
}

//endregion Log accesos