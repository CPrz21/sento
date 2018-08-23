var base_url = 'http://' + location.hostname + ':'+location.port+'/Sento';


/* VALIDADORES */
var regex_decimal = /^\d+(?:\.\d{0,2})$/; // VALIDA MONTO 2 decimales
var regex_entero = /[0-9]/;
var regex_email = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

$(document).ready(function ()
{
    $("#modal_load").modal("show");
    getMenu();
    $("#modal_load").modal("hide");
});

/* MENUS Y USUARIO */
function getMenu()
{
    var _url = base_url + "AjaxCMS/getMenu_ajax";
    $('#sidebar').html('');

    $.ajax({
        async: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        data:
            {
                tipo:1,
                idmenu:2,
                parametro:''
            }
    }).done(function (data){
        
        $('#sidebar').append(   '<div class="sidebar-header">'+
                                '   <h3 id="sidebarCollapse" style="cursor:pointer;">Sento CMS</h3>'+
                                '   <strong id="sidebarExpanded" style="cursor:pointer; font-size:x-large;">CMS</strong>'+
                                '</div>'+
                                '<ul id="ul_sidebar_level1" class="list-unstyled class-level-1 components">'+
                                '</ul>'     );

        if (data.status == "OK") {

            $(data.datatable).each(function (){

                if (this.nivel == 1) {

                    $('#ul_sidebar_level1').append( 
                                            '<li title="'+ this.title +'">'+
                                            '   <a href="#menu_'+ this.idmenu_deta +'" data-toggle="collapse" aria-expanded="false">'+
                                            '       <i class="'+ this.img +' father"></i>' +
                                            '       <label class="class-lbl-menu">'+ this.nombre +'</label>'+
                                            '       <label class="class-lbl-menu-short">'+ this.nombre_corto +'</label>'+
                                            '   </a>'+
                                            '   <ul class="collapse list-unstyled class-level-2" id="menu_'+ this.idmenu_deta +'"></ul>'+
                                            '</li>' );
                    
                }
                else if(this.nivel != 1)
                {  
                    if (this.bandera == "S") { //tiene hijos
                        $('#menu_' + this.idmenupadre).append
                        (
                            '<li title="'+ this.title +'">'+
                            '   <a href="#menu_'+ this.idmenu_deta +'" data-toggle="collapse" aria-expanded="false">'+
                            '       <i class="'+ this.img +' father"></i>'+
                            '       <label class="class-lbl-menu">'+ this.nombre +'</label>'+
                            '       <label class="class-lbl-menu-short">'+ this.nombre_corto +'</label>'+
                            '   </a>'+
                            '   <ul class="collapse list-unstyled class-level-3" id="menu_'+ this.idmenu_deta +'"></ul>'+
                            '</li>' 
                        );
                    }
                    else{

                        $('#menu_' + this.idmenupadre).append
                        (
                            '<li title="'+ this.title +'" onclick="accesos_log('+ this.idmenu_deta +', \''+ base_url +''+ this.url +'\')">' +
                            '   <a>'+
                            '       <i class="'+ this.img +' father"></i>'+
                            '       <label class="class-lbl-menu">'+ this.nombre +'</label>'+
                            '       <label class="class-lbl-menu-short">'+ this.nombre_corto +'</label>'+
                            '   </a>'+
                            '</li>'
                        );
                    }
                }
            });
        }
        else{
            $.noticeAdd({ text: data.mensaje, stay: false, type: 'notice-warn' });
        }
        
    }).fail(function () {
        alert("error ajax al cargar menu");
    });
}

function modal_user()
{
    $('#modal_logout').modal('show');
}

function accesos_log(idmenu_deta_, url_){
    $("#modal_load").modal("show");
    var bool = false;
    var _url = base_url + "AjaxSeguridad/setUsuarioAccesoLog_ajax/";

    $.ajax({
        async: false,
        cache: false,
        url: _url,
        type: 'post',
        dataType: 'json',
        beforeSend: function () { window.location.href = url_; },
        data: {
            tipo: 1,
            idmenu_deta: idmenu_deta_
        }
    }).done(function (data) {
        //if (data.status == "OK") { alert(data.mensaje); }
    }).fail(function () {
        alert("Error en petición log accesos");
    });
        
    $("#modal_load").modal("hide");
}


//#region IMAGENES

/* RUTAS DE IMAGENES */
var  url_asset_image_secciones = "assets/Images/sections/";
var  url_asset_image_temporada = "assets/Images/sections/seasons/";
var  url_asset_image_galeria = "assets/Images/sections/gallery/";

var NameImg_Background = [
                            'Home.jpg',
                            'Her.jpg',
                            'Him.jpg',
                            'Spa.jpg',
                            'Special_gifts.jpg',
                            'Season_special.jpg',
                            'Gallery.jpg',
                            'Contact.jpg'
                        ];

var fileTypes_img = [
                        'image/png'
                    ]

var fileTypes_img_background = [
                                    'image/jpg',
                                    'image/jpeg'
                                ]

function validFileType(t, file) {
    
    if (t == 1) { //imagen 
        for(var i = 0; i < fileTypes_img.length; i++) {
            if(file.type === fileTypes_img[i]) {
                return true;
            }
        }
    }
    if (t == 2) { //imagen background
        for(var i = 0; i < fileTypes_img_background.length; i++) {
            if(file.type === fileTypes_img_background[i]) {
                return true;
            }
        }
    }

    return false;
}

function existeUrl(url, imagen) {

    var url_ima = base_url + url + imagen;

    var http = new XMLHttpRequest();
    http.open('HEAD', url_ima, false);
    http.send();

    return http.status!=404;
}


//#endregion IMAGENES