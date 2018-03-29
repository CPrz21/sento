var base_url = 'http://' + location.hostname + ':'+location.port+'/localPA';

$(document).ready(function ()
{
    $("#modal_load").modal("show");
    getMenu();
    $("#modal_load").modal("hide");
});


function getMenu()
{
    var _url = base_url + "AjaxCMS/getMenu";
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
                                '   <strong id="sidebarExpanded" style="cursor:pointer;">CMS</strong>'+
                                '</div>'+
                                '<ul id="ul_sidebar_level1" class="list-unstyled class-level-1 components">'+
                                '</ul>'     );

        if (data.status == "OK") {

            $(data.datatable).each(function (){


                if (this.nivel == 1) {

                    $('#ul_sidebar_level1').append(
                                            '<li title="'+ this.title +'">'+
                                            '   <a href="#menu_'+ this.idmenu_deta +'" data-toggle="collapse" aria-expanded="false">'+
                                            '   <i class="glyphicon glyphicon-home"></i><label class="class-lbl-menu">'+ this.nombre +'</label>'+
                                            //'   <img id="img-aa" src="' + base_url + '/assets/Images/menu/icons8-ajustes-16.png"/>'+ this.nombre +
                                            '   </a>'+
                                            '   <ul class="collapse list-unstyled class-level-2" id="menu_'+ this.idmenu_deta +'"></ul>'+
                                            '</li>' );

                }
                else if(this.nivel != 1)
                {
                    if (this.bandera == "S") {
                        $('#menu_' + this.idmenupadre).append
                        (
                            '<li title="'+ this.title +'">' +
                            '   <a href="#menu_'+ this.idmenupadre +'" data-toggle="collapse" aria-expanded="false">'+ this.nombre +'</a>' +
                            '   <ul class="collapse list-unstyled" id="menu_'+ this.idmenupadre +'"></ul>'+
                            '</li>'
                        );
                    }
                    else{

                        $('#menu_' + this.idmenupadre).append
                        (
                            '<li title="'+ this.title +'">' +
                            '   <a href="'+ base_url +''+ this.url +'">'+ this.nombre +'</a>' +
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
